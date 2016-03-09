<?php


/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 02/21/2016
 * Description: Team Class
 *  
 */

class TeamVO{
    
     //Attributes
    private $_teamId;   
    private $_teamName;
    private $_oldTeamName; //for UpdateTeam stored procedure
     //Relation
     private $_coachId;
     private $_coachEmailAddress; //Stored procedure expect this instead of a coachId
     private $_players;
     
    //Constructor 

    public function TeamVO(){  }
    
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

    public function get_players() {
        return $this->_players;
    }

    public function set_players($_players) {
        $this->_players = $_players;
    }

    public function get_coachEmailAddress() {
        return $this->_coachEmailAddress;
    }

    public function set_coachEmailAddress($_coachEmailAddress) {
        $this->_coachEmailAddress = $_coachEmailAddress;
    }

    public function get_oldTeamName() {
        return $this->_oldTeamName;
    }

    public function set_oldTeamName($_oldTeamName) {
        $this->_oldTeamName = $_oldTeamName;
    }


    
    
}

?>