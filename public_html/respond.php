<?php 
include ('includes/session.php');

$page_title = 'Respond';
include ('includes/header.php');

require_once ('mysqli_connect.php'); // Connect to the db

$id = $_SESSION['user_id']; // Obtain user_id

$q1 = "SELECT * FROM users WHERE user_id = $id"; // Create the query
$r1 = @mysqli_query ($dbc, $q1); // Run the query

// Retrieve user_type_id
while($row1 = mysqli_fetch_array($r1)) {
	$type = $row1["user_type_id"];
}

$tn = isset($_POST['ticket']) ? $_POST['ticket'] : "";// Retrieve ticket number

$q = "SELECT * FROM support WHERE ticket_num = $tn";// Create the query
$r = @mysqli_query ($dbc, $q); // Run the query

// Retrieve data
while($row = mysqli_fetch_array($r)) {
	$gn = $row["game_name"];
	$s = $row["subject"];
	$c = $row["comment"];
	$rsp = $row["response"];
	$st = $row["status"];
}

if (empty($_POST['response'])) {
	$errors[] = 'You forgot to enter a response.';
} else {
	$r2 = mysqli_real_escape_string($dbc, trim($_POST['response']));
	
	$q2 = "INSERT INTO support (response) VALUES ('$r2')"; // Make the query
	$r3 = @mysqli_query ($dbc, $q2); // Run the query
}
?>

<form action="respond.php" method="post">
	<table style="text-align:left; border-collapse:separate; border-spacing:5px;" width="100%" border="0">
		<tr>
			<td style="table-layout:fixed; width:260px;"><h3 style="color:white;">Ticket #: <?php echo $tn; ?></h3></td>
			<td style="padding-top:15px; text-align:right;"><h4 style="color:white;">Status: <?php echo $st; ?></h4></td>
		</tr>
	</table>
	<table style="text-align:center; border-collapse:separate; border-spacing:5px;" width="100%" border="1">
		<tr>
			<td style="table-layout:fixed; width:100px;"><p style="margin-top:10px; margin-right:1px;">Game:</p></td>
			<td><p style="color:white; text-align:left; margin-top:10px; padding-left:20px;"><?php echo ($gn); ?></p></td>
		</tr>
	</table>
	<table style="text-align:center; border-collapse:separate; border-spacing:5px;" width="100%" border="1">
		<tr>
			<td style="table-layout:fixed; width:100px;"><p style="margin-top:10px;">Subject:</p></td>
			<td><p style="color:white; text-align:left; margin-top:10px; padding-left:20px;"><?php echo ($s); ?></p></td>
		</tr>
	</table>
	<table style="text-align:center; border-collapse:separate; border-spacing:5px;" width="100%" border="1">
		<tr>
			<td style="table-layout:fixed; width:100px;"><p style="margin-top:10px;">Issue:</p></td>
			<td><p style="color:white; text-align:left; margin-top:10px; padding-left:20px;"><?php echo ($c); ?></p></td>
		</tr>
	</table>
	<table style="text-align:center; border-collapse:separate; border-spacing:5px;" width="100%" border="1">
		<tr>
			<td style="table-layout:fixed; width:100px;"><p style="margin-top:10px;">Response:</p></td>
			<td><p style="color:white; text-align:left; margin-top:10px; padding-left:20px;"><?php echo ($rsp); ?></p></td>
		</tr>
	</table>
	<table style="text-align:center; border-collapse:separate; border-spacing:5px;" width="100%" border="1">
		<tr>
			<td style="table-layout:fixed; width:100px;"><p style="margin-top:10px;">Respond:</p></td>
			<td><textarea name="response" id="response" cols="54" rows="8" value="<?php if (isset($_POST['response'])) echo $_POST['response']; ?>"></textarea></td>
		</tr>
	</table>
	<br/ >
	<div style="padding-left:640px;"><button type="submit" name="submit" class="btn btn-sm btn-primary" />Submit</button></div>
</form>

<?php
include ('includes/footer.html');
?>