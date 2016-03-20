<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 03/02/2016
 * Description: FormProcess Class
 *  
 */
 
 class FormController
 {
 	
	public function FormController(){}
	
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
	
	function validateEmail($field) {
		
		$atPos = strpos($field, '@');
		
		if(!$atPos) {
			
			return false;
			
		} else {
			
			$field_parts = explode('@',$field);
			$dot_pos = strpos($field_parts[1],'.');
			
			if(!$dot_pos) {
				return false;
			}
			
		}

		return true;
		
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