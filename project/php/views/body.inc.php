<body>
	<?php include_once('header.inc.php');?>
	<section class="container">
		<div class="row">
			
				<?php require_once("lib/ProcessView.class.php");
					
					$view = new ProcessView();
					//echo $view->displayView($_SERVER['QUERY_STRING']);
					include($view->displayView($_SERVER['QUERY_STRING']));
					
				?>
			
		</div>
	</section>
	<?php include_once('footer.inc.php');?>	
</body>