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
//if (isset($_POST["unique_id"])) {
    //Decode JSON string to associative array
   $data = json_decode($_POST["data"], TRUE);
   // $selectedLanguage = (isset($_POST["language"])) ? $_POST["language"] : "english";
    
    if (!$data) {
        die("fail");
    }
    
    //$orderId                    = $data["orderId"];
     $uniqueId = $data["unique_id"];
     $ipAddress = (@$_SERVER['REMOTE_ADDR'] != "") ? @$_SERVER['REMOTE_ADDR'] : "";
    
    //Store details in db
    $viewHandler = new ViewCount();
    $inserted = $viewHandler->storeViews(
        $uniqueId,
        $ipAddress
    );
    
    //If details are inserted
    if ($inserted["rowCount"]) {
        echo "success";
    } else {
        echo "fail";
    }
} else {
    echo "invalid-data";
}