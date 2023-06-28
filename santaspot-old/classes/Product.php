<?php
/********************************************************************
 * Ideabytes Software India Pvt Ltd.                                *
 * 50 Jayabheri Enclave, Gachibowli, HYD                            *
 * Created Date : 2017-11-23                                        *
 * Created By : Poorna Teja Konatham                                *
 * Project : DGMobi Landstar Payment                                *
 * Description : Handles functions related to products              *
 *******************************************************************/

class Product
{
    /**
     * Stores database connection object
     * @var object Database connection object
     */
    private $db = NULL;
    
    
    
    /**
     * Get database instance on invoke
     */
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    
    
    
    /**
     * Get all products
     * @return array Array of product objects
     */
    public function getAll()
    {
        try {
            $select = "SELECT * FROM `dgmobi_buynow_product_info`";
            
            $stmt = $this->db->prepare($select);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            //Log the error
            Logger::writeMessage([
                "Type" => "ERROR",
                "Class" => "Product",
                "Method" => "getAll",
                "Description" => "Error getting details of products",
                "Exception" => "Code: " . $ex->getCode() . "; Message: " . $ex->getMessage()
            ]);
        }
    }
}