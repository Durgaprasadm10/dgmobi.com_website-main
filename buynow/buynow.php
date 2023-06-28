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
$productsList = $productHandler->getAllProducts(); //Get all products list
// print_r($productsList);
//   exit;
        //  print_r(Config::CURRENT_ENV);
        //  exit;
if (Config::CURRENT_ENV == Config::PROD_ENV) { //PRODUCTION
    $baseServiceUrlUs = Config::US_BASE_API_URL_PROD;
    $baseServiceUrlCa = Config::CA_BASE_API_URL_PROD;

   // $paypalURL = Config::PAYPAL_LIVE_LINK;
   // $paypalID = Config::PAYPAL_LIVE_ID;
   $paypalURL = Config::PAYPAL_SANDBOX_LINK;
    $paypalID = Config::PAYPAL_SANDBOX_ID;
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
//$paypalReturnURL ="http://localhost/dgmodi/dgmobi/buynow/success.php";
$paypalCancelURL = Config::PAYPAL_CANCEL_URL;

//   print_r($paypalReturnURL);
//   exit;

$getCountriesAPILink = Config::GET_COUNTRY_DETAILS_API;
$getTaxDetailsAPILink = Config::GET_TAX_DETAILS_API;
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>DGMOBI</title>

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
        <script src="https://kit.fontawesome.com/8f6d957e4a.js" crossorigin="anonymous"></script>
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
var cartItems_array=[];var productsList = [];
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
                                products: [],
                                deviceName:""  //android=1 IOS=0
                            };

                            var formDetails = JSON.parse(JSON.stringify(formDetailsPristine));

                            var translation; //holds translation object.
                            var language = "english"; //holds selected language. Defualt is english.

function updatePriceDisplay(productid, selected) {
    console.log(productid);
    var name = $('#product_select_id option:selected').text();
   console.log(name);
  //document.querySelector('input[name="lic_type"][value="new"]').checked = true;
  document.querySelector(".zeroprice_msg").textContent = "";
  
  document.getElementById("quantity").innerHTML=0; 

  for (var i = 0; i < productsList11.length; i++) {
    if (productsList11[i].id == productid) {
      let price = 0;

      if (productsList11[i].discount == 1) {
        var now = new Date();
        var today =
          now.getFullYear() +
          (now.getMonth() + 1).toString().padStart(2, "0") +
          now.getDate().toString().padStart(2, "0");

        if (
          today >= productsList11[i].discount_startdate &&
          today <= productsList11[i].discount_enddate
        ) {
          // the discount is valid

          // prefix with '+' to convert to number
          price = +(selected == 0
            ? productsList11[i].discount_annual_price
            : productsList11[i].discount_lifetime_price);

          if (selected == 0 && productsList11[i].discount_annual_price == 0) {
            document.querySelector(".zeroprice_msg").textContent =
              "Drivers, contact your supervisor to get your credentials";
          }

          document.querySelector(
            'input[id="price_select_id"]'
          ).value = `US $ ${price.toFixed(2)}`;

          if (selected == 1 && price == 0) {
        document.querySelector(".zeroprice_msg").textContent =
          "Drivers, contact your supervisor to get your credentials";
      }

          break;
        }
      }

      // no valid discount found
      price = +(selected == 0
        ? productsList11[i].annual_price
        : productsList11[i].lifetime_price);

      document.querySelector(
        'input[id="price_select_id"]'
      ).value = `US $ ${price.toFixed(2)}`;
      console.log(price);

      if (selected == 1 && price == 0) {
        document.querySelector(".zeroprice_msg").textContent =
          "Drivers, contact your supervisor to get your credentials";
      }

      break;
    }
  }
}
        function quantity_function(val){

var present_quantity=document.getElementById("quantity").innerHTML;
if(val==1){ //click on increment button
 present_quantity++;
document.getElementById("quantity").innerHTML=present_quantity;
//present_quantity++;
}
else{    //click on decrement button
 if(present_quantity!=0){
     present_quantity--;
document.getElementById("quantity").innerHTML=present_quantity; 

 }

}
  

}

