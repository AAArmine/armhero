<?php
include "config/dbconfig.php";


$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$hash_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (fullname, fullname_am, fullname_en, fullname_ru, email, password, phone)VALUES ('$name', '$name', '$name', '$name', '$email', '$hash_password', '$phone')";


if ($con->query($sql) === TRUE) {


    echo json_encode("true");

} else {

    echo "Error: " . $sql . "<br>" . $con->error;
}
$con->close();



