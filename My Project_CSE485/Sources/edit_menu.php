<?php 
include('session.php');
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sửa danh mục</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
</head>
<body>
	<nav style="text-align: right; background-color: #D3D3D3;">
		<h2 style="display: inline-block;">Chào mừng admin: </h2><h1 style="display: inline-block; margin-left: 5px;"><?php echo "<p style='font-weight:bold; font-size:50px; display:inline-block'>$login_session</p>" ?></h1><h2 style="display: inline-block; margin-left: 5px"> đã trở lại</h2>
	</br>
	<?php echo'<a href="information.php?id='.$ma_admin_session.'" style="font-size: 17px">Thông tin cá nhân</a>'
	?>
</br>
<a href="success.php" style="font-size: 17px">Trở về trang quản trị</a>
<br>
<a href="logout.php" style="font-size: 17px">Đăng Xuất</a>
</nav>
</br>
<h2 style="display: inline-block;">Sửa danh mục cũ: </h2> 
<?php  
$ma_danh_muc = $_GET['id'];
$sql="SELECT danh_muc from menu where ma_danh_muc = '$ma_danh_muc'";
$result=mysqli_query($conn, $sql);
if ($row=mysqli_fetch_array($result)) {
	echo "<h3 style='display: inline-block;'>".$row['danh_muc']."</h3>";
}
?>
</br>
<form method="POST">
	<label style="font-weight: bold; font-size: 20px" for="edit_brand">Tên danh mục mới:</label>
	<input type="text" name="sua_danh_muc" id="sua_danh_muc">
	<input type="submit" name="smSua" value="Sửa" onclick="alert('Sửa thành công')">
</form>
<?php
if (isset($_POST['smSua'])) {
	$danh_muc_moi = $_POST['sua_danh_muc'];
	$danh_muc_moi = strip_tags($danh_muc_moi);
	$danh_muc_moi = addslashes($danh_muc_moi); 
	$ma_danh_muc = $_GET['id'];
	$sql="SELECT danh_muc from menu";
	$result=mysqli_query($conn, $sql);
	while ($row=mysqli_fetch_array($result)) {
		$sql = "SELECT danh_muc from menu where danh_muc like '%$danh_muc_moi%'";
		$query=mysqli_query($conn,$sql);
	}
	if (mysqli_fetch_array($query)) {
		echo "Danh mục đã tồn tại";
	}else if ($danh_muc_moi=="") {
		echo "Tên danh mục không được để trống";
	}else {
		$sql = "UPDATE menu SET danh_muc = '$danh_muc_moi' where ma_danh_muc = '$ma_danh_muc'";
		$result = mysqli_query($conn,$sql);	
		header("location: success.php");
	}
}
?>
</body>
</html>