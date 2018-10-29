<?php 
include('session.php');
include('config.php');
$ma_danh_muc = $_GET['id'];
$sql = "DELETE from menu where ma_danh_muc = $ma_danh_muc";
$result = mysqli_query($conn,$sql);
header("location:success.php");
?>
