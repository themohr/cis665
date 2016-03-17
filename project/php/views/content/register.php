<?php
	/* 
	 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
	 * Date: 03/03/2016
	 * Description: Profile page allows coach to view, update, delete and add a team
	 *  
	 */
	@require_once('controller/FormRegister.php');
	$process = new FormRegister();
?>
<div class="col-md-12">
	<h2>Coach Registration</h2>
	
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
			
			$arrayObj = new ArrayObject();
						
			$arrayObj->append($GLOBALS['form']['fname']['response']);
			$arrayObj->append($GLOBALS['form']['lname']['response']);
			$arrayObj->append($GLOBALS['form']['emailAddress']['response']);
			$arrayObj->append($GLOBALS['form']['password']['response']);
			
			$process->insertCoach($arrayObj);
			echo "You have been successfully registered!";
			
		}
		
	}
	
?>

</div>
