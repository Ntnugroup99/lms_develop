<?php
include("mysql_connect.php");
if($_SESSION["account_lms"] == null)
	header("location:login.php"); 
$id = $_POST['account'];
$c_id = $_POST['c_id'];
$datetime = date ('Y-m-d'); 
$sql = "insert into selection values('$c_id','$id','$datetime')";
if (!$_SESSION["account_lms"]==null&&$_SESSION["account_lms"]==$id){
	mysql_query($sql);
	
}



?>
