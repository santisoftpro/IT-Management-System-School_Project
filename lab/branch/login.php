<?php

include '../views/connect.php';
?>


<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title></title>

	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="../assets/custom/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/custom/css/bootstrap-table.css">
	<link rel="stylesheet" type="text/css" href="../assets/custom/css/datepicker.css">
	<link rel="stylesheet" type="text/css" href="../assets/custom/css/datepicker3.css">
	<!-- <link rel="stylesheet" type="text/css" href="../assets/custom/css/styles.css"> -->

	<!-- toastr -->
	<link rel="stylesheet" type="text/css" href="../assets/toastr/css/toastr.css">

	<!-- custom -->
	<!-- <link rel="stylesheet" type="text/css" href="../assets/mycustom/css/styles.css"> -->
	<link rel="stylesheet" href="style.css">


</head>

<body class="index-body login">


	<form class="frm_index">
		<div class="logo">
			<img src="logo.png" alt="">
		</div>
		<header>
			<p>Compus Login</p>
		</header>
		<div class="form_wrapper">
			<div class="triangle left"></div>
			<input class="" placeholder="Username" name="username" type="username" autofocus="" autocomplete="off">
			<div class="triangle right"></div>
		</div>
		<div class="form_wrapper">
			<div class="triangle left"></div>
			<input class="" placeholder="Password" name="password" type="password" value="">
			<div class="triangle right"></div>
		</div>
		<div class="form_wrapper">
			<div class="triangle left"></div>
			<select name="e_branch" class="" required>
				<option disabled selected>Please select Compus</option>
				<?php

				$query = mysqli_query($con, "SELECT * FROM branches");
				while ($rw = mysqli_fetch_array($query)) {
					?>

					<option value="<?= $rw['branche_name']; ?>">
						<?= $rw['branche_name']; ?>
					</option>
					<?php
				}

				?>

			</select>
			<div class="triangle right"></div>
		</div>
		<br>
		<button class="">Log in</button>
		<br>
		<a href="../../index.php"> Go to Home</a>
		</fieldset>
	</form>





	<script type="text/javascript" src="../assets/custom/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../assets/custom/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/toastr/js/toastr.min.js"></script>
	<script type="text/javascript" src="../assets/mycustom/js/branch.js"></script>

	<body>

</html>