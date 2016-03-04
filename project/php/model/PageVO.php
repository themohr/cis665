<?php
/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 03/01/2016
 * Description: Page Class
 *  
 */
 class Page {
 		
 	private $_path;
	private $_title;
	
	function __construct($_path, $_title) {

		$this->_path = $_path;
		$this->_title = $_title;

	}
	
	public function Page() {
		
	}
	
	public function getPath() {
		return $this->_page;
	}
	public function getTitle() {
		return $this->_title;
	}
	
	public function setPath($_page) {
		$this->_page = $_page;
	}
	public function setTitle() {
		$this->_title = $_title;
	}
 }
	
?>