<?php


/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 02/21/2016
 * Description: Registration Class
 *  
 */

class RegistrationVO
{
    //Attributes
    private $_registrationId;
    private $_activityDate;
      
     //Relation
    private $_teamId;
    private $_tournamentId;
     
    private $_teamName; //for regisration stored procedure
    private $_tournamentName; //for regisration stored procedure
    private $_newTournamentName; //for regisration stored procedure
    //Constructor
    
   
    public function RegistrationVO (){}

    
    //Methods
    
    public function get_registrationId() {
        return $this->_registrationId;
    }

    public function get_activityDate() {
        return $this->_activityDate;
    }

    public function get_teamId() {
        return $this->_teamId;
    }

    public function get_tournamentId() {
        return $this->_tournamentId;
    }

    public function set_registrationId($_registrationId) {
        $this->_registrationId = $_registrationId;
    }

    public function set_activityDate($_activityDate) {
        $this->_activityDate = $_activityDate;
    }

    public function set_teamId($_teamId) {
        $this->_teamId = $_teamId;
    }

    public function set_tournamentId($_tournamentId) {
        $this->_tournamentId = $_tournamentId;
    }


    public function get_teamName() {
        return $this->_teamName;
    }

    public function get_tournamentName() {
        return $this->_tournamentName;
    }

    public function set_teamName($_teamName) {
        $this->_teamName = $_teamName;
    }

    public function set_tournamentName($_tournamentName) {
        $this->_tournamentName = $_tournamentName;
    }


    public function get_newTournamentName() {
        return $this->_newTournamentName;
    }

    public function set_newTournamentName($_newTournamentName) {
        $this->_newTournamentName = $_newTournamentName;
    }


    
}

?>
