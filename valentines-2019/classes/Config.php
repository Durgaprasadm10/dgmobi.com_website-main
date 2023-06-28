<?php

/* * ******************************************************************
 * Ideabytes Software India Pvt Ltd.                                *
 * 50 Jayabheri Enclave, Gachibowli, HYD                            *
 * Created Date : 2017-11-23                                        *
 * Created By : Poorna Teja Konatham                                *
 * Project : DGMobi Landstar Payment                                *
 * Description : Handles configuration details                      *
 * ***************************************************************** */

class Config {

    // Environmnet
    const DEV_ENV = "development"; //development environment
    const TEST_ENV = "test"; //test environment
    const PROD_ENV = "production"; //production environment
    const CURRENT_ENV = self::PROD_ENV; //current environment
    const SHOW_ERRORS = FALSE; //Display errors on webpage
    const SITE_URL = "https://dgmobi.com/valentines/"; //Website main URL
//const SITE_URL = "http://localhost/santaspot-2019/"; //Website main URL
    // Paths.
//    const PROJECT_PATH = "/var/www/dgsmsca.com/dgmobi/valentines/"; //Project path // old server
    const PROJECT_PATH = "/var/www/html/dgmobi/valentines/"; //Project path
    //const PROJECT_PATH = "/var/www/html/santaspot-2019/"; //Project path // santaspot
    const LOGS_PATH = self::PROJECT_PATH . "logs/"; //Logs path
    const DB_LOGS_PATH = self::LOGS_PATH . "database/"; //Database logs path
    //Database details
    const DB_HOST = "ideabytesdb.c6hujshgwzfd.us-east-1.rds.amazonaws.com"; //Host name
    const DB_NAME = "dgmobi_buynow"; //Database name
    const DB_USERNAME = "dgmobi_buy"; //User name
    const DB_PASSWORD = "&(buy_dgmobi)&"; //Password
    const DB_HOST_DEV = "ideabytesdb.c6hujshgwzfd.us-east-1.rds.amazonaws.com"; //Host name
    const DB_NAME_DEV = "dgmobi_buynow_test"; //Database name
    const DB_USERNAME_DEV = "kishore"; //User name
    const DB_PASSWORD_DEV = "kishore"; //Password
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
    const GET_USER_INFO = "/api/mobile/new/userinformation.json";
    const GET_COUNTRY_DETAILS_API = "/api/mobile/new/getcountryandprovincedetails.json";
    const GET_TAX_DETAILS_API = "/api/new/web/taxinfo.json";

    /*
     *  santaspot
      const SEND_REG_DETAILS_API_URL = "/api/new/web/insertuserandlicenseinformation.json";
     */

    /*
     * valentines day
     */
    const SEND_REG_DETAILS_API_URL = "/api/new/web/other/insertuserandlicenseinformation.json";
    const andriodDeviceOptionText = "Android";
    const iosDeviceOptionText = "Apple-iOS";
    const andriodDeviceOptionValue = "andriod";
    const iosDeviceOptionValue = "ios";
    const cfrUsaOptionText = "49 CFR - USA";
    const tdgCaOptionText = "TDG - CANADA";
    const cfrUsaOptionValue = "1";
    const tdgCaOptionValue = "2";
    const getProductsForDispalyApi = "/api/mobile/new/displayappnameandcostinformation.json";

}
