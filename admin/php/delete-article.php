<?php
require_once "../classes/DB.class.php";
include "../../config/dbconfig.php";
use \PHPMailer\PHPMailer\PHPMailer;

require_once '../../phpmailer/Exception.php';
require_once '../../phpmailer/PHPMailer.php';
require_once '../../phpmailer/SMTP.php';

$db=new DB();
$message='';
if(!empty($_POST['article_id']) && !empty($_POST['reason_id'])){
    $article_id=$_POST['article_id'];
	$categories=$_POST['categories'];
	$tbl_name=$categories.'_articles_default';


	$tbl_name_am=$categories.'_articles_am';
	$tbl_name_en=$categories.'_articles_en';
	$tbl_name_ru=$categories.'_articles_ru';


    $sql_del_article_am=mysqli_query($con,"DELETE FROM ".$tbl_name_am." WHERE article_id = ".$article_id."" );  
    $sql_del_article_en=mysqli_query($con,"DELETE FROM ".$tbl_name_en." WHERE article_id = ".$article_id."" );  
    $sql_del_article_ru=mysqli_query($con,"DELETE FROM ".$tbl_name_ru." WHERE article_id = ".$article_id."" );  
   
 // ------------send message usere about deleted article----------------
 $email=$_POST['email'];
 $reason_id=$_POST['reason_id'];
 $text=''; 
 // $con_article=array('article_id' => $article_id);
 // $res_article_default_name=$db->checkRow($categories.'_articles_default', $con_article);
 if($categories=='hitsory'){
     $article_name='title';
 }
 else{
     $article_name='name';
 }
 $res_article_name=$db->checkRowNameInAllTables($article_name, $categories, $article_id);
 if($res_article_name){
     $row_article_name=mysqli_fetch_assoc($res_article_name);
     $article_name_am=$row_article_name['name_am'];
     $article_name_ru=$row_article_name['name_ru'];
     $article_name_en=$row_article_name['name_en'];
 }
 else{
    $article_name_am='';
    $article_name_ru='';
    $article_name_en='';
 }
 $condition=array('id' => $reason_id);
 $res_reason=$db->checkRow('reasons_reject_article', $condition);
 if($res_reason){
     $row_reason=mysqli_fetch_assoc($res_reason);
     $text="<p>".$article_name_am."--".$row_reason['reason_am']."</p><p></p>
            <p>".$article_name_ru."--".$row_reason['reason_ru']."</p><p></p>
            <p>".$article_name_en."--".$row_reason['reason_en']."</p>";
 }
 $mail = new PHPMailer(true);
 $mail->CharSet = "UTF-8";
 // ----------------------------------------------------------------------------



 // $article_id=$_POST['checked_ids'];
 
 
 $db->tblName=$tbl_name;
 $conditions=$article_id;
 $conditions_article=array('article_id' => $article_id);
 $check_article_status=$db->checkRow_result($conditions_article);

 if($check_article_status){
     $row_article_default=mysqli_fetch_assoc($check_article_status);
     $default_article_status=$row_article_default['article_status'];
     $res=$db->delete('article_id', $conditions);
     delArticleOtherTables($db, $categories.'_images', $conditions_article, $conditions);
     delArticleOtherTables($db, $categories.'_external_links', $conditions_article, $conditions);
     delArticleOtherTables($db, $categories.'_internal_links', $conditions_article, $conditions);

     if($res){
     delDir($conditions, "../../".$categories."-articles-images");
     // ------send message------------
         try {
             $mail->isSMTP();
             $mail->Host = 'smtp.gmail.com';
             $mail->SMTPAuth = true;
             $mail->Username = 'Armheroes.am@gmail.com'; // Gmail address which you want to use as SMTP server
             $mail->Password = 'kttoeqezscynephh'; // Gmail address Password
             $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
             $mail->Port = '587';
             
             $mail->setFrom('Armheroes.am@gmail.com'); // Gmail address which you used as SMTP server
             $mail->addAddress($email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
             $mail->isHTML(true);
             $mail->Subject = 'ARMHERO';
             $mail->Body = "<div> $text </div>";

             $send=$mail->send();
             if($send){
                     $message=1;
             }
         } catch (Exception $e) {
             $result = $e->getMessage();
         }
     }
     else{
     $message='<span class="text-danger">Error</span>';
     }
 }
 if($default_article_status!=0){
    delArticleOtherTables($db, $categories.'_articles_am', $conditions_article, $conditions);
    delArticleOtherTables($db, $categories.'_articles_en', $conditions_article, $conditions);
    delArticleOtherTables($db, $categories.'_articles_ru', $conditions_article, $conditions);
 }
}
else{
 $message='<span class="text-danger">Error1</span>';
}
echo $message;

// ---------------delete images folder and images-------------------------------

function delDir($conditions, $dir) {
                      
 $files = scandir($dir);
 $files=array_slice($files, 2);
 foreach ($files as $file) {
     $new_files = scandir($dir.'/'.$file);
     $new_files=array_slice($new_files, 2);
     // foreach ($conditions as $key => $value) {
         if($file==$conditions){
             foreach ($new_files as $new_file) {
                     unlink($dir.'/'.$file.'/'.$new_file);
             }
         rmdir($dir.'/'.$file);
         }
     // }
 }
}


function delArticleOtherTables($db, $table_name, $conditions_article, $conditions){
 $db->tblName=$table_name;
 $check_article_id=$db->checkRow_result($conditions_article);
    if($check_article_id){
       $res=$db->delete('article_id', $conditions);
    }
}
?>
