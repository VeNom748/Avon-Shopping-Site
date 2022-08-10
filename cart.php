<?php
  session_start();
  require("connection.php");
  require("Functions.php");
  $toste = "False"
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
    integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/header.css">
  <link rel="stylesheet" href="./css/main.css">
  <link rel="stylesheet" href="./css/Home.css">
  <link rel="stylesheet" href="./css/products.css">
  <link rel="stylesheet" href="./css/CheckOut.css">
  <link rel="stylesheet" href="./css/Footer.css">
  <link rel="stylesheet" href="toste.css">
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
  <title>Cart</title>
</head>

<body>
  <?php
        require("./components/header.php")
    ?>
  <div class="Home">
    <div class="CheckOutPage">
      <div class="notes">
        <h1>
          Pay faster for all your shopping needs
          <span>with Avon Pay balance</span>
        </h1>
        <h2>Get Instant refund on cancellations | Zero payment failures</h2>
        <h2>If You wants to buy more then one quentity then add the product into cart more then one time</h2>
      </div>

      <!-- {/* leftSide */}  -->
      <div class="shopping_carts">
        <div class="scrollBar">
          <div class="shooping_cart_left">
            <h1>Shooping Cart</h1>
            <a href="">Deselect all items</a>
            <div class="hr_line2">Price</div>

            <div>
              <?php require("./components/cartProduct.php") ?>
            </div>

          </div>
        </div>

        <!-- {/* right side */} -->
        <div class="shooping_cart_right">
          <div class="shooping_banner">
            <img src="https://images-eu.ssl-images-amazon.com/images/G/31/checkout/assets/TM_desktop._CB443006202_.png"
              alt="" />
          </div>
          <div class="total_info_box">
            <div class="free_delivery_text">
              <CheckCircleIcon />
              <p>
                Select this option at checkout.
                <a href="https://www.Avon.in/gp/help/customer/display.html?nodeId=200904360&pop-up=1">
                  Details
                </a>
              </p>
            </div>

            <div class="Subtotal_box">

              <h3>
                Subtotal ( <?php if (!empty($_SESSION["shopping_cart"])) {
        echo count($_SESSION["shopping_cart"]);
    } else {
        echo "00";
    } ?>
                ) : <span> Rs
                  <?php
                    $total = 00;
                    if (!empty($_SESSION["shopping_cart"])) {
                        foreach ($_SESSION["shopping_cart"] as $product) {
                            $total = $total + $product['price'];
                        }
                    }
                    echo $total;
                ?>
                </span>
              </h3>

              <a href="pay.php" style="text-decoration:none">
                <button  class="btn_proceed">
                  Proceed to Buy
                </button>
              </a>

              <details class="EMI_btn">
                <summary>
                  EMI Available
                </summary>
                <p>Your order qualifies for EMI with valid credit cards (not available on purchase of Gold, Jewelry,
                  Gift cards and Avon pay balance top up). Learn more</p>
              </details>
            </div>
          </div>
        </div>
      </div>
      <!-- <Product_row_first /> -->
    </div>
    <div class="Footer">

      <?php require("./components/Footer.php") ?>
    </div>
  </div>

  <script src="toste.js"></script>
    <script>
        <?php
            if ($toste == "true") {
                echo "
                new Toast({
                    message: 'Product Removed Successfully',
                    type: 'success'
                });
                ";
            }
            $toste = "false";
        ?>
    </script>
</body>

</html>