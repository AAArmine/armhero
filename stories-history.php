<?php
session_start();
include "../config/dbconfig.php";
include '../lang_config.php';


$current_array = explode('-', $currren_uri);
$str_index = strpos($current_array[1], '.php');


$stories_type = substr($current_array[1], 0, $str_index);

$table_n = $stories_type . '_articles_' . $lang_dir;

$table_image_n = $stories_type . '_images';
if (!isset($_GET['page'])) {

    $page = 1;

} else {

    $page = $_GET['page'];

}

$sql = "SELECT * FROM $table_n INNER JOIN $table_image_n ON $table_n.article_id = $table_image_n.article_id WHERE $table_image_n.main = 1 AND $table_n.article_status = 1";
$res = $con->query($sql);
$count_result = $res->num_rows;

$per_page = 6;
$pages_count = ceil($count_result / $per_page);

$starting_index = ($page - 1) * $per_page;
$sql = "SELECT * FROM $table_n INNER JOIN $table_image_n ON $table_n.article_id = $table_image_n.article_id WHERE $table_image_n.main = 1 AND $table_n.article_status = 1 LIMIT $starting_index,$per_page";
$res = $con->query($sql);
$count_result = $res->num_rows;



if ($res->num_rows > 0) {
    $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
}

//filters
$sql_bytitle="SELECT title FROM $table_n where article_status=1";
$result_bytitle= $con->query($sql_bytitle);

$sql_bypublicationdate="SELECT created_date FROM $table_n where article_status=1" ;
$result_bypublicationdate= $con->query($sql_bypublicationdate);

$sql_bytitle2="SELECT  title FROM $table_n where article_status=1 order by number_of_views DESC limit 10";
$result_bytitle2= mysqli_query($con, $sql_bytitle2);


$con->close();


?>
<?php
include "../header.php";

function custom_echo($x, $length)
{
    if (strlen($x) <= $length) {
        echo $x;
    } else {
        $y = substr($x, 0, $length) . '...';
        echo $y;
    }
}

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<link rel="stylesheet" href="../css/navbar.css">
<link rel="stylesheet" href="../css/footer.css">
<link rel="stylesheet" href="../css/stories2.css">
<link rel="stylesheet" href="../css/account.css">
<title>Articles</title>


</head>
<body>
<input type="hidden" value="<?php echo $lang_dir ?>" id="cur_lang_page">

<?php
include "whitenav.php";
?>
<!-- Navbar-->
<?php
include "navbar.php";
?>

