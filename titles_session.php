<?php
session_start();

if (isset($_POST['title'])) {

    $_SESSION['a_title'] = $_POST['title'];
    echo json_encode($_POST['title']);
} else {

    echo json_encode('Error title id');

}

?>

