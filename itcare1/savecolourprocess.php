<?php
// echo("okphp");
include "connection.php";

$color = $_POST["clr"];

if(empty($color)){
    echo ("Please Enter Your Color Name");
}else if (strlen($color) > 20) {
    echo ("Your Color Name Should Be Less Than 20 Caracters");
}else{
    // echo("success");
    $rs = Database::search("SELECT * FROM `color` WHERE `color_name` = '" . $color . "'");
    $num = $rs->num_rows;

    if($num > 0){
        echo("The Color Name You Enter Alredy Exists");
    }else{
        Database::iud("INSERT INTO `color` (`color_name`) VALUES ('".$color."')");
        echo("Success");
    }
}


?>