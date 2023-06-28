<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'dbconfig.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
define("USER_EMAIL", "dgmarketing@ideabytes.com");
define("USER_PASSWORD", "96:DGm11?!");

// Upload Your Picture with Truck -> path /dgmobi/images/uploads
if (($_FILES['truck_pic_upload']['name'] != "")) {

    $uploaddir = dirname(__FILE__) . "/images/uploads/";
    $uploadfile = $uploaddir . basename($_FILES['truck_pic_upload']['name']);


    if (move_uploaded_file($_FILES['truck_pic_upload']['tmp_name'], $uploadfile)) {
        // echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Upload failed";
    }

//    echo "</p>";
//    echo '<pre>';
//    echo 'Here is some more debugging info:';
//    print_r($_FILES);
//    print "</pre>";
}

//Form Data Fields

$regDate = $_POST['date_of_entry'];
$name = $_POST['name_of_contestor'];
$age = $_POST['age_of_contestor'];
$country = $_POST['country'];
$province = $_POST['province'];
$city = $_POST['city'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$carrer = $_POST['carrer'];
$company = $_POST['company'];
$imgUrl = $uploadfile;
$skill_test = $_POST['skill_test'];

//Saving Data into DB
$query = "INSERT INTO `saveContestData`(`reg_date`,`name`, `age`,`country`,`province`,`city`,`email`, `phone_number`,`carrer`,`company_name`,`img_url`,`skill_test`) VALUES (:date,:name,:age,:country,:province,:city,:email,:phone,:carrer,:company,:imgUrl,:skillTest )";
$insert_query = $dbCon2->prepare($query);
$insert_query->bindParam(":date", $regDate);
$insert_query->bindParam(":name", $name);
$insert_query->bindParam(":age", $age);
$insert_query->bindParam(":country", $country);
$insert_query->bindParam(":province", $province);
$insert_query->bindParam(":city", $city);
$insert_query->bindParam(":email", $email);
$insert_query->bindParam(":phone", $phone_number);
$insert_query->bindParam(":carrer", $carrer);
$insert_query->bindParam(":company", $company);
$insert_query->bindParam(":imgUrl", $imgUrl);
$insert_query->bindParam(":skillTest", $skill_test);
$insert_query->execute();


$contactSubject = "DGMOBI Contest Entry Details";
$contactMessageToAdmin = "<p>Hi Admin, <br> The following data received from  Contest Entry page </p>
                          <p>Date:  <b>" . $regDate . "</b><br>
                            Name:  <b>" . $name . "</b><br>"
        . "Age: <b>" . $age . "</b><br>"
        . "Country: <b>" . $country . "</b><br>"
        . "Province: <b>" . $province . "</b><br>"
        . "City: <b>" . $city . "</b><br>"
        . "Email: <b>" . $email . "</b><br>"
        . "Phone: <b>" . $phone_number . "</b><br>"
        . "Carrrer: <b>" . $carrer . "</b><br>"
        . "Company: <b>" . $company . "</b><br>";


$toemail = array(USER_EMAIL);
$attachment = $uploadfile;

//Function For SendEmail.
function sendemail($to, $subject, $message, $attachment=NULL) {

    $mail = new PHPMailer();

    $mail->IsSMTP(); // send via SMTP
    $mail->Host = "smtp.office365.com"; // SMTP servers
    $mail->Port = 587; // SMTP servers
    $mail->SMTPAuth = true; // turn on SMTP authentication
    $mail->SMTPDebug = 0;
    $mail->Username = USER_EMAIL; // SMTP username
    $mail->Password = USER_PASSWORD; // SMTP password
    $mail->SMTPSecure = 'STARTTLS';
    $mail->From = USER_EMAIL;
    $mail->FromName = "DGMobi Check";
    foreach ($to as $key => $val)
        $mail->AddAddress($val);
    $mail->addAttachment($attachment);
    $mail->IsHTML(true); // send as HTML
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = "This is the plain text version of the email content";


    if (!$mail->send()) {
        return false;
    } else {
        return true;
    }
}

//Calling SendEmail Function
if (sendemail($toemail, $contactSubject, $contactMessageToAdmin, $attachment)) {
    echo "success";
} else {
    echo "failed";
}


//Mail to Customer

$toCustomerEmail = array($email);
$subject2Customer ="DGMOBI Contest" ;
$message2Customer='<p>We appreciate your participation!</p>
        <b>The draws will be made every 16th and 30th of every month starting July 15th at 4PM EST</b><br>
        <b> The winner will be posted in LinkedIn the next day at 8AM EST.</b><br>
        <b>The contest will end December 15th at which point we will draw the grand prize of <span style="color: rgb(255,215,0);">$250 dollar gift card.</span> Every entry will be kept for the final draw.</b>';


//SendEmail Function to customer thanking Mail
if (sendemail($toCustomerEmail, $subject2Customer, $message2Customer)) {
    echo "success";
} else {
    echo "failed";
}