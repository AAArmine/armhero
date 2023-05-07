<?php include "../heder.php"; 
    // if(!$_SESSION['administration']){
    //     header("Location: ../login/index.php");
    //     exit();
    // } 
?>
    <body>
        <?php
           include "../menu.php";
           require_once "../classes/DB.class.php";
           $db=new DB();
           $tblname='admin';
           $res=$db->all_in_one_row('ASC', $tblname);
        ?>
               <div class="content">
                <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card data-tables">
                                <div class="table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                                    <div class="fresh-datatables">
                                        <div class='col-md-12 text-center'>
                                            <div class='col-md-7 mx-auto'>
                                              <h3>ՄՈԴԵՐԱՏՈՐՆԵՐ</h3>
                                            </div>
                                        </div>
                                        <div class="delete-row text-center my-5">
                                        	<div class='col-md-6 mx-auto '>
	                                        	<form class="w-100" id="add-moderator">
	                                        		<div class="cont-am mb-3 form-group text-left">
	                                                    <label >Մուտքանուն</label>
	                                                    <input class="form-control login"  placeholder="Մուտքանուն"  name="login-moderator" 
	                                                      value="">
	                                                </div>
	                                                <div class="cont-am mb-3 form-group text-left">
	                                                    <label >Գաղտնաբառ</label>
	                                                    <input class="form-control password"  placeholder="Գաղտնաբառ"  name="password-moderator" 
	                                                      value="">
	                                                </div>
	                                                <div class="res-add-moderator my-2"></div>
	                                                <button type='submit' class="btn btn-orange mx-auto" name='add-moderator'>Ավելացնել մոդերատոր</button>
	                                        	</form>
                                                <?php echo $_SESSION['categories_article'];?>
                                            </div>
                                        </div>
                                        <div class="result-delete mx-3"></div>   
                                        <table id="datatables" data-name="admin" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                    <th data-field="id" class="text-center" data-sortable="true">#</th>
                                                    <!-- <th data-field="state" data-checkbox="true"></th> -->
                                                    <th data-field="name">Մուտքանուն</th>
                                                    <th data-field="password">Գաղտնաբառ</th>
                                                    <th data-field="work">Չհրապարակված հոդվածներ</th>
                                                    <th data-field="login-date">Մուտքի ամսաթիվ</th>
                                                    <th data-field="create-date">Ստեղծման ամսաթիվ</th>
                                                    <th class="text-right">Gործողություն</th>
                                            </thead>
                                            <tbody id="sortable">
                									         		<?php
                									         		  $count=0;
                									                  while($row=mysqli_fetch_assoc($res)){
                									                  	if($count>0){
                									                  		echo "<tr data-id=".$row['id'].">
                                                                  <td>".$count."</td>
                                                                  <td></td>
                                                                  <td>".$row['login']."</td>
                                                                  <td>".$row['pass_not_hash']."</td>
                                                                  <td>".$row['status']."</td>
                                                                  <td>".$row['login_date']."</td>
                                                                  <td>".$row['date']."</td>
                                                                  <td class='text-right'>
                                                                      <a href='#' class='btn btn-link btn-danger remove' data_name=".$row['id']."><i class='fa fa-times'></i></a>
                                                                  </td>
                                                                </tr>";
                									                  	}
                                                        $count++;
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
            <script src="../js/add-moderator.js"> </script>
            <script src="../js/delete-rows.js"> </script>
</body>
</html>
