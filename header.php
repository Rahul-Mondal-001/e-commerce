<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My E-Commerce</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
    <img src="assets\images\main-logo.png" alt="Shop.Ease Logo" className="logo-image" /> 
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
            <?php if (isset($_SESSION['username'])): ?>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            <?php endif; ?>  
        </ul>
    </div>
</nav>
