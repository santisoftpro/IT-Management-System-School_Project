<?php
$servername = "localhost";
$username = "u106709385_root";
// $username = "root";
$password = "Santima@123";
// $password = "";


try {
    $conn = new PDO("mysql:host=$servername;dbname=u106709385_lms20", $username, $password);
    // $conn = new PDO("mysql:host=$servername;dbname=lms20", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; 
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
