<?php
require_once "../class/config/config.php";
session_start();

if (!isset($_SESSION['branch_name'])) {
	header('Location: login');
}
?>