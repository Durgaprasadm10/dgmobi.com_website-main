<?php
/* Connect to a MySQL database using driver invocation */
$dbHost= "ideabytesdb.c6hujshgwzfd.us-east-1.rds.amazonaws.com";
$dbName = "cmadmin_dgsms_analytics";
$userName = 'cmadmin_dev';
$password = 'CmAdmin123';

$dsn = 'mysql:dbname='.$dbName.';host='.$dbHost;


try {
    $dbCon = new PDO($dsn, $userName, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
