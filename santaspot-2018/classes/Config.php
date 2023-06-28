<?php
/********************************************************************
 * Ideabytes Software India Pvt Ltd.                                *
 * 50 Jayabheri Enclave, Gachibowli, HYD                            *
 * Created Date : 2017-11-23                                        *
 * Created By : Poorna Teja Konatham                                *
 * Project : DGMobi Landstar Payment                                *
 * Description : Handles configuration details                      *
 *******************************************************************/

// changes made in env, project path and site url  on 5-11-2018 for test kishore
// changes in init file also made basedirectory url for testing

class Config
{
    // Environmnet
    const DEV_ENV = "development"; //development environment
    const TEST_ENV = "test"; //test environment
    const PROD_ENV = "production"; //production environment
    
    const CURRENT_ENV = self::PROD_ENV; //current environment
    
    const SHOW_ERRORS = FALSE; //Display errors on webpage
    
    const SITE_URL = "http://dgmobi.com/santaspot/"; //Website main URL production url
    
//    const SITE_URL = "http://testsite.dgmobi.com/santaspot/"; //Website main URL test url
    //
//    const SITE_URL = "http://localhost/santaspot/"; //Website main URL local url
    
    // Paths.
    const PROJECT_PATH = "/var/www/dgsmsca.com/dgmobi/santaspot/"; //Project path production
    
//    const PROJECTPROD_ENV_PATH = "/var/www/html/santaspot/"; //Project path Local path
    
//    const PROJECT_PATH = "/var/www/testdgmobi/santaspot/"; //Project path Test path
    
    
    const LOGS_PATH = self::PROJECT_PATH . "logs/"; //Logs path
    const DB_LOGS_PATH = self::LOGS_PATH . "database/"; //Database logs path

    //Database details Production


    const DB_HOST = "ideabytesdb.c6hujshgwzfd.us-east-1.rds.amazonaws.com"; //Host name    
    const DB_USERNAME = "dgmobi_buy"; //User name
    const DB_PASSWORD = "&(buy_dgmobi)&"; //Password
    const DB_NAME = "dgmobi_buynow"; //Database name


/*
    //Database details test

    const DB_HOST = "ideabytesdb.c6hujshgwzfd.us-east-1.rds.amazonaws.com"; //Host name
    const DB_NAME = "dgmobi_buynow_test"; //Database name
    const DB_USERNAME = "dgmobi_buy_test"; //User name
    const DB_PASSWORD = "dgmobi_buy_test"; //Password
*/

    //Database details local
/*
    const DB_HOST = "localhost"; //Host name
    const DB_NAME = "dgmobi_buynow"; //Database name
    const DB_USERNAME = "kishore"; //User name
    const DB_PASSWORD = "Ideabytes@123"; //Password
*/
    //PayPal details
    const PAYPAL_LIVE_LINK = "https://www.paypal.com/cgi-bin/webscr";
    const PAYPAL_LIVE_ID = "paypal@ideabytes.com";
    const PAYPAL_SANDBOX_LINK = "https://www.sandbox.paypal.com/cgi-bin/webscr";
    const PAYPAL_SANDBOX_ID = "dgmobitestmerchant@gmail.com";
    const PAYPAL_RETURN_URL = self::SITE_URL . "success.php";
    const PAYPAL_CANCEL_URL = self::SITE_URL . "cancel.php";
    
    //Service Calls Links
    const US_BASE_API_URL_DEV = "http://192.168.1.49/DGSMS_US_WS_SERVER_BETA";
    const CA_BASE_API_URL_DEV = "http://192.168.1.49/DGSMS_CA_WS_SERVER";
    const US_BASE_API_URL_TEST = "http://dgapptest.dgsmsusa.com";
    const CA_BASE_API_URL_TEST = "http://dgapptest.dgsms.ca";
    const US_BASE_API_URL_PROD = "http://dgapp.dgsmsusa.com";
    const CA_BASE_API_URL_PROD = "http://dgapp.dgsms.ca";

    const GET_COUNTRY_DETAILS_API = "/api/mobile/new/getcountryandprovincedetails.json";
    const GET_TAX_DETAILS_API = "/api/new/web/taxinfo.json";

    const SEND_REG_DETAILS_API_URL = "/api/new/web/insertuserandlicenseinformation.json";
}
