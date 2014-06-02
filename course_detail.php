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
<?php 

$c_id = $_GET["c_id"];

?>
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
							<div class="sub header">課程詳細資訊</div>
						</div>
					</h2>
		
		<?php 
		/*取得選課資料*/
		$sql = "SELECT * FROM courses,course_detail where courses.c_id=course_detail.c_id and courses.c_id='$c_id' ";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);									
				if (!$result) { // add this check.
					die('Invalid query: ' . mysql_error());
					}
					
					?>
						
							<div class="ui right floated stacked segment">
							<div class="ui top blue attached label">課程詳細資訊表</div>
								<div class="ui large left floated rounded image">
											<img src="images/<?php echo $row['c_img']; ?>">
								</div>
							
								<h3 class="ui left aligned header">
								課程名稱：<?php echo $row['c_name']; ?>
								</h3>
								<h3 class="ui left aligned header">
								開課時間：<?php echo $row['c_date']; ?>~<?php echo $row['c_due']; ?>
								</h3>
								<h3 class="ui left aligned header">
								課程描述：
								</h3>	
								<h4 class="ui left aligned header">
								<?php echo $row['c_des']; ?>
								</h4>
								<h3 class="ui left aligned header">
								課程大綱：
								</h3>	
								<h4 class="ui left aligned header">
								<?php echo $row['c_info']; ?>
								</h4>								
							
							</div>
							
							<div class="ui left floated stacked segment">
								<div class="ui top blue huge attached label">教師簡介</div>
								<div class="ui list">
									<div class="item">
										<div class=" ui circular small image">
										<img src="images/member.jpg">
										</div>
									<div class="content">
										<div class="ui left aligned header">羅傑安 叫獸</div>
									國立臺灣師範大學 資訊教育究所
									</div>
								</div>
								</div>
								
							
								
									
							
							</div>
							<div class="ui right floated stacked segment">
								<div class="ui top blue huge attached label">更多資訊</div>
								<div class="ui list">
									<div class="item">
									<div class="content">
										
									<div class="ui left aligned header">
										<i class="calendar icon"></i>
										課程週數：<?php echo $row['c_week']; ?>週</div>
									
									<div class="ui left aligned header">
										<i class="flag basic icon"></i>
										每週時數：<?php echo $row['c_hour']; ?>時</div>
									<div class="ui left aligned header">
										<i class="globe icon"></i>
										語言：<?php echo $row['c_lang']; ?></div>
									</div>
									
								</div>
								<a href="courses.php" class="red ui left floated icon labeled button">
										<i class="pencil icon"></i>
									<div class="visible content">加選課程</div></a>
								</div>
								
							
								
									
							
							</div>
							
							
							
							<a href="courses.php" class="huge green ui icon labeled button">
								<i class="left icon"></i>
								<div class="visible content">回上一頁</div>
							</a>
						
					
					
	
	</div>
	
	
	
</article>
<!--Footer網頁引入-->
<?php require_once("footer.php");?>


</body>
</html>