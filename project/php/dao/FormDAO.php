<?php
/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 03/02/2016
 * Description: FormProcess Class
 *  
 */
 
 class FormProcess
 {
 	
	function displayForm($valid) {
	
		
		
	}
	
 	function validateForm($form) {
 		
		$valid = "";
		
		foreach($form as $field => $value) {
				
			if($value !== "") {
				
				if($field == "emailAddress") {
					echo "Verify that the email address is valid and doesn't already exist!";
				}
				
				
				
			}
		}
		
		/*
		echo "<pre>";
		print_r($form);
		echo "</pre>";
		*/
		return $valid;
 	}
 	
	function cleanTextField($fieldValue) {
			
		if( ini_get( 'magic_quotes_gpc' )){ // Strip the slashes...
		
			$fieldValue = trim( strip_tags( stripslashes( $fieldValue )));
				
		} else { // Don't strip slashes.
			
			$fieldValue = trim( strip_tags( $fieldValue ));
				
		}
			
		return $fieldValue;
	}
	
 }
 
 ?>
 