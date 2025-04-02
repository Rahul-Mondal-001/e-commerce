<?php
include("includes/db.php");
include("includes/header.php");
?>

<div class="container mt-5">
    <div class="row">
        <?php
        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="assets/images/<?php echo $row['image']; ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <p class="card-text">$<?php echo number_format($row['price'], 2); ?></p>
                        <a href="product.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View Product</a>
                        
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include("includes/footer.php"); ?>
