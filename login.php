<?php
session_start();
include('assets/server/connection.php'); 

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // sanitizing sql
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['username'] = $row['username']; 
            
            header("Location: dashboard.php");
            exit();
        } else {
            header("Location: login.php?error=Incorrect password");
            exit();
        }
    } else {
        header("Location: login.php?error=User not found");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-HR1QQDNSZM"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-HR1QQDNSZM');
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="shortcut icon" href="assets/img/mobile-icons/favicon.png" type="image/x-icon">
</head>
<body>

<div id="navbar">
          <a href="index.php">Home</a>
          <a href="shop.php">Shop</a>
          <a href="#aboutSection">About Us</a>
          <a href="contact.html">Contact Us</a>
          <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
          <a href="admin/admin_login.php"><i class="fa-solid fa-user"></i></a>
        </div>

    <section class="login-box">
        <h1>Log In</h1>
        <form action="login.php" method="POST" id="log-in-form">
            <p style="color:red"><?php if (isset($_GET['error'])) { echo $_GET['error']; } ?></p>
            <div class="input-box">
                <input type="text" placeholder="Email" autocomplete="off" required name="email" id="log-in-email">
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" autocomplete="off" required name="password" id="login-password"> 
            </div>
            <div class="forgot">
                <section>
                    <input type="checkbox" id="check">
                    <label for="check">Remember me</label>
                </section>
                <section>
                    <a href="#">Forgot password</a>
                </section>
            </div>
            <div class="input-submit">
                <button class="submit-btn" id="submit-btn" name="login">Sign In</button>
            </div>
            <div class="sign-up-link">
                <a href="register.php">Don't have an account? Sign Up</a>
            </div>
        </form>
    </section>   
    
    <script src="https://kit.fontawesome.com/9116042e6b.js" crossorigin="anonymous"></script>
</body>
</html>
