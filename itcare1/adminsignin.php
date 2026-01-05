<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resource/2.png">
    <title>It Care | Admin Log In</title>
</head>

<body class="adminsigninbody ">

    <div class="adminsignbox">
        <h2 class="text-center">Admin Log In</h2>

        <div class="mt-3">
            <label for="form-label">User Name :</label>
            <input type="text" class="form-control border-light bg-transparent" id="un" placeholder="Ex:Sahan"/>
        </div>

        <div class="mt-3 mb-3">
            <label for="form-label">Password :</label>
            <input type="password" class="form-control border-light bg-transparent" id="pw" placeholder="Ex:*************"/>

        </div>

        <div id="msgdiv" class="d-none">
            <div class="alert alert-danger" id="msg"></div>
        </div>

        <div class="mt-4">
            <button class="btn btn-outline-info col-12" onclick="adminsignin();">Log In</button>
        </div>
    </div>


<script src="script.js"></script>
</body>

</html>