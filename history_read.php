<?php
session_start();
include "header.php";
//include "single_article.php";
include "config/dbconfig.php";
include "lang_config.php";
// echo $_SESSION['user_id'];
$article_id=$_GET['code'];

$article_table='history_articles_'.$lang_dir ;
// echo $article_table;
$history=true;
$sql = "SELECT * FROM $article_table INNER JOIN users ON $article_table.user_id = users.id INNER JOIN history_images ON $article_table.article_id = history_images.article_id WHERE $article_table.article_id='$article_id'";
$result = mysqli_query($con, $sql);
$row_auth = mysqli_fetch_assoc($result);

$sql_edited_articles="SELECT * FROM $article_table INNER JOIN history_edited_articles_by_users INNER JOIN users ON $article_table.article_id= history_edited_articles_by_users.article_id AND users.id=history_edited_articles_by_users.user_id WHERE $article_table.article_id='$article_id' and history_edited_articles_by_users.article_status = '1'";
$result_edited_articles = $con->query($sql_edited_articles); 


$sql_ext_links="SELECT * FROM $article_table INNER JOIN history_external_links ON $article_table.article_id= history_external_links.article_id WHERE $article_table.article_id='$article_id'";
$result_ext_links = $con->query($sql_ext_links);  

$sql_int_links="SELECT * FROM $article_table INNER JOIN history_internal_links ON $article_table.article_id= history_internal_links.article_id WHERE $article_table.article_id='$article_id'";
$result_int_links = $con->query($sql_int_links); 

$sql_views="SELECT * FROM $article_table WHERE article_id='$article_id'";

$result_views = mysqli_query($con, $sql_views);
$row_data_views=mysqli_fetch_assoc($result_views);
// if(!$row_data_views['number_of_views']){
//     $ins_number_of_views==0;
// }


    if(!$row_data_views['number_of_views']){
        $ins_number_of_views=1;
    }else{
        $ins_number_of_views=$row_data_views['number_of_views']+1;
    }

        $sql_views=mysqli_query($con, "UPDATE history_articles_am SET number_of_views=".$ins_number_of_views." WHERE history_articles_am.article_id='$article_id'");
        $sql_views=mysqli_query($con, "UPDATE history_articles_en SET number_of_views=".$ins_number_of_views." WHERE history_articles_en.article_id='$article_id'");
        $sql_views=mysqli_query($con, "UPDATE history_articles_ru SET number_of_views=".$ins_number_of_views." WHERE history_articles_ru.article_id='$article_id'");
        $result_update_views = mysqli_query($con, $sql_views);
        
         


    // images
    $sql_main_image = mysqli_query($con, "SELECT image from history_images WHERE article_id='$article_id' and main='1'");
    $row_main_image=mysqli_fetch_assoc($sql_main_image );
    // echo $row_main_image['image'];

    $sql_images =  "SELECT image from history_images WHERE article_id='$article_id' and main='0'";
    
    $sql_images_result = mysqli_query($con, $sql_images);
    $sql_images2 =  "SELECT image from history_images WHERE article_id='$article_id' and main='0'";
    
    $sql_images_result2 = mysqli_query($con, $sql_images2);
// print_r($sql_images[0]);
    
    $sql_most_read = "SELECT a.article_id, a.title, a.description, a.created_date, i.image, u.fullname_am, u.fullname_ru, u.fullname_en FROM $article_table a INNER JOIN history_images i ON a.article_id = i.article_id INNER JOIN users u ON a.user_id = u.id WHERE i.main = 1 AND a.article_status = 1 order by number_of_views DESC limit 10";
    $result_most_read = mysqli_query($con, $sql_most_read);


    $sql_recently_added = "SELECT a.article_id, a.title, a.description, a.created_date, i.image, u.fullname_am, u.fullname_ru, u.fullname_en FROM $article_table a INNER JOIN history_images i ON a.article_id = i.article_id INNER JOIN users u ON a.user_id = u.id WHERE i.main = 1 AND a.article_status = 1 order by DATE(a.created_date) DESC limit 3";
    $result_recently_added = mysqli_query($con, $sql_recently_added);

 $con->close();  
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="../carousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="../carousel/css/style1.css">
<link rel="stylesheet" href="../css/navbar.css">
<link rel="stylesheet" href="../css/footer.css">
<link rel="stylesheet" href="../css/read-article.css">


