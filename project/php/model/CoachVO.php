<?php

/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 02/21/2016
 * Description: Coach Class
 *  
 */


class Coach
{
    //Attributes
   

    private $_coachId;
    private $_lname;
    private $_fname;
    private $_emailAddress;
    private $_password;
    private $_teamName;
    
    //Relation
    
    //Constructor
    
     function __construct($_coachId, $_lname, $_fname, $_emailAddress, $_password, $_teamName) {
        $this->_coachId = $_coachId;
        $this->_lname = $_lname;
        $this->_fname = $_fname;
        $this->_emailAddress = $_emailAddress;
        $this->_password = $_password;
        $this->_teamName = $_teamName;
    }
    
    public function Coach(){
         
    }
    
    //Methods
    
    public function get_coachId() {
        return $this->_coachId;
    }

    public function get_lname() {
        return $this->_lname;
    }

    public function get_fname() {
        return $this->_fname;
    }

    public function get_emailAddress() {
        return $this->_emailAddress;
    }

    public function get_password() {
        return $this->_password;
    }

    public function get_teamName() {
        return $this->_teamName;
    }

    public function set_coachId($_coachId) {
        $this->_coachId = $_coachId;
    }

    public function set_lname($_lname) {
        $this->_lname = $_lname;
    }

    public function set_fname($_fname) {
        $this->_fname = $_fname;
    }

    public function set_emailAddress($_emailAddress) {
        $this->_emailAddress = $_emailAddress;
    }

    public function set_password($_password) {
        $this->_password = $_password;
    }

    public function set_teamName($_teamName) {
        $this->_teamName = $_teamName;
    }


    
}


?>