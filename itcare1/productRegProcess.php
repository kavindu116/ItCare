<?php

include "connection.php";

$pname = $_POST["pname"];
$brand = $_POST["brand"];
$cat = $_POST["cat"];
$mod = $_POST["mod"];
$color = $_POST["color"];
$desc = $_POST["desc"];





if (empty($pname)) {
    echo ("Please Enter a Product Name");
} elseif (strlen($pname) > 30) {
    echo ("Your Product Name Should Be Less Than 30 Caracters");
} else if ($brand == "0") {
    echo ("Please Select  a Brand");
} else if ($cat == "0") {
    echo ("Please Select a Category");
} else if ($mod == "0") {
    echo ("Please Select a Model");
} else if ($color == "0") {
    echo ("Please Select a Color");
} else if (empty($desc)) {
    echo ("Please Enter a Desciption");
} elseif (strlen($desc) > 100) {
    echo ("Your Product Discription Should Be Less Than 100 Caracters");
} else {

    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];

        $path = "resource//image" . uniqid() . ".png";
        move_uploaded_file($image["tmp_name"], $path);

        $rs = Database::search("SELECT * FROM `product` WHERE `product_name` = '" . $pname . "'");
        $num = $rs->num_rows;

        if ($num > 0) {
            echo ("Product has been already resgistered!");
        } else {
            Database::iud("INSERT INTO `product` (`product_name`,`discription`,`img_path`,`brand_id`,`color_id`,`category_id`,`model_id`)
     VALUES ('".$pname."','".$desc."','".$path."','".$brand."','".$color."','".$cat."','".$mod."')");

            echo ("Success");
        }
    } else {
        echo ("Please Select a product Image");
    }
}
