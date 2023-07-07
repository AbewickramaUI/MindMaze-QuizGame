<?php
// Start a PHP session
session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Start</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/Styles/start.css">
   
  </head>
  <body>
    
  

    <div class="container">
      //display 4 buttons for each level and exit button
      <div class="button" onclick="window.location.href='easylevel.php'">
        <a href="">EASY</a>
      </div>
      
      <div class="button" onclick="window.location.href='mediumlevel.php'">
        <a href="#">MEDIUM</a>
      </div>
      <div class="button" onclick="window.location.href='hardlevel.php'">
        <a href="#">HARD</a>
      </div>
      <div class="button" onclick="window.location.href='display.php'">
        <a href="#">EXIT</a>
      </div>
    </div>
  </body>
</html>