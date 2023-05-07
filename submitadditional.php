<?php

session_start();

include "config/dbconfig.php";


$result = '';

$additional = isset($_POST['textAdditional']) ? $_POST['textAdditional'] : '';

if ($additional !== '') {
    if (isset($_SESSION['user_id'])) {

        $art_type = $_POST['art_type'];
        $art_id = $_POST['art_id'];
        $user_id = $_SESSION['user_id'];
        $additional_table_name = $art_type . "_edited_articles_by_users";

        $sql = "INSERT INTO $additional_table_name (user_id,article_id,description,article_status)VALUES ('$user_id','$art_id','$additional',0)";
        if ($con->query($sql) === TRUE) {


            $result = 'true';
            echo json_encode($result);
        } else {

            echo json_encode($con->error);
            exit();
        }

    }
}


?>