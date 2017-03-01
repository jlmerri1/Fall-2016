<?php 
include ('includes/session.php');

$page_title = 'Post Review';
include ('includes/header.php');

require_once ('mysqli_connect.php'); // Connect to the db.

if (isset($_POST['submit'])) {

    $errors = array(); // Initialize an error array.

// Check for a review contents:

	if (empty($_POST['game_name'])) {
            $errors[] = 'You forgot to select a game.';
    } else {
            $gn = mysqli_real_escape_string($dbc, trim($_POST['game_name']));
    }

    if (empty($_POST['review_title'])) {
            $errors[] = 'You forgot to enter the review title.';
    } else {
            $rt = mysqli_real_escape_string($dbc, trim($_POST['review_title']));
    }

    // Check for a review contents:
    if (empty($_POST['review_content'])) {
            $errors[] = 'You forgot to enter the review content.';
    } else {
            $rc = mysqli_real_escape_string($dbc, trim($_POST['review_content']));
    }

    if (empty($errors)) { // If everything's OK.
        
        
        // Add to the database...
        // Make the query:	
        $q = "INSERT INTO reviews (game_name, review_title, review_content) 
        VALUES ('$gn', '$rt', '$rc')";		
        $r = @mysqli_query ($dbc, $q); // Run the query.
        if ($r) { // If it ran OK.

                // Print a message:
                echo '<h1>Thank you!</h1>
        <p>You successfully added a game!</p><p><br /></p>';	

        } else { // If it did not run OK.

                // Public message:
                echo '<h1>System Error</h1>
                <p class="error">You could not add a game due to a system error. We apologize for any inconvenience.</p>'; 

                // Debugging message:
                echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';

        } // End of if ($r) IF.

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
$q = "SELECT user_type_id, type_name FROM user_types ORDER BY type_name ASC";		

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

<form action="postreview.php" method="post">
	<h3 style="color:white;">Post Review</h3>
	</br>
	<p>Game Name: &nbsp;<?php 
		$myData = "SELECT game_name FROM Game";
		$myR = @mysqli_query ($dbc, $myData);
		echo "<select name='game_name' style='width:308px; margin-left:24px; '>";
		echo '<option value="">Select One</option>';
		while($row = mysqli_fetch_array($myR))
		{
			echo '<option value="' . $row["game_name"] . '">' . $row["game_name"] . '</option>';
		}
		echo "</select>"; ?></p>
	</p>
	
	<table>
		<tr>
			<td><p>Review Title:</p></td>
			<td style="padding-left:35px;"><input style="margin-top:-10px;" type="text" name="review_title" size="34" maxlength="100" value="<?php if (isset($_POST['review_title'])) echo $_POST['review_title']; ?>"></textarea></td>
		</tr>
	</table>
	</br>
	<table>
		<tr>
			<td style="vertical-align:top;"><p>Review Content:</p></td>
			<td style="padding-left:12px;"><textarea style="margin-top:-10px;" name="review_content" id="review_content" cols="60" rows="7" value="<?php if (isset($_POST['review_content'])) echo $_POST['review_content']; ?>"></textarea></td>
		</tr>
	</table>
	
	<br/ >
	<div style="padding-left:560px;"><button type="submit" name="submit" class="btn btn-sm btn-primary" />Submit</button></div>
</form>

<?php
mysqli_close($dbc);
include ('./includes/footer.html');
?>
