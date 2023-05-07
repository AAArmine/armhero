<?php
// session_start();
include 'lang_config.php';
include '../create_variant/create_variant_content.php';
include "../config/dbconfig.php";
//var_dump($lang_dir);

$sql = "SELECT place_of_birth FROM autobiography_articles_".$lang_dir." WHERE article_status=1 GROUP BY place_of_birth";
$res = $con->query($sql);
if ($res->num_rows > 0) {

    $all_place_of_birth = mysqli_fetch_all($res, MYSQLI_ASSOC);
}

$sql_birthDay = "SELECT birth_day FROM autobiography_articles_".$lang_dir." WHERE article_status=1 GROUP BY birth_day";
$res_birthDay = $con->query($sql_birthDay);
if ($res_birthDay->num_rows > 0) {

    $all_date_of_birth = mysqli_fetch_all($res_birthDay, MYSQLI_ASSOC);
}
?>

<input type="hidden" id="cur_lang_page" value="<?php echo $lang_dir ?>">
<div class="d-flex flextop justify-content-between flextop-nav <?php if (strpos($currren_uri, 'account.php') !== false || strpos($currren_uri, 'autobiography.php') !== false || strpos($currren_uri, 'stories-history.php') !== false) : ?>black_nav<?php endif; ?>">
    <div class="<?php if (strpos($currren_uri, 'account.php') !== false) : ?>mt-1<?php endif ?> flex-item1">
        <ul class='navul'>
            <li>
                <span class="navspan 
                    <?php
                    if ($file_name == 'home.php') {
                        echo 'navspanactive';
                    } ?>"><a href="home.php">
                        <?php
                        if ($lang_dir == "am") {
                            echo "Գլխավոր";
                        }
                        if ($lang_dir == "en") {
                            echo "Home";
                        }
                        if ($lang_dir == "ru") {
                            echo "Главная ";
                        }
                        ?>
                    </a>
                </span>

            </li>
            <li class='margin-li relative-li'>
                <span class='navspan
                    <?php
                    if ($file_name == "stories-autobiography.php" || substr($file_name, 0, 7) == 'stories' || substr($file_name, 0, 7) == 'article' || $file_name == "stories-event.php" || $file_name == "read-article.php") {
                        echo "navspanactive";
                    } ?>'>

                    <?php
                    if ($lang_dir == "am") {
                        echo "Պատմություններ";
                    }
                    if ($lang_dir == "en") {
                        echo "Stories";
                    }
                    if ($lang_dir == "ru") {
                        echo "Истории";
                    }
                    ?>
                </span>
                <div class="abs-triangle"></div>
                <div class="abs-stories">
                    <div class="abs-stories-links" data-id="autobiography">
                        <a href='../<?php echo $lang_dir ?>/stories-autobiography.php'>
                            <?php
                            if ($lang_dir == "am") {
                                echo "Կենսագրություն";
                            }
                            if ($lang_dir == "en") {
                                echo "Biography";
                            }
                            if ($lang_dir == "ru") {
                                echo "Биография";
                            }
                            ?>

                        </a>
                    </div>
                    <div class="abs-stories-links" data-id="history">
                        <a href='../<?php echo $lang_dir ?>/stories-history.php'>
                            <?php
                            if ($lang_dir == "am") {
                                echo "Հոդված";
                            }
                            if ($lang_dir == "en") {
                                echo "Article";
                            }
                            if ($lang_dir == "ru") {
                                echo "Статья";
                            }
                            ?>
                        </a>
                    </div>

                </div>
            </li>
            <li class='margin-li'>
                <span class='navspan
                    <?php
                    if ($file_name == "aboutpage.php") {
                        echo "navspanactive";
                    } ?>
                    '>
                    <a href='aboutpage.php'>
                        <?php
                        if ($lang_dir == "am") {
                            echo "Մեր մասին";
                        }
                        if ($lang_dir == "en") {
                            echo "About";
                        }
                        if ($lang_dir == "ru") {
                            echo "О нас";
                        }
                        ?>
                    </a>
                </span>
            </li>
            
            <li class='margin-li'>
                <span class='navspan
                    <?php
                    if ($file_name == "supporters.php") {
                        echo "navspanactive";
                    } ?>
                    '>
                    <a href='supporters.php'>
                    <?php
                        if ($lang_dir == 'am'){
                        echo "Հովանավորներ";
                        }
                        if ($lang_dir == 'en'){
                        echo "Supporters";
                        }
                        if ($lang_dir == 'ru'){
                            echo "Спонсоры";
                        }
                    ?>
                    </a>
                </span>
            </li>
            <li class='margin-li'>
                <span class='navspan
                    <?php
                    if ($file_name == "add-article.php") {
                        echo "navspanactive";
                    } ?>'>
                    <a id="create_variant">
                        <?php
                        if ($lang_dir == "am") {
                            echo "Ստեղծել հոդված";
                        }
                        if ($lang_dir == "en") {
                            echo "Create Story";
                        }
                        if ($lang_dir == "ru") {
                            echo "Создать статью";
                        }
                        ?>
                    </a>
                </span>
            </li>
        </ul>
    </div>


    <div class="flex-item2 d-flex">
        <div class="searchitem">
            <img src='../Icons/search.png' alt='searchicon'>
            <!-- search display div -->
            <div class="search-full-div-abs" id='search-abs'>
                <div class="search-part d-flex">
                    <div class='search-part-item'>
                        <input type="text" placeholder=' <?php
                            if ($lang_dir == 'am'){
                            echo "Որոնել ըստ անունի";
                            }
                            if ($lang_dir == 'en'){
                            echo "Search By Name";
                            }
                            if ($lang_dir == 'ru'){
                                echo "Поиск по имени";
                            }
                            ?>' class="form-control" id="search-by-name">
                    </div>
                    
                    <div class='search-part-item'>
                        <input type="text" placeholder='<?php
                            if ($lang_dir == 'am'){
                            echo "Որոնել ըստ վերնագրի";
                            }
                            if ($lang_dir == 'en'){
                            echo "Search By Title";
                            }
                            if ($lang_dir == 'ru'){
                                echo "Поиск по заголовку";
                            }
                        ?>' class="form-control" id="search-by-title">
                    </div>

                    <div class='search-part-item'>
                        <select name="date_birth" class="form-control" id="date-ofBirth">
                            <option class='colored-grey' value="0" selected disapled><?php
                            if ($lang_dir == 'am'){
                            echo "Ծննդյան ամսաթիվ";
                            }
                            if ($lang_dir == 'en'){
                            echo "Date of birth";
                            }
                            if ($lang_dir == 'ru'){
                                echo "Дата рождения";
                            }
                        ?></option>
                            <?php if (count($all_date_of_birth) > 0) : ?>

                                <?php foreach ($all_date_of_birth as $el) : ?>

                                    <option value="<?php echo $el['birth_day'] ?>"><?php echo $el['birth_day'] ?></option>

                                <?php endforeach; ?>

                            <?php endif; ?>
                        </select>
                   
                    </div>
                    <div class='search-part-item'>
                        <select name="place_birth" class="form-control" id="place-ofBirth">
                            <option class='colored-grey' value="0" selected disapled><?php
                            if ($lang_dir == 'am'){
                            echo "Ծննդավայր";
                            }
                            if ($lang_dir == 'en'){
                            echo "Place of birth";
                            }
                            if ($lang_dir == 'ru'){
                                echo "Место рождения";
                            }
                        ?></option>
                            <?php if (count($all_place_of_birth) > 0) : ?>

                                <?php foreach ($all_place_of_birth as $el) : ?>

                                    <option value="<?php echo $el['place_of_birth'] ?>"><?php echo $el['place_of_birth'] ?></option>

                                <?php endforeach; ?>

                            <?php endif; ?>
                        </select>
                    </div>
                    <div id="seach-filters">
                        <span class="search-icon" id="search_button">
                            <img src='../Icons/search-black.png'> 
                            <span>
                                 <?php
                        if ($lang_dir == "am") {
                            echo "Գտնել";
                        }
                        if ($lang_dir == "en") {
                            echo "Find";
                        }
                        if ($lang_dir == "ru") {
                            echo "Найти";
                        }
                        ?>
                            </span>
                           
                        </span>
                    </div>
                </div>

                <div class="resoults-part">
                    <div class='overall-results'>
                        <!-- load from database -->
                        
                    </div>
                    <div class="search-resultes-concrete">
                        
                    </div> 
                </div>

            </div>
            <!--end search display div -->
        </div>
        <div class="dropdown text-right" id="lang_item">
            <button class="btn dropdown-toggle" type="button" id="dropdownlng" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo "<span data-lng='' class='active-lng-a'>" . strtoupper($lang_menu) . "</span>"; ?>
            </button>
            <div class="dropdown-menu text-right" aria-labelledby="dropdownlng">
                <?php
                foreach ($arr_lang as $value) {
                    if ($value != $lang_menu) {
                        $str_lang = strtoupper($value);
                        echo "<a class='dropdown-item lng-a' href='$f$value/$file_name' data-lng='$value'>$str_lang</a>";
                    }
                }
                ?>

            </div>
        </div>

        <?php if (isset($_SESSION['user_id'])) { ?>
            <div class="log_in_icons d-flex align-items-center">
                <?php
                if($lang_dir == 'am'){?>

                    <a href="../am/account.php" class="loginitem_log">
                <?php
                }if($lang_dir == 'en'){
                ?>
                    <a href="../en/account.php" class="loginitem_log">
                <?php
                }if($lang_dir == 'ru'){
                ?>
                    <a href="../ru/account.php" class="loginitem_log">
                <?php
                }?>
                <i class="far fa-user account_icon"></i>
                </a>
                <div class="ml-4 dropdown">
                    <i class="fas fa-power-off dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <div class="mt-3 dropdown-menu" id="log_out_drop" aria-labelledby="dropdownMenuButton">
                        <a href="../logout.php" class="loginitem_log">
                            Log out
                        </a>
                    </div>
                </div>

            </div>

        <?php } else { ?>

            <?php if ($lang_dir == 'am') : ?>
                <a href="../am/sign_in.php" class="loginitem">
                    Մուտք
                </a>
                <div class="signupitem">
                    <input type="hidden" value="<?php echo $lang_dir ?>" id="home_lang">
                    <button class='btn2 sign_up_home'>
                        Գրանցվել
                    </button>
                </div>
            <?php elseif ($lang_dir == 'ru') : ?>

                <a href="../ru/sign_in.php" class="loginitem">
                    Войти
                </a>
                <div class="signupitem">
                    <input type="hidden" value="<?php echo $lang_dir ?>" id="home_lang">
                    <button class='btn2 sign_up_home'>Зарегистрироваться</button>
                </div>
            <?php else : ?>

                <a href="../en/sign_in.php" class="loginitem">
                    Log in
                </a>
                <div class="signupitem">
                    <input type="hidden" value="<?php echo $lang_dir ?>" id="home_lang">
                    <button class='btn2 sign_up_home'>Sign up</button>
                </div>
            <?php endif; ?>

        <?php } ?>

    </div>
