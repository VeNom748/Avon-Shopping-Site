<?php
  session_start();
  require("connection.php");
  require("Functions.php");

  if (isset($_SESSION['USER_NAME'])) {
      $userName = $_SESSION['USER_NAME'];
  } else {
      header("location:login.php");
  }
  $toste = "false";

  if (isset($_POST['address']) && $_POST['address'] != "") {
      $toste = "true";
      // getting values from page
      $address = get_safe_value($conn, $_POST['address']);
      $city = get_safe_value($conn, $_POST['city']);
      $pincode = get_safe_value($conn, $_POST['pincode']);

      $phone_no = get_safe_value($conn, $_POST['phone_no']);
      

      // generating address in one line
      $Address = "$address , City :- $city , pincode :- $pincode , phone_number :- $phone_no";
      
      // fetching user
      $sql = "UPDATE `users` SET `Address`='$Address' WHERE first_name = '$userName'";
      $res = mysqli_query($conn, $sql);
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
    <link rel="stylesheet" href="toste.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Add your address</title>
</head>

<body>
    <?php
        require("./components/header.php")

        
    ?>

    <div class="Home">
        <div class="w_80">
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
                                    <form method="POST">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <textarea class="form-control" name="address"
                                                            placeholder="Your address" required autofocus cols="5"
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
                                                        <input type="text" class="form-control" name="city"
                                                            placeholder="Your city" required autofocus />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="pincode">Pincode</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" name="pincode"
                                                            placeholder="Your Pincode" required autofocus />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="phone_no">Phone No</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" name="phone_no"
                                                            placeholder="Your Number" required autofocus />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <button class="btn_proceed" type="submit">

                                                    Add Address

                                                </button>
                                            </div>
                                        </div>
                                    </form>



                                </div>
                            </div>
                            <!-- CREDIT CARD FORM ENDS HERE -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="Footer">
            <?php require("./components/Footer.php") ?>
        </div>
    </div>
    <!-- payment box end  -->
    <script src="toste.js"></script>
    <script>
        <?php
            if ($toste == "true") {
                echo "
                new Toast({
                    message: 'Address Saved Successfully',
                    type: 'success'
                });
                ";
            }
            $toste = "false";
        ?>
    </script>
</body>

</html>