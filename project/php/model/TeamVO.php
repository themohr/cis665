<?php


/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 02/21/2016
 * Description: Team Class
 *  
 */

class Team{
    
     //Attributes
    private $_teamId;   
    private $_teamName;
    
     //Relation
     private $_coachId;
     
    //Constructor
     
    function __construct($_teamId, $_teamName, $_coachId) {
        $this->_teamId = $_teamId;
        $this->_teamName = $_teamName;
        $this->_coachId = $_coachId;
    }

    public function Team(){
         
    }
    
    //Methods
    
    public function get_teamId() {
        return $this->_teamId;
    }

    public function get_teamName() {
        return $this->_teamName;
    }

    public function get_coachId() {
        return $this->_coachId;
    }

    public function set_teamId($_teamId) {
        $this->_teamId = $_teamId;
    }

    public function set_teamName($_teamName) {
        $this->_teamName = $_teamName;
    }

    public function set_coachId($_coachId) {
        $this->_coachId = $_coachId;
    }


    
}

?>