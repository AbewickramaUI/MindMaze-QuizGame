<?php
	session_start();

	if(isset($_POST["submit"]))
	{

	// establish database connection
	$conn = mysqli_connect("localhost","root","","mindmaze");

	// check if the connection was successful
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$username = $_POST['username'];
	$password = $_POST['password'];

	// prepare the SQL query to retrieve the user with the given username and password
	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	//
	//$score = 100; // example score value
	//$sql = "UPDATE users SET score = $score WHERE email = '" . $_POST['email'] . "'";

	$result = mysqli_query($conn, $sql);

	// check if the query returned any rows
	if (mysqli_num_rows($result) > 0) {
		// set the session variable to indicate that the user is logged in
		$_SESSION['username'] = $username;
		// redirect to the other page
		header('Location: display.php');
		exit;
	} else {
		// if the login credentials are incorrect, display an error message
		echo "<script>alert('Error: Incorrect username or password.')</script>";
		echo "<script>window.history.back()</script>";
   	 	exit();
	}

	// close the database connection
	mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Sign in</title>
	<link rel="stylesheet" type="text/css" href="../View/Styles/login.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="image-container">
			<img src="../View/Images/image.jpg" alt="Background Image">
		</div>
		<div class="form-container">
			<div class="header">
				<h1>Mind Maze</h2>
			</div>
			<div class="login-box">
				<h2>Sign in</h2>
				<form action="login.php" method="post">
					<label for="username" class="fas fa-user-alt"><b> Username</b></label>
					<input type="text" id="username" name="username" placeholder="Enter the username" required>
					<label for="password" class="fa fa-key"><b> Password</b></label>
					<input type="password" id="password" name="password" placeholder="Enter the password" required >
					</br>
          <div class="button-container">
            
            <button class="button center-button" type="reset" id="center">Reset</button>
            <button class="button right-button" id="submit" value="submit" name="submit">Sign in</button>
          </div>
				</form>
				<form>
				<h3 class="align-center" >Don't have an account?</h3>
				<button class="button left-button" formaction="signup.php" id="left" >Sign up</button>
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>
