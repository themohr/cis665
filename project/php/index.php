<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
/* 
	 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
	 * Date: 03/03/2016
	 * Description: Profile page allows coach to view, update, delete and add a team
	 *  
	 */
session_start();

if(!isset($_SESSION['emailAddress'])) {
		
	if(substr($_SERVER["QUERY_STRING"], 5) == "profile") {
		
		header('location: ' . $_SERVER['PHP_SELF'] . "?page=login");
		exit();
		
	}
	
}

?>
<!DOCTYPE html>
	
<html>
	<?php include("views/head.inc.php");?>

	<?php include("views/body.inc.php");?>
</html>