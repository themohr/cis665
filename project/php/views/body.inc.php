<body>
	<?php include_once('header.inc.php');?>
	<section class="container">
		<div class="row">
			
				<?php
					@require_once("controller/PageController.php");
					@include(buildPage($_SERVER['QUERY_STRING'],"Title"));
				?>
			
		</div>
	</section>
	<?php include_once('footer.inc.php');?>	
</body>