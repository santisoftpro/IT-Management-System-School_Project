<?php
require_once '../class/config/config.php';
session_start();

if (isset($_POST['add_eqquipment'])) {

    $e_model = $_POST['e_model'];
    $e_number = $_POST['e_number'];
    $e_category = $_POST['e_category'];
    $e_brand = $_POST['e_brand'];
    $e_description = $_POST['e_description'];
    $e_stock = $_POST['e_stock'];
    // $e_assigned = $_POST['e_assigned'];
    $e_type = $_POST['e_type'];
    $e_status = $_POST['e_status'];
    $e_mr = $_POST['e_mr'];
    $e_branch = $_POST['e_branch'];
    $e_price = $_POST['e_price'];

    $h_desc = 'add new equipment' . $e_model . ' , ' . $e_category;
    $h_tbl = 'equipment';
    $sessionid = 1;
    $sessiontype = 1;



    $sql = $conn->prepare('INSERT INTO item(i_deviceID, i_model, i_category, i_brand, i_description, i_type, item_rawstock, i_mr, branch_name, i_price)
                                            VALUES(?,?,?,?,?,?,?,?,?,?)');
    $sql->execute(array($e_number, $e_model, $e_category, $e_brand, $e_description, $e_type, $e_stock, $e_mr, $e_branch, $e_price));
    $row = $sql->rowCount();
    $itemID = $conn->lastInsertId();

    $imageName = $_FILES['e_photo']['name'];
    $extension = pathinfo($imageName, PATHINFO_EXTENSION);
    $tmpData = $_FILES['e_photo']['tmp_name'];
    $fileName = time();
    $fileStatus = move_uploaded_file($tmpData, '../uploads' . $fileName . "." . $extension);

    $file = "";

    if ($fileStatus):
        $file = $fileName . "." . $extension;
        $sql = $conn->prepare('UPDATE item SET i_photo = ? WHERE id = ?');
        $sql->execute(array($file, $itemID));
    endif;

    if ($row > 0) {
        $item = $conn->prepare('INSERT INTO item_stock (item_id, room_id, items_stock, item_status)
                                    VALUES(?,?,?,?)');
        $item->execute(array($itemID, $e_assigned, $e_stock, $e_status));
        $countitem = $item->rowCount();
        if ($countitem > 0) {
            $history = $conn->prepare('INSERT INTO history_logs(description,table_name,user_id,user_type) VALUES(?,?,?,?)');
            $history->execute(array($h_desc, $h_tbl, $sessionid, $sessiontype));
            $historycount = $history->rowCount();
            echo $historycount;
        }

    } else {
        echo '0';
    }



}



?>