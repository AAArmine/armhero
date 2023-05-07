<?php
$categories_array=array('autobiography' => 'Կեսագրություն', 'history' => 'Հոդված');
if(isset($_POST['sel-categories'])){
		
		$_SESSION['categories_article']=$_POST['sel-categories'];
		echo $_SESSION['categories_article'];
		if(isset($_SESSION['categories_article'])){
			foreach ($categories_array as $key => $value) {
				if($_SESSION['categories_article']==$key){
                   echo "<option value='$key' name='aa' selected>$value</option>";
				}
				else{
					echo "<option value='$key' name='aa'>$value</option>";
				}
			}
		}
}
else{
	if(isset($_SESSION['categories_article'])){
			foreach ($categories_array as $key => $value) {
				if($_SESSION['categories_article']==$key){
                   echo "<option value='$key' name='aa' selected>$value</option>";
				}
				else{
					echo "<option value='$key' name='aa'>$value</option>";
				}
			}
		}
		else{
            echo "<option value='autobiography' name='aa'>Կենսագրական հոդվածներ</option>
		          <option value='history' name='aa'>Պատմություն</option>";		
		}
}
?>