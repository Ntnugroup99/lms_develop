<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	include("mysql_connect.php");
	$account = $_POST['select1']; 
	$button = $_POST['button1'];
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
		<li><a href="login.php">會員資料修改</li>
		<li><b>管理者專區</b></li>
		<li><a href="index.php" style="color:#FF99FF">回首頁</a></li>
	</ul>
</div>
<div id="CONTENT">
	<p>
		<h2>管理者專區<br/></h2>
		<br/>
		<br/>
		<center>
		<?php
			
			if($button === "新增"){
		?>
				<form name="form" method="post" action="admin_member_done.php">
					<p>
					帳號：<input type="text" name="account" /> <br>
					密碼：</h1><input type="text" name="pw" /> <br>
					使用者姓名：</h1><input type="text" name="username" /> <br>
					Email：</h1><input type="text" name="email" /> <br>
					城市：</h1><input type="text" name="country" /> <br>
					年齡：</h1><input type="text" name="age" /> <br>
					</p>
					<input type="submit" name="button" value="新增" />
					<p>
					</p>
				</form>
		<?php
			}
			else if($button === "修改"){
				$sql = "SELECT * FROM member WHERE account='$account'";
				$result = mysql_query($sql);
											
				if (!$result) { // add this check.
					die('Invalid query: ' . mysql_error());
				}
				else{
				$row = mysql_fetch_array(mysql_query($sql));
		?>
					<form name="form" method="post" action="admin_member_done.php">
						<p>
						帳號：<input type="text" name="account" value="<?php echo $row['account']; ?>" /> <br>
						密碼：</h1><input type="text" name="pw" value="<?php echo $row['password']; ?>"/> <br>
						使用者姓名：</h1><input type="text" name="username" value="<?php echo $row['username']; ?>" /> <br>
						Email：</h1><input type="text" name="email" value="<?php echo $row['email']; ?>" /> <br>
						城市：</h1><input type="text" name="country" value="<?php echo $row['country']; ?>" /> <br>
						年齡：</h1><input type="text" name="age" value="<?php echo $row['age']; ?>" /> <br>
						</p>
						<input type="submit" name="button" value="修改" />
						<p>
						</p>
					</form>
		<?php
				}
			}
			else if($button === "刪除"){
				$sql = "DELETE FROM member WHERE account='$account'";
				$result = mysql_query($sql);
											
				if (!$result) { // add this check.
					die('Invalid query: ' . mysql_error());
				}
				else{
					echo "<h3>資料已刪除.....</h3>";
				}
			}
		?>
		</center>
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