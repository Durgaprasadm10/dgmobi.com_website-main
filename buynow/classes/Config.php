<?php
/********************************************************************
 * Ideabytes Software India Pvt Ltd.                                *
 * 50 Jayabheri Enclave, Gachibowli, HYD                            *
 * Created Date : 2017-11-23                                        *
 * Created By : Poorna Teja Konatham                                *
 * Project : DGMobi Landstar Payment                                *
 * Description : Handles configuration details                      *
 *******************************************************************/

class Config
{
    // Environmnet
    const DEV_ENV = "development"; //development environment
    const TEST_ENV = "test"; //test environment
    const PROD_ENV = "production"; //production environment
    
    const CURRENT_ENV = self::PROD_ENV; //current environment
 
          
    const SHOW_ERRORS = FALSE; //Display errors on webpage
       const SITE_URL = "http://dgmobi.com/buynow/"; //Website main URL
      
    
    // Paths.
    const PROJECT_PATH = "/var/www/html/dgmobi/buynow/"; //Project path
    
    const LOGS_PATH = self::PROJECT_PATH . "logs/"; //Logs path
    const DB_LOGS_PATH = self::LOGS_PATH . "database/"; //Database logs path

    //Database details
    const DB_HOST = "ideabytesdb.c6hujshgwzfd.us-east-1.rds.amazonaws.com"; //Host name
    const DB_NAME = "dgmobi_buynow"; //Database name
    const DB_USERNAME = "dgmobi_buy"; //User name
    const DB_PASSWORD = "&(buy_dgmobi)&"; //Password

    const DB_HOST_DEV = "ideabytesdb.c6hujshgwzfd.us-east-1.rds.amazonaws.com"; //Host name
    const DB_NAME_DEV = "dgmobi_buynow_test"; //Database name
    const DB_USERNAME_DEV = "dgmobi_buy_test1"; //User name
    const DB_PASSWORD_DEV = "&(buy_dgmobi)&"; //Password

   
    const DB_HOST_mobile = "ideabytesdb.c6hujshgwzfd.us-east-1.rds.amazonaws.com"; //Host name
     const DB_NAME_mobile_ca = "dgsmsca_server_ca"; //Database name

     const DB_NAME_mobile_us = "dgsmsus_server_us";
    const DB_USERNAME_mobile = "saikumarchedrupu"; //User name
    const DB_PASSWORD_mobile = "qF7v5JVJt3XE"; //Password

    const DB_HOST_mobile_dev = "ideabytesdb.c6hujshgwzfd.us-east-1.rds.amazonaws.com"; //Host name
     const DB_NAME_mobile_dev_ca = "dgsmsca_server_ca_test"; //Database name

     const DB_NAME_mobile_dev_us = "dgsmsus_server_us_test";
    const DB_USERNAME_mobile_dev = "saikumarchedrupu"; //User name
    const DB_PASSWORD_mobile_dev = "qF7v5JVJt3XE"; //Password
    
    
    //PayPal details
    const PAYPAL_LIVE_LINK = "https://www.paypal.com/cgi-bin/webscr";
    const PAYPAL_LIVE_ID = "paypal@ideabytes.com";
    const PAYPAL_SANDBOX_LINK = "https://www.sandbox.paypal.com/cgi-bin/webscr";
    const PAYPAL_SANDBOX_ID = "dgmobitestmerchant@gmail.com";
    const PAYPAL_RETURN_URL = self::SITE_URL . "success.php"; //
    const PAYPAL_CANCEL_URL = self::SITE_URL . "cancel.php";
    
    
    //Service Calls Links
    const US_BASE_API_URL_DEV = "http://192.168.1.49/DGSMS_US_WS_SERVER_BETA";
    const CA_BASE_API_URL_DEV = "http://192.168.1.49/DGSMS_CA_WS_SERVER";
    const US_BASE_API_URL_TEST = "https://dgapptest.dgsmsusa.com";
    const CA_BASE_API_URL_TEST = "https://dgapptest.dgsms.ca";
    const US_BASE_API_URL_PROD = "http://dgapp.dgsmsusa.com";
    const CA_BASE_API_URL_PROD = "http://dgapp.dgsms.ca";

