<?php
include("mysql_connect.php");
if($_SESSION["account_lms"] == null)
	header("location:login.php"); 
$meg='';
$id = $_GET['account'];
$c_id = $_GET['c_id'];
$datetime = date ('Y-m-d'); 
$sql = "delete from selection where account='$id' and c_id='$c_id '";
if ($_SESSION["account_lms"]!=null&&$_SESSION["account_lms"]==$id){
	mysql_query($sql);
	$meg="刪除成功";
}else{
	$meg="權限不足";

}

?>
<script>
alert('<?php echo "$meg"; ?>');
window.location.href = 'my_courses.php';
</script>