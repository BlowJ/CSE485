<?php
include("config.php");
session_start();
include("session1.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng ký</title>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="icon" href="images/logo.jpg"/>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-toggleable-md navbar-dark bg-faded fixed-top">
					<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="navbar-toggler-icon"></span>
					</button> <a class="navbar-brand" href="trangchu.php" title="Trang Chủ"> <img src="images/logo.jpg" style="width:80px ;height:80px "></a>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="navbar-nav">
							<li class="nav-item" style="margin-right:5px">
								<a class="nav-link" href="thucdon.php">Thực đơn</a>
							</li>
							<li class="nav-item" style="margin-right:5px">
								<a class="nav-link" href="tintuc.php">Tin Tức</a>
							</li>
						</ul>
						<form action="search.php" method="get" class="form-inline">
							<input type="text" name="search" id="txtsearch" class="form-control mr-sm-2" type="text" placeholder="Tìm Kiếm" title="Bạn Đang Muốn Tìm Gì ?">
							<input  name="ok" value="Tìm kiếm" class="btn btn-primary my-2 my-sm-0" type="submit" title="Nhẫn Vào Đây Để Tìm Kiếm">
						</form>      
					</div>
					<?php
					if (!isset($_SESSION['username_name'])) {
						echo '<a class="btn btn-primary" href="dangnhap.php" style="width: 140px">Đăng Nhập </a>';
						echo '<a href="dangky.php" target="blank" class="btn btn-primary" style="margin-left: 5px; width: 140px">Đăng Ký</a>';
					}else {
						echo '<h2 style="display: inline-block;">Chào mừng </h2><h1 style="display: inline-block; margin-left: 5px;"><<p style="font-weight:bold; font-size:50px; display:inline-block">'.$logins_session.'</p>"</h1><h2 style="display: inline-block; margin-left: 5px"> đã đăng nhập thành công</h2>';
					}
					?>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-8">
				<h1 style="margin-top: 20px; margin-left: 520px">Đăng ký</h1>
				<form method="POST" role="form">
					<label for="username">Username: </label>
					<br>
					<input type="text" pattern="[a-z 0-9]{6,100}" name="username" id="username" placeholder="Username không được phép có kí tự đặc biệt và chữ in hoa và có ít nhất 6 ký tự" class="form-control" title="Username không được phép có kí tự đặc biệt và chữ in hoa và có ít nhất 6 ký tự">
					<br>
					<label for="password">Password: </label>
					<br>
					<input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="password" class="form-control" placeholder="Password phải có ít nhất 6 ký tự bao gồm ít nhất 1 chữ thường, 1 chữ in hoa và 1 số" id="password" title="Password phải có ít nhất 6 ký tự bao gồm ít nhất 1 chữ thường, 1 chữ in hoa và 1 số">
					<br>
					<label>Tên người dùng: </label>
					<br>
					<input type="text" class="form-control" name="ten_nguoi_dung" placeholder="Tên người dùng">
					<br>
					<label>Ngày sinh: </label>
					<br>
					<input type="date" name="ngay_sinh" class="form-control">
					<br>
					<button type="submit" class="btn btn-primary" name="smRes">Đăng Ký</button>
				</form>
				<?php
				if (isset($_POST['smRes'])) {
					$user_username = $_POST['username'];
					$user_password = $_POST['password'];
					$ten_nguoi_dung = $_POST['ten_nguoi_dung'];
					$ngay_sinh = $_POST['ngay_sinh'];
					$user_username = strip_tags($user_username);
					$user_username = addslashes($user_username);
					$user_password = strip_tags($user_password);
					$user_password = addslashes($user_password);
					$ten_nguoi_dung = strip_tags($ten_nguoi_dung);
					$ten_nguoi_dung = addslashes($ten_nguoi_dung);
					$user_password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
					if ($user_username == "" || $user_password =="" || $ten_nguoi_dung=="") {
						echo "username, password hoặc tên người dùng không được để trống!";
					}else{
						$sql = "SELECT user_username FROM account_user WHERE user_username = '$user_username'";
						$query = mysqli_query($conn,$sql);
						if (mysqli_num_rows($query)==1) {
							echo "tên đăng nhập đã tồn tại";
						}else{
							$sql1="INSERT into account_user (user_username, user_password, ten_nguoi_dung, ngay_sinh) values ('$user_username', '$user_password_hash', N'$ten_nguoi_dung', '$ngay_sinh')";
							$query1=mysqli_query($conn,$sql1);
				//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
							$_SESSION['username_name'] = $user_username;
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
							header('Location: thucdon.php');
						}
					}
				}
				?>
			</div>
			<div class="col-md-2">
			</div>
		</div>
	</div>
</body>
</html>