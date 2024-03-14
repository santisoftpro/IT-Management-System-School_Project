<?php
session_start();

include '../views/connect.php';
include('smtp/PHPMailerAutoload.php');
$fname = $_GET['fname'];
$branch_name = $_GET['branches'];
$message = $_GET['message'];

$sql = mysqli_query($con, "SELECT * FROM branches WHERE branche_name='$branch_name'");
while ($row = mysqli_fetch_array($sql)) {
	$email = $row["emails"];
	$phoneNumber = $row["phoneNumber"];
}

echo smtp_mailer($email, 'Your Request', 'We have recieved your request, wait for Approvel From Main Compus(UNILAK KIGALI)');
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
	$mail->Body = 'greeting!! ' . $_GET['branches'] . ', ' . $msg;
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

?>


<?php
if (isset($_GET['request'])) {

	$sql = "INSERT INTO `request`( `names`, `branch_name`,`messages`,`status`, `dates`) VALUES ('$fname','$branch_name','$message','padding',current_timestamp()";
	$query_run = mysqli_query($con, "INSERT INTO `request`( `names`, `branch_name`,`messages`,`status`, `dates`) VALUES ('$fname','$branch_name','$message','padding',current_timestamp())");
	if ($query_run) {


		$_SESSION['status'] = 'success';
		$_SESSION["msg"] = "The request is sent";


	} else {
		$_SESSION['status'] = 'error';
		$_SESSION["msg"] = "Failed to Send Request";
	}

	header("Location: request");
}




?>