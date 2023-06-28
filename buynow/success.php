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


//$mailsending = new mail_class;  for mail
//$transactionHandler = new Transaction();
//include "mail_class.php"; 

//Log the GET variables

require_once 'init.php';
include "sendmail.php";
//require_once 'mail_class.php';

Logger::writeMessage($_GET);

//Get details form GET variables
$orderId = $_GET["orderId"];
$paypalTransactionStatus = $_GET["st"];
$paypalTransactionId = $_GET["tx"];
$paypalResponse = json_encode($_GET);




//If transaction is completed, set status to 1
//If pending, set status to 0
//Else set status to 2 (means failed)
if ($paypalTransactionStatus == "Completed") {
    $paypalTransactionStatus = 1;


} elseif ($paypalTransactionStatus == "Pending") {
    $paypalTransactionStatus = 0;
} else {
    $paypalTransactionStatus = 2;
}

$selectedLanguage = "english";


//Update status of the transaction
$transactionHandler = new Transaction();

$updated = $transactionHandler->updatePayPalStatus(
    $orderId,
    $paypalTransactionStatus,
    //$paypalTransactionId, 
    $paypalResponse
);
//print_r("orderId_details".$orderId);    //test

//If updated fetch required details and make service calls

//print_r("updated" . $updated);   //test

