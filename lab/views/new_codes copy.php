<?php
include_once 'connect.php';
if (isset ($_POST['save_user'])) {
    $name = $_POST['u_fname'];
    $username = $_POST['u_username'];
    $password = $_POST['u_password'];
    $userType = $_POST['u_type'];
    $branchName = $_POST['u_branch'];

    $saveUserQuery = mysqli_query($con, "INSERT INTO `user`(`name`, `username`, `password`, `type`, `branches`, `status`) VALUES ('$name','$username ','$password','$userType','$branchName','1')") or die (mysqli_error($con));

    if ($saveUserQuery) {
        header("Location: user");
    } else {
        echo "failed";
    }

}

if (isset ($_POST['save_item'])) {

    $e_device = $_POST['e_number'];
    $e_model = $_POST['e_model'];
    $e_category = $_POST['e_category'];
    $e_brand = $_POST['e_brand'];
    $e_description = $_POST['e_description'];
    $e_type = $_POST['e_type'];
    $e_stock = $_POST['e_stock'];
    $e_status = $_POST['e_status'];
    $e_mr = $_POST['e_mr'];
    $e_branch = $_POST['e_branch'];
    $e_price = $_POST['e_price'];
    $e_assigned = $_POST['e_assigned'];

    session_start();
    $h_desc = 'add new equipment' . $e_model . ' , ' . $e_category;
    $h_tbl = 'equipment';
    $sessionid = $_SESSION['admin_id'];
    $sessiontype = $_SESSION['admin_type'];

    $imageName = $_FILES['e_photo']['name'];
    $extension = pathinfo($imageName, PATHINFO_EXTENSION);
    $tmpData = $_FILES['images']['tmp_name'];
    $fileName = time();
    $fileStatus = move_uploaded_file($tmpData, '../uploads/' . $fileName . "." . $extension);

    $file = "";

    if ($fileStatus):
        $file = $fileName . "." . $extension;
        $sql = $conn->prepare('UPDATE item SET i_photo = ? WHERE id = ?');
        $sql->execute(array($file, $itemID));
    endif;

    $saveItem = "";
    $runSaveItem = mysqli_query($con, "INSERT INTO `item`(`id`,`i_deviceID`, `i_model`, `i_category`, `i_brand`, `i_description`, `i_type`, `item_rawstock`, `i_status`, `i_mr`, `branch_name`, `i_price`, `i_photo`) VALUES (null,'$e_device','$e_model','$e_category','$e_brand','$e_description','$e_type','$e_stock','$e_status','$e_mr','$e_branch','$e_price','$file')") or die (mysqli_error($con));
    if ($runSaveItem) {
        header("Location: items");
        mysqli_query($con, "INSERT INTO history_logs(description,table_name,user_id,user_type) VALUES(?,?,?,?)'") or die (mysqli_error($con));

    } else {
        echo "failed";
    }

}
?>