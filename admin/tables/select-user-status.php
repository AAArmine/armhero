<?php
$status_array=array('1' => 'Ակտիվ', '0' => 'Արգելափակված');
if(isset($_POST['select-user-status'])){
		
		$_SESSION['status_user']=$_POST['select-user-status'];
		if(isset($_SESSION['status_user'])){
			foreach ($status_array as $key => $value) {
				if($_SESSION['status_user']==$key){
                   echo "<option value='$key' name='aa' selected>$value</option>";
				}
				else{
					echo "<option value='$key' name='aa'>$value</option>";
				}
			}
		}
}
else{
	if(isset($_SESSION['status_user'])){
			foreach ($status_array as $key => $value) {
				if($_SESSION['status_user']==$key){
                   echo "<option value='$key' name='aa' selected>$value</option>";
				}
				else{
					echo "<option value='$key' name='aa'>$value</option>";
				}
			}
		}
		else{
            echo "<option value='1' name='aa'>Ակտիվ</option>
                  <option value='0' name='aa'>Արգելափակված</option>               
		          ";		
		}
}
?>
