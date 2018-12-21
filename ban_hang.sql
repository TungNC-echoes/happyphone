-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 20, 2018 at 05:46 PM
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
(3, 14, 1, 'Có vẻ ôke', NULL, '2018-12-20 09:09:37', '2018-12-20 09:09:37');

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
(2, 14, '【スカウトメール】＜進学塾ena＞塾講師のご経験をぜひenaで活かしてください♪', 'jghkjlghiljfkjfk', '2018-12-19', '2018-12-19 10:24:09', '2018-12-19 10:24:09');

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
(13, 'Bánh kem Chocolate Dâu', 1, 'CellphoneS xin chào anh Hùng Anh,\r\n\r\nAPPLE IPHONE 6 32GB VÀNG CÔNG TY MỚI(VN) giá là 6.500.000đ đang còn hàng ở CellphoneS 117 Thái Hà, P. Trung Liệt, Q. Đống Đa ạ.\r\n\r\nNếu quan tâm, Anh có thể để tên, số điện thoại, em sẽ hỗ trợ giữ hàng tại cửa hàng trong 24h giúp mình ghé tham khảo ạ.', 2100000, 0, '5a7Eip6_b.jpg', 'cái', 1, '2016-10-12 02:00:00', '2018-12-20 10:07:52'),
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
(32, 'Sam Sung A6 Xanh Dương', 2, 'Thiết kế kim loại nguyên khối\r\nMáy được hoàn thiện từ kim loại nguyên khối, kết hợp với mặt kính cong nhẹ 2.5D cho cảm giác vuốt chạm thoải mái hơn.', 3500000, 3100000, '12aHssa6_x.jpg', 'cái', 0, '2016-10-13 02:20:00', '2018-12-20 10:41:32'),
(33, 'Sam Sung A8', 2, 'Thiết kế kim loại nguyên khối\r\nMáy được hoàn thiện từ kim loại nguyên khối, kết hợp với mặt kính cong nhẹ 2.5D cho cảm giác vuốt chạm thoải mái hơn.', 4500000, 4400000, 'DwhJssa8.jpg', 'cái', 1, '2016-10-13 02:20:00', '2018-12-20 10:42:24'),
(34, 'Sam Sung Note 5', 2, 'Thiết kế kim loại nguyên khối\r\nMáy được hoàn thiện từ kim loại nguyên khối, kết hợp với mặt kính cong nhẹ 2.5D cho cảm giác vuốt chạm thoải mái hơn.', 1500000, 1400000, '6EGKssnote5.jpg', 'cái', 0, '2016-10-13 02:20:00', '2018-12-20 10:43:18'),
(35, 'Sam Sung A8 Đen', 4, 'Thiết kế kim loại nguyên khối\r\nMáy được hoàn thiện từ kim loại nguyên khối, kết hợp với mặt kính cong nhẹ 2.5D cho cảm giác vuốt chạm thoải mái hơn.', 4400000, 4300000, 'y7d6ssa8_d.jpg', 'cái', 0, '2016-10-13 02:20:00', '2018-12-20 10:44:27'),
(36, 'Sam Sung A8 Tím', 4, 'Thiết kế kim loại nguyên khối\r\nMáy được hoàn thiện từ kim loại nguyên khối, kết hợp với mặt kính cong nhẹ 2.5D cho cảm giác vuốt chạm thoải mái hơn.', 4600000, 0, 'Mdx5ssa8_t.jpg', 'cái', 0, '2016-10-13 02:20:00', '2018-12-20 10:45:00'),
(37, 'Bánh kem Mango Mouse', 4, '', 320000, 300000, 'mango-mousse-cake.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(38, 'Bánh kem Matcha Mouse', 4, '', 350000, 330000, 'MATCHA-MOUSSE.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(39, 'Bánh kem Flower Fruit', 4, '', 350000, 330000, 'flower-fruits636102461981788938.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(40, 'Bánh kem Strawberry Delight', 4, '', 350000, 330000, 'strawberry-delight636102445035635173.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(41, 'Bánh kem Raspberry Delight', 4, '', 350000, 330000, 'raspberry.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(42, 'Beefy Pizza', 6, 'Thịt bò xay, ngô, sốt BBQ, phô mai mozzarella', 150000, 130000, '40819_food_pizza.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(43, 'Hawaii Pizza', 6, 'Sốt cà chua, ham , dứa, pho mai mozzarella', 120000, 0, 'hawaiian paradise_large-900x900.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(44, 'Smoke Chicken Pizza', 6, 'Gà hun khói,nấm, sốt cà chua, pho mai mozzarella.', 120000, 0, 'chicken black pepper_large-900x900.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(45, 'Sausage Pizza', 6, 'Xúc xích klobasa, Nấm, Ngô, sốtcà chua, pho mai Mozzarella.', 120000, 0, 'pizza-miami.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(46, 'Ocean Pizza', 6, 'Tôm , mực, xào cay,ớt xanh, hành tây, cà chua, phomai mozzarella.', 120000, 0, 'seafood curry_large-900x900.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(47, 'All Meaty Pizza', 6, 'Ham, bacon, chorizo, pho mai mozzarella.', 140000, 0, 'all1).jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(48, 'Tuna Pizza', 6, 'Cá Ngừ, sốt Mayonnaise,sốt càchua, hành tây, pho mai Mozzarella', 140000, 0, '54eaf93713081_-_07-germany-tuna.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(49, 'Bánh su kem nhân dừa', 7, '', 120000, 100000, 'maxresdefault.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(50, 'Bánh su kem sữa tươi', 7, '', 120000, 100000, 'sukem.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(51, 'Bánh su kem sữa tươi chiên giòn', 7, '', 150000, 0, '1434429117-banh-su-kem-chien-20.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(52, 'Bánh su kem dâu sữa tươi', 7, '', 150000, 0, 'sukemdau.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(53, 'Bánh su kem bơ sữa tươi', 7, '', 150000, 0, 'He-Thong-Banh-Su-Singapore-Chewy-Junior.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(54, 'Bánh su kem nhân trái cây sữa tươi', 7, '', 150000, 0, 'foody-banh-su-que-635930347896369908.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(55, 'Bánh su kem cà phê', 7, '', 150000, 0, 'banh-su-kem-ca-phe-1.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(56, 'Bánh su kem phô mai', 7, '', 150000, 0, '50020041-combo-20-banh-su-que-pho-mai-9.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(57, 'Bánh su kem sữa tươi chocolate', 7, '', 150000, 0, 'combo-20-banh-su-que-kem-sua-tuoi-phu-socola.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(58, 'Bánh Macaron Pháp', 2, 'Thưởng thức macaron, người ta có thể tìm thấy từ những hương vị truyền thống như mâm xôi, chocolate, cho đến những hương vị mới như nấm và trà xanh. Macaron với vị giòn tan của vỏ bánh, béo ngậy ngọt ngào của phần nhân, với vẻ ngoài đáng yêu và nhiều màu sắc đẹp mắt, đây là món bạn không nên bỏ qua khi khám phá nền ẩm thực Pháp.', 200000, 180000, 'Macaron9.jpg', '', 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(59, 'Bánh Tiramisu - Italia', 2, 'Chỉ cần cắn một miếng, bạn sẽ cảm nhận được tất cả các hương vị đó hòa quyện cùng một chính vì thế người ta còn ví món bánh này là Thiên đường trong miệng của bạn', 200000, 0, '234.jpg', '', 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(61, 'Bánh Cupcake - Anh Quốc', 6, 'Những chiếc cupcake có cấu tạo gồm phần vỏ bánh xốp mịn và phần kem trang trí bên trên rất bắt mắt với nhiều hình dạng và màu sắc khác nhau. Cupcake còn được cho là chiếc bánh mang lại niềm vui và tiếng cười như chính hình dáng đáng yêu của chúng.', 150000, 120000, 'cupcake.jpg', 'cái', 1, NULL, NULL),
(65, 'bánh mỳ', 3, 'bánh ngon,dẻ', 32322300, 2321, 'GN22111.jpg', NULL, 1, '2018-02-19 07:12:01', '2018-02-19 07:12:01'),
(67, 'Bánh ngọt', 2, 'bánh ngọt', 12324, 1234, 'euhu210215-banh-sinh-nhat-rau-cau-body- (6).jpg', NULL, 0, '2018-02-19 07:17:57', '2018-02-19 07:17:57'),
(68, 'IP5s', 8, 'Hàng đẹp chất lượng tốt', 5000000, 4500000, 'xhg9ip5s.jpg', NULL, 1, '2018-12-20 08:15:19', '2018-12-20 08:15:19');

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
(1, 'IPHONE', 'Nếu từng bị mê hoặc bởi các loại tarlet ngọt thì chắn chắn bạn không thể bỏ qua những loại tarlet mặn. Ngoài hình dáng bắt mắt, lớp vở bánh giòn giòn cùng với nhân mặn như thịt gà, nấm, thị heo ,… của bánh sẽ chinh phục bất cứ ai dùng thử.', 'yuEzip7plus.jpg', '2018-12-05 17:00:00', '2018-12-20 08:16:47'),
(2, 'SAMSUNG', 'Bánh ngọt là một loại thức ăn thường dưới hình thức món bánh dạng bánh mì từ bột nhào, được nướng lên dùng để tráng miệng. Bánh ngọt có nhiều loại, có thể phân loại dựa theo nguyên liệu và kỹ thuật chế biến như bánh ngọt làm từ lúa mì, bơ, bánh ngọt dạng bọt biển. Bánh ngọt có thể phục vụ những mục đính đặc biệt như bánh cưới, bánh sinh nhật, bánh Giáng sinh, bánh Halloween..', 'ixElssa8.jpg', '2016-10-12 02:16:15', '2018-12-20 08:19:04'),
(3, 'Bánh trái cây', 'Bánh trái cây, hay còn gọi là bánh hoa quả, là một món ăn chơi, không riêng gì của Huế nhưng khi \"lạc\" vào mảnh đất Cố đô, món bánh này dường như cũng mang chút tinh tế, cầu kỳ và đặc biệt. Lấy cảm hứng từ những loại trái cây trong vườn, qua bàn tay khéo léo của người phụ nữ Huế, món bánh trái cây ra đời - ngọt thơm, dịu nhẹ làm đẹp lòng biết bao người thưởng thức.', 'banhtraicay.jpg', '2016-10-18 00:33:33', '2016-10-15 07:25:27'),
(4, 'Bánh kem', 'Với người Việt Nam thì bánh ngọt nói chung đều hay được quy về bánh bông lan – một loại tráng miệng bông xốp, ăn không hoặc được phủ kem lên thành bánh kem. Tuy nhiên, cốt bánh kem thực ra có rất nhiều loại với hương vị, kết cấu và phương thức làm khác nhau chứ không chỉ đơn giản là “bánh bông lan” chung chung đâu nhé!', 'banhkem.jpg', '2016-10-26 03:29:19', '2016-10-26 02:22:22'),
(5, 'Bánh crepe', 'Crepe là một món bánh nổi tiếng của Pháp, nhưng từ khi du nhập vào Việt Nam món bánh đẹp mắt, ngon miệng này đã làm cho biết bao bạn trẻ phải “xiêu lòng”', 'crepe.jpg', '2016-10-28 04:00:00', '2016-10-27 04:00:23'),
(6, 'Bánh Pizza', 'Pizza đã không chỉ còn là một món ăn được ưa chuộng khắp thế giới mà còn được những nhà cầm quyền EU chứng nhận là một phần di sản văn hóa ẩm thực châu Âu. Và để được chứng nhận là một nhà sản xuất pizza không hề đơn giản. Người ta phải qua đủ mọi các bước xét duyệt của chính phủ Ý và liên minh châu Âu nữa… tất cả là để đảm bảo danh tiếng cho món ăn này.', 'pizza.jpg', '2016-10-25 17:19:00', NULL),
(7, 'Bánh su kem', 'Bánh su kem là món bánh ngọt ở dạng kem được làm từ các nguyên liệu như bột mì, trứng, sữa, bơ.... đánh đều tạo thành một hỗn hợp và sau đó bằng thao tác ép và phun qua một cái túi để định hình thành những bánh nhỏ và cuối cùng được nướng chín. Bánh su kem có thể thêm thành phần Sô cô la để tăng vị hấp dẫn. Bánh có xuất xứ từ nước Pháp.', 'sukemdau.jpg', '2016-10-25 17:19:00', NULL),
(8, 'bánh mỳ', 'bánh ăn rất là ngon', 'q3UB234.jpg', '2018-02-15 03:34:24', '2018-02-15 03:34:24');

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
(10, 'Ha Quang', 'quanghavan96@gmail.com', '$2y$10$G2n.69ltLyahVvJG6Ul4x.iwswwzTQ1WRtwT8amjax7DOknzUBPG6', '01638161533', 'Ha Noi', 'j1BnREknb3ctDRRhbeJuHWlIGUB2DseOP75CmejWeridLKZ59eAkgDgAttZE', '2018-02-03 08:26:40', '2018-12-20 08:48:30'),
(11, 'Ha Quang', 'quanghavan92@gmail.com', '$2y$10$OsWTPd1bdZO8xi8m9DcgyukvL5eOPBPmipE/xb9af6TeGP2S6Wre2', '1638161533', 'Hà Nội', 'RRFuYUUQD4rh34LV3zTrE7bqZGcVZVCq5g85XHxI63brgv3HkHCnPbGZ5qyY', '2018-02-03 08:28:03', '2018-02-03 08:28:03'),
(12, 'Hà Văn Quang', 'quanghavan91@gmail.com', '$2y$10$H6z3Ueon/68OV3j3ORO/oObzqbSWSsnL0c64.1thA00Wllt7c1rVa', '01638161533', 'Ninh Bình', NULL, '2018-02-20 15:46:57', '2018-02-20 15:46:57'),
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
