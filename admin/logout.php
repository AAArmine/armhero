<?php
session_start();
if (isset($_GET['logout-submit']) && $_GET['logout-submit'] == 'logout') {
    session_unset();
    header("Location: login/index.php");
    exit();
}
?>