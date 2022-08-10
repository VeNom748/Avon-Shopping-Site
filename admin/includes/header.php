<?php
    session_start();
    require("connection.php");
    if (isset($_SESSION['ADMIN_LOGGED']) && $_SESSION['ADMIN_LOGGED'] != '') {
    } else {
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Avon</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
                integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
                crossorigin="anonymous">
        <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="./css/Footer.css">
        <link rel="stylesheet" href="./css/main.css">
        <link rel="stylesheet" href="./css/admin_product.css">
        <link rel="stylesheet" href="./css/Home.css">
        <link rel="stylesheet" href="./css/header.css">
        <link rel="stylesheet" href="./css/login.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="header" id="header">
        <a href="/Avon">
            <img src="./images/amazonLogo.png" alt="" class="Logo" />
        </a>

        <a href="admin_categories.php">
            <div class="header_option">
                <span class="headerOption_LineOne">Category</span> <br />
                <span class="headerOption_Linetwo">Master</span>
            </div>
        </a>

        <a href="admin_products.php">
            <div class="header_option">
                <span class="headerOption_LineOne">Product</span> <br />
                <span class="headerOption_Linetwo">Master</span>
            </div>
        </a>
        <a href="admin_orders.php">
            <div class="header_option">
                <span class="headerOption_LineOne">Oders</span> <br />
                <span class="headerOption_Linetwo">Master</span>
            </div>
        </a>
        <a href="usage.php">
            <div class="header_option">
                <span class="headerOption_LineOne">Generate Report</span><br>
                <span class="headerOption_Linetwo">on Orders</span>

            </div>
        </a>

        <a href="/amazon_clone">
            <div class="header_option">
                <span class="headerOption_LineOne">Go to </span> <br />
                <span class="headerOption_Linetwo">Home</span>
            </div>
        </a>

        <a href = "logout.php">
            <div class="header_option logout">
                <div class="select_language">
                    <i class="fas fa-users-cog"></i>
                    <span>Admin Logout</span>
                </div>
            </div>
        </a>
    </div>
