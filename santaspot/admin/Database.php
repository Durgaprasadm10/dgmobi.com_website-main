<?php
/********************************************************************
 * Ideabytes Software India Pvt Ltd.                                *
 * 50 Jayabheri Enclave, Gachibowli, HYD                            *
 * Created Date : 2017-11-23                                        *
 * Created By : Poorna Teja Konatham                                *
 * Project : DGMobi Landstar Payment                                *
 * Description : Handles functions related to database              *
 *******************************************************************/
include "Config.php";
class Database
{
    /**
     * Stores database connection object.
     * @var object Database connection object.
     */
    private static $db = NULL;
    
    
    
    /**
     * Creates a database object.
     * @return object Database connection object.
     */
    private static function createInstance()
    {
        $db = NULL;

/*	if (Config::CURRENT_ENV == Config::PROD_ENV) { //PRODUCTION
                $dbhost = Config::DB_HOST;
                $username = Config::DB_USERNAME;
		$password = Config::DB_PASSWORD;
		$dbname = Config::DB_NAME;            
            }else */

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
            Logger::writeDBErrors($e->getCode(), $e->getMessage());
        }
        
        return $db;
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
    
    
    
    /**
     * Gets a new database connection object.
     * @return object Database connection object.
     */
    public static function getNewInstance()
    {
        return self::createInstance();
    }
}
