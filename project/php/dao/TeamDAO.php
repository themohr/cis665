<?php

/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 3/1/2016
 * Description: Team Data Access Object
 *  
 */

require_once ("BaseDAO.php");
require_once ("model/TeamVO.php");

class TeamDAO extends BaseDAO{
    
   public function TeamDAO(){ }
   
   public function getTeamByCoachId($coachId){
       
        // the SQL query to be executed on the database
            $query = "Select TEAM_ID, TEAM_NAME From dbo.TEAM
                    where TEAM_COACH_ID =".$coachId;

          $results =  executeQuery($query);

           $team = new TeamVO();

           foreach ($results as $result) 
            {
                $team->set_teamId($result['TEAM_ID']);
                $team->set_teamName($result['TEAM_NAME']);
                
            }


            return $team;
       
   }

   public function cudTeam($team, $action){

            if(isset($team)){
                
                    $query = "";

                    if(strcasecmp($action, CREATE) == 0){
                        //add team record
                        $query = " dbo.SP_CREATE_TEAM '".$team->get_teamName()."','".$team->get_coachEmailAddress()."'";
               
                    }
                    else if (strcasecmp($action, UPDATE) == 0){
                        //update team record
                         $query = " dbo.SP_UPDATE_TEAM '".$team->get_oldTeamName()."','".$team->get_teamName()."','"
                                .$team->get_coachEmailAddress()."'";
                    }
                    else if(strcasecmp($action, DELETE) == 0){
                        //delete team record 
                         $query = " dbo.SP_DELETE_TEAM '".$team->get_teamName()."'";
                    }
                    
                     $result = parent::processCUD($query,$action); //or use $this->
                     echo 'Result in TeamDAO='.$result;
                     return $result;

            }else{
                return ERROR;
            }
        }

}//end of class

?>