if ($updated == 2) {
    // print_r("updated_details".$updated);   //test
    //Get transaction details by orderId
    $transationDetails = $transactionHandler->getTransactionInfoByOrderId($orderId);

    //   print_r(json_encode($transationDetails));   //test
   // exit;
    if ($transationDetails) {
        // print_r(json_encode($transationDetails));
        // exit;

        
       //   print_r("in transaction success loop");
        //     //Get language     by ganesh
        $productInfo = [];
        $products1 = [];
        $check_for_cfr;
        $appname = "";

        $totalNoOfLicensesTDG = 0;
        $totalNoOfLicenses49CFR = 0;

        $selectedLanguage = $transationDetails["selected_language"];

        $productDetails = $transationDetails["product_list"];
        //  print_r($productDetails);
        // exit;
        // print_r("^^^^^^^^^^^^^^^^^^^^^^^^^^");
        $productDetails_arr = preg_split("/\,/", $productDetails);
        // print_r($productDetails_arr);
        // exit;
        for ($i = 0; $i < count($productDetails_arr); $i++) {
             
            $allproduct_list = $productDetails_arr[$i];

            $product_list = preg_split("/\:/", $productDetails_arr[$i]);

            $appname = explode(" ", $product_list[0]);

            $mystring = 'CFR';
            $check_for_cfr = strpos($product_list[0], $mystring);
            if ($check_for_cfr == true) {
                $productInfo["regulation"] = "49 CFR";
            } else {
                $productInfo["regulation"] = "TDG";
            }// $appname = strtolower($product["appName"]);
            $productInfo["appName"] = strtolower($appname[1]);
            $productInfo["productName"] = $product_list[0];
            if ($product_list[2] == "Android") {
                $productInfo["mobileType"] = "0"; // $mobile_type="0";  Android=0
            } else {
                $productInfo["mobileType"] = "1"; // Android=1
            }
            // $productInfo["mobileType"]               =       $mobile_type;
            $productInfo["noOfLicenses"] = $product_list[3];
            $productInfo["producttotalprice"] = $product_list[4];
            $productInfo["price"] = (string) round(($product_list[4] / $product_list[3]), 2);
            $productInfo["licence_type"] = $product_list[1];

            $products1[] = $productInfo;




            if ($check_for_cfr == true) {
                $totalNoOfLicenses49CFR = $totalNoOfLicenses49CFR + $product_list[3];
                //  print_r("49cfr".$totalNoOfLicenses49CFR."\n");


            } else {
                $totalNoOfLicensesTDG = $totalNoOfLicensesTDG + $product_list[3];
            }
        }
        // print_r($products1);
        // exit;

        $response = [

            "receiptNumber" => $transationDetails["paypal_transactionid"],
            "unitPrice" => "",
            "totalNoOfLicenses" => (string) $transationDetails["no_licences"],
            "totalPriceWithTax" => (string) $transationDetails["total_price"],
            "totalNoOfLicensesTDG" => (string) $totalNoOfLicensesTDG,
            "totalNoOfLicenses49CFR" => (string) $totalNoOfLicenses49CFR,
            "taxRate" => "0",
            "taxPrice" => "0",
            "currency" => "US $",
            "phoneNumber" => $transationDetails["phone_number"],
            "firstName" => $transationDetails["user_first_name"],
            "lastName" => $transationDetails["user_last_name"],
            "emailID" => $transationDetails["email"],
            "countryName" => " ",      //not reqired
            "provinceName" => " ",      //not reqired
            "address" => " ",            //not reqired
            "page" => " ",                 //not reqired
            "username" => $transationDetails["user_name"],
            "products" => $products1
        ];


        $taxrate_array2 = []; //{"taxPercentage":"0","taxType":"GST","taxValue":"0.00"}
        $taxrate_array = [];
        $taxrate_array['taxPercentage'] = "0";
        $taxrate_array['taxType'] = "GST";
        $taxrate_array['taxValue'] = "0.00";

        $taxrate_array2[] = $taxrate_array;
        // print_r($taxrate_array);
        // exit;
        $arr1 = array();
        $arr1['receiptNumber'] = $transationDetails["paypal_transactionid"];
        $arr1['unitPrice'] = "";
        $arr1['totalNoOfLicenses'] = (string) $transationDetails["no_licences"];
        $arr1['totalPriceWithTax'] = (string) $transationDetails["total_price"];
        $arr1['totalNoOfLicensesTDG'] = (string) $totalNoOfLicensesTDG;
        $arr1['totalNoOfLicenses49CFR'] = (string) $totalNoOfLicenses49CFR;
        $arr1['taxRate'] = $taxrate_array2;
        $arr1['taxPrice'] = "0";
        $arr1['currency'] = "US $";
        $arr1['phoneNumber'] = $transationDetails["phone_number"];
        $arr1['firstName'] = $transationDetails["user_first_name"];
        $arr1['lastName'] = $transationDetails["user_last_name"];
        $arr1['emailID'] = $transationDetails["email"];
        $arr1['countryName'] = " ";
        $arr1['provinceName'] = " ";
        $arr1['address'] = " ";
        $arr1['page'] = " ";
        $arr1['userName'] = $transationDetails["user_name"];
        $arr1['password'] = $transationDetails["password"];
        $arr1['products'] = $products1;

        $arr1 = json_encode($arr1);
        // print_r("****************************************");
        // print_r($arr1);
        // // print_r("****************************************");
        //  exit;
        $response = json_encode($response);

        Logger::writeMessage(["response" => $response]);
         //  Service for password encryption   ENCRYPT_PASSWORD
     //   $CAServiceCallURL = "http://localhost:8080/DGSMS_CA_WS_SERVER/api/new/web/encryption.json";
        // print_r(Config::ENCRYPT_PASSWORD);
        // exit;
        $CAServiceCallURL = Config::ENCRYPT_PASSWORD;
        // print_r($CAServiceCallURL);
        // exit;
       
       $curlHandler = new CURLHandler();
       $resultpassword= $curlHandler->sendJSONInPOST($CAServiceCallURL, $transationDetails["password"]);

    
       
       $res = json_decode($resultpassword);
      
       
       $encryptPasrd= $res -> results -> result;
      //  $encryptPasrd = $transationDetails["password"];
       
       

         if ($totalNoOfLicensesTDG > 0) {

        $StroreDteilsMobile = new StoredetailsInMobileDB();
        $resultCA = $StroreDteilsMobile->storedetailsForMobile(
            $transationDetails["paypal_transactionid"],
            "",
            (string) $transationDetails["no_licences"],
            (string) $transationDetails["total_price"],
            (string) $totalNoOfLicensesTDG,
            (string) $totalNoOfLicenses49CFR,
            $taxrate_array2,
            "0",
            "US $",
            $transationDetails["phone_number"],
            $transationDetails["user_first_name"],
            $transationDetails["user_last_name"],
            $transationDetails["email"],
            " ",
            " ",
            " ",
            " ",
            $transationDetails["user_name"],
            // $transationDetails["password"],
            $encryptPasrd,
            $products1,
            "TDG"           //CA

        );

            //sending mail

          }

        //If number of 49CFR licenses are more than 0, call US service call
        if ($totalNoOfLicenses49CFR > 0) {  //US
        $StroreDteilsMobile = new StoredetailsInMobileDB();
            $resultUS = $StroreDteilsMobile->storedetailsForMobile(  
                                            $transationDetails["paypal_transactionid"],
                                                "",
                                             (string) $transationDetails["no_licences"],
                                             (string) $transationDetails["total_price"],
                                             (string) $totalNoOfLicensesTDG,
                                             (string) $totalNoOfLicenses49CFR,
                                             $taxrate_array2,
                                             "0",
                                             "US $",
                                             $transationDetails["phone_number"],
                                             $transationDetails["user_first_name"],
                                             $transationDetails["user_last_name"],
                                             $transationDetails["email"],
                                             " ",
                                             " ",
                                             " ",
                                             " ",
                                             $transationDetails["user_name"],
                                             $encryptPasrd,   //encripted password
                                             $products1,
                                             "49 CFR"           //US

                                                          );

            // credentialsMail(json_decode($arr1,true));

        }
        credentialsMail(json_decode($arr1, true));
    }
}
if ($selectedLanguage == "english") {
    $successImageLink = "images/order-en-thanku.jpeg";
} else if ($selectedLanguage == "french") {
    //$successImageLink = "images/order-thanks-fr.jpg";
    $successImageLink = "images/order-fr-thanku.jpeg";
} else if ($selectedLanguage == "spanish") {
    $successImageLink = "images/order-sp-thanku.jpeg";
    //$successImageLink = "images/order-thanks-sp.jpg";
} else {
    $successImageLink = "images/order-en-thanku.jpeg";
    //$successImageLink = "images/order-thanks-en.jpg";

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buy Now | Landstar</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    </style>
</head>

<body>
    <div class="container">
        <div class="row" style="margin-top: 15px;">
            <div class="col-md-12">
                <!--<img class="img-responsive center-block" src="images/order-thanks4.jpg" alt="Thanks for your order!">-->
                <img class="img-responsive center-block" src="<?php echo $successImageLink; ?>"
                    alt="Thanks for your order!">
            </div>
        </div>
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-12">
                <p style="text-align: center;">
                    Back to <a href=<?php echo Config::SITE_URL?>>Home</a>
                    <!-- Back to <a href="http://localhost/dgmodi/dgmobi/buynow/buynow.php">Home</a> for locallhost -->
                </p>
            </div>
        </div>
    </div>
</body>

</html>