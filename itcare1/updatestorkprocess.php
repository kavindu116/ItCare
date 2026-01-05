<?php
//echo("okphp")

include "connection.php";

$product_id = $_POST["pn"];
$qty = $_POST["qty"];
$price = $_POST["price"];
//echo($product_id);

if (empty($qty)) {
    echo ("Plese Enter Your Qty");
} elseif (!is_numeric($qty)) {
    echo ("Only Numbers Can Be Entered For Qty");
} elseif (strlen($qty) > 10) {
    echo ("Your Qty Should be Less Than 10 Characters");
} elseif (empty($price)) {
    echo ("Plese Enter Your Price");
} elseif (!is_numeric($price)) {
    echo ("Only Numbers Can Be Entered For Price");
} elseif (strlen($price) > 10) {
    echo ("Your Price Should be Less Than 10 Characters");
} else {
    $rs = Database::search("SELECT * FROM `stock`  WHERE `product_id` = '" . $product_id . "' 
    AND `price` = '" . $price . "' ");
    
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

if ($num == 1) {
    $newQty = $d["qty"] + $qty;
    Database::iud("UPDATE `stock` SET `qty` = '" . $newQty . "' WHERE `stock_id` = '" . $d["stock_id"] . "'");
    echo ("Stock Updated Successfully");
} else {
     Database::iud("INSERT INTO `stock` (`price`,`qty`,`product_id`) VALUES ('".$price."','".$qty."','".$product_id."')");
    echo("New Stock Added Success");
   
}
}
