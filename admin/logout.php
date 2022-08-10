<?php 
    session_start();
    unset($_SESSION['ADMIN_LOGGED']);
    unset($_SESSION['ADMIN_USERNAME']);
    header('location:./login.php');
    die();
?>
