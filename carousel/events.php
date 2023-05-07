<!-- ======= Carusel ======= -->
<section id="testimonials" class="w-100 industries-slide-section">
    <div class="container">
        <div class="row">
            <div class="container-carusel">
                <div class="owl-carousel birth-event-carousel" id="owl-carousel">
                    <?php
                    while ($sql_events = mysqli_fetch_assoc($result_event)) {
                        ?>
                        <div class="testimonial-item">
                            <div class="row-d">
                                <div class="event-image-div-car"
                                     style="background-image: url('../autobiography-articles-images/<?php echo $sql_events['article_id'] . "/" . $sql_events['image'] ?>');">
                                </div>
                                <div class="item-card">
                                    <div class="item-card-author">
                                        by <?php
                                        echo $sql_events['fullname'];
                                        ?>
                                    </div>
                                    <div class="item-card-title">
                                        <?php
                                        echo $sql_events['title'];
                                        ?>
                                    </div>
                                    <div class="item-card-text">
                                        <?php
                                        echo $sql_events['description'];
                                        ?>
                                    </div>
                                    <div class="red-line">
                                    </div>
                                    <div class="read-more">
                                        <a href='article-read.php?article_id=<?php echo $sql_events['article_id'] ?>'>
                                            Read More </a>
                                    </div>

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