$( document ).ready( function(){
                                $("#addtocart").on({
                                click: function (event) {
                                    addToCart();
                                   // return false;
                                    }

                            }); });

                                   function addToCart(){
                                 //  alert(productsList11);  cartItems
                                console.log(productsList11);
                                 var present_quantity=document.getElementById("quantity").innerHTML;
                               // var select_product=$("#product_select_id").val();
                                var select_product = $('#product_select_id option:selected').text();
                                var items_on_cart=document.getElementById("items_on_cart").innerHTML;
                                var device_type;   //device type=1 is android 0 is IOS
                                var licence_type;
                                var sale_value=0.0;
                                if(document.getElementsByName("lic_type")[0].checked){

                                    licence_type="Annual";
                                }
                                else{
                                    licence_type="Life";
                                }
                                if($("#device_type_label").val()==1){

                                    device_type="Android"
                                }
                                else{
                                    device_type="iOS"
                                }
                                if(licence_type=="Annual"){
                                            sale_value=parseFloat(47.99*present_quantity).toFixed(2);

                                        }
                                        else{
                                            sale_value=parseFloat(250*present_quantity).toFixed(2);
                                        }

                                if(present_quantity<=0){
                                    alert("Select Product to be added");
                                }
                                else{
                                    if( cartItems_array.length==0){
                                        
                                       
                                        select_string=select_product+":"+licence_type+":"+device_type+":"+present_quantity+":"+sale_value.toString()
                                        cartItems_array.push(select_string);
                                        document.getElementById("quantity").innerHTML="0";
                                        console.log(cartItems_array);
                                      //  formDetails.products.push(select_string);

                                //      productsList11.map(function(key,index){
                                //    // console.log(key);
                                //    if(key.dgmobi_buynow_product_name==select_product){
                                    
                                //     key['quantity']=present_quntity;

                                      
                                //     cartItems_array.push(key);    
                                //             if(device_type=="1"){

                                //             }                                                        
                                //    }
                                //   });
                                   console.log(cartItems_array);
                                   
                                   
                                   document.getElementById("quantity").innerHTML=0;
                                   if(cartItems_array.length>=1){
                                    $(".check_out").css("display","block");

                                   }
                                }
                                else{    
                                      var match=false;
                                        for(var i=0;i<cartItems_array.length;i++){
                                            var temp_array=cartItems_array[i].split(":");
                                            if(select_product==temp_array[0]&&
                                               licence_type==temp_array[1]&&
                                               device_type==temp_array[2]){
                                               var a= parseInt(temp_array[3]);
                                               var myobj={array_value:a,qty:present_quantity}
                                               console.log(myobj);

                                                present_quantity=parseInt(present_quantity)+a;
                                                console.log(present_quantity);
                                                document.getElementById("quantity").innerHTML="0";
                                                var sale_value=0.0;
                                                if(licence_type=="Annual"){
                                                    sale_value=parseFloat(47.99*present_quantity).toFixed(2);
                                                    
                                                    
                                                }
                                                else{
                                                    sale_value=parseFloat(250*present_quantity).toFixed(2);
                                                }
                                                    var temp_string=select_product+":"+licence_type+":"+device_type+":"+present_quantity+":"+parseFloat(sale_value,2);
                                                    var myobj={qty:present_quantity,value:sale_value,val:temp_string}
                                                    console.log(myobj);
                                                    cartItems_array[i]=temp_string;
                                                    console.log(cartItems_array);
                                                    document.getElementById("quantity").innerHTML="0";
                                                    match=true;
                                                    console.log(cartItems_array);
                                                    
                                                    break;

                                            }
                                        }
                                        if(match==false){
                                            select_string=select_product+":"+licence_type+":"+device_type+":"+present_quantity+":"+sale_value.toString()
                                        cartItems_array.push(select_string);
                                        console.log(cartItems_array);
                                        document.getElementById("quantity").innerHTML="0";
                                        }
                                    
                                }
                                
                                cart_validation(cartItems_array);

                                
                            }
                        }
                        function cart_validation(cartArray){
                                var cartQuantity=0;
                                var cartValue=0.00;
                                for(var i=0;i<cartArray.length;i++){
                                    var temArray=cartArray[i].split(":");
                                    cartQuantity+=parseInt(temArray[3]);
                                    cartValue+=parseFloat(temArray[4]);
                                    var myobj={qty:cartQuantity,value:cartValue,lineqty:temArray[3],linetotal:temArray[4]};
                                    console.log(myobj);

                                }
                                document.getElementById("items_on_cart").innerHTML=cartQuantity;
                                document.getElementById("total_price_products").innerHTML=cartValue.toFixed(2);        
                            }

                            $( document ).ready( function(){
                                $("#registration").on({
                                click: function (event) {
                                    registration();
                                   // return false;
                                    }

                            }); });

                            function registration(){
                                var product_name;
                                var quantity;
                                var totalQuantity=0;
                                var total_price=0.00;
                                var price=0.00;
                                var table=`<table class="shopping"><tbody><tr><th>Item</th><th>Description</th><th style=" width: 10%;">Quantity</th><th class>Total</th></tr>`;
                                formDetails.products.push(cartItems_array);
                                     for(var i=0;i<=cartItems_array.length-1;i++){
                                        // alert("hi this is for loop")
                                        var temp_array=cartItems_array[i].split(":");

                                         product_name=temp_array[0]+" "+temp_array[1]+" "+temp_array[2];
                                         quantity=parseInt(temp_array[3]);
                                         totalQuantity+=quantity;
                                         price=parseFloat(temp_array[4]);
                                         total_price+=parseFloat(temp_array[4])




                                        // total_price=cartItems_array[i]["quantity"]*47.99;
                                        // alert(product_name);
                                         table+= `<tr>
                                         <td>${i+1}</td>
                                         <td style="text-align: left;">${product_name}</td>
                                         <td>${quantity}</td>
                                         <td style=" text-align: right;">US $ ${price.toFixed(2)}</td>
                                         
                                         
                                         <tr>`
                                        
                                                                            

                                     }
                                     
                                     total_price=parseFloat(total_price).toFixed(2);
                                     formDetails.totalNoOfLicenses=totalQuantity;
                                     formDetails.totalPrice=total_price;
                                     table+=`<td></td><td>Total</td><td></td><td style=" text-align: right;">US $ ${total_price}</td></table>`
                                     // cartItems_array.length<=1
                                    // alert(product_name);
                                    
                                   
                                var popup_body_container=$("#popup_body").html().replace("#POPUP_BODY",$("#popup_body1").html());
                                bootbox.dialog({
                                    message:table+`<body>
                                    <span>First Name</span>
                                     <input type="text" id="sai123">
                                     <span style=" padding-left: 73px;">Last Name</span>
                                     <input type="text" id="bhavana123">
                                     </br></br>
                                    
                                     <span style=" padding-left: 33px;">E-mail</span>
                                     <input type="email" id="harsha123">
                                     <span style=" padding-left: 50px;">Phone number</span>
                                     <input type="text" id="rakesh123">
                                     </br></br>
                                     <span>User Name</span>
                                     <input type="text" id="username" onblur=fncheckdetails(this.value)>
                                     <span style=" padding-left: 78px;">Password</span>
                                     <input type="password" id="password">
                                      </body>`,// "<body>" + popup_body_container + "</body>",
                                    //title : "<center>DGMobi App License - Cost Summary</center>",
                                    title: `<center>  
                                            <img src="images/dgmobi.png" alt="" style=" width: 150px; float: left;"> 
                                             <center style="margin-right: 161px;"> Shopping Cart</center>
                                             </center>`,
                                    size: "medium",
                                    static: true,
                                    buttons: {
                                        danger: {
                                            label : "Cancel",
                                           // label: translation.cancelButton[language],
                                            className: "btn-danger sp-popup-cancel",
                                            callback: function () {

                                            }
                                        },
                                        success: {
                                            label : "Pay Now",
                                           // label: translation.payNowButton[language],
                                            className: "btn btn-primary sp-popup-ok",
                                            callback: function () {
                                                saveFormDetails();
                                            }
                                        },
                                    }

                                })
                                
                               // alert(popup_body_container);
                               
                               $(".modal-header, .btn-primary").css("background", "rgb(115 176 226)");
                            }
                            function saveFormDetails() {

                                
$("#amount").val(formDetails.totalPrice);
formDetails.email=$("#harsha123").val();
formDetails.firstname=$("#sai123").val();
formDetails.lastname=$("#bhavana123").val();
formDetails.phone=$("#rakesh123").val();
formDetails.usname=$("#username").val();
var password=$("#password").val();



 if(formDetails.email!=""&&formDetails.firstname!=""&&
 formDetails.lastname!=""&&formDetails.phone!=""&&
 formDetails.usname!=""&&password!=""){

    var input={
    "orderId" :formDetails.orderId,
    "receiptNumber":formDetails.receiptNumber,
    "firstname":formDetails.firstname,
    "lastname":formDetails.lastname,
    "email":formDetails.email,
    "products":formDetails.products.toString(),
    "usname":formDetails.usname,
    "phone":formDetails.phone,
    "totalNoOfLicenses":formDetails.totalNoOfLicenses,
    "totalPrice":formDetails.totalPrice,
    "password":password

 
}
console.log(input);
var dataString = JSON.stringify(input);
console.log(dataString);
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
        var temp_data=data.split("|");
        var amount=temp_data[2];
        
        var msg=temp_data[0]
        console.log(data);
      //  cart details stored in database successfully
        if (msg == "cart details stored in database successfully") {
            // document.forms["paypalForm"].amount ="50"
            document.forms["paypalForm"].submit()
           // document.forms["paypalForm"].submit();
           // window.location.href = "success.php?orderId=<?php echo $orderId; ?>&tx=1&st=Completed"
        } else {
            //commonPopUpMessage("Please try again with valid information.", "Something went wrong!");
           // commonPopUpMessage(translation.validInfoError[language], translation.sthWentWrong[language]);
           alert("Please fill fields");
           return false;
        }
    },
    error: function (ts) {
        console.error(JSON.stringify(ts));
    }
});
       
 }
 else{


    var error_msg="Please enter the following information and Try again\n";
    if(formDetails.firstname==""){
        error_msg+="First Name is missing\n"
    }
    if(formDetails.lastname==""){
        error_msg+="Last Name is missing\n"
    }
    if(formDetails.usname==""){
        error_msg+="User Name is missing\n"
    }
    if(formDetails.password==""){
        error_msg+="Password is missing\n"
    }
    if(formDetails.email==""){
        error_msg+="Email is missing\n"
    }
    if(formDetails.phone==""){
        error_msg+="Phone is missing\n"
    }


    alert(error_msg);
 }

}


