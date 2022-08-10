<?php
        require("./includes/header.php");
        require("Functions.php");


        // Adding Product into the Database
        $err = "";
        if(isset($_POST['submit']) || isset($_POST['update'])){
                $name = get_safe_value($conn , $_POST['product_name']);
                $img_link = get_safe_value($conn , $_POST['img_link']);
                $mrp = get_safe_value($conn , $_POST['mrp']);
                $sell_price = get_safe_value($conn , $_POST['sell_price']);
                $descreption = get_safe_value($conn , $_POST['descreption']);
                $short_desc = get_safe_value($conn , $_POST['short_desc']);
                $ratings = get_safe_value($conn , $_POST['ratings']);
                $category_name = get_safe_value($conn , $_POST['category_name']);
                $qty = get_safe_value($conn , $_POST['qty']);
                $status = get_safe_value($conn , $_POST['status']);

                $fetch_product = "select * from products where product_name = '$name'";
                $responce = mysqli_query($conn , $fetch_product);
                $count = mysqli_num_rows($responce);

                if($count > 0){
                        if(isset($_POST['update'])){
                                $update_product = "UPDATE `products` SET `mrp`='$mrp',`selling_price`='$sell_price',`descreption`='$descreption',`short_desc`='$short_desc',`ratings`='$ratings',`image`='$img_link',`category_name`='$category_name',`qty`='$qty',`status`='$status',`meta_title`='',`meta_desc`='',`meta_keywords`='' WHERE `product_name`='$name'";

                                mysqli_query($conn , $update_product);
                        }else{
                                $err = "Product Already exist";

                        }
                }else{
                        $add_product_sql = "INSERT INTO `products`(`product_name`, `mrp`, `selling_price`, `descreption`, `short_desc`, `ratings`, `image`, `category_name`, `qty`, `status`, `meta_title`, `meta_desc`, `meta_keywords`) VALUES ('$name' , '$mrp' , '$sell_price' , '$descreption' , '$short_desc'  , '$ratings', '$img_link' , '$category_name' , '$qty' , '$status' , '' , '' , '')";
        
                        mysqli_query($conn , $add_product_sql);
                        
                        header("location:admin_products.php");
                    

                }


        }


        // Sorting Products 
        $fetch_product_sql = "select products.*,categories.name from products,categories where products.category_name = categories.name order by products.id desc";
        // $fetch_product_sql = "select * from products order by id desc";
        if(isset($_POST['sort_cat'])){
                $category = get_safe_value($conn , $_POST['cat_name']);
                $sqlfor_sort = "select * from products where category_name = '$category'";
                $res = mysqli_query($conn , $sqlfor_sort);
                if($category == "View All"){
                        $res = mysqli_query($conn ,  $fetch_product_sql);
                }
  
        }else{
                // fetching Categories data 
                $res = mysqli_query($conn , $fetch_product_sql);

        }


        // Handaling Status or delete 
        if(isset($_GET['type']) && $_GET["type"] != ""){
                $type = get_safe_value($conn , $_GET['type']);
                $id = get_safe_value($conn , $_GET['id']);
                $operation = get_safe_value($conn , $_GET['operation']);
                $status = "";

                if($type == "status"){
                        if($operation == "active"){
                                $status = "1";
                        }elseif($operation == "delete"){
                                mysqli_query($conn , "delete from products where id = '$id'");
                        }else{
                                $status = "0";
                        }

                        $update_status = "update products SET status='$status' where id='$id'";
                        mysqli_query($conn , $update_status);
                }
        }





?>



<div class="Home" id="Home">
        <div class="login_box" style="margin:0px auto;">
                <h1>Add Product</h1>
                <form action="admin_products.php" method="post">
                        <span>Name</span>

                        <input type="text" name="product_name" required />

                        <span>image Link</span>

                        <input type="text" name="img_link" required />

                        <span>MRP</span>

                        <input type="number" name="mrp" required />

                        <span>selling Price</span>

                        <input type="number" name="sell_price" required />

                        <span>Descreption</span>

                        <input type="text" name="descreption" required />

                        <span>Short Descreption</span>

                        <input type="text" name="short_desc" required />

                        <span>Ratings </span>

                        <input type="number" name="ratings" required />

                        <span>Select Category</span><br>

                        <select name="category_name" class="cat_dropdown">
                                <?php 
                                        $cat = mysqli_query($conn , "select id,name from categories order by name desc");
                                        while ($row = mysqli_fetch_assoc($cat)){
                                               echo "<option>".$row['name']."</option>";
                                        }
                                ?>
                        </select><br>

                        <span>Qty</span>

                        <input type="number" name="qty" required />

                        <span>Status</span>

                        <input type="number" name="status" required />

                        <button type="submit" class="btn_signin" name="submit">
                                Add
                        </button>
                        <button type="submit" class="btn_signin" name="update">
                                Update
                        </button>
                        <p style="color:red">
                                <?php 
                                        echo $err;
                                ?>
                        </p>
                </form>
        </div>
        <form action="admin_products.php" method="post">
                <div class="sort_btn_box">
                        Sort By Category
                        <select name="cat_name" class="sort_btn">
                                <option>View All</option>
                                <?php 
                        $cat = mysqli_query($conn , "select id,name from categories order by name asc");
                                while ($row = mysqli_fetch_assoc($cat)){
                                        echo "<option>".$row['name']."</option>";
                                }                              
                        ?>
                        </select>
                        <button type = 'submit' name = "sort_cat" class="btn-primary sort_btn_btn">
                                Search
                        </button>

                </div>
        </form>
        <div class="product_box">
                <?php while($row = mysqli_fetch_assoc($res)){?>
                <div class="product_card">
                        <h2><?php 
                                echo $row['category_name'];
                        ?>
                        </h2>
                        <h2><?php 
                                echo $row['product_name'] ;
                        ?>
                        </h2>
                        <div class="product_img_box">
                                <img src=<?php echo $row['image'] ?>
                                alt=""
                                />

                        </div>
                        <br />
                        <h2>
                                MRP:
                                <?php 
                                        echo $row['mrp'] ;
                                ?>
                        </h2>
                        <h2>
                                Selling Price:
                                <?php 
                                        echo $row['selling_price'] ;
                                ?>
                        </h2>
                        <h2>
                                Descreption:
                                <?php 
                                        echo $row['descreption'] ;
                                ?>
                        </h2>
                        <h2>
                                Short Descreption:
                                <?php 
                                        echo $row['short_desc'] ;
                                ?>
                        </h2>
                        <h2>
                                Rating:
                                <?php 
                                        echo $row['ratings'] ;
                                ?>
                        </h2>
                        <h2>
                                Quantity:
                                <?php 
                                        echo $row['qty'] ;
                                ?>
                        </h2>
                        <h2>
                                Status:

                                <?php 
                                        if($row['status']==1){
                                                echo "<a href='?type=status&operation=deactivate&id=".$row['id']."'>Deactive</a>" ;
                                        }else{
                                                echo "<a href='?type=status&operation=active&id=".$row['id']."'>Active</a>";
                                        }
                                        echo "<a href='?type=status&operation=delete&id=".$row['id']."'> Delete </a>";
                                ?>
                        </h2>



                </div>
                <?php }?>
        </div>
</div>
<?php
        require("./includes/footer.php")
?>