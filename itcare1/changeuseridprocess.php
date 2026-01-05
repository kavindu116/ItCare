<?php
//echo("okphp");
include "connection.php";

$userid = $_POST["uid"];

if (empty($userid)) {
    echo ("Please Enter User Id");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $userid . "' AND `user_type_id` = '2'");
    $num = $rs->num_rows;

    if ($num == "0") {
        echo ("Invalid User Id");
    } else {
        $data = $rs->fetch_assoc();
        $status = $data["status"];

        if ($status == "0") {
            Database::iud("UPDATE `user` SET `status` = '1' WHERE `id` = '" . $userid . "'");
            echo ("Activated");
        } elseif ($status == "1") {
            Database::iud("UPDATE `user` SET `status` = '0' WHERE `id` = '" . $userid . "'");
            echo ("Deactivated");
        }
    }
}
