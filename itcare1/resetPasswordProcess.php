<?php
include "connection.php";

$vcode = $_POST["vcode"];
$np = $_POST["np"];
$np2 = $_POST["np2"];

if($np == $np2){

    $rs = Database::search("SELECT * FROM `user` WHERE `vcode` = '".$vcode."'");
    $num = $rs->num_rows;

    if($num > 0){

        $d = $rs->fetch_assoc();

        Database::iud("UPDATE `user` SET `password` = '".$np."' , `vcode` = NULL WHERE `id` = '".$d["id"]."'");
        echo("success");


    }else{
        echo("User Not Found..!");
    }


}else{
    echo("Passowrd Doesn't Mach");
}


?>