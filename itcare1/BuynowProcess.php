<?php
include "connection.php";
session_start();

$user = $_SESSION["u"];

if(isset($_POST["payment"])){

    $payment = json_decode($_POST["payment"], true);

    $date = new DateTime();
    $date->setTimezone(new DateTimeZone("Asia/Colombo"));
    $time = $date->format("y-m-d H-i-s");

    Database::iud("INSERT INTO `order_histry` (`order_id`,`order_date`,`amout`,`user_id`)
    VALUES ('" . $payment["order_id"] . "','" . $time . "','" . $payment["amount"] . "','" . $user["id"] . "')");

    $orderHistryId = Database::$connection->insert_id;

    Database::iud("INSERT INTO `order_item` (`oiQty`,`order_histry_ohid`,`stock_stock_id`)
    VALUES ('" . $payment["qty"] . "','" . $orderHistryId . "','" . $payment["stock_id"] . "')");

    $rs = Database::search("SELECT * FROM `stock` WHERE `stock_id` = '".$payment["stock_id"]."'");
    $d = $rs->fetch_assoc();

    $newQty = $d["qty"] - $payment["qty"];

    Database::iud("UPDATE `stock` SET `qty` = '".$newQty."' WHERE `stock_id`='".$payment["stock_id"]."'");
    // echo("Success");

    $order = array();
    $order["resp"]= "Success";
    $order["order_id"] = $orderHistryId;

    echo json_encode($order);

}


?>