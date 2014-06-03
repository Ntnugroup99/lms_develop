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
	<script src="javascript/button.js"></script>
	<script src="javascript/sidebar.js"></script>
<script>
	$(document).ready(function(){
	$('#menu')
		  .sidebar('attach events', '#button')
		;
	
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
<div class="ui large fixed teal inverted menu">
	<div class="menu">
		<?php require_once("header-menu-login.php");?>
	</div>
</div>	

<article>
	

	<div id="right">
		<h2 class="ui header">
					<i class="settings icon"></i>
						<div class="content">
						課程資訊
							<div class="sub header">所有課程總覽</div>
						</div>
					</h2>
		
		<?php 
		/*取得選課資料*/
		$sql = "SELECT * FROM courses";
		$result = mysql_query($sql);
											
				if (!$result) { // add this check.
					die('Invalid query: ' . mysql_error());
					}
					while($row = mysql_fetch_array($result)){
					?>
						<div class="ui blue segment celled selection list">
							<div class="item">
								
									<div class="ui large image">
										<img src="images/<?php echo $row['c_img']; ?>">
									</div>
									<a href="course_detail.php?c_id=<?php echo $row['c_id']; ?>&m_id=<?php echo $account; ?>" class="right floated big teal ui button">課程詳細資訊</a>
									
									<div class="content">
										<h2 class="ui left aligned header">
											課程名稱：
										</h2>
										<h2 class="ui inverted blue block left aligned header ">
											<?php echo $row['c_name']; ?>
										</h2>
										
										<p class="description">
										開課時間：<?php echo $row['c_date']; ?>~<?php echo $row['c_due']; ?></p>
									</div>
							</div>
							
						</div>
					
					<?php } ?>
					
	
	</div>
	
	
	
</article>
<!--Footer網頁引入-->
<?php require_once("footer.php");?>


</body>
</html>
