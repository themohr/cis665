<?php
	@require_once('dao/FormDAO.php');
	$process = new FormProcess();
?>
<div class="col-md-12">
	<h2>Coach Registration</h2>
	
	
	<div class="forms">
	<form class="form" action="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];?>" method="POST">
		<label for="fname">First Name:</label> <input type="text" name="fname" value="<?php echo $_POST['fname'];?>" required="required"><br>
		<label for="lname">Last Name:</label> <input type="text" name="lname" required="required"><br>
		<label for="teamName">Team Name:</label><input type="text" name="teamName" required="required"><br>
 		<label for="email">Email Address:</label><input type="email" name="emailAddress" required="required"><br>
		<label for="pword">Password:</label><input type="password" name="password" required="required"><br>
		<input type="submit">
	</form>
	</div>
	
	<?php
	
	if(!$_POST) {
		
		echo "Submit the form.";	
	
	}else {
			
		// Process Form
		echo "Thank you for registering.";
		$process->validateForm($_POST);

	}
	
	?>

</div>
