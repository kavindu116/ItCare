<?php
// echo("okphp");
include "connection.php";

$search = $_POST["s"];

//echo($search);
if (!empty($search)) {
    $query = ("SELECT * FROM `user` WHERE `user_name` LIKE '%" . $search . "%'");
?>
    <div class="mt-4">
        <?php
        $search_rs = Database::search($query);
        $num = $search_rs->num_rows;
        for ($x = 0; $x < $num; $x++) {
            $selected_data = $search_rs->fetch_assoc();

        ?>

            <tr>
                <th scope="row"><?php echo $selected_data["id"] ?></th>
                <td><?php echo $selected_data["fname"] ?></td>
                <td><?php echo $selected_data["lname"] ?></td>
                <td><?php echo $selected_data["email"] ?></td>
                <td><?php echo $selected_data["mobile"] ?></td>
                <td><?php echo $selected_data["status"] ?></td>
            </tr>






        <?php
        }
        ?>

    </div>
<?php
} else {
    echo ("Please Enter User Name");
}

?>