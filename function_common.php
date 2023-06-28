<?php
/**
* This function will do the curl request for the given url
* @param {string} url
* @param {json} data_string
* @returns {no return value}
*/
function invokeCurl($url, $data_string){
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($data_string))
	);
	//curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	//curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);

	//execute post
	$result = curl_exec($ch);
        //uncomment starting here when debugging 
	/*       
	if(curl_errno($ch))
	{
		echo 'error:' . curl_error($ch);
	}
	if($result){
	 echo "hi true---";
	}else{
	 echo "hi false---";
	}
	echo $data_string;
	echo "<br> ------- <br>";
	echo $result;
	echo "aaa " .gettype($result);
	echo "hhh " . $result;
	exit;
        */
	//uncomment ending here when debugging 

	//close connection
	curl_close($ch);
	return $result;
}

?>