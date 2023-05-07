<?php
include "../txtmain.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords"
          content="Armenian heroes, national heroes, Armenian hero, Armenian national values, Armenian war heroes, heroes biography, documental materials of heroes, write a hero story, write a hero biography">
    <meta name="description" content="Armenian heroes biography, Armenian heroes story">
    <link rel="stylesheet" href="../css/about.css">
    <link rel='icon' type='image/png' href='../Icons/logofon.png'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- <script src = '../js/main.js'></script> -->
    <title>About Armheroes</title>

</head>

<body>
<div class="d-flex flextop justify-content-between">
    <div class="flex-item1">
        <div>
            <a href="index.php">
                <img src="../images/logo.png" alt="logo" class='logomain1'>
            </a>
            <div class="textlogo">Ես մի զարկն եմ քո բազկի</div>
        </div>
    </div>


    <div class="flex-item2">
        <div class="dropdown text-right">
            <button class="btn dropdown-toggle" type="button" id="dropdownlng" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                <?php echo "<span data-lng='' class='active-lng-a'>" . strtoupper($lang_menu) . "</apan>"; ?>
            </button>
            <div class="dropdown-menu text-right" aria-labelledby="dropdownlng">
                <?php
                foreach ($arr_lang as $value) {
                    if ($value != $lang_menu) {
                        $str_lang = strtoupper($value);
                        echo "<a class='dropdown-item lng-a' href='$f$value/$file_name' data-lng='$value'>$str_lang</a>";
                    }
                }
                ?>
                <!-- <a class="dropdown-item lng-a" href="" data-lng='ru'>RU</a> -->
            </div>
        </div>
    </div>
</div>
<div class="disp-secondary">
    <span class="imgback"><a href='index.php'><img src='../Icons/back.png' alt='back' class='back'></a></span>
    <?php
    if ($lang_menu == "am") {
        echo "<span class='maincaption'>«Հայ Հերոս» հարթակի մասին</span>";
    }
    if ($lang_menu == "en") {
        echo "<span class='maincaption'>About Armheros</span>";
    }
    if ($lang_menu == "ru") {
        echo "<span class='maincaption'>О платформе \"Armheros\"</span>";
    }
    ?>
</div>
<div class="d-flex flexmain">
    <div class="flexmain-item1">
        <div class="disp-primary">
            <span class="imgback"><a href='index.php'><img src='../Icons/back.png' alt='back' class='back'></a></span>
            <div class="disp-comp">
                <div class="ellipse">
                    <img src="../Icons/logofon.png" class='imgellipse'>

                </div>
                <div class="imgmainabs">
                    <img src="../images/mainimgabs.png" class='imgabs'>
                </div>
            </div>

            <?php
            if ($lang_menu == "am") {
                echo TEXT_ABOUT_AM;
            }
            if ($lang_menu == "en") {
                echo TEXT_ABOUT_EN;
            }
            if ($lang_menu == "ru") {
                echo TEXT_ABOUT_RU;
            }
            ?>

            <div class="contDiv">
                <div>
                    <a href="mailto:contact@armhero.org?Subject=Some%20subject" id='mailTo'>
                        <img src="../Icons/mail.png" class='imgicon'>
                        <span class="cont">contact@armhero.org</span>
                    </a>
                </div>
                <div class="contacts">
                    <a href="tel:+37494276863">
                        <img src="../Icons/phone.png" class='imgicon'>
                        <span class="cont">+37494276863</span>
                    </a>
                </div>

                <div class="copyright">
                        <span class="footerspan">
                            <?php
                            if ($lang_menu == "am") {
                                echo "Կայքը նախագծել և պատրաստել է  <a href='https://www.cybertech.am/'>«CyberTech»</a> ընկերությունը։ </span> <i class='far fa-copyright'></i> «Սթարթափ Կենտրոն» ՀԿ, " . date("Y");
                            }
                            if ($lang_menu == "en") {
                                echo "Developing by  <a href='https://www.cybertech.am/'>CyberTech</a></span> <i class='far fa-copyright'></i> 'Start up center' NGO " . date("Y");
                            }
                            if ($lang_menu == "ru") {
                                echo "Дизайн и разработка сайта  <a href='https://www.cybertech.am/'>CyberTech</a></span> <i class='far fa-copyright'></i> НПО \"Стартап Центр\" " . date("Y");
                            }
                            ?>
                </div>
            </div>
        </div>
        <div class="flexmain-item2 disp-mob">
            <div class="ellipse">
                <img src="../Icons/logofon.png" class='imgellipse'>

            </div>
            <div class="imgmainabs">
                <img src="../images/mainimgabs.png" class='imgabs'>
            </div>
        </div>

    </div>


</body>
<script src="../js/main.js">
</script>


</html>