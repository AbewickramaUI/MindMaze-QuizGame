window.addEventListener("load", function() {
    // Get the progress bar element
    var progressBar = document.getElementById("progress");
    var progressText = document.getElementById("progress-text");
    // Set the initial progress to 0%
    var progress = 100;
    
    // Define the interval function to increment the progress bar
    var interval = setInterval(function() {
      // Increment the progress by 1%
      progress -= 10;
      // Set the width of the progress bar
      progressBar.style.width = progress + "%";
      // Check if the progress bar is full
      progressText.textContent ="Loading   " + progress + "%";
      if (progress >= 0) {
        
        clearInterval(interval);
        
       
    
      }
    }, 100);
    
    });