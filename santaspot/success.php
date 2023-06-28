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

//Log the GET variables
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
    $paypalTransactionId, 
    $paypalResponse
);

//If updated fetch required details and make service calls
if ($updated) {
    //Get transaction details by orderId
    $transationDetails = $transactionHandler->getTransactionInfoByOrderId($orderId);
    
    //If transaction details found, get products list
    if ($transationDetails) {
        //Get language
        $selectedLanguage = $transationDetails["dgmobi_buynow_selected_lang"];
        
        //Get products list
        $productDetails = $transactionHandler->getCartItemsByTransactionId(
                $transationDetails["dgmobi_buynow_registration_id"]
        );
        
        //If products list found, make json string and send it via service call
        if ($productDetails) {
            $products = [];
            $productInfo = [];
            $totalNoOfLicensesTDG = 0;
            $totalNoOfLicenses49CFR = 0;
            
            //Make product objects
            foreach ($productDetails as $product) {
                $productInfo["regulation"]      = $product["dgmobi_buynow_product_regulation"];
                $productInfo["productName"]     = $product["dgmobi_buynow_product_name"];
                $productInfo["mobileType"]      = (string) $product["dgmobi_buynow_product_device_id"];
                $productInfo["appName"]         = $product["dgmobi_buynow_product_app_name"];
                $productInfo["noOfLicenses"]    = (string) $product["dgmobi_buynow_no_of_licenses"];
                $productInfo["price"]           = (string) round(($product["dgmobi_buynow_product_cost"]/$product["dgmobi_buynow_no_of_licenses"]),2);
                $productInfo["producttotalprice"]           = (string) $product["dgmobi_buynow_product_cost"];
                
                $products[] = $productInfo;
                
                //Calculate number of TDG licenses
                if ($product["dgmobi_buynow_product_regulation"] == "TDG") {
                    $totalNoOfLicensesTDG = $totalNoOfLicensesTDG + $product["dgmobi_buynow_no_of_licenses"];
                }
                
                //Calculate number of 49CFR licenses
                if ($product["dgmobi_buynow_product_regulation"] == "49CFR") {
                    $totalNoOfLicenses49CFR = $totalNoOfLicenses49CFR + $product["dgmobi_buynow_no_of_licenses"];
                }
            }
            
            //Build JSON string
            $response = [
                "receiptNumber"             => $transationDetails["dgmobi_buynow_paypal_order_id"],
                "unitPrice"                 => "",
                "totalNoOfLicenses"         => (string) $transationDetails["dgmobi_buynow_no_of_licenses"],
                "totalPriceWithTax"         => (string) $transationDetails["dgmobi_buynow_total_cost"],
                "totalNoOfLicensesTDG"      => (string) $totalNoOfLicensesTDG,
                "totalNoOfLicenses49CFR"    => (string) $totalNoOfLicenses49CFR,
                "taxRate"                   => json_decode($transationDetails["dgmobi_buynow_tax_details"]),
                "taxPrice"                  => (string) $transationDetails["dgmobi_buynow_tax_price"],
                "currency"                  => "US $",
                "phoneNumber"               => $transationDetails["dgmobi_buynow_phone_number"],
                "firstName"                 => $transationDetails["dgmobi_buynow_first_name"],
                "lastName"                  => $transationDetails["dgmobi_buynow_last_name"],
                "emailID"                   => $transationDetails["dgmobi_buynow_email"],
                "countryName"               => $transationDetails["dgmobi_buynow_country"],
                "provinceName"              => $transationDetails["dgmobi_buynow_province"],
                "address"                   => $transationDetails["dgmobi_buynow_address"],
                "page"                   => $transationDetails["dgmobi_buynow_pricetype"],
                "username"                   => $transationDetails["dgmobi_buynow_user_name"],
                "products"                  => $products
            ];

$arr1 = array();
$arr1['receiptNumber'] = $transationDetails["dgmobi_buynow_paypal_order_id"];
$arr1['unitPrice'] = "";
$arr1['totalNoOfLicenses'] = (string) $transationDetails["dgmobi_buynow_no_of_licenses"];
$arr1['totalPriceWithTax'] = (string) $transationDetails["dgmobi_buynow_total_cost"];
$arr1['totalNoOfLicensesTDG'] = (string) $totalNoOfLicensesTDG;
$arr1['totalNoOfLicenses49CFR'] = (string) $totalNoOfLicenses49CFR;
$arr1['taxRate'] = json_decode($transationDetails["dgmobi_buynow_tax_details"]);
$arr1['taxPrice'] = (string) $transationDetails["dgmobi_buynow_tax_price"];
$arr1['currency'] = "US $";
$arr1['phoneNumber'] = $transationDetails["dgmobi_buynow_phone_number"];
$arr1['firstName'] = $transationDetails["dgmobi_buynow_first_name"];
$arr1['lastName'] = $transationDetails["dgmobi_buynow_last_name"];
$arr1['emailID'] = $transationDetails["dgmobi_buynow_email"];
$arr1['countryName'] = $transationDetails["dgmobi_buynow_country"];
$arr1['provinceName'] = $transationDetails["dgmobi_buynow_province"];
$arr1['address'] = $transationDetails["dgmobi_buynow_address"];
$arr1['page'] = $transationDetails["dgmobi_buynow_pricetype"];
$arr1['userName'] = $transationDetails["dgmobi_buynow_user_name"];
$arr1['products'] = $products;


//echo json_encode($arr1);
$arr1 = json_encode($arr1);
            
            $response = json_encode($response);
            Logger::writeMessage(["response" => $response]);
            
            if (Config::CURRENT_ENV == Config::PROD_ENV) { //PRODUCTION
                $USServiceCallURL = Config::US_BASE_API_URL_PROD . Config::SEND_REG_DETAILS_API_URL;
                $CAServiceCallURL = Config::CA_BASE_API_URL_PROD . Config::SEND_REG_DETAILS_API_URL;
            } elseif (Config::CURRENT_ENV == Config::TEST_ENV) { //TEST
                $USServiceCallURL = Config::US_BASE_API_URL_TEST . Config::SEND_REG_DETAILS_API_URL;
                $CAServiceCallURL = Config::CA_BASE_API_URL_TEST . Config::SEND_REG_DETAILS_API_URL;
            } else { //DEVELOPMENT
                $USServiceCallURL = Config::US_BASE_API_URL_DEV . Config::SEND_REG_DETAILS_API_URL;
                $CAServiceCallURL = Config::CA_BASE_API_URL_DEV . Config::SEND_REG_DETAILS_API_URL;
            }
            
            //If number of TDG licenses are more than 0, call CA service call
            if ($totalNoOfLicensesTDG > 0) {
                $curlHandler = new CURLHandler();
                $resultCA = $curlHandler->sendJSONInPOST($CAServiceCallURL, $arr1);
                Logger::writeMessage(["resultCA" => $resultCA]);


//echo "<br/>";
//echo "CA service ".$CAServiceCallURL;
//echo "<br/>";
//print_r($resultCA);
            }
            
            //If number of 49CFR licenses are more than 0, call US service call
            if ($totalNoOfLicenses49CFR > 0) {
                $curlHandler2 = new CURLHandler();
                $resultUS = $curlHandler2->sendJSONInPOST($USServiceCallURL, $arr1);
                Logger::writeMessage(["resultUS" => $resultUS]);

//echo "<br/>";
//echo "us service ".$USServiceCallURL;
//echo "<br/>";
//print_r($resultUS);

            }

        }
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
        /*
        html,body, .container, .row, .row div {
            height: 100%;
        }
        
        .vertical-center {
            position: relative;
            top: 50%;
            transform: translateY(-50%);
        }
        */
    </style>
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top: 15px;">
            <div class="col-md-12">
                <!--<img class="img-responsive center-block" src="images/order-thanks4.jpg" alt="Thanks for your order!">-->
                <img class="img-responsive center-block" src="<?php echo $successImageLink; ?>" alt="Thanks for your order!">
            </div>
        </div>
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-12">
                <p style="text-align: center;">
                    Back to <a href="landstar-dgmobi_buy_now.php">Home</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
