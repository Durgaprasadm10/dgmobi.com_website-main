<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>DGSMS – Contactez-Nous 24/7 Vente & Support solutions HAZMAT/DG</title>
               
        <meta name="description" content="HAZMAT/DG un défi à gérer ? Nos Experts résoudent les problèmes d'emballage, déclaration, placardage et séparation. Soutiens TDG, IATA, IMDG, 49 CFR, ADR">
        <meta name="keywords" content="DOT, TDG, Emballage, Consulter, Scanneur Plaque, QrCode, IOT, IATA, Séparation, ERP, SAP, EDI, Déclaration, HAZMAT, Intermodale, IMDG, Gestion de système de sécurité, 49 CFR, Transbordement, SaaS, Androide, Navigateur, Formation, Former l'agent de formation, Solutions sur Mesure, IATA, IMDG, ADR, TDG, 49 CFR, Ideabytes, Soutien de 24/7, DGSMS, 1 888-409-8057, +91-40-6555-5959, 1-613-800-7368">

  		 <?php
		include "header_nav.php";
		$pageId = '1483';
		?>
		 <!--FORM-->
        
        <link rel="stylesheet" href="../css/font-awesome.css">
		<link href="../css/dg-forms.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="../css/dg-forms-red.css">
		<!--[if lt IE 9]>
			<link rel="stylesheet" href="css/sky-forms-ie8.css">
		<![endif]-->
		
		<script src="../js/jquery.min.js"></script>
		<script src="../js/jquery.form.min.js"></script>
		<script src="../js/jquery.validate.min.js"></script>		
		<!--[if lt IE 10]>
			<script src="js/jquery.placeholder.min.js"></script>
		<![endif]-->		
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/sky-forms-ie8.js"></script>
		<![endif]-->
        <!--FORMEND-->
            <style rel="stylesheet">

.cont {
background-image:url(../images/contact-bg.jpg);

}
</style>
            
            <!-- About Section -->
            <section class="page-section cont">
                <div class="container relative">
                    
                    <div class="section-text mb-30 mb-sm-20">
                        <div class="row">
                        <div class="col-md-6 mt-60  mb-xs-30">
<?php 

if(isset($_POST['submit'])){
	include "../dbconnect2.php";
	include "../mail_class.php";
	
	$name = filter_var ($_POST['name'], FILTER_SANITIZE_STRING);
	$email = filter_var ($_POST['email'], FILTER_SANITIZE_EMAIL);
	$phone = filter_var ($_POST['phone'], FILTER_SANITIZE_STRING);
	$select = filter_var ($_POST['sub'], FILTER_SANITIZE_STRING);
	//$mess = string_sanitize($_POST['message']);
	$mess = filter_var ($_POST['message'], FILTER_SANITIZE_STRING);
	$pLanguage = 'French';
	
	storeContacts($dbCon2, $name, $email, $phone, $select, $mess, $pLanguage);
	
	$subject = "Message from contact page dgsms.ca";

	$body = "<table>
	<tr><td>Name</td><td>:</td><td>$name</td></tr>
	<tr><td>Email</td><td>:</td><td>$email</td></tr>
	<tr><td>Phone No</td><td>:</td><td>$phone</td></tr>
	<tr><td>Interested In</td><td>:</td><td>$select</td></tr>
	<tr><td>Message</td><td>:</td><td>$mess</td></tr>
	</table>";

	$subjectToUser = "Message from dgsms.ca";
	/*$bodyToUser = "<table>
	<tr><td>Name</td><td>:</td><td>$name</td></tr>
	<tr><td>Email</td><td>:</td><td>$email</td></tr>
	<tr><td>Phone No</td><td>:</td><td>$phone</td></tr>
	<tr><td>Interested In</td><td>:</td><td>$select</td></tr>
	<tr><td>Message</td><td>:</td><td>$mess</td></tr>
	</table>
	Our team will contact you soon.
	";*/
	$bodyToUser = "Hi $name,
	Thank you for contacting us.
	Our team will reach you soon.";
	
	$mail12 = new Phpmailsend();
	try{
		$result1 = $mail12->send($sesHost, $sesKey, $sesSecret, $senderMail, $subject, $body, $to);
		$result2 = $mail12->send($sesHost, $sesKey, $sesSecret, $senderMail, $subjectToUser, $bodyToUser, $email);
	}catch(Exception $e){
		echo "hello from exception".$e->getMessage();
	}
	$succ = "Thank you for your interest. Our team will contact you soon.";

}
?>
                            <form action="contact.php" method="POST" class="dg-form" enctype="multipart/form-data">
				<header>Contactez-Nous<br />
