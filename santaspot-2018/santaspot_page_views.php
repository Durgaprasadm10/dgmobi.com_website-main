<?php
/******************************************************************
 * Ideabytes Software India Pvt Ltd.                              *
 * 50 Jayabheri Enclave, Gachibowli, HYD                          *
 * Created Date : 22/11/2014                                      *
 * Created By : Ravi Teja                                         *
 * Project : DGMobi Landstar Payment                              *
 * Modified by : Ravi Teja     Date : 24/11/2017                  *
 * Version : VB.0.0.2                                             *
 * Description : To display Landstar payment for Santa's Bag      *
 *****************************************************************/

include_once('init.php');

$viewsHandler = new ViewCount();
$viewsHandler->updateGeoInfo();
$viewsList = $viewsHandler->getAll(); //Get all views list
$trData = "";
$i = 1;
if( count($viewsList) > 0 ){
	foreach ($viewsList as $data) {
		$trData .= "<tr><td>" . $i . "</td>";
		$trData .= "<td>" . $data["ip_address"] . "</td>";
		$trData .= "<td>" . $data["unique_id"] . "</td>";
		$trData .= "<td>" . $data["country"] . "</td>";
		$trData .= "<td>" . $data["region"] . "</td>";
		$trData .= "<td>" . $data["city"] . "</td>";
		$trData .= "<td>" . $data["created_on"] . "</td></tr>";
		$i++;	
	}
}else{
	 $trData .= "<tr><td>No Results Found</td></tr>";
}

echo "<h1>Santa's page views</h1>";

?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
</head>
<body>
  <table id="example">
    <thead>
      <tr><th>id</th><th>ip address</th><th>unique id</th><th>country</th><th>state</th><th>city</th><th>date</th></tr>
    </thead>
    <tbody>
      <?php echo $trData;?>
    </tbody>
  </table>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
  <script>
  $(function(){
    $("#example").dataTable();
  })
  </script>
</body>
</html>