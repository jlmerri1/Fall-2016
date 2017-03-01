<?php # Script 8.6 - view_users.php #2
include ('includes/session.php');
// This script retrieves all the records from the users table.

$page_title = 'View the Current Users';
include ('includes/header.php');

// Page header:
echo '<h3 style="color:white;">Registered Users</h3>';
echo '</br>';

require_once ('mysqli_connect.php'); // Connect to the db.
		
// Make the query:
$q = "SELECT CONCAT(last_name, ', ', first_name) AS name, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr FROM users ORDER BY registration_date ASC";		
$r = @\mysqli_query($dbc, $q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:
	echo "<p>There are currently $num registered users.</p>\n";

	// Table header.
	//echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
	echo '<div align="center"><table style="text-align:center; border-collapse:separate; border-spacing:5px;" width="75%" border="1">
		<tr>
			<td><b>Name</b></td>
			<td><b>Date Registered</b></td>
		</tr>';
	
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr>
			<td>' . $row['name'] . '</td>
			<td>' . $row['dr'] . '</td>
		</tr>';
	}

	echo '</table></div>'; // Close the table.
	
	mysqli_free_result ($r); // Free up the resources.	

} else { // If no records were returned.

	echo '<p class="error">There are currently no registered users.</p>';

}

mysqli_close($dbc); // Close the database connection.

include ('includes/footer.html');
?>
