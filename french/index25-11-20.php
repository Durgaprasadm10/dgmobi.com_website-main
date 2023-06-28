<!DOCTYPE html>
<html lang="fr">
<?php
/******************************************************************
 * Ideabytes Software India Pvt Ltd.                              *
 * Jayabheri Pine Vally Colony, Gachibowli, HYD                   *
 * Created Date : 20/02/2014                                      *
 * Created By : Venkat                                            *
 * Vision : Project DG MOBI                                       *
 * Modified by : Gayathri D     Date : 21/11/2017    Version :    *
 * Description : DG MOBI Main page                                *
 *****************************************************************/
$language = (isset($_GET["lang"]) && (($_GET["lang"] == "en") || ($_GET["lang"] == "fr") )) ? $_GET["lang"] : "";
if($language == "fr"){
	header("Location: french/");
}

if(isset($_GET['adp'])){
	require "trackerfile.php";
}

$adPublisherUniqueID = filter_input(INPUT_GET, "adp");
if ($adPublisherUniqueID) {
	$siteNameForAds = "dgmobi";
	require_once "../dg_ads_analytics/update_ads_analytics.php";
}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title>DGMobi - Android & iOS solution calculates placarding for HAZMAT/DG LTL loads. Reduce Inspection Time. TDG, 49 CFR available. Free to Inspectors and Qualified Trainers.</title>
               
      <meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>DGMobi – Android Placard Calculator TDG, 49 CFR, ERG</title>
                 
        <meta name="description" content="DGMobi – Android app Truck Drivers, SME. Correct Placarding of HAZMAT/DG for pick up and drop off loads. ERG included. Accepted electronic format in inspections">

        <meta name="keywords" content="Web, Android, Placard, Dangerous, TDG, label, Labels, Segregation, Danger, Trainer, Chemical, Declaration, EGR, hazmat, inspector, Consult, Certfifed, Violation, Regulations, labelling, Out of Service, 49 CFR, French, Spanish, Licencing Terms, Ideabytes, DGSMS,1 888-409-8057, +91-40-6555-5959, 1-613-800-7368,LANDSTAR, LANDSTAR BCO, Business Capacity Owners, LANDSTAR BCO DISCOUNT, Safety Placarding, HRCQ, Highway route control quantities, Permissive Placarding">     
        <!--FORM-->
        <link rel="stylesheet" href="../css/font-awesome.css">
		<link href="../css/dg-buy.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="../css/dg-forms-red.css">
	  <link rel="stylesheet" href="../css/rev-slider.css">
        <link rel="stylesheet" href="../rs-plugin/css/settings.css" media="screen" />    
		<!--[if lt IE 9]>
			<link rel="stylesheet" href="css/sky-forms-ie8.css">
		<![endif]-->
		
		<script src="../js/jquery.min.js"></script>
		<script src="../js/jquery.form.min.js"></script>
		<script src="../js/jquery.validate.min.js"></script>		
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
  color: #333;
  text-decoration: none;
  display: inline;
  border-radius: 4px;
  -webkit-transition: background-color 1s ease;
  -moz-transition: background-color 1s ease;
  transition: background-color 1s ease;
}

.btn:hover {
  background-color: #ce0826;
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
       margin-top: 50px;
    width: 40%;
    margin-left: 214px;
}
}
@media only screen and (max-width: 1600px) {
 .modal-box {
 margin-top: 100px;
    width: 50%;
	  margin-left: 180px;

}
}

@media only screen and (max-width: 1440px) {
 .modal-box {
     margin-top: 100px;
    width: 60%;
	 margin-left: 100px;
}
}

@media only screen and (max-width: 1366px) {
 .modal-box {
    margin-top: 100px;
    width: 60%;
	 margin-left: 50px;
}
}

@media only screen and (max-width: 1280px) {
  .modal-box {
        margin-top: 100px;
    width: 60%;
}
}

@media only screen and (max-width: 1024px) {
  .modal-box {
       margin-top: 100px;
    width: 65%;
}
}

}

@media only screen and (max-width: 768px) {
  .modal-box {
           margin-top: 100px;
    width: 66%;
}
}

@media only screen and (max-width: 767px) {
    .modal-box {
        margin-top: 120px;
    width: 79%;
    margin-left: 0px;
}
}

@media only screen and (max-width: 480px) {
    .modal-box {
 margin-top: 120px;
    width: 92%;
    margin-left: 6px;
}
}
			
.btn-mod.btn-border-w{
  	color: #fff;
  	background: #ce0826;
}
.home-content{
	display: table;
	width: 100%;
	height: 100%;
	text-align: center;
    margin-top: 500px;
	
    /*padding-left: 490px;*/
}
	.page-section,
.small-section{
	width: 100%;
	display: block;	
	position: relative;
    overflow: hidden;
    background-attachment: fixed;
	background-repeat: no-repeat;
	background-position: center center;
    
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
    
    -webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
    
	padding: 15px 0;
}
 .section-title {
        margin-bottom: 15px;
    font-size: 20px;
    font-weight: 400;
    text-transform: uppercase;
    text-align: center;
    letter-spacing: 0.2em;
    line-height: 1.1;
    font-weight: bold;
    text-decoration: underline
}
	.alt-features-title{
     margin-bottom: 15px;
    font-size: 14px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.1em;
	    font-weight: 700;
	
}
.alt-features-descr {
    color: #333;
    font-size: 16px;
    font-weight: 300;
    line-height: 1.86
}
.alt-features-grid{
    margin-top: 10px;
}
.testimonial-author{
color: #fff;
}
	.post-prev-title{
    margin-bottom: 6px;
    font-size: 15px;
    text-transform: uppercase;
    letter-spacing: 0.2em;
	    margin-top: 359px;
}
.post-prev-title a{
        color: #b81c36;
    text-decoration: none;
    font-size: 21px;
    font-weight: 600;
    
    -webkit-transition: all 0.27s cubic-bezier(0.300, 0.100, 0.580, 1.000);  
    -moz-transition: all 0.27s cubic-bezier(0.300, 0.100, 0.580, 1.000); 
    -o-transition: all 0.27s cubic-bezier(0.300, 0.100, 0.580, 1.000);
    -ms-transition: all 0.27s cubic-bezier(0.300, 0.100, 0.580, 1.000); 
    transition: all 0.27s cubic-bezier(0.300, 0.100, 0.580, 1.000);
}
			
