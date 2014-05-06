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
<?php

$serial = $_POST['select'];
?>
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
		<h2><?php echo $name; ?>，開始閱讀<br/></h2>
		<br/>
		<br/>
		
		<?php
				$serial_array = explode("+",$serial); // serial+type
				$serial_number = $serial_array[0];
				$type = $serial_array[1];
				
				$sql = "SELECT content FROM reading WHERE serial=".$serial_number."";
				$result = mysql_query($sql);
											
				if (!$result) { // add this check.
					die('Invalid query: ' . mysql_error());
				}		
					
				$f = mysql_fetch_array($result);
				echo "<table width=800 border=1>";
				echo "<tr><td>";
				
				if($type === "article"){
					$arrText = file ("meterial/".$f['content']);
					for ($i = 0 ; $i < count($arrText) ; $i++){
						echo "$arrText[$i]"."<br/>";
					}
				}
				else if ($type === "figure"){
					echo "<img src='meterial/".$f['content']."' alt='Figure not found'>";
				}
				echo "</td></tr></table>";
			
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


