<?php
	// If a team is created
?>
	<div class="content">
		<form>
			<input type="text" name="fname">
			<input type="text" name="lname">
			<input type="text" name="height">
			<input type="text" name="weight">
			<input type="text" name="gender">
			<input type="text" name="dob">
			<input type="text" name="email">
		</form>
		<table>
			<tr>
				<th>Player name</th>
				<th>Position</th>
				<th>&nbsp;</th>
			</tr>
			<?php
			for($i = 0; $i <= 5; $i++) {
				echo "<tr>";
				echo "<td>Player " . $i . "</td>";
				echo "<td>" . $i . "</td>";
				echo "<td>Edit / Delete</td>";
				echo "</tr>";
			}
			?>
		</table>
		Delete team
	</div>
	
	<?php  // Team not created? Create team ?>
