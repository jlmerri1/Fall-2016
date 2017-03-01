<?php 
	include ('includes/session.php');
	$page_title = 'Presentation';
	include ('includes/header.php');
?>

<div class="container">
  <h2>Game Better Presentation</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
    <li><a data-toggle="tab" href="#menu1">Challenges</a></li>
    <li><a data-toggle="tab" href="#menu2">What we found easy</a></li>
    <li><a data-toggle="tab" href="#menu3">What we would improve</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    <br>
      <p>Welcome to our presentation!</p>
      <p>Created by Jason, Dimitrios, and Saad.
    </div>
    <div id="menu1" class="tab-pane fade">
    <br>
      <p>1.  Learning Bootsrap and PHP in a short period of time.</p>
      <p>2.  Meetings with our busy schedule.</p>
      <p>3.  Completing the SRS and ADD.</php>
      <p>4.  So much content, so little time.</php>
    </div>
    <div id="menu2" class="tab-pane fade">
    <br>
      <p>1.  Once we learned PHP, it was quite easy.</p>
      <p>2...</p>
    </div>
    <div id="menu3" class="tab-pane fade">
    <br>
      <p>1.  Learn PHP and Bootstrap early in the semester.</php>
      <p>2.  Better distribution of time, start SRS/ADD sooner.</php>
      <p>3.  Less writing. (Though we know this is a writing intensive course)</php>
    </div>
  </div>
</div>


<?php
include ('includes/footer.html');
?>