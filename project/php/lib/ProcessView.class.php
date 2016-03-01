<?php
class ProcessView {
	
	private $path = "views/content/";
	
	function displayView($serverInfo) {
		
		$path = "";
		
		if($serverInfo !== "" && file_exists($this->path . substr($serverInfo, 5) . ".php")) {
			$path = $this->path . substr($serverInfo, 5) . ".php";
		} else {
			$path = $this->path . "home.php";
		}
		
		return $path;
	}
	
}
?>