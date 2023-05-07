<?php
include "config/dbconfig.php";
echo $_POST['name_am']. ", " .$_POST['name_en']. ", " .$_POST['name_ru'] . ", " .$_POST['user_id'];

$sql="UPDATE users SET fullname_am='".$_POST['name_am']."', fullname_en='".$_POST['name_en']."', fullname_ru='".$_POST['name_ru']."' WHERE id=".$_POST['user_id']."";
$result_user = mysqli_query($con, $sql);
if($result_user){
    echo 'ok';
}
?>