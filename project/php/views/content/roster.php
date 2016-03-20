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
			$qString = $_SERVER['QUERY_STRING'];
			echo $qString;
			if(stripos($qString,"delete")) {
				$startNum = stripos($qString,"id");
				$recordId = substr($qString,$startNum);
				echo $recordId;
			} //stripos($page->getPath(),"delete")
		
			if(!isset($_POST['processPlayer'])) {
				
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
					
					$processPlayer->insertPlayer($arrayObj);					
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
				<th>Edit/Delete</th>
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
				echo '<td><a onclick="javascript();" href="#">Edit</a> | <a href="' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'] . '&action=delete&id=' . $record->get_playerId() . '">Delete</a></td>';
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
