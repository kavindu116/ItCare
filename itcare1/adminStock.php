<?php

session_start();
include "connection.php";

if (isset($_SESSION["a"])) {
?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="resource/2.png">

        <title>Stock - Admin Panel</title>
    </head>

    <body class="admindashbordbody">

        <?php
        include "adminNavBar.php";

        ?>

        <div class="container-fluid" style="margin-top: 90px;">

            <div class="row">

                <div class="col-12 col-lg-5 offset-1">

                    <h2 class="text-center">Product Registration</h2>

                    <div class="mb-3">
                        <label class="form-label" for="pname">Product Name :</label>
                        <input id="pname" class="form-control" type="text">

                    </div>

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label class="form-label" for="">Brand</label>
                            <select id="brand" class="form-select">
                                <option value="0">Select</option>
                                <?php

                                $rs = Database::search("SELECT * FROM `brand`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {

                                    $data = $rs->fetch_assoc();

                                ?>
                                    <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["brand_name"]); ?></option>


                                <?php
                                }

                                ?>


                            </select>

                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label" for="">Category</label>
                            <select id="cat" class="form-select">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `category`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {

                                    $data = $rs->fetch_assoc();

                                ?>
                                    <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["category_name"]); ?></option>


                                <?php
                                }




                                ?>
                            </select>

                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label" for="">Color</label>
                            <select id="color" class="form-select">
                                <option value="0">Select</option>
                                <?php

                                $rs = Database::search("SELECT * FROM `color`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {

                                    $data = $rs->fetch_assoc();

                                ?>
                                    <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["color_name"]); ?></option>


                                <?php
                                }

                                ?>
                            </select>
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label" for="">Model</label>
                            <select id="mod" class="form-select">
                                <option value="0">Select</option>

                                <?php

                                $rs = Database::search("SELECT * FROM `model`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {

                                    $data = $rs->fetch_assoc();

                                ?>
                                    <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["model_name"]); ?></option>


                                <?php
                                }

                                ?>
                            </select>
                        </div>


                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">Description :</label>
                        <textarea id="desc" class="form-control" rows="5"></textarea>

                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">Product Image</label>
                        <input id="file" type="file" class="form-control">

                    </div>

                    <div class="d-grid">
                        <button class="btn btn-outline-info" onclick="regProduct();">Register Product</button>
                    </div>
                </div>


                <div class="col-12 col-lg-5">
                    <h2 class="text-center">Stock Update</h2>

                    <div class="mb-3">
                        <label class="form-label" for="">Product Name</label>
                        <select class="form-select" id="ps">
                            <option>Select</option>

                            <?php

                            $rs = Database::search("SELECT * FROM `product`;");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {

                                $data = $rs->fetch_assoc();

                            ?>
                                <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["product_name"]); ?></option>


                            <?php
                            }
                            ?>
                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label" for="">Qty</label>

                        <input type="text" class="form-control" id="qty">

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Unit Price</label>
                        <input type="text" class="form-control" id="price">
                    </div>



                    <div class="d-grid">
                        <button class="btn btn-outline-warning" onclick="updatestork();">Update Stock</button>
                    </div>
                    <div class="mt-5">
                    <h4>Product Status Change</h4>
                    </div>

                   

                    <div class="d-flex justify-content-start mt-3">

                    

                        <div class="col-6">
                            <input type="text" class="form-control " placeholder="Product id" id="pid" />
                        </div>

                        <div class="col-3 ms-2">
                            <button class="btn btn-outline-light" onclick="changeProductStatus();">Change Status</button>
                        </div>

                        <div class="d-none " id="msgdiv">
                            <div class="alert alert-danger" id="msg"></div>
                        </div>


                    </div>


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
        alert("You Are Not a Valid Admin")
        window.location = " adminsignin.php";
    </script>
<?php
}


?>