<input type="hidden" id='language' value='<?php echo $lang_dir;?>'>
    <div class="container-fluid-80">
        
        <div class="filters-section w-80">
            <h3 class="title-filter">
                <?php
                    if ($lang_dir == "am") {
                        echo "Ընտրել հոդված ըստ՝";
                    }
                    if ($lang_dir == "en") {
                        echo "Select article by:";
                    }
                    if ($lang_dir == "ru") {
                        echo "Выберите статью по:";
                    }
                ?>
            </h3>
            <div class="filters-section-flex d-flex justify-content-around">
                <div class="filters-item">
                    <div class="d-flex">
                        <div>
                            <select class='form-control fix-input-width' id="auth_title">
                                <option value="" disabled selected>
                                    <?php
                                        if ($lang_dir == "am") {
                                            echo "Վերնագրով";
                                        }
                                        if ($lang_dir == "en") {
                                            echo "By title";
                                        }
                                        if ($lang_dir == "ru") {
                                            echo "По названию:";
                                        }
                                    ?>
                                    </option>
                        
                                    <?php
                                        if(mysqli_num_rows($result_bytitle)){
                                            while($sql_bytitle = mysqli_fetch_assoc($result_bytitle)){ 
                                    ?>
                                    <option value="<?php echo $sql_bytitle['title'];?>"><?php echo $sql_bytitle['title'];?></option>
                                    <?php
                                            }
                                        }
                                    ?>
                            </select>
                            
                        </div>
                        <div>
                            <button class='form-control submit-filter' id='submitTitle'>Submit</button> 
                            
                        </div>
                    </div>  
                    <div class='height-default'>
                        <div class='error-filling-filter' id="notFilledTitle">Fill the field before submitting</div>
                    </div>    
                </div>
                    
                <div class="filters-item">
                    <div class="d-flex">
                        <div>
                            <select class='form-control fix-input-width' id="auth_publicationdate">
                                <option value="" disabled selected>
                                    <?php
                                        if ($lang_dir == "am") {
                                            echo "Հրապարակման ամսաթիվը";
                                        }
                                        if ($lang_dir == "en") {
                                            echo "Publication date";
                                        }
                                        if ($lang_dir == "ru") {
                                            echo "Дата публикации";
                                        }
                                    ?>
                                    </option>
                        
                                    <?php
                                        if(mysqli_num_rows($result_bypublicationdate)){
                                            while($sql_bypublicationdate= mysqli_fetch_assoc($result_bypublicationdate)){ 
                                    ?>
                                    <option value="<?php echo $sql_bypublicationdate['created_date'];?>"><?php echo $sql_bypublicationdate['created_date'];?></option>
                                    <?php
                                            }
                                        }
                                    ?>
                            </select>
                            
                        </div>
                        <div>
                            <button class='form-control submit-filter' id='submitPublicationdate'>Submit</button> 
                            
                        </div>
                    </div>  
                    <div class='height-default'>
                        <div class='error-filling-filter' id="notFilledPublicationdate">Fill the field before submitting</div>
                    </div>    
                </div>

                <div class="filters-item">
                    <div class="d-flex">
                        <div>
                            <select class='form-control fix-input-width' id="auth_title2">
                                <option value="" disabled selected>
                                    <?php
                                        if ($lang_dir == "am") {
                                            echo "Ամենաշատ դիտվածներ";
                                        }
                                        if ($lang_dir == "en") {
                                            echo "Most Viewed";
                                        }
                                        if ($lang_dir == "ru") {
                                            echo "Самые популярные";
                                        }
                                    ?>
                                    </option>
                        
                                    <?php
                                        if(mysqli_num_rows($result_bytitle2)){
                                        while($sql_bytitle2 = mysqli_fetch_assoc($result_bytitle2)){ 
                                    ?>
                                    <option value="<?php echo $sql_bytitle2['title'];?>"><?php echo $sql_bytitle2['title'];?></option>
                                    <?php
                                            }
                                        }
                                    ?>
                            </select>
                            
                        </div>
                        <div>
                            <button class='form-control submit-filter' id='submitTitle2'>Submit</button> 
                            
                        </div>
                    </div>  
                    <div class='height-default'>
                        <div class='error-filling-filter' id="notFilledTitle2">Fill the field before submitting</div>
                    </div>    
                </div>


            </div>
        <div class="filter_content">

        </div> 
    </div>
    <div class="container-fluid">

        

  
                <?php if (isset($data)) {
                    ?>
                <div class="mb-5 row history_header">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center">
                        <div class="mt-5 col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 d-flex flex-column align-items-center history_h_content">
                            <h5 class="h_h_title">
                            <?php
                                if ($lang_dir == "am") {
                                    echo "Բոլոր հոդվածները";
                                }
                                if ($lang_dir == "en") {
                                    echo " All articles";
                                }
                                if ($lang_dir == "ru") {
                                    echo "Все статьи";
                                }
                            ?>
                            </h5>
                            <!-- <div class="h_h_text">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text
                                ever since the 1500s.
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="auth-flex d-flex flex-wrap ">
                <?php
                    foreach ($data as $d) : ?>
                        <div class="auth-flex-item col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4" data-article_id="<?php echo $d['article_id'] ?>" data-article="history" data-article_view="history">
                            <div class="img_article" style="background-image: url('../history-articles-images/<?php echo $d['article_id'] ?>/<?php echo $d['image'] ?>');"></div>
                            <div class="title_article d-flex "><?php echo ($d['title']); ?></div>
                            <div class="desc_article">
                                <?php echo $d['description']; ?>
                            </div>
                            <div class="red-line">
                                </div>
                                <div class="read-more">
                                    <div class="read-more" data-article_id="<?php echo $d['article_id'] ?>" data-article="history" data-article_view="history">
                                        <?php
                                            if ($lang_dir == "am") {
                                        ?>
                                            <a href="history_read.php?code=<?php echo $d['article_id'] ?>"> Կարդալ </a>
                                        <?php
                                        }
                                            if ($lang_dir == "en") {
                                        ?>
                                            <a href="history_read.php?code=<?php echo $d['article_id'] ?>"> Read More </a>
                                        <?php
                                        }
                                            if ($lang_dir == "ru") {
                                        ?>
                                            <a href="history_read.php?code=<?php echo $d['article_id'] ?>"> Подробнее </a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                        </div>
                <?php endforeach;
                } else{
                    if ($lang_dir == "am") {
                        echo "<h5 class='no_results'>Այս բաժնում առայժմ հոդվածներ չկան</h5>";
                    }
                    if ($lang_dir == "ru") {
                        echo "<h5 class='no_results'>В этом разделе пока нет статей</h5>";
                    }
                    if ($lang_dir == "en") {
                        echo "<h5 class='no_results'>There are no articles in this section yet</h5>";
                    }
                }?>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center" id="pagination_articles">
                <input type="hidden" id="last_page" value="<?php echo $pages_count ?>">
                <ul class="mt-5 pagination" id="his_ul">
                    <?php $page_number=intval($page);
                    if ($page_number > 2){?>
                        <a class="link_auth_prev"><span class=''><i class="fas fa-caret-left left_ar"></i></span></a>
                    <?php } ?>
                    <?php for ($page = 1; $page <= $pages_count; $page++) : ?>

                        <li class="page-item"><a class="link_auth" href="../<?php echo $lang_dir ?>/stories-history.php?page=<?php echo $page ?>"><?php echo $page ?></a>
                        </li>


                    <?php endfor; ?>
                    
                </ul>

            </div>


            <div class="create_st">

                <div class="text-center">
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <a href="../<?php echo $lang_dir ?>/add-article.php" class="btn1" id="history_create">
                            <?php
                            if ($lang_dir == "en") {

                                echo "Create Authobiography";
                            }
                            if ($lang_dir == "ru") {

                                echo "Создать Автобиографию";
                            }
                            if ($lang_dir == "am") {

                                echo "Ստեղծել Ինքնակենսագրական";
                            }
                            ?>

                        </a>

                </div>
            <?php else : ?>
                <a href="../<?php echo $lang_dir ?>/sign_in.php" class="btn1" id="history_create">
                    <?php
                        if ($lang_dir == "am") {
                            echo "Ստեղծել նոր հոդված";
                        }
                        if ($lang_dir == "en") {
                            echo "Write Your Story";
                        }
                        if ($lang_dir == "ru") {
                            echo "Создать новую статью";
                        }
                    ?>
                </a>

            <?php endif; ?>

        </div>

        <!-- END DB CONTENT -->
    </div>
</div>
</div>

<!--  footer  -->
<div class="container-fluid">
    <div class="row flex-column footer_row">
        <div class="col-sm-12 col-md-12 col-lg-12">

            <?php
            include "footer.php";
            ?>
        </div>


    </div>
</div>

<!-- footer -->


<script src='../js/stories.js' type="text/javascript">
</script>

</body>
</html>