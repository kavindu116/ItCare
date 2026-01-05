<?php
session_start();
include "connection.php";
if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT `product`.id , `product`.product_name,`product`.img_path,`product`.discription, SUM(`order_item`.oiQty) 
    FROM `order_item` INNER JOIN `stock` ON `order_item`.stock_stock_id =`stock`.stock_id
   INNER JOIN `product` ON `stock`.product_id=`product`.id 
   GROUP BY `product`.id , `product`.product_name  ORDER BY SUM(`order_item`.oiQty) DESC ");
    $num = $rs->num_rows;
?>



    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="resource/2.png">
        <title>It Care | Admin Dashbord</title>
    </head>

    <div class="container mt-3">
        <a href="adminreport.php"><img src="resource/R.png" height="25" /></a>
    </div>

    <div class="container mt-3" id="printArea">
        <h2 class="text-center">Best Selling Product Report</h2>

        <table class="table table-hover mt-5 mb-5">
            <thead>
                <tr>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Sellig Quantity</th>
                    <th>Discription</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>

                <?php
                for ($i = 0; $i < $num; $i++) {
                    $d = $rs->fetch_assoc();
                ?>
                    <tr>
                        <td><?php echo $d["id"] ?></td>
                        <td><?php echo $d["product_name"] ?></td>
                       
                        <td><?php echo $d["SUM(`order_item`.oiQty)"] ?></td>
                        
                       
                        <td><?php echo $d["discription"] ?></td>
                        <td><img src="<?php echo $d["img_path"] ?>" height="50"></td>
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