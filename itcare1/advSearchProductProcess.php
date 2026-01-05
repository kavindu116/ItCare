<?php

include "connection.php";

$pageno = 0;
$page = $_POST["pg"];

$color = $_POST["co"];
$cat = $_POST["cat"];
$brand = $_POST["b"];
$model = $_POST["m"];
$minPrice = $_POST["min"];
$maxPrice = $_POST["max"];
// echo($color);

$status = 0; //No any Conditions.

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`id`
INNER JOIN `color` ON `product`.`color_id` = `color`.`id`
INNER JOIN `category` ON `product`.`category_id` = `category`.`id`
INNER JOIN `model` ON `product`.`model_id` = `model`.`id`";

//search By Color
if ($status == 0 && $color != 0) {
    //1st time search by Color(WHERE)
    $q .= " WHERE `color`.`id` = '" . $color . "'";
    $status = 1;
} elseif ($status != 0 && $color != 0) {
    //2nd time search by Color(AND)
    $q .= " AND `color`.`id` = '" . $color . "'";
}


//search By Category
if ($status == 0 && $cat != 0) {
    //1st time search by Category(WHERE)
    $q .= " WHERE `category`.`id` = '" . $cat . "'";
    $status = 1;
} elseif ($status != 0 && $cat != 0) {
    //2nd time search by Category(AND)
    $q .= " AND `category`.`id` = '" . $cat . "'";
}


//search By Brand
if ($status == 0 && $brand != 0) {
    //1st time search by Brand(WHERE)
    $q .= " WHERE `brand`.`id` = '" . $brand . "'";
    $status = 1;
} elseif ($status != 0 && $brand != 0) {
    //2nd time search by Brand(AND)
    $q .= " AND `brand`.`id` = '" . $brand . "'";
}


//search By Size
if ($status == 0 && $model != 0) {
    //1st time search by size(WHERE)
    $q .= " WHERE `model`.`id` = '" . $model . "'";
    $status = 1;
} elseif ($status != 0 && $model != 0) {
    //2nd time search by size(AND)
    $q .= " AND `model`.`id` = '" . $model . "'";
}


//search By Min Price
if (!empty($minPrice) && empty($maxPrice)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` >= '" . $minPrice . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= " AND `stock`.`price` >= '" . $minPrice . "' ORDER BY `stock`.`price` ASC";
    }
}


//search By Max Price
if (empty($minPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` <= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= " AND `stock`.`price` <= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
    }
}


//search By Price Range
if (!empty($minPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= " AND `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
    }
}


$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 6;
$num_of_pages = ceil($num / $results_per_page);
$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
    //search no result
?>
    <div class="d-flex flex-column align-items-center mt-5">
        <h5>Search No Result</h5>
        <p>We're sorry, We cannot find any matches for your search term.</p>
    </div>

    <div class="bg-transparent" style="height: 300px;">

    </div>
    <?php

} else {
    //show results


    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();
    ?>

        

        <!-- card -->
        <div class="card mb-3 mt-3 col-12 col-lg-6 container">
            <div class="row ">
                <div class="col-md-4 mt-2">

                    <img src="<?php echo $d["img_path"]; ?>" class="img-thumbnail rounded-start" />
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?php echo $d["product_name"]; ?></h5>
                        <span class="card-text fw-bold text-primary">Rs. <?php echo $d["price"]; ?> .00</span><br />
                        <span class="card-text fw-bold text-success"><?php echo $d["qty"]; ?> Items left</span>

                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="row g-1">
                                    <div class="col-6 d-grid">
                                       <a href="<?php echo"singleProductView.php?id=" .$d["stock_id"]; ?>"><button class="btn btn-info fw-bold">Buy Now</button></a> 
                                    </div>
                                    <div class="col-6 d-grid">
                                        <button class="btn btn-warning fw-bold">Add to Cart</button>
                                    </div>
                                    <div class="col-12 d-grid mt-3">
                                        <button class="btn btn-secondary fw-bold">Add to Watchlist</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- card -->


        
    <?php
    }

    ?>
    <!-- Pagination -->
    <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if ($pageno <= 1) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="advSearchProduct(<?php echo ($pageno - 1); ?>);" <?php
                                                                                                }
                                                                                                    ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {
                    if ($y == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="advSearchProduct(<?php echo ($y); ?>);"><?php echo $y; ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="advSearchProduct(<?php echo ($y); ?>);"><?php echo $y; ?></a>
                        </li>
                <?php
                    }
                }

                ?>

                <li class="page-item">
                    <a class="page-link" <?php if ($pageno >= $num_of_pages) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="advSearchProduct(<?php echo ($pageno + 1); ?>);" ; <?php
                                                                                                    }
                                                                                                        ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

    <!-- Pagination -->

<?php

}
