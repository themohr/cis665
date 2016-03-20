<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	/* 
	 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
	 * Date: 03/03/2016
	 * Description: Profile page allows coach to view, update, delete and add a team
	 *  
	 */
	require_once('dao/TeamDAO.php');
	require_once('dao/PlayerDAO.php');
	require_once('controller/FormRoster.php');
	require_once('controller/FormTeam.php');
	
	$username = "dennis.m.mohr@gmail.com";
	
	$processPlayer = new FormRoster();
	$teamDAO = new TeamDAO();
	$processTeam = new FormTeam();
	// If a team is created
	print_r($teamDAO->getTeamByCoachId(404));
	if($teamDAO->getTeamByCoachId(67)) {
	
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

					$processPlayer->insertPlayer($arrayObj);					
					
				}
				
			}
		?>
		<table>
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
			
			echo "<pre>";
			print_r($roster);
			echo "<pre>";
			
			for($i = 0; $i <= 5; $i++) {
				echo "<tr>";
				echo "<td>Player " . $i . "</td>";
				echo "<td>" . $i . "</td>";
				echo "<td>Edit / Delete</td>";
				echo "</tr>";
			}
			?>
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
				$arrayObj->append('67');
				$arrayObj->append('dennis.m.mohr@gmail.com');
				
				$processTeam->insertTeam($arrayObj);
				
				echo "Team Created: " . $GLOBALS['form']['teamName']['response'];
				
			}
			
		}
	}
	?>
