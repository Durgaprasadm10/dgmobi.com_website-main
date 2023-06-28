<?php
/********************************************************************
 * Ideabytes Software India Pvt Ltd.                                *
 * 50 Jayabheri Enclave, Gachibowli, HYD                            *
 * Created Date : 2017-11-23                                        *
 * Created By : Poorna Teja Konatham                                *
 * Project : DGMobi Landstar Payment                                *
 * Description : Handles functions related to transactions          *
 *******************************************************************/

class StoredetailsInMobileDB
{
  /**
   * Stores database connection object
   * @var object Database connection object
   */
  private $clientdb_ca = NULL;

  private $clientdb_us = NULL;



  /**
   * Get database instance on invoke
   */
  public function __construct()
  {
    $this->clientdb_ca = Database::getInstanceFormobileCA();
    $this->clientdb_us = Database::getInstanceFormobileUS();
  }

  public function storedetailsForMobile(
    $receiptNumber,
    $unitPrice,
    $totalNoOfLicenses,
    $totalPriceWithTax,
    $totalNoOfLicensesTDG,
    $totalNoOfLicenses49CFR,
    $taxRate,
    $taxPrice,
    $currency,
    $phoneNumber,
    $firstName,
    $lastName,
    $emailID,
    $countryName,
    $provinceName,
    $address,
    $page,
    $userName,
    $password,
    $products,
    $country

  )
  {

    $userType = "C";
    $safety_officer_mail_id = " ";
    $approval_status = "";
    $license_period = 364;

    $user_creation_source = 1;
    $user_active_status_cart = 1;  //1
    $user_order_id_cart = "";
    $coupon_code = "";
    $country_name = "";
    $province_name = "";

    $customer_id = 0;
    $license_type_id = 3;
    $gateway_check_status = 0;
    $enable_username = "";
    $license_temp_status = "";
    $deviceId = "";
   // $license_status = "DfczpGddqZVQdRiR";   //16
   
      $used_symbols = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';  
 
     $license_status= substr(str_shuffle($used_symbols), 0,16);


  //  $license_session = "FQLNSXKjcB6VtLgfOdXIP8M7K6Fyggh2";  //32   
    $license_session= substr(str_shuffle($used_symbols), 0,32);
    $license_key = "";
    $datetime = new DateTime();
    $dateInString = $datetime->format('d-m-Y');
    $date_valid = date_add($datetime, date_interval_create_from_date_string("365 days"));
    $valid_date = $date_valid->format('d-m-Y');

    //  print_r($products);


    try {
      //creating SQL statement
      $insert = "INSERT INTO `mobile_user_details`"
        . "(`first_name`,"
        . "`last_name`,"
        . "`username`,"
        . "`password`,"
        . "`email_id`,"
        . "`phone_number`,"
        . "`user_type`," //c
        . "`company_name`,"
        . "`app_name`,"
        . "`safety_officer_mail_id`," //""
        . "`approval_status`," //1
        . "`mobile_type`,"
        . "`license_period`," //365
        . "`user_creation_source`," //1
        . "`user_active_status_cart`," //5
        . "`user_order_id_cart`," //""
        . "`coupon_code`," //""
        . "`country_name`,"
        . "`province_name`"
        . ") VALUES ( :firstName,:lastName,:username,:password,:email_id,:phone_number,:user_type,:company_name,:app_name,:safety_officer_mail_id,:approval_status,:mobile_type,:license_period,:user_creation_source,:user_active_status_cart,:user_order_id_cart,:coupon_code,:country_name,:province_name)";
      //  echo $insert;
      if ($country == "TDG") {
        $stmt = $this->clientdb_ca->prepare($insert);
      } else {
        $stmt = $this->clientdb_us->prepare($insert);
      }



      //  echo $stmt."not getting values";
      //  print_r( $this->db); 
      $stmt->bindParam(":firstName", $firstName);


      $stmt->bindParam(":lastName", $lastName);
      $stmt->bindParam(":username", $userName);

      $passwrdHash = password_hash($password, PASSWORD_DEFAULT);

      $stmt->bindParam(":password", $password);
      // $stmt->bindParam(":password",$passwrdHash );

      $stmt->bindParam(":email_id", $emailID);
      $stmt->bindParam(":phone_number", $phoneNumber);


      $stmt->bindParam(":user_type", $userType); //

      // $stmt->bindParam(":app_name", $phoneNumber);
      $stmt->bindParam(":safety_officer_mail_id", $safety_officer_mail_id);
      $stmt->bindParam(":approval_status", $approval_status);
      // $stmt->bindParam(":mobile_type", $phoneNumber);
      $stmt->bindParam(":license_period", $license_period);
      $stmt->bindParam(":user_creation_source", $user_creation_source);
      $stmt->bindParam(":user_active_status_cart", $user_active_status_cart);
      $stmt->bindParam(":coupon_code", $user_order_id_cart);
      $stmt->bindParam(":user_order_id_cart", $coupon_code);
      $stmt->bindParam(":country_name", $country_name);
      $stmt->bindParam(":province_name", $province_name);
     
      //if()
      // print_r(json_encode($products));
      // exit;

      for ($a = 0; $a < sizeof($products); $a++) {
        // echo "enter loop";
      //  print_r($products[$a]["regulation"] . "***" . $country);
        
        if($products[$a]["regulation"]==$country){
          $product = $products[$a];
          $stmt->bindParam(":app_name", $product["appName"]);
          $stmt->bindParam(":mobile_type", $product["mobileType"]);
          $stmt->bindParam(":company_name", $product["appName"]); //$product["productName"]
          $stmt->execute();
        }
        
        // else{
        //   $product = $products[$a];
        //   $stmt->bindParam(":app_name", $product["appName"]);
        //   $stmt->bindParam(":mobile_type", $product["mobileType"]);
        //   $stmt->bindParam(":company_name", $product["appName"]); //$product["productName"]
        //   $stmt->execute();
        // }
    }

     // exit;



      // //customer licence $insert2   $stmt2
      // $insert2 = "INSERT INTO `customer_licenses` (`customer_id`, `no_of_licenses`, `valid_from`, "
      //   . "`valid_till`, `license_key`, `license_type_id`, "
      //   . "`license_session`, `type`, `gateway_check_status`, `license_status`, `deviceId`, "
      //   . "`company_name`, `companydata_id`, `userName`, `enable_username`, `app_name`, `license_temp_status`) "
      //   . "VALUES ("

      //   . ":customer_id,:no_of_licenses,:dateInString,"
      //   . ":valid_till,:license_key,:license_type_id,"
      //   . ":license_session,:type,:gateway_check_status,:license_status,:deviceId,"
      //   . ":company_name,:companydata_id,:userName,:enable_username,:app_name,:license_temp_status)";



      // if ($country == "CA")
      //   $stmt2 = $this->clientdb_ca->prepare($insert2);
      // else
      //   $stmt2 = $this->clientdb_us->prepare($insert2);
      // // print_r($stmt2);
      // // exit;
      // $stmt2->bindParam(":customer_id", $customer_id); //0
      // $stmt2->bindParam(":no_of_licenses", $totalNoOfLicensesTDG); //totalNoOfLicensesTDG
      // $stmt2->bindParam(":dateInString", $dateInString);

      // $stmt2->bindParam(":valid_till", $valid_date); //need to add date+365days
      // $stmt2->bindParam(":license_key", $license_key); //DfczpGddqZVQdRiX
      // $stmt2->bindParam(":license_type_id", $license_type_id); //3

      // $stmt2->bindParam(":license_session", $license_session); //FQLNSXKjcB6VtLgfOdXIP8M7K6Fygghl
      // $stmt2->bindParam(":type", $firstName); //"C"
      // $stmt2->bindParam(":gateway_check_status", $gateway_check_status); //"0"
      // $stmt2->bindParam(":license_status", $license_status); //1
      // $stmt->bindParam(":deviceId", $deviceId);

      // $stmt2->bindParam(":company_name", $product["appName"]);
      // $stmt2->bindParam(":companydata_id", $firstName); //sameing0
      // $stmt2->bindParam(":userName", $userName);
      // $stmt2->bindParam(":enable_username", $enable_username); //""
      // $stmt2->bindParam(":app_name", $product["appName"]);
      // $stmt2->bindParam(":license_temp_status", $license_temp_status); //1

      // $stmt2->execute();
      // // exit;
      // //  $stmt2->rowCount();
      // //  exit;
      // if ($country == "CA")
      //   echo $this->clientdb_ca->lastInsertId();
      // else
      //   echo $this->clientdb_us->lastInsertId();



      // //('0', '1', now(),
      // //DATE_ADD(now(),INTERVAL " + days +" DAY), ?, 

      // //'3', ?, 'C', '0', 
      // //'1', '', ?," + "'0',  ?,'', ?,'1'
    } catch (Exception $ex) {

      //Log the error
      echo "expection accures";

      Logger::writeMessage([
        "Type" => "ERROR",
        "Class" => "Transaction",
        "Method" => "storeDetails",
        "Description" => "Error creating transaction",
        "Exception" => "Code: " . $ex->getCode() . "; Message: " . $ex->getMessage(),
        "Data" => [
          "firstName" => $firstName,
          "lastName" => $lastName,
          "email" => $emailID,
          "phone" => $phoneNumber,
          //"address" => $address,
          // "country" => $countryName,
          // "province" => $provinceName,
          "noOfLicenses" => $totalNoOfLicenses,
          //  "taxDetails" => $taxRate,
          //  "totalPrice" => $totalPrice,
          //  "taxPrice" => $taxPrice,
          //  "selectedLanguage" => $selectedLanguage,
          //  "orderId" => $orderId,
          //  "products"=>$products,

          //  "deviceName"=>$deviceName    //ganesh
        ]
      ]);
    }



  }
}





//customer_licenses queary
// // `customer_id`,   '0' 
//  `no_of_licenses`,   '1'
//   `valid_from`,      now()
//   "\
// "`valid_till`,     DATE_ADD(now(),INTERVAL "+days+" DAY)
//  `license_key`,      ?
//   `license_type_id`, "  3
// "`license_session`,    ?
// `type`,          c
// `gateway_check_status`,   0
// license_status`,     1
// `deviceId`, "      ""
//  "`company_name`,    ?
//  `companydata_id`,    0
//   `userName`,       ?
//   `enable_username`,   ""
//    `app_name`,         ?
//     `license_temp_status`   1