<span class="reffrd"><?php echo $succ; ?></span>
</header>
				
				<fieldset>					
					<div class="row">
						<section class="col col-6">
							<label class="label">Nom</label>
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input type="text" name="name" id="name" required />
							</label>
						</section>
						<section class="col col-6">
							<label class="label">Courriel</label>
							<label class="input">
								<i class="icon-append fa fa-envelope-o"></i>
								<input type="email" name="email" id="email" required />
							</label>
						</section>
					</div>
								
					<div class="row">
                    <section class="col col-6">
							<label class="label">Numéro de Téléphone</label>
							<label class="input">
								<i class="icon-append fa fa-phone"></i>
								<input type="text" name="phone" id="phone" required />
							</label>
						</section>
                        
					<section class="col col-6">
						<label class="label">Numéro de Téléphone</label>
						<label class="select">
							<select name="sub" required>
								<option value="" selected disabled>CHOISIR</option>
								<option value="DGSDS">DGSDS</option>
								<option value="DGDOX">DGDOX</option>
								<option value="DGSMS">DGSMS</option>
                                <option value="DGMobi">DGMobi</option>
                                <option value="DGVFF">DGVFF</option>
                                <option value="DGRMA">DGRMA</option>
                                <option value="DGSOS">DGSOS</option>
                                <option value="OTHER">AUTRES</option>
							</select>
							<i></i>
						</label>
					</section>
                    </div>
					
					
					<section>
						<label class="label">MESSAGE</label>
						<label class="textarea">
							<i class="icon-append fa fa-comment"></i>
							<textarea rows="4" name="message" id="message" required></textarea>
						</label>
					</section>
					
					
					
				</fieldset>
				
				<footer>
					<input type="submit" name="submit" class="button" value="Envoyer Message" />
				</footer>
				
				<div class="message">
					<i class="fa fa-check"></i>
					<p>Your message was successfully sent!</p>
				</div>
			</form>		
			

										
                          </div>
                                                    
                            <div class="col-md-3 mt-60  mb-xs-30">
                           
                             <p class="whitetext"><strong><img src="images/canada-flag.jpg" alt="canada-flag" width="21" height="14">&nbsp;Canada</strong><br>
                            Ideabytes Inc.,<br>
                           Suite 580, <br> 
                            1000 Innovation Drive, <br>
                            Kanata, Ottawa, <br>
                            ON K2K 3E7,  <br>
                            Canada <br>
                           Phone : +1 613 800 7368<br>
                            </p>
                            </div>
                            <div class="col-md-3 mt-60  mb-xs-30">
                            <p class="whitetext"><strong><img src="images/India-flag.jpg" alt="india-flag" width="21" height="14">&nbsp;Inde<br>
                            </strong>Ideabytes Software India Pvt Ltd<br>
                            Plot No: 35, Jayabheri Pine Valley,<br>
							Gachibowli,<br>
                            Hyderabad – 500 032<br>
                            Phone: +91-40-6555 5959<br>
                            </p>
                            </div>
                             <div class="col-md-3 mt-60  mb-xs-30">
                            <p class="whitetext"><strong><img src="images/USA-flag.jpg" alt="usa-flag" width="21" height="14">&nbsp;États-Unis<br>
                            </strong>Ideabytes Inc.,<br>
                            2897 Lowell CT<br>
                            San Jose, CA 95121-1475, USA<br>
                            Sans Frais: +1 888-409-8057<br>
                            </p>
				
                          </div>
                          <div class="col-md-3 mt-60  mb-xs-30">
                            <!--<p class="whitetext"><strong><img src="images/Malaysia-flag.jpg" alt="Malaysia-flag" width="21" height="14">&nbsp;Malaisie<br>
                            </strong>Ideabytes<br>
                            #75, Jalan PUJ 5/9,<br>
                            Bandar Putra Permai, <br>
                            43300 Seri kembangan, Selargor, Malaysia<br>
                            Phone: +60-16-220 1365<br>
                            </p>--><br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br /><br />
<br />
<br />


				
                          </div>
                          
                          
                     
      
                     
                            
                           
                            
                            
                            
                      </div>
                    </div>
                    
                </div>
               
                 
            </section>
            <!-- End About Section -->
            
            <!-- Divider -->
            <hr class="mt-0 mb-0 "/>
            <!-- End Divider -->
            
            
           
           <?php
		   include "footer.php";
		   ?>
