<?php 

session_start();

// 這種方法是將原來註冊的某個變量銷毀

unset($_SESSION["account_lms"]); 
unset($_SESSION["name_lms"]);
header("location:login.php");
//echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
?>