function fncheckdetails(value) {
				//if(price_type == "renew" && value.trim()!="") {
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
						// for(var i=0;i<product.length;i++){
							
						// 	dt += '<tr><td class="purchase-header"><span class="tax-header">'+product[i].dgmobi_buynow_product_name+'</span></td><td>US $ <span class="price">'+pricenow+'</span></td><td><div class="count-input space-bottom"><span class="inc_dec" onclick="return incrementOrDecrement(0,'+product[i].dgmobi_buynow_product_id+');"><a class="incr-btn1" data-action="decrease" href="#">–</a></span><input class="quantity" style="float:left; width:40%;margin-top:6px;" type="text" id="no_of_licenses_'+product[i].dgmobi_buynow_product_id+'" name="quantity" disabled="" value="0"><span class="inc_dec" onclick="return incrementOrDecrement(1,'+product[i].dgmobi_buynow_product_id+');"><a class="incr-btn1" data-action="increase" href="#">+</a></span></div></td><td>$ <span id="price_of_'+product[i].dgmobi_buynow_product_id+'">0</span></td></tr>';
						// }
						$("#tbdy").html(dt);
						$(".producttable").css("display","block");
						$("#sai123").val(resp.firstName);
						$("#bhavana123").val(resp.lastName);//bhavana123
						$("#rakesh123").val(resp.phoneNumber);
						$("#harsha123").val(resp.emailId);
						$("#country1").val(resp.countryName);
						$("#country1").change();
						$("#province1").val(resp.provinceName);
						$("#address1").val(resp.countryName);


						formDetails.firstname = resp.firstName;
						formDetails.lastname = resp.lastName;
						formDetails.usname = resp.username;
						formDetails.email = resp.emailId;
						formDetails.phone = resp.phoneNumber;
						formDetails.address = resp.countryName;
						formDetails.countryName = resp.countryName;
						formDetails.provinceName = resp.provinceName;


					}else{
						
                                    		return false;
					}
					
				    },
				    error: function (ts) {
					console.error(JSON.stringify(ts));
				    }
				});
				// } else{
				// 	$("#us_name").val("");
				// }
			    }



    

        //  print_r($productsList);
