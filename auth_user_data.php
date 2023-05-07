<?php
include "config/dbconfig.php";
if (isset($_SESSION['user_id'])) {

    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = $con->query($sql);
    if ($result->num_rows == 1) {

        $db_res = $result->fetch_assoc();

    }
}
//$con->close();
?>
