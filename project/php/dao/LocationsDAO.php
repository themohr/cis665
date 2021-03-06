<?php

/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 02/21/2016
 * Description: Coach Data Access Object
 *  
 */

require_once ("dbConnection.php");
require_once ("commons/Constants.php");
require_once ("model/TournamentVO.php");

class LocationsDAO{
    
    public function LocationsDAO(){}

    public function getTournaments($stype,$tname){

            $query = <<<STR
                      SELECT TOURNAMENT_NAME, 
                             CONVERT(VARCHAR(10), TOURNAMENT_DATE, 101) AS TOURNAMENT_DATE, 
                             Right(IsNull(Convert(Varchar,TOURNAMENT_BEGIN_TIME,100),''),7) AS TOURNAMENT_BEGIN_TIME, 
                             Right(IsNull(Convert(Varchar,TOURNAMENT_END_TIME,100),''),7) AS TOURNAMENT_END_TIME, 
                             SPORT_TYPE_ID,
                             SPORT_TYPE_NAME,
                             TOURNAMENT_STREET, 
                             TOURNAMENT_CITY, 
                             TOURNAMENT_STATE_CODE,  
                             TOURNAMENT_ZIP  
                        FROM dbo.TOURNAMENT 
                       INNER JOIN dbo.SPORT_TYPE 
                          ON SPORT_TYPE_ID = TOURNAMENT_SPORT_TYPE_ID
                       WHERE 0=0
STR;
                    if ($stype == '%'){
                    $query .= <<<STR
                        AND SPORT_TYPE_NAME IS NOT NULL
STR;
                    }else if (strpos($stype, '%') !== FALSE){
                    $query .= <<<STR
                        AND UPPER(SPORT_TYPE_NAME) LIKE UPPER('$stype')
STR;
                    }else if($stype != NULL){
                    $query .= <<<STR
                        AND UPPER(SPORT_TYPE_NAME) = UPPER('$stype')
STR;
                    }
                    if ($tname == '%'){
                    $query .= <<<STR
                        AND TOURNAMENT_NAME IS NOT NULL
STR;
                    }else if (strpos($tname, '%') !== FALSE){
                    $query .= <<<STR
                        AND UPPER(TOURNAMENT_NAME) LIKE UPPER('$tname')
STR;
                    }else if($tname != NULL){
                    $query .= <<<STR
                        AND UPPER(TOURNAMENT_NAME) = UPPER('$tname')
STR;
                    }                    
                    if ($tname == NULL && $stype == NULL){
                    $query .= <<<STR
                        AND TOURNAMENT_NAME IS NOT NULL
                        AND SPORT_TYPE_NAME IS NOT NULL
STR;
                    }
                    
                  //  print_r($query);
                    
            $results = executeQuery($query);
            
            $locList = new ArrayObject();
            
             foreach ($results as $result) 
            {
                $locations = new Tournament();
                $locations->set_tournamentName($result['TOURNAMENT_NAME']);
                $locations->set_tournamentDate($result['TOURNAMENT_DATE']);
                $locations->set_tournamentBeginTime($result['TOURNAMENT_BEGIN_TIME']);
                $locations->set_tournamentEndTime($result['TOURNAMENT_END_TIME']);
                $locations->set_sportTypeId($result['SPORT_TYPE_ID']);
                $locations->set_sportTypeName($result['SPORT_TYPE_NAME']);
                $locations->set_tournamentStreet($result['TOURNAMENT_STREET']);
                $locations->set_tourcenameCity($result['TOURNAMENT_CITY']);
                $locations->set_tournamentState($result['TOURNAMENT_STATE_CODE']);
                $locations->set_tournamentZip($result['TOURNAMENT_ZIP']);
                $locList->append($locations);
            }
            return $locList;
        }
        
      public function getAllSporTypes(){
          
          $query = " Select SPORT_TYPE_ID , SPORT_TYPE_NAME
                         From SPORT_TYPE";
         return executeQuery($query);
      }  
      
       public function getAllTournaments(){
          
          $query = " Select TOURNAMENT_ID , TOURNAMENT_NAME
                         From dbo.TOURNAMENT";
         return executeQuery($query);
      }  
}