<?php
//echo("php");
include "connection.php";

$txt = $_POST["t"];
$select = $_POST["s"];

$query = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.product_id=`product`.id ";

if (!empty($txt) && $select == 0) {
    $query .= "WHERE `product_name` LIKE '%" . $txt . "%'";
} elseif (empty($txt) && $select !== 0) {
    $query .= "WHERE `category_id`='" . $select . "'";
} elseif (!empty($txt) && $select !== 0) {
    $query .= "WHERE `product_name` LIKE '%" . $txt . "%' AND `category_id`='" . $select . "' ";
}

?>
<div class="row">
    <div class="offset-1 col-10 text-center">
        <div class="row justify-content-center">

            <?php

            if ("0" != $_POST["page"]) {
                $pageno = $_POST["page"];
            } else {
                $pageno = 1;
            }

            $product_rs = Database::search($query);
            $product_num = $product_rs->num_rows;

            $results_per_page = 6;
            $number_of_pages = ceil($product_num / $results_per_page);
            $page_results = ($pageno - 1) * $results_per_page;

            $selected_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $selected_num = $selected_rs->num_rows;


            if ($selected_num == 0) {
            ?>
                <div class="d-flex flex-column align-items-center mt-5 mb-5">
                    <h5> Search No Items</h5>
                    <p>We're Sorry, We Cannot Find Any Matches For Your Search Team...</p>
                </div>
                <?php
            } else {
                for ($x = 0; $x < $selected_num; $x++) {
                    $selected_data = $selected_rs->fetch_assoc();

                ?>

                    <!-- card -->
                    <div class="card mb-3 mt-3 col-12 col-lg-6">
                        <div class="row ms-1">
                            <div class="col-md-4 mt-2">

                                <img src="<?php echo $selected_data["img_path"]; ?>" class="img-thumbnail rounded-start" />
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold"><?php echo $selected_data["product_name"]; ?></h5>
                                    <span class="card-text fw-bold text-primary">Rs. <?php echo $selected_data["price"]; ?> .00</span><br />
                                    <span class="card-text fw-bold text-success"><?php echo $selected_data["qty"]; ?> Items left</span>

                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="row g-1">
                                                <div class="col-6 d-grid">
                                                    <a href="<?php echo"singleProductView.php?id=" .$selected_data["stock_id"]; ?>"><button class="btn btn-info fw-bold">Buy Now</button></a>
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

        </div>
    </div>

    <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if ($pageno <= 1) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="basicSearch(<?php echo ($pageno - 1); ?>);" <?php
                                                                                                }
                                                                                                    ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php
                for ($y = 1; $y <= $number_of_pages; $y++) {
                    if ($y == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="basicSearch(<?php echo ($y); ?>);"><?php echo $y; ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                    
                        <li class="page-item">
                            <a class="page-link" onclick="basicSearch(<?php echo ($y); ?>);"><?php echo $y; ?></a>
                        </li>
                <?php
                    }
                }

                ?>

                <li class="page-item">
                    <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="basicSearch(<?php echo ($pageno + 1); ?>);" ; <?php
                                                                                                    }
                                                                                                        ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<?php

            }
?>