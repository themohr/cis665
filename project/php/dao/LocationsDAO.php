<?php

/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 02/21/2016
 * Description: Coach Data Access Object
 *  
 */

require_once ("dbConnection.php");

class Tournaments{

    public function getTournaments($stype){
            
            $query = <<<STR
                      SELECT TOURNAMENT_NAME, 
                             TOURNAMENT_DATE, 
                             TOURNAMENT_BEGIN_TIME, 
                             TOURNAMENT_END_TIME, 
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
STR;
                    if ($stype != ''){
                    $query .= <<<STR
                        AND SPORT_TYPE_NAME LIKE '%$lastname%'
STR;
                    }if ($stype = '%'){
                    $query .= <<<STR
                        AND SPORT_TYPE_NAME IS NOT NULL
STR;
                    } 
            return executeQuery($query);
        }
}