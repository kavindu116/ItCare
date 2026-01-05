<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="resource/2.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">

    <title>It Care</title>
</head>

<body class="homebody">

    <!-- Heder -->
    <?php include "header.php";
    include "connection.php"; 
  
    ?>
    <!-- Heder -->

    <div class="col-12 justify-content-center ">
        <div class="row mb-3">

            <div class="offset-4 offset-lg-1 col-4 col-lg-1 logo" style="height: 70px;"></div>

            <div class="col-6 col-lg-6">

                <div class="input-group mt-3 mb-3 offset-1">

                <select class="form-select font" style="max-width: 250px;" id="basic_search_select">
                                <option value="0">All Categories</option>
                                <?php
                                $category_rs = Database::search("SELECT * FROM `category`");
                                $category_num = $category_rs->num_rows;

                                for ($x = 0; $x < $category_num; $x++) {
                                    $category_data = $category_rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo $category_data["id"]; ?>">
                                        <?php echo $category_data["category_name"]; ?></option>

                                <?php
                                }

                                ?>
                            </select>
                           

                    <input type="text" class="form-control font " aria-label="Text input with dropdown button" id="basic_search_txt" placeholder="search in itcare">

                    <button class="btn btn-light" type="button" onclick="basicSearch(0);">
                        <img src="resource/search2.png" height="30px;">
                        <i class="fa fa-search"></i>
                    </button>

                </div>


            </div>



            <div class="col-2 col-lg-2 mt-2 mt-lg-1 text-center ">
                <button class="btn fw-bold btn-secondary mt-3 mb-3" onclick="viewfilter();">Advanced</button>
            </div>


        </div>
    </div>

 
    <!-- advance Search -->

    <div class="d-none" id="filterId">
        <div class="border border-light rounded-4 mt-4 p-5 col-10 offset-1">
            <div class="row col-12 mt-4">
                <div class="col-6 row ms-auto">
                    <label for="form-label" class="col-3 form-label">Color: </label>
                    <select name="" class="form-select  col-9" id="color">
                        <option value="0">Select Color</option>
                        <?php
                        $rs = Database::search("SELECT * FROM `color`");
                        $num = $rs->num_rows;

                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>
                            <option value="<?php echo $d["id"] ?>"><?php echo $d["color_name"] ?></option>
                        <?php
                        }

                        ?>
                    </select>
                </div>

                <div class="col-6 row  ms-auto">
                    <label for="form-label" class="col-3 form-label">Category: </label>
                    <select name="" class="form-select  col-9" id="cat">
                        <option value="0">Select Category</option>
                        <?php
                        $rs2 = Database::search("SELECT * FROM `category`");

                        $num2 = $rs2->num_rows;

                        for ($i = 0; $i < $num2; $i++) {
                            $d2 = $rs2->fetch_assoc();
                        ?>
                            <option value="<?php echo $d2["id"] ?>"><?php echo $d2["category_name"] ?></option>
                        <?php
                        }

                        ?>
                    </select>
                </div>
            </div>

            <div class="row col-12 mt-4 ms-auto">
                <div class="col-6 row">
                    <label for="form-label" class="col-3 form-label">Brand: </label>
                    <select name="" class="form-select  col-9" id="brand">
                        <option value="0">Select Brand</option>
                        <?php
                        $rs3 = Database::search("SELECT * FROM `brand`");

                        $num3 = $rs3->num_rows;

                        for ($i = 0; $i < $num3; $i++) {
                            $d3 = $rs3->fetch_assoc();
                        ?>
                            <option value="<?php echo $d3["id"] ?>"><?php echo $d3["brand_name"] ?></option>
                        <?php
                        }

                        ?>
                    </select>
                </div>

                <div class="col-6 row ms-3 ">
                    <label for="form-label" class="col-3 form-label">Model: </label>
                    <select name="" class="form-select  col-9" id="model">
                        <option value="0">Select Model</option>
                        <?php
                        $rs4 = Database::search("SELECT * FROM `model`");

                        $num4 = $rs4->num_rows;

                        for ($i = 0; $i < $num4; $i++) {
                            $d4 = $rs4->fetch_assoc();
                        ?>
                            <option value="<?php echo $d4["id"] ?>"><?php echo $d4["model_name"] ?></option>
                        <?php
                        }

                        ?>
                    </select>
                </div>
            </div>

            <div class="mt-4 row col-12 m-auto">
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="Min Price" id="min" />
                </div>

                <div class="col-5">
                    <input type="text" class="form-control" placeholder="Max Price" id="max"/>
                </div>


                <button class="btn btn-outline-light col-2" onclick="advSearchProduct(0);">Search</button>


            </div>


        </div>
    </div>

    <!-- advance Search -->


    <div class="col-12" id="basicSearchResult">
        <div class="row">

            <!-- Carousel -->

            <div class="col-12 d-none d-lg-block mb-3 mt-5" id="cor">
                <div class="row">

                    <div id="carouselExampleIndicators" class="offset-1 col-10 carousel slide" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="resource/poster1.jpg" class="d-block img-thumbnail " />
                                <div class="carousel-caption d-none d-md-block poster-caption">
                                    <h2 class="poster-title text-light">Well Come To ItCare!</h2>
                                    <p class="poster-txt">The World's Best Online Store By One Click.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="resource/poster5.jpg" class="d-block img-thumbnail " />
                            </div>
                            <div class="carousel-item">
                                <img src="resource/poster8.jpg" class="d-block img-thumbnail " />
                                <div class="carousel-caption d-none d-md-block ">
                                    <h3 class="poster-title text-light">Be Free.....</h3>
                                    <p class="poster-txt text-light">Experience the Lowest Costs With Us.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
            </div>

            <!-- Carousel -->







            <!-- Category Name -->
            <?php
            $crs = Database::search("SELECT * FROM `category`");
            $cnum = $crs->num_rows;

            for ($y = 0; $y < $cnum; $y++) {
                $cd = $crs->fetch_assoc();

            ?>


                <div class="col-12 mt-3 mb-3">
                    <a href="" class="text-decoration-none text-dark ms-5 fs-3 fw-bold"><?php echo $cd["category_name"]; ?></a> &nbsp;&nbsp;
                    <a href="#" class="text-decoration-none text-dark fs-6 font">See All &nbsp;&rarr;</a>
                </div>

                <!-- Category Name -->




                <!-- products -->

                <div class="col-12 mb-3" id="pid">
                    <div class="row border border-info">

                        <div class="col-12">
                            <div class="row justify-content-center gap-2">

                                <?php
                                $prs = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.product_id=`product`.id WHERE `category_id` = '" . $cd["id"] . "' AND `status`='1' LIMIT 7 OFFSET 0");
                                $num = $prs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $pd = $prs->fetch_assoc();

                                ?>
                                    <div class="card col-6 col-lg-2 mt-2 mb-2 bg-transparent" style="width: 12rem;">

                                        <img src="<?php echo $pd["img_path"] ?>" class="card-img-top img-thumbnail mt-2 bg-transparent" style="height: 180px;" />
                                        <div class="card-body ms-0 m-0 text-center">
                                            <h5 class="card-title fw-bold fs-6 font"><?php echo $pd["product_name"] ?></h5>


                                            

                                            <span class="card-text text-danger font"> Rs: <?php echo $pd["price"] ?></span><br /><br />
                                            <a href='<?php echo"singleProductView.php?id=" .$pd["stock_id"]; ?>' class="col-12 btn btn-info ">Buy Now</a>

                                            <a href='<?php echo"singleProductView.php?id=" .$pd["stock_id"]; ?>'><button class="col-12 btn btn-warning mt-2" onclick="addtoCart(<?php echo $pd['stock_id']?>)">
                                            <i class="bi bi-cart-plus-fill text-white fs-5"></i>
                                            </button></a>

                                            <button class="col-12 btn btn-outline-light mt-2 border border-primary">
                                                <i class="bi bi-heart-fill text-danger fs-5" id="heart"></i>
                                            </button>

                                        </div>
                                    </div>

                                <?php
                                }
                                ?>
                            </div>

                        </div>

                    </div>
                </div>


                <!-- products -->
            <?php
            }
            ?>

        </div>
    </div>

    <?php include "footer.php"; ?>

    </div>
    </div>




    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>