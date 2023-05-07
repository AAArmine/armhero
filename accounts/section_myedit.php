<?php
$auth_table="autobiography_articles_".$lang_dir;
$his_table="history_articles_".$lang_dir;


$user_id=$_SESSION['user_id'];
// $sql_auth="SELECT * FROM $auth_table INNER JOIN history_images on $auth_table.article_id= history_images.article_id WHERE history_images.main = 1 and $auth_table.user_id ='$user_id' Limit 3";

$sql_auth="SELECT a.description AS adddesc, a.article_status as artstatus, a.article_id, i.image, b.name 
FROM autobiography_edited_articles_by_users AS a 
INNER JOIN autobiography_images AS i ON a.article_id = i.article_id 
INNER JOIN ".$auth_table." AS b ON b.article_id=a.article_id WHERE i.main = 1 and a.article_id=i.article_id and b.user_id ='$user_id' LIMIT 3";

$sql_result_auth=mysqli_query($con, $sql_auth);


$sql_his="SELECT a.description AS adddesc, a.article_status as artstatus, a.article_id, b.title, b.description, i.image 
FROM history_edited_articles_by_users AS a 
INNER JOIN  $his_table AS b
ON b.article_id=a.article_id 
INNER JOIN history_images AS i 
ON a.article_id= i.article_id 
WHERE i.main = 1 and b.user_id ='$user_id' LIMIT 3";

$sql_result_his=mysqli_query($con, $sql_his);

?>
                <div class="d-flex justify-content-between w-100 mt-5">
                <?php if ($lang_dir == "en") : ?>
                    <div class='items'>
                        <h5 class="sel_article"> My additions to the articles </h5>
                    </div>
                    
                <?php endif; ?>
                <?php if ($lang_dir == "ru") : ?>
                    <div><h5 class="sel_article">  Мои дополнения к статьям</h5></div>
                    
                <?php endif; ?>
                <?php if ($lang_dir == "am") : ?>
                    <div><h5 class="sel_article">Իմ լրացումները</h5></div>
                   
                <?php endif; ?>
                </div>
                <div class="d-flex justify-content-around w-100 flex-wrap">
                    <?php
                    if(mysqli_num_rows($sql_result_auth) || mysqli_num_rows($sql_result_his)){
                        while($sql_auth = mysqli_fetch_assoc($sql_result_auth)){ 
                        ?>
                        <div class="flex_item_auth">
                             <div class="auth-image-div" style="background-image: url('../autobiography-articles-images/<?php echo $sql_auth['article_id']  . "/" . $sql_auth['image']  ?>'); ">
                            </div>
                             <div class="title_article"><?php echo $sql_auth['name'] ?></div>
                             <div class="desc_article">
                                <?php echo $sql_auth['adddesc']; ?>
                            </div>
                            <div class='blue'>
                                <?php if($sql_auth['artstatus']==1) {
                                        if ($lang_dir == "en"){
                                            echo "( Confirmed )" ;
                                        }
                                        if ($lang_dir == "am"){
                                            echo "( Հասատատված է )" ;
                                        }
                                        if ($lang_dir == "ru"){
                                            echo "( Подтвержденный )" ;
                                        }
                                    }else{
                                        if ($lang_dir == "am"){
                                            echo "( Գտնվում է հասատատման փուլում )" ;
                                        }
                                        if ($lang_dir == "en"){
                                            echo "( In the verification process )" ;
                                        }
                                        if ($lang_dir == "ru"){
                                            echo "( Находится в процессе утверждения )" ;
                                        }
                                    }
                                ?>
                            </div>
                           <?php if($sql_auth['artstatus']==1) {
                            ?>
                            <div class="read-more">
                                <a href='auth-article-read.php?code=<?php echo $sql_auth['article_id'];?>'> 
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
                        <?php
                           }
                           ?>
                        </div>
                    <?php
                    }
                    ?>


                    <?php
                    if(mysqli_num_rows($sql_result_his) || mysqli_num_rows($sql_result_auth)){
                        while($sql_his = mysqli_fetch_assoc($sql_result_his)){ 
                        ?>
                        <div class="flex_item_auth">
                             <div class="auth-image-div" style="background-image: url('../history-articles-images/<?php echo $sql_his['article_id']  . "/" . $sql_his['image']  ?>'); ">
                            </div>
                             <div class="title_article"><?php echo $sql_his['title'] ?></div>
                             <div class="desc_article">
                                <?php echo $sql_his['adddesc']; ?>
                            </div>
                            <div class='blue'>
                                <?php if($sql_his['artstatus']==1) {
                                        if ($lang_dir == "en"){
                                            echo "( Confirmed )" ;
                                        }
                                        if ($lang_dir == "am"){
                                            echo "( Հասատատված է )" ;
                                        }
                                        if ($lang_dir == "ru"){
                                            echo "( Подтвержденный )" ;
                                        }
                                    }else{
                                        if ($lang_dir == "am"){
                                            echo "( Գտնվում է հասատատման փուլում )" ;
                                        }
                                        if ($lang_dir == "en"){
                                            echo "( In the verification process )" ;
                                        }
                                        if ($lang_dir == "ru"){
                                            echo "( Находится в процессе утверждения )" ;
                                        }
                                    }
                                ?>
                            </div>
                           <?php if($sql_his['artstatus']==1) {
                        ?>
                        <div class="read-more">
                            <a href='auth-article-read.php?code=<?php echo $sql_his['article_id'];?>'> 
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
                        <?php
                           }
                           ?>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    }else{?>
                    
                    <div class="mt-3 col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8" id="no_result">

                        <?php if ($lang_dir == "en") : ?>
                            <h3 class="sel_article"> You do not have active additions to the articles</h3>
                        <?php endif; ?>
                        <?php if ($lang_dir == "ru") : ?>
                            <h3 class="sel_article">У вас нет активных дополнений к статьям</h3>
                        <?php endif; ?>
                        <?php if ($lang_dir == "am") : ?>
                            <h3 class="sel_article">Դուք չունեք ակտիվ հոդվածի լրացումներ</h3>
                        <?php endif; ?>
        
                    </div>
                    <?php
                    }
                    }
                    ?>
                </div>  
                