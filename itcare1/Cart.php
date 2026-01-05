<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store | Shopping Cart</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="resource/2.png">
</head>

<body onload="loadCart();" class="homebody">

    <!-- Nav Bar -->
    <?php include "header.php";
    include "connection.php";

    $user = $_SESSION["u"];

    if (isset($user)) {
        //    loadcart

    ?>
        <!-- Nav Bar -->

        <div class="container mt-5">
            <div class="row" id="cartBody">





            </div>

        </div>

        <?php include "footer.php"; ?>

        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
</body>

</html>




<?php


    } else {
        header("location: signin.php");
    }


?>