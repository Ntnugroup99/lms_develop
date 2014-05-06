<!doctype html>
<html >
<head>
<meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  
  
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
	<script type="text/javascript" src="javascript/jquery.onepage-scroll.js"></script>
	
	<script type="text/javascript" src="javascript/semantic.min.js"></script>
	<!--<script type="text/javascript" src="javascript/validate-form.js"></script>-->
	<link href='css/onepage-scroll.css' rel='stylesheet' type='text/css'>
	
	
	<link href='css/semantic.css' rel='stylesheet' type='text/css'>
	<!--<link href='css/semantic.min.css' rel='stylesheet' type='text/css'>-->
	<link href='css/lms.css' rel='stylesheet' type='text/css'>
	
<script>
	$(document).ready(function(){
		$('.ui.dropdown')
			.dropdown({
				on: 'hover',
				action: 'hide'
			})
		;//Drop down
		$('.ui.button')
			.on('click', function(event) {
				$('.ui.button').dropdown('toggle');
				event.stopImmediatePropagation();
			})
			;

	
	});
</script>
<title>學習管理系統</title>
</head>

<body>
<div class="ui large teal inverted menu">
	<div class="menu">
		<?php require_once("header-menu-login.php");?>
	</div>
</div>	

<div id="CONTENT">
	<p>
	
		<center>
		<h2>閱讀紀錄查詢<br/></h2>
		<br/>
		<br/>
		
		<?php

				$sql = "SELECT record.account, reading.name, record.time, record.comments FROM record JOIN reading ON reading.serial=record.serial WHERE record.account='$account'";
				$result = mysql_query($sql);
											
				if (!$result) { // add this check.
					die('Invalid query: ' . mysql_error());
				}
				
				echo "<table width=800 border=1>";
				echo "<tr align=center><td>姓名</td><td>資料名</td><td>時間</td><td>評論</td></tr>";		
					
				while($row = mysql_fetch_array($result)){
					echo "<tr align=center><td>".$row['account']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['time']."</td>";
					echo "<td>".$row['comments']."</td>";
					echo "</tr>";
				}
				echo "</table>";
			
		?>

		
		</center>
		<br/>
		<br/>
	</p>
</div>
<!--Footer網頁引入-->
<?php require_once("footer.php");?>

</body>
</html>


