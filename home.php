<?php
session_start();
include "../header.php";
include "../config/dbconfig.php";
// $sql_update_heroes = "SELECT a.article_id, a.title, a.description, i.image, u.fullname  FROM $autho_table a, autobiography_images i, users u WHERE a.article_id = i.article_id AND a.publication_status = 1 AND i.main = 1 AND a.user_id = u.id AND DATE(a.updated_date) IS NOT NULL order by DATE(a.updated_date) DESC limit 3";

// include '../lang_config.php';
// var_dump($lang_menu);
$autho_table = 'autobiography_articles_' . $lang_menu;
$history_table = 'history_articles_' . $lang_menu;

$todayIs = date("Y-m-d");
$monthIs = date('m');


$sql_birthdays = "SELECT a.article_id, a.name, a.description, i.image, u.fullname_am, u.fullname_ru, u.fullname_en FROM $autho_table a INNER JOIN autobiography_images i ON a.article_id = i.article_id INNER JOIN users u ON a.user_id = u.id WHERE i.main = 1 AND a.article_status = 1 AND a.birth_day LIKE '%-" . $monthIs . "-%' group by a.article_id";
$result_birthday = mysqli_query($con, $sql_birthdays);
// var_dump($result_birthday);
// $sql_events = "SELECT a.article_id, a.title, a.description, i.image, u.fullname FROM autobiography_articles_default a INNER JOIN autobiography_images i ON a.article_id = i.article_id INNER JOIN users u ON a.user_id = u.id WHERE i.main = 1 AND a.birth_day = '" . $todayIs . "' group by a.article_id limit 3";
// $result_event = mysqli_query($con, $sql_events);

$sql_update_events = "SELECT a.article_id, a.title, a.description, i.image, u.fullname_am, u.fullname_ru, u.fullname_en FROM $history_table a INNER JOIN history_images i ON a.article_id = i.article_id INNER JOIN users u ON a.user_id = u.id WHERE i.main = 1 AND a.article_status = 1 AND DATE(a.created_date) IS NOT NULL order by DATE(a.created_date) DESC limit 3";
$result_update_events = mysqli_query($con, $sql_update_events);



$sql_update_heroes = "SELECT a.article_id, a.name, a.description, i.image, u.fullname_am, u.fullname_ru, u.fullname_en FROM $autho_table a INNER JOIN autobiography_images i ON a.article_id = i.article_id INNER JOIN users u ON a.user_id = u.id WHERE i.main = 1 AND a.article_status = 1 AND DATE(a.created_date) IS NOT NULL order by DATE(a.created_date) DESC limit 3";
$result_update_heroes = mysqli_query($con, $sql_update_heroes);

$sql_most_views = "SELECT a.article_id, a.name, a.description, i.image, u.fullname_am, u.fullname_ru, u.fullname_en FROM $autho_table a INNER JOIN autobiography_images i ON a.article_id = i.article_id INNER JOIN users u ON a.user_id = u.id WHERE i.main = 1 AND a.article_status = 1 order by number_of_views DESC limit 10";
$result_most_views = mysqli_query($con, $sql_most_views);



// $sql_last_created = "SELECT a.created_date, a.article_id, a.title, a.description, i.image, u.fullname FROM autobiography_articles_default a, autobiography_images i, users u where a.article_id = i.article_id and a.user_id = u.id and i.main = 1 AND DATE(a.created_date) IS NOT NULL group by a.article_id order by DATE(a.created_date) DESC limit 3";
// $result_birthday = mysqli_query($con, $sql_birthdays);
// var_dump($result_update_events);
?>

<link rel="styleshettps://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="../carousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="../carousel/css/style.css">
<link rel="stylesheet" href="../css/navbar.css">
<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="../css/footer.css">
<script src='https://www.google.com/recaptcha/api.js'></script>

<title>

    Armheroes Homepage

</title>

</head>

