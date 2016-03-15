<?php
	/* 
	 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
	 * Date: 03/03/2016
	 * Description: Profile page allows coach to view, update, delete and add a team
	 *  
	 */
	@require_once('controller/FormLogin.php');
	$process = new FormLogin();
?>
<div class="col-md-6">
	<h2>Login</h2>
<?php
	if(!isset($_POST['process'])) {
		// Display the form
		$process->displayForm();
	
	} else {
		
		$form = $process->cleanForm($_POST['form']);
		$valid = $process->validateForm();
				
		if(empty($valid)) {
			
			$process->displayForm($valid);
			
		} else {
			
			$user = array('user' => $GLOBALS['form']['emailAddress']['response'],'role' => '');
			
			echo '<pre>';
			print_r($user);
			echo '</pre>';
			
			echo '<a href="' . $_SERVER['PHP_SELF'] . '?page=profile">View profile</a>';
			// header("Location: " . $_SERVER['PHP_SELF'] . "?page=profile");
			// exit();
			
		}
		
	}
	
?>
</div>
<div class="col-md-6">
	<h2>Register</h2>
	<p>If you have not yet registered for the Tournament Application,<br>you must <strong><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=register">Register Here!</a></strong></p>
</div>
