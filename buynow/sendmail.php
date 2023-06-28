
<?php 

//include "dbconnect2.php";
include "mail_class.php";
include "mailcontent.php";
function credentialsMail($details){


$pLanguage = 'English';

//storeContacts($dbCon2, $name, $email, $phone, $select, $mess, $pLanguage);

$subject = "Credentials for DGMOBI";

$body_files = credentialMailBody($details);
//var_dump($body_files);
$body = $body_files["mailBodyContent"];
$files = $body_files["attachFiles"];

$subjectToUser = "Message from dgsms.ca";

$senderMail = "support@dgsmsusa.com";
$to =$details["emailID"];

if(sizeof($files)==0){
    $attachments = null;
}
else{
    $attachments = $files;
}

try{
    $result1 = sendmail($to, $subject, $body, $attachments);
    //$result2 = $mail12->send($sesHost, $sesKey, $sesSecret, $senderMail, $subjectToUser, $bodyToUser, $email);

}catch(Exception $e){
    //print_r($e);
    echo "hello from exception".$e->getMessage();
}
$succ = "Thank you for your interest. Our team will contact you soon.";

}



?>
