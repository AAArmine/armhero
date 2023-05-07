<?php
include "config/dbconfig.php";

if (isset($_POST['type'])) {
    if ($_POST['type'] == "autobiography") {

        $lang = $_POST['lang'];
        $type = $_POST['type'];
        $table_name = $type . '_articles_' . $lang;
        $table_image_name = $type . '_images';
        $sql = "SELECT a.name, a.article_id, b.image FROM $table_name a, $table_image_name b WHERE a.publication_status = 1 AND a.article_id = b.article_id AND b.main=1";
//    ""    var_dump($_POST['autho_name']);
//     0   var_dump($_POST['autho_place_birth']);
//    ""    var_dump($_POST['autho_birthday']);
        if ($_POST['autho_name'] != "") {
//           var_dump('name ka');
            $autho_name = $_POST['autho_name'];
            $sql .= " AND a.name LIKE '%$autho_name%'";


        }
        if ($_POST['autho_place_birth'] != '0') {

            $autho_place = $_POST['autho_place_birth'];
            $sql .= " AND a.place_of_birth = '$autho_place'";
//            var_dump($sql);
        }
        if ($_POST['autho_birthday'] != "") {

            $autho_birth = $_POST['autho_birthday'];
            $sql .= " AND a.birth_day = '$autho_birth'";

        }

        $res = $con->query($sql);
        if ($res->num_rows > 0) {
//            var_dump('sssssss');
            $data_search = mysqli_fetch_all($res, MYSQLI_ASSOC);
            $data_result = [
              'data_search'=>$data_search,
              'type'=>$type,

            ];

        }

        echo json_encode($data_result);
    } else {

        $lang = $_POST['lang'];
        $type = $_POST['type'];
        $table_name = $type . '_articles_' . $lang;
        $table_image_name = $type . '_images';
        $sql = "SELECT a.* FROM $table_name a WHERE a.publication_status = 1";

        if ($_POST['history_name'] != "") {

            $his_title = $_POST['history_name'];
            $sql .= " AND a.title LIKE '%$his_title%'";
//            var_dump($sql);

        }
//         if ($_POST['history_date'] != "") {

//             $history_date = $_POST['history_date'];
//             $sql .= " AND birth_day = '$history_date'";
// //            var_dump($sql);
//         }


        $res = $con->query($sql);
        if ($res->num_rows > 0) {
//            var_dump('sssssss');
            $data_search = mysqli_fetch_all($res, MYSQLI_ASSOC);
            $data_result = [
                'data_search'=>$data_search,
                'type'=>$type,

            ];

        }

        echo json_encode($data_result);

    }


}


?>