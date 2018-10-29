<?php 
include('session.php');
include('config.php');
function fill_brand($conn)  
{  
	$output = '';  
	$sql = "SELECT * FROM menu ORDER BY ma_danh_muc";  
	$result = mysqli_query($conn, $sql);  
	while($row = mysqli_fetch_array($result))  
	{  
		$output .= '<option value="'.$row['ma_danh_muc'].'">'.$row["danh_muc"].'</option>';  
	}  
	return $output;  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sửa món</title>
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
<h2 style="display: inline-block;">Sửa sản phẩm cũ: </h2> 
<?php  
$ma_mon = $_GET['id'];
$sql="SELECT ten_mon from food where ma_mon = '$ma_mon'";
$result=mysqli_query($conn, $sql);
if ($row=mysqli_fetch_array($result)) {
	echo "<h3 style='display: inline-block;'>".$row['ten_mon']."</h3>";
}
?>
</br>
<form method="POST">
	<label style=" font-size: 20px; margin-right: 39px;" for="edit_product">Danh mục:</label>
	<select name="brand" id="brand" method="POST" style="height: 30px"> 
		<?php echo fill_brand($conn); ?>
	</select>
	<br>
	<label style=" font-size: 20px" for="edit_product">Tên món mới:</label>
	<input type="text" name="ten_mon" id="ten_mon" style="margin-left: 9px">
</br>
<label style="font-size: 20px" for="edit_product">Đơn giá mới:</label>
<input type="text" name="don_gia" id="don_gia" style="margin-left: 16px; margin-right: 10px">
<br>
<label style="font-size: 20px" for="edit_product">File ảnh mới:</label>
<input type="text" name="anh" id="anh" style="margin-left: 16px; margin-right: 10px">
<input type="submit" name="smSua" value="Sửa" onclick="alert('Sửa thành công')">
</form>
<?php
if (isset($_POST['smSua'])) {
	$ten_mon_moi = $_POST['ten_mon'];
	$ma_danh_muc = $_POST['brand'];
	$don_gia = $_POST['don_gia'];
	$anh = $_POST['anh'];
	$ten_mon_moi = strip_tags($ten_mon_moi);
	$ten_mon_moi = addslashes($ten_mon_moi); 
	$ma_danh_muc = strip_tags($ma_danh_muc);
	$ma_danh_muc = addslashes($ma_danh_muc); 
	$don_gia = strip_tags($don_gia);
	$don_gia = addslashes($don_gia); 
	$anh = strip_tags($anh);
	$anh = addslashes($anh); 
	$don_gia_moi=(integer)$don_gia;
	$ma_mon = $_GET['id'];
	$sql = "SELECT ten_mon from food";
	$result = mysqli_query($conn, $sql);
	while ($row=mysqli_fetch_array($result)) {
		$sql = "SELECT ten_mon from food where ten_mon like '$ten_mon_moi'";
		$query=mysqli_query($conn,$sql);
	}
	if ($anh != "" and $don_gia=="" and $ten_mon_moi=="") {
		$sql = "UPDATE food SET images ='$anh' where ma_mon='$ma_mon'";
		$result = mysqli_query($conn, $sql);
		header("location: success.php");
	}else if ($anh =="" and $don_gia=="" and $ten_mon_moi=="") {
		$sql = "UPDATE food SET don_gia='$don_gia_moi' where ma_mon='$ma_mon'";
		$result=mysqli_query($conn, $sql);
		header("location: success.php");
	}
	else if (mysqli_fetch_array($query)) {
		echo "Món đã tồn tại";
	}else{
		$sql = "UPDATE food SET ten_mon = '$ten_mon_moi', ma_danh_muc = '$ma_danh_muc', don_gia = '$don_gia_moi', images = '$anh' where ma_mon = '$ma_mon'";
		$result = mysqli_query($conn,$sql);	
		header("location: success.php");
	}
}
?>
</body>
</html>