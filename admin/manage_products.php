<?php
    require_once '../assets/server/connection.php';

    function sanitize($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['add_product'])) {
            $product_name = sanitize($_POST['product_name']);
            $product_price = sanitize($_POST['product_price']);
            $product_image = $_FILES['product_image']['name'];
            
            $target_dir = "assets/img/products/";
            $target_file = $target_dir . basename($product_image);
            move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);

            $sql = "INSERT INTO products (product_name, product_price, product_image) VALUES ('$product_name', '$product_price', '$product_image')";
            if ($conn->query($sql) === TRUE) {
                echo "Product added successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Update Product
        if (isset($_POST['update_product'])) {
            $product_id = $_POST['product_id'];
            $product_name = sanitize($_POST['product_name']);
            $product_price = sanitize($_POST['product_price']);
            
            // Update database
            $sql = "UPDATE products SET product_name='$product_name', product_price='$product_price' WHERE product_id=$product_id";
            if ($conn->query($sql) === TRUE) {
                echo "Product updated successfully!";
            } else {
                echo "Error updating product: " . $conn->error;
            }
        }

        // Delete Product
        if (isset($_POST['delete_product'])) {
            $product_id = $_POST['product_id'];
            
            $sql = "DELETE FROM products WHERE product_id=$product_id";
            if ($conn->query($sql) === TRUE) {
                echo "Product deleted successfully!";
            } else {
                echo "Error deleting product: " . $conn->error;
            }
        }
    }

    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
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
    <title>Manage Products - Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>Admin Dashboard</h2>
        </div>
        <ul class="nav">
            <li><a href="#"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Users</a></li>
            <li><a href="manage_products.php"><i class="fas fa-boxes"></i> Products</a></li>
            <li><a href="#"><i class="fas fa-file-alt"></i> Orders</a></li>
            <li><a href="#"><i class="fas fa-cogs"></i> Settings</a></li>
            <li><a href="login.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <header>
            <h2>
                Manage Products
                <label for="nav-toggle">
                    <span class="fas fa-bars"></span>
                </label>
            </h2>
            <div class="user-wrapper">
                <img src="https://via.placeholder.com/40" alt="Admin" width="40px" height="40px">
                <div>
                    <h4>Admin Name</h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>
        <main>
            <div class="manage-products">
                <h2>Add New Product</h2>
                <form action="manage_products.php" method="post" enctype="multipart/form-data">
                    <label for="product_name">Product Name:</label>
                    <input type="text" id="product_name" name="product_name" required><br><br>
                    <label for="product_price">Product Price:</label>
                    <input type="text" id="product_price" name="product_price" required><br><br>
                    <label for="product_image">Product Image:</label>
                    <input type="file" id="product_image" name="product_image" required><br><br>
                    <input type="submit" name="add_product" value="Add Product">
                </form>
            </div>
            <div class="manage-products">
                <h2>Update Product</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <form action="manage_products.php" method="post">
                                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                <td><?php echo $row['product_id']; ?></td>
                                <td><input type="text" name="product_name" value="<?php echo $row['product_name']; ?>"></td>
                                <td><input type="text" name="product_price" value="<?php echo $row['product_price']; ?>"></td>
                                <td>
                                    <input type="submit" name="update_product" value="Update">
                                    <input type="submit" name="delete_product" value="Delete">
                                </td>
                            </form>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
