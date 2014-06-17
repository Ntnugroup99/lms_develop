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
		$('.confirmation').on('click', function () {
				return confirm('Are you sure?');
				alert("delete");
				
			});
			
			//dropdown須至底
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
	
	
		
			
	<div id="left">
	
		<div class="ui black launch right attached button" id="button">
		  <i class="icon list layout"></i>
		  <span class="text">選單</span>
    </div>
	
	</div>
	<div id="right2">
		<h2 class="ui header">
					<i class="settings icon"></i>
						<div class="content">
						課程內容
							<div class="sub header">開始學習</div>
						</div>
					</h2>
		
		<?php 
		/*取得選課資料*/
		$c_id=$_GET['c_id'];
		$sql = "SELECT * FROM selection,courses,course_materials,course_detail,teachers where account='$account' and selection.c_id='$c_id' and selection.c_id=courses.c_id and course_materials.c_id=courses.c_id and courses.c_id=course_detail.c_id and  teachers.t_id=courses.t_id";
		$result = mysql_query($sql);
		$courses=array();						
				if (!$result) { // add this check.
					die('Invalid query: ' . mysql_error());
					}
					while($row = mysql_fetch_array($result)){
						array_push($courses,$row);
					 }
						//陣列儲存session
						$_SESSION['course_content']=$courses;

					 ?>
					<div class="ui stacked segment">
					<div class="ui top  blue attached label">課程詳細資訊表</div>
								<div class="ui large left floated rounded image">
											<img src="images/<?php echo $courses[0]['c_img']; ?>">
								</div>
							
								<h3 class="ui left aligned header">
								課程名稱：<?php echo $courses[0]['c_name']; ?>
								</h3>
								<h3 class="ui left aligned header">
								開課時間：<?php echo $courses[0]['c_date']; ?>~<?php echo $courses[0]['c_due']; ?>
								</h3>
								<h3 class="ui left aligned header">
								課程描述：
								</h3>	
								<h4 class="ui left aligned header">
								<?php echo $courses[0]['c_des']; ?>
								</h4>
								<h3 class="ui left aligned header">
								課程大綱：
								</h3>	
								<h4 class="ui left aligned header">
								<?php echo $courses[0]['c_info']; ?>
								</h4>	
						</div>
	
	<div class="ui stacked segment">
								<div class="ui top blue huge attached label">教師簡介</div>
								<div class="ui list">
									<div class="item">
										<div class=" ui circular small image">
										<img src="images/<?php echo $courses[0]['t_img']; ?>">
										</div>
									<div class="content">
										<div class="ui huge purple pointing left label">
										<div class="ui left aligned header"><?php echo $courses[0]['t_name']; ?>　<?php echo $courses[0]['t_pos']; ?></div>
									<?php echo $courses[0]['t_school']; ?>　<?php echo $courses[0]['t_depart']; ?>　
									</div>
									</div>
								</div>
								</div>
	</div>
	</div>
<div class="ui large vertical inverted labeled icon sidebar menu" id="menu">
			  <a href="course.php?account=<?php echo $courses[0]['account']; ?>&c_id=<?php echo $courses[0]['c_id']; ?>" class="item">
				<i class="home icon"></i>
				Home
			  </a>
		
			  <div class="item">
				<b>課程章節</b>
				<div class="menu">
					<?php 
						//$i=count($courses);
						for($j=0;$j<count($courses);$j++){
					?>
						<a href="course_start.php?cm_id=<?php echo ($j+1); ?>&c_id=<?php echo $courses[$j]['c_id']; ?>" class="item">第<?php echo ($j+1); ?>章 <?php echo $courses[$j]['cm_name']; ?></a>
					<?php } ?>
				</div>
			  </div>
			</div>
</article>
<!--Footer網頁引入-->
<?php require_once("footer.php");?>


</body>
</html>