</div>

<!--------------------- mobile -------------------------->
<div class="d-flex flextop-nav-mob">
    <div class="flextop-nav-mob-item1">
        <span id="show-menu"><i class="fas fa-bars"></i><span>
    </div>
    <div class="flextop-nav-mob-item2">
        <img src="../images/logo.png" alt="logo" class='logo-mob'>
    </div>
    <div class="flextop-nav-mob-item3">
        <div class="dropdown text-right">
            <button class="btn dropdown-toggle" type="button" id="dropdownlng" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo "<span data-lng='' class='active-lng-a'>" . strtoupper($lang_menu) . "</span>"; ?>
            </button>
            <div class="dropdown-menu text-right" aria-labelledby="dropdownlng">
                <?php
                foreach ($arr_lang as $value) {
                    if ($value != $lang_menu) {
                        $str_lang = strtoupper($value);
                        echo "<a class='dropdown-item lng-a' href='$f$value/$file_name' data-lng='$value'>$str_lang</a>";
                    }
                }
                ?>
                <!-- <a class="dropdown-item lng-a" href="" data-lng='ru'>RU</a> -->
            </div>
        </div>
    </div>
    <div class="menu-abs">
        <div class="d-flex flex-search-filter">
            <div class="search-include">
                <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <div class="form-control form-control2 make-search" >
                        <?php
                            if ($lang_dir == 'am'){
                            echo "Որոնել";
                            }
                            if ($lang_dir == 'en'){
                            echo "Search";
                            }
                            if ($lang_dir == 'ru'){
                                echo "Поиск";
                            }
                        ?> 
                    </div>

                </div>
            </div>
            
        </div>


        <div class="border-search">
        </div>
        <div class="cont-nav-mob">
            <div class="nav-menu-mob">
                <ul class='navul'>
                    <li>
                        <span class="navspan 
                            <?php
                            if ($file_name == 'home.php') {
                                echo 'navspanactive';
                            } ?>">
                            <a href="home.php">
                            <?php
                                if ($lang_dir == 'am'){
                                echo "Գլխավոր";
                                }
                                if ($lang_dir == 'en'){
                                echo "Home";
                                }
                                if ($lang_dir == 'ru'){
                                    echo "Главная";
                                }
                            ?>
                            </a>
                        </span>

                    </li>
                    <li class='margin-li relative-li'>
                        <span class='navspan
                            <?php
                            if ($file_name == "stories-autobiography.php" || $file_name == "stories-event.php") {
                                echo "navspanactive";
                            } ?>'>
                            <?php
                                if ($lang_dir == 'am'){
                                echo "Պատմություններ";
                                }
                                if ($lang_dir == 'en'){
                                echo "Stories";
                                }
                                if ($lang_dir == 'ru'){
                                    echo "Истории";
                                }
                            ?>
                        </span>
                        <div class="abs-triangle"></div>
                        <div class="abs-stories">
                            <div class="abs-stories-links">
                                <a href='stories-autobiography.php'>
                                <?php
                                if ($lang_dir == 'am'){
                                echo "Կենսագրություն";
                                }
                                if ($lang_dir == 'en'){
                                echo "Biography";
                                }
                                if ($lang_dir == 'ru'){
                                    echo "Биография";
                                }
                                ?>
                                </a>
                            </div>
                            <div class="abs-stories-links">
                                <a href='stories-history.php'>
                                <?php
                                if ($lang_dir == 'am'){
                                echo "Հոդված";
                                }
                                if ($lang_dir == 'en'){
                                echo "Article";
                                }
                                if ($lang_dir == 'ru'){
                                    echo "Статья";
                                }
                                ?>
    
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class='margin-li'>

                        <span class='navspan
                            <?php
                            if ($file_name == "aboutpage.php") {
                                echo "navspanactive";
                            } ?>
                            '>
                            <a href='aboutpage.php'> 
                                <?php
                                if ($lang_dir == 'am'){
                                echo "Մեր մասին";
                                }
                                if ($lang_dir == 'en'){
                                echo "About";
                                }
                                if ($lang_dir == 'ru'){
                                    echo "О нас";
                                }
                                ?>
                            </a>
                        </span>
                    </li>
                    <li class='margin-li'>

                        <span class='navspan
                            <?php
                            if ($file_name == "supporters.php") {
                                echo "navspanactive";
                            } ?>'><a href='supporters.php'>
                                <?php
                                if ($lang_dir == 'am'){
                                echo "Հովանավորներ";
                                }
                                if ($lang_dir == 'en'){
                                echo "Supporters";
                                }
                                if ($lang_dir == 'ru'){
                                    echo "Спонсоры";
                                }
                                ?>
                                </a>
                        </span>

                    </li>
                    <li class='margin-li'>
                        <span class='navspan
                            <?php
                            if ($file_name == "createstorypage.php") {
                                echo "navspanactive";
                            } ?>'>
                            <a id="create_variant1">
                                <?php
                                if ($lang_dir == 'am'){
                                echo "Ստեղծել հոդված";
                                }
                                if ($lang_dir == 'en'){
                                echo "Create Story";
                                }
                                if ($lang_dir == 'ru'){
                                    echo "Создать статью";
                                }
                                ?>
                            </a>
                        </span>
                    </li>
                </ul>
            </div>
            <?php if (isset($_SESSION['user_id'])) { ?>
                <a href="../logout.php" class="loginitem">
                <?php
                if ($lang_dir == 'am'){
                echo "Դուրս գալ";
                }
                if ($lang_dir == 'en'){
                echo "Log out";
                }
                if ($lang_dir == 'ru'){
                    echo "Выйти";
                }
                ?>
                </a>
                <div>
                    <?php
                    if($lang_dir == 'am'){
                    ?>
                    <a href="../am/account.php" class="loginitem_log loginitem_log1">
                    <?php
                    }
                    if($lang_dir == 'en'){
                    ?>
                    <a href="../en/account.php" class="loginitem_log loginitem_log1">
                    <?php
                    }if($lang_dir == 'ru'){
                    ?>
                    <a href="../ru/account.php" class="loginitem_log loginitem_log1">
                    <?php
                    }?>
                    <i class="far fa-user account_icon mb-4 mt-2"></i>
                    </a>
                </div>
                

            <?php } else { ?>
                <?php if ($lang_dir == 'am') : ?>
                    <a href="../am/sign_in.php" class="loginitem">
                    Մուտք
                    </a>
                    <div class="signupitem">
                        <input type="hidden" value="<?php echo $lang_dir ?>" id="home_lang">
                        <button class='btn2 sign_up_home'>Գրանցվել</button>
                    </div>
                <?php elseif ($lang_dir == 'ru') : ?>

                    <a href="../ru/sign_in.php" class="loginitem">
                        Вход
                    </a>
                    <div class="signupitem">
                        <input type="hidden" value="<?php echo $lang_dir ?>" id="home_lang">
                        <button class='btn2 sign_up_home'>Зарегистрироватся</button>
                    </div>
                <?php else : ?>

                    <a href="../en/sign_in.php" class="loginitem">
                        Log in
                    </a>
                    <div class="signupitem">
                        <input type="hidden" value="<?php echo $lang_dir ?>" id="home_lang">
                        <button class='btn2 sign_up_home'>Sign up</button>
                    </div>
                <?php endif; ?>

            <?php } ?>
        </div>
        <div class="line-mob-display"></div>
        <div class="search-full-div-abs-mob">

 <!--here search part -->

          
                <div class="search-part d-flex">
                    <div class='search-part-item'>
                        <input type="text" placeholder='<?php
                            if ($lang_dir == 'am'){
                            echo "Որոնել ըստ անունի";
                            }
                            if ($lang_dir == 'en'){
                            echo "Search By Name";
                            }
                            if ($lang_dir == 'ru'){
                                echo "Поиск по имени";
                            }
                        ?>' class="form-control" id="search-by-name-mob">
                    </div>
                    
                    <div class='search-part-item'>
                        <input type="text" placeholder='<?php
                            if ($lang_dir == 'am'){
                            echo "Որոնել ըստ վերնագրի";
                            }
                            if ($lang_dir == 'en'){
                            echo "Search By Title";
                            }
                            if ($lang_dir == 'ru'){
                                echo "Поиск по заголовку";
                            }
                        ?>' class="form-control" id="search-by-title-mob">
                    </div>

                    <div class='search-part-item'>
                        <select name="date_birth" class="form-control" id="date-ofBirth-mob">
                            <option class='colored-grey' value="0" selected disapled><?php
                            if ($lang_dir == 'am'){
                            echo "Ծննդյան ամսաթիվ";
                            }
                            if ($lang_dir == 'en'){
                            echo "Date of birth";
                            }
                            if ($lang_dir == 'ru'){
                                echo "Дата рождения";
                            }
                        ?></option>
                            <?php if (count($all_date_of_birth) > 0) : ?>

                                <?php foreach ($all_date_of_birth as $el) : ?>

                                    <option value="<?php echo $el['birth_day'] ?>"><?php echo $el['birth_day'] ?></option>

                                <?php endforeach; ?>

                            <?php endif; ?>
                        </select>
                   
                    </div>
                    <div class='search-part-item'>
                        <select name="place_birth" class="form-control" id="place-ofBirth-mob">
                            <option class='colored-grey' value="0" selected disapled><?php
                            if ($lang_dir == 'am'){
                            echo "Ծննդավայր";
                            }
                            if ($lang_dir == 'en'){
                            echo "Place of birth";
                            }
                            if ($lang_dir == 'ru'){
                                echo "Место рождения";
                            }
                        ?></option>
                            <?php if (count($all_place_of_birth) > 0) : ?>

                                <?php foreach ($all_place_of_birth as $el) : ?>

                                    <option value="<?php echo $el['place_of_birth'] ?>"><?php echo $el['place_of_birth'] ?></option>

                                <?php endforeach; ?>

                            <?php endif; ?>
                        </select>
                    </div>
                    <div id="seach-filters-mob">
                        <span class="search-icon" id="search_button">
                            <img src='../Icons/search-black.png'>
                            <span>
                                <?php
                                if ($lang_dir == "am") {
                                    echo "Գտնել";
                                }
                                if ($lang_dir == "en") {
                                    echo "Find";
                                }
                                if ($lang_dir == "ru") {
                                    echo "Найти";
                                }
                            
                                ?>  
                            </span>
                        </span>
                    </div>
                </div>

                <div class="resoults-part">
                    <div class='overall-results'>
                        <!-- load from database -->
                        
                    </div>
                    <div class="search-resultes-concrete">
                        
                    </div> 
                </div>

            <!-- end mobail search -->
        </div>
    </div>
</div>
<?php

echo constant('variant-' . $lang_dir);

?>
<!-- <div class="row justify-content-end" id="variant_add_article">
   
   <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 d-flex flex-column align-items-center" id="article_variant">
   
         <h5 class="article_variant_title">Create story</h5>
         <p class="select_variant_title"> Select article type </p>

         <div class="img_variants">
         
            <div class="event_variant">

                 <h6>Event</h6>

            </div>
            <div class="auto_variant">
                
               
               <h6>Hero's autobiography</h6>
             
            </div>

         </div>       



   </div>
            
</div> -->