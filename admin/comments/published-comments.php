<?php        
include "../heder.php"; 
include "../../config/dbconfig.php";
$sql_auth= "SELECT a.name, c.id, c.article_id, c.description, c.created_date, u.fullname FROM autobiography_articles_default as a 
INNER JOIN autobiography_comments as c ON c.article_id=a.article_id 
INNER JOIN users as u ON u.id=c.user_id where c.status='1'";
$sql_auth_result=mysqli_query($con, $sql_auth);

$sql_his= "SELECT a.title, c.id, c.article_id, c.description, c.created_date, u.fullname FROM history_articles_default as a 
INNER JOIN history_comments as c ON c.article_id=a.article_id 
INNER JOIN users as u ON u.id=c.user_id where c.status='1'";
$sql_his_result=mysqli_query($con, $sql_his);
?>
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
           $res_reason=$db->all_rows('reasons_reject');
           
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
                                                <h2>Կենսագրություն</h2>
                                              <h3>Հրապարակված մեկնաբանություններ</h3>
                                              <input type="hidden" class="select" value='<?=$_GET['categories-article']?>'>
                                            </div>
                                        </div>
                                        <div class="result-delete mx-3"></div> 
                                        <?php
                                            if(isset($sql_auth_result) && mysqli_num_rows($sql_auth_result) > 0){
                                               
                                        ?>
                                        <table id="datatables" data-name="default" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <th data-field="id" class="text-center" data-sortable="true">N</th>
                                                <th data-field="user">Հեղինակ</th>
                                                <th data-field="title">Հոդվածի Անուն</th>
                                                <th data-field="comment">Մեկնաբանություն</th>
                                                <th data-field="c-date">Ստեղծման ամսաթիվ</th>
                                                <th class="text-right">Գործողություն</th>
                                            </thead>
                                            <tbody id="sortable">
                                            <?php
                                            $k=1;
                                                while ($sql_auth = mysqli_fetch_assoc($sql_auth_result)) {
                                            ?>
                                                <tr data-id="">
                                                    <td><?php echo $k;?></td>
                                                    <td><?php echo $sql_auth['fullname']?></td>
                                                    <td><?php 
                                                        echo $sql_auth['name'];
                                                    ?>
                                                    </td>
                                                    <td><?php echo $sql_auth['description']; ?></td>
                                                    <td class='c-date'><?php echo $sql_auth['created_date']; ?></td>
                                                    <td class='text-left d-flex flex-column' data-article-id=''>
                                                        <button class='delete-comment-auth btn btn-danger open-modal-delete-comment' id="authdel_<?php echo $sql_auth['id']; ?>" >Ջնջել</button>
                                                        <a href="../tables/edit-article.php?categories-article=autobiography&article-id=<?php echo $sql_auth['article_id']; ?>" class='btn btn-warning edit a_edit' ><i class='fa fa-external-link'></i></a>
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
                                                echo "<div class='returned-result'>Մեկնաբանություններ առայժմ չկան</div>";
                                            }
                                            
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- history -->

            <div class="content" data-type='comment'>
                <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card data-tables">
                                <div class="table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                                    <div class="fresh-datatables">
                                        <div class='col-md-12 text-center'>
                                            <div class='col-md-7 mx-auto'>
                                                <h2>Հոդված</h2>
                                              <h3>Հրապարակված մեկնաբանություններ</h3>
                                              <input type="hidden" class="select" value='<?=$_GET['categories-article']?>'>
                                            </div>
                                        </div>
                                        <div class="result-delete1 mx-3"></div> 
                                        <?php
                                            if(isset($sql_his_result) && mysqli_num_rows($sql_his_result) > 0){
                                               
                                        ?>
                                        <table id="datatables" data-name="default" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <th data-field="id" class="text-center" data-sortable="true">N</th>
                                                <th data-field="user">Հեղինակ</th>
                                                <th data-field="title">Հոդվածի Վերնագիր</th>
                                                <th data-field="comment">Մեկնաբանություն</th>
                                                <th data-field="c-date">Ստեղծման ամսաթիվ</th>
                                                <th class="text-right">Գործողություն</th>
                                            </thead>
                                            <tbody id="sortable">
                                            <?php
                                            $k=1;
                                                while ($sql_his = mysqli_fetch_assoc($sql_his_result)) {
                                            ?>
                                                <tr data-id="">
                                                    <td><?php echo $k;?></td>
                                                    <td><?php echo $sql_his['fullname']?></td>
                                                    <td><?php 
                                                        echo $sql_his['title'];
                                                    ?>
                                                    </td>
                                                    <td><?php echo $sql_his['description']; ?></td>
                                                    <td class='c-date'><?php echo $sql_his['created_date']; ?></td>
                                                    <td class='text-left d-flex flex-column' data-article-id=''>
                                                        <button class='delete-comment-his btn btn-danger open-modal-delete-comment' id="hisdel_<?php echo $sql_his['id']; ?>" >Ջնջել</button>
                                                        <a href="../tables/edit-article.php?categories-article=history&article-id=<?php echo $sql_his['article_id']; ?>" class='btn btn-warning edit a_edit' ><i class='fa fa-external-link'></i></a>
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
                                                echo "<div class='returned-result'>Մեկնաբանություններ առայժմ չկան</div>";
                                            }
                                            
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <?php include "../footer.php" ?>
             <script src="../js/existingComments.js"> </script>     
</body>
</html>