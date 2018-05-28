import $ from 'jquery';
window.$ = window.jQuery = $;

//import 'jquery-ui/ui/widgets/datepicker.js';
window.Popper = require('popper.js')

function searchZip(myZip)
{
	if(myZip.length == 5) {
		var cityRequest;
		var stateRequest;

		try {
			cityRequest = new XMLHttpRequest();
			stateRequest = new XMLHttpRequest();
		} catch (e) {
			try{
				cityRequest = new ActiveXObject("Msxml2.XMLHTTP");
				stateRequest = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					cityRequest = new ActiveXObject("Microsoft.XMLHTTP");
					stateRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {
					alert("Your browser broke!");
					return false;
				}
			}
		}

		cityRequest.onreadystatechange = function() {
			if (cityRequest.readyState == 4) {
				document.getElementById('city').value = cityRequest.responseText;
			}
		}

		stateRequest.onreadystatechange = function() {
			if (stateRequest.readyState == 4) {
				document.getElementById('state').value = stateRequest.responseText;
			}
		}

		var cityString = "/zipCode/" + parseInt(myZip);
		cityRequest.open("GET", "/api/states/returnCity/" + cityString, true);
		cityRequest.send(null);

		var stateString = "/zipCode/" + parseInt(myZip);
		stateRequest.open("GET", "/api/states/returnState/" + stateString, true);
		stateRequest.send(null);
	}
}

// zip code automation
$(document).ready(function() {
	$("#zipCode").on("input",function(){
        if($(this).data("lastval")!= $(this).val()){
            $(this).data("lastval",$(this).val());
            //change action
            searchZip($('#zipCode').val());
        }
    });

	$("#siteErrors").animate({ opacity: 'toggle', height: 'toggle' });
	$("#siteWarnings").animate({ opacity: 'toggle', height: 'toggle' });
	$("#siteNotices").animate({ opacity: 'toggle', height: 'toggle' });

	if ($(this).scrollTop() > 50)
		$('#pageUp').fadeIn();

	$('#pageUp').click(function(){
		$('html, body').animate({ scrollTop: 0 }, 'slow');
	});

	$(window).scroll(function(){
		if ($(this).scrollTop() > 50) {
			$('#pageUp').fadeIn();
		} else {
			$('#pageUp').fadeOut();
		}
	});

	// only use this
	$('.numPerPage').change(function() {
		this.form.submit();
	});

  //$('.datepicker').datepicker();

	$("#toggle-help-block").on('click',function(event) {
		event.preventDefault();

		$(".help-block").slideToggle();

		$.get( "/api/alerts/toggleHelpBlocks")
		.done(function( data ) {
			if(data == 'blue'){
				$("#toggle-help-block").removeClass("gray").addClass("blue").blur();
			} else {
				$("#toggle-help-block").removeClass("blue").addClass("gray").blur();
			}
		});
	});

	$("#own").click(function(event) {
		event.preventDefault();
		$("#paneSubdomain").animate({ opacity: 'toggle', height: 'toggle' });
		$("#paneDomain").animate({ opacity: 'toggle', height: 'toggle' });
	});

	$("#dontown").click(function(event) {
		event.preventDefault();
		$("#paneSubdomain").animate({ opacity: 'toggle', height: 'toggle' });
		$("#paneDomain").animate({ opacity: 'toggle', height: 'toggle' });
	});

	$("#dashboardTrigger").on("click",function(e){
		e.preventDefault();
		$("#dashboardTrigger").blur();

		if($("#dashboardResult").html() === ''){
			$.post( "/api/dashboard/returnDashboard")
			.done(function( data ) {
				$("#dashboardResult").html( data ).animate({ opacity: 'toggle', height: 'toggle' });
			});
		} else {
			$("#dashboardResult").animate({ opacity: 'toggle', height: 'toggle' });
		}
	});

	//$('form:first *:input[type=text]:first').focus();
});

var RecaptchaOptions = {
	theme : 'white'
};

