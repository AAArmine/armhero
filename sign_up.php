<?php
include 'lang_config.php';
if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != null) {

    $prev_url = $_SERVER['HTTP_REFERER'];

} else {

    $prev_url = "index.php";

}
?>
<!DOCTYPE html>
<html lang="en">

<?php
include "../header.php";
?>
<?php
include "../sign_up_content.php";
?>
<link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>

<link rel="stylesheet" href="../css/sign_up.css">


<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<!--<script src="https://unpkg.com/axios/dist/axios.min.js"></script>-->
</head>
<body>
<input type="hidden" value="<?php echo $lang_dir ?>" id="current_lang">
<input type="hidden" value="check_email" id="check_email_route">
<div class="container-fluid">

    <div class="mainFlex d-flex justify-content-between">
        <div class="mainFlex_item1 sign_up_img">
            <img class="logo_image" src="../images/logo.png">
        </div>
        <div class="mainFlex_item2 d-flex flex-column sign_up_content">
            <div class='go_back a_no_dec' id="slack_back">
                <a class='a_no_dec' href='home.php'>
                    <img src='../Icons/back.png'>
                    <span class='leftMargin'> 
                    <?php if ($lang_dir == "en") echo "Go To Main page"; elseif ($lang_dir == "ru") echo "Перейти на главную страницу"; else echo "Վերադառնալ հիմնական էջ" ?>
                    </span>
                </a>
            </div>
            <!-- Signup header-->
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

                                    <a class="dropdown-item lng-a" href="../<?php echo $array_langs[$i] ?>/sign_up.php"
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
                <a href=""
                   class="ml-3 sign_in_link"><?php if ($lang_dir == "en") echo "Sign Up"; elseif ($lang_dir == "ru") echo "Регистрация"; else echo "Գրանցում" ?></a>

                <a href="../<?php echo $lang_dir; ?>/sign_in.php"
                   class="ml-3 btn btn-outline-dark rounded-pill sign_up"><?php if ($lang_dir == "en") echo "Sign In"; elseif ($lang_dir == "ru") echo "Вход"; else echo "Մուտք" ?></a>
            </div>
            <!-- Signup header end-->
            <?php
            echo constant('content-' . $lang_dir);

            ?>
        </div>


    </div>

</div>


<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase-app.js"></script>

<!-- Add Firebase products that you want to use -->
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase-auth.js"></script>

<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase-database.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<!--<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-analytics.js"></script>-->

<script>
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    var firebaseConfig = {
        apiKey: "AIzaSyBmkucuBeziyLh3IUnsp4V6y3oM7S0rzvA",
        authDomain: "armhero-f6871.firebaseapp.com",
        projectId: "armhero-f6871",
        storageBucket: "armhero-f6871.appspot.com",
        messagingSenderId: "663754213106",
        appId: "1:663754213106:web:a76c3e46f609da98a8726b",
        measurementId: "G-PD59GKM4XJ"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    // firebase.analytics();
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src='../js/firebase.js' type="text/javascript">
</script>

<script src='../js/signup_validation.js' type="text/javascript">
</script>
</body>
</html>