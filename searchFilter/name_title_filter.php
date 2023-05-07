<?php
include "../config/dbconfig.php";


if(isset($_POST['name_search']) || isset($_POST['title_search'])){
    if(isset($_POST['name_search'])){
        $lang=$_POST['lang'];
        $name_title=$_POST['name_search'];
        $column_name='name';
        $table_name='autobiography_articles_'.$lang;
        $aut_or_hist='autobiography';
    }elseif(isset($_POST['title_search'])){
        $lang=$_POST['lang'];
        $name_title=$_POST['title_search'];
        $column_name='title';
        $table_name='history_articles_'.$lang;
        $aut_or_hist='history';
    }

    $sql = "SELECT ".$column_name.", article_id FROM ".$table_name." WHERE ".$column_name." LIKE '%".$name_title."%' and article_status=1";
    $res = $con->query($sql);

    if(isset($res)){
        if ($res->num_rows > 0) {
            $all_names = mysqli_fetch_all($res, MYSQLI_ASSOC);
            ?>
            <span class="result-by-search-title">
                <?php echo $res->num_rows;?> 
                <?php
                    if ($lang == "am") {
                        echo "արդյունք գտնվեց";
                    }
                    if ($lang == "en") {
                        echo "result(s) found";
                    }
                    if ($lang == "ru") {
                        echo "результат(a)";
                    }
                ?>
            </span>
            <div class="search_filter_flex pt-2">
                
            <?php
            foreach ($all_names as $el){
                ?>
                <div class=' justify-content-between d-flex search-filter-item serch-result-item'>
                    <div class='serch-result-item-name'>
                        <?php echo $el[$column_name];?>
                    </div>
                        <div class="read-more one_block" data-article_id="<?php echo $el['article_id'] ?>" data-article=<?php echo $aut_or_hist; ?> data-article_view=<?php echo $aut_or_hist; ?>>
                            <?php
                            if ($lang == "am") {
                            ?>
                                <a> Կարդալ </a>
                            <?php
                            }
                            if ($lang == "en") {
                            ?>
                                <a> Read </a>
                            <?php
                            }
                            if ($lang == "ru") {
                            ?>
                                <a> Подробнее </a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
            <?php
            }

        }else{
        ?>
            <span class="result-by-search-title">
                <?php
                    if ($lang == "am") {
                        echo "Որոնման արդյունք չի գտնվել";
                    }
                    if ($lang == "en") {
                        echo "No search results found";
                    }
                    if ($lang == "ru") {
                        echo "Результаты поиска не найдены";
                    }
                ?>
            </span>
        <?php
        }
        }
        ?>
    </div>
    <?php
    }
?>


<?php
if(isset($_POST['birthPlace']) && isset($_POST['birthDate'])){
    $lang=$_POST['lang'];
    $sql = "SELECT name, article_id FROM autobiography_articles_".$lang." WHERE birth_day = '".$_POST['birthDate']."' and place_of_birth = '".$_POST['birthPlace']."' and article_status=1";
    $res = $con->query($sql);
    if(isset($res)){
        if ($res->num_rows > 0) {
            $all_names = mysqli_fetch_all($res, MYSQLI_ASSOC);
            ?>
            <span class="result-by-search-title">
                <?php echo $res->num_rows;?> 
                <?php
                   
                    if ($lang == "am") {
                        echo "արդյունք գտնվեց միասին՝ ըստ ծննդյան ամսաթվի և ծննդավայրի";
                    }
                    if ($lang == "en") {
                        echo "result(s) found by both date and place of birth";
                    }
                    if ($lang == "ru") {
                        echo "результат(a) как по дате, так и по месту рождения";
                    }
                ?>
            </span>
            <div class="search_filter_flex pt-2">
                
            <?php
            foreach ($all_names as $el){
                ?>
                <div class=' justify-content-between d-flex search-filter-item serch-result-item'>
                    <div class='serch-result-item-name'>
                        <?php echo $el['name'];?>
                    </div>
                        <div class="read-more one_block" data-article_id="<?php echo $el['article_id'] ?>" data-article='autobiography' data-article_view='autobiography'>
                            <?php
                            if ($lang == "am") {
                            ?>
                                <a> Կարդալ </a>
                            <?php
                            }
                            if ($lang == "en") {
                            ?>
                                <a> Read </a>
                            <?php
                            }
                            if ($lang == "ru") {
                            ?>
                                <a> Подробнее </a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
            <?php
            }
            return;
        }else{
            echo '';
        }
        }
        ?>
    </div>
    <?php
}
if(isset($_POST['birthDate'])){
    $lang=$_POST['lang'];
    $sql = "SELECT name, article_id FROM autobiography_articles_".$lang." WHERE birth_day = '".$_POST['birthDate']."' and article_status=1";
    $res = $con->query($sql);
    if(isset($res)){
        if ($res->num_rows > 0) {
            $all_names = mysqli_fetch_all($res, MYSQLI_ASSOC);
            ?>
            <span class="result-by-search-title">
                <?php echo $res->num_rows;?> 
                <?php
                    if ($lang == "am") {
                        echo "արդյունք գտնվեց ըստ ծննդյան ամսաթվի";
                    }
                    if ($lang == "en") {
                        echo "result(s) found by date of birth";
                    }
                    if ($lang == "ru") {
                        echo "результат(a) по дате рождения";
                    }
                ?>
            </span>
            <div class="search_filter_flex pt-2">
                
            <?php
            foreach ($all_names as $el){
                ?>
                <div class=' justify-content-between d-flex search-filter-item serch-result-item'>
                    <div class='serch-result-item-name'>
                        <?php echo $el['name'];?>
                    </div>
                        <div class="read-more one_block" data-article_id="<?php echo $el['article_id'] ?>" data-article='autobiography' data-article_view='autobiography'>
                            <?php
                            if ($lang == "am") {
                            ?>
                                <a> Կարդալ </a>
                            <?php
                            }
                            if ($lang == "en") {
                            ?>
                                <a> Read </a>
                            <?php
                            }
                            if ($lang == "ru") {
                            ?>
                                <a> Подробнее </a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
            <?php
            }

        }
        }
        ?>
    </div>
    <?php
    }

if(isset($_POST['birthPlace']) ){
    $lang=$_POST['lang'];
    $sql = "SELECT name, article_id FROM autobiography_articles_".$lang." WHERE place_of_birth= '".$_POST['birthPlace']."' and article_status=1";
    $res = $con->query($sql);
    if(isset($res)){
        if ($res->num_rows > 0) {
            $all_names = mysqli_fetch_all($res, MYSQLI_ASSOC);
            ?>
            <span class="result-by-search-title">
                <?php echo $res->num_rows;?> 
                <?php
                    if ($lang == "am") {
                        echo "արդյունք գտնվեց ըստ ծննդավայրի";
                    }
                    if ($lang == "en") {
                        echo "result(s) found by place of birth";
                    }
                    if ($lang == "ru") {
                        echo "результат(a) по месту рождения";
                    }
                ?>
            </span>
            <div class="search_filter_flex pt-2">
                
            <?php
            foreach ($all_names as $el){
                ?>
                <div class=' justify-content-between d-flex search-filter-item serch-result-item'>
                    <div class='serch-result-item-name'>
                        <?php echo $el['name'];?>
                    </div>
                        <div class="read-more one_block" data-article_id="<?php echo $el['article_id'] ?>" data-article='autobiography' data-article_view='autobiography'>
                            <?php
                            if ($lang == "am") {
                            ?>
                                <a> Կարդալ </a>
                            <?php
                            }
                            if ($lang == "en") {
                            ?>
                                <a> Read </a>
                            <?php
                            }
                            if ($lang == "ru") {
                            ?>
                                <a> Подробнее </a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
            <?php
            }

        }
        }
        ?>
    </div>
    <?php
    }
?>



