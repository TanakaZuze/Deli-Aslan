<?php
session_start();
if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['cart'])) {
        $product_array_ids = array_column($_SESSION['cart'], "product_id");
        if (!in_array($_POST['product_id'], $product_array_ids)) {
            $product_array = array(
                'product_id' => $_POST['product_id'],
                'product_name' => $_POST['product_name'],
                'product_price' => $_POST['product_price'],
                'product_image' => $_POST['product_image']
            );

            $_SESSION['cart'][$_POST['product_id']] = $product_array;
        } else {
            echo '<script>alert("Product already in cart")</script>';
        }
    } else {
        $product_array = array(
            'product_id' => $_POST['product_id'],
            'product_name' => $_POST['product_name'],
            'product_price' => $_POST['product_price'],
            'product_image' => $_POST['product_image']
        );

        $_SESSION['cart'][$_POST['product_id']] = $product_array;
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
    <title>Cart</title>
    <link rel="stylesheet" href="assets/css/cart.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/mobile-icons/favicon.png" type="image/x-icon">
</head>

<body>
    <!-- headee -->
    <div id="burgerMenu">
        <a href="index.php">Home</a>
        <a href="shop.php">Shop</a>
        <a href="#aboutSection">About Us</a>
        <a href="contact.html">Contact Us</a>
        <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
        <a href="login.php"><i class="fa-solid fa-user"></i></a>
    </div>
    <!-- Navbar and hero section -->
    <div id="homePage">
        <div id="navbar">
            <a href="index.php">Home</a>
            <a href="shop.php">Shop</a>
            <a href="#aboutSection">About Us</a>
            <a href="contact.html">Contact Us</a>
            <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
            <a href="login.php"><i class="fa-solid fa-user"></i></a>
        </div>
    </div>

    <!-- Shopping cart -->
    <div class="container">
        <h1>Shopping Cart</h1>
        <div id="cart">
            <div class="shop">
                <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                <div class="box-1">
                    <div class="img">
                        <img src="assets/img/products/<?php echo $value['product_image']; ?>" alt="" srcset="">
                    </div>
                    <div class="content">
                        <h3><?php echo $value['product_name']; ?></h3>
                        <h4>Price: R<?php echo $value['product_price']; ?></h4>
                        <p class="unit">Quantity: <input value="1"></p>
                        <div class="btn-area"><i class="fa-solid fa-trash"></i><span>Remove</span></div>
                        
                    </div>
                </div>
                <?php } ?>
            </div>

            <div id="total-section">
                <p><span>Subtotal</span><span>R120</span></p>
                <hr>
                <p><span>Tax (5%)</span><span>R230</span></p>
                <hr>
                <p><span>Shipping</span><span>R150</span></p>
                <hr>
                <p><span>Total</span><span>%15</span></p>
                <a href="payment-gateway.html"><i class="fa-solid fa-cart-shopping"></i>Check Out</a>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/9116042e6b.js" crossorigin="anonymous"></script>
</body>

</html>
