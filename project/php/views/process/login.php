<?php
/**
 * Login view displays a form with username and password to allow 'coaches' to login
 *
 * login.php
 */
?>

<form id="login" name="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<label for="uname">Username:</label> <input type="text" name="uname" value="" />
	<label for="pword">Password:</label> <input type="text" name="pword" value="" />
</form>
