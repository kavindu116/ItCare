<?php

session_start();

if (isset($_SESSION["a"])) {

?>
    <!-- load page  -->

    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="resource/2.png">
        <title>User Manegement | It Care</title>
    </head>

    <body class="admindashbordbody" onload="loaduser();">
        <!-- nav bar -->
        <?php include "adminnavbar.php" ?>
        <!-- nav bar -->

        <div class="col-10">
            <h2 class="text-center">User Manegement</h2>


            <div class="row mt-5">
                
                    <div class="d-none" id="msgdiv">
                        <div class="alert alert-danger" id="msg"></div>
                    </div>

                    <div class="col-3 ">
                        <input type="text" class="form-control " placeholder="Search User" id="search" />
                    </div>

                    <div class="col-2 ">
                        <button class="btn btn-outline-info  me-2" onclick="searchuser();">Search</button>
                        <button class="btn btn-outline-warning  " onclick="relod();">Clear</button>

                    </div>

                    <div class="d-none " id="msgdiv">
                        <div class="alert alert-danger" id="msg"></div>
                    </div>

                    <div class="col-3 offset-2">
                        <input type="text" class="form-control " placeholder="User Id" id="userid"/>
                    </div>

                    <div class="col-2">
                        <button class="btn btn-outline-light  " onclick="changestatus();">Change Status</button>
                    </div>


            </div>






            <div class="mt-5">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">User Id</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody id="tb">
                        <!-- table row -->

                        <!-- table row -->
                    </tbody>
                </table>
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