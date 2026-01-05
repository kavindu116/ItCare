<?php
//echo("okphp");

session_start();
include "connection.php";

$username = $_POST["un"];
$password = $_POST["pw"];
$rememberme = $_POST["rm"];

if (empty($username)) {
    echo ("Please Enter Your User Name");
} elseif (empty($password)) {
    echo ("Please Enter your Password");
} else {
    $rs = Database::search("SELECT * FROM `user` WHERE `user_name`='" . $username . "' AND `password` = '" . $password . "'");
    $num = $rs->num_rows;
    $data = $rs->fetch_assoc();
    if ($num == 1) {

        if ($data["status"] == 1) {
            echo ("Success");

            $_SESSION["u"] = $data;

            if ($rememberme == "true") {
                setcookie("username", $username, time() + (60 * 60 * 24 * 365));
                setcookie("password", $password, time() + (60 * 60 * 24 * 365));
            }else{
                setcookie("username","",-1);
                setcookie("password","",-1);
            }
        } else {
            echo ("Inactive User");
        }
    } else {
        echo ("Invalid Usere Name or Password");
    }
}


?>