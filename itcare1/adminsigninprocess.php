<?php
session_start();
include "connection.php";
// echo("okphp");
$uname = $_POST["un"];
$password = $_POST["pw"];

// echo($uname);

if(empty($uname)){
    echo("Please Enter Your User Name");
}elseif(empty($password)){
    echo("Please Enter Your Password");
}else{
    $rs = Database::search("SELECT * FROM `user` WHERE `user_name`= '".$uname."' AND `password` = '".$password."'");
    $num = $rs->num_rows;

    if($num == 1){
        //echo("Success");
        $data = $rs->fetch_assoc();

        if($data["user_type_id"] == 1){

            echo("Success");

            $_SESSION["a"] = $data;
            
        }else{
            echo("You Don't Have Admim Account");
        }

    }else{
        echo("Invalid User Name Or Password");
    }
    //echo("Success");
}

?>