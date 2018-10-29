<?php
$currency = 'vnđ';
$host = 'localhost';
$user = 'lam';
$pass = '1234';
$db_name = 'food_order';
$conn = mysqli_connect($host, $user, $pass, $db_name);
$mysqli = new mysqli($host, $user, $pass,$db_name);
mysqli_set_charset($conn, 'UTF8');
mysqli_set_charset($mysqli, 'UTF8');
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
