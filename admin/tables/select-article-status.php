<?php
$status_array=array('0' => 'Նոր', '1' => 'Հաստատված');
if(isset($_POST['sel-article-status'])){
		
		$_SESSION['status_article']=$_POST['sel-article-status'];
		// echo $_SESSION['categories_article'];
		if(isset($_SESSION['status_article'])){
			foreach ($status_array as $key => $value) {
				if($_SESSION['status_article']==$key){
                   echo "<option value='$key' name='aa' selected>$value</option>";
				}
				else{
					echo "<option value='$key' name='aa'>$value</option>";
				}
			}
		}
}
else{
	if(isset($_SESSION['status_article'])){
			foreach ($status_array as $key => $value) {
				if($_SESSION['status_article']==$key){
                   echo "<option value='$key' name='aa' selected>$value</option>";
				}
				else{
					echo "<option value='$key' name='aa'>$value</option>";
				}
			}
		}
		else{
            echo "<option value='0' name='aa'>Նոր</option>
		          <option value='1' name='aa'>Հաստատված</option>";		
		}
}
?>