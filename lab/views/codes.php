<?php
session_start();

include('smtp/PHPMailerAutoload.php');
include 'connect.php';

$requstId = $_GET['requstId'];
$status = $_GET['status'];
$e_message = $_GET['e_message'];
$branchName = $_GET['compus'];

$sql = mysqli_query($con, "SELECT * FROM branches WHERE branche_name='$branchName'");
while ($row = mysqli_fetch_array($sql)) {
    $email = $row["emails"];
    $phoneNumber = $row["phoneNumber"];
}

$response = 'Response' . $status;
echo smtp_mailer($email, $response, $e_message);
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
    $mail->Body = 'greeting!! ' . $msg;
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

if (isset($_GET['confirmRequest'])) {

    $query = "UPDATE request SET status='$status', response='$e_message' WHERE id='$requstId'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        // $msg = array(
        //     "quantity" => $new_res[''],
        //     "msg" => "stock not eanough",
        // );
        $msg = $branchName . ", " . $e_message;
        // echo $msg;
        $data = array(
            "sender" => '+250780042383',
            "recipients" => $phoneNumber,
            "message" => $msg,
        );

        $url = "https://www.intouchsms.co.rw/api/sendsms/.json";
        $data = http_build_query($data);
        $username = "santima";
        $password = "ProSANTISOFT";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // echo $result;

        // echo $httpcode;

        $_SESSION['status'] = 'success';
        $_SESSION["msg"] = "Request Is Sent to the branch by email";

    } else {
        $_SESSION['status'] = 'error';
        $_SESSION["msg"] = "Failed to Send Request";

    }
    header("Location: requesting");
}


?>