/*************/
/* messaging */
var $teletherapy_chat = {};
(function (module) {
  module.load = function(config){
    var SIGNALING_SERVER = "//easyehr.us:3000";

    var channel = config.channel;
    var organizationId = config.organizationId;
    var appointmentId = config.appointmentId;
    var fname = config.fname;

    var ICE_SERVERS = [
      {url:"stun:stun.l.google.com:19302"}
    ];

    var signaling_socket = null;   /* our socket.io connection to our webserver */
    var local_media_stream = null; /* our own microphone / webcam */
    var peers = {};                /* keep track of our peer connections, indexed by peer_id (aka socket.io id) */
    var peer_media_elements = {};  /* keep track of our <video>/<audio> tags, indexed by peer_id */

    var signaling_socket = io.connect(SIGNALING_SERVER);
    /* if there is a chat history, start at end */
    $('#messageBox').animate({ scrollTop: $('#messageBox').prop("scrollHeight") - $('#messageBox').prop('clientHeight') }, 'fast');

    $('form').submit(function(){
      if($('#m').val() !== ''){
        /* send to history */
        $.post( "/api/appointments/addToHistory/id/" + organizationId, { appointmentId: appointmentId, chatHistory: fname + ": " + $('#m').val() });

        /* send to socket */
        signaling_socket.emit( 'message', {channel: channel,message: fname + ": " + $('#m').val() });
        $('#m').val('');
      }
      $('#m').focus();
      return false;
    });

    signaling_socket.on('message', function(msg){
      // allow 1px inaccuracy by adding 1
      var isScrolledToBottom = $('#messageBox').prop('scrollHeight') - $('#messageBox').prop('clientHeight') <= $('#messageBox').prop('scrollTop') + 1;

      $('#messages').append($('<li>').text(msg));

      if(isScrolledToBottom)
        $('#messageBox').animate({ scrollTop: $('#messageBox').prop("scrollHeight") - $('#messageBox').prop('clientHeight') }, 'fast');
    });

    signaling_socket.on('connect', function() {
      console.log("Connected to signaling server");
      signaling_socket.emit('join', channel);
    });

    signaling_socket.on('disconnect', function() {
      console.log("Disconnected from signaling server");
      /* Tear down all of our peer connections and remove all the
      * media divs when we disconnect */
      for (peer_id in peer_media_elements) {
        peer_media_elements[peer_id].remove();
      }
      for (peer_id in peers) {
        peers[peer_id].close();
      }

      peers = {};
      peer_media_elements = {};
    });

    function part_chat_channel(channel) {
      signaling_socket.emit('part', channel);
    }

    signaling_socket.on('addPeer', function(config) {
      console.log('Signaling server said to add peer:', config);
      var peer_id = config.peer_id;
      if (peer_id in peers) {
        /* This could happen if the user joins multiple channels where the other peer is also in. */
        console.log("Already connected to peer ", peer_id);
        return;
      }

      var peer_connection = new RTCPeerConnection(
        {"iceServers": ICE_SERVERS},
        {"optional": [{"DtlsSrtpKeyAgreement": true}]} /* this will no longer be needed by chrome
                                                       * eventually (supposedly), but is necessary
                                                       * for now to get firefox to talk to chrome */
      );

      peers[peer_id] = peer_connection;

      peer_connection.onicecandidate = function(event) {
        if (event.candidate) {
          signaling_socket.emit('relayICECandidate', {
            'peer_id': peer_id,
            'ice_candidate': {
              'sdpMLineIndex': event.candidate.sdpMLineIndex,
              'candidate': event.candidate.candidate
            }
          });
        }
      }

      if (config.should_create_offer) {
        console.log("Creating RTC offer to ", peer_id);
        peer_connection.createOffer(
          function (local_description) {
            console.log("Local offer description is: ", local_description);
            peer_connection.setLocalDescription(local_description,
              function() {
                signaling_socket.emit('relaySessionDescription',
                  {'peer_id': peer_id, 'session_description': local_description});
                console.log("Offer setLocalDescription succeeded");
              },
              function() { Alert("Offer setLocalDescription failed!"); }
            );
          },
          function (error) {
            console.log("Error sending offer: ", error);
          }
        );
      }
    });

    signaling_socket.on('sessionDescription', function(config) {
      console.log('Remote description received: ', config);
      var peer_id = config.peer_id;
      var peer = peers[peer_id];
      var remote_description = config.session_description;
      console.log(config.session_description);

      var desc = new RTCSessionDescription(remote_description);
      var stuff = peer.setRemoteDescription(desc, function() {
        console.log("setRemoteDescription succeeded");
        if (remote_description.type == "offer") {
          console.log("Creating answer");
          peer.createAnswer(
          function(local_description) {
            console.log("Answer description is: ", local_description);
            peer.setLocalDescription(local_description,
              function() {
                signaling_socket.emit('relaySessionDescription',
                  {'peer_id': peer_id, 'session_description': local_description});
                console.log("Answer setLocalDescription succeeded");
              },
              function() { Alert("Answer setLocalDescription failed!"); }
            );
          },
          function(error) {
            console.log("Error creating answer: ", error);
            console.log(peer);
          });
        }
      }, function(error) {
         console.log("setRemoteDescription error: ", error);
        }
      );
      console.log("Description Object: ", desc);
    });

    signaling_socket.on('iceCandidate', function(config) {
      var peer = peers[config.peer_id];
      var ice_candidate = config.ice_candidate;
      peer.addIceCandidate(new RTCIceCandidate(ice_candidate));
    });

    signaling_socket.on('removePeer', function(config) {
      console.log('Signaling server said to remove peer:', config);
      var peer_id = config.peer_id;
      if (peer_id in peer_media_elements) {
        peer_media_elements[peer_id].remove();
      }
      if (peer_id in peers) {
        peers[peer_id].close();
      }

      delete peers[peer_id];
      //delete peer_media_elements[config.peer_id];
    });
  }
})($teletherapy_chat);


