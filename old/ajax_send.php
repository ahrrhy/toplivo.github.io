<?php

$name = htmlspecialchars($_POST["name"]);
$phone = htmlspecialchars($_POST["tel"]);
$sender = htmlspecialchars($_POST["sender"]);

$email_subject = $sender;

$email_body = $sender."\n";
$email_body = $email_body."Имя: ".$name."\n";
$email_body = $email_body."Телефон: ".$phone."\n";

$email = "euro@eurodrova.kiev.ua";
$title = substr(htmlspecialchars($email_subject), 0, 1000);
$mess =  $email_body;
$to = "toplivokotly@gmail.com";
$from=$email;
mail($to, $title, $mess, 'Content-type:text; charset=UTF-8\n From:'.$from);
