<?php
session_start();
include "../config/dbconfig.php";
include '../lang_config.php';
include "../header.php";


?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<link rel="stylesheet" href="../css/navbar.css">
<link rel="stylesheet" href="../css/footer.css">
<link rel="stylesheet" href="../css/supporters.css">
<title>Supporters</title>
</head>

<body>
    <input type="hidden" value="<?php echo $lang_dir ?>" id="cur_lang_page">

    <?php
    include "whitenav.php";
    ?>
    <!-- Navbar-->
    <?php
    include "navbar.php";

    ?>

        <div class="part1" id="part1">
            <div class="auto_variant1" id="auto_variant1">
                <div class="besupport">
                    <div class="besup_part1">
                        <?php
                        if ($lang_menu == "am") {
                            echo "<span class='thankyou1'>Շնորհակալ ենք</span>";
                        }
                        if ($lang_menu == "en") {
                            echo "<span class='thankyou1'>Thanks</span>"; 
                        }
                        if ($lang_menu == "ru") {
                            echo "<span class='thankyou1'>Спасибо</span>"; 
                        }
                        ?>
                    </div>
                    <div class="besup_part2">
                        <?php
                        if ($lang_menu == "am") {
                            echo "<span class='thankyou2'>մեր բոլոր աջակիցներին, ում օգնության շնորհիվ Հայ Հերոս
                                նախագիծը գոյություն ունի և զարգանում է: </span>";
                        }
                        if ($lang_menu == "en") {
                            echo "<span class='thankyou2'>to all our supporters, who helps the Armhero
                                project to exist and develop</span>"; 
                        }
                        if ($lang_menu == "ru") {
                            echo "<span class='thankyou2'>всем нашим спонсорам, благодаря чьей помощи Armhero
                                проект существует и развивается</span>"; 
                        }
                        ?>
                    </div>
                    <div class="besup_part3">
        <a href="donate.php" class='btn1' id="donate_btn1" class='a_no_dec'>
            <?php
            if ($lang_menu == 'en') {
                echo "Support the project";
            }
            if ($lang_menu == 'am') {
                echo "Աջակցել նախագծին";
            }
            if ($lang_menu == 'ru') {
                echo "Поддержать проект";
            }
            ?>
        </a>
                    </div>  
                </div>
            </div>
        </div>

        <div class="part2">
            <?php
                include "../companies.php";
            ?>
        </div>

        <div class="part3">
                <div class="carusel-persons" style="width: 100%;">
                    <?php
                    include "../carousel/person.php";
                    ?>
                </div>
        </div>


        <div class="part4" >
            <div class="part4img">
                <div class="part4_1">
                        <?php
                        if ($lang_menu == "am") {
                            echo "<span class='pt4text1'>Դառնալ աջակից</span>";
                        }
                        if ($lang_menu == "en") {
                            echo "<span class='pt4text1'>Become a supporter</span>"; 
                        }
                        if ($lang_menu == "ru") {
                            echo "<span class='pt4text1'>Стать сторонником</span>"; 
                        }
                        ?>
                </div>
                <div class="infosupport"> 
                        <?php
                        if ($lang_menu == "am") {
                            echo "<span class='pt4text2'>Lorem Ipsum is simply dummy text of the printing and typesetting
industry.Lorem Ipsum is simply dummy text of the printing and typesetting
industry.</span>";
                        }
                        if ($lang_menu == "en") {
                            echo "<span class='pt4text2'>Lorem Ipsum is simply dummy text of the printing and typesetting
industry.Lorem Ipsum is simply dummy text of the printing and typesetting
industry.</span>"; 
                        }
                        if ($lang_menu == "ru") {
                            echo "<span class='pt4text2'>Lorem Ipsum is simply dummy text of the printing and typesetting
industry.Lorem Ipsum is simply dummy text of the printing and typesetting
industry.</span>"; 
                        }
                        ?>
                </div>
<div class="part4_3">
        <a href="donate.php" class='btn1' id="donate_btn1" class='a_no_dec'>
            <?php
            if ($lang_menu == 'en') {
                echo "Support the project";
            }
            if ($lang_menu == 'am') {
                echo "Աջակցել նախագծին";
            }
            if ($lang_menu == 'ru') {
                echo "Поддержать проект";
            }
            ?>
        </a>
</div>
            </div>
        </div>



















    <!--  footer  -->
    
    <div class="">
        <?php
        include "footer.php";
        ?>
    </div>

    <!-- footer -->


</body>

</html>