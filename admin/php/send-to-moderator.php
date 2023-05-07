<?php
require_once "../classes/DB.class.php";
$db=new DB();
$message='';
if(!empty($_POST['tbl_name'])){
	$tbl_categories=$_POST['tbl_categories'];
	$tbl_name=$_POST['tbl_name'];
	$moderator_id=$_POST['moderator_id'];
	// $article_id=$_POST['checked_ids'];
	$db->tblName=$tbl_name;
	$checked_mod_ids=$_POST['checked_mod_ids'];
	$conditions=array('article_id' =>  $checked_mod_ids);
	$data=array('article_status' => 1,
                'moderator_id' => $moderator_id);
	$updt=$db->update($data, $conditions);
	if($updt){
		echo 'ok';
	}
	else{
		echo 'no';
	}

}
?>