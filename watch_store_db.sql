-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3309
-- Thời gian đã tạo: Th9 04, 2022 lúc 02:15 PM
-- Phiên bản máy phục vụ: 8.0.27
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `watch_store_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(34, 'Đồng hồ Nữ', 0, '2022-07-08 02:21:55', '2022-08-19 14:30:34'),
(35, 'Đồng hồ Nam', 0, '2022-07-08 02:22:00', '2022-08-19 14:30:59'),
(39, 'Đồng hồ Casio', 34, '2022-08-19 14:30:47', '2022-08-19 14:30:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `customer_id` int DEFAULT NULL,
  `employee_id` int DEFAULT NULL,
  `employee_message` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_not_registered`
--

CREATE TABLE `orders_not_registered` (
  `id` int NOT NULL,
  `first_name` text COLLATE utf8mb4_unicode_ci,
  `last_name` text COLLATE utf8mb4_unicode_ci,
  `company_name` text COLLATE utf8mb4_unicode_ci,
  `country` text COLLATE utf8mb4_unicode_ci,
  `street_address` text COLLATE utf8mb4_unicode_ci,
  `postcode_zip` text COLLATE utf8mb4_unicode_ci,
  `town_city` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `phone_number` text COLLATE utf8mb4_unicode_ci,
  `note` text COLLATE utf8mb4_unicode_ci,
  `total` float DEFAULT NULL,
  `payment_type` text COLLATE utf8mb4_unicode_ci,
  `status` text COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_not_registered`
--

INSERT INTO `orders_not_registered` (`id`, `first_name`, `last_name`, `company_name`, `country`, `street_address`, `postcode_zip`, `town_city`, `email`, `phone_number`, `note`, `total`, `payment_type`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Lân', 'Lân', 'Casio', 'Hà Nội', 'Số 10 Tổ 7 Trung Hoà Cầu Giấy Hà Nội', '11111', 'Quận Cầu Giấy', 'vongoclan2k@gmail.com', '0345179648', 'ádasd', 297, 'online_payment', '2', '2022-08-23 03:18:05', '2022-08-23 05:32:33'),
(9, 'Lân', 'Lân', 'Casio', 'Hà Nội', 'Số 10 Tổ 7 Trung Hoà Cầu Giấy Hà Nội', '11111', 'Quận Cầu Giấy', 'vongoclan2k@gmail.com', '0345179648', 'sdsd', 198, 'online_payment', '5', '2022-08-23 08:37:26', '2022-08-23 08:41:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `total` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail_not_registered`
--

CREATE TABLE `order_detail_not_registered` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail_not_registered`
--

INSERT INTO `order_detail_not_registered` (`id`, `order_id`, `product_id`, `quantity`, `amount`, `total`, `created_at`, `updated_at`) VALUES
(13, 8, 24, 1, 99, 99, '2022-08-23 03:18:05', '2022-08-23 03:18:05'),
(14, 8, 25, 1, 99, 99, '2022-08-23 03:18:05', '2022-08-23 03:18:05'),
(15, 8, 26, 1, 99, 99, '2022-08-23 03:18:05', '2022-08-23 03:18:05'),
(16, 9, 24, 2, 99, 198, '2022-08-23 08:37:26', '2022-08-23 08:37:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_code` text COLLATE utf8mb4_unicode_ci,
  `parent_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `key_code`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Danh mục sản phẩm ', 'Danh mục sản phẩm ', NULL, 0, '2022-08-11 07:59:44', '2022-08-11 07:59:44'),
(2, 'Danh sách danh mục', 'Danh sách danh mục', 'list_category', 1, '2022-08-11 07:59:44', '2022-08-11 07:59:44'),
(3, 'Thêm danh mục', 'Thêm danh mục', 'add_category', 1, '2022-08-11 09:34:14', '2022-08-11 09:34:14'),
(4, 'Sửa danh mục', 'Sửa danh mục', 'edit_category', 1, '2022-08-11 09:34:14', '2022-08-11 09:34:14'),
(5, 'Xóa danh mục', 'Xóa danh mục', 'delete_category', 1, '2022-08-11 09:34:14', '2022-08-11 09:34:14'),
(6, 'Sản phẩm', 'Sản phẩm', NULL, 0, '2022-08-11 10:04:21', '2022-08-11 10:04:21'),
(7, 'Danh sách sản phẩm', 'Danh sách sản phẩm ', 'list_product', 6, '2022-08-11 10:04:21', '2022-08-11 10:04:21'),
(8, 'Thêm sản phẩm', 'Thêm sản phẩm', 'add_product', 6, '2022-08-11 10:04:21', '2022-08-11 10:04:21'),
(9, 'Sửa sản phẩm', 'Sửa sản phẩm', 'edit_product', 6, '2022-08-11 10:04:21', '2022-08-11 10:04:21'),
(10, 'Xóa sản phẩm ', 'Xóa sản phẩm', 'delete-product', 6, '2022-08-11 10:04:21', '2022-08-11 10:04:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `sku` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `product_company_id` int DEFAULT NULL,
  `feature_image_path` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_image_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `price`, `stock`, `product_company_id`, `feature_image_path`, `feature_image_name`, `short_description`, `long_description`, `category_id`, `created_at`, `updated_at`) VALUES
(24, 'SP01', 'Lân', 99, 44, 1, '/storage/photos/products/SP01/feature/QXdYh64bKXTJsVbjqBg6.jfif', 'images.jfif', 'ádasd', '<p><strong><em>sdasdasd</em></strong></p>\r\n<p><strong><em> <img src=\"/storage/photos/abc.png\" alt=\"\" width=\"204\" height=\"121\" /></em></strong></p>', 34, '2022-08-19 14:37:54', '2022-08-19 14:38:25'),
(25, 'SP03', 'Đồng hồ test 1', 99, 45455, 1, '/storage/photos/products/SP03/feature/vai9b0C5Ve6Y7BPjX2ru.jfif', 'images (1).jfif', 'adasd', '<p>&aacute;dad</p>', 34, '2022-08-19 14:39:03', '2022-08-19 14:39:03'),
(26, 'SP09', 'Test 3', 99, NULL, 1, '/storage/photos/products/SP09/feature/bRBhiGLQLT7TmVaoN0OL.png', 'brasol.vn-logo-instargram-logo-instagram-vector.png', 'đá', '<p>&aacute;dasd</p>', 34, '2022-08-19 14:50:16', '2022-08-19 14:50:16'),
(27, 'SP04', 'adasdasd', 1, 45541, 1, '/storage/photos/products/SP04/feature/yXepfF5zBvR4CAhr5xQk.jpg', 'anh-dong-ho-dep.jpg', 'ádasd', '<p>&aacute;dad</p>', 39, '2022-08-19 14:51:02', '2022-08-19 14:51:02'),
(28, 'SP02', 'Đây là test', 256, 514, 1, '/storage/photos/products/SP02/feature/gBZjKPvw5QuhlQhGYW9o.jpg', 'anh-dong-ho-dep.jpg', 'ádasd', '<p>&aacute;dasd</p>', 34, '2022-08-19 14:52:29', '2022-08-19 14:52:29'),
(29, 'SP03', 'ádasd', 99, 544, 14, '/storage/photos/products/SP03/feature/igZCtUhUXMQawnXDkPVQ.jfif', 'images (1).jfif', 'ádasd', '<p>&aacute;dasd</p>', 35, '2022-08-19 14:53:07', '2022-08-19 14:53:07'),
(30, 'SP10', 'adasd', 99, 1515, 1, '/storage/photos/products/SP10/feature/DqVLB3GbXpGUN70qp488.webp', '8-thu-thuat-lay-hinh-anh-dong-ho-dep-chat-luong-cao-free-h3.webp', 'ádasd', '<p>&aacute;dasda</p>', 39, '2022-08-19 14:54:29', '2022-08-19 14:54:29'),
(31, 'SP099', 'abc', 2554, 515, 1, '/storage/photos/products/SP099/feature/4aYgZmXVtPmvH35Bouth.jpg', '1542361919197_6669410.jpg', 'ádasd', '<p>&aacute;dasd</p>', 34, '2022-08-19 14:55:06', '2022-08-19 14:55:06'),
(32, 'iooo', 'sadsd', 45, 448, 1, '/storage/photos/products/iooo/feature/BFXfyHYAPfeBCojTl1WV.PNG', 'Capture.PNG', 'ádads', '<p><strong>&aacute;dsdas</strong></p>\r\n<p><strong><img src=\"/storage/photos/37/B18DCPT125_AS06.png\" alt=\"\" width=\"2880\" height=\"1620\" /></strong></p>', 34, '2022-08-23 08:40:45', '2022-08-23 08:40:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_company`
--

CREATE TABLE `product_company` (
  `id` int NOT NULL,
  `company_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_short_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_image_path` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_image_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_company`
--

INSERT INTO `product_company` (`id`, `company_name`, `company_short_name`, `logo_image_path`, `logo_image_name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Casio', 'Casio', '/storage/photos/company-logo/Casio/5nOoN899omXr9CpNOvKu.jpeg', '5e3482ba48f3afdedb8201cb_Slide 2 (1).jpeg', 'abc', NULL, '2022-07-15 10:21:20'),
(13, 'Thương hiệu 1', 'TH1', '/storage/photos/company-logo/TH1/Mup85SKVkxoWXJSH8kuB.jpg', 'doge.jpg', 'Số 10 Tổ 7 Trung Hoà Cầu Giấy Hà Nội', '2022-07-15 09:42:08', '2022-07-15 09:42:08'),
(14, 'Luân ABC', 'L', '/storage/photos/company-logo/L/3wbyS8WRBXaHzXQ0rhN1.jpg', 'kitty.jpg', 'aaa', '2022-07-15 10:22:01', '2022-07-15 10:22:12'),
(15, 'sdf', 'sfasdf', '/storage/photos/company-logo/sfasdf/GX8wMIUT1dz0LhxTdAHl.jpg', 'dating.jpg', 'sdf', '2022-08-03 08:10:37', '2022-08-23 08:39:31'),
(16, 'sdf', 'sadf', '/storage/photos/company-logo/sadf/VKrAWyTlVo2y3rHMZgpP.jpg', 'dating.jpg', 'sadf', '2022-08-03 08:10:42', '2022-08-23 06:02:23'),
(17, 'Thương hiệu 1 test', 'THT', '/storage/photos/company-logo/THT/uyA2xu6xHULe2GgvEQdV.png', 'Facebook_Logo_(2019)dsf.png', 'ádasdasd', '2022-08-23 06:13:56', '2022-08-23 06:13:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `id` int NOT NULL,
  `image_path` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`id`, `image_path`, `image_name`, `product_id`, `created_at`, `updated_at`) VALUES
(64, '/storage/photos/products/SP03/detail/T2gX1gpuZnJXMHlxBX2e.jfif', 'images.jfif', 25, '2022-08-19 14:39:03', '2022-08-19 14:39:03'),
(65, '/storage/photos/products/SP01/detail/CRQHOWLfMjux69f363NH.png', 'abcde.png', 24, '2022-08-19 14:49:36', '2022-08-19 14:49:36'),
(66, '/storage/photos/products/SP01/detail/XPIfvxfz32cpBxs94Rh8.png', 'abi.png', 24, '2022-08-19 14:49:36', '2022-08-19 14:49:36'),
(67, '/storage/photos/products/SP01/detail/VhwgNq3NwVHKTvSP7YEc.png', 'B18DCPT125_AS06.png', 24, '2022-08-19 14:49:36', '2022-08-19 14:49:36'),
(68, '/storage/photos/products/SP09/detail/Juc6CUMzMDCTltiExGp1.png', 'btcoDTL-Page-2.drawio.png', 26, '2022-08-19 14:50:16', '2022-08-19 14:50:16'),
(69, '/storage/photos/products/SP09/detail/8T6Ny1qfJTRXawgoWQtk.png', 'btcoDTL-Page-3.drawio.png', 26, '2022-08-19 14:50:16', '2022-08-19 14:50:16'),
(70, '/storage/photos/products/SP09/detail/m1iTE3sie927Tp0nGkbt.PNG', 'Capture.PNG', 26, '2022-08-19 14:50:16', '2022-08-19 14:50:16'),
(71, '/storage/photos/products/SP04/detail/NH5fQRcQDxzodZYwHepr.jpg', 'anh-dong-ho-dep.jpg', 27, '2022-08-19 14:51:02', '2022-08-19 14:51:02'),
(72, '/storage/photos/products/SP04/detail/aCbYefB7qPMpgqED4Gim.jfif', 'images (1).jfif', 27, '2022-08-19 14:51:02', '2022-08-19 14:51:02'),
(73, '/storage/photos/products/SP04/detail/kA6MCYI7BCwc1ZQjPWTr.jfif', 'images.jfif', 27, '2022-08-19 14:51:02', '2022-08-19 14:51:02'),
(74, '/storage/photos/products/SP02/detail/EWBM6jW07DC5QzuOgSga.jpg', '1542361919197_6669410.jpg', 28, '2022-08-19 14:52:29', '2022-08-19 14:52:29'),
(75, '/storage/photos/products/SP02/detail/z7B1MiR3kD7mdH13sOSC.jpg', 'anh-dong-ho-dep.jpg', 28, '2022-08-19 14:52:29', '2022-08-19 14:52:29'),
(76, '/storage/photos/products/SP02/detail/8MgSkLKrlZGQ39S3Gcg4.jfif', 'images (1).jfif', 28, '2022-08-19 14:52:29', '2022-08-19 14:52:29'),
(77, '/storage/photos/products/SP03/detail/dSZ60uu0vdhUzY8VDIl7.jpg', '1542361919197_6669410.jpg', 29, '2022-08-19 14:53:07', '2022-08-19 14:53:07'),
(78, '/storage/photos/products/SP03/detail/QCewjMBuEtggpNJmX0qW.jpg', 'anh-dong-ho-dep.jpg', 29, '2022-08-19 14:53:07', '2022-08-19 14:53:07'),
(79, '/storage/photos/products/SP03/detail/L9quMF2FXSfLJu4g0rgq.jfif', 'images (1).jfif', 29, '2022-08-19 14:53:07', '2022-08-19 14:53:07'),
(80, '/storage/photos/products/SP10/detail/uaNJlRVXnb7hhR0la9xE.jfif', 'images.jfif', 30, '2022-08-19 14:54:29', '2022-08-19 14:54:29'),
(81, '/storage/photos/products/SP099/detail/odNvxxz4JmPDsnpScX82.jpg', '1542361919197_6669410.jpg', 31, '2022-08-19 14:55:06', '2022-08-19 14:55:06'),
(82, '/storage/photos/products/iooo/detail/3cTom5XgM20SCrY97U4D.png', 'abi.png', 32, '2022-08-23 08:40:45', '2022-08-23 08:40:45'),
(83, '/storage/photos/products/iooo/detail/dH8pIqdll9MbfksrXCXz.png', 'B18DCPT125_AS06.png', 32, '2022-08-23 08:40:45', '2022-08-23 08:40:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` text COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'Quản trị cấp cao', 'QT cap cao', '2022-08-03 07:13:53', '2022-08-21 12:48:20'),
(2, 'guest', 'Khách mua hàng', NULL, '2022-08-03 07:13:53', '2022-08-03 07:13:53'),
(3, 'admin', 'Quản trị viên', NULL, '2022-08-03 07:14:37', '2022-08-03 07:14:37'),
(4, 'content', 'Người chỉnh sửa nội dung', NULL, '2022-08-03 07:14:37', '2022-08-03 07:14:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_permission`
--

CREATE TABLE `role_permission` (
  `id` int NOT NULL,
  `role_id` int NOT NULL,
  `permission_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`) VALUES
(16, 37, 1),
(17, 37, 3),
(18, 38, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `id_card_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_path` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_name` text COLLATE utf8mb4_unicode_ci,
  `display_name` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `salary` int DEFAULT NULL,
  `desciption` text COLLATE utf8mb4_unicode_ci,
  `skill` text COLLATE utf8mb4_unicode_ci,
  `education` text COLLATE utf8mb4_unicode_ci,
  `contract_image_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `contract_image_name` text COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `id_card_number`, `username`, `password`, `avatar_path`, `avatar_name`, `display_name`, `gender`, `dob`, `address`, `salary`, `desciption`, `skill`, `education`, `contract_image_path`, `contract_image_name`, `created_at`, `updated_at`) VALUES
(37, '51454', 'superadmin', '$2y$10$rIRJtqxft97giFXQvWGRrO08D7dwLz1iQkr6N5hFSurDru.edFr5q', '/storage/photos/users/superadmin/avatar/qdMSuiw7FrGk83QCppC6.png', 'thor-500.png', 'Lân Võ', 0, '2022-08-10', 'Số 10 tổ 36 Trung Kính', 155515, NULL, 'IT', 'Đại học', '/storage/photos/users/superadmin/contract/RxSI3s2oZ6S59Br6sBuF.jpg', 'a8aa9ce4b234406a1925.jpg', '2022-08-23 01:05:46', '2022-08-23 01:05:46'),
(38, '12231231231', 'admin', '$2y$10$Q8oFapy8idYU5vjwLYQAhOpseM7RwzNTFGwJrY74pbMsF5jWtjAuO', '/storage/photos/users/admin/avatar/URTeeal4uZS7drF0fc2i.jpg', 'kitty.jpg', 'Nam Hoài', 0, '2022-08-04', 'Số 10 tổ 36 Trung Kính', 11111, NULL, 'KN', 'HV', '/storage/photos/users/admin/contract/Eg9pxeUJ6PV57ot6BmN8.jpg', 'student.jpg', '2022-08-23 01:07:16', '2022-08-23 01:07:16');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_customers` (`customer_id`),
  ADD KEY `fk_order_emps` (`employee_id`);

--
-- Chỉ mục cho bảng `orders_not_registered`
--
ALTER TABLE `orders_not_registered`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_odetail_prd` (`product_id`),
  ADD KEY `fk_odetail_order` (`order_id`);

--
-- Chỉ mục cho bảng `order_detail_not_registered`
--
ALTER TABLE `order_detail_not_registered`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prd_cate` (`category_id`),
  ADD KEY `fk_prd_prdcomp` (`product_company_id`);

--
-- Chỉ mục cho bảng `product_company`
--
ALTER TABLE `product_company`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prdimg_prd` (`product_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_role_permission_to_role` (`role_id`),
  ADD KEY `FK_role_permission_to_permissions` (`permission_id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_role_user_to_user` (`user_id`),
  ADD KEY `FK_role_user_to_role` (`role_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders_not_registered`
--
ALTER TABLE `orders_not_registered`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_detail_not_registered`
--
ALTER TABLE `order_detail_not_registered`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `product_company`
--
ALTER TABLE `product_company`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_emps` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_orders_customers` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_odetail_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_odetail_prd` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `order_detail_not_registered`
--
ALTER TABLE `order_detail_not_registered`
  ADD CONSTRAINT `order_detail_not_registered_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders_not_registered` (`id`),
  ADD CONSTRAINT `order_detail_not_registered_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_prd_cate` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_prd_prdcomp` FOREIGN KEY (`product_company_id`) REFERENCES `product_company` (`id`);

--
-- Các ràng buộc cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `fk_prdimg_prd` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `FK_role_permission_to_permissions` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `FK_role_permission_to_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Các ràng buộc cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `FK_role_user_to_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `FK_role_user_to_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
