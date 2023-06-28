<?php
/********************************************************************
 * Ideabytes Software India Pvt Ltd.                                *
 * 50 Jayabheri Enclave, Gachibowli, HYD                            *
 * Created Date : 2017-11-23                                        *
 * Created By : Poorna Teja Konatham                                *
 * Project : DGMobi Landstar Payment                                *
 * Description : Saves registration details to database             *
 *******************************************************************/

require_once 'init.php';

//Log the POST varibales
Logger::writeMessage($_POST);

/**
 * If data variable is set,
 * decode the JSON string to array and store all the details in db
 */
if (isset($_POST["data"])) {
    //Decode JSON string to associative array
    $data = json_decode($_POST["data"], TRUE);
    $selectedLanguage = (isset($_POST["language"])) ? $_POST["language"] : "english";
    
    if (!$data) {
        die("fail");
    }
    
    $orderId                    = $data["orderId"];
    $receiptNumber              = $data["receiptNumber"];
    $totalNoOfLicenses          = $data["totalNoOfLicenses"];
    $totalNoOfLicensesTDG       = $data["totalNoOfLicensesTDG"];
    $totalNoOfLicenses49CFR     = $data["totalNoOfLicenses49CFR"];
    $totalPrice                 = $data["totalPrice"];
    $totalPriceWithTax          = $data["totalPriceWithTax"];
    $taxRate                    = json_encode($data["taxRate"]);
    $taxPrice                   = $data["taxPrice"];
    $phone                      = $data["phone"];
    $firstName                  = $data["firstname"];
    $lastName                   = $data["lastname"];
    $email                      = $data["email"];
    $countryName                = $data["countryName"];
    $provinceName               = $data["provinceName"];
    $address                    = $data["address"];
    $products                   = $data["products"];
    $price_type			= $data['pricetype'];
    $username                   = $data["usname"];
    
    //Store details in db
    $transactionHandler = new Transaction();
    $inserted = $transactionHandler->storeDetails(
        $orderId,
        $totalNoOfLicenses, 
        $totalPriceWithTax, 
        $taxRate, 
        $taxPrice, 
        $phone, 
        $firstName, 
        $lastName, 
        $email, 
        $countryName, 
        $provinceName, 
        $address,
        $selectedLanguage,
	$price_type,
	$username
    );
    
    //If transaction details are inserted, 
    //insert cart items in db
    if ($inserted["rowCount"]) {
        // Insert cart items in db
        foreach ($data["products"] as $product) {

   if($product["noOfLicenses"] >0) {
            $transactionHandler->storeCartItems(
                $inserted["lastInsertId"],
                $product["id"],
                $product["noOfLicenses"],
                $product["totalPrice"]
            );
    }
        }
        
        echo "success";
    } else {
        echo "fail";
    }
} else {
    echo "invalid-data";
}
