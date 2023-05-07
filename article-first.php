<?php
include "../header.php";
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="../carousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="../carousel/css/style1.css">
<link rel="stylesheet" href="../css/footer.css">
<link rel="stylesheet" href="../css/article-first.css">
<!-- <link rel="stylesheet" href="../css/writestory1.css"> -->


<title>Read article</title>

</head>

<body>
<!-- commit -->
<div class="cont-all">
    <div class="d-flex flextop justify-content-between">
        <div style='display:none;'>
            <img src="../images/Levon Mkrtchyan1.jpg" alt="" class="article-main-image">
        </div>
        <div class='flex-item1'>
            <a href='index.php'><img src='../Icons/back.png'></a>
        </div>
        <div class="flex-item2">

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

    <div class="middle-main">
        <div class="article-author">
            <div class="article-author-name">
                <?php
                if ($lang_menu == "am") {
                    echo "Դիանա Աֆյան";
                }
                if ($lang_menu == "en") {
                    echo "Diana Afyan";
                }
                if ($lang_menu == "ru") {
                    echo "Диана Афян";
                }
                ?>

            </div>
            <div class="article-author-date">
                <span class="article-author-date">19.03.2021</span>
                <span class="circle-divider"><i class="fas fa-circle"></i></span>
                <span class="article-author-view">1 000
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
            if ($lang_menu == "am") {
                echo "Լևոն Վարդանի Մկրտչյան";
            }
            if ($lang_menu == "en") {
                echo "Levon Mkrtchyan";
            }
            if ($lang_menu == "ru") {
                echo "Левон Мкртчян";
            }
            ?>

        </div>
        <div class="mainFlex-article d-flex">
            <div class="mainFlex-article-item1">
                <div class="article-main-image-div">
                    <img src="../images/Levon Mkrtchyan1.jpg" alt="" class="article-main-image">
                </div>

                <div class='section-part'>
                    <div class="under-caption">
                        <!-- Ընդհանուր տեղեկություններ -->
                    </div>

                    <hr>
                    <div class="article-text">
                        <?php
                        if ($lang_menu == "am") {
                            echo "Լևոնը Արցախի 2-րդ պատերազմի առաջին իսկ օրվանից եղել է մարտական գործողությունների կիզակետում։ Մասնակցել է Ջաբրայիլի, Հադրութի և Ֆիզուլիի տարածքում ընթացող մարտական գործողություններին։
                                    Հոկտեմբերի 15-ին մասնակցել է Կարգաբազառում (Ղարղաբազար) ընթացող ակտիվ մարտական գործողություններին, որտեղից էլ ծնողները ստացել են վերջին զանգը։ Մարտական գործողությունների ժամանակ աչքի է ընկել բազմաթիվ հերոսական դրվագներում, միշտ առաջիններից էր, ով սկսում էր կրակ վարել թշնամու ուղղությամբ։ Զինակից ընկերների հավաստմամբ Լևոնն անվախն էր, դրսևորել է առանձնակի քաջություն ու տոկունություն։ Լևոնի հերոսության և կատարած սխրանքների անհայտ դրվագների մասին պատմում են նրա մարտական ընկերները և հրամանատարությունը։
                                    Ծնվել է 2001 թվականի ապրիլի 29-ին, ք. Երևանում։ 2007 թվականից հաճախել է Դերենիկ Դեմիրճյանի անվան թիվ 27 դպրոց, իսկ 2010 թվականից հաճախել է Ստեփան Զորյանի անվան թիվ 56 դպրոց։ Դպրոցի տարրական դասարաններում ուսուցչի կողմից արժանացել է «Բարեկիրթ Լևոն» տիտղոսին։ Մասնակցել է և արժանացել բազմաթիվ պատվոգրերի ֆուտբոլի, ձյուդոի, լողի և բռնցքամարտի սպորտային տարբեր խմբակներից։
                                    2016 թվականից կրթությունը շարունակել է Երևանի Պետական Հումանիտար քոլեջի Տուրիզմի ֆակուլտետում։ Քոլեջի կողմից արժանացել է «Լավագույն տղա արշավական, Լոռի» անվանակարգին՝ երթուղու անցկացման, ժամանակի կազմակերպման և գիտական նյութի ներկայացման համար։ Սիրում էր հայրենիքի յուրաքանչյուր անկյունը։ Սիրում էր արշավ-էքսկուրսիաներ կազմակերպել ու ընկերներին պատմել հուշարձանների ու հայոց պատմության մասին։
                                    Քոլեջում ուսանելու տարիներին ակտիվ կամավորական աշխատանք է կատարել Երիտասարդ պատմագետների ասոցիացիա ՀԿ-ո, որի կողմից էլ արժանացել է շնորհակալագրի «Ուժն է ծնում իրավունք» ծրագրի շրջանակներում «Գրիր քո նամակը զինվորին» ծրագրին մասնակցության համար։
                                    2020 թվականին ընդունվել է Երևանի պետական համալսարանի պատմության ֆակուլտետ, այնուհետև հուլիսի 15-ին զորակաչվել է Հայկական բանակ։ Զինվորական երդումը ստացել է Արցախի Հանրապետության Մարտունի 2 զորամասում, որից հետո տեղափոխվել և ծառայությունը շարունակել է Ջրականի (Մեխակավան, Ջաբրայիլի) N զորամասում։
                                    Ներկայացնե՛նք և ճանաչե՛նք մեր հերոսներին ի փառս նրանց հիշատակի, ի պատիվ իրենց իրականացրած սխրագործությունների և ի գիտություն ապագա սերունդների։";
                        }
                        if ($lang_menu == "en") {
                            echo "From the very first day of the Second Artsakh War, Levon took part in military operations: especially in the hostilities in Jabrayil, Hadrut and Fizuli.
                                    On October 15, he was in the active military operations in Kargabazar (Kharghabazar), from where his parents received his last call. During the military operations he stood out in many heroic episodes, he was always one of the first to start fighting in the direction of the enemy.
                                    According to his comrades-in-arms, Levon was fearless, he showed special courage and endurance. We strongly believe that many military episodes of Levon's heroism and his unknown feats will be told by his military friends for the future generations. 
                                    He was born on April 29, 2001, in Yerevan. He attended school N 27 after Derenik Demirchyan since 2007, in 2010 he started attending school N 56 after Stepan Zoryan. In the elementary grades of the school he was awarded the title of \"Polite Leon\" by his teacher. He participated in and was awarded many diplomas from different football, judo, swimming and boxing sport clubs.
                                    He continued his education at the Faculty of Tourism of Yerevan State Humanitarian College (in 2016.) He was nominated by the college for \"The Best Hiking Boy of Lori\" for conducting the best organized route and presenting scientific materials during the tours. He loved every corner of our homeland. He liked to organize excursions and tell his friends about Armenian monuments and Armenian history.
                                    During his college years, he actively volunteered for the Association of Young Historians, which awarded him for participating in the \"Write Your Letter to the Soldier\" program within the framework of the \"Strength Gives the Right\" program.
                                    In 2020 he entered the Faculty of History of Yerevan State University, then on July 15 he enlisted in the Armenian Army. He received his military oath in the Martuni 2 military unit of the Artsakh Republic, after which he was transferred and continued his service in the military unit N of Jrakan (Mekhakavan, Jabrail).
                                    We should recognize our heroes for the glory of their memory and honour their heroic deeds as a legacy for future generations.
                                    ";
                        }
                        if ($lang_menu == "ru") {
                            echo "Левон Варданович Мкртчян с самого первого дня Второй Арцахской войны он был в центре боевых действий: участвовал в боевых действиях в Джебраиле, Гадруте и в районе Физули.
                                    15 октября он принимал участие в активных боевых действиях в Каргабазаре (Карабах), откуда его родителям поступил последний звонок от него.
                                    В ходе боевых действий Левон выделялся во многих героических эпизодах, всегда одним из первых открывал огонь в сторону врага. По словам соратников, Левон был бесстрашным, проявлял особое мужество и выдержку. Военные друзья и командиры Левона часто вспоминают и рассказывают эпизоды его героизма и патриотизма. 		
                                    Левон родился 29 апреля 2001 года в Ереване. С 2007 года учился в школе № 27 имени Дереника Демирчяна, а с 2010 года в школе № 56 имени Степана Зоряна. В младших классах школы учитель присвоил ему звание «Вежливый Леон». Он всегда	блистал не только вежливостью, но и умом, чем и всегда завоёвывал всеобщую любовь. Левон по натуре был очень активным и талантливым человеком, он участвовал и был награжден многими дипломами различных спортивных клубов по футболу, дзюдо, плаванию и боксу. 
                                    С 2016 года Левон продолжил обучение на факультете туризма Ереванского государственного гуманитарного колледжа, где вскоре был номинирован на звание «Лучший тур проводник, Лори» за проведение интересного маршрута, правильную организацию времени и представление научных материалов во время туров. 
                                    Во время учебы в колледже он был активным волонтером в общественной организации «Ассоциация молодых историков» и был награжден благодарственным письмом общественной организации за участие в программе «Напиши письмо солдату» в рамках программы «Сила рождает право».
                                    В 2020 году Левон поступил на исторический факультет Ереванского государственного университета, а затем 15 июля был зачислен в Армянскую армию. Присягу он получил в воинской части Мартуни-2 Республики Арцах, после чего был переведен и продолжил службу в воинской части N города Джракан (Мехакаван, Джебраил).
                                    Он любил каждый уголок нашей Родины. Он любил организовывать экскурсии и рассказывать друзьям о памятниках и об истории Армении. Сегодня он и есть кусочек нашей родины и истории. 
                                    ";
                        }
                        ?>


                        <div class='towritepage'>
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
                <div class="article-main-image-div">
                    <img src="../images/Levon-Mktrchyan.jpg" alt="" class="article-main-image">
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
                    <div class="article-text">
                        1․ <a rel="nofollow" class="external text"
                              href="https://jam-news.net/am/%D5%B2%D5%A1%D6%80%D5%A1%D5%A2%D5%A1%D5%B2-%D5%BA%D5%A1%D5%BF%D5%A5%D6%80%D5%A1%D5%A6%D5%B4-%D5%B0%D5%A1%D5%A4%D6%80%D5%B8%D6%82%D5%A9-%D5%A1%D5%A4%D6%80%D5%A2%D5%A5%D5%BB%D5%A1%D5%B6-%D5%B0%D5%A1/">
                            <?php
                            if ($lang_menu == "am") {
                                echo "«Մարտեր Հադրութի համար․ ի՞նչ է կատարվում իրականում»։";
                            }
                            if ($lang_menu == "en") {
                                echo "\"Fights for Hadrut ․ What is really happening?\"";
                            }
                            if ($lang_menu == "ru") {
                                echo "«Бои за Гадрут Что на самом деле происходит?»";
                            }
                            ?>
                        </a> 12.10.2020
                    </div>
                    <div class="article-text mt-2">
                        2․ <a rel="nofollow" class="external text" href="https://hetq.am/hy/article/125515">
                            <?php
                            if ($lang_menu == "am") {
                                echo "«Ֆիզուլիի և Ջաբրայիլի հատվածում հայտնաբերվել է ևս 41 զինծառայողի աճյուն. Արցախի ԱԻ ծառայություն»</a>։ 17 դեկտեմբերի, 2020";
                            }
                            if ($lang_menu == "en") {
                                echo "\"The bodies of 41 servicemen were found in the Jabrail section of Fizuli. Artsakh Emergency Service\".</a> 
                                December 17, 2020";
                            }
                            if ($lang_menu == "ru") {
                                echo "«В Джебраильском районе Физули были обнаружены тела 41 военнослужащих. Арцахская служба экстренной помощи»</a> 17 декабря, 2020г.";
                            }
                            ?>


                    </div>
                </div>
                <!-- comments sec -->
                <div class="leave-comment mt-5">
                    <div class="under-caption">
                        <?php
                        if ($lang_menu == "am") {
                            echo "Թողնել մեկնաբանություն";
                        }
                        if ($lang_menu == "en") {
                            echo "Leave a comment";
                        }
                        if ($lang_menu == "ru") {
                            echo "Оставить комментарий";
                        }
                        ?>
                    </div>
                    <input type="text" class="form-control comment-inp" id='comment-input'>
                    <div class="sent-message"></div>
                    <div class="error-message"></div>
                    <div class="right-buttons">
                        <button class="delete-comment" id='delete-comment'>
                            <?php
                            if ($lang_menu == "am") {
                                echo "Չեղարկել";
                            }
                            if ($lang_menu == "en") {
                                echo "Cancel";
                            }
                            if ($lang_menu == "ru") {
                                echo "Отменить";
                            }
                            ?>

                        </button>
                        <button class="btn1" id='send-comment'>
                            <?php
                            if ($lang_menu == "am") {
                                echo "Ուղարկել";
                            }
                            if ($lang_menu == "en") {
                                echo "Send";
                            }
                            if ($lang_menu == "ru") {
                                echo "Отправить";
                            }
                            ?>

                        </button>
                    </div>
                </div>

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
                            <a href="#" onclick="window.open('http://localhost/armhero/share-link.php?val=<?php
                            echo $_SERVER['REQUEST_URI'];
                            ?>', 'Link Share', 'width=620, height=420'); return false;">
                                <img src="../Icons/link-icon.png" class="soc-icon"></img>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- mainFlex-article-item1 -->
            <!-- right part of flex -->
            <div class="mainFlex-article-item2">
                <div class="mainFlex-article-item-caption">
                    <?php
                    if ($lang_menu == "am") {
                        echo "Վերջին ավելացված հոդվածներ";
                    }
                    if ($lang_menu == "en") {
                        echo "Recently Added Articles";
                    }
                    if ($lang_menu == "ru") {
                        echo "Недавно добавленные статьи";
                    }
                    ?>
                </div>

                <div class="last-article d-flex">
                    <div class="last-article-item1">
                        <img class="last-article-item1-img" src='../images/avatar.jpg'>
                    </div>
                    <div class="last-article-item2">
                        <div class="last-article-item2-caption">
                            <?php
                            if ($lang_menu == "am") {
                                echo "Անանուն Հերոս";
                            }
                            if ($lang_menu == "en") {
                                echo "Anonymous Hero";
                            }
                            if ($lang_menu == "ru") {
                                echo "Анонимный герой";
                            }
                            ?>
                        </div>
                        <div class="last-article-item2-author">
                            <?php
                            if ($lang_menu == "am") {
                                echo "Օգնեք մեզ պատմենք մեր հերոսների մասին՝ ստեղծելով հոդված։";
                            }
                            if ($lang_menu == "en") {
                                echo "Help us tell about our heroes by creating an article.";
                            }
                            if ($lang_menu == "ru") {
                                echo "Помогите нам рассказать о наших героях, написав статью.";
                            }
                            ?>
                        </div>
                    </div>

                    <!-- keep the model content !!!!!!!-->


                </div>
                <div class="last-article d-flex">
                    <div class="last-article-item1">
                        <img class="last-article-item1-img" src='../images/avatar.jpg'>
                    </div>
                    <div class="last-article-item2">
                        <div class="last-article-item2-caption">
                            <?php
                            if ($lang_menu == "am") {
                                echo "Անանուն Հերոս";
                            }
                            if ($lang_menu == "en") {
                                echo "Anonymous Hero";
                            }
                            if ($lang_menu == "ru") {
                                echo "Анонимный герой";
                            }
                            ?>
                        </div>
                        <div class="last-article-item2-author">
                            <?php
                            if ($lang_menu == "am") {
                                echo "Օգնեք մեզ պատմենք մեր հերոսների մասին՝ ստեղծելով հոդված։";
                            }
                            if ($lang_menu == "en") {
                                echo "Help us tell about our heroes by creating an article.";
                            }
                            if ($lang_menu == "ru") {
                                echo "Помогите нам рассказать о наших героях, написав статью.";
                            }
                            ?>
                        </div>
                    </div>

                </div>
                <div class="last-article d-flex">
                    <div class="last-article-item1">
                        <img class="last-article-item1-img" src='../images/avatar.jpg'>
                    </div>
                    <div class="last-article-item2">
                        <div class="last-article-item2-caption">
                            <?php
                            if ($lang_menu == "am") {
                                echo "Անանուն Հերոս";
                            }
                            if ($lang_menu == "en") {
                                echo "Anonymous Hero";
                            }
                            if ($lang_menu == "ru") {
                                echo "Анонимный герой";
                            }
                            ?>
                        </div>
                        <div class="last-article-item2-author">
                            <?php
                            if ($lang_menu == "am") {
                                echo "Օգնեք մեզ պատմենք մեր հերոսների մասին՝ ստեղծելով հոդված։";
                            }
                            if ($lang_menu == "en") {
                                echo "Help us tell about our heroes by creating an article.";
                            }
                            if ($lang_menu == "ru") {
                                echo "Помогите нам рассказать о наших героях, написав статью.";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class='btn3-div marg-left'>
                    <a href='writestory.php'>
                        <button class='btn3'>
                            <?php
                            if ($lang_menu == "am") {
                                echo "Ստեղծել նոր հոդված";
                            }
                            if ($lang_menu == "en") {
                                echo "Write your story";
                            }
                            if ($lang_menu == "ru") {
                                echo "Создать новую статью";
                            }
                            ?>

                        </button>
                    </a>
                </div>
            </div>

        </div>
        <!-- end mainflex -->
        <div class="section-last-red">
            <div class="under-caption bord-top">
                <?php
                if ($lang_menu == "am") {
                    echo "Վերջին ընթերցված հոդվածները";
                }
                if ($lang_menu == "en") {
                    echo "Last read articles";
                }
                if ($lang_menu == "ru") {
                    echo "Последние прочитанные статьи";
                }
                ?>

            </div>
            <div class="carusel-partners">
                <?php
                include "../carousel/carousel-last-read.php";
                ?>
            </div>


        </div>


    </div>
    <div class="d-flex flexbut justify-content-between">
        <div class="footer-item">
            <div class="contDiv">
                <div class='mailcont'>
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

</div>
<script src='../js/navbar.js'></script>
<script src="../carousel/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="../carousel/js/main1.js"></script>
<script src="../js/first-article.js"></script>


</body>

</html>