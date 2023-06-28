<?php
$envVar = "dev"; 
//$envVar = "test";
//$envVar = "production";

$getCountryDetailsapi = "/api/mobile/new/getcountryandprovincedetails.json";
$verifyUserExistOrNotForCartApi = "/api/mobile/verifyUserExistOrNotForCart.json";
$mobileRegistrationApi = "/api/mobile/registrationUpdationLog/0.json";
$emailDuplicateCheckApi = "/api/mobile/new/usernames.json";
$getPriceApi = "/api/mobile/new/checkdevicepaymentstatus.json";
$getProductsForDispalyApi = "/api/mobile/new/displayappnameandcostinformation.json";

$mobileRegistrationUserUpdateApi = "/api/mobile/registrationUpdationLog/1.json";
$sendMailToUserApi = "/api/mobile/sendmailToRegisterUser.json";

if($envVar == "dev"){
	$baseServiceUrlUs = "http://192.168.1.49:80/DGSMS_US_WS_SERVER_BETA";
	$baseServiceUrlCa = "http://192.168.1.49:80/DGSMS_CA_WS_SERVER";	
	
	$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
	$paypalID = 'dgmobitestmerchant@gmail.com'; //working Business Email for sandbox	
	//dgmobitestbuyer@gmail.com  -- dgmobi@Mar30 //these are sandbox paypal buyer credentials
	
}elseif($envVar == "test"){
	$baseServiceUrlUs = "http://dgapptest.dgsmsus.com";
	$baseServiceUrlCa = "http://dgapptest.dgsms.ca";
	
	$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
	$paypalID = 'dgmobitestmerchant@gmail.com'; //working Business Email for sandbox	
	//dgmobitestbuyer@gmail.com  -- dgmobi@Mar30 //these are sandbox paypal buyer credentials
	
}elseif($envVar == "production"){
	$baseServiceUrlUs = "http://104.238.79.21:80/DGSMS_US_WS_SERVER_BETA";
	$baseServiceUrlCa = "http://dgapp.dgsms.ca";
	
	$paypalURL = 'https://www.paypal.com/cgi-bin/webscr'; //live PayPal API URL
	$paypalID = 'paypal@ideabytes.com'; //live Business Email
	
}else{
	$baseServiceUrlUs = "http://dgapptest.dgsmsus.com";
	$baseServiceUrlCa = "http://dgapptest.dgsms.ca";
	
	$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
	$paypalID = 'dgmobitestmerchant@gmail.com'; //working Business Email for sandbox	
	//dgmobitestbuyer@gmail.com  -- dgmobi@Mar30 //these are sandbox paypal buyer credentials
}

$mobileRegistrationUserUpdateApi_US = $baseServiceUrlUs . $mobileRegistrationUserUpdateApi;
$mobileRegistrationUserUpdateApi_CA = $baseServiceUrlCa . $mobileRegistrationUserUpdateApi;

$sendMailToUserApi_US = $baseServiceUrlUs . $sendMailToUserApi;
$sendMailToUserApi_CA = $baseServiceUrlCa . $sendMailToUserApi;
 
$mobileTypeArray = array("0" => "Andriod", "1" => "iOS");
$modeTypeArray = array("CFR" => "49CFR", "TDG" => "TDG");
//$productNameArray = array("1" => "DGMobi US General", "2" => "DGMobi US Landstar BCO Discount", "3"=>"DGMobi US General", "4"=>"DGMobi US Landstar BCO Discount", "5"=>"DGMobi CA General", "6"=>"DGMobi CA Landstar BCO Discount", "7"=>"DGMobi CA Midland", "8"=>"DGMobi CA Day&Ross");

$cancelLink = 'http://dgmobi.com';
$cancelURL = 'http://dgmobi.com/cancel.php';
$returnURL = 'http://dgmobi.com/success_us_test.php';


	
/*	
$successText = '<h1 style="text-align:center;color:blue;"><em>Congratulations!</em></h1><div style="margin:0px 0px 0px 80px;">
<h3 style="text-align:center;color:red;">Your account has been created successfully.</h3><br>
<p>Thank you for purchasing <strong>%s</strong> App in %s. </p>

<p><strong>Please follow the step-by-step procedure of the installation procedure.</strong></p>

<ul>
<li>Go to %s and search for <strong>DGMobi</strong>.</li>
<li>Select <strong>`%s`</strong> and install the app in your mobile.</li>
%s
<li>Select <strong>`Existing User`</strong> and enter the registered credentials.</li>
<li>Successful Login into the DGMobi application.</li>
</ul>

%s

<p>For assistance, feel free to contact us at <a href="mailto:support@dgsms.ca" target="_top">support@dgsms.ca</a> or call at +1 888-409-8057 EXT:1004 or 1005.</p>
</div>';

*/

$successAndriodText = '<h1 style="text-align:center;color:blue;"><em>Congratulations!</em></h1><div style="margin:0px 0px 0px 80px;">
<h3 style="text-align:center;color:red;">Your account has been created successfully.</h3><br>
<p>Thank you for purchasing <strong>%s</strong> App in %s. </p>

<p><strong>Please follow the step-by-step procedure of the installation procedure.</strong></p>

<ul>
<li>Go to %s and search for <strong>DGMobi</strong>.</li>
<li>Select <strong>`%s`</strong> and install the app in your mobile.</li>
%s
<li>Select <strong>`Existing User`</strong> and enter the registered credentials.</li>
<li>Successful Login into the DGMobi application.</li>
</ul>

%s

<p>For assistance, feel free to contact us at <a href="mailto:support@dgsms.ca" target="_top">support@dgsms.ca</a> or call at +1 888-409-8057 EXT:1004 or 1005.</p>
</div>';

$successIosText = '<h1 style="text-align:center;color:blue;"><em>Congratulations!</em></h1><div style="margin:0px 0px 0px 80px;">
<h3 style="text-align:center;color:red;">Your account has been created successfully.</h3><br>
<p>Thank you for purchasing <strong>%s</strong> App in %s. </p>

<p><strong>Please follow the step-by-step procedure of the installation procedure.</strong></p>

<ul>
<li>Go to %s and search for <strong>DGMobi</strong>.</li>
<li>Select <strong>`%s`</strong> and install the app in your mobile.</li>
%s
<li>Select <strong>`Sign In`</strong> and enter the registered credentials.</li>
<li>Check <strong>"Accept Terms and Conditions"</strong> and click on Ok button.</li>
<li>Successful Login into the DGMobi application.</li>
</ul>

%s

<p>For assistance, feel free to contact us at <a href="mailto:support@dgsms.ca" target="_top">support@dgsms.ca</a> or call at +1 888-409-8057 EXT:1004 or 1005.</p>
</div>';

$paymentErrorText = '<h3 style="text-align:center;color:red;"><em>Your Transaction has been failed</em></h3><div style="margin:0px 0px 0px 80px;">

<p>Your Order id is <strong>%s</strong>, pls contact our support team for any clarification</p>

<p>Support: <a href="mailto:support@dgsms.ca" target="_top">support@dgsms.ca</a> or call at +1 888-409-8057 EXT:1004 or 1005.</p>
</div>';


?>
	
	