<?php
/* * ****************************************************************
 * Ideabytes Software India Pvt Ltd.                              *
 * 50 Jayabheri Enclave, Gachibowli, HYD                          *
 * Created Date : 22/11/2014                                      *
 * Created By : Ravi Teja                                         *
 * Project : DGMobi Landstar Payment                              *
 * Modified by : Ravi Teja     Date : 24/11/2017                  *
 * Version : VB.0.0.2                                             *
 * Description : To display Landstar payment for Santa's Bag      *
 * *************************************************************** */

ini_set('display_errors', TRUE);
error_reporting(E_ALL);

include_once('init.php');

//added by gayathri for santa's pot page view count
$uniqueId = (isset($_GET["unique"]) && ($_GET["unique"] != "")) ? $_GET["unique"] : "";

$transactionHandler = new Transaction();
$santasBagCount = (int) $transactionHandler->getSantasBagValue(); //Get Santa's bag count
$orderId = $transactionHandler->generateOrderId(); //Generate orderId

$banners = $transactionHandler->getBannerImage();
if($banners !=null)
	$banner_image = $banners->banner_imagepath;
else
	$banner_image = "";

$productHandler = new Product();
$productsList = $productHandler->getAll(); //Get all products list

if (Config::CURRENT_ENV == Config::PROD_ENV) { //PRODUCTION
    $baseServiceUrlUs = Config::US_BASE_API_URL_PROD;
    $baseServiceUrlCa = Config::CA_BASE_API_URL_PROD;

    $paypalURL = Config::PAYPAL_LIVE_LINK;
    $paypalID = Config::PAYPAL_LIVE_ID;
} elseif (Config::CURRENT_ENV == Config::TEST_ENV) { //TEST
    $baseServiceUrlUs = Config::US_BASE_API_URL_TEST;
    $baseServiceUrlCa = Config::CA_BASE_API_URL_TEST;

    $paypalURL = Config::PAYPAL_SANDBOX_LINK;
    $paypalID = Config::PAYPAL_SANDBOX_ID;
} else { //DEVELOPMENT
    $baseServiceUrlUs = Config::US_BASE_API_URL_DEV;
    $baseServiceUrlCa = Config::CA_BASE_API_URL_DEV;

    $paypalURL = Config::PAYPAL_SANDBOX_LINK;
    $paypalID = Config::PAYPAL_SANDBOX_ID;
}

$paypalReturnURL = Config::PAYPAL_RETURN_URL;
$paypalCancelURL = Config::PAYPAL_CANCEL_URL;

$getCountriesAPILink = Config::GET_COUNTRY_DETAILS_API;
$getTaxDetailsAPILink = Config::GET_TAX_DETAILS_API;
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>DGMOBI - LANDSTAR</title>

        <meta name="description" content="Diverse large team experienced & focused on creation of end to end solutions for HAZAMT/ DG Shipping. Million+ loads shipped. Quality unparalleled experience">
        <meta name="keywords" content="Landstar, Landstar BCO, DGMobi, 49 CFR, Placard, infraction, TDG, Santa, Santa’s Pot, Ideabytes, Android, iOS, French, Spanish">
        <meta charset="utf-8"/>
        <meta name="robots" content="index, follow">
        <meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="http://dgsms.ca" />
        <link rel="alternate" href="dgsms.ca" hreflang="en-us" />
        <link rel="alternate" href="dgsms/french/" hreflang="fr-fr" /> 
        <meta property="og:title" content="dgsms">
        <meta property="og:site_name" content="dgsms.ca">
        <meta property="og:url" content="http://www.dgsms.ca">
        <meta property="og:description" content="HAZMAT Dangerous Goods SaaS Web & mobile solutions compliant to ADR, TDG, IATA, IMDG, 49 CFR for Air. Road. Sea transport Packaging, SDS services, Declarations, Placards">
        <meta property="fb:app_id" content="dgsmsproducts">
        <meta property="og:type" content="product">
        <meta name="author" content="dg-safety-management-solutions">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- Favicons -->
        <link rel="shortcut icon" href="../images/favicon.png">
        <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="../images/apple-touch-icon-114x114.png">

        <!-- CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style-responsive.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/vertical-rhythm.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/magnific-popup.css">    
        <link rel="stylesheet" href="css/font-awesome.css">
        <link href="css/dg-buy-new2.css" rel="stylesheet" type="text/css">
  
        <!-- Combine and Compress These CSS Files  -->
        <link rel="stylesheet" href="css/globals.css">
        <link rel="stylesheet" href="css/mobile.css">
        <!-- End Combine and Compress These CSS Files -->
        <link rel="stylesheet" href="css/responsive-tables.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/responsive-tables.js"></script>