.post-prev-text{
    margin-bottom: 22px;
    color: #000;
    font-size: 18px;
    font-weight: 300;
    line-height: 1.75;
}
	.ci-text{
    font-size: 18px;
    font-weight: 300;
}
	.section-title {
        margin-bottom: 15px;
    font-size: 20px;
    font-weight: 400;
    text-transform: uppercase;
    text-align: center;
    letter-spacing: 0.2em;
    line-height: 1.1;
    font-weight: bold;
    text-decoration: underline
}
			.btn-mod.btn-large {
    /* padding: 12px 45px; */
    font-size: 15px;
}
.inner-nav ul {
    float: right;
    margin: auto;
    font-size: 11px;
    font-weight: 500;
    letter-spacing: 1px;
    text-transform: uppercase;
    text-align: center;
    line-height: 1.3;
			}

.btn-mod.btn-large{
  	padding: 12px 30px;
	font-size: 15px;
} 

/* ==============================
   Buttons
   ============================== */
.btn-mod,
a.btn-mod{
    -webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	padding: 4px 13px;
  	color: #fff;
  	background: rgba(34,34,34, .9);
	font-size: 12px;
	/*text-transform: uppercase;*/
	text-decoration: none;
	letter-spacing: 1px;
    
	-webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-radius: 0;
	
	-webkit-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);  
    -moz-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000); 
    -o-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);
    -ms-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000); 
    transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);
}

.btn-mod:focus,

a.btn-mod:focus{
	color: rgba(255,255,255);
  	background: #e41919;
font-weight: 600;
}
.btn-mod:active{
	cursor: pointer !important;
	font-weight: 600;
	border: 2px solid #d3d3d3;
}

.btn-mod.btn-small{
  	padding: 6px 17px;
	font-size: 11px;
    letter-spacing: 1px;
} 
.btn-mod.btn-medium{
  	padding: 8px 14px;
	font-size: 14px;
} 
.btn-mod.btn-large{
  	padding: 12px 30px;
	font-size: 15px;
} 

.btn-mod.btn-glass{
  	color: rgba(255,255,255, .75);
  	background: rgba(0,0,0, .40);
}
.btn-mod.btn-glass:hover,
.btn-mod.btn-glass:focus{
  	color: rgba(255,255,255, 1);
  	background: rgba(0,0,0, 1);
}

.btn-mod.btn-border{
  	color: #151515;
	border: 2px solid #151515;
  	background: transparent;
}
.btn-mod.btn-border:hover,
.btn-mod.btn-border:focus{
  	color: #fff;
	border-color: transparent;
  	background: #000;
}

.btn-mod.btn-border-c{
  	color: #e41919;
	border: 2px solid #e41919;
  	background: transparent;
}
.btn-mod.btn-border-c:hover,
.btn-mod.btn-border-c:focus{
  	color: #fff;
	border-color: transparent;
  	background: #e41919;
}

.btn-mod.btn-border-w{
  	color: #fff;
  	background: #ce0826;
	/*border: 2px solid rgba(255,255,255, .75)*/
}
.btn-mod.btn-border-w:hover{
  	color: #ce0826;
  	background: #fff;
}
..btn-mod.btn-border-w:focus{
	color: #ce0826;
	font-weight: 500;
	border: 2px solid #333;
  	background: #fff;
}

.btn-mod.btn-w{
  	color: #FFF;
  	background: rgb(184, 28, 54);
}
.btn-mod.btn-w:hover,
.btn-mod.btn-w:focus{
  	color: #111;
  	background: #fff;
}

.btn-mod.btn-w-color{
  	color: #e41919;
  	background: #fff;
}
.btn-mod.btn-w-color:hover,
.btn-mod.btn-w-color:focus{
	color: #151515;
  	background: #fff;
}

.btn-mod.btn-gray{
  	color: #777;
  	background: #e5e5e5;
}
.btn-mod.btn-gray:hover,
.btn-mod.btn-gray:focus{
  	color: #444;
  	background: #d5d5d5;
}

.btn-mod.btn-color{
  	color: #fff;
  	background: #e41919;
}
.btn-mod.btn-color:hover,
.btn-mod.btn-color:focus{
  	color: #fff;
  	background: #e41919;
    opacity: .85;
}

.btn-mod.btn-circle{
	-webkit-border-radius: 30px;
	-moz-border-radius: 30px;
	border-radius: 30px;
}
.btn-mod.btn-round{
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	border-radius: 2px;
}
.btn-icon{
	position: relative;
    border: none;
    overflow: hidden;
}
.btn-icon.btn-small{
	overflow: hidden;
}
.btn-icon > span{
	width: 100%;
	height: 50px;
	line-height: 50px;
	margin-top: -25px;
	position: absolute;
	top: 50%;
	left: 0;
	color: #777;
	font-size: 48px;
	opacity: .2;
	
	-webkit-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);  
    -moz-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000); 
    -o-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);
    -ms-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000); 
    transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);
}
.btn-icon:hover > span{
	opacity: 0;
    
    -webkit-transform: scale(2);
    -moz-transform: scale(2);
    -o-transform: scale(2);
    -ms-transform: scale(2);
    transform: scale(2);
}
.btn-icon > span.white{
    color: #fff;
}
.btn-icon > span.black{
    color: #000;
}
.btn-full{
	width: 100%;

}
a:focus, a:hover {
    color: #b81c36;
    text-decoration: underline;
}

a {
    color: #000000;
	text-decoration: underline;}

