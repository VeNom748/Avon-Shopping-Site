<?php
    require("./Functions.php");
    require("./connection.php");
    require("./includes/header.php");

    $sql = "select * from contact_us order by id desc";
    $res = mysqli_query($conn, $sql);

    // Deleting Message 
    if(isset($_GET['type']) && $_GET['type'] != ""){
        $type = get_safe_value($conn , $_GET['type']);
        
        if($type == "msg" && $type != ""){
            $operation = get_safe_value($conn , $_GET["operation"]);
            $id = get_safe_value($conn , $_GET["id"]);
            if($operation == "delete" && $operation != ""){
                $sql = "delete from contact_us where id = '$id'";
                mysqli_query($conn , $sql);
                header("location:admin_contact.php");
            }
            
        }
        
    }



?>
<div class="Home" id="Home">
    <div class="category_box">
        <?php while ($row = mysqli_fetch_assoc($res)) {?>
        <div class="category_card">
            <h4 class="fs-2" ><?php
                            echo $row['name'];
                    ?>
            </h4>
            <h4 class="mt-2 fs-6">
                <p class="text-primary mb-0">Email</p>
                <?php
                            echo $row['email'];
                        ?>
            </h4>
            <h4 class=" fs-6">
                <p class="text-primary mb-0">Mobile No</p>
                <?php
                            echo $row['mno'];
                            ?>
            </h4>
            <h4 class=" fs-6">
                <p class="text-primary mb-0">Message</p>
                <?php
                            echo $row['comment'];
                            ?>
            </h4>
            <h4 class=" fs-6">
                <p class="text-primary mb-0">Date</p>
                <?php
                            echo $row['date'];
                        ?>
            </h4>
            <?php 
                echo "<a href='?type=msg&operation=delete&id=".$row['id']."'> Delete </a>&nbsp;"
            ?>

        </div>
        <?php }?>
    </div>


</div>