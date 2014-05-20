<?php 
//檢查是否登入
include("mysql_connect.php");
$account=$_SESSION["account_lms"];
$name=$_SESSION["name_lms"];
if($account == null)
	header("location:login.php"); 
?>

		<div class="ui pointing dropdown link item">
			<i class="large icon settings"></i> 功能表 <i class="dropdown icon"></i>
			<div class="menu">
				<a href="reading_connect.php"class="item"><i class="book icon"></i>我的選課</a>
				<a href="record_connect.php"class="item"><i class="date basic icon"></i>我的歷史紀錄</a>
				<a href="record_connect.php"class="item"><i class="date basic icon"></i>更多其他課程</a>
			</div>
		</div>
		<a href="index.php"class="item">
			<i class="large home icon"></i> 數位學習管理系統
		</a>
		
	  <!--Menu右邊欄位-->
		<div class="right menu">
			<!--登入資訊-->
			<div class="ui pointing dropdown link item">
				<i class="icon member"></i><img class="ui tiny avatar image" src="images/member.jpg"> <?php echo $name ?> <i class="dropdown icon"></i>
				<div class="menu">
					<a href="#"class="item"><i class="edit icon"></i>會員資料修改</a>
					<a href="logout.php" class="item"><i class="sign out icon"></i>登出</a>
					<a href="#"class="item"><i class="user icon"></i>管理者專區</a>
				</div>
			</div>
			
		</div>

<?php  ?>