<?php
session_start(); 
$host="localhost";
$user="root";
$password="xji600";
$link=mysql_connect($host,$user,$password);
$query = "SET NAMES 'utf8'";
$result = mysql_query($query);
mysql_select_db("elearning",$link) || die("db error");
?>