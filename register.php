<?php
  session_start();
  require("connection.php");
  require("Functions.php");
  $err_msg = "";
  if (isset($_POST['email'])) {
      $first_name = get_safe_value($conn, $_POST['first_name']);
      $last_name = get_safe_value($conn, $_POST['last_name']);
      $email = get_safe_value($conn, $_POST['email']);
      $phone_no = get_safe_value($conn, $_POST['phone_no']);
      $password = get_safe_value($conn, $_POST['password']);
      $cpassword = get_safe_value($conn, $_POST['cpassword']);

      //   checking user already register or not
      $checking_user_query = "select * from users where email = '$email'";
      $responce = mysqli_query($conn, $checking_user_query);
      $isUserRegister = mysqli_num_rows($responce);

      
      if ($isUserRegister > 0) {
          $err_msg = "<span style='color:red' >User already registered</span><br>";
      } elseif ($password != $cpassword) {
          $err_msg = "<span style='color:red' > Password our Confirm password should be same </span><br>";
      } else {
          $insertUserQuery = "insert into users (`first_name`, `last_name`, `phone_no`, `email`, `password`, `c_password`) VALUES ('$first_name','$last_name','$phone_no','$email','$password','$cpassword')";
          mysqli_query($conn, $insertUserQuery);
          header('location:login.php');
      }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Register</title>
    <Link rel="stylesheet" href="./css/main.css">
    <Link rel="stylesheet" href="./css/login.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="login_page">
        <div class="logo_box">
            <img src="./images/amazonLogo2.png" alt="" class="Logo" />
        </div>
        <div class="login_box">
            <h1>Sign-In</h1>
            <form action="register.php" method="POST">
                <span>First Name</span>

                <input type="text" name="first_name" required />
                <span>Last Name</span>

                <input type="text" name="last_name" required />
                <span>Email</span>

                <input type="email" name="email" required />
                <span>Phone No</span>

                <input type="number" name="phone_no" required />

                <span>password</span>

                <input type="password" name="password" required />

                <span>Confirm Password</span>

                <input type="password" name="cpassword" required />

                <button type="submit" class="btn_signin">
                    Continue
                </button>
            </form>
            <?php
            echo $err_msg;
          ?>

            <small>
                By continuing, you agree to Amazon's
                <a href="/login">Conditions of Use</a> and
                <a href="/login">Privacy Notice.</a>
            </small>
        </div>

        <div class="login_box_2">
            <div class="login_box_2_text">
                <h5>New to Amazon</h5>
            </div>
            <a href="login.php">
                <button class="btn_create_acc" type="submit">
                    Already have an account
                </button>
            </a>
        </div>

        <div class="login_box-3">
            <div class="login_box_3_row">
                <p>Conditions of Use</p>
                <p>Privacy Notice</p>
                <p>help</p>
            </div>
            <small>&copy; 1996-2021, AmazonClone.com Inc. or it's Affiliates</small>
        </div>
    </div>

</body>

</html>