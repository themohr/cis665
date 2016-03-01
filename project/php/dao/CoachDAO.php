<?php


/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 02/21/2016
 * Description: Coach Data Access Object
 *  
 */

require_once ("dbConnection.php");
require_once ("../model/CoachVO.php");
require_once ("../commons/Constants.php");

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
        $coach = new Coach();
        $coach->set_coachId($result['COACH_ID']);
        $coach->set_fname($result['COACH_FNAME']);
        $coach->set_lname($result['COACH_LNAME']);
        $coach->set_password($result['COACH_PASSWORD']);
        $coach->set_emailAddress($result['COACH_EMAIL_ADDRESS']);
        $coach->set_teamName($result['COACH_TEAM_NAME']);
        $coachList->append($coach);
    }

  
    return $coachList;
    
}

function cudCoach($coach, $action){
    
    if(isset($coach)){
        if(strcasecmp($action, ADD) == 0){
            //add coach record
            $query = "SP_CREATE_COACH(" .$coach->get_fname().",".$coach->get_lname().",". 
                    $coach->get_emailAddress().",".$coach->get_password().",".$coach->get_teamName(). ")";
            print_r($query);
            executeProcedure($query);
           
        }
        else if (strcasecmp($action, UPDATE) == 0){
            //update coach record
        }
        else if(strcasecmp($action, DELETE) == 0){
            //delete coach record 
        }
    }else{
        return ERROR;
    }
}


?>

