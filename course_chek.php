<?php
include("mysql_connect.php");
$id = $_POST['account'];
$c_id = $_POST['c_id'];
$sql = "SELECT * FROM selection where account='$id' and c_id='$c_id'";
$row = mysql_fetch_array(mysql_query($sql));
if (!$row) { // add this check.
	echo "無";

}else
{
	echo "有";

}

?>
