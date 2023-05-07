<?php

session_start();
?>
<link rel="stylesheet" href="../css/forget_pass.css">
<title>Read article</title>

</head>

<body>

<?php

include "config/dbconfig.php";
include "header.php";
include "lang_config.php";


if ($_GET['key'] && $_GET['token']) {
    $email = $_GET['key'];
    $token = $_GET['token'];
    $_SESSION['email_forget'] = $email;
    $_SESSION['token_forget'] = $token;

    $query = mysqli_query($con,
        "SELECT * FROM `users` WHERE `reset_link_token`='" . $token . "' and `email`='" . $email . "';"
    );
    $curDate = date("Y-m-d");
    include "forget_pass/password_content.php";


    if (mysqli_num_rows($query) > 0) {

        $row = mysqli_fetch_array($query);

        if ($row['exp_date'] >= $curDate) {


            echo constant('forget_pass-' . $lang_dir);


        }
    } else {

        if ($lang_dir == 'en') {

            echo "<p>This forget password link has been expired</p>";
        }
        if ($lang_dir == 'ru') {

            echo "<p>Срок действия ссылки на забыть пароль истек</p>";

        }
        if ($lang_dir == 'am') {

            echo "<p>Մոռացված գաղտնաբառի հղման ժամկետը լրացել է</p>";

        }

    }
}
?>


<input type="hidden" value="<?php echo $lang_dir ?>" id="cur_lang_page">


<script src='../js/forget.js' type="text/javascript">
</script>
</body>
</html>

 


