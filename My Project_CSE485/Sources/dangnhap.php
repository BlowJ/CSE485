<?php
include("config.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập</title>
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
					<a class="btn btn-primary" href="dangnhap.php" style="width: 140px;">Đăng Nhập </a>
					<a href="dangky.php" target="blank" class="btn btn-primary" style="margin-left: 5px; width: 140px">Đăng Ký</a>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-8">
				<h1 style="margin-top: 120px; margin-left: 520px">Đăng nhập</h1>
				<form method="POST" role="form">
					<label for="username">Username: </label>
					<br>
					<input type="text" name="username" id="username" placeholder="Username có ít nhất 6 kí tự , không có kí tự đặc biệt và chữ in hoa" pattern="[a-z0-9]{6,100}" class="form-control">
					<br>
					<label for="password">Password: </label>
					<br>
					<input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="password" class="form-control" placeholder="Password có ít nhất 6 kí tự bao gồm  ít nhất 1 chữ in hoa, 1 chữ thường và 1 số" id="password" title="Password có ít nhất 6 kí tự bao gồm  ít nhất 1 chữ in hoa, 1 chữ thường và 1 số">
					<br>
					<button type="submit" class="btn btn-primary" name="smLogin">Đăng Nhập</button>
				</form>
				<?php
				if(isset($_POST['smLogin'])) {
					$user_username = $_POST['username'];
					$user_password = $_POST['password'];
					$user_username = strip_tags($user_username);
					$user_username = addslashes($user_username);
					$user_password = strip_tags($user_password);
					$user_password = addslashes($user_password);
					if ($user_username == "" || $user_password =="") {
						echo "username hoặc password bạn không được để trống!";
					}else{
						$sql = "SELECT user_username, user_password FROM account_user WHERE user_username = '$user_username'";
						$query = mysqli_query($conn,$sql);
						$row = mysqli_fetch_array($query);
						$user_pass=$row['user_password'];
						if (mysqli_num_rows($query)==1 && password_verify($user_password,$user_pass)) {
					//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
							$_SESSION['username_name'] = $user_username;
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
							header('Location: trangchu.php');
						}else{
							echo 'Tên đăng nhập hoặc mật khẩu không đúng';
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