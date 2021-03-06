<?php

/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 3/1/2016
 * Description: Team Data Access Object
 *  
 */

require_once ("BaseDAO.php");
require_once ("model/PlayerVO.php");

class PlayerDAO extends BaseDAO{
    
   public function PlayerDAO(){ }
   
   public function getPlayersByTeamId($teamId){
       
        // the SQL query to be executed on the database
            $query = "Select PLAYER_ID, PLAYER_FNAME, PLAYER_LNAME, PLAYER_HEIGHT,
                PLAYER_WEIGHT,PLAYER_GENDER,PLAYER_DOB,PLAYER_EMAIL_ADDRESS, TEAM_NAME From dbo.PLAYER p join dbo.TEAM t
                on (p.PLAYER_TEAM_ID = t.TEAM_ID) WHERE p.PLAYER_TEAM_ID =".$teamId;

          $results =  executeQuery($query);

           $playerList = new ArrayObject();
          

           foreach ($results as $result) 
            {
                $player = new PlayerVO();
               $player->set_playerId($result['PLAYER_ID']);
               $player->set_dob($result['PLAYER_DOB']);
               $player->set_email($result['PLAYER_EMAIL_ADDRESS']);
               $player->set_fname($result['PLAYER_FNAME']);
               $player->set_gender($result['PLAYER_GENDER']);
               $player->set_height($result['PLAYER_HEIGHT']);
               $player->set_lname($result['PLAYER_LNAME']);
               $player->set_teamId($teamId);
               $player->set_teamName($result['TEAM_NAME']);
               $player->set_weight($result['PLAYER_WEIGHT']);
                $playerList->append($player);
            }


            return $playerList;
       
   }
   
   public function getPlayerByPlayerId($playerId){
       
        // the SQL query to be executed on the database
            $query = "Select PLAYER_ID, PLAYER_FNAME, PLAYER_LNAME, PLAYER_HEIGHT,PLAYER_TEAM_ID,TEAM_NAME,
                PLAYER_WEIGHT,PLAYER_GENDER,PLAYER_DOB,PLAYER_EMAIL_ADDRESS From dbo.PLAYER p join dbo.TEAM t on (p.PLAYER_TEAM_ID = t.TEAM_ID)
                WHERE PLAYER_ID =".$playerId;

          $results =  executeQuery($query);

          $player = new PlayerVO(); 

           foreach ($results as $result) 
            {
              
               $player->set_playerId($result['PLAYER_ID']);
               $player->set_dob($result['PLAYER_DOB']);
               $player->set_email($result['PLAYER_EMAIL_ADDRESS']);
               $player->set_fname($result['PLAYER_FNAME']);
               $player->set_gender($result['PLAYER_GENDER']);
               $player->set_height($result['PLAYER_HEIGHT']);
               $player->set_lname($result['PLAYER_LNAME']);
               $player->set_teamId($result['PLAYER_TEAM_ID']);
               $player->set_teamName($result['TEAM_NAME']);
               $player->set_weight($result['PLAYER_WEIGHT']);
              
            }


            return $player;
       
   }

   public function cudPlayer($player, $action){

            if(isset($player)){
                
                    $query = "";

                    if(strcasecmp($action, CREATE) == 0){
                        //add team record
                        $query = " dbo.SP_CREATE_PLAYER '".$player->get_fname()."','".$player->get_lname().
                               "','".$player->get_height()."','".$player->get_weight()."','".$player->get_gender().
                               "','".$player->get_dob()."','".$player->get_email().
							   "','" . $player->get_teamId() ."'";
               
                    }
                    else if (strcasecmp($action, UPDATE) == 0){
                        //update team record
                          $query = " dbo.SP_UPDATE_PLAYER '".$player->get_fname()."','".$player->get_lname().
                               "','".$player->get_height()."','".$player->get_weight()."','".$player->get_gender().
                               "','".$player->get_dob()."','".$player->get_teamId()."','".$player->get_email().
                               "','".$player->get_playerId()."'";
               
                    }
                    else if(strcasecmp($action, DELETE) == 0){
                        //delete team record 
                         //$query = " dbo.SP_DELETE_PLAYER '".$player->get_email()."','".$player->get_teamName()."'";
                        $query = " dbo.SP_DELETE_PLAYER '".$player->get_playerId()."'";
                    }
                    
                     $result = parent::processCUD($query,$action); //or use $this->
                     return $result;

            }else{
                return ERROR;
            }
        }

}//end of class

?>
