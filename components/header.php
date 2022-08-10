<?php
    require("connection.php");

    $Address="";
    $rowforres['Address'] ="";

    // getting username from session
    if (isset($_SESSION['USER_LOGGED'])) {
        $username = $_SESSION['USER_NAME'];
        $email = $_SESSION['USER_EMAIL'];
        $sql = "select `Address` FROM `users` WHERE email = '$email'";
        $res = mysqli_query($conn, $sql);
        $rowforres = mysqli_fetch_assoc($res);
        $Address = substr($rowforres['Address'], 0, 15);
    }



?>


<div class="header" id="header">
    <a href="/avon">
        <img src="./images/Logo.png" alt="" class="Logo" />
    </a>


    <?php
        if ($rowforres['Address'] == "") {
            echo '
                <a href="/avon/add_address.php" class="address_button">
                    <div class="header_option">
                        <span class="headerOption_LineOne">Hello</span> <br />
                        <span class="headerOption_Linetwo">Select your address</span>
                    </div>
                </a>
            ';
        } else {
            echo '
                <a href="/avon/add_address.php" class="address_button">
                    <div class="header_option">
                        <span class="headerOption_LineOne"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style="width:10px;margin:0px 5px;"><path fill="white" d="M168.3 499.2C116.1 435 0 279.4 0 192C0 85.96 85.96 0 192 0C298 0 384 85.96 384 192C384 279.4 267 435 215.7 499.2C203.4 514.5 180.6 514.5 168.3 499.2H168.3zM192 256C227.3 256 256 227.3 256 192C256 156.7 227.3 128 192 128C156.7 128 128 156.7 128 192C128 227.3 156.7 256 192 256z"/></svg> Delivery To</span> <br />
                        <span class="headerOption_Linetwo">'.$Address.'</span>
                    </div>
                </a>
            ';
        }
    ?>

    <form action="Show_product.php" method="get" style="flex:1;"> 
        <div class="search_bar">
                <input type="text" class="search" name="query" />
                <button type="submit" class="search_right">
                    <i class="fas fa-search" style="font-size:17px;"></i>
                </button>
            </div>
        </form>
    <div class="header_right">
        <?php
                // if user logged in
                if (isset($_SESSION['USER_LOGGED'])) {
                    echo "
                    <a href='logout.php'>
                        <div class='header_option'>
                            <span class='headerOption_LineOne'> Welcome, $username </span> <br />
                            <span class='headerOption_Linetwo'>Logout</span>
                        </div>
                    </a>
                    ";
                } else {
                    echo "
                   <a href='login.php'>
                    <div class='header_option'>
                       <span class='headerOption_LineOne'>Hello, User</span> <br />
                       <span class='headerOption_Linetwo'>Sign in</span>
                    </div>
                    </a>
                   
                    ";
                }
                ?>

        <a href="./showOrder.php" >
            <div class="header_option">
                <span class="headerOption_LineOne">Return</span> <br />
                <span class="headerOption_Linetwo">& Order</span>
            </div>
        </a>
        <a href="./cart.php" class="Cart_btn">
            <div class="cartButtonDiv header_option">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart_count"><?php if (!empty($_SESSION["shopping_cart"])) {
                    echo count($_SESSION["shopping_cart"]);
                } else {
                    echo "00";
                } ?>
                </span>
                <span>Cart</span>
            </div>
        </a>
    </div>
    <div class="burger" onclick="openBurger()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
            <path
                d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z" />
        </svg>

    </div>

</div>
<div class="dropdown_slide" id="dropdown_slide">
    <ul>
        <li><?php
            // if user logged in
            if (isset($_SESSION['USER_LOGGED'])) {
                echo "
                <a href='logout.php'>
                    <div class='header_option'>
                        <span class='headerOption_LineOne'> Welcome, $username </span> <br />
                        <span class='headerOption_Linetwo'>Logout</span>
                    </div>
                </a>
                ";
            } else {
                echo "
               <a href='login.php'>
                <div class='header_option'>
                   <span class='headerOption_LineOne'>Hello, User</span> <br />
                   <span class='headerOption_Linetwo'>Sign in</span>
                </div>
                </a>
               
                ";
            }
            ?>
        </li>
        <li>
            <div class="header_option">
                <span class="headerOption_LineOne">Return</span> <br />
                <span class="headerOption_Linetwo">& Order</span>
            </div>
        </li>
        <li><a href="./cart.php" class="Cart_btn">
                <div class="cartButtonDiv header_option">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart_count"><?php if (!empty($_SESSION["shopping_cart"])) {
                echo count($_SESSION["shopping_cart"]);
            } else {
                echo "00";
            } ?>
                    </span>
                    <span>Cart</span>
                </div>
            </a></li>
    </ul>
</div>