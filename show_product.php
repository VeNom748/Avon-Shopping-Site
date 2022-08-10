<?php
  session_start();
  require("connection.php");
  require("Functions.php");

//   code for fetch products if user clicks on perticular category
  if (isset($_GET['cat_name']) && $_GET['cat_name'] != "") {
      $cat_name = get_safe_value($conn, $_GET['cat_name']);

      // fetching products
      $prodQuery = 'SELECT * FROM `products` WHERE category_name="'.$cat_name.'"';

      $prodRes = mysqli_query($conn, $prodQuery);
  }


//   code for fetch data from search query
  if (isset($_GET['query']) && $_GET['query'] != "") {
      $query = get_safe_value($conn, $_GET['query']);
      // gets value sent over search form
      $sql = "SELECT * FROM products WHERE (`product_name` LIKE '%".$query."%') OR (`meta_keywords` LIKE '%".$query."%') ";
      $prodRes = mysqli_query($conn, $sql);
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
    <link rel="stylesheet" href="./css/Footer.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <title>Products</title>
</head>

<body>
    <?php
        require("./components/header.php");
    
        
?>
    <div class="Home" id="Home">
        <div class="product_page_container">
            <?php
                            while ($rowforres = mysqli_fetch_assoc($prodRes)) {
                                ?>
            <form action="index.php" method="post">
                <?php echo '<a href="single_product.php?id='.$rowforres["id"].'" style="text-decoration:none;color:#0F1111">'; ?>
                <div class="product_page_card">
                    <div class="Product_Img_box">
                        <img src=<?php echo $rowforres['image'] ?>
                        alt=""
                        class="Product_img"/>
                    </div>
                    <?php
                    echo "<input type='hidden' name='id' value='".$rowforres['id']."' />"; ?>
                    <strong><?php echo $rowforres['product_name'] ?></strong>
                    <h5><?php echo $rowforres['category_name'] ?>
                    </h5>
                    <div class="Price">
                        <p> Rs <?php echo $rowforres['mrp'] ?>
                        </p>

                        <small>Rs <?php echo $rowforres['selling_price'] ?></small>
                    </div>
                    <div class="ratings">
                        <?php require('./components/ratings.php')?>
                    </div>
                    </a>
                    <button class="product_page_btn" type="submit">Add to Cart</button>
                </div>
            </form>
            <?php
                            } ?>
        </div>
    </div>
    <div class="Footer">

        <?php
    require("./components/Footer.php");
?>
    </div>

</body>

</html>