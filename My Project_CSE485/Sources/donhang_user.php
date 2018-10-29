<?php   
include("config.php");
include("session1.php");
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đơn Hàng Cá Nhân</title>
  <link rel="icon" href="images/logo.jpg"/>
  <meta name="description" content="Source code generated using layoutit.com">
  <meta name="author" content="LayoutIt!">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
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
     if (empty($username_check)) {
      echo '<a class="btn btn-primary" href="dangnhap.php" style="width: 140px">Đăng Nhập </a>';
      echo '<a href="dangky.php" target="blank" class="btn btn-primary" style="margin-left: 5px; width: 140px">Đăng Ký</a>';
    }else {
      echo '<div style="margin-left:-500px;">';
      echo '<p style="display:inline-block; margin-top:10px;">Chúc mừng&nbsp <p style="font-weight:bold; display:inline;">'.$logins_session.'</p> đã đăng nhập thành công</p>';
      echo '<a href="donhang_user.php?id='.$ma_user_session.'" style="float:right; margin-left:-100px; margin-top:-31px">Đơn hàng cá nhân</a>';
      echo '<a href="information_user.php?id='.$ma_user_session.'" style="float:right; margin-left:-100px; margin-top:-6px">Thông tin cá nhân</a>';
      echo '<br>';
      echo '<a href="logout1.php" style="float:right; margin-left:-40px; margin-top:-4px">Đăng xuất</a>';
      echo '</div>';
    }
    ?>
  </nav>
</div>
</div>
<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
    <h1 style="margin-top: 150px">Thông tin các đơn hàng đã đặt: </h1>
    <table border="solid 1px" style="float: center; text-align: center;">
      <?php
      $ma_user = $_GET['id'];
      $sql = "SELECT * from donhang_user where ma_user='$ma_user'";
      $query = mysqli_query($conn, $sql);
      echo '<tr>';
      echo '<th style="width:100px; text-align: center;">ID đơn hàng</th>';
      echo '<th style="width:300px; text-align: center;">Diễn giải</th>';
      echo '<th style="width:300px; text-align: center;">Ngày đặt hàng</th>';
      echo '<th style="width:300px; text-align: center;">Tên người nhận hàng</th>';
      echo '<th style=" text-align: center;width:300px">Địa chỉ nhận hàng</th>';
      echo '<th style=" text-align: center;width:200px">Số điện thoại người nhận</th>';
      echo '<th style=" text-align: center; width:160px">Tổng tiền đơn hàng</th>';
      echo '<th style=" text-align: center; width:180px">Trạng thái đơn hàng</th>';
      echo '</tr>';
      while ($row = mysqli_fetch_array($query)) {
        echo '<tr>';
        echo '<td>'.$row['IDDonHang'].'</td>';
        echo '<td>'.$row['Dien_Giai'].'</td>';
        echo '<td>'.$row['Ngay_dat_hang'].'</td>';
        echo '<td>'.$row['ten_nguoi_nhan_hang'].'</td>';
        echo '<td>'.$row['dia_chi_nguoi_nhan'].'</td>';
        echo '<td>'.$row['sdt_nguoi_nhan'].'</td>';
        echo '<td>'.$row['TongTien'].'</td>';
        echo '<td>'.$row['trang_thai_don_hang'].'</td>';
        echo '</tr>';
      }
      ?>
    </table>
  </div>
  <div class="col-md-2">
  </div>
</div>
</div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
