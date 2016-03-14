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
	} else {
		$file = "views/content/home.php";
	}
	
	return $file;

	
}
?>
