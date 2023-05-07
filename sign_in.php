<?php
session_start();
if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != null) {

    $prev_url = $_SERVER['HTTP_REFERER'];

} else {

    $prev_url = "index.php";

}
include 'lang_config.php';

?>

<!DOCTYPE html>
<html lang="en">

<?php
include "../header.php";
?>
<?php
include "../sign_in_content.php";

?>


<link rel="stylesheet" href="../css/sign_up.css">


</head>
<body>

<input type="hidden" value="<?php echo $lang_dir ?>" id="current_lang">
<div class="container-fluid">

    <div class="mainFlex d-flex justify-content-between">
        <div class="mainFlex_item1 sign_up_img">
            <img class="logo_image" src="../images/logo.png">
        </div>
        <div class="mainFlex_item2 d-flex flex-column sign_in_content">
            <!-- Signup header-->
            <div class='go_back a_no_dec' id="slack_back">
                <a class='a_no_dec' href='home.php'>
                    <img src='../Icons/back.png'>
                    <span class='leftMargin'> 
                    <?php if ($lang_dir == "en") echo "Go To Main page"; elseif ($lang_dir == "ru") echo "Перейти на главную страницу"; else echo "Վերադառնալ հիմնական էջ" ?>
                    </span>
                </a>
            </div>
            <div class="mt-2 d-flex justify-content-center content_header">

                <div class="flex-item2 sign_up_lang">
                    <div class="dropdown text-right">
                        <button class="btn dropdown-toggle" type="button" id="dropdownlng" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <span data-lng="" class="active-lng-a"> <?php echo strtoupper($lang_dir) ?> </span></button>
                        <div class="dropdown-menu text-right" aria-labelledby="dropdownlng">
                            <?php for ($i = 0; $i < count($array_langs); $i++) {
                                if ($array_langs[$i] != $lang_dir) {
                                    ?>

                                    <a class="dropdown-item lng-a" href="../<?php echo $array_langs[$i] ?>/sign_in.php"
                                       data-lng="am"><?php echo strtoupper($array_langs[$i]) ?></a>

                                    <?php
                                }
                                ?>

                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <a
                        class="ml-3 sign_in_link"><?php if ($lang_dir == "en") echo "Sign In"; elseif ($lang_dir == "ru") echo "Вход"; else echo "Մուտք" ?></a>

                <a href="../<?php echo $lang_dir; ?>/sign_up.php"
                   class="ml-3 btn btn-outline-dark rounded-pill sign_up"><?php if ($lang_dir == "en") echo "Sign Up"; elseif ($lang_dir == "ru") echo "Регистрация"; else echo "Գրանցում" ?></a>
            </div>
            <!-- Signup header end-->
            <?php
            echo constant('content-' . $lang_dir);

            ?>
        </div>


    </div>

</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src='../js/signup_validation.js' type="text/javascript">
</script>

<script src='../js/sign_in.js' type="text/javascript">
</script>
</body>
</html>