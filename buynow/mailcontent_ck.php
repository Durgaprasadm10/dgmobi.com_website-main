<?php

// include "init.php";

// print_r(Config::GET_USER_INFO);
// exit;

include_once('init.php');
// print_r(Config::GET_USER_INFO);
//  exit;
function credentialMailBody($details)
{
    // var_dump($details);
    // echo ("*******");
    // echo json_encode($details);
    // exit;
    $firstName = ucfirst($details["firstName"]);
    $lastName = ucfirst($details["lastName"]);
    $emailID = ($details["emailID"]);
    $username = ($details["userName"]);
    $receiptNumber = $details["receiptNumber"];
    //  $appName
   // $licence_type = $details["licence_type"];

    $phoneNumber = ($details["phoneNumber"]);
    $countryName = ($details["countryName"]);
    $currency = $details["currency"];
    $totalPriceWithTax = $details["totalPriceWithTax"];
    $datetime = new DateTime();
    $dateInString = $datetime->format('d-m-Y');
    $date_valid = "";
   // $validity = "";
    $date_valid = date_add($datetime, date_interval_create_from_date_string("364 days"));
    //  if($licence_type=="Annual"){
      
    //     $validity = "Annual";
    //  } 
    //  else{
    //     $validity = "life";
    //  }

    
    $licenseTillDate = $date_valid->format('d-m-Y');
    $password = ($details["password"]);
    $currency = ($details["currency"]);
    $totalPriceWithTax = ($details["totalPriceWithTax"]);

    $totalNoOfLicensesTDG = ($details["totalNoOfLicensesTDG"]);

    $address = ""; //($details["totalNoOfLicensesTDG"]);  //product["productName"]


    $playStoreUrl = ""; //handled in loop
    $contactEmail = Config::CONTACT_EMAIL;
    $phone = Config::CONTACT_PHONE;
    $datepurchasingMessage = Config::DATEPURCHASINGMSG; //"purchase";
    //$year = "";
    $purchasingMessage = Config::PURCHASINGMSG;

    $licenseMsg = Config::LICENCEMSG;
    $year = Config::LICENCE_YEAR; //if it annual

    $productName = ""; //($details["productName"]);productName ////handled in loop
    $products = $details["products"];
    // print_r(json_encode($details["products"]));
    
    $taxRate = $details["taxRate"];
    $jaForUserInformation = array();
    $jaForMobileUsers = array(); //License for one year.


    $jsonForMobileUsers = array();
    for ($i = 0; $i < sizeof($products); $i++) {
        $joForProducts = (array) $products[$i];
        $regulation = $joForProducts["regulation"];
        $productName = $joForProducts["productName"];
        $mobileType = $joForProducts["mobileType"];
        $appName = $joForProducts["appName"];
        $nooflicenses = $joForProducts["noOfLicenses"];
        $licence_type=$joForProducts["licence_type"];

      
      //  for ($j = 0; $j < (int) ($nooflicenses); $j++) {   
            $joForUser = array();


            $joForUser["firstName"] = $firstName;
            $joForUser["lastName"] = $lastName;
            $joForUser["emailId"] = $emailID . "###" . $username;
            $joForUser["phoneNumber"] = $phoneNumber;
            $joForUser["username"] = $username;
            $joForUser["password"] = $password;
            $joForUser["mobileType"] = $mobileType;
            $joForUser["productName"] = $productName;
            $joForUser["appName"] = $appName;
            $joForUser["licence_type"] = $licence_type;

            array_push($jaForUserInformation, $joForUser);
            array_push($jaForMobileUsers, $username);

            if (array_key_exists($appName, $jsonForMobileUsers)) {
                array_push($jsonForMobileUsers[$appName], $joForUser);
                // $jsonForMobileUsers[$appName]=$joForUser;
            } else {
                $jsonForMobileUsers[$appName] = array();
                array_push($jsonForMobileUsers[$appName], $joForUser);
            }

    //   }

        //   }
    }
    $joForMobileConstruction = $jsonForMobileUsers;
    $keys = array_keys($joForMobileConstruction);

   // print_r($keys);
    //exit;
    $mailBodyContent = "";



    $mailBodyContent .= "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">"
        . "<html xmlns=\"http://www.w3.org/1999/xhtml\"><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1252\">"
        . "<html xmlns=\"http://www.w3.org/1999/xhtml\"><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1252\">"
        . "" . "					"
        . "				<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0,\"><title>Dgmobi</title><style>"
        . "    " . "		html" . "			{" . "				width: 100%;" . "			}"
        . "			" . "		body" . "			{"
        . "				margin:0; padding:0; width:100%; -webkit-text-size-adjust:none; -ms-text-size-adjust:none;"
        . "			}" . "			" . "		a," . "		span a," . "		a:link,"
        . "		a:visited," . "		a:hover" . "			{"
        . "				text-decoration:none !important;" . "				border-bottom:none !important;"
        . "			}" . "			" . "		img" . "			{"
        . "				border:0; -ms-interpolation-mode:bicubic;" . "			}" . "		"
        . "		h1, h2, h3, p" . "			{" . "				margin:0 !important; padding:0 !important;"
        . "			}" . "		" . "		.ReadMsgBody" . "			{" . "				width: 100%;"
        . "			}" . "			" . "		.ExternalClass" . "			{"
        . "				width: 100%;" . "			}" . "			" . "		.ExternalClass,"
        . "		.ExternalClass p," . "		.ExternalClass span," . "		.ExternalClass font,"
        . "		.ExternalClass td," . "		.ExternalClass div" . "			{"
        . "				line-height: 100%;" . "			}" . "		" . "		"
        . "		/* FONT SETTINGS FOR HEADINGS, TITLES CTAs AND ANY BOLD TEXT  */" . "			"
        . "		.heading" . "			{"
        . "				font-family:Raleway, Arial, Helvetica, Helvetica Neue, sans-serif !important;"
        . "			}" . "		"
        . "		/* FONT SETTINGS FOR PARAGRAPHS, BUTTONS AND ALL TEXT CONTENT */" . "		"
        . "		.paragraph" . "			{"
        . "				font-family:Roboto, Arial, Helvetica, Helvetica Neue, sans-serif !important;"
        . "			}" . "		" . "			" . "		/* MEDIA QUIRES */" . "		"
        . "		@media screen and (max-width:720px)" . "		{" . "			body" . "				{"
        . "					width:auto !important;" . "				}" . "				"
        . "			.device-width" . "				{" . "					width:360px !important;"
        . "				}" . "				" . "			.device-width table" . "				{"
        . "					width:100% !important;" . "				}" . "				"
        . "			.bottom-space" . "				{" . "					padding-bottom:10px;"
        . "				}" . "		}" . "		" . "		@media screen and (max-width:360px)"
        . "		{" . "			.device-width" . "				{"
        . "					width:100% !important;" . "				}" . "			"
        . "			.pad-left" . "				{" . "					padding:0 20px !important;"
        . "				}			" . "		}" . "    	" . "    </style>" . "" . "					"
        . "				</head><body marginwidth=\"0\" marginheight=\"0\" style=\"margin-top: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0; width: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;\" offset=\"0\" topmargin=\"0\" leftmargin=\"0\"><table data-bgcolor=\"Layout BG - Light Gray\" data-module=\"Web Link\" data-thumb=\"\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\" class=\"\">"
        . "      <tbody><tr>" . "        <td>" . "                    " . "                       "
        . "            " . "        </td>";


    $mailBodyContent .= "<td><table width=\"600\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">"
        . "						<tbody>" . "						<tr>"
        . "							<td class=\"text-all\" style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.6em;\" data-color=\"Body Text\" data-size=\"Body Text\" data-min=\"10\" data-max=\"80\" align=\"left\">"
        . " Dear <b> {{firstName}}" . " "
        . "{{lastName}}</b>,<br>" . " Thank you for "
        . $purchasingMessage . " <b> DGMobi </b>app.<br>Here are the purchase details."
        . "							</td>" . "						</tr>" . "						<tr>"
        . "									<td height=\"27\"></td>"
        . "								</tr>" . "								<tr>"
        . "									<td>" . "" . "										"
        . "										" . "									</td>"
        . "								</tr>" . "                    </tbody></table>";

    $mailBodyContent .= "</td</tr>" . "    </tbody></table>" . ""
        . "<table data-bgcolor=\"Layout BG - Light Gray\" data-module=\"Pre Header\" data-thumb=\"\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\" class=\"\">"
        . "      <tbody><tr>" . "        <td>" . "        	"
        // . "          <table class=\"device-width\" style=\"border-top-left-radius:7px;border-top-right-radius:7px;\" data-bgcolor=\"White BG\" width=\"700\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\">"
        // . "              <tbody><tr>" . "                <td align=\"center\">" . "                    "
        // . "                    <table width=\"600\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">"
        // . "                      <tbody><tr>" . "                        <td height=\"33\"></td>"
        // . "                      </tr>" . "                      <tr>" . "                        <td>"
        // . "                        	" . "							<!-- LOGO AND NAVIGATION TABLE -->" . ""
        // . "							<!-- TABLE LEFT -->" . "                    	"
        // . "                            <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"left\">"
        // . "                               <tbody><tr>"
        // . "                                <td valign=\"top\" align=\"center\">"
        // . "                                <img src=\"http://www.dgmobi.com/images/dgmobi-logo.png\" alt=\"logo\" style=\"display:block; margin:0;\">"
        // . "                                " . "                                </td>"
        // . "                              </tr>" . "                              <tr>"
        // . "                                <td height=\"26\"></td>" . "                              </tr>"
        // . "                            </tbody></table>                         "
        // . "                            " . "                            <!-- TABLE RIGHT -->"
        // . "                            "
        // . "                            <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"right\">"
        // . "                               <tbody><tr>"
        // . "                                <td style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:20px; font-weight:normal; line-height:1.4em; text-transform:uppercase;\" data-size=\"Pre Header\" data-min=\"10\" data-max=\"80\" valign=\"bottom\" align=\"center\">"
        // . "                                "
        // . "                                    <a style=\"color:#b71f37; text-decoration:none;\"><strong style='color:#b71f37;'>Receipt #: "
        // .  "{{receiptNumber}}</strong></a>" . "                                    " . ""
        // . "                                </td>" . "                              </tr>"
        // . "                              <tr>" . "                                <td height=\"26\"></td>"
        // . "                              </tr>" . "                            </tbody></table>"
        // . "                                " . "                        </td>"
        // . "                      </tr>" . "					</tbody></table>" . "                    "
        // . "                </td>" . "              </tr>      " . "          </tbody></table>            "
        . "            " . "        </td>" . "      </tr>" . "    </tbody>" . "" . "";
    $mailBodyContent .= "<tr><td><span style='margin-left: 40px;'>{{licenseMsg}}</span</td></tr>";


    // chowdamma commented below code on 9/11/2018


    $mailBodyContent .= "</table><table data-bgcolor=\"Layout BG - Light Gray\" data-module=\"Header\" data-thumb=\"\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\" class=\"\">"
        . "      <tbody><tr>" . "        <td>" . "        	"
        . "          <table class=\"device-width\" style=\"border-top: 1px solid #ffffff;\" data-bgcolor=\"White BG\" data-border-top-color=\"footer-border\" width=\"700\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\">"
        . "			  <tbody><tr>" . "			  <td style=\"padding:0 30px;\" align=\"center\">"
        . "				"
        . "				<table width=\"600\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">"
        . "				  <tbody><tr>" . "                <td height=\"25\"></td>" . "              </tr>"
        . "              <tr>" . "                 <td>" . "                    <!-- table left -->"
        // . "					<table style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" width=\"240\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"left\">"
        // . "                      <tbody><tr>"
        // . "						 <td style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;\" data-color=\"Body Text\" data-size=\"Body Text\" data-min=\"10\" data-max=\"80\" valign=\"middle\" height=\"21\" align=\"left\">Dgmobi from Ideabytes Inc	"
        // . "						 </td>" . "                      </tr>" . "                      <tr>"
        // . "						 <td style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;\" data-color=\"Body Text\" data-size=\"Body Text\" data-min=\"10\" data-max=\"80\" valign=\"middle\" height=\"27\" align=\"left\">"
        // . "						 411 Legget Drive x 500," . "						 </td>"
        // . "                      </tr>" . "					  <tr>"
        // . "						 <td style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;\" data-color=\"Body Text\" data-size=\"Body Text\" data-min=\"10\" data-max=\"80\" valign=\"middle\" height=\"27\" align=\"left\">"
        // . "						 Kanata, ON K3K 2C9" . "						 </td>"
        // . "                      </tr>" . "                      <tr>"
        // . "						 <td style=\"color:#b71f37; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;\" data-color=\"Body Text\" data-size=\"Body Text\" data-min=\"10\" data-max=\"80\" valign=\"middle\" height=\"21\" align=\"left\">"
        // . "						 	<b data-color=\"Red Text\">Ph:</b> <span style=\"color:#000000;\" data-color=\"Body Text\">+1 888-409-8057</span>"
        // . "						" . "						 </td>" . "                      </tr>"
        // . "					    <tr>"
        // . "						 <td style=\"color:#b71f37; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;\" data-color=\"Body Text\" data-size=\"Body Text\" data-min=\"10\" data-max=\"80\" valign=\"middle\" height=\"27\" align=\"left\">"
        // . "						 	<b data-color=\"Red Text\">Mail:</b><a href=\"mailto:support@dgmobi.com\" style=\"color:#000000; text-decoration:none;\"> support@dgmobi.com</a>"
        // . "						" . "						 </td>" . "                      </tr>"
        // . "                      <tr>"
        // . "						 <td style=\"color:#b71f37; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;\" data-color=\"Body Text\" data-size=\"Body Text\" data-min=\"10\" data-max=\"80\" valign=\"middle\" height=\"27\" align=\"left\">"
        // . "						 	<b data-color=\"Red Text\">Date:</b><a style=\"color:#000000; text-decoration:none;\"> "
        // .  "{{dateInString}}</a>" . "						" . "						 </td>"
        // . "                      </tr>" . "                    </tbody></table>" . "                  " . ""
        . "					<!-- VERTICAL SPACER TABLE STARTS -->" . ""
        . "					<table style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" width=\"30\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"left\">"
        . "                      <tbody><tr>"
        . "                    	<td style=\"padding:15px 15px 0;\"></td>" . "                      </tr>"
        . "                    </tbody></table>" . "                    " . "                 "
        . "                    <!-- TABLE RIGHT -->"
        // . "					<table style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" width=\"240\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"right\">"
        // . "                      <tbody><tr>"
        // . "						 <td style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;\" data-color=\"Body Text\" data-size=\"Body Text\" data-min=\"10\" data-max=\"80\" valign=\"middle\" height=\"21\" align=\"left\">"
        // . " {{firstName}}" . " "
        // . "{{lastName}}" . "						 </td>"
        // . "                      </tr>" . "                      <tr>"
        // . "						 <td style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;\" data-color=\"Body Text\" data-size=\"Body Text\" data-min=\"10\" data-max=\"80\" valign=\"middle\" height=\"27\" align=\"left\">"
        // . "						<span style=\"max-width:150px;\">"
        // . "{{address}}</span>					 </td>"
        // . "                      </tr>" . "					  <tr>"
        // . "						 <td style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;\" data-color=\"Body Text\" data-size=\"Body Text\" data-min=\"10\" data-max=\"80\" valign=\"middle\" height=\"27\" align=\"left\">"
        // . "{{countryName}}						 </td>" . "                      </tr>"
        // . "                      <tr>"
        // . "						 <td style=\"color:#b71f37; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;\" data-color=\"Body Text\" data-size=\"Body Text\" data-min=\"10\" data-max=\"80\" valign=\"middle\" height=\"21\" align=\"left\">"
        // . "						 	<b data-color=\"Red Text\">Ph:</b> <span style=\"color:#000000;\" data-color=\"Body Text\">. "
        // . "{{phoneNumber}}</span>" . "						"
        // . "						 </td>" . "                      </tr>" . "					    <tr>"
        // . "						 <td style=\"color:#b71f37; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;\" data-color=\"Body Text\" data-size=\"Body Text\" data-min=\"10\" data-max=\"80\" valign=\"middle\" height=\"27\" align=\"left\">"
        // . "						 	<b data-color=\"Red Text\">Mail:</b><a href=\"mailto:"
        // . " {{emailID}}\" style=\"color:#000000; text-decoration:none;\"> "
        // . "{{emailID}}</a>" . "						" . "						 </td>"
        // . "                      </tr>" . "                      " . "                    </tbody></table>"
        // . "                 </td>" . "              </tr>          "
        // . "				</tbody></table>           
                  .              "</td>"
        . "              </tr> " . "			  <tr>" . "                <td height=\"25\"></td>"
        . "              </tr>" . "			</tbody></table>            " . "            " . "        </td>"
        . "      </tr>" . "    </tbody></table>"
        . "     <table data-bgcolor=\"Layout BG - Light Gray\" data-module=\"Welcome\" data-thumb=\"\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\" class=\"\">"
        . "      <tbody><tr>" . "		<td>" . "" . "                "
        . "            <table class=\"device-width\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" data-bgcolor=\"White BG\" width=\"700\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\">"
        . "            " . "            <td style=\"padding: 0 25px;\" align=\"center\">"
        . "				"
        . "				<table width=\"650\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">"
        . "             " . "              <tbody>" . "              <thead><tr>"
        . "      <th style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;border: 1px solid #c6c7cc; padding: 10px 15px; text-align: left\" scope=\"col\" >Item</th>"
        . "      <th style=\"color:#000000; text-align: center; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;border: 1px solid #c6c7cc; padding: 10px 15px;\" scope=\"col\">Unit Price</th>"
        . "      <th style=\"color:#000000; text-align: center; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;border: 1px solid #c6c7cc; padding: 10px 15px;\" scope=\"col\">Qty</th>"
        . "      <th style=\"color:#000000;text-align: center; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;border: 1px solid #c6c7cc; padding: 10px 15px;\" scope=\"col\">Price</th>"
        . "    </tr>" . "  </thead>" . "  <tbody>" . "  " . "  ";

    // print_r($products[0]);
    // print_r($products[1]);
    // print_r($products[2]);
    // // print_r($products[0]);
    // echo ("*********");
    // $json = json_encode($products);
    // echo ("*********");
    // print_r($json);
    // print_r("the size >>  ".sizeof($products));
        for ($i = 0; $i < sizeof($products); $i++) {
        

        $mailBodyContent .= "<tr>"
            . "      <td style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;border: 1px solid #c6c7cc; padding: 10px 15px; \">"
            . $products[$i]["productName"] . "</td>"
            . "<td style=\"color:#000000; text-align: center; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5; border: 1px solid #c6c7cc; padding: 10px 15px;\">"
            . $products[$i]["price"] . "</td>"
            . "      <td style=\"color:#000000; text-align: center; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5; border: 1px solid #c6c7cc; padding: 10px 15px;\">"
            . $products[$i]["noOfLicenses"] . "</td>"
            . "      <td style=\"color:#000000; text-align: center; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5; border: 1px solid #c6c7cc; padding: 10px 15px;\">"
            . $products[$i]["producttotalprice"] . "</td>" . "    </tr>" . "    ";
    }


    $mailBodyContent .= "</tbody>" . "  <tfoot>" . "  " . "  ";
    for ($i = 0; $i < sizeof($taxRate); $i++) {
        //JSONObject jTaxRate = taxRate.getJSONObject(i);
        $mailBodyContent .= "    <tr>"
            . "      <td style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5; border: 1px solid #c6c7cc; padding: 10px 15px;\" colspan=\"3\">Canadian Residents add "
            . $taxRate[$i]["taxPercentage"] . "% tax</td>"
            . "      <td style=\"color:#000000; text-align: center; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5; border: 1px solid #c6c7cc; padding: 10px 15px;\">"
            . "{{currency}}" . $taxRate[$i]["taxValue"] . "    </tr>";
    }


    $mailBodyContent .= "    <tr style=\"font-weight: bold;\">"
        . "      <td style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5; border: 1px solid #c6c7cc; padding: 10px 15px;\" colspan=\"3\">Total</td>"
        . "      <td style=\"color:#000000; text-align: center; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5; border: 1px solid #c6c7cc; padding: 10px 15px;\">"
        . $currency . " " . $totalPriceWithTax . "</td>" . "    </tr>"
        . "            </tbody></table>	" . "	  " . "" . "		</td>" . "	  </tr>"
        . "	</tbody></table>" . "     "
        . "     <table data-bgcolor=\"Layout BG - Light Gray\" data-module=\"1 Row 1\" data-thumb=\"\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\" class=\"\">"
        . "      <tbody><tr>" . "		<td>" . ""
        . "			<table class=\"device-width\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" data-bgcolor=\"White BG\" width=\"700\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\">"
        . "			  <tbody><tr>" . "                <td height=\"30\"></td>" . "              </tr>"
        . "              <tr>" . "				<td style=\"padding:0 30px;\">" . "            "
        . "                    <table style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">"
        . "						<tbody>" . "						<tr>"
        // . "							<td class=\"text-all\" style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.6em;\" data-color=\"Body Text\" data-size=\"Body Text\" data-min=\"10\" data-max=\"80\" align=\"left\">"
        // . "							 See <a href='http://dgmobi.com'>http://dgmobi.com</a> for details.<br>"
        // . "							Below table contains the login credentials for <b>"
        // . "{{totalNoOfLicensesTDG}}"
        // . " License(s)</b> for <b> DGMobi. The </b> License is valid for " . $year . " year(s) ("
        // . $licenseTillDate . ") from the date of " . $datepurchasingMessage . "."
        // . "							</td>" 
        . "						</tr>" . "						<tr>"
        . "									<td height=\"27\"></td>"
        . "								</tr>" . "								<tr>"
        . "									<td>" . "" . "										"
        . "										" . "									</td>"
        . "								</tr>" . "                    </tbody></table>            "
        . "            	</td>" . "			  </tr>" . "             " . "			</tbody></table>"
        . "		</td>" . "	  </tr>" . "	</tbody></table>";

    $mailBodyContent .= "     <table data-bgcolor=\"Layout BG - Light Gray\" data-module=\"Welcome\" data-thumb=\"\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\" class=\"\">"
        . "      <tbody><tr>" . "		<td>" . "" . "                "
        . "            <table class=\"device-width\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" data-bgcolor=\"White BG\" width=\"700\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\">"
        . "            " . "            <td style=\"padding: 0 25px;\" align=\"center\">"
        . "				"
        . "				<table width=\"650\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">"
        . "             " . "              <tbody>" . "              <thead><tr>"
        . "      <th style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;border: 1px solid #c6c7cc; padding: 10px 15px; text-align: left\" scope=\"col\" >DGMobi App - Play Store Link</th>"
        . "      <th style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;border: 1px solid #c6c7cc; padding: 10px 15px;text-align: left\" scope=\"col\">Username</th>"
        . "      <th style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;border: 1px solid #c6c7cc; padding: 10px 15px;text-align: left\" scope=\"col\">Password</th>"
        ."       <th style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;border: 1px solid #c6c7cc; padding: 10px 15px;text-align: left\" scope=\"col\">Validity</th>"
        . "    </tr>" . "  </thead>" . "  <tbody>" . "  " . "  ";



    $mobileusers = array();
    $attachFiles = array();
    $arrayIndex = 0;

    //  print_r($keys);
    // exit;
    for ($k = 0; $k < sizeof($keys); $k++) {
        $mobileusers = $joForMobileConstruction[$keys[$k]];
    
// echo ("***567895456789***");
        // print_r(json_encode($mobileusers));
        // exit;
        // echo sizeof($mobileusers);
        // echo ("***567895456789***");
        //  print_r( json_encode($mobileusers));
        // exit;
// **************************************

// $array = $mobileusers;
//         // print_r($array[0]['productName']);
//         // exit;
// for ($i = 0; $i < count($array); $i++){
//     foreach ($array[$i]['productName'] as $item)
//     {
//         // do what you want
//         echo $item['productName']. '<br>';
//                 exit;
//        // echo $item['$uuid'] . '<br>';
//     }
// }
// **************************************

           


        for ($j = 0; $j < sizeof($mobileusers); $j++) {
            $joForUser = $mobileusers[$j];
            $playStoreUrl = "";
            $attachedFileUrl = "";

            if ($joForUser["mobileType"] == "0") {   //andriod=0 
               // echo $joForUser["productName"]."*****************";
                switch ($joForUser["productName"]) {
                    case ("DGMobi Landstar CANADA TDG"): //"DGMobi Landstar CANADA TDG"
                        $playStoreUrl = Config::DGMOBI_Landstar_TDG_ANDROID;
                        break;

                    case ("DGMobi Landstar US 49 CFR"): //DGMOBI Landstar US $(CFR)
                        $playStoreUrl = Config::DGMOBI_Landstar_49CFR_ANDROID;
                        break;
                    case ("DGMobi General US 49 CFR"):
                        $playStoreUrl = Config::DGMOBI_General_49CFR_ANDROID;
                        break;
                    case("DGMobi General CANADA TDG");
                       $playStoreUrl =Config::DGMOBI_General_TDG_ANDROID;
                        break;
                    case("DGMobi US Xpress US 49 CFR");
                        $playStoreUrl =Config::DGMOBI_US_Xpress_49CFR_ANDROID;
                        break;
                    default:
                        echo "Product " . $joForUser["productName"] . " Not found";

                }

                $attachedFileUrl = Config::PDF_DGMOBI_ANDROID; //Android installation file

            } else if ($joForUser["mobileType"] == ("1")) {
                // echo "0   ios **************";
                // exit;
                switch ($joForUser["productName"]) {
                    case ("DGMobi Landstar CANADA TDG"): //"DGMobi Landstar CANADA TDG"
                        

                    case ("DGMobi Landstar US 49 CFR"): //DGMOBI Landstar US $(CFR)
                        $playStoreUrl = Config::DGMOBI_Landstar_49CFR_iOS;
                        break;
                    case ("DGMobi General US 49 CFR"):
                        $playStoreUrl = Config::DGMOBI_General_49CFR_iOS;
                        break;
                    case("DGMobi General CANADA TDG");
                       $playStoreUrl =Config::DGMOBI_General_TDG_iOS;
                        break;
                    case("DGMobi US Xpress US 49 CFR");
                        $playStoreUrl =Config::DGMOBI_US_Xpress_49CFR_iOS;
                        break;
                    default:
                        echo "Product " . $joForUser["productName"] . " Not found";

                }

                $attachedFileUrl = Config::PDF_DGMOBI_iOS; //iOS instalation file

            }
            if ($attachedFileUrl != ("")) {
                $attachFiles[$arrayIndex] = $attachedFileUrl;
                $arrayIndex++;
            }

           
         //   echo $playStoreUrl;
            $mailBodyContent .= "<tr>"
                . "      <td style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;border: 1px solid #c6c7cc; padding: 10px 15px; \">"
                . "<a href='" . $playStoreUrl . "'>" . $joForUser["productName"] . "</a></td>"
                . "      <td style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5; border: 1px solid #c6c7cc; padding: 10px 15px;\">"
                . $joForUser["username"] . "</td>"
                . "      <td style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5; border: 1px solid #c6c7cc; padding: 10px 15px;\">"
                . $joForUser["password"] . "</td>" . "   " . "    "
                ."<td style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.5;border: 1px solid #c6c7cc; padding: 10px 15px; \">"
                . $joForUser["licence_type"] ."</td> </tr>";
                
        }
    }


    $mailBodyContent .= "<table style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">"
        . "						<tbody>" . "						<tr>"
        . "							<td class=\"text-all\" style=\"color:#000000; font-family:Roboto, Arial, Helvetica, sans-serif; font-size:15px; line-height:1.6em;\" data-color=\"Body Text\" data-size=\"Body Text\" data-min=\"10\" data-max=\"80\" align=\"left\">"
        . "		Please click on link(s) in the above table to download the apps.<br>Attached document provides steps to complete the DGMobi App installation.<br>"
        . " <br>For any further information/help, please contact <p><strong>Email:</strong>&nbsp;<a data-cke-saved-href='mailto:"
        . $contactEmail . "' href='mailto:" . $contactEmail
        . "'>Support DGMobi</a></p><p><strong>Phone:</strong>" . $phone
        . "</p>Regards,<br> <b>DGMobi Admin<b>." . "							"
        . "<br><br>"
        . "</td>" . "						</tr>" . "						<tr>"
        . "									<td height=\"27\"></td>"
        . "								</tr>" . "								<tr>"
        . "									<td>" . "" . "										"
        . "										" . "									</td>"
        . "								</tr>" . "                    </tbody></table>";
    $mailBodyContent .= "	<table data-bgcolor=\"Layout BG - Light Gray\" data-module=\"copyright\" data-thumb=\"#\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\" class=\"\">"
        . "      <tbody><tr>" . "        <td>" . "        	" . "    " . "</td>" . "</tr>"
        . "    </tbody></table>" . "</body></html>";
 

    $mailBodyContent = str_replace("{{firstName}}", $firstName, $mailBodyContent);
    $mailBodyContent = str_replace("{{lastName}}", $lastName, $mailBodyContent);
    $mailBodyContent = str_replace("{{emailID}}", $emailID, $mailBodyContent);
    $mailBodyContent = str_replace("{{phoneNumber}}", $phoneNumber, $mailBodyContent);
    $mailBodyContent = str_replace("{{countryName}}", $countryName, $mailBodyContent);
    $mailBodyContent = str_replace("{{dateInString}}", $dateInString, $mailBodyContent);
    $mailBodyContent = str_replace("{{username}}", $username, $mailBodyContent);
    $mailBodyContent = str_replace("{{password}}", $password, $mailBodyContent);
    $mailBodyContent = str_replace("{{currency}}", $currency, $mailBodyContent); //licenseMsg
    $mailBodyContent = str_replace("{{totalPriceWithTax}}", $totalPriceWithTax, $mailBodyContent);
    $mailBodyContent = str_replace("{{productName}}", $productName, $mailBodyContent);
    $mailBodyContent = str_replace("{{totalNoOfLicensesTDG}}", $totalNoOfLicensesTDG, $mailBodyContent);
    $mailBodyContent = str_replace("{{address}}", $address, $mailBodyContent);
    $mailBodyContent = str_replace("{{licenseMsg}}", $licenseMsg, $mailBodyContent); //receiptNumber
//$mailBodyContent = str_replace("{{receiptNumber}}", $receiptNumber, $mailBodyContent);

    return ["mailBodyContent" => $mailBodyContent, "attachFiles" => $attachFiles];
    //  return $mailBodyContent;
}
?>













