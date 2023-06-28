<?php
$uniqueid = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
<title>User Credentials</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style type='text/css'>
table th, table td {
padding: 10px;
text-align: center;
/*border-top: 1px solid #eeeeee;
border-left: 1px solid #dddddd;*/
}
table {
width: 100%;

}
</style>
</head>
<body>
<?php
		include "header_nav.php";
		$pageId = '1458';
		?>
<hr class="mt-0 mb-0 "/>
            <!-- About Section -->
            <section class="page-section">
                <div class="row relative">

	<div id='detalDiv' class="container" style="display:none;">
<h4>Dear <span id="name"></span></h4>
<div>D&R management has assigned a copy of DGMobi for you to use when picking up Dangerous goods in Canada and the US. This can be verified by talking to your manager <span id='managerName'></span></div></br>
<div>To install on your mobile device, please download the Canadian and US apps by click on the clicks for your device</div></br>
<div>
<table class="table table-bordered" style="border-color:#000;">
<thead>
<tr><th>Country</th><th>Apple(iOS)</th><th>Android</th></tr>
</thead>
<tbody>
<tr><td>Canada</td><td><a href='http://bit.do/e3reg'>click</a></td><td><a href='http://bit.do/e3rd6'>click</a></td><tr>
<tr><td>US</td><td><a href='http://bit.do/e3rex'>click</a></td><td><a href='http://bit.do/e3res'>click</a></td><tr>
</tbody>
</table>
</div><br>
<div>User access credentials are:</div>
<div>&nbsp;&nbsp;&nbsp; username : <span id='username'></span></div>
<div>&nbsp;&nbsp;&nbsp; password : <span id='password'></span></div>
<br><br>

<div>To view a demo video of DGMobi – please click on this <a href='http://bit.do/e3reo'>click</a></div><br>

<div>For assistance please email <a href='emailto:support@dgmobi.com'>support@dgmobi.com</a> or call +1 888-409-8057 EXT:1004 or 1005</div>
</div>
<div id='errordiv'></div>

		</div>
<br>
<hr class="mt-0 mb-0 "/>
<div class="hs-line-4 align-center mt-10">
                               Call for a free trial | <a rel="canonical" href="contact.php">Contact Us</a> </div>

                              <div class="hs-line-3">
                                <ul class="nav tpl-alt-tabs  ">
                        
                        <li>
                                
                               CANADA<br>
								1-613-800-7368
                        </li>
                  <li>
                                
                                USA (Toll Free)<br>
								+1 888-409-8057
                        </li>
                        <li>
                               
                               INDIA<br>
								+91-888-583-5959
                        </li>
                        <li>                                
                               
                                TOLL FREE<br>
								+1 888-409-8057
                                
                        </li>
                        <li> <a rel="canonical" href="http://www.ideabytes.com" target="_blank"><img src="images/ideabytes.png" width="150" height="51" alt="Ideabytes logo Web/mobile Solutions Dangerous Goods/HAZMAT Air, Road Sea Transport (TDG, IATA, IMDG, 49-CFR, ADR)"/></a> </li>
                    </ul>
                            </div>
	</section>

 <?php
 include "footer.php";
 ?>

<script>
$(function(){
	$.ajax({
		"method": "GET",
		"url": "http://34.236.10.215:8080/DGVIEWS_WS_TEST/api/day_and_ross_user_info_by_uniqueid?uniqueId=<?php echo $uniqueid;?>",
		beforeSend: function (xhr) {
    		xhr.setRequestHeader ("tenantid", "dgviews_test");
			xhr.setRequestHeader ("Authorization", "Basic dXNlcjpwYXNzd29yZA==");
		},
		"success":function(data, status) {			
			if(status === 'success'){
				$("#detalDiv").css("display", "block");
				$("#errordiv").css("display", "none");
				$("#name").html(data.firstName);
				$("#username").html(data.username);
				$("#password").html(data.password);
				$("#managerName").html(data.managerName);
			} else {
				$("#detalDiv").css("display", "none");
				$("#errordiv").css("display", "block");				
				$("#detalDiv").html('');
				$("#errordiv").html("Sorry! no content available...");
			}
			
		},
		"error":function (jqXhr, textStatus, errorMessage) {
        		$("#detalDiv").html('');
			$("#errordiv").html(errorMessage);
			$("#errordiv").css("display", "block");
    		}
	});
});
</script>
</html>
