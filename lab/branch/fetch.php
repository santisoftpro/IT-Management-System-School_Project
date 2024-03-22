<?php

include '../views/connect.php';
session_start();
if (isset ($_POST['request'])) {
    $request = $_POST['request'];

    $query = "SELECT * FROM request WHERE branch_name='$_SESSION[branch_name]' AND status='$request' ORDER BY names ASC";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);


    if ($count) {


        ?>


        <thead>
            <tr>
                <th>Names</th>
                <th>Compus Name</th>
                <th>Messages</th>
                <th>Status</th>
                <th>Date</th>
                <th>Respomse</th>
            </tr>
            <?php
    } else {
        echo "Sorry! no record found";
    }
    ?>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <td>
                <?= $row['names'] ?>
            </td>
            <td>
                <?= $compus ?>
            </td>
            <td>
                <?= $row['messages'] ?>
            </td>
            <td>
                <?= $row['status'] ?>
            </td>
            <td>
                <?= $date ?>
            </td>
            <td>
                <?= $row['response'] ?>
            </td>

            <?php
        }

        ?>
    </tbody>

    <?php
}
?>