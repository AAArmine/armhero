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



// filters
$sql_byname="SELECT name FROM $table_n group by name" ;
$result_byname= $con->query($sql_byname);

$sql_byplaceofbirth="SELECT place_of_birth FROM $table_n group by place_of_birth" ;
$result_byplaceofbirth= $con->query($sql_byplaceofbirth);

$sql_bybirthday="SELECT birth_day FROM $table_n group by birth_day";
$result_bybirthday= $con->query($sql_bybirthday);

$sql_byname2="SELECT  name FROM $table_n order by number_of_views DESC limit 10";
$result_byname2= mysqli_query($con, $sql_byname2);


$con->close();
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<link rel="stylesheet" href="../css/navbar.css">
<link rel="stylesheet" href="../css/footer.css">
<link rel="stylesheet" href="../css/stories.css">
<link rel="stylesheet" href="../css/account.css">
<link rel="stylesheet" href="../css/storties-autobiography.css">
<title>Armheroes Histories</title>


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
                        echo "Ընտրել կենսագրություն ըստ՝";
                    }
                    if ($lang_dir == "en") {
                        echo "Select biography by:";
                    }
                    if ($lang_dir == "ru") {
                        echo "Выберите биографию по:";
                    }
                ?>
            </h3>
            <div class="filters-section-flex d-flex justify-content-between">
                <div class="filters-item">
                    <div class="d-flex">
                        <div>
                            <select class='form-control fix-input-width' id="auth_name">
                                <option value="" disabled selected>
                                    <?php
                                        if ($lang_dir == "am") {
                                            echo "Անուն Ազգանուն";
                                        }
                                        if ($lang_dir == "en") {
                                            echo "Name Surname";
                                        }
                                        if ($lang_dir == "ru") {
                                            echo "Имя Фамилия:";
                                        }
                                    ?>
                                    </option>
                        
                                    <?php
                                        if(mysqli_num_rows($result_byname)){
                                            while($sql_byname = mysqli_fetch_assoc($result_byname)){ 
                                    ?>
                                    <option value="<?php echo $sql_byname['name'];?>"><?php echo $sql_byname['name'];?></option>
                                    <?php
                                            }
                                        }
                                    ?>
                            </select>
                            
                        </div>
                        <div>
                            <button class='form-control submit-filter' id='submitName'>Submit</button> 
                            
                        </div>
                    </div>  
                    <div class='height-default'>
                        <div class='error-filling-filter' id="notFilledName">Fill the field before submitting</div>
                    </div>    
                </div>
                    
                <div class="filters-item">
                    <div class="d-flex">
                        <div>
                            <select class='form-control fix-input-width' id="auth_birthday">
                                <option value="" disabled selected>
                                    <?php
                                        if ($lang_dir == "am") {
                                            echo "Ծննդյան ամսաթիվ";
                                        }
                                        if ($lang_dir == "en") {
                                            echo "Birth day";
                                        }
                                        if ($lang_dir == "ru") {
                                            echo "День рождения";
                                        }
                                    ?>
                                    </option>
                        
                                    <?php
                                        if(mysqli_num_rows($result_bybirthday)){
                                            while($sql_bybirthday = mysqli_fetch_assoc($result_bybirthday)){ 
                                    ?>
                                    <option value="<?php echo $sql_bybirthday['birth_day'];?>"><?php echo $sql_bybirthday['birth_day'];?></option>
                                    <?php
                                            }
                                        }
                                    ?>
                            </select>
                            
                        </div>
                        <div>
                            <button class='form-control submit-filter' id='submitBirthDay'>Submit</button> 
                            
                        </div>
                    </div>  
                    <div class='height-default'>
                        <div class='error-filling-filter' id="notFilledBirthday">Fill the field before submitting</div>
                    </div>    
                </div>

                <div class="filters-item">
                    <div class="d-flex">
                        <div>
                            <select class='form-control fix-input-width' id="auth_placeofbirth">
                                <option value="" disabled selected>
                                    <?php
                                        if ($lang_dir == "am") {
                                            echo "Ծննդավայր";
                                        }
                                        if ($lang_dir == "en") {
                                            echo "Place of birth";
                                        }
                                        if ($lang_dir == "ru") {
                                            echo "Место рождения";
                                        }
                                    ?>
                                </option>
                        
                                    <?php
                                        if(mysqli_num_rows($result_byplaceofbirth)){
                                            while($sql_byplaceofbirth = mysqli_fetch_assoc($result_byplaceofbirth)){ 
                                    ?>
                                    <option value="<?php echo $sql_byplaceofbirth['place_of_birth'];?>"><?php echo $sql_byplaceofbirth['place_of_birth'];?></option>
                                    <?php
                                            }
                                        }
                                    ?>
                            </select>
                            
                        </div>
                        <div>
                            <button class='form-control submit-filter' id='submitPlaceOfBirth'>Submit</button> 
                            
                        </div>
                    </div>  
                    <div class='height-default'>
                        <div class='error-filling-filter' id="notFilledPlaceOfBirth">Fill the field before submitting</div>
                    </div>    
                </div>

                <div class="filters-item">
                    <div class="d-flex">
                        <div>
                            <select class='form-control fix-input-width' id="auth_name2">
                                <option value="" disabled selected>
                                    <?php
                                        if ($lang_dir == "am") {
                                            echo "Ամենաշատ դիտվածներ";
                                        }
                                        if ($lang_dir == "en") {
                                            echo "Most Viewed";
                                        }
                                        if ($lang_dir == "ru") {
                                            echo "Наиболее просматриваемые";
                                        }
                                    ?>
                                    </option>
                        
                                    <?php
                                        if(mysqli_num_rows($result_byname2)){
                                            while($sql_byname2 = mysqli_fetch_assoc($result_byname2)){ 
                                    ?>
                                    <option value="<?php echo $sql_byname2['name'];?>"><?php echo $sql_byname2['name'];?></option>
                                    <?php
                                            }
                                        }
                                    ?>
                            </select>
                            
                        </div>
                        <div>
                            <button class='form-control submit-filter' id='submitName2'>Submit</button> 
                            
                        </div>
                    </div>  
                    <div class='height-default'>
                        <div class='error-filling-filter' id="notFilledName2">Fill the field before submitting</div>
                    </div>    
                </div>
            </div>
        <div class="filter_content">

        </div>
        <div class="filter_content2">
            
        </div>   
        </div>

        <!--  DB CONTENT -->
        <div class='articles_all'>
            <hr>
            <h3 class="main_caption">
            <?php
                if ($lang_dir == "am") {
                    echo "Բոլոր կենսագրությունները";
                }
                if ($lang_dir == "en") {
                    echo "All biographies";
                }
                if ($lang_dir == "ru") {
                    echo "Все биографии";
                }
            ?>
            </h3>

        </div>

        
        <div class="auth-flex d-flex flex-wrap ">
            <?php if (isset($data)) {
                foreach ($data as $d) : ?>
                    <div class="auth-flex-item col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4" data-article_id="<?php echo $d['article_id'] ?>" data-article="autobiography" data-article_view="autobiography">
                        <div class="img_article" style="background-image: url('../autobiography-articles-images/<?php echo $d['article_id'] ?>/<?php echo $d['image'] ?>');"></div>
                        <div class="title_article d-flex "><?php echo ($d['name']); ?></div>
                        <div class="desc_article">
                            <?php echo $d['description']; ?>
                        </div>
                        <div class="red-line">
                            </div>
                            <div class="read-more">
                                <div class="">
                                    <?php
                                    if ($lang_dir == "am") {
                                    ?>
                                        <a href='auth-article-read.php?code=<?php echo $d['article_id']; ?>'> Կարդալ </a>
                                    <?php
                                    }
                                    if ($lang_dir == "en") {
                                    ?>
                                        <a href='auth-article-read.php?code=<?php echo $d['article_id']; ?>'> Read More </a>
                                    <?php
                                    }
                                    if ($lang_dir == "ru") {
                                    ?>
                                        <a href='auth-article-read.php?code=<?php echo $d['article_id']; ?>'> Подробнее </a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                    </div>
            <?php endforeach;
            } ?>
        </div>
        <div class="d-flex justify-content-center" id="pagination_articles">
            <input type="hidden" id="last_page" value="<?php echo $pages_count ?>">
            <ul class="mt-5 pagination" id="his_ul">
                <?php $page_number=intval($page);
                if ($page_number > 2){?>
                    <a class="link_auth_prev"><span class=''><i class="fas fa-caret-left left_ar"></i></span></a>
                <?php } ?>
                <?php for ($page = 1; $page <= $pages_count; $page++) : ?>

                    <li class="page-item"><a class="link_auth" href="../<?php echo $lang_dir ?>/stories-autobiography.php?page=<?php echo $page ?>"><?php echo $page ?></a>
                    </li>


                <?php endfor; ?>
                
            </ul>

        </div>


        <div class="create_st">

            <div class="text-center">
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <a href="../<?php echo $lang_dir ?>/add-article.php#showFrom" class="btn1" id="history_create">
                        <?php
                        if ($lang_dir == "en") {

                            echo "Create Biography";
                        }
                        if ($lang_dir == "ru") {

                            echo "Создать биографию";
                        }
                        if ($lang_dir == "am") {

                            echo "Ստեղծել կենսագրություն";
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
                        echo "Write an article";
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