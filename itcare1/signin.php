<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>It Care</title>
    <link rel="icon" href="resource/2.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">



</head>

<body class="signin_body">

    <!-- signinbox -->
    <div class="signin_box " id="signinbox">
        <h2 class="text-center"> Log In</h2>

        <?php

        $username = "";
        $password = "";

        if (isset($_COOKIE["username"])) {
            $username = $_COOKIE["username"];
        }

        if (isset($_COOKIE["password"])) {
            $password = $_COOKIE["password"];
        }


        ?>

        <div class="mt-3">
            <label for="form-label">User Name:</label>
            <input type="text" class="form-control bg-transparent border-dark" id="un" value="<?php echo $username ?>" />
        </div>

        <div class="mt-2">
            <label for="form-label">Password:</label>
            <input type="password" class="form-control bg-transparent border-dark" id="pw" value="<?php echo $password ?>" />
        </div>

        <div class="mt-2 mb-2">
            <input type="checkbox" class="form-check-input" id="rm" />
            <label for="form-label">Remember Me</label>
           
                <a href="forgetpassword.php"><button class="btn btn-warning btn-sm col-6 ms-4" onclick="changeview();">Forgot Password?</button></a>
            
        </div>

        <div class="mt-2 d-none" id="msgdiv1">
            <div class="alert alert-danger" id="msg1"></div>
        </div>

        <div class="mt-3 ">
            <button class="btn btn-info col-12 fw-bold text-light" onclick="signin();">LogIn</button>
        </div>



        <h6 class="text-center mt-2 mb-2">OR</h6>


        <div class="">
            <button class="btn btn-warning col-12 fw-bold" onclick="changeview();">Register</button>
        </div>


    </div>
    <!-- signinbox -->

    <!-- signupbox -->
    <div class="signup_box d-none" id="signupbox">
        <h2 class="text-center">Register</h2>

        <div class="row">
            <div class="mt-3 col-6">
                <label for="form-label">Frist Name:</label>
                <input type="text" class="form-control bg-transparent border-dark" id="fname" />
            </div>

            <div class="mt-3 col-6">
                <label for="form-label">Last Name:</label>
                <input type="text" class="form-control bg-transparent border-dark" id="lname" />
            </div>

        </div>

        <div class="mt-3">
            <label for="form-label">Email :</label>
            <input type="email" class="form-control bg-transparent border-dark" id="email" />
        </div>

        <div class="mt-3">
            <label for="form-label">Mobile Number :</label>
            <input type="text" class="form-control bg-transparent border-dark" id="mobile" />
        </div>

        <div class="mt-3">
            <label for="form-label">User Name :</label>
            <input type="text" class="form-control bg-transparent border-dark" id="username" />
        </div>

        <div class="mt-3 mb-3">
            <label for="form-label">Password :</label>
            <input type="password" class="form-control bg-transparent border-dark" id="password" />
        </div>

        <div class="mt-3 d-none " id="msgdiv">
            <div class="alert alert-danger" id="msg"> </div>
        </div>

        <div class="mt-3 ">
            <button class="btn btn-info col-12 fw-bold text-light" onclick="signup();">Register</button>
        </div>

        <h6 class="text-center mt-2 mb-2">OR</h6>


        <div class="">
            <button class="btn btn-warning col-12 fw-bold" onclick="changeview();">Log In</button>
        </div>



    </div>
    <!-- signupbox -->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
</body>

</html>