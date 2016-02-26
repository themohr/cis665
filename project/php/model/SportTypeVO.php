<?php


/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 02/21/2016
 * Description: Team Class
 *  
 */

class SportType{
    
     //Attributes
    
    private $_sportTypeId;
    private $_sportTypeName;
   
    //Relation
     
    //Constructor
     
    function __construct($_sportTypeId, $_sportTypeName) {
        $this->_sportTypeId = $_sportTypeId;
        $this->_sportTypeName = $_sportTypeName;
    }

    public function SportType(){}
    
    //Methods
    
    public function get_sportTypeId() {
        return $this->_sportTypeId;
    }

    public function get_sportTypeName() {
        return $this->_sportTypeName;
    }

    public function set_sportTypeId($_sportTypeId) {
        $this->_sportTypeId = $_sportTypeId;
    }

    public function set_sportTypeName($_sportTypeName) {
        $this->_sportTypeName = $_sportTypeName;
    }


    
       
}

?>
