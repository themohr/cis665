@@ -1,104 +0,0 @@
<div class="col-md-12">
    <h2>Locations/Tournament</h2>
        <p>Perform a search by entering in a tournament name and sport type. If you are not looking for a particular sport, use a % for a wilde card search.</p><br>
        <div class="forms">
        <form class="form" action="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];?>" method="POST">
        <label for="stype">Sport Type: </label>
            <input type="listbox" name="stype" id="stype" required="required"/>
        <input type="submit" name="process">
    </form>
       
<?php   

            echo '<br />';
         echo '=====entering====';
         
          echo '<br />';
          if(isset($_POST['process'])){
              
              
      ?>
            
             <table>
                    <colgroup>
                     <col class="firstcol" />
                  </colgroup>
                  <thead>
                     <tr>
                        <th>Tournament Name</th>
                        <th>Date</th>
                        <th>Begin Time</th>
                        <th>End Time</th>
                        <th>Sport Type</th>
                        <th>Street</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                     </tr>
                  </thead>
        </table>
            
          <?php  
         //   print_r($_POST);
         //  include("dao/LocationsDAO.php"); 
            require_once("dao/LocationsDAO.php");
       // $process = new FormProcess();
          
            $stype = $_POST['stype'];
             echo '<br />';
             echo 'stype='.$stype;

              echo '<br />';

              $locDAO = new LocationsDAO(); 
              $locList = $locDAO->getTournaments($stype);
             // print_r($locList);
             //$tournamentList = getTournaments($stype);
            //$recordsReturned = count($tournamentsLIst);
             $recordsReturned = count($locList);

              $iterator = $locList->getIterator();

             while ($iterator->valid()) {

                $tournament = $iterator->current();
                echo "<tr>";
                echo "<td>" . $tournament->get_tournamentName() . "</td>";
                echo "<td>" . $tournament->get_tournamentDate() . "</td>";
                echo "<td>" . $tournament->get_tournamentBeginTime() . "</td>";
                echo "<td>" . $tournament->get_tournamentEndTime() . "</td>";
                echo "<td>" . $tournament->get_sportTypeName() . "</td>";
                echo "<td>" . $tournament->get_tournamentStreet() . "</td>";
                echo "<td>" . $tournament->get_tourcenameCity() . "</td>";
                echo "<td>" . $tournament->get_tournamentState() . "</td>";
                echo "<td>" . $tournament->get_tournamentZip() . "</td>"  ;
                echo "</tr>";

                $iterator->next();
            }
          }
        
       // $recordsReturned = 0;
       /* foreach ($tournamentList as $tournament){
         extract($tournament);
         $recordsReturned ++;
          echo "<tr>";
          echo "<td>" . $tournament['TOURNAMENT_NAME'] . "</td>";
          echo "<td>" . $tournament['TOURNAMENT_DATE'] . "</td>";
          echo "<td>" . $tournament['TOURNAMENT_BEGIN_TIME'] . "</td>";
          echo "<td>" . $tournament['TOURNAMENT_END_TIME'] . "</td>";
          echo "<td>" . $tournament['SPORT_TYPE_NAME'] . "</td>";
          echo "<td>" . $tournament['TOURNAMENT_STREET'] . "</td>";
          echo "<td>" . $tournament['TOURNAMENT_CITY'] . "</td>";
          echo "<td>" . $tournament['TOURNAMENT_STATE_CODE'] . "</td>";
          echo "<td>" . $tournament['TOURNAMENT_ZIP'] . "</td>"  ;
          echo "</tr>";

                }
        * 
        */
              //  $process->validateForm($_POST);
?>     
            
    </div>
</div>
