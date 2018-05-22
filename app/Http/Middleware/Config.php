<?php

namespace App\Http\Middleware;

use Closure;

class Config
{
  var $settings = array(
		"websiteName" 						=> array("Easy EHR","Development Easy EHR")
		,"websiteShortName" 				=> array("EasyEHR","DevEasyEHR")
		,"websiteNotice"					=> array("The site will be going down on Monday, August 8, 2017 at 12:00pm for about 2 hours.","adfasdf")
		,"appPath" 							=> array("/var/www/ehr","C:\Users\Raymond\Desktop\ehr")
		,"imagePath" 						=> array("/var/www/ehr/images","C:\Users\Raymond\Desktop\ehr\images")
		,"dataPath" 						=> array("/var/www/ehr_data","C:\Users\Raymond\Desktop/ehr_data")
		,"support" 							=> array("raytheauthor@hotmail.com","raytheauthor@hotmail.com")
		,"showBlogs" 						=> array(10,10)
		,"loginAttempts" 					=> array(3,3)
		,"defaultBlogNumPerPage" 			=> array(30,5)
		,"defaultFileNumPerPage" 			=> array(30,5)
		,"defaultNotesNumPerPage" 			=> array(30,5)
		,"defaultTicketNumPerPage" 			=> array(30,5)
		,"defaultFileNumPerPage" 			=> array(30,5)
		,"defaultOrganizationNumPerPage" 	=> array(30,5)
		,"defaultUserNumPerPage" 			=> array(30,5)
		,"defaultAlertNumPerPage" 			=> array(30,5)
		,"defaultAppointmentNumPerPage" 	=> array(30,5)
		,"defaultFaqNumPerPage" 			=> array(30,5)
		,"defaultBillingNumPerPage" 			=> array(30,5)
		,"chat_message_limit"					=> array(100,100)
		,"monthly_price"								=> array(149.95,149.95)
		,"student_price_4_months"				=> array(149.95,149.95)
		);

    // for both dev and prod
  	var $pricing = array(
  		"MONTHLY" => array("interval" => "MONTHLY"
  							,"trialEndDate" => 0
  							,"price" => '.05'
  							,"text" => "$0.05 per month")
  		,"YEARLY" => array("interval" => "YEARLY"
  							,"trialEndDate" => 0
  							,"price" => '1154.45'
  							,"text" => "$1,154.45 per year")
  		,"SPECIAL" => array("interval" => "MONTHLY"
  							,"trialEndDate" => 86400
  							,"price" => '14.95'
  							,"text" => "$14.95 per month")
  	);

  	var $YEARS = array();


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->load_config();

        return $next($request);
    }


    function load_config()
  	{
      $index = ($_SERVER['SERVER_ADDR'] == "127.0.0.1") ? 1 : 0;
      $_SESSION['config'] = array();

      // load config
  		foreach($this->settings as $k => $v)
  			$_SESSION['config'][$k] = $v[$index];

  		$parts = explode(".",$_SERVER['HTTP_HOST']);
  		$_SESSION['config']['subdomain'] = @$parts[sizeof($parts)-3];
  		$_SESSION['config']['domain'] = $parts[sizeof($parts)-2].".".$parts[sizeof($parts)-1];

      // load pricing
  		$_SESSION['config']['pricing'] = $this->pricing;

      // load years
      for($i=0;$i<=10;$i++)
  			$this->YEARS[date("Y")+$i] = date("Y")+$i;
  		$_SESSION['config']['years'] = $this->YEARS;

  		return;
  	}
}