<title>Read article</title>

</head>

<body>
    <input type="hidden" value="<?php echo $article_id; ?>" id="sel_article_id">
    <input type="hidden" value="history" id="article_type">
    <input type="hidden" value="<?php echo $lang_dir ?>" id="cur_lang_page">
    <input type="hidden" value="<?php echo $comments_count ?>" id="comments_count">
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

                    if ($lang_menu == "am") {
                        if ($row_auth['fullname_am']) {

                            echo $row_auth['fullname_am'];
                        } else {
                            echo $row_auth['fullname'];
                        }
                    }
                    if ($lang_menu == "en") {
                        if ($row_auth['fullname_en']) {

                            echo $row_auth['fullname_en'];
                        } else {

                            echo $row_auth['fullname'];
                        }
                    }
                    if ($lang_menu == "ru") {
                        if ($row_auth['fullname_ru']) {

                            echo $row_auth['fullname_ru'];
                        } else {

                            echo $row_auth['fullname'];
                        }
                    }
                    ?>

                </div>

                <div class="article-author-date">
                    <div>
                    <span class="article-author-date_span"><?php echo $row_auth['created_date'] ?></span>
                    <span class="circle-divider"><i class="fas fa-circle"></i></span>
                    <span class="article-author-view"><?php if ($row_data_views['number_of_views'] == null) : ?>
                            <?php echo "0" ?>
                        <?php else : ?>
                            <?php echo $row_data_views['number_of_views'];?>
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
                    <!-- Authors list -->

                    <div class="add_article">
                        <span class="redersp mr-2" style='color:rgb(146, 8, 8); font-size: 18px; cursor:pointer'>
                            <?php
                            if ($lang_menu == "am") {
                                echo "Կատարել հոդվածի լրացում ";
                            }
                            if ($lang_menu == "en") {
                                echo "Make an addition to the article ";
                            }
                            if ($lang_menu == "ru") {
                                echo "Сделать дополнение к статье ";
                            }
                            ?>
                                
                        </span>
                        <i class="fas fa-edit"></i>
                    </div>




                    <!-- End authors list -->

                </div>
               
                <hr>



            </div>
            <div class="article-main-caption">
                <?php
                echo $row_auth['title'];

                ?>
                <!-- <span class='pencil'><i class="fas fa-pencil-alt"></i> -->
            </div>

            <div class="mainFlex-article d-flex">
                <div class="mainFlex-article-item1">
                    <div class="article-main-image-div">
                        <img src="../history-articles-images/<?php echo $article_id; ?>/<?php echo $row_main_image['image']; ?>" alt="" class="article-main-image">
                    </div>

                    <div class='section-part'>
                        <div class="under-caption">
                            <!-- Ընդհանուր տեղեկություններ -->
                        </div>

                        <hr>
                        <div class="article-text">
                            <?php
                            echo $row_auth['description'];

                            ?>
                             

                            <div class='towritepage'>
                                <?php
                                if ($lang_menu == "am") {
                                        echo "Դու էլ կարող ես ավելացնել քո հերոսի պատմությունը հետևյալ <a href='add-article.php'>հղումով</a>։";
                                }
                                if ($lang_menu == "en") {
                                        echo "You can add a story about YOUR hero by simply following this <a href='add-article.php'>link</a>.";
                                }
                                if ($lang_menu == "ru") {
                                        echo "Мы не имеем права забывать ни об одном нашем герое: вы тоже можете добавить материал о своем герое <a href='add-article.php'>по ссылке</a>.";
                                }
                                ?>
                            </div>
                        </div>
                    </div>



                    <div class="images_container d-flex">
                        <?php
                        if (mysqli_num_rows($sql_images_result) > 0) {
                            while ($sql_images = mysqli_fetch_assoc($sql_images_result)) {
                       ?>
                       <div data-toggle="modal" data-target="#myModal" class="images_rest_item" style="background-image: url('../history-articles-images/<?php echo $article_id . "/" . $sql_images['image'] ?>');">

                       </div>
                        <?php
                            }
                        }
                        ?>
                    </div>


                    <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">


                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                        <?php

                        if (mysqli_num_rows($sql_images_result2) > 0) {
                            while ($sql_images2 = mysqli_fetch_assoc($sql_images_result2)) {
                            echo "string";

                        ?>
                        <div class="carousel-item">
                           <img class="d-block w-100" src="../history-articles-images/<?php echo $article_id."/".$sql_images2['image'] ?>">
                        </div>
                        <?php
                            }
                        }
                        ?>  
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>


                            </div>
                        </div>  
                        </div>
                    </div>



                        <!-- ****------------------- edited by users -->
                        <?php
                        if(mysqli_num_rows($result_edited_articles) > 0){

                        ?>
                        <h3 class='edited_by_users mb-3'>
                            <?php
                            if ($lang_menu == "en") {
                                echo 'Section added by other users';
                            }
                            if ($lang_menu == "am") {
                                echo 'Այլ օգտատերերի կողմից լրացված բաժին';
                            }
                            if ($lang_menu == "ru") {
                                echo 'Раздел добавленый другими пользователями';
                            }
                            ?>
                        </h3>
                        <?php
                            while($sql_edited_articles = mysqli_fetch_assoc($result_edited_articles)){

                        ?>
                        <div class='article-text mb-4'>
                            <?php 
                            if ($lang_dir == "am") {
                                if(!$sql_edited_articles['description_am']){
                                    echo "<div class='add_text'>" .$sql_edited_articles['description']."</div>";
                                }else{
                                    echo $sql_edited_articles['description_am'];
                                }
                                echo "<div class='author'>Հեղինակ՝ " . $sql_edited_articles['fullname_am']."</div>";
                            }
                            if ($lang_dir == "en") {
                                if(!$sql_edited_articles['description_en']){
                                    echo "<div class='add_text'>" .$sql_edited_articles['description']."</div>";
                                }else{
                                    echo $sql_edited_articles['description_en'];
                                }
                                echo "<div class='author'>By  " . $sql_edited_articles['fullname_en']."</div>";
                            }
                            if ($lang_dir == "ru") {
                                if(!$sql_edited_articles['description_ru']){
                                    echo "<div class='add_text'>" .$sql_edited_articles['description']."</div>";
                                }else{
                                    echo $sql_edited_articles['description_ru'];
                                }
                                echo "<div class='author'>Автор՝ " . $sql_edited_articles['fullname_en']."</div>";
                            }
                            ?>
                        </div>
                        <?php
                            }
                        ?>
                        
                        <?php
                        }
                        ?>
                        
                            <!-- **** -->

                    <!-- resources sec-->
                    <?php
                    if((mysqli_num_rows($result_ext_links)) >0 || (mysqli_num_rows($result_int_links))>0){
                    ?>
                    <div class="resources">
                        <div class="under-caption mt-5">
                            <?php
                            if ($lang_menu == "am") {
                                echo "Նյութի աղբյուրներ՝";
                            }
                            if ($lang_menu == "en") {
                                echo "Sources";
                            }
                            if ($lang_menu == "ru") {
                                echo " Источники материалов";
                            }
                            ?>

                        </div>
                        <hr>
                        <?php
                        if((mysqli_num_rows($result_ext_links))>0){
                        ?>
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
                        <?php
                            while ($sql_ext_links = mysqli_fetch_assoc($result_ext_links)) {
                        ?>
                        <div class="article-text">
                            <p class="link_name"><?php echo $sql_ext_links['name']; ?></p>
                            <a  class="external text" href="<?php echo $sql_ext_links['link']; ?>">
                                <?php echo $sql_ext_links['link']; ?>
                            </a>
                        </div>
                        <?php        
                            }
                        }
                        ?>
                        <?php
                        if((mysqli_num_rows($result_int_links))>0){
                        ?>
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
                        <?php
                            while ($sql_int_links = mysqli_fetch_assoc($result_int_links)) {
                        ?>
                        <div class="article-text">
                            <p class="link_name"><?php echo $sql_int_links['name']; ?></p>
                            <a  class="external text" href="<?php echo $sql_int_links['link']; ?>">
                                <?php echo $sql_int_links['link']; ?>
                            </a>
                            
                        </div>
                        <?php        
                            }
                        }
                        ?>
                    </div>
                    <?php
                    }
                    ?>
                    

                <!-- _________> -->
                   
                    <!-- Changing/Adding section start -->

                    <div class="add_section mt-4">
                        <div class="under-caption d-flex align-items-baseline justify-content-between">

                            <?php
                            if ($lang_menu == "am") {
                                echo " Կատարել լրացում";
                            }
                            if ($lang_menu == "en") {
                                echo " Make an addition";
                            }
                            if ($lang_menu == "ru") {
                                echo " Сделать дополнение";
                            }
                            ?>
                            <i class="fas fa-times-circle" id="close_adding_block"></i>
                        </div>
                        <input type="text" class="form-control add_input" id='add_input'>
                        <div class="add-message"></div>
                        <div class="error-add-message"></div>
                        <div class="right-buttons">
                            <button class="delete-add" id='delete-add'>
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
                            <button class="btn1" id='send_add'>
                                <?php
                                if ($lang_menu == "am") {
                                    echo "Ավելացնել";
                                }
                                if ($lang_menu == "en") {
                                    echo "Adding";
                                }
                                if ($lang_menu == "ru") {
                                    echo "Добавить";
                                }
                                ?>

                            </button>
                        </div>

                        <hr>
                    </div>



                    <!-- End Changing section -->
                    <!-- comments sec -->
                    <div class="leave-comment mt-4">
                        <div class="under-caption d-flex align-items-baseline">
                            <?php
                            if ($lang_menu == "am") {
                                echo " Թողնել մեկնաբանություն";
                            }
                            if ($lang_menu == "en") {
                                echo " Leave a comment";
                            }
                            if ($lang_menu == "ru") {
                                echo " Оставить комментарий";
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
                        <span class="read_comments">
                            <?php
                                if ($lang_menu == "am") {
                                    echo "Կարդալ մեկնաբանությունները";
                                }
                                if ($lang_menu == "en") {
                                    echo "Read comments";
                                }
                                if ($lang_menu == "ru") {
                                    echo "Прочитать комментарии";
                                }
                            ?>
                            
                            <span class="comments_number">
                            <?php
                            if (isset($comments_count)) {
                                if($comments_count==1){
                                    if ($lang_menu == "am") {
                                        echo  "(" .$comments_count ." մեկնաբանություն)";
                                    }
                                    if ($lang_menu == "en") {
                                        echo  "(" .$comments_count ." comment)";
                                    }
                                    if ($lang_menu == "ru") {
                                        echo  "(" .$comments_count ." комментарий)";
                                    }
                                }elseif($comments_count>1){
                                    if ($lang_menu == "am") {
                                        echo  "(" .$comments_count ." մեկնաբանություն)";
                                    }
                                    if ($lang_menu == "en") {
                                        echo  "(" .$comments_count ." comments)";
                                    }
                                    if ($lang_menu == "ru") {
                                        echo  "(" .$comments_count ." комментария)";
                                    }

                                } else {

                                    echo '';
                                }
                            }
                            ?>
                            </span>
                        </span>
                        <div class="ml-3 comment_show" id="open_comments"><i class="fas fa-caret-down"></i></div>
                        <div id="comments_content">
                        

                        </div>
<!-- test -->
                    </div>
                    <!-- share part -->
                    <div class="dropdown share-abs">
                        <button class="btn dropdown-toggle dropdown-toggle1" type="button" data-toggle="dropdown"><img src='../Icons/share.png' class='share-img'>
                            <span class="caret"></span>
                        </button>

                        <ul class="dropdown-menu dropdown-menu2" style="box-shadow:none">
                            <li> 
                                <a href="https://www.facebook.com/sharer/sharer.php?app_id=1204128296666901&sdk=joey&u=https://www.armhero.org/<?php echo $lang_dir;?>/history_read.php?code=<?php echo $article_id;?>"
                                onclick="return !window.open(this.href, 'Facebook', 'width=620,height=420')"><img src="../Icons/facebook.png" class="soc-icon"></img></a>
                            </li>
                            <li>
                                <a href="#" onclick="window.open('http://twitter.com/share?url=https://www.armhero.org/<?php echo $lang_dir;?>/history_read.php?code=<?php echo $article_id;?>?&via=armhero&text=about Armenian hero', 'Twitter Share', 'width=620, height=420'); return false;">
                                    <img src="../Icons/twitter.png" class="soc-icon"></img>
                                </a>
                            </li>
                            <li>
                            
                            <li>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=https://armhero.org/<?php echo $lang_dir;?>/history_read.php?code<?php echo '%3D'.$article_id?>&title=Read artiucle about Armenian hero&summary=chillyfacts.com&source=Chillyfacts" onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" >
                                <img src="../Icons/in.png" class="soc-icon"></img>
                            </a>
                            </li>
                            <li>
                                <a href="#" onclick="window.open('http://vk.com/share.php?url=http://www.armhero.org/<?php echo $lang_dir;?>/history_read.php?code=<?php echo $article_id;?>&title=Armenian hero&summary=armhero.org&source=ArmenianHeroes', 'VK Share', 'width=620, height=420'); return false;">
                                    <img src="../Icons/vk.png" class="soc-icon"></img>
                                </a>
                            </li>
                            <li>
                                <a href="#" onclick="window.open('http://armhero.org/share-link.php?val=https://armhero.org<?php
                                                                                                                            echo $_SERVER['REQUEST_URI'];
                                                                                                                            ?>', 'Link Share', 'width=620, height=420'); return false;">
                                    <img src="../Icons/link-icon.png" class="soc-icon"></img>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- end share -->
                </div>

                <!-- last added articles -->
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
                    <!--  start last article block -->
                    <?php
                    while ($sql_recently_added = mysqli_fetch_assoc($result_recently_added)) {
                    ?>
                        <div class="last-article d-flex">
                            <div class="last-article-item1">
                                <img class="last-article-item1-img" src='../history-articles-images/<?php echo $sql_recently_added['article_id']; ?>/<?php echo $sql_recently_added['image'];?>'>
                            </div>
                            <div class="last-article-item2">
                                <div class="last-article-item2-caption">
                                    <?php echo $sql_recently_added['title']; ?>
                                </div>
                                <div class="last-article-item2-author">

                                    <div class="mt-2 created_right_block"><?php echo $sql_recently_added['created_date'] ?></div>

                                    <div class="mt-1 author_right_block"><?php echo $sql_recently_added["fullname_$lang_dir"] ?></div>
                                </div>
                                <div class="mt-2 read_more_right_block " >
                                <a  style="text-decoration:none!" class='no_dec' href='history_read.php?code=<?php echo $sql_recently_added['article_id']; ?>'> 
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

                        </div>
                    <?php
                    }
                    ?>

                    <!-- last article block end  -->
                </div>
            </div>
            <!-- end mainflex -->
            <div class="section-last-red">
                <div class="under-caption bord-top">
                    <?php
                    if ($lang_menu == "am") {
                        echo "Ամենաշատ ընթերցված հոդվածներ";
                    }
                    if ($lang_menu == "en") {
                        echo "Most read articles";
                    }
                    if ($lang_menu == "ru") {
                        echo "Самые просматриваемые статьи";
                    }
                    ?>
                </div>
                <div class="">
                    <?php
                    include "../carousel/carousel-last-read.php";
                    ?>
                </div>
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

        <?php
        include "footer.php";
        ?>

    </div>
    <script src="../carousel/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="../carousel/js/main1.js"></script>
    <script src="../js/first-article.js"></script>

    <!-- test -->
</body>

</html>