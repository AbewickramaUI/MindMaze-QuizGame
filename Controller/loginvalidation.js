function validateEmail() {
    const email = document.getElementById("email").value;
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!re.test(email)) {
      alert("Please enter a valid email address.");
      return false;
    }
    return true;
  }
  
  function validatePassword(){
    var password = document.getElementById("password").value;
      // Check for at least 8 characters
    if (password.length < 8) {
        alert("Password must contain at least 8 characters");
        return false;
    }
  
    // Check for at least one uppercase letter
    if (!/[A-Z]/.test(password)) {
        alert("Password must contain at least one uppercase letter");
        return false;
    }
    
    // Check for at least one lowercase letter
    if (!/[a-z]/.test(password)) {
        alert("Password must contain at least one lowercase letter");
        return false;
    }
    
    // Check for at least one digit
    if (!/\d/.test(password)) {
        alert("Password must contain at least one digit");
        return false;
    }
    
    // Check for at least one special character
    if (!/[\W_]/.test(password)) {
        alert("Password must contain at least one special character");
        return false;
    }
    
    // Password meets all requirements
    return true;


}

function validateUsername(){
    var username = document.getElementById("username").value;

     // Check for empty string
    if (username.trim() === "") {
        alert("Username cannot be empty");
        return false;
    }
    
    // Check for special characters
    if (/[^\w\s]/.test(username)) {
        alert("Username cannot include special characters");
        return false;
    }
    
    // Username meets all requirements
    return true;
}
    function validateForm(event) {
        // Check email password username
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const username = document.getElementById("username").value;
      
        const isEmailValid = validateEmail();
        const isPasswordValid = validatePassword();
        const isUsernameValid = validateUsername();
    
        if (!isEmailValid || !isUsernameValid || !isPasswordValid) {

            event.preventDefault();
         
            return;
        }
        
    }
    
      
    
    
