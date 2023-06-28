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
    public function getBannerImage()
    {
	$year = date('Y');
        try {

	    $select = "SELECT * from santa_banner order by banner_id desc limit 1";
//echo $select;
//$select .= " and month(dgmobi_buynow_created_on) >= 11 and ";

            $stmt = $this->db->prepare($select);
            $stmt->execute();
		if($stmt->rowCount()>0)
            		return $stmt->fetchObject();
		else
			return null;
        } catch (Exception $ex) {
            //Log the error
            Logger::writeMessage([
                "Type" => "ERROR",
                "Class" => "Transaction",
                "Method" => "getBannerImage",
                "Description" => "Error santa banner image",
                "Exception" => "Code: " . $ex->getCode() . "; Message: " . $ex->getMessage()
            ]);
        }
        
        return 0;
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
                    . "WHERE `dgmobi_buynow_status` = 1 ";
$select .= " and date(dgmobi_buynow_created_on) > '2020-11-15' and ";
//and YEAR(dgmobi_buynow_created_on) in ($year) and MONTH(dgmobi_buynow_created_on)>11 and ";
	    
	    $select .= "dgmobi_buynow_email not like '%ideabytes.com'";
//echo $select;
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
        $phone, 
        $firstName, 
        $lastName, 
        $email,
        $selectedLanguage,                
        $username,
        $products,
        $totalPrice,
        $password
  //  $deviceName //ganesh
    )
    {
       
        try {
               //creating SQL statement
                $insert="INSERT INTO `online_shoppingdata`"
                ."(`user_first_name`,"
                ."`user_last_name`,"
                ."`user_name`,"
                ."`password`,"
                ."`no_licences`,"
                ."`total_price`,"
                ."`email`,"
                ."`product_list`,"
                ."`phone_number`,"
                ."`paypal_transactionid`,"
                ."`selected_language`"

                .") VALUES ( "
                .":firstName,:lastName,:username,:password,:noOfLicenses,:totalPrice,:email,:products,:phone,:orderId,:selectedLanguage)";
              
                 
            $stmt = $this->db->prepare($insert);
          //  echo $stmt."not getting values";
              
           $stmt->bindParam(":firstName", $firstName);
            
           
            $stmt->bindParam(":lastName", $lastName);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);

            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":phone", $phone);
           // $stmt->bindParam(":address", $address);
           // $stmt->bindParam(":country", $countryName);
           // $stmt->bindParam(":province", $provinceName);
           if($stmt->bindParam(":noOfLicenses", $totalNoOfLicenses)){
           // echo "bind licence succesfull";
           }
           else{
            echo "bind licence faild";
           }
           
           // $stmt->bindParam(":taxDetails", $taxRate);
           if($stmt->bindParam(":totalPrice", $totalPrice)){
           // echo "bind total price succes";
           }
           else{
            echo "bind total price faild";
           }
           // $stmt->bindParam(":taxPrice", $taxPrice);
            $stmt->bindParam(":selectedLanguage", $selectedLanguage);
            if($stmt->bindParam(":products",$products)){
              //  echo "product bind\n";
               // echo $products;
            }
            else{
               // echo "product not bind\n";

               // echo $products;
            }
            $stmt->bindParam(":orderId",$orderId);
            
           

          //  $stmt->bindParam(":deviceName", $deviceName);   //added ganesh
            
            if($stmt->execute()){
                echo ("cart details stored in database successfully|total_price|".$totalPrice);
               // echo ($totalPrice);
               // "rowCount" = $stmt->rowCount();
                
              //  echo $stmt->rowCount();
              // echo "\n";
               // echo $this->db->lastInsertId();
            }
            else{
              //  echo "execution failed";
                echo "Cart details not stored in database successfully";
            }
          
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
                    //"address" => $address,
                   // "country" => $countryName,
                   // "province" => $provinceName,
                    "noOfLicenses" => $totalNoOfLicenses,
                  //  "taxDetails" => $taxRate,
                    "totalPrice" => $totalPrice,
                  //  "taxPrice" => $taxPrice,
                    "selectedLanguage" => $selectedLanguage,
                    "orderId" => $orderId,
                    "products"=>$products,

                  //  "deviceName"=>$deviceName    //ganesh
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
    public function updatePayPalStatus($orderId, $status, $paypalResponse)
    {
        
        try {    

            $update = "UPDATE `online_shoppingdata` "
                      ."SET `paypal_transaction_result` = '". $status."'"
                      .",`paypal_response` = '". $paypalResponse."'"
                      ."WHERE `paypal_transactionid` ='".$orderId."'";     
                      $stmt1 = $this->db->prepare($update);
                
            // $stmt1 = $this->db->prepare($update);
            // $stmt1->bindParam(":status", $status);
            // $stmt1->bindParam(":paypalResponse", $paypalResponse);
            // $stmt1->bindParam(":orderId", $orderId);
           
            // $stmt->bindParam(":paypalTransactionId", $paypalTransactionId);
           
            $stmt1->execute();
           
           // return  $stmt1->rowCount();
           return 2;
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
                   // "paypalTransactionId" => $paypalTransactionId,
                    "paypalResponse" => $paypalResponse,
                    "orderId" => $orderId
                ]
            ]);
            return 1;
        }
        
       // return 0;
    }
    
    
    
    /**
     * Get transaction info by order id
     * @param string $orderId Order Id
     * @return array Associative array of transaction details
     */
    public function getTransactionInfoByOrderId($orderId)
    {
      //   print_r("in transaction classs".$orderId);
        // exit;
       
        try {
            // $select = "SELECT * FROM `dgmobi_buynow_registration_info` "    by ganesh user_name
            //         . "WHERE `dgmobi_buynow_paypal_order_id` = :orderId order by dgmobi_buynow_registration_id desc LIMIT 1";
            $select ="SELECT * FROM `online_shoppingdata`"
            ."WHERE `paypal_transactionid` = '". $orderId."'";
           
            
             $stmt = $this->db->prepare($select);
             
            // $stmt->bindParam(":orderId", $orderId);
           
            $stmt->execute();
           //  print_r("after excution".$stmt->fetch(PDO::FETCH_ASSOC));  //test
            // exit;
            return $stmt->fetch(PDO::FETCH_ASSOC);
           // return true;

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
          //  return false;
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
