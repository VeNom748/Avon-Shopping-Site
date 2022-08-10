<?php

    if (isset($_GET['id']) && $_GET['id'] != "") {
        $toste = "true";
        $id = get_safe_value($conn, $_GET['id']);
        
         
        if (!empty($_SESSION["shopping_cart"])) {
            foreach ($_SESSION["shopping_cart"] as $key => $value) {
                if ($id == $value['id']) {
                    unset($_SESSION["shopping_cart"][$key]);
                }
            }
        }
    }

    // if cart is not empty then show all cart products
    if (!empty($_SESSION["shopping_cart"])) {
        foreach ($_SESSION["shopping_cart"] as $product) {
            ?>

<div class="cart_product_card">
    <input type="checkbox" name="checkCart" id="" checked />
    <div class="cart_product_img">
        <?php
    
    echo "<img src='".$product['image']."' alt=''/>"
?>
    </div>
    <div class="cart_product_info">
        <ul>
            <li><?php echo $product['name'] ?>
            </li>
            <li>
                <?php
                    // if limited stocks left
                    if ($product['quantity'] <15) {
                        echo "<p style='color:red'>Harry up ! only ".$product['quantity']." left</p>";
                    } else {
                        echo "In stock";
                    } ?>
            </li>

            <li>

                <?php
                    // if limited stocks left
                    if ($product['price'] < 500) {
                        echo "Free Delivery at 499 our above";
                    } else {
                        echo "Eligible for FREE Shipping";
                    } ?>

            </li>
            <li><img src="https://m.media-amazon.com/images/G/31/marketing/fba/fba-badge_18px._CB485936079_.png"
                    alt="" /></li>

        </ul>
        <div class="Product_Quantity">
            <ul>
                <!-- delete from card button  -->
                <li>
                    <a style="text-decoration:none;"
                        href="?id=<?php echo $product['id'] ?>">
                        Delete
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="cart_price">
        Rs <?php echo $product['price'] ?>
    </div>
</div>
<div class="hr_line2"></div>
<?php
        }
    }
