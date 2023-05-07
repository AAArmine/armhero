<?php
require_once "../classes/DB.class.php";
$db=new DB();
$message='';
if(!empty($_POST['checked_ids'])){
	$tbl_categories=$_POST['tbl_categories'];
	$tbl_name=$tbl_categories."_comments";

	$db->tblName=$tbl_name;
	$conditions=$_POST['checked_ids'];
	$res=$db->delete('id', $conditions);
    if($res){
    	$message='<span class="text-success">Ջնջման գործողությունը կատարված է</span>';
    }
    else{
	$message='<span class="text-danger">Error</span>';
    }
}
else{
	$message='<span class="text-danger">Error1</span>';
}
echo $message;

?>
