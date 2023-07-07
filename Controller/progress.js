window.addEventListener("load", function() {
    // Get the progress bar element
    var progressBar = document.getElementById("progress");
    var progressText = document.getElementById("progress-text");
    // Set the initial progress to 0%
    var progress = 0;
    
    // Define the interval function to increment the progress bar
    var interval = setInterval(function() {
      // Increment the progress by 1%
      progress += 5;
      // Set the width of the progress bar
      progressBar.style.width = progress + "%";
      // Check if the progress bar is full
      progressText.textContent ="Loading   " + progress + "%";
      if (progress >= 100) {
        // Stop the interval function
        clearInterval(interval);
        // Display a message to indicate the game is complete
        alert("Mind Maze loading complete!");
        // Redirect to the login page
        window.location.href = "../Model/login.php";
    
      }
    }, 100);
    
    });