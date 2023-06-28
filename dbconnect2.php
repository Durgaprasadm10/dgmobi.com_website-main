<?php
/* Connect to a MySQL database using driver invocation */
$dbHost2= "ideabytesdb.c6hujshgwzfd.us-east-1.rds.amazonaws.com";
$dbName2 = "dgsms_site";
$userName2 = 'dgsms_site';
$password2 = '&(site_dgsms)&';

$dsn2 = 'mysql:dbname='.$dbName2.';host='.$dbHost2;


try {
    $dbCon2 = new PDO($dsn2, $userName2, $password2);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

function storeContacts($dbCon2, $name, $email, $phone, $interest, $message, $language){
	$query = "INSERT INTO `contact`(`name`, `email`, `phone`, `interest`, `message`, `language`) VALUES (:name, :email, :phone, :interest, :message, :language)";
	$insert_query = $dbCon2->prepare($query);
	$insert_query->bindParam(":name", $name);
	$insert_query->bindParam(":email", $email);
	$insert_query->bindParam(":phone", $phone);
	$insert_query->bindParam(":interest", $interest);
	$insert_query->bindParam(":message", $message);
	$insert_query->bindParam(":language", $language);
	$insert_query->execute();
	//print_r($dbCon2->errorInfo());
}

function storeWhitePapers($dbCon2, $name, $email, $phone, $company, $language){
	$query = "INSERT INTO `whitepapers`(`name`, `email`, `phone`, `company`, `language`) VALUES (:name, :email, :phone, :company, :language)";
	$insert_query = $dbCon2->prepare($query);
	$insert_query->bindParam(":name", $name);
	$insert_query->bindParam(":email", $email);
	$insert_query->bindParam(":phone", $phone);
	$insert_query->bindParam(":company", $company);
	$insert_query->bindParam(":language", $language);
	$insert_query->execute();
	//print_r($dbCon2->errorInfo());
}

function string_sanitize($s) {
    $result = preg_replace("/[^a-zA-Z0-9]+/", "", html_entity_decode($s, ENT_QUOTES));
    return $result;
}

?>