<!DOCTYPE html>

<html >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Profile | IT CARE </title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/2.png" />

</head>

<body class="homebody">

    <div class="container-fluid">
        <div class="row">

            <?php
            include "header.php";
            include "connection.php";



            if (isset($_SESSION["u"])) {

                $email = $_SESSION["u"]["email"];
            } else {
            ?>

                <script>
                    alert("You Need To LogIn Frist.");

                    window.location = "index.php";
                </script>>




            <?php
            }
            ?>


            <div class="col-12   ">
                <div class="row ">

                    <div class="col-12 bg-body  mt-4 mb-4  homebody">


                        <div class="row ">

                            <div class="col-md-3 ">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5">




                                    <?php
                                    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $_SESSION["u"]["id"] . "'");
                                    $d = $rs->fetch_assoc();
                                    if (empty($d["img_path"])) {
                                        ?>
                                            <img src="resource/image/profile-user.png" id="img" class="rounded mt-5" style="width: 150px;" />
                                        <?php
                                        } else {
                                        ?>
                                            <img src="<?php echo $d["img_path"]; ?>" id="img" class="rounded mt-5" style="width: 150px;" />
                                        <?php
                                        }
    
    
                                        ?>
    
    
    
    
                                        <span class="fw-bold"><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></span>
                                        <span class="fw-bold text-secondary"><?php echo $email ?></span>
    
                                        <input type="file" class="d-none" id="profileimage" />
                                        <label for="profileimage" class="btn  btn-info  mt-4 fw-bold text-light " onclick="changeProfileImg();">Update Profile Image</label>

                                </div>
                            </div>

                            <div class="col-md-5 ">
                                <div class="p-3 py-5">

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="fw-bold font2 " style="font-size: 35px;">Profile Settings</h4>
                                    </div>

                                    <div class="row mt-4">

                                        <div class="col-6">
                                            <label class="form-label t font2 fw-bold">First Name</label>
                                            <input type="text" class="form-control" id="fname" value="<?php echo $_SESSION["u"]["fname"]; ?>" />
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label  font2 fw-bold">Last Name</label>
                                            <input type="text" class="form-control" id="lname" value="<?php echo $_SESSION["u"]["lname"]; ?>" />
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label  font2 fw-bold mt-2">Mobile</label>
                                            <input type="text" class="form-control" id="mobile" value="<?php echo $_SESSION["u"]["mobile"]; ?>" />
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label  font2 fw-bold mt-2">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="user_password" value="<?php echo $_SESSION["u"]["password"]; ?>" readonly />

                                                <button class="btn btn-outline-secondary" onclick="showPassword3();" id="basic-addon2">Show</button>

                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label font2 fw-bold  mt-2">Email</label>
                                            <input type="text" class="form-control" readonly value="<?php echo $email ?>" />
                                        </div>



                                        <div class="col-12">
                                            <label class="form-label font2 fw-bold  mt-2">Address Line 01</label>
                                            <?php

                                            if (empty($d["line_1"])) {
                                            ?>
                                                <input id="line1" type="text" class="form-control" />
                                            <?php
                                            } else {
                                            ?>
                                                <input id="line1" type="text" class="form-control" value="<?php echo $d["line_1"]; ?>" />
                                            <?php
                                            }


                                            ?>

                                        </div>

                                        <div class="col-12">
                                            <label class="form-label font2 fw-bold  mt-2">Address Line 02</label>
                                            <?php

                                            if (empty($d["line_2"])) {
                                            ?>
                                                <input id="line2" type="text" class="form-control" />
                                            <?php
                                            } else {
                                            ?>
                                                <input id="line2" type="text" class="form-control" value="<?php echo $d["line_2"]; ?>" />
                                            <?php
                                            }
                                            ?>

                                        </div>


                                        <div class="col-12 d-grid mt-3">
                                            <button class="btn btn-outline-info fw-bold text-dark" onclick="updateProfile();">Update My Profile</button>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="col-md-4 text-center">
                                <div class="row">
                                    <span class="fw-bold text-light mt-5 ">Display ads</span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <?php include "footer.php"; ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>