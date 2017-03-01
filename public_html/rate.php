<?php # Script 3.4 - index.php
include ('includes/session.php');

$page_title = 'Rate';
include ('includes/header.php');

require_once ('mysqli_connect.php'); // Connect to the db.

if (isset($_POST['submit'])) {

    $errors = array(); // Initialize an error array.

    // Check for a game name:
    if (empty($_POST['game_name']) || empty($_POST['rating'])) 
    {
    	if (empty($_POST['game_name']))
            $errors[] = 'You forgot to enter the name of the game.';
        if (empty($_POST['rating']))
            $errors[] = 'You forgot to enter a rating.';
            
    } else {
            $gn = mysqli_real_escape_string($dbc, trim($_POST['game_name']));
            $r = mysqli_real_escape_string($dbc, trim($_POST['rating']));
    }

    if (empty($errors)) { // If everything's OK.
        
        // Register the user in the database...

        // Make the query:
        $q = "INSERT INTO rating (game_name, rating) VALUES ('$gn', '$r')";		
        $r = @mysqli_query ($dbc, $q); // Run the query.
        if ($r) { // If it ran OK.

                // Print a message:
                echo "<h1>Thank you!</h1>
        <p>You successfully rated $gn!</p><p><br /></p>";	

        } else { // If it did not run OK.

                // Public message:
                echo '<h1>System Error</h1>
                <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 

                // Debugging message:
                echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';

        } // End of if ($r) IF.

        mysqli_close($dbc); // Close the database connection.

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

// Close the database connection.
?>


<style>
.rating {
    overflow: hidden;
    display: inline-block;
    font-size: 0;
    position: relative;
}

.rating-input {
    float: right;
    width: 16px;
    height: 16px;
    padding: 0;
    margin: 0 0 0 -16px;
    opacity: 0;
}

.rating:hover .rating-star:hover,
.rating:hover .rating-star:hover ~ .rating-star,
.rating-input:checked ~ .rating-star {
    background-position: 0 0;
}

.rating-star,
.rating:hover .rating-star {
    position: relative;
    float: right;
    display: block;
    width: 16px;
    height: 16px;
    background: url("images/star.png") 0 -16px;
}

}
</style>

<form action="rate.php" method="post">
	<h3 style="color:white;">Rate</h3>
	</br>
	<p>Game Name: &nbsp;<?php 
		$myData = "SELECT game_name FROM Game";
		$myR = @mysqli_query ($dbc, $myData);
		echo "<select name='game_name' style='width:308px;'>";
		echo '<option value="">Select One</option>';
		while($row = mysqli_fetch_array($myR))
		{
			echo '<option value="' . $row["game_name"] . '">' . $row["game_name"] . '</option>';
		}
		echo "</select>"; ?></p>
	</p>
	
	<table>
		<tr>
			<td style="vertical-align:top;"><p>Rating:</p></td>
			<td style="padding-left:50px;">
				<span class="rating" name="rating">
					<input type="radio" class="rating-input" id="rating-input-1-5" name="rating" value="5">
					<label for="rating-input-1-5" class="rating-star"></label>
					<input type="radio" class="rating-input" id="rating-input-1-4" name="rating" value="4">
					<label for="rating-input-1-4" class="rating-star"></label>
					<input type="radio" class="rating-input" id="rating-input-1-3" name="rating" value="3">
					<label for="rating-input-1-3" class="rating-star"></label>
					<input type="radio" class="rating-input" id="rating-input-1-2" name="rating" value="2">
					<label for="rating-input-1-2" class="rating-star"></label>
					<input type="radio" class="rating-input" id="rating-input-1-1" name="rating" value="1">
					<label for="rating-input-1-1" class="rating-star"></label>
				</span>
			</td>
		</tr>
	</table>
	
	<!--<p>Rating: 
	<span class="rating" name="rating">
		<input type="radio" class="rating-input" id="rating-input-1-5" name="rating" value="5">
		<label for="rating-input-1-5" class="rating-star"></label>
		<input type="radio" class="rating-input" id="rating-input-1-4" name="rating" value="4">
		<label for="rating-input-1-4" class="rating-star"></label>
		<input type="radio" class="rating-input" id="rating-input-1-3" name="rating" value="3">
		<label for="rating-input-1-3" class="rating-star"></label>
		<input type="radio" class="rating-input" id="rating-input-1-2" name="rating" value="2">
		<label for="rating-input-1-2" class="rating-star"></label>
		<input type="radio" class="rating-input" id="rating-input-1-1" name="rating" value="1">
		<label for="rating-input-1-1" class="rating-star"></label>
	</span>-->
	
	<div style="padding-left:343px;"><button type="submit" name="submit" class="btn btn-sm btn-primary" />Submit</button></div>
</form>



<?php
include ('includes/footer.html');
mysqli_close($dbc); 
?>