</style>
	
	   
            
            
            <!-- Home Section -->
            <div class="home-section fullscreen-container" id="home">
                <div class="fullscreenbanner bg-dark">
                    <ul>
                        
                        <!-- Slide Item -->
                        <li data-transition="fade" data-slotamount="7" data-title="Intro Slide">
                            
                            <img src="images/banner1.jpg" alt="">
                            
                            
                                <div class="caption customin customout tp-resizeme" 
                                   data-x="center" 
                                   data-hoffset="100" 
                                   data-y="center" 
                                   data-voffset="150" 
                                   data-customin="x:50;y:150;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;" 
                                   data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
                                   data-speed="800" 
                                   data-start="1500" 
                                   data-startslide="1" 

                                   data-easing="Power4.easeOut" 
                                   data-endspeed="500" 
                                   data-endeasing="Power4.easeIn">
                                    
                                   <div class="local-scroll">
                                    
                                         <a href="class="js-open-modal" href="#" data-modal-id="popup1"" class="btn btn-mod btn-border-w btn-large">Acheter Maintenant</a>
                                    
                                        
                                    </div>
                                   
                                </div>
                                            
                        </li>
                        <!-- End Slide Item -->
                        
                        
                         <!-- Slide Item -->
                        <li data-transition="fade" data-slotamount="7" data-title="Christmas 2020 Offer">
                            
                            <img src="images/christmas2020.jpg"  alt="christmas 2020 Offer">
                            
                                
                                <div class="caption customin customout tp-resizeme" 
                                   data-x="center" 
                                   data-hoffset="0" 
                                   data-y="center" 
                                   data-voffset="215" 
                                   data-customin="x:50;y:150;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;" 
                                   data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
                                   data-speed="800" 
                                   data-start="1500" 
                                   data-startslide="1" 

                                   data-easing="Power4.easeOut" 
                                   data-endspeed="500" 
                                   data-endeasing="Power4.easeIn">
                                    
                                   <div class="local-scroll">
                                    
                                        <a href="https://dgmobi.com/santaspot/landstar-dgmobi_buy_now.php?unique=" class="btn btn-mod btn-border-w btn-large">Acheter Maintenant</a>
                                    
                                        
                                        <span>&nbsp;</span>
                                        
                                    <!--<a href="https://youtu.be/O0SNF4LKR8E" class="btn btn-mod btn-border-w btn-large lightbox mfp-iframe">Play Reel</a>-->
                                        
                                    </div>
                                   
                                </div>
                                            
                        </li>
                        <!-- End Slide Item -->
                        
                        
                     
                
                    
                    </ul>
                    <div class="tp-bannertimer tp-bottom"></div> 
                </div>
            </div>
            <!-- End Home Section -->
            
            
            
            
            <!-- steps Section -->
            <section class="page-section">
                <div class="container relative">
                    
                    <h2 class="section-title font-alt mb-70 mb-sm-40" style="margin-bottom: 40px;" >
                        
Augmentez votre potentiel de transport HAZMAT avec DGMobi
                       
                    </h2>
                    
                    <div class="row multi-columns-row">
                        
                        <!-- Post Item -->
                        <div class="col-sm-6 col-md-4 col-lg-4 mb-md-50 wow fadeIn" style="background: url(images/step1.png) no-repeat; height: 615px; padding: 18px 124px 27px 32px;">
                            
                            
                            
                            <div class="post-prev-title font-alt">
                                <a>Téléchargez l'appli</a>
                            </div>
                                                                                   
                            <div class="post-prev-text">
                                
L'application est disponible pour les appareils Android et iOS
                            </div>
                            
                            <div class="post-prev-more">
                                <a href="https://www.youtube.com/watch?v=uBPaZ7chDGY" class="lightbox mfp-iframe">Apprendre encore plus <i class="fa fa-angle-right"></i></a>
                            </div>
                            
                        </div>
                        <!-- End Post Item -->
                        
                        <!-- Post Item -->
                          <div class="col-sm-6 col-md-4 col-lg-4 mb-md-50 wow fadeIn" style="background: url(images/step2.png) no-repeat; height: 615px; padding: 18px 141px 27px 32px;">
                            
                           
                            <div class="post-prev-title font-alt">
                                <a>Achetez la licence
</a>
                            </div>
                            
                            
                            
                            <div class="post-prev-text">
                                Prix agressifs, avec des offres spéciales d'entreprise
  <br>

                            </div>
                            
                            <div class="post-prev-more">
                               <a href="https://www.youtube.com/watch?v=uBPaZ7chDGY" class="lightbox mfp-iframe">Apprendre encore plus <i class="fa fa-angle-right"></i></a>
                            </div>
                            
                        </div>
                        <!-- End Post Item -->
                        
                        <!-- Post Item -->
                          <div class="col-sm-6 col-md-4 col-lg-4 mb-md-50 wow fadeIn" style="background: url(images/step3.png) no-repeat; height: 615px; padding: 18px 124px 27px 32px;">
                          
                            
                            <div class="post-prev-title font-alt">
                                <a>Profitez de la qualité
</a>
                            </div>
                            
                          
                            
                            <div class="post-prev-text">
                                
Précision imbattable dans la conformité des plaques. Bonus - ERG

                            </div>
                           
                            <div class="post-prev-more">
                                <a href="https://www.youtube.com/watch?v=uBPaZ7chDGY" class="lightbox mfp-iframe">
Apprendre encore plus <i class="fa fa-angle-right"></i></a>
                            </div>
                            
                        </div>
                        <!-- End Post Item -->
                        
                    </div>
                    
                </div>
            </section>
            <!-- End steps Section -->
	
            
          
            
            <!-- Features Section -->
            <section class="page-section bg-gray">
                <div class="container relative">
                    
                    <h2 class="section-title font-alt mb-20 mb-sm-40">
                        À l'intérieur de l'application DGMobi

                    </h2>
                    
                    <!-- Features Grid -->
                    <div class="row multi-columns-row alt-features-grid">
                        
                        <!-- Features Item -->
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="alt-features-item align-left">
                                  <div class="align-center"><img src="images/renew.png" width="150" height="150"/></div>
                                <h3 class="alt-features-title font-alt">Réglementations HAZMAT toujours à jour </h3>
                                <div class="alt-features-descr align-left">
                                   
Surveillance constante des modifications, même mineures, de la documentation réglementaire 
                                </div>
                            </div>
                        </div>
                        <!-- End Features Item -->
                        
                        <!-- Features Item -->
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="alt-features-item align-left">
                                 <div class="align-center"><img src="images/pocket.png" width="150" height="150" alt="All the HAZMAT 
									regulations in your pocket"/></div>
                                <h3 class="alt-features-title font-alt">Toutes les réglementations HAZMAT dans votre poche </h3>
                                <div class="alt-features-descr align-left">
                                   
Robuste et très efficace
technologies qui transfèrent des tonnes
des réglementations HAZMAT en
une application conviviale
                                </div>
                            </div>
                        </div>
                        <!-- End Features Item -->
                        
                        <!-- Features Item -->
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="alt-features-item align-left">
                               <div class="align-center"><img src="images/alarm.png" width="150" height="150" alt="Incorporated Emergency 
									Response Guide"/></div>
                                <h3 class="alt-features-title font-alt">Guide d'intervention d'urgence intégré
 </h3>
                                <div class="alt-features-descr align-left">
                                  
Guide d'intervention d'urgence
un livre lourd qui se trouve à côté
le pilote est maintenant disponible
sur DGMobi ™
                                </div>
                            </div>
                        </div>
                        <!-- End Features Item -->
                        
                        <!-- Features Item -->
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="alt-features-item align-left">
                               <div class="align-center"><img src="images/cloud_storage.png" width="150" height="150" alt="Cloud based 
									record keeping"/> </div>
                                <h3 class="alt-features-title font-alt">
Basé sur le cloud
tenue de registres</h3>
                                <div class="alt-features-descr align-left">
                                    Toutes les transactions sur
