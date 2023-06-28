<?php
//$langId = 1;
//$pageId = '1599';
//include "../analytics_footer.php";

$unique = (isset($_GET["unique"]) && ($_GET["unique"] != "")) ? $_GET["unique"] : "";
header("Location: landstar-dgmobi_buy_now.php?unique=" . $unique);
?>