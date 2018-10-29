<?php

$form = $_POST;

/*foreach ($_POST['fields'] as $item) {
	$form[$item['name']] = trim($item['value']);
}*/

$name = htmlspecialchars($form["name"]);
$phone = htmlspecialchars($form["tel"]);
$sender = htmlspecialchars($form["sender"]);

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
$mail->Username = 'admin@ruf.kiev.ua';                 // SMTP username
$mail->Password = '90g2CRoOb3Oj';                          // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to

$mail->setFrom("admin@ruf.kiev.ua", "user");
$mail->addAddress("toplivokotly@gmail.com", "user");     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $email_subject;
$mail->Body    = $email_body;

$mail->send();