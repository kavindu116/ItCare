<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>It Care | forget Password</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="resource/2.png">
</head>

<body class="signin_body">

    <!-- sign in box -->
    <div class="signin_box" id="signinbox">

        <h2 class="text-center">Forget Password</h2>


        <div class="mt-3 mb-5">
            <label for="form-label">Email:</label>
            <input type="text" class="form-control bg-transparent" id="e"  />
        </div>

     


        <div class="mt-2 d-none" id="msgdiv1">
            <div class="alert alert-danger" id="msg1"> </div>
        </div>

        <div class="mt-2">
            <button class="btn btn-warning col-12" onclick="forgetPassword();">Send Email</button>
        </div>
       

    </div>
    <!-- sign in box -->
    <script src="script.js"></script>
</body>

</html>