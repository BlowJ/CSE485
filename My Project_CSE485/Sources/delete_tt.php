<?php 
include('session.php');
include('config.php');
$idtt = $_GET['id'];
$sql = "DELETE from tintuc where IDTT = $idtt";
$result = mysqli_query($conn,$sql);
header("location:success.php");
?>
