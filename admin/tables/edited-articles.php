<?php include "../heder.php"; ?>
    <body>
        <?php
           include "../menu.php";
           require_once "../classes/DB.class.php";
           $a_remove='';
           $db=new DB();
           $tblname_admin='admin';
           $conditions_mod=array('role' => 0,
                                'status' => 1);
           $res_admin=$db->checkRow($tblname_admin, $conditions_mod);
        ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card data-tables">
                                <div class="table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                                    <div class="fresh-datatables">
                                        <div class='col-md-12 text-center'>
                                            <div class='col-md-7 mx-auto'>
                                              <h3>Խմբագչված հոդվածներ</h3>
                                                <form method="post" action=''>
                                                    <div class="form-group">
                                                      <label>Ընտրել հոդվածի տեսակը</label>
                                                      <select onchange="this.form.submit()" class="form-control select" id="select_categories" name='sel-categories'>
                                                         <?php include "select-categories.php"; ?> 
                                                      </select>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="d-flex pull-right mt-3 mx-3">
                                           <button class="ml-2 bg-danger delete-all-checked-row py-1 px-3 btn-outline pull-right">Ջնջել</button>
                                        </div>
                                        <div class="result-delete mx-3"></div>     
                                        <table id="datatables" data-name="default" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                    <th data-field="id" class="text-center" data-sortable="true">#</th>
                                                    <th data-field="state" data-checkbox="true"></th>
                                                    <th data-field="article_id">Հոդվածի ID</th>
                                                    <th data-field="title">Վերնագիր</th>
                                                    <?php
                                                        if(isset($_SESSION['administration']) && $_SESSION['administration']==1){
                                                          echo "<th data-field='mod'>Մոդերատոր</th>";
                                                        }
                                                    ?>
                                                    <!-- <th data-field="status">Ստատուս</th> -->
                                                    <th data-field="c-date">Փոփոխման ամսաթիվ</th>
                                                    <th class="text-right">Գործողություն</th>
                                            </thead>
                                            <tbody id="sortable">

                                                    <?php 
                                                    $count=0;
                                                    $mod='';
                                                       if(isset($_SESSION['categories_article'])){
                                                             $categories=$_SESSION['categories_article'];
                                                       }
                                                       else{
                                                          $categories='autobiography';
                                                       }
                                                       if($categories=='history'){
                                                            $article_name='title';
                                                       }
                                                       else{
                                                            $article_name='name';
                                                       }
                                                       $tblname=$categories;
                                                       if($_SESSION['administration']==1){
                                                          $mod_id='';
                                                       }
                                                       else{
                                                          $mod_id= $_SESSION['moderator_id'];
                                                       }
                                                       $res=$db->checkRowEditedArticlesInAllLanguageTables($article_name, $categories, $mod_id);
                                                       if($res){
                                                          while($row=mysqli_fetch_assoc($res)){
                                                            if(isset($_SESSION['categories_article']) && $_SESSION['categories_article']=='history'){
                                                              $title=$row['title'];
                                                            }
                                                            else{
                                                              $title=$row['name'];
                                                            }
                                                            if($_SESSION['administration']==1){
                                                               $mod_id=array('id' => $row['moderator_id']);
                                                               $sql_mod=$db->checkRow('admin', $mod_id);
                                                                if($sql_mod){
                                                                   $res_mod=mysqli_fetch_assoc($sql_mod);
                                                                   $mod="<td class=''>".$res_mod['login']."</td>";
                                                                }
                                                            }
                                                            else{
                                                              $mod='';
                                                            }

                                                            $count++;

                                                              echo " <tr data-id=".$row['article_id'].">
                                                                         <td class='first_td'>".$count."</td>
                                                                         <td></td>
                                                                         <td class=''>".$row['article_id']."</td>
                                                                         <td class=''>".$title."</td>
                                                                         ".$mod."
                                                                         <td class='c-date'>".$row['created_date']."</td>
                                                                         <td class='text-right'>
                                                                             <button class='btn btn-success publish-an-article' data-type='active' data-id='".$row['article_id']."'>Հրապարակել</button>
                                                                             <a href='edit-article.php?categories-article=".$categories."&article-id=".$row['article_id']."' class='btn btn-warning edit a_edit' name=".$row['article_id']."><i class='fa fa-external-link'></i></a>
                                                                         </td>
                                                                     </tr>";
                                                            }
                                                          }
                                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <?php include "../footer.php" ?>
            <script src="../js/delete-rows.js"> </script>
            <script src="../js/publish-an-article.js"> </script>
</body>
</html>