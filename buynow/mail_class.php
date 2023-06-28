<?php
//error_reporting(E_ALL);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../lib123/PHPMailer/src/Exception.php';
require '../lib123/PHPMailer/src/PHPMailer.php';
require '../lib123/PHPMailer/src/SMTP.php';

include_once('init.php');
//require ('/lib123/PHPMailer/PHPMailerAutoload.php'); old phpmailer
//  $sesHost = 'email-smtp.us-east-1.amazonaws.com'; 
//  $sesKey = 'AKIAJHIFVCROXZ6BSOUQ';
//  $sesSecret = 'At2D8LtaUE8tn2asTa2CG3Jujb/R3c14V7hRVTe2qCsg'; 

 //$sesHost = 'smtp.office365.com'; 
// $sesKey = 'ganeshbharatha318@gmail.com';
// $sesSecret = 'Cherry@67890'; 
// $senderMail = 'ganeshbharatha318@gmail.com';
 
$to1 = 'sales@dgsms.ca';
$to2 = 'contact@dgsms.ca';
// $to = array("ganeshbharatha318@gmail.com");
//$to = array("sales@dgsms.ca", "contact@dgsms.ca");

	function send($subject, $body, $attachment = NULL){
		//print_r($subject);
           //     exit;
		$result = array();
		$result['result'] = false;
		$result['error'] = true;
		$result['errorMessage'] = "";
		$mail = new PHPMailer(true);
        try {
			
            

            $mail->IsSMTP(true); // enable SMTP
			$mail->Mailer = "smtp";
            $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'tls';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587; // or 587 || 465
            $mail->IsHTML(true);
            $mail->Username ='ganeshbharatha318@gmail.com';
            $mail->Password ='Ganesh@67890';
            $mail->addAddress('ganeshbharatha318@gmail.com');
            $mail->Subject ='helloword';
            $mail->Body = 'hi this is hari';  
			$to = array("ganeshbharatha318@gmail.com");  
			
			if ($mail->Send()) {
				$result = 1;
			} else {
				$result = "Error: " . $mail->ErrorInfo;
			}
               
			if(is_array($to)){
				
				foreach ($to as $toAddress) {
					
					$mail->AddAddress($toAddress);
				}
				 

			}else{
				$mail->AddAddress($to);
			}
			
			// if($attachment) {

            //     $mail->addAttachment($attachment);
            // }
			//print_r($mail->send());
			$mail->Send();
			$result['result'] = true;
			$result['error'] = false;
        } catch(phpmailerException $mailerException) {
			$result['result'] = false;
			$result['error'] = true;
			$result['errorMessage'] = $mailerException->getMessage();
        } catch(Exception $e) {
			//print_r($e);
			$result['result'] = false;
			$result['error'] = true;
           	$result['errorMessage'] = $e->getMessage();	
        }
		
		return $result;
		
	}
	function sendMail($to,$subject, $body, $attachments = NULL){
		
		$result = array();
		$result['result'] = false;
		$result['error'] = true;
		$result['errorMessage'] = "";
		$mail = new PHPMailer(true);
        try {
			
            

            $mail->IsSMTP(true); // enable SMTP
			$mail->Mailer = "smtp";
            $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only 0=not printing
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'tls';
            $mail->Host = Config::OUTLOOK_HOST;
            $mail->Port = Config::SMTP_OUTLOOK_PORT; // or 587 || 465
            $mail->IsHTML(true);
            $mail->Username =Config::SMTP_OUTLOOK_USERNAME;
            $mail->Password =Config::SMTP_OUTLOOK_PASSWORD;
          
            $mail->Subject =$subject;
            $mail->Body = $body;  
			$mail->SetFrom(Config::SMTP_OUTLOOK_EMAIL, Config::OUTLOOK_SENDERNAME);
			
			if(is_array($to)){
				
				foreach ($to as $toAddress) {
					
					$mail->AddAddress($toAddress);
				}
				 

			}else{
				$mail->AddAddress($to);
			}

			
			if($attachments) {
				if(is_array($attachments)){
				
					foreach ($attachments as $attachment) {
						
						$mail->addAttachment($attachment);
					}
					 
	
				}else{
					$mail->addAttachment($attachments);
				}

                
            }
			//print_r($mail->send());
			$mail->Send();
			$result['result'] = true;
			$result['error'] = false;
        } catch(phpmailerException $mailerException) {
			$result['result'] = false;
			$result['error'] = true;
			$result['errorMessage'] = $mailerException->getMessage();
        } catch(Exception $e) {
			//print_r($e);
			$result['result'] = false;
			$result['error'] = true;
           	$result['errorMessage'] = $e->getMessage();	
        }
		
		return $result;
		
	}

?>
