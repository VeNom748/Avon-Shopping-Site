<?php
  session_start();
  require("connection.php");
  require("Functions.php");

  $err_msg = "";
  $userID = $_SESSION['USER_ID'];
  $userName = $_SESSION['USER_NAME'];

  if (empty($_SESSION["shopping_cart"])) {
      header("location:index.php");
  }
  


  if (isset($_POST['ExistingAddress']) && $_POST['ExistingAddress'] != "") {
      $address = get_safe_value($conn, $_POST['ExistingAddress']);
      $pay_type = get_safe_value($conn, $_POST['Pay_type']);

      // generating total price
      $total_price = 00;
      $product_names = "";
      if (!empty($_SESSION["shopping_cart"])) {
          foreach ($_SESSION["shopping_cart"] as $product) {
              $total_price = $total_price + $product['price'];
              $product_names = $product_names.",".$product['name'];
          }
      }

      // Default payment status
      $payment_status = "unpaid";

      $sql = "insert into `order` (`user_id`, `user_name`, `address`, `payment_type`, `total_price`, `payment_status`, `product_names`) VALUES ('$userID','$userName' ,'$address','$pay_type','$total_price','$payment_status','$product_names')";
      $res = mysqli_query($conn, $sql);

    
      header("location:confirm_order.php");
  }




  if (isset($_POST['address']) && $_POST['address'] != "") {

      // getting values from page
      $address = get_safe_value($conn, $_POST['address']);
      $city = get_safe_value($conn, $_POST['city']);
      $pincode = get_safe_value($conn, $_POST['pincode']);
      $pay_type = get_safe_value($conn, $_POST['Pay_type']);
      $mergeAddress = "$address ,city:- $city pincode:- $pincode";

      // generating total price
      $total_price = 00;
      $product_names = "";
      if (!empty($_SESSION["shopping_cart"])) {
          foreach ($_SESSION["shopping_cart"] as $product) {
              $total_price = $total_price + $product['price'];
              $product_names = $product_names.",".$product['name'];
          }
      }

      // Default payment status
      $payment_status = "unpaid";

      // fetching user
      $sql = "insert into `order` (`user_id`, `user_name`, `address`, `payment_type`, `total_price`, `payment_status`, `product_names`) VALUES ('$userID','$userName' ,'$mergeAddress','$pay_type','$total_price','$payment_status','$product_names')";
      $res = mysqli_query($conn, $sql);
      
      header("location:confirm_order.php");
  }
  

  // for deleting product from payment page
  if (isset($_GET['id']) && $_GET['id'] != "") {
      $id = get_safe_value($conn, $_GET['id']);
    
     
      if (!empty($_SESSION["shopping_cart"])) {
          foreach ($_SESSION["shopping_cart"] as $key => $value) {
              if ($id == $value['id']) {
                  unset($_SESSION["shopping_cart"][$key]);
              }
          }
      }
  }

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
  <link rel="stylesheet" href="./css/payment.css">
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Cart</title>
</head>

<body>
  <?php
        require("./components/header.php")
    ?>
  <div class="Home">
    <div class="w_80">
      <div class="scroll_bar">
        <div class="shooping_cart_left">
          <h1>Shooping Cart</h1>
          <Link to="">Deselect all items</Link>
          <div class="hr_line2">Price</div>

          <div>
            <?php
                      // if cart is not empty then show all cart products
                      if (!empty($_SESSION["shopping_cart"])) {
                          foreach ($_SESSION["shopping_cart"] as $product) {
                              ?>

            <div class="checkout_product_card">
              <input type="checkbox" name="checkCart" id="" checked />
              <div class="cart_product_img">
                <?php

                      echo "<img src='".$product['image']."' alt=''/>"
                      ?>
              </div>
              <div class="cart_product_info">
                <ul style="margin: 10px;">
                  <li><?php echo $product['name'] ?>
                  </li>


                  <li><img src="https://m.media-amazon.com/images/G/31/marketing/fba/fba-badge_18px._CB485936079_.png"
                      alt="" /></li>

                  <!-- delete from card button  -->
                  <li>
                    <a style="text-decoration:none;"
                      href="?id=<?php echo $product['id'] ?>">
                      Delete
                    </a>
                  </li>

                </ul>

              </div>
              <div class="cart_price">
                Rs <?php echo $product['price'] ?>
              </div>
            </div>
            <div class="hr_line2"></div>
            <?php
                          }
                      }
            ?>
          </div>

        </div>
      </div>


      <div class="Subtotal_box_pay">
        <!-- getting total  -->
        <h1>Total</h1>
        <h3>
          Rs.
          <?php
              $total = 00;
              if (!empty($_SESSION["shopping_cart"])) {
                  foreach ($_SESSION["shopping_cart"] as $product) {
                      $total = $total + $product['price'];
                  }
                  if ($total < 500) {
                      echo "$total + 60 = ".$total += 60;
                  } else {
                      echo $total;
                  }
              }
                if ($total == 00) {
                    echo $total;
                }
          ?>

        </h3>
      </div>


      <div class="payment-box">
        <h1 class="pheading">Please add your address</h1>
        <div class="container">

          <div class="row">
            <div class="col-xs-13 col-md-5">
              <!-- CREDIT CARD FORM STARTS HERE -->
              <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table">
                  <div class="row display-tr">
                    <h3 class="panel-title display-td p-0 ">Address</h3>
                  </div>
                </div>
                <div class="panel-body">
                  <?php
                    $sqlForaddress = "select * from users where id = $userID";
                    $response = mysqli_query($conn, $sqlForaddress);
                  ?>
                  <form method="POST">
                    <?php
                            while ($row = mysqli_fetch_assoc($response)) {
                                ?>

                    <div class="row">
                      <div class="col-xs-12">
                        <div class="form-group" style="background-color:#fff;">
                          <input type="radio" name="ExistingAddress"
                            value="<?php echo $row['Address']; ?>" />
                          <?php echo $row['Address'] ?>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-12">
                        <div class="form-group">
                          <label for="address">Address</label>
                          <div class="input-group">
                            <textarea class="form-control" name="address" placeholder="Your address" autofocus cols="5"
                              rows="5"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="form-group">
                          <label for="city">City</label>
                          <div class="input-group">
                            <input type="text" class="form-control" name="city" placeholder="Your city" autofocus />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="form-group">
                          <label for="pincode">Pincode</label>
                          <div class="input-group">
                            <input type="number" class="form-control" name="pincode" placeholder="Your Pincode"
                              autofocus />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="form-group">
                          <label for="Pay_type">Payment Type</label>
                          <div>
                            <input type="radio" name="Pay_type" value="COD" /> COD

                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-12">
                        <button class="btn_proceed" type="submit">

                          Place Order

                        </button>
                      </div>
                    </div>
                  </form>
                  <?php
                            }
                          ?>


                  <!-- CASH ON DILIVERY  -->

                </div>
              </div>
              <!-- CREDIT CARD FORM ENDS HERE -->
            </div>
          </div>
        </div>
      </div>
      <!-- payment box end  -->


    </div>
    <div class="Footer">
      <?php require("./components/Footer.php") ?>
    </div>
  </div>


  <!-- If you're using Stripe for payments -->
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  <script type="javascript" src="payment.js"></script>
</body>

</html>