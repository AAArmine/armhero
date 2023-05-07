<?php
include "config/dbconfig.php";

$language=$_POST['language'];
$auth_table_name="history_articles_".$language;
// $auth_name2=$_POST['name2Val'];
// $auth_placeofbirth=$_POST['placeofbirthVal'];
// $auth_birthday=$_POST['birthdayVal'];

if(isset($_POST['titleVal'])){
    $auth_title=$_POST['titleVal'];
    $sql="SELECT * FROM $auth_table_name INNER JOIN history_images ON $auth_table_name.article_id = history_images.article_id WHERE history_images.main = 1 and $auth_table_name.title ='".$auth_title."' and $auth_table_name.article_status=1";
    $sql_result=mysqli_query($con, $sql);

    if(mysqli_num_rows($sql_result)){
        ?>
        <div class="auth-flex d-flex flex-wrap">
        <?php
        while($sql = mysqli_fetch_assoc($sql_result)){
            ?>
                <div class="auth-flex-item col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4" data-article_id="<?php echo $sql['article_id'] ?>" data-article="history" data-article_view="history">
                    <div class="img_article" style="background-image: url('../history-articles-images/<?php echo $sql['article_id'] ?>/<?php echo $sql['image'] ?>');"></div>
                    <div class="title_article d-flex "><?php echo ($sql['title']); ?></div>
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
                                    <a href='history_read.php?code=<?php echo $sql['article_id']; ?>'> Կարդալ </a>
                                <?php
                                }
                                if ($language == "en") {
                                ?>
                                    <a href='history_read.php?code=<?php echo $sql['article_id']; ?>'> Read More </a>
                                <?php
                                }
                                if ($language == "ru") {
                                ?>
                                    <a href='history_read.php?code=<?php echo $sql['article_id']; ?>'> Подробнее </a>
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

if(isset($_POST['publicationdateVal'])){
    $auth_publicationdate=$_POST['publicationdateVal'];
    $sql="SELECT * FROM $auth_table_name INNER JOIN history_images ON $auth_table_name.article_id = history_images.article_id WHERE history_images.main = 1 and $auth_table_name.created_date ='".$auth_publicationdate."' and $auth_table_name.article_status=1";
    $sql_result=mysqli_query($con, $sql);

    if(mysqli_num_rows($sql_result)){
        ?>
        <div class="auth-flex d-flex flex-wrap">
        <?php
        while($sql = mysqli_fetch_assoc($sql_result)){
            ?>
                <div class="auth-flex-item col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4" data-article_id="<?php echo $sql['article_id'] ?>" data-article="history" data-article_view="history">
                    <div class="img_article" style="background-image: url('../history-articles-images/<?php echo $sql['article_id'] ?>/<?php echo $sql['image'] ?>');"></div>
                    <div class="title_article d-flex "><?php echo ($sql['title']); ?></div>
                    <div class="desc_article">
                        <?php echo $sql['description']; ?>
                    </div>
                    <div class="desc_article">
                        <?php echo $sql['created_date']; ?>
                    </div>
                    <div class="red-line">
                        </div>
                        <div class="read-more">
                            <div>
                                <?php
                                if ($language == "am") {
                                ?>
                                      <a href='history_read.php?code=<?php echo $sql['article_id']; ?>'> Կարդալ </a>
                                <?php
                                }
                                if ($language == "en") {
                                ?>
                                      <a href='history_read.php?code=<?php echo $sql['article_id']; ?>'> Read More </a>
                                <?php
                                }
                                if ($language == "ru") {
                                ?>
                                      <a href='history_read.php?code=<?php echo $sql['article_id']; ?>'> Подробнее </a>
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



if(isset($_POST['title2Val'])){
    $auth_title2=$_POST['title2Val'];
    $sql="SELECT * FROM $auth_table_name INNER JOIN history_images ON $auth_table_name.article_id = history_images.article_id WHERE history_images.main = 1 and $auth_table_name.title ='".$auth_title2."' and $auth_table_name.article_status=1";
    $sql_result=mysqli_query($con, $sql);

    if(mysqli_num_rows($sql_result)){
        ?>
        <div class="auth-flex d-flex flex-wrap">
        <?php
        while($sql = mysqli_fetch_assoc($sql_result)){
            ?>
                <div class="auth-flex-item col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4" data-article_id="<?php echo $sql['article_id'] ?>" data-article="history" data-article_view="history">
                    <div class="img_article" style="background-image: url('../history-articles-images/<?php echo $sql['article_id'] ?>/<?php echo $sql['image'] ?>');"></div>
                    <div class="title_article d-flex "><?php echo ($sql['title']); ?></div>
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
                                      <a href='history_read.php?code=<?php echo $sql['article_id']; ?>'> Կարդալ </a>
                                <?php
                                }
                                if ($language == "en") {
                                ?>
                                      <a href='history_read.php?code=<?php echo $sql['article_id']; ?>'> Read More </a>
                                <?php
                                }
                                if ($language == "ru") {
                                ?>
                                      <a href='history_read.php?code=<?php echo $sql['article_id']; ?>'> Подробнее </a>
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