//              exit;
  //print_r()
     
var validatename = "yes";
var pricenow = "47.99";
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
            
            .text_centered {
             position: relative;
               display: block;
            }
           .header_class {
              display: inline-block;
              position: absolute;
               top: 50%;
                transform: translateY(50%);
            }
            .radio_button{
                margin-right:3px;
            }
            .label_textlabel{
                font-weight: bold;
            }
            label{
                font-weight: bold;
            }
            #selectLicensesText{
                border-radius: 0px 0px 3px 3px;
            }
            .addtocart{
                 width: 15%;
                 height: 33px;
                 border-radius: 5px;
                 background: rgb(115, 176, 226);
                 color: #fff;
                 font-weight: 800;
                 float: right;
            }
            .check_out{
                 width: 15%;
                 height: 33px;
                 display: block;
                 background: rgb(115, 176, 226);
                 color: #fff;
                 font-weight: 800;
                 float: right;
                 margin-right: 10px;
                border-radius: 5px;
                display:none; 
            }
            .textfordisplay{
                text-align: left;
                 margin-left: 15px;
                background: #FAEAA5;
                opacity: 75%;
                border-radius: 5px;
            }
            .button_div{
                padding-top: 10px;
                width: 100%;
                margin-left: -219px;
            }
            .items_on_cart{
                margin-left: 12px;
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
                 
                 
                    <section class="page-section" style="padding-bottom: 0px;">
                        <div class="col-md-8 col-md-offset-2">
                            <!-- PAYPAL FORM -->
                            <div style="display:none;">
                                <form class="dg-form" action="<?php echo $paypalURL; ?>" method="post" id="paypalForm" name="paypalForm">
                                    <input type="hidden" name="business" value="<?php echo $paypalID; ?>">        
                                    <!-- Specify a Buy Now button. -->
                                    <input type="hidden" name="cmd" value="_xclick">

                                    <!-- Specify details about the item that buyers will purchase. -->
                                    <input type="hidden" name="item_name" id="item_name" value="DGMobi Licences">
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
                                <header id="selectLicensesText"> 
                                    <div class="row">
                                            <section class="col col-4">
                                            <img style=" width: 150px; padding: 5px;" src="images/dgmobi.png" alt=""> 
                                            </section>
                                            <section class="text_centered">
                                                <span class="header_class">DGMobi<sup>TM</sup>-Buy Now</span>
                                            
                                            </section>
                                    </div>
                                   
                                    
                                </header>
                                
                                <fieldset style="background-image:url('images/back_ground_img_dgmobo_buynow3.jpg');height: 500px;">
                                <div ></div>
                                
            <!-- <center> -->
                                    
                                    <div class="row">
                                       <div class="col col-2">
                                       <img src="images/banner21.png" alt=""> <!--not working need to checck -->
                                       </div>

                                    <div class="text-center col col-6" style=" width: 55%; padding-top: 10px;">
	                                  <input type=radio class="radio_button"  name=lic_type value=new onchange=updatePriceDisplay(product_select_id.options[product_select_id.selectedIndex].value,0) checked>
                                      <span style="font-size: 18px; font-weight: bold;" id="newlicense">Annual License</span> &nbsp;&nbsp;
                                      <input type=radio class="radio_button"  onchange=updatePriceDisplay(product_select_id.options[product_select_id.selectedIndex].value,1) name=lic_type value=life>
                                      <span id=lifetime style="font-size: 18px; font-weight: bold;">Lifetime License</span>
                                      </div>
                                      <div class="col col-2"></div>

                                      <div class="col col-2"> 
                                        <span class="items_on_cart label_text" id="items_on_cart">0</span> <br>
                                      <img src="images/cart.png" alt="" style="width:35px;"><br>
                                      <span  id="total_price_products" class="label_text">US $0.00</span>
                                      </div>
 
                                    </div>

                                    <div class="row" style=" padding-top: 20px;">
                                        
                                        <section class="col col-5">
                                                   <label class="label" id="select_product_label">Select Product</label>
                                                      <label class="select">
                                            <select id="product_select_id" onchange="updatePriceDisplay(this.options[this.selectedIndex].value,document.querySelector('input[name=lic_type][value=life]:checked')==null?0:1)">
                               

                                       <?php
                                    //    print_r($productsList);
                                    //      exit;
                                    
                                    

                                       foreach($productsList as $data){
                                      //  echo '<option value='.htmlspecialchars($data['id']).>'.htmlspecialchars($data['product_name']).'</option>';
                                        echo '<option value="'.htmlspecialchars($data['id']).'"name="'.htmlspecialchars($data['product_name']).'">'.htmlspecialchars($data['product_name']).'</option>';
                                       }
                                       
                                       ?>
                                      </select>
                                  <i></i>
                                </label>
                                     </section>
                                     <section class="col col-2" >
                             <label class="label" id="price_product_label">Price</label>
                                
                                <input type="text" id="price_select_id" class="label_textlabel" style=" width: 86px; height: 33px;text-align: center;" value="US $47.99">
                                   
                                      </select>
                                    </section>

                                    <section class="col col-2">
                                    <label class="label" id="price_Quantity_label">Quantity</label>
                                    <!-- <input class="quantity" id="id_form-0-quantity" min="0" name="form-0-quantity" value="1" type="number"> -->
                                        <table style="font-weight: bold;height: 33px;font-attr:normal">
                                            <tr>
                                                <td><span onclick="quantity_function(2)"> <a href="#" style=" text-decoration: none;">-</a></span></td>
                                                <td><span class="quantity" id="quantity">0</span></td>
                                                
                                                <td><span class="" onclick="quantity_function(1)"> <a href="#" style=" text-decoration: none;">+</a></span></td>
                                            </tr>
                                        </table> 
                                        <!-- <input type="number" style=" width: 83px; height: 33px;" min=1> -->
                                        

                                    </section>
                                    <section class="col col-2">
                                    <label class="label" id="device_type_label1">Device</label>
                                    <select name="" class="label_textlabel" id="device_type_label" style=" height: 33px;width: 95px;">
                                        <option value=1>Android</option>
                                        <option value=0>iOS</option>
                                    </select>
                                   
                                    </section>
                                    </div> 

                                    <div class="row">
                                        <section class="col col-12">
                                        <span class="zeroprice_msg" style="font-weight: bold;"> </span>
                                        </section>
                                        
                                        </div>

                                        <div class="row" style=" padding-top: 20px;">
                                            
                                            <section class="col col-8 textfordisplay" >
                                                <span>DGMobi <sup>TM</sup> is a Mobile app that calculates Placards needed when transporting HAZMAT(Dangerous Goods).<br>Available as an Annual or Perpetual license.<br>Renewing your license? Your current license extended by 1 year.</span><br>
                                                <span>DGSMS <sup></sup> products handle over 3.5 Million tons of HAZMAT annually.<br> Haul HAZMAT with correct placarding and have access to the ERG if needed.<br>Validate documentation details before picking up loads.<br>Supports 49 CFR or TDG regulation.</span><br>
                                                <span>Your data is Private, never shared or sold to any 3<sup>rd</sup>parties</span><br>
                                                <span>24/7support line where a live operator will answer questions</span>
                                            </section>

                                        </div>
                                        <div class="row button_div" style=" padding-top: 10px; width: 100%; margin-left: -219px;">     
                                            <input type="button" class="addtocart " id="addtocart" value= "Add To Cart">
                                            <input type="button" class="check_out" value="Check out" id="registration">                             
                                        </div>

                                    </center>
                                </fieldset>

                               

                                <div id="popup_body" style="display: none;">
				                      <form class="popup_body1" id="Ganesh">
					                 <fieldset style="">
                                        #POPUP_BODY</form>
                                     </fieldset>
				                      </form>
			                       </div>

                                   <form id="popup_body1" style="display:none;">
                                                                      
                                        <!-- <div class="row"> -->
                                        <section>
                                        <span id="UserNameLabel">User Name</span>
                                      <input type="text" class="ganesh" name="username" id="ganesh" onblur=fncheckdetails(this.value) maxlength="150">
                                        
                                    </section>
                                        <!-- </div> -->
                                        <br>
                                      
                                        <section>
                                            <span>First Name</span>
                                             <input type="text" name="firstname" id="sai" class="firstname" maxlength="20">
                                            
                                        <!-- </section>
                                        <section class="col col-6"> -->
                                            <span>Last Name</span>
                                              <input type="text" name="lastname" id="bhavana" maxlength="20">
                                           
                                        </section>
                                                <br>

                                        <!-- <div class="row"> -->
                                        <section>
                                       <span>Email Id</span>
                                        <input type="text" name="emailid" id="harsha" maxlength="150">
                                        
                                    <!-- </section>
                                    <section style="" id=usernameval> -->
                                        <span>Mobile Number</span>  
                                        <input type="text" name="phonenumber" id="rakesh" maxlength="20">
                                        
                                    </section>
                                        <!-- </div>                                        -->


                                    

                                    </form>


                                

                                
                               <footer>
                                    <!-- Languages Removed From Here -->
                                    
                                       
                                    <!-- <section style="display:none;" id=usernameval>
                                        <label class="label"><span id="UserNameLabel">User Name</span> <span style="color: darkred">*</span></label>
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>
                                            <input type="text" name="us_name" id="us_name" onblur=fncheckdetails(this.value) maxlength="150">
                                        </label>
                                    </section> -->

                      <!-- <div class="row">
                                      first name row need to add in after check out
                                     

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
                                    </div>  -->

                                    <!-- <div class="row">
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
                                                        </div> -->
                                                        </footer>

                                                        <!-- <footer>
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
                                                        </footer> -->
                                                        </form>
                                                        <br>
                                                        <br>
                                                        </div>
                                                        </section>
                                                        <section>
                                                            <p class="text" style="font-size: 15px; color: #000; text-align: center;">
                                                                <!-- <span id="disclaimerLineOne">
                                                                    This offer/promotion is being conducted and managed solely by DGMobi<sup>TM</sup>.
                                                                </span>  -->
                                                                <br>
                                                                <!-- <span id="disclaimerLineTwo">
                                                                    Landstar is not affiliated with nor involved with how the offer/promotion is managed or how winners are selected.
                                                                </span> -->
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
                                                                    <section class="col-md-5">
                                                                        <p style="font-size:16px; font-weight:bold;">
                                                                            <span id="callText">QUESTIONS? CALL</span> +1 888-409-8057 EXT: 1006
                                                                        </p>
                                                                    </section>
                                                                    <section class="col-md-offset-5 col-md-4" style=" float: right; width: 15%;">
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
                            
                            $("#product_select_id").on({
                                click: function (event) {
                                    var type=$("#product_select_id").val();
                                    //if()
                                   // return false;
                                    }

                            })

                            // function quantity_function(val){

                            //    var present_quantity=document.getElementById("quantity").innerHTML;
                            //    if(val==1){ //click on increment button
                            //     present_quantity++;
                            //    document.getElementById("quantity").innerHTML=present_quantity;
                            //    //present_quantity++;
                            // }
                            // else{    //click on decrement button
                            //     if(present_quantity!=0){
                            //         present_quantity--;
                            //    document.getElementById("quantity").innerHTML=present_quantity; 

                            //     }
                               
                            // }
                                 
                          
                            // }
                           
                            

                     

                            

                            

                            
                



                            // Global Variables
                            

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
                                // document.getElementById("f_name").onpaste = function () {
                                //     return false;
                                // };
                                // document.getElementById("l_name").onpaste = function () {
                                //     return false;
                                // };

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
                                      //  price: pricenow, productsList11[i].dgmobi_buynow_product_price
                                        price : "<?php echo($data["dgmobi_buynow_product_price"]) ?>",
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
                                      //  price: pricenow,
                                          price : productsList11[i].dgmobi_buynow_product_price,
                                        currency: productsList11[i].dgmobi_buynow_product_currency,
                                        noOfLicenses: 0,
                                        totalPrice: 0
                                    };	//productsList11[0].dgmobi_buynow_product_price
