<div class="ui large vertical inverted labeled icon sidebar menu" id="menu">
			  <a class="item">
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
						<a class="item">第<?php echo ($j+1); ?>章 <?php echo $courses[$j]['cm_name']; ?></a>
					<? } ?>
				</div>
			  </div>
			</div>