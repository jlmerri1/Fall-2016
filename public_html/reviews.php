<?php # Script 3.4 - index.php
include ('includes/session.php');

$page_title = 'Welcome to this Site!';
include ('./includes/header.php');

require_once ('mysqli_connect.php'); // Connect to the db.
		
// Make the query:
$q = "SELECT game_name, review_title, review_content FROM reviews GROUP BY game_name; ";		
$r = @mysqli_query($dbc, $q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($r);

	echo '<h1 style="color:white;">GameBetter Reviews</h1>';
	echo '</br>';

if ($num > 0) { // If it ran OK, display the records.	

	echo '<table style="border-collapse: separate; border-spacing: 8px;" border="1" align="center" cellspacing="15" cellpadding="15" width="100%">
	
	<tr><td style="padding:10px;" align="center" width=150 ><h3>Game Name</h3></td><td align="center" width=250><h3>Game Reviews</h3></td><td align="center"><h3>Review Content</h3></td></tr>';
	
	
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr><td align="center" height=100>' . $row['game_name'] . '</td><td align="center">' . $row['review_title'] . '</td><td style="padding:10px;" align="left">' . $row['review_content'] . '</td></tr>';
		}

	echo '</table>'; // Close the table.
	
	mysqli_free_result ($r); // Free up the resources.	

} 
else { // If no records were returned.

	echo '<p class="error">There are currently no reviews.</p>';
}
echo'</div></div>';

echo'<div class="container theme-showcase" role="main" style="margin-top:60px">
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">';
        
        $q = "SELECT game_name, ruser_comment FROM user_comments GROUP BY game_name; ";		
		$r = @mysqli_query($dbc, $q); // Run the query.

		// Count the number of returned rows:
		$num = mysqli_num_rows($r);
		
		echo '<h3 style="color:white;">User Reviews</h3>';
		echo '</br>';
		
		if ($num > 0) { // If it ran OK, display the records.

			

			echo '<table align="center" cellspacing="15" cellpadding="15" width="90%">
	
			<tr><td align="left" width=250 ><h2>Game Name</h2></td><td align="left"><h2>Review Content</h2></td></tr>';
		
	
		// Fetch and print all the records:
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr><td align="left" height=100>' . $row['game_name'] . '</td><td align="left">' . $row['ruser_comment'] . '</td><td align="left">' . $row['review_content'] . '</td></tr>';
		
		}

		echo '</table>'; // Close the table.
	
		mysqli_free_result ($r); // Free up the resources.	

} 
else { // If no records were returned.

	echo '<p class="error">There are currently no reviews.</p>';
}
        
        echo'</div></div>';

mysqli_close($dbc); // Close the database connection.

include ('./includes/footer.html');
?>