<?php
$language = (isset($_GET["lang"]) && (($_GET["lang"] == "en") || ($_GET["lang"] == "fr") )) ? $_GET["lang"] : "";
if($language == "fr"){
	header("Location: french/");
}
?>
<!DOCTYPE html>
<html lang="en">
    

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title>DGMobi – Android solution calculates placarding for HAZMAT/DG LTL loads. Reduce Inspection Time. TDG, 49- CFR. ADR –fall 2016. Free to Inspectors and Qualified Trainers</title>
               
      <meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>DGMobi – Android Placard Calculator TDG, 49 CFR, ERG</title>
                 
        <meta name="description" content="DGMobi – Android app Truck Drivers, SME. Correct Placarding of HAZMAT/DG for pick up and drop off loads. ERG included. Accepted electronic format in inspections">

        <meta name="keywords" content="Web, Android, Placard, Dangerous, TDG, label, Labels, Segregation, Danger, Trainer, Chemical, Declaration, EGR, hazmat, inspector, Consult, Certfifed, Violation, Regulations, labelling, Out of Service, 49 CFR, French, Spanish, Licencing Terms, Ideabytes, DGSMS,1 888-409-8057, +91-40-6555-5959, 1-613-800-7368,LANDSTAR, LANDSTAR BCO, Business Capacity Owners, LANDSTAR BCO DISCOUNT, Safety Placarding, HRCQ, Highway route control quantities, Permissive Placarding">     
        <!--FORM-->
        
        <link rel="stylesheet" href="css/font-awesome.css">
		<link href="css/dg-buy.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="css/dg-forms-red.css">
		<!--[if lt IE 9]>
			<link rel="stylesheet" href="css/sky-forms-ie8.css">
		<![endif]-->
		
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.form.min.js"></script>
		<script src="js/jquery.validate.min.js"></script>		
        <?php
		include "header_nav.php";
		$pageId = '1461';
		?>
		<style>
.gold {
    color: #f8af00;
}
.comment-author a {
    color: #000;
}
.comment-item {
    padding-top: 5px !important;
}
h2 {
  margin: 1.75em 0 0;
  font-size: 5vw;
}

h3 { font-size: 1.3em; }

.v-center {
  height: 100vh;
  width: 100%;
  display: table;
  position: relative;
  text-align: center;
}

.v-center > div {
  display: table-cell;
  vertical-align: middle;
  position: relative;
  top: -10%;
}

.btn {
  font-size: 3vmin;
  padding: 0.75em 1.5em;
  background-color: #fff;
  border: 1px solid #bbb;
  color: #333;
  text-decoration: none;
  display: inline;
  border-radius: 4px;
  -webkit-transition: background-color 1s ease;
  -moz-transition: background-color 1s ease;
  transition: background-color 1s ease;
}

.btn:hover {
  background-color: #ddd;
  -webkit-transition: background-color 1s ease;
  -moz-transition: background-color 1s ease;
  transition: background-color 1s ease;
}

.btn-small {
  padding: .75em 1em;
  font-size: 0.8em;
}

.modal-box {
  display: none;
  position: absolute;
  z-index: 1000;
  width: 35%;
  background: white;
  border-bottom: 1px solid #aaa;
  border-radius: 4px;
  box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
  border: 1px solid rgba(0, 0, 0, 0.1);
  background-clip: padding-box;

}


.modal-box header,
.modal-box .modal-header {
  padding: 6px 30px;
  border-bottom: 1px solid #ddd;
}

.modal-box header h3,
.modal-box header h4,
.modal-box .modal-header h3,
.modal-box .modal-header h4 { margin: 0; }

.modal-box .modal-body { padding: 2em 1.5em; }

.modal-box footer,
.modal-box .modal-footer {
  padding: 1em 2em;
  border-top: 1px solid #ddd;
  background: rgba(0, 0, 0, 0.02);
  text-align: right;
}

.modal-overlay {
  opacity: 0;
  filter: alpha(opacity=0);
  position: fixed;
  top: 0;
  left: 0;
  z-index: 900;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.4) !important;
}

a.close {
  line-height: 1;
  font-size: 3em;
  position: absolute;
  top: 1%;
  right: 3%;
  text-decoration: none;
  color: #fff;
 opacity: 100;
}

a.close:hover {
  color: #fff;
  -webkit-transition: color 1s ease;
  -moz-transition: color 1s ease;
  transition: color 1s ease;
}
@media only screen and (max-width: 1920px) {
 .modal-box {
     margin-top: 306px;
    width: 23%;
    margin-left: -59px;
}
}
@media only screen and (max-width: 1600px) {
 .modal-box {
 margin-top: 265px;
    width: 41%;
    margin-left: -69px;

}
}

@media only screen and (max-width: 1440px) {
 .modal-box {
     margin-top: 377px;
    width: 31%;
    margin-left: -154px;
}
}

@media only screen and (max-width: 1366px) {
 .modal-box {
    margin-top: 475px;
    width: 33%;
    margin-left: -169px;
}
}

@media only screen and (max-width: 1280px) {
  .modal-box {
        margin-top: 321px;
    width: 35%;
    margin-left: -187px;
}
}

@media only screen and (max-width: 1024px) {
  .modal-box {
     margin-top: 455px;
    width: 32%;
    margin-left: -173px;
}

}

@media only screen and (max-width: 768px) {
  .modal-box {
           margin-top: 189px;
    width: 66%;
    margin-left: -56px;
}
}

@media only screen and (max-width: 767px) {
    .modal-box {
     margin-top: 189px;
    width: 66%;
    margin-left: -56px;
}
}

@media only screen and (max-width: 480px) {
    .modal-box {
     margin-top: 301px;
    width: 92%;
    margin-left: 4px;
}
}

</style>
		 <!-- About Section -->
            <section class="page-section">
                <div class="container relative">
                    
                    <h2 class="section-title font-alt align-left mb-sm-40">
                    <img src="images/dgmobi-logo.png" width="250" height="49" alt="DGMobi-logo- Android Based Placard Calculator – that can function stand alone or networked to DGSMS. Compliant to TDG and 49 CFR"/>
                    
                    <a class="js-open-modal" href="#" data-modal-id="popup1"><img style="float:right;" src="ios/buynow.png" width="199" height="51" alt="buynow"/></a>
                    

                     
                    <h2 class="section-title font-alt align-left mb-sm-40">
                            <img src="ios/dgmobi-ios-android.png" width="1133" height="247" class="marbot" alt="dgmobi – Mobile based solution to placard LTL loads, includes segregation for TDG, DOT 49 CFR. Over 1 million loads processed by engine. Simple, fast, interfaces to Mobile application, transaction tracking for 2 years."/></h2>
                            
                            

             
                    <div class="section-text mb-30 mb-sm-20">
                        <div class="row">
                                                    
                            <div class="col-md-7  mb-xs-30">
                            
                            
                             <h2 class="section-title font-alt align-left mb-sm-10">
                        DGMobi<sup>™</sup> - Your companion to 49 CFR, TDG Compliance </h2>

