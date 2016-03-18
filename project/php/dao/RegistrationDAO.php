<?php

/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 3/1/2016
 * Description: Team Data Access Object
 *  
 */


require_once ("model/TournamentVO.php");
require_once ("model/TeamVO.php");
require_once ("model/RegistrationVO.php");

class RegistrationDAO extends BaseDAO{
    
    public function RegistrationDAO(){}
    
    public function searchRegistrationByTeamId($teamId){
         // the SQL query to be executed on the database
            $query = "SELECT REGISTRATION_ID, CONVERT(VARCHAR(10),REGISTRATION_ACTIVITY_DATE, 101) AS REGISTRATION_ACTIVITY_DATE,
                            TOURNAMENT_ID, TOURNAMENT_NAME, CONVERT(VARCHAR(10), TOURNAMENT_DATE, 101) AS TOURNAMENT_DATE, 
                             Right(IsNull(Convert(Varchar,TOURNAMENT_BEGIN_TIME,100),''),7) AS TOURNAMENT_BEGIN_TIME, 
                             Right(IsNull(Convert(Varchar,TOURNAMENT_END_TIME,100),''),7) AS TOURNAMENT_END_TIME, 
                             TOURNAMENT_STREET, 
                             TOURNAMENT_CITY, 
                             TOURNAMENT_STATE_CODE,  
                             TOURNAMENT_ZIP,
                             TEAM_ID, TEAM_NAME
                        FROM dbo.REGISTRATION reg JOIN dbo.TEAM t on (reg.REGISTRATION_TEAM_ID = t.TEAM_ID) 
                        JOIN dbo.TOURNAMENT tour on(reg.REGISTRATION_TEAM_TOURNAMENT_ID = tour.TOURNAMENT_ID)  WHERE t.TEAM_ID =".$teamId;

          $results =  executeQuery($query);

           $regList = new ArrayObject();
          

           foreach ($results as $result) 
            {
               $regVO = new RegistrationVO();
               
               $regVO->set_registrationId($result['REGISTRATION_ID']);
               $regVO->set_activityDate($result['REGISTRATION_ACTIVITY_DATE']);
               
                $tournament = new Tournament();
                $tournament->set_tournamentName($result['TOURNAMENT_NAME']);
                $tournament->set_tournamentDate($result['TOURNAMENT_DATE']);
                $tournament->set_tournamentBeginTime($result['TOURNAMENT_BEGIN_TIME']);
                $tournament->set_tournamentEndTime($result['TOURNAMENT_END_TIME']);
                $tournament->set_sportTypeId($result['SPORT_TYPE_ID']);
                $tournament->set_sportTypeName($result['SPORT_TYPE_NAME']);
                $tournament->set_tournamentStreet($result['TOURNAMENT_STREET']);
                $tournament->set_tourcenameCity($result['TOURNAMENT_CITY']);
                $tournament->set_tournamentState($result['TOURNAMENT_STATE_CODE']);
                $tournament->set_tournamentZip($result['TOURNAMENT_ZIP']);
                
                 $team = new TeamVO();
                  $team->set_teamId($result['TEAM_ID']);
                $team->set_teamName($result['TEAM_NAME']);
                
                $regVO->set_tournament($tournament);
                $regVO->set_team($team);
                       
                $regList->append($regVO);
            }


            return $regList;
    }
    
    
     public function cudCoach($registration, $action){

            if(isset($registration)){
                
                    $query = "";

                    if(strcasecmp($action, CREATE) == 0){
                        //add coach record
                        $query = " dbo.SP_CREATE_REGISTRATION '".$registration->get_teamName()."','".$registration->get_tournamentName()."";
                                
               
                    }
                    else if (strcasecmp($action, UPDATE) == 0){
                        //update coach record
                         $query = " dbo.SP_UPDATE_REGISTRATION '".$registration->get_teamName()."','".$registration->get_tournamentName()."','"
                                .$registration->get_newTournamentName()."'";
            }
                    else if(strcasecmp($action, DELETE) == 0){
                        //delete coach record 
                         $query = " dbo.SP_DELETE_REGISTRATION '".$registration->get_teamName()."','".$registration->get_tournamentName()."";
                    }
                    
                     $result = parent::processCUD($query,$action); 
                     echo 'Result in RegistrationDAO='.$result;
                    return $result;

            }else{
                return ERROR;
            }
        }//end of public function cudCoach()
        
}
