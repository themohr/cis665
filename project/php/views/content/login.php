<div class="col-md-12">
	<h2>Login</h2>
	<?php if(!$_POST) { ?>
	<div class="forms">
		<form class="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			<label for="uname">Username</label> <input type="text" name="uname" id="uname"/><br>
			<label for="pword">Password</label> <input type="password" name="pword" id="pword"/><br>
			<input type="submit" value="Log in">
		</form>
	</div>
	<?php 
	}else {
			
		// Process Registration
		echo "Logged in";

	}
	?>
</div>
