<?php
    require("./Functions.php");
    require("./connection.php");
    require("./includes/header.php");

    $sql = "select * from `order` WHERE 1";
    $res = mysqli_query($conn, $sql);

    // Deleting Message
    if (isset($_GET['id']) && $_GET['id'] != "") {
        $id = get_safe_value($conn, $_GET['id']);
        $sqlfordelete = "delete FROM `order` WHERE id='$id'";
        mysqli_query($conn, $sqlfordelete);

    }



?>
<div class="Home" id="Home">
    <div class="category_box">
        <?php while ($row = mysqli_fetch_assoc($res)) {?>
        <div class="order_card">
            <h4 class="fs-2"><?php
                            echo $row['id'];
                    ?>
            </h4>
            <h4 class="mt-2 fs-6">
                <p class="text-primary mb-0">User Id</p>
                <?php
                            echo $row['user_id'];
                        ?>
            </h4>
            <h4 class="mt-2 fs-6">
                <p class="text-primary mb-0">User Name</p>
                <?php
                            echo $row['user_name'];
                        ?>
            </h4>
            <h4 class="mt-2 fs-6">
                <p class="text-primary mb-0">Address</p>
                <?php
                            echo $row['address'];
                        ?>
            </h4>
            <h4 class=" fs-6">
                <p class="text-primary mb-0">Payment Type</p>
                <?php
                            echo $row['payment_type'];
                        ?>
            </h4>
            <h4 class=" fs-6">
                <p class="text-primary mb-0">Total Price</p>
                <?php
                            echo $row['total_price'];
                        ?>
            </h4>
            <h4 class=" fs-6">
                <p class="text-primary mb-0">Payment Status</p>
                <?php
                            echo $row['payment_status'];
                        ?>
            </h4>
            <h4 class=" fs-6">
                <p class="text-primary mb-0">Ordered Products</p>
                <?php
                            echo $row['product_names'];
                        ?>
            </h4>
            <h4 class=" fs-6">
                <p class="text-primary mb-0">Date</p>
                <?php
                            echo $row['added_on'];
                        ?>
            </h4>
            <?php
                echo "<a href='admin_orders.php?id=".$row['id']."'> Mark as Completed </a>&nbsp;"
            ?>

        </div>
        <?php }?>
    </div>


</div>