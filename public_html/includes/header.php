<html lang="en">
<head>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
        
    <!-- Bootstrap theme -->
    <!-- -->
	<link href="css/theme.css" rel="stylesheet" /> 
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/gamebetterstyle.css"> 

    <!-- Custom CSS -->
	<!-- 
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"> 
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700"> 
	<link rel="stylesheet" href="css/otherstyle.css"> 
	-->
    
    <title><?php echo $page_title; ?></title>	
    
        <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body role="document">
    
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

          </button>
          <a class="navbar-brand" href="#"><?php echo $user_name ?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
                
			<?php 
			if (!isset($_SESSION['user_id'])) {
				echo '<li><a href="register.php">Register</a></li> ';
				echo '<li><a href="login.php">Sign In</a></li>';
				echo '<li><a href="viewgames.php">Current Games</a></li>';

			}
			else
			{
				if ($is_admin) 
				{
					echo '<li><a href="view_users.php">View Users</a></li>';
					
					echo '<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Games
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="tutorials.php">Add</a></li>
						</ul></li>';
						
					echo '<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="postreview.php">Reviews
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="postreview.php">Post</a></li>
						<li><a href="editreview.php">Edit</a></li>
						</ul></li>';
						
					echo '<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Support
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="checkstatus.php">Check Status</a></li>
						</ul></li>';
					
					echo '<li><a href="logout.php">Log Out</a></li>';
				}
				else
				{
				echo '<li><a href="password.php">Change Password</a></li>';
				echo '<li><a href="viewgames.php">Current Games</a></li>';
				echo '<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Games
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="rate.php">Rate</a></li>
						<li><a href="commenttutorial.php">Comment</a></li>
						</ul></li>';
				
				echo '<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Reviews
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="reviews.php">Reviews</a></li>
						<li><a href="commentreview.php">Comment</a></li>
						</ul></li>';
						
				echo '<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Support
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="submitticket.php">Submit Ticket</a></li>
						<li><a href="checkstatus.php">Check Status</a></li>
						</ul></li>';
				echo '<li><a href="logout.php">Log Out</a></li>';
				}			
			}
			?>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
    
    <div class="container theme-showcase" role="main" style="margin-top:60px">
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
        	
          <!-- Start of the page-specific content. -->
<!-- Script 8.1 - header.html -->
