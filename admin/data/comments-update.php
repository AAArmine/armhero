<?php
include "../../config/dbconfig.php"; 
$sql_del=mysqli_query($con, "UPDATE ".$_POST['artCategory']."_comments SET status='1' where id=".$_POST['commentId']." ");
if($sql_del){
    echo 'Success';
}
?>