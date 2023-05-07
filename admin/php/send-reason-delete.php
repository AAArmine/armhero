<?php
$message='';
use \PHPMailer\PHPMailer\PHPMailer;

require_once '../../phpmailer/Exception.php';
require_once '../../phpmailer/PHPMailer.php';
require_once '../../phpmailer/SMTP.php';

require_once "../classes/DB.class.php";

if(!empty($_POST['reason_id'])){
 	$reason_id=$_POST['reason_id'];
 	$email=$_POST['email'];
    $categories=$_POST['categories'];
    $comment_id=$_POST['row_id'];
    $article_id=$_POST['article_id'];
    $comment_text=$_POST['comment_text'];
    $conditions=$_POST['checked_ids'];
    $text='';     
    $db=new DB();
    // ----------get article name or title---(am en ru)-------------------------
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


    $condition=array('id' => $reason_id);
    $res_reason=$db->checkRow('reasons_reject', $condition);
    if($res_reason){
        $row_reason=mysqli_fetch_assoc($res_reason);
        $text="<p>".$article_name_am."--".$row_reason['reason_am']."</p><p></p>
               <p>".$article_name_ru."--".$row_reason['reason_ru']."</p><p></p>
               <p>".$article_name_en."--".$row_reason['reason_en']."</p>";
    }
    

    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";
    
    
    // -------delete comment----------------------------
    $db->tblName=$categories."_comments";
    $res_delete=$db->delete('id', $conditions);
    
    // $db->tblName=$categories."_comments";
    // $comment_data=array('status' => 2);
    // $comment_condition=array('id' => $comment_id);
    // $update_comment=$db->update($comment_data, $comment_condition);

if ($email !== '' && $res_delete) {
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

        $res=$mail->send();
        if($res){
                $message=1;
        }
    } catch (Exception $e) {
        $result = $e->getMessage();
    }
 }
}
else{
    $message=0;
}
echo $message;
?>