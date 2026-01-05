<?php
session_start();

if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <title>Product Manegement | It Care</title>
        <link rel="icon" href="resource/2.png">
    </head>

    <body class="admindashbordbody">
        <!-- nav bar -->
        <?php include "adminnavbar.php" ?>
        <!-- nav bar -->


        <div class="col-10 ">
            <h2 class="text-center">Product Manegement</h2>

            <div class="row">
                <div class="col-4 mt-4 offset-1">
                    <!-- brand register  -->

                    <label for="form-lable"> Brand Name:</label>
                    <input type="text" class="form-control mb-3" id="brnd">

                    <div class="d-none" id="msgdiv1" onclick="reload();">
                        <div class="alert alert-danger" id="msg1"></div>
                    </div>

                    <div class=" mt-4 ">
                        <button class="btn btn-outline-light col-12" onclick="savebrand();">Brand Register</button>
                    </div>

                    <!-- brand register  -->
                </div>

                <div class="col-4 mt-4 offset-2">
                    <!-- category register  -->

                    <label for="form-lable"> Category Name:</label>
                    <input type="text" class="form-control mb-3 " id="cat">

                    <div class="d-none" id="msgdiv2" onclick="reload();">
                        <div class="alert alert-danger" id="msg2"></div>
                    </div>

                    <div class=" mt-4 ">
                        <button class="btn btn-outline-light col-12" onclick="savecatagory();">Category Register</button>
                    </div>

                    <!-- category register  -->
                </div>
            </div>


            <div class="row mt-5">
                <div class="col-4 mt-4 offset-1">
                    <!-- color register  -->

                    <label for="form-lable"> Color Name:</label>
                    <input type="text" class="form-control mb-3 " id="clr">

                    <div class="d-none" id="msgdiv3" onclick="reload();">
                        <div class="alert alert-danger" id="msg3"></div>
                    </div>

                    <div class=" mt-4 ">
                        <button class="btn btn-outline-light col-12" onclick="saveclr();">Register Color</button>
                    </div>

                    <!-- color register  -->

                </div>

                <div class="col-4 mt-4 offset-2">
                    <!-- Size register  -->

                    <label for="form-lable"> Model:</label>
                    <input type="text" class="form-control mb-3 " id="model">

                    <div class="d-none" id="magdiv4" onclick="reload();">
                        <div class="alert alert-danger" id="msg4"></div>
                    </div>

                    <div class=" mt-4 ">
                        <button class="btn btn-outline-light col-12" onclick="savemodel();"> Register Model</button>
                    </div>

                    <!-- Size register  -->
                </div>
            </div>


        </div>







        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
    </body>

    </html>



<?php

} else {

?>
    <script>
        swal("Error", "You Are Not A Valid Admin", "error")
            .then((value) => {
                window.location = "adminsignin.php";
            });
    </script>
<?php
}

?>