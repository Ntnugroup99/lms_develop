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
		<h2><?php echo $name; ?>，請選擇閱讀材料<br/></h2>
		<br/>
		<br/>
		
		<?php

				$sql = "SELECT * FROM reading";
				$result = mysql_query($sql);
											
				if (!$result) { // add this check.
					die('Invalid query: ' . mysql_error());
				}
				
				echo "<form name='form' method='post' action='reading_start.php'>";
				echo "<input type='hidden' name='account' value=".$account." />";
				echo "<input type='hidden' name='name' value=".$name." />";
								
				echo "<table width=800 border=1>";
				echo "<tr align=center><td>選取</td><td>編號</td><td>類型</td><td>資料名</td></tr>";		
					
				while($row = mysql_fetch_array($result)){
					
					echo "<tr align=center><td><input name='select' type='radio' value=".$row['serial']."+".$row['type']."></td>";
					echo "<td>".$row['serial']."</td>";
					echo "<td>".$row['type']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "</tr>";
				}
				echo "</table>";
				echo "<input type='submit' name='button' value='開始閱讀' />";	
				echo "</form>";
			
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


