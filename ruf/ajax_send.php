<?php

$name = htmlspecialchars($_POST["name"]);
$phone = htmlspecialchars($_POST["tel"]);
$sender = htmlspecialchars($_POST["sender"]);

include_once('PHPMailer/class.phpmailer.php');
include_once('PHPMailer/class.smtp.php');

$email_subject = $sender;

$email_body = $sender."<br>";
$email_body = $email_body."Имя: ".$name."<br>";
$email_body = $email_body."Телефон: ".$phone."<br>";

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->SMTPDebug = 0; // Set mailer to use SMTP
$mail->Host = 'mail.ukraine.com.ua';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'admin@evrodrova.kiev.ua';                 // SMTP username
$mail->Password = '123456789A';                          // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to

$mail->setFrom("admin@evrodrova.kiev.ua", "user");
$mail->addAddress("toplivokotly@gmail.com", "user");     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $email_subject;
$mail->Body    = $email_body;

$mail->send();
