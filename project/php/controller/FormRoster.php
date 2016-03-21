<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 03/02/2016
 * Description: FormProcess Class
 *  
 */
 
require_once('FormController.php');
require_once('dao/PlayerDAO.php');


class FormRoster extends FormController
{
	function displayForm($valid=true) {
		if(!$valid) {
			echo "<p>Error's detected: please review messages below.";
		}
		$fNameError = (isset($GLOBALS['form']['fname']['error']) && !empty($GLOBALS['form']['fname']['error']) ? ' <span class="error">Error: ' . htmlentities($GLOBALS['form']['fname']['error']) . "</span>" : "" );
		$fNameValue = (isset($GLOBALS['form']['fname']['response']) && !empty($GLOBALS['form']['fname']['response']) ? ' value="' . htmlentities($GLOBALS['form']['fname']['response']) .'""' : "");
		
		$lNameError = (isset($GLOBALS['form']['lname']['error']) && !empty($GLOBALS['form']['lname']['error']) ? ' <span class="error">Error: ' . htmlentities($GLOBALS['form']['lname']['error']) . "</span>" : "" );
		$lNameValue = (isset($GLOBALS['form']['lname']['response']) && !empty($GLOBALS['form']['lname']['response']) ? ' value="' . htmlentities($GLOBALS['form']['lname']['response']) .'""' : "");
		
		$heightError = (isset($GLOBALS['form']['height']['error']) && !empty($GLOBALS['form']['height']['error']) ? ' <span class="error">Error: ' . htmlentities($GLOBALS['form']['height']['error']) . "</span>" : "" );
		$heightValue = (isset($GLOBALS['form']['height']['response']) && !empty($GLOBALS['form']['height']['response']) ? ' value="' . htmlentities($GLOBALS['form']['height']['response']) .'""' : "");
		
		$weightError = (isset($GLOBALS['form']['weight']['error']) && !empty($GLOBALS['form']['weight']['error']) ? ' <span class="error">Error: ' . htmlentities($GLOBALS['form']['weight']['error']) . "</span>" : "" );
		$weightValue = (isset($GLOBALS['form']['weight']['response']) && !empty($GLOBALS['form']['weight']['response']) ? ' value="' . htmlentities($GLOBALS['form']['weight']['response']) .'""' : "");
		
		$genderError = (isset($GLOBALS['form']['gender']['error']) && !empty($GLOBALS['form']['gender']['error']) ? ' <span class="error">Error: ' . htmlentities($GLOBALS['form']['gender']['error']) . "</span>" : "" );
		$genderValue = (isset($GLOBALS['form']['gender']['response']) && !empty($GLOBALS['form']['gender']['response']) ? ' value="' . htmlentities($GLOBALS['form']['gender']['response']) .'""' : "");
		
		$dobError = (isset($GLOBALS['form']['dob']['error']) && !empty($GLOBALS['form']['dob']['error']) ? ' <span class="error">Error: ' . htmlentities($GLOBALS['form']['dob']['error']) . "</span>" : "" );
		$dobValue = (isset($GLOBALS['form']['dob']['response']) && !empty($GLOBALS['form']['dob']['response']) ? ' value="' . htmlentities($GLOBALS['form']['dob']['response']) .'""' : "");

		$emailError = (isset($GLOBALS['form']['emailAddress']['error']) && !empty($GLOBALS['form']['emailAddress']['error']) ? ' <span class="error">Error: ' . htmlentities($GLOBALS['form']['emailAddress']['error']) . "</span>" : "" );
		$emailValue = (isset($GLOBALS['form']['emailAddress']['response']) && !empty($GLOBALS['form']['emailAddress']['response']) ? ' value="' . htmlentities($GLOBALS['form']['emailAddress']['response']) .'""' : "");

?>
		<div class="forms">
			<form name="FormRoster" class="form" action="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];?>" method="POST">
                                 <input type="hidden" name="PlayerId"/>
                                 <input type="hidden" name="Action"/>
				<label for="fname">First Name:</label><input type="text" name="form[fname]"<?php echo $fNameValue; ?> /><?php echo $fNameError; ?><br>
				<label for="lname">Last Name:</label><input type="text" name="form[lname]"<?php echo $lNameValue; ?> /><?php echo $lNameError; ?><br>
				<label for="height">Height (inches):</label><input type="number" name="form[height]"<?php echo $heightValue; ?> /><?php echo $heightError; ?><br>
				<label for="wieght">Weight (lbs):</label><input type="number" name="form[weight]"<?php echo $weightValue; ?> /><?php echo $weightError; ?><br>
				<label for="gender">Gender:</label>&nbsp;&nbsp;&nbsp;Male: <input type="radio" name="form[gender]" value="male" checked="checked">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Female:<input type="radio" name="form[gender]" value="female"><br>
				<label for="dob">Date of Birth:</label><input type="text" placeholder="MM/DD/YYYY" pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d" name="form[dob]"<?php echo $dobValue; ?> /><?php echo $dobError; ?><br>
				<label for="emailAddress">Email Address:</label><input type="text" name="form[emailAddress]"<?php echo $emailValue; ?> /><?php echo $emailError; ?><br>
				<input type="submit" value="Add Member" name="processPlayer"/>
                              
			</form>
		</div>
<?php
	}
	
