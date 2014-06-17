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
	<?php 
		/*取得選課資料*/
		$c_id=$_GET['c_id'];
		$id_index=($_GET['cm_id'])-1;
		$courses=$_SESSION['course_content'];				
		?>	
	
		
			
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
						<?php echo $courses[$id_index]['cm_name'];?>
							<div class="sub header">開始學習</div>
						</div>
					</h2>
		
			
	<div class="ui stacked segment">
		<div class="ui top blue huge attached label">教學影片</div>
				<!--影片放置區-->
				<iframe width="853" height="480" src="<?php echo $courses[$id_index]['cm_video'];?>" frameborder="0" allowfullscreen></iframe>
		</div>
		<div class="ui stacked segment">
		<div class="ui top blue huge attached label">檔案下載</div>
				<!--放置區-->
				<div class="ui list">
					<div class="item">
					<div class="content">
						
					<a href="files/HTML5/<?php echo $courses[$id_index]['word'];?>" class="green ui icon labeled button">
								<i class="attachment icon"></i>
								<div class="visible content">點我下載課程檔案-WORD</div>
							</a>
					<a href="files/HTML5/<?php echo $courses[$id_index]['cm_pdf'];?>"  class="red ui icon labeled button">
								<i class="attachment icon"></i>
								<div class="visible content">點我下載課程檔案-PDF</div>
							</a>
					
					
					
				</div>
				</div>
		</div>
	</div>
	<div class="ui stacked segment">
		<div class="ui top blue huge attached label">討論區</div>
				<!--放置區-->
				
				<div class="fb-comments" data-href="https://www.facebook.com/lo.chiehan" data-numposts="20" data-colorscheme="light"></div>
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</article>
<!--Footer網頁引入-->
<?php require_once("footer.php");?>


</body>
</html>