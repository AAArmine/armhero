<?php
include "config/dbconfig.php";

$phone = $_POST['phone'];
$unique = true;
$sql = "SELECT phone FROM users WHERE phone='$phone'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
            $data = [
                'am' => 'Այս հեռախոսահամարը գոյություն ունի',
                'ru' => 'Этот номер телефона уже существует',
                'en' => 'This phone number is exist',
                'unique' => false,
            ];

} else {

    $data = [

        'unique' => true,

    ];
}
$con->close();

echo json_encode($data);

?>
