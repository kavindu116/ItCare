<?php

session_start();

if (isset($_SESSION["a"])) {

?>


    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>It Care | Admin Dashbord</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="resource/2.png">
    </head>

    <body class="admindashbordbody">
        <!-- nav bar -->
        <?php include "adminnavbar.php";
        include "connection.php";
        ?>
        <!-- nav bar -->

        <div class="container">

            <div class="row">
                <div class="col-12 col-lg-4 mt-5">

                    <?php
                    $rs = Database::search("SELECT * FROM `user` WHERE `status` = '0'");
                    $num = $rs->num_rows;



                    ?>
                    <div class="card bg-transparent" style="width: 20rem;  box-shadow: 0px 0px 20px 2px rgba(77, 113, 110, 0.943);">
                        <div class="card-body">
                            <h5 class="card-title"> Inactive Users</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">User Manegement</h6>

                            <div class="mt-2 ">
                                <table class="table table-hover ">


                                    <thead>
                                        <tr>
                                            <th scope="col">User Id</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>

                                        </tr>
                                    </thead>
                                    <tbody id="tb">
                                        <?php
                                        for ($i = 0; $i < $num; $i++) {
                                            $d = $rs->fetch_assoc();

                                        ?>
                                            <!-- table row -->
                                            <th><?php echo $d["id"] ?></th>
                                            <th><?php echo $d["fname"] ?></th>
                                            <th><?php echo $d["lname"] ?></th>
                                            <!-- table row -->
                                       
                                    </tbody>
                                    <?php
                                        }

                                        ?>
                                </table>
                            </div>
                            <a href="adminuser.php" class="card-link">Active User</a>
                        </div>
                    </div>



                </div>

                <div class="col-12 col-lg-4 mt-5 ">

                    <?php
                    $rs2 = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON stock.product_id=`product`.id WHERE `status` = '1' ORDER BY `qty` ASC LIMIT 5");
                    $num2 = $rs2->num_rows;

                    ?>

                    <div class="card bg-transparent" style="width: 20rem; box-shadow: 0px 0px 20px 2px rgba(77, 113, 110, 0.943);">
                        <div class="card-body">
                            <h5 class="card-title">Low Stock Product</h5>
                            
                            <div class="mt-2 ">

                                <table class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product Id</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Qty</th>

                                        </tr>
                                    </thead>
                                    <tbody id="tb">

                                        <?php

                                        for ($i = 0; $i < $num2; $i++) {
                                            $d2 = $rs2->fetch_assoc();
                                        ?>
                                            <!-- table row -->
                                            <th><?php echo $d2["id"] ?></th>
                                            <th><?php echo $d2["product_name"] ?></th>
                                            <th><?php echo $d2["qty"] ?></th>
                                            <!-- table row -->

                                    </tbody>
                                    
                                    <?php
                                        }

                                        ?>
                                </table>
                            </div>


                        </div>
                    </div>




                </div>




                <div class="col-12 col-lg-4 mt-5 ">

                <?php
                     $rs3 = Database::search("SELECT `product`.id , `product`.product_name,`product`.img_path,`product`.discription, SUM(`order_item`.oiQty) 
                     FROM `order_item` INNER JOIN `stock` ON `order_item`.stock_stock_id =`stock`.stock_id
                    INNER JOIN `product` ON `stock`.product_id=`product`.id 
                    GROUP BY `product`.id , `product`.product_name  ORDER BY SUM(`order_item`.oiQty) DESC ");
                     $num3 = $rs3->num_rows;
                    ?>
                    <div class="card bg-transparent" style="width: 20rem; box-shadow: 0px 0px 20px 2px rgba(77, 113, 110, 0.943);">
                        <div class="card-body">
                            <h5 class="card-title">Most Sellig Product</h5>
                            
                            <div class="mt-2 ">

                                <table class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product Id</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Order Qty</th>

                                        </tr>
                                    </thead>
                                    <tbody id="tb">

                                        <?php

                                        for ($i = 0; $i < $num2; $i++) {
                                            $d3 = $rs3->fetch_assoc();
                                        ?>
                                            <!-- table row -->
                                            <th><?php echo $d3["id"] ?></th>
                                            <th><?php echo $d3["product_name"] ?></th>
                                            <th><?php echo $d3["SUM(`order_item`.oiQty)"] ?></th>
                                            <!-- table row -->

                                    </tbody>
                                    
                                    <?php
                                        }

                                        ?>
                                </table>
                                    </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
?>
    <script>
        alert("You Are Not a Valid Admin")
        window.location = " adminsignin.php";
    </script>
<?php
}


?>