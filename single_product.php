<?php
  session_start();
  require("connection.php");
  require("Functions.php");

  if (isset($_GET['id']) && $_GET['id'] != "") {
      $id = get_safe_value($conn, $_GET['id']);

      // fetching products
      $prodQuery = 'SELECT * FROM `products` WHERE id="'.$id.'"';

      $prodRes = mysqli_query($conn, $prodQuery);
  }
  
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Name</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/Home.css">
    <link rel="stylesheet" href="./css/products.css">
    <link rel="stylesheet" href="./css/Footer.css">
    <link rel="stylesheet" href="./css/CheckOut.css">
    <link rel="stylesheet" href="./css/single_product.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php
        require("./components/header.php");
?>
    <div id="Home">
        <div class="single_product_page_container">
            <?php
                 while ($rowforres = mysqli_fetch_assoc($prodRes)) {
                     ?>
            <div class="single_product_box1">
                <img src=<?php
                            echo $rowforres['image']; ?> alt="">
            </div>
            <div class="single_product_box2">
                <h3><?php
                            echo $rowforres['short_desc']; ?>
                </h3>
                <a href=""><?php
                            echo $rowforres['category_name']; ?>
                </a>
                <a>
                    <?php
                            require("./components/ratings.php   ")
                     ?>

                </a>
                <img src="./images/Logo.png" alt="">
                <div class="hr_line2"></div>
                <p>Price: <span> INR <?php
                            echo $rowforres['selling_price']; ?>.00
                    </span>
                </p>
                <a>Available at a lower price from other sellers that may not offer free Prime shipping.</a><br>
                <div class="hr_line2"></div>
                <strong>About this Item</strong>
                <p>
                    <?php
                        echo $rowforres['descreption']; ?>
                </p>

            </div>
            <div class="single_product_box3">

                <span> INR <?php echo $rowforres['selling_price']; ?>.00</span>
                <a>INR <?php echo $rowforres['selling_price']; ?>.00
                    Shipping & Import Fees Deposit to India</a>
                <?php
                    
                    if ($rowforres['selling_price'] < 500) {
                        echo "<p style='color:#B12704'>INR 60.00 Delivery</p>";
                    } else {
                        echo "<p style='color:green'>Free Delivery ✔</p>";
                    } ?>
                <?php if($rowforres['qty'] == 0){
                    echo "<h2 style='color:red;font-size:20px;font-weight:300;padding:10px 0px'>Out of Stock</h2>";
                }else if ($rowforres['qty'] > 20) {
                        echo "<h2 style='color:#007600;font-size:30px;font-weight:300;padding:10px 0px'>In Stock</h2>";
                    }else{
                      echo "<h2 style='color:red;font-size:20px;font-weight:300;padding:10px 0px'>Harry Up! Only ".$rowforres['qty']." left</h2>";
                    } ?>
                <form action="index.php" method="post">
                    <?php
                    echo "<input type='hidden' name='id' value='".$rowforres['id']."' />"; ?>
                    <button type="submit" class="single_product_addtocart_btn">
                        Add to Cart
                    </button>
                </form>
                <form action="index.php" method="post">
                    <?php
                    echo "<input type='hidden' name='Buy' value='".$rowforres['id']."' />"; ?>
                    <button type="submit" class="single_product_BuyNow_btn">
                        Buy Now
                    </button>
                </form>
                <a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="#007185"
                            d="M80 192V144C80 64.47 144.5 0 224 0C303.5 0 368 64.47 368 144V192H384C419.3 192 448 220.7 448 256V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V256C0 220.7 28.65 192 64 192H80zM144 192H304V144C304 99.82 268.2 64 224 64C179.8 64 144 99.82 144 144V192z" />
                    </svg> Secure Transaction</a>

                <h5>Ships from &nbsp; &nbsp; &nbsp;<a>Avon.com</a> <br>
                    Sold from &nbsp; &nbsp; &nbsp; <a>Avon.com</a></h5>
                <p>Return Policy <a href=""> Eligible for Return, Refund or Replacement </a></p>
                <p>Support <a href=""> Free Avon product support included </a></p>

            </div>
            <?php
                 }
             ?>

        </div>
        <!-- footer  -->
        <div class="Footer">
            <?php require("./components/Footer.php")?>
        </div>
        <!-- footer end -->
    </div>
</body>

</html>