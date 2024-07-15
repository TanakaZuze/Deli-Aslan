<?php

  require_once 'assets/server/connection.php';
  $sql = "SELECT * FROM products";
  $get_products=$conn->query($sql);

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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shop</title>
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="shortcut icon" href="assets/img/mobile-icons/favicon.png" type="image/x-icon">

<body>
  
  <div id="burgerMenu">
    <a href="index.php">Home</a>
    <a href="shop.php">Shop</a>
    <a href="contact.html">Contact Us</a>
  </div>
  <!-- Navbar -->
  <div id="homePage">
    <div id="navbar">
      <a href="index.php">Home</a>
      <a href="shop.php">Shop</a>
      <a href="contact.html">Contact Us</a>
      <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
          <a href="admin/admin_login.php"><i class="fa-solid fa-user"></i></a>
    </div>
  </div>


  <div class="shopHeader">
    <h1>Shop</h1>
  </div>


  <div class="xlContainer">
    
    <div onclick="window.location.href='single_product.php';" id="shopGrid">
    <?php
      while($row=mysqli_fetch_assoc($get_products)){   
    ?>
      <div class="grid1">
        <img src="assets/img/products/<?php echo $row["product_image"]; ?>" alt="" />
        <h3><?php echo $row["product_name"]; ?></h3>
        <h4>R<?php echo $row["product_price"]; ?> </h4>
        <a href="<?php echo "single_product.php?product_id=".$row['product_id']; ?>" class="addCartbtn">Buy Now</a>
      </div>
       <?php

  }
?>

    </div>
  </div>
  <script src="js/script.js"></script>

  <script src="https://kit.fontawesome.com/9116042e6b.js" crossorigin="anonymous"></script>
</body>

</html>