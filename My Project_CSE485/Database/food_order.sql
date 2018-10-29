-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2018 lúc 04:48 PM
-- Phiên bản máy phục vụ: 10.1.35-MariaDB
-- Phiên bản PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `food_order`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account_admin`
--

CREATE TABLE `account_admin` (
  `ma_admin` int(10) NOT NULL,
  `admin_username` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `ten_admin` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `ngay_sinh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `account_admin`
--

INSERT INTO `account_admin` (`ma_admin`, `admin_username`, `admin_password`, `ten_admin`, `ngay_sinh`) VALUES
(3, 'long', '$2y$10$WdD8xMSr/f1OyfTsFNil4uA.8rFqmFQcMtxDhtnUtVsuKgnRewOKK', 'Phùng Long', '1995-12-16'),
(4, 'lam2', '$2y$10$hYXjzOXISmUPDJf1s.90wufbg21OFZif4hBJ78qFKN9wnWB23pU6u', 'Nguyễn Lâm', '1998-08-31'),
(5, 'long2', '$2y$10$DMDdTLFCXHa92zuCIF5k.uQXMOn6r60S.XuXLuWv4I7bo6w4nRP4G', 'Long Phùng', '1996-03-08'),
(6, 'lamlamlam', '$2y$10$nVYbNpsVHaL9rjy2DWbITeUcj.1SPGGAoIdh0HDkT5xv2nLgSqNGa', 'Nguyễn Đức Lâm', '1998-08-31'),
(7, 'longvecpro', '$2y$10$inLCrnjQZ94Si9BQq7vmLui5K95GefRXxM3XhyuCvcFAyfH7ocdw6', 'Long Phùng', '1998-12-12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account_user`
--

CREATE TABLE `account_user` (
  `ma_user` int(10) NOT NULL,
  `user_username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ten_nguoi_dung` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `ngay_sinh` date NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `sdt` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `account_user`
--

INSERT INTO `account_user` (`ma_user`, `user_username`, `user_password`, `ten_nguoi_dung`, `ngay_sinh`, `dia_chi`, `sdt`) VALUES
(1, 'lamlam', '$2y$10$.wBFpXYSt4oPitwSWqigE./nuN9Z5xsH5ng0IBydlREeTGCzVk4xe', 'Nguyễn Đức Lâm', '1998-08-31', '111 Thanh Lân', '0824078908'),
(2, 'lamlam3108', '$2y$10$xBjqD/2lmNHSAw7/9NUyl.QlHeiCQoiNMNWWvTydoOao9d7fwzoga', 'Lâm Nguyễn', '1998-08-31', '111 Thanh Lân', '0977336508'),
(3, 'longvecpro', '$2y$10$VL5uZ.0s52NvI7CBeLiZmuD9Vw2AHbWwEDJn3ZWnsl4CHL20zKMA.', 'Phùng Long', '1998-12-21', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang_user`
--

CREATE TABLE `donhang_user` (
  `IDDonHang` int(10) NOT NULL,
  `ma_user` int(10) NOT NULL,
  `Dien_Giai` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `Ngay_dat_hang` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `ten_nguoi_nhan_hang` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `dia_chi_nguoi_nhan` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `sdt_nguoi_nhan` varchar(11) COLLATE utf8_vietnamese_ci NOT NULL,
  `TongTien` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `trang_thai_don_hang` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang_user`
--

INSERT INTO `donhang_user` (`IDDonHang`, `ma_user`, `Dien_Giai`, `Ngay_dat_hang`, `ten_nguoi_nhan_hang`, `dia_chi_nguoi_nhan`, `sdt_nguoi_nhan`, `TongTien`, `trang_thai_don_hang`) VALUES
(1, 2, '1 Double Dip 1B, 1 Combo Kiddie 2, 10 Combo Kiddie 1', '23:53:57-28/10/2018', 'Lâm Nguyễn', '111 Thanh Lân', '0977336508', '662000vnđ', 'Đã xác nhận đơn hàng'),
(2, 2, 'Combo Double Meal (Mã sản phẩm :22) Số lượng : 99 Combo Family Meal 3 (Mã sản phẩm :24) Số lượng : 99', '12:06:03-29/10/2018', 'Lâm Nguyễn', '111 Thanh Lân', '0977336508', '42679000vnđ', 'Đã xác nhận đơn hàng'),
(3, 2, 'Double Dip 2A', '15:10:13-29/10/2018', 'Lâm Nguyễn', '111 Thanh Lân', '0977336508', '81000vnđ', 'Đã xác nhận đơn hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `food`
--

CREATE TABLE `food` (
  `ma_mon` int(10) NOT NULL,
  `ten_mon` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `ma_danh_muc` int(255) NOT NULL,
  `don_gia` int(10) NOT NULL,
  `images` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `food`
--

INSERT INTO `food` (`ma_mon`, `ten_mon`, `ma_danh_muc`, `don_gia`, `images`) VALUES
(1, 'Double Dip 1A', 1, 39000, 'img1.png'),
(2, 'Double Dip 1B', 1, 57000, 'img2.png'),
(3, 'Double Dip 2A', 1, 81000, 'img3.png'),
(4, 'Double Dip 2B', 1, 109000, 'img4.png'),
(5, 'Combo Kiddie 1', 1, 55000, 'img5.png'),
(6, 'Combo Kiddie 2', 1, 55000, 'img6.png'),
(7, 'Combo Kiddie 3', 1, 72000, 'img7.png'),
(8, 'Combo Kiddie 4', 1, 72000, 'img8.png'),
(9, 'Combo Kiddie Family 1', 1, 209000, 'img9.png'),
(10, 'Combo Kiddie Family 2', 1, 209000, 'img10.png'),
(11, 'Combo Teriyaki 1', 1, 76000, 'img11.png'),
(12, 'Combo Teriyaki 2', 1, 76000, 'img12.png'),
(13, 'Veggie Combo  69k A', 1, 69000, 'img13.png'),
(14, 'Veggie Combo  69k B', 1, 69000, 'img14.png'),
(15, 'Veggie Combo  69k C', 1, 69000, 'img15.png'),
(16, 'Combo Kiddie', 1, 55000, 'img16.png'),
(17, 'Combo gà rán A', 1, 81000, 'img17.png'),
(18, 'Combo gà rán B', 1, 81000, 'img18.png'),
(19, 'Phần lớn XL', 1, 99000, 'img19.png'),
(20, 'Gà quay tiêu/ Gà Big\"N Juicy', 1, 81000, 'img20.png'),
(21, 'Combo Teen Choice', 1, 65000, 'img21.png'),
(22, 'Combo Double Meal', 1, 180000, 'img22.png'),
(23, 'Combo Gà Rán A', 1, 81000, 'img17.png'),
(24, 'Combo Family Meal 3', 1, 250000, 'img23.png'),
(25, 'Hot Wing lắc vị BBQ lá chanh (3 miếng)', 2, 51000, 'img24.png'),
(26, 'Hot Wing lắc vị BBQ lá chanh (5 miếng)', 2, 73000, 'img24.png'),
(27, 'Gà giòn không cay (1 miếng)', 2, 35000, 'img25.png'),
(28, 'Gà giòn không cay (1 miếng)', 2, 35000, 'img25.png'),
(29, 'Gà giòn không cay (3 miếng)', 2, 98000, 'img26.png'),
(30, 'Gà giòn không cay (6 miếng)', 2, 189000, 'img27.png'),
(31, 'Gà giòn không cay (9 miếng)', 2, 283000, 'img28.png'),
(32, 'Gà giòn cay (1 miếng)', 2, 35000, 'img29.png'),
(33, 'Gà giòn cay (3 miếng)', 2, 98000, 'img30.png'),
(34, 'Gà giòn cay (6 miếng)', 2, 189000, 'img31.png'),
(35, 'Gà giòn cay (9 miếng)', 2, 283000, 'img32.png'),
(36, 'Cánh gà giòn cay (3 miếng)', 2, 47000, 'img33.png'),
(37, 'Cánh gà giòn cay (5 miếng)', 2, 69000, 'img34.png'),
(38, 'Gà truyền thống (1 miếng)', 2, 35000, 'img35.png'),
(39, 'Gà truyền thống (3 miếng)', 2, 98000, 'img36.png'),
(40, 'Gà truyền thống (6 miếng)', 2, 189000, 'img37.png'),
(41, 'Gà truyền thống (9 miếng)', 2, 283000, 'img38.png'),
(42, 'Gà quay tiêu', 2, 66000, 'img39.png'),
(43, 'Gà quay giấy bạc', 2, 66000, 'img40.png'),
(44, 'Cơm phi lê gà giòn', 3, 41000, 'img41.png'),
(45, 'Burger Veggie', 3, 39000, 'img42.png'),
(46, 'Cơm trộn Veggie', 3, 39000, 'img43.png'),
(47, 'Cơm gà viên sốt đậu', 3, 41000, 'img44.png'),
(48, 'Cơm gà xào sốt Nhật', 3, 41000, 'img45.png'),
(49, 'Burger Tôm', 3, 42000, 'img46.png'),
(50, 'Burger gà quay Flava', 3, 45000, 'img47.png'),
(51, 'Burger Zinger', 3, 49000, 'img48.png'),
(52, 'Cơm gà truyền thống KFC', 3, 41000, 'img49.png'),
(53, 'Cơm gà giòn cay', 3, 41000, 'img50.png'),
(54, 'Cơm phi lê gà quay Flava', 3, 41000, 'img51.png'),
(55, 'Cơm phi lê gà quay tiêu', 3, 41000, 'img52.png'),
(56, 'Popcorn lắc vị BBQ lá chanh (vừa)', 4, 39000, 'img53.png'),
(57, 'Popcorn lắc vị BBQ lá chanh (lớn)', 4, 59000, 'img53.png'),
(58, 'Mashies nhân Gravy (3 viên)', 4, 19000, 'img54.png'),
(59, 'Mashies nhân Gravy (5 viên)', 4, 29000, 'img55.png'),
(60, 'Mashies nhân rau củ (3 viên)', 4, 25000, 'img56.png'),
(61, 'Mashies nhân rau củ (5 viên)', 4, 35000, 'img57.png'),
(62, 'Gà viên (vừa)', 4, 35000, 'img58.png'),
(63, 'Gà viên (lớn)', 4, 55000, 'img59.png'),
(64, '3 miếng cá thanh', 4, 40000, 'img60.png'),
(65, 'Khoai tây chiên (vừa)', 4, 14000, 'img61.png'),
(66, 'Khoai tây chiên (lớn)', 4, 27000, 'img62.png'),
(67, 'Khoai tây chiên (đại)', 4, 37000, 'img63.png'),
(68, 'Khoai tây nghiền (vừa)', 4, 12000, 'img64.png'),
(69, 'Khoai tây nghiền (lớn)', 4, 22000, 'img65.png'),
(70, 'Khoai tây nghiền (đại)', 4, 32000, 'img66.png'),
(71, 'Bắp cải trộn (vừa)', 4, 12000, 'img67.png'),
(72, 'Bắp cải trộn (lớn)', 4, 22000, 'img68.png'),
(73, 'Bắp cải trộn (đại)', 4, 32000, 'img69.png'),
(74, 'Kem Sundae KFC', 5, 12000, 'img70.png'),
(75, 'Kem ốc quế', 5, 5000, 'img71.png'),
(76, 'Kem phủ Sô-cô-la', 5, 7000, 'img72.png'),
(77, 'Bánh trứng nướng (1 cái)', 5, 17000, 'img73.png'),
(78, 'Bánh trứng nướng (4 cái)', 5, 50000, 'img74.png'),
(79, 'Chai Aquafina 500ml', 5, 15000, 'img75.png'),
(80, 'Pepsi (vừa)', 5, 10000, 'img76.png'),
(81, 'Pepsi (lớn)', 5, 17000, 'img77.png'),
(82, 'Diet Pepsi 330ml (1 lon)', 5, 17000, 'img78.png'),
(83, 'Milo (1 ly)', 5, 20000, 'img79.png'),
(84, 'Twister 330ml (1 lon)', 5, 17000, 'img80.png'),
(85, 'Trà đào', 5, 22000, 'img81.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `ma_danh_muc` int(10) NOT NULL,
  `danh_muc` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`ma_danh_muc`, `danh_muc`) VALUES
(3, 'Burger - Cơm'),
(2, 'Gà rán và quay'),
(6, 'Kem'),
(1, 'Phần ăn combo'),
(4, 'Thức ăn nhẹ'),
(5, 'Tráng miệng và thức uống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `IDTT` int(10) NOT NULL,
  `title` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `ndung` text COLLATE utf8_vietnamese_ci NOT NULL,
  `file_anh` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`IDTT`, `title`, `ndung`, `file_anh`) VALUES
(1, 'KFC Singapore ngừng sử dụng cốc và ống hút nhựa nhằm bảo vệ môi trường', 'Tổng giám đốc chuỗi nhà hàng KFC, bà Lynette Lee cho biết: “Chúng tôi nhận thức được thực trạng ngày càng nghiêm trọng ảnh hưởng của đồ nhựa sử dụng một lần đến môi trường và sẽ bắt tay vào hành động. KFC tự hào là chuỗi nhà hàng đầu tiên ở Singapore hưởng ứng hoạt động này”. Tuy nhiên, KFC vẫn giữ số lượng cốc nhựa nhất định để phục vụ khách hàng sử dụng đồ uống take-away. KFC Singapore ngung su dung coc va ong hut nhua nham bao ve moi truong hinh anh 1 KFC sẽ không sử dụng cốc nắp nhựa, ống hút nhựa phục vụ khách tai các chuỗi cửa hàng ở Singapore. Ảnh: Jakarta Post. Quyết định này của đại diện KFC tại Singapore nhằm hưởng ứng hoạt động không dùng ống hút để bảo vệ môi trường. Theo đó, việc hưởng ứng “Sáng kiến Xanh - không ống hút” có thể giúp KFC giảm 17,8 tấn nhựa sử dụng một lần trong một năm. Trước đó, nỗ lực đầu tiên của KFC tại Singapore là đã loại bỏ hộp đựng cơm trưa và thức ăn bằng nhựa để thay thế hoàn toàn bằng các hộp giấy từ tháng 12/2017. Chỉ trong 6 tháng thực hiện chiến dịch này, KFC đã giảm được 2,5 triệu bộ sản phẩm nhựa tiêu thụ ra bên ngoài. Ngoài ra, KFC đang xem xét việc triển khai sử dụng bao bì bằng giấy phân hủy sinh học để bảo vệ môi trường. Thông báo chính thức của KFC được đưa ra cùng thời điểm người dân toàn cầu hướng về ngày Môi trường thế giới 2018 với chủ đề \"Giải quyết ô nhiễm nhựa và nylon”. Nhiều hoạt động chung tay giữ môi trường xanh trong tháng Hành động vì môi trường đã diễn ra trên nhiều quốc gia. Theo báo cáo của Liên Hợp Quốc, khối lượng nhựa và nylon người dân thải ra mỗi năm đủ để trải 4 lần bao quanh Trái Đất. Với lượng tiêu thụ khổng lồ này, trong tương lại sẽ có thêm hàng tỷ tấn nhựa được thải ra ngoài đại dương, đe dọa hệ sinh thái và sự sống của sinh vật biển. Chất thải nhựa đang thực sự đe dọa nghiêm trọng đến môi trường, xã hội và sức khỏe con người. Cộng đồng xã hội toàn thế giới đang đối mặt với thách thức lớn này.', 'kfc3.jpg'),
(2, 'KFC lấy lại lòng tin của khách hàng bằng lời xin lỗi sáng tạo', 'Tuần vừa qua được xem là khoảng thời gian khủng hoảng với KFC, khi chuỗi nhà hàng đồ ăn nhanh chuyên thịt gà nhưng lại không có thịt gà để chế biến. Hơn 900 cửa hàng KFC trên toàn nước Anh phải đóng cửa. Tuy nhiên, hãng đồ ăn nhanh này đã có cú lội ngược dòng ngoạn mục sau mẩu quảng cáo xin lỗi gửi tới khách hàng của mình. Một hộp gà rỗng và đặc biệt, tên viết tắt của hãng \"KFC\" được chuyển thành \"FCK\" một cách dí dỏm và châm biếm. Nhờ sự chân thành nhưng không kém phần sáng tạo, lời xin lỗi thú vị đã nhận được sự cảm thông từ đa số người tiêu dùng Anh.', 'kfc4.jpeg'),
(3, 'KFC Canada chấp nhận thanh toán Bitcoin', 'Bitcoin có thể thay thế tiền mặt trong việc mua bán, trao đổi sản phẩm hàng hóa nhưng điều này khó thực hiện bởi thời gian xử lý giao dịch khá lâu và chi phí cao. Những tồn tại của Bitcoin đã vô tình giúp các đồng tiền mã hoá khác tăng trưởng ngoạn mục, chẳng hạn như Ripple (XRP) và Ethereum (ETH). Microsoft cũng cho phép khách hàng thanh toán bằng Bitcoin khi mua sản phẩm của hãng, nhưng hãng đã tạm ngưng phương thức thanh toán này do giao dịch xử lý chậm trễ đã gây ra sự cố trên trang web. Tuy nhiên, Microsoft gần đây đã công bố sẽ tiếp tục chấp nhận phương thức thanh toán bằng Bitcoin: \"Sau khi bàn bạc với các nhà cung cấp, chúng tôi sẽ đảm bảo khách hàng sẽ sử dụng được lượng Bitcoin ở mức thấp nhất\". Mới đây, KFC Canada đã chấp nhận cho khách hàng thanh toán hóa đơn bằng Bitcoin khi đặt hàng trực tuyến trong khoảng thời gian ngắn. Cụ thể, KFC Canada đã có thêm một phần ăn mới mang tên là \"Bitcoin Bucket\", khách hàng có thể đặt mua trực tuyến và thanh toán bằng tài khoản Bitcoin của mình. Do phần ăn mới này có giá bán tính bằng đồng tiền Bitcoin, quy ra khoảng 20 đô la Canada (khoảng 360 ngàn đồng), nên khách hàng phải kiểm tra tỷ giá Bitcoin trước khi thanh toán trực tuyến. Phần ăn \"Bitcoin Bucket\" sẽ bao gồm 10 miếng gà rán, bánh quế chiên, món phụ cỡ vừa và hai món chấm.', 'kfc5.jpg'),
(4, 'KFC giới thiệu bàn phím độc đáo dành cho người thích vừa ăn vừa chat', 'Trong một chiến dịch quảng cáo ở Đức thì KFC đã giới thiệu một bàn phím siêu mỏng, có thể cuộn được với tên gọi Tray Typer.  Đánh vào tâm lý sử dụng smartphone trong khi ăn của khách hàng, KFC đã có một chiêu hút khách vô cùng đặc biệt, giúp khách hàng của mình sử dụng Smartphone để chatchit mà không cần lo lắng tới việc dầu mỡ bám lên màn hình điện thoại. Là một phần trong chiến dịch quảng cáo của KFC, hãng đã giới thiệu chiếc bàn phím dạng khay siêu mỏng, có thể cuộn được với tên gọi Tray Typer. Bàn phím này kết nối thông qua bluetooth để người dùng gõ chữ trong lúc ăn mà không cần phải chạm vào màn hình, qua đó loại bỏ việc làm bẩn điện thoại của chúng ta. Đặc biệt hơn, Tray Typer còn có khả năng tái sử dụng. KFC cho biết, tất cả người dùng sẽ có thể mang bàn phím này về, làm sạch nó và sạc lại để dùng tiếp được. Phát kiến thông minh này có độ dày 0,4 mm và sở hữu tính năng chống thấm. Tuy nhiên, cơ hội cho các “fan” của KFC tại Mỹ được tận tay sử dụng sản phẩm tuyệt vời này vẫn còn đang bỏ ngỏ.  ', 'kfc7.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account_admin`
--
ALTER TABLE `account_admin`
  ADD PRIMARY KEY (`ma_admin`),
  ADD UNIQUE KEY `admin_name` (`admin_username`);

--
-- Chỉ mục cho bảng `account_user`
--
ALTER TABLE `account_user`
  ADD PRIMARY KEY (`ma_user`) USING BTREE,
  ADD UNIQUE KEY `username` (`user_username`);

--
-- Chỉ mục cho bảng `donhang_user`
--
ALTER TABLE `donhang_user`
  ADD PRIMARY KEY (`IDDonHang`,`ma_user`),
  ADD KEY `ma_user` (`ma_user`),
  ADD KEY `trang_thai` (`trang_thai_don_hang`);

--
-- Chỉ mục cho bảng `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`ma_mon`),
  ADD KEY `ma_danh_muc` (`ma_danh_muc`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ma_danh_muc`),
  ADD UNIQUE KEY `danh_muc` (`danh_muc`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`IDTT`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account_admin`
--
ALTER TABLE `account_admin`
  MODIFY `ma_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `account_user`
--
ALTER TABLE `account_user`
  MODIFY `ma_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `donhang_user`
--
ALTER TABLE `donhang_user`
  MODIFY `IDDonHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `food`
--
ALTER TABLE `food`
  MODIFY `ma_mon` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `ma_danh_muc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `IDTT` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donhang_user`
--
ALTER TABLE `donhang_user`
  ADD CONSTRAINT `ma_user` FOREIGN KEY (`ma_user`) REFERENCES `account_user` (`ma_user`);

--
-- Các ràng buộc cho bảng `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`ma_danh_muc`) REFERENCES `menu` (`ma_danh_muc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
