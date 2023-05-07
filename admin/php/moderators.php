<?php
session_start();

include "../../config/dbconfig.php";
    // require_once "../classes/DB.class.php";
    if(isset($_POST['login-moderator']) && isset($_POST['password-moderator'])){

// $name = $_POST['name'];
// $email = $_POST['email'];
// $password = $_POST['password'];
// $phone = $_POST['phone'];
// $hash_password = password_hash($password, PASSWORD_DEFAULT);

$login=$_POST['login-moderator'];
$pass_not_hash=$_POST['password-moderator'];
$password=md5($pass_not_hash);
$role="0";
$status="1";
// var_dump($password);
  	    // $db=new DB();
       //  $db->tblName='admin';
       //  $data=array('login' => $login,
       //               'password' => $password,
       //               'pass_not_hash' => $pass_not_hash,);
// $sql = "INSERT INTO admin (login, password, pass_not_hash, role, status)VALUES ('$login', '$password', '$pass_not_hash', '$role', '$status')";
// $sql = "INSERT INTO `admin`(`login`, `pass_not_hash`, `password`, `role`, `status`) VALUES ([$login],[$pass_not_hash],[$password],[$role],[$status])"
$sql = "INSERT INTO `admin` (`login`, `password`,  `pass_not_hash`, `role`, `status`) 
VALUES ('$login', '$password', '$pass_not_hash', '$role', '$status')";
      // var_dump($con->query($sql) );
        // $res=$db->insert($data);
        // var_dump($db->insert($data));
        if($con->query($sql) === TRUE){
        	echo 'Մոդերատորն հաջողությամբ ավելացվեց։';
        }
        else{
        	echo 'Մոդերատորը չի ավելացվել';
        }
    }
           
?>