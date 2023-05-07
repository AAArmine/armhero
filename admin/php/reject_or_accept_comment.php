<?php
  if(!empty($_POST['type'])){
    require_once "../classes/DB.class.php";
	$categories=$_POST['categories'];
	$row_id=$_POST['row_id'];
	$type=$_POST['type'];
	$db=new DB();
    $db->tblName=$categories."_comments ";
	if($type=='accept'){
		$status=1;
	    $data=array('status' => $status);
		$res_text='ընդունված';
	}
	else{
		$status=2;
		$p=$_POST['p'];
	    $data=array('status' => $status,
	                 'p' => $p);
		$res_text='մերժված';
	}
	$conditions=array('id' => $row_id);
	$res=$db->update($data, $conditions);
	if($res){
		echo "<span class='text-success'>Փոփոխությունը ".$res_text." է </span>";
	}
	else{
		echo "<span class='text-danger'>Error</span>";
	}
  }
?>