<?php
session_start();
// if(isset($_POST['add-desc'])){
if(!empty($_POST['article_name']) && !empty($_POST['content'])){
    require_once "../classes/DB.class.php";
	$categories=$_POST['article_categories'];
	$article_id=$_POST['art_id'];
	$article_lng=$_POST['article_lng'];
	$user_id=$_POST['art_user_id'];
	$moderator_id=$_SESSION['moderator_id'];
	$db=new DB();
	$db->tblName=$categories."_".$article_lng;

	$title; $nik_name; $place_of_birth; $birth_day; $description;
	if($categories!='history'){
		$nik_name=$_POST['nik_name'];
		$place_of_birth=$_POST['place_of_birth'];

	}
	$event_date=$_POST['date_of_birth'];
	$description=$_POST['content'];
	$title=$_POST['article_name'];
	if(!empty($_POST['external'])){
	    $external_array=$_POST['external'];
	}
	if(!empty($_POST['internal'])){
	   $internal_array=$_POST['internal'];
	}
    $name_external_href_1=''; $name_external_href_2=''; $name_external_href_3='';
	$href_external_1=''; $href_external_2=''; $href_external_3='';
	$name_internal_href_1=''; $name_internal_href_2=''; $name_internal_href_3='';
	$href_internal_1=''; $href_internal_2=''; $href_internal_3='';
	if(!empty($external_array)){
		foreach ($external_array as $key => $value) {
			switch ($key) {
				case 0:
					$name_external_href_1=$value['name'];
					$href_external_1=$value['link'];
					break;
					case 1:
					$name_external_href_2=$value['name'];
					$href_external_2=$value['link'];
					break;
					case 2:
					$name_external_href_3=$value['name'];
					$href_external_3=$value['link'];
					break;
				
				default:
				$name_external_href_1='';
				$name_external_href_1='';
				$name_external_href_1='';
				$href_external_1='';
				$href_external_2='';
				$href_external_3='';
					break;
			}
		}
	}
	if(!empty($internal_array)){
		foreach ($internal_array as $key => $value) {
			switch ($key) {
				case 0:
					$name_internal_href_1=$value['name'];
					$href_internal_1=$value['link'];
					break;
					case 1:
					$name_internal_href_2=$value['name'];
					$href_internal_2=$value['link'];
					break;
					case 2:
					$name_internal_href_3=$value['name'];
					$href_internal_3=$value['link'];
					break;
				
				default:
				$name_internal_href_1='';
				$name_internal_href_1='';
				$name_internal_href_1='';
				$href_internal_1='';
				$href_internal_2='';
				$href_internal_3='';
					break;
			}
		}
	}
	if($categories!='history'){
       $data= array( 'user_id' => $user_id,
       	             'article_id' => $article_id,
       	             'moderator_id' =>$moderator_id,
       	             'name' => $title,
       	             'nik_name' => $nik_name,
       	             'birth_day' => $event_date,
       	             'place_of_birth' => $place_of_birth,
       	             'description' => $description, 
       	             'name_internal_href_1' => $name_internal_href_1, 
       	             'name_internal_href_2' => $name_internal_href_2,
       	             'name_internal_href_3' => $name_internal_href_3,
       	             'name_external_href_1' => $name_external_href_1,
       	             'name_external_href_2' => $name_external_href_2,
       	             'name_external_href_3' => $name_external_href_3,
       	             'href_internal_1' => $href_internal_1,
       	             'href_internal_2' => $href_internal_2,
       	             'href_internal_3' => $href_internal_3,
       	             'href_external_1' => $href_external_1,
       	             'href_external_2' => $href_external_2,
       	             'href_external_3' => $href_external_3,
       	             'article_status' => 1);

	}
	else{
		 $data= array( 'user_id' => $user_id,
       	             'article_id' => $article_id,
       	             'moderator_id' =>$moderator_id,
       	             'title' => $title,
       	             'birth_day' => $event_date,
       	             'description' => $description, 
       	             'name_internal_href_1' => $name_internal_href_1, 
       	             'name_internal_href_2' => $name_internal_href_2,
       	             'name_internal_href_3' => $name_internal_href_3,
       	             'name_external_href_1' => $name_external_href_1,
       	             'name_external_href_2' => $name_external_href_2,
       	             'name_external_href_3' => $name_external_href_3,
       	             'href_internal_1' => $href_internal_1,
       	             'href_internal_2' => $href_internal_2,
       	             'href_internal_3' => $href_internal_3,
       	             'href_external_1' => $href_external_1,
       	             'href_external_2' => $href_external_2,
       	             'href_external_3' => $href_external_3,
       	             'article_status' => 1 );
	}
	$tblName=$categories."_".$article_lng;
	$checkArticle= array('article_id' => $article_id );
	$search_article=$db->checkRow($tblName, $checkArticle);
	if($search_article){
		$currentDateTime = date('Y-m-d H:i:s');
        $data['updated_date'] = $currentDateTime;
		$res=$db->update($data, $checkArticle);
	}
	else{
       $res=$db->insert($data);
	}
    if($res){
    	echo "<span class='text-success'>Խմբագրված հոդվածը պահպանված է </span>";
    }
    else{
    	echo "<span class='text-danger'>error</span>";
    }
}

else{
	echo 'error';
}
// }
?>