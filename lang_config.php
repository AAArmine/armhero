<?php

$url_array = explode('/', $_SERVER['REQUEST_URI']);
$lang_dir = "";
$currren_uri = "";
$array_langs = ['en', 'ru', 'am'];
for ($i = 0; $i < count($array_langs); $i++) {

    $is_lang = array_search($array_langs[$i], $url_array);
    if ($is_lang != false) {
        $lang_dir = $url_array[$is_lang];
        $currren_uri = $url_array[$is_lang + 1];
    }
}
?>
