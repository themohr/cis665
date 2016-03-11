<?php

/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 02/21/2016
 * Description: Coach Data Access Object
 *  
 */

require_once ("dbConnection.php");
require_once ("../commons/Constants.php");
require_once ("../model/TournamentVO.php");

class Tournaments{

    public function getTournaments($stype){
            
            $query = <<<STR
                      SELECT TOURNAMENT_NAME, 
                             TOURNAMENT_DATE, 
                             TOURNAMENT_BEGIN_TIME, 
                             TOURNAMENT_END_TIME, 
                             SPORT_TYPE_ID,
                             TOURNAMENT_STREET, 
                             TOURNAMENT_CITY, 
                             TOURNAMENT_STATE_CODE,  
                             TOURNAMENT_ZIP  
                        FROM dbo.TOURNAMENT 
                       INNER JOIN dbo.SPORT_TYPE 
                          ON SPORT_TYPE_ID = TOURNAMENT_SPORT_TYPE_ID
                       WHERE 0=0
STR;
STR;
                    if ($stype != ''){
                    $query .= <<<STR
                        AND UPPER(SPORT_TYPE_NAME) LIKE UPPER('%$stype%')
STR;
                    }if ($stype = ''){
                    $query .= <<<STR
                        AND SPORT_TYPE_NAME IS NOT NULL
STR;
                    } 
            $results = executeQuery($query);
            
            $locations = new Tournament();
            
             foreach ($results as $result) 
            {
                $locations->set_tournamentName($result['TOURNAMENT_NAME']);
                $locations->set_tournamentDate($result['TOURNAMENT_DATE']);
                $locations->set_tournamentBeginTime($result['TOURNAMENT_BEGIN_TIME']);
                $locations->set_tournamentEndTime($result['TOURNAMENT_END_TIME']);
                $locations->set_sportTypeId($result['SPORT_TYPE_ID']);
                $locations->set_tournamentStreet($result['TOURNAMENT_STREET']);
                $locations->set_tourcenameCity($result['TOURNAMENT_CITY']);
                $locations->set_tournamentState($result['TOURNAMENT_STATE_CODE']);
                $locations->set_tournamentZip($result['TOURNAMENT_ZIP']);
            }


            return $locations;
        }
}