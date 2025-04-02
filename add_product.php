<?php
include("../includes/db.php");
session_start();

// Check if admin is logged in (Optional: implement admin authentication)
if (!isset($_SESSION['user']) || $_SESSION['user'] != 'admin') {
    echo "<script>alert('Access Denied! Admins only.'); window.location='../login.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    // Move uploaded image to images folder
    move_uploaded_file($image_tmp, "../assets/images/$image");

    $query = "INSERT INTO products (name, description, price, image) 
              VALUES ('$name', '$description', '$price', '$image')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Product added successfully!'); window.location='add_product.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add New Product</title>
</head>
<body>
<div class="container mt-5">
    <h2>Add New Product</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label>Price ($)</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Product Image</label>
            <input type="file" name="image" class="form-control-file" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
</body>
</html>
