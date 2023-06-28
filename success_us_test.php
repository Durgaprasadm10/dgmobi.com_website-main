<?php
include 'details_us_test.php';
include 'dbconfig.php';
include 'function_common.php';

$query_string_from_payapl = $_SERVER['QUERY_STRING'];
//exit;
/*
echo "coming to success page";
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
echo "<pre>";
print_r($_GET);
echo "</pre>";
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/
//exit;

//Get payment information from PayPal
$item_number = $_REQUEST['item_number']; 
$txn_id = $_REQUEST['tx'];
$payment_gross = $_REQUEST['amt'];
$currency_code = $_REQUEST['cc'];
$payment_status = $_REQUEST['st'];
$item_name = $_REQUEST['item_name'];

$order_id = $_REQUEST['orderId'];


$insert = $db->query("INSERT INTO payments(item_number,txn_id,payment_gross,currency_code,payment_status,order_id, querystring_from_paypal) VALUES('".$item_number."','".$txn_id."','".$payment_gross."','".$currency_code."','".$payment_status."','".$order_id."', '".$query_string_from_payapl."')");
        $last_insert_id = $db->insert_id;
$ordersResult = $db->query("SELECT * FROM orders WHERE order_id = '".$order_id . "'");
//var_dump($ordersResult);
$orderRow = $ordersResult->fetch_assoc();
$userData = json_decode($orderRow['data']);

//echo $userData;
//exit;
$requiredArray = explode("&", $userData);
$paramsArray = array();
foreach($requiredArray as $value){
	$temp = array();
	$temp = explode("=", $value);
	$paramkey = $temp[0];$paramvalue = $temp[1];
	$paramsArray[$paramkey] = $paramvalue;
}
/*
echo "<pre>";
print_r($paramsArray);
echo "</pre>";
*/