<script>
var productsList11 = <?php echo json_encode($productsList);?>;
var validatename = "yes";
var pricenow = "24.99";
</script>
        <!-- reponsive form css -->

        <!-- reponsive form css --> 
        <style>
            .count-input {
                position: relative;
                width: 100%;
            }
            .count-input input {
                width: 100%;
                height: 30px;
                border: 0px solid #fff;
                border-radius: 2px;
                background: none;
                text-align: center;
                color: black;
            }
            .count-input input:focus {
                outline: none;
            }
            .count-input .incr-btn {
                display: block;
                position: absolute;
                /*width: 30px;*/
                width: 30%;
                height: 30px;
                font-size: 20px;
                font-weight: 300;
                text-align: center;
                line-height: 30px;
                top: 50%;
                right: 0;
                margin-top: -15px;
                text-decoration:none;
            }
            .count-input .incr-btn:first-child {
                right: auto;
                left: 0;
                top: 46%;
            }
            .count-input.count-input-sm {
                max-width: 125px;
            }
            .count-input.count-input-sm input {
                height: 36px;
            }
            .count-input.count-input-lg {
                max-width: 200px;
            }
            .count-input.count-input-lg input {
                height: 70px;
                border-radius: 3px;
            }
            @-webkit-keyframes blinker {
                from {opacity: 1.0;}
                to {opacity: 0.0;}
            }
            .blink{
                text-decoration: blink;
                -webkit-animation-name: blinker;
                -webkit-animation-duration: 0.6s;
                -webkit-animation-iteration-count:infinite;
                -webkit-animation-timing-function:ease-in-out;
                -webkit-animation-direction: alternate;
            }
            #province_section {
                display:none;
            }
            .quantity {
                border: 1px solid #6698af;
                width: 45%;
            }
            .tax-header {
                padding-left : 5%;
            }
            #submitForm {
                background-color: #328444;
            }
            .purchase-header {
                text-align : left;
            }

            .inc_dec {
                float: left;
                width: 30%;
                height: 40px;
                font-size: 30px;
                font-weight: 500;
                font-family: inherit;
            }


            #languageOptions {
                font-size: 12px;
                color: blue;
            }

            #languageOptions > span {
                margin: 5px;
                cursor: pointer;
            }

            .currentLanguageOption {
                color: red;
            }
        </style>
    </head>
    <body class="appear-animate">
        <!-- Page Loader -->
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>
        <!-- End Page Loader -->

        <!-- Page Wrap -->
        <div class="page" id="top">
            <!-- Home Section -->
            <!-- End Home Section -->
            <!-- Navigation panel -->
            <!-- End Navigation panel -->
            <!-- About Section -->

            <section class="page-section">
                <div class="container relative" style="background-color: #d8e7ee">
		<?php
			if($banner_image !="") {
//images/landstar-dgmobi-web-2019.jpg
		?>
                    <img src="<?php echo $banner_image;?>" alt="DGMobi-logo- Android Based Placard Calculator – that can function stand alone or networked to DGSMS. Compliant to TDG and 49 CFR" width="1170" height="335">
		<?php }?>
                    <div class="row">
                        <div class="col-md-12">
                            <p id="languageOptions" class="pull-right" style="display: none; margin-top:5px;">
                                <span id="languageEnglish">English</span> 
                                <span id="languageSpanish">Espa&ntilde;ol</span> 
                                <span id="languageFrench">Fran&ccedil;ais</span>
                            </p>
                        </div>
                    </div>
                    <div class="container relative" align="center">
                        <div class="text" style="font-size: 20px; color: #000;">
                            <!--
                            Buy a DGMobi Landstar BCO license 
                            <span class="blink" style="color: darkred">
                                <strong>before 25<sup>th</sup> Dec 2017.</strong>
                            </span> 
                            <br>
                            Each purchased license adds 1$ to Santa's Pot.
                            -->
                            <span id="infoFirstLine">
				DGMobi<sup>TM</sup> exclusive offer to Landstar BCOs,  a chance to be a lucky winner of Santa's Pot.
                               <!-- DGMobi<sup>TM</sup> is offering exclusively to Landstar BCOs a chance to be a lucky winner of Santa's Pot.-->
                            </span>
                            <br>
                            <span id="" style="display:none;">
                                Each license purchased before Dec 25, 2020, 
                                adds $1 to Santa's Pot.
                            </span>
                            <span id="infoSecondLine">$150 to the Santa’s Pot Winner. Draw on Dec 31st 2020.</span>
                            <br>
                            <span style="color: darkred">
                                <span id="santasPotAmountText">Santa's Pot buyers count</span>: 
                                <strong><?php echo $santasBagCount; ?></strong>
                            </span>
                        </div>
                    <?php /*    <!--                    <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="text" style="font-size: 20px; color: #000">
                                                        <span style="color: darkred; font-weight: bold;" id="firstPriceText">
                                                            1<sup>st</sup> prize 50% of Santa's Pot
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="text" style="font-size: 20px; color: #000">
                                                        <span style="color: darkred; font-weight: bold;" id="secondPriceText">
                                                            2<sup>nd</sup> prize 30% of Santa's Pot
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>-->
                        <!--                    <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="text" style="font-size: 20px; color: #000">
                                                        <span style="color: darkred; font-weight: bold;" id="thirdPriceText">
                                                            3<sup>rd</sup> prize 10% of Santa's Pot
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="text" style="font-size: 20px; color: #000">
                                                        <span style="color: darkred; font-weight: bold;" id="consolidationPriceText">
                                                            10 Consolation prizes of 1% of Santa's Pot
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>-->
                        <div class="row" style="display:none;">
                            <div class="col-sm-4">
                                <div class="text" style="font-size: 20px; color: #000">
                                    <span style="color: darkred; font-weight: bold;" id="firstPriceText">
                                        1<sup>st</sup> prize <sup>*</sup>$500
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text" style="font-size: 20px; color: #000">
                                    <span style="color: darkred; font-weight: bold;" id="secondPriceText">
                                        2<sup>nd</sup> prize <sup>*</sup>$300
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text" style="font-size: 20px; color: #000">
                                    <span style="color: darkred; font-weight: bold;" id="thirdPriceText">
                                        3<sup>rd</sup> prize <sup>*</sup>$200
                                    </span>
                                </div>
                            </div>
                        </div>  */ ?>
                        <div class="row" style="">
                            <div class="col-sm-12">
                                <span style="color: darkred; font-weight: bold;text-align: left;font-size:20px;" id="">
                                     <span id="conditionText">Subscribe to our Youtube channel to win $50. Winner drawn every month <a href=https://youtu.be/zS3O6WnS95Q>https://youtu.be/zS3O6WnS95Q</a></span>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text" style="font-size: 20px; color: #000;">
                                <!--<p>
                                    Purchased user will get  $50 worth of Training on App usage, support and account related matters.
                                    <br>
                                    DGMobi is fully secured app which protects User location, User Personal details and load contents. 
                                    These details are never shared to any third party for advertising or any other purposes.
                                </p>-->
                                <ul style="text-align:left;">
                                    <li style="font-weight: bold; color: #0022a7;" id="criticalDataText">Unlike free apps, DGMobi<sup>TM</sup> never shares your data with third parties. Eliminate risk of hijack or a terrorism target.</li>
                                    <!--<li id="supportContactText">All licensed users can access 24x7 support at 1-888-409-8057 EXT 1004 or by Email <a href="mailto:support@dgmobi.com">support@dgmobi.com</a></li>-->
                                    <li id="supportContactText">Users can access 24x7 support at 1-888-409-8057 EXT 1004 or by E-mail <a href="mailto:support@dgmobi.com">support@dgmobi.com</a></li>
                                    <!--<li id="withoutInternetText">Once installed, DGMobi & ERG is usable without internet services.</li>-->
                                    <li id="withoutInternetText">Placarding, ERG Service & Expense Tracker are usable without internet connectivity.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <section class="page-section" style="padding-bottom: 0px;">
                        <div class="col-md-8 col-md-offset-2">
                            <!-- PAYPAL FORM -->
                            <div style="display:none;">
                                <form class="dg-form" action="<?php echo $paypalURL; ?>" method="post" id="paypalForm" name="paypalForm">
                                    <input type="hidden" name="business" value="<?php echo $paypalID; ?>">        
                                    <!-- Specify a Buy Now button. -->
                                    <input type="hidden" name="cmd" value="_xclick">

                                    <!-- Specify details about the item that buyers will purchase. -->
                                    <input type="hidden" name="item_name" id="item_name" value="Landstar BCO">
                                    <input type="hidden" name="item_number" id="item_number" value="<?php echo $orderId; ?>">
                                    <input type="hidden" name="amount" id="amount" value="">
                                    <input type="hidden" name="currency_code" id="currency_code" value="USD">
                                    <input type="hidden" name="orderId" id="orderId" value="<?php echo $orderId; ?>" >
                                    <!-- Specify URLs -->
                                    <input type='hidden' name='no_shipping' value='1'>
                                    <input type='hidden' name='cancel_return' value="<?php echo $paypalCancelURL; ?>">
                                    <input type='hidden' name='return' value="<?php echo $paypalReturnURL . "?orderId=" . $orderId; ?>">
                                    <button type="submit" class="button" id="buy_now_button_text">Buy Now</button>
                                </form>
                            </div>
                            <!-- END OF PAYPAL FORM -->

                            <form action="#" name="landstar_form" id="landstar_form" target="_myFrame" class="dg-form">
                                <header id="selectLicensesText">Select the DGMobi<sup>TM</sup> Annual License(s) to purchase</header>
                                <fieldset>
                                    <center>
<div class="text-center">
	<input type=radio name=type value=new onchange=fn1(this.value) checked><span style="font-size: 15px;" id="newlicense">New License</span> &nbsp;&nbsp; <input type=radio onchange=fn1(this.value) name=type value=old><span id=RenewLicense style="font-size: 15px;">Renew License</span>&nbsp;&nbsp; <input type=radio onchange=fn1(this.value) name=type value=life><span id=lifetime style="font-size: 15px;">Lifetime License</span>
