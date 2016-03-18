<?php
/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 03/02/2016
 * Description: FormProcess Class
 *  
 */
 
 require_once('FormController.php');
 
 class FormLogin extends FormController
 {
 	
	function displayForm($valid=true) {
		if(!$valid) {
			echo "<p>Error's detected: please review messages below.";
		}
		
		$emailError = (isset($GLOBALS['form']['emailAddress']['error']) && !empty($GLOBALS['form']['emailAddress']['error']) ? ' <span class="error">Error: ' . htmlentities($GLOBALS['form']['emailAddress']['error']) . "</span>" : "" );
		$emailValue = (isset($GLOBALS['form']['emailAddress']['response']) && !empty($GLOBALS['form']['emailAddress']['response']) ? ' value="' . htmlentities($GLOBALS['form']['emailAddress']['response']) .'""' : "");
		
		$passwordError = (isset($GLOBALS['form']['password']['error']) && !empty($GLOBALS['form']['password']['error']) ? ' <span class="error">Error: ' . htmlentities($GLOBALS['form']['password']['error']) . "</span>" : "" );

?>
		<div class="forms">
			<form class="form" action="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];?>" method="POST">
		 		<label for="emailAddress">Email Address:</label><input type="email" name="form[emailAddress]"<?php echo $emailValue; ?>><?php echo $emailError; ?><br>
				<label for="password">Password:</label><input type="password" name="form[password]"><?php echo $passwordError; ?><br>
				<input type="submit" name="process" value="Login">
			</form>
		</div>
		
<?php
		
	}

	function validateForm(){
		$valid = true;
		
		if(!isset($GLOBALS['form']['emailAddress']['response']) ||
			empty($GLOBALS['form']['emailAddress']['response'])) {
				$GLOBALS['form']['emailAddress']['error'] = "Required fields must be completed.";
				$valid = false;
		} else {
			
			if(!$this->validateEmail($GLOBALS['form']['emailAddress']['response'])) {
				$GLOBALS['form']['emailAddress']['error'] = "Please provide a valid email address";
				$valid = false;
			}
		}	
			
		if(!isset($GLOBALS['form']['password']['response']) ||
			empty($GLOBALS['form']['password']['response'])) {
				$GLOBALS['form']['password']['error'] = "Required fields must be completed.";
				$valid = false;
		}
		
		return $valid;
		
	}

 }
 
 ?>
 