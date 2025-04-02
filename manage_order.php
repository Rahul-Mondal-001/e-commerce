<?php
include("../includes/db.php");
session_start();

// Ensure only admin can access
if (!isset($_SESSION['user']) || $_SESSION['user'] != 'admin') {
    echo "<script>alert('Access Denied! Admins only.'); window.location='../login.php';</script>";
    exit();
}

// Fetch all orders from the database
$query = "SELECT * FROM orders ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Manage Orders</title>
</head>
<body>
<div class="container mt-5">
    <h2>Manage Orders</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Total ($)</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($order = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $order['id']; ?></td>
                    <td><?php echo $order['user_id']; ?></td>
                    <td>$<?php echo $order['total']; ?></td>
                    <td><?php echo $order['created_at']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
