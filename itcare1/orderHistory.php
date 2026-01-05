
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Itcare Store | Order History</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="icon" href="resource/2.png">
    </head>

    <body class="homebody">

        <!-- Nav Bar -->
        <?php include "header.php";
     

        $user = $_SESSION["u"];
        include "connection.php";
        
        if (isset($user)) {
        
      
        ?>
        <!-- Nav Bar -->

        <div class=" container mt-5 ">

            <div class=" row ">

                <?php
                $rs =  Database::search("SELECT * FROM `order_histry` WHERE `user_id`='" . $user["id"] . "'");
                $num = $rs->num_rows;

                if ($num > 0) {
                    //Not Empty
                ?>

                    <div class="mt-4 mb-4">
                        <h2> Order History</h2>
                    </div>

                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        $d = $rs->fetch_assoc();

                    ?>
                        <!-- order History card -->
                        <div class="col-12 border border-3 p-3 rounded-3 bg-body-tertiary mb-4">

                            <div>
                                <h4>Order Id : <span class="text-info">#<?php echo $d["order_id"] ?></span></h4>
                                <p><?php echo $d["order_date"] ?></p>
                            </div>

                            <div class="ps-5 pe-5">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Price</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $rs2 =  Database::search("SELECT * FROM `order_item` INNER JOIN `stock` ON `order_item`.stock_stock_id=`stock`.stock_id 
                                    INNER JOIN `product` ON `stock`.product_id=`product`.id WHERE `order_item`.order_histry_ohid='" . $d["ohid"] . "'");
                                        $num2 = $rs2->num_rows;

                                        for ($x = 0; $x < $num2; $x++) {
                                            $d2 = $rs2->fetch_assoc();

                                        ?>
                                            <tr>
                                                <td><?php echo $d2["product_name"] ?></td>
                                                <td><?php echo $d2["oiQty"] ?></td>
                                                <td>Rs: <?php echo ($d2["price"] * $d2["oiQty"]) ?></td>
                                            </tr>

                                        <?php
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex flex-lg-column align-items-end pe-5">
                                <h6>Delivery Fee: <span class="text-muted">Rs:500</span></h6>
                                <h4>Net Total: <span class="text-warning"><?php echo $d["amout"] ?></span></h4>
                            </div>
                        </div>
                        <!-- order History card -->
                    <?php


                    }


                    ?>






                <?php
                } else {
                    //empty

                ?>

                    <div class="col-12 text-center mt-5">
                        <h4>You Have Not Placed Any Order !</h4>
                        <a href="index.php" class="btn btn-primary">Start Shopping</a>
                    </div>
                <?php
                }

                ?>






            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
    </body>

    </html>


<?php

} else {
    header("location:signin.php");
}

?>