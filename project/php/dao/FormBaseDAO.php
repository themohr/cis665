<?php
/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 03/02/2016
 * Description: FormProcess Class
 *  
 */
 
 class FormBaseDAO
 {
 	
	public function FormBaseDAO(){}
	
	function cleanForm($input) {
		
		$form = array();
		
		foreach($input as $name => $value) {
			if(is_array($value)) {
			
				$form[$name]['response'] = array();
			
				foreach($value as $key => $elementValue) {
					
					$form[$name]['response'][$key] = $this->cleanTextField($elementValue);
					
				}
			
			} else {
					
				$form[$name]['response'] = $this->cleanTextField($value);
			}
		}
		
		return $form;	
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