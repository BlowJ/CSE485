<?php 
include('session.php');
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cập nhật trạng thái đơn hàng</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
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
	</div>
</div>
<div class="row"> 
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<h2 style="display: inline-block;">Sửa trạng thái đơn hàng cũ: </h2> 
		<?php  
		$IDDonHang = $_GET['id'];
		$sql="SELECT trang_thai_don_hang from donhang_user where IDDonHang = '$IDDonHang'";
		$result=mysqli_query($conn, $sql);
		if ($row=mysqli_fetch_array($result)) {
			echo "<h3 style='display: inline-block;'>".$row['trang_thai_don_hang']."</h3>";
		}
		?>
	</br>
	<form method="POST">
		<label style="font-weight: bold; font-size: 20px" for="edit_brand">Trạng thái đơn hàng mới:</label>
		<br>
		<select name="status" method="POST" style="height: 26px">
			<option value="Đã xác nhận đơn hàng">Đã xác nhận đơn hàng</option>
			<option value="Đơn hàng đang được vận chuyển">Đơn hàng đang được vận chuyển</option>
			<option value="Đơn hàng đã được giao thành công">Đơn hàng đã được giao thành công</option>
		</select>
		<input type="submit" name="smSua" value="Cập nhật" onclick="alert('Cập nhật trạng thái đơn hàng thành công')">
	</form>
	<?php
	if (isset($_POST['smSua'])) {
		$iddonhang = $_GET['id'];
		echo $trang_thai_don_hang = $_POST['status'];
		$sql = "UPDATE donhang_user SET trang_thai_don_hang = N'$trang_thai_don_hang' where IDDonHang = '$iddonhang'";
		$query = mysqli_query($conn, $sql);
		header("location: success.php");
	}
	?>
</div>
<div class="col-md-2"></div>
</div>
</div>
</body>
</html>