<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;

include "config/dbconfig.php";
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$result = '';

$comment = isset($_POST['textComment']) ? $_POST['textComment'] : '';

if ($comment !== '') {
  

        $art_type = $_POST['art_type'];
        $art_id = $_POST['art_id'];
        $user_id = $_SESSION['user_id'];
        $comment_table_name = $art_type . "_comments";

        $sql = "INSERT INTO $comment_table_name (user_id,article_id,description,status)VALUES ('$user_id','$art_id','$comment',0)";
        if ($con->query($sql) === TRUE) {
            if($_POST['lang_current']=='en'){
                $result = 'Your comment is successfully send and after confirmation it will be published.';
            }
            if($_POST['lang_current']=='am'){
                $result = 'Ձեր մեկնաբանությունը հաջողությամբ ուղարկվել է և հաստատվելուց հետո այն կհրապարակվի.';
            }
            if($_POST['lang_current']=='ru'){
                $result = 'Ваш комментарий успешно отправлен и после подтверждения он будет опубликован.';
            }
            echo json_encode($result);
        } else {

            echo json_encode($con->error);
            exit();
        }

 


// //        Mail send
//     try {
//         $mail->isSMTP();
//         $mail->Host = 'smtp.gmail.com';
//         $mail->SMTPAuth = true;
//         $mail->Username = 'Armheroes.am@gmail.com'; // Gmail address which you want to use as SMTP server
//         $mail->Password = 'kttoeqezscynephh'; // Gmail address Password
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//         $mail->Port = '587';
//         // $mail->SMTPSecure = "ssl";  real serveri hamar
//         // $mail->Port = "465";  real serveri hamar

//         $mail->setFrom('Armheroes.am@gmail.com'); // Gmail address which you used as SMTP server
//         $mail->addAddress('Armheroes.am@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
//         $mail->isHTML(true);
//         $mail->Subject = 'Comment Received (From article)';
//         $mail->Body = "<h3>Comment: $comment </h3>";

//         $mail->send();
//         $result = 'Your comment Sent! Thank you for contacting us.';
//     } catch (Exception $e) {
//         $result = $e->getMessage();
//     }
// //    in comment
// //    echo $result;

// //    end Mail send
}