	//Do not change this (common service irrespicative of app/env/os)
    const ENCRYPT_PASSWORD = "https://dgapptest.dgsms.ca/api/new/web/encryption.json";
   

    const GET_USER_INFO = "/api/mobile/new/userinformation.json";

    const GET_COUNTRY_DETAILS_API = "/api/mobile/new/getcountryandprovincedetails.json";
    const GET_TAX_DETAILS_API = "/api/new/web/taxinfo.json";

    const SEND_REG_DETAILS_API_URL = "/api/new/web/insertuserandlicenseinformation.json";

    const  LANDSTARIOSPLAYSTOREURL="https://itunes.apple.com/in/app/dgmobi-us-landstar-bco-discount/id1168920403?mt=8";    //iOSappstorelandstarurl in serverdb preparties

    

    const DSTARPLAYSTOREURL = " https://play.google.com/store/apps/details?id=com.ideabytes.dgmobius.landstar&hl=en";
    

 // const LICENCEMSG = "License for one year.";
  const LICENCEMSG = " ";

  const CONTACT_PHONE = "1-888-409-8057  Ext: 1004 or 1005";

  const CONTACT_EMAIL = "contact@dgsmsusa.com";

  const SMTP_OUTLOOK_EMAIL = "support@dgsmsusa.com";

  const SMTP_OUTLOOK_USERNAME = "support@dgsmsusa.com";

  const SMTP_OUTLOOK_PASSWORD = "Ideabytes@123";

  const SMTP_OUTLOOK_PORT = 587;

  const OUTLOOK_SENDERNAME = "DGMOBI";

  const OUTLOOK_HOST = "outlook.office365.com";

  const LICENCE_YEAR = 1;

  const PURCHASINGMSG = "purchasing";

  const DATEPURCHASINGMSG = "purchase";

  const ANDROIDFLOWATTACHFILE = "/var/www/html/dgmobi/pdf/DGMobi_Android_App_Installation_Procedure_TDG.pdf";

  const IOSFLOWATTACHFILE="/var/www/html/dgmobi/pdf/DGMobi_iOS_App_Installation_Procedure_TDG.pdf";

  const DGMOBI_Landstar_TDG_ANDROID= "https://play.google.com/store/apps/details?id=com.ideabytes.dgsms.landstar";

  const DGMOBI_Landstar_49CFR_ANDROID = "https://play.google.com/store/apps/details?id=com.ideabytes.dgmobius.landstar";

  const DGMOBI_General_TDG_ANDROID = "https://play.google.com/store/apps/details?id=com.ideabytes.dgsms.generic";

  const DGMOBI_General_49CFR_ANDROID = "https://play.google.com/store/apps/details?id=com.ideabytes.dgmobius.generic";
  const DGMOBI_US_Xpress_49CFR_ANDROID = "https://play.google.com/store/apps/details?id=com.ideabytes.dgmobius.usxpress";

const  DGMOBI_Landstar_TDG_iOS ="https://apps.apple.com/us/app/dgmobi-ca-landstar/id1300059086";

const DGMOBI_Landstar_49CFR_iOS  ="https://apps.apple.com/us/app/dgmobi-us-landstar/id1168920403";

const DGMOBI_US_Xpress_49CFR_iOS ="https://apps.apple.com/us/app/dgmobi-us-xpress/id1391612330";

const DGMOBI_General_49CFR_iOS  ="https://apps.apple.com/in/app/dgmobi-us-generic/id1188630365";

  const DGMOBI_General_TDG_iOS = "https://apps.apple.com/us/app/dgmobi-ca-general/id1281422015";

  
  const PDF_DGMOBI_ANDROID_CA="/var/www/html/dgmobi/pdf/DGMobi_Android_App_Installation_Procedure_TDG.pdf";
  const PDF_DGMOBI_iOS_CA = "/var/www/html/dgmobi/pdf/DGMobi_iOS_App_Installation_Procedure_TDG.pdf";
  const PDF_DGMOBI_ANDROID_US="/var/www/html/dgmobi/pdf/DGMobi_Android_App_Installation_Procedure_49CFR.pdf";

  const PDF_DGMOBI_iOS_US = "/var/www/html/dgmobi/pdf/DGMobi_iOS_App_Installation_Procedure_49CFR.pdf";
}
