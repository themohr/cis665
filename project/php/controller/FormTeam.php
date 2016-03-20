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
require_once('dao/TeamDAO.php');


class FormTeam extends FormController
{
	function displayForm($valid=true) {
		
		if(!$valid) {
			echo "<p>Error's detected: please review messages below.";
		}
		
		$teamNameError = (isset($GLOBALS['form']['teamName']['error']) && !empty($GLOBALS['form']['teamName']['error']) ? ' <span class="error">Error: ' . htmlentities($GLOBALS['form']['teamName']['error']) . "</span>" : "" );
		$teamNameValue = (isset($GLOBALS['form']['teamName']['response']) && !empty($GLOBALS['form']['teamName']['response']) ? ' value="' . htmlentities($GLOBALS['form']['teamName']['response']) .'""' : "");
		
		?>
		<form name="createTeam" action="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];?>" method="post">
			<label for="teamName">Team Name:</label> <input type="text" name="form[teamName]"<?php echo $teamNameValue;?> /><?php echo $teamNameError?>
			<input type="submit" value="Create Team" name="processTeam">
		</form>
		<?php
	}
	
	function validateForm(){
		$valid = true;
		
		if(!isset($GLOBALS['form']['teamName']['response']) ||
			empty($GLOBALS['form']['teamName']['response'])) {
				$GLOBALS['form']['teamName']['error'] = "Please provide a team name.";
				$valid = false;
		} 
		
		return $valid;
		
	}
	
	function insertTeam($arrayObj) {
		
		$teamDAO = new TeamDAO();
		$teamVO = new TeamVO();
		
		$teamVO->set_teamName($arrayObj[0]);
		$teamVO->set_coachId($arrayObj[1]);
		$teamVO->set_coachEmailAddress($arrayObj[2]);
		
		$teamDAO->cudTeam($teamVO,CREATE);
		
	}
}
