<?php
    require_once 'assets/server/connection.php';

    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];

        $sql = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
        
        $sql->bind_param("i", $product_id);

        $sql->execute();

        $result = $sql->get_result();

        if ($result->num_rows > 0) {
            $single_product = $result->fetch_assoc();
        } else {
            header('Location: index.php');
            exit();
        }
    } else {
        header('Location: index.php');
        exit();
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
    <title>Product Details</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/mobile-icons/favicon.png" type="image/x-icon">
</head>
<body>
<div id="burgerMenu">
        <a href="index.php">Home</a>
        <a href="shop.php">Shop</a>
        <a href="#aboutSection">About Us</a>
        <a href="contact.html">Contact Us</a>
        <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
        <a href="login.html"><i class="fa-solid fa-user"></i></a>
    </div>
    <!-- Navbar and hero section -->
    <div id="homePage">
        <div id="navbar">
            <a href="index.php">Home</a>
            <a href="shop.php">Shop</a>
            <a href="#aboutSection">About Us</a>
            <a href="contact.html">Contact Us</a>
            <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
            <a href="login.html"><i class="fa-solid fa-user"></i></a>

        </div>
    </div>


    <div class="container">
   
        <!-- Single product section -->
        <section id="single-products">
            
            <div class="product-img">
                <img src="assets/img/products/<?php echo $single_product["product_image"]; ?>" alt="">
            </div>
            <form action="cart.php" method="POST">

            <input type="hidden" name="product_id" value="<?php echo $single_product["product_id"]; ?>" >

                <input type="hidden" name="product_image" value="<?php echo $single_product["product_image"]; ?>" >

                <input type="hidden" name="product_name" value="<?php echo $single_product["product_name"]; ?>" >

                <input type="hidden" name="product_price" value="<?php echo $single_product["product_price"]; ?>" >
  

            <div class="product-description">
                <h1><?php echo $single_product["product_name"]; ?></h1>
                <h3 class="description-header">Product description</h3>
                <p><?php echo $single_product["product_description"]; ?></p>
                <h3>R<?php echo $single_product["product_price"] ?></h3>
                <button type="submit" name="add_to_cart">Add to cart</button>
            </div>

            </form>
        </section>
    </div>
    <script src="https://kit.fontawesome.com/9116042e6b.js" crossorigin="anonymous"></script>
</body>
</html>
