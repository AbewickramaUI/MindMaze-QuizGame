<?php

session_start();
// establish database connection
$conn = new mysqli("localhost","root","","mindmaze");

// check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// retrieve the loggedin user's username  from session 
$username = $_SESSION['username'];

// calculate user's score
$score = 0;
$input="";
$solution="";
if ($input == $solution) {
    $score = 0;
}
$score += 1000; // multiply by 1000 for correct answer
if ($input != $solution) {
    $score -= 250; // reduce by 250 for incorrect answer
}



// update user's score in the database
$sql = "UPDATE users SET score = '$score' WHERE username = '$username'";

if ($conn->query($sql) === TRUE) {
  //echo "Score updated successfully";
} else {
	echo "Error updating score: " . $conn->error;
}

// close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hard Level</title>

  
  <link rel="stylesheet" href="../View/Styles/game.css">
  <link rel="stylesheet" href="../View/Styles/life.css">

</head>

<body>

      </div>
      <span style="float: right; color: white;" > <?php echo $_SESSION['username']; ?></span>
				<a href="#"><img src="../View/Images/user.png"  alt="" style="float: right;"></a>
		  </div>
  
<script>
document.querySelector('img').addEventListener('click', function() {
  // send a logout request to the server using PHP sessions
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'logout.php');
  xhr.onload = function() {
    // redirect the user to the first page
    window.location.href = "display.php";
  };
  xhr.send();
});
</script>


   

 <!-- progress-bar-container -->
<div  id="progress-bar-container">
  <div id="progress-bar"></div>
</div>


  <h2 id="question-number-title" style="color: white;">Question <span id="questionnumber">0</span>/10</h2>

  <h2 id="score-title" style="color: white;">Current Score: <span id="score">0</span></h2>

  <h2 id="time-left-title" align="center" style="color: white;">Time remaining:  <span id="timer">20 seconds</span></h2>

  <script>
    //Calculate the time
    let timeLeft = 20;
    let score = 0;
    let timer = setInterval(() => {
      timeLeft--;
      document.getElementById("timer").textContent = timeLeft;
      if (timeLeft <= 0) {
        clearInterval(timer);
        alert("Time's up!");
      }
    }, 1000);


    let Question = "";
    let solution = -1;
    let numQuestions = 0;
    let numIncorrect = 0;

    function newGame() {
      startup();
    }

    let progressBar = document.getElementById("progress-bar");

    function handleInput() {
      let input = document.getElementById("answer");
      let message = document.getElementById("message");


      // update the progress bar for incorrect answers
      let progressBar = document.getElementById("progress-bar");
      let maxIncorrect = 3;
     
     
      if (input.value == solution) {
        //score++;
        //set the score of 2000 points to each correct answer
		    score += 2000;
        document.getElementById("score").textContent = score;
        
        numQuestions++;
        document.getElementById("questionnumber").textContent = numQuestions; // update the question number

        //allocate maximum number of 10 questions for first level
        if (numQuestions >= 10) {
          clearInterval(timer);
          alert("Congratulations! You have completed the First Level.");
          return;
        }

        // Wait 1 second before going to the next question
        setTimeout(newGame, 1000); 
        //display message for correct answer
        message.innerHTML = 'Congratulations, Your answer is correct! Keep on the Maze!! ';
        message.style.color = 'white';
      } else {
        numIncorrect++;
      
        // end game if 3 incorrect attempts have been made
    if (numIncorrect >= 3) { 
      clearInterval(timer);
      alert("You have made too many incorrect attempts. Game over.");
      location.reload();
      return;
    }
        if(score>=100)
        // If the answer is incorrect, decrement the score by 250 and update the scoreboard
		    score -= 250;
        //display message for incorrect answer
        document.getElementById("score").textContent = score;
        message.innerHTML = "Incorrect answer, You have lose in the Maze!";
        message.style.color = 'white';
     
  // Reduce progress bar length based on number of incorrect answers
  let reductionFactor = numIncorrect / 2.5; 
    let newWidth = Math.max(0, progressBar.offsetWidth - (progressBar.offsetWidth * reductionFactor));
    progressBar.style.width = newWidth + "px";
  
  }

      // Clear the input field after each attempt
      input.value = "";
    }

    async function SmileQuestion(data) {
      // reset the timer
      clearInterval(timer);
      timeLeft = 20;
      timer = setInterval(() => {
        timeLeft--;
        document.getElementById("timer").textContent = timeLeft;
        if (timeLeft <= 0) {
          clearInterval(timer);
          handleTimeOut();       
        }
      }, 1000);

function handleTimeOut() {
  // increase the question counter
  numQuestions++;
  document.getElementById("questionnumber").textContent = numQuestions; // update the question number
  
  if (numQuestions >= 10) {
    // end the game if there are no more questions
    clearInterval(timer);
    alert("Congratulations! You have earned PRO badge.");
  } else {
    // otherwise, move on to the next question
    alert("Time's up! You have lose in the Maze, Moving on to the next question.");
    setTimeout(newGame, 1000); // Wait 1 second before going to the next question
  }
}

        // update the question and solution
        Question = data.question;
        solution = data.solution;

        let img = document.getElementById("questionimg");
        img.src = data.question;

        let message = document.getElementById("message");
        message.innerHTML = "";
      }


      //fetch the data from api
      async function fetchText() {
        let response = await fetch('https://marcconrad.com/uob/smile/api.php');
        let data = await response.json();
        SmileQuestion(data);
      }

      function startup() {
        fetchText();
      }

      startup();

    </script>

<div class="questions" align="center">
  <div>
    <p id="question"></p>
    <img id="questionimg" src="" alt="Question Image">
    <label for="quantity"><h2 style="color: white;">Enter the missing digit</h2></label>
    <input class="button-62" type="number" id="answer" name="answer" min="1" max="10" onkeydown="if (event.keyCode === 13) handleInput();">
    <input class="button-62" name="btnSubmit" type="submit" class="btn" id="btnSubmit" value="Check" onClick="handleInput()"/>
	<button class="button-62" type="exit" onclick="window.location.href='display.php'" >Exit</button>
    <div id="message"></div>
  </div>

</div>

  </div>
	
</body>

</html>