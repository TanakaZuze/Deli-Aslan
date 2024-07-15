<?php
session_start();

if (!isset($_SESSION['admin_email'])) {
    header("Location: login.php");
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
    <title>Admin Dashboard</title>
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
                Dashboard
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
            <div class="cards">
                <div class="card">
                    <div class="card-content">
                        <div class="number">50</div>
                        <div class="card-name">Users</div>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number">150</div>
                        <div class="card-name">Products</div>
                    </div>
                    <div class="icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number">200</div>
                        <div class="card-name">Orders</div>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number">R5000</div>
                        <div class="card-name">Revenue</div>
                    </div>
                    <div class="icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
            </div>
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Recent Projects</h3>
                        </div>
                        <div class="card-body">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Project Name</th>
                                        <th>Status</th>
                                        <th>Due Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>UI/UX Design</td>
                                        <td><span class="status purple"></span> review</td>
                                        <td>23/10/2021</td>
                                    </tr>
                                    <tr>
                                        <td>Web Development</td>
                                        <td><span class="status pink"></span> in progress</td>
                                        <td>15/11/2021</td>
                                    </tr>
                                    <tr>
                                        <td>App Development</td>
                                        <td><span class="status orange"></span> pending</td>
                                        <td>10/12/2021</td>
                                    </tr>
                                    <tr>
                                        <td>SEO Project</td>
                                        <td><span class="status green"></span> completed</td>
                                        <td>01/11/2021</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h3>New Customers</h3>
                        </div>
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
