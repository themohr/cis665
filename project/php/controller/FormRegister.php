<?php
/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 03/02/2016
 * Description: FormProcess Class
 *  
 */
 
 require_once('FormController.php');
 
 class FormRegister extends FormController
 {
 	
	function displayForm($valid=true) {
		if(!$valid) {
			echo "<p>Error's detected: please review messages below.";
		}
		$fNameError = (isset($GLOBALS['form']['fname']['error']) && !empty($GLOBALS['form']['fname']['error']) ? ' <span class="error">Error: ' . htmlentities($GLOBALS['form']['fname']['error']) . "</span>" : "" );
		$fNameValue = (isset($GLOBALS['form']['fname']['response']) && !empty($GLOBALS['form']['fname']['response']) ? ' value="' . htmlentities($GLOBALS['form']['fname']['response']) .'""' : "");
		
		$lNameError = (isset($GLOBALS['form']['lname']['error']) && !empty($GLOBALS['form']['lname']['error']) ? ' <span class="error">Error: ' . htmlentities($GLOBALS['form']['lname']['error']) . "</span>" : "" );
		$lNameValue = (isset($GLOBALS['form']['lname']['response']) && !empty($GLOBALS['form']['lname']['response']) ? ' value="' . htmlentities($GLOBALS['form']['lname']['response']) .'""' : "");

		$teamNameError = (isset($GLOBALS['form']['teamName']['error']) && !empty($GLOBALS['form']['teamName']['error']) ? ' <span class="error">Error: ' . htmlentities($GLOBALS['form']['teamName']['error']) . "</span>" : "" );
		$teamNameValue = (isset($GLOBALS['form']['teamName']['response']) && !empty($GLOBALS['form']['teamName']['response']) ? ' value="' . htmlentities($GLOBALS['form']['teamName']['response']) .'""' : "");
		
		$emailError = (isset($GLOBALS['form']['emailAddress']['error']) && !empty($GLOBALS['form']['emailAddress']['error']) ? ' <span class="error">Error: ' . htmlentities($GLOBALS['form']['emailAddress']['error']) . "</span>" : "" );
		$emailValue = (isset($GLOBALS['form']['emailAddress']['response']) && !empty($GLOBALS['form']['emailAddress']['response']) ? ' value="' . htmlentities($GLOBALS['form']['emailAddress']['response']) .'""' : "");
		
		$passwordError = (isset($GLOBALS['form']['password']['error']) && !empty($GLOBALS['form']['password']['error']) ? ' <span class="error">Error: ' . htmlentities($GLOBALS['form']['password']['error']) . "</span>" : "" );

?>
		<div class="forms">
			<form class="form" action="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];?>" method="POST">
				<label for="fname">First Name:</label> <input type="text" name="form[fname]"<?php echo $fNameValue; ?>><?php echo $fNameError; ?><br>
				<label for="lname">Last Name:</label> <input type="text" name="form[lname]"<?php echo $lNameValue; ?>><?php echo $lNameError; ?><br>
				<label for="teamName">Team Name:</label><input type="text" name="form[teamName]"<?php echo $teamNameValue; ?>><?php echo $teamNameError; ?><br>
		 		<label for="emailAddress">Email Address:</label><input type="email" name="form[emailAddress]"<?php echo $emailValue; ?>><?php echo $emailError; ?><br>
				<label for="password">Password:</label><input type="password" name="form[password]"><?php echo $emailError; ?><br>
				<input type="submit" name="process" value="Submit">
			</form>
		</div>
		
<?php
		
	}

	function validateForm(){
		$valid = true;
		
		if(!isset($GLOBALS['form']['fname']['response']) ||
			empty($GLOBALS['form']['fname']['response'])) {
				$GLOBALS['form']['fname']['error'] = "Required fields must be completed.";
			}
			
		if(!isset($GLOBALS['form']['lname']['response']) ||
			empty($GLOBALS['form']['lname']['response'])) {
				$GLOBALS['form']['lname']['error'] = "Required fields must be completed.";
			}
		
		if(!isset($GLOBALS['form']['teamName']['response']) ||
			empty($GLOBALS['form']['teamName']['response'])) {
				$GLOBALS['form']['teamName']['error'] = "Required fields must be completed.";
			}
		
		if(!isset($GLOBALS['form']['emailAddress']['response']) ||
			empty($GLOBALS['form']['emailAddress']['repsonse'])) {
				$GLOBALS['form']['emailAddress']['error'] = "Required fields must be completed.";
				$valid = false;
		} else {
			
			if(!$this->validateEmail($GLOBALS['form']['emailAddress']['response'])) {
				$GLOBALS['form']['emailAddress']['error'] = "Please provide a valid email address";
				$valid = false;
			}
		}	
			
		if(!isset($GLOBALS['form']['password']['response']) ||
			empty($GLOBALS['form']['password']['repsonse'])) {
				$GLOBALS['form']['password']['error'] = "Required fields must be completed.";
				$valid = false;
		}
		
		return $valid;
		
	}
	
	
	
 }
 
 ?>
 