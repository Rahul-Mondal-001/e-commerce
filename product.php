<?php
include("includes/db.php");
include("includes/header.php");

$id = $_GET['id'];
$query = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $query);
$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .product-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }
        .product-image {
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        .product-details {
            padding-left: 20px;
        }
        .btn-custom {
            background-color: #0d6efd;
            color: #ffffff;
            border-radius: 5px;
        }
        footer {
            background-color: #343a40;
            padding: 20px;
            color: #ffffff;
        }
        .social-icons img {
            width: auto;
            margin: 0 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5 product-container">
    <div class="row">
        <div class="col-md-6">
            <img src="assets/images/<?php echo $product['image']; ?>" class="img-fluid product-image">
        </div>
        <div class="col-md-6 product-details">
            <h2 class="mb-3"><?php echo $product['name']; ?></h2>
            <p class="text-muted"><?php echo $product['description']; ?></p>
            <h4 class="text-primary mb-4">$<?php echo $product['price']; ?></h4>
            <form method="POST" action="cart.php">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <a href="cart.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">Add to Cart</a>
            </form>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>