</div>
                                        <table class="table table-striped shopping-cart-table responsive producttable" style="width: 90%; background-color: #fff; border:3px double #328444;">
						<thead>
                                            <tr align="center">
                                                <th width="40%" id="productThText">Product</th>
                                                <th width="20%" id="unitPriceThText">Unit Price</th>
                                                <th width="20%" id="quantityThText">Quantity</th>
                                                <th width="20%">Total</th>
                                            </tr>
						</thead>
						<tbody id="tbdy">
                                            <?php
                                            foreach ($productsList as $data) {
                                                echo "<tr><td class='purchase-header'><span class='tax-header'>" . $data['dgmobi_buynow_product_name'] . "</span></td>";
						echo "<td>" . $data['dgmobi_buynow_product_currency'] . " $ <span class=price>24.99</span></td>";
                                                //echo "<td>" . $data['dgmobi_buynow_product_currency'] . " $" . $data['dgmobi_buynow_product_price'] . "</td>";
                                                echo '<td><div class="count-input space-bottom">'
                                                . '<span class="inc_dec" onclick="return incrementOrDecrement(0,' . $data["dgmobi_buynow_product_id"] . ');"><a class="incr-btn1" data-action="decrease" href="#">–</a></span>'
                                                . '<input class="quantity" style="float:left; width:40%;margin-top:6px;" type="text" id="no_of_licenses_' . $data["dgmobi_buynow_product_id"] . '" name="quantity" disabled value="0"/>'
                                                . '<span class="inc_dec" onclick="return incrementOrDecrement(1,' . $data["dgmobi_buynow_product_id"] . ');"><a class="incr-btn1" data-action="increase" href="#">&plus;</a></span></td>';
                                                echo "<td>$ <span id='price_of_" . $data['dgmobi_buynow_product_id'] . "'>0</span></td></tr>";
                                            }
                                            ?>
						</tbody>
						<tfoot>
                                            <tr>
                                                <td></td>
                                                <td><strong>Total</strong></td>
                                                <td><strong><span id="total_no_of_licenses">0</span></strong></td>
                                                <td><strong>US $<span id="total_price">0</span></strong></td>
                                            </tr>
						</tfoot>
                                        </table>
                                    </center>
                                </fieldset>
                                <footer>
                                    <!-- Languages Removed From Here -->
                                    
                                       
                                    <section style="display:none;" id=usernameval>
                                        <label class="label"><span id="UserNameLabel">User Name</span> <span style="color: darkred">*</span></label>
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>
                                            <input type="text" name="us_name" id="us_name" onblur=fncheckdetails(this.value) maxlength="150">
                                        </label>
                                    </section>

