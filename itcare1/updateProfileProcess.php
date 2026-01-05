<?php
//echo("okphp");
session_start();
include "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$mobile = $_POST["m"];
$line1 = $_POST["l1"];
$line2 = $_POST["l2"];



// valitation
if(empty($fname)){
    echo("Please Enter Your Frist Name.");
}else if(strlen($fname) > 45){
    echo("Frist Name Must Contain LOWER THAN 45 Caracters.");
}else if(empty($lname)){
    echo("Please Enter Your last Name.");
}else if(strlen($lname) > 45){
    echo("Last Name Must Contain LOWER THAN 45 Caracters.");
}else if(empty($mobile)){
    echo("Please Enter Your Mobile Number.");
}else if(strlen($mobile) != 10){
    echo("Please Enter Your Mobile Number.");
}else if(!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/",$mobile)){
    echo("Invalid Mobile Number.");
}elseif(empty($line1)){
    echo("Please Enter Your Address.");

}else{
// user details update

$email = $_SESSION["u"]["email"];

$user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."'");
if($user_rs->num_rows == 1){

Database::iud("UPDATE `user` SET `fname` = '".$fname."',`lname` = '".$lname."',`mobile` = '".$mobile."',`line_1`='".$line1."',`line_2`='".$line2."'
WHERE `email` = '".$email."'");

echo("Success");

// image uptade

if(sizeof($_FILES) == 1){

    $image = $_FILES["i"];
    $image_extesion = $image["type"];

    $allowed_img_extensions = array("image/jpeg","image/png","image/svg+xml");

    if(in_array($image_extesion,$allowed_img_extensions)){
        $new_img_extesion;

        if($image_extesion == "image/jpeg"){
            $new_img_extesion = ".jpeg";
        }elseif($image_extesion == "image/png"){
            $new_img_extesion = ".png";
        }elseif($image_extesion == "image/svg+xml"){
            $new_img_extesion = ".svg";
        }

        $file_name = "resource/profile_img//".$fname." ".uniqid().$new_img_extesion;
        move_uploaded_file($image["tmp_name"],$file_name);

        $image_rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."'");
    

        if($image_rs->num_rows == 1){
            Database::iud("UPDATE `user` SET `img_path` = '".$file_name."' WHERE `email` = '".$email."'");
        }else{
            Database::iud("INSERT INTO  `user` (`email`,`path`)
            VALUES ('".$email."','".$file_name."')");
            echo("Saved");
        }
        
    }

}else{
    echo("You Have Not Selected Any Image!");
}

}else{
    echo("Invalid Email Address!");
}


}

// valitation



?>