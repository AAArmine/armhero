<?php
$host = "localhost";
$database = "armhero";
$username = "armhero";
$password = "urljTKNueh1SqX2G";
//urljTKNueh1SqX2G
$con = mysqli_connect($host, $username, $password, $database);
if (!$con) {
    die('error_get_last()' . mysqli_error());

} else {
    mysqli_query($con, "SET NAMES 'utf8'");
//    echo "Ok";
}

?>
