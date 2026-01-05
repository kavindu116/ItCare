<?php
//echo("okphp");

include "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$uname = $_POST["u"];
$password = $_POST["p"];

if(empty($fname)){
    echo("Please Enter Your Frist Name.");
}elseif(strlen($fname) > 20){
    echo("Frist Name Must Contain LOWER THAN 20 Caracters.");
}elseif(empty($lname)){
    echo("Please Enter Your Last Name.");
}elseif(strlen($lname) > 20){
    echo("Last Name Must Contain LOWER THAN 20 Caracters.");
}elseif(empty($email)){
    echo("Please Enter Your Email Address.");
}elseif(strlen($email) > 100){
    echo("Email Address Must Contain LOWER THAN 100 Caracters.");
}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo("Invalid Email Address.");
}elseif(empty($mobile)){
    echo("Please Enter Your Mobile Number.");
}elseif(strlen($mobile) != 10){
    echo("Please Enter Your Mobile Number.");
}elseif(!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/",$mobile)){
    echo("Invalid Mobile Number.");
}elseif(empty($uname)){
    echo("please Enter Your User Name.");
}elseif(strlen($uname) > 20){
    echo("User Name Must Contain LOWER THAN 20 Caracters.");
}elseif(empty($password)){
    echo("Please Enter Your Psaaword.");
}elseif(strlen($password) < 5 || strlen($password) > 45){
    echo("The Password Must Contain 5 To 45 Caracters.");
}else{
     $rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."' OR `user_name` = '".$uname."' OR `mobile` = '".$mobile."'");
     $num = $rs->num_rows;

     if($num > 0 ){
        echo("User With The Same Email Address,Mobile Number Or User Name Alredy Exists.");
    }else{
        Database::iud("INSERT INTO `user` (`fname`,`lname`,`email`,`mobile`,`user_name`,`password`,`user_type_id`)
         VALUES ('".$fname."','".$lname."','".$email."','".$mobile."','".$uname."','".$password."','2')");

        echo("Success");
    }

}


?>