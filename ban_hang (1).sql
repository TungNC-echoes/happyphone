-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 21, 2018 at 05:43 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ban_hang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `remember_token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_name`, `password`, `email`, `remember_token`) VALUES
(1, 'admin', '$2y$10$JdgA3OyMboxC84aKl65AwOMDiC1zlIlIiz7wNhHK2x/n/OpOQV8t6', 'admin@gmail.com', 'abb5B6JE9fyf9p0yDDlFzNwkib8gUgcsERqsqGwEdyLauF4Rg5BBnwD8fQmY');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(10, 10, '2018-02-19', 2120000, 'COD', NULL, '2018-02-19 13:35:31', '2018-02-19 13:35:31'),
(9, 10, '2018-02-19', 2290000, 'ATM', NULL, '2018-02-19 12:21:24', '2018-02-19 12:21:24'),
(11, 10, '2018-02-23', 770000, 'COD', 'giao hàng sớm nhé em', '2018-02-23 12:49:30', '2018-02-23 12:49:30'),
(12, 10, '2018-02-23', 65114600, 'ATM', 'giao hàng đúng hạn nhé', '2018-02-23 12:51:12', '2018-02-23 12:51:12'),
(13, 11, '2018-02-23', 460000, 'COD', NULL, '2018-02-23 12:51:59', '2018-02-23 12:51:59'),
(14, 11, '2018-02-23', 1770000, 'ATM', NULL, '2018-02-23 13:16:02', '2018-02-23 13:16:02'),
(15, 13, '2018-03-04', 600000, 'ATM', NULL, '2018-03-04 09:35:05', '2018-03-04 09:35:05'),
(16, 14, '2018-12-19', 160000, 'COD', NULL, '2018-12-19 10:19:55', '2018-12-19 10:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(24, 10, 8, 2, 160000, '2018-02-19 13:35:31', '2018-02-19 13:35:31'),
(21, 9, 7, 4, 160000, '2018-02-19 12:21:24', '2018-02-19 12:21:24'),
(22, 10, 13, 4, 300000, '2018-02-19 13:35:31', '2018-02-19 13:35:31'),
(20, 9, 15, 3, 350000, '2018-02-19 12:21:24', '2018-02-19 12:21:24'),
(19, 9, 13, 2, 300000, '2018-02-19 12:21:24', '2018-02-19 12:21:24'),
(23, 10, 6, 3, 200000, '2018-02-19 13:35:31', '2018-02-19 13:35:31'),
(25, 11, 9, 2, 160000, '2018-02-23 12:49:30', '2018-02-23 12:49:30'),
(26, 11, 1, 3, 150000, '2018-02-23 12:49:30', '2018-02-23 12:49:30'),
(27, 12, 37, 1, 320000, '2018-02-23 12:51:12', '2018-02-23 12:51:12'),
(28, 12, 61, 1, 150000, '2018-02-23 12:51:12', '2018-02-23 12:51:12'),
(29, 12, 65, 2, 32322300, '2018-02-23 12:51:12', '2018-02-23 12:51:12'),
(30, 13, 13, 1, 300000, '2018-02-23 12:51:59', '2018-02-23 12:51:59'),
(31, 13, 7, 1, 160000, '2018-02-23 12:51:59', '2018-02-23 12:51:59'),
(32, 14, 13, 1, 300000, '2018-02-23 13:16:03', '2018-02-23 13:16:03'),
(33, 14, 7, 1, 160000, '2018-02-23 13:16:03', '2018-02-23 13:16:03'),
(34, 14, 1, 1, 150000, '2018-02-23 13:16:03', '2018-02-23 13:16:03'),
(35, 14, 15, 1, 350000, '2018-02-23 13:16:03', '2018-02-23 13:16:03'),
(36, 14, 28, 1, 120000, '2018-02-23 13:16:03', '2018-02-23 13:16:03'),
(37, 14, 22, 1, 160000, '2018-02-23 13:16:03', '2018-02-23 13:16:03'),
(38, 14, 19, 1, 150000, '2018-02-23 13:16:03', '2018-02-23 13:16:03'),
(39, 14, 30, 1, 380000, '2018-02-23 13:16:03', '2018-02-23 13:16:03'),
(40, 15, 13, 2, 300000, '2018-03-04 09:35:05', '2018-03-04 09:35:05'),
(41, 16, 22, 1, 160000, '2018-12-19 10:19:55', '2018-12-19 10:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `content`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 14, 1, 'bánh rất ngon', NULL, '2018-12-19 10:17:40', '2018-12-19 10:17:40'),
(2, 14, 22, 'bánh rất ngon', NULL, '2018-12-19 10:19:27', '2018-12-19 10:19:27'),
(3, 14, 1, 'Có vẻ ôke', NULL, '2018-12-20 09:09:37', '2018-12-20 09:09:37'),
(4, 14, 5, 'Hello', NULL, '2018-12-21 09:29:19', '2018-12-21 09:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `id_user`, `subject`, `message`, `date`, `created_at`, `updated_at`) VALUES
(1, 10, 'chơi chơi', 'hôm nay trời ấm hơn mọi khi', '2018-02-06', '2018-02-06 13:54:19', '2018-02-06 13:54:19'),
(2, 14, '【スカウトメール】＜進学塾ena＞塾講師のご経験をぜひenaで活かしてください♪', 'jghkjlghiljfkjfk', '2018-12-19', '2018-12-19 10:24:09', '2018-12-19 10:24:09'),
(3, 14, 'Làm ăn oke', 'Chúc may mắn', '2018-12-21', '2018-12-21 09:28:19', '2018-12-21 09:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_14_223746_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'Mùa trung thu năm nay, Hỷ Lâm Môn muốn gửi đến quý khách hàng sản phẩm mới xuất hiện lần đầu tiên tại Việt nam \"Bánh trung thu Bơ Sữa HongKong\".', 'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ', 'sample1.jpg', '2017-03-11 06:20:23', '0000-00-00 00:00:00'),
(2, 'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát', 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất. ', 'sample2.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(3, 'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ', 'sample3.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(4, 'Hướng dẫn sử dụng bảo quản đồ gỗ, nội thất.', 'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu ', 'sample4.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(5, 'Phong cách mới trong sử dụng đồ gỗ nội thất gia đình', 'Đồ gỗ nội thất gia đình ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Phong cách sử dụng đồ gỗ hiện nay của các gia đình hầu h ', 'sample5.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `new`, `created_at`, `updated_at`) VALUES
(1, 'Iphone 5', 1, 'Sau bao tháng ngày mong chờ, cả thế giới Công nghệ đã được đón nhận sự ra đời của siêu phẩm điện thoại thông minh iPhone 5, một trong những chiếc điện thoại được mong mỏi nhất năm 2012. Với những cải tiến mạnh mẽ cả về mặt thiết kế lẫn phần cứng, nên ngay từ khi lên kệ, iPhone 5 liên tục cháy hàng. iPhone 5 hứa hẹn sẽ tiếp tục khẳng định vị trí dẫn đầu trên thị trường Smartphone hiện nay.', 150000, 120000, 'Dh2wip5.jpg', 'hộp', 1, '2016-10-26 03:00:16', '2018-12-20 09:04:44'),
(2, 'Iphone Bạc', 1, 'Ngay từ buổi lễ ra mắt, các nhà thiết kế của Apple đã khẳng định đây là chiếc điện thoại mỏng nhất mà họ từng làm, iPhone 5 sở hữu những thông số về kích thước thật đáng kinh ngạc, máy mỏng chỉ 7.6 mm và trọng lượng chưa tới 112g, nếu đem ra so sánh với các smartphone hiện nay thì iPhone 5 thực sự là một trong những chiếc điện thoại mỏng nhất, nhẹ nhất.', 1200000, 1100000, 'QIbgip5_b.jpg', 'hộp', 0, '2016-10-26 03:00:16', '2018-12-20 09:56:47'),
(5, 'Iphone 5 Đen', 1, 'Thật tiết khi tgdd ko kinh doanh,nhưng những ưu điểm thì thật tốt,nó là chiếc iphone đầu tiên do ceo apple TimCook làm ra,tôi rất thích kiểu dáng của nó', 1200000, 1100000, 'wS0rip5_d.jpg', 'hộp', 1, '2016-10-26 03:00:16', '2018-12-20 09:58:02'),
(6, 'Iphone 5s', 1, 'Đúng như dự kiến, iPhone 5S xuất hiện với 3 phiên bản màu sắc khác nhau là đen, trắng truyền thống và thêm vào đó màu vàng của rượu sâm banh. Về cơ bản iPhone 5S cũng giống hệt như iPhone 5 về hình thức bên ngoài, cùng có lớp vỏ làm bằng nhôm nguyên khối, kích thước tương đương với độ dày 7.6mm và chỉ nặng 112g. Tuy nhiên, sự khác biệt giữa hai phiên bản này nằm sâu bên trong vỏ máy.', 1500000, 1450000, 'bbLRip5s.jpg', 'hộp', 0, '2016-10-26 03:00:16', '2018-12-20 09:59:10'),
(7, 'Iphone 5s Bạc', 1, 'CEO Tim Cook lên giới thiệu chiếc iPhone 5S tại sự kiện diễn ra đêm qua theo giờ Việt Nam\r\n\r\niPhone 5S vẫn sử dụng màn hình LED-backlit IPS LCD kích thước 4 inch với độ phân giải 640 x 1136 pixel, mật độ điểm ảnh 326 ppi và được bảo vệ bên ngoài bằng kính Corning Gorilla Glass.', 1500000, 1400000, 'CqnAip5s_b.jpg', 'hộp', 1, '2016-10-26 03:00:16', '2018-12-20 10:01:21'),
(8, 'Iphone 5s Đen', 1, 'iPhone 5S được trang bị bộ chipset hoàn toàn mới có tên gọi A7, được Apple thông báo có tốc độ CPU nhanh gấp 40 lần so với iPhone đời đầu, và nhanh gấp 5 lần iPhone 5. Tuy nhiên, đây mới chỉ là thông tin do quan chức của Apple cung cấp, còn trên thực tế sẽ phải có những bài kiểm tra để xác minh sức mạnh của chip A7 này.\r\n\r\nBộ chip A7 này lần đầu tiên được phát triển dựa trên kiến ​​trúc 64-bit, trong khi iOS 7 hiện đang là hệ điều hành dành cho chip 64 –bit nhưng nó có khả năng tương thích người với tất cả các chip 32 – bit.', 1400000, 0, 'wKmNip5s_d.jpg', 'hộp', 0, '2016-10-26 03:00:16', '2018-12-20 10:02:05'),
(9, 'Iphone 5s Vàng', 1, 'Bộ vi xử lý A7 mạnh mẽ\r\nBộ vi xử lý A7 cũng hỗ trợ đồ họa OpenGL ES 3.0 cung cấp chất lượng đồ họa cao hơn, cho phép bạn tính toán thời gian thực của các hiệ ứng như độ sâu trường ảnh, làm mờ, họa tiết toàn màn hình và ánh sáng đèn. iPhone 5S cũng có một “vi xử lý chuyển động” M7 mới. M7 sẽ liên tục đo các dữ liệu chuyển động từ các gia tốc, con quay hồi chuyển và la bàn, từ đó sẽ dẫn tới “một thế hệ các ứng dụng luyện tập thể thao và chăm sóc sức khỏe mới”. Nó hoạt động với giao diện lập trình ứng dụng CoreMotion API mới trong iOS 7 có khả năng xác định chuyển động của người dùng.', 1600000, 0, 'ntazip5s_v.jpg', 'hộp', 0, '2016-10-26 03:00:16', '2018-12-20 10:05:23'),
(11, 'Sam Sung A6', 2, 'Thiết kế kim loại nguyên khối\r\nMáy được hoàn thiện từ kim loại nguyên khối, kết hợp với mặt kính cong nhẹ 2.5D cho cảm giác vuốt chạm thoải mái hơn.', 4500000, 0, 'AYrFssa6.jpg', 'cái', 0, '2016-10-12 02:00:00', '2018-12-20 10:04:12'),
(12, 'Iphone 6', 1, 'Apple iPhone 6 32GB Chính hãng (Mã VN/A)\r\nMặc dù đã ra đời cách đây khá lâu, điện thoại Apple iPhone 6 32GB Chính hãng vẫn được nhiều người sử dụng điện thoại Apple ưu chuộng bởi nhiều ưu điểm trong thiết kế cao cấp, sự phối hợp hoàn hảo giữa phần cứng và phần mềm, đem đến cho bạn một siêu phẩm trong tầm tay.', 2000000, 0, 'NVMQip6.jpg', 'cái', 0, '2016-10-12 02:00:00', '2018-12-20 10:07:04'),
(13, 'Iphone 6 plus', 1, 'CellphoneS xin chào anh Hùng Anh,\r\n\r\nAPPLE IPHONE 6 32GB VÀNG CÔNG TY MỚI(VN) giá là 6.500.000đ đang còn hàng ở CellphoneS 117 Thái Hà, P. Trung Liệt, Q. Đống Đa ạ.\r\n\r\nNếu quan tâm, Anh có thể để tên, số điện thoại, em sẽ hỗ trợ giữ hàng tại cửa hàng trong 24h giúp mình ghé tham khảo ạ.', 2100000, 0, '5a7Eip6_b.jpg', 'cái', 1, '2016-10-12 02:00:00', '2018-12-21 04:34:44'),
(14, 'Iphone 6s', 1, 'Apple iPhone 6 32GB Chính hãng (Mã VN/A)\r\nMặc dù đã ra đời cách đây khá lâu, điện thoại Apple iPhone 6 32GB Chính hãng vẫn được nhiều người sử dụng điện thoại Apple ưu chuộng bởi nhiều ưu điểm trong thiết kế cao cấp, sự phối hợp hoàn hảo giữa phần cứng và phần mềm, đem đến cho bạn một siêu phẩm trong tầm tay.', 2500000, 2500000, 'kfEZip6s.jpg', 'cái', 0, '2016-10-12 02:00:00', '2018-12-20 10:09:25'),
(15, 'Iphone 6s Bạc', 1, 'Apple iPhone 6 32GB Chính hãng (Mã VN/A)\r\nMặc dù đã ra đời cách đây khá lâu, điện thoại Apple iPhone 6 32GB Chính hãng vẫn được nhiều người sử dụng điện thoại Apple ưu chuộng bởi nhiều ưu điểm trong thiết kế cao cấp, sự phối hợp hoàn hảo giữa phần cứng và phần mềm, đem đến cho bạn một siêu phẩm trong tầm tay.', 2600000, 25500000, 'MnwGip6s_b.jpg', 'cái', 1, '2016-10-12 02:00:00', '2018-12-20 10:10:25'),
(16, 'Iphone 6 Plus', 1, 'Apple iPhone 6 Plus 32GB Chính hãng (Mã VN/A)\r\nMặc dù đã ra đời cách đây khá lâu, điện thoại Apple iPhone 6 32GB Chính hãng vẫn được nhiều người sử dụng điện thoại Apple ưu chuộng bởi nhiều ưu điểm trong thiết kế cao cấp, sự phối hợp hoàn hảo giữa phần cứng và phần mềm, đem đến cho bạn một siêu phẩm trong tầm tay.', 3100000, 0, 'nmm1ip6splus.jpg', 'hộp', 1, '2016-10-12 02:00:00', '2018-12-20 10:11:32'),
(17, 'Iphone 6s Hồng', 1, 'Apple iPhone 6s 32GB Chính hãng (Mã VN/A)\r\nMặc dù đã ra đời cách đây khá lâu, điện thoại Apple iPhone 6 32GB Chính hãng vẫn được nhiều người sử dụng điện thoại Apple ưu chuộng bởi nhiều ưu điểm trong thiết kế cao cấp, sự phối hợp hoàn hảo giữa phần cứng và phần mềm, đem đến cho bạn một siêu phẩm trong tầm tay.', 2600000, 2490000, 'EGQuip6s_h.jpg', 'cai', 0, '2016-10-12 02:00:00', '2018-12-20 10:12:41'),
(18, 'Iphone 6 Plus Bạc', 1, 'Apple iPhone 6 32GB Chính hãng (Mã VN/A)\r\nMặc dù đã ra đời cách đây khá lâu, điện thoại Apple iPhone 6 32GB Chính hãng vẫn được nhiều người sử dụng điện thoại Apple ưu chuộng bởi nhiều ưu điểm trong thiết kế cao cấp, sự phối hợp hoàn hảo giữa phần cứng và phần mềm, đem đến cho bạn một siêu phẩm trong tầm tay.', 2500000, 0, '3Vjoip6splus_b.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2018-12-20 10:30:01'),
(19, 'Iphone 6 Plus Hồng', 1, 'Apple iPhone 6 32GB Chính hãng (Mã VN/A)\r\nMặc dù đã ra đời cách đây khá lâu, điện thoại Apple iPhone 6 32GB Chính hãng vẫn được nhiều người sử dụng điện thoại Apple ưu chuộng bởi nhiều ưu điểm trong thiết kế cao cấp, sự phối hợp hoàn hảo giữa phần cứng và phần mềm, đem đến cho bạn một siêu phẩm trong tầm tay.', 2400000, 2350000, '7nq5ip6splus_h.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2018-12-20 10:30:39'),
(20, 'Iphone 6 Plus Vàng', 1, 'Apple iPhone 6 32GB Chính hãng (Mã VN/A)\r\nMặc dù đã ra đời cách đây khá lâu, điện thoại Apple iPhone 6 32GB Chính hãng vẫn được nhiều người sử dụng điện thoại Apple ưu chuộng bởi nhiều ưu điểm trong thiết kế cao cấp, sự phối hợp hoàn hảo giữa phần cứng và phần mềm, đem đến cho bạn một siêu phẩm trong tầm tay.', 2700000, 0, 'Qh6Yip6splus_v.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2018-12-20 10:31:15'),
(21, 'Iphone 6 Plus Xám', 1, 'Apple iPhone 6 32GB Chính hãng (Mã VN/A)\r\nMặc dù đã ra đời cách đây khá lâu, điện thoại Apple iPhone 6 32GB Chính hãng vẫn được nhiều người sử dụng điện thoại Apple ưu chuộng bởi nhiều ưu điểm trong thiết kế cao cấp, sự phối hợp hoàn hảo giữa phần cứng và phần mềm, đem đến cho bạn một siêu phẩm trong tầm tay.', 2500000, 2400000, 'HUVtip6splus_x.jpg', 'cái', 0, '2016-10-13 02:20:00', '2018-12-20 10:31:58'),
(22, 'Iphone 6S Vàng', 1, 'Apple iPhone 6 32GB Chính hãng (Mã VN/A)\r\nMặc dù đã ra đời cách đây khá lâu, điện thoại Apple iPhone 6 32GB Chính hãng vẫn được nhiều người sử dụng điện thoại Apple ưu chuộng bởi nhiều ưu điểm trong thiết kế cao cấp, sự phối hợp hoàn hảo giữa phần cứng và phần mềm, đem đến cho bạn một siêu phẩm trong tầm tay.', 2100000, 2000000, 'xO8cip6s_v.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2018-12-20 10:32:41'),
(23, 'Iphone 6 Xám', 1, 'Apple iPhone 6 32GB Chính hãng (Mã VN/A)\r\nMặc dù đã ra đời cách đây khá lâu, điện thoại Apple iPhone 6 32GB Chính hãng vẫn được nhiều người sử dụng điện thoại Apple ưu chuộng bởi nhiều ưu điểm trong thiết kế cao cấp, sự phối hợp hoàn hảo giữa phần cứng và phần mềm, đem đến cho bạn một siêu phẩm trong tầm tay.', 2000000, 1999000, 'f9PNip6_x.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2018-12-20 10:33:19'),
(24, 'Iphone 7 Plus', 1, 'Bộ sản phẩm chuẩn: Hộp, Sạc, Tai nghe, Sách hướng dẫn, Jack chuyển tai nghe 3.5mm, Cáp, Cây lấy sim\r\n\r\nVới thiết kế không quá nhiều thay đổi, vẫn bảo tồn vẻ đẹp truyền thống từ thời iPhone 6 Plus,  iPhone 7 Plus 32GB được trang bị nhiều nâng cấp đáng giá như camera kép, đạt chuẩn chống nước chống bụi cùng cấu hình cực mạnh.', 5000000, 4600000, 'oO7mip7plus.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2018-12-20 10:34:21'),
(25, 'Iphone 7 Plus Bạc', 1, 'Bộ sản phẩm chuẩn: Hộp, Sạc, Tai nghe, Sách hướng dẫn, Jack chuyển tai nghe 3.5mm, Cáp, Cây lấy sim\r\n\r\nVới thiết kế không quá nhiều thay đổi, vẫn bảo tồn vẻ đẹp truyền thống từ thời iPhone 6 Plus,  iPhone 7 Plus 32GB được trang bị nhiều nâng cấp đáng giá như camera kép, đạt chuẩn chống nước chống bụi cùng cấu hình cực mạnh.', 5000000, 4700000, 'bjKRip7plus_b.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2018-12-20 10:35:04'),
(26, 'Iphone 7 Plus Đen', 1, 'Bộ sản phẩm chuẩn: Hộp, Sạc, Tai nghe, Sách hướng dẫn, Jack chuyển tai nghe 3.5mm, Cáp, Cây lấy sim\r\n\r\nVới thiết kế không quá nhiều thay đổi, vẫn bảo tồn vẻ đẹp truyền thống từ thời iPhone 6 Plus,  iPhone 7 Plus 32GB được trang bị nhiều nâng cấp đáng giá như camera kép, đạt chuẩn chống nước chống bụi cùng cấu hình cực mạnh.', 4900000, 4700000, 'H1tKip7plus_d.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2018-12-20 10:36:51'),
(27, 'Iphone 7 Plus Đỏ', 1, 'Bộ sản phẩm chuẩn: Hộp, Sạc, Tai nghe, Sách hướng dẫn, Jack chuyển tai nghe 3.5mm, Cáp, Cây lấy sim\r\n\r\nVới thiết kế không quá nhiều thay đổi, vẫn bảo tồn vẻ đẹp truyền thống từ thời iPhone 6 Plus,  iPhone 7 Plus 32GB được trang bị nhiều nâng cấp đáng giá như camera kép, đạt chuẩn chống nước chống bụi cùng cấu hình cực mạnh.', 5100000, 0, 'birAip7plus_do.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2018-12-20 10:37:25'),
(28, 'Iphone 7 Plus Hồng', 1, 'Bộ sản phẩm chuẩn: Hộp, Sạc, Tai nghe, Sách hướng dẫn, Jack chuyển tai nghe 3.5mm, Cáp, Cây lấy sim\r\n\r\nVới thiết kế không quá nhiều thay đổi, vẫn bảo tồn vẻ đẹp truyền thống từ thời iPhone 6 Plus,  iPhone 7 Plus 32GB được trang bị nhiều nâng cấp đáng giá như camera kép, đạt chuẩn chống nước chống bụi cùng cấu hình cực mạnh.', 4800000, 4600000, '1Phzip7plus_h.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2018-12-20 10:38:07'),
(29, 'Sam Sung A6 Đen', 2, 'Thiết kế kim loại nguyên khối\r\nMáy được hoàn thiện từ kim loại nguyên khối, kết hợp với mặt kính cong nhẹ 2.5D cho cảm giác vuốt chạm thoải mái hơn.', 3400000, 3000000, 'bJUSssa6_d.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2018-12-20 10:38:53'),
(30, 'Sam Sung A6 Tím', 2, 'Thiết kế kim loại nguyên khối\r\nMáy được hoàn thiện từ kim loại nguyên khối, kết hợp với mặt kính cong nhẹ 2.5D cho cảm giác vuốt chạm thoải mái hơn.', 3100000, 2900000, 'h0rqssa6_t.jpg', 'cái', 0, '2016-10-13 02:20:00', '2018-12-20 10:39:55'),
(31, 'Sam Sung A6 Vàng', 2, 'Thiết kế kim loại nguyên khối\r\nMáy được hoàn thiện từ kim loại nguyên khối, kết hợp với mặt kính cong nhẹ 2.5D cho cảm giác vuốt chạm thoải mái hơn.', 3100000, 2990000, '6rDkssa6_v.jpg', 'cái', 0, '2016-10-13 02:20:00', '2018-12-20 10:40:44'),
(32, 'Sam Sung A6 Xanh', 2, 'Thiết kế kim loại nguyên khối\r\nMáy được hoàn thiện từ kim loại nguyên khối, kết hợp với mặt kính cong nhẹ 2.5D cho cảm giác vuốt chạm thoải mái hơn.', 3500000, 3100000, '12aHssa6_x.jpg', 'cái', 0, '2016-10-13 02:20:00', '2018-12-21 04:38:18'),
(33, 'Sam Sung A8', 2, 'Thiết kế kim loại nguyên khối\r\nMáy được hoàn thiện từ kim loại nguyên khối, kết hợp với mặt kính cong nhẹ 2.5D cho cảm giác vuốt chạm thoải mái hơn.', 4500000, 4400000, 'DwhJssa8.jpg', 'cái', 1, '2016-10-13 02:20:00', '2018-12-20 10:42:24'),
(34, 'Sam Sung Note 5', 2, 'Thiết kế kim loại nguyên khối\r\nMáy được hoàn thiện từ kim loại nguyên khối, kết hợp với mặt kính cong nhẹ 2.5D cho cảm giác vuốt chạm thoải mái hơn.', 1500000, 1400000, '6EGKssnote5.jpg', 'cái', 0, '2016-10-13 02:20:00', '2018-12-20 10:43:18'),
(35, 'Sam Sung A8 Đen', 2, 'Thiết kế kim loại nguyên khối\r\nMáy được hoàn thiện từ kim loại nguyên khối, kết hợp với mặt kính cong nhẹ 2.5D cho cảm giác vuốt chạm thoải mái hơn.', 4400000, 4300000, 'y7d6ssa8_d.jpg', 'cái', 0, '2016-10-13 02:20:00', '2018-12-21 01:49:41'),
(36, 'Sam Sung A8 Tím', 2, 'Thiết kế kim loại nguyên khối\r\nMáy được hoàn thiện từ kim loại nguyên khối, kết hợp với mặt kính cong nhẹ 2.5D cho cảm giác vuốt chạm thoải mái hơn.', 4600000, 0, 'Mdx5ssa8_t.jpg', 'cái', 0, '2016-10-13 02:20:00', '2018-12-21 01:49:33'),
(37, 'Sam Sung A8 Vàng', 2, 'Galaxy A8 (2018) là tên gọi mới của chiếc điện thoại Samsung Galaxy A5 mà người dùng vẫn quen thuộc từ trước đến nay, sở dĩ có cái tên gọi mới là vì Samsung muốn đồng nhất giữa dòng Galaxy A và Galaxy S.\r\nThiết kế tinh hoa quen thuộc kế thừa dòng Galaxy S\r\nNhư thường lệ thì điện thoại Samsung dòng A sẽ được kế thừa \"tinh hoa\" từ dòng S đã ra mắt trước đó và Galaxy A8 (2018) cũng không phải là ngoại lệ.', 3100000, 0, 'JSAissa8_v.jpg', 'cái', 1, '2016-10-13 02:20:00', '2018-12-21 01:49:25'),
(38, 'Sam Sung A8 Xanh', 2, 'Galaxy A8 (2018) là tên gọi mới của chiếc điện thoại Samsung Galaxy A5 mà người dùng vẫn quen thuộc từ trước đến nay, sở dĩ có cái tên gọi mới là vì Samsung muốn đồng nhất giữa dòng Galaxy A và Galaxy S.\r\nThiết kế tinh hoa quen thuộc kế thừa dòng Galaxy S\r\nNhư thường lệ thì điện thoại Samsung dòng A sẽ được kế thừa \"tinh hoa\" từ dòng S đã ra mắt trước đó và Galaxy A8 (2018) cũng không phải là ngoại lệ.', 3400000, 3350000, 'CgSessa8_x.jpg', 'cái', 0, '2016-10-13 02:20:00', '2018-12-21 01:49:14'),
(39, 'Sam Sung J3 Pro', 2, 'Dạ với thông tin anh cung cấp thì bên em sẽ hoàn lại khoảng 80% (7,192,000đ). Tuy nhiên đây chỉ là giá tham khảo thôi ạ, anh vui lòng đem bộ sản phẩm chuẩn kèm quà khuyến mãi nếu có ra siêu thị để bên em hỗ trợ anh và tránh phát sinh thêm phí ạ\r\nThông tin đến anh.', 1300000, 900000, '2S8dssj3pro.jpg', 'cái', 0, '2016-10-13 02:20:00', '2018-12-21 01:50:53'),
(40, 'Sam Sung J3 Pro Bạc', 2, 'Dạ với thông tin anh cung cấp thì bên em sẽ hoàn lại khoảng 80% (7,192,000đ). Tuy nhiên đây chỉ là giá tham khảo thôi ạ, anh vui lòng đem bộ sản phẩm chuẩn kèm quà khuyến mãi nếu có ra siêu thị để bên em hỗ trợ anh và tránh phát sinh thêm phí ạ\r\nThông tin đến anh.', 1500000, 0, 'MLljssj3pro_b.jpg', 'cái', 0, '2016-10-13 02:20:00', '2018-12-21 01:51:50'),
(41, 'Bánh kem Raspberry Delight', 2, 'Dạ với thông tin anh cung cấp thì bên em sẽ hoàn lại khoảng 80% (7,192,000đ). Tuy nhiên đây chỉ là giá tham khảo thôi ạ, anh vui lòng đem bộ sản phẩm chuẩn kèm quà khuyến mãi nếu có ra siêu thị để bên em hỗ trợ anh và tránh phát sinh thêm phí ạ\r\nThông tin đến anh.', 1300000, 0, 'sbwZssj3pro_d.jpg', 'cái', 0, '2016-10-13 02:20:00', '2018-12-21 01:52:16'),
(42, 'Sam Sung J3 Pro Đen', 2, 'Dạ với thông tin anh cung cấp thì bên em sẽ hoàn lại khoảng 80% (7,192,000đ). Tuy nhiên đây chỉ là giá tham khảo thôi ạ, anh vui lòng đem bộ sản phẩm chuẩn kèm quà khuyến mãi nếu có ra siêu thị để bên em hỗ trợ anh và tránh phát sinh thêm phí ạ\r\nThông tin đến anh.', 1500000, 0, 'sbecssj3pro_d.jpg', 'cái', 0, '2016-10-13 02:20:00', '2018-12-21 01:52:56'),
(43, 'Sam Sung J3 Pro Hồng', 2, 'Dạ với thông tin anh cung cấp thì bên em sẽ hoàn lại khoảng 80% (7,192,000đ). Tuy nhiên đây chỉ là giá tham khảo thôi ạ, anh vui lòng đem bộ sản phẩm chuẩn kèm quà khuyến mãi nếu có ra siêu thị để bên em hỗ trợ anh và tránh phát sinh thêm phí ạ\r\nThông tin đến anh.', 1000000, 0, 'vEOKssj3pro_h.jpg', 'cái', 0, '2016-10-13 02:20:00', '2018-12-21 01:53:36'),
(44, 'Sam Sung J3 Pro Xanh', 2, 'Dạ với thông tin anh cung cấp thì bên em sẽ hoàn lại khoảng 80% (7,192,000đ). Tuy nhiên đây chỉ là giá tham khảo thôi ạ, anh vui lòng đem bộ sản phẩm chuẩn kèm quà khuyến mãi nếu có ra siêu thị để bên em hỗ trợ anh và tránh phát sinh thêm phí ạ\r\nThông tin đến anh.', 1200000, 0, 'k3pJssj3pro_x.jpg', 'cái', 0, '2016-10-13 02:20:00', '2018-12-21 01:54:11'),
(45, 'Sam Sung J7 Prime', 2, 'Galaxy J7 Prime xứng đáng là cái tên hàng đầu trong danh sách chọn smartphone phổ thông của giới trẻ khi nhận được nhiều đánh giá tích cực về thiết kế, thời lượng pin lâu dài và camera chụp hình chất lượng tốt.', 2900000, 2850000, 'jvQ6ssj7prime.jpg', 'cái', 0, '2016-10-13 02:20:00', '2018-12-21 01:55:29'),
(46, 'Sam Sung J7 Prime Đen', 2, 'Galaxy J7 Prime xứng đáng là cái tên hàng đầu trong danh sách chọn smartphone phổ thông của giới trẻ khi nhận được nhiều đánh giá tích cực về thiết kế, thời lượng pin lâu dài và camera chụp hình chất lượng tốt.', 3000000, 0, 'AuLgssj7prime_d.jpg', 'cái', 1, '2016-10-13 02:20:00', '2018-12-21 01:56:32'),
(47, 'Sam Sung J7 Prime Hồng', 2, 'Galaxy J7 Prime xứng đáng là cái tên hàng đầu trong danh sách chọn smartphone phổ thông của giới trẻ khi nhận được nhiều đánh giá tích cực về thiết kế, thời lượng pin lâu dài và camera chụp hình chất lượng tốt.', 3000000, 0, 'uqBOssj7prime_h.jpg', 'cái', 1, '2016-10-13 02:20:00', '2018-12-21 01:57:06'),
(48, 'Sam Sung J7 Prime Vàng', 2, 'Galaxy J7 Prime xứng đáng là cái tên hàng đầu trong danh sách chọn smartphone phổ thông của giới trẻ khi nhận được nhiều đánh giá tích cực về thiết kế, thời lượng pin lâu dài và camera chụp hình chất lượng tốt.', 3100000, 3000000, 'cDyWssj7prime_v.jpg', 'cái', 1, '2016-10-13 02:20:00', '2018-12-21 01:58:05'),
(49, 'Sam Sung J7 Prime Xanh', 2, 'Galaxy J7 Prime xứng đáng là cái tên hàng đầu trong danh sách chọn smartphone phổ thông của giới trẻ khi nhận được nhiều đánh giá tích cực về thiết kế, thời lượng pin lâu dài và camera chụp hình chất lượng tốt.', 3000000, 0, 'nfxfssj7prime_x.jpg', 'cái', 0, '2016-10-13 02:20:00', '2018-12-21 01:58:33'),
(50, 'Sam Sung Note 5 Đen', 7, 'Samsung Galaxy Note 5 sẽ là chiếc smartphone mà bạn sẽ bị hút mắt khi cầm trên tay bởi thiết nguyến khôi tinh tế - sang trọng. Vì sản phẩm đáng giá từng xu. Thực tế với mức giá chưa tới 4 triệu đồng nhưng máy mang đến nhiều tính năng mà các thiết bị trong phân khúc giá có được bao gồm:\r\n- Một thiết kế nguyến khối vừa tay, cứng cáp, đẹp cuốn hút và sang trọng.\r\n- Màn hình độ phân giải 4k\r\n- Cấu hình phần cứng cực mạnh của sản phẩm cao cấp Ram 4Gb\r\n- Quay video 4K.\r\n- Điều khiển các thiết bị điện tử khác thông qua cổng hồng ngoại.\r\n- Thời lượng pin dài.\r\n- Giá hợp lý so với tính năng và cấu hình\r\n (thương hiệu và hình ảnh sản phẩm của samsung đã được khẳng định -> Samsung Note 5 là sản phẩm cao cấp)\r\nDù đã ra mắt khá lâu, Samsung Galaxy Note 5 vẫn có những ưu điểm nổi trội để lọt Top những sản phẩm cực kỳ đáng mua ở thời điểm hiện tại.\r\nSamsung Galaxy Note 5 nằm trong Top những smartphone được yêu thích nhất trong năm 2015 - 2016 và nửa đầu năm 2017. Tới thời điểm này, Note 5 vẫn được xếp vào Top những sản phẩm đáng mua nhờ những ưu điểm riêng biệt.', 3200000, 0, 'zUnnssnote5_d.jpg', 'cái', 0, '2016-10-13 02:20:00', '2018-12-21 01:59:38'),
(51, 'Sam Sung Note 5 Vàng', 2, 'Samsung Galaxy Note 5 sẽ là chiếc smartphone mà bạn sẽ bị hút mắt khi cầm trên tay bởi thiết nguyến khôi tinh tế - sang trọng. Vì sản phẩm đáng giá từng xu. Thực tế với mức giá chưa tới 4 triệu đồng nhưng máy mang đến nhiều tính năng mà các thiết bị trong phân khúc giá có được bao gồm:\r\n- Một thiết kế nguyến khối vừa tay, cứng cáp, đẹp cuốn hút và sang trọng.\r\n- Màn hình độ phân giải 4k\r\n- Cấu hình phần cứng cực mạnh của sản phẩm cao cấp Ram 4Gb\r\n- Quay video 4K.\r\n- Điều khiển các thiết bị điện tử khác thông qua cổng hồng ngoại.\r\n- Thời lượng pin dài.\r\n- Giá hợp lý so với tính năng và cấu hình\r\n (thương hiệu và hình ảnh sản phẩm của samsung đã được khẳng định -> Samsung Note 5 là sản phẩm cao cấp)\r\nDù đã ra mắt khá lâu, Samsung Galaxy Note 5 vẫn có những ưu điểm nổi trội để lọt Top những sản phẩm cực kỳ đáng mua ở thời điểm hiện tại.\r\nSamsung Galaxy Note 5 nằm trong Top những smartphone được yêu thích nhất trong năm 2015 - 2016 và nửa đầu năm 2017. Tới thời điểm này, Note 5 vẫn được xếp vào Top những sản phẩm đáng mua nhờ những ưu điểm riêng biệt.', 3200000, 3000000, '8S2mssnote5_v.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2018-12-21 02:00:11'),
(52, 'Sam Sung Note 5 Xanh', 2, 'Samsung Galaxy Note 5 sẽ là chiếc smartphone mà bạn sẽ bị hút mắt khi cầm trên tay bởi thiết nguyến khôi tinh tế - sang trọng. Vì sản phẩm đáng giá từng xu. Thực tế với mức giá chưa tới 4 triệu đồng nhưng máy mang đến nhiều tính năng mà các thiết bị trong phân khúc giá có được bao gồm:\r\n- Một thiết kế nguyến khối vừa tay, cứng cáp, đẹp cuốn hút và sang trọng.\r\n- Màn hình độ phân giải 4k\r\n- Cấu hình phần cứng cực mạnh của sản phẩm cao cấp Ram 4Gb\r\n- Quay video 4K.\r\n- Điều khiển các thiết bị điện tử khác thông qua cổng hồng ngoại.\r\n- Thời lượng pin dài.\r\n- Giá hợp lý so với tính năng và cấu hình\r\n (thương hiệu và hình ảnh sản phẩm của samsung đã được khẳng định -> Samsung Note 5 là sản phẩm cao cấp)\r\nDù đã ra mắt khá lâu, Samsung Galaxy Note 5 vẫn có những ưu điểm nổi trội để lọt Top những sản phẩm cực kỳ đáng mua ở thời điểm hiện tại.\r\nSamsung Galaxy Note 5 nằm trong Top những smartphone được yêu thích nhất trong năm 2015 - 2016 và nửa đầu năm 2017. Tới thời điểm này, Note 5 vẫn được xếp vào Top những sản phẩm đáng mua nhờ những ưu điểm riêng biệt.', 3100000, 0, '0Qbzssnote5_x.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2018-12-21 02:00:49'),
(53, 'Sam Sung S7', 2, 'Chuẩn IP68 giúp chiếc điện thoại này có thể ngâm dưới độ sâu 1,5m trong tối đa 30 phút, tuy nhiên bạn không nên thử tính năng này vì nếu có trục trặc dẫn tới vào nước thì máy bạn sẽ không được hưởng chế độ bảo hành.\r\n\r\nThiết kế bo cong mềm mại\r\nGalaxy S7 với các cạnh máy được bo cong một cách mềm mại, giúp máy cầm gọn trong lòng bàn tay và không hề có cảm giác cấn. Các góc cạnh ở mặt trước được mài cong 2.5D tạo cảm giác thoải mái khi thao tác trên màn hình.', 5600000, 0, 'LrpZsss7.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2018-12-21 02:01:58'),
(54, 'Sam Sung S7 Bạc', 7, 'Chuẩn IP68 giúp chiếc điện thoại này có thể ngâm dưới độ sâu 1,5m trong tối đa 30 phút, tuy nhiên bạn không nên thử tính năng này vì nếu có trục trặc dẫn tới vào nước thì máy bạn sẽ không được hưởng chế độ bảo hành.\r\n\r\nThiết kế bo cong mềm mại\r\nGalaxy S7 với các cạnh máy được bo cong một cách mềm mại, giúp máy cầm gọn trong lòng bàn tay và không hề có cảm giác cấn. Các góc cạnh ở mặt trước được mài cong 2.5D tạo cảm giác thoải mái khi thao tác trên màn hình.', 5500000, 5000000, 'xprNsss7_b.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2018-12-21 02:02:30'),
(55, 'Sam Sung S7 Đen', 2, 'Chuẩn IP68 giúp chiếc điện thoại này có thể ngâm dưới độ sâu 1,5m trong tối đa 30 phút, tuy nhiên bạn không nên thử tính năng này vì nếu có trục trặc dẫn tới vào nước thì máy bạn sẽ không được hưởng chế độ bảo hành.\r\n\r\nThiết kế bo cong mềm mại\r\nGalaxy S7 với các cạnh máy được bo cong một cách mềm mại, giúp máy cầm gọn trong lòng bàn tay và không hề có cảm giác cấn. Các góc cạnh ở mặt trước được mài cong 2.5D tạo cảm giác thoải mái khi thao tác trên màn hình.', 5700000, 0, '54pYsss7_d.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2018-12-21 02:03:04'),
(56, 'Sam Sung S7 Vàng', 2, 'Chuẩn IP68 giúp chiếc điện thoại này có thể ngâm dưới độ sâu 1,5m trong tối đa 30 phút, tuy nhiên bạn không nên thử tính năng này vì nếu có trục trặc dẫn tới vào nước thì máy bạn sẽ không được hưởng chế độ bảo hành.\r\n\r\nThiết kế bo cong mềm mại\r\nGalaxy S7 với các cạnh máy được bo cong một cách mềm mại, giúp máy cầm gọn trong lòng bàn tay và không hề có cảm giác cấn. Các góc cạnh ở mặt trước được mài cong 2.5D tạo cảm giác thoải mái khi thao tác trên màn hình.', 5500000, 0, 'VDEnsss7_v.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2018-12-21 02:05:15'),
(57, 'Sam Sung S7 Xanh', 2, 'Chuẩn IP68 giúp chiếc điện thoại này có thể ngâm dưới độ sâu 1,5m trong tối đa 30 phút, tuy nhiên bạn không nên thử tính năng này vì nếu có trục trặc dẫn tới vào nước thì máy bạn sẽ không được hưởng chế độ bảo hành.\r\n\r\nThiết kế bo cong mềm mại\r\nGalaxy S7 với các cạnh máy được bo cong một cách mềm mại, giúp máy cầm gọn trong lòng bàn tay và không hề có cảm giác cấn. Các góc cạnh ở mặt trước được mài cong 2.5D tạo cảm giác thoải mái khi thao tác trên màn hình.', 5700000, 0, 'nDpvsss7_x.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2018-12-21 02:05:43'),
(58, 'Sam Sung S8', 2, 'Đặc điểm nổi bật\r\nSamsung Galaxy S8 – tuyệt tác công nghệ với màn hình vô cực Infinity \r\n\r\nSamsung galaxy S8 đã chính thức xuất hiện với nhiều thay đổi đột phá so với 7 thế hệ tiền nhiệm trước đây. Máy tích hợp nhiều tính năng và công nghệ độc đáo, mà theo Samsung là vượt qua giới hạn mà mọi người từng biết tới. Cùng khám phá nhé!', 5900000, 0, '5r1osss8.jpg', '', 1, '2016-10-26 17:00:00', '2018-12-21 02:07:21'),
(59, 'Sam Sung S9', 2, 'Sau thành công của bộ đôi Galaxy S8/S8+ và Galaxy Note8, smartphone cao cấp Galaxy S thế hệ mới nhận được nhiều kỳ vọng. Trước khi xuất hiện chính thức, nhiều tin tức và hình ảnh rò rỉ cũng hé lộ phần nào chân dung của smartphone \"bom tấn\" tới từ Samsung.\r\n\r\nVề thiết kế\r\nGiống S8 và khác với Note8, Galaxy S9 được cho có tới hai phiên bản với kích cỡ màn hình khác nhau, phù hợp với nhiều người dùng và nhu cầu sử dụng. Phiên bản S9 tiêu chuẩn có màn hình 5.8\" trong khi S9+ sở hữu màn hình lên tới 6.2\".', 12000000, 10000000, 'dxPGsss9.jpg', '', 1, '2016-10-26 17:00:00', '2018-12-21 02:10:34'),
(61, 'Sam Sung S9 Đen', 2, 'Những chiếc cupcake có cấu tạo gồm phần vỏ bánh xốp mịn và phần kem trang trí bên trên rất bắt mắt với nhiều hình dạng và màu sắc khác nhau. Cupcake còn được cho là chiếc bánh mang lại niềm vui và tiếng cười như chính hình dáng đáng yêu của cSau thành công của bộ đôi Galaxy S8/S8+ và Galaxy Note8, smartphone cao cấp Galaxy S thế hệ mới nhận được nhiều kỳ vọng. Trước khi xuất hiện chính thức, nhiều tin tức và hình ảnh rò rỉ cũng hé lộ phần nào chân dung của smartphone \"bom tấn\" tới từ Samsung.\r\n\r\nVề thiết kế\r\nGiống S8 và khác với Note8, Galaxy S9 được cho có tới hai phiên bản với kích cỡ màn hình khác nhau, phù hợp với nhiều người dùng và nhu cầu sử dụng. Phiên bản S9 tiêu chuẩn có màn hình 5.8\" trong khi S9+ sở hữu màn hình lên tới 6.2\".húng.', 15000000, 14000000, 'tFFXsss9_d.jpg', 'cái', 1, NULL, '2018-12-21 02:11:14'),
(65, 'Xiaomi 8 Lite', 7, 'Liên tục phát triển theo xu hướng thị trường cùng như đáp ứng nhu cầu người dùng Xiaomi luôn mang đến cho người dùng những sản phẩm mới với nhiều tính năng mới, thiết kế sang trọng và đặc biệt là một cấu hình cực tốt trong phân khúc giá khi đặt cạnh các hãng khác và lần này thì hãng điện thoại đến từ Trung Quốc đang giới thiệu đến người dùng siêu phẩm mang tên Xiaomi Mi 8 Lite. Hãy cùng đánh giá siêu phẩm này trong bài viết sau nhé', 4300000, 0, 'J1fbxiaomi.jpg', NULL, 1, '2018-02-19 07:12:01', '2018-12-21 03:51:54'),
(67, 'Xiaomi 8 Lite Đen', 7, 'Liên tục phát triển theo xu hướng thị trường cùng như đáp ứng nhu cầu người dùng Xiaomi luôn mang đến cho người dùng những sản phẩm mới với nhiều tính năng mới, thiết kế sang trọng và đặc biệt là một cấu hình cực tốt trong phân khúc giá khi đặt cạnh các hãng khác và lần này thì hãng điện thoại đến từ Trung Quốc đang giới thiệu đến người dùng siêu phẩm mang tên Xiaomi Mi 8 Lite. Hãy cùng đánh giá siêu phẩm này trong bài viết sau nhé', 4200000, 4100000, 'A2Z7xiaomi8liteblack.jpg', NULL, 1, '2018-02-19 07:17:57', '2018-12-21 03:52:51'),
(69, 'Nokia', 3, 'Thiết kế màn hình tai thỏ đang là xu hướng chung của các hãng điện thoại trên thế giới. Cũng như Apple hay Huawei, nhà sản xuất HMD Global đã bắt đầu giới thiệu sản phẩm Nokia X5 có màn hình 5,9” với tỉ lệ màn hình 19:9 và độ phân giải 720 x 1520 pixels. Mặc dù màn hình lớn gần tới 6” nhưng máy khá là nhỏ gọn, ôm tay và nhẹ. Và đặc biệt hơn, người Phần Lan đã mang thiết kế tai thỏ vào sản phẩm của mình.', 2500000, 0, 'ieMenokiax5.jpg', NULL, 0, '2018-12-21 10:08:30', '2018-12-21 10:08:30'),
(70, 'Nokia 6x', 3, 'Thiết kế màn hình tai thỏ đang là xu hướng chung của các hãng điện thoại trên thế giới. Cũng như Apple hay Huawei, nhà sản xuất HMD Global đã bắt đầu giới thiệu sản phẩm Nokia X5 có màn hình 5,9” với tỉ lệ màn hình 19:9 và độ phân giải 720 x 1520 pixels. Mặc dù màn hình lớn gần tới 6” nhưng máy khá là nhỏ gọn, ôm tay và nhẹ. Và đặc biệt hơn, người Phần Lan đã mang thiết kế tai thỏ vào sản phẩm của mình.', 3100000, 3000000, 'wo3Tnokiax6.jpg', NULL, 0, '2018-12-21 10:09:13', '2018-12-21 10:09:13'),
(71, 'Nokia 7x', 1, 'Thiết kế màn hình tai thỏ đang là xu hướng chung của các hãng điện thoại trên thế giới. Cũng như Apple hay Huawei, nhà sản xuất HMD Global đã bắt đầu giới thiệu sản phẩm Nokia X5 có màn hình 5,9” với tỉ lệ màn hình 19:9 và độ phân giải 720 x 1520 pixels. Mặc dù màn hình lớn gần tới 6” nhưng máy khá là nhỏ gọn, ôm tay và nhẹ. Và đặc biệt hơn, người Phần Lan đã mang thiết kế tai thỏ vào sản phẩm của mình.', 5000000, 4700000, 'XK7dnokiax7.jpg', NULL, 1, '2018-12-21 10:09:45', '2018-12-21 10:09:45'),
(72, 'Huawei Mate 20', 5, 'Trí tưởng tượng vô hạn của con người—đó là nguồn cảm hứng cho HUAWEI Mate 20 Pro mới. Những đột phá về công nghệ sẽ làm mờ ranh giới giữa những gì bạn có thể mơ ước và những gì bạn có thể làm.', 3100000, 3000000, '1Ebzhuaweimate20.jpg', NULL, 1, '2018-12-21 10:10:40', '2018-12-21 10:10:40'),
(73, 'Huawei nova 3i', 1, 'Trí tưởng tượng vô hạn của con người—đó là nguồn cảm hứng cho HUAWEI Mate 20 Pro mới. Những đột phá về công nghệ sẽ làm mờ ranh giới giữa những gì bạn có thể mơ ước và những gì bạn có thể làm.', 4300000, 0, '7K3zhuaweinova3i.jpg', NULL, 0, '2018-12-21 10:11:21', '2018-12-21 10:11:21'),
(74, 'Huawei P20', 1, 'Trí tưởng tượng vô hạn của con người—đó là nguồn cảm hứng cho HUAWEI Mate 20 Pro mới. Những đột phá về công nghệ sẽ làm mờ ranh giới giữa những gì bạn có thể mơ ước và những gì bạn có thể làm.', 4600000, 4550000, 'Cg4Yhuaweip20.jpg', NULL, 0, '2018-12-21 10:12:03', '2018-12-21 10:12:03'),
(75, 'LG G7 One', 6, 'LG đã thể hiện được vị trí của mình một lần nữa với sự xuất hiện của LG G7 ThinQ cũ  xách tay Hàn Quốc. Được trang bị nhiều công nghệ tiên tiến và chỉ số mạnh, chiếc điện thoại hứa hẹn sẽ đứng vững trên thị trường một thời gian dài.\r\nThiết kế thời thượng\r\nLG G7 ThinQ cũ bản Hàn sở hữu khung kim loại cùng thiết kế kính sang trọng, phần lưng được bo cong 4 cạnh làm cho máy tạo cảm trông mỏng và vô cùng tinh tế. Phần notch rất hữu dụng khi vùa là nơi đặt phần cứng vừa dùng làm màn hình phụ hiển thị các thông báo.', 5400000, 5300000, 'dBdblgg7one.jpg', NULL, 0, '2018-12-21 10:14:02', '2018-12-21 10:14:02'),
(76, 'LG Q9', 6, 'LG đã thể hiện được vị trí của mình một lần nữa với sự xuất hiện của LG Q9 ThinQ cũ  xách tay Hàn Quốc. Được trang bị nhiều công nghệ tiên tiến và chỉ số mạnh, chiếc điện thoại hứa hẹn sẽ đứng vững trên thị trường một thời gian dài.\r\nThiết kế thời thượng\r\nLG Q9 ThinQ cũ bản Hàn sở hữu khung kim loại cùng thiết kế kính sang trọng, phần lưng được bo cong 4 cạnh làm cho máy tạo cảm trông mỏng và vô cùng tinh tế. Phần notch rất hữu dụng khi vùa là nơi đặt phần cứng vừa dùng làm màn hình phụ hiển thị các thông báo.', 5600000, 5500000, 'J2CdLgq9.jpg', NULL, 0, '2018-12-21 10:14:45', '2018-12-21 10:14:45'),
(77, 'LG V30', 6, 'LG đã thể hiện được vị trí của mình một lần nữa với sự xuất hiện của LG G7 ThinQ cũ  xách tay Hàn Quốc. Được trang bị nhiều công nghệ tiên tiến và chỉ số mạnh, chiếc điện thoại hứa hẹn sẽ đứng vững trên thị trường một thời gian dài.\r\nThiết kế thời thượng\r\nLG G7 ThinQ cũ bản Hàn sở hữu khung kim loại cùng thiết kế kính sang trọng, phần lưng được bo cong 4 cạnh làm cho máy tạo cảm trông mỏng và vô cùng tinh tế. Phần notch rất hữu dụng khi vùa là nơi đặt phần cứng vừa dùng làm màn hình phụ hiển thị các thông báo.', 4100000, 3950000, 'YVPClgv30.jpg', NULL, 1, '2018-12-21 10:15:13', '2018-12-21 10:15:13'),
(78, 'LG V40', 1, 'LG đã thể hiện được vị trí của mình một lần nữa với sự xuất hiện của LG G7 ThinQ cũ  xách tay Hàn Quốc. Được trang bị nhiều công nghệ tiên tiến và chỉ số mạnh, chiếc điện thoại hứa hẹn sẽ đứng vững trên thị trường một thời gian dài.\r\nThiết kế thời thượng\r\nLG G7 ThinQ cũ bản Hàn sở hữu khung kim loại cùng thiết kế kính sang trọng, phần lưng được bo cong 4 cạnh làm cho máy tạo cảm trông mỏng và vô cùng tinh tế. Phần notch rất hữu dụng khi vùa là nơi đặt phần cứng vừa dùng làm màn hình phụ hiển thị các thông báo.', 6400000, 5990000, 'cMvPlgv40.jpg', NULL, 1, '2018-12-21 10:15:58', '2018-12-21 10:15:58'),
(79, 'Oppo Find X', 4, 'OPPO Find X tạo nên một cú hích lớn trong làng smartphone hiện nay khi mang trong mình nhiều tính năng đột phá mà nổi bật nhất đến từ thiết kế sáng tạo và một hiệu năng đỉnh cao.\r\nThiết kế đến từ tương lai\r\nChiếc điện thoại OPPO mới đã tạo nên sự khác biệt cho riêng mình nhờ lối thiết kế dạng trượt phần camera giúp không gian hiển thị mặt trước chiếm gần như là trọn vẹn.', 6990000, 0, 'GX0boppofindx.jpg', NULL, 1, '2018-12-21 10:22:12', '2018-12-21 10:22:12'),
(80, 'Oppo Readme', 4, 'OPPO Find X tạo nên một cú hích lớn trong làng smartphone hiện nay khi mang trong mình nhiều tính năng đột phá mà nổi bật nhất đến từ thiết kế sáng tạo và một hiệu năng đỉnh cao.\r\nThiết kế đến từ tương lai\r\nChiếc điện thoại OPPO mới đã tạo nên sự khác biệt cho riêng mình nhờ lối thiết kế dạng trượt phần camera giúp không gian hiển thị mặt trước chiếm gần như là trọn vẹn.', 5400000, 5000000, 'vY5eopporeame.png', NULL, 0, '2018-12-21 10:22:58', '2018-12-21 10:22:58'),
(81, 'Oppo Find X xanh', 1, 'OPPO Find X tạo nên một cú hích lớn trong làng smartphone hiện nay khi mang trong mình nhiều tính năng đột phá mà nổi bật nhất đến từ thiết kế sáng tạo và một hiệu năng đỉnh cao.\r\nThiết kế đến từ tương lai\r\nChiếc điện thoại OPPO mới đã tạo nên sự khác biệt cho riêng mình nhờ lối thiết kế dạng trượt phần camera giúp không gian hiển thị mặt trước chiếm gần như là trọn vẹn.', 6990000, 6700000, 'Sogyoppofindxx.jpg', NULL, 1, '2018-12-21 10:23:32', '2018-12-21 10:23:32'),
(82, 'Oppo Find X Tím', 4, 'OPPO Find X tạo nên một cú hích lớn trong làng smartphone hiện nay khi mang trong mình nhiều tính năng đột phá mà nổi bật nhất đến từ thiết kế sáng tạo và một hiệu năng đỉnh cao.\r\nThiết kế đến từ tương lai\r\nChiếc điện thoại OPPO mới đã tạo nên sự khác biệt cho riêng mình nhờ lối thiết kế dạng trượt phần camera giúp không gian hiển thị mặt trước chiếm gần như là trọn vẹn.', 6990000, 7890000, 'xv4xoppofindxt.jpg', NULL, 0, '2018-12-21 10:24:49', '2018-12-21 10:24:49'),
(83, 'Xiaomi', 7, 'OPPO Find X tạo nên một cú hích lớn trong làng smartphone hiện nay khi mang trong mình nhiều tính năng đột phá mà nổi bật nhất đến từ thiết kế sáng tạo và một hiệu năng đỉnh cao.\r\nThiết kế đến từ tương lai\r\nChiếc điện thoại OPPO mới đã tạo nên sự khác biệt cho riêng mình nhờ lối thiết kế dạng trượt phần camera giúp không gian hiển thị mặt trước chiếm gần như là trọn vẹn.', 3100000, 3000000, 'uVWKxiaomi.jpg', NULL, 0, '2018-12-21 10:25:37', '2018-12-21 10:25:37'),
(84, 'Xiaomi Note 5 Pro', 7, 'Thiết kết điện thoại Redmi Note 5 Pro \r\nRedmi Note 5 Pro có bộ vỏ bằng kim loại. Đây vốn là đặc điểm của các mẫu điện thoại tầm trung. Các mẫu smartphone cao cấp hiện nay đều có vỏ bằng kính, vừa sang trọng vừa hỗ trợ được sạc không dây.\r\n\r\nXiaomi đã trang bị cho chiếc Redmi Note 5 Pro màn hình 5,99 inch độ phân giải Full HD+ (1080 x 2160 pixel). Kích thước màn hình và độ phân giải này tương đương với chiếc Note 5 Plus. Dường như Note 5 Pro là phiên bản dành cho thị trường Ấn Độ của chiếc Note 5 Plus.', 2950000, 0, 'lO8Nxiaomi5plus.jpg', NULL, 1, '2018-12-21 10:29:53', '2018-12-21 10:29:53'),
(85, 'Xiaomi Redmi 6', 7, 'Thiết kết điện thoại Redmi Note 5 Pro \r\nRedmi Note 5 Pro có bộ vỏ bằng kim loại. Đây vốn là đặc điểm của các mẫu điện thoại tầm trung. Các mẫu smartphone cao cấp hiện nay đều có vỏ bằng kính, vừa sang trọng vừa hỗ trợ được sạc không dây.\r\n\r\nXiaomi đã trang bị cho chiếc Redmi Note 5 Pro màn hình 5,99 inch độ phân giải Full HD+ (1080 x 2160 pixel). Kích thước màn hình và độ phân giải này tương đương với chiếc Note 5 Plus. Dường như Note 5 Pro là phiên bản dành cho thị trường Ấn Độ của chiếc Note 5 Plus.', 2000000, 1900000, 'fbaVxiaomi6a.jpg', NULL, 0, '2018-12-21 10:30:24', '2018-12-21 10:30:24'),
(86, 'Xiaomi 8 Lite', 7, 'Thiết kết điện thoại Redmi Note 5 Pro \r\nRedmi Note 5 Pro có bộ vỏ bằng kim loại. Đây vốn là đặc điểm của các mẫu điện thoại tầm trung. Các mẫu smartphone cao cấp hiện nay đều có vỏ bằng kính, vừa sang trọng vừa hỗ trợ được sạc không dây.\r\n\r\nXiaomi đã trang bị cho chiếc Redmi Note 5 Pro màn hình 5,99 inch độ phân giải Full HD+ (1080 x 2160 pixel). Kích thước màn hình và độ phân giải này tương đương với chiếc Note 5 Plus. Dường như Note 5 Pro là phiên bản dành cho thị trường Ấn Độ của chiếc Note 5 Plus.', 4600000, 4400000, 'DM6Kxiaomi8liteblack.jpg', NULL, 1, '2018-12-21 10:32:28', '2018-12-21 10:32:28'),
(87, 'Xiaomi 8 Lite Vàng', 7, 'Thiết kết điện thoại Redmi Note 5 Pro \r\nRedmi Note 5 Pro có bộ vỏ bằng kim loại. Đây vốn là đặc điểm của các mẫu điện thoại tầm trung. Các mẫu smartphone cao cấp hiện nay đều có vỏ bằng kính, vừa sang trọng vừa hỗ trợ được sạc không dây.\r\n\r\nXiaomi đã trang bị cho chiếc Redmi Note 5 Pro màn hình 5,99 inch độ phân giải Full HD+ (1080 x 2160 pixel). Kích thước màn hình và độ phân giải này tương đương với chiếc Note 5 Plus. Dường như Note 5 Pro là phiên bản dành cho thị trường Ấn Độ của chiếc Note 5 Plus.', 4900000, 4700000, 'Xagbxiaomi8litegole.jpg', NULL, 0, '2018-12-21 10:33:14', '2018-12-21 10:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`) VALUES
(1, '', 'Ns0Gbanner1.png'),
(2, '', 'BEqBbanner2.png'),
(3, '', 'tKO9banner3.png'),
(4, '', 'ov1Obanner4.png');

-- --------------------------------------------------------

--
-- Table structure for table `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'IPHONE', 'Đọc xong tiêu đề và đoạn trên chắc hẳn nhiều bạn sẽ cho rằng mình là một SamFan mà không cần xem tiếp bên dưới. Vậy thì bạn nhầm, mình vẫn là iFan và đang dùng song song Galaxy Note 9 và iPhone X, mấy năm nay xung quanh mình dùng nhiều đồ của Apple hơn Samsung, từ máy tính MacBook Pro, iMac, chuột Magic Mouse, phím, Apple TV, iPhone X, Apple Watch S3 và các bộ phát wi-fi Airport Extreme & Express ở cả công ty lẫn gia đình.\r\n\r\nRiêng iPhone với iOS luôn được mình đánh giá là có độ ổn định và hiệu năng tốt nhất so với Android, cả phiên bản Android mới nhất là Oreo 8.1. Vậy thì bài viết này “PR\' cho Samsung? - Bài này khó lấy được tiền PR vì có rất ít cái Samsung muốn, như cấu hình, khẩu độ camera, pin, Samsung Pay, Samsung Elite... Nếu không tin bạn cứ đọc tiếp nhé...', 'dTMGip7plus_h.jpg', '2018-12-05 17:00:00', '2018-12-21 03:14:15'),
(2, 'SAMSUNG', 'Thiết kế quen thuộc\r\nSamsung Galaxy J8 vẫn sở hữu một lối thiết kế đậm chất Samsung với sự mềm mại, uyển chuyển nhưng vẫn khá thanh thoát đến từng góc cạnh của máy. Máy được hoàn thiệt với thiết kế nguyên khối nên máy cho khả năng cầm nắm chắc chắn và rất đầm tay. Cảm biến vân tay được đặt ở một vị trí thuận lợi ở mặt lưng giúp bạn mở khóa máy một cách thuận tiện và dễ dàng.', 'gFlAsss9.jpg', '2016-10-12 02:16:15', '2018-12-21 03:15:39'),
(3, 'NOKIA', 'Android nguyên bản\r\nĐiện thoại thông minh Nokia đi kèm với Android™ phiên bản mới nhất hoàn toàn không có ứng dụng không cần thiết và được cập nhật bảo mật thường xuyên. Điều này giúp mang lại trải nghiệm 100% nguyên bản, bảo mật và luôn cập nhật.', 'EUbInokiax7.jpg', '2016-10-18 00:33:33', '2018-12-21 03:16:34'),
(4, 'OPPO', 'Thiết kế kim cương độc đáo\r\nLấy ý tưởng từ kim cương góc cạnh, F7 Youth khoác lên mình mặt lưng lấp lánh tựa kim cương. Những lát cắt sáng-tối đan xen kết hợp cùng ánh sáng tạo nên những góc nhìn kỳ ảo đầy mê hoặc.', '87vooppo.jpg', '2016-10-26 03:29:19', '2018-12-21 03:17:15'),
(5, 'HUAWEI', 'Trí tưởng tượng vô hạn của con người—đó là nguồn cảm hứng cho HUAWEI Mate 20 Pro mới. Những đột phá về công nghệ sẽ làm mờ ranh giới giữa những gì bạn có thể mơ ước và những gì bạn có thể làm.', 'Rd0Ahuaweip20.jpg', '2016-10-28 04:00:00', '2018-12-21 03:42:03'),
(6, 'LG', 'Lưu lại khoảnh khắc đẹp nhất của bạn ở mọi nơi với LG K10! Thỏa sức tạo dáng, việc còn lại đã có LG K10 giúp bạn có những hình ảnh Selfie tuyệt đẹp theo 1 cách không thể dễ dàng hơn. Chính bàn tay của bạn trở thành nút chụp hình Selfie, chỉ bằng cử chỉ giơ bàn tay sau đó nắm lại, việc chụp hình Selfie sẽ diễn ra tự động. Tính năng đèn Flash ảo trên LG K10 sẽ giúp bạn luôn có những bức hình Selfie sáng đẹp dù ở trong môi trường ánh sáng nào.', 'vrJqlgv40.jpg', '2016-10-25 17:19:00', '2018-12-21 03:43:43'),
(7, 'XIAOMI', 'Liên tục phát triển theo xu hướng thị trường cùng như đáp ứng nhu cầu người dùng Xiaomi luôn mang đến cho người dùng những sản phẩm mới với nhiều tính năng mới, thiết kế sang trọng và đặc biệt là một cấu hình cực tốt trong phân khúc giá khi đặt cạnh các hãng khác và lần này thì hãng điện thoại đến từ Trung Quốc đang giới thiệu đến người dùng siêu phẩm mang tên Xiaomi Mi 8 Lite. Hãy cùng đánh giá siêu phẩm này trong bài viết sau nhé', 'QRncxiaomi.jpg', '2016-10-25 17:19:00', '2018-12-21 03:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'Tungnc', 'Tungnc@kaopiz.com', '$2y$10$.90ABPrtbcEXatpRgLMz7Or7.vYYhuEHZJSeC4uTnB2.3kDXPtxUK', '0123456789', 'Ha Noi', 'j1BnREknb3ctDRRhbeJuHWlIGUB2DseOP75CmejWeridLKZ59eAkgDgAttZE', '2018-02-03 08:26:40', '2018-12-21 08:48:32'),
(11, 'Bkaprodx', 'bkaprodx@gmail.com', '$2y$10$yRsiiEragPKJyGs67iNYRuiM3W87ZLItH2CVI08xyEBe7kj9TiUz6', '01657831525', 'Ha Noi', 'RRFuYUUQD4rh34LV3zTrE7bqZGcVZVCq5g85XHxI63brgv3HkHCnPbGZ5qyY', '2018-02-03 08:28:03', '2018-12-21 08:49:18'),
(12, 'test123', 'test123@gmail.com', '$2y$10$QJsXFz1gRDvn8CJUtc2qKOjGS3I72YxYX0mRUNe.xRWNjORbwNoc6', '01638161533', 'Thai Binh', NULL, '2018-02-20 15:46:57', '2018-12-21 08:49:55'),
(13, 'test', 'test@gmail.com', '$2y$10$P/58XxpBN03yrUb6NKjDJeyW1CqLnu7O9wkKk2SOZV/RMKqokqnRm', '0981049470', 'test', NULL, '2018-03-04 09:34:07', '2018-03-04 09:34:07'),
(14, 'tungdeptrai', 'admin@gmail.com', '$2y$10$MclVqkqszQt9HtZNmSij9.nylIQPX4K/bncMhLWFMT0nC5pOQ5hTy', '132412343412', '1231231231', 'ONL6il7Uyfi5MrQ8WwUjURoEBYYRNd3w6Q8fceWzmH0tUnc8jWWH68siUmKI', '2018-12-18 11:58:56', '2018-12-19 10:16:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
