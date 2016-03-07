<?php
	@require_once('dao/FormDAO.php');
	$process = new FormProcess();
?>
<div class="col-md-12">
	<h2>Locations/Tournament</h2>
	<!-- Name, Sports Type, Date, Begin Time, End Time, Street, City State Zip -->
        <p>Perform a search by entering in a tournament name and sport type</p>
        <div class="forms">
		<form class="form" action="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];?>" method="POST">
		<label for="stype">Sport Type: </label>
			<input type="listbox" name="stype" id="stype" required="required"/>
		<input type="submit">
	</form>
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
        require_once("LocationsDAO.php");
        
        $stype = $_POST('stype');
        
        $tournamentList = getTournaments($stype);
        $recordsReturned = count($tournamentsLIst);
        
        $recordsReturned = 0;
        foreach ($tournamentList as $tournament){
         extract($tournament);
         $recordsReturned ++;
          echo "<tr>";
          echo "<td>" . $$tournament['TOURNAMENT_NAME'] . "</td>";
          echo "<td>" . $$tournament['TOURNAMENT_DATE'] . "</td>";
          echo "<td>" . $$tournament['TOURNAMENT_BEGIN_TIME'] . "</td>";
          echo "<td>" . $$tournament['TOURNAMENT_END_TIME'] . "</td>";
          echo "<td>" . $$tournament['SPORT_TYPE_NAME'] . "</td>";
          echo "<td>" . $$tournament['TOURNAMENT_STREET'] . "</td>";
          echo "<td>" . $$tournament['TOURNAMENT_CITY'] . "</td>";
          echo "<td>" . $$tournament['TOURNAMENT_STATE_CODE'] . "</td>";
          echo "<td>" . $$tournament['TOURNAMENT_ZIP'] . "</td>"  ;
          echo "</tr>";

                }
                $process->validateForm($_POST);
?>     
            
</div>
