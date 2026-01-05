<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Invoice | Online Store</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="icon" href="resource/2.png">
    <link rel="stylesheet" href="style.css" />


</head>

<body class="homebody">

    <?php
    include "header.php";


    include "connection.php";
    $user = $_SESSION["u"];
    $orderHisId = $_GET["orderId"];

    $rs = Database::search("SELECT * FROM `order_histry` WHERE `ohid` = '" . $orderHisId . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        $d = $rs->fetch_assoc();
    ?>


        <div class="container mt-2 mb-4 mt-5">

            <div class="border border-3 border-black p-5 rounded-3" id="printArea">
                <div class="row">
                    <div class="col-6">
                        <h3>Order Id : <span class="text-primary">#<?php echo $d["order_id"] ?></span></h3>
                        <h5><?php echo $d["order_date"] ?></h5>
                    </div>

                    <div class="col-6 text-end">
                        <h1>I N V O I C E</h1>
                        <h3>It Care</h3>
                        <h5>Colombo Kandy Rode,</h5>
                        <h5>Keglle.</h5>
                    </div>
                </div>

                <div>
                    <h4><?php echo $user["fname"] ?> <?php echo $user["lname"] ?></h4>
                    <h5><?php echo $user["mobile"] ?></h5>

                    <h5><?php echo $user["line_1"] ?>,</h5>
                    <h5><?php echo $user["line_2"] ?></h5>
                </div>

                <div class="ps-5 pe-5 mt-5">
                    <table class="table table-hover border border-1 border-dark">
                        <thead>
                            <tr>
                                <th scope="col"> Product Name</th>
                                <th scope="col"> Brand Name</th>
                                <th scope="col"> Category</th>
                                <th scope="col"> color </th>
                                <th scope="col"> Qty</th>
                                <th scope="col"> price</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $rs2 = Database::search("SELECT * FROM `order_item` INNER JOIN `stock` ON
                         `order_item`.stock_stock_id = `stock`.stock_id 
                        INNER JOIN `product` ON  `stock`.product_id = `product`.id INNER JOIN 
                        `brand` ON `product`.brand_id= `brand`.id INNER JOIN `category` ON `product`.category_id=`category`.id 
                        INNER JOIN `color` ON `product`.color_id=`color`.id INNER JOIN `model` ON `product`.model_id=`model`.id
                        WHERE `order_item`.order_histry_ohid='" . $orderHisId . "'");


                            $num2 = $rs2->num_rows;

                            for ($i = 0; $i < $num2; $i++) {
                                $d2 = $rs2->fetch_assoc();
                            ?>
                                <tr>
                                    <td><?php echo $d2["product_name"] ?></td>
                                    <td><?php echo $d2["brand_name"] ?></td>
                                    <td><?php echo $d2["category_name"] ?></td>
                                    <td><?php echo $d2["color_name"] ?></td>
                                    <td><?php echo $d2["oiQty"] ?></td>
                                    <td>Rs:<?php echo ($d2["price"] * $d2["oiQty"]) ?> </td>
                                </tr>
                            <?php
                            }
                            ?>


                        </tbody>
                    </table>
                </div>

                <div class="text-end pe-5">
                    <h6>Number Of Items : <span class="text-muted"><?php echo $num2; ?></span></h6>
                    <h5>Delivery Fee : <span class="text-muted">500</span></h5>
                    <h3>Net Total: <span class="text-muted"><?php echo $d["amout"] ?></span></h3>
                </div>
            </div>
            <div class="text-end  mt-5">
                <button class="btn btn-warning col-3" onclick="printdiv();">Print</button>
            </div>

        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


<?php

    } else {
        header("location:index.php");
    }

?>