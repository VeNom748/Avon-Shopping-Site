<?php
        require("./includes/header.php");
        require("Functions.php");

        // Handling category status 
        if(isset($_GET['type']) && $_GET['type'] != ""){

                $type = get_safe_value($conn , $_GET['type']);
                if($type == 'status'){
                        $id = get_safe_value($conn , $_GET['id']);
                        $operation = get_safe_value($conn , $_GET['operation']);
                        if($operation == "active"){
                                $status = '1';
                        }else{
                                $status='0';
                        }
                        

                        $UPDATE_STATUS = "update categories set status='$status' where id='$id'";
                        mysqli_query($conn , $UPDATE_STATUS);
                        

                        // deleting category 
                        if($operation == 'delete'){
                                $DELETE_CAT = "delete from categories where id='$id'";
                                mysqli_query($conn , $DELETE_CAT);
                        }
                }
                
        }

        $err = "";

        // Add category 
        if(isset($_POST['submit'])){
                $name = get_safe_value($conn , $_POST['cat_name']);
                $img = get_safe_value($conn , $_POST['img_link']);
                $status = get_safe_value($conn , $_POST['status']);

                
                // Check Wethere the category are already exist or not
                $responce = mysqli_query($conn , "select * from categories where name = '$name'");
                $isCheck = mysqli_num_rows($responce);
                

                if($isCheck > 0){
                        $err = "<span style='color:red'> Category Already Exist </span >";
                }else{
                        $add_cat_sql = "insert into categories (`name`, `img`, `status`) VALUES ('$name' ,  '$img' , '$status' )";
                        mysqli_query($conn , $add_cat_sql);
                }


        }



        // fetching Categories data 
        $sql = "select * from categories order by status";
        $res = mysqli_query($conn , $sql);

?>
<div class="Home" id="Home">
        <div class="login_box" style="margin:0px auto;">
                <h1>Add Category</h1>
                <form action="admin_categories.php" method="post">
                        <span>Name</span>

                        <input type="text" name="cat_name" required />

                        <span>image Link</span>

                        <input type="text" name="img_link" required />

                        <span>status</span>

                        <input type="number" name="status" required />

                        <button type="submit" class="btn_signin" name="submit">
                                Add
                        </button>

                        <?php 
                                echo $err;
                        ?>
                </form>
        </div>
        <div class="category_box">
                <?php while($row = mysqli_fetch_assoc($res)){?>
                <div class="category_card">
                        <h2><?php 
                                echo $row['name'] ;
                        ?>
                        </h2>
                        <img src=<?php echo $row['img'] ?> alt=""
                        /><br />
                        <?php 
                                if($row['status'] == 1){
                         
                                        echo "<a href='?type=status&operation=deactive&id=".$row['id']."' > Deactive </a> ";
                                }else{
                                        echo "<a href='?type=status&operation=active&id=".$row['id']."'> Active </a>";
                                    
                                }
                                echo "<a style ='position:relative' href='?type=status&operation=delete&id=".$row['id']."'> Delete </a>&nbsp;";
                              
                        ?>


                </div>
                <?php }?>
        </div>
</div>
<?php
        require("./includes/footer.php")
?>