DGMobi ™ sont maintenus dans
le cloud pendant 3 ans aussi longtemps
car le DGMobi ™ est valide
                                </div>
                            </div>
                        </div>
                        <!-- End Features Item -->
                        
                        <!-- Features Item -->
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="alt-features-item align-left">
                               <div class="align-center"><img src="images/placard.png" width="150" height="150" alt=""/> </div>
                                <h3 class="alt-features-title font-alt">Modes de placardage
</h3>
                                <div class="alt-features-descr align-left">
                                    
DGMobi ™ fournit le
mode d'affichage permissif
avec 3 niveaux de placardage
optimisation: 1) optimisé,
2) semi-optimisé et
3) non optimisé
                                </div>
                            </div>
                        </div>
                        <!-- End Features Item -->
                        
                        <!-- Features Item -->
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="alt-features-item align-left">
                                <div class="align-center"><img src="images/custom.png" width="150" height="150" alt=""/> </div>                                
                                <h3 class="alt-features-title font-alt">Personnalisation illimitée
</h3>
                                <div class="alt-features-descr align-left">
                                    
DGMobi ™ est disponible pour les entreprises avec des logos personnalisés et un point central de collecte de données qui peut être synchronisé avec une copie locale de DGSMS<sup>®</sup> 
                              </div>
                            </div>
                        </div>
                        <!-- End Features Item -->
                        
                    </div>
                    <!-- End Features Grid -->
                
                </div>
            </section>
            <!-- End Features Section -->
            
            
	<!-- Testimonials Section -->
            <section class="page-section bg-dark bg-dark-alfa-90 fullwidth-slider">
                
                <!-- Slide Item -->
                <div>
                    <div class="container relative">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 align-center mb-40">
                                <!-- Section Icon -->
                                <div class="section-icon">
                                    <img src="images/quotation-mark.png" width="40" height="40" alt="quotation-mark"/>
                                </div>
                                <!-- Section Title --><h3 class="small-title font-alt">Que disent les gens?
</h3>
                                <blockquote class="testimonial white mb-20">
                                    <p>
                                        
impressionnant! J'adore cette application DGMobi me fait gagner beaucoup de temps, gérée rapidement et efficacement.
                                    </p>
                                    <footer class="testimonial-author">
                                      
ENRICO BIRTO - OPTIMUSLOGISTICS LLC - UTILISATEUR IOS.
                                    </footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Slide Item -->
                
                <!-- Slide Item -->
                <div>
                    <div class="container relative">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 align-center mb-30">
                                <!-- Section Icon -->
                                <div class="section-icon">
                                    <img src="images/quotation-mark.png" width="40" height="40" alt="quotation-mark"/>
                                </div>
                                <!-- Section Title --><h3 class="small-title font-alt">Que disent les gens?</h3>
                                <blockquote class="testimonial white mb-20">
                                    <p>
                                     J'aime vraiment l'application. C'est simple à utiliser. C'est un outil particulièrement utile si plusieurs matières dangereuses sont transportées. Un moyen simple et rapide de vous assurer que vous êtes conforme. Un service extrêmement utile qui est rafraîchissant à obtenir ces jours-ci. Merci beaucoup d'avoir développé cette application et de l'avoir rendue très abordable.

                                    </p>
                                    <footer class="testimonial-author">
                                      
LAURA BEATTY - UTILISATEUR ANDROID
                                    </footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Slide Item -->
                
                <!-- Slide Item -->
                <div>
                    <div class="container relative">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 align-center mb-30">
                                <!-- Section Icon -->
                                <div class="section-icon">
                                   <img src="images/quotation-mark.png" width="40" height="40" alt="quotation-mark"/>
                                </div>
                                <!-- Section Title --><h3 class="small-title font-alt">Que disent les gens?</h3>
                                <blockquote class="testimonial white mb-20">
                                    <p>
                                       Je suis très heureux de recevoir un service client aussi rapide et merveilleux de votre part et de votre équipe. Je suis vraiment satisfait de l’application DG Mobi pour iPhone. C'est une application très simple et facile à utiliser sur laquelle je peux compter. Encore une fois, je tiens à vous remercier pour votre produit et votre service client rapide.

                                    </p>
                                    <footer class="testimonial-author">
                                        VIRGINIJUS NAVICKAS - UTILISATEUR IOS.
                                    </footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Slide Item -->
				
				  <!-- Slide Item -->
                <div>
                    <div class="container relative">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 align-center mb-30">
                                <!-- Section Icon -->
                                <div class="section-icon">
                                    <img src="images/quotation-mark.png" width="40" height="40" alt="quotation-mark"/>
                                </div>
                                <!-- Section Title --><h3 class="small-title font-alt">Que disent les gens?</h3>
                                <blockquote class="testimonial white mb-20">
                                    <p>
                                       Nous avons installé le DGMobi pour nos envois dangereux et le trouvons très utile. Nous avons eu quelques questions et le service client (Sridevi Akurathi) a aidé à répondre à toutes nos questions.

                                    </p>
                                    <footer class="testimonial-author">
                                        DALLAS WOOD - UTILISATEUR IOS.
                                    </footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Slide Item -->
                
            </section>
            <!-- End Testimonials Section -->
	
            <!-- Contact Section -->
            <section class="page-section" id="contact" style= background-image:url("images/home-contact-bg.jpg")>
                <div class="container relative">
                    
                    <h2 class="section-title font-alt mb-70 mb-sm-40">
                        Contact
                    </h2>
                    
                    <div class="row">
                        
                        <div class="col-md-8 col-md-offset-2">
                            <div class="row">
                                
                                <!-- Phone -->
                                <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                                    <div class="contact-item">
                                        <div class="ci-icon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="ci-title font-alt">
                                            Appelez-nous

                                        </div>
                                        <div class="ci-text">
                                            USA (Toll Free)<br>							
                               +1 888-409-8057
                                        </div>
                                    </div>
                                </div>
                                <!-- End Phone -->
                                
                                <!-- Address -->
                                <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                                    <div class="contact-item">
                                        <div class="ci-icon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <div class="ci-title font-alt">
                                            Adresse
                                        </div>
                                        <div class="ci-text">
                                            411 Legget Dr., Suite 500,<br>Ottawa, ON, K2K 3C9,<br>Canada
                                        </div>
                                    </div>
                                </div>
                                <!-- End Address -->
								   <!-- Address -->
                                <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
									  <div class="contact-item">
                                        <div class="ci-icon">
                                            <i class="fa fa-building"></i>
                                        </div>
                                        <div class="ci-title font-alt">
                                            Bureau
                                        </div>
                                        <div class="ci-text">
                                             <img src="images/ideabytes.png" alt="Ideabytes"/> 
                                        </div>
                                    </div>
                                  
                                </div>
                                <!-- End Address -->
                                
                                
                                
                            </div>
                        </div>
                        
                    </div>
                  
                </div>
            </section>
            <!-- End Contact Section -->
            
            
           
        
                          
    <?php
	$path = $_SERVER['DOCUMENT_ROOT'];
	include_once('constants.php');
	include_once('dbconfig.php');
	$uniqIdForOrder = uniqid();
	
	/*echo "**************";
	var_dump($env_var);
	var_dump($paypalURL);
	echo "$$$$$$$$$$$$**************";	
	echo "#####################" .$paypalURL;*/
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
							<input type="hidden" name="currency_code" id="currency_code" value="USD">
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
										<select id="device_select_id" required>
											
										</select>
										<i></i>
									</label>
								</section>
								</div> 
                    <section>
						<label class="label" id="select_product_label">Select Product</label>
						<label class="select">
							<select id="product_select_id" onchange="setProductOptions()" required>
								                 
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
                          <a href="http://dgsms.ca/licensing-terms.php" target="_blank" id="terms_anchortag">I Accept Terms and Conditions</a></label>
					</section>
                    </div>
					
					
					
				</fieldset>			
				
				<footer>
					<p style="float:left;"><span id="footer_notes_text">For volume sales – please contact</span> <a href="mailto:sales@dgsmsusa.com">sales@dgsmsusa.com</a></p>
					
					<button type="submit" class="button" id="buy_now_button_text">Buy Now</button>
					<span id="loader_span_id"> </span>
					 
				</footer>
				
				
			</form>

  
