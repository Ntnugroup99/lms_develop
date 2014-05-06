<?php
include("mysql_connect.php");
$id = $_POST['username'];
$pw = $_POST['password'];
$sql = "SELECT * FROM member where account='$id' and password='$pw'";
$row = mysql_fetch_array(mysql_query($sql));
if (!$row) { // add this check.
	echo "帳號或密碼有誤！";
	$_SESSION["account_lms"] = null;
	$_SESSION["name_lms"] = null;
}else
{
	echo "登入成功！";
	$_SESSION["account_lms"] = $id;
	$_SESSION["name_lms"] = $row['username'];
}

?>
