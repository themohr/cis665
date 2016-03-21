<script>
				function subForm(action,id)
				  {
				  document.FormRoster['PlayerId'].value=id;
				  document.FormRoster['Action'].value=action;
				  document.FormRoster.submit();
				 	 
				  }
</script>
<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	/* 
	 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
	 * Date: 03/03/2016
	 * Description: Profile page allows coach to view, update, delete and add a team
	 *  
	 */
	require_once('dao/PlayerDAO.php');
	require_once('dao/TeamDAO.php');
	require_once('controller/FormRoster.php');
	require_once('controller/FormTeam.php');
	
	$processPlayer = new FormRoster();
	$playerDAO = new PlayerDAO();
	$teamDAO = new TeamDAO();
	$processTeam = new FormTeam();
	$teamId = "";
	if(isset($_SESSION['coachId'])) {
		
		$teamVO = $teamDAO->getTeamByCoachId($_SESSION['coachId']);
		$teamId = $teamVO->get_teamId();		
	}

	// If a team is created
	if(isset($teamId) && $teamId !== "") {
	
?>
	<div class="content">
		<?php
			if(isset($_POST['Action']) && $_POST['Action'] == "Delete") {
				$result = $processPlayer->deletePlayer($_POST['PlayerId']);
                                if($result == 1){
                                    echo 'Record deleted successfully';
                                }
                                else{
                                    echo $result;
                                }
			}
                        if(isset($_POST['Action']) && $_POST['Action'] == "Edit"){
                                            //edit form
                                            $processPlayer->editForm();
                                         
                        }
		
			if(!isset($_POST['processPlayer']) && !isset($_POST['updatePlayer'])) {
				
				$processPlayer->displayForm();
				
			} else {
				
				$form = $processPlayer->cleanForm($_POST['form']);
				$valid = $processPlayer->validateForm();
				
				if(empty($valid)) {
					
					$processPlayer->displayForm($valid);
					
				} else {
					
					
					
                                            $arrayObj = new ArrayObject();
                                           
                                            $arrayObj->append($GLOBALS['form']['fname']['response']);
                                            $arrayObj->append($GLOBALS['form']['lname']['response']);
                                            $arrayObj->append($GLOBALS['form']['height']['response']);
                                            $arrayObj->append($GLOBALS['form']['weight']['response']);
                                            $arrayObj->append($GLOBALS['form']['gender']['response']);
                                            $arrayObj->append($GLOBALS['form']['dob']['response']);
                                            $arrayObj->append($GLOBALS['form']['emailAddress']['response']);
                                            $arrayObj->append($teamId);
                                            $arrayObj->append($_POST['PlayerId']);
                                            $arrayObj->append($_POST['TeamName']);

                                            if(isset($_POST['processPlayer'])){
                                                $processPlayer->insertPlayer($arrayObj);					
                                               
                                            }
                                            
                                             if(isset($_POST['updatePlayer'])){
                                                
                                                $result =  $processPlayer->updatePlayer($arrayObj);
                                                 if($result == 1){
                                                        echo 'Record updated successfully';
                                                    }
                                                    else{
                                                        echo $result;
                                                    }
                                             }
                                            $processPlayer->emptyForm();
                                            $processPlayer->displayForm();
                                       
					
				}
				
			}
		?>
		<table>
			<tbody>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Height</th>
				<th>Weight</th>
				<th>Gender</th>
				<th>Date of Birth</th>
				<th>Email Address</th>
				<th>Edit / Delete</th>
			</tr>
			<?php
			
			$roster = $processPlayer->getRoster($teamId);
			
			foreach($roster as $record) {
				echo "<tr>";
				echo "<td>" . $record->get_fname() . "</td>";
				echo "<td>" . $record->get_lname() . "</td>";
				echo "<td>" . $record->get_height() . "</td>";
				echo "<td>" . $record->get_weight() . "</td>";
				echo "<td>" . $record->get_gender() . "</td>";
				echo "<td>" . $record->get_dob() . "</td>";
				echo "<td>" . $record->get_email() . "</td>";
				echo "<td><a onclick=\"subForm('Edit','" . $record->get_playerId() . "')\" href=\"#\">Edit</a>"
                                        . " / <a onclick=\"subForm('Delete','" . $record->get_playerId() . "')\" href=\"#\">Delete</a>"
                                        . "</td>";
				echo "</tr>";
				
			}
			
			?>
			
			</tbody>
		</table>
		<a href="delete">Delete Team</a>Delete
		<form name="tournamentRegister" action="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];?>" method="post">
			
			<select>
				<option value="tourn1">Tournament 1</option>
			</select>
			<input type="submit" value="Register" name="processReg"/>			
		</form>

	</div>
	
	<?php
	} 
	?>
