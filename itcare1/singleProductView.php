<?php 
include "connection.php";

$stockId = $_GET["id"];

// echo($stockId);

if (isset($stockId)) {
    
$q = "SELECT * FROM stock INNER JOIN product ON stock.product_id=product.id INNER JOIN 
brand ON product.brand_id=brand.id INNER JOIN color ON product.color_id = color.id
INNER JOIN category ON product.category_id=category.id INNER JOIN model ON product.model_id = 
model.id
WHERE `stock_id` ='".$stockId."'";

$rs = Database::search($q);
$d = $rs->fetch_assoc();

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>It Care</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="resource/2.png">
</head>

<body class="siglebody">
    <!-- Nav Bar -->
    <?php include "header.php"; ?>
    <!-- Nav Bar -->

    <div class="mt-5">

        <div class="col-8 row shadow-lg p-5 bg-body-teritary rounded-2 m-auto">

            <div class="col-12 col-lg-6">
                <img src="<?php echo $d["img_path"] ?>" class="rounded-3 shadow-lg card-img-top img-thumbnail " width="320px">
            </div>

            <div class="col-12 col-lg-6">
                <h4><?php echo $d["product_name"] ?></h4>
                <h5 class="mt-3">Brand : <?php echo $d["brand_name"] ?></h5>
                <h6 class="mt-3">Category :  <?php echo $d["category_name"] ?></h6>
                <h6 class="mt-3">Colour : <?php echo $d["color_name"] ?></h6>
                <h6 class="mt-3">Model : <?php echo $d["model_name"] ?></h6>
                <p class="mt-3">Description :  <?php echo $d["discription"] ?></p>
                <div class="row mt-5">
                    <div class="col-2">
                        <input type="text" placeholder="Qty" class="form-control" id="qty"/>
                    </div>
                    <div class="col-6 mt-2">
                        <h6 class="text-danger">Available Quantity : <?php echo $d["qty"] ?></h6>
                    </div>
                </div>

                <h5 class="mt-3">Price : <?php echo $d["price"] ?> . 00</h5>
                <div class="d-flex justify-content-center mt-3">
                    <button class="btn btn-info col-6 col-lg-6" onclick="addtoCart(<?php echo $d['stock_id']?>)">Add to Cart</button>
                    <button class="btn btn-warning col-6 col-lg-6 ms-2" onclick="buyNow(<?php echo $d['stock_id']?>);">Buy Now</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <<?php include "footer.php" ?>
    <!-- Footer -->
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php


}else {
    header("location: index.php");
}


?>