<p><img style="margin-bottom:10px; margin-left: 10px; margin-top:10px; float:right;" src="ios/Insert-Main-Screen.png" width="200" height="300" alt="dgmobi--ios-Mainscreen" />Getting certified in 49 CFR or TDG is a challenge in itself. Can one expect you to remember all the rules that control the display of placarding on the truck? Really?</br>

DGMobi™ has the answer, self-contained, self-checking application on an Android or Apple device in you pocket. Enter the Hazmat data, every time you load the truck and DGMobi™ calculates the placarding that has to be displayed. When you unload the truck, delete it from the loads in your app with a simple swipe and the required placarding is recalculated. </br>

<img style="margin-bottom:10px; margin-right: 10px; margin-top:10px; float:left;" src="ios/Insert-PlacardScreen.png" width="200" height="300" alt="dgmobi--ios-PlacardScreen" />Besides placarding DGMobi™ helps you validate the proper shipping name, class and packing group are correct on declaration. Knowing that one has the right documentation, makes for a smooth inspection. </br>

Before even loading the truck the driver needs to make sure if the loads on the truck are compatible with the pick-up. In the United States, the segregation matrix is complex and DGMobi™ quickly verifies that the loads are compatible. </br>

49 CFR segregation rules are complex, whereas TDG segregation only encompasses Class 1 ( explosives). </p>

<h2 class="section-title font-alt align-left mt-30 mb-sm-10">
                        HRCQ and ERAP: <img style="margin-bottom:10px; margin-left: 10px; margin-top:10px; float:right;" src="ios/HRCQ.png" width="200" height="300" alt="dgmobi-ios-hrcq" /> </h2>
                        
                        
<p>If picking up a 49 CFR compliant load, if HRCQ applies to the load an advisory will be displayed so that the driver knows the goods have to be transported on authorized routes. Similarly TDG has an approximate equivalent ERAP. Even when a load originating in the US crosses the US border, if it meets the guidelines for ERAP, the goods will be held until an ERAP is produced. DGMobi™ warns drivers of these risks and helps in compliance  </p>


<h2 class="section-title font-alt align-left  mt-30 mb-sm-10">
                        ERG: <img style="margin-bottom:10px; margin-right: 10px; margin-top:10px; float:left;" src="ios/ERG-Main.png" width="200" height="300" alt="dgmobi--ios-PlacardScreen" /> </h2>
<p>The 2016 Emergency response Guide a heavy book that sits beside the driver is now available on DGMobi™ . Enter the UN Number, and it displays, the Emergency response information and actions. It will also display the Emergency Contact numbers and if the device is an Iphone, it will actually let you dial the number from the display. 
			
                           </p>
                           
<h2 class="section-title font-alt align-left mb-sm-10">
                       Record keeping:   </h2>
 <p>All the transactions on DGMobi™ are maintained in the cloud for 3 years as long as the DGMobi™ is valid. In an audit, the driver is confident to display a list of loads that were hauled in full compliance of 49 CFR or TDG.

If your company uses DGSMS™, Dispatchers from terminal can push transactions for pick to the DGMObi™ terminal eliminating the need to reenter the information manually. </p>                       
  
<h2 class="section-title font-alt align-left mb-sm-10">
                     Placarding modes: Safety and Permissive :   </h2>    
                     
 <p>An LTL truck driver is always seek to optimize the placards displayed and comply with regulations. To achieve this DGMobi™ provides the permissive placarding mode with 3 levels of placarding optimization: 1) Optimized, 2) semi-optimized and 3) non-optimized. All 3 modes are fully compliant with the regulations and will pass scrutiny of an inspector. </p>
 <p>However larger trucking companies prefer not to utilize all the exemptions and opt for safety mode. They prefer that the placarding reflect the danger on a truck in the event of an accident. The safety mode will have the larger loads of the same class duplicated with UN Numbers on each and if there are smaller loads of the same class, they too will be placarded by a single placard. In the safety optimized mode, the driver may choose to use the Dangerous / Danger placard if desired. </p>
 
  
<h2 class="section-title font-alt align-left mb-sm-10">
                      Customization:    </h2>

 <p>DGMobi™ is available to companies with customized logos and a central point of data collection which can be synchronized with a local copy of DGSMS™. Pricing is given based on volume of annual licenses. Please contact <a href="mailto:sales@dgsmsusa.com" target="_blank">sales@dgsmsusa.com</a> for more information. </p>      

