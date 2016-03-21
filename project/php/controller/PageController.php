<?php

/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 02/21/2016
 * Description: Coach Data Access Object
 *  
 */

require_once ("dao/dbConnection.php");
require_once ("model/PageVO.php");

function buildPage($serverInfo,$title) {
	
	$page = new Page($serverInfo,$title);
	
	$file = "";
	$page->setPath($serverInfo);
	
	if($page->getPath() !== "" && file_exists("views/content/" . substr($page->getPath(),5) . ".php")) {
		$file = "views/content/" . substr($page->getPath(),5) . ".php";
	} elseif(substr($page->getPath(),5) == "logoff") {
		session_destroy();
		$file = "views/content/home.php";
		header('refresh:0;url=' . $_SERVER['PHP_SELF']);
		exit();
	} else {
		$file = "views/content/home.php";
	}
	
	return $file;

	
}
?>
