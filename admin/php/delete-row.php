<?php

include "../../config/dbconfig.php";
$message='';
if(!empty($_POST['checked_ids'])){
    // $tbl_categories=$_POST['tbl_categories'];
    // $db->tblName=$tbl_name;
    // $tbl_name=$_POST['tbl_name'];
    $moder_id=$_POST['checked_ids'];
    $arraydata = implode(',',$moder_id);
    $sql = "DELETE FROM `admin` WHERE id = $arraydata";
        // var_dump($moder_id);
        // var_dump($con->query($sql) );
        // $res=$db->insert($data);
        // var_dump($db->insert($data));
        if($con->query($sql) === TRUE){
            $message='<span class="text-success">Ջնջման գործողությունը կատարված է</span>';
        }
        else{
            $message='<span class="text-danger">Error</span>';
        }
    // ---------------delete images folder and images-------------------------------
}

?>