<?php
if (!isset($_SESSION['login'])) {
    header("Location: ../login/index.php");
    exit();
}
?>
<?php
// if(!$_SESSION['administration']){
//     header("Location: ../login/index.php");
//     exit();
// }
?>
<div class="wrapper">
    <div class="sidebar" data-color="blue">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text logo-normal text-center">
                    Հայ հերոս թիմ
                </a>
            </div>
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="../tables/index.php">
                        
                        <img class="main-logo" src="../assets/img/logo.png">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
                        <i class="nc-icon nc-paper-2"></i>
                        <p>
                            Հոդված/Կենսագրություն
                            <!--<b class="caret"></b>-->
                        </p>
                    </a>
                    <div class="collapse " id="tablesExamples">
                        <ul class="nav">
                           
                            <li class="nav-item ">
                                <a class="nav-link"  href="../tables/created-articles.php">
                                    <span class="sidebar-normal">Նոր տեղծված և հաստատված</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>

                </li>
                <li class="nav-item" >
                    <a class="nav-link" data-toggle="collapse" href="#formsComments">
                        <i class="nc-icon nc-notes"></i>
                        <p>
                            Մեկնաբանություն
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="formsComments">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link"  href="../comments/new-comments.php">
                                    <span class="sidebar-mini">Ն</span>
                                    <span class="sidebar-normal">Նոր</span>
                                </a>
                            </li>
                            
                                <li class="nav-item ">
                                    <a class="nav-link" 
                                       href="../comments/published-comments.php">
                                        <span class="sidebar-mini">ՀՐ</span>
                                        <span class="sidebar-normal">Հրապարակված</span>
                                    </a>
                                </li>

                        </ul>
                    </div>
                </li>
                
                <li class="nav-item" >
                    <a class="nav-link" data-toggle="collapse" href="#formsAdditions">
                        <i class="nc-icon nc-notes"></i>
                        <p>
                            Հոդվածի լրացումներ 
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="formsAdditions">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link"  href="../addition/new-addition.php">
                                    <span class="sidebar-mini">Ն</span>
                                    <span class="sidebar-normal">Նոր</span>
                                </a>
                            </li>
                            
                            <li class="nav-item ">
                                <a class="nav-link" 
                                    href="../addition/published-addition.php">
                                    <span class="sidebar-mini">ՀՐ</span>
                                    <span class="sidebar-normal">Հաստատված</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <?php
                echo $_SESSION['administration'] ? '<li class="nav-item">
                               <a class="nav-link"  href="../tables/users.php">
                                   <span class="sidebar-mini">ՕԳ</span>
                                   <span class="sidebar-normal">Օգտատերեր</span>
                               </a>
                               </li>' : '';
                ?>
                 <?php
                    echo $_SESSION['administration'] ? '<li class="nav-item ">
                                    <a class="nav-link" href="../tables/moderators.php">
                                        <span class="sidebar-mini">ՄԴ</span>
                                        <span class="sidebar-normal">Մոդերատորներ</span>
                                    </a>
                                </li>' : '';
                    ?>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php?logout-submit=logout">
                        <i class="nc-icon nc-button-power"></i>
                        <p>Ելք</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar"
                                class="btn btn-primary btn-fill btn-round btn-icon d-none d-lg-block">
                            <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                            <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                        </button>
                    </div>
                    <a class="navbar-brand" href="#pablo"> Հայ հերոս </a>
                </div>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                </button>
                <!-- ----- -->
                <div class="collapse navbar-collapse justify-content-end">
                    <!-- <ul class="navbar-nav">
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <i class="nc-icon nc-bell-55"></i>
                                <span class="notification">5</span>
                                <span class="d-lg-none">Notification</span>
                            </a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item" href="#">Notification 1</a>
                                <a class="dropdown-item" href="#">Notification 2</a>
                                <a class="dropdown-item" href="#">Notification 3</a>
                                <a class="dropdown-item" href="#">Notification 4</a>
                                <a class="dropdown-item" href="#">Notification 5</a>
                            </ul>
                        </li>
                    </ul> -->
                </div>
                <!-- --------------- -->
            </div>
        </nav>