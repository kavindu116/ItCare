<?php
// echo("okphp");
include "connection.php";

$brand = $_POST["brand"];

// echo($brand);

if (empty($brand)) {
    echo ("Please Enter Your Brand Name");
} else if (strlen($brand) > 20) {
    echo ("Your Brand Name Should Be Less Than 20 Caracters");
} else {
    //echo("Success");
    $rs = Database::search("SELECT * FROM `brand` WHERE `brand_name` = '" . $brand . "'");
    $num = $rs->num_rows;
    //echo ($num);

    if($num > 0){
        echo("The Brand You Enter Alredy Exists");
    }else{
        Database::iud("INSERT INTO `brand` (`brand_name`) VALUES ('".$brand."')");
        echo("Success");
    }
}
