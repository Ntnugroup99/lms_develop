<?php 
//檢查是否登入
session_start(); 
$account=$_SESSION["account_lms"];
$name=$_SESSION["name_lms"];

if($account !== null){
	echo "<script>location.href='index.php';</script>"; 
}else{


?>

		<a href="index.php"class="item">
			<i class="large home icon"></i> 數位學習管理系統
		</a>
		
	  <!--Menu右邊欄位-->
		<div class="right menu">
			<!--登入資訊-->
			<div class="ui huge buttons">
				<a href="#" class="ui red button"><i class="sign in icon"></i>Sign in</a>
				<div class="or"></div>
				<a href="#" class="ui teal button"><i class="sign up icon"></i>Sign up</a>
			</div>

		</div>	
<?php } ?>
