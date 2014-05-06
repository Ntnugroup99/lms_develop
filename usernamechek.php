<?php
include("mysql_connect.php");
$id = $_POST['username'];
if($_POST['type']=="insert"){
	$sql = "insert into member(account,password,username,email,f_name) values('"
	.$_POST['username']."','".$_POST['password']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['firstname']."'".")";
	$row = mysql_query($sql);
		if ($row) { // add this check.
			echo "新增成功！";
		}else
		{
			echo "新增失敗";

		}
}else{
$sql = "SELECT * FROM member where account='$id'";
$row = mysql_fetch_array(mysql_query($sql));
if (!$row) { // add this check.
	echo "此帳號可用！";

}else
{
	echo "此帳號已有人使用！";

}

}


?>