if($txn_id == ""){
	echo sprintf($paymentErrorText, $order_id);
}else{
	//{"Data":[{"app_name":"Give here what user selects ","app_version":"","os_version":"","action":"web : give some text what ever you feel like it is understandable","mobile_model":"","user_name":"","device_Id":""}]}
	//$data_string = '{"Data":[{"firstname":"'.$paramsArray['firstname'].'","lastname":"'.$paramsArray['lastname'].'","username":"'.$paramsArray['username'].'","password":"'.$paramsArray['password'].'","email":"'.$paramsArray['email'].'","mobileType":"'.$paramsArray['mobileType'].'","imei":"'.$paramsArray['imei'].'","companyname":"'.$paramsArray['companyname'].'","cart":"'.$paramsArray['cart'].'","mode":"'.$paramsArray['mode'].'","order_Id":"'.$paramsArray['order_Id'].'","company":"'.$paramsArray['company'].'","reportingemail":"'.$paramsArray['reportingemail'].'","phone":"'.$paramsArray['phone'].'"}]}';

	$action = "web :  payment successful, trans id = " . $txn_id;
	$data_string = '{"Data":[{"firstname":"'.$paramsArray['firstname'].'","lastname":"'.$paramsArray['lastname'].'","username":"'.$paramsArray['username'].'","password":"'.$paramsArray['password'].'","email":"'.$paramsArray['email'].'","mobileType":"'.$paramsArray['mobileType'].'","imei":"'.$paramsArray['imei'].'","companyname":"'.$paramsArray['companyname'].'","cart":"'.$paramsArray['cart'].'","mode":"'.$paramsArray['mode'].'","order_Id":"'.$paramsArray['order_Id'].'","company":"'.$paramsArray['company'].'","reportingemail":"'.$paramsArray['reportingemail'].'","phone":"'.$paramsArray['phone'].'","app_name":"'.$paramsArray['companyname'].'", "app_version":"", "os_version":"", "action":"'.$action.'", "mobile_model":"", "user_name":"'.$paramsArray['username'].'", "device_Id":""}]}';

	//$logactivity_data_string = '{"Data":[{"app_name":"'.$paramsArray['companyname'].'", "app_version":"", "os_version":"", "action":"'.$action.'", "mobile_model":"", "user_name":"'.$paramsArray['username'].'", "device_Id":""}]}';
	//echo $data_string;
	$url = "";

	if($paramsArray['mode'] == "CFR"){
		//$url = "http://104.238.67.134/DGSMS_US_WS_SERVER_WEB_ANDROID/api/mobile/registrationUpdationLog/1.json";
		//$activity_log_url = "http://104.238.67.134/DGSMS_US_WS_SERVER_WEB_ANDROID/api/mobile/insertdgmobiactivitylog.json";
		$url = $mobileRegistrationUserUpdateApi_US;
	}else{
		//$url = "http://104.238.67.134/DGSMS_CA_WS_SERVER/api/mobile/registrationUpdationLog/1.json";
		//$activity_log_url = "http://104.238.67.134/DGSMS_CA_WS_SERVER/api/mobile/insertdgmobiactivitylog.json";
		$url = $mobileRegistrationUserUpdateApi_CA;
	}
	//$activity_log_result = invokeCurl($activity_log_url, $logactivity_data_string);
	/*
	echo "<br>--------------------------------------<br>";
	var_dump($activity_log_result);
	echo "<br>--------------------------------------<br>";
	*/
	//echo $url;
	//mobile user updation api
	$result = invokeCurl($url, $data_string);
	$responeArray = json_decode($result,true);
	/*
	echo "<br>--------------------------------------<br>";
	var_dump($result);
	echo "<br>--------------------------------------<br>";
	
	echo "<pre>";
	print_r($responeArray);
	echo "</pre>";
	*/
	$responseResult = @$responeArray['results']['result'];
	$responseStatus = @$responeArray['results']['status'];

	if($responseStatus == "00"){
		//echo "coming to updation success";
		//var_dump($responeArray['results']['data']);
		$responseDataUserName = $responeArray['results']['data']['username'];
		$responseDataEmail = $responeArray['results']['data']['email_id'];	
		
		$data_string1 = '{"Data":[{"user_name":"'.$paramsArray['username'].'"}]}';
	//	echo $data_string1 . "<br>";
		if($paramsArray['mode'] == "CFR"){
			$url1 = $sendMailToUserApi_US;
		}else{
			$url1 = $sendMailToUserApi_CA;
		}
	//	echo $url1 . "<br>";
		$emailResult = invokeCurl($url1, $data_string1);
		/*
		echo "<br>--------------------------------------<br>";
		var_dump($emailResult);
		echo "<br>--------------------------------------<br>";
		*/
		$emailResponeArray = json_decode($emailResult,true);
		$emailRespone = @$emailResponeArray['results']['reponse'];
		$emailResponeStatus = @$emailResponeArray['results']['status'];
		if($emailResponeStatus == "00"){
			
			$firstName = $paramsArray['firstname']; $mode = $modeTypeArray[$paramsArray['mode']]; $mobileType = $mobileTypeArray[$paramsArray['mobileType']]; 
			//$productName =$productNameArray[$item_number];
			$productName = $item_name;

			//echo sprintf($displayText1, $firstName, $mode, $mobileType, $productName);
			
			//echo "<br><br>";
			$successText = "";
			if($paramsArray['mobileType'] == "0" ){
				$successText = $successAndriodText;
				$mobileTypeText = 'Play Store<img src="playstore.png" style="width:40px;height=40px;">';
				$couponCodeText = '<li>Enter <strong>Coupon Code</strong> sent to your Registered mail ID.</li>';
				$noteText =  '<p>Note: For reference, We have sent the PDF copy of the Installation procedure to your registered email.</p>';
			}else{
				$successText = $successIosText;
				$mobileTypeText = 'App Store<img src="appstore.png" style="width:20px;height=20px;">';
				$couponCodeText = '';
				$noteText =  '<p>Note: For reference, We have sent the PDF copy of the Installation procedure to your registered email.</p>';
			}
			//echo "<br>";
			//echo $displayText2;
			echo sprintf($successText, $productName, $mobileType, $mobileTypeText, $productName, $couponCodeText, $noteText);
			//echo $emailRespone . " to " . $responseDataEmail;
		}else{
			echo "email sending failed.<br>";
			echo $emailRespone . " to " . $responseDataEmail;
		}
		/*
		echo "<pre>";
		print_r($emailResponeArray);
		echo "</pre>";
		*/
	} else{
		echo "There is a problem in user updation, please check with admin.";
		echo "<br> User updation status: " . $responseStatus;
		echo "<br> User updation result: " . $responseResult;
	}
}//else of if($txn_id == "")
?>