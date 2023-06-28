<?php

/* * ******************************************************************
 * Ideabytes Software India Pvt Ltd.                                *
 * 50 Jayabheri Enclave, Gachibowli, HYD                            *
 * Created Date : 2017-11-23                                        *
 * Created By : Poorna Teja Konatham                                *
 * Project : DGMobi Landstar Payment                                *
 * Description : Saves PayPal response and sends data through       *
 *      service call to main server.                                *
 * ***************************************************************** */

require_once 'init.php';


const DB_HOST = "ideabytesdb.c6hujshgwzfd.us-east-1.rds.amazonaws.com"; //Host name
const DB_NAME = "dgmobi_buynow"; //Database name
const DB_USERNAME = "dgmobi_buy"; //User name
const DB_PASSWORD = "&(buy_dgmobi)&"; //Password

$email = $_REQUEST['email'];

try {

    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USERNAME, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


    $select = "SELECT count(*) as cnt FROM `dgmobi_buynow_registration_info` where dgmobi_buynow_email = '$email' and dgmobi_buynow_status=1";



    $stmt = $db->prepare($select);
    $stmt->execute();

    $result = $stmt->fetchObject();

    if ($result->cnt > 0) {
        echo "exists";
    } else {
        echo "not exists";
    }

//print_r($result);
} catch (PDOException $ex) {

    print_r($ex);
    //Log the error
    Logger::writeMessage([
        "Type" => "ERROR",
        "Class" => "Product",
        "Method" => "getAll",
        "Description" => "Error getting details of products",
        "Exception" => "Code: " . $ex->getCode() . "; Message: " . $ex->getMessage()
    ]);
}
?>
