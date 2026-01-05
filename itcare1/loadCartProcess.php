<?php
// echo("okphp");

include "connection.php";
session_start();
$user = $_SESSION["u"];
$netTotal = 0;

$rs = Database::search("SELECT * FROM `cart` INNER JOIN `stock` ON `cart`.Stock_stock_id=`stock`.stock_id
INNER JOIN `product` ON `stock`.product_id=`product`.id INNER JOIN `color` ON
`product`.color_id=`color`.id INNER JOIN `model` ON `product`.model_id = `model`.id 
WHERE `cart`.user_id = '" . $user["id"] . "'");


$num = $rs->num_rows;

if ($num > 0) {
    //    load cart
    // echo ("Load Cart");

?>
    <div class="mb-4 mt-4">
        <h3>Shopping Cart</h3>
    </div>

    <?php
    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();

        $total = $d["price"] * $d["cart_qty"];
        $netTotal += $total;


    ?>
        <!-- Cart Items -->
        <div class=" col-lg-12 border  border-3 rounded-5 p-3 mb-2 d-flex justify-content-between">
            <div class="d-flex align-items-center col-6 col-lg-12">
                <img src="<?php echo $d["img_path"] ?>" class="rounded-4 " width="200px">
                <div class="ms-5  col-4 col-lg-4 gap-3 g-lg-0">
                    <h4><?php echo $d["product_name"] ?></h4>
                    <p class="text-muted mb-0 mt-2">Color : <?php echo $d["color_name"] ?></p>
                    <p class="text-muted">Model : <?php echo $d["model_name"] ?></p>
                    <h5 class="text-dark fw-bold">Rs:<?php echo $d["price"] ?></h5>
                </div>
                
               
              
                <div class="gap-2 gap-lg-0 col-6 col-lg-2">
                    <div class="d-flex align-items-center gap-2  ">
                        <button class="btn btn-light btn-sm" onclick="decrementcartqty('<?php echo $d['cart_id'] ?>');">-</button>
                        <input type="number" class="form-control text-center form-control-sm " style="max-width: 100px;" value="<?php echo $d["cart_qty"] ?>" id="qty<?php echo $d['cart_id'] ?>" disabled>
                        <button class="btn btn-light btn-sm" onclick="incrementcartqty('<?php echo $d['cart_id'] ?>');">+</button>
                    </div>
                </div>


                <div class="d-flex align-items-center col-4 col-lg-2 me-3">
                    <h4>Total: <span class="text-dark fw-bold"> Rs:<?php echo $total ?></span></h4>
                </div>

                <div class="d-flex align-items-center">
                    <button class="btn btn-danger btn-sm" onclick="removefromcart('<?php echo $d['cart_id'] ?>');">X</button>
                </div>
            </div>





        </div>

    <?php
    }
    ?>
    <!-- Cart Items -->


    <div class="col-12 mt-4 ">
        <hr>
    </div>

    <!-- checkout -->
    <div class="d-flex flex-column align-items-end">
        <h5>Number Of Items: <span class="text-dark"> &nbsp; (<?php echo $num ?>) &nbsp;&nbsp; Rs : <?php echo $total ?></span></h5>
        <h4>Delivery Fee:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <span class="text-muted">Rs:500</span></h4>
        <h3>Net Total: &nbsp;&nbsp;<span class="text-danger">Rs: <?php echo ($netTotal + 500) ?></span></h3>
        <button class="btn btn-warning col-3 fw-bolder mt-3 mb-4" onclick="checkOut();" >CHECKUOT</button>
    </div>
    <!-- checkout -->




<?php


} else {
    //    echo("Cart Is Emty");

?>
    <div class="col-12 text-center mt-5 mb-5">
        <h2>Your Cart Is Emty..!</h2>
        <a href="index.php" class="btn btn-primary"> Start Shopping</a>
    </div>
<?php

}


?>