</div>
<!-- Price Display MODAL -->
<div class="modal fade" id="price_details_display_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <h3>App Purchase Details</h3>
					<h4>Amount</h4>
                    <div class="row" id="price_details_html_div">
                        
                    </div>
                    <p>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </p>
                    <span id="accept-message"></span>
                </center>
            </div>
        </div>
    </div>
</div>
<!-- END OF Price Display MODAL -->
		
			<?php
			include "footer.php";
			//include "footer_without_analytics.php";
			?>
			<script type="text/javascript"> 
			var envVar = "<?php echo $envVar; ?>";
			//alert(envVar);
			var baseServiceUrlUs = "<?php echo $baseServiceUrlUs; ?>";
			var baseServiceUrlCa = "<?php echo $baseServiceUrlCa; ?>";			
				
			var getCountryDetailsapi = "<?php echo $getCountryDetailsapi; ?>";
			var verifyUserExistOrNotForCartApi = "<?php echo $verifyUserExistOrNotForCartApi; ?>";
			var mobileRegistrationApi = "<?php echo $mobileRegistrationApi; ?>";
			var emailDuplicateCheckApi = "<?php echo $emailDuplicateCheckApi; ?>";
			var getPriceApi = "<?php echo $getPriceApi; ?>";
			var getProductsForDispalyApi = "<?php echo $getProductsForDispalyApi; ?>";
			
			var presernt_countries_get_url = "";
			var passwordValCheck = "no"; var emailValCheck = "no"; var phnoValCheck = "no"; 
			var mobileRegistrationCheck = "no";var storeDataInDb = "no";			
			var gotProductPrice = "no"; var gotPriceForPaypal = "no";
			var productSelectIdText ="";
			
			var priceOfProductWithTax = 0;
			var actualproductId = "";
			var currencyOfProductPrice = "";
			var amountDisplayAlertText = "";
			
			var cfrUsaOptionText = "<?php echo $cfrUsaOptionText; ?>";
			var tdgCaOptionText = "<?php echo $tdgCaOptionText; ?>";

			var cfrUsaOptionValue = "<?php echo $cfrUsaOptionValue; ?>";
			var tdgCaOptionValue = "<?php echo $tdgCaOptionValue; ?>";
			
			var andriodDeviceOptionText = "<?php echo $andriodDeviceOptionText; ?>";
			var iosDeviceOptionText = "<?php echo $iosDeviceOptionText; ?>";

			var andriodDeviceOptionValue = "<?php echo $andriodDeviceOptionValue; ?>";
			var iosDeviceOptionValue = "<?php echo $iosDeviceOptionValue; ?>";

			var mobileTypeValForAndriod = "<?php echo $mobileTypeValForAndriod; ?>"; //"0"
			var mobileTypeValForIos = "<?php echo $mobileTypeValForIos; ?>"; //"1"

			var modeValForUsa = "<?php echo $modeValForUsa; ?>";  //"CFR"
			var modeValForCa = "<?php echo $modeValForCa; ?>"; //"TDG"

			var cartValue = "<?php echo $cartValue; ?>"; //"1"
			var actionLogValue = "<?php echo $actionLogValue; ?>";  //"web : user registration activity"
			var companyValue = "<?php echo $companyValue; ?>";  //"no";
			var resultStatusOO = "<?php echo $resultStatusOO; ?>";  //"00";
			
		    /**
			 * Use to validate form, called when buy now(submit) clicked
			 * @returns {boolean}
			 */
			function validateForm(){
				$('#loader_span_id').html('<div class="all-videos-loader">'
				+ '<img src="loader.svg">'
				+ '</div>');
				//alert("calling from form submit");
				
				var termsCheckboxValue = document.getElementById("terms_conditions_checkbox").checked;
				//alert(termsCheckboxValue);
                if(termsCheckboxValue){
					//return true;
				}else{
					alert("please accept terms and conditions");
					$('#loader_span_id').html("");
					return false;
				}
				//alert(passwordValCheck);
				passwordOnChange();
				if(passwordValCheck == "yes"){
					//return true;
				}else{
					$('#loader_span_id').html("");
					return false;
				}
				//alert("passwordOnChange done");
				emailIdOnChange();
				if(emailValCheck == "yes"){
					
				}else{
					$('#loader_span_id').html("");
					return false;
				}
				//alert("email done");
				phoneNoOnChange();
				if(phnoValCheck == "yes"){
					
				}else{
					$('#loader_span_id').html("");
					return false;
				}
				//alert("phnoValCheck done");
				//call mobile registration api before going to paypal
				mobileRegistration();
				//alert(mobileRegistrationCheck);
				//return false;
				if(mobileRegistrationCheck == "yes"){
					getPriceForProduct();
					if(gotPriceForPaypal == "yes"){
					}else{
						$('#loader_span_id').html('');
						alert("There is a problem to get the price of the selected product, pls try again.");
						//location.reload();
						return false;
					}
				}else{
					$('#loader_span_id').html('');
					alert("There is a problem to register user, pls try again");
					return false;
				}
				$('#loader_span_id').html('');
				//return false;
			}
			
			/**
			 * Use to set options for regulations, called when page is loaded
			 * @returns {no return value}
			 */
			function setRegulationOptions(){
				document.getElementById('rule_select_id').innerHTML = "";
				document.getElementById('rule_select_id').innerHTML = "<option value='' selected>select</option><option value='"+cfrUsaOptionValue+"'>"+cfrUsaOptionText+"</option><option value='"+tdgCaOptionValue+"'>"+tdgCaOptionText+"</option>";
			}
			
			/**
			 * Use to set options for devices select menu, called when page is loaded
			 * @returns {no return value}
			 */
			 function setDeviceOptions(selectedRule)
			  { 
				//alert("onchange called " + selectedRule);
				var selected_rule_value = document.getElementById('rule_select_id').value;
				var selected_device_value = document.getElementById('device_select_id').value;
				
				document.getElementById('device_select_id').innerHTML = "";
				/*
				if(selectedRule == cfrUsaOptionValue){
					document.getElementById('device_select_id').innerHTML = "<option value=''>select</option><option value='"+andriodDeviceOptionValue+"'>"+andriodDeviceOptionText+"</option>";
				}else{
					document.getElementById('device_select_id').innerHTML = "<option value=''>select</option><option value='"+andriodDeviceOptionValue+"'>"+andriodDeviceOptionText+"</option><option value='"+iosDeviceOptionValue+"'>"+iosDeviceOptionText+"</option>";
				}
				*/
				document.getElementById('device_select_id').innerHTML = "<option value=''>select</option><option value='"+andriodDeviceOptionValue+"'>"+andriodDeviceOptionText+"</option><option value='"+iosDeviceOptionValue+"'>"+iosDeviceOptionText+"</option>";
				getProductsForDisplay();
				getCountries(selectedRule);
				$("#email_id").val("");
				$("#divEmailCheck").html("");
			  }
			  
			 /**
			 * Use to set email value empty, called when Select Product menu changes
			 * @returns {no return value}
			 */
			  function setProductOptions(){
				 $("#email_id").val("");
				 $("#divEmailCheck").html("");
			  }

			 /**
			 * Use to set values to the hidden fields of paypal form
			 * @param {string} productId
			 * @param {number} productAmount
			 * @param {string} currencyCode
			 * @returns {no return value}
			 */
			  function setValuesForForm(productId, productAmount, currencyCode){
					var productSelectIdText = $("#product_select_id option:selected").text();
					$("#item_name").val(productSelectIdText);
					$("#item_number").val(productId);
					$("#amount").val(productAmount);								
					$("#currency_code").val(currencyCode);
			  }
			  
			 /**
			 * Use to generate username, It will reverse the words in the name on card text box
			 * and duplicate check will be done by using Web Service call, if duplicate found the web service will suggest a new username.			 
			 * @returns {no return value}
			 */
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
			  
			 /**
			 * This is a webservice call for the username duplicate check		 
			 * @returns {no return value}
			 */
				function VerifyUsername() {
				//e.preventDefault();
					var presernt_verifi_url = "";
					var regulation = $('#rule_select_id').val();
					

					if(regulation == cfrUsaOptionValue){
						presernt_verifi_url = baseServiceUrlUs + verifyUserExistOrNotForCartApi;
					}else if(regulation == tdgCaOptionValue){
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
									$("#divrespCheckUname").html("<span style='color:green;'>success</span>");
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
				
				/**
				 * This is a webservice call for user registration		 
				 * @returns {no return value}
				 */
				function mobileRegistration() {
					//alert("coming here for mobileRegistration()");
				//e.preventDefault();
					var presernt_mobile_registration_url = "";
					
					var regulation = $('#rule_select_id').val();
					
					var modeVal = "";
					if(regulation == cfrUsaOptionValue){
						presernt_mobile_registration_url = baseServiceUrlUs + mobileRegistrationApi;
						modeVal = modeValForUsa;
					}else if(regulation == tdgCaOptionValue){
						presernt_mobile_registration_url = baseServiceUrlCa + mobileRegistrationApi;
						modeVal = modeValForCa;
					}else{
						alert("Plese Select Regulation");
						return false;
					}
				//	alert("present registration url = " + presernt_mobile_registration_url);
						
						
						var nameOnCard = $("#name_on_card").val();
						
					    var tempName = nameOnCard.split(" "); 
						var firstNameVal = "";
						var lastNameVal = "";
						if(tempName[0]){
							firstNameVal = tempName[0];
						}
						if(tempName[1]){
							lastNameVal = tempName[1];
						}
						
						var generatedusername = $("#generated_username").val();
						var passwordVal = $("#password").val();
						var emailVal = $("#email_id").val();
						var mobileTypeVal = "";
						var selected_device_value = document.getElementById('device_select_id').value;
						if(selected_device_value == andriodDeviceOptionValue){
							mobileTypeVal = mobileTypeValForAndriod;
						}else{
							mobileTypeVal = mobileTypeValForIos;
						}
						
						var imeiVal = "";						
						var cartVal = cartValue;
						
						var selected_product_value = document.getElementById('product_select_id').value;
						
						var companyNameVal = selected_product_value;
						var order_IdVal = $("#orderId").val();
						var companyVal = companyValue;
						var reportingemailVal = "";
						var phoneVal = $("#phone_number").val(); 
						//alert("coming to mobile registration function" + phoneVal);
						var action = actionLogValue;
						var countryNameValue = $("#country_select_id").val();
						var provinceNameValue = "";
						 provinceNameValue = $("#province_select_id").val();
						// alert("first -"+provinceNameValue);
						 if((provinceNameValue == "null") || (provinceNameValue == null) || (provinceNameValue == "undefined")){
							 provinceNameValue = "";
						 }
						//alert("first2 -"+provinceNameValue);
						var dataForRegistration = { Data :[{ firstname:firstNameVal,lastname:lastNameVal,username:generatedusername,password:passwordVal,email:emailVal,mobileType:mobileTypeVal,imei:imeiVal,companyname:companyNameVal,cart:cartVal,mode:modeVal,order_Id:order_IdVal,company:companyVal,reportingemail:reportingemailVal,phone:phoneVal,app_name:companyNameVal,app_version:"",os_version:"",action:action,mobile_model:"",user_name:generatedusername,device_Id:"",countryName:countryNameValue,provinceName:provinceNameValue}]}
						//{Data:[{app_name:companyNameVal,app_version:"",os_version:"",action:action,mobile_model:"",user_name:generatedusername,device_Id:""}]}
						
						var productSelectIdText = $("#product_select_id option:selected").text(); 
						storeData(firstNameVal, lastNameVal, generatedusername, passwordVal, emailVal, mobileTypeVal, imeiVal, companyNameVal, cartVal, modeVal, order_IdVal, companyVal, reportingemailVal, phoneVal);
						
						//alert(JSON.stringify(dataForRegistration));
						//console.log(JSON.stringify(dataForRegistration));
						//return false;
						$.ajax({
							url: presernt_mobile_registration_url,							
							method: "POST",
							 async:false,
							data: JSON.stringify(dataForRegistration),
							dataType: 'json',
							contentType: "application/json",
							success: function(response, results,jqXHR){
							//	alert(JSON.stringify(response));								
								var resultStatus = response.results.status;
								mobileRegistrationCheck = "no";
								if(resultStatus == resultStatusOO){
									mobileRegistrationCheck = "yes";
								//	alert(JSON.stringify(response.results.reponse));
								} else {
									mobileRegistrationCheck = "no";
								//	alert(JSON.stringify(response.results.result));
									//return false;									
								}
							},		
							error: function(ts){
								mobileRegistrationCheck = "no";
							//	alert(JSON.stringify(ts));
								//return false;
							}						
						});
						
						return false;
				}
				
			/**
			 * This is a webservice call to get products for display		 
			 * @returns {no return value}
			 */
				function getProductsForDisplay() {					
					
					$('#product_select_id').empty();
					var regulation = $('#rule_select_id').val();
					var products_display_get_url = "";
					if(regulation == cfrUsaOptionValue){
						products_display_get_url = baseServiceUrlUs + getProductsForDispalyApi;
					}else if(regulation == tdgCaOptionValue){
						products_display_get_url = baseServiceUrlCa + getProductsForDispalyApi;
					}else{
						alert("Plese Select Regulation");
						return false;
					}
					//alert(products_display_get_url);
					
					$.ajax({
						url: products_display_get_url,
						method: "GET",
						dataType: 'json',
						contentType: "application/json",
						success: function(response, results,jqXHR){							
							//alert(JSON.stringify(response));
							var optionHTML = "<option value=''>Select Product</option>";
							if(Object.keys(response.results.countryDetails).length) {
								 $.each(response.results.countryDetails, function (key1, value1) {
									optionHTML += '<option value="'+value1['mobileAppName']+'">'+value1['displayName']+'</option>';
								});
							}
							$('#product_select_id').append(optionHTML);
						},		
						error: function(ts){
							alert(JSON.stringify(ts));
						}						
					});
					return false;
				}
				
				/**
				 * This is a webservice call to get countries for display		 
				 * @returns {no return value}
				 */
				function getCountries(regulation) {
					
					//e.preventDefault();
					$('#country_select_id').empty();
					if(regulation == cfrUsaOptionValue){
						presernt_countries_get_url = baseServiceUrlUs + getCountryDetailsapi;
					}else if(regulation == tdgCaOptionValue){
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
				
				/**
				 * This is a webservice call to get provinces for display		 
				 * @returns {no return value}
				 */
				function getProvince(countrySelected) {
					$('#province_select_id').empty();
					var regulation = $('#rule_select_id').val();
					
					//e.preventDefault();
					if(regulation == cfrUsaOptionValue){
						presernt_countries_get_url = baseServiceUrlUs + getCountryDetailsapi;
					}else if(regulation == tdgCaOptionValue){
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
				
				/**
				 * This will calculate and display the price and taxes information
				 * this function makes webservice call to get the product price info
				 * @returns {no return value}
				 */
				function getPriceForProduct(){
					
					var regulation = $('#rule_select_id').val();
					var get_price_url = "";
					//e.preventDefault();
					if(regulation == cfrUsaOptionValue){
						get_price_url = baseServiceUrlUs + getPriceApi;
					}else if(regulation == tdgCaOptionValue){
						get_price_url = baseServiceUrlCa + getPriceApi;
					}else{
						alert("Plese Select Regulation");
						gotProductPrice = "no";
						return false;
					}
					
					var selected_product_value = document.getElementById('product_select_id').value;
					
					var generatedusername = $("#generated_username").val();
					if((generatedusername == "null") || (generatedusername == null) || (generatedusername == "undefined")){
						alert("Plese Provide Username");
						//emailValCheck = "no";
						return false;
					 }
					
					//var dataString = '{ "Data" : [{"email" : '+emailId+',"user_name":"","app_name":"landstar or generic" }]}';
					var dataString = '{ "Data" : [{"imeinumber" : "", "device_token" : "", "mobile_app_name":'+selected_product_value+', "mobile_model":"ss",  "version":"", "user_name":'+generatedusername+' }]}';
					$.ajax({
						url: get_price_url,
						method: "POST",
						async:false,
						data: dataString,
						dataType: 'json',
						contentType: "application/json",
						success: function(response, results,jqXHR){							
							//alert(JSON.stringify(response));
							var paymentResultStatus = response.results.status;
							amountDisplayAlertText = "App Purchase Details:\n-----------------------------";
							//if(paymentResultStatus == "99"){
								//alert(typeof(response.results.paymentDetails));
								if(Object.keys(response.results.paymentDetails).length) {
								//	alert("length if -- ");
									 $.each(response.results.paymentDetails, function (key1, value1) {
										/*alert(typeof(key1));
										alert(typeof(value1));
										alert(value1["productId"]);
										alert(value1["price"]);
										alert(value1["currency"]);*/
										actualproductId = value1["productId"];
										var actualPriceOfProduct = value1["price"];
										actualPriceOfProduct = parseFloat(Math.round(+actualPriceOfProduct * 100) / 100).toFixed(2);
									    priceOfProductWithTax = actualPriceOfProduct;
										currencyOfProductPrice = value1["currency"];	
										
										amountDisplayAlertText += "\nApp Price -- "+currencyOfProductPrice + " " + actualPriceOfProduct;
										
										//amountDisplayAlertText += "\nAmount -- ("+currencyOfProductPrice+")";
										//alert("actualPriceOfProduct = " + actualPriceOfProduct);
										//alert(typeof(value1["taxInfo"]));
										$.each(value1["taxInfo"], function (key2, value2) {
											//alert(typeof(key2));
											//alert(typeof(value2));
											$.each(value2, function (key3, value3) {
												//alert(typeof(key3));
												//alert(typeof(value3));
												//alert(key3 + value3);												
												var taxAmt = ((+value3) / 100) * (+actualPriceOfProduct);
												taxAmt = parseFloat(Math.round(+taxAmt * 100) / 100).toFixed(2);
												priceOfProductWithTax = (+taxAmt) + (+priceOfProductWithTax);
												//parseFloat(Math.round(num3 * 100) / 100).toFixed(2);
												//alert("taxAmt = " + taxAmt);
												amountDisplayAlertText += "\n"+key3+" ("+value3+"%) -- "+currencyOfProductPrice+ " " +taxAmt;
											});		
										});	
										
									});
									priceOfProductWithTax = parseFloat(Math.round(+priceOfProductWithTax * 100) / 100).toFixed(2);
									amountDisplayAlertText += "\nGrand Total -- "+currencyOfProductPrice + " " + priceOfProductWithTax;
									amountDisplayAlertText += "\n\n Click OK to proceed to payment";
									//alert("priceOfProductWithTax = " + priceOfProductWithTax);
									setValuesForForm(actualproductId, priceOfProductWithTax, currencyOfProductPrice);
									var r = confirm(amountDisplayAlertText);
									if (r == true) {
										gotPriceForPaypal = "yes";
									} else {
										gotPriceForPaypal = "no";
										alert("You registered successfully, but payment was cancelled.");
										location.reload();
									}
								//	alert(txt);
								//	$('#price_details_html_div').append(amountDisplayAlertText);
								//	$('#price_details_display_modal').modal('show');
									
								}else{
									gotPriceForPaypal = "no";
									//alert("length else -- ");
								}
							/*} else{
								gotPriceForPaypal = "no";
								alert("paymentResultStatus else not 99--");
							}*/
							
						},		
						error: function(ts){
							alert(JSON.stringify(ts));
						}						
					});
					return false;
					
				}
				
				/**
				 * This will store all the user data in php related data base for further use
				 * @returns {no return value}
				 */
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
				
				/**
				 * This is a js validation for the password field
				 * @returns {no return value}
				 */
				 function passwordOnChange(){
					 var passwordValue = $("#password").val().trim();
						var n = passwordValue.length;
						if(n!=4){
							$("#divPasswordCheck").html("<span style='color:red;'>Password must be 4 characters</span>");
							//$("#password").focus();
							document.getElementById("password").focus();
							$("#divConfirmPasswordCheck").html("");
							passwordValCheck = "no";
						}else{
							$("#divPasswordCheck").html("");
							var confirmPasswordValue = $("#confirm_password").val().trim();
							if(confirmPasswordValue != ""){
								if(passwordValue == confirmPasswordValue){	
									$("#divConfirmPasswordCheck").html("<span style='color:green;'>Success</span>");
									passwordValCheck = "yes";
								}else{
									$("#divConfirmPasswordCheck").html("<span style='color:red;'>Confirm password mismatch with Password</span>");
									passwordValCheck = "no";
								}
							}
						}
						
				 }
				 
				 /**
				 * This is a js validation for the confirm password field
				 * @returns {no return value}
				 */
				 function confirmpasswordOnChange(){
					 var passwordValue = $("#password").val().trim();
						var confirmPasswordValue = $("#confirm_password").val().trim();
						var n = passwordValue.length;
						if(n!=4){
							$("#divPasswordCheck").html("<span style='color:red;'>Password must be 4 characters</span>");
							//$("#password").focus();
							document.getElementById("password").focus();
							$("#divConfirmPasswordCheck").html("");
							passwordValCheck = "no";
						}else{
							$("#divPasswordCheck").html("");
							if(confirmPasswordValue != ""){
								if(passwordValue == confirmPasswordValue){	
									$("#divConfirmPasswordCheck").html("<span style='color:green;'>Success</span>");
									passwordValCheck = "yes";								
								}else{
									$("#divConfirmPasswordCheck").html("<span style='color:red;'>Confirm password mismatch with Password</span>");
									passwordValCheck = "no";
								}
							}else{
								passwordValCheck = "no";
							}
						}					
						
						//alert(passwordValCheck);
				 }
				 
				 /**
				 * This is a js validation for the email field
				 * @returns {no return value}
				 */
				 function emailIdOnChange(){
					 var emailId = $("#email_id").val().trim();					 
						var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
						if (filter.test(emailId)){
							$("#divEmailCheck").html("");
							emailDuplicateCheck(emailId);
						}
						else{
							$("#divEmailCheck").html("<span style='color:red;'>Please enter a valid email</span>");
							emailValCheck = "no";
						}
				 }
				 
				 /**
				 * This is a js validation for the email field
				 * @returns {no return value}
				 */
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
					var appName = selected_product_value;
					if(selected_product_value == ""){
						alert("Plese Select Product");
						emailValCheck = "no";
						return false;
					}else{
						appName = selected_product_value;
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
							//alert(JSON.stringify(response));
							var emailResultStatus = response.results.emailStatus;
							if(emailResultStatus == "00"){
								emailValCheck = "yes";
								$("#divEmailCheck").html("<span style='color:green;'>Success</span>");
							} else {
								emailValCheck = "no";
								$("#divEmailCheck").html("<span style='color:red;'>Email already exists</span>");								
							}
							
						},		
						error: function(ts){
							alert(JSON.stringify(ts));
						}						
					});
					return false;
				}
				
				
				/**
				 * This is a js validation for the phone number field
				 * @returns {no return value}
				 */
				 function phoneNoOnChange(){
					 var p = $("#phone_number").val().trim();
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
						$("#divPhoneCheck").html("<span style='color:red;'>Please enter a valid phone number</span>");						
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
				 /*
				 function isAlpha(keyCode){
					return ((keyCode >= 65 && keyCode <= 90) || keyCode == 8 || keyCode == 32 || keyCode == 190)
				}*/
				
				/**
				 * This function changes the labels in different languages based on language selection.
				 * @returns {no return value}
				 */
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
					document.getElementById('country_select_label').innerHTML = 'Select Country';
					document.getElementById('province_select_label').innerHTML = 'Select Province';
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
					document.getElementById('country_select_label').innerHTML = 'Choisissez le pays';
					document.getElementById('province_select_label').innerHTML = 'Choisir une province';
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
					document.getElementById('country_select_label').innerHTML = 'Seleccionar país';
					document.getElementById('province_select_label').innerHTML = 'Seleccione la provincia';
					document.getElementById('terms_anchortag').innerHTML = 'Acepto los términos y condicioness';					
					document.getElementById('footer_notes_text').innerHTML = "Para ventas de volumen - por favor contacte";
					document.getElementById('buy_now_button_text').innerHTML = "Compra ahora";
					$("#lang_sp_id").hide();
					$("#lang_fr_id,#lang_en_id").show();
				}
			}

				$(document).ready(function(){					
					 setRegulationOptions();
					// getProductsForDisplay();
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
   <script type="text/javascript" src="../rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="../rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="../js/rev-slider.js"></script>        