</div>
<div class="col-md-5  mb-xs-30">

          <h2 class="section-title font-alt align-left mb-sm-10">
                       Customer feedback 	

                    </h2>
          <div class="mb-10 mb-xs-30" style=" height:650px; overflow: scroll; border: 2px #FF9102 solid; outline-style: double; padding: 10px; outline-color: #ffd163;">
                                    <ul class="media-list text comment-list clearlist">
                                        
                                        <!-- Comment Item -->
                                        <li class="media comment-item">
                                            <span class="gold">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                            <div class="media-body">
                                                <div class="comment-item-data">
                                                    <div class="comment-author">
                                                        <a href="#"> ENRICO BIRTO - OPTIMUSLOGISTICS LLC - IOS USER</a>
                                                    </div><br>

                                                    <span class="separator">&mdash;</span>Feb 9, 2017
                                                    
                                                </div>
                                                <p>
                                                  awesome! I love this app DGMobi saves me tons of time, handled quickly and efficiently.
                                                </p>
                                            </div>
                                        </li>
                                        <!-- End Comment Item -->
                                        
                                        <!-- Comment Item -->
                                        <li class="media comment-item">
                                             <span class="gold">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </span>
                                            <div class="media-body">
                                                <div class="comment-item-data">
                                                    <div class="comment-author">
                                                        <a href="#">LAURA BEATTY - ANDROID USER</a>
                                                    </div><br>
                                                  
													  <span class="separator">&mdash;</span>Jan 20, 2017
												</div>
                                             
                                                <p>
                                                  I really like the app. It is simple to use. It is especially a helpful tool if multiple hazmat is being hauled. Easy and quick way to make sure you are compliant. Extremely helpful service which is refreshing to get these days. Thanks so much for developing this app and making it very affordable as well.
                                                </p>
                                            </div>
                                        </li>
                                        <!-- End Comment Item -->
                                        
                                        <!-- Comment Item -->
                                        <li class="media comment-item">
                                             <span class="gold">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                            <div class="media-body">
                                                <div class="comment-item-data">
                                                    <div class="comment-author">
                                                        <a href="#">VIRGINIJUS NAVICKAS - IOS USER</a>
                                                    </div><br>
                                                  
													  <span class="separator">&mdash;</span>Jan 12, 2017
												</div>
                                             
                                                <p>
                                                  I am very pleased to receive such quick and wonderful customer service from you and your team. I’m really satisfied with DG Mobi app for IPhone. It is very simple and easy to use application that I can depend on. Once again, I want to thank you for your product and quick customer support.
                                                </p>
                                            </div>
                                        </li>
                                        <!-- End Comment Item -->
                                        
                                         <!-- Comment Item -->
                                        <li class="media comment-item">
                                             <span class="gold">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </span>
                                            <div class="media-body">
                                                <div class="comment-item-data">
                                                    <div class="comment-author">
                                                        <a href="#">DALLAS WOOD - IOS USER</a>
                                                    </div><br>
                                                  
													  <span class="separator">&mdash;</span>Dec 1, 2016
												</div>
                                             
                                                <p>
                                                 We have installed the DGMobi for our hazardous shipments and find it very helpful. We had a few questions and customer service (Sridevi Akurathi) helped answer all our questions.
                                                </p>
                                            </div>
                                        </li>
                                        <!-- End Comment Item -->
                                        
                                    </ul>
                                </div>
                                
                                <!-- Add Review -->
                               

                    <!-- Form -->
                    <h4 class="blog-page-title font-alt">Add Review</h4>

                                    <form method="post" action="#" id="form" role="form" class="form">
                                        
                                        <div class="row mb-20 mb-md-10">
                                            
                                            <div class="col-md-6 mb-md-10">
                                                <!-- Name -->
                                                <input type="text" name="name" id="name" class="input-md form-control" placeholder="Name *" maxlength="100" required>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <!-- Email -->
                                                <input type="email" name="email" id="email" class="input-md form-control" placeholder="Email *" maxlength="100" required>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="mb-20 mb-md-10">
                                            <!-- Rating -->
                                            <select class="input-md round form-control">
                                                <option>-- Select one --</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        
                                        <!-- Comment -->
                                        <div class="mb-10 mb-md-10">
                                            <textarea name="text" id="text" class="input-md form-control" rows="2" placeholder="Comment" maxlength="400"></textarea>
                                        </div>
                                        
                                        <!-- Send Button -->
                                        
                                        <a href="# "><img src="images/sendreview.png" width="184" height="38" alt=""/></a>
                                        
                                    </form>
                                    <!-- End Form -->

								
                                										
                          </div>




                           
                            										
                      </div>
                          
                        <!--
                            <center>
                             <a href="#"><img src="ios/buynow.png" width="199" height="51" alt="buynow"/></a>
                           </center>
             -->
                           
                            
                            
                            
                  </div>
              </div>
                    
                </div>
               <div class="hs-line-4 align-center mt-10">
                               <a href="contact.php">Contact Us</a> </div>

                              <div class="hs-line-3">
                                <ul class="nav tpl-alt-tabs  ">
                       
                        <li>
                                
                               USA (Toll Free)<br>
								
                               +1 888-409-8057
                        </li>
                        
                        <li> <a href="http://www.ideabytes.com" target="_blank"><img src="images/ideabytes.png" width="150" height="51" alt="Ideabytes logo-Ideabytes transportation division provides Solutions for Dangerous Goods, HAZMAT transported by air, Road and Sea using SaaS (web) and mobile solutions compliant to TDG, IATA, IMDG, DOT 49 CFR, ADR."/></a> </li>
                    </ul>
                            </div>
                 
            </section>
            <!-- End About Section -->
            
            <!-- Divider -->
            <hr class="mt-0 mb-0 "/>
            <!-- End Divider -->
            
                      
    <?php
	$path = $_SERVER['DOCUMENT_ROOT'];
	include_once('details.php');
	include_once('dbconfig.php');
	echo "**************";
	var_dump($env_var);
	var_dump($paypalURL);
	echo "$$$$$$$$$$$$**************";
	$uniqIdForOrder = uniqid();
	echo "#####################" .$paypalURL;
  ?>
           
        
        </div>
         
                     <div id="popup1" class="modal-box"> 

						<form class="dg-form" action="<?php echo $paypalURL; ?>" method="post" id="buy_dg_form"  onsubmit="return validateForm()">
							<input type="hidden" name="business" value="<?php echo $paypalID; ?>">        
							<!-- Specify a Buy Now button. -->
							<input type="hidden" name="cmd" value="_xclick">
							
							<!-- Specify details about the item that buyers will purchase. -->
							<input type="hidden" name="item_name" id="item_name" value="">
							<input type="hidden" name="item_number" id="item_number" value="">
							<input type="hidden" name="amount" id="amount" value="">
							<input type="hidden" name="currency_code" value="USD">
					        <input type="hidden" name="orderId" id="orderId" value="<?php echo $uniqIdForOrder; ?>" >
							<!-- Specify URLs -->
							<input type='hidden' name='no_shipping' value='1'>
							<input type='hidden' name='cancel_return' value="<?php echo $cancelURL; ?>">
							<input type='hidden' name='return' value="<?php echo $returnURL . "?orderId=" . $uniqIdForOrder; ?>">
							<!--<input type='hidden' name='notify_url' value='http://34.200.104.61/success.php?orderId=<?php //echo $uniqIdForOrder; ?>'>-->

							<header>Select DGMobi Product to Purchase
							</header><a href="#" class="js-modal-close close">×</a>
				
							<fieldset>
								<section>
									<a href="#" id="lang_en_id" onclick="changeLang('en')">English</a>&nbsp;&nbsp;
									<a href="#"  id="lang_fr_id" onclick="changeLang('fr')">French</a>&nbsp;&nbsp;
									<a href="#"  id="lang_sp_id" onclick="changeLang('sp')">Spanish</a>
								</section>
								<div class="row">
								<section class="col col-6">
									<label class="label" id="select_rule_label">Select Regulation</label>
									<label class="select">
										<select  id = "rule_select_id" onchange="setDeviceOptions(this.value)" required>
											<!--<option value="" selected disabled>SELECT</option>-->
											
											</select>
										<i></i>
									</label>
								</section>
					
								<section class="col col-6">
									<label class="label" id="select_device_label">Select Device</label>
									<label class="select">
										<select id="device_select_id" onchange="setProductOptions()" required>
											
											</select>
										<i></i>
									</label>
								</section>
								</div> 
                    <section>
						<label class="label" id="select_product_label">Select Product</label>
						<label class="select">
							<select id="product_select_id" onchange="setValuesForForm()" required>
								                 
							</select>
							<i></i>
						</label>
					</section>
                    
					
					<div class="row">
						<section class="col col-6">
							<label class="label" id="name_on_credit_card_label">Name as on Credit Card</label>
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<!--<input type="text" name="name_on_card" id="name_on_card" value="" onchange="return VerifyUsername(this, event);">-->
								<!--<input type="text" name="name_on_card" id="name_on_card" value="" onchange="return VerifyUsername();">-->
								<input type="text" name="name_on_card" id="name_on_card" value="" onchange="generateUsername();" maxlength="30" required>
								<!-- <asp:TextBox ID="txtAlpha" runat="server" onkeydown = "return isAlpha(event.keyCode);" onpaste = "return false;"></asp:TextBox> -->
								<!--<input type="text" name="name_on_card" id="name_on_card" value="" onkeydown = "return isAlpha(event.keyCode);"  onchange="generateUsername();" maxlength="30" required> -->
							</label>
						</section>
                        <section class="col col-6">
							<label class="label" id="username_label">Username</label>
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input type="text" name="generated_username" id="generated_username" value="" readonly required>
								<span id="divrespCheckUname"></span>
							</label>
						</section>
						
					</div>
                    
                    <div class="row">
						<section class="col col-6">
							<label class="label" id="password_label">Password</label>
							<label class="input">
								<i class="icon-append icon-lock"></i>
								<input type="password" name="password" id="password" maxlength="4" title="password musts be 4 charecters length" onchange="passwordOnChange();" required>
								<span id="divPasswordCheck"></span>
							</label>
						</section>
                        <section class="col col-6">
							<label class="label" id="confirm_password_label">Confirm Password</label>
							<label class="input">
								<i class="icon-append icon-lock"></i>
								<input type="password" name="confirm_password" id="confirm_password" maxlength="4" onchange="confirmpasswordOnChange();" required>
								<span id="divConfirmPasswordCheck"></span>
							</label>
						</section>
						
					</div>
								
					<div class="row">
                    <section class="col col-6">
							<label class="label" id="email_label">E-mail</label>
							<label class="input">
								<i class="icon-append fa fa-envelope-o"></i>
								<input type="email" name="email_id" id="email_id" onchange="emailIdOnChange();" required>
								<span id="divEmailCheck"></span>
							</label>
						</section>
                          <section class="col col-6">
							<label class="label" id="phone_number_label">Phone Number</label>
							<label class="input">
								<i class="icon-append fa fa-phone"></i>
								<input type="text" name="phone_number" id="phone_number"  onchange="phoneNoOnChange();" maxlength="15" required> 
								<span id="divPhoneCheck"></span>
								<!-- Phone number format - +1 Areacode and 7 digits pattern="[7-9]{1}[0-9]{9}"-->.
							</label>
						</section>
                      
                        </div>
						<div class="row">
							<section class="col col-6">
								<label class="label" id="country_select_label">Select Country</label>
									<label class="select">
										<select  id = "country_select_id" onchange="getProvince(this.value)" required>
											<!--<option value="" selected disabled>SELECT</option>-->
											</select>
										<i></i>
									</label>
							</section>
							<section class="col col-6" id="province_select_section" style="display:none;">
								<label class="label" id="province_select_label">Select Province</label>
									<label class="select">
										<select  id = "province_select_id">
											<!--<option value="" selected disabled>SELECT</option>-->
											
											</select>
										<i></i>
									</label>
							</section>
                      
                        </div>
                        <div class="row">
                          <section>
						<label class="checkbox">
                        <input type="checkbox" id="terms_conditions_checkbox">
                          <a href="http://dgsms.ca/licensing-terms.php" target="_blank" id="terms_anchortag">I accept Terms and Conditions</a></label>
					</section>
                    </div>
					
					
					
				</fieldset>			
				
				<footer>
					<p style="float:left;"><span id="footer_notes_text">For volume sales – please contact</span> <a href="mailto:sales@dgsmsusa.com">sales@dgsmsusa.com</a></p>
					
					<button type="submit" class="button" id="buy_now_button_text">Buy Now</button>
				</footer>
				
				
			</form>

  
