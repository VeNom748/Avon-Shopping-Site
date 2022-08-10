<?php
    session_start();
    require("connection.php");
    if ($_SESSION['ADMIN_LOGGED'] != "YES") {
        header('location:login.php');
    } else {
        header('location:admin_categories.php');
    }
?>