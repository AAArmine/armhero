<?php
require_once "../classes/DB.class.php";
    $db=new DB();
           
    if(!empty($_POST['page_type'])){
    	$page_type=$_POST['page_type'];
	    $res_reason=$db->all_rows("reasons_reject_$page_type");
	    if ($res_reason) {
            while ($row_reason = mysqli_fetch_assoc($res_reason)) {
                echo "<div>
                          <input type='radio' name='radio' class='select-reason' data-reason-id='$row_reason[id]'>
                          <label> $row_reason[reason_am] </label>
                      </div>";
            }
        }
    }
?>