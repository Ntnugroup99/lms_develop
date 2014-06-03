<?php
include("mysql_connect.php");
$id = $_GET['account'];
$c_id = $_GET['c_id'];
$datetime = date ('Y-m-d'); 
$sql = "delete from selection where account='$id' and c_id='$c_id '";
mysql_query($sql);


?>
<script>
alert('刪除成功');
window.location.href = 'my_courses.php';
</script>