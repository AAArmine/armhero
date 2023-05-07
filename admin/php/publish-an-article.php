<?php
session_start();
require_once "../classes/DB.class.php";
$db=new DB();
$message='';
if(!empty($_SESSION['categories_article'])){
     $categories=$_SESSION['categories_article'];
}
else{
	$categories='autobiography';
}

if(isset($_POST['article_id'])){
	$article_id=$_POST['article_id'];
	$type=$_POST['type'];
	if($type=='active'){
		$status=1;
		$status_default_tbl=2;
	}
	else{
		$status=0;
		$status_default_tbl=1;
	}
	$currentDateTime = date('Y-m-d H:i:s');
	$res=$db->updatePublicationStatusAllTables($categories, $currentDateTime, $article_id, $status, $status_default_tbl);
	if($res){
		if($status==1){
		    $message='<span class="text-success">Հոդվածը հրապարակված է</span>';
		}
		else{
		   $message='<span class="text-success">Հոդվածը ապահրապարակված է</span>';
		}
	}
	else{
		if($status==1){
		    $message='<span class="text-danger">Հոդվածը Չհրապարակվեց</span>';
		}
		else{
			$message='<span class="text-danger">Հոդվածը Չապահրապարակվեց</span>';
		}
	}
 echo $message;
}
?>