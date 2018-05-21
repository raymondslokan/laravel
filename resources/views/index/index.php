<style>
	.container-fluid { padding:0; }
</style>

<div class="row text-center" style="background-color:#FFF">
	<div class="col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
		<br />
		<img src="/images/laptop.png" width="100%" />
	</div>
</div>

<div class="row text-center" style="background-color:#FFF">
	<div class="col-xs-10 col-xs-offset-1">
		<div style="position:relative;padding-bottom:250px;">
			<div style="position:absolute;text-align:center;width:100%;">
				<h4><a href="#ehr" class="indexLink">Cloud Based, HIPPA Compliant, Mobile First<div>Electronic Health Records</div></a>
			</div>
			<div style="position:absolute;text-align:center;width:100%;background-color:white;" class="hidden-xs">
				<h3><a href="#ehr" class="indexLink">Cloud Based, HIPPA Compliant, Mobile First<div>Electronic Health Records</div></a></h3>
			</div>
		</div>
	</div>
</div>

<div class="row text-center" style="background-color:#FFF;padding-bottom:250px;">
	<div class="col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
		<img src="/images/claims.png" width="90%" />
		<h3>Process Claims</h3>
	</div>

	<div class="col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
		<img src="/images/tracking.png" width="90%" />
		<h3>Patient Tracking</h3>
	</div>

	<div class="col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
		<img src="/images/referral.png" width="90%" />
		<h3>Teletherapy</h3>
	</div>
</div>

<div class="row text-center" style="background-image:url('/images/background.jpg');background-size:cover;background-repeat: no-repeat;background-attachment: fixed;padding:10px;color:#ff3333;">
  <div class="col-xs-12">
    <br /><br />
		<? if(Auth::user()): ?>
			<h1>Find out about our pricing and get started!</h1>
			<a href="/info/pricing" class="btn btn-default btn-lg" style="background-color:#ff4d4d;color:white;border:0;">Software Pricing</a>
		<? else: ?>
			<h1>Register now for free and get started!</h1>
			<a href="/register" class="btn btn-default btn-lg" style="background-color:#ff4d4d;color:white;border:0;">Free Registration</a>
		<? endif; ?>
	<br /><br /><br />
  </div>
</div>

<div class="row" style="background-color:#FFF;color:#999;padding-bottom:100px;">
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	<div class="col-xs-12" id="ehr" style="padding:0px 40px;white-space:pre-wrap;"><h3 style="line-height:1.5;">Electronic Health Records: The Basics</h3></div>
	<div class="col-xs-12" style="padding:0px 40px;white-space:pre-wrap;"><h4 style="line-height:1.5;">An electronic health record (EHR) is a digital version of a patient’s paper chart. EHRs are real-time, patient-centered records that make information available instantly and securely to authorized users. While an EHR does contain the medical and treatment histories of patients, an EHR system is built to go beyond standard clinical data collected in a provider’s office and can be inclusive of a broader view of a patient’s care. EHRs can:</h4></div>
	<div class="col-xs-12" style="padding:0px 40px;white-space:pre-wrap;"><h4 style="line-height:1.5;">Contain a patient’s medical history, diagnoses, medications, treatment plans, immunization dates, allergies, radiology images, and laboratory and test results</h4></div>
	<div class="col-xs-12" style="padding:0px 40px;white-space:pre-wrap;"><h4 style="line-height:1.5;">Allow access to evidence-based tools that providers can use to make decisions about a patient’s care</h4></div>
	<div class="col-xs-12" style="padding:0px 40px;white-space:pre-wrap;"><h4 style="line-height:1.5;">Automate and streamline provider workflow</h4></div>
	<div class="col-xs-12" style="padding:0px 40px;white-space:pre-wrap;"><h4 style="line-height:1.5;">One of the key features of an EHR is that health information can be created and managed by authorized providers in a digital format capable of being shared with other providers across more than one health care organization. EHRs are built to share information with other health care providers and organizations – such as laboratories, specialists, medical imaging facilities, pharmacies, emergency facilities, and school and workplace clinics – so they contain information from all clinicians involved in a patient’s care.</h4></div>
</div>
