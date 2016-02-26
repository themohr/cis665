<?php


/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 02/21/2016
 * Description: Registration Class
 *  
 */

class Registration
{
    //Attributes
    private $_registrationId;
    private $_activityDate;
      
     //Relation
    private $_teamId;
    private $_tournamentId;
     
    //Constructor
    
    function __construct($_registrationId, $_activityDate, $_teamId, $_tournamentId) {
        $this->_registrationId = $_registrationId;
        $this->_activityDate = $_activityDate;
        $this->_teamId = $_teamId;
        $this->_tournamentId = $_tournamentId;
    }
    
    public function Registration (){}

    
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


    
    
    
}

?>
