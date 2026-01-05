<?php

session_start();

if (isset($_SESSION["a"])) {
?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>It Care | Admin Dash Bord</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="icon" href="resource/2.png">
    </head>

    <body class="admindashbordbody">
        <!-- nav bar -->
        <?php include "adminnavbar.php" ?>
        <!-- nav bar -->

        <div class="col-10">
            <h2 class="text-center">Reports</h2>


            <div class="row mt-5">
                <div class="col-4 mt-5">
                   <a href="adminstockReport.php"><button class="btn btn-outline-warning col-12">Stock Report</button></a> 
                </div>

                <div class="col-4 mt-5">
                <a href="adminproductreport.php"><button class="btn btn-outline-warning col-12">Product Report</button></a>
                </div>

                <div class="col-4 mt-5">
                    <a href="adminuserreport.php"><button class="btn btn-outline-warning col-12">User Report</button></a>
                </div>


                <div class="col-4 mt-5">
                    <a href="adminbestSellig.php"><button class="btn btn-outline-warning col-12">Best Selling Report</button></a>
                </div>

                
            </div>

        </div>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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