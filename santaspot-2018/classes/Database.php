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
    
    
    
    /**
     * Creates a database object.
     * @return object Database connection object.
     */
    private static function createInstance()
    {
        $db = NULL;
        
        try {
            $db = new PDO(
                "mysql:host=" . Config::DB_HOST . ";dbname=" . Config::DB_NAME . ";charset=utf8",
                Config::DB_USERNAME,
                Config::DB_PASSWORD,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
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