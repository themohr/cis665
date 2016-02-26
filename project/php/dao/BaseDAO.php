<?php


/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 02/21/2016
 * Description: Coach Data Access Object
 *  
 */

require_once ("dbConnection.php");
require_once ("../model/CoachVO.php");


function getCoachList(){
    
   
    // the SQL query to be executed on the database
    $query = "Select COACH_ID, COACH_LNAME, COACH_FNAME,  COACH_EMAIL_ADDRESS, COACH_PASSWORD, COACH_TEAM_NAME
            From dbo.COACH
            Order by COACH_FNAME";
   
   // call the executeQuery method (in dbConnExec.php)
   // and return the result

   $results =  executeQuery($query);

   $coachList = new ArrayObject();
   
   foreach ($results as $result) 
    {
        $coach = new Coach($result['COACH_ID'], $result['COACH_LNAME'], $result['COACH_FNAME'], 
               $result['COACH_EMAIL_ADDRESS'],  $result['COACH_PASSWORD'],$result['COACH_TEAM_NAME']);
        $coachList->append($coach);
    }

  
    return $coachList;
    
}




?>

