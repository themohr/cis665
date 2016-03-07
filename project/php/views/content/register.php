<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	@require_once('dao/FormDAO.php');
	$process = new FormDAO();
?>
<div class="col-md-12">
	<h2>Coach Registration</h2>
	
<?php
	if(!isset($_POST['process'])) {
		// Display the form
		
		$process->displayForm();
	
	} else {
		/*
		echo '<pre>';
		print_r($GLOBALS);
		echo '<pre>';
		*/
		
		$form = $process->cleanForm($_POST['form']);
		$valid = $process->validateForm();
				
		if(empty($valid)) {
			
			$process->displayForm($valid);
			
		} else {
			
			echo "You have been successfully registered!";
			
		}
		
	}
	
	?>

</div>
