<?php
ini_set("display_errors",1);
error_reporting(E_ALL);

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
<?php
if(isset($_SESSION['emailAddress'])){
	echo "<pre>";
print_r($_SESSION['emailAddress']);
echo "</pre>";
}
?>
	<?php include("views/body.inc.php");?>
</html>