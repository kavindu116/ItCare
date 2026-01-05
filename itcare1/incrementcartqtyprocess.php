<?php 
include "connection.php";
$cartId = $_POST["cid"];
$newQty = $_POST["q"];
// echo($newQty);

$rs = Database::search(" SELECT * FROM `cart` INNER JOIN `stock` ON `cart`.Stock_stock_id=`stock`.stock_id
WHERE `cart`.cart_id = '".$cartId."'");
$num = $rs->num_rows;

if($num > 0){
//cart item found

$d = $rs->fetch_assoc();
if ($d["qty"] >= $newQty) {
   //Update Query
Database::iud("UPDATE `cart` SET `cart_qty` = '".$newQty."' WHERE `cart_id` = '".$cartId."'");
echo("Success");
} else {
    echo("Your Product Qty Excceded!");
}



}else{
//cart item not found
echo("Cart Item Not Found");
}


?>