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
           $res_reason=$db->all_rows('reasons_block_user');
        ?>
            <!-- End Navbar -->
            <div class="content" data-type=''>
                <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card data-tables">
                                <div class="table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                                    <div class="fresh-datatables">
                                        <div class='col-md-12 text-center'>
                                            <div class='col-md-7 mx-auto'>
                                              <h3>Օգտատերեր</h3>
                                                <form method="post" action=''>
                                                    <div class="form-group">
                                                      <label>Ընտրել ստատուսը</label>
                                                      <select onchange="this.form.submit()" class="form-control select" id="select_categories" name='select-user-status'>
                                                         <?php include "select-user-status.php"; ?> 
                                                      </select>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="d-flex pull-right mt-3 mx-3">
                                           <!-- <button class="ml-2 bg-danger delete-all-checked-row py-1 px-3 btn-outline pull-right">Ջնջել</button> -->
                                        </div>
                                        <div class="result-status mx-3"></div>     
                                        <table id="datatables" data-name="default" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                    <th data-field="id" class="text-center" data-sortable="true">#</th>
                                                    <th data-field="state" data-checkbox="true"></th>
                                                    <th data-field="name">Անուն Ազգանուն</th>
                                                    <th data-field="email">Էլ․ փոստ</th>
                                                    <th data-field="phone">Հեռ․համար</th>
                                                    <th data-field="city">Քազաք/գյուղ</th>
                                                    <th data-field="status">Ստատուս</th>
                                                    <th data-field="c-date">Գրանցման ամսաթիվ</th>
                                                    <th class="text-right">Գործողություն</th>
                                            </thead>
                                            <tbody id="sortable">

                                                   <?php 
                                                    $count=0;
                                                    $mod='';
                                                      if(isset($_SESSION['status_user']) && $_SESSION['status_user']==0){
                                                          $status=$_SESSION['status_user'];
                                                          $button="<button class='btn btn-success status-user-active' data-type='active'>Ակտիվացնել</button>";
                                                       }
                                                       else{
                                                          $status=1;
                                                          $button="<button class='btn btn-danger open-modal-block-user' data-type='block' data-toggle='modal' data-target='#select-reason'>Արգելափակել</button>";
                                                       }
                                                       $db->tblName='users';
                                                       $conditions=array('status' => $status);
                                                       $res=$db->checkRow_result($conditions);
                                                       
                                                       if($res){
                                                          while($row=mysqli_fetch_assoc($res)){
                                                              
                                                            $count++;
                                                            $status = $row['status'] ? 'Ակտիվ' : 'Արգելափակված';
                                                            $status_class = $row['status'] ? 'text-success' : 'text-danger';
                                                              echo " <tr data-id=".$row['id'].">
                                                                         <td class='first_td'>".$count."</td>
                                                                         <td></td>
                                                                         <td class=''>".$row['fullname']."</td>
                                                                         <td class=''>".$row['email']."</td>
                                                                         <td class=''>".$row['phone']."</td>
                                                                         <td class=''>".$row['city']."</td>
                                                                         <td class='status $status_class'>".$status."</td>
                                                                         <td class='c-date'>".$row['date_created']."</td>
                                                                         <td class='text-right' data-email='".$row['email']."'>
                                                                             <button class='btn btn-primary open-modal-send-message' data-toggle='modal' data-target='#send-message-editor' data-email='".$row['email']."'>Գրել նամակ</button>
                                                                             $button
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
             <?php include "../modal-reason-block-user.php" ?>
             <?php include "../modal-send-message.php" ?>
            <script src="../js/send-message.js"> </script>
            <script src="../js/status-user.js"> </script>
</body>
</html>