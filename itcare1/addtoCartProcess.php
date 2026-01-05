<?php
// echo("okphp");

include "connection.php";

session_start();
$user = $_SESSION["u"];
$stockId = $_POST["s"];
$qty = $_POST["q"];

//  echo($stockId);

$rs = Database::search("SELECT * FROM `stock` WHERE `stock_id` = '".$stockId."'");
$num = $rs->num_rows;

if ($num > 0) {
   //    echo ("instock");
      $d = $rs->fetch_assoc();
      $stockQty = $d["qty"];
   
      $rs2 = Database::search("SELECT * FROM `cart` WHERE `user_id` = '".$user["id"]."' AND `Stock_stock_id` = '".$stockId."'");
      $num2 = $rs2->num_rows;
   
      if($num2>0){
       // echo("update");
       // Update
   
      $d2 =  $rs2->fetch_assoc();
      $newQty = $qty + $d2["cart_qty"];
   
      if ($stockQty >= $newQty) {
           //update Query
           Database::iud("UPDATE `cart` SEt `cart_qty` = '".$newQty."' WHERE `cart_id` = '".$d2["cart_id"]."'");
           echo("Stock Update Has Been Successful");
      } else {
         echo("Out Of Stock!");
       }
   
      }else{
       // echo("Insert");
   
       if ($stockQty >= $qty) {
           Database::iud("INSERT INTO `cart` (`cart_qty`,`user_id`,`Stock_stock_id`) VALUES ('".$qty."','".$user["id"]."','".$stockId."')");
           echo("Cart Item Added Successfully");
       } else {
            echo("Out Of Stock!");
       }
   
      }
   } else {
      echo("Your Stock Is Not Found");
   }
   


?>