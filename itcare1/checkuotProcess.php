<?php
include "connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($_POST["payment"])) {

    $payment = json_decode($_POST["payment"], true);

    $date = new DateTime();
    $date->setTimezone(new DateTimeZone("Asia/Colombo"));
    $time = $date->format("y-m-d H-i-s");

    Database::iud("INSERT INTO `order_histry` (`order_id`,`order_date`,`amout`,`user_id`)
    VALUES ('" . $payment["order_id"] . "','" . $time . "','" . $payment["amount"] . "','" . $user["id"] . "')");

    $orderHistryId = Database::$connection->insert_id;

    $rs = Database::search("SELECT * FROM `cart` WHERE `user_id` = '" . $user["id"] . "'");
    $num = $rs->num_rows;

    for ($i = 0; $i < $num; $i++) {
        //order Item Insert

        $d = $rs->fetch_assoc();

        Database::iud("INSERT INTO `order_item` (`oiQty`,`order_histry_ohid`,`stock_stock_id`)
     VALUES ('" . $d["cart_qty"] . "','" . $orderHistryId . "','" . $d["Stock_stock_id"] . "')");

        $rs2 = Database::search("SELECT * FROM `stock` WHERE `stock_id` = '" . $d["Stock_stock_id"] . "'");
        $d2 = $rs2->fetch_assoc();

        $newQty = $d2["qty"] - $d["cart_qty"];

        Database::iud("UPDATE `stock` SET `qty` = '".$newQty."' WHERE `stock_id` = '" . $d["Stock_stock_id"] . "'");


    }

    Database::iud("DELETE FROM `cart` WHERE `user_id` = '".$user["id"]."'");
    // echo("Success");

    $order = array();
    $order["resp"]= "Success";
    $order["order_id"] = $orderHistryId;

    echo json_encode($order);
}
