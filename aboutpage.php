<?php
session_start();
include "../header.php";
include "../config/dbconfig.php";
include '../lang_config.php';


$array_base_names = ['autobiography', 'history', 'users'];
$arr_lang = array('en', 'ru', 'am');
$array_result = [];
for ($i = 0; $i < count($array_base_names); $i++) {

    if ($array_base_names[$i] != 'users') {
        $table_n_a = $array_base_names[$i] . '_articles_am';
        $sql = "SELECT * FROM $table_n_a WHERE article_status=1";
        $res = $con->query($sql);
        if ($res->num_rows > 0) {
            $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
            $array_result[$array_base_names[$i]] = count($data);
        } else {

            $array_result[$array_base_names[$i]] = 0;
        }
    } else {

        $sql = "SELECT * FROM users";
        $res = $con->query($sql);
        if ($res->num_rows > 0) {
            $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
            $array_result[$array_base_names[$i]] = count($data);
        }
    }
}

// include '../aboutpage/about-content.php';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<link rel="stylesheet" href="../css/navbar.css">
<link rel="stylesheet" href="../css/footer.css">
<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="../css/aboutpage.css">
<link rel="stylesheet" href="../carousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="../carousel/css/style.css">

<title>Armheroes About</title>


</head>

<body>
    <div class="cont-all">

        <?php
        include "whitenav.php";

        ?>
        <div id="carouselExampleSlidesOnly" class="carousel slide reldiv" data-ride="carousel" data-interval="5000" data-pause="false">
            <div class="absdiv">
                <!-- Navbar-->
                <?php
                include "navbar.php";
                ?>
                <div class='center center1'>
                    <?php
                    if ($lang_dir == "en") {
                    ?>
                        Throughout our history we have been blessed by
                        thousands of heroes, many of whom sacrificed their lives for us
                        and the future of Armenia.
                        However, today we have forgotten so many of their stories as so little
                        has been written about their lives and heroic deeds.
                        And this relationship with the heroes of the past is fundamental to understanding
                        ourselves and who we are. Heroes live as long as the nation remembers them,
                        and in turn a nation lives by preserving its identity and recognising heroes.
                        Now what we need is financial support for the final launch and further development of
                        the project. We appeal to all those who are interested in joining our initiative,
                        to support the armhero.org project. Join and help us enhance the quality of the project
                        and safeguard against potential cybersecurity problems. We will appreciate any and all
                        contributions.
                        None of our heroes should be forgotten. Our heroes deserve to live on in our memories
                        and in our hearts. Support us in recognizing our heroes for the glory of their memory
                        and honour their heroic deeds as a legacy for future generations.
                        
                    <?php
                    }
                    if ($lang_dir == "am") {
                    ?>
                        Հայ ազգը իր պատմության ընթացքում ծնել է հազարավոր հայ հերոսներ, ովքեր հայրենիքի համար
                        օրհասական պահերին իրենց կյանքն են զոհել մեր այսօրվա բարօրության համար։
                        Նրանց ճանաչելով ու նրանց սխրանքներով են կրթվել ապագա սերունդները։
                        Բազմաթիվ մերօրյա հերոսներ` կամավորագրված զինվորներ, բժիշկներ, լրագրողներ, ուսուցիչներ,
                        երաժիշտներ և վարորդներ ապրում են մեր կողքին։ Նրանք պատերազմի դաշտ են մտել առանց մեկ
                        վայրկյան կասկածելու, որ իրենց ժամանակը, առողջությունը և մասնագիտական ունակությունները
                        պիտի ներդրեն մեր հայրենիքի պաշտպանության համար։ Այսօր մենք նրանցից շատ քչերին ենք
                        ճանաչում և շատ ավելի քչերի մասին ունենք հանրայնացված պատմություններ, որոնք կարող ենք
                        փոխանցել մեր ապագա սերունդներին։
                        Հերոսները ապրում են, քանի դեռ ազգը հիշում է նրանց, իսկ ազգը չի կարող ապրել,
                        պահպանելով իր ինքնությունը, եթե չունենա հերոսներ։
                        
                    <?php
                    }
                    if ($lang_dir == "ru") {
                    ?>
                        За всю свою историю армянский народ родил тысячи армянских героев,
                        многие из которых пожертвовали своей жизнью ради нашего нынешнего благополучия.
                        Однако сегодня мы знаем очень мало о них и их героических поступках, которые мы можем
                        передать нашим будущим поколениям. Сегодня рядом с нами живут современные
                        герои - солдаты-добровольцы, врачи, журналисты, учителя, музыканты, водители,
                        которые вышли на поле боя, ни на минуту не сомневаясь, что они должны вкладывать
                        свое время, здоровье и профессиональные навыки в защиту нашей Родины.
                        Сегодня мы знаем очень мало из них, многие из них забыты, потому что информация о них
                        не сосредоточена в одном месте, а зачастую даже отсутствует․․․ Герои живут до тех пор,
                        пока нация их помнит, а нация не может жить, сохраняя свою идентичность,
                        если у нее нет героев. 
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- absdiv -->

            <div class="carousel-inner">
                <div class="carousel-item active backimg1 backimg">

                </div>
                <div class="carousel-item backimg2 backimg">

                </div>
                <div class="carousel-item backimg3 backimg">

                </div>
                <div class="carousel-item backimg4 backimg">

                </div>
            </div>
        </div>
        <!-- carousel -->
        <div class="about_flex_container">
            <div class="flex1_about d-flex justify-content-between">
                <div class="flex1_about_item1">
                    <?php
                    if ($lang_dir == "en") {
                    ?>
                        <h3>What We Do</h3>
                        <p>The "ArmHeroes" platform is called for collecting information and
                            spreading recognition about people who have made a significant
                            contribution to the creation and strengthening of national values.

                            Lets introduce and recognize our heroes for the glory of their memory, in
                            honor of their heroic deeds and for the knowledge of future generations.
                            The "ArmHeroes" platform is called for collecting information and
                            spreading recognition about people who have made a significant
                            contribution to the creation and strengthening of national values.

                            Our armhero.org website was built on the basis of "Arm Hero" project co-founders’
                            and volunteers’ donations with the direct support of the "Startup Center" NGO and we
                            ensure transparency of the fundraising, after every purchase, we will upload payment
                            invoices and name the service we bought for the webpage for future development and
                            enhancement.
                        </p>
                    <?php
                    }
                    if ($lang_dir == "am") {
                    ?>
                        <h3>Մեր մասին</h3>
                        <p>ArmHeroes պլատֆորմը նախատեսված է տեղեկատվություն հավաքելու և
                            տարածելով մարդկանց ճանաչումը, ովքեր նշանակալի նվաճումների են հասել
                            ներդրում ազգային արժեքների ստեղծման և ամրապնդման գործում:

                            Եկեք ներկայացնենք և ճանաչենք մեր հերոսներին `հանուն իրենց հիշողության փառքի
                            իրենց սխրանքների և ապագա սերունդների գիտելիքների պատիվը:
                            ArmHeroes պլատֆորմը նախատեսված է տեղեկատվություն հավաքելու և
                            տարածելով մարդկանց ճանաչումը, ովքեր նշանակալի նվաճումների են հասել
                            ներդրում ազգային արժեքների ստեղծման և ամրապնդման գործում:
                            «Հայ Հերոս» նախագծի համահիմնադիրները շնորհակալություն են հայտնում բոլոր այն
                        կամավորներին և նախագծի ընկերներին, ովքեր իրենց հանգանակություններով և խորհուրդներով
                        օգնել են կյանքի կոչել հերոսների մասին պատմող միասնական հարթակ ունենալու գաղափարը։
                        </p>
                    <?php
                    }
                    if ($lang_dir == "ru") {
                    ?>
                        <h3>О ПРОЕКТЕ</h3>
                        <p>Платформа "ArmHeroes" предназначена для сбора информации и
                            распространение признания людей, которые добились значительного
                            вклад в создание и укрепление национальных ценностей.

                            Давайте познакомим и узнаем наших героев во славу их памяти, в
                            честь их подвигов и знания будущих поколений.
                            Платформа "ArmHeroes" предназначена для сбора информации и
                            распространение признания людей, которые добились значительного
                            вклад в создание и укрепление национальных ценностей.
                            Наша площадка призвана освещать жизнь и героический путь
                        наших героев.Сайт создан на пожертвования учредителей проекта «Армянский герой» и волонтеров при
                        прямой поддержке общественной организации «Стартап-центр».

                        </p>
                    <?php
                    }
                    ?>
                </div>
                <div class="flex1_about_item2">
                    <div class='about_item2_back1'>
                    </div>
                    <div class='about_item2_back2'>
                    </div>
                </div>
            </div>
            <div class="flex2_about d-flex justify-content-between">
                <div class="flex2_about_item1">
                </div>
                <div class="flex2_about_item2">
                    <?php
                    if ($lang_dir == "en") {
                    ?>
                        <h3>Why We Do</h3>
                        <p>Throughout our history we have been blessed by thousands of heroes, many of whom sacrificed their lives for us and the future of Armenia. However, today we have forgotten so many of their stories as so little has been written about their lives and heroic deeds. Many of them who live among us have been forgotten simply because information about them is not concentrated in one place or is just missing, meaning these stories cannot be passed on to future generations. And this relationship with the heroes of the past is fundamental to understanding ourselves and who we are. Heroes live as long as the nation remembers them, and in turn a nation lives by preserving its identity and recognizing heroes. None of our heroes should be forgotten. Our heroes deserve to live on in our memories and in our hearts. Support us in recognizing our heroes for the glory of their memory and honour their heroic deeds as a legacy for future generations.
                        </p>
                    <?php
                    }
                    if ($lang_dir == "am") {
                    ?>
                        <h3>Մեր տեսլականը</h3>
                        <p>Հայ ազգը իր պատմության ընթացքում ծնել է հազարավոր հայ հերոսներ, ովքեր հայրենիքի համար օրհասական պահերին իրենց կյանքն են զոհել մեր այսօրվա բարօրության համար։ Նրանց ճանաչելով ու նրանց սխրանքներով են կրթվել մեր սերունդները։ Բազմաթիվ մերօրյա հերոսներ` կամավորագրված զինվորներ, բժիշկներ, լրագրողներ, ուսուցիչներ, երաժիշտներ և վարորդներ ապրում են մեր կողքին։ Նրանք պատերազմի դաշտ են մտել առանց մեկ վայրկյան կասկածելու, որ իրենց ժամանակը, առողջությունը և մասնագիտական ունակությունները պիտի ներդրեն մեր հայրենիքի պաշտպանության համար։ Այսօր մենք նրանցից շատ քչերին ենք ճանաչում և շատ ավելի քչերի մասին ունենք հանրայնացված պատմություններ, որոնք կարող ենք փոխանցել մեր ապագա սերունդներին։ Հերոսները ապրում են, քանի դեռ ազգը հիշում է նրանց, իսկ ազգը չի կարող ապրել, պահպանելով իր ինքնությունը, եթե չունենա հերոսներ։ Ներկայացնե՛նք և ճանաչե՛նք մեր հերոսներին ի փառս նրանց հիշատակի, ի պատիվ իրենց իրականացրած սխրագործությունների և ի գիտություն ապագա սերունդների։
                        </p>
                    <?php
                    }
                    if ($lang_dir == "ru") {
                    ?>
                        <h3>НАШЕ ВИДЕНИЕ</h3>
                        <p>За всю свою историю армянский народ родил тысячи армянских героев, многие из которых пожертвовали своей жизнью ради нашего нынешнего благополучия. Однако сегодня мы знаем очень мало о них и их героических поступках, которые мы можем передать нашим будущим поколениям. Сегодня рядом с нами живут современные герои - солдаты-добровольцы, врачи, журналисты, учителя, музыканты, водители, которые вышли на поле боя, ни на минуту не сомневаясь, что они должны вкладывать свое время, здоровье и профессиональные навыки в защиту нашей Родины. Сегодня мы знаем очень мало из них, многие из них забыты, потому что информация о них не сосредоточена в одном месте, а зачастую даже отсутствует․․․ Герои живут до тех пор, пока нация их помнит, а нация не может жить, сохраняя свою идентичность, если у нее нет героев. Наша площадка призвана освещать жизнь и героический путь наших героев.

                        </p>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>


    </div>
    <div class='num_container'>
        <div class="by_numbers">
            <h3>By Numbers</h3>
            <div class="numbers_flex d-flex justify-content-between">

                <div class='numbers_flex_item'>
                    <h1 class='counter' data-target='<?php echo $array_result["autobiography"]; ?>'>0</h1>
                    <p> <?php
                        if ($lang_dir == "en") {
                            echo 'Biography';
                        }
                        if ($lang_dir == "am") {
                            echo 'Կենսագրություն';
                        }
                        if ($lang_dir == "ru") {
                            echo 'Биография';
                        }
                        ?>
                    </p>
                </div>
                <div class='numbers_flex_item'>
                    <h1 class='counter' data-target='<?php echo $array_result["users"]; ?>'>0</h1>
                    <p>
                        <?php
                        if ($lang_dir == "en") {
                            echo 'Users';
                        }
                        if ($lang_dir == "am") {
                            echo 'Օգտագործողներ';
                        }
                        if ($lang_dir == "ru") {
                            echo 'Пользователи';
                        }
                        ?>
                    </p>

                </div>
                <div class='numbers_flex_item'>
                    <h1 class='counter' data-targe='<?php echo $array_result['history']; ?>'>0</h1>
                    <p>
                        <?php
                        if ($lang_dir == "en") {
                            echo 'Article';
                        }
                        if ($lang_dir == "am") {
                            echo 'Հոդված';
                        }
                        if ($lang_dir == "ru") {
                            echo 'Статья';
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div </div>
        <div class="aims_flex d-flex justify-content-between">
            <div class="aims_flex_item1"></div>
            <div class="aims_flex_item2">
                <h3>
                    <?php
                    if ($lang_dir == "en") {
                        echo 'Our Goals';
                    }
                    if ($lang_dir == "am") {
                        echo 'Մեր նպատակները';
                    }
                    if ($lang_dir == "ru") {
                        echo 'Наши цели';
                    }
                    ?>
                </h3>
                <div class='aims_content'>
                    <div class="aims_content_flex d-flex justify-content-between">
                        <div class='aims_content_item1'>
                            <i class="fas fa-feather-alt"></i>
                        </div>
                        <div class='aims_content_item2'>
                            <?php
                            if ($lang_dir == "en") {
                                echo 'Creating a space available for anyone, where the stories of nowaday 
                        Armenian heroes and their heroic deeds are compiled to create an anthology 
                        remembering them and their lives. 
                        ';
                            }
                            if ($lang_dir == "am") {
                                echo 'Երկրի պաշտպանության, ազգային արժեքների ստեղծման և ամրապնդման գործում նշանակալի ներդրում 
                        ունեցած մարդկանց և հերոսների վերաբերյալ տեղեկատվության հավաքագրում, հրապարակում
                        և ճանաչելիության տարածում։';
                            }
                            if ($lang_dir == "ru") {
                                echo 'Сбор и распространение информациш о людях, 
                        внесших значительный вклад в создание и укрепление наших национальных ценностей.';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="aims_content_flex d-flex justify-content-between">
                        <div class='aims_content_item1'>
                            <i class="fas fa-feather-alt"></i>
                        </div>
                        <div class='aims_content_item2'>
                            <?php
                            if ($lang_dir == "en") {
                                echo 'Concentrating in one place a large amout of inforation of many heroes who 
                        live among us but 
                        have been forgotten simply because information about 
                        them is not available or is just missing.
                        ';
                            }
                            if ($lang_dir == "am") {
                                echo '"wiki" համակարգի ստեղծում և կատարելագործում, որտեղ ցանկացած գրանցված օգտատեր 
                        կարող է ավելացնել նյութ իր հայ հերոսների մասին։';
                            }
                            if ($lang_dir == "ru") {
                                echo 'Создание и развитие системы «вики», где любой зарегистрированный пользователь 
                        может добавить материал о своем герое.';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="aims_content_flex d-flex justify-content-between">
                        <div class='aims_content_item1'>
                            <i class="fas fa-feather-alt"></i>
                        </div>
                        <div class='aims_content_item2'>
                            <?php
                            if ($lang_dir == "en") {
                                echo 'Building a "wiki" system, 
                        where any registered user can add material about Armenian heroes (including soldiers, 
                        volunteers, doctors, journalists and other people who protected us and our country).
                        ';
                            }
                            if ($lang_dir == "am") {
                                echo 'Հերոսների մասին պատմող միասնական և հասանելի հարթակ ունենալու գաղափարի իրագործում։';
                            }
                            if ($lang_dir == "ru") {
                                echo 'Реализация идеи создания общей доступной информационной платформы о наших героях, 
                        во славу и в честь их подвигов.';
                            }
                            ?>
                        </div>
                    </div>


                    <div class="aims_content_flex d-flex justify-content-between">
                        <div class='aims_content_item1'>
                            <i class="fas fa-feather-alt"></i>
                        </div>
                        <div class='aims_content_item2'>
                            <?php
                            if ($lang_dir == "en") {
                                echo 'Strengthening our national values by promoting awareness about our heroes.
                        Passing these to future generations.';
                            }
                            if ($lang_dir == "am") {
                                echo 'Հայ հերոսների և նրանց հերոսական ճանապարհի լուսաբանելում։  Ոչ մի հայ հերոս չպետք է 
                        մոռացվի, ի փառս նրանց հիշատակի, ի պատիվ իրենց իրականացրած սխրագործությունների և
                         ի գիտություն ապագա սերունդների։
                        ';
                            }
                            if ($lang_dir == "ru") {
                                echo 'Создание и укрепление наших национальных ценностей путем повышения осведомленности о 
                        наших героях и передача будущим поколениям.';
                            }
                            ?>
                        </div>
                    </div>


                </div>
            </div>


        </div>

        <div class="carusel-partners">
            <?php
            include "../carousel/carousel.php";
            ?>
        </div>
        <!--  end cont-all  -->
        <!--  footer  -->
        <div class="container-fluid">
            <div class="row flex-column footer_row">
                <div class="col-sm-12 col-md-12 col-lg-12">

                    <?php
                    include "footer.php";
                    ?>
                </div>


            </div>
        </div>

        <!-- footer -->

        <script>
            $('.num_container').on('mouseenter', function() {
                const counters = document.querySelectorAll('.counter');
                counters.forEach(counter => {
                    const updateCount = () => {
                        const target = +counter.getAttribute('data-target');
                        const count = +counter.innerText;
                        if (count < target) {
                            counter.innerText = count + 1;
                            setTimeout(updateCount, 10);
                        } else {
                            count.innerText = target;
                        }

                    }
                    updateCount();
                })
            });
        </script>
        <script src="../carousel/vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="../carousel/js/main.js"></script>

        <script src="../js/home.js"></script>

</body>

</html>

</body>