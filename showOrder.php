<?php
      session_start();
      require("connection.php");
      require("Functions.php");
      $response = "";

      if (isset($_SESSION['USER_NAME'])) {
          $userName = $_SESSION['USER_NAME'];
      } else {
          header("location:login.php");
      }
      if (isset($_SESSION['USER_ID']) && $_SESSION['USER_ID'] != "") {
          $userID = $_SESSION['USER_ID'];
          $sqlForOrders = "select * FROM `order` WHERE user_id = $userID";
          $response = mysqli_query($conn, $sqlForOrders);
      }


     if ($response == "") {
         header("location:login.php");
     }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/Home.css">
    <link rel="stylesheet" href="./css/products.css">
    <link rel="stylesheet" href="./css/CheckOut.css">
    <link rel="stylesheet" href="./css/Footer.css">
    <link rel="stylesheet" href="./css/payment.css">
    <link rel="stylesheet" href="./css/showOrder.css">
    <link rel="stylesheet" href="toste.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body>
    <?php
        require("./components/header.php")
    ?>
    <div class="Home">
        <div class="w_80">
            <div class="scroll_bar_1">
                <div class="shooping_cart_left">
                    <h1>Your Orders</h1>
                    <div class="hr_line2">Price</div>

                    <div>
                        <?php

                      // if cart is not empty then show all cart products
                     while ($row = mysqli_fetch_assoc($response)) {
                         ?>

                        <div class="checkout_product_card">


                            <div class="cart_product_info">
                                <ul style="margin: 10px;">
                                    <li><?php
                                    $productName = substr($row['product_names'], 1);
                         echo $productName; ?>
                                    </li>
                                    <li><img src="https://m.media-amazon.com/images/G/31/marketing/fba/fba-badge_18px._CB485936079_.png"
                                            alt="" /></li>


                                </ul>
                            </div>
                            <div class="cart_price">
                                Rs <?php echo $row['total_price'] ?>
                            </div>
                        </div>
                        <div class="hr_line2"></div>
                        <?php
                     }
            ?>
                    </div>

                </div>
            </div>


        </div>
        <div class="Footer">
            <?php require("./components/Footer.php") ?>
        </div>
    </div>
</body>

</html>