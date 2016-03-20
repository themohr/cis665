<?php

/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 03/2/2016
 * Description: Coach Data Access Object
 *  
 */


require_once ("dbConnection.php");
require_once ("commons/Constants.php");


class  BaseDAO
{
    
     public function BaseDAO(){ }
     
     
     public function processCUD($query, $action){
         
        $result = "NONE";
        
        //print_r($query);
        echo "<br/>";
         
        if(strcasecmp($action, CREATE) == 0){
            //add coach record
            try{
                    $result = executeProcedure($query);
                    //$result = "RECORD ADDED SUCCESSFULLY";
                }catch(Exception $ex){
                    $result = "ERROR ADDING RECORD";
                    echo 'BaseDAO-ERROR ADDING RECORD: ' . $ex->getMessage();
                    echo "<br/>";
                }

        }
        else if (strcasecmp($action, UPDATE) == 0){
            //update coach record
             try{
                  $result = executeProcedure($query);
                 // $result = "RECORD UPDATED SUCCESSFULLY";
                 }catch(Exception $ex){
                    $result = "ERROR UPDATING RECORD";
                    echo 'BaseDAO-ERROR UPDATING RECORD: ' . $ex->getMessage();
                    echo "<br/>";
                }

       }
        else if(strcasecmp($action, DELETE) == 0){
            //delete coach record 
             try{
                   $result = executeProcedure($query);
                   //$result = "RECORD DELETED SUCCESSFULLY";
                }catch(Exception $ex){
                    $result = "ERROR DELETING RECORD";
                    echo 'BaseDAO-ERROR DELETING RECORD: ' . $ex->getMessage();
                    echo "<br/>";
                }

        }
          
        return $result;
         
     }// end of public function processCUD
    
}


?>