<?php
include "config/dbconfig.php";
session_start();
$id = $_SESSION['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];
if (isset($_POST['phone'])) {

    $phone = $_POST['phone'];

}

$city = $_POST['city'];

if ($city == "" && isset($_POST['phone'])) {

    $sql = "UPDATE users SET fullname='$name', email='$email',phone='$phone' WHERE id='$id'";
}
if ($city != "" && isset($_POST['phone'])) {

    $sql = "UPDATE users SET fullname='$name', email='$email',phone='$phone',city='$city' WHERE id='$id'";

}
if ($city != "" && !isset($_POST['phone'])) {

    $sql = "UPDATE users SET fullname='$name', email='$email',city='$city',city='$city' WHERE id='$id'";

}
if ($city == "" && !isset($_POST['phone'])) {

    $sql = "UPDATE users SET fullname='$name', email='$email' WHERE id='$id'";
}

if ($con->query($sql) === TRUE) {

    $data = [

        'con' => 'true',
        'message' => 'Your data is updating successfully'

    ];
    $sql_sel = "SELECT * FROM users WHERE id='$id'";
    $result = $con->query($sql_sel);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $_SESSION['username'] = $row['fullname'];
            $_SESSION['useremail'] = $row['email'];
            $_SESSION['userphone'] = $row['phone'];
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['usercity'] = $row['city'];

        }
    } else {
        $data = [

            'con' => 'false',
            'message' => 'Is invalid connection select'

        ];
        echo json_encode($data);
        exit();
    }
    echo json_encode($data);

} else {
    $data = [

        'con' => 'false',
        'message' => 'Is invalid connection update'

    ];
    echo json_encode($data);
}
$con->close();

?>
