<?php
session_start();

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Find the first occurrence and remove it
    $index = array_search($product_id, $_SESSION['cart']);

    if ($index !== false) {
        unset($_SESSION['cart'][$index]);
        // Re-index the array
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}

// Redirect back to the cart page
header("Location: cart.php");
exit();
?>
