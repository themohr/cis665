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
	require_once('controller/FormRoster.php');
	require_once('controller/FormTeam.php');
	
	$username = "dennis.m.mohr@gmail.com";
	
	$processPlayer = new FormRoster();
	$playerDAO = new PlayerDAO();
	$processTeam = new FormTeam();

	// If a team is created
	if(empty($playerDAO->getPlayersByTeamId(67))) {
	
?>
	<div class="content">
		<?php
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
					$arrayObj->append(20);

					$processPlayer->insertPlayer($arrayObj);					
					
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
			</tr>
			<?php
			
			$roster = $processPlayer->getRoster(20);
			
			foreach($roster as $record) {
				echo "<tr>";
				echo "<td>" . $record->get_fname() . "</td>";
				echo "<td>" . $record->get_lname() . "</td>";
				echo "<td>" . $record->get_height() . "</td>";
				echo "<td>" . $record->get_weight() . "</td>";
				echo "<td>" . $record->get_gender() . "</td>";
				echo "<td>" . $record->get_dob() . "</td>";
				echo "<td>" . $record->get_email() . "</td>";
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
	// Team not created? Create team
	} else {
		// Display Create Team form
		if(!isset($_POST['processTeam'])) {
			
			$processTeam->displayForm();
			
		} else {
			
			$form = $processTeam->cleanForm($_POST['form']);
			$valid = $processTeam->validateForm();
			
			if(empty($valid)) {
				
				$processTeam->displayForm($valid);
				
			} else {
				
				$arrayObj = new ArrayObject();
				
				$arrayObj->append($GLOBALS['form']['teamName']['response']);
				$arrayObj->append('dennis.m.mohr@gmail.com');
				
				$processTeam->insertTeam($arrayObj);
				
				echo "Team Created: " . $GLOBALS['form']['teamName']['response'];
				
			}
			
		}
	}
	?>
