<?php
session_start();
include("includes/db.php");
include("includes/header.php");

// Initialize cart if it does not exist
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add product to cart
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    // Fetch product from database
    $query = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($conn, $query);

    // Check if product exists
    if ($row = mysqli_fetch_assoc($result)) {
        // Check if product already in cart
        if (!isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] = $row;
        }
    }
}

// Remove from cart
if (isset($_GET['remove'])) {
    $remove_id = intval($_GET['remove']);
    unset($_SESSION['cart'][$remove_id]);
}
?>

<div class="container mt-5">
    <h2>Shopping Cart</h2>

    <?php if (empty($_SESSION['cart'])): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total = 0;

                // Loop through cart items
                foreach ($_SESSION['cart'] as $item) {
                    if (is_array($item)) {
                        $total += $item['price'];
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td>$<?php echo number_format($item['price'], 2); ?></td>
                    <td>
                        <a href="cart.php?remove=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm">Remove</a>
                    </td>
                </tr>
                <?php 
                    }
                }
                ?>
                <tr>
                    <td colspan="2"><strong>Total</strong></td>
                    <td><strong>$<?php echo number_format($total, 2); ?></strong></td>
                </tr>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php include("includes/footer.php"); ?>
