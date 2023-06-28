<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Servername for finding the host and keep credentials accordingly
 */
//$_SERVER['HTTP_HOST']
$hostname = filter_input(INPUT_SERVER, 'HTTP_HOST', FILTER_SANITIZE_STRING);

if ($hostname == "www.dgdox.com" || $hostname == "dgdox.com") {
    $website = 'dgdox';
} else if ($hostname == "www.dgvff.com" || $hostname == "dgvff.com") {
    $website = 'dgvff';
} else if ($hostname == "www.dgsms.ca" || $hostname == "dgsms.ca") {
    $website = 'dgsms';
} else if($hostname == "www.dgmobi.com" || $hostname == "dgmobi.com"){
    $website = "dgmobi";
} else if($hostname == "localhost"){
    $website = "localhost";
}

define("WEBSITE_HOST", $website);
define("REDIRECTION_HOST", $hostname);

$servername = filter_input(INPUT_SERVER, 'SERVER_NAME', FILTER_SANITIZE_STRING);
if ($servername != "localhost") {
    define("PROJECT_NAME", "dgtrucktrack");
    define("LOG_PATH", "/home/dgtruck-click/");
    
    
    define("DB_HOST", "ideabytesdb.c6hujshgwzfd.us-east-1.rds.amazonaws.com");
    define("DB_NAME", "dgtruck_info");
    define("DB_USER", "dgtruck_info");
    define("DB_PASSWORD", "&(info_dgtruck)&");
    

//define("REDIRECT_ADDR", "https://www.dgcheck.com/#/pages/dashboard");
//    define("REDIRECT_ADDR", "http://www.dgdox.com");
    define("USER_EMAIL", "support@dgsmsusa.com");
    define("USER_PASSWORD", "Jump4Life!");
    
    
} else {
    define("PROJECT_NAME", "dgtruck_clicks");
    define("LOG_PATH", "logs");
    define("DB_HOST", "localhost");
    define("DB_NAME", "dgtruck_clicks");
    define("DB_USER", "root");
    define("DB_PASSWORD", "Ideabytes@123");
    //define("REDIRECT_ADDR", "https://www.dgcheck.com/#/pages/dashboard");
//    define("REDIRECT_ADDR", "http://www.dgdox.com");
    define("USER_EMAIL", "kishore.putrevu@ideabytes.com");
    define("USER_PASSWORD", "");
}
