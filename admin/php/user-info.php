<?php
require_once "../classes/DB.class.php";
$db=new DB();
$db->tblName='users';
  if(isset($_POST['name_am'])){
  	$name_am=$_POST['name_am'];
  	$name_ru=$_POST['name_ru'];
  	$name_en=$_POST['name_en'];
  	$user_id=$_POST['user_id'];
    $data=array('fullname_am' => $name_am,
    	        'fullname_ru' => $name_ru,
    	        'fullname_en' => $name_en,
                );
    $conditions=array('id' => $user_id);

    $updt=$db->update($data, $conditions);
    if($updt){
    	echo true;
    }
    else{
    	echo false;
    }
  }
  else{
  	echo 'no';
  }
?>