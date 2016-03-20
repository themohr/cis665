<?php
/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 03/02/2016
 * Description: FormProcess Class
 *  
 */

 require_once('FormController.php');
 require_once('dao/CoachDAO.php');
 require_once('dao/TeamDAO.php');
 require_once('model/CoachVO.php');
 require_once('model/TeamVO.php');
 class FormProfile extends FormController
 {
 	
	function displayForm($valid=true) {
		if(!$valid) {
			echo "<p>Error's detected: please review messages below.";
		}
               
                $user = $_SESSION['emailAddress'];
                 $coachDao = new CoachDAO();
                 $teamDao = new TeamDAO();
                 $resultCoach = "";
                 $resultTeam = "";
                 
                if(!isset($_POST['process'])){
                  
                 //   $coach = $coachDao->getCoachByCoachUserId($user);
                 //   $team = $teamDao->getTeamByCoachId($coach->get_coachId());
                }else{
                     
                    $updateCoach = new CoachVO();
                    $updateTeam = new TeamVO();
                     
                    $updateCoach->set_emailAddress($_POST['form']['emailAddress']);
                    $updateCoach->set_oldEmailAddress($_POST['form']['oldEmailAddress']);
                    $updateCoach->set_fname($_POST['form']['fname']);
                    $updateCoach->set_lname($_POST['form']['lname']);
                    $updateCoach->set_password($_POST['form']['password']);                   
                   //
                    
                   $resultCoach = $coachDao->cudCoach($updateCoach, UPDATE);
                   
                   if($resultCoach == 1){
                      $user = $_POST['form']['emailAddress'];
                   }
                    
                    
                    $teamId = $_POST['form']['teamId'];
                    $teamName = $_POST['form']['teamName'];
                    $oldTeamName = $_POST['form']['oldTeamName'];
                    
                   $updateTeam->set_teamName($teamName);
                   $updateTeam->set_oldTeamName($oldTeamName);
                   $updateTeam->set_teamId($teamId);
                   $updateTeam->set_coachEmailAddress($_POST['form']['emailAddress']);
                   // echo '<br/>';
                   
                 //   
                  
                    if(isset($teamId) && $teamId != "")
                    {
                        if($teamName != ""){
                      //  echo 'Team UPDATE';
                            // print_r($updateTeam);
                        $resultTeam = $teamDao->cudTeam($updateTeam, UPDATE);
                        }
                    }else{
                        if($teamName != ""){
                       //  echo 'Team Create';
                           // print_r($updateTeam);
                        $resultTeam = $teamDao->cudTeam($updateTeam, CREATE);
                        }
                    }
                    
                  
                }
                if($resultCoach == 1 && $resultTeam ==1){
                     echo '' . "Record updated successfully" .'<br/>';
                }
                
                 $coach = $coachDao->getCoachByCoachUserId($user);
                 $team = $teamDao->getTeamByCoachId($coach->get_coachId());
                 
                  $_SESSION['emailAddress'] = $coach->get_emailAddress();
		  $_SESSION['fname'] = $coach->get_fname();
		  $_SESSION['lname'] = $coach->get_lname();
		  $_SESSION['coachId'] = $coach->get_coachId();
                 
		$fNameValue = $coach->get_fname();		
		$lNameValue = $coach->get_lname();	
                $teamNameValue = "";
                
                if(isset($team)){
                    $teamIdValue = $team->get_teamId();
                    $teamNameValue = $team->get_teamName();
                }
		
		$emailValue = $user;
                $passwordValue = $coach->get_password();
               
                
                
		/*
                 $fNameError = (isset($GLOBALS['form']['fname']['error']) && !empty($GLOBALS['form']['fname']['error']) ? ' <span class="error">Error: ' . htmlentities($GLOBALS['form']['fname']['error']) . "</span>" : "" );
		$fNameValue = (isset($GLOBALS['form']['fname']['response']) && !empty($GLOBALS['form']['fname']['response']) ? ' value="' . htmlentities($GLOBALS['form']['fname']['response']) .'""' : "");
		
		$lNameError = (isset($GLOBALS['form']['lname']['error']) && !empty($GLOBALS['form']['lname']['error']) ? ' <span class="error">Error: ' . htmlentities($GLOBALS['form']['lname']['error']) . "</span>" : "" );
		$lNameValue = (isset($GLOBALS['form']['lname']['response']) && !empty($GLOBALS['form']['lname']['response']) ? ' value="' . htmlentities($GLOBALS['form']['lname']['response']) .'""' : "");

		$teamNameError = (isset($GLOBALS['form']['teamName']['error']) && !empty($GLOBALS['form']['teamName']['error']) ? ' <span class="error">Error: ' . htmlentities($GLOBALS['form']['teamName']['error']) . "</span>" : "" );
		$teamNameValue = (isset($GLOBALS['form']['teamName']['response']) && !empty($GLOBALS['form']['teamName']['response']) ? ' value="' . htmlentities($GLOBALS['form']['teamName']['response']) .'""' : "");
		
		$emailError = (isset($GLOBALS['form']['emailAddress']['error']) && !empty($GLOBALS['form']['emailAddress']['error']) ? ' <span class="error">Error: ' . htmlentities($GLOBALS['form']['emailAddress']['error']) . "</span>" : "" );
		$emailValue = (isset($GLOBALS['form']['emailAddress']['response']) && !empty($GLOBALS['form']['emailAddress']['response']) ? ' value="' . htmlentities($GLOBALS['form']['emailAddress']['response']) .'""' : "");
		
		$passwordError = (isset($GLOBALS['form']['password']['error']) && !empty($GLOBALS['form']['password']['error']) ? ' <span class="error">Error: ' . htmlentities($GLOBALS['form']['password']['error']) . "</span>" : "" );
                 *
                 */
               

?>
	<!--	<div class="forms">
			<form class="form" action="<?//php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];?>" method="POST">
				<label for="fname">First Name:</label> <input type="text" name="form[fname]"<?//php echo $fNameValue; ?>><?//php echo $fNameError; ?><br>
				<label for="lname">Last Name:</label> <input type="text" name="form[lname]"<?//php echo $lNameValue; ?>><?//php echo $lNameError; ?><br>
				<label for="teamName">Team Name:</label><input type="text" name="form[teamName]"<?//php echo $teamNameValue; ?>><?//php echo $teamNameError; ?><br>
		 		<label for="emailAddress">Email Address:</label><input type="email" name="form[emailAddress]"<?//php echo $emailValue; ?>><?//php echo $emailError; ?><br>
				<label for="password">Password:</label><input type="password" name="form[password]"><?//php echo $passwordError; ?><br>
				<input type="submit" name="process" value="Update">
			</form>
		</div>
 -->
 
 
 
                <div class="forms">
			<form class="form" action="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];?>" method="POST">
                            <label for="fname">First Name:</label> <input type="text" name="form[fname]" value="<?php echo $fNameValue; ?>"><br>
				<label for="lname">Last Name:</label> <input type="text" name="form[lname]" value="<?php echo $lNameValue; ?>"><br>
				<label for="teamName">Team Name:</label><input type="text" name="form[teamName]" value="<?php echo $teamNameValue; ?>"><br>
                                <input type="hidden" name="form[oldTeamName]" value="<?php echo $teamNameValue; ?>">
                                <input type="hidden" name="form[teamId]" value="<?php echo $teamIdValue; ?>">
		 		<label for="emailAddress">Email Address:</label><input type="email" name="form[emailAddress]" value="<?php echo $emailValue; ?>"><br>
                                <input type="hidden" name="form[oldEmailAddress]" value="<?php echo $emailValue; ?>">
				<label for="password">Password:</label><input type="password" name="form[password]" value="<?php echo $passwordValue; ?>"><br>
				<input type="submit" name="process" value="Update">
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
		
	/*	if(!isset($GLOBALS['form']['teamName']['response']) ||
			empty($GLOBALS['form']['teamName']['response'])) {
				$GLOBALS['form']['teamName']['error'] = "Required fields must be completed.";
			}
	*/	
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
 