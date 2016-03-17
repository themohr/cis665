<?php

/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 3/1/2016
 * Description: Team Data Access Object
 *  
 */


require_once ("model/TournamentVO.php");


class RegistrationDAO extends BaseDAO{
    
    public function RegistrationDAO(){}
    
    
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
