<?php
    session_start();
    require("Functions.php");
    require("connection.php");


    // add to card functionality
    $status = "";

    // default cart size
    $toste = "false";

    if (isset($_SESSION["USER_LOGGED"]) && $_SESSION["USER_LOGGED"] != "") {
        // echo "iam ina";
        // if user adding product into cart with login
        if (isset($_POST['id']) && $_POST['id'] != "") {
            $toste = "true";
            $id = get_safe_value($conn, $_POST['id']);

            // fetching Product to add in cart
            
            $sql = "select * from products where id = $id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $name = get_safe_value($conn, $row['product_name']);
            $image = get_safe_value($conn, $row['image']);
            $price = get_safe_value($conn, $row['selling_price']);
            $Qty = get_safe_value($conn, $row['qty']);
            
            $cartArray = array(
                $id=>array(
                    'id'=>$id,
                    'name'=>$name,
                    'image'=>$image,
                    'price'=>$price,
                    'quantity'=>$Qty
                    )
                );
                
            if (empty($_SESSION["shopping_cart"])) {
                $_SESSION["shopping_cart"] = $cartArray;
                $status = "<div style='color:red; font-size = 20px;' >Product is added to your cart!</div>";
            } else {
                $array_keys = array_keys($_SESSION["shopping_cart"]);
                if (in_array($id, $array_keys)) {
                    $status = "<div style={ color:red; font-size = 20px; }  style='color:red;'>
                    Product is already added to your cart!</div>";
                } else {
                    $_SESSION["shopping_cart"] = array_merge(
                        $_SESSION["shopping_cart"],
                        $cartArray
                    );
          

                    $status = "<div style={ color:red; font-size = 20px; } >Product is added to your cart!</div>";
                }
            }
        } elseif (isset($_POST['Buy']) && $_POST['Buy'] != "") {
            $id = get_safe_value($conn, $_POST['Buy']);

            // fetching Product to add in cart
            
            $sql = "select * from products where id = $id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $name = get_safe_value($conn, $row['product_name']);
            $image = get_safe_value($conn, $row['image']);
            $price = get_safe_value($conn, $row['selling_price']);
            $Qty = get_safe_value($conn, $row['qty']);
        
            
            $cartArray = array(
                $id=>array(
                    'id'=>$id,
                    'name'=>$name,
                    'image'=>$image,
                    'price'=>$price,
                    'quantity'=>$Qty
                    )
                );

            if (empty($_SESSION["shopping_cart"])) {
                $_SESSION["shopping_cart"] = $cartArray;
                $status = "<div style='color:red; font-size = 20px;' >Product is added to your cart!</div>";
                header("location:pay.php");
            } else {
                $array_keys = array_keys($_SESSION["shopping_cart"]);
                if (in_array($id, $array_keys)) {
                    $status = "<div style={ color:red; font-size = 20px; }  style='color:red;'>
                    Product is already added to your cart!</div>";
                    header("location:pay.php");
                } else {
                    $_SESSION["shopping_cart"] = array_merge(
                        $_SESSION["shopping_cart"],
                        $cartArray
                    );
                    
                    
                    $status = "<div style={ color:red; font-size = 20px; } >Product is added to your cart!</div>";
                    header("location:pay.php");
                }
            }
        }
    } else {
        // if user adding product without login
        if (isset($_POST['id']) && $_POST['id'] != "") {
            header("location:login.php");
        }
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
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/Home.css">
    <link rel="stylesheet" href="./css/products.css">
    <link rel="stylesheet" href="./css/Footer.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <link rel="stylesheet" href="./css/carousel.css">
    <link rel="stylesheet" href="toste.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php
        require("./components/header.php");
        // fetching category
        $catQuery = "select * from categories order by id";
        $catRes = mysqli_query($conn, $catQuery);
        
        
        // fetching products
        $prodQuery = "select * from products order by id";
        $prodRes = mysqli_query($conn, $prodQuery);
        
        ?>
    <div class="Home" id="Home">
        <!-- home container -->


        <div class="Home_container">
            <!-- Coursel start -->

            <section class="carousel Home_banner " aria-label="Gallery">
                <ol class="carousel__viewport">
                    <li id="carousel__slide1" tabindex="0" class="carousel__slide1 carousel__slide">
                        <div class="carousel__snapper">
                            <a href="#carousel__slide4" class="carousel__prev">Go to last slide</a>
                            <a href="#carousel__slide2" class="carousel__next">Go to next slide</a>
                        </div>
                    </li>
                    <li id="carousel__slide2" tabindex="0" class="carousel__slide2 carousel__slide">
                        <div class="carousel__snapper"></div>
                        <a href="#carousel__slide1" class="carousel__prev">Go to previous slide</a>
                        <a href="#carousel__slide3" class="carousel__next">Go to next slide</a>
                    </li>
                    <li id="carousel__slide3" tabindex="0" class="carousel__slide3 carousel__slide">
                        <div class="carousel__snapper"></div>
                        <a href="#carousel__slide2" class="carousel__prev">Go to previous slide</a>
                        <a href="#carousel__slide4" class="carousel__next">Go to next slide</a>
                    </li>
                    <li id="carousel__slide4" tabindex="0" class="carousel__slide4 carousel__slide">
                        <div class="carousel__snapper"></div>
                        <a href="#carousel__slide3" class="carousel__prev">Go to previous slide</a>
                        <a href="#carousel__slide1" class="carousel__next">Go to first slide</a>
                    </li>
                </ol>
            
            </section>
            <!-- Coursel end  -->

            
            <!-- categories  -->
            <div class="category_box">
                <?php
                        while ($row = mysqli_fetch_assoc($catRes)) {
                            ?>
                <div class="category_card">
                    <h2><?php echo $row['name'] ?>
                    </h2>
                    <img src=<?php echo $row['img'] ?> alt=""
                    /><br />
                    <?php echo '<a href="show_product.php?cat_name='.$row["name"].'">See more</a>'; ?>

                </div>
                <?php
                        } ?>
            </div>
            <!-- categories end -->

            <!-- products slider  -->
            <div class="product_row_box" id="main">
                <!-- <?php echo $status ?> ; -->
                <?php require("./components/ProductRow1.php") ?>

            </div>
            <!-- product slider end  -->

            <!-- home container -->

            <!-- footer  -->
            <div class="Footer" style="position: absolute; bottom: -335px;">

                <?php require("./components/Footer.php")?>
            </div>
            <!-- footer end -->
        </div>
    </div>
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>
    <script src="index.js"></script>
    <script src="toste.js"></script>
    <script>
        <?php
            if ($toste == "true") {
                echo "
                new Toast({
                    message: 'Product Added to your Cart',
                    type: 'success'
                });
                ";
            }
            $toste = "false";
        ?>
    </script>
</body>

</html>