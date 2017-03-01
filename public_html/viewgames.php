<?php # Script 8.6 - view_users.php #2
include ('includes/session.php');
// This script retrieves all the records from the users table.

$page_title = 'View the Current Games';
include ('includes/header.php');

echo '<h3 style="color:white;">Current Games</h3>';
echo '</br>';

require_once ('mysqli_connect.php'); // Connect to the db.
		
// Make the query:
$q = "SELECT Game.game_name, round(AVG(rating),2) as rate FROM Game JOIN rating ON Game.game_name = rating.game_name WHERE rating > 0 GROUP BY game_name ";		
$r = @mysqli_query($dbc, $q); // Run the query.

$num = mysqli_num_rows($r);

if ($num > 0)
{ 

	// Print how many games there are:
	echo "<p>There are currently $num games.</p>\n";

	// Table header.
	//echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
	echo '<div align="center"><table style="text-align:center; border-collapse:separate; border-spacing:5px;" width="75%" border="1">
		<tr>
			<td><b>Game Name</b></td>
			<td><b>Game Ratings</b></td>
		</tr>';
	
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr>
			<td>' . $row['game_name'] . '</td>
			<td>' . $row['rate'] . '</td>
		</tr>';
	}

	echo '</table></div>'; // Close the table.
	
	mysqli_free_result ($r); // Free up the resources.	

} 


else
{
echo "<p>There are currently no games.</p>\n";

}

mysqli_close($dbc); // Close the database connection.

include ('includes/footer.html');
?>
