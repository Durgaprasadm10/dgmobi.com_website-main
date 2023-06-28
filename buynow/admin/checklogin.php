<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS, PATCH, DELETE');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Authorization, Content-Type, x-xsrf-token, x_csrftoken, Cache-Control, X-Requested-With');
require_once "Database.php";


$db = Database::getInstance();

$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json, TRUE);

$username = $data['username'];
$password = $data['password'];

if(strlen(trim($username))==0){
	echo '{"data":"username required", "status":"11"}';
}
if(strlen(trim($password))==0){
	echo '{"data":"password required", "status":"11"}';
}


$query = "select * from dgmobi_user_login where user_name = :username";
$stmt = $db->prepare($query);
$stmt->bindParam(":username", $username);
$stmt->execute();
$result = $stmt->fetchObject();
if($stmt->rowCount()>0){
	if(password_verify($password,$result->user_password)){
		unset($result->user_password);
		$rs = json_encode($result);
		echo '{"data":'.$rs.', "status":"00"}';
	}else{
		echo '{"data":"Invalid Credentials", "status":"11"}';
	}
}else {
	echo '{"data":"Invalid Credentials", "status":"11"}';
}
