<?php
session_start();
include "config/dbconfig.php";
include "lang_config.php";

if (isset($_POST['article_id'])) {
    $article_id = $_POST['article_id'];
    $article_type = $_POST['article_type'];
    $lang_dir = $_POST['lang'];
    $article_table = $article_type . '_articles_' . $lang_dir;
    $_SESSION['article_id'] = $article_id;
    $_SESSION['article_type'] = $article_type;
    $sql = "SELECT * FROM $article_table WHERE article_id='$article_id'";
    $result = $con->query($sql);
    if ($result->num_rows == 1) {

        $s_art = $result->fetch_assoc();
        $db_art_id = $s_art['article_id'];
        if ($s_art['number_of_views'] != null) {

            $num = (int)$s_art['number_of_views'];
            $num_views = $num + 1;
            $sql_update = "UPDATE $article_table SET number_of_views = $num_views WHERE article_id='$db_art_id'";

        } else {

            $sql_update = "UPDATE $article_table SET number_of_views = 1 WHERE article_id='$db_art_id'";

        }
        if ($con->query($sql_update) === TRUE) {
            $con->close();
        } else {
            echo "Error updating record: " . $con->error;
            $con->close();
        }

    }


}


?>