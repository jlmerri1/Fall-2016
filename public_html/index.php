<?php # Script 3.4 - index.php
include ('includes/session.php');

$page_title = 'Welcome to Game Better!';
include ('./includes/header.php');
?>
<style>
.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
  width: 70%;
  margin: auto;
}
</style>

<div class="page-header">
    <h2 style="color:white; margin-top:-45px;">Game Better</h2>
    </br>
  	<p>Let us show you how to <b>Game Better</b></p>
  	
  
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
    <li data-target="#myCarousel" data-slide-to="5"></li>
    <li data-target="#myCarousel" data-slide-to="6"></li>
    <li data-target="#myCarousel" data-slide-to="7"></li>
    <li data-target="#myCarousel" data-slide-to="8"></li>
  </ol>

  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/pacman.jpg" alt="Pacman" width="460" height="345">
    </div>
    <div class="item">
      <img src="images/pressstart.jpg" alt="Press Start" width="460" height="345">
    </div>
    <div class="item">
      <img src="images/videogames.jpg" alt="Video Game" width="460" height="345">
    </div>
    <div class="item">
      <img src="images/supermariobros.png" alt="Super Mario Bros" width="460" height="345">
    </div>
    <div class="item">
      <img src="images/unravel.jpg" alt="unravel" width="460" height="345">
    </div>
    <div class="item">
      <img src="images/halo5.jpg" alt="halo5" width="460" height="345">
    </div>
    <div class="item">
      <img src="images/tombraider6.jpg" alt="Tomb Raider 6" width="460" height="345">
    </div>
    <div class="item">
      <img src="images/bigpacman.jpg" alt="Big PacMan" width="460" height="345">
    </div>
    <div class="item">
      <img src="images/uncharted4.jpg" alt="uncharted4" width="460" height="345">
    </div>
  </div>

  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php
include ('./includes/footer.html');
?>