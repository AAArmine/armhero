<?php
$message='';
use \PHPMailer\PHPMailer\PHPMailer;

require_once '../../phpmailer/Exception.php';
require_once '../../phpmailer/PHPMailer.php';
require_once '../../phpmailer/SMTP.php';

if(!empty($_POST['text'])){
 	$text=$_POST['text'];
 	$email=$_POST['email'];

    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";

if ($email !== '') {

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'armheroes.am@gmail.com'; // Gmail address which you want to use as SMTP server
        $mail->Password = 'kttoeqezscynephh'; // Gmail address Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = '587';
        
        $mail->setFrom('armheroes.am@gmail.com'); // Gmail address which you used as SMTP server
        $mail->addAddress($email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
        $mail->isHTML(true);
        $mail->Subject = 'ARMHERO';
        $mail->Body = "<div> $text </div>";

        $res=$mail->send();
        if($res){
            $message=1;
        }
    } catch (Exception $e) {
        $result = $e->getMessage();
    }
 }
}
else{
 	$message=0;
}
echo $message;
?>