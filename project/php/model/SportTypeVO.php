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
     private $_tournaments;
    //Constructor
 
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

    public function get_tournaments() {
        return $this->_tournaments;
    }

    public function set_tournaments($_tournaments) {
        $this->_tournaments = $_tournaments;
    }


    
       
}

?>
