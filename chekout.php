<?php
session_start();
include("includes/db.php");
include("includes/header.php");

// Check if the cart exists and is not empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<script>alert('Your cart is empty!'); window.location='cart.php';</script>";
    exit;
}

// Process checkout
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Save order to database here if needed
    $_SESSION['cart'] = []; // Clear the cart
    echo "<script>alert('Order Placed Successfully!'); window.location='index.php';</script>";
    exit;
}
?>
<div class="container mt-5">
    <h2>Checkout</h2>
    <form method="POST">
        <button type="submit" class="btn btn-success">Place Order</button>
    </form>
</div>
