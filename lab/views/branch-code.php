<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "lms20");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



if ((isset($_POST['submit_branch_update']))) {
    $id = mysqli_real_escape_string($conn, $_POST['update_id']);
    $branch = mysqli_real_escape_string($conn, $_POST['b_name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $update_query = "UPDATE `branches` SET `branche_name`='$branch',`phoneNumber`='$phone',`emails`='$email' WHERE `branch_id` = '$id'";
    if (mysqli_query($conn, $update_query)) {
        $_SESSION['status'] = 'success';
        $_SESSION["msg"] = "Data is update";
        header("Location: branch");
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION["msg"] = "Error: " . mysqli_error($conn);
        echo "failde";
    }
}

$delete_branch = isset($_GET['delete_id']) ? $_GET['$branch'] : null;
if (!empty($delete_branch)) {
    $delete_query = "DELETE FROM `branches` WHERE `branch_id` = '$delete_branch'";
    if (mysqli_query($conn, $delete_query)) {
        $_SESSION['status'] = 'success';
        $_SESSION["msg"] = "The branch already Deleted";
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION["msg"] = "Error: " . mysqli_error($conn);
    }
}
?>