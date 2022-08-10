    <?php
 foreach ($catRes as $category) {
     $sqlforprod = "select * from `products` where category_name = '".$category['name']."'";
     
     $resforsql = mysqli_query($conn, $sqlforprod); ?>
    <div class="Products_row">


        <h1><?php echo $category['name'] ?>
        </h1>

        <div class="leftArr arrow " id=<?php echo $category['leftbtn'] ?>
            onclick=slidesLeft("<?php echo $category['leftbtn'] ?>")>
            <i class="fas fa-chevron-left"></i>
        </div>
        <div class="rightArr arrow " id=<?php echo $category['rightbtn'] ?>
            onclick=slidesRight("<?php echo $category['rightbtn'] ?>")>
            <i class="fas fa-chevron-right"></i>
        </div>
        <div class="Products_box Products_row_home"
            id="<?php echo $category['row_id'] ?>">
            <?php
                            while ($rowforres = mysqli_fetch_assoc($resforsql)) {
                                ?>
            <form action="index.php" method="post">
                <div class="product_card">
                <?php echo '<a href="single_product.php?id='.$rowforres["id"].'" style="text-decoration:none;color:#0F1111">'; ?>
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
                        <p> Rs <?php echo $rowforres['selling_price'] ?>
                        </p>

                        <small  >Rs <?php echo $rowforres['mrp'] ?></small>
                    </div>

                    <div class="ratings">
                        <?php
                    require("ratings.php"); ?>

                    </div>
                    </a>
                    <button class="btn" type="submit">Add to Cart</button>
                </div>
            </form>
            <?php
                            } ?>
        </div>
    </div>
    <?php
 }
