<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";

$result = '';

$directory = "uploads";
$images = glob($directory . "/*");

$name = isset($_POST['name']) ? $_POST['name'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$caption = isset($_POST['caption']) ? $_POST['caption'] : '';
$about = isset($_POST['about']) ? $_POST['about'] : '';
$comments = isset($_POST['comments']) ? $_POST['comments'] : '';
$text = isset($_POST['text']) ? $_POST['text'] : '';

if ($name !== '') {

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'Armheroes.am@gmail.com'; // Gmail address which you want to use as SMTP server
        $mail->Password = 'kttoeqezscynephh'; // Gmail address Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = '587';
        // $mail->SMTPSecure = "ssl";
        // $mail->Port = "465";

        $mail->setFrom('Armheroes.am@gmail.com'); // Gmail address which you used as SMTP server
        $mail->addAddress('Armheroes.am@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
        if (!empty($images)) {
            foreach ($images as $image) {
                $mail->addAttachment($image, 'My uploaded image');
            }
            $mail->addAttachment($image, 'My uploaded image');
        }

        echo $name;
        $mail->isHTML(true);
        $mail->Subject = 'Message Received (Story)';
        $mail->Body = "<h3>Name: $name <br>Phone: $phone<br>Email: $email <br>Caption : $caption<br>About : $about<br>Comments : $comments<br>Text : $text</h3>";

        $mail->send();
        $result = 'Message Sent! Thank you for contacting us.';
    } catch (Exception $e) {
        $result = $e->getMessage();
    }

    $files = glob('path/to/temp/*'); // get all file names

    foreach ($images as $file) { // iterate files
        if (is_file($file)) {
            unlink($file); // delete file
        }
    }
}
