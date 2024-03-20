<?php

include '../views/connect.php';

if (isset ($_POST['request'])) {
    $request = $_POST['request'];
    $query = "SELECT *, GROUP_CONCAT(item.i_deviceID, ' - ' ,item.i_category,  '<br/>') item_borrow FROM borrow
    LEFT JOIN item_stock ON item_stock.id = borrow.stock_id
    LEFT JOIN item ON item.id = item_stock.item_id
    LEFT JOIN member ON member.id = borrow.member_id WHERE item.branch_name='$name' AND 
    GROUP BY borrow.borrowcode";
}
?>