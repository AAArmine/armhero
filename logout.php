<?php
$url_array = explode('/', $_SERVER['REQUEST_URI']);
$lang_dir = $url_array[2];

session_start();

session_destroy();
if ($lang_dir == 'am') {

    header('location:am/home.php');

} elseif ($lang_dir == 'ru') {

    header('location:ru/home.php');

} else {
    header('location:en/home.php');

}


?>
