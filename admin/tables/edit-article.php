<?php include "../heder.php"; ?>
    <body>
        <?php
           include "../menu.php";
           require_once "../classes/DB.class.php";
         

          if(isset($_GET['categories-article']) && isset($_GET['article-id'])){
             $categories_article=$_GET['categories-article'];
             $article_id=$_GET['article-id'];
             if($categories_article=='history'){
               $article_h3='Օգտատիրոջ կողմից ներմուծված հոդված';
               $article_name='title';
             }
             else{
              $article_h3='Օգտատիրոջ կողմից ներմուծված կենսագրություն';
              $article_name='name';
             }
          }
          if($_SESSION['administration']!=1){
             $moderator_id=$_SESSION['moderator_id'];
           }
           else{
             $moderator_id='';
           }
           $db=new DB();
           $data=array('id', 'fullname', 'fullname_am', 'fullname_ru', 'fullname_en', 'email');
           $inner_tablname=$categories_article."_articles_default";
           $user=$db->selectUser($data, 'users', $inner_tablname, $article_id );
           if($user){
               $user=mysqli_fetch_assoc($user);
           }
           // ---------reacon delete article--------------------------------
           $res_reason=$db->all_rows("reasons_reject_article");
          // -------select default table------------------
           $default_conditions=array('article_id' => $article_id);
           $article_i=$db->checkRow($inner_tablname,  $default_conditions);
           if($article_i){
               $article_info=mysqli_fetch_assoc($article_i);
           }
           
           // --------------images----------------------------------
           $images_tbl=$categories_article."_images";
           $images_conditions = array('article_id' => $article_id );
           $img=$db->checkRow($images_tbl, $images_conditions);

           // ------------external links---------------------
            $external_tbl=$categories_article."_external_links";
            $external_conditions= array('article_id' => $article_id);
            $ext=$db->checkRow($external_tbl, $external_conditions);
            $ext_am=$db->checkRow($external_tbl, $external_conditions);
            $ext_ru=$db->checkRow($external_tbl, $external_conditions);
            $ext_en=$db->checkRow($external_tbl, $external_conditions);

            // ------------internal links---------------------
            $internal_tbl=$categories_article."_internal_links";
            $internal_conditions= array('article_id' => $article_id);
            $internal=$db->checkRow($internal_tbl, $internal_conditions);
            $internal_am=$db->checkRow($internal_tbl, $internal_conditions);
            $internal_ru=$db->checkRow($internal_tbl, $internal_conditions);
            $internal_en=$db->checkRow($internal_tbl, $internal_conditions);

            // ------------edited article by users------------------------------
            $tblname=$categories_article;
            $mod_id=$moderator_id;
            $edited_articles=$db->checkRowEditedArticles($article_name, $tblname, $mod_id);

            // ------------select article am (langusge) table---------------------
             $am_tablname=$categories_article."_articles_am";
             $am_conditions=array('article_id' => $article_id);
             $am_article_i=$db->checkRow($am_tablname,  $am_conditions);
             if($am_article_i){
                $am_article_info=mysqli_fetch_assoc($am_article_i);
              }

              // ------------select article ru (langusge) table---------------------
             $ru_tablname=$categories_article."_articles_ru";
             $ru_conditions=array('article_id' => $article_id);
             $ru_article_i=$db->checkRow($ru_tablname,  $ru_conditions);
             if($ru_article_i){
                $ru_article_info=mysqli_fetch_assoc($ru_article_i);
              }

              // ------------select article en (langusge) table---------------------
             $en_tablname=$categories_article."_articles_en";
             $en_conditions=array('article_id' => $article_id);
             $en_article_i=$db->checkRow($en_tablname,  $en_conditions);
             if($en_article_i){
                $en_article_info=mysqli_fetch_assoc($en_article_i);
              }
        ?>
            <!-- End Navbar -->
            <div class="content" id="content" data-categories='<?=$categories_article?>'>
            <!-- change article status -->
              <?php

                if(!$article_i){
                    echo "Հոդված չկա";
                  }
                  include "../../config/dbconfig.php"; 

                $sql_check_status=mysqli_query($con, "SELECT article_status from ".$categories_article."_articles_default WHERE article_id='" . $_GET['article-id'] . "'");
                $sql_check_status_result=mysqli_fetch_assoc($sql_check_status);
   
                $article_status =$sql_check_status_result['article_status'];
                if($article_status==0){
                 echo "<div class='change-status'>Հաստատել հոդվածը</div>
                        <input id='change_status_articleId' type='hidden' value='".$_GET['article-id']."'>
                        <input id='change_status_category' type='hidden' value='".$categories_article."'>
                        <div class='submit-confirm'></div>
                 ";
                }
              ?>
             <a class ='btn-orange go-back' href='created-articles.php'>Վերադառնալ</a>
                <div class="container-fluid <?php echo !$article_i ? 'd-none' : 'd-block'; ?>">
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card data-tables">
                                <div class="table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                                    <div class="fresh-datatables">
                                        <div class='col-md-12 text-center'>
                                          <div class='col-md-7 mx-auto'>
                                            <h4><strong>Հեղինակ</strong></h4>
                                          </div>
                                          <div class='col-md-7 my-3 user-info text-left' data-user-id="<?php echo $user['id']?>">
                                            <div><strong>Հոդվածի հեղինակը։</strong>  <?php echo $user['fullname']?></div>
                                            <div><strong>Էլ․ փոստ։</strong>  <?php echo $user['email']?></div>
                                          </div>
                                        </div>
                                        <div class='col-md-12'>
                                          <form id="user-form">
                                              <div class="form-group">
                                                  <label>Հեղինակի անունը հայերեն</label>
                                                  <input disabled type="" name="name_am" class="form-control w-50 u-name" id="first" value="<?=$user['fullname_am'] ?>">
                                              </div>
                                              <div class="form-group">
                                                  <label>Հեղինակի անունը ռուսերեն</label>
                                                  <input disabled type="" name="name_ru" class="form-control w-50 u-name" value="<?=$user['fullname_ru']?>">
                                              </div>
                                              <div class="form-group">
                                                  <label>Հեղինակի անունը անգլերեն</label>
                                                  <input disabled type="" name="name_en" class="form-control w-50 u-name" value='<?=$user['fullname_en']?>'>
                                              </div>
                                              <input disabled type="hidden" name="user_id" class="hide" value="<?php echo $user['id']?>">
                                            </form>
                                            <div class="result-user-form"></div>
                                        </div>
                                        <div class='col-md-12 mt-5'>
                                            <h3 class="text-center mb-3"><strong><?php echo $article_h3 ?></strong></h3>
                                            <div class="make-changes mt-3 mb-3">
                                              <div><a href="#edit">Խմբագրել հոդվածը</a></div>
                                              <div><a href="#changeImages">Փոխել/ջնջել նկարները</a></div>
                                            </div>
                                          
                                            <?php if($categories_article=='history'){?>
                                            <div class="form-group ">
                                                  <label>Վերնագիր</label>
                                                  <input disabled type=""  class="form-control w-50 " value="<?php echo $article_info['title']?>">
                                            </div>
                                            <?php } else{?>
                                            <div class="form-group">
                                                  <label>Անուն Ազգանուն Հայրանուն</label>
                                                  <input disabled type=""  class="form-control w-50 " value="<?php echo $article_info['name']?>">
                                            </div>
                                            <div class="form-group">
                                                  <label>Կեղծանուն</label>
                                                  <input disabled type=""  class="form-control w-50 " value="<?php echo $article_info['nik_name']?>">
                                            </div>
                                            <div class="form-group">
                                                  <label>Ծննդավայր</label>
                                                  <input disabled type="" class="form-control w-50 " value="<?php echo $article_info['place_of_birth']?>">
                                            </div>
                                            <div class="form-group">
                                                  <label>Ծննդյան ամսաթիվ</label>
                                                  <input disabled type=""  class="form-control w-50 " value="<?php echo $article_info['birth_day']?>">
                                            </div>
                                            <?php } ?>
                                            <div class="form-group">
                                                  <label>Տեքստ</label>
                                                  <textarea disabled class="w-100 article-text"><?php echo $article_info['description']?></textarea>
                                            </div>
                                            <div class="my-5 ">
                                              <?php
                                                   while ($img_row=mysqli_fetch_assoc($img)) {
                                                       if($img_row['main']){
                                                        echo "<div class='my-2 w-100'>
                                                                <label id='changeImages'>Գլխավոր նկար</label>
      
                                                                   <div class='div-main-image'>
                                                                      <img class='img-size' src='../../".$categories_article."-articles-images/".$article_id."/".$img_row['image']."'>
                                                                   </div>
                                                                   <div data-img-id='".$article_id."'>
                                                                       <label>Փոխել գլխավոր նկարը</label>
                                                                       <form method='post' id='change-image_main' enctype='multipart/form-data'>
                                                                           <input type='file' name='change_main' id='change-main'>
                                                                           <br>
                                                                           <input type='submit' value='Փոխել գլխավոր նկարը' class='mt-3 btn btn-primary changeMainIng'>
                                                                           <input type='hidden' name='categories_article' value='".$categories_article."' id='category_article'>
                                                                           <input type='hidden' name='article_id' value='".$article_id."' id='id_article'>
                                                                           <input type='hidden' name='img_id' value='".$img_row['id']."'>
                                                                       </form>
                                                                       <div class='result-change-main'></div>
                                                                   </div>
                                                            
                                                              </div>";
                                                       }
                                                       else{
                                                         echo "<div class='my-5 mx-4 img'>
                                                                  <div class='d-flex'>
                                                                    <div class='img-size'>
                                                                        <img src='../../".$categories_article."-articles-images/".$article_id."/".$img_row['image']."'>
                                                                    </div>
                                                                    <div class='delete-img' data-article-id='".$article_id."' data-img-id='".$img_row['id']."'><i class='fa fa-close text-red'></i></div>
                                                                </div>
                                                               </div>";
                                                       }
                                                   }
                                              ?>
                                              
                                              <div class='result-deleted-image'></div>
                                            </div>
                                   
                                            <div class="w-100">
                                               <div class="mr-5">
                                                  <label style='font-weight:800;'>Արտաքին հղումներ</label>
                                                  <?php
                                                  if($ext){
                                                    while($external_row=mysqli_fetch_assoc($ext)){
                                                      echo "<div class='border-link my-2'>
                                                                <div >Անուն: <div>".$external_row['name']."</div></div>
                                                                <div class=''>Հղում: <div>".$external_row['link']."</div></div>
                                                                <div class='delete-links delete-links-external' datatype=".$external_row['id'].">X</div>
                                                            </div>";
                                                    }
                                                  }
                                                  else{
                                                    echo '<div pl-4>Արտաքին հղումներ չկան</div>';
                                                  }
                                                  ?>
                                               </div>
                                               <div class='result-change-link'></div>
                                               <div class="">
                                                  <label style='font-weight:600'>Ներքին հղումներ</label>
                                                  <?php
                                                  if($internal){
                                                    while($internal_row=mysqli_fetch_assoc($internal)){
                                                      echo "<div class='border-link my-2'>
                                                                <div >Անուն: <div>".$internal_row['name']."</div></div>
                                                                <div class='' >Հղում: <div>".$internal_row['link']."</div></div>
                                                                <div class='delete-links delete-links-internal' datatype=".$internal_row['id'].">X</div>
                                                            </div>";
                                                    }
                                                  }
                                                  else{
                                                    echo '<div pl-4>Ներքին հղումներ չկան</div>';
                                                  }
                                                  ?>
                                                  <div class='result-change-link-internal'></div>
                                               </div>
                                            </div>
                                            <!-- -------------------action for article by moderator--------- -->
                                            <div class="w-100">
                                                <button class="btn btn-primary open-modal-send-message-article" data-toggle="modal" data-target="#send-message-editor" data-email="<?=$user['email']?>">Գրել նամակ հոդվածի հեղինակին</button>
                                                <!-- <button class="btn btn-danger open-modal-delete-article" id='deleteArticle'>Ջնջել հոդվածը</button> -->
                                                <button class="btn btn-danger open-modal-delete-article"  data-toggle='modal' data-target='#select-reason' data-email="<?=$user['email']?>">Ջնջել հոդվածը</button>

                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
                  <!--------------------->
  
                <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card data-tables">
                                <div class="table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                                    <div class="fresh-datatables">
                                        <div class='col-md-12 text-center'>
                                          <div class='col-md-7 mx-auto'>
                                            <h3 id="edit"><strong>Խմբագրել</strong></h3>
                                          </div>
                                        </div>
                                        <!-- --------------Hayeren----------------------------------------- -->
                                        <div class='col-md-12 mt-5'>
                                            <h3 class="text-center "><strong>Հայերեն</strong></h3>
                                       
                                            <?php if($categories_article=='history'){?>
                                            <div class="form-group">
                                                  <label>Վերնագիր</label>
                                                  <input type="" id="article_title_am" class="form-control w-50 article-name" value="<?php echo $am_article_i ? $am_article_info['title'] : '' ?>">
                                            </div>

                                            <?php } else{?>
                                            <div class="form-group">
                                                  <label>Անուն Ազգանուն Հայրանուն</label>
                                                  <input type="" id="auth_name_am" class="form-control w-50 article-name" value="<?php echo $am_article_i ? $am_article_info['name'] : '' ?>">
                                            </div>
                                            <div class="form-group">
                                                  <label>Կեղծանուն</label>
                                                  <input type="" id="nik_name_am" class="form-control w-50 " value="<?php echo $am_article_i ? $am_article_info['nik_name'] : '' ?>">
                                            </div>
                                            <div class="form-group">
                                                  <label>Ծննդավայր</label>
                                                  <input type="" id="place_of_birth_am" class="form-control w-50 " value="<?php echo $am_article_i ? $am_article_info['place_of_birth'] : '' ?>">
                                            </div>
                                            <div class="form-group">
                                                  <label>Ծննդյան ամսաթիվ</label>
                                                  <input type="date" id="date_of_birth_am" class="form-control w-50 " value="<?php echo $article_info['birth_day']?>">
                                            </div><?php } ?>
                                            <div class="form-group">
                                                  <textarea name="editor1" class="form-control content_am" >
                                                      <?php echo $am_article_i ? $am_article_info['description'] : '' ?>
                                                  </textarea>
                                                  <script>
                                                          CKEDITOR.replace( 'editor1' );
                                                  </script>
                                            </div>
                                            <div class="result-am"></div>
                                            <input type="hidden" id="save_art_id_am" value="<?=$article_id?>">
                                            <input type="hidden" id="article_categories_am" value="<?=$categories_article?>">
                                            <div class="save_arm_art btn-primary px-3 py-2 btn">Պահպանել</div>
                                           
                                        </div>
                                       
                                        <!-- ------------------Русский------------------------------ -->
                                          <div class='col-md-12 mt-5'>
                                            <h3 class="text-center "><strong>Русский</strong></h3>
                                          <form class="edit-article">    
                                            <?php if($categories_article=='history'){?>
                                            <div class="form-group">
                                                  <label>Заголовок</label>
                                                  <input type="" id="article_title_ru" class="form-control w-50 article-name" value="<?php echo $ru_article_i ? $ru_article_info['title'] : '' ?>">
                                            </div>
                                            <?php } else{?>
                                            <div class="form-group">
                                                  <label>Имя, фамилия, отчество</label>
                                                  <input type="" id="auth_name_ru" class="form-control w-50 article-name" value="<?php echo $ru_article_i ? $ru_article_info['name'] : '' ?>">
                                            </div>
                                            <div class="form-group">
                                                  <label>Ник</label>
                                                  <input type="" id="nik_name_ru" class="form-control w-50 " value="<?php echo $ru_article_i ? $ru_article_info['nik_name'] : '' ?>">
                                            </div>
                                            <div class="form-group">
                                                  <label>Место рождения</label>
                                                  <input type=""  id="place_of_birth_ru"  class="form-control w-50 " value="<?php echo $ru_article_i ? $ru_article_info['place_of_birth'] : '' ?>">
                                            </div>
                                            <div class="form-group">
                                                  <label>Дата рождения</label>
                                                  <input type="" id="date_of_birth_ru" class="form-control w-50 " value="<?php echo $article_info['birth_day']?>">
                                            </div><?php } ?>
                                            <div class="form-group">
                                                   <textarea name="editor2" class="form-control content-ru">
                                                      <?php echo $ru_article_i ? $ru_article_info['description'] : '' ?>
                                                   </textarea>
                                                   <script>
                                                          CKEDITOR.replace( 'editor2' );
                                                  </script>
      
                                            </div>
                                            <div class="result-ru"></div>
                                            <input type="hidden" id="save_art_id_ru" value="<?=$article_id?>">
                                            <input type="hidden" id="article_categories_ru" value="<?=$categories_article?>">
                                            <div class="save_ru_art btn-primary px-3 py-2 btn">Сохранить</div>

                                          </form>
                                        </div>
                                         <!-- --------------English----------------------------------------- -->
                                        <div class='col-md-12 mt-5'>
                                            <h3 class="text-center "><strong>English</strong></h3>
                                          <form class="edit-article">    
                                            <?php if($categories_article=='history'){?>
                                            <div class="form-group">
                                                  <label>Title</label>
                                                  <input type="" id="article_title_en" class="form-control w-50 article-name" value="<?php echo $en_article_i ? $en_article_info['title'] : '' ?>">
                                            </div>
                                 
                                            <?php } else{?>
                                            <div class="form-group">
                                                  <label>First Name Last Name Patronymic</label>
                                                  <input type="" id="auth_name_en" class="form-control w-50 article-name" value="<?php echo $en_article_i ? $en_article_info['name'] : '' ?>">
                                            </div>
                                            <div class="form-group">
                                                  <label>Nickname</label>
                                                  <input type="" id="nik_name_en" class="form-control w-50 "  value="<?php echo $en_article_i ? $en_article_info['nik_name'] : '' ?>">
                                            </div>
                                            <div class="form-group">
                                                  <label>Place of birth</label>
                                                  <input type="" id="place_of_birth_en" class="form-control w-50 " value="<?php echo $en_article_i ? $en_article_info['place_of_birth'] : '' ?>">
                                            </div>
                                            <div class="form-group">
                                                  <label>Date of birth</label>
                                                  <input type="" id="date_of_birth_en" class="form-control w-50 " value="<?php echo $article_info['birth_day']?>">
                                            </div><?php } ?>
                                            <div class="form-group">
                                                    <textarea name="editor3" class="form-control content-en">
                                                      <?php echo $en_article_i ? $en_article_info['description'] : '' ?>
                                                   </textarea>
                                                   <script>
                                                          CKEDITOR.replace( 'editor3' );
                                                  </script>
                                            </div>
                                            <div class="result-en"></div>
                                            <input type="hidden" id="save_art_id_ru" value="<?=$article_id?>">
                                            <input type="hidden" id="article_categories_ru" value="<?=$categories_article?>">
                                            <div class="save_en_art btn-primary px-3 py-2 btn">Save</div>
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                      </div>
                  </div>
            </div>
             <?php include "../footer.php" ?>
             <?php include "../modal-send-message.php" ?>
             <?php include "../modal-reason-delete-article.php" ?>


            <script src="../js/user-info.js"> </script>
            <script src="../js/moderator-delete-img.js"> </script>
            
            <script src="../js/send-message.js"> </script>
            <script src="../js/delete-article.js"> </script>
            <script src="../js/editArticles.js"> </script>
            
            
      </body>
  </html>
