<div class="col-md-12">
	<h2>Team Registration</h2>
	<?php if(!$_POST) { ?>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
		<input type="submit">
	</form>
	<?php 
	}else {
			
		// Process Registration
		echo "You have succesfully registered";

	}
	?>
</div>
