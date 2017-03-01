<?php # Script 8.5 - register.php #2
include ('includes/session.php');

$page_title = 'Comment';
include ('includes/header.php');

require_once ('mysqli_connect.php'); // Connect to the db.

// Check if the form has been submitted:
if (isset($_POST['submit'])) {

    $errors = array(); // Initialize an error array.

    // Check for a first name:
    if (empty($_POST['game_name'])) {
            $errors[] = 'You forgot to enter the name of the game.';
    } else {
            $gn = mysqli_real_escape_string($dbc, trim($_POST['game_name']));
    }

    // Check for a last name:
    if (empty($_POST['comment'])) {
            $errors[] = 'You forgot to enter your comments.';
    } else {
            $c = mysqli_real_escape_string($dbc, trim($_POST['comment']));
    }
        if (empty($errors)) { // If everything's OK.
        
        // Register the user in the database...

        // Make the query:
        $q = "INSERT INTO user_comments (game_name, ruser_comment) VALUES ('$gn', '$c')";		
        $r = @mysqli_query ($dbc, $q); // Run the query.
        if ($r) { // If it ran OK.

                // Print a message:
                echo "<h1>Thank you!</h1>
        <p>You successfully added a comment to $gn!</p><p><br /></p>";	

        } else { // If it did not run OK.

                // Public message:
                echo '<h1>System Error</h1>
                <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 

                // Debugging message:
                echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';

        } // End of if ($r) IF.


        // Include the footer and quit the script:
        include ('includes/footer.html'); 
        exit();

    } else { // Report the errors.

            echo '<h1>Error!</h1>
            <p class="error">The following error(s) occurred:<br />';
            foreach ($errors as $msg) { // Print each error.
                    echo " - $msg<br />\n";
            }
            echo '</p><p>Please try again.</p><p><br /></p>';

    } // End of if (empty($errors)) IF.
	
} 

$types = array();

// Make the query:
$q = "SELECT game_id, type_name FROM user_types ORDER BY type_name ASC";		

$result = mysqli_query($dbc, $q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($result);

if ($num > 0) { // If it ran OK, display the records.
       
    while ($row = mysqli_fetch_assoc($result)) {
        $types[] = $row;
    }

    mysqli_free_result ($result); // Free up the resources.	
}

?>


<form action="commentreview.php" method="post">
	<h3 style="color:white;">Review Comment</h3>
	</br>
	<p>Game Name: &nbsp;<?php 
		$myData = "SELECT game_name FROM Game";
		$myR = @mysqli_query ($dbc, $myData);
		echo "<select name='game_name' style='width:308px; margin-left:1px; padding-left:1px;'>";
		echo '<option value="">Select One</option>';
		while($row = mysqli_fetch_array($myR))
		{
			echo '<option value="' . $row["game_name"] . '">' . $row["game_name"] . '</option>';
		}
		echo "</select>"; ?></p>
	</p>
			
	<table>
		<tr>
			<td style="vertical-align:top;"><p>Comment:</p></td>
			<td style="padding-left:30px;"><textarea name="comment" id="comments" cols="54" rows="8" value="<?php if (isset($_POST['comment'])) echo $_POST['comment']; ?>"></textarea></td>
		</tr>
	</table>	
	<br/ >
	<div style="padding-left:490px;"><button type="submit" name="submit" class="btn btn-sm btn-primary" />Submit</button></p></div>
</form>

<?php
include ('includes/footer.html');
mysqli_close($dbc); 

?>