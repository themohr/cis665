<div class="col-md-12">
	<h2>Team Registration</h2>
	<?php if(!$_POST) { ?>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
		<input type="submit">
	</form>
	<?php 
	}else {
		//Present user message
		
		@require_once("formprocess.class");
		$process = $form->processmethod($_POST);
		echo "You have succesfully registered";
	}
	?>
</div>
