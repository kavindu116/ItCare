<?php
// echo("okphp");
include "connection.php";

$cat = $_POST["cat"];

if(empty($cat)){
    echo ("Please Enter Your Catagory Name");
}else if (strlen($cat) > 20) {
    echo ("Your Catagory Name Should Be Less Than 20 Caracters");
}else{
    // echo("success");
    $rs = Database::search("SELECT * FROM `category` WHERE `category_name` = '" . $cat . "'");
    $num = $rs->num_rows;

    if($num > 0){
        echo("The Category You Enter Alredy Exists");
    }else{
        Database::iud("INSERT INTO `category` (`category_name`) VALUES ('".$cat."')");
        echo("Success");
    }
}

?>