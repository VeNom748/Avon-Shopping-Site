<?php
  session_start();
  require("connection.php");
  require("Functions.php");
  $err_msg = "";
  if (isset($_POST['submit'])) {
      $username = get_safe_value($conn, $_POST['username']);
      $password = get_safe_value($conn, $_POST['password']);
      $sql = "select * from admin_users where username = '$username' and password = '$password' ";
      $res = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($res);
    
      if ($count > 0) {
          $_SESSION['ADMIN_LOGGED'] = "YES";
          $_SESSION['ADMIN_USERNAME'] = $username;

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
  <title>Amazon</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
    integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="./css/header.css">
  <link rel="stylesheet" href="./css/Footer.css">
  <link rel="stylesheet" href="./css/login.css">
  <link rel="stylesheet" href="./css/main.css">

</head>

<body>
  <div class="login_page">
    <div class="logo_box">
      <img src="./images/amazonLogo2.png" alt="" />
      <p>Admin</p>
    </div>
    <div class="login_box">
      <h1>Sign-In</h1>
      <form action="login.php" method="post">
        <span>Username</span>

        <input type="text" name="username" required />

        <span>password</span>

        <input type="password" name="password" required />

        <button type="submit" class="btn_signin" name="submit">
          Continue
        </button>
      </form>
      <?php
            echo $err_msg;
          ?>
      <small>
        By continuing, you agree to Avon's
        <a href="/login">Conditions of Use</a> and
        <a href="/login">Privacy Notice.</a>
      </small>
    </div>

    <div class="login_box_2">
      <div class="login_box_2_text">
        <h5>Go to Home Page</h5>
      </div>
      <a href="/avon">
        <button class="btn_create_acc" type="submit">
          Go to Home
        </button>
      </a>
    </div>

    <div class="login_box-3">
      <div class="login_box_3_row">
        <p>Conditions of Use</p>
        <p>Privacy Notice</p>
        <p>help</p>
      </div>
      <small>&copy; 1996-2021, AVon.com Inc. or it's Affiliates</small>
    </div>
  </div>
</body>