<?php

session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id`=`product`.`id` 
    ORDER BY `stock_id` ASC");
    $num = $rs->num_rows;
?>



    <!DOCTYPE html>
    <html lang="en" >

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stock Report | It Care</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="icon" href="resource/2.png">

    </head>

    <body >
        <div class="container mt-3 ">
        <a href="adminreport.php"><img src="resource/R.png" height="25" /></a>
        </div>

        <div class="container mt-3" id="printArea">
            <h2 class="text-center">Stock Report</h2>

            <table class="table table-hover mt-5 mb-5">
                <thead>
                    <tr>
                        <th>Stock Id</th>
                        <th>Product Name</th>
                        <th>Stock Qty</th>
                        <th>Unit Price</th>
                    </tr>
                </thead>
                <tbody>


                <?php
                
                for ($i=0; $i < $num; $i++) { 
                    $data = $rs->fetch_assoc();

                    ?>
                    <tr>
                        <td><?php echo $data["id"]; ?></td>
                        <td><?php echo $data["product_name"]; ?></td>
                        <td><?php echo $data["qty"]; ?></td>
                        <td><?php echo $data["price"]; ?></td>
                    </tr>
                    <?php
                }
                
                
                ?>

                    
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end container mt-5">
            <button class="btn btn-outline-dark col-2" onclick="printdiv();">Print</button>
        </div>

        <script src="script.js"></script>
    </body>

    </html>
<?php
} else {
    //error
    //echo ("You Are Not a Valid Admin");
?>
    <script>
        alert("You Are Not a Valid Admin")
        window.location = " adminsignin.php";
    </script>
<?php
}
?>