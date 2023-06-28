<?php
//header("Access-Control-Allow-Origin: *");
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

$banner_id = $data['banner_id'];


$query = "delete from santa_banner where banner_id=:id";
$stmt = $db->prepare($query);
$stmt->bindParam(":id", $banner_id);

if($stmt->execute()){
	echo "{\"data\":\"success\", \"status\":\"00\"}";
}else {
	echo "{\"data\":\"failed\", \"status\":\"11\"}";
}
            



