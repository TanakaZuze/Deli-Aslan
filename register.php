<?php
session_start();
include('assets/server/connection.php');

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password-confirm'];

    if ($password !== $password_confirm) {
        header('Location: register.php?error=Passwords don\'t match');
        exit();
    }

    if (strlen($password) < 6) {
        header('Location: register.php?error=Password must be at least 6 characters');
        exit();
    }

    $stmt1 = $conn->prepare("SELECT COUNT(*) FROM users WHERE email_address = ?");
    $stmt1->bind_param("s", $email);
    $stmt1->execute();
    $stmt1->bind_result($num_rows);
    $stmt1->fetch();
    $stmt1->close();

    if ($num_rows > 0) {
        header('Location: register.php?error=User with this email already exists');
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (user_name, password, email_address) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $hashed_password, $email);

    if ($stmt->execute()) {
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $name;
        $_SESSION['logged_in'] = true;
        header("Location: shop.php?message=You registered successfully");
        exit();
    } else {
        header('Location: register.php?error=Could not create account');
        exit();
    }

    $stmt->close();
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="assets/css/register.css">
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

    <section class="register-box">
        <h1>Sign Up</h1>
        <form action="register.php" method="POST" id="register-form">
            <p style="color:red"><?php if (isset($_GET['error'])) echo $_GET['error']; ?></p>
            <div class="input-box">
                <input type="text" placeholder="Name" autocomplete="off" required id="register-name" name="name">
            </div>
            <div class="input-box">
                <input type="email" placeholder="Email" autocomplete="off" required id="register-email" name="email">
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" autocomplete="off" required id="register-password" name="password">
            </div>
            <div class="input-box">
                <input type="password" placeholder="Confirm Password" autocomplete="off" required id="register-password-confirm" name="password-confirm">
            </div>
            <div class="input-submit">
                <button class="submit-btn" id="register-btn" name="register">Sign Up</button>
            </div>
            <div class="login-link">
                <a href="login.php">Already have an account? Log In</a>
            </div>
        </form>
    </section>


  <script src="https://kit.fontawesome.com/9116042e6b.js" crossorigin="anonymous"></script>

</body>
</html>