<body>
    <!-- commit -->
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

                <div class='center'>
                    <?php
                    if ($lang_dir == "am") {
                        echo "Բարի գալուստ «Հայ Հերոս» նախագիծ: Մեր հարթակը կոչված է ներկայացնելու մեր հերոսներին և նրանց հերոսական ուղին: Մենք արդեն հավաքագրել ենք բազմաթիվ կենսագրական և փաստագրական նյութեր նրանց մասին, բայց դու էլ կարող ես պատմել Քո Հերոսի մասին: Սեղմի՛ր «Ստեղծել նոր հոդված» կոճակը և պատմի՛ր մեզ նրա մասին:";
                    }
                    if ($lang_dir == "en") {
                        echo "Welcome to the “Arm Hero” Project! Our platform is called to present our heroes and their heroic pathway. We have already collected a lot of biographical and documentary materials about them, but you can tell us about Your Hero. Click on the “Write Your Story” button and start writing";
                    }
                    if ($lang_dir == "ru") {
                        echo "Проект «Армянский герой» приветствует вас! Наша площадка призвана освещать жизнь и героический путь наших героев. Мы уже инициировали сборы биографических и документальных материалов о них, но вы тоже можете рассказать нам о Вашем Герое. Нажмите на кнопку “Создать новую статью” и расскажите нам о нем. ";
                    }
                    ?>

                    <div class="largedonate">
                        <a href="../<?php echo $lang_dir ?>/add-history-article.php" id="history_create">
                            <button class="btn1 btnlarge">
                                <?php
                                if ($lang_dir == "am") {
                                    echo "Ստեղծել նոր հոդված";
                                }
                                if ($lang_dir == "en") {
                                    echo "Write Your Story";
                                }
                                if ($lang_dir == "ru") {
                                    echo "Создать новую статью";
                                }
                                ?>

                            </button>
                        </a>
                    </div>
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

        <div class="flexmiddle d-flex">
            <div class="flexmiddle-item1 flexmidlle-margin-right">
                <?php
                if ($lang_dir == "am") {

                ?>
                    <div class="flexmiddle-text-caption ">
                        Մեր մասին
                    </div>
                    <div class="flexmiddle-text">
                        «Հայ Հերոս» հարթակը շահույթ չհետապնդող սոցիալական նախագիծ է, որը կոչված է մեր երկրի պաշտպանության, ազգային արժեքների ստեղծման և ամրապնդման գործում նշանակալի ներդրում ունեցած մարդկանց և հերոսների վերաբերյալ տեղեկատվության հավաքագրմանը, հրապարակմանը և ճանաչելիության տարածմանը։
                        Միացեք մեր հարթակին՝ միասին լուսաբանենք հայ հերոսներին և նրանց հերոսական ճանապարհը։

                    </div>
                    <a href="aboutpage.php"><button class='btn2-reverse'>Իմանալ ավելին</button></a>
                <?php
                }
                ?>

                <?php
                if ($lang_dir == "en") {

                ?>
                    <div class="flexmiddle-text-caption ">
                        What We Do
                    </div>
                    <div class="flexmiddle-text">
                        The "Arm Hero" platform is a non-profit project that seeks to collect and disseminate information and promote awareness about our heroes, who have moulded us into who we are today, creating and strengthening our national values. It is built as a "wiki" system, where any registered user can add material about Armenian heroes (including soldiers, volunteers, doctors, journalists and other people who protected us and our country).
                        We appeal to all those who are interested in joining our initiative, to support the armhero.org project. Join and help us enhance the quality of the project and safeguard against potential cybersecurity problems. We will appreciate any and all contributions.

                    </div>
                    <a href="aboutpage.php"><button class='btn2-reverse'>Learn More</button></a>
                <?php
                }
                ?>

                <?php
                if ($lang_dir == "ru") {

                ?>
                    <div class="flexmiddle-text-caption ">
                        О ПРОЕКТЕ
                    </div>
                    <div class="flexmiddle-text">
                        Платформа «Армянский герой» призвана собирать и распространять информацию о людях, внесших значительный вклад в создание и укрепление наших национальных ценностей. Мы инициировали сборы материалов об армянских героях (aвтобиографические и документальные). Наша платформа создана как система «вики», где любой зарегистрированный пользователь может добавить материал о своем герое. Мы не имеем права забывать ни об одном герое: Мы создаем контент во славу и памяти наших героев, в честь их подвигов и во имя будущих поколений.

                    </div>
                    <a href="aboutpage.php"><button class='btn2-reverse'>Узнать больше</button></a>
                <?php
                }
                ?>


            </div>
            <div class="flexmiddle-item2">
            </div>
        </div>
        


        <!-- birthday-flex-all -->

        <?php
        if ((mysqli_num_rows($result_birthday) < 4) && (mysqli_num_rows($result_birthday) > 0)) {
        ?>
            <div class="birthday-flex d-flex">
                <div class="birthday-flex-item1">
                    <div class="flexaftermiddle-item-caption">
                        <?php
                        if ($lang_dir == "am") {
                        ?>
                            <span class='red'> Ամսվա </span>ծննդյան օրեր
                        <?php
                        }
                        if ($lang_dir == "en") {
                        ?>
                            <span class='red'> Birthday </span> of the month
                        <?php
                        }
                        if ($lang_dir == "ru") {
                        ?>
                            </span> месяца
                            <span class='red'> Дни рождения </span> месяца
                        <?php
                        }
                        ?>

                    </div>

                </div>

                <div class="birthday-flex-item2 d-flex">
                    <!-- item !!!!!!!!!!!!!-->
                    <?php
                    while ($sql_birthdays = mysqli_fetch_assoc($result_birthday)) {
                    ?>

                        <div class="birthday-flex-item2-item">
                            <div class="birthday-image-div" style="background-image: url('../autobiography-articles-images/<?php echo $sql_birthdays['article_id'] . "/" . $sql_birthdays['image'] ?>'); height:300px;">

                            </div>
                            <div class="item-card">
                                <div class="item-card-author">
                                    <?php
                                        if ($lang_dir == "am") {
                                            echo "Հեղինակ՝ " . $sql_birthdays['fullname_am'];
                                        }
                                        if ($lang_dir == "en") {
                                            echo "by " . $sql_birthdays['fullname_en'];
                                        }
                                        if ($lang_dir == "ru") {
                                            echo "Автор: " . $sql_birthdays['fullname_ru'];
                                        }
                                    ?>
                                </div>
                                <div class="item-card-title">
                                    <?php
                                    echo $sql_birthdays['name'];
                                    ?>
                                </div>
                                <div class="item-card-text">
                                    <?php
                                    echo $sql_birthdays['description'];
                                    ?>
                                </div>
                                <div class="red-line">
                                </div>
                                <a  class='no_dec' href='auth-article-read.php?code=<?php echo $sql_birthdays['article_id']; ?>'> 
                                <?php
                                    if ($lang_dir == "am") {
                                        echo "Կարդալ";
                                    }
                                    if ($lang_dir == "en") {
                                        echo 'Read More';
                                    }
                                    if ($lang_dir == "ru")
                                        echo 'Подробнее';
                                ?> 
                                </a>                          
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                    <!--end items -->

                </div>
            </div>

        <?php
        } else if ((mysqli_num_rows($result_birthday) > 0) && (mysqli_num_rows($result_birthday) > 3)) {

        ?>
            <div class="birthday-flex d-flex">
                <div class="birthday-flex-item1-car">
                    <?php
                    if ($lang_dir == "am") {
                    ?>
                        <div class="flexaftermiddle-item-caption">
                            <span class='red'>Ամսվա </span> ծննդյան օրեր
                        </div>
                    <?php
                    }
                    if ($lang_dir == "en") {
                    ?>
                        <div class="flexaftermiddle-item-caption">
                            <span class='red'> Birthday </span> of the day
                        </div>
                    <?php
                    }
                    if ($lang_dir == "ru") {
                    ?>
                        <div class="flexaftermiddle-item-caption">
                            <span class='red'> Дни рождения </span> месяца
                        </div>

                    <?php
                    }
                    ?>
                </div>
                <div class="carusel-birthdays">
                    <?php
                    include "../carousel/birthdays.php";
                    ?>
                </div>
            </div>
        <?php

        } else {
            echo '';
        }
        ?>
        <!--end birthday-flex-all -->




        <!-- most read -->
        <?php
        if (mysqli_num_rows($result_most_views) > 0) {

        ?>
            <div class="birthday-flex d-flex">
                <div class="birthday-flex-item1-car">
                    <?php
                    if ($lang_dir == "am") {
                    ?>
                        <div class="flexaftermiddle-item-caption">
                            <span class='red'>Ամենաշատ </span> դիտումներ
                        </div>
                    <?php
                    }
                    if ($lang_dir == "en") {
                    ?>
                        <div class="flexaftermiddle-item-caption">
                            <span class='red'> Most </span> viewed
                        </div>
                    <?php
                    }
                    if ($lang_dir == "ru") {
                    ?>
                        <div class="flexaftermiddle-item-caption">
                            <span class='red'> Самые </span> просматриваемые
                        </div>

                    <?php
                    }
                    ?>

                </div>
                <div class="carusel-birthdays">
                    <?php
                    include "../carousel/viewed.php";
                    ?>
                </div>
            </div>
        <?php

        } else {
            echo '';
        }
        ?>

        <!--end  most read -->
        <!-- <--last added-->

        <div class="last-edited">
            <div class="last-edited-caption">
                <?php
                if ($lang_dir == "am") {
                    echo "Վերջին հրապարակված հոդվածները";
                }
                if ($lang_dir == "en") {
                    echo "Last posted articles";
                }
                if ($lang_dir == "ru") {
                    echo "Последние опубликованные статьи";
                }
                ?>


            </div>
            <div class="chose-ev-or-hero">
                <ul class="nav nav-pills" role="tablist">
                    <?php
                    if ($lang_dir == "am") {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#hero-id">
                                Կենսագրություն
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#event-id">
                                Հոդված
                            </a>
                        </li>
                    <?php
                    }
                    if ($lang_dir == "en") {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#hero-id">
                                Biography
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#event-id">
                                Article
                            </a>
                        </li>
                    <?php
                    }
                    if ($lang_dir == "ru") {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#hero-id">
                                Биография
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#event-id">
                                Статья
                            </a>
                        </li>
                    <?php
                    }
                    ?>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="hero-id" class="tab-pane active">
                        <div class="hero-flex d-flex">
                            <?php
                            if (mysqli_num_rows($result_update_heroes) > 0) {
                                while ($sql_update_heroes = mysqli_fetch_assoc($result_update_heroes)) {
                            ?>

                                    <div class="hero-flex-item">
                                        <div class="image_hero_update_div" style="background-image: url('../autobiography-articles-images/<?php echo $sql_update_heroes['article_id'] . "/" . $sql_update_heroes['image'] ?>');">

                                        </div>
                                        <div class="item-card">
                                            <div class="item-card-title">
                                                <?php echo $sql_update_heroes['name'] ?>
                                            </div>
                                            <div class="item-card-text">
                                                <?php echo $sql_update_heroes['description'] ?>
                                            </div>
                                            <div class="red-line">
                                            </div>
                                            <a  class='no_dec' href='auth-article-read.php?code=<?php echo $sql_update_heroes['article_id']; ?>'> 
                                                <?php
                                                    if ($lang_dir == "am") {
                                                        echo "Կարդալ";
                                                    }
                                                    if ($lang_dir == "en") {
                                                        echo 'Read More';
                                                    }
                                                    if ($lang_dir == "ru")
                                                        echo 'Подробнее';
                                                ?>
                                            </a>

                                        </div>
                                    </div>
                                <?php
                                }
                            } else {

                                if ($lang_menu == "en") {
                                ?>
                                    <h2 class='no_article'>There is no content in this section yet.</h2>
                                <?php
                                }
                                if ($lang_menu == "am") {
                                ?>
                                    <h2 class='no_article'>Այս բաժնում դեռ հրապարակում չկա:</h2>
                                <?php
                                }
                                if ($lang_menu == "ru") {
                                ?>
                                    <h2 class='no_article'>Публикаций в этом разделе пока нет.</h2>
                            <?php
                                }
                            }
                            ?>
                            <!-- end item -->
                        </div>
                    </div>
                    <!-- end hero-id -->


                    <!-- event-id -->
                    <div id="event-id" class="tab-pane">
                        <div class="hero-flex d-flex">
                            <?php
                            if (mysqli_num_rows($result_update_events) > 0) {
                                while ($sql_update_events = mysqli_fetch_assoc($result_update_events)) {
                            ?>
                                    <div class="hero-flex-item">
                                        <div class="image_hero_update_div" style="background-image: url('../history-articles-images/<?php echo $sql_update_events['article_id'] . "/" . $sql_update_events['image'] ?>');">

                                        </div>
                                        <div class="item-card">
                                            <div class="item-card-title">
                                                <?php echo $sql_update_events['title'] ?>
                                            </div>
                                            <div class="item-card-text">
                                                <?php echo $sql_update_events['description'] ?>
                                            </div>
                                            <div class="red-line">
                                            </div>
                                            <p>hist-article-read.php?code=<?php echo $sql_update_events['article_id']; ?></p>
                                            <a  class='no_dec' href='history_read.php?code=<?php echo $sql_update_events['article_id']; ?>'> 
                                                <?php
                                                    if ($lang_dir == "am") {
                                                        echo "Կարդալ";
                                                    }
                                                    if ($lang_dir == "en") {
                                                        echo 'Read More';
                                                    }
                                                    if ($lang_dir == "ru")
                                                        echo 'Подробнее';
                                                ?>
                                            </a>

                                        </div>
                                    </div>
                                <?php
                                }
                            } else {

                                if ($lang_menu == "en") {
                                ?>
                                    <h2 class='no_article'>There is no content in this section yet.</h2>
                                <?php
                                }
                                if ($lang_menu == "am") {
                                ?>
                                    <h2 class='no_article'>Այս բաժնում դեռ հրապարակում չկա:</h2>
                                <?php
                                }
                                if ($lang_menu == "ru") {
                                ?>
                                    <h2 class='no_article'>Публикаций в этом разделе пока нет.</h2>
                            <?php
                                }
                            }
                            ?>
                            <!-- end item -->
                        </div>
                    </div>
                    <!-- end event-id -->
                </div>
                <!-- tab-content -->
            </div>
        </div>
        <!-- last-edited -->


        <div class="carusel-partners">
            <?php
            include "../carousel/carousel.php";
            ?>
        </div>
        <!--end carusel-partners -->
        <div class='contact-sec'>
            <div class="contact-flex d-flex">
                <div class="contact-flex-item1">
                </div>
                <div class="contact-flex-item2">
                    <div class="contact-title">
                        <?php
                        if ($lang_dir == "am") {
                            echo "Կապ մեզ հետ";
                        }
                        if ($lang_dir == "en") {
                            echo "Contact Us";
                        }
                        if ($lang_dir == "ru") {
                            echo "Связь с нами";
                        }
                        ?>

                    </div>
                    <div class="contact-inputs">
                        <input type="text" class="form-control form-control1 required" placeholder='<?php
                                                                                                    if ($lang_dir == "am") {
                                                                                                        echo "Ձեր անունը";
                                                                                                    }
                                                                                                    if ($lang_dir == "en") {
                                                                                                        echo "Your Name";
                                                                                                    }
                                                                                                    if ($lang_dir == "ru") {
                                                                                                        echo "Ваше имя";
                                                                                                    }
                                                                                                    ?>' id='contact-name'>
                        <div class="errorName err-m"></div>
                        <input type="text" class="form-control form-control1 required" placeholder='<?php
                                                                                                    if ($lang_dir == "am") {
                                                                                                        echo "Ձեր էլ.փոստը";
                                                                                                    }
                                                                                                    if ($lang_dir == "en") {
                                                                                                        echo "Your Email";
                                                                                                    }
                                                                                                    if ($lang_dir == "ru") {
                                                                                                        echo "Ваш адрес эл. почты";
                                                                                                    }
                                                                                                    ?>' id='contact-mail'>
                        <div class="errorMail err-m"></div>
                        <textarea rows="4" placeholder="<?php
                                                        if ($lang_dir == "am") {
                                                            echo "Հաղորդագրություն";
                                                        }
                                                        if ($lang_dir == "en") {
                                                            echo "Message";
                                                        }
                                                        if ($lang_dir == "ru") {
                                                            echo "Сообщение";
                                                        }
                                                        ?>" class='form-control form-control1 required' id='contact-text'></textarea>
                        <div class="errorText err-m"></div>
                        <button class='btn1 mt-3' id='cont-us'>
                            <?php
                            if ($lang_dir == "am") {
                                echo "Ուղարկել";
                            }
                            if ($lang_dir == "en") {
                                echo "Send";
                            }
                            if ($lang_dir == "ru") {
                                echo "Отправить";
                            }
                            ?>

                        </button>
                        <div class="cont-success"></div>
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
            </div>
            <!-- end-contact-sec -->


        </div>
        <?php
        include "footer.php";
        ?>
        <!-- footer -->
    </div>

    <!-- cont all -->
    <script src="../carousel/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="../carousel/js/main.js"></script>
    <script src="../js/home.js"></script>
    <script src="../js/first-article.js"></script>
    <!-- <script src="../js/navbar.js"></script> -->
    <script>
        // $('body').on('click', 'a', function(e) {
        //     e.preventDefault();

        //     alert('hi');
        // });
    </script>
</body>

</html>