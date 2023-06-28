<?php
/********************************************************************
 * Ideabytes Software India Pvt Ltd.                                *
 * 50 Jayabheri Enclave, Gachibowli, HYD                            *
 * Created Date : 2017-11-23                                        *
 * Created By : Poorna Teja Konatham                                *
 * Project : DGMobi Landstar Payment                                *
 * Description : Handles functions related to CURL                  *
 *******************************************************************/

class CURLHandler
{
    /**
     * Sends JSON string in POST request.
     * @param string $url URL.
     * @param string $JSONString JSON string.
     * @return string Response from the URL.
     */
    public function sendJSONInPOST($url, $JSONString)
    {
        // Create cURL resource.
        $postRequest = curl_init();

        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_POST => TRUE,
            CURLOPT_POSTFIELDS => $JSONString,
            CURLOPT_RETURNTRANSFER => TRUE
        );
        
        $headers = array(
            'Content-type: application/json'
        );

        curl_setopt_array($postRequest, $options); //Set options for cURL transfer
        curl_setopt($postRequest, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($postRequest); //Execute cURL session
/*	
echo $url;	
		if(curl_errno($postRequest))
	{
		echo 'error:' . curl_error($postRequest);
	}
	if($response){
	 echo "hi true---";
	}else{
	 echo "hi false---";
	}
	echo $JSONString;
	echo "<br> ------- <br>";
	echo $JSONString;
	echo "aaa " .gettype($JSONString);
	echo "hhh " . $JSONString;
*/	
        curl_close($postRequest); //Close cURL session

        return $response;
    }
}