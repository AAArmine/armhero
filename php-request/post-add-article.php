<?php
session_start();
// ==========add article  git push --set-upstream origin NH_12.04===============
if (isset($_POST['tblname'])) {

    $tblname = $_POST['tblname'];
    if($tblname=='history'){
        require_once "../admin/classes/DB.class.php";
    }
    if($tblname=='autobiography'){
        require_once "../admin/classes/DB.class1.php";
    }
    $db = new DB();
    $db->tblName = $tblname . '_articles_default';

    $user_id=$_SESSION['user_id'];
    $name_nik;
    $title;
    $place_of_birth;
    $birth_day;
    $internal_link_name;
    $external_link_name;
    $images_array;
    $uploaded_main_image;

    $description = $_POST['description'];
    $lng = $_POST['lng'];

    if ($tblname == 'history') {
        $title = $_POST['title'];
    } else {
        $title = '';
        $name = $_POST['name_hero'];
        $nik_name = $_POST['name_nik'];
        $place_of_birth = $_POST['place_of_birth'];
        $birth_day = $_POST['birth_day'];
    }
    // // ---------------main image------------------------
    $allowed_extension = array('jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG');

    $img = $_FILES['img']['name'];
    $tmp = $_FILES['img']['tmp_name'];
    $type = $_FILES['img']['type'];
    $format = explode(".", $img);
    $extantion = end($format);
    $folder = '';
    $article_id = time();
    $target_Path = "../$tblname-articles-images/$article_id/";
    if (is_dir($target_Path)) {
        $target_p = $target_Path;
    } else {
        mkdir("../$tblname-articles-images/$article_id/", 0771);
        // $target_Path="game_screen/$today/";
        $target_p = $target_Path;
    }
    if (in_array($extantion, $allowed_extension)) {
        $newname = time() . "." . $extantion;
        $folder = $target_p . $newname;
    }
    if ($tblname == 'history') {
        $data_article = array('user_id' => $user_id,
            'article_id' => $article_id,
            'title' => $title,
            'description' => $description,
        );
    } else {
        $data_article = array('user_id' => $user_id,
            'article_id' => $article_id,
            'name' => $name,
            'nik_name' => $nik_name,
            'birth_day' => $birth_day,
            'place_of_birth' => $place_of_birth,
            'description' => $description,
        );
    }

    $ins_article = $db->insert($data_article);
    if ($ins_article) {
        $db->tblName = $tblname . '_images';
        move_uploaded_file($tmp, $folder);
        $data_main_image = array('user_id' => $user_id,
            'article_id' => $article_id,
            'image' => $newname,
            'main' => 1
        );
        $ins_main_image = $db->insert($data_main_image);
    }
    // -------------------uploads images array---------------------------------
    if (isset($_FILES["file"]["tmp_name"])) {
        $db->tblName = $tblname . '_images';
        $images_array = $_FILES["file"]["tmp_name"];
        foreach ($images_array as $key => $value) {
            $file_name = $_FILES["file"]["name"][$key];
            $file_tmp = $_FILES["file"]["tmp_name"][$key];
            $file_format = explode(".", $file_name);
            $file_extantion = end($file_format);
            if (in_array($file_extantion, $allowed_extension)) {
                $file_newname = sha1(rand(1000, 100000)) . "." . $file_extantion;
                $file_folder = $target_p . $file_newname;
            }
            $data_images_array = array('user_id' => $user_id,
                'article_id' => $article_id,
                'image' => $file_newname,
                'main' => 0
            );

            $ins_images_array = $db->insert($data_images_array);
            if ($ins_images_array) {
                move_uploaded_file($file_tmp, $file_folder);
            }
        }
    }

    // -----------add external links in external_links table---------------------
    $external_link_name = $_POST['external'];
    $data_external_link = '';
    foreach ($external_link_name as $key => $value) {
        $db->tblName = $tblname . '_external_links';
        if ($value['name'] != '' && $value['link'] != '') {
            $data_external_link = array('article_id' => $article_id,
                'name' => $value['name'],
                'link' => $value['link']);
            $insert_ext_link = $db->insert($data_external_link);
            if ($insert_ext_link) {
            }
        }
    }

    // -----------add einternal links in internal_links table---------------------
    $internal_link_name = $_POST['internal'];
    $data_internal_link = '';
    foreach ($internal_link_name as $key => $value) {
        $db->tblName = $tblname . '_internal_links';
        if ($value['name'] != '' && $value['link'] != '') {
            $data_external_link = array('article_id' => $article_id,
                'name' => $value['name'],
                'link' => $value['link']);
            $insert_ext_link = $db->insert($data_external_link);
            if ($insert_ext_link) {
            }
        }
    }
    if ($ins_main_image) {
        echo $lng;
    }

} else {
    echo 'no';
}
?>