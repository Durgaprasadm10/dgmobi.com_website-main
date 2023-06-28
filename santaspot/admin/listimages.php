<?php

ini_set('display_errors',true);
error_reporting(E_ALL);

//header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS, PATCH, DELETE');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Authorization, Content-Type, x-xsrf-token, x_csrftoken, Cache-Control, X-Requested-With');

require_once "Database.php";
require_once "Config.php";

function imageToBase64($image){

//$path = 'myfolder/myimage.png';
$type = pathinfo($image, PATHINFO_EXTENSION);
$data = file_get_contents($image);
return $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

}

//$db = new Database();
$db = Database::getInstance();

$qry="";
if(isset($_GET['banner_id'])){
	if(is_numeric($_GET['banner_id'])){
		$qry .= "where banner_id=".$_GET['banner_id'];
	}
}

$query = "select * from santa_banner ".$qry;
$stmt = $db->prepare($query);
$stmt->execute();



$img = array();
foreach($stmt->fetchAll(PDO::FETCH_BOTH) as $key=> $val){
	$data = array();
	//print_r($val);
	//$data['banner_imagepath'] = Config::SITE_URL."/".$val['banner_imagepath'];
	$data['banner_imagepath'] = imageToBase64("../".$val['banner_imagepath']);
	$data['banner_id'] = $val['banner_id'];
	$data['banner_description'] = $val['banner_description'];
	$data['banner_name'] = $val['banner_name'];
	$img[] = $data;
}

//print_r($img);
            
echo "{\"images\":".json_encode($img)."}";
