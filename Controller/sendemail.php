<?php 
session_start();
//This code is and all the PHPMailer connected code parts are created referencing the sample code on https://github.com/PHPMailer/PHPMailer
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['sendemail'])){
    $email = $_POST["email"];
	$username = $_POST["username"];
	$password = $_POST["password"];

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                     //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                            //Enable SMTP authentication
        $mail->Username   = 'kostya.abe@gmail.com';         //SMTP username
        $mail->Password   = 'aaiiudvvfxbipvwn';              //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;    //Enable implicit TLS encryption
        $mail->Port       = 465;                                    

        //Recipients
        $mail->setFrom($email, 'MIND MAZE');
        $mail->addAddress($email,'Mind Maze Test');     //Add a recipient
        

        $message="Name".$username."/n"."Email".$email;

        //Content
        $mail->isHTML(true);     //Set email format to HTML
        $mail->Subject = 'Mind Maze Sign up';
        $mail->Body    = 'Welcome to MindMaze...'.$message.'';
        $mail->AltBody = 'Mind Maze Sign up';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}