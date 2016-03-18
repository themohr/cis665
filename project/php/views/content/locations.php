<div class="col-md-12">
    <h2>Locations/Tournament</h2>
        <p>Perform a search by entering in a tournament name and/or sport type.</p><br>
        <div class="forms">
        <form class="form" action="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];?>" method="POST">
        <label for="stype">Sport Type: </label>
            <input type="listbox" name="stype" id="stype"/>
        <label for="tname">Tournament Name: </label> 
            <input type="text" name="tname" id="tname"/>
        <input type="submit" name="process">
    </form>
       
<?php   

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
            require_once("dao/LocationsDAO.php");

          
            $stype = $_POST['stype'];
            $tname= $_POST['tname'];

            $locDAO = new LocationsDAO(); 
            $locList = $locDAO->getTournaments($stype,$tname);

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
?>     
            
    </div>
</div>
