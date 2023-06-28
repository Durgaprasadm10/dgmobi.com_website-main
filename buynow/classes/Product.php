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
    public function getAll() {   
    
        try {
            $select = "SELECT * FROM `dgmobi_buynow_product_info` where dgmobi_buynow_isactive=1";
            
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

    public function getAll1()  {
        try {
            $select = "SELECT * FROM `dgmobi_buynow_product_info` where dgmobi_buynow_isactive=2";
            
            $stmt = $this->db->prepare($select);
            $stmt->execute();
            print_r( $stmt);
        exit;
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
        
    //    //echo 123;
       
    //     // if($device_name=="android"){
    //     //    $deviceName=0;

    //     // }
    //     // else{
    //     //     $deviceName=1;   

    //     // }    

    //     // if($country=="USA"){
    //     //     $countryName="US";

    //     // }   
    //     // else{
    //     //     $countryName="CA";   
   
    //     // }  
        
        
    //     try {
    //         $select = "SELECT * FROM `dgmobi_buynow_product_info_dgmobi` where `dgmobi_buynow_isactive`=0 
    //         && `dgmobi_buynow_product_device_id` = '".$deviceName."' &&
    //         `dgmobi_buynow_product_country` = '".$countryName."' ";
            
    //         $stmt = $this->db->prepare($select);
    //         // print_r($stmt);
    //         // exit;
    //         $stmt->execute();
            
    //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     } catch (PDOException $ex) {
    //         //Log the error
    //         Logger::writeMessage([
    //             "Type" => "ERROR",
    //             "Class" => "Product",
    //             "Method" => "getAll",
    //             "Description" => "Error getting details of products",
    //             "Exception" => "Code: " . $ex->getCode() . "; Message: " . $ex->getMessage()
    //         ]);
    //     }
    }

    /**
     * Get all products based on country and mobiletype
     * @return array Array of product objects
     */
    public function getAllProducts()
    {
        try {



            $select = "SELECT * FROM `shoppingcart_products` where active=1";
            
            $stmt = $this->db->prepare($select);
            // print_r($stmt);
            // exit;
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
