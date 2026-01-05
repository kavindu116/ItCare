

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="stayle.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">




</head>

<body>

    <div class="col-12">
        <div class="row ">
            <div class="offset-lg-1 col-12 col-lg-5 align-self-start mt-2">

                <?php
                session_start();

                if (isset($_SESSION["u"])) {
                    $data =  $_SESSION["u"];

                ?>
                    <span class="text-lg-start text-light fw-bold" style="font-size: 15px;"><b>Hi </b><?php echo $data["fname"]; ?></span> <span class="fw-bold  text-dark-emphasis">|</span>
                    <span class="text-lg-start fw-bold text-dark-emphasis btn " onclick="signout();">Signout</span>|
                <?php
                } else {
                ?>
                    <a href="signin.php" class="text-decoration-none fw-bold text-light"><button class="btn fw-bold">Sign in</button>|<button class="btn fw-bold">Register </button>|</a>
                <?php
                }
                ?>

                <span class="text-lg-start fw-bold text-light btn">Help and Contact</span>

            </div>

            <div class="col-12 col-lg-3 offset-lg-2 align-self-end">
                <div class="row">
                    <div class="col-8 col-lg-6 mt-2 dropdown">
                        <button class="btn  dropdown-toggle btn-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            My Account

                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="userProfile.php">My Profile</a></li>
                            <li><a class="dropdown-item" href="watchlist.php">Watchlist</a></li>
                            <li><a class="dropdown-item" href="orderHistory.php"> History</a></li>
                            <li><a class="dropdown-item" href="#">Messages</a></li>
                            <li><a class="dropdown-item" href="#">Contact Admin</a></li>
                            <li><a class="dropdown-item" href="index.php">Go to The Home</a></li>
                        </ul>

                        
                    </div>
                    <a href="cart.php" class="col-1 col-lg-1  mt-2 cart-icon"><div class="   "> </div></a>
                   <a href="adminsignin.php" class="btn btn-outline-light col-4 mt-2 ms-3 ">Admin Login</a>
                </div>
            </div>

        </div>
    </div>


    <script src="script.js"></script>
</body>

</html>

