<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	include("mysql_connect.php");
	$account = $_POST['account']; 
	$password = $_POST['pw'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$country = $_POST['country'];
	$age = $_POST['age'];
	$button = $_POST['button'];
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
				$sql = "INSERT INTO member (account, password, username, email, country, age) VALUES ('$account', '$password', '$username', '$email', '$country', '$age')";
				$result = mysql_query($sql);
				if (!$result) { // add this check.
					die('Invalid query: ' . mysql_error());
				}
				echo "<h3>資料已新增.....</h3>";
			}
			else if($button === "修改"){
				$sql = "UPDATE member SET account='$account', password='$password', username='$username', email='$email', country='$country', age='$age' WHERE account='$account'";
				$result = mysql_query($sql);
				if (!$result) { // add this check.
					die('Invalid query: ' . mysql_error());
				}
				echo "<h3>資料已修改.....</h3>";
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