<?php 
include ('includes/session.php');

$page_title = 'Check Status';
include ('includes/header.php');

require_once ('mysqli_connect.php'); // Connect to the db


$id = $_SESSION['user_id']; // Obtain user_id

$q1 = "SELECT * FROM users WHERE user_id = $id"; // Create the query
$r1 = @mysqli_query ($dbc, $q1); // Run the query

// Retrieve user_type_id
while($row1 = mysqli_fetch_array($r1)) {
	$type = $row1["user_type_id"];
}

echo '<form method="post" action="respond.php">';
echo '<h3 style="color:white;">Check Status</h3>';
echo '</br>';
echo '<table style="text-align:center; border-collapse:separate; border-spacing:5px;" width="100%" border="1">
	<thead>
		<td><b style="padding-left:10px; padding-right:10px;">&nbsp;</b></td>
		<td><b>Ticket Number</b></td>
		<td><b>Game Name</b></td>
		<td><b>Subject</b></td>
		<td><b>Status</b></td>
	</thead>';

	if($type = 3) {
		$q = "SELECT * FROM support ORDER BY status = 'Closed'"; // Create the query
		$r = @mysqli_query ($dbc, $q); // Run the query
		
		// Retrieve data and populate it into a table 	
		while($row = mysqli_fetch_array($r)) {
			echo '<tr>
				<td><input type="radio" name="ticket" id="ticket" value="'.$row["ticket_num"].'" /></td>
				<td>'.$row["ticket_num"].'</td>
				<td>'.$row["game_name"].'</td>
				<td>'.$row["subject"].'</td>
				<td>'.$row["status"].'</td>
			</tr>';
		}
		echo '</table>';
	}
	else {
		$q = "SELECT * FROM support WHERE user_id = '$id' ORDER BY ticket_num"; // Create the query
		$r = @mysqli_query ($dbc, $q); // Run the query	

		// Retrieve data and populate it into a table 	
		while($row = mysqli_fetch_array($r)) {
			echo '<tr>
				<td><input type="radio" name="ticket" id="ticket" value="'.$row["ticket_num"].'" /></td>
				<td>'.$row["ticket_num"].'</td>
				<td>'.$row["game_name"].'</td>
				<td>'.$row["subject"].'</td>
				<td>'.$row["status"].'</td>
			</tr>';
		}
		echo '</table>';
	}
	
// Obtain selected ticket number
$_POST['ticket'];

echo '</br>';
echo '<div style="padding-left:637px;"><a href="respond.php"><button type="submit" name="submit" value="Get Selected Values" class="btn btn-sm btn-primary"/>Submit</button></p></div>';
echo '</form>';
?>

<?php
include ('includes/footer.html');
?>