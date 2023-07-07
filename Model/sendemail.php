<?php

session_start();


//This code is and all the PHPMailer connected code parts are created referencing the sample code on https://github.com/PHPMailer/PHPMailer
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require 'vendor/autoload.php';
require 'Controller/PHPMailer/src/Exception.php';
require 'Controller/PHPMailer/src/PHPMailer.php';
require 'Controller/PHPMailer/src/SMTP.php';

if(isset($_POST['sendemail'])){
    $email = $_POST["email"];
		$username = $_POST["username"];
		$password = $_POST["password"];


    //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;  //Enable verbose debug output
    $mail->isSMTP();                        //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';    //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                 //Enable SMTP authentication
    $mail->Username   = 'kostya.abe@gmail.com';    //SMTP username
    $mail->Password   = 'secret';          //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email, 'Mind Maze');
    $mail->addAddress($email, 'MindMazeTest');     //Add a recipient
    

      

    //Content
    $mail->isHTML(true);     //Set email format to HTML
    $mail->Subject = 'Mind Maze Game';
    $mail->Body    = 'Welcome to MindMaze...'.$message.'';
   

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}

