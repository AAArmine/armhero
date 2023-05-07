<?php
include "../txtwritestory.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords"
          content="Armenian heroes, national heroes, Armenian hero, Armenian national values, Armenian war heroes, heroes biography, documental materials of heroes, write a hero story, write a hero biography">
    <meta name="description" content="Armenian heroes biography, Armenian heroes story">
    <link rel="stylesheet" href="../css/writestory1.css">
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
    <link rel="stylesheet" href="../telflag/build/css/intlTelInput.css">
    <link rel="stylesheet" href="../telflag/build/css/demo.css">

    <title>Write story</title>

</head>

<body>
<?php include "../submitstory.php"; ?>

<div class="d-flex flextop justify-content-between">
    <div class='flex-item1'>
        <a href='index.php'><img src='../Icons/back.png'></a>
    </div>
    <div class="flex-item2">
        <div class='mb-2'>
            <?php
            if ($lang_menu == "am") {
                echo "Ստեղծել հոդված / պատմություն Հայ Հերոսների մասին";
            }
            if ($lang_menu == "en") {
                echo "Create an article / story about Armenian Heroes";
            }
            if ($lang_menu == "ru") {
                echo "Создать статью / историю об армянских героях";
            }
            ?>

        </div>

        <div class="b-line">
        </div>
    </div>
    <div class="flex-item3">
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

            </div>
        </div>
    </div>
</div>
<div class="d-flex main-flex">
    <div class="mainflexitem1">
        <div class='logodiv'>
            <a href="index.php">
                <img src="../images/logo.png" alt="logo" class='logomain'>
            </a>
            <div class="textlogo">Ես մի զարկն եմ քո բազկի</div>
        </div>
        <div class="mainimgtext">
            <?php
            if ($lang_menu == "am") {
                echo "Պատմեք հայ հերոսների մասին։ Ներկայացրեք նրանց կյանքը կամ
                        պատմեք նրանց կատարած սխրագործությունների մասին։";
            }
            if ($lang_menu == "en") {
                echo "Tell us about Armenian heroes. Introduce their lives or tell about their
                        exploits.";
            }
            if ($lang_menu == "ru") {
                echo "Расскажите об армянских героях. Представьте их жизнь или
                    Расскажите об их подвигах.";
            }
            ?>

        </div>
        <div class="mainimgdiv">
            <img src="../Icons/logofon.png" alt="" class='maincircle'>
            <div class='absmainimg'><img src="../images/mainimg.jpg" alt=""></div>
            <div class="absarrow">
                <a href='#mainshadowid'><i class="fas fa-arrow-down"></i></a>
            </div>
        </div>
    </div>

    <div class="mainflexitem2">
        <div class="mainshadow" id='mainshadowid'>
            <form action="" method="post" enctype="multipart/form-data">
                <?php
                if ($lang_menu == "am") {
                    echo INPUTS_AM;
                }
                if ($lang_menu == "en") {
                    echo INPUTS_EN;
                }
                if ($lang_menu == "ru") {
                    echo INPUTS_RU;
                }
                ?>
            </form>
            <div class='footertext'>
                <?php
                if ($lang_menu == "am") {

                    echo "Սեղմելով «Ուղարկել» կոճակը՝ դուք համաձայնվում եք
                        <a href='javascript:void(0);' onClick=window.open('am-termsofuse.php','Ratting','width=300,height=300,top=70,status=0,scrollbars=1');>Օգտագործման կանոնների</a> 
                                    հետ և տալիս եք Ձեր
                        համաձայնությունը Ձեր անձնական տվյալների մշակման
                        համար համաձայն <a href='javascript:void(0);' onClick=window.open('am-policy.php','Ratting','width=300,height=300,top=70,status=0,scrollbars=1');>Գաղտնիության քաղաքականության:</a> ";
                }
                if ($lang_menu == "en") {
                    echo "By clicking on the \"Send\" button, you agree to the <a href='javascript:void(0);' onClick=window.open('en-termsofuse.php','Ratting','width=300,height=300,top=70,status=0,scrollbars=1');>terms of use</a>
                        and consent to the processing of your personal data in accordance
                        with the <a href='javascript:void(0);' onClick=window.open('en-policy.php','Ratting','width=300,height=300,top=70,status=0,scrollbars=1');> privacy policy </a>:
                        ";
                }
                if ($lang_menu == "ru") {
                    echo "Нажав на кнопку \"Отправить\", вы соглашаетесь с <a href='javascript:void(0);' onClick=window.open('ru-termsofuse.php','Ratting','width=300,height=300,top=70,status=0,scrollbars=1');>условиями использования</a>
                        и даете согласие на обработку ваших персональных данных в соответствии с
                        <a href='javascript:void(0);' onClick=window.open('ru-policy.php','Ratting','width=300,height=300,top=70,status=0,scrollbars=1');>политикой конфиденциальности </a>:
                        ";
                }
                ?>

            </div>
        </div>

        <div class="absimg-right">
            <img src="../images/el-small.png" alt="" class='circle2'>
        </div>

    </div>