/*********/
/* video */
var $teletherapy_video = {};
(function (module) {
  module.loads = function(config){
    var SIGNALING_SERVER = "//easyehr.us:3000";
		// grab the room from the URL
		var room = config.room;

		// create our webrtc connection
		var webrtc = new SimpleWebRTC({
		  // the id/element dom element that will hold "our" video
		  localVideoEl: 'localVideo',
		  // the id/element dom element that will hold remote videos
		  remoteVideosEl: 'remotesVideos',
		  // immediately ask for camera access
		  autoRequestMedia: true,
		  debug: false,
		  detectSpeakingEvents: true,
		  autoAdjustMic: false
		});

		$(document).on('click','#stop_video_button',function(){
		  webrtc.pauseVideo();
		  $('#start_video_button').show();
		  $('#stop_video_button').hide();
		});

		$(document).on('click','#start_video_button',function(){
		  webrtc.resumeVideo();
		  $('#stop_video_button').show();
		  $('#start_video_button').hide();
		});

		$(document).on('click','#stop_audio_button',function(){
		  webrtc.mute();
		  $('#start_audio_button').show();
		  $('#stop_audio_button').hide();
		});

		$(document).on('click','#start_audio_button',function(){
		  webrtc.unmute();
		  $('#stop_audio_button').show();
		  $('#start_audio_button').hide();
		});

		$(document).on('click', 'video', function () {
		  $('#mainVideo video').appendTo( $('#remotesVideos') );
		  $('#mainVideo').html(this);

		  /* for some reason video pauses when moved */
		  $('video').each(function(){
		    $(this).get(0).play();
		  });
		});

		// when it's ready, join if we got a room from the URL
		webrtc.on('readyToCall', function () {
		  // you can name it anything
		  if (room) webrtc.joinRoom(room);
		});

		// we got access to the camera
		webrtc.on('localStream', function (stream) {
			webrtc.mute();
			webrtc.pauseVideo();
		  $('#stop_video_button').hide();
		  $('#stop_audio_button').hide();
			$('#start_video_button').show();
		  $('#start_audio_button').show();
		});

		// we did not get access to the camera
		webrtc.on('localMediaError', function (err) {
		});
		// local screen obtained
		webrtc.on('localScreenAdded', function (video) {
		  // video.onclick = function () {
		  //     video.style.width = video.videoWidth + 'px';
		  //     video.style.height = video.videoHeight + 'px';
		  // };
		  document.getElementById('localScreenContainer').appendChild(video);
		  $('#localScreenContainer').show();
		});

		// local screen removed
		webrtc.on('localScreenRemoved', function (video) {
		  document.getElementById('localScreenContainer').removeChild(video);
		  $('#localScreenContainer').hide();
		});

		// a peer video has been added
		webrtc.on('videoAdded', function (video, peer) {
		  console.log('video added', peer);
		  var remotes = document.getElementById('remotes');
		  if (remotes) {
		    var container = document.createElement('div');
		    container.className = 'videoContainer';
		    container.id = 'container_' + webrtc.getDomId(peer);
		    container.appendChild(video);

		    // suppress contextmenu
		    video.oncontextmenu = function () { return false; };

		    remotes.appendChild(container);
		}
		});

		// a peer was removed
		webrtc.on('videoRemoved', function (video, peer) {
		  console.log('video removed ', peer);
		  var remotes = document.getElementById('remotes');
		  var el = document.getElementById(peer ? 'container_' + webrtc.getDomId(peer) : 'localScreenContainer');
		  if (remotes && el) {
		    remotes.removeChild(el);
		  }
		});
	}
})($teletherapy_video);
