<?php
include "config/dbconfig.php";

$email = $_POST['email'];
$unique = true;
$sql = "SELECT email FROM users";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if ($row['email'] == $email) {

            $unique = false;

        }

    }
} else {
    $unique = true;
}
$con->close();

echo json_encode($unique);
?>