</div>
			<?php
			include "footer_without_analytics.php";
			?>
			
			<script type="text/javascript"> 
			//var envVar = "dev"; 
			//var envVar = "test";
			var envVar = "production";
			
			var getCountryDetailsapi = "/api/mobile/new/getcountryandprovincedetails.json";
			var verifyUserExistOrNotForCartApi = "/api/mobile/verifyUserExistOrNotForCart.json";
			var mobileRegistrationApi = "/api/mobile/registrationUpdationLog/0.json";
			var emailDuplicateCheckApi = "/api/mobile/new/usernames.json";
			
			var presernt_countries_get_url = "";
			
			//var product_company = {"1":"General","2":"Landstar","3":"Generic","4":"Landstar","5":"General","6":"Landstar","7":"Midland","8":"dayandross"};
			var product_company = {"1":"Generic","2":"Landstar","3":"Generic","4":"Landstar","5":"Generic","6":"Landstar","7":"Midland","8":"dayandross"};
			
			var passwordValCheck = "no"; var emailValCheck = "no"; var phnoValCheck = "no"; 
			var mobileRegistrationCheck = "no";var storeDataInDb = "no";			
			var mobileRegistrationCheck = "no";
			
			if(envVar == "dev"){
				var baseServiceUrlUs = "http://192.168.1.49:80/DGSMS_US_WS_SERVER_BETA";
				var baseServiceUrlCa = "http://192.168.1.49:80/DGSMS_CA_WS_SERVER";
			}else if(envVar == "test"){
				var baseServiceUrlUs = "http://dgapptest.dgsmsus.com";
				var baseServiceUrlCa = "http://dgapptest.dgsms.ca";
			}else if(envVar == "production"){
				var baseServiceUrlUs = "http://104.238.79.21:80/DGSMS_US_WS_SERVER_BETA";
				var baseServiceUrlCa = "http://dgapp.dgsms.ca";
			}else{
				var baseServiceUrlUs = "http://dgapptest.dgsmsus.com";
				var baseServiceUrlCa = "http://dgapptest.dgsms.ca";
			}
			
			
			
		    function changeLang(choosenLang){
				//alert("selected lang " + choosenLang);
				if(choosenLang == "en"){
					document.getElementById('select_rule_label').innerHTML = 'Select Regulation';
					document.getElementById('select_device_label').innerHTML = 'Select Device';
					document.getElementById('select_product_label').innerHTML = 'Select Product';
					document.getElementById('name_on_credit_card_label').innerHTML = 'Name as on Credit Card';
					document.getElementById('username_label').innerHTML = 'Username';
					document.getElementById('password_label').innerHTML = 'Password';
					document.getElementById('confirm_password_label').innerHTML = 'Confirm Password';
					document.getElementById('email_label').innerHTML = 'E-mails';
					document.getElementById('phone_number_label').innerHTML = 'Phone Number';
					document.getElementById('terms_anchortag').innerHTML = 'I accept Terms and Conditions';					
					document.getElementById('footer_notes_text').innerHTML = "For volume sales – please contact";
					document.getElementById('buy_now_button_text').innerHTML ="Buy Now";
					$("#lang_en_id").hide();
					$("#lang_fr_id,#lang_sp_id").show();
				}
				if(choosenLang == "fr"){
					document.getElementById('select_rule_label').innerHTML = 'Sélectionnez le Règlement';
					document.getElementById('select_device_label').innerHTML = 'Choisir un appareil';
					document.getElementById('select_product_label').innerHTML = 'Sélect Product';
					document.getElementById('name_on_credit_card_label').innerHTML = 'Nom sous forme de carte de crédit';
					document.getElementById('username_label').innerHTML = "Nom d'utilisateur";
					document.getElementById('password_label').innerHTML = 'Mot de passe';
					document.getElementById('confirm_password_label').innerHTML = 'Confirmez le mot de passe';
					document.getElementById('email_label').innerHTML = 'E-mails';
					document.getElementById('phone_number_label').innerHTML = 'Numéro de téléphone';
					document.getElementById('terms_anchortag').innerHTML = "J'accepte les termes et conditions";
					document.getElementById('footer_notes_text').innerHTML = "Pour les ventes en volume - veuillez contacte";
					document.getElementById('buy_now_button_text').innerHTML = "Acheter maintenant";
					$("#lang_fr_id").hide();
					$("#lang_en_id,#lang_sp_id").show();
				}
				if(choosenLang == "sp"){
					document.getElementById('select_rule_label').innerHTML = 'Seleccionar el Reglamento';
					document.getElementById('select_device_label').innerHTML = 'Seleccione el dispositivo';
					document.getElementById('select_product_label').innerHTML = 'Seleccionar producto';
					document.getElementById('name_on_credit_card_label').innerHTML = 'Nombre como en la tarjeta de crédito';
					document.getElementById('username_label').innerHTML = 'Nombre de usuario';
					document.getElementById('password_label').innerHTML = 'Contraseña';
					document.getElementById('confirm_password_label').innerHTML = 'Confirmar contraseña';
					document.getElementById('email_label').innerHTML = 'Correos electrónicos';
					document.getElementById('phone_number_label').innerHTML = 'Número de teléfono';
					document.getElementById('terms_anchortag').innerHTML = 'Acepto los términos y condicioness';					
					document.getElementById('footer_notes_text').innerHTML = "Para ventas de volumen - por favor contacte";
					document.getElementById('buy_now_button_text').innerHTML = "Compra ahora";
					$("#lang_sp_id").hide();
					$("#lang_fr_id,#lang_en_id").show();
				}
			}
			function validateForm(){
				//alert("calling from form submit");
				var termsCheckboxValue = document.getElementById("terms_conditions_checkbox").checked;
				//alert(termsCheckboxValue);
                if(termsCheckboxValue){
					//return true;
				}else{
					alert("please accept terms and conditions");
					return false;
				}
				//alert(passwordValCheck);
				passwordOnChange();
				if(passwordValCheck == "yes"){
					//return true;
				}else{
					return false;
				}
				emailIdOnChange();
				if(emailValCheck == "yes"){
					
				}else{
					return false;
				}
				phoneNoOnChange();
				if(phnoValCheck == "yes"){
					
				}else{
					return false;
				}
				//call mobile registration api before going to paypal
				mobileRegistration();
				alert(mobileRegistrationCheck);
				//return false;
				if(mobileRegistrationCheck == "yes"){
					
				}else{
					alert("there is a problem to register user, pls try again");
					return false;
				}
				//return false;
			}
			function setRegulationOptions(){
				document.getElementById('rule_select_id').innerHTML = "";
				//document.getElementById('rule_select_id').innerHTML = "<option value='' selected>select</option><option value='1'>49 CFR - USA</option><option value='2'>TDG - CANADA</option>";
				document.getElementById('rule_select_id').innerHTML = "<option value='' selected>select</option><option value='2'>TDG - CANADA</option>";
			}
			 function setDeviceOptions(selectedRule)
			  {  
				//alert("onchange called " + selectedRule);
				var selected_rule_value = document.getElementById('rule_select_id').value;
				var selected_device_value = document.getElementById('device_select_id').value;
				//alert("onchange rule get element by id " + selected_rule_value);
				getCountries(selectedRule);
				if(selectedRule == 1){
					document.getElementById('device_select_id').innerHTML = "<option value=''>select</option><option value='andriod'>Andriod</option><option value='ios'>Apple-iOS</option>";
				}else if(selectedRule == 2){
					document.getElementById('device_select_id').innerHTML = "<option value='andriod'>Andriod</option>";
					document.getElementById('product_select_id').innerHTML = "<option value=''>select</option><option value='5'>DGMobi CA General - US$ 49/year</option><option value='6'>DGMobi CA Landstar BCO Discount - US$ 24.99/year</option><option value='7'>DGMobi CA Midland - US$ 49/year</option><option value='8'>DGMobi CA Day&Ross - US$ 49/year</option>";
				}else{
					document.getElementById('device_select_id').innerHTML = "";
					document.getElementById('product_select_id').innerHTML = "";
					document.getElementById('country_select_id').innerHTML = "";
					document.getElementById('province_select_id').innerHTML = "";
				}
				
			  } 
			  function setProductOptions(){
				var selected_rule_value = document.getElementById('rule_select_id').value; 
				var selected_device_value = document.getElementById('device_select_id').value;
				if(selected_rule_value == "" || selected_device_value == ""){
					document.getElementById('product_select_id').innerHTML = "";
				}
				
				if(selected_rule_value == 1 && selected_device_value == "andriod"){
					document.getElementById('product_select_id').innerHTML = "<option value=''>select</option><option value='1'>DGMobi US General - US$ 49/year</option><option value='2'>DGMobi US Landstar BCO Discount - US$ 24.99/year</option>";
				}
				else if(selected_rule_value == 1 && selected_device_value == "ios"){
					document.getElementById('product_select_id').innerHTML = "<option value=''>select</option><option value='3'>DGMobi US General - US$ 49/year</option><option value='4'>DGMobi US Landstar BCO Discount - US$ 24.99/year</option>";
			    }
				else if(selected_rule_value == 2 && selected_device_value == "andriod"){
					document.getElementById('product_select_id').innerHTML = "<option value=''>select</option><option value='5'>DGMobi CA General - US$ 49/year</option><option value='6'>DGMobi CA Landstar BCO Discount - US$ 24.99/year</option><option value='7'>DGMobi CA Midland - US$ 49/year</option><option value='8'>DGMobi CA Day&Ross - US$ 49/year</option>";
			    }else{
					document.getElementById('product_select_id').innerHTML = "";
				}
			  }	
			  function setValuesForForm(){
				  
					var productSelectId = $("#product_select_id").val();
					//alert(productSelectId);
					var productSelectIdText = $("#product_select_id option:selected").text();
					$("#item_name").val(productSelectIdText);
					$("#item_number").val(productSelectId);
					if(productSelectId == "1" || productSelectId == "3" || productSelectId == "5" || productSelectId == "7" || productSelectId == "8"){
						$("#amount").val("49");
						//$("#amount").val("0.05");
					}else{
						$("#amount").val("24.99");
						//$("#amount").val("0.02");
						//$("#amount").val("1");
					}								
					
			  }
			  function generateUsername(){
				  var nameOnCard = $("#name_on_card").val();
					  var ss = nameOnCard.split(" "); 
						var generatedusername = "";
						for (var i in ss) {  
							var generatedusername = ss[i] +  generatedusername; 
						}
						//alert(generatedusername);
						$("#generated_username").val("");
						$("#generated_username").val(generatedusername);
						VerifyUsername();
			  }
			   //function VerifyUsername(sender, e) {
				function VerifyUsername() {
				//e.preventDefault();
					var presernt_verifi_url = "";
					var regulation = $('#rule_select_id').val();
					
					//e.preventDefault();
					if(regulation == 1){
						presernt_verifi_url = baseServiceUrlUs + verifyUserExistOrNotForCartApi;
					}else if(regulation == 2){
						presernt_verifi_url = baseServiceUrlCa + verifyUserExistOrNotForCartApi;
					}else{
						alert("Plese Select Regulation");
						return false;
					}
						//alert("present verify url = " + presernt_verifi_url);
						var generatedusername = $("#generated_username").val();
						//var markersun = { username : generatedusername, email_id : "" };
						var markersun = { username : generatedusername };
						//alert(JSON.stringify(markersun));
						$.ajax({					
							
							url: presernt_verifi_url,
							method: "POST",
							 async:false,
							data: JSON.stringify(markersun),
							dataType: 'json',
							contentType: "application/json",
							success: function(response, results,jqXHR){
								//alert(JSON.stringify(response.results.result));								
								var userCheckResult = response.results.result;
								$("#divrespCheckUname").html(userCheckResult);
								if(userCheckResult == "username already exist"){
									var newUserName = response.results.newUserName;
									alert("Username already exists. \n Request you to proceed with the Username ' " + newUserName + " '");
									$("#generated_username").val(newUserName);
									$("#divrespCheckUname").html("success");
								} else{
									//alert("username check success");
								}
								/*var resu = 00;
								var existse = response.results.status;
								if(response.results.status == "00"){

								} else {
									alert(JSON.stringify(response.results.result));
									return;
								}*/
							},		
							error: function(ts){
								alert(JSON.stringify(ts));
							}						
						});
						return false;
				}
				function mobileRegistration() {
				//e.preventDefault();
					var presernt_mobile_registration_url = "";
					
					var regulation = $('#rule_select_id').val();
					
					if(regulation == 1){
						presernt_mobile_registration_url = baseServiceUrlUs + mobileRegistrationApi;
					}else if(regulation == 2){
						presernt_mobile_registration_url = baseServiceUrlCa + mobileRegistrationApi;
					}else{
						alert("Plese Select Regulation");
						return false;
					}
					alert("present registration url = " + presernt_mobile_registration_url);
						
						
						var nameOnCard = $("#name_on_card").val();
						
					    var ss = nameOnCard.split(" "); 
						var firstNameVal = "";
						var lastNameVal = "";
						if(ss[0]){
							firstNameVal = ss[0];
						}
						if(ss[1]){
							lastNameVal = ss[1];
						}
						
						var generatedusername = $("#generated_username").val();
						var passwordVal = $("#password").val();
						var emailVal = $("#email_id").val();
						var mobileTypeVal = "";
						var selected_device_value = document.getElementById('device_select_id').value;
						if(selected_device_value == "andriod"){
							mobileTypeVal = "0";
						}else{
							mobileTypeVal = "1";
						}
						
						var imeiVal = "";
						
						var cartVal = "1";
						
						var modeVal = "";
						
						var selected_rule_value = document.getElementById('rule_select_id').value;
						if(selected_rule_value == 1){
							modeVal = "CFR";
						}else{
							modeVal = "TDG";
						}
						
						var selected_product_value = document.getElementById('product_select_id').value;
						//alert("produvt val " + selected_product_value);
						//var companyNameVal = product_company.selected_product_value;
						var companyNameVal = product_company[selected_product_value];
								//alert("comp name" + companyNameVal);
								
						//var companyNameVal = "Generic";
						var order_IdVal = $("#orderId").val();
						var companyVal = "no";
						var reportingemailVal = "";
						var phoneVal = $("#phone_number").val(); 
						//alert("coming to mobile registration function" + phoneVal);
						var action = "web : user registration activity";
						var countryNameValue = $("#country_select_id").val();
						var provinceNameValue = "";
						 provinceNameValue = $("#province_select_id").val();
						 alert("first -"+provinceNameValue);
						 if((provinceNameValue == "null") || (provinceNameValue == null) || (provinceNameValue == "undefined")){
							 provinceNameValue = "";
						 }
						alert("first2 -"+provinceNameValue);
						var markersun = { Data :[{ firstname:firstNameVal,lastname:lastNameVal,username:generatedusername,password:passwordVal,email:emailVal,mobileType:mobileTypeVal,imei:imeiVal,companyname:companyNameVal,cart:cartVal,mode:modeVal,order_Id:order_IdVal,company:companyVal,reportingemail:reportingemailVal,phone:phoneVal,app_name:companyNameVal,app_version:"",os_version:"",action:action,mobile_model:"",user_name:generatedusername,device_Id:"",countryName:countryNameValue,provinceName:provinceNameValue}]}
						//{Data:[{app_name:companyNameVal,app_version:"",os_version:"",action:action,mobile_model:"",user_name:generatedusername,device_Id:""}]}
						
						storeData(firstNameVal, lastNameVal, generatedusername, passwordVal, emailVal, mobileTypeVal, imeiVal, companyNameVal, cartVal, modeVal, order_IdVal, companyVal, reportingemailVal, phoneVal);
						
						alert(JSON.stringify(markersun));
						//console.log(JSON.stringify(markersun));
						//return false;
						$.ajax({
							url: presernt_mobile_registration_url,							
							method: "POST",
							 async:false,
							data: JSON.stringify(markersun),
							dataType: 'json',
							contentType: "application/json",
							success: function(response, results,jqXHR){
								alert(JSON.stringify(response));								
								var resultStatus = response.results.status;
								mobileRegistrationCheck = "no";
								if(resultStatus == "00"){
									mobileRegistrationCheck = "yes";
									//alert(JSON.stringify(response.results.reponse));
								} else {
									mobileRegistrationCheck = "no";
									//alert(JSON.stringify(response.results.result));
									//return false;									
								}
								//activityLog(resultStatus);
							},		
							error: function(ts){
								mobileRegistrationCheck = "no";
								alert(JSON.stringify(ts));
								//return false;
							}						
						});
						
						return false;
				}
				
				function getCountries(regulation) {
					
					//e.preventDefault();
					$('#country_select_id').empty();
					if(regulation == 1){
						presernt_countries_get_url = baseServiceUrlUs + getCountryDetailsapi;
					}else if(regulation == 2){
						presernt_countries_get_url = baseServiceUrlCa + getCountryDetailsapi;
					}else{
						alert("Plese Select Regulation");
						return false;
					}
					
					$.ajax({
						url: presernt_countries_get_url,
						method: "GET",
						dataType: 'json',
						contentType: "application/json",
						success: function(response, results,jqXHR){							
							//alert(JSON.stringify(response));
							var optionHTML = "<option value=''>Select Country</option>";
							if(Object.keys(response.results.countryDetails).length) {
								 $.each(response.results.countryDetails, function (key1, value1) {
									optionHTML += '<option value="'+value1['countryName']+'">'+value1['countryName']+'</option>';
								});
							}
							$('#country_select_id').append(optionHTML);
						},		
						error: function(ts){
							alert(JSON.stringify(ts));
						}						
					});
					return false;
				}				
				
				function getProvince(countrySelected) {
					$('#province_select_id').empty();
					var regulation = $('#rule_select_id').val();
					
					//e.preventDefault();
					if(regulation == 1){
						presernt_countries_get_url = baseServiceUrlUs + getCountryDetailsapi;
					}else if(regulation == 2){
						presernt_countries_get_url = baseServiceUrlCa + getCountryDetailsapi;
					}else{
						alert("Plese Select Regulation");
						return false;
					}
					
					var dataString = '{"countryName":'+countrySelected+'}';
					$.ajax({
						url: presernt_countries_get_url,
						method: "POST",
						async:false,
						data: dataString,
						dataType: 'json',
						contentType: "application/json",
						success: function(response, results,jqXHR){							
							//alert(JSON.stringify(response));
							//alert(response.results.status);
							var optionHTML = "";
							if(Object.keys(response.results.provinceDetails).length) {
								
								 $.each(response.results.provinceDetails, function (key1, value1) {
									optionHTML += '<option value="'+value1['provinceName']+'">'+value1['provinceName']+'</option>';
								});
								$('#province_select_id').append(optionHTML);
								$('#province_select_section').show();
							}else{
								
								$('#province_select_section').hide();
							}
							
						},		
						error: function(ts){
							alert(JSON.stringify(ts));
						}						
					});
					return false;
				}
				
				function storeData(firstNameVal, lastNameVal, generatedusername, passwordVal, emailVal, mobileTypeVal, imeiVal, companyNameVal, cartVal, modeVal, order_IdVal, companyVal, reportingemailVal, phoneVal){
				//function storeData(order_IdVal, userData) {
						 
						
						//var dataString = 'orderId='+ order_IdVal+'&username='+ generatedusername;
						var dataString =  'firstname='+ firstNameVal+'&lastname='+ lastNameVal+'&username='+ generatedusername+'&password='+ passwordVal+'&email='+ emailVal+'&mobileType='+ mobileTypeVal+'&imei='+ imeiVal+'&companyname='+ companyNameVal+'&cart='+ cartVal+'&mode='+ modeVal+'&order_Id='+ order_IdVal+'&company='+ companyVal+'&reportingemail='+ reportingemailVal+'&phone='+ phoneVal;
						$.ajax({
							//url:"http://104.238.67.134/DGSMS_US_WS_SERVER_WEB_ANDROID/api/mobile/registrationUpdationLog/0.json",							
							url:"store_data.php",
							method: "POST",
							async:true,
							data: dataString,
							//data: { orderId: order_IdVal, userData: userData },
							//data: { orderId: order_IdVal },
							//data: { orderId: order_IdVal, username: generatedusername, email:emailVal },
							dataType: 'json',
							contentType: "application/json",
							success: function(data){
								//alert(typeof(data));
								////alert(JSON.stringify(data));
								//alert(data);
							},		
							error: function(ts){
								alert(JSON.stringify(ts));
							}						
						});
						return false;
				}
				 function passwordOnChange(){
					 var passwordValue = $("#password").val();
						var n = passwordValue.length;
						if(n!=4){
							$("#divPasswordCheck").html("password must be 4 charecters");
							//$("#password").focus();
							document.getElementById("password").focus();
							$("#divConfirmPasswordCheck").html("");
							passwordValCheck = "no";
						}else{
							$("#divPasswordCheck").html("");
							var confirmPasswordValue = $("#confirm_password").val();
							if(confirmPasswordValue != ""){
								if(passwordValue == confirmPasswordValue){	
									$("#divConfirmPasswordCheck").html("success");
									passwordValCheck = "yes";
								}else{
									$("#divConfirmPasswordCheck").html("confirm password mismatch with password");
									passwordValCheck = "no";
								}
							}
						}
						
				 }
				 function confirmpasswordOnChange(){
					 var passwordValue = $("#password").val();
						var confirmPasswordValue = $("#confirm_password").val();
						var n = passwordValue.length;
						if(n!=4){
							$("#divPasswordCheck").html("password must be 4 charecters");
							//$("#password").focus();
							document.getElementById("password").focus();
							$("#divConfirmPasswordCheck").html("");
							passwordValCheck = "no";
						}else{
							$("#divPasswordCheck").html("");
							if(confirmPasswordValue != ""){
								if(passwordValue == confirmPasswordValue){	
									$("#divConfirmPasswordCheck").html("success");
									passwordValCheck = "yes";								
								}else{
									$("#divConfirmPasswordCheck").html("confirm password mismatch with password");
									passwordValCheck = "no";
								}
							}else{
								passwordValCheck = "no";
							}
						}					
						
						//alert(passwordValCheck);
				 }
				 function emailIdOnChange(){
					 var emailId = $("#email_id").val();
						var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
						if (filter.test(emailId)){
							$("#divEmailCheck").html("");
							emailDuplicateCheck(emailId);
						}
						else{
							$("#divEmailCheck").html("Please input a valid email");
							emailValCheck = "no";
						}
				 }
				 
				 function emailDuplicateCheck(emailId) {
					
					var regulation = $('#rule_select_id').val();
					var email_duplicate_check_url = "";
					//e.preventDefault();
					if(regulation == 1){
						email_duplicate_check_url = baseServiceUrlUs + emailDuplicateCheckApi;
					}else if(regulation == 2){
						email_duplicate_check_url = baseServiceUrlCa + emailDuplicateCheckApi;
					}else{
						alert("Plese Select Regulation");
						emailValCheck = "no";
						return false;
					}
					
					var selected_product_value = document.getElementById('product_select_id').value;
					var appName = "";
					if(selected_product_value == ""){
						alert("Plese Select Product");
						emailValCheck = "no";
						return false;
					}else{
						appName = product_company[selected_product_value];
					}
					var generatedusername = $("#generated_username").val();
					if((generatedusername == "null") || (generatedusername == null) || (generatedusername == "undefined")){
						alert("Plese Provide Username");
						emailValCheck = "no";
						return false;
					 }
					
					//var dataString = '{ "Data" : [{"email" : '+emailId+',"user_name":"","app_name":"landstar or generic" }]}';
					var dataString = '{ "Data" : [{"email" : '+emailId+',"user_name":'+generatedusername+',"app_name":'+appName+' }]}';
					$.ajax({
						url: email_duplicate_check_url,
						method: "POST",
						async:false,
						data: dataString,
						dataType: 'json',
						contentType: "application/json",
						success: function(response, results,jqXHR){							
							alert(JSON.stringify(response));
							var emailResultStatus = response.results.emailStatus;
							if(emailResultStatus == "00"){
								emailValCheck = "yes";
								$("#divEmailCheck").html("success");
							} else {
								emailValCheck = "no";
								$("#divEmailCheck").html("<span style='color:red;'>email already exists</span>");								
							}
							
						},		
						error: function(ts){
							alert(JSON.stringify(ts));
						}						
					});
					return false;
				}
				
				 function phoneNoOnChange(){
					 var p = $("#phone_number").val();
					 var subjectString = p;
					var phoneRegex = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
					//var phoneRegex =  /^[+]?[0-9]{0,1}[-. ]?\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

					if (phoneRegex.test(subjectString)) {
						/*var formattedPhoneNumber =
							subjectString.replace(phoneRegex, "+1 " + "($1) $2-$3");
							alert("valid phone number" + formattedPhoneNumber);*/
							$("#divPhoneCheck").html("");
							phnoValCheck = "yes";
					} else {
						//alert("Invalid phone number");
						$("#divPhoneCheck").html("Please input a valid format");
							phnoValCheck = "no";
					}
					 
					 /*
					 var subjectString = p;
					// var phoneRegex = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
					var phoneRegex =  /^[+]?[0-9]{0,1}[-. ]?\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

					if (phoneRegex.test(subjectString)) {
						var formattedPhoneNumber =
							subjectString.replace(phoneRegex, "($1) $2-$3");
							alert("valid phone number" + formattedPhoneNumber);
					} else {
						alert("Invalid phone number");
					}*/
					 /*
						var phoneRe = /^[2-9]\d{2}[2-9]\d{2}\d{4}$/;
						//var phoneRe = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g;
						var digits = p.replace(/\D/g, "");
						var phoneCheck = phoneRe.test(digits);
						//alert(phoneRe.test(digits));
						if(phoneCheck){
							$("#divPhoneCheck").html("");
							phnoValCheck = "yes";
						}else{
							$("#divPhoneCheck").html("Please input a valid format");
							phnoValCheck = "no";
						}*/
				 }
				 function isAlpha(keyCode)

				{

					return ((keyCode >= 65 && keyCode <= 90) || keyCode == 8 || keyCode == 32 || keyCode == 190)

				}

				$(document).ready(function(){					
					 setRegulationOptions();
					 $("#lang_en_id").hide();	
					 $("#lang_fr_id,#lang_sp_id").show();
					 $("#divPasswordCheck,#divConfirmPasswordCheck").html("");
					 $("#name_on_card,#generated_username,#email_id,#phone_number").val("");
					 
					//http://stackoverflow.com/questions/19849189/js-function-to-allow-enter-only-letters-and-white-spaces
					$("#name_on_card").keypress(function(event){
						var inputValue = event.which;
						// allow letters and whitespaces only.
						if(!(inputValue >= 65 && inputValue <= 122) && (inputValue != 32 && inputValue != 0) && (inputValue != 8)) { 
							event.preventDefault(); 
						}
					});
					
				});
			/*
			
			  $(document).ready(function(e) {				  
				  //alert("hi jquery here");
				  $("#lang_en_id").hide();	
				  $("#lang_fr_id,#lang_sp_id").show();
			  });
			*/ 
		   </script>
<script>
$(function(){

var appendthis =  ("<div class='modal-overlay js-modal-close'></div>");

	$('a[data-modal-id]').click(function(e) {
		e.preventDefault();
    $("body").append(appendthis);
    $(".modal-overlay").fadeTo(500, 0.7);
    //$(".js-modalbox").fadeIn(500);
		var modalBox = $(this).attr('data-modal-id');
		$('#'+modalBox).fadeIn($(this).data());
	});  
  
  
$(".js-modal-close, .modal-overlay").click(function() {
    $(".modal-box, .modal-overlay").fadeOut(500, function() {
        $(".modal-overlay").remove();
    });
 
});
 
$(window).resize(function() {
    $(".modal-box").css({
        top: ($(window).height() - $(".modal-box").outerHeight()) / 2.1,
        left: ($(window).width() - $(".modal-box").outerWidth()) / 3.3
    });
});
 
$(window).resize();
 
});
</script>