<div class="row">
                                        <section class="col col-6">
                                            <label class="label"><span id="firstNameLabel">First Name</span> <span style="color: darkred">*</span></label>
                                            <label class="input">
                                                <i class="icon-append fa fa-user"></i>
                                                <input type="text" name="f_name" id="f_name" maxlength="20">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"><span id="lastNameLabel">Last Name</span> <span style="color: darkred">*</span></label>
                                            <label class="input">
                                                <i class="icon-append fa fa-user"></i>
                                                <input type="text" name="l_name" id="l_name" maxlength="20">
                                            </label>
                                        </section>
                                    </div>

                                    <section>
                                        <label class="label"><span id="emailLabel">Email</span> <span style="color: darkred">*</span></label>
                                        <label class="input">
                                            <i class="icon-append fa fa-envelope-o"></i>
                                            <input type="text" name="email_id" id="email_id" maxlength="150">
                                        </label>
                                    </section>

                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"><span id="phoneNumberLabel">Phone Number</span> <span style="color: darkred">*</span></label>
                                            <label class="input">
                                                <i class="icon-append fa fa-phone"></i>
                                                <input type="text" name="phone_no" id="phone_no" maxlength="20">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"><span id="addressLabel">Address</span> <span style="color: darkred">*</span></label>
                                            <label class="input">
                                                <i class="icon-append fa fa-map-marker"></i>
                                                <input type="text" name="address" id="address" maxlength="200">
                                            </label>
                                        </section>
                                    </div>

                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"><span id="countryLabel">Country</span> <span style="color: darkred">*</span></label>
                                            <label class="select">
                                                <select id="country" onchange="getProvince(this.value);">
                                                    <option id="countryOption" value="" selected disabled>Country</option>
                                                    <select>
                                                        <i></i>
                                                        </label>
                                                        </section>
                                                        <section class="col col-6" id="province_section">
                                                            <label class="label"><span id="provinceLabel">Province</span> <span style="color: darkred">*</span></label>
                                                            <label class="select">
                                                                <select id="province" onchange="provinceChange(this.value);">
                                                                    <option id="provinceOption" value="" selected="" disabled>Province</option>
                                                                </select>
                                                                <i></i>
                                                            </label>
                                                        </section>
                                                        </div>
                                                        <div class="row">
                                                            <section>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" id="terms" name="terms">
                                                                    <a href="http://dgsms.ca/licensing-terms.php" target="_blank"><span id="termsAndConds">I accept Terms and Conditions</span></a></label>
                                                            </section>
                                                        </div>
                                                        </footer>

                                                        <footer>
                                                            <div class="row">
                                                                <section class="col col-7">
                                                                    <p style="float:left;"><span id="volumePurchaseContact">For volume purchase, please contact</span>: <a href="mailto:sales@dgmobi.com">sales@dgmobi.com</a></p>
                                                                </section>
                                                                <section class="col col-2">
                                                                    <button type="button" class="button button-secondary" id="clearForm" style="/*margin-right: 10px;*/ margin-top: 5px; float: left;">Clear</button> 
                                                                </section>
                                                                <section class="col col-3">
                                                                    <button type="submit" class="button" id="submitForm" onclick="return false;" style="margin-top: 5px; float: left; min-width: 165px; padding: 0px;">Buy Now</button>
                                                                </section>
                                                            </div>
                                                        </footer>
                                                        </form>
                                                        <br>
                                                        <br>
                                                        </div>
                                                        </section>
                                                        <section>
                                                            <p class="text" style="font-size: 15px; color: #000; text-align: center;">
                                                                <span id="disclaimerLineOne">
                                                                    This offer/promotion is being conducted and managed solely by DGMobi<sup>TM</sup>.
                                                                </span> 
                                                                <br>
                                                                <span id="disclaimerLineTwo">
                                                                    Landstar is not affiliated with nor involved with how the offer/promotion is managed or how winners are selected.
                                                                </span>
                                                            </p>
                                                        </section>
                                                        <!-- End Section -->
                                                        </div>

                                                        <!--<div class="hs-line-4 align-center mt-20">
                                                            <span id="callFreeTrailText">
                                                                Call for a free trial
                                                            </span> | 
                                                            <a href="../contact.php" target="_blank">
                                                                <span id="contactUsText">Contact Us</span>
                                                            </a>
                                                        </div>-->

                                                        <div class="hs-line-3">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <section class="col-md-3">
                                                                        <p style="font-size:16px; font-weight:bold;">
                                                                            <span id="callText">CALL</span> +1 888-409-8057 <br>EXT: 1004
                                                                        </p>
                                                                    </section>
                                                                    <section class="col-md-offset-5 col-md-4">
                                                                        <a href="http://www.ideabytes.com" target="_blank">
                                                                            <img src="images/ideabytes.png" width="150" height="51" alt="Ideabytes logo-Ideabytes transportation division provides Solutions for Dangerous Goods, HAZMAT transported by air, Road and Sea using SaaS (web) and mobile solutions compliant to TDG, IATA, IMDG, DOT 49 CFR, ADR."/>
                                                                        </a>
                                                                    </section>
                                                                </div>
                                                            </div>
                                                            <!--
                                                            <ul class="nav tpl-alt-tabs  ">
                                                                <li>CALL +1 888-409-8057 EXT: 1004 or 1005</li>
                                                                <li>
                                                                    <a href="http://www.ideabytes.com" target="_blank">
                                                                        <img src="images/ideabytes.png" width="150" height="51" alt="Ideabytes logo-Ideabytes transportation division provides Solutions for Dangerous Goods, HAZMAT transported by air, Road and Sea using SaaS (web) and mobile solutions compliant to TDG, IATA, IMDG, DOT 49 CFR, ADR."/>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            -->
                                                        </div>

                                                        </section>
                                                        <!-- End About Section -->

                                                        <!-- Divider -->
                                                        <hr class="mt-0 mb-20 "/>
                                                        <!-- End Divider -->

                                                        <footer class="page-section bg-gray-lighter footer pb-40">
                                                            <div class="container">
                                                                <div class="footer-text">
                                                                    <!-- Copyright -->
                                                                    <div class="footer-made">
                                                                        &#9400; Images and text are copyright of Ideabytes<sup>®</sup> Inc.
                                                                    </div>
                                                                    <!-- End Copyright -->   
                                                                </div>
                                                                <!-- End Footer Text --> 
                                                                <!-- Top Link -->
                                                                <div class="local-scroll">
                                                                    <a href="#top" class="link-to-top"><i class="fa fa-caret-up"></i></a>
                                                                </div>
                                                                <!-- End Top Link -->
                                                            </div>
                                                        </footer>
                                                        </div>
                                                        <!-- End Page Wrap -->


                        <!-- JS -->
                        <script type="text/javascript" src="js/jquery.min.js"></script>
                        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
                        <script type="text/javascript" src="js/bootstrap.min.js"></script>

                        <script type="text/javascript" src="js/SmoothScroll.js"></script>
                        <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
                        <script type="text/javascript" src="js/jquery.localScroll.min.js"></script>
                        <script type="text/javascript" src="js/jquery.viewport.mini.js"></script>
                        <script type="text/javascript" src="js/jquery.countTo.js"></script>
                        <script type="text/javascript" src="js/jquery.appear.js"></script>
                        <script type="text/javascript" src="js/jquery.sticky.js"></script>
                        <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
                        <script type="text/javascript" src="js/jquery.fitvids.js"></script>
                        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
                        <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
                        <script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
                        <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>

                        <script type="text/javascript" src="js/wow.min.js"></script>

                        <script type="text/javascript" src="js/jquery.simple-text-rotator.min.js"></script>
                        <script type="text/javascript" src="js/all.js"></script>
                        <script type="text/javascript" src="newjs/bootstrap.min.js"></script>
                        <script type="text/javascript" src="newjs/bootbox.min.js"></script>

                        <script>
                            /*  $(".incr-btn").on("click", function (e) {
                             var $button = $(this);
                             var clickedId = $button.parent().find('.quantity')[0].id;
                             clickedId = clickedId.replace("no_of_licenses_","");
                             var oldValue = $button.parent().find('.quantity').val();
                             $button.parent().find('.incr-btn[data-action="decrease"]').removeClass('inactive');
                             if ($button.data('action') == "increase") {
                             var newVal = parseFloat(oldValue) + 1;
                             increaseOrDecreaseProductValue(clickedId,newVal);
                             } else {
                             // Don't allow decrementing below 1
                             if (oldValue > 1) {
                             var newVal = parseFloat(oldValue) - 1;
                             increaseOrDecreaseProductValue(clickedId,newVal);
                             } else {
                             newVal = 0;
                             $button.addClass('inactive');
                             increaseOrDecreaseProductValue(clickedId,newVal);
                             }
                             }
                             $button.parent().find('.quantity').val(newVal);
                             e.preventDefault();
                             });
                             */
                            /*$(".incr-btn").bind("click touchstart", function(e) {

                             });
                             */

                            var uniqueId = '<?php echo $uniqueId; ?>';

                            function incrementOrDecrement(val, clickedId) {
//alert(val+" "+clickedId);
                                var oldValue = $('#no_of_licenses_' + clickedId).val();
                                //$button.parent().find('.incr-btn[data-action="decrease"]').removeClass('inactive');
                                var newVal = 0;
                                if (val == 1) {
                                    newVal = parseFloat(oldValue) + 1;
                                    increaseOrDecreaseProductValue(clickedId, newVal);
                                } else {
                                    // Don't allow decrementing below 1
                                    if (oldValue > 1) {
                                        newVal = parseFloat(oldValue) - 1;
                                        increaseOrDecreaseProductValue(clickedId, newVal);
                                    } else {
                                        newVal = 0;
                                        //$button.addClass('inactive');
                                        increaseOrDecreaseProductValue(clickedId, newVal);
                                    }
                                }
                                $("#no_of_licenses_" + clickedId).val(newVal);
                                return false;
                                //$button.parent().find('.quantity').val(newVal);
                                //e.preventDefault();
                            }

                            // Global Variables
                            var productsList = [];
                            var baseServiceUrlUs = "<?php echo $baseServiceUrlUs; ?>";
                            var baseServiceUrlCa = "<?php echo $baseServiceUrlCa; ?>";
                            var getCountryDetailsapi = "<?php echo $getCountriesAPILink; ?>";
                            var gettaxDetailsApi = "<?php echo $getTaxDetailsAPILink; ?>";
                            var formDetailsPristine = {
                                orderId: "<?php echo $orderId; ?>",
                                receiptNumber: "<?php echo $orderId; ?>",
                                totalNoOfLicenses: 0,
                                totalNoOfLicensesTDG: 0,
                                totalNoOfLicenses49CFR: 0,
                                totalPrice: 0,
                                totalPriceWithTax: 0,
                                taxRate: [],
                                taxPrice: 0,
                                phone: "",
                                firstname: "",
                                lastname: "",
				usname: "",
                                email: "",
                                countryName: "",
                                provinceName: "",
                                address: "",
                                products: []
                            };

                            var formDetails = JSON.parse(JSON.stringify(formDetailsPristine));

                            var translation; //holds translation object.
                            var language = "english"; //holds selected language. Defualt is english.

                            /**
                             * Get translations from server (AJAX call)
                             */
                            function getTranslation() {
                                var request = $.ajax({
                                    url: "get_language_strings.php",
                                    cache: false
                                });

                                request.done(function (response) {
                                    translation = response;
                                });

                                request.fail(function (jqXHR, textStatus) {
                                    console.log("Request failed: " + textStatus);
                                });
                            }

                            /**
                             * Highlight selected language option
                             */
                            function highlightLanguageOption(optionId) {
                                $("#languageOptions span").removeClass();
                                $(optionId).addClass("currentLanguageOption");
                            }

                            /**
                             * Loop through the keys in translation object 
                             * and fill the value with selected language value
                             */
                            function translate(language) {
                                for (var key in translation) {
                                    $("#" + key).html(translation[key][language]);
                                }
                            }

                            function validateEmail() {
                                var emailId = $("#email_id").val().trim();
                                formDetails.email = emailId;
                                if (emailId != "") {
                                    var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                                    //if (!filter.test(emailId)) {
                                    if (!emailId.match(filter)) {
                                        //commonPopUpMessage("Please enter a valid Email.","DGMOBI ERR_03");
                                        commonPopUpMessage(translation.emailValidationError[language], "DGMOBI ERR_03");
                                        $("#email_id").val("");
                                        formDetails.email = "";
                                        return false;
                                    }
                                } else {
                                    commonPopUpMessage(translation.emailError[language], "DGMOBI ERR_07");
                                    return false;
                                }
                            }

                            $(document).ready(function () {
                                $("#languageOptions").show(); //Display language options
                                $("#languageEnglish").addClass("currentLanguageOption"); //Highlight english by default
                                getTranslation(); //Get translations from server

                                //When clicked on english language option, fill the ids with english translations
                                $("#languageEnglish").click(function () {
                                    highlightLanguageOption("#languageEnglish");
                                    language = "english";
                                    translate(language);
                                });

                                //When clicked on spanish language option, fill the ids with spanish translations
                                $("#languageSpanish").click(function () {
                                    highlightLanguageOption("#languageSpanish");
                                    language = "spanish";
                                    translate(language);
                                });

                                //When clicked on french language option, fill the ids with french translations
                                $("#languageFrench").click(function () {
                                    highlightLanguageOption("#languageFrench");
                                    language = "french";
                                    translate(language);
                                });





                                // To get all products details and display in the table for selection
                                getProductsList();
                                // To get the countries list for form Address field.
                                getCountriesList();

                                countSantasPageView();

                                // First Name and last name must allow only alphabets
                                $("#f_name, #l_name").keypress(function (event) {
                                    var inputValue = event.which;
                                    // allow letters and whitespaces only.
                                    if (!(inputValue >= 65 && inputValue <= 122) && (inputValue != 32 && inputValue != 0) && (inputValue != 8)) {
                                        event.preventDefault();
                                    }
                                });
                                // First Name and last name must be atleast 4 characters. This method is to check that
//  if(validatename == "yes") {
                                $("#f_name").on({
                                    blur: function (event) {
//alert(validatename)
                                        var f_name = $("#f_name").val().trim();
                                        formDetails.firstname = f_name;
                                        if (f_name !== "" && f_name.length < 4 && validatename=="yes") {
                                            //commonPopUpMessage("First Name must contain atleast 4 characters.","DGMOBI ERR_01");
                                            commonPopUpMessage(translation.firstNameCountError[language], "DGMOBI ERR_01");
                                            return false;
                                        }
                                    }
                                });
                                $("#l_name").on({
                                    blur: function (event) {
                                        var l_name = $("#l_name").val().trim();
                                        formDetails.lastname = l_name;
                                        if (l_name !== "" && l_name.length < 4 && validatename=="yes") {
                                            //commonPopUpMessage("Last Name must contain atleast 4 characters.","DGMOBI ERR_02");
                                            commonPopUpMessage(translation.lastNameCountError[language], "DGMOBI ERR_02");
                                            return false;
                                        }
                                    }
                                });
//  }
                                // Email Id Validation
                                $("#email_id").on({
                                    //blur : function(event) {
                                    change: function (event) {
//				var emailId = $("#email_id").val().trim();
//				formDetails.email = emailId;
//				if (emailId != "") {
//					var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
//					//if (!filter.test(emailId)) {
//					if (!emailId.match(filter)) {
//						//commonPopUpMessage("Please enter a valid Email.","DGMOBI ERR_03");
//						commonPopUpMessage(translation.emailValidationError[language],"DGMOBI ERR_03");
//						$("#email_id").val("");
//						formDetails.email = "";
//						return false;
//					}
//				}
                                        validateEmail();

                                    }
                                });
                                $("#phone_no").on({
                                    blur: function (event) {
                                        var phone_no = $("#phone_no").val().trim();
                                        formDetails.phone = phone_no;
                                        if (phone_no !== "") {

                                        }
                                    }
                                });
				$("#us_name").on({
                                    blur: function (event) {
                                        var us_name = $("#us_name").val().trim();
                                        formDetails.usname = us_name;
                                        if (us_name !== "") {

                                        }
                                    }
                                });
                                $("#address").on({
                                    blur: function (event) {
                                        var address = $("#address").val().trim();
                                        formDetails.address = address;
                                        if (address !== "") {

                                        }
                                    }
                                });
                                // Restricting the user from copy-pasting the values in First Name and Last Name fields
                                document.getElementById("f_name").onpaste = function () {
                                    return false;
                                };
                                document.getElementById("l_name").onpaste = function () {
                                    return false;
                                };

                                // On clicking on submit button
                                $("#submitForm").on({
                                    click: function (event) {
                                        submitFormElements();
                                        return false;
                                    }
                                });
                                // On clicking on Clear button
                                $("#clearForm").on({
                                    click: function (event) {
                                        clearFormElements();
                                        return false;
                                    }
                                });

                                bootbox.alert({
                                    message: "<body><center></center></body>",
                                    title: "<center></center>",
                                    size: "small",
                                    static: true,
                                    backdrop: false,
                                    callback: function () {

                                    }
                                });
                                $(".modal").css({"direction": "rtl", "overflow-y": "auto"});
                                $(".modal, .modal-dialog").css({"direction": "ltr"});
                                $(".modal-open").css({"overflow": "auto"});
                                bootbox.hideAll();

                            });

                            /*
                             ** This method is used for getting the product details from database
                             ** And storing in the required JSON Array object format
                             */
                            function getProductsList() {
//pricenow
<?php foreach ($productsList as $data) { ?>
                                    var dataObj = {
                                        id: "<?php echo($data["dgmobi_buynow_product_id"]) ?>",
                                        productName: "<?php echo($data["dgmobi_buynow_product_name"]) ?>",
                                        mobileType: "<?php echo($data["dgmobi_buynow_product_device_id"]) ?>",
                                        regulation: "<?php echo($data["dgmobi_buynow_product_regulation"]) ?>",
                                        appName: "<?php echo($data["dgmobi_buynow_product_app_name"]) ?>",
                                        price: pricenow,
                                        currency: "<?php echo($data["dgmobi_buynow_product_currency"]) ?>",
                                        noOfLicenses: 0,
                                        totalPrice: 0
                                    };
                                    productsList[productsList.length] = dataObj;
<?php } ?>
//                                        price: "<?php echo($data["dgmobi_buynow_product_price"]) ?>",
                                //console.log(JSON.stringify(productsList));
                            }

                            /*
                             ** This method is used for getting the Countries list from Service
                             ** And displaying them in form selection
                             */
                            function getCountriesList() {
                                var presernt_countries_get_url = baseServiceUrlCa + getCountryDetailsapi;
                                $.ajax({
                                    url: presernt_countries_get_url,
                                    method: "GET",
                                    cache: false,
                                    async: false,
                                    dataType: 'json',
                                    contentType: "application/json",
                                    success: function (response, results, jqXHR) {
                                        var optionHTML = "";
                                        if (Object.keys(response.results.countryDetails).length) {
                                            $.each(response.results.countryDetails, function (key1, value1) {
                                                optionHTML += '<option value="' + value1['countryName'] + '">' + value1['countryName'] + '</option>';
                                            });
                                        }
                                        $('#country').append(optionHTML);
                                    },
                                    error: function (ts) {
                                        console.error(JSON.stringify(ts));
                                    }
                                });
                            }

                            /*
                             ** This method is used for getting the Province list from Service based on the country selected
                             ** And displaying them in form selection
                             */
                            function getProvince(countrySelected) {
                                formDetails.countryName = countrySelected;
                                if (countrySelected !== "") {
                                    var presernt_countries_get_url = baseServiceUrlCa + getCountryDetailsapi;
                                    var dataString = '{"countryName":' + countrySelected + '}';
                                    $.ajax({
                                        url: presernt_countries_get_url,
                                        method: "POST",
                                        async: false,
                                        cache: false,
                                        data: dataString,
                                        dataType: 'json',
                                        contentType: "application/json",
                                        success: function (response, results, jqXHR) {
                                            var optionHTML = "";
                                            if (Object.keys(response.results.provinceDetails).length) {
                                                $.each(response.results.provinceDetails, function (key1, value1) {
                                                    optionHTML += '<option value="' + value1['provinceName'] + '">' + value1['provinceName'] + '</option>';
                                                });
                                                $('#province').append(optionHTML);
                                                $('#province_section').show();
                                            } else {
                                                $('#province_section').hide();
                                            }

                                        },
                                        error: function (ts) {
                                            console.error(JSON.stringify(ts));
                                        }
                                    });
                                } else {
                                    $("#province_section").hide();
                                }
                                return false;
                            }



