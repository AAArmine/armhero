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
            <div class="content" data-type='article'>
                <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card data-tables">
                                <div class="table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                                    <div class="fresh-datatables">
                                        <div class='col-md-12 text-center'>
                                            <div class='col-md-7 mx-auto'>
                                              <h3>Ստեղծված հոդվածներ</h3>
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
                                           <form method="post" action=''>
                                              <select style="width:300px; background-color:#f1f1f1;" onchange="this.form.submit()" class="form-control select-status" id="select_status" name='sel-article-status'>
                                                        <?php include "select-article-status.php"; ?> 
                                              </select>
                                           </form>
                                           
                                           
                                        </div>
                                     
                                        <div class="result-delete mx-3"></div>     
                                        <table id="datatables" data-name="default" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                    <th data-field="id" class="text-center" data-sortable="true">#</th>
                                                    <th data-field="state" data-checkbox="true"></th>
                                                    <th data-field="article_id">Հոդվածի ID</th>
                                                    <th data-field="title">Վերնագիր</th>
                                                    <th data-field="status">Ստատուս</th>
                                                    <th data-field="c-date">Ստեղծման ամսաթիվ</th>
                                                    <th class="text-right action-align">Գործողություն</th>
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
                                                       if(isset($_SESSION['status_article']) && $_SESSION['status_article']==1){
                                                          $status=$_SESSION['status_article'];
                                                       }
                                                       else{
                                                          $status=0;
                                                       }
                                                       $tblname=$categories.'_articles_default';
                                                       $db->tblName=$tblname;
                                                       if($_SESSION['administration']==1){
                                                          $conditions=array('article_status' => $status);
                                                       }
                                                       else{
                                                          $conditions=array('article_status' => 1,
                                                                            'moderator_id' => $_SESSION['moderator_id']);
                                                       }
                                                       $res=$db->checkRow_result($conditions);
                                                       if($res){
                                                          while($row=mysqli_fetch_assoc($res)){
                                                               $user_id=$row['user_id'];
                                                               $cond=array('id' => $user_id);
                                                               $res_user=$db->checkRow('users', $cond);
                                                               $row_user=mysqli_fetch_assoc($res_user);

                                                            if(isset($_SESSION['categories_article']) && $_SESSION['categories_article']=='history'){
                                                              $title=$row['title'];
                                                            }
                                                            else{
                                                              $title=$row['name'];
                                                            }
                                                            if(isset($_SESSION['status_article']) && $_SESSION['status_article']==1){
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
                                                            $status = $row['article_status'] ? 'Հաստատված' : 'Նոր';
                                                            $status_class = $row['article_status'] ? 'text-success' : 'text-danger';
                                                              echo " <tr data-id=".$row['article_id'].">
                                                                         <td class='first_td'>".$count."</td>
                                                                         <td></td>
                                                                         <td class=''>".$row['article_id']."</td>
                                                                         <td class=''>".$title."</td>
                                                                       
                                                                         <td class='status $status_class'>".$status."</td>
                                                                         <td class='c-date'>".$row['created_date']."</td>
                                                                         <td class='text-right'>
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
              <!-- <script src="../js/delete-rows.js"> </script> -->
            <!-- <script src="../js/delete-article.js"> </script> -->
            <script src="../js/send-to-moderator.js"> </script>
            <!-- <script src="../js/send-message.js"> </script> -->
</body>
</html>