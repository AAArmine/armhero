<!-- ======= Carusel ======= -->
<section id="testimonials" class="w-100 industries-slide-section">
    <div class="container">
        <div class="row">
            <div class="container-carusel">
                <div class="owl-carousel birth-event-carousel" id="owl-carousel">
                    <?php
                    while ($sql_most_views = mysqli_fetch_assoc($result_most_views)) {
                    ?>
                        <div class="testimonial-item">
                            <div class="row-d">
                                <div class="birthday-image-div-car" style="background-image: url('../autobiography-articles-images/<?php echo $sql_most_views['article_id'] . "/" . $sql_most_views['image'] ?>');">
                                </div>
                                <div class="item-card">
                                    <div class="item-card-author">
                                        <?php
                                        if ($lang_dir == "am") {
                                            echo "Հեղինակ՝ " . $sql_most_views['fullname_am'];
                                        }
                                        if ($lang_dir == "en") {
                                            echo "by " . $sql_most_views['fullname_en'];
                                        }
                                        if ($lang_dir == "ru") {
                                            echo "Автор: " . $sql_most_views['fullname_ru'];
                                        }
                                        ?>
                                    </div>
                                    <div class="item-card-title">
                                        <?php
                                        echo $sql_most_views['name'];
                                        ?>
                                    </div>
                                    <div class="item-card-text">
                                        <?php
                                        echo $sql_most_views['description'];
                                        ?>
                                    </div>
                                    <div class="red-line">
                                    </div>
                                    <a  class='no_dec' href='auth-article-read.php?code=<?php echo $sql_most_views['article_id']; ?>'> 
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


                </div>
            </div>
        </div>
    </div>
</section>