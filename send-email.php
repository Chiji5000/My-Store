<?php
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader

$mail = new PHPMailer(true);                      //Enable verbose debug output
$mail->isSMTP();
$mail->SMTPAuth   = true;                                                //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
//Enable SMTP authentication
$mail->Username   = 'cjiruke@gmail.com';                     //SMTP username
$mail->Password   = 'osom sseq ljya zcmo';                               //SMTP password
$mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
$mail->Port       = 465;                                        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//Recipients

$mail->setFrom($email, $name);
$mail->addAddress($email, $name);     //Add a recipient

//Attachment                                  //Set email format to HTML
$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();
header("Location: sent-email.php");
