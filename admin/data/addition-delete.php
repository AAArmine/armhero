<?php
include "../../config/dbconfig.php";
if(!empty($_POST['additionId'])){
    $addition_id=$_POST['additionId'];
	$categories=$_POST['artCategory'];
	$table=$categories.'_edited_articles_by_users';
    $sql="DELETE FROM `$table` WHERE id = $addition_id" ;  
    $sql_all_result=mysqli_query($con, $sql);
}


?>