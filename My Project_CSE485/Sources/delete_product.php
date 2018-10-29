<?php 
include('session.php');
include('config.php');
$ma_mon = $_GET['id'];
$sql = "DELETE from food where ma_mon = $ma_mon";
$result = mysqli_query($conn,$sql);
header("location:success.php");
?>