	function emptyForm() {
		
		$GLOBALS['form']['fname']['response'] = "";
		
		$GLOBALS['form']['lname']['response'] = "";
		
		$GLOBALS['form']['height']['response'] = "";
		
		$GLOBALS['form']['weight']['response'] = "";
		
		$GLOBALS['form']['gender']['response'] = "";
		
		$GLOBALS['form']['dob']['response'] = "";

		$GLOBALS['form']['emailAddress']['response'] = "";
		
	}

	function validateForm() {
		
		$valid = true;
		
		if(!isset($GLOBALS['form']['fname']['response']) ||
			empty($GLOBALS['form']['fname']['response'])) {
				$GLOBALS['form']['fname']['error'] = "Required fields must be completed.";
			}
			
		if(!isset($GLOBALS['form']['lname']['response']) ||
			empty($GLOBALS['form']['lname']['response'])) {
				$GLOBALS['form']['lname']['error'] = "Required fields must be completed.";
			}
	
		if(!isset($GLOBALS['form']['height']['response']) ||
			empty($GLOBALS['form']['height']['response'])) {
				$GLOBALS['form']['height']['error'] = "Required fields must be completed.";
			}
			
		if(!isset($GLOBALS['form']['weight']['response']) ||
			empty($GLOBALS['form']['weight']['response'])) {
				$GLOBALS['form']['weight']['error'] = "Required fields must be completed.";
			}
			
		if(!isset($GLOBALS['form']['gender']['response']) ||
			empty($GLOBALS['form']['gender']['response'])) {
				$GLOBALS['form']['gender']['error'] = "Required fields must be completed.";
			}
		
		if(!isset($GLOBALS['form']['dob']['response']) ||
			empty($GLOBALS['form']['dob']['response'])) {
				$GLOBALS['form']['dob']['error'] = "Required fields must be completed.";
			}
		
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
		
		return $valid;
		
	}

	function insertPlayer($arrayObj) {
		
		$playerDao = new PlayerDAO();
		$player = new PlayerVO();
		
		$player->set_fname($arrayObj[0]);
		$player->set_lname($arrayObj[1]);
		$player->set_height($arrayObj[2]);
		$player->set_weight($arrayObj[3]);
		$player->set_gender($arrayObj[4]);
		$player->set_dob($arrayObj[5]);
		$player->set_email($arrayObj[6]);
		$player->set_teamId($arrayObj[7]);
		
		$playerDao->cudPlayer($player,CREATE);
	}
	
	function deletePlayer($playerId) {
		$playerDao = new PlayerDAO();
		$playerVO = new PlayerVO();
		
		$playerVO->set_playerId($playerId);
		$results = $playerDao->cudPlayer($playerVO,DELETE);		
		return $results;
	}
	
	function updatePlayer() {
		
	}
	
	function getRoster($teamId) {
		
		$playerDao = new PlayerDAO();
		$roster = $playerDao->getPlayersByTeamId($teamId);
		
		return $roster;
		
	}
}
?>
