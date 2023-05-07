<?php 
	session_start();
	require_once "../classes/DB.class.php";
	if(!empty($_POST['login']) && !empty($_POST['password'])){
		$login=$_POST['login'];
		$password=$_POST['password'];
		$password=md5($password);
		$db=new DB();
		$db->tblName='admin';
		$conditions = array(
					'login' => $login,
					'password' =>$password
			);
		$check_row = $db->loginAdministration($conditions);
			if($check_row){
				$_SESSION['administration']=$check_row['role'];
				$_SESSION['login']=$login;
				$_SESSION['moderator_id']=$check_row['id'];
				echo "Successful login";
				date_default_timezone_set('Europe/Moscow');
				$now= date('Y-m-d H:i:s'); 
				$data=array('login_date' => $now);
				$db->update($data, $conditions);
				?>
				<script> 
				setTimeout(function(){
					location.href="../tables/index.php"
					},1000)
				</script>
				<?php
			}
			else{
			echo "Invalid login or password";
			}
	}
	else{
		echo "Fill the form";
	}
?>