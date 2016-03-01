<div class="col-md-12">
	<table>
		<tr>
			<th>Player name</th>
			<th>Position</th>
		</tr>
		<?php
		for($i = 0; $i <= 5; $i++) {
			echo "<tr>";
			echo "<td>Player " . $i . "</td>";
			echo "<td>" . $i . "</td>";
			echo "</tr>";
		}
		?>
	</table>
</div>
