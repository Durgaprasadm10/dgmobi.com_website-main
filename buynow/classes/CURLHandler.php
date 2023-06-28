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
    public function sendJSONInPOST($url, $passstring)
    {
    // print_r(($url));
    // exit;
    //echo $url . $JSONString;

      $postRequest = curl_init();
        $options = array(
            CURLOPT_URL => $url, 
       
            CURLOPT_POST => TRUE,
            CURLOPT_POSTFIELDS => $passstring,
            CURLOPT_RETURNTRANSFER => TRUE,
          //  CURLOPT_TIMEOUT => 40000
          ini_set('max_execution_time', 3000)
        );
        
        $headers = array(
            'Content-type: text/plain'
        );

        curl_setopt_array($postRequest, $options); //Set options for cURL transfer
        curl_setopt($postRequest, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($postRequest); //Execute cURL session

      //  print_r($response);
         curl_close($postRequest); //Close cURL session
        return $response;
    }


    
}