<?php
//$envVar = "dev"; 
//$envVar = "test";
$envVar = "production";

$getCountryDetailsapi = "/api/mobile/new/getcountryandprovincedetails.json";
$verifyUserExistOrNotForCartApi = "/api/mobile/verifyUserExistOrNotForCart.json";
$mobileRegistrationApi = "/api/mobile/registrationUpdationLog/0.json";
$emailDuplicateCheckApi = "/api/mobile/new/usernames.json";
$getPriceApi = "/api/mobile/new/checkdevicepaymentstatus.json";
$getProductsForDispalyApi = "/api/mobile/new/displayappnameandcostinformation.json";
$registrationUpdationLogApi = "/api/mobile/registrationUpdationLog/1.json";
$sendMailToRegisterUser = "/api/mobile/sendmailToRegisterUser.json";

$supportEmailForCa = "support@dgsms.ca";
$supportEmailForUsa = "support@dgsmsusa.com";

$cfrUsaOptionText = "49 CFR - USA";
$tdgCaOptionText = "TDG - CANADA";

$cfrUsaOptionValue = "1";
$tdgCaOptionValue = "2";

$andriodDeviceOptionText = "Android";
$iosDeviceOptionText = "Apple-iOS";

$andriodDeviceOptionValue = "andriod";
$iosDeviceOptionValue = "ios";

$mobileTypeValForAndriod = "0";
$mobileTypeValForIos = "1";

$modeValForUsa = "CFR";
$modeValForCa = "TDG";

$cartValue = "1";
$actionLogValue = "web : user registration activity";
$companyValue = "no";
$resultStatusOO = "00";

if($envVar == "dev"){
	$baseServiceUrlUs = "http://192.168.1.49:80/DGSMS_US_WS_SERVER_BETA";
	$baseServiceUrlCa = "http://192.168.1.49:80/DGSMS_CA_WS_SERVER";	
	
	$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
	$paypalID = 'dgmobitestmerchant@gmail.com'; //working Business Email for sandbox	
	//dgmobitestbuyer@gmail.com  -- dgmobi@Mar30 //these are sandbox paypal buyer credentials
	
}elseif($envVar == "test"){
	$baseServiceUrlUs = "http://dgapptest.dgsmsusa.com";
	$baseServiceUrlCa = "http://dgapptest.dgsms.ca";
	
	$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
	$paypalID = 'dgmobitestmerchant@gmail.com'; //working Business Email for sandbox	
	//dgmobitestbuyer@gmail.com  -- dgmobi@Mar30 //these are sandbox paypal buyer credentials
	
}elseif($envVar == "production"){
	$baseServiceUrlUs = "https://dgapp.dgsmsusa.com";	
	$baseServiceUrlCa = "http://dgapp.dgsms.ca";
	
	$paypalURL = 'https://www.paypal.com/cgi-bin/webscr'; //live PayPal API URL
	$paypalID = 'paypal@ideabytes.com'; //live Business Email
	
}else{
	$baseServiceUrlUs = "http://dgapptest.dgsmsusa.com";
	$baseServiceUrlCa = "http://dgapptest.dgsms.ca";
	
	$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
	$paypalID = 'dgmobitestmerchant@gmail.com'; //working Business Email for sandbox	
	//dgmobitestbuyer@gmail.com  -- dgmobi@Mar30 //these are sandbox paypal buyer credentials
}

$mobileRegistrationUserUpdateApi_US = $baseServiceUrlUs . $registrationUpdationLogApi;
$mobileRegistrationUserUpdateApi_CA = $baseServiceUrlCa . $registrationUpdationLogApi;

$sendMailToUserApi_US = $baseServiceUrlUs . $sendMailToRegisterUser;
$sendMailToUserApi_CA = $baseServiceUrlCa . $sendMailToRegisterUser;
 
$mobileTypeArray = array("0" => "Andriod", "1" => "iOS");
$modeTypeArray = array("CFR" => "49CFR", "TDG" => "TDG");
//$productNameArray = array("1" => "DGMobi US General", "2" => "DGMobi US Landstar BCO Discount", "3"=>"DGMobi US General", "4"=>"DGMobi US Landstar BCO Discount", "5"=>"DGMobi CA General", "6"=>"DGMobi CA Landstar BCO Discount", "7"=>"DGMobi CA Midland", "8"=>"DGMobi CA Day&Ross");

$cancelLink = 'http://dgmobi.com';
$cancelURL = 'http://dgmobi.com/cancel.php';
$returnURL = 'http://dgmobi.com/success.php';
//$returnURL = 'http://dgmobi.com/success_constants.php';



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

<p>For assistance, feel free to contact us at <a href="mailto:%s" target="_top">%s</a> or call at +1 888-409-8057 EXT:1004 or 1005.</p>
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

<p>For assistance, feel free to contact us at <a href="mailto:%s" target="_top">%s</a> or call at +1 888-409-8057 EXT:1004 or 1005.</p>
</div>';

$paymentErrorText = '<h3 style="text-align:center;color:red;"><em>Your Transaction has been failed</em></h3><div style="margin:0px 0px 0px 80px;">

<p>Your Order id is <strong>%s</strong>, pls contact our support team for any clarification</p>

<p>Support: <a href="mailto:%s" target="_top">%s</a> or call at +1 888-409-8057 EXT:1004 or 1005.</p>
</div>';


	
/*	old text, changed to the above as per new requiement
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
?>
	
	
