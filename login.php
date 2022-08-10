<?php
  session_start();
  require("connection.php");
  require("Functions.php");


  $err_msg = "";
  if (isset($_POST['email'])) {
      // getting values from page 
      $email = get_safe_value($conn, $_POST['email']);
      $password = get_safe_value($conn, $_POST['password']);
      // fetching user 
      $sql = "select * from users where email = '$email' and password = '$password' ";
      $res = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($res);
      $userData = mysqli_fetch_assoc($res);
    // if user 
      if ($count > 0) {
        // setting user information into the session 
          $_SESSION['USER_LOGGED'] = "YES";
          $_SESSION['USER_NAME'] = $userData['first_name'];
          $_SESSION['USER_ID'] = $userData['id'];
          $_SESSION['USER_EMAIL'] = $userData['email'];

          // redirect to home after login 
          header('location:index.php');
      } else {
          $err_msg = "<span style='color:red' >invalid details</span><br>";
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Login</title>
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
      <form action="login.php" method="POST">
        <span>Email</span>
        <input type="email" name="email" required />
        <span>password</span>
        <input type="password" name="password" required />
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
      <a href="register.php">
        <button class="btn_create_acc" type="submit">
          Create your Amazon account
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