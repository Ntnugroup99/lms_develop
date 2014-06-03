<?php
include("mysql_connect.php");
$id = $_POST['account'];
$c_id = $_POST['c_id'];
$datetime = date ('Y-m-d'); 
$sql = "insert into selection values('$c_id','$id','$datetime')";
mysql_query($sql);


?>