</div>
<div class="d-flex flextop1 justify-content-between">
    <div class="footer-item">
        <div class="contDiv">

            <a href="mailto:contact@armhero.org?Subject=Some%20subject" id='mailTo'>
                <img src="../Icons/mail.png" class='imgicon'>
                <span class="cont">contact@armhero.org</span>
            </a>

            <div class="contacts">
                <a href="tel:+37494276863">
                    <img src="../Icons/phone.png" class='imgicon'>
                    <span class="cont">+37494276863</span>
                </a>
            </div>
        </div>
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


<!-- Modal 2 -->
<div class="modal fade modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modalwidth" role="document">
        <div class="modal-content1 modal-content">
            <div class="contmodal1">
                <div class="headermod headermod2">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="mod2img">
                        <img src="../images/checked.png">
                    </div>

                    <div class="mod2textcapt">
                        <?php
                        if ($lang_menu == "am") {
                            echo " Ձեր Հոդվածը / Պատմությունը հաջողությամբ ուղարկվել է։ Այն
                                կհրապարակվի Հայ Հերոսների կյանքի և սխրագործությունների մասին
                                պատմող armheros.am Կայքում։";
                        }
                        if ($lang_menu == "en") {
                            echo "Your Article / Story has been successfully submitted. It
                                will be published in the armheros.am Website.";
                        }
                        if ($lang_menu == "ru") {
                            echo "Ваша статья / история была успешно отправлена. Она будет опубликована
                                на сайте armheros.am";
                        }
                        ?>

                    </div>
                    <div class="modback">

                        <a href="index.php" class='goback'>
                            <?php
                            if ($lang_menu == "am") {
                                echo "Վերադառնալ";
                            }
                            if ($lang_menu == "en") {
                                echo "Return";
                            }
                            if ($lang_menu == "ru") {
                                echo "Назад";
                            }
                            ?>


                        </a>
                        <button class="modalback btn1 btn2" data-dismiss="modal">
                            <?php
                            if ($lang_menu == "am") {
                                echo "Ստեղծել նոր հոդված / պատմություն";
                            }
                            if ($lang_menu == "en") {
                                echo "Create a new article/story";
                            }
                            if ($lang_menu == "ru") {
                                echo "Создайте новую статью / рассказ";
                            }
                            ?>
                        </button>
                    </div>
                    <input type="hidden" value="
                            <?php
                    if ($lang_menu == "en") {
                        echo 1;
                    }
                    if ($lang_menu == "am") {
                        echo 2;
                    }
                    if ($lang_menu == "ru") {
                        echo 3;
                    }
                    ?> " id='hiddeninput'>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../js/writestory.js">
</script>
</body>

<script src="../telflag/build/js/intlTelInput.js"></script>
<script src="../js/telflag.js"></script>


</html>