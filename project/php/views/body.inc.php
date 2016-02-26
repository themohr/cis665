<body>
	<?php include_once('header.inc.php');?>
	<section class="container">
		<div class="row">
			
				<?php require_once("lib/ProcessView.class.php");
					
					$view = new ProcessView();
					include('content/' . $view->displayView($_SERVER['QUERY_STRING']) . '.php');
					
				?>
			
		</div>
	</section>
	<?php include_once('footer.inc.php');?>	
</body>