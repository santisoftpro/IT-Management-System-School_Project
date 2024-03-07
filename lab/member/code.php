<?php

require_once '../class/config/config.php';
session_start();

if (isset($_POST['addreservation'])) {
    $items = $_POST['reserve_item'];
    $date = $_POST['reserved_date'];
    $time = $_POST['reserved_time'];
    $client_id = $_POST['client_id'];
    $assign_room = $_POST['reserve_room'];
    // $timeLimit = $_POST['time_limit'];
    $timeLimit = date('Y-m-d H:i:s', strtotime($_POST['time_limit']));
    $code = date('mdYhis') . '' . $client_id;



    if ($client_id == 0) {
        echo '3'; // Client ID is 0, indicating an issue
    } else {
        foreach ($items as $key => $item) {
            $itemsArr = explode("||", $item);
            echo "<pre>";
            print_r($itemsArr);
            echo "</pre>";

            // Check if itemsArr has at least two elements before accessing index 1
            if (isset($itemsArr[1])) {
                $sql = $conn->prepare('INSERT INTO reservation(reservation_code,member_id,item_id,stock_id,reserve_date,reservation_time,assign_room,time_limit) VALUES(?,?,?,?,?,?,?,?)');
                $sql->execute(array($code, $client_id, $itemsArr[0], $itemsArr[1], $date, $time, $assign_room, $timeLimit));
                $count = $sql->rowCount();
            } else {
                echo 'Error: Item data format is incorrect';
                exit(); // Exit the script to prevent further execution
            }
        }
        echo ($count > 0) ? '1' : '0'; // Output success or failure based on insertion result
    }

    $_SESSION['status'] = "success";
    $_SESSION['msg'] = "Succefully Reserved";

    // Redirect after processing
    header("Location: reserve_logs");
    exit(); // Exit the script after redirection
}

?>