//productsList[productsList11.length] = dataObj;
							dt += '<tr><td class="purchase-header"><span class="tax-header">'+productsList11[i].dgmobi_buynow_product_name+'</span></td><td>US $ <span class="price">'+productsList11[i].dgmobi_buynow_product_price+'</span></td><td><div class="count-input space-bottom"><span class="inc_dec" onclick="return incrementOrDecrement(0,'+productsList11[i].dgmobi_buynow_product_id+');"><a class="incr-btn1" data-action="decrease" href="#">–</a></span><input class="quantity" style="float:left; width:40%;margin-top:6px;" type="text" id="no_of_licenses_'+productsList11[i].dgmobi_buynow_product_id+'" name="quantity" disabled="" value="0"><span class="inc_dec" onclick="return incrementOrDecrement(1,'+productsList11[i].dgmobi_buynow_product_id+');"><a class="incr-btn1" data-action="increase" href="#">+</a></span></div></td><td>$ <span id="price_of_'+productsList11[i].dgmobi_buynow_product_id+'">0</span></td></tr>';
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

                    // if(document.getElementsByName("lic_type")[0].checked){


                    // }


//console.log(productsList);


				//if(value=="new"){

                    if(document.getElementsByName("lic_type")[0].checked){
				
				  $("#price_select_id").val("US $47.99");
				 
					//clearFormElements();
					//constructproducts();
					
				}else if(document.getElementsByName("lic_type")[1].checked) {
				  
				//   $("#usernameval").css("display","block");
				//   $("#us_name").val("");
				//   $(".producttable").css("display","none");
				//   $("#f_name, #l_name, #email_id, #phone_no, #address").attr("readonly","readonly");
				//   pricenow = "";
				//   price_type = "renew";
				//   validatename = "no";
                  $("#price_select_id").val("US $250.00");
				 // clearFormElements();
                }

