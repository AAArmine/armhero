<?php
session_start();

unset($_SESSION['invalid_email']);
unset($_SESSION['error']);

use PHPMailer\PHPMailer\PHPMailer;

include "config/dbconfig.php";
include "lang_config.php";
// include "lang_config.php";
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';
$body = [

    'en' => 'Click On This Link to Reset Password',
    'ru' => 'Нажмите на эту ссылку, чтобы сбросить пароль',
    'am' => 'Գաղտնաբառը վերականգնելու համար անցեք այս հղումով'


];
$errors_unique = [

    'am' => 'Նշված էլ․հասցեն բացակայում է',
    'ru' => 'Указанный адрес электронной почты отсутствует',
    'en' => 'The specified e-mail address is missing'


];

$link = [

    'en' => 'Click To Reset password',
    'ru' => 'Нажмите чтобы сбросить пароль',
    'am' => 'Սեղմեք գաղտնաբառը վերականգնելու համար'


];

$errors_v = [

    'am' => 'Էլ․հասցեն վավեր չէ',
    'ru' => 'Адрес электронной почты недействителен',
    'en' => 'Email address is invalid'


];


if ($_POST['reset_email'] && $_POST['reset_email'] != "") {
    $email = $_POST['reset_email'];
    $lang = $_POST['lang'];


    // var_dump($lang);
    $sql = "SELECT * FROM users WHERE email='" . $email . "'";
    $result = $con->query($sql);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $token = md5($email) . rand(10, 9999);

        $expFormat = mktime(
            date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y")
        );
        $expDate = date("Y-m-d H:i:s", $expFormat);
        $update = mysqli_query($con, "UPDATE users set reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $email . "'");

        $link = "<a href='http://localhost/armhero/" . $lang . "/set_password_reset.php?key=" . $email . "&token=" . $token . "'>" . $link[$lang] . "</a>";


        $mail = new PHPMailer(true);
        $mail->CharSet = "UTF-8";

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'Armheroes.am@gmail.com'; // Gmail address which you want to use as SMTP server
        $mail->Password = 'kttoeqezscynephh'; // Gmail address Password
        $mail->SMTPSecure = "ssl";
        $mail->Port = '465';
        $mail->setFrom('Armheroes.am@gmail.com'); // Gmail address which you used as SMTP server
        $mail->FromName = 'Armhero.org';
        $mail->addAddress($email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
        $mail->IsHTML(true);
        $mail->Body = $body[$lang] . " - " . $link;
        if ($mail->Send()) {
            $_SESSION['reset_email'] = $email;
            $locate_url = "location:check_your_email.php";
            header($locate_url);
            exit();
        } else {
            echo "Mail Error - >" . $mail->ErrorInfo;
        }


    } else {
        $_SESSION['invalid_email'] = $email;
        $_SESSION['error'] = $errors_unique[$lang];

        $locate_url = "location:forget_email.php";
        header($locate_url);
        exit();
    }


} else {

    $_SESSION['error'] = $errors_v[$lang_dir];
    // var_dump($lang_dir);
    $locate_url = "location:forget_email.php";
    header($locate_url);
    exit();
}


?>