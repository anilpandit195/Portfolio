<?php


$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["comments"];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require "../vendor/autoload.php";
require "../vendor/phpmailer/PHPMailer.php";
require "../vendor/phpmailer/SMTP.php";
require "../vendor/phpmailer/Exception.php";

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'smtp.gmail.com';                    //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'anilpandit195@gmail.com';                     //SMTP username
    $mail->Password   = 'mpqzxpfzxwjbddmb';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('contact@skillshowcase.ml', 'Skill Showcase');
    $mail->addAddress('anilpandit195@gmail.com', 'Admin');     //Add a recipient

    //Content
    $mail->isHTML(true);                                 //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message."<br><br>From: ".$name."<br>Email: ".$email;

    $mail->send();
    header("Location: send.html");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}