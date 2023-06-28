<?php
//header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS, PATCH, DELETE');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Authorization, Content-Type, x-xsrf-token, x_csrftoken, Cache-Control, X-Requested-With');
require_once "Database.php";


function base64_to_jpeg($base64_string, $output_file) {
    // open the output file for writing
    $ifp = fopen( $output_file, 'wb' ); 

    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode( ',', $base64_string );

    // we could add validation here with ensuring count( $data ) > 1
    fwrite( $ifp, base64_decode( $data[ 1 ] ) );

    // clean up the file resource
    fclose( $ifp ); 

    return $output_file; 
}

function imagetype($base64_string){
	$data = explode(',',$base64_string);
	$imgtype = explode(';',$data[0]);
	$type = explode("/",$imgtype[0]);
	return $imagetype = $type[1];
}

/*if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	header("HTTP/1.0 405 Method Not Allowed"); 
	//include 'custom-msg.php';
	die; 
}*/

$db = Database::getInstance();

$json = file_get_contents('php://input');


// Converts it into a PHP object
$data = json_decode($json, TRUE);

if(empty($data)){
	echo "{\"data\":\"invalid input\", \"status\":\"11\"}";die;
}

$banner_name = $data['banner_name'];
$banner_description = $data['banner_description'];
$imagetype = imagetype($data['banner_imagepath']);
$dt=date('YmdHis');
$outputfile = "../images/".$banner_name.$dt.".".$imagetype;

$imagefile = "images/".$banner_name.$dt.".".$imagetype;

base64_to_jpeg($data['banner_imagepath'], $outputfile);


$query = "insert into santa_banner (banner_name, banner_description, banner_imagepath) values(:name, :desc, :path)";
$stmt = $db->prepare($query);
$stmt->bindParam(":name", $banner_name);
$stmt->bindParam(":desc", $banner_description);
$stmt->bindParam(":path", $imagefile);
if($stmt->execute()){
	echo "{\"data\":\"success\", \"status\":\"00\"}";die;
}else {
	echo "{\"data\":\"failed\", \"status\":\"11\"}";die;
}
