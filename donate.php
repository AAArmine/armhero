<?php
include "../txtmain.php";
if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != null) {

    $prev_url = $_SERVER['HTTP_REFERER'];
} else {

    $prev_url = "index.php";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Armenian heroes, national heroes, Armenian hero, Armenian national values, Armenian war heroes, heroes biography, documental materials of heroes, write a hero story, write a hero biography">
    <meta name="description" content="Armenian heroes biography, Armenian heroes story">
    <link rel="stylesheet" href="../css/donate.css">
    <link rel='icon' type='image/png' href='../Icons/logofon.png'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php
    if ($lang_menu == "am") {
        echo "<script src='https://www.google.com/recaptcha/api.js?hl=hy'></script>";
    }
    if ($lang_menu == "en") {
        echo "<script src='https://www.google.com/recaptcha/api.js?hl=en'></script>";
    }
    if ($lang_menu == "ru") {
        echo "<script src='https://www.google.com/recaptcha/api.js?hl=ru'></script>";
    }
    ?>
    <link rel="stylesheet" href="../telflag/build/css/intlTelInput.css">
    <link rel="stylesheet" href="../telflag/build/css/demo.css">
    <title>
        <?php

        if ($lang_menu == "am") {
            echo "Աջակցեք նախագծին";
        }
        if ($lang_menu == "en") {
            echo "Support the Project";
        }
        if ($lang_menu == "ru") {
            echo "Поддержите проект";
        }

        ?>


    </title>

</head>

<body>


    <div class="d-flex flextop justify-content-between">
        <div class='flex-item1' id="slack_back">
            <a href='home.php'><img src='../Icons/back.png'></a>
        </div>
        <div class="flex-item2">
            <div class='mb-2'>
                <?php
                if ($lang_menu == "am") {
                    echo "Աջակցություն";
                }
                if ($lang_menu == "en") {
                    echo "Support the Project";
                }
                if ($lang_menu == "ru") {
                    echo "Поддержать проект";
                }
                ?>

            </div>

        </div>
        <div class="flex-item3">
            <div class="dropdown text-right">
                <button class="btn dropdown-toggle" type="button" id="dropdownlng" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
    <div class="mt-4 donate_titles">
        <div class="money_donate variant_donate" id="money">

            <?php

            if ($lang_menu == "am") {
                echo "<h5><i class='fas fa-hand-point-right'></i> Ֆինանսական աջակցություն</h5>";
            }
            if ($lang_menu == "ru") {
                echo "<h5><i class='fas fa-hand-point-right'></i> Финансовая поддержка</h5>";
            }
            if ($lang_menu == "en") {
                echo " <h5> <i class='fas fa-hand-point-right'></i> Financial support</h5>";
            }
            ?>
        </div>

        <div class="no_money_donate variant_donate" id="no_money">


            <?php

            if ($lang_menu == "am") {
                echo "<h5><i class='fas fa-hand-point-right'></i> Ոչ Ֆինանսական աջակցություն</h5>";
            }
            if ($lang_menu == "ru") {
                echo "<h5><i class='fas fa-hand-point-right'></i> Нефинансовая поддержка</h5>";
            }
            if ($lang_menu == "en") {
                echo "<h5><i class='fas fa-hand-point-right'></i> Non-financial support</h5>";
            }
            ?>


        </div>


    </div>

    <div class="d-flex main-flex">
        <div class="mainflexitem1">
            <div class="money_title">
                <?php

                if ($lang_menu == "am") {
                    echo "Ցանկանում եմ ֆինանսապես աջակցել armheroes.am օնլայն
                    հարթակի զարգացմանը";
                }
                if ($lang_menu == "ru") {
                    echo "Я хочу оказать финансовую поддержку armheroes.am онлайн
                    разработка платформы";
                }
                if ($lang_menu == "en") {
                    echo "I want to financially support armheroes.am online
                    platform development";
                }


                ?>

            </div>
            <div class="mt-4 paying_butttons">

                <div class="btn btn-outline-secondary pay_variant" id="idram"><img src="../images/idram.png" class="img_pay" alt="idram"></div>
                <div class="btn btn-outline-warning pay_variant" id="tellcell"><img src="../images/telcell.png" class="img_pay" alt="idram"></div>
                <div class="btn btn-outline-secondary pay_variant" id="easypay"><img src="../images/easypay.png" class="img_pay" alt="idram"></div>
                <div class="mt-3 footerbutton_section pay_variant" id="foundme">
                    <a href="https://www.gofundme.com/f/help-remember-our-heroes?fbclid=IwAR0wHZefWfQ2-eggeGReowdbnDtdVYYelmQZ-3RFVc58TzpPghqMl8_hKNs" class="linkgofundme"><img src="../Icons/gofundme.png" alt="" class="gofundmeimg"> Gofundme</a>
                </div>

            </div>
            <div class="mt-5 pay_section_underline"></div>
            <div class="mt-5 cards d-flex justify-content-around">
                <div class="mt-5 card_div">
                    <img src="../images/arca-secure-pay.png" class="img_card" alt="card">
                </div>
                <div class="mt-5 card_div">
                    <img src="../images/master.png" class="img_card" alt="card">
                </div>
                <div class="mt-5 card_div">
                    <img src="../images/visa.png" class="img_card" alt="card">
                </div>


            </div>


        </div>
        <div class="main_middle_line">


        </div>
        <div class="mainflexitem2">
            <div class="mainshadow">
                <div id="maincontent">
                    <div class="contmodal">
                        <div class="headermod">

                            <div class='donationText disp1'>
                                <?php
                                if ($lang_menu == "am") {
                                    echo "Ցանկանում եմ աջակցել armheroes.am օնլայն
            հարթակի զարգացմանը։";
                                }
                                if ($lang_menu == "en") {
                                    echo "I want to support the development of the
            armheroes.am online platform.";
                                }
                                if ($lang_menu == "ru") {
                                    echo "Я хочу поддержать развитие
                                    онлайн-платформы armheroes.am.";
                                }
                                ?>
                            </div>

                        </div>

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
                        <?php
                        if ($lang_menu == "am") {
                            echo INPUTS_com_AM;
                        }
                        if ($lang_menu == "en") {
                            echo INPUTS_com_EN;
                        }
                        if ($lang_menu == "ru") {
                            echo INPUTS_com_RU;
                        }
                        ?>
                        <?php
                        if ($lang_menu == "am") {
                            echo INPUTS_last_AM;
                        }
                        if ($lang_menu == "en") {
                            echo INPUTS_last_EN;
                        }
                        if ($lang_menu == "ru") {
                            echo INPUTS_last_RU;
                        }
                        ?>
                        <input type="hidden" id='hidden'>


                        <script>
                            $(document).ready(function() {
                                $('input[name="content_type"]').on('change', function() {
                                    var x = $(this).val();
                                    if (x == 1) {
                                        $('#show1').css('display', 'block');
                                        $('#show2').css('display', 'none');
                                    } else {
                                        $('#show2').css('display', 'block');
                                        $('#show1').css('display', 'none');
                                    }
                                });
                            });
                        </script>

                        <div id='captchaborderid' class='mt-2'>
                            <div class="g-recaptcha" data-sitekey="6LcCqXQaAAAAACxqOfz1qxU1oV7RnJFQPKMftmdE" data-callback="imNotARobot"></div>
                        </div>
                        <div id="g-recaptcha-error"></div>
                        <div class="footercentered">
                            <!-- <div class="donatediv" id='dondiv'></div> -->
                            <div class='footertext'>
                                <?php
                                if ($lang_menu == "am") {

                                    echo "Սեղմելով  «Աջակցել» կոճակը՝ դուք համաձայնվում եք
                                    <a href='javascript:void(0);' onClick=window.open('am-termsofuse.php','Ratting','width=300,height=300,top=70,status=0,scrollbars=1');>Օգտագործման կանոնների</a> 
                                                հետ և տալիս եք Ձեր
                                    համաձայնությունը Ձեր անձնական տվյալների մշակման
                                    համար համաձայն <a href='javascript:void(0);' onClick=window.open('am-policy.php','Ratting','width=300,height=300,top=70,status=0,scrollbars=1');>Գաղտնիության քաղաքականության:</a> ";
                                }
                                if ($lang_menu == "en") {
                                    echo "By clicking on the \"Support\" button, you agree to the <a href='javascript:void(0);' onClick=window.open('en-termsofuse.php','Ratting','width=300,height=300,top=70,status=0,scrollbars=1');>terms of use</a>
                                    and consent to the processing of your personal data in accordance
                                    with the <a href='javascript:void(0);' onClick=window.open('en-policy.php','Ratting','width=300,height=300,top=70,status=0,scrollbars=1');> privacy policy </a>:
                                    ";

                                }
                                if ($lang_menu == "ru") {
                                    echo "Нажав на кнопку \"Поддержать\", вы соглашаетесь с <a href='javascript:void(0);' onClick=window.open('ru-termsofuse.php','Ratting','width=300,height=300,top=70,status=0,scrollbars=1');>условиями использования</a>
                                    и даете согласие на обработку ваших персональных данных в соответствии с
                                    <a href='javascript:void(0);' onClick=window.open('ru-policy.php','Ratting','width=300,height=300,top=70,status=0,scrollbars=1');>политикой конфиденциальности </a>:
                                    ";
                                }
                                ?>

                            </div>
                            <div class='margin-top'>
                                <!-- modal button -->

                                <button class='btn1' id='donatebtn' data-toggle='modal' data-target='#secondModal' data-dismiss="modal" disabled='true'>

                                    <?php
                                    if ($lang_menu == "am") {
                                        echo 'Աջակցել';
                                    }
                                    if ($lang_menu == "en") {
                                        echo 'Support';
                                    }
                                    if ($lang_menu == "ru") {
                                        echo 'Поддержать';
                                    }
                                    ?>
                                </button>

                            </div>


                        </div>
                        <!-- footermodal -->

                        <!-- contmodal -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="mt-5 d-flex flexbut justify-content-center">


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
                    echo "Дизайн и разработка  сайта  <a href='https://www.cybertech.am/'>CyberTech</a></span> <i class='far fa-copyright'></i> НПО \"Стартап Центр\" " . date("Y");
                }
                ?>
        </div>

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

    <!-- Modal 2 -->
    <div class="modal fade modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        >
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
                        <div class="bold">
                            <?php
                            if ($lang_menu == "am") {
                                echo 'Հարգելի Աջակից';
                            }
                            if ($lang_menu == "en") {
                                echo 'Dear Supporter';
                            }
                            if ($lang_menu == "ru") {
                                echo 'Уважаемый участник';
                            }
                            ?>

                        </div>
                        <div class="mod2textcapt">
                            <?php
                            if ($lang_menu == "am") {
                                echo 'Շնորհակալ ենք Ձեր աջակցության համար։ Շուտով մենք կապ
                                կհաստատենք Ձեր հետ։';
                            }
                            if ($lang_menu == "en") {
                                echo 'We thank for your support. We\'ll get in touch with you soon';
                            }
                            if ($lang_menu == "ru") {
                                echo 'Мы благодарим вас за вашу поддержку. Мы скоро свяжемся с вами';
                            }
                            ?>

                        </div>
                        <div class="modback">
                            <button class="modalback" data-dismiss="modal">
                                <?php
                                if ($lang_menu == "am") {
                                    echo 'Վերադառնալ';
                                }
                                if ($lang_menu == "en") {
                                    echo 'Back';
                                }
                                if ($lang_menu == "ru") {
                                    echo 'Назад';
                                }
                                ?>

                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->
</body>
<script src="../js/main.js">
</script>
<script src="../telflag/build/js/intlTelInput.js"></script>
<script src="../js/telflag.js"></script>

</html>