<body>
	<?php include_once('header.inc.php');?>
	<section class="container">
		<div class="row">
			
				<?php
					@require_once("dao/PageDAO.php");
					echo buildPage($_SERVER['QUERY_STRING'],"Title");
					@include(buildPage($_SERVER['QUERY_STRING'],"Title"));
				?>
			
		</div>
	</section>
	<?php include_once('footer.inc.php');?>	
</body>