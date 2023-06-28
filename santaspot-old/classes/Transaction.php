<?php
/********************************************************************
 * Ideabytes Software India Pvt Ltd.                                *
 * 50 Jayabheri Enclave, Gachibowli, HYD                            *
 * Created Date : 2017-11-23                                        *
 * Created By : Poorna Teja Konatham                                *
 * Project : DGMobi Landstar Payment                                *
 * Description : Handles functions related to transactions          *
 *******************************************************************/

class Transaction
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
     * Generates unique Id
     * @return string Unique Id
     */
    public function generateOrderId()
    {
        return uniqid();
    }
    
    
    
    /**
     * Returns count for Santa's bag
     * @return int Count for Santa's bag
     */
    public function getSantasBagValue()
    {
	$year = date('Y');
        try {
/*            $select = "SELECT SUM(`dgmobi_buynow_no_of_licenses`) AS `bag_count` "
                    . "FROM `dgmobi_buynow_registration_info` "
                    . "WHERE `dgmobi_buynow_status` = 1 and YEAR(dgmobi_buynow_created_on) in ($year)";
	    
	    $select .= "dgmobi_buynow_email not like '%ideabytes.com'";
*/

	    $select = "SELECT count(`dgmobi_buynow_registration_id`) AS `bag_count` "
                    . "FROM `dgmobi_buynow_registration_info` "
                    . "WHERE `dgmobi_buynow_status` = 1 and YEAR(dgmobi_buynow_created_on) in ($year)";
	    
	    $select .= "dgmobi_buynow_email not like '%ideabytes.com'";

//$select .= " and month(dgmobi_buynow_created_on) >= 11 and ";

            $stmt = $this->db->prepare($select);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (Exception $ex) {
            //Log the error
            Logger::writeMessage([
                "Type" => "ERROR",
                "Class" => "Transaction",
                "Method" => "getSantasBagValue",
                "Description" => "Error getting count for santa's bag",
                "Exception" => "Code: " . $ex->getCode() . "; Message: " . $ex->getMessage()
            ]);
        }
        
        return 0;
    }
    
    
    
    /**
     * Stores registration details
     * @param string $orderId Order Id
     * @param int $totalNoOfLicenses Total number of licenses
     * @param float $totalPriceWithTax Total price with tax
     * @param string $taxRate Tax rates
     * @param float $taxPrice Tax price
     * @param string $phone Phone number
     * @param string $firstName First name
     * @param string $lastName Last name
     * @param string $email Email
     * @param string $countryName Country name
     * @param string $provinceName Province name
     * @param string $address Address
     * @return array Associative array of rowCount, lastInsertId
     */
    public function storeDetails(
        $orderId,
        $totalNoOfLicenses,
        $totalPriceWithTax, 
        $taxRate, 
        $taxPrice, 
        $phone, 
        $firstName, 
        $lastName, 
        $email, 
        $countryName, 
        $provinceName, 
        $address,
        $selectedLanguage
    )
    {
        try {
            $insert = "INSERT INTO `dgmobi_buynow_registration_info` "
                    . "(`dgmobi_buynow_first_name`, "
                    . "`dgmobi_buynow_last_name`, "
                    . "`dgmobi_buynow_email`, "
                    . "`dgmobi_buynow_phone_number`, "
                    . "`dgmobi_buynow_address`, "
                    . "`dgmobi_buynow_country`, "
                    . "`dgmobi_buynow_province`, "
                    . "`dgmobi_buynow_no_of_licenses`, "
                    . "`dgmobi_buynow_tax_details`, "
                    . "`dgmobi_buynow_total_cost`, "
                    . "`dgmobi_buynow_tax_price`, "
                    . "`dgmobi_buynow_selected_lang`, "
                    . "`dgmobi_buynow_paypal_order_id` "
                    . ") VALUES ( "
                    . ":firstName, :lastName, :email, :phone, :address, :country, "
                    . ":province, :noOfLicenses, :taxDetails, :totalPrice, :taxPrice, "
                    . ":selectedLanguage, :orderId )";
            
            $stmt = $this->db->prepare($insert);
            $stmt->bindParam(":firstName", $firstName);
            $stmt->bindParam(":lastName", $lastName);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":address", $address);
            $stmt->bindParam(":country", $countryName);
            $stmt->bindParam(":province", $provinceName);
            $stmt->bindParam(":noOfLicenses", $totalNoOfLicenses);
            $stmt->bindParam(":taxDetails", $taxRate);
            $stmt->bindParam(":totalPrice", $totalPriceWithTax);
            $stmt->bindParam(":taxPrice", $taxPrice);
            $stmt->bindParam(":selectedLanguage", $selectedLanguage);
            $stmt->bindParam(":orderId", $orderId);
            $stmt->execute();
            
            return [
                "rowCount" => $stmt->rowCount(),
                "lastInsertId" => $this->db->lastInsertId()
            ];
        } catch (Exception $ex) {
            //Log the error
            Logger::writeMessage([
                "Type" => "ERROR",
                "Class" => "Transaction",
                "Method" => "storeDetails",
                "Description" => "Error creating transaction",
                "Exception" => "Code: " . $ex->getCode() . "; Message: " . $ex->getMessage(),
                "Data" => [
                    "firstName" => $firstName,
                    "lastName" => $lastName,
                    "email" => $email,
                    "phone" => $phone,
                    "address" => $address,
                    "country" => $countryName,
                    "province" => $provinceName,
                    "noOfLicenses" => $totalNoOfLicenses,
                    "taxDetails" => $taxRate,
                    "totalPrice" => $totalPriceWithTax,
                    "taxPrice" => $taxPrice,
                    "selectedLanguage" => $selectedLanguage,
                    "orderId" => $orderId
                ]
            ]);
        }
        
        return ["rowCount" => 0];
    }
    
    
    
    /**
     * Stores cart items
     * @param int $registrationId Registration Id
     * @param int $productId Product Id
     * @param int $noOfLicenses Number of licenses for each product
     * @param float $totalPrice Total price
     * @return array Associative array of rowCount, lastInsertId
     */
    public function storeCartItems($registrationId, $productId, $noOfLicenses, $totalPrice)
    {
        try {
            $insert = "INSERT INTO `dgmobi_buynow_products_in_cart` "
                    . "(`dgmobi_buynow_reg_id`, "
                    . "`dgmobi_buynow_product_id`, "
                    . "`dgmobi_buynow_no_of_licenses`, "
                    . "`dgmobi_buynow_product_cost` "
                    . ") VALUES ("
                    . ":regId, :productId, :noOfLicenses, :totalPrice"
                    . ")";

            $stmt = $this->db->prepare($insert);
            $stmt->bindParam(":regId", $registrationId);
            $stmt->bindParam(":productId", $productId);
            $stmt->bindParam(":noOfLicenses", $noOfLicenses);
            $stmt->bindParam(":totalPrice", $totalPrice);
            $stmt->execute();

            return [
                "rowCount" => $stmt->rowCount(),
                "lastInsertId" => $this->db->lastInsertId()
            ];
        } catch (Exception $ex) {
            //Log the error
            Logger::writeMessage([
                "Type" => "ERROR",
                "Class" => "Transaction",
                "Method" => "storeCartItems",
                "Description" => "Error inserting cart items in products_in_cart table",
                "Exception" => "Code: " . $ex->getCode() . "; Message: " . $ex->getMessage(),
                "Data" => [
                    "registrationId" => $registrationId,
                    "productId" => $productId,
                    "noOfLicenses" => $noOfLicenses,
                    "totalPrice" => $totalPrice
                ]
            ]);
        }
        
        return ["rowCount" => 0];
    }
    
    
    
    /**
     * Updates PayPal status
     * @param string $orderId Order Id
     * @param int $status Status 0:Pending; 1:Completed; 2:Failed
     * @param string $paypalTransactionId PayPal transaction Id
     * @param string $paypalResponse Response from PayPal
     * @return int Updated rows count
     */
    public function updatePayPalStatus($orderId, $status, $paypalTransactionId, $paypalResponse)
    {
        try {
            $update = "UPDATE `dgmobi_buynow_registration_info` "
                    . "SET `dgmobi_buynow_status` = :status, "
                    . "`dgmobi_buynow_paypal_tx_id` = :paypalTransactionId, "
                    . "`dgmobi_buynow_paypal_response` = :paypalResponse "
                    . "WHERE `dgmobi_buynow_paypal_order_id` = :orderId";
            
            $stmt = $this->db->prepare($update);
            $stmt->bindParam(":status", $status);
            $stmt->bindParam(":paypalTransactionId", $paypalTransactionId);
            $stmt->bindParam(":paypalResponse", $paypalResponse);
            $stmt->bindParam(":orderId", $orderId);
            $stmt->execute();
            
            return  $stmt->rowCount();
        } catch (Exception $ex) {
            //Log the error
            Logger::writeMessage([
                "Type" => "ERROR",
                "Class" => "Transaction",
                "Method" => "updatePayPalStatus",
                "Description" => "Error updating paypal status",
                "Exception" => "Code: " . $ex->getCode() . "; Message: " . $ex->getMessage(),
                "Data" => [
                    "status" => $status,
                    "paypalTransactionId" => $paypalTransactionId,
                    "paypalResponse" => $paypalResponse,
                    "orderId" => $orderId
                ]
            ]);
        }
        
        return 0;
    }
    
    
    
    /**
     * Get transaction info by order id
     * @param string $orderId Order Id
     * @return array Associative array of transaction details
     */
    public function getTransactionInfoByOrderId($orderId)
    {
        try {
            $select = "SELECT * FROM `dgmobi_buynow_registration_info` "
                    . "WHERE `dgmobi_buynow_paypal_order_id` = :orderId LIMIT 1";
            
            $stmt = $this->db->prepare($select);
            $stmt->bindParam(":orderId", $orderId);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            //Log the error
            Logger::writeMessage([
                "Type" => "ERROR",
                "Class" => "Transaction",
                "Method" => "getTransactionInfoByOrderId",
                "Description" => "Error fetching transaction info based on order Id",
                "Exception" => "Code: " . $ex->getCode() . "; Message: " . $ex->getMessage(),
                "Data" => ["orderId" => $orderId]
            ]);
        }
        
        return FALSE;
    }
    
    
    
    /**
     * Get products list in the cart by transaction id
     * @param int $transactionId Transaction Id
     * @return array Array of products in cart
     */
    public function getCartItemsByTransactionId($transactionId)
    {
        try {
            $select = "SELECT * FROM `dgmobi_buynow_products_in_cart` `cart` "
                    . "JOIN `dgmobi_buynow_product_info` `product` "
                    . "ON `cart`.`dgmobi_buynow_product_id` = `product`.`dgmobi_buynow_product_id` "
                    . "WHERE `dgmobi_buynow_reg_id` = :transactionId";
            
            $stmt = $this->db->prepare($select);
            $stmt->bindParam(":transactionId", $transactionId);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            //Log the error
            Logger::writeMessage([
                "Type" => "ERROR",
                "Class" => "Transaction",
                "Method" => "getCartItemsByTransactionId",
                "Description" => "Error fetching products list in cart based on transaction Id",
                "Exception" => "Code: " . $ex->getCode() . "; Message: " . $ex->getMessage(),
                "Data" => ["transactionId" => $transactionId]
            ]);
        }
    }
}
