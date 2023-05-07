<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$result = '';

$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$lang = $_POST['lang'];
if ($lang == 1) {

    $subject_text = 'Message Received (Donation)';

}
if ($lang == 2) {

    $subject_text = 'Ստացված հաղորդագրությունը (նվիրատվություն)';

}
if ($lang == 3) {

    $subject_text = 'Сообщение получено (благотворительность)';

}

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'Armheroes.am@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'kttoeqezscynephh'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';
    $mail->CharSet = "UTF-8";
    $mail->setFrom('Armheroes.am@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('Armheroes.am@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = $subject_text;

    if ($name !== '') {
        $mail->Body = "<h3>Name Surname : $name <br>Email: $email <br>Comment : $comment</h3>";
    }


    $mail->send();
    $result = 'Message Sent! Thank you for contacting us.';
} catch (Exception $e) {
    $result = $e->getMessage();
}

echo $result;
