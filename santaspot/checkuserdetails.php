<?php
/********************************************************************
 * Ideabytes Software India Pvt Ltd.                                *
 * 50 Jayabheri Enclave, Gachibowli, HYD                            *
 * Created Date : 2017-11-23                                        *
 * Created By : Poorna Teja Konatham                                *
 * Project : DGMobi Landstar Payment                                *
 * Description : Saves PayPal response and sends data through       *
 *      service call to main server.                                *
 *******************************************************************/

require_once 'init.php';



    if (Config::CURRENT_ENV == Config::PROD_ENV) { //PRODUCTION
        $USServiceCallURL = Config::US_BASE_API_URL_PROD . Config::GET_USER_INFO;
        $CAServiceCallURL = Config::CA_BASE_API_URL_PROD . Config::GET_USER_INFO;
    } elseif (Config::CURRENT_ENV == Config::TEST_ENV) { //TEST
        $USServiceCallURL = Config::US_BASE_API_URL_TEST . Config::GET_USER_INFO;
        $CAServiceCallURL = Config::CA_BASE_API_URL_TEST . Config::GET_USER_INFO;
    } else { //DEVELOPMENT
        $USServiceCallURL = Config::US_BASE_API_URL_DEV . Config::GET_USER_INFO;
        $CAServiceCallURL = Config::CA_BASE_API_URL_DEV . Config::GET_USER_INFO;
    }

//echo $CAServiceCallURL;
//echo $USServiceCallURL;
/*const DB_HOST = "ideabytesdb.c6hujshgwzfd.us-east-1.rds.amazonaws.com"; //Host name
const DB_NAME = "dgmobi_buynow"; //Database name
const DB_USERNAME = "dgmobi_buy"; //User name
const DB_PASSWORD = "&(buy_dgmobi)&"; //Password*/

$username = $_REQUEST['username'];

$arr = array();
$arr['appName'] = "landstar";
$arr['username'] = $username;


$curlHandler = new CURLHandler();
$resultUS = $curlHandler->sendJSONInPOST($USServiceCallURL, json_encode($arr));

$resp = json_decode($resultUS, TRUE);
$results = $resp['results'];

$mobilearr = array();
$countryarr = array();

$firstName = "";
$lastName = "";
$emailId = "";
$phoneNumber = "";
$countryName = "";
$provinceName = "";
$username = "";
$avail = "false";

if($results['status'] == "00") {
	array_push($countryarr, "US");
	array_push($mobilearr, $results['userDetails']['mobileType']);

	$firstName = $results['userDetails']['firstName'];
	$lastName = $results['userDetails']['lastName'];
	$emailId = $results['userDetails']['emailId'];
	$phoneNumber = $results['userDetails']['phoneNumber'];
	$countryName = $results['userDetails']['countryName'];
	$provinceName = $results['userDetails']['provinceName'];
	$username = $results['userDetails']['username'];

	$avail = "true";

}


$resultCA = $curlHandler->sendJSONInPOST($CAServiceCallURL, json_encode($arr));
$resp1 = json_decode($resultCA, TRUE);
$results1 = $resp1['results'];
if($results1['status'] == "00") {
	array_push($countryarr, "CA");
	array_push($mobilearr, $results1['userDetails']['mobileType']);

	$firstName = $results1['userDetails']['firstName'];
	$lastName = $results1['userDetails']['lastName'];
	$emailId = $results1['userDetails']['emailId'];
	$phoneNumber = $results1['userDetails']['phoneNumber'];
	$countryName = $results1['userDetails']['countryName'];
	$provinceName = $results1['userDetails']['provinceName'];
	$username = $results1['userDetails']['username'];
	$avail = "true";
}

//print_r($resultCA);
//print_r($resultUS);


$productslist = new Product();
$product = $productslist->getAllProducts($mobilearr,$countryarr);


$arr = array();

$arr['firstName'] = $firstName;
$arr['lastName'] = $lastName;
$arr['emailId'] = $emailId;
$arr['phoneNumber'] = $phoneNumber;
$arr['countryName'] = $countryName;
$arr['provinceName'] = $provinceName;
$arr['username'] = $username;
$arr['product'] = $product;
$arr['avail'] = $avail;

echo json_encode($arr);

?>
