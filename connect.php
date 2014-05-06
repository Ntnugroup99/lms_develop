<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
include("mysql_connect.php");
$id = $_POST['id'];
$pw = $_POST['pw'];
$b = $_POST['button'];

$sql = "SELECT * FROM member where account='$id' and password='$pw'";
$row = mysql_fetch_array(mysql_query($sql));
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Learning Management System Sample</title>
</head>

<body>
<div id="HEADER">
	<h2>學習管理系統範例</h2>
</div>
<div id="MAIN_NAV">
	<ul>
		<li><a href="reading.php">開始閱讀</a></li>
		<li><a href="record.php">歷史紀錄</a></li>
		<li><b>會員資料修改</b></li>
		<li><a href="manager_login.php">管理者專區</a></li>
		<li><a href="index.php" style="color:#FF99FF">回首頁</a></li>
	</ul>
</div>
<div id="CONTENT">
	<p>
	
		<center>
		<h2>會員資料修改<br/></h2>
		<br/>
		<br/>
		
		<?php
			if (!$row) { // add this check.
				echo "<h3>帳號或密碼錯誤，請重新輸入</h3>";
        		echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
			}
			else {
		?>
				<form name="form" method="post" action="member_update.php">
					<p>
					帳號：<input type="text" name="account" value="<?php echo $row['account']; ?>" disabled="true"/> <br>
					<input type="hidden" name="account" value="<?php echo $row['account']; ?>"/> 
					密碼(留空表示不修改)：</h1><input type="password" name="pw" /> <br>
					確認密碼：</h1><input type="password" name="pwconfirm" /> <br>
					使用者姓名：</h1><input type="text" name="username" value="<?php echo $row['username']; ?>" /> <br>
					Email：</h1><input type="text" name="email" value="<?php echo $row['email']; ?>" /> <br>
					城市：</h1><input type="text" name="country" value="<?php echo $row['country']; ?>" /> <br>
					年齡：</h1><input type="text" name="age" value="<?php echo $row['age']; ?>" /> <br>
					</p>
					<input type="submit" name="button" value="修改" />
					<input type="button" value="回上一頁" onclick="javascript:history.back(1)" />
					<p>
					</p>
				</form>
				
		<?php
			}
		?>
		</center>
		<br/>
		<br/>
	</p>
</div>
<div id="FOOTER">	
	<p>
		<br/><br/><br/><br/><br/><br/>
		<h3><center><br/>Author by Yi-Chan Kao</center></h3>
	</p>
</div>
</body>
</html>


