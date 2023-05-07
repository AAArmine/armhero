<?php

include "header.php";
//include "single_article.php";
include "config/dbconfig.php";
include "lang_config.php";

$article_id = $_GET['code'];
echo 'jj vfdfgd';
echo $article_id;
    $sql = "SELECT * FROM $article_table INNER JOIN users ON $article_table.user_id = users.id INNER JOIN $art_img_table ON $article_table.article_id = $art_img_table.article_id WHERE $article_table.article_id='$article_id'";
    $result = $con->query($sql);
//    var_dump($article_table,$article_id,$art_img_table);
    if ($result->num_rows > 0) {

        $article_img_array = [];
        $article_main_img = "";
        $selected_article = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($selected_article as $s) {
            if ($s['main'] == 0) {

                array_push($article_img_array, $s['image']);

            } else {

                $article_main_img = $s['image'];

            }


        }
        for ($i = 1; $i <= 3; $i++) {

            $internal_name = 'name_internal_href_' . $i;
            $interenal_link = 'href_internal_' . $i;
            if (!empty($selected_article[0][$internal_name])) {

                $name_link_i = $selected_article[0][$internal_name];
                $link_i = $selected_article[0][$interenal_link];
                $internal_array[$name_link_i] = $link_i;

            }
            $external_name = 'name_external_href_' . $i;
            $external_link = 'href_external_' . $i;
            if (!empty($selected_article[0][$external_name])) {

                $name_link_e = $selected_article[0][$external_name];
                $link_e = $selected_article[0][$external_link];
                $external_array[$name_link_e] = $link_e;

            }

        }

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="../carousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="../carousel/css/style1.css">
<link rel="stylesheet" href="../css/navbar.css">

<link rel="stylesheet" href="../css/footer.css">
<link rel="stylesheet" href="../css/read-article.css">
<link rel="stylesheet" href="../css/account.css">


<title>Read article</title>

</head>

<body>
<!-- commit -->

<div class="cont-all">
    <?php
    include "whitenav.php";
    ?>
    <?php
    include "navbar.php";
    ?>

    <div class="middle-main">
        <div class="article-author">
            <div class="article-author-name">
                <?php
echo 'jj vfdfgd';
                if ($lang_menu == "am") {
                    if ($selected_article[0]['fullname_am']) {

                        echo $selected_article[0]['fullname_am'];

                    } else {

                        echo $selected_article[0]['fullname'];

                    }
                }
                if ($lang_menu == "en") {
                    if ($selected_article[0]['fullname_en']) {

                        echo $selected_article[0]['fullname_en'];

                    } else {

                        echo $selected_article[0]['fullname'];

                    }
                }
                if ($lang_menu == "ru") {
                    if ($selected_article[0]['fullname_ru']) {

                        echo $selected_article[0]['fullname_ru'];

                    } else {

                        echo $selected_article[0]['fullname'];

                    }
                }
                ?>

            </div>
            <div class="article-author-date">
                <span class="article-author-date"><?php echo $selected_article[0]['created_date'] ?></span>
                <span class="circle-divider"><i class="fas fa-circle"></i></span>
                <span class="article-author-view">
                    <?php if ($selected_article[0]['number_of_views'] == null) : ?>
                        <?php echo "0" ?>
                    <?php else: ?>
                        <?php echo $selected_article[0]['number_of_views'] ?>
                    <?php endif; ?>

                    <?php
                    if ($lang_menu == "am") {
                        echo "դիտում";
                    }
                    if ($lang_menu == "en") {
                        echo "views";
                    }
                    if ($lang_menu == "ru") {
                        echo "просмотров";
                    }
                    ?>

                    </span>
            </div>
            <hr>
        </div>
        <div class="article-main-caption">
            <?php
            if (isset($selected_article[0]['name'])) {

                echo $selected_article[0]['name'];

            } else {

                echo $selected_article[0]['title'];

            }

            ?>
            <!-- <span class='pencil'><i class="fas fa-pencil-alt"></i> -->
        </div>
        <div class="mainFlex-article d-flex">
            <div class="mainFlex-article-item1">
                <div class="article-main-image-div">

                    <img src="../<?php echo $_SESSION['article_type'] ?>-articles-images/<?php echo $_SESSION['article_id'] ?>/<?php echo $article_main_img ?>"
                         class="read_main_img">
                </div>

                <div class='section-part'>
                    <div class="under-caption">
                        <!-- Ընդհանուր տեղեկություններ -->
                    </div>

                    <hr>
                    <div class="article-text">
                        <?php
                        echo $selected_article[0]['description'];

                        ?>


                        <div class='ml-3 pb-2 towritepage'>
                            <?php
                            if ($lang_menu == "am") {
                                echo "Դու էլ կարող ես ավելացնել քո հերոսի պատմությունը հետևյալ <a href='writestory.php'>հղումով</a>։";
                            }
                            if ($lang_menu == "en") {
                                echo "You can add a story about YOUR hero by simply following this <a href='writestory.php'>link</a>.";
                            }
                            if ($lang_menu == "ru") {
                                echo "Мы не имеем права забывать ни об одном нашем герое: вы тоже можете добавить материал о своем герое <a href='writestory.php'>по ссылке</a>.";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="<?php if (count($article_img_array) == 3) : ?> images_container3 <?php else: ?> images_container <?php endif; ?>">

                    <?php if (!empty($article_img_array)) : ?>
                        <?php for ($i = 0; $i < count($article_img_array); $i++) : ?>
                            <div class="ml-3 <?php if (count($article_img_array) > 3) : ?>mt-2<?php endif; ?> article-image-div"
                                 style="background-image: url('../<?php echo $_SESSION['article_type'] ?>-articles-images/<?php echo $_SESSION['article_id'] ?>/<?php echo $article_img_array[$i] ?>');background-repeat: no-repeat;background-position: center;background-size: cover">
                                <!--                                <img src="../-->
                                <?php //echo $_SESSION['article_type'] ?><!---articles-images/-->
                                <?php //echo $_SESSION['article_id'] ?><!--/-->
                                <?php //echo $article_img_array[$i] ?><!--"-->
                                <!--                                     alt="img_art" class="article-main-image">-->

                            </div>
                        <?php endfor; ?>
                    <?php endif; ?>
                </div>


                <!-- resources sec-->
                <div class="resources">
                    <div class="under-caption mt-5">
                        <?php
                        if ($lang_menu == "am") {
                            echo "Նյութի աղբյուրներ՝";
                        }
                        if ($lang_menu == "en") {
                            echo "Material sources";
                        }
                        if ($lang_menu == "ru") {
                            echo " Источники материалов";
                        }
                        ?>

                    </div>
                    <hr>
                    <?php if (!empty($internal_array)): ?>
                        <h6 class="link_type">
                            <?php
                            if ($lang_menu == "am") {
                                echo "Ներքին Հղումներ";
                            }
                            if ($lang_menu == "en") {
                                echo "Internal Links";
                            }
                            if ($lang_menu == "ru") {
                                echo "Внутренние Ссылки";
                            }
                            ?>
                        </h6>
                    <?php endif; ?>

                    <?php foreach ($internal_array as $key => $value) : ?>
                        <?php if (!empty($key) && !empty($value)) : ?>
                            <?php $c = 1; ?>


                            <div class="article-text d-flex">
                                <p class="link_name"><?php echo $c ?>. <?php echo $key ?></p>
                                <a rel="nofollow" class="ml-3 external text"
                                   href="<?php echo $value ?>">
                                    <?php echo $value ?>
                                </a>
                                <?php
                                $c++
                                ?>
                            </div>

                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if (!empty($external_array)): ?>
                        <h6 class="link_type">
                            <?php
                            if ($lang_menu == "am") {
                                echo "Արտաքին Հղումներ";
                            }
                            if ($lang_menu == "en") {
                                echo "External Links";
                            }
                            if ($lang_menu == "ru") {
                                echo "Внешние Ссылки";
                            }
                            ?>
                        </h6>
                    <?php endif; ?>
                    <?php foreach ($external_array as $key => $value) : ?>
                        <?php if (!empty($key) && !empty($value)) : ?>
                            <?php $c = 1; ?>


                            <div class="article-text d-flex">
                                <p class="link_name"><?php echo $c ?>. <?php echo $key ?></p>
                                <a rel="nofollow" class="ml-3 external text"
                                   href="<?php echo $value ?>">
                                    <?php echo $value ?>
                                </a>
                                <?php
                                $c++
                                ?>
                            </div>

                        <?php endif; ?>
                    <?php endforeach; ?>
                    <!--                    <div class="article-text mt-2">-->
                    <!--                        2․ <a rel="nofollow" class="external text" href="https://hetq.am/hy/article/125515">-->
                    <!--                            --><?php
                    //                            if ($lang_menu == "am") {
                    //                                echo "«Ֆիզուլիի և Ջաբրայիլի հատվածում հայտնաբերվել է ևս 41 զինծառայողի աճյուն. Արցախի ԱԻ ծառայություն»</a>։ 17 դեկտեմբերի, 2020";
                    //                            }
                    //                            if ($lang_menu == "en") {
                    //                                echo "\"The bodies of 41 servicemen were found in the Jabrail section of Fizuli. Artsakh Emergency Service\".</a>
                    //                                December 17, 2020";
                    //                            }
                    //                            if ($lang_menu == "ru") {
                    //                                echo "«В Джебраильском районе Физули были обнаружены тела 41 военнослужащих. Арцахская служба экстренной помощи»</a> 17 декабря, 2020г.";
                    //                            }
                    //                            ?>
                    <!---->
                    <!---->
                    <!--                    </div>-->
                </div>
                <!-- comments sec -->
                <!--                <div class="leave-comment mt-5">-->
                <!--                    <div class="under-caption">-->
                <!--                        --><?php
                //                        if ($lang_menu == "am") {
                //                            echo "Թողնել մեկնաբանություն";
                //                        }
                //                        if ($lang_menu == "en") {
                //                            echo "Leave a comment";
                //                        }
                //                        if ($lang_menu == "ru") {
                //                            echo "Оставить комментарий";
                //                        }
                //                        ?>
                <!--                    </div>-->
                <!--                    <input type="text" class="form-control comment-inp" id='comment-input'>-->
                <!--                    <div class="sent-message"></div>-->
                <!--                    <div class="error-message"></div>-->
                <!--                    <div class="right-buttons">-->
                <!--                        <button class="delete-comment" id='delete-comment'>-->
                <!--                            --><?php
                //                            if ($lang_menu == "am") {
                //                                echo "Չեղարկել";
                //                            }
                //                            if ($lang_menu == "en") {
                //                                echo "Cancel";
                //                            }
                //                            if ($lang_menu == "ru") {
                //                                echo "Отменить";
                //                            }
                //                            ?>
                <!---->
                <!--                        </button>-->
                <!--                        <button class="btn1" id='send-comment'>-->
                <!--                            --><?php
                //                            if ($lang_menu == "am") {
                //                                echo "Ուղարկել";
                //                            }
                //                            if ($lang_menu == "en") {
                //                                echo "Send";
                //                            }
                //                            if ($lang_menu == "ru") {
                //                                echo "Отправить";
                //                            }
                //                            ?>
                <!---->
                <!--                        </button>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!-- share part -->
                <div class="dropdown share-abs">
                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"><img
                                src='../Icons/share.png' class='share-img'>
                        <span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu dropdown-menu2">
                        <li>
                            <a href="https://www.facebook.com/sharer/sharer.php?app_id=1204128296666901&sdk=joey&u=https://www.armhero.org/en/article-first.php"
                               onclick="return !window.open(this.href, 'Facebook', 'width=620,height=420')"><img
                                        src="../Icons/facebook.png" class="soc-icon"></img></a></li>
                        <li>
                            <a href="#"
                               onclick="window.open('http://twitter.com/share?url=https://www.armhero.org/en/article-first.php&via=armhero&text=about Armheroes', 'Twitter Share', 'width=620, height=420'); return false;">
                                <img src="../Icons/twitter.png" class="soc-icon"></img>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&url=https://www.armhero.org/en/article-first.php&title=Read article&summary=armhero.org&source=ArmenianHeroes', 'LinkedIn Share', 'width=620, height=420'); return false;">
                                <img src="../Icons/in.png" class="soc-icon"></img>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               onclick="window.open('http://vk.com/share.php?url=http://www.armhero.org/en/article-first.php&title=Read article&summary=armhero.org&source=ArmenianHeroes', 'VK Share', 'width=620, height=420'); return false;">
                                <img src="../Icons/vk.png" class="soc-icon"></img>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               onclick="window.open('http://armhero.org/share-link.php?val=https://armhero.org<?php
                               echo $_SERVER['REQUEST_URI'];
                               ?>', 'Link Share', 'width=620, height=420'); return false;">
                                <img src="../Icons/link-icon.png" class="soc-icon"></img>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- end share -->
            </div>

            <!-- right part of flex -->
            <!--            <div class="mainFlex-article-item2">-->
            <!--                <div class="mainFlex-article-item-caption">-->
            <!--                    --><?php
            //                    if ($lang_menu == "am") {
            //                        echo "Վերջին ավելացված հոդվածներ";
            //                    }
            //                    if ($lang_menu == "en") {
            //                        echo "Recently Added Articles";
            //                    }
            //                    if ($lang_menu == "ru") {
            //                        echo "Недавно добавленные статьи";
            //                    }
            //                    ?>
            <!--                </div>-->
            <!---->
            <!--                <div class="last-article d-flex">-->
            <!--                    <div class="last-article-item1">-->
            <!--                        <img class="last-article-item1-img" src='../images/avatar.jpg'>-->
            <!--                    </div>-->
            <!--                    <div class="last-article-item2">-->
            <!--                        <div class="last-article-item2-caption">-->
            <!--                            --><?php
            //                            if ($lang_menu == "am") {
            //                                echo "Անանուն Հերոս";
            //                            }
            //                            if ($lang_menu == "en") {
            //                                echo "Anonymous Hero";
            //                            }
            //                            if ($lang_menu == "ru") {
            //                                echo "Анонимный герой";
            //                            }
            //                            ?>
            <!--                        </div>-->
            <!--                        <div class="last-article-item2-author">-->
            <!--                            --><?php
            //                            if ($lang_menu == "am") {
            //                                echo "Օգնեք մեզ պատմենք մեր հերոսների մասին՝ ստեղծելով հոդված։";
            //                            }
            //                            if ($lang_menu == "en") {
            //                                echo "Help us tell about our heroes by creating an article.";
            //                            }
            //                            if ($lang_menu == "ru") {
            //                                echo "Помогите нам рассказать о наших героях, написав статью.";
            //                            }
            //                            ?>
            <!--                        </div>-->
            <!--                    </div>-->
            <!---->
            <!--                     keep the model content !!!!!!!-->
            <!---->
            <!--                    <div class="last-article-item2">-->
            <!--                            <div class="last-article-item2-caption">-->
            <!--                            Lorem Ipsum-ը-->
            <!--                            մոդելային տեքստ է:-->
            <!--                            </div>-->
            <!--                            <div class="last-article-item2-date">-->
            <!--                            2020, 3 մարտ-->
            <!--                            </div>-->
            <!--                            <div class="last-article-item2-author">-->
            <!--                            Nick Miroff-ի կողմից-->
            <!--                            </div>-->
            <!--                            <div class="last-article-item2-more">-->
            <!--                                <a href='#'>Read More</a>-->
            <!--                            </div>-->
            <!--                        </div> -->
            <!---->
            <!--                </div>-->
            <!--                <div class="last-article d-flex">-->
            <!--                    <div class="last-article-item1">-->
            <!--                        <img class="last-article-item1-img" src='../images/avatar.jpg'>-->
            <!--                    </div>-->
            <!--                    <div class="last-article-item2">-->
            <!--                        <div class="last-article-item2-caption">-->
            <!--                            --><?php
            //                            if ($lang_menu == "am") {
            //                                echo "Անանուն Հերոս";
            //                            }
            //                            if ($lang_menu == "en") {
            //                                echo "Anonymous Hero";
            //                            }
            //                            if ($lang_menu == "ru") {
            //                                echo "Анонимный герой";
            //                            }
            //                            ?>
            <!--                        </div>-->
            <!--                        <div class="last-article-item2-author">-->
            <!--                            --><?php
            //                            if ($lang_menu == "am") {
            //                                echo "Օգնեք մեզ պատմենք մեր հերոսների մասին՝ ստեղծելով հոդված։";
            //                            }
            //                            if ($lang_menu == "en") {
            //                                echo "Help us tell about our heroes by creating an article.";
            //                            }
            //                            if ($lang_menu == "ru") {
            //                                echo "Помогите нам рассказать о наших героях, написав статью.";
            //                            }
            //                            ?>
            <!--                        </div>-->
            <!--                    </div>-->
            <!---->
            <!--                </div>-->
            <!--                <div class="last-article d-flex">-->
            <!--                    <div class="last-article-item1">-->
            <!--                        <img class="last-article-item1-img" src='../images/avatar.jpg'>-->
            <!--                    </div>-->
            <!--                    <div class="last-article-item2">-->
            <!--                        <div class="last-article-item2-caption">-->
            <!--                            --><?php
            //                            if ($lang_menu == "am") {
            //                                echo "Անանուն Հերոս";
            //                            }
            //                            if ($lang_menu == "en") {
            //                                echo "Anonymous Hero";
            //                            }
            //                            if ($lang_menu == "ru") {
            //                                echo "Анонимный герой";
            //                            }
            //                            ?>
            <!--                        </div>-->
            <!--                        <div class="last-article-item2-author">-->
            <!--                            --><?php
            //                            if ($lang_menu == "am") {
            //                                echo "Օգնեք մեզ պատմենք մեր հերոսների մասին՝ ստեղծելով հոդված։";
            //                            }
            //                            if ($lang_menu == "en") {
            //                                echo "Help us tell about our heroes by creating an article.";
            //                            }
            //                            if ($lang_menu == "ru") {
            //                                echo "Помогите нам рассказать о наших героях, написав статью.";
            //                            }
            //                            ?>
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class='btn3-div marg-left'>-->
            <!--                    <a href='writestory.php'>-->
            <!--                        <button class='btn3'>-->
            <!--                            --><?php
            //                            if ($lang_menu == "am") {
            //                                echo "Ստեղծել նոր հոդված";
            //                            }
            //                            if ($lang_menu == "en") {
            //                                echo "Write your story";
            //                            }
            //                            if ($lang_menu == "ru") {
            //                                echo "Создать новую статью";
            //                            }
            //                            ?>
            <!---->
            <!--                        </button>-->
            <!--                    </a>-->
            <!--                </div>-->
            <!--            </div>-->

        </div>
        <!-- end mainflex -->
        <!--        <div class="section-last-red">-->
        <!--            <div class="under-caption bord-top">-->
        <!--                --><?php
        //                if ($lang_menu == "am") {
        //                    echo "Վերջին ընթերցված հոդվածները";
        //                }
        //                if ($lang_menu == "en") {
        //                    echo "Last read articles";
        //                }
        //                if ($lang_menu == "ru") {
        //                    echo "Последние прочитанные статьи";
        //                }
        //                ?>
        <!---->
        <!--            </div>-->
        <!--            <div class="carusel-partners">-->
        <!--                --><?php
        //                include "../carousel/carousel-last-read.php";
        //                ?>
        <!--            </div>-->
        <!---->
        <!---->
        <!--        </div>-->


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

    <?php
    include "footer.php";
    ?>

</div>
<script src="../carousel/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="../carousel/js/main1.js"></script>
<script src="../js/first-article.js"></script>
<script src="../js/account.js"></script>


</body>

</html>
