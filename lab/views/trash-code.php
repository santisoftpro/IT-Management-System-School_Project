<?php


if (isset($_POST['action'])) {
    if ($_POST['action'] == 'requestedReport') {
        $reported = $_POST['selectReported'];
        $compus_Name = $_POST['selectBranchReported'];
        $query = "SELECT * FROM request WHERE branch_name='$compus_Name' AND status='$reported'";

        $query_run = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($query_run)) {
            $date = ($row['dates'] == 'NULL' || $row['dates'] == NULL) ? " --- " : date('F d,Y H:i:s A', strtotime($row['dates']));
            if ($row['branch_name'] != "") {
                $compus = $row['branch_name'];
            } else {
                $compus = "Kigali Compus";
            }
            ?>
            <tr>
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

            </tr>
            <?
        }
    } elseif ($_POST['action'] == 'fetchData') {



        $sql = 'SELECT * FROM request ORDER BY names ASC';
        $query_run = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($query_run)) {
            $date = ($row['dates'] == 'NULL' || $row['dates'] == NULL) ? " --- " : date('F d,Y H:i:s A', strtotime($row['dates']));
            // $date2 = date('F d,Y H:i:s A', strtotime($row['date_borrow']));
            if ($row['branch_name'] != "") {
                $compus = $row['branch_name'];
            } else {
                $compus = "Kigali Compus";
            }
            ?>

            <tr>
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

            </tr>

            <?php
        }


    } else {
        echo "no data found";
    }


}