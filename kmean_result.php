<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	include("mysql_connect.php");
	$a=array();
	$a=$_SESSION["a_array"];
	
	function sql_search($min,$max){
	$sql = "SELECT account from record group by account having count(account) between ".$min." and ".$max;
	$result = mysql_query($sql);
									
			if (!$result) { // add this check.
				die('Invalid query: ' . mysql_error());
			}
	return $result;
	}
	
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
				
				$min=0;
				$max=0;
				foreach ($a as $key => $value) {
					if($key == 0)
					{
						echo "魯蛇組<br>";
						$min=min($a[0]);
						$max=max($a[0]);
						echo "閱讀次數小於".$max."以下為名單:<br>";
						$result=sql_search($min,$max);
							while($row = mysql_fetch_row($result))
								echo "名單：".$row[0]."<br>";
						
					
					}else if( $key==1)
					{
						echo "<br>平平<br>";
						$min=min($a[1]);
						$max=max($a[1]);
						echo "閱讀次數介於".$min."~".$max."之間:<br>";
						$result=sql_search($min,$max);
							while($row = mysql_fetch_row($result))
								echo "名單：".$row[0]."<br>";
						
					}else
					{
						echo "<br>溫拿組<br>";
						$min=min($a[2]);
						$max=max($a[2]);
						echo "閱讀次數介於".$min."~".$max."之間:<br>";
						$result=sql_search($min,$max);
							while($row = mysql_fetch_row($result))
								echo "名單：".$row[0]."<br>";
					}
				
				}
			
		?>
	<a href="admin_record_edit.php">kmean分析</a>
		
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