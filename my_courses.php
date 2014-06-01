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

<article>
	<div id="left">
	
	</div>
	<div id="right">
		<h2 class="ui header">
					<i class="settings icon"></i>
						<div class="content">
						選課資訊
							<div class="sub header">我已經選擇的課程</div>
						</div>
					</h2>
		
		<?php 
		/*取得選課資料*/
		$sql = "SELECT * FROM selection,courses where account='$account' and selection.c_id=courses.c_id";
		$result = mysql_query($sql);
											
				if (!$result) { // add this check.
					die('Invalid query: ' . mysql_error());
					}
					while($row = mysql_fetch_array($result)){
					?>
						<div class="ui blue segment massive celled animated list">
							<div class="item">
								<a class="right floated big red ui button">取消此課程</a>
								<a class="right floated big teal ui button">點我進入課程</a>
								
								<i class="big checked checkbox icon"></i>
									<div class="content">
										<div class="header"><?php echo $row['c_name']; ?></div>
									<div class="description">選課時間：<?php echo $row['c_date']; ?></div>
										</div>
							</div>
							
						</div>
					
					<?php
					}
				
				
			


			?>
	
	</div>
	
	
	
</article>
<!--Footer網頁引入-->
<?php require_once("footer.php");?>


</body>
</html>
