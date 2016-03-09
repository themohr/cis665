<?php


/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 02/21/2016
 * Description: Coach Data Access Object
 *  
 */

require_once ("BaseDAO.php");

class CoachDAO extends BaseDAO
{
    
        public function CoachDAO(){ }

        public function getCoachList(){


            // the SQL query to be executed on the database
            $query = "Select COACH_ID, COACH_LNAME, COACH_FNAME,  COACH_EMAIL_ADDRESS, COACH_PASSWORD From dbo.COACH
                    Order by COACH_FNAME";

           // call the executeQuery method (in dbConnExec.php)
           // and return the result

           $results =  executeQuery($query);

           $coachList = new ArrayObject();

           foreach ($results as $result) 
            {
                $coach = new CoachVO();
                $coach->set_coachId($result['COACH_ID']);
                $coach->set_fname($result['COACH_FNAME']);
                $coach->set_lname($result['COACH_LNAME']);
                $coach->set_password($result['COACH_PASSWORD']);
                $coach->set_emailAddress($result['COACH_EMAIL_ADDRESS']);
               // $coach->set_teamName($result['COACH_TEAM_NAME']);
                $coachList->append($coach);
            }


            return $coachList;

        }
        
        public function login($userId,$password){
            
            $query = "Select COACH_ID From dbo.COACH 
                        where COACH_EMAIL_ADDRESS='".$userId."' and COACH_PASSWORD ='".$password."'";
            
            $result =  executeQuery($query);
            
            if(count($result) == 1){
                return SUCCESSFUL_LOGIN;
            }
            else{
                return UNSUCCESSFUL_LOGIN;
            }
            
        }

        public function cudCoach($coach, $action){

            if(isset($coach)){
                
                    $query = "";

                    if(strcasecmp($action, CREATE) == 0){
                        //add coach record
                        $query = " dbo.SP_CREATE_COACH '".$coach->get_fname()."','".$coach->get_lname()."','"
                                .$coach->get_emailAddress()."','".$coach->get_password()."'";
               
                    }
                    else if (strcasecmp($action, UPDATE) == 0){
                        //update coach record
                         $query = " dbo.SP_UPDATE_COACH '".$coach->get_fname()."','".$coach->get_lname()."','"
                                .$coach->get_oldEmailAddress()."','".$coach->get_emailAddress()."'";
            }
                    else if(strcasecmp($action, DELETE) == 0){
                        //delete coach record 
                         $query = " dbo.SP_DELETE_COACH '".$coach->get_emailAddress()."'";
                    }
                    
                     $result = parent::processCUD($query,$action); //or use $this->
                     echo 'Result in CoachDAO='.$result;
                    return $result;

            }else{
                return ERROR;
            }
        }

}//end of class

?>

