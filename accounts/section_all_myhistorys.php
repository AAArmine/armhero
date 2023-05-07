<?php
$auth_table="history_articles_".$lang_dir;

$user_id=$_SESSION['user_id'];
$sql_auth="SELECT * FROM $auth_table INNER JOIN history_images on $auth_table.article_id= history_images.article_id WHERE history_images.main = 1 and $auth_table.user_id ='$user_id'";

$sql_result_auth=mysqli_query($con, $sql_auth);

?>
                <div class="d-flex justify-content-between w-100">
                <?php if ($lang_dir == "en") : ?>
                    <div class='items'>
                        <h5 class="sel_article"> My Articles </h5>
                    </div>
                    <div><a href="../<?php echo $lang_dir ?>/add-article.php" class="create_article"
                    id="create_link">Create an article <i class="fas fa-plus"></i></a></div>
                <?php endif; ?>
                <?php if ($lang_dir == "ru") : ?>
                    <div><h5 class="sel_article">  Мои статьи </h5></div>
                    <div><a href="../<?php echo $lang_dir ?>/add-history-article.php" class="create_article"
                    id="create_link">Создать статью <i class="fas fa-plus"></i></a></div>
                <?php endif; ?>
                <?php if ($lang_dir == "am") : ?>
                    <div><h5 class="sel_article">Իմ հոդվածները</h5></div>
                    <div><a href="../<?php echo $lang_dir ?>/add-article.php" class="create_article"
                    id="create_link">Ստեղծել հոդված <i class="fas fa-plus"></i></a></div>
                <?php endif; ?>
                </div>
                <div class="d-flex justify-content-around w-100 flex-wrap">
                    <?php
                    if(mysqli_num_rows($sql_result_auth)>0){
                        while($sql_auth = mysqli_fetch_assoc($sql_result_auth)){ 
                        ?>
                        <div class="flex_item_auth">
                             <div class="auth-image-div" style="background-image: url('../history-articles-images/<?php echo $sql_auth['article_id']  . "/" . $sql_auth['image']  ?>'); ">
                             </div>
                             <div class="title_article"><?php echo $sql_auth['title'] ?></div>
                             <div class="desc_article">
                                <?php echo $sql_auth['description']; ?>
                            </div>
                            <div class='blue'>
                                <?php if($sql_auth['article_status']==1) {
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
                           <?php if($sql_auth['article_status']==1) {
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
                    }else{?>
                    
                    <div class="mt-3 col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8" id="no_result">

                        <?php if ($lang_dir == "en") : ?>
                            <h3 class="sel_article"> You do not have active articles </h3>
                        <?php endif; ?>
                        <?php if ($lang_dir == "ru") : ?>
                            <h3 class="sel_article">У вас нет активных статей</h3>
                        <?php endif; ?>
                        <?php if ($lang_dir == "am") : ?>
                            <h3 class="sel_article">Դուք չունեք ակտիվ հոդվածներ</h3>
                        <?php endif; ?>
        
                    </div>
                    <?php
                    }
                    ?>
                </div>  