function getProductsList() {
while(productsList.length > 0) {
    productsList.pop();
}

productsList = [];
<?php foreach ($productsList as $data) { ?>
                                    var dataObj = {
                                        id: "<?php echo($data["dgmobi_buynow_product_id"]) ?>",
                                        productName: "<?php echo($data["dgmobi_buynow_product_name"]) ?>",
                                        mobileType: "<?php echo($data["dgmobi_buynow_product_device_id"]) ?>",
                                        regulation: "<?php echo($data["dgmobi_buynow_product_regulation"]) ?>",
                                        appName: "<?php echo($data["dgmobi_buynow_product_app_name"]) ?>",
                                        price: pricenow,
                                        currency: "<?php echo($data["dgmobi_buynow_product_currency"]) ?>",
                                        noOfLicenses: 0,
                                        totalPrice: 0
                                    };
                                    productsList[productsList.length] = dataObj;
<?php } ?>
                                //console.log(JSON.stringify(productsList));
                            }

function constructproducts(){
//var product = productsList;

var dt = "";
$("#tbdy").html(dt);
//alert(pricenow)

/*while(productsList.length > 0) {
    productsList.pop();
}*/
for(var i=0;i<productsList11.length;i++){

				    var dataObj = {
                                        id: productsList11[i].dgmobi_buynow_product_id,
                                        productName: productsList11[i].dgmobi_buynow_product_name,
                                        mobileType: productsList11[i].dgmobi_buynow_product_device_id,
                                        regulation: productsList11[i].dgmobi_buynow_product_regulation,
                                        appName: productsList11[i].dgmobi_buynow_product_app_name,
                                        price: pricenow,
                                        currency: productsList11[i].dgmobi_buynow_product_currency,
                                        noOfLicenses: 0,
                                        totalPrice: 0
                                    };	
//productsList[productsList11.length] = dataObj;
							dt += '<tr><td class="purchase-header"><span class="tax-header">'+productsList11[i].dgmobi_buynow_product_name+'</span></td><td>US $ <span class="price">'+pricenow+'</span></td><td><div class="count-input space-bottom"><span class="inc_dec" onclick="return incrementOrDecrement(0,'+productsList11[i].dgmobi_buynow_product_id+');"><a class="incr-btn1" data-action="decrease" href="#">–</a></span><input class="quantity" style="float:left; width:40%;margin-top:6px;" type="text" id="no_of_licenses_'+(i+1)+'" name="quantity" disabled="" value="0"><span class="inc_dec" onclick="return incrementOrDecrement(1,'+productsList11[i].dgmobi_buynow_product_id+');"><a class="incr-btn1" data-action="increase" href="#">+</a></span></div></td><td>$ <span id="price_of_'+productsList11[i].dgmobi_buynow_product_id+'">0</span></td></tr>';
						}
						$("#tbdy").html(dt);
}

                            /*
                             ** This method is update formDetails JSON obj with the user selected province
                             ** On change event
                             */
	                    function provinceChange(provinceSelected) {
	                        formDetails.provinceName = provinceSelected;
	                    }

                            /*
                             ** This method is used to update the values of the products in the productsList (JSON Variable) as well as it updates the calculations.
                             ** And displaying them in form selection
                             */

				
				var price_type = "new";

			    function fn1(value){


//console.log(productsList);


				if(value=="new"){
				  validatename = "yes";
				  $("#usernameval").css("display","none");
				  $("#us_name").val("");
				  $(".producttable").css("display","block");
				  $("#f_name, #l_name, #email_id, #phone_no, #address").removeAttr("readonly");
				  pricenow = "24.99";
				  price_type = "new";
					clearFormElements();
					constructproducts();
					
				}else if(value=="old") {
				  
				  $("#usernameval").css("display","block");
				  $("#us_name").val("");
				  $(".producttable").css("display","none");
				  $("#f_name, #l_name, #email_id, #phone_no, #address").attr("readonly","readonly");
				  pricenow = "24.99";
				  price_type = "renew";
				  validatename = "no";
				  clearFormElements();

//clearFormElements();
/*formDetails.firstname = "";formDetails.lastname = "";formDetails.usname = "";formDetails.email = "";formDetails.phone = "";formDetails.address = "";*/
				}else if(value=="life") {
				  $("#us_name").val("");
				  $("#usernameval").css("display","none");
				  $(".producttable").css("display","block");
				  $("#f_name, #l_name, #email_id, #phone_no, #address").removeAttr("readonly");
				  pricenow = "150";
				  price_type = "life";
				  clearFormElements();
				  constructproducts();
				  validatename = "yes";
				}


					$(".quantity").each(function(){
					  var id = $(this).attr("id");
					  
					  var rs = id.split("_");
					  var no = rs[rs.length -1];
					  
					  	$(this).val("0");
					
				        });
			      

				$("#total_price").html($("#total_no_of_licenses").html() * pricenow)
				$(".price").html(pricenow);
				$(".quantity").each(function(){
					var id = $(this).attr("id");
					//alert(id);
					var rs = id.split("_");
					var no = rs[rs.length -1];
					//alert(no);	
					//$("#price_of_"+no).html(parseFloat($(this).val()*pricenow).toFixed(2));
					increaseOrDecreaseProductValue(no, $(this).val());
				});
			    }

