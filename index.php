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

		<center>
		<h2>最新公告<br/></h2>
		<table>
		<tr>
			<td> <h4>請點選上方連結以使用相關功能<br/></td>
		</tr>
		</table>
		<br/><br/><br/><br/><br/><br/></h4>
		</center>
</div>
<!--Footer網頁引入-->
<?php require_once("footer.php");?>


</body>
</html>
