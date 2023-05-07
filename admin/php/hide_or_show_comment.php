<?php
  if(!empty($_POST['type'])){
    require_once "../classes/DB.class.php";
	$categories=$_POST['categories'];
	$conditions=$_POST['checked_ids'];
	$type=$_POST['type'];
	$db=new DB();
    $db->tblName=$categories."_comments ";
	if($type=='show'){
		$status=1;
		$res_text='ընդունված';
	}
	else{
		$status=0;
		$res_text='թաքցված';
	}
	$data=array('status' => $status);
	$conditions=array('id' => $_POST['checked_ids']);
	$res=$db->update($data, $conditions);
	if($res){
		echo "<span class='text-success'>Մեկնաբանությունը ".$res_text." է </span>";
	}
	else{
		echo "<span class='text-danger'>Error</span>";
	}
  }
?>