$("#us_name, #f_name, #l_name").keypress(function(){
   var string = $(this).val();
   $(this).val(string.charAt(0).toUpperCase() + string.slice(1));
});

			    function fncheckdetails(value) {
				if(price_type == "renew" && value.trim()!="") {
				$.ajax({
				    url: 'checkuserdetails.php',
				    method: "POST",
				    async: false,
				    cache: false,
				    data: {'username': value},
				    //dataType: 'json',
				    //contentType: "application/json",
				    success: function (response) {
					//console.log(JSON.stringify(response));
					var resp = JSON.parse(response);
					if(resp.avail == "true") {
						//console.log(resp.product);
						var product = resp.product;
						var dt = "";
						for(var i=0;i<product.length;i++){
							
							dt += '<tr><td class="purchase-header"><span class="tax-header">'+product[i].dgmobi_buynow_product_name+'</span></td><td>US $ <span class="price">'+pricenow+'</span></td><td><div class="count-input space-bottom"><span class="inc_dec" onclick="return incrementOrDecrement(0,'+product[i].dgmobi_buynow_product_id+');"><a class="incr-btn1" data-action="decrease" href="#">–</a></span><input class="quantity" style="float:left; width:40%;margin-top:6px;" type="text" id="no_of_licenses_'+product[i].dgmobi_buynow_product_id+'" name="quantity" disabled="" value="0"><span class="inc_dec" onclick="return incrementOrDecrement(1,'+product[i].dgmobi_buynow_product_id+');"><a class="incr-btn1" data-action="increase" href="#">+</a></span></div></td><td>$ <span id="price_of_'+product[i].dgmobi_buynow_product_id+'">0</span></td></tr>';
						}
						$("#tbdy").html(dt);
						$(".producttable").css("display","block");
						$("#f_name").val(resp.firstName);
						$("#l_name").val(resp.lastName);
						$("#phone_no").val(resp.phoneNumber);
						$("#email_id").val(resp.emailId);
						$("#country").val(resp.countryName);
						$("#country").change();
						$("#province").val(resp.provinceName);
						$("#address").val(resp.countryName);


						formDetails.firstname = resp.firstName;
						formDetails.lastname = resp.lastName;
						formDetails.usname = resp.username;
						formDetails.email = resp.emailId;
						formDetails.phone = resp.phoneNumber;
						formDetails.address = resp.countryName;
						formDetails.countryName = resp.countryName;
						formDetails.provinceName = resp.provinceName;


					}else{
						$("#f_name, #l_name, #email_id, #phone_no, #address, #country, #province, #us_name").val("");
						commonPopUpMessage(translation.userNotExist[language], "DGMOBI ERR_04");
                                    		return false;
					}
					
				    },
				    error: function (ts) {
					console.error(JSON.stringify(ts));
				    }
				});
				} else{
					$("#us_name").val("");
				}
			    }

                            function increaseOrDecreaseProductValue(clickedId, newVal) {
//alert(clickedId+" "+newVal);
                                var totalPrice = 0;
                                productsList.map(function (dataObj, index) {
                                    if (dataObj["id"] == clickedId) {
                                        dataObj["noOfLicenses"] = parseInt(newVal);
                                        //totalPrice = parseFloat(newVal * parseFloat(dataObj["price"])).toFixed(2);
					totalPrice = parseFloat(newVal * pricenow).toFixed(2);
                                        dataObj["totalPrice"] = totalPrice;
                                    }
                                });
			       $("#price_of_" + clickedId).html(totalPrice);
			       var totalObj = countTotalLicenses()
			       formDetails.totalNoOfLicenses = totalObj.totalLicensesCount;
			       formDetails.totalNoOfLicensesTDG = totalObj.totalCA;
			       formDetails.totalNoOfLicenses49CFR = totalObj.totalUS;
			       formDetails.totalPrice = totalObj.totalLicensesPrince;
			       $("#total_no_of_licenses").html(formDetails.totalNoOfLicenses);
			       $("#total_price").html(formDetails.totalPrice);
                            }

                            /*
                             ** This method is used to return the JSON obj which contains the updated no_of_licenses details, price details etc.,
                             ** And will return the obj to the caller
                             */
                            function countTotalLicenses() {
                                var totalObj = {
                                    totalLicensesCount: 0,
                                    totalLicensesPrince: 0,
                                    totalUS: 0,
                                    totalCA: 0
                                };
                                productsList.map(function (dataObj, index) {
				if (dataObj["regulation"] == "TDG") {
				totalObj.totalCA += dataObj["noOfLicenses"];
				} else if (dataObj["regulation"] == "49CFR") {
				totalObj.totalUS += dataObj["noOfLicenses"];
				}
				totalObj.totalLicensesCount += dataObj["noOfLicenses"];
				//var appPrice = parseFloat(dataObj["noOfLicenses"] * parseFloat(dataObj["price"]));
				var appPrice = parseFloat(dataObj["noOfLicenses"] * parseFloat(pricenow));
                            	totalObj.totalLicensesPrince = parseFloat(parseFloat(totalObj.totalLicensesPrince) + parseFloat(appPrice)).toFixed(2);
                                });
                                return totalObj;
                            }

                            /*
                             ** This method is used to clear all assigned values to default values in the Javascript as well as HTML elements
                             ** And clear the form values shown on the screen
                             */
                            function clearFormElements() {
                                $("#f_name, #l_name, #email_id, #phone_no, #address, #country, #province, #us_name").val("");
                                $("#province_section").hide();
				 // productsList=[]

getProductsList();
                                productsList.map(function (dataObj, index) {
                                    dataObj["noOfLicenses"] = 0;
                                    dataObj["totalPrice"] = 0;
                                    $("#no_of_licenses_" + dataObj["id"]).val(0);
                                    $("#price_of_" + dataObj["id"]).html(0);
                                });
                                $("#total_no_of_licenses, #total_price").html(0);
                                formDetails = JSON.parse(JSON.stringify(formDetailsPristine));
                            }

                            /*
                             ** This method is used to check the form details, validate them
                             ** And calls the taxes service
                             */
			    var rslt = "new";
                            function submitFormElements() {
//alert(price_type);
				if(price_type == "renew") {
				  if(formDetails.usname == "") {
                                    commonPopUpMessage(translation.noUserName[language], "DGMOBI ERR_04");
                                    return false;
				  }
				}
	
				


				
				/*var ele = document.getElementsByName('type'); 
				    for(i = 0; i < ele.length; i++) { 
					if(ele[i].checked) 
						rslt = ele[i].value;
				    }*/

				/*if(checkemailexists(formDetails.email) == "exists"){

				}else{

					if(rslt == "old"){
						commonPopUpMessage("You are new User. Please select new and proceed.", "DGMOBI ERR_03");
						return false;
					}
				}*/
				//return false;

                                if (formDetails.totalNoOfLicenses <= 0) {
                                    //commonPopUpMessage("At least one product should be added for purchase.","DGMOBI ERR_04");
                                    commonPopUpMessage(translation.productCountError[language], "DGMOBI ERR_04");
                                    return false;
                                }
                                if (formDetails.firstname == "") {
                                    //commonPopUpMessage("Please enter First Name.","DGMOBI ERR_05");
                                    commonPopUpMessage(translation.firstNameError[language], "DGMOBI ERR_05");
                                    return false;
                                }
				if (formDetails.email == "") {
                                    //commonPopUpMessage("Please enter email.","DGMOBI ERR_07");
                //			commonPopUpMessage(translation.emailError[language],"DGMOBI ERR_07");
                //			return false;

                                    return validateEmail();
                                }

   if(validatename == "yes") {
                                if (formDetails.firstname.length < 4) {
                                    //commonPopUpMessage("First Name must contains atleast 4 characters.","DGMOBI ERR_01");
                                    commonPopUpMessage(translation.firstNameCountError[language], "DGMOBI ERR_01");
                                    return false;
                                }


                                if (formDetails.lastname == "") {
                                    //commonPopUpMessage("Please enter Last Name.","DGMOBI ERR_06");
                                    commonPopUpMessage(translation.lastNameError[language], "DGMOBI ERR_06");
                                    return false;
                                }

                                if (formDetails.lastname.length < 4) {
                                    //commonPopUpMessage("Last Name must contains atleast 4 characters.","DGMOBI ERR_02");
                                    commonPopUpMessage(translation.lastNameCountError[language], "DGMOBI ERR_02");
                                    return false;
                                }
   }
                                if (formDetails.phone == "") {
                                    //commonPopUpMessage("Please enter Phone Number.","DGMOBI ERR_08");
                                    commonPopUpMessage(translation.phoneNumberError[language], "DGMOBI ERR_08");
                                    return false;
                                }
                                if (formDetails.address == "") {
                                    //commonPopUpMessage("Please enter Address.","DGMOBI ERR_09");
                                    commonPopUpMessage(translation.addressError[language], "DGMOBI ERR_09");
                                    return false;
                                }
                                if (formDetails.countryName == "") {
                                    //commonPopUpMessage("Please select a Country.","DGMOBI ERR_10");
                                    commonPopUpMessage(translation.countryError[language], "DGMOBI ERR_10");
                                    return false;
                                }
                                if (formDetails.countryName == "CANADA") {
                                    if (formDetails.provinceName == "") {
                                        //commonPopUpMessage("Please select Province.","DGMOBI ERR_11");
                                        commonPopUpMessage(translation.provinceError[language], "DGMOBI ERR_11");
                                        return false;
                                    }
                                }
                                if (!($("#terms").is(':checked'))) {
                                    //commonPopUpMessage("Please accept Terms and Conditions.","DGMOBI ERR_12");
                                    commonPopUpMessage(translation.termsAndCondError[language], "DGMOBI ERR_12");
                                    return false;
                                }
				/*var rslt = "new";
				var ele = document.getElementsByName('type'); 
				for(i = 0; i < ele.length; i++) { 
				if(ele[i].checked) 
				rslt = ele[i].value;
				}
				if(!checkemailexists(formDetails.email)){
				if(rslt == "old"){
				commonPopUpMessage("You are new User. Please select new and proceed.", "DGMOBI ERR_03");
				return false;
				}
				}*/

				//return false;

                                formDetails.products = productsList;
console.log(productsList);
                                callTaxDetails();
                            }

			function checkemailexists(val){
				var resp = "";
				$.ajax({
				    url: 'checkemail.php',
				    method: "POST",
				    async: false,
				    cache: false,
				    data: {'email': val},
				    //dataType: 'json',
				    //contentType: "application/json",
				    success: function (response) {
					//console.log(JSON.stringify(response));
					if(response=="exists"){
						resp = "exists";
					}else{
						resp = "not exists";
					}
				    },
				    error: function (ts) {
					console.error(JSON.stringify(ts));
				    }
				});

				return resp;
			}

                            /*
                             ** This method is used to display the messages in a cleaner bootbox pop-up
                             ** And this the common pop-up message method for all error/alert messages
                             */
                            function commonPopUpMessage(popup_body_container, popupHeader) {
                                bootbox.alert({
                                    message: "<body><center>" + popup_body_container
                                            + "</center></body>",
                                    title: "<center>" + popupHeader + "</center>",
                                    size: "small",
                                    static: true,
                                    callback: function () {

                                    }
                                });
                                //$(".modal-sm").css('width', '30%');
                                $(".modal-sm").css('margin-top', '10%');
                                $(".modal-header, .btn-primary").css("background", "#c44a5d");
                                $(".modal-header").css("color", "white");
                                $(".modal-footer").css("text-align", "center");

                            }

                            /*
                             ** This method is used to get the tax details from the service
                             ** As tax details are common for all regulations, we are calling Canada by default
                             */
                            function callTaxDetails() {
                                var get_price_url = baseServiceUrlCa + gettaxDetailsApi;
                                //var get_price_url = "http://192.168.1.49/DGSMS_CA_WS_SERVER"+ gettaxDetailsApi;
                                var dataString = {
                                    countryName: formDetails.countryName,
                                    provinceName: formDetails.provinceName
                                };
                                /*var dataString = {
                                 countryName		:	"CANADA",
                                 provinceName	:	"Manitoba"
                                 };*/
                                $.ajax({
                                    url: get_price_url,
                                    method: "POST",
                                    async: false,
                                    cache: false,
                                    data: JSON.stringify(dataString),
                                    dataType: 'json',
                                    contentType: "application/json",
                                    success: function (response) {
                                        console.log(JSON.stringify(response));
                                        if (response.statusMessage == "OK") {
                                            if (response.results.status == "00") {
                                                formDetails.taxRate = response.results.result;
                                            } else {
                                                formDetails.taxRate = [];
                                            }
                                            displayTaxdetails();
                                        }
                                    },
                                    error: function (ts) {
                                        console.error(JSON.stringify(ts));
                                    }
                                });
                            }

                            /*
                             ** This method is used to calculate and display the tax details w.r.t the no of licenses choosen
                             ** And display a bootbox pop-up with "Cancel" and "Pay Now" buttons
                             ** Pay Now will be proceeding for storing the details in the local db and will navigate/submit the form to the action(paypal)
                             */
                            function displayTaxdetails() {

                                var tableExtension = "";
                                var totalCost = parseFloat(formDetails.totalPrice).toFixed(2);
                                var taxPrice = 0;
                                var taxPercentage = 0;
                                formDetails.taxRate.map(function (eachtax, index) {
                                    var taxName = eachtax["taxType"];
                                    var pricePerTax = parseFloat((parseFloat(eachtax["taxPercentage"]) / 100) * totalCost).toFixed(2);
                                    eachtax["taxValue"] = pricePerTax;
                                    tableExtension += "<tr>"
                                            + "<td class='purchase-header'><span class='tax-header'>" + taxName + " " + eachtax["taxPercentage"] + "%</span></td>"
                                            + "<td align='center'>USD " + pricePerTax + "</td>"
                                            + "</tr>";
                                    taxPercentage = parseFloat(parseFloat(taxPercentage) + parseFloat(eachtax["taxPercentage"])).toFixed(2);
                                });
                                taxPrice = parseFloat((taxPercentage / 100) * totalCost).toFixed(2);
                                var totalCostWithTaxes = parseFloat(parseFloat(totalCost) + parseFloat(taxPrice)).toFixed(2);
                                formDetails.totalPriceWithTax = totalCostWithTaxes;
                                $("#amount").val(totalCostWithTaxes);
                                formDetails.taxPrice = taxPrice;
				formDetails.pricetype = price_type;

                                var popUpBody = "<fieldset><center>"
                                        + "<table class='table table-striped shopping-cart-table' style='width: 80%; background-color: #fff; border:3px double #328444;'>"
                                        + "<tr>"
                                        //+"<td width='65%' class='purchase-header'><span class='tax-header'># Licenses purchased</span></td>"
                                        + "<td width='65%' class='purchase-header'><span class='tax-header'>" + translation.licensesPurchased[language] + "</span></td>"
                                        + "<td width='35%' align='center'>" + formDetails.totalNoOfLicenses + "</td>"
                                        + "</tr>"
                                        + "<tr>"
                                        //+"<td class='purchase-header'><span class='tax-header'>Licenses actual price</span></td>"
                                        + "<td class='purchase-header'><span class='tax-header'>" + translation.licensesActualPrice[language] + "</span></td>"
                                        + "<td align='center'>USD " + totalCost + "</td>"
                                        + "</tr>"
                                        + tableExtension
                                        + "<tr>"
                                        //+"<td class='purchase-header purchase-bold'><span class='tax-header'>Total price</span></td>"
                                        + "<td class='purchase-header purchase-bold'><span class='tax-header'>" + translation.totalPrice[language] + "</span></td>"
                                        + "<td align='center' class='purchase-bold'>USD " + totalCostWithTaxes + "</td>"
                                        + "</tr></table></center></fieldset>";

                                bootbox.dialog({
                                    message: "<body>" + popUpBody + "</body>",
                                    //title : "<center>DGMobi App License - Cost Summary</center>",
                                    title: "<center>" + translation.costSummaryText[language] + "</center>",
                                    size: "medium",
                                    static: true,
                                    buttons: {
                                        danger: {
                                            //label : "Cancel",
                                            label: translation.cancelButton[language],
                                            className: "btn-danger sp-popup-cancel",
                                            callback: function () {

                                            }
                                        },
                                        success: {
                                            //label : "Pay Now",
                                            label: translation.payNowButton[language],
                                            className: "btn btn-primary sp-popup-ok",
                                            callback: function () {
                                                saveFormDetails();
                                            }
                                        },
                                    }
                                });
                                //$(".modal-lg").css("width", "40%");
                                //$(".modal-lg").css("margin-top", "10%");
                                $(".modal-dialog").css("margin-top", "10%");
                                $(".modal-header, .btn-primary").css("background", "#328444");
                                $(".modal-header").css("color", "white");
                                $(".btn-danger").css("background", "#b71f37");
                                $(".purchase-header").css("text-align", "left");
                                $(".purchase-bold").css("font-weight", "bold");
                            }

                            /*
                             ** 
                             ** will be proceeding for storing the details in the local db and will navigate/submit the form to the action(paypal)
                             */
                            function saveFormDetails() {
                                var dataString = JSON.stringify(formDetails);
                                $.ajax({
                                    url: "save_landstar_data.php",
                                    method: "POST",
                                    async: false,
                                    cache: false,
                                    data: {data: dataString, language: language},
                                    //data: {name: "Teja", mobile: "9908295977"},
                                    //dataType: 'json',
                                    //contentType: "application/json",
                                    success: function (data) {
                                        if (data == "success") {
                                            document.forms["paypalForm"].submit();
                                            //window.location.href = "success.php?orderId=<?php echo $orderId; ?>&tx=1&st=Completed"
                                        } else {
                                            //commonPopUpMessage("Please try again with valid information.", "Something went wrong!");
                                            commonPopUpMessage(translation.validInfoError[language], translation.sthWentWrong[language]);
                                        }
                                    },
                                    error: function (ts) {
                                        console.error(JSON.stringify(ts));
                                    }
                                });
                            }


                            /*
                             ** 
                             ** when this page is loaded, the details will be stored in db for page views count
                             */
                            function countSantasPageView() {
                                var dataString = JSON.stringify({unique_id: uniqueId});
                                $.ajax({
                                    url: "save_page_view.php",
                                    method: "POST",
                                    async: false,
                                    cache: false,
                                    data: {data: dataString},
                                    success: function (data) {
                                        // alert(data);
                                    },
                                    error: function (ts) {
                                        console.error(JSON.stringify(ts));
                                    }
                                });
                            }
                        </script>
                </body>
        </html>

                <?php
                $langId = 1;
                $pageId = '1599';
                include "../analytics_footer.php";
                ?>
