<?php
session_start();
use \PHPMailer\PHPMailer\PHPMailer;

require_once '../../phpmailer/Exception.php';
require_once '../../phpmailer/PHPMailer.php';
require_once '../../phpmailer/SMTP.php';

require_once "../classes/DB.class.php";
$db=new DB();
$message='';

if(isset($_POST['user_id'])){
	$user_id=$_POST['user_id'];
	$type=$_POST['type'];
 	$email=$_POST['email'];
 	$reason_id='';
	if($type=='active'){
		$reason_id='id';
		$status=1;
		$text='text for user activeted';
	}
	else{
		$status=0;
		if(!empty($_POST['reason_id'])){
			$reason_id=$_POST['reason_id'];
	        $condition=array('id' => $reason_id);
	        $res_reason=$db->checkRow('reasons_block_user', $condition);

			if($res_reason){
	        $row_reason=mysqli_fetch_assoc($res_reason);
	        $text="<p>".$row_reason['reason_am']."</p><p></p>
	               <p>".$row_reason['reason_ru']."</p><p></p>
	               <p>".$row_reason['reason_en']."</p>";
	        }
		}
		else{
			$message='<span class="text-danger">Ընտրել պատճառը 111</span>';
		}
	}

  if(!empty($reason_id)){

	$data = array('status' => $status );
	$conditions = array('id' =>$user_id);
	$db->tblName='users';
	$res=$db->update($data, $conditions);
	if($res){

    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";
    
    if ($email !== '') {
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
	                if($status==1){
		                $message='<span class="text-success">Օգտատերը ապաարգելափակված է</span>';
					}
					else{
					   $message='<span class="text-success">Օգտատերը արգելափակված է</span>';
					}
	        }
	    } catch (Exception $e) {
	        $result = $e->getMessage();
	    }

    }
  }
  else{
	 $message='<span class="text-danger">Սխալ</span>';
  }
}else{
	$message='<span class="text-danger">Ընտրել պատճառը</span>';
}
	
 echo $message;
}
?>