<?php 
include "../heder.php";
include "../../config/dbconfig.php"; ?>

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
           
           if(isset($_GET['article'])){
                $article_category=$_GET['article'];
                if($article_category=='autobiography'){
                    $sql_all = "SELECT a.name, c.id, c.description, c.created_date, u.fullname FROM ".$article_category."_articles_default as a 
                INNER JOIN ".$article_category."_comments as c ON c.article_id=a.article_id 
                INNER JOIN users as u ON u.id=c.user_id WHERE c.status=0";
                }else{
                    $sql_all = "SELECT a.title, c.id, c.description, c.created_date, u.fullname FROM ".$article_category."_articles_default as a 
                INNER JOIN ".$article_category."_comments as c ON c.article_id=a.article_id 
                INNER JOIN users u ON u.id=c.user_id WHERE c.status=0";
                }
                
                $sql_all_result=mysqli_query($con, $sql_all);
            }
        ?>

            <!-- End Navbar -->
            <div class="content" data-type='comment'>
                <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card data-tables">
                                <div class="table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                                    <div class="fresh-datatables">
                                        <div class='col-md-12 text-center'>
                                            <div class='col-md-7 mx-auto'>
                                              <h3>Նոր մեկնաբանություններ</h3>
                                                <form method="post" action=''>
                                                    <div class="form-group">
                                                      <label>Ընտրել հոդվածի տեսակը</label>
                                                        <select onchange="location = this.value;" class="form-control select" id="select_categories" name='sel-categories'>
                                                            <option value=''></option>
                                                            <option value='new-comments.php?article=history' <?php if(isset($article_category)&&($article_category=="history")){
                                                                echo 'selected';
                                                            }?>>Հոդված</option>
                                                            <option value='new-comments.php?article=autobiography' <?php if(isset($article_category)&& ($article_category=="autobiography")){
                                                                echo 'selected';
                                                            }?>>Կեսագրություն</option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="result-delete mx-3"></div> 
                                        <?php
                                            if(isset($sql_all_result)){
                                                if((mysqli_num_rows($sql_all_result) > 0)){
                                        ?>
                                        <table id="datatables" data-name="default" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <th data-field="id" class="text-center" data-sortable="true">N</th>
                                                <th data-field="user">Հեղինակ</th>
                                                <th data-field="title">Հոդվածի Վերնագիր/Անուն</th>
                                                <th data-field="comment">Մեկնաբանություն</th>
                                                <th data-field="c-date">Ստեղծման ամսաթիվ</th>
                                                <th class="text-right">Գործողություն</th>
                                            </thead>
                                            <tbody id="sortable">
                                            <?php
                                            $k=1;
                                                while ($sql_all = mysqli_fetch_assoc($sql_all_result)) {
                                            ?>
                                                <tr data-id="">
                                                    <td><?php echo $k;?></td>
                                                    <td><?php echo $sql_all['fullname']?></td>
                                                    <td><?php 
                                                    if($article_category=='autobiography'){
                                                        echo $sql_all['name'];
                                                    }else{
                                                        echo $sql_all['title'];
                                                    }
                                                    ?>
                                                    </td>
                                                    <td><?php echo $sql_all['description']; ?></td>
                                                    <td class='c-date'><?php echo $sql_all['created_date']; ?></td>
                                                    <td class='text-left d-flex flex-column' data-article-id=''>
                                                        <button class='delete-comment btn btn-danger open-modal-delete-comment' id="delete_<?php echo $sql_all['id']; ?>" >Ջնջել</button>
                                                        <button class='confirm-comment btn btn-succes' id="confirm_<?php echo $sql_all['id']; ?>" >Հաստատել</button>
                                                    </td>
                                                </tr>
                                                <?php
                                                $k++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php
                                            }else{
                                                echo "<div class='returned-result'>Նոր մեկնաբանություններ չկան</div>";
                                            }
                                            }else{
                                                echo "<div class='returned-result'>Ընտրել Հոդվածի տեսակ</div>";
                                            }
                                        ?>
                                        <input type="hidden" id='categoryArticle' value=<?php if(isset($article_category)){echo $article_category;}?>>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <?php include "../footer.php" ?>
            <script src="../js/newComments.js"> </script>     
    </body>
</html>