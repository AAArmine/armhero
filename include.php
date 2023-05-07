<?php

$lang = 'en/';
$lang_menu = 'en';
$f = '';
$link_array = array('am', 'ru', 'en');
$url = $_SERVER['REQUEST_URI'];
$url = explode('/', $url);
$folder_name = $url[2];
$lng_folder = '';

$file_name = '';
if (isset($url[3])) {
    $file_name = $url[3];
} else {
    $file_name = '';
}
foreach ($link_array as $value) {
    if ($value == $folder_name) {
        $lang = '';
        $lang_menu = $value;
        $lng_folder = '../';
        $f = '../';
        break;
    } else {
        $lng_folder = '';
        $lang = 'en/';
    }
}

$arr_lang = array('en', 'am', 'ru');
