<?php include "../heder.php"; 
    if(!isset($_SESSION['administration'])){
        header("Location: ../login/index.php");
        exit();
    } 
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
                           <h1 class="text-center">Ողջույն <?php echo $_SESSION['login'] ?></h1>
                        </div>
                    </div>
                </div>
         </div>
        <?php include "../footer.php" ?>
    </body>
</html>
