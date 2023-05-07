<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$result = '';

$name = $_POST['name'];
$email = $_POST['email'];
$text = $_POST['text'];


try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'Armheroes.am@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'kttoeqezscynephh'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';
    // $mail->SMTPSecure = "ssl";  real serveri hamar
    // $mail->Port = "465";  real serveri hamar

    $mail->setFrom('Armheroes.am@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('Armheroes.am@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Contact message from armhero.org contact section';
    $mail->Body = "<h3>Name : $name <br>Email: $email <br>Text : $text</h3>";

    $mail->send();
    $result = 'Sent';
} catch (Exception $e) {
    $result = $e->getMessage();
}

echo $result;
