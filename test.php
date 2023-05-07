<?php
include "config/dbconfig.php";
$views = mysqli_query($con, "SELECT number_of_views FROM autobiography_articles_am where id = 54 ");

// echo $sel_art_id;
if (mysqli_num_rows($views))
    $row = mysqli_fetch_assoc($views);
var_dump($row);
echo 'test';
