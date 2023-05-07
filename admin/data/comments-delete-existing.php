<?php
include "../../config/dbconfig.php"; 
if(isset($_POST['commentIdAuth'])){
    $sql_del=mysqli_query($con, "DELETE from autobiography_comments where id=".$_POST['commentIdAuth']." ");

}
if(isset($_POST['commentIdHis'])){
    $sql_del=mysqli_query($con, "DELETE from history_comments where id=".$_POST['commentIdHis']." ");

}

?>