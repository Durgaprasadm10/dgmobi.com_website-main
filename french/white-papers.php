<!DOCTYPE html>
<html lang="fr">
   
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>White Papers</title>
               
        <meta name="description" content="Ideabytes solution of DG Safety Managemnt solutions comprises services in packaging, SDS, Declarations, Placarding, Segregation and Second Opion Services. All these services are subject to the licensing terms stated on this page">
        <meta name="keywords" content="DGSDS, DGSMS, DGDOX, DGVFF, DGSOS, Licence, Licencing Terms, Ideabytes">

  		 <?php
		include "header_nav.php";
		$pageId = '1514';
		?>
         <!--FORM-->
        
        <link rel="stylesheet" href="css/font-awesome.css">
		<link href="css/dg-forms.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="css/dg-forms-red.css">
              
            
            <!-- About Section -->
            <section class="page-section">
                <div class="container relative">
                    
                    <h2 class="section-title font-alt align-left mb-sm-40">
                   <img src="images/white-papers-banner.jpg" width="1133" height="367" alt="white papers"/></h2>
                    
                    <div class="section-text mb-30 mb-sm-20">
                        <div class="row">
                                                    
                            <div class="col-md-12  mb-xs-30">
                            <blockquote>
                            <div id="whitpapers1">
                            <h2><a href="#whitpapers1" title="Truckers drive your top and bottom line by hauling HAZMAT - June 14 2016">Truckers drive your top and bottom line by hauling HAZMAT - June 14 2016</a></h2>
                                     <img src="images/george.jpg" width="100" height="100" alt="george"/> 



<a rel="canonical" 
href="pdf/dgsms-white-papers.pdf" onclick='' target="_blank">Truckers drive your top and bottom line by hauling HAZMAT - June 14 2016</a>
<br />A paper that shows how Hauling Hazmat can be profitable and compliant using the latest tools on the market
                                <footer>
                                    <strong>George Kongalath, CEO</strong>  <br>
Ideabytes Inc<br></div>


                                </footer>
                               
                              </blockquote>
                           
</div>


   										
                          </div>
                      
                            
                        </div>

 
                        <div class="col-md-12 mb-xs-30">
<?php 
if(isset($_POST['subscribe'])){
	
	include "../dbconnect2.php";
	include "../mail_class.php";
	
	$name = filter_var ($_POST['name'], FILTER_SANITIZE_EMAIL);
	$email = filter_var ($_POST['email'], FILTER_SANITIZE_EMAIL);
	$phone = filter_var ($_POST['phone'], FILTER_SANITIZE_STRING);
	$company = filter_var ($_POST['company'], FILTER_SANITIZE_STRING);	
	$pLanguage = 'French';
	
	storeWhitePapers($dbCon2, $name, $email, $phone, $company, $pLanguage);
	
	$subject = "Message from White-papers page dgsms.ca";

	$body = "<table>
<tr><td>Name</td><td>:</td><td>$name</td></tr>
<tr><td>Company</td><td>:</td><td>$company</td></tr>
<tr><td>Email</td><td>:</td><td>$email</td></tr>
<tr><td>Phone No</td><td>:</td><td>$phone</td></tr>
</table>";

	$subjectToUser = "Message from dgsms.ca";
	
	$bodyToUser = "Hi $name,
	Thank you for your interest. The next news letter will be mailed to you.";
	
	$mail12 = new Phpmailsend();
	try{
		$result1 = $mail12->send($sesHost, $sesKey, $sesSecret, $senderMail, $subject, $body, $to);
		$result2 = $mail12->send($sesHost, $sesKey, $sesSecret, $senderMail, $subjectToUser, $bodyToUser, $email);
	}catch(Exception $e){
		//echo "hello from exception".$e->getMessage();
	}
	
$succ = "Thank you for your interest. The next news letter will be mailed to you.";
}
?>



                           <form action="white-papers.php" method="POST" class="dg-form" enctype="multipart/form-data">
				<header>Subscribe <br />
<font class="reffrd"><?php echo $succ; ?></font>

</header>
				
				<fieldset>					
					<div class="row">
						<section class="col col-3">
							<label class="label">Name</label>
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input type="text" name="name" id="name" required>
							</label>
						</section>
                        	<section class="col col-3">
							<label class="label">Company</label>
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input type="text" name="company" id="company" required>
							</label>
						</section>
						<section class="col col-3">
							<label class="label">E-mail</label>
							<label class="input">
								<i class="icon-append fa fa-envelope-o"></i>
								<input type="email" name="email" id="email" required>
							</label>
						</section>
					
                    <section class="col col-3">
							<label class="label">Phone Number</label>
							<label class="input">
								<i class="icon-append fa fa-phone"></i>
								<input type="phone" name="phone" id="phone" required>
							</label>
						</section>
                    </div>
					
					
					
					
					
					
				</fieldset>
				
				<footer>
					<button type="submit" class="button" name="subscribe">Subscribe for News Letter</button>
				</footer>
				
				<div class="message">
					<i class="fa fa-check"></i>
					<p>Your message was successfully sent!</p>
				</div>
			</form>		
			

										
                          </div>
                       <!--  <div class="col-md-12 mt-30 mb-xs-30">
                            <form action="#"  class="dg-form">
				<header>Subscribe for Newsletter</header>-->
				
				<!--<fieldset>					
					<div class="row">
						
						<section class="col col-6">
							<label class="label">E-mail</label>
							<label class="input">
								<i class="icon-append fa fa-envelope-o"></i>
								<input type="email" name="email" id="email">
							</label>
						</section>
				
                    </div>
					
					
					
					
					
					
				</fieldset>-->
				
				<!--<footer>
					<button type="submit" class="button">Subscribe for Newsletter</button>
				</footer>
				
				<div class="message">
					<i class="fa fa-check"></i>
					<p>Your message was successfully sent!</p>
				</div>
			</form>	-->	
			

										
                          </div>
                    </div>
                    
                </div>
               <div class="hs-line-4 align-center mt-10">
                               Appelez-nous pour un essai gratuit | <a rel="canonical" href="contact.php">Contactez Nous</a></div>

                              <div class="hs-line-3">
                                <ul class="nav tpl-alt-tabs  ">
                        
                        <li>
                                
                               CANADA<br>
								1-613-800-7368
                        </li>
                        <li>
                                
                                USA (Sans Frais)<br>
								+1 888-409-8057
                        </li>
                        <li>
                               
                               INDIA<br>
								+91-40-6555-5959
                        </li>
                        <li>                                
                               
                                Sans Fraisbr>
								+1 888-409-8057
                                
                        </li>
                        <li> <a rel="canonical" href="http://www.ideabytes.com" target="_blank"><img src="images/ideabytes.png" width="150" height="51" alt="Ideabytes logo Web/mobile Solutions Dangerous Goods/HAZMAT Air, Road Sea Transport (TDG, IATA, IMDG, 49-CFR, ADR)"/></a> </li>
                    </ul>
                            </div>
                 
            </section>
      

            <!-- End About Section -->
            
            <!-- Divider -->
            <hr class="mt-0 mb-0 "/>
            <!-- End Divider -->
            
  <?php
		include "footer.php";
		?>
