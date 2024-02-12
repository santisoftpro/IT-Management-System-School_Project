<?php

include("connect.php");




if (isset($_POST['action'])) {

    $output = '';
    // displaying requesting report
    if ($_POST['action'] == 'fetchData') {
        $query = "SELECT * FROM request ORDER BY names ASC";
        getData($query);
    }
    if ($_POST['action'] == 'requestedReport') {
        $reported = $_POST['selectReported'];
        $compus_Name = $_POST['selectBranchReported'];
        $query = "SELECT * FROM request WHERE branch_name='$compus_Name' AND status='$reported'";
        getData($query);
    }
    // end displaying requesting report

    //displaying borrowed reports
    if ($_POST['action'] == 'displayBorrowed') {
        $query = 'SELECT *, GROUP_CONCAT(item.i_deviceID, " - " ,item.i_category,  "<br/>") item_borrow FROM borrow
        LEFT JOIN item_stock ON item_stock.id = borrow.stock_id
        LEFT JOIN item ON item.id = item_stock.item_id
        LEFT JOIN member ON member.id = borrow.member_id
        GROUP BY borrow.borrowcode';
        borrowedData($query);
    }
    if ($_POST['action'] == 'borrowingReport') {
        $month = $_POST['monthBorred'];
        $year = $_POST['yearBorred'];
        $compus = $_POST['borredCompus'];
        if ($month != '' && $year != '' && $compus != '') {
            $query = "SELECT *, GROUP_CONCAT(item.i_deviceID, ' - ' ,item.i_category,  '<br/>') item_borrow FROM borrow
            LEFT JOIN item_stock ON item_stock.id = borrow.stock_id
            LEFT JOIN item ON item.id = item_stock.item_id
            LEFT JOIN member ON member.id = borrow.member_id
            WHERE MONTH(borrow.date_borrow) = '$month' AND  YEAR(borrow.date_borrow) = '$year' AND item.branch_name ='$compus'
            GROUP BY borrow.borrowcode";
        }
        borrowedData($query);
    }
    // end displaying borrowed reports


    // displaying Inventory reports
    if ($_POST['action'] == 'displayInventory') {
        $query = "SELECT *,item.branch_name as compus FROM item LEFT JOIN item_stock ON item_stock.item_id = item.id GROUP BY item.i_category";
        inventoryDisplay($query);
    }
    if ($_POST['action'] == 'searchByStatus') {
        $compus = $_POST['status_name'];
        $query = "SELECT *,item.branch_name as compus FROM item LEFT JOIN item_stock ON item_stock.item_id = item.id WHERE item.branch_name='$compus' GROUP BY item.i_category";
        inventoryDisplay($query);
    }


    // end of displaying Inventory reports
}


// end of requesting report
function getData($query)
{
    include("connect.php");
    $output = "";
    $total_row = mysqli_query($con, $query) or die('error');
    if (mysqli_num_rows($total_row) > 0) {
        foreach ($total_row as $row) {
            $date = ($row['dates'] == 'NULL' || $row['dates'] == NULL) ? " --- " : date('F d,Y H:i:s A', strtotime($row['dates']));
            if ($row['branch_name'] != "") {
                $compus = $row['branch_name'];
            } else {
                $compus = "Kigali Compus";
            }
            $output .= '
                <tr>
                <td>' . $row['names'] . '</td>
                <td>' . $compus . '</td>
                <td>' . $row['messages'] . '</td>
                <td>' . $row['status'] . '</td>
                <td>' . $date . '</td>
                <td>' . $row['response'] . '</td>


                </tr>
            ';
        }
    } else {
        $output = "<h4>Post not found </h4>";
    }
    echo $output;
}

function borrowedData($query)
{
    include("connect.php");
    $output = "";
    $total_row = mysqli_query($con, $query) or die('error');
    if (mysqli_num_rows($total_row) > 0) {
        foreach ($total_row as $row) {
            $date = ($row['date_return'] == 'NULL' || $row['date_return'] == NULL) ? " --- " : date('F d,Y H:i:s A', strtotime($row['date_return']));
            $date2 = date('F d,Y H:i:s A', strtotime($row['date_borrow']));
            if ($row['branch_name'] != "") {
                $compus = $row['branch_name'];
            } else {
                $compus = "Kigali Compus";
            }
            $output .= '
                <tr>
                <td>' . $row['m_fname'] . $row['m_lname'] . '</td>
                <td>' . $row['item_borrow'] . '</td>
                <td>' . $date . '</td>
                <td>' . $date2 . '</td>
                <td>' . $compus . '</td>

                </tr>
            ';
        }
    } else {
        $output = "<h4>Post not found </h4>";
    }
    echo $output;

}

function inventoryDisplay($query)
{
    include("connect.php");
    $output = "";
    $total_row = mysqli_query($con, $query) or die('error');
    if (mysqli_num_rows($total_row) > 0) {
        foreach ($total_row as $row) {
            $unusable = $row['item_rawstock'] - $row['items_stock'];
            if ($row['compus'] != "") {
                $compus = $row['compus'];
            } else {
                $compus = "Kigali Compus";
            }
            $output .= '
                <tr>
                <td style="text-align: center;">' . $row['i_category'] . '</td>
                <td style="text-align: center;">' . $row['items_stock'] . '</td>
                <td style="text-align: center;">' . $unusable . '</td>
                <td style="text-align: center;">' . $row['item_rawstock'] . '</td>
                <td style="text-align: center;">' . $compus . '</td>

                </tr>
            ';
        }
    } else {
        $output = "<h4>Post not found </h4>";
    }
    echo $output;

}









?>