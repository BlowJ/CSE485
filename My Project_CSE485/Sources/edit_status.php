<?php
include ("config.php");
include ("session.php");
$id = $_GET['id'];
$id2 = $_GET['id2'];
$sql = "SELECT trang_thai_don_hang from trang_thai_don_hang where IDTrangThai = '$id2'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
$trang_thai_don_hang = $row['trang_thai_don_hang'];
$sql = "UPDATE donhang_user SET trang_thai_don_hang = '$trang_thai_don_hang'";
$query = mysqli_query($conn, $sql);
header("location: success.php");
?>