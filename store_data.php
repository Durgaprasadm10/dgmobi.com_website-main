<?php
include 'dbconfig.php';
$received_stream_input = file_get_contents('php://input');
$wholeData = json_encode($received_stream_input);
$requiredArray = explode("&", $received_stream_input);
$paramsArray = array();
foreach($requiredArray as $value){
	$temp = array();
	$temp = explode("=", $value);
	$paramkey = $temp[0];$paramvalue = $temp[1];
	$paramsArray[$paramkey] = $paramvalue;
}
//$orderId = $_POST["orderId"];
//$userData = $_POST["userData"];
$orderId = $paramsArray["order_Id"];
$userName = $paramsArray["username"];
//echo $orderId;
 $ordersResult = $db->query("SELECT payment_id FROM orders WHERE order_id = '".$orderId."'");

    if($ordersResult->num_rows > 0){
        $ordersRow = $ordersResult->fetch_assoc();
        $last_insert_id = $ordersRow['id'];
    }else{
        //Insert tansaction data into the database
        $insert = $db->query("INSERT INTO orders(order_id,data) VALUES('".$orderId."','".$wholeData."')");
        $last_insert_id = $db->insert_id;
    }
	//echo $orderId . " ----- " . $orderId ."your order id " . $last_insert_id;
	$a = $orderId . " ----- " . $orderId ."your order id in db" . $last_insert_id;
	header('Content-Type: application/json');
	echo json_encode($a);
	?>