//clearFormElements();
/*formDetails.firstname = "";formDetails.lastname = "";formDetails.usname = "";formDetails.email = "";formDetails.phone = "";formDetails.address = "";*/
				// }else if(value=="life") {
				//   $("#us_name").val("");
				//   $("#usernameval").css("display","none");
				//   $(".producttable").css("display","block");
				//   $("#f_name, #l_name, #email_id, #phone_no, #address").removeAttr("readonly");
				//   pricenow = "250";
				//   price_type = "life";
				//   clearFormElements();
				//   constructproducts();
				//   validatename = "yes";
				// }


					$(".quantity").each(function(){
					  var id = $(this).attr("id");
					  
					  var rs = id.split("_");
					  var no = rs[rs.length -1];
					  
					  	$(this).val("0");
					
				        });
			      

				$("#total_price").html($("#total_no_of_licenses").html() * pricenow)
                if(value=="life"){
                      $(".price").html(pricenow);
                }
				
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
				//if(price_type == "renew" && value.trim()!="") {
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
						// for(var i=0;i<product.length;i++){
							
						// 	dt += '<tr><td class="purchase-header"><span class="tax-header">'+product[i].dgmobi_buynow_product_name+'</span></td><td>US $ <span class="price">'+pricenow+'</span></td><td><div class="count-input space-bottom"><span class="inc_dec" onclick="return incrementOrDecrement(0,'+product[i].dgmobi_buynow_product_id+');"><a class="incr-btn1" data-action="decrease" href="#">–</a></span><input class="quantity" style="float:left; width:40%;margin-top:6px;" type="text" id="no_of_licenses_'+product[i].dgmobi_buynow_product_id+'" name="quantity" disabled="" value="0"><span class="inc_dec" onclick="return incrementOrDecrement(1,'+product[i].dgmobi_buynow_product_id+');"><a class="incr-btn1" data-action="increase" href="#">+</a></span></div></td><td>$ <span id="price_of_'+product[i].dgmobi_buynow_product_id+'">0</span></td></tr>';
						// }
						$("#tbdy").html(dt);
						$(".producttable").css("display","block");
						$("#sai123").val(resp.firstName);
						$("#bhavana123").val(resp.lastName);//bhavana123
						$("#rakesh123").val(resp.phoneNumber);
						$("#harsha123").val(resp.emailId);
						$("#country1").val(resp.countryName);
						$("#country1").change();
						$("#province1").val(resp.provinceName);
						$("#address1").val(resp.countryName);


						formDetails.firstname = resp.firstName;
						formDetails.lastname = resp.lastName;
						formDetails.usname = resp.username;
						formDetails.email = resp.emailId;
						formDetails.phone = resp.phoneNumber;
						formDetails.address = resp.countryName;
						formDetails.countryName = resp.countryName;
						formDetails.provinceName = resp.provinceName;


					}else{
						
                                    		return false;
					}
					
				    },
				    error: function (ts) {
					console.error(JSON.stringify(ts));
				    }
				});
				// } else{
				// 	$("#us_name").val("");
				// }
			    }

                            function increaseOrDecreaseProductValue(clickedId, newVal) {
//alert(clickedId+" "+newVal);
                                var totalPrice = 0;
                                productsList.map(function (dataObj, index) {
                                    if (dataObj["id"] == clickedId) {
                                        dataObj["noOfLicenses"] = parseInt(newVal);
                                        deviceName= $("#device_select_id").val();

                                        if(deviceName==!""){
                                            if(deviceName=="Android"){
                                            dataObj["mobileType"]=1;  //android=1
                                        }
                                        else{
                                            dataObj["mobileType"]=0;    //IOS=0
                                        }

                                        }
                                        
                                        
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
                   if($("#device_select_id").val()!=""){
                    deviceName= $("#device_select_id").val(); 
                    if(deviceName=="Android"){
                        formDetails.deviceName = 1;
                    } 
                    else{
                        formDetails.deviceName = 0  ;
                    }
                   
                   }
                 //  formDetails.deviceName =

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
                                $(".modal-header, .btn-primary").css("background", "#0D4D81");
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
                                $(".modal-header, .btn-primary").css("background", "#0D4D81");
                                $(".modal-header").css("color", "white");
                                $(".btn-danger").css("background", "#b71f37");
                                $(".purchase-header").css("text-align", "left");
                                $(".purchase-bold").css("font-weight", "bold");
                            }

                            /*
                             ** 
                             ** will be proceeding for storing the details in the local db and will navigate/submit the form to the action(paypal)
                             */

                             
                    


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
