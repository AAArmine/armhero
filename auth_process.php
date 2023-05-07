<?php
include "config/dbconfig.php";

$language=$_POST['language'];
$auth_table_name="autobiography_articles_".$language;


if(isset($_POST['nameVal'])){
    $auth_name=$_POST['nameVal'];
    $sql="SELECT * FROM $auth_table_name INNER JOIN autobiography_images ON $auth_table_name.article_id = autobiography_images.article_id WHERE autobiography_images.main = 1 and $auth_table_name.name ='".$auth_name."' and $auth_table_name.article_status=1";
    $sql_result=mysqli_query($con, $sql);

    if(mysqli_num_rows($sql_result)){
        ?>
        <div class="auth-flex d-flex flex-wrap">
        <?php
        while($sql = mysqli_fetch_assoc($sql_result)){
            ?>
                <div class="auth-flex-item col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4" data-article_id="<?php echo $sql['article_id'] ?>" data-article="autobiography" data-article_view="autobiography">
                    <div class="img_article" style="background-image: url('../autobiography-articles-images/<?php echo $sql['article_id'] ?>/<?php echo $sql['image'] ?>');"></div>
                    <div class="title_article d-flex "><?php echo ($sql['name']); ?></div>
                    <div class="desc_article">
                        <?php echo $sql['description']; ?>
                    </div>
                    <div class="red-line">
                        </div>
                        <div class="read-more">
                            <div>
                                <?php
                                if ($language == "am") {
                                ?>
                                    <a href='auth-article-read.php?code=<?php echo $sql['article_id']; ?>'> Կարդալ </a>
                                <?php
                                }
                                if ($language == "en") {
                                ?>
                                    <a href='auth-article-read.php?code=<?php echo $sql['article_id']; ?>'> Read More </a>
                                <?php
                                }
                                if ($language == "ru") {
                                ?>
                                    <a href='auth-article-read.php?code=<?php echo $sql['article_id']; ?>'> Подробнее </a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                </div>
         <?php   } ?>
        </div>
        <?php 
        }
    }






if(isset($_POST['placeofbirthVal'])){
    $auth_placeofbirth=$_POST['placeofbirthVal'];
    
    $sql="SELECT * FROM $auth_table_name INNER JOIN autobiography_images ON $auth_table_name.article_id = autobiography_images.article_id WHERE autobiography_images.main = 1 and $auth_table_name.place_of_birth ='".$auth_placeofbirth."' and $auth_table_name.article_status=1";
    $sql_result=mysqli_query($con, $sql);

    if(mysqli_num_rows($sql_result)){
        ?>
        <div class="auth-flex d-flex flex-wrap">
        <?php
        while($sql = mysqli_fetch_assoc($sql_result)){
            ?>
                <div class="auth-flex-item col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4" data-article_id="<?php echo $sql['article_id'] ?>" data-article="autobiography" data-article_view="autobiography">
                    <div class="img_article" style="background-image: url('../autobiography-articles-images/<?php echo $sql['article_id'] ?>/<?php echo $sql['image'] ?>');"></div>
                    <div class="title_article d-flex "><?php echo ($sql['name']); ?></div>
                    <div class="desc_article">
                        <?php echo $sql['description']; ?>
                    </div>
                    <div class="red-line">
                        </div>
                        <div class="read-more">
                            <div>
                                <?php
                                if ($language == "am") {
                                ?>
                                    <a href='auth-article-read.php?code=<?php echo $sql['article_id']; ?>'> Կարդալ </a>
                                <?php
                                }
                                if ($language == "en") {
                                ?>
                                    <a href='auth-article-read.php?code=<?php echo $sql['article_id']; ?>'> Read More </a>
                                <?php
                                }
                                if ($language == "ru") {
                                ?>
                                    <a href='auth-article-read.php?code=<?php echo $sql['article_id']; ?>'> Подробнее </a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                </div>
         <?php   } ?>
        </div>
        <?php 
        }
    }




if(isset($_POST['birthdayVal'])){
    $auth_birthday=$_POST['birthdayVal'];
    $sql="SELECT * FROM $auth_table_name INNER JOIN autobiography_images ON $auth_table_name.article_id = autobiography_images.article_id WHERE autobiography_images.main = 1 and $auth_table_name.birth_day ='".$auth_birthday."' and $auth_table_name.article_status=1";
    $sql_result=mysqli_query($con, $sql);

    if(mysqli_num_rows($sql_result)){
        ?>
        <div class="auth-flex d-flex flex-wrap">
        <?php
        while($sql = mysqli_fetch_assoc($sql_result)){
            ?>
                <div class="auth-flex-item col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4" data-article_id="<?php echo $sql['article_id'] ?>" data-article="autobiography" data-article_view="autobiography">
                    <div class="img_article" style="background-image: url('../autobiography-articles-images/<?php echo $sql['article_id'] ?>/<?php echo $sql['image'] ?>');"></div>
                    <div class="title_article d-flex "><?php echo ($sql['name']); ?></div>
                    <div class="desc_article">
                        <?php echo $sql['description']; ?>
                    </div>
                    <div class="red-line">
                        </div>
                        <div class="read-more">
                            <div>
                                <?php
                                if ($language == "am") {
                                ?>
                                    <a href='auth-article-read.php?code=<?php echo $sql['article_id']; ?>'> Կարդալ </a>
                                <?php
                                }
                                if ($language == "en") {
                                ?>
                                    <a href='auth-article-read.php?code=<?php echo $sql['article_id']; ?>'> Read More </a>
                                <?php
                                }
                                if ($language == "ru") {
                                ?>
                                    <a href='auth-article-read.php?code=<?php echo $sql['article_id']; ?>'> Подробнее </a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                </div>
         <?php   } ?>
        </div>
        <?php 
        }
    }



if(isset($_POST['name2Val'])){
    $auth_name2=$_POST['name2Val'];
    $sql="SELECT * FROM $auth_table_name INNER JOIN autobiography_images ON $auth_table_name.article_id = autobiography_images.article_id WHERE autobiography_images.main = 1 and $auth_table_name.name ='".$auth_name2."' and $auth_table_name.article_status=1";
    $sql_result=mysqli_query($con, $sql);

    if(mysqli_num_rows($sql_result)){
        ?>
        <div class="auth-flex d-flex flex-wrap">
        <?php
        while($sql = mysqli_fetch_assoc($sql_result)){
            ?>
                <div class="auth-flex-item col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4" data-article_id="<?php echo $sql['article_id'] ?>" data-article="autobiography" data-article_view="autobiography">
                    <div class="img_article" style="background-image: url('../autobiography-articles-images/<?php echo $sql['article_id'] ?>/<?php echo $sql['image'] ?>');"></div>
                    <div class="title_article d-flex "><?php echo ($sql['name']); ?></div>
                    <div class="desc_article">
                        <?php echo $sql['description']; ?>
                    </div>
                    <div class="red-line">
                        </div>
                        <div class="read-more">
                            <div>
                                <?php
                                if ($language == "am") {
                                ?>
                                    <a href='auth-article-read.php?code=<?php echo $sql['article_id']; ?>'> Կարդալ </a>
                                <?php
                                }
                                if ($language == "en") {
                                ?>
                                    <a href='auth-article-read.php?code=<?php echo $sql['article_id']; ?>'> Read More </a>
                                <?php
                                }
                                if ($language == "ru") {
                                ?>
                                    <a href='auth-article-read.php?code=<?php echo $sql['article_id']; ?>'> Подробнее </a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                </div>
         <?php   } ?>
        </div>
        <?php 
        }
    }








?>