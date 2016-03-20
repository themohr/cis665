<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
if(isset($SESSION['sessionid'])) {
	print_r($SESSION);
} elseif(substr($_SERVER["QUERY_STRING"],5) == "logoff") {
	session_destroy();
	session_unset();
} else {
	
}

?>
<!DOCTYPE html>
	
<html>
	<?php include("views/head.inc.php");?>
	
	<?php include("views/body.inc.php");?>
</html>