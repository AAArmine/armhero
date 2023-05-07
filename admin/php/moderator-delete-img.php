<?php
 require_once "../classes/DB.class.php";
  $message='';

  if(isset($_POST['categories'])){

  	$categories=$_POST['categories'];
  	$article_id=$_POST['article_id'];
  	$img_id=$_POST['img_id'];
    $db=new DB();
  	$db->tblName=$categories."_images";
  	
    $conditions=array('id' => $img_id);
  	$res_img=$db->checkRow_result($conditions);
  	if($res_img){
  		$res_row=mysqli_fetch_assoc($res_img);
  	}
  	$image = $res_row['image'];
  	$res=$db->delete('id', $img_id);
  	if($res){
    	$message='<span class="text-success">Ջնջման գործողությունը կատարված է</span>';
  		delDir($article_id, $image, "../../".$categories."-articles-images");
  	}
  	else{
	$message='<span class="text-danger">Error</span>';
    }
  }
  // ---------------delete image-------------------------------

function delDir($article_id, $image, $dir) {
                         
    $files = scandir($dir);
    $files=array_slice($files, 2);

    foreach ($files as $file) {
    	if($file==$article_id){
    		$new_files = scandir($dir.'/'.$file);
            $new_files=array_slice($new_files, 2);

            foreach ($new_files as $key => $value) {
            	if($value==$image){
            		unlink($dir.'/'.$file.'/'.$value);
            	}
            }
    	}
    }
}


// --------------------------change_main---------------------------
$allowed_extension = array('jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG');

if(!empty($_FILES['change_main']['tmp_name'])){

	$categories=$_POST['categories_article'];
	$article_id=$_POST['article_id'];
	$img_id=$_POST['img_id'];

    $db=new DB();
    $db->tblName=$categories.'_images';
    $conditions=array('id' => $img_id);
  	$res_img=$db->checkRow_result($conditions);
  	if($res_img){
  		$res_row=mysqli_fetch_assoc($res_img);
      $image = $res_row['image'];
  		delDir($article_id, $image, "../../".$categories."-articles-images");
      echo '<span class="text-success">Նկարը փոփոխված է</span>';
  	
        $file_name=$_FILES["change_main"]["name"]; 
        $file_tmp=$_FILES["change_main"]["tmp_name"];
        $file_format=explode(".", $file_name);
        $file_extantion=end($file_format);
            if(in_array($file_extantion, $allowed_extension)){
                $file_newname = $image; 
                $file_folder="../../$categories-articles-images/$article_id/$file_newname";
            }
              
            move_uploaded_file($file_tmp, $file_folder);
    }
    else{
      echo '<span class="text-danger">Սխալ կա</span>';
    }
}
?>