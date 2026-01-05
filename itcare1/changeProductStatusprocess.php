<?php
// echo("okphp");

include "connection.php";

$pid = $_POST["pid"];

if (empty($pid)) {
    echo ("Please Enter Product Id");
} else {

    $rs = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.product_id=`product`.id  WHERE `product_id` = '" . $pid . "'");
    $num = $rs->num_rows;

    if ($num == "0") {
        echo ("Invalid Product Id");
    } else {
        $data = $rs->fetch_assoc();
        $status = $data["status"];

        if ($status == "0") {
            Database::iud("UPDATE `stock` SET `status` = '1' WHERE `stock_id` = '" . $pid . "'");
            echo ("Activated");
        } elseif ($status == "1") {
            Database::iud("UPDATE `stock` SET `status` = '0' WHERE `stock_id` = '" . $pid . "'");
            echo ("Deactivated");
        }
    }
}


?>