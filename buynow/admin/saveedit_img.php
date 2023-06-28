<?php

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

/*if ($_SERVER['REQUEST_METHOD'] != 'PUT') {
	header("HTTP/1.0 405 Method Not Allowed"); 
	//include 'custom-msg.php';
	die; 
}*/

$db = Database::getInstance();

$json = file_get_contents('php://input');



// Converts it into a PHP object
$data = json_decode($json, TRUE);
$banner_name = $data['banner_name'];
$banner_description = $data['banner_description'];
$banner_id = $data['banner_id'];
$imagetype = imagetype($data['banner_imagepath']);
$dt=date('YmdHis');
$outputfile = "../images/".$banner_name.$dt.".".$imagetype;

$imagefile = "images/".$banner_name.$dt.".".$imagetype;

base64_to_jpeg($data['banner_imagepath'], $outputfile);


//$query = "insert into santa_banner (banner_name, banner_description, banner_imagepath) values(:name, :desc, :path)";
$query = "update santa_banner set banner_name=:name, banner_description=:desc, banner_imagepath=:path where banner_id=:id";
$stmt = $db->prepare($query);
$stmt->bindParam(":name", $banner_name);
$stmt->bindParam(":desc", $banner_description);
$stmt->bindParam(":path", $imagefile);
$stmt->bindParam(":id", $banner_id);
if($stmt->execute()){
	echo "{\"data\":\"success\", \"status\":\"00\"}";
}else {
	echo "{\"data\":\"failed\", \"status\":\"11\"}";
}
            



