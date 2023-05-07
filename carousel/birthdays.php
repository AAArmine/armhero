<!-- ======= Carusel ======= -->
<section id="testimonials" class="w-100 industries-slide-section">
    <div class="container">
        <div class="row">
            <div class="container-carusel">
                <div class="owl-carousel birth-event-carousel" id="owl-carousel">
                    <?php
                    while ($sql_birthdays = mysqli_fetch_assoc($result_birthday)) {
                    ?>
                        <div class="testimonial-item">
                            <div class="row-d">
                                <div class="birthday-image-div-car" style="background-image: url('../autobiography-articles-images/<?php echo $sql_birthdays['article_id'] . "/" . $sql_birthdays['image'] ?>');">
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

                        </div>
                    <?php
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>
</section>