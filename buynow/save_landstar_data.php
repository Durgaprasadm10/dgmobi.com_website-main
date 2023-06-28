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
    
    
    // print_r($data);
    // exit;
    $orderId                    = $data["orderId"];
    $receiptNumber              = $data["receiptNumber"];
    $totalNoOfLicenses          = $data["totalNoOfLicenses"]; 
    $phone                      = $data["phone"];
    $firstName                  = $data["firstname"];
    $lastName                   = $data["lastname"];
    $email                      = $data["email"];
    $products                   = $data["products"];
    $username                   = $data["usname"];
    $totalPrice                 = $data["totalPrice"];
    $password                   = $data["password"];

    //echo $data["products"];
        
    
   // 
    
   // $totalNoOfLicensesTDG       = $data["totalNoOfLicensesTDG"];  
  //  $totalNoOfLicenses49CFR     = $data["totalNoOfLicenses49CFR"];
   // 
   // $totalPriceWithTax          = $data["totalPriceWithTax"];
   // $taxRate                    = json_encode($data["taxRate"]);
    
   // $taxPrice                   = $data["taxPrice"]; 
    //$provinceName               = $data["provinceName"];       
   // $address                    = $data["address"];
   // $price_type			= $data["pricetype"]; 
   // $deviceName          =$data["deviceName"];  
     
    //Store details in db
   //  $taxPrice,     
      //  $countryName, 
      //  $provinceName, 
       // $address,   
	  //  $price_type,   // $deviceName $totalPriceWithTax,  $taxRate,
    
    $transactionHandler = new Transaction();
   
    $inserted = $transactionHandler->storeDetails(
        $orderId,
        $totalNoOfLicenses, 
        $phone, 
        $firstName, 
        $lastName, 
        $email, 
        $selectedLanguage,
        $username,
        $products,
        $totalPrice,
        $password
    );
     //  echo "value return from insert";
     // echo $inserted[1];
    //  echo implode("|",$inserted);
      //string implode($separator, $array)
   //echo $data["products"];
    
  
    //If transaction details are inserted, 
    //insert cart items in db
//     if ($inserted["rowCount"]) { // we can check for illigal data
//         // Insert cart items in db
//        // foreach ($data["products"] as $product) {

// //    if($totalNoOfLicenses>0) {
// //             $transactionHandler->storeCartItems(
// //                 $inserted["lastInsertId"],
// //                 $product["id"],
// //                 $product["noOfLicenses"],
// //                 $product["totalPrice"]
// //             );
// //     }
//       //  }
        
//         echo "success";
//     } 
    // else {
    //     echo "fail111";
    // //  echo $deviceName;
    // }
} 
else {
    echo "invalid-data";
}
