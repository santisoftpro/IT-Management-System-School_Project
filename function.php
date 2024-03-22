<?php
session_start();
include './lab/views/smtp/PHPMailerAutoload.php';


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
    //$mail->SMTPDebug = 2; 
    $mail->Username = "andrewellicky97@gmail.com";
    $mail->Password = "orqehkhbucxteplp";
    // $mail->SetFrom("");
    $mail->setFrom('andrewellicky97@gmail.com', 'UNILAK KIGALI COMPUS');
    $mail->Subject = $subject;
    $mail->Body = 'Greeting!!' . $msg;
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


function insertBooking($fullName, $email, $services, $specialRequest)
{
    include './lab/views/connect.php';
    $message = "$fullName Your booking is Recieved";
    $query = "INSERT INTO `booking`(`fullName`, `emails`, `servicecs`, `specialRequest`) VALUES ('$fullName','$email','$services','$specialRequest')";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['status'] = 'success';
        $_SESSION["msg"] = "Data is update";
        echo smtp_mailer($email, "Booking", $message);
        header("Location: index.php");
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION["msg"] = "Error: " . mysqli_error($con);
        header("Location: index.php");
    }
}

if (isset ($_POST['insertBooking'])) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $services = $_POST['services'];
    $specialRequest = $_POST['specialRequest'];

    insertBooking($fullName, $email, $services, $specialRequest);

}


?>