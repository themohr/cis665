<?php


/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 02/21/2016
 * Description: Tournament Class
 *  
 */

class Tournament{
    
     //Attributes
    
    private $_tournamentId;
    private $_tournamentName;
    private $_tournamentDate;
    private $_tournamentBeginTime;
    private $_tournamentEndTime;
    private $_tournamentStreet;
    private $_tourcenameCity;
    private $_tournamentState;
    private $_tournamentZip;
    
     
     //Relation
    
    private $_sportTypeId;
       
    //Constructor
    
    function __construct($_tournamentId, $_tournamentName, $_tournamentDate, $_tournamentBeginTime, $_tournamentEndTime, $_tournamentStreet, $_tourcenameCity, $_tournamentState, $_tournamentZip, $_sportTypeId) {
        $this->_tournamentId = $_tournamentId;
        $this->_tournamentName = $_tournamentName;
        $this->_tournamentDate = $_tournamentDate;
        $this->_tournamentBeginTime = $_tournamentBeginTime;
        $this->_tournamentEndTime = $_tournamentEndTime;
        $this->_tournamentStreet = $_tournamentStreet;
        $this->_tourcenameCity = $_tourcenameCity;
        $this->_tournamentState = $_tournamentState;
        $this->_tournamentZip = $_tournamentZip;
        $this->_sportTypeId = $_sportTypeId;
    }

     public function Tournament(){}
        

    //Methods
    
    
    public function get_tournamentId() {
        return $this->_tournamentId;
    }

    public function get_tournamentName() {
        return $this->_tournamentName;
    }

    public function get_tournamentDate() {
        return $this->_tournamentDate;
    }

    public function get_tournamentBeginTime() {
        return $this->_tournamentBeginTime;
    }

    public function get_tournamentEndTime() {
        return $this->_tournamentEndTime;
    }

    public function get_tournamentStreet() {
        return $this->_tournamentStreet;
    }

    public function get_tourcenameCity() {
        return $this->_tourcenameCity;
    }

    public function get_tournamentState() {
        return $this->_tournamentState;
    }

    public function get_tournamentZip() {
        return $this->_tournamentZip;
    }

    public function get_sportTypeId() {
        return $this->_sportTypeId;
    }

    public function set_tournamentId($_tournamentId) {
        $this->_tournamentId = $_tournamentId;
    }

    public function set_tournamentName($_tournamentName) {
        $this->_tournamentName = $_tournamentName;
    }

    public function set_tournamentDate($_tournamentDate) {
        $this->_tournamentDate = $_tournamentDate;
    }

    public function set_tournamentBeginTime($_tournamentBeginTime) {
        $this->_tournamentBeginTime = $_tournamentBeginTime;
    }

    public function set_tournamentEndTime($_tournamentEndTime) {
        $this->_tournamentEndTime = $_tournamentEndTime;
    }

    public function set_tournamentStreet($_tournamentStreet) {
        $this->_tournamentStreet = $_tournamentStreet;
    }

    public function set_tourcenameCity($_tourcenameCity) {
        $this->_tourcenameCity = $_tourcenameCity;
    }

    public function set_tournamentState($_tournamentState) {
        $this->_tournamentState = $_tournamentState;
    }

    public function set_tournamentZip($_tournamentZip) {
        $this->_tournamentZip = $_tournamentZip;
    }

    public function set_sportTypeId($_sportTypeId) {
        $this->_sportTypeId = $_sportTypeId;
    }

  
  
   
    
}//end of class

?>

