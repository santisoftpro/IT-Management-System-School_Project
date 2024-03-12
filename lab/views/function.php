<?php
session_start();
include('smtp/PHPMailerAutoload.php');
include '../class/config/config.php';

function smtp_mailer($to, $subject, $msg)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "andrewellicky97@gmail.com";
    $mail->Password = "orqehkhbucxteplp";
    $mail->setFrom('andrewellicky97@gmail.com', 'UNILAK KIGALI COMPUS');
    $mail->Subject = $subject;
    $mail->Body = 'Greeting! ' . $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        )
    );
    if (!$mail->Send()) {
        echo $mail->ErrorInfo;
    } else {
        return 'sending...';
    }
}

function add_newstudent($sid_number, $s_fname, $s_lname, $s_gender, $s_compus, $s_contact, $s_department, $s_major, $s_year, $s_section)
{
    global $conn;

    $h_desc = 'add new student';
    $h_tbl = 'client';
    $sessionid = $_SESSION['admin_id'];
    $sessiontype = $_SESSION['admin_type'];

    $type = 'Student';

    $sql = $conn->prepare('SELECT * FROM member WHERE m_school_id = ? AND m_fname = ? AND m_lname = ? AND m_type = ?');
    $sql->execute(array($sid_number, $s_fname, $s_lname, $type));
    $sql_count = $sql->rowCount();

    if ($sql_count <= 0) {
        $insert_member = $conn->prepare('INSERT INTO member(m_school_id, m_fname, m_lname, m_gender, m_compus, m_contact, m_department, m_year_section, m_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $insert_logs = $conn->prepare('INSERT INTO history_logs(description, table_name, user_id, user_type) VALUES (?, ?, ?, ?)');

        $insert_member->execute(array($sid_number, $s_fname, $s_lname, $s_gender, $s_compus, $s_contact, $s_department, $s_year . ' - ' . $s_section, $type));
        $insert_logs->execute(array($h_desc, $h_tbl, $sessionid, $sessiontype));

        $insert_count = $insert_member->rowCount();

        if ($insert_count > 0) {
            return 1;
        } else {
            return 0;
        }
    } else {
        return 2;
    }
}

if (isset($_POST['add_newstudent'])) {
    $sid_number = trim($_POST['sid_number']);
    $s_fname = ucwords(trim($_POST['f_fname']));
    $s_lname = ucwords(trim($_POST['s_lname']));
    $s_gender = trim($_POST['s_gender']);
    $s_compus = trim($_POST['s_compus']);
    $s_contact = trim($_POST['s_contact']);
    $s_department = trim($_POST['s_department']);
    $s_major = trim($_POST['s_major']);
    $s_year = trim($_POST['s_year']);
    $s_section = ucwords(trim($_POST['s_section']));
    $results = add_newstudent($sid_number, $s_fname, $s_lname, $s_gender, $s_compus, $s_contact, $s_department, $s_major, $s_year, $s_section);

    if ($results == 1) {
        require './connect.php'; // Assuming this file connects to the database
        $sql = mysqli_query($con, "SELECT * FROM branches WHERE branche_name='$s_compus'");
        while ($row = mysqli_fetch_array($sql)) {
            $email = $row["emails"];
            $phoneNumber = $row["phoneNumber"];
        }
        $_SESSION['status'] = 'success';
        $_SESSION["msg"] = "Student Inserted Successfully";
        echo smtp_mailer($email, "Student Insertion", "Hello $s_compus. The new Student details: student id = $sid_number,  Full Name $s_fname  $s_lname");
        header("Location: members");
        exit();
    } elseif ($results == 2) {
        $_SESSION['status'] = 'error';
        $_SESSION["msg"] = "Student already exists";
        header("Location: members");
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION["msg"] = "Failed to add student";
        header("Location: members");
    }
}
?>