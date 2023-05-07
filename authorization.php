<?php
session_start();
include "config/dbconfig.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $con->query($sql);
if ($result->num_rows == 1) {

    $db_res = $result->fetch_assoc();
    $db_password = $db_res['password'];
    if (password_verify($password, $db_password)) {

        if($db_res['status']==1){
            $_SESSION['user_id'] = $db_res['id'];
            echo json_encode('login');
        }
        else{
            $error = [
            'am' => "Ձեր էջը արգելափակված է ադմինիստրացիայի կողմից",
            'ru' => "Ваша страница заблокирована администрацией",
            'en' => "Your page has been blocked by the administration"
            ];
            echo json_encode($error);
        }
        
    } else {

        $error = [
            'am' => "Սխալ օգտագործողի անուն և (կամ) գաղտնաբառ",
            'ru' => "Неверное имя пользователя и / или пароль!",
            'en' => "Incorrect username and/or password!"


        ];
        echo json_encode($error);

    }


} else {

    $error = [
        'am' => "Սխալ օգտագործողի անուն և (կամ) գաղտնաբառ",
        'ru' => "Неверное имя пользователя и / или пароль!",
        'en' => "Incorrect username and/or password!"


    ];
    echo json_encode($error);

}

$con->close();

?>