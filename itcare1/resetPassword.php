<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itcare | Reset Password</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="resource/2.png">
</head>

<body class="signin_body">

    <!-- sign in box -->
    <div class="signin_box" id="signinbox">

        <h2 class="text-center">Reset Password</h2>

        <div class="d-none">
            <input type="hidden"  id="vcode" value="<?php echo ($_GET["vcode"])  ?>">
        </div>


        <div class="mt-3">
            <label for="form-label">Password:</label>
            <input type="password" class="form-control bg-transparent" id="np"  />
        </div>

        <div class="mt-3">
            <label for="form-label">Re-Type Password:</label>
            <input type="password" class="form-control bg-transparent" id="np2"  />
        </div>

     


        <div class="mt-2 d-none" id="msgdiv1">
            <div class="alert alert-danger" id="msg1"> </div>
        </div>

        <div class="mt-3">
            <button class="btn btn-warning col-12" onclick="resetpassword();">Update</button>
        </div>
       

    </div>
    <!-- sign in box -->
    <script src="script.js"></script>
</body>

</html>