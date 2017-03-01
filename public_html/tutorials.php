<?php # Script 3.4 - index.php
include ('includes/session.php');

$page_title = 'Welcome to this Site!';
include ('includes/header.php');

// Page header:
echo '<h3 style="color:white;">Add New Game</h3>';
echo '</br>';

require_once ('mysqli_connect.php'); // Connect to the db.


if (isset($_POST['submit'])) {

    $errors = array(); // Initialize an error array.

    // Check for a game name:
    if (empty($_POST['game_name'])) {
            $errors[] = 'You forgot to enter the name of the game.';
    } else {
            $gn = mysqli_real_escape_string($dbc, trim($_POST['game_name']));
    }

    // Check for a game descrition:
    if (empty($_POST['game_description'])) {
            $errors[] = 'You forgot to enter the game description.';
    } else {
            $gd = mysqli_real_escape_string($dbc, trim($_POST['game_description']));
    }
    
	// Check for an platform:
    if (empty($_POST['platform'] || ($_POST['platform']) == "0") ){
            $errors[] = 'You forgot to choose a platform.';
    } else {
            $p = mysqli_real_escape_string($dbc, trim($_POST['platform']));
    }
    // Check for an rating:
    if (empty($_POST['maturity_rating'])) {
            $errors[] = 'You forgot to choose a rating.';
    } else {
            $mr = mysqli_real_escape_string($dbc, trim($_POST['maturity_rating']));
    }
    // Check for an genre:
    if (empty($_POST['genre'])) {
            $errors[] = 'You forgot to choose a genre.';
    } else {
            $g = mysqli_real_escape_string($dbc, trim($_POST['genre']));
    }
	
	// Check for a tutorial name:
    if (empty($_POST['tutorial_name'])) {
            $errors[] = 'You forgot to enter the name of the tutorial.';
    } else {
            $tn = mysqli_real_escape_string($dbc, trim($_POST['tutorial_name']));
    }

    // Check for a tutorial contents:
    if (empty($_POST['tutorial_contents'])) {
            $errors[] = 'You forgot to enter the tutorial contents.';
    } else {
            $tc = mysqli_real_escape_string($dbc, trim($_POST['tutorial_contents']));
    }

    if (empty($errors)) { // If everything's OK.
        
        
        // Add to the database...
        // Make the query:	
        $q = "INSERT INTO Game (game_description, game_name, genre, maturity_rating, platform, tutorial_description, tutorial_name) 
        VALUES ('$gd', '$gn', '$g', '$mr','$p', '$tc', '$tn')";	
        $w = "INSERT INTO rating (game_name, rating) VALUES ('$gn', 'NULL')";
        	
        $r = @mysqli_query ($dbc, $q); // Run the query.
        $t = @mysqli_query ($dbc, $w);
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

mysqli_close($dbc); // Close the database connection.
?>





<form action="tutorials.php" method="post">

	<table>
		<tr>
			<td><p>Game Name:</p></td>
			<td style="padding-left:45px;"><input style="margin-top:-10px;" type="text" name="game_name" size="20" maxlength="50" value="<?php if (isset($_POST['game_name'])) echo $_POST['game_name']; ?>"></td>
		</tr>
	</table>
	
	<table>
		<tr>
			<td><p>Game Description:</p></td>
			<td style="padding-left:10px;"><input style="margin-top:-10px;" type="text" name="game_description" size="20" maxlength="1000" value="<?php if (isset($_POST['game_description'])) echo $_POST['game_description']; ?>"></td>
		</tr>
	</table>
	
	<table>
		<tr>
			<td><p>Platform:</p></td>
			<td style="padding-left:74px;"><select style="width:198px; margin-top:-10px;" id="platform" name="platform" value="<?php if (isset($_POST['platform'])) echo $_POST['platform']; ?>">
				<option value="">Select One</option>
				<option value="Platstation">Playstation</option>
				<option value="XBox">Xbox</option>
				<option value="PC">PC</option>
			</select></td>
		</tr>
	</table>
	
	<table>
		<tr>
			<td><p>Rating:</p></td>
			<td style="padding-left:86px;"><select style="width:198px; margin-top:-10px;" id="rating" name="maturity_rating" value="<?php if (isset($_POST['maturity_rating'])) echo $_POST['maturity_rating']; ?>">
				<option value="">Select One</option>
				<option value="Everyone">Everyone</option>
				<option value="Teen">Teen</option>
				<option value="Mature">Mature</option>
				<option value="Adults Only">Adults Only</option>
				<option value="Rating Pending">Rating Pending</option>
			</select></td>
		</tr>
	</table>
	
	<table>
		<tr>
			<td><p>Genre:</p></td>
			<td style="padding-left:87px;"><select style="width:198px; margin-top:-10px;" id="genre" name="genre" value="<?php if (isset($_POST['genre'])) echo $_POST['genre']; ?>">
				<option value="">Select One</option>
				<option value="Action and Adventure">Action and Adventure</option>
				<option value="FPS">First-Person Shooter</option>
				<option value="Role Playing">Role Playing</option>
				<option value="Simulation">Simulation</option>
				<option value="Sports">Sports</option>
				<option value="Other">Other</option>
			</select></td>
		</tr>
	</table>
	
	<table>
		<tr>
			<td><p>Tutorial Name:</p></td>
			<td style="padding-left:37px;"><input style="margin-top:-10px;" type="text" name="tutorial_name" size="20" maxlength="50" value="<?php if (isset($_POST['tutorial_name'])) echo $_POST['tutorial_name']; ?>"></td>
		</tr>
	</table>
	
	<table>
		<tr>
			<td style="vertical-align:top;"><p>Tutorial Content:</p></td>
			<td style="padding-left:25px;"><textarea name="tutorial_contents" id="tutorial_contents" cols="60" rows="7" value="<?php if (isset($_POST['tutorial_contents'])) echo $_POST['tutorial_contents']; ?>"></textarea></td>
		</tr>
	</table>
	
	<br/ >
	<div style="padding-left:573px;"><button type="submit" name="submit" class="btn btn-sm btn-primary" />Submit</button></div>
</form>

<?php
mysqli_close($dbc);
include ('./includes/footer.html');
?>