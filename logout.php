<?php 
    session_start();
    unset($_SESSION['USER_LOGGED']);
    unset($_SESSION['USER_NAME']);
    unset($_SESSION['shopping_cart']);
    header('location:index.php');
    die();

?>