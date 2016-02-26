<?php
class ProcessView {
	
	public $uri = "";
	
	function displayView($serverInfo) {
		
		$path = "";
		
		if($serverInfo == "") {
			$path = "home";
		} else {
			$path = substr($serverInfo, 5);
		}
		
		return $path;
	}
	
}
?>