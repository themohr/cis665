<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
          // include the file that has the class
        include("dao/CoachDAO.php");
         include("dao/TeamDAO.php");
           include("dao/PlayerDAO.php");
          include("dao/LocationsDAO.php");   
           include("dao/RegistrationDAO.php"); 
       
         $coachDAO = new CoachDAO();          
         $coachList = $coachDAO->getCoachList();
         $iterator = $coachList->getIterator();
                  
            echo 'Coach List test';
            
            echo '<br />';
         
         while ($iterator->valid()) {
             
            $coach = $iterator->current();
            echo  'CoachName: ' . $coach-> get_fname() .' '.$coach-> get_lname().
                    ', CoachId: ' . $coach->get_coachId().', Email='.$coach->get_emailAddress();
            echo '<br />';
            $iterator->next();
        }
        
        
           echo '<br />';
           echo 'Login test';
            echo '<br />';
   
          $loginResult = $coachDAO->login("abc@def.com", "1234");
          echo  '$loginResult: ' . $loginResult ;
           echo '<br />';
           
             
                echo '<br />';
           echo 'Team List test';
            echo '<br />';
   
          $teamDAO = new TeamDAO();
          $team = $teamDAO->getTeamByCoachId(61);
          echo  'teamID: ' . $team->get_teamId() .', Team Name: ' . $team->get_teamName();
           echo '<br />';
        
           
           
        
           
          $playerDAO = new PlayerDAO();          
         $playerList = $playerDAO->getPlayersByTeamId(20);
         $iterator = $playerList->getIterator();
                  
            echo 'Player List test';
            
            echo '<br />';
         
         while ($iterator->valid()) {
             
            $player = $iterator->current();
            echo  'PlayerName: ' . $player-> get_fname() .' '.$player-> get_lname().',TeamName='.$player-> get_teamName().
                    ', PlayerId: ' . $player->get_playerId().', Email='.$player->get_email();
            echo '<br />';
            $iterator->next();
        }
        
         $locDAO = new LocationsDAO();          
         $locList = $locDAO->getTournaments("baseball");
         $iterator = $locList->getIterator();
                  
        echo '<br />'; 
            echo 'Location List test';            
            echo '<br />';
         
         while ($iterator->valid()) {
             
            $loc = $iterator->current();
            echo  'TOURNAMENT_NAME: ' . $loc-> get_tournamentName() ;
            echo '<br />';
            $iterator->next();
        }
         
        
          $regDAO = new RegistrationDAO();          
         $regList = $regDAO->searchRegistrationByTeamId(17);
         $iterator = $regList->getIterator();
                  
        echo '<br />'; 
            echo 'Registration List test';            
            echo '<br />';
         
         while ($iterator->valid()) {
             
            $reg = $iterator->current();
            $loc = $reg->get_tournament();
            $team = $reg->get_team();
            
           echo  '###Registration id##: ' . $reg-> get_registrationId(). '##activity-date='.$reg-> get_activityDate() ;
            echo '<br />';
           echo  '==TOURNAMENT_NAME==: ' . $loc-> get_tournamentName() ;
            echo '<br />';
            echo  '**teamID:*** ' . $team->get_teamId() .', **Team Name**: ' . $team->get_teamName();
           echo '<br />';
        
            $iterator->next();
        }
         
      
          
           
           
          /*         
           * 
           *  
            echo '<br />';
           echo 'Add player test';
            echo '<br />';
    
          $player = new PlayerVO();
          $playerDAO = new PlayerDAO();
          $player->set_teamName("TestHV Team1");
          $player->set_fname("testPlayerFname");
          $player->set_lname("testPlayerLname");
          $player->set_dob("12/12/1975");
          $player->set_email("player@test.com");
          $player->set_gender("M");
          $player->set_height("72");
          $player->set_weight("150");
                 
          $result = $playerDAO->cudPlayer($player, CREATE);
         echo '<br />';
          echo  '$result of player add: ' . $result;
           echo '<br />';
           
        
             
           
             echo '<br />';
           echo 'Team delete test';
            echo '<br />';
   
           $team = new TeamVO();
          $teamDAO = new TeamDAO();
          $team->set_teamName("TestHV Team2 updated");
         $result = $teamDAO->cudTeam($team, DELETE);
          
            echo '<br />';
          echo  '$result of team delete: ' . $result;
           echo '<br />';
           
           
           
            echo '<br />';
           echo 'Team update test';
            echo '<br />';
   
           $team = new TeamVO();
          $teamDAO = new TeamDAO();
          $team->set_teamName("TestHV Team2 updated");
           $team->set_oldTeamName("TestHV Team1");
          $team->set_coachEmailAddress("abc@def.com");
          $result = $teamDAO->cudTeam($team, UPDATE);
          
            echo '<br />';
          echo  '$result of team update: ' . $result;
           echo '<br />';
           
       
            
           
        
             echo '<br />';
           echo 'Add team test';
            echo '<br />';
    
          $team = new TeamVO();
          $teamDAO = new TeamDAO();
          $team->set_teamName("TestHV Team1");
          $team->set_coachEmailAddress("abc@def.com");
          $result = $teamDAO->cudTeam($team, CREATE);
         echo '<br />';
          echo  '$result of team add: ' . $result;
           echo '<br />';
          */ 
        
         /* 
           echo '<br />';
           echo 'Coach Add test';
            echo '<br />';
            
            
           
      $newCoach = new Coach();
        $newCoach->set_fname("testFName");
        $newCoach->set_lname("testLName");
        $newCoach->set_emailAddress("abc@def.com");
        $newCoach->set_password("1234");
         
        
        $coachDAO->cudCoach($newCoach, CREATE);
     
      
    
        echo '<br />';
        echo 'Coach Update test';
        echo '<br />';

      //  $updateCoach = new Coach();
        $newCoach->set_fname("testF1Name");
        $newCoach->set_lname("testL1Name");
        $newCoach->set_emailAddress("abc@def.com");
        $newCoach->set_oldEmailAddress("abc@def.com");
        $newCoach->set_password("1234");
       
        $coachDAO->cudCoach($newCoach, UPDATE);
     */
      /*   echo '<br />';
         echo 'Coach Delete test';
         echo '<br />';
          
         $newCoach->set_emailAddress("abc@def.com");
         $coachDAO->cudCoach($newCoach, DELETE);
       */
      
     
         
    /*      $coachNewList = $coachDAO->getCoachList();
         $iterator2 = $coachNewList->getIterator();
                  
           
          echo '<br />';
         echo 'Coach List after update and delete test';
          echo '<br />';
         
         while ($iterator2->valid()) {
             
            $coach = $iterator2->current();
            echo  'CoachName: ' . $coach-> get_fname() .' '.$coach-> get_lname().
                    ', CoachId: ' . $coach->get_coachId();
            echo '<br />';
            $iterator2->next();
        }
         */
        ?>
    </body>
</html>
