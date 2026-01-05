<?php
// echo("okphp");
include "connection.php";

$mod = $_POST["m"];

if(empty($mod)){
    echo ("Please Enter Your Model Name");
}else if (strlen($mod) > 40) {
    echo ("Your Model Name Should Be Less Than 20 Caracters");
}else{
    // echo("success");
    $rs = Database::search("SELECT * FROM `model` WHERE `model_name` = '" . $mod . "'");
    $num = $rs->num_rows;

    if($num > 0){
        echo("The Model Name You Enter Alredy Exists");
    }else{
        Database::iud("INSERT INTO `model` (`model_name`) VALUES ('".$mod."')");
        echo("Success");
    }
}



?>