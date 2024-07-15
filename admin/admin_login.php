<?php
require_once '../assets/server/connection.php';

// Check if form is submitte
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Hashing the password 
    $hashed_password = md5($password);  

    // checking if credentials exist in the database
    $sql = "SELECT * FROM admin WHERE admin_email='$email' AND admin_password='$hashed_password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        session_start();
        $_SESSION['admin_email'] = $email; 
        header("Location: admin_dashboard.php"); 
        exit();
    } else {
        echo "<script>alert('Invalid email or password');</script>";
    }
}

$conn->close();

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
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/admin_login.css">
</head>
<body>

    <div class="login-container">
        <form action="admin_login.php" method="POST" class="login-form">
            <h2>Login</h2>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>

      
    <script src="https://kit.fontawesome.com/9116042e6b.js" crossorigin="anonymous"></script>
</body>
</html>
