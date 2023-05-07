<?php
include "../../config/dbconfig.php"; 
$sql_del=mysqli_query($con, "DELETE from ".$_POST['artCategory']."_comments where id=".$_POST['commentId']." ");
if($sql_del){
    echo 'Success';
}
?>