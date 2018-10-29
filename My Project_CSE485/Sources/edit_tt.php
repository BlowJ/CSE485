<?php 
include('session.php');
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sửa Tin Tức</title>
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
<h2 style="display: inline-block;">Sửa tin tức cũ: </h2> 
<?php  
$idtt = $_GET['id'];
$sql="SELECT title from tintuc where IDTT = '$idtt'";
$result=mysqli_query($conn, $sql);
if ($row=mysqli_fetch_array($result)) {
	echo "<h3 style='display: inline-block;'>".$row['title']."</h3>";
}
?>
</br>
<?php
$idtt = $_GET['id'];
$sql =  "SELECT * from tintuc where IDTT='$idtt'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
echo '<form method="POST">';
echo '<label style=" font-size: 20px" for="edit_product">Title mới:</label>';
echo '<input type="text" name="title_moi" id="title_moi" value="'.$row['title'].'" style="margin-left: 51px; width: 500px">';
echo '</br>';
echo '<label style="font-size: 20px" for="edit_product">Nội dung mới:</label>';
echo '<textarea name="ndung_moi" style="width:500px; height:400px; margin-left:5px">'.$row['ndung'].'</textarea>';
echo '<br>';
echo '<label style="font-size: 20px" for="edit_product">File ảnh mới:</label>';
echo '<input type="text" name="file_anh_moi" value="'.$row['file_anh'].'" id="file_anh_moi" style="margin-left: 15px; width: 500px">';
echo '<input type="submit" name="smSua" value="Sửa" onclick="alert(Sửa thành công)">';
echo '</form>';
if (isset($_POST['smSua'])) {
	$title_moi = $_POST['title_moi'];
	$ndung_moi = $_POST['ndung_moi'];
	$file_anh_moi = $_POST['file_anh_moi'];
	$idtt = $_GET['id'];
	$sql = "UPDATE tintuc SET title = '$title_moi', ndung = '$ndung_moi', file_anh = '$file_anh_moi' where IDTT = '$idtt'";
	$result = mysqli_query($conn,$sql);	
	header("location: success.php");
}
?>
</body>
</html>