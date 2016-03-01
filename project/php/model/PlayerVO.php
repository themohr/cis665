<?php

/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 02/21/2016
 * Description: Player Class
 *  
 */

Class Player
{
    //Attributes
     private $_playerId;
     private $_lname;
     private $_fname;
     private $_dob;
     private $_height;
     private $_weight;
     private $_gender;
    

    //Relation
     
     private $_teamId;
     
     
    // Constructor
  

    public function Player(){  }
     

     //Methods
     
      public function get_playerId() {
         return $this->_playerId;
     }

     public function get_lname() {
         return $this->_lname;
     }

     public function get_fname() {
         return $this->_fname;
     }

     public function get_dob() {
         return $this->_dob;
     }

     public function get_height() {
         return $this->_height;
     }

     public function get_weight() {
         return $this->_weight;
     }

     public function get_gender() {
         return $this->_gender;
     }

     public function get_teamId() {
         return $this->_teamId;
     }

     public function set_playerId($_playerId) {
         $this->_playerId = $_playerId;
     }

     public function set_lname($_lname) {
         $this->_lname = $_lname;
     }

     public function set_fname($_fname) {
         $this->_fname = $_fname;
     }

     public function set_dob($_dob) {
         $this->_dob = $_dob;
     }

     public function set_height($_height) {
         $this->_height = $_height;
     }

     public function set_weight($_weight) {
         $this->_weight = $_weight;
     }

     public function set_gender($_gender) {
         $this->_gender = $_gender;
     }

     public function set_teamId($_teamId) {
         $this->_teamId = $_teamId;
     }
    
    
}


?>