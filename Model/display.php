<?php
// Start a PHP session
session_start();

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Display</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/Styles/display.css">
   
  </head>
  <body>
 

    <div class="container">

    <br>  
      <div class="button" onclick="window.location.href='start.php'">
        <a href="#">START</a>
      </div>
      <div class="button" onclick="window.location.href='howtoplay.php'">
        <a href="#">HOW TO PLAY</a>
      </div>
      <div class="button" onclick="window.location.href='scoreboard.php'">
        <a href="#">SCOREBOARD</a>
      </div>
      <div class="button" onclick="window.location.href='about.php'">
        <a href="#">ABOUT</a>
      </div>
      <div class="button" onclick="window.location.href='display.php'">
        <a href="login.php">EXIT</a>
      </div>
    </div>

  </body>
</html>












