<?php
session_start();
if (!empty($_POST['lng'])) {
    $lang = $_POST['lng'];
    $_SESSION['lang'] = $lang;
}

