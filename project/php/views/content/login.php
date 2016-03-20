<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
	/* 
	 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
	 * Date: 03/03/2016
	 * Description: Profile page allows coach to view, update, delete and add a team
	 *  
	 */
	require_once('controller/FormLogin.php');
	require_once('dao/CoachDAO.php');
    require_once('model/CoachVO.php');
	$process = new FormLogin();
?>
<div class="col-md-6">
<?php
if(!isset($_SESSION['emailAddress'])) {
?>
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
			
			$user = $GLOBALS['form']['emailAddress']['response'];
			$password = $GLOBALS['form']['password']['response'];
			
			$coachDao = new CoachDAO();
			$coachVO = new CoachVO();
			$results = $coachDao->login($user, $password);
			
			if($results == SUCCESSFUL_LOGIN) {
				
				$coachVO = $coachDao->getCoachByCoachUserId($user);
				$_SESSION['sessionid'] = session_id();
				$_SESSION['emailAddress'] = $coachVO->get_emailAddress();
				$_SESSION['fname'] = $coachVO->get_fname();
				$_SESSION['lname'] = $coachVO->get_lname();
				$_SESSION['coachId'] = $coachVO->get_coachId();

				echo '<pre>';
				print_r($_SESSION);
				echo '</pre>';
				
				// Use header redirect
				echo '<a href="' . $_SERVER['PHP_SELF'] . '?page=profile">View profile</a>';
				
			} else {
				echo "Sorry, unable to authenticate.";
			}
			
		}
		
	}
	
?>
</div>
<div class="col-md-6">
	<h2>Register</h2>
	<p>If you have not yet registered for the Tournament Application,<br>you must <strong><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=register">Register Here!</a></strong></p>
</div>
<?php
} else {
		header('location: ' . $_SERVER['PHP_SELF'] . "?page=profile");
		exit();
}
?>

