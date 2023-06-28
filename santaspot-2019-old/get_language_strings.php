<?php
/********************************************************************
 * Ideabytes Software India Pvt Ltd.                                *
 * 50 Jayabheri Enclave, Gachibowli, HYD                            *
 * Created Date : 2017-11-23                                        *
 * Created By : Poorna Teja Konatham                                *
 * Project : DGMobi Landstar Payment                                *
 * Description : Gets language strings from database                *
 *******************************************************************/

require_once 'init.php';

$langStringsHandler = new LanguageStrings();
$languageStrings = $langStringsHandler->getAll();

if ($languageStrings) {
    $temp = [];

    foreach ($languageStrings as $languageString) {
        $temp[$languageString->dgmobi_buynow_string_key] = [
            "english" => $languageString->dgmobi_buynow_string_english,
            "french" => $languageString->dgmobi_buynow_string_french,
            "spanish" => $languageString->dgmobi_buynow_string_spanish
        ];
    }

    header("Content-Type: application/json; charset=utf-8");
    echo json_encode($temp);
} else {
    echo "No data";
}