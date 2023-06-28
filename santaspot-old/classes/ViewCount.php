<?php
/********************************************************************
 * Ideabytes Software India Pvt Ltd.                                *
 * 50 Jayabheri Enclave, Gachibowli, HYD                            *
 * Created Date : 2017-11-23                                        *
 * Created By : Poorna Teja Konatham                                *
 * Project : DGMobi Landstar Payment                                *
 * Description : Handles functions related to transactions          *
 *******************************************************************/

class ViewCount
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
     * Stores page view counts
     * @param string $uniqueId 
     * @param string $ipAddress
     * @return array Associative array of rowCount, lastInsertId
     */
    public function storeViews(
        $uniqueId,
        $ipAddress
    )
    {
        try {
            $insert = "INSERT INTO `dgmobi_buynow_santas_page_views` "
                    . "(`unique_id`, "
                    . "`ip_address` "                   
                    . ") VALUES ( "
                    . ":unique_id, :ip_address)";
            
            $stmt = $this->db->prepare($insert);
            $stmt->bindParam(":unique_id", $uniqueId);
            $stmt->bindParam(":ip_address", $ipAddress);
            $stmt->execute();
            
            return [
                "rowCount" => $stmt->rowCount(),
                "lastInsertId" => $this->db->lastInsertId()
            ];
        } catch (Exception $ex) {
            //Log the error
            Logger::writeMessage([
                "Type" => "ERROR",
                "Class" => "ViewCount",
                "Method" => "storeViews",
                "Description" => "Error creating view count",
                "Exception" => "Code: " . $ex->getCode() . "; Message: " . $ex->getMessage(),
                "Data" => [
                    "unique_id" => $uniqueId,
                    "ip_address" => $ipAddress
                ]
            ]);
        }
        
        return ["rowCount" => 0];
    }
    
    
    
    
     /**
     * Get all santa's pot page views
     * @return array Array of page views objects
     */
    public function getAll()
    {
        try {
            $select = "SELECT * FROM `dgmobi_buynow_santas_page_views` order by id desc";
            
            $stmt = $this->db->prepare($select);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            //Log the error
            Logger::writeMessage([
                "Type" => "ERROR",
                "Class" => "ViewCount",
                "Method" => "getAll",
                "Description" => "Error getting details of page views",
                "Exception" => "Code: " . $ex->getCode() . "; Message: " . $ex->getMessage()
            ]);
        }
    }
	
	
	/**
     * Get all santa's pot page views
     * @return array Array of page views objects
     */
    public function getViewsToUpdate()
    {
        try {
            $select = "SELECT * FROM `dgmobi_buynow_santas_page_views` WHERE `geo_info_status` = 0 GROUP BY `ip_address`";
            
            $stmt = $this->db->prepare($select);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            //Log the error
            Logger::writeMessage([
                "Type" => "ERROR",
                "Class" => "ViewCount",
                "Method" => "getAll",
                "Description" => "Error getting details of page views",
                "Exception" => "Code: " . $ex->getCode() . "; Message: " . $ex->getMessage()
            ]);
        }
    }
	
	
	public function updateGeoInfo(){
		$viewsToUpdate = $this->getViewsToUpdate();
		
		$variable_to_echo = "";
		foreach($viewsToUpdate as $select_query_row){ 
	
			$present_ip = $select_query_row['ip_address'];		
			
			$variable_to_echo .= "processed ip = ".$present_ip."\n";
			$geoinfo = "http://api.ipinfodb.com/v3/ip-city/?key=13ebc6d8740ab89e93e615530a59dd0f22df559274089129135f83188578f84d&ip=$present_ip&format=json";
			
			$ch_geoinfo = curl_init($geoinfo); 	
			curl_setopt($ch_geoinfo, CURLOPT_HEADER, 0);         	
			curl_setopt($ch_geoinfo, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch_geoinfo, CURLOPT_MAXREDIRS, 10);
			curl_setopt($ch_geoinfo, CURLOPT_AUTOREFERER, true);
			curl_setopt($ch_geoinfo, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch_geoinfo,CURLOPT_CONNECTTIMEOUT,60);
			curl_setopt($ch_geoinfo, CURLOPT_FAILONERROR, 1);

			$execute_geoinfo = curl_exec($ch_geoinfo);
			//var_dump($execute_geoinfo);
			if(!curl_errno($ch_geoinfo)){					
				$json_geoinfo = str_replace('\\', '\\\\', $execute_geoinfo);
				$json_decode_geoinfo = json_decode($json_geoinfo, true);   
				
				$country_name = $json_decode_geoinfo["countryName"];
				$city_name = $json_decode_geoinfo["cityName"];
				$country_code = $json_decode_geoinfo["countryCode"];			
				$region = $json_decode_geoinfo["regionName"];
				$zipCode = $json_decode_geoinfo["zipCode"];
				$latitude = $json_decode_geoinfo["latitude"];
				$longitude = $json_decode_geoinfo["longitude"];
				$timeZone = $json_decode_geoinfo["timeZone"];
				
				$variable_to_echo .= "country :  ".$country_name." -------- city :  ".$city_name."\n";	

				$geo_info_status_var = 1;
				$update_q = "UPDATE `dgmobi_buynow_santas_page_views` SET `country` = :country, `region` = :region, `city` = :city, `geo_info_status` = 1 WHERE `geo_info_status` = 0 AND `ip_address` = :ip_address";
				$update_query = $this->db->prepare($update_q);
				$update_query->bindParam(":country",$country_name);
				$update_query->bindParam(":region",$region);
				$update_query->bindParam(":city",$city_name);
				$update_query->bindParam(":ip_address",$present_ip);
				
				
				try{ 
					$update_query->execute();
				}
				catch(PDOException $e){
					//return $e->getMessage();
					$e->getMessage();
				}
			}else{
				//echo "coming else---";
			}
			sleep(3);		
		}
	}
}