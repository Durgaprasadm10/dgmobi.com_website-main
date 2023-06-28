<?php
/********************************************************************
 * Ideabytes Software India Pvt Ltd.                                *
 * 50 Jayabheri Enclave, Gachibowli, HYD                            *
 * Created Date : 2017-11-23                                        *
 * Created By : Poorna Teja Konatham                                *
 * Project : DGMobi Landstar Payment                                *
 * Description : Handles functions related to database              *
 *******************************************************************/

class Database
{
    /**
     * Stores database connection object.
     * @var object Database connection object.
     */
    private static $db = NULL;
    private static $clientdb_ca = NULL;
    private static $clientdb_us = NULL;
    
    
    
    /**
     * Creates a database object.
     * @return object Database connection object.
     */
    private static function createInstance()
    {
        $db = NULL;

	 if (Config::CURRENT_ENV == Config::PROD_ENV) { //PRODUCTION
                $dbhost = Config::DB_HOST;
                $username = Config::DB_USERNAME;
		$password = Config::DB_PASSWORD;
		$dbname = Config::DB_NAME;            
            } else { //DEVELOPMENT
                $dbhost = Config::DB_HOST_DEV;
                $username = Config::DB_USERNAME_DEV;
		$password = Config::DB_PASSWORD_DEV;
		$dbname = Config::DB_NAME_DEV;
            }


        
        try {
            $db = new PDO(
                "mysql:host=" . $dbhost . ";dbname=" . $dbname . ";charset=utf8",$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {

            // Log the error.
           // Logger::writeDBErrors($e->getCode(), $e->getMessage());
        }
        
        return $db;
    }


     private static function createInstanceForMobileCA(){

         $clientdb_ca = NULL;
         if (Config::CURRENT_ENV == Config::PROD_ENV) { //PRODUCTION
                $dbhost = Config::DB_HOST_mobile;
                $username = Config::DB_USERNAME_mobile;
                $password = Config::DB_PASSWORD_mobile;
                 $dbname = Config::DB_NAME_mobile_ca;            
            } else { //DEVELOPMENT
                $dbhost = Config::DB_HOST_mobile_dev;
                $username = Config::DB_USERNAME_mobile_dev;
                $password = Config::DB_PASSWORD_mobile_dev;
                 $dbname = Config::DB_NAME_mobile_dev_ca; 
        }
        try {
            $clientdb_ca = new PDO(
                "mysql:host=" . $dbhost . ";dbname=" . $dbname . ";charset=utf8",$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {

            // Log the error.
          //  Logger::writeDBErrors($e->getCode(), $e->getMessage());
        }
        
        return $clientdb_ca;

     }

     private static function createInstanceForMobileUS(){

        $clientdb_us = NULL;
        if (Config::CURRENT_ENV == Config::PROD_ENV) { //PRODUCTION
               $dbhost = Config::DB_HOST_mobile;
               $username = Config::DB_USERNAME_mobile;
               $password = Config::DB_PASSWORD_mobile;
                $dbname = Config::DB_NAME_mobile_us;            
           } else { //DEVELOPMENT
               $dbhost = Config::DB_HOST_mobile_dev;
               $username = Config::DB_USERNAME_mobile_dev;
               $password = Config::DB_PASSWORD_mobile_dev;
                $dbname = Config::DB_NAME_mobile_dev_us; 
       }
       try {
           $clientdb_us = new PDO(
               "mysql:host=" . $dbhost . ";dbname=" . $dbname . ";charset=utf8",$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                );
            // echo $dbhost . "   " . $username . "    " . $password . "    " . $dbname;
            // echo "db connected";
       } catch (PDOException $e) {
            echo "db not connected"; 
           // Log the error.
         //  Logger::writeDBErrors($e->getCode(), $e->getMessage());
       }
       
       return $clientdb_us;

    }
    
    
    /**
     * Gets already existing database connection object.
     * If not exists, creates a new one.
     * @return object Database connection object.
     */
    public static function getInstance()
    {
        // If database connection not exists, create new one.
        if (self::$db == NULL) {
            self::$db = self::createInstance();
        }
        
        return self::$db;
    }

    public static function getInstanceFormobileCA()
    {
        // If database connection not exists, create new one.
        if (self::$clientdb_ca == NULL) {
            self::$clientdb_ca = self::createInstanceForMobileCA();
        }
        
        return self::$clientdb_ca;
    }
    public static function getInstanceFormobileUS()
    {
        // If database connection not exists, create new one.
        if (self::$clientdb_us == NULL) {
            self::$clientdb_us = self::createInstanceForMobileUS();
        }
        
        return self::$clientdb_us;
    }


    
    
    
    /**
     * Gets a new database connection object.
     * @return object Database connection object.
     */
    public static function getNewInstance()
    {
        return self::createInstance();
    }
}
