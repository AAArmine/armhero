<!-- ======= Carusel ======= -->
<section id="testimonials" class="w-100 industries-slide-section">
    <div class="container">
        <div class="row">
            <div class="container-carusel">
                <div class="owl-carousel testimonials-carousel" id="owl-carousel">


                <?php
                    while ($sql_most_read = mysqli_fetch_assoc($result_most_read)) {
                    ?>
                        <div class="testimonial-item"
                             data-article_id="<?php echo $sql_most_read['article_id'] ?>"
                            <?php if (isset($sql_most_read['name'])): ?> data-article="autobiography" data-article_view="autobiography" <?php else : ?>data-article="history" data-article_view="history"<?php endif; ?>
                        >
                            <div class="row">
                                <?php if (isset($sql_most_read['name'])): ?>    
                                    <div class="carousel-img-div"
                                         style='background: url(../autobiography-articles-images/<?php echo $sql_most_read['article_id'] ?>/<?php echo $sql_most_read['image'] ?>);'>
                                    </div>
                                    <div class='carousel-name'><?php echo $sql_most_read['name'] ?>
                                    </div>
                                <?php else: ?>
                                    <div class="carousel-img-div"
                                         style='background: url(../history-articles-images/<?php echo $sql_most_read['article_id'] ?>/<?php echo $sql_most_read['image'] ?>);'>
                                    </div>
                                    <div class='carousel-name'><?php echo $sql_most_read['title'] ?>
                                    </div>
                                <?php endif; ?>
                                
                                    <div class="mt-1 carousel_author"><?php echo $sql_most_read['fullname_'.$lang_dir] ?></div>
                          
                                <div class="carousel_created_date">

                                    <?php echo $sql_most_read['created_date'] ?>
                                    <div>
                                        <?php
                                        if($history){
                                        ?>
                                            <a  class='no_dec' href='history_read.php?code=<?php echo $sql_most_read['article_id']; ?>'>
                                        <?php 
                                        }else{
                                        ?>
                                            <a  class='no_dec' href='auth-article-read.php?code=<?php echo $sql_most_read['article_id']; ?>'>
                                        <?php    
                                        }
                                        ?>
                                        
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
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>