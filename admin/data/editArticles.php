<?php
include "../../config/dbconfig.php";

$con = mysqli_connect($host, $username, $password, $database);
if (!$con) {
    die('error_get_last()' . mysqli_error());

} else {
    mysqli_query($con, "SET NAMES 'utf8'");
//    echo "Ok";
}
// echo $_POST['categories_article'];
// echo $_POST['article_id'];
// echo $_POST['img_id'];
// echo $_FILES['change_main']['name'];
if(isset($_POST['img_id']) ){
$sql_unlink_img  = mysqli_query($con, "SELECT * FROM ".$_POST['categories_article']."_images WHERE article_id='" . $_POST['article_id'] . "' and main=1");
    $row = mysqli_fetch_assoc($sql_unlink_img);
    // delete image
    $path = "../../".$_POST['categories_article']."-articles-images/".$_POST['article_id']."/" . $row['image'];
    unlink($path);
$sql_delete = mysqli_query($con, "DELETE FROM ".$_POST['categories_article']."_images WHERE article_id='" . $_POST['article_id'] . "' and main=1");

$newvalue = explode('.', $_FILES['change_main']['name']);

$newname = $_POST['article_id']. "." . end($newvalue);
$newDestination = "../../".$_POST['categories_article']."-articles-images/".$_POST['article_id']."/" . $newname;
move_uploaded_file($_FILES['change_main']['tmp_name'], $newDestination);

$sql_insert_image = mysqli_query($con, "INSERT INTO ".$_POST['categories_article']."_images (user_id, article_id, image, main) VALUES (".$row['user_id'].", ".$row['article_id'].", '" . $newname . "', 1)");
}

// delete external links
if(isset($_POST['id_external_link'])){

$sql_delete_link=mysqli_query($con, "DELETE FROM ".$_POST['category_article']."_external_links WHERE id='" . $_POST['id_external_link'] . "'");
}

// delete internal links
if(isset($_POST['id_external_link'])){

$sql_delete_link=mysqli_query($con, "DELETE FROM ".$_POST['category_article']."_external_links WHERE id='" . $_POST['id_external_link'] . "'");
}

// delete internal links
if(isset($_POST['id_internal_link'])){
    $sql_delete_link=mysqli_query($con, "DELETE FROM ".$_POST['category_article']."_internal_links WHERE id='" . $_POST['id_internal_link'] . "'");
    }


// save changes in arm
if(isset($_POST['auth_name_am'])){
    $date = $_POST['date_of_birth_am'];
    $newDate = date("Y-m-d", strtotime($date));
    $sql_update_am=mysqli_query($con, "UPDATE ".$_POST['category_article']."_articles_am SET 
    name='".$_POST['auth_name_am']."', 
    nik_name='".$_POST['nik_name_am']."', 
    birth_day='".$newDate."', 
    place_of_birth= '".$_POST['place_of_birth_am']."',
    description='".$_POST['content_am']."'
    WHERE article_id='".$_POST['art_id']."'");
};

if(isset($_POST['article_title_am'])){

    $sql_update_am=mysqli_query($con, "UPDATE ".$_POST['category_article']."_articles_am SET 
    title='".$_POST['article_title_am']."', 
    description='".$_POST['content_am']."' 
    WHERE article_id='".$_POST['art_id']."'");
}

// save changes in ru
if(isset($_POST['auth_name_ru'])){
    $date = $_POST['date_of_birth_ru'];
    $newDate = date("Y-m-d", strtotime($date));
    $sql_update_ru=mysqli_query($con, "UPDATE ".$_POST['category_article']."_articles_ru SET 
    name='".$_POST['auth_name_ru']."', 
    nik_name='".$_POST['nik_name_ru']."', 
    description='".$_POST['content_ru']."', 
    birth_day='".$newDate."', 
    place_of_birth= '".$_POST['place_of_birth_ru']."',
    description='".$_POST['content_ru']."'
    WHERE article_id='".$_POST['art_id']."'");
};
if(isset($_POST['article_title_ru'])){

    $sql_update_ru=mysqli_query($con, "UPDATE ".$_POST['category_article']."_articles_ru SET 
    title='".$_POST['article_title_ru']."', 
    description='".$_POST['content_ru']."' 
    WHERE article_id='".$_POST['art_id']."'");
}

// save changes in en
if(isset($_POST['auth_name_en'])){
    $date = $_POST['date_of_birth_en'];
    $newDate = date("Y-m-d", strtotime($date));
    $sql_update_en=mysqli_query($con, "UPDATE ".$_POST['category_article']."_articles_en SET 
    name='".$_POST['auth_name_en']."', 
    nik_name='".$_POST['nik_name_en']."', 
    description='".$_POST['content_en']."', 
    birth_day='".$newDate."', 
    place_of_birth= '".$_POST['place_of_birth_en']."',
    description='".$_POST['content_en']."'
    WHERE article_id='".$_POST['art_id']."'");
};
if(isset($_POST['article_title_en'])){
    $sql_update_en=mysqli_query($con, "UPDATE ".$_POST['category_article']."_articles_en SET 
    title='".$_POST['article_title_en']."', 
    description='".$_POST['content_en']."' 
    WHERE article_id='".$_POST['art_id']."'");
}


// confirm article
if(isset($_POST['articleId'])){
    $sql_update_default=mysqli_query($con, "UPDATE ".$_POST['change_status_category']."_articles_default SET 
    article_status='1' WHERE article_id='".$_POST['articleId']."'");
    $sql_update_am=mysqli_query($con, "UPDATE ".$_POST['change_status_category']."_articles_am SET 
    article_status='1' WHERE article_id='".$_POST['articleId']."'");
    $sql_update_ru=mysqli_query($con, "UPDATE ".$_POST['change_status_category']."_articles_ru SET 
    article_status='1' WHERE article_id='".$_POST['articleId']."'");
    $sql_update_en=mysqli_query($con, "UPDATE ".$_POST['change_status_category']."_articles_en SET 
    article_status='1' WHERE article_id='".$_POST['articleId']."'");
}

?>