<?php
session_start();
include "config/dbconfig.php";
include "lang_config.php";
unset($_SESSION['res_pass']);
unset($_SESSION['reset_confirm']);

$errors_valid = [

    'am' => 'Գաղտնաբառը պետք է լինի 1 - 6 սիմվոլ',
    'ru' => 'Пароль должен содержать от 1 до 6 символов.',
    'en' => 'Password must be 1 - 6 characters long'

];

$errors_diff = [

    'am' => 'Գաղտնաբառերը չեն համընկնում',
    'ru' => 'Пароли не соответствуют',
    'en' => 'Passwords do not match'

];
if (isset($_POST['reset_password']) && $_POST['reset_link_token'] && $_POST['reset_confirm']) {

    $email = $_POST['email'];
    $token = $_POST['reset_link_token'];
    $lang_dir = $_POST['lang_dir'];

    if (strlen($_POST['reset_password']) < 6) {

        $_SESSION['res_pass'] = $errors_valid[$lang_dir];
        $locate_url = "location:set_password_reset.php?key=" . $email . "&token=$token";

        header($locate_url);
        exit();

    }
    if (strlen($_POST['reset_confirm']) < 6) {

        $_SESSION['reset_confirm'] = $errors_valid[$lang_dir];
        $locate_url = "location:set_password_reset.php?key=" . $email . "&token=$token";

        header($locate_url);
        exit();

    }
    if ($_POST['reset_password'] == $_POST['reset_confirm']) {

        $password = password_hash($_POST['reset_password'], PASSWORD_DEFAULT);
        $query = mysqli_query($con, "SELECT * FROM `users` WHERE `reset_link_token`='" . $token . "' and `email`='" . $email . "'");
        $row = mysqli_num_rows($query);
        if ($row) {
            mysqli_query($con, "UPDATE users set  password='" . $password . "', reset_link_token='" . NULL . "' ,exp_date='" . NULL . "' WHERE email='" . $email . "'");
            $locate_url = "location:sign_in.php";
            header($locate_url);
            exit();

        } else {
            echo "<p>Something goes wrong. Please try again</p>";
        }
    } else {

        $_SESSION['reset_confirm'] = $errors_diff[$lang_dir];
        $locate_url = "location:set_password_reset.php?key=" . $email . "&token=$token";
        header($locate_url);
        exit();

    }

} else {

    $_SESSION['res_pass'] = $errors_valid[$lang_dir];

    $email_s = $_SESSION['email_forget'];
    $token_s = $_SESSION['token_forget'];
    $locate_url = "location:set_password_reset.php?key=" . $email_s . "&token=$token_s";

    header($locate_url);
    unset($_SESSION['email_forget']);
    unset($_SESSION['token_forget']);
    exit();

}

?>
