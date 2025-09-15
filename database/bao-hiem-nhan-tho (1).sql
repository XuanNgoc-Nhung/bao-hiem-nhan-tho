-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th9 13, 2025 lúc 10:06 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bao-hiem-nhan-tho`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `can_cuoc_cong_dan`
--

CREATE TABLE `can_cuoc_cong_dan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ccccd` varchar(255) NOT NULL,
  `ma_bao_mat` varchar(255) DEFAULT NULL,
  `trang_thai` tinyint(4) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `can_cuoc_cong_dan`
--

INSERT INTO `can_cuoc_cong_dan` (`id`, `ccccd`, `ma_bao_mat`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, '111111111', '123123', 1, '2025-09-02 02:05:47', '2025-09-02 23:12:13'),
(5, '123456789', '123456', 1, '2025-09-02 02:22:31', '2025-09-02 02:22:31'),
(8, '999999999', '999999999', 1, '2025-09-13 09:25:29', '2025-09-13 09:25:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cong_ty`
--

CREATE TABLE `cong_ty` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `trang_thai` int(11) DEFAULT 1,
  `mo_ta` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `so_dien_thoai` varchar(255) DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `loai_hinh` varchar(255) DEFAULT NULL,
  `ngay_dang_ky` varchar(255) DEFAULT NULL,
  `ma_so_thue` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `nguoi_dai_dien` varchar(255) DEFAULT NULL,
  `hinh_nen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cong_ty`
--

INSERT INTO `cong_ty` (`id`, `ten`, `logo`, `trang_thai`, `mo_ta`, `created_at`, `updated_at`, `email`, `so_dien_thoai`, `dia_chi`, `loai_hinh`, `ngay_dang_ky`, `ma_so_thue`, `website`, `nguoi_dai_dien`, `hinh_nen`) VALUES
(5, 'Bảo Việt nhân thọ', 'https://cdn.haitrieu.com/wp-content/uploads/2022/04/Logo-BaoViet-Life.png', 1, 'Công ty bảo hiểm hàng đầu Việt Nam với hơn 20 năm kinh nghiệm trong lĩnh vực bảo hiểm nhân thọ và sức khỏe.', '2025-09-02 01:18:14', '2025-09-05 01:11:39', 'contact@abc-insurance.com', '+84 24 3936 1234', '123 Đường Nguyễn Huệ, Quận 1, TP.HCM', 'life', '22/09/2025', '0123456789', 'https://www.abc-insurance.com', 'Nguyễn Văn A', 'https://cdn.haitrieu.com/wp-content/uploads/2022/04/Logo-BaoViet-Life.png'),
(6, 'Dai-ichi Life Việt Nam', 'https://cdn.haitrieu.com/wp-content/uploads/2022/04/Icon-Dai-Ichi.png', 1, 'Công ty bảo hiểm hàng đầu Việt Nam với hơn 20 năm kinh nghiệm trong lĩnh vực bảo hiểm nhân thọ và sức khỏe.', '2025-09-02 01:18:41', '2025-09-04 00:28:35', 'contact@abc-insurance.com', '+84 24 3936 1234', '123 Đường Nguyễn Huệ, Quận 1, TP.HCM', 'life', '22/09/2025', '0123456789', 'https://www.abc-insurance.com', 'Nguyễn Văn A', 'https://cdn.haitrieu.com/wp-content/uploads/2022/04/Icon-Dai-Ichi.png'),
(8, 'Công ty Bảo hiểm AIA', 'https://cdn.haitrieu.com/wp-content/uploads/2022/04/Logo-AIA.png', 1, 'Công ty bảo hiểm hàng đầu Việt Nam với hơn 20 năm kinh nghiệm trong lĩnh vực bảo hiểm nhân thọ và sức khỏe.', '2025-09-04 00:32:19', '2025-09-04 00:33:24', 'contact@abc-insurance.com', '+84 24 3936 1234', '123 Đường Nguyễn Huệ, Quận 1, TP.HCM', 'life', '22/09/2025', '0123456789', 'https://www.abc-insurance.com', 'Nguyễn Văn A', 'https://cdn.haitrieu.com/wp-content/uploads/2022/04/Logo-AIA.png'),
(9, 'Công ty bảo hiểm nhân thọ Prudential', 'https://cdn.haitrieu.com/wp-content/uploads/2022/01/Logo-Prudential-VN.png', 1, 'Công ty bảo hiểm hàng đầu Việt Nam với hơn 20 năm kinh nghiệm trong lĩnh vực bảo hiểm nhân thọ và sức khỏe.', '2025-09-05 01:10:46', '2025-09-05 01:10:46', 'contact@abc-insurance.com', '+84 24 3936 1234', '123 Đường Nguyễn Huệ, Quận 1, TP.HCM', 'life', '22/09/2025', '0123456789', 'https://www.abc-insurance.com', 'Nguyễn Văn A', 'https://cdn.haitrieu.com/wp-content/uploads/2022/01/Logo-Prudential-VN.png'),
(10, 'Công ty TNHH Manulife Việt Nam', 'https://hrchannels.com/Upload/employer/logo/img000000007856.PNG', 1, 'Công ty bảo hiểm hàng đầu Việt Nam với hơn 20 năm kinh nghiệm trong lĩnh vực bảo hiểm nhân thọ và sức khỏe.', '2025-09-05 01:13:19', '2025-09-05 01:13:19', 'contact@abc-insurance.com', '+84 24 3936 1234', '123 Đường Nguyễn Huệ, Quận 1, TP.HCM', 'life', '22/09/2025', '0123456789', 'https://www.abc-insurance.com', 'Nguyễn Văn A', 'https://hrchannels.com/Upload/employer/logo/img000000007856.PNG'),
(11, 'Công Ty Bảo Hiểm Nhân Thọ Sun Life Việt Nam', 'https://cdn.haitrieu.com/wp-content/uploads/2022/04/Logo-Sun-Life.png', 1, 'Công ty bảo hiểm hàng đầu Việt Nam với hơn 20 năm kinh nghiệm trong lĩnh vực bảo hiểm nhân thọ và sức khỏe.', '2025-09-05 01:16:37', '2025-09-05 01:17:11', 'contact@abc-insurance.com', '+84 24 3936 1234', '123 Đường Nguyễn Huệ, Quận 1, TP.HCM', 'life', '22/09/2025', '0123456789', 'https://www.abc-insurance.com', 'Nguyễn Văn A', 'https://cdn.haitrieu.com/wp-content/uploads/2022/04/Logo-Sun-Life.png'),
(12, 'Generali Việt Nam - Bảo hiểm nhân thọ Ý', 'https://cdn.haitrieu.com/wp-content/uploads/2022/04/Logo-Generali-Tra-H.png', 1, 'Công ty bảo hiểm hàng đầu Việt Nam với hơn 20 năm kinh nghiệm trong lĩnh vực bảo hiểm nhân thọ và sức khỏe.', '2025-09-05 01:20:36', '2025-09-05 01:20:36', 'contact@abc-insurance.com', '+84 24 3936 1234', '123 Đường Nguyễn Huệ, Quận 1, TP.HCM', 'life', '22/09/2025', '0123456789', 'https://www.abc-insurance.com', 'Nguyễn Văn A', 'https://cdn.haitrieu.com/wp-content/uploads/2022/04/Logo-Generali-Tra-H.png'),
(13, 'Tư vấn bảo hiểm nhân thọ Chubb Life Việt Nam', 'https://www.chubb.com/content/dam/aem-chubb-global/logo/chubb_logo_white.png', 1, 'Công ty bảo hiểm hàng đầu Việt Nam với hơn 20 năm kinh nghiệm trong lĩnh vực bảo hiểm nhân thọ và sức khỏe.', '2025-09-05 01:22:36', '2025-09-05 01:22:36', 'contact@abc-insurance.com', '+84 24 3936 1234', '123 Đường Nguyễn Huệ, Quận 1, TP.HCM', 'life', '22/09/2025', '0123456789', 'https://www.abc-insurance.com', 'Nguyễn Văn A', 'https://www.chubb.com/content/dam/aem-chubb-global/logo/chubb_logo_white.png'),
(14, 'Bảo hiểm Hanwha Life Việt Nam', 'https://hrchannels.com/Upload/avatar/20210512/134547415_Hanwha-Life-1.png', 1, 'Công ty bảo hiểm hàng đầu Việt Nam với hơn 20 năm kinh nghiệm trong lĩnh vực bảo hiểm nhân thọ và sức khỏe.', '2025-09-05 01:30:16', '2025-09-05 01:30:16', 'contact@abc-insurance.com', '+84 24 3936 1234', '123 Đường Nguyễn Huệ, Quận 1, TP.HCM', 'life', '22/09/2025', '0123456789', 'https://www.abc-insurance.com', 'Nguyễn Văn A', 'https://hrchannels.com/Upload/avatar/20210512/134547415_Hanwha-Life-1.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hop_dong`
--

CREATE TABLE `hop_dong` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loai_hop_dong` enum('cho_ban_than','cho_nguoi_khac') NOT NULL DEFAULT 'cho_ban_than',
  `cong_ty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cho_phep_rut_tien` tinyint(4) NOT NULL DEFAULT 0,
  `cccd` varchar(255) DEFAULT NULL,
  `ma_hop_dong` varchar(255) DEFAULT NULL,
  `ho_ten` varchar(255) DEFAULT NULL,
  `gioi_tinh` varchar(255) DEFAULT NULL,
  `ngay_sinh` varchar(255) DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `so_dien_thoai` varchar(255) DEFAULT NULL,
  `so_tien_mua` varchar(255) DEFAULT NULL,
  `so_tien_dong_hang_nam` varchar(255) DEFAULT NULL,
  `thoi_gian_mua` varchar(255) DEFAULT NULL,
  `ngay_cap_hop_dong` varchar(255) DEFAULT NULL,
  `ngay_dao_han` varchar(255) DEFAULT NULL,
  `ngan_hang` varchar(255) DEFAULT NULL,
  `so_tai_khoan` varchar(255) DEFAULT NULL,
  `chu_tai_khoan` varchar(255) DEFAULT NULL,
  `anh_mat_truoc` varchar(255) DEFAULT NULL,
  `anh_mat_sau` varchar(255) DEFAULT NULL,
  `anh_chan_dung` varchar(255) DEFAULT NULL,
  `th_cccd` varchar(255) DEFAULT NULL,
  `th_moi_quan_he` varchar(255) DEFAULT NULL,
  `th_ho_ten` varchar(255) DEFAULT NULL,
  `th_gioi_tinh` varchar(255) DEFAULT NULL,
  `th_ngay_sinh` varchar(255) DEFAULT NULL,
  `th_dia_chi` varchar(255) DEFAULT NULL,
  `th_so_dien_thoai` varchar(255) DEFAULT NULL,
  `th_ngan_hang` varchar(255) DEFAULT NULL,
  `th_so_tai_khoan` varchar(255) DEFAULT NULL,
  `th_chu_tai_khoan` varchar(255) DEFAULT NULL,
  `th_anh_mat_truoc` varchar(255) DEFAULT NULL,
  `th_anh_mat_sau` varchar(255) DEFAULT NULL,
  `th_anh_chan_dung` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `anh_banner` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hop_dong`
--

INSERT INTO `hop_dong` (`id`, `loai_hop_dong`, `cong_ty_id`, `cho_phep_rut_tien`, `cccd`, `ma_hop_dong`, `ho_ten`, `gioi_tinh`, `ngay_sinh`, `dia_chi`, `so_dien_thoai`, `so_tien_mua`, `so_tien_dong_hang_nam`, `thoi_gian_mua`, `ngay_cap_hop_dong`, `ngay_dao_han`, `ngan_hang`, `so_tai_khoan`, `chu_tai_khoan`, `anh_mat_truoc`, `anh_mat_sau`, `anh_chan_dung`, `th_cccd`, `th_moi_quan_he`, `th_ho_ten`, `th_gioi_tinh`, `th_ngay_sinh`, `th_dia_chi`, `th_so_dien_thoai`, `th_ngan_hang`, `th_so_tai_khoan`, `th_chu_tai_khoan`, `th_anh_mat_truoc`, `th_anh_mat_sau`, `th_anh_chan_dung`, `created_at`, `updated_at`, `anh_banner`) VALUES
(5, 'cho_nguoi_khac', 9, 0, '123456789', '123456', 'Trần Thị Bình An', 'Nữ', '11/12/1990', '852 Nguyễn Văn Linh, Quận Thanh Khê, Đà Nẵng', '0983437642', '2000000', '33333333', '15', '09/06/2030', '02/07/2030', 'Agribank', '2660422049111', 'Lý Văn Long', 'images/hop_dong/1757746796_image (1).png', 'images/hop_dong/1757746796_image (1).png', 'images/hop_dong/1757746796_image (1).png', '952078189', 'Cha/Mẹ', 'Nguyễn Văn An Bình', 'Nam', '25/10/1974', '258 Kim Mã, Quận Ba Đình, Hà Nội', '0825991084', 'ACB', '8435851609345', 'Nguyễn Văn An', 'images/hop_dong/1757746796_th_image (1).png', 'images/hop_dong/1757746796_th_image (1).png', 'images/hop_dong/1757746796_th_image (1).png', '2025-09-13 06:59:56', '2025-09-13 07:19:37', NULL),
(6, 'cho_nguoi_khac', 5, 1, '999999999', '999999999', 'Nguyễn Văn Anh', 'Nam', '1999-01-15', '123 Đường ABC, Phường 1, Quận 1, TP.Hồ Chí Minh', '0901234567', '100000000', '5000000', '240', '2025-09-13', '2045-09-13', 'Vietcombank', '1234567890', 'NGUYEN VAN A', 'images/hop_dong/1757755635_ảnh.jpeg', 'images/hop_dong/1757755635_ảnh.jpeg', 'images/hop_dong/1757755635_ảnh.jpeg', '264270227', 'Vợ/Chồng', 'Nguyễn Thị Bình', 'Nữ', '1992-05-20', '123 Đường ABC, Phường 1, Quận 1, TP.Hồ Chí Minh', '0907654321', 'Vietcombank', '0987654321', 'NGUYEN THI B', 'images/hop_dong/1757755635_th_ảnh.jpeg', 'images/hop_dong/1757755635_th_ảnh.jpeg', 'images/hop_dong/1757755635_th_ảnh.jpeg', '2025-09-13 09:27:15', '2025-09-13 20:03:39', '/images/hop_dong/1757757877_6_banner.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_su`
--

CREATE TABLE `lich_su` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nguoi_dung` varchar(255) DEFAULT NULL,
  `hanh_dong` varchar(255) DEFAULT NULL,
  `chi_tiet` varchar(255) DEFAULT NULL,
  `thoi_gian` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lich_su`
--

INSERT INTO `lich_su` (`id`, `nguoi_dung`, `hanh_dong`, `chi_tiet`, `thoi_gian`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Đăng nhập', 'Đăng nhập hệ thống', '2025-09-05 04:48:47', '2025-09-04 21:48:47', '2025-09-04 21:48:47'),
(2, 'admin', 'Đăng nhập', 'Đăng nhập hệ thống!', '2025-09-05 04:55:59', '2025-09-04 21:55:59', '2025-09-04 21:55:59'),
(3, 'admin', 'Tạo CCCD', 'Tạo CCCD thành công: 123123111122', '2025-09-05 06:31:17', '2025-09-04 23:31:17', '2025-09-04 23:31:17'),
(4, 'admin', 'Xóa CCCD', 'Xóa CCCD : 1231231111 thành công', '2025-09-05 06:33:09', '2025-09-04 23:33:09', '2025-09-04 23:33:09'),
(5, 'admin', 'Cập nhật CCCD', 'Cập nhật CCCD : 0123456789012 thành công', '2025-09-05 06:33:20', '2025-09-04 23:33:20', '2025-09-04 23:33:20'),
(6, 'admin', 'Đăng nhập', 'Đăng nhập hệ thống!', '2025-09-05 08:11:25', '2025-09-05 01:11:25', '2025-09-05 01:11:25'),
(7, 'admin', 'Đăng nhập', 'Đăng nhập hệ thống!', '2025-09-06 09:02:02', '2025-09-06 02:02:02', '2025-09-06 02:02:02'),
(8, 'admin', 'Đăng nhập', 'Đăng nhập hệ thống!', '2025-09-06 13:39:07', '2025-09-06 06:39:07', '2025-09-06 06:39:07'),
(9, 'admin', 'Đăng nhập', 'Đăng nhập hệ thống!', '2025-09-06 16:45:05', '2025-09-06 09:45:05', '2025-09-06 09:45:05'),
(10, 'Người dùng123456789', 'Đăng nhập', 'Đăng nhập hệ thống!', '2025-09-07 04:03:19', '2025-09-06 21:03:19', '2025-09-06 21:03:19'),
(11, 'admin', 'Đăng nhập', 'Đăng nhập hệ thống!', '2025-09-07 04:03:43', '2025-09-06 21:03:43', '2025-09-06 21:03:43'),
(12, 'admin', 'Đăng nhập', 'Đăng nhập hệ thống!', '2025-09-07 08:36:23', '2025-09-07 01:36:23', '2025-09-07 01:36:23'),
(13, 'admin', 'Đăng nhập', 'Đăng nhập hệ thống!', '2025-09-07 15:37:04', '2025-09-07 08:37:04', '2025-09-07 08:37:04'),
(14, 'admin', 'Xóa hợp đồng', 'Xóa hợp đồng: 123456 - Khách hàng: Tạ Thị Tuyết', '2025-09-07 16:11:36', '2025-09-07 09:11:36', '2025-09-07 09:11:36'),
(15, 'admin', 'Đăng nhập', 'Đăng nhập hệ thống!', '2025-09-13 13:46:40', '2025-09-13 06:46:40', '2025-09-13 06:46:40'),
(16, 'admin', 'Đăng nhập', 'Đăng nhập hệ thống!', '2025-09-13 13:47:44', '2025-09-13 06:47:44', '2025-09-13 06:47:44'),
(17, 'admin', 'Đăng nhập', 'Đăng nhập hệ thống!', '2025-09-13 14:00:10', '2025-09-13 07:00:10', '2025-09-13 07:00:10'),
(18, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình', '2025-09-13 14:17:26', '2025-09-13 07:17:26', '2025-09-13 07:17:26'),
(19, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 14:19:37', '2025-09-13 07:19:37', '2025-09-13 07:19:37'),
(20, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 14:36:21', '2025-09-13 07:36:21', '2025-09-13 07:36:21'),
(21, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 14:40:14', '2025-09-13 07:40:14', '2025-09-13 07:40:14'),
(22, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 14:40:30', '2025-09-13 07:40:30', '2025-09-13 07:40:30'),
(23, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 14:40:35', '2025-09-13 07:40:35', '2025-09-13 07:40:35'),
(24, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 14:41:05', '2025-09-13 07:41:05', '2025-09-13 07:41:05'),
(25, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 14:41:39', '2025-09-13 07:41:39', '2025-09-13 07:41:39'),
(26, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 14:55:55', '2025-09-13 07:55:55', '2025-09-13 07:55:55'),
(27, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 14:56:42', '2025-09-13 07:56:42', '2025-09-13 07:56:42'),
(28, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 15:00:21', '2025-09-13 08:00:21', '2025-09-13 08:00:21'),
(29, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 15:06:10', '2025-09-13 08:06:10', '2025-09-13 08:06:10'),
(30, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 15:08:56', '2025-09-13 08:08:56', '2025-09-13 08:08:56'),
(31, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 15:12:04', '2025-09-13 08:12:04', '2025-09-13 08:12:04'),
(32, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 15:12:35', '2025-09-13 08:12:35', '2025-09-13 08:12:35'),
(33, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 15:14:39', '2025-09-13 08:14:39', '2025-09-13 08:14:39'),
(34, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 15:15:24', '2025-09-13 08:15:24', '2025-09-13 08:15:24'),
(35, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 15:25:38', '2025-09-13 08:25:38', '2025-09-13 08:25:38'),
(36, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 15:25:50', '2025-09-13 08:25:50', '2025-09-13 08:25:50'),
(37, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 15:28:37', '2025-09-13 08:28:37', '2025-09-13 08:28:37'),
(38, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 15:31:17', '2025-09-13 08:31:17', '2025-09-13 08:31:17'),
(39, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 15:31:25', '2025-09-13 08:31:25', '2025-09-13 08:31:25'),
(40, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 15:31:50', '2025-09-13 08:31:50', '2025-09-13 08:31:50'),
(41, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 15:40:07', '2025-09-13 08:40:07', '2025-09-13 08:40:07'),
(42, 'admin', 'Cập nhật hợp đồng', 'Cập nhật thông tin hợp đồng: 123456 - Khách hàng: Trần Thị Bình An', '2025-09-13 15:40:36', '2025-09-13 08:40:36', '2025-09-13 08:40:36'),
(43, 'admin', 'Tạo CCCD', 'Tạo CCCD : 999999999 thành công', '2025-09-13 16:25:29', '2025-09-13 09:25:29', '2025-09-13 09:25:29'),
(44, 'admin', 'Đăng nhập', 'Đăng nhập hệ thống!', '2025-09-13 16:27:27', '2025-09-13 09:27:27', '2025-09-13 09:27:27'),
(45, 'admin', 'Cập nhật hợp đồng', 'Cập nhật hợp đồng: 999999999 - Khách hàng: Lý Văn Long -> ', '2025-09-13 16:40:25', '2025-09-13 09:40:25', '2025-09-13 09:40:25'),
(46, 'admin', 'Cập nhật hợp đồng', 'Cập nhật hợp đồng: 999999999 - Khách hàng:  -> ', '2025-09-13 16:43:12', '2025-09-13 09:43:12', '2025-09-13 09:43:12'),
(47, 'admin', 'Cập nhật hợp đồng', 'Cập nhật hợp đồng: 999999999 - Khách hàng:  -> ', '2025-09-13 16:43:38', '2025-09-13 09:43:38', '2025-09-13 09:43:38'),
(48, 'admin', 'Cập nhật hợp đồng', 'Cập nhật hợp đồng: 999999999 - Khách hàng:  -> ', '2025-09-13 16:43:56', '2025-09-13 09:43:56', '2025-09-13 09:43:56'),
(49, 'admin', 'Cập nhật hợp đồng', 'Cập nhật hợp đồng: 999999999 - Khách hàng:  -> ', '2025-09-13 16:45:24', '2025-09-13 09:45:24', '2025-09-13 09:45:24'),
(50, 'admin', 'Cập nhật hợp đồng', 'Cập nhật hợp đồng: 999999999 - Khách hàng:  -> Nguyễn Văn A', '2025-09-13 16:48:29', '2025-09-13 09:48:29', '2025-09-13 09:48:29'),
(51, 'admin', 'Cập nhật hợp đồng', 'Cập nhật hợp đồng: 999999999 - Khách hàng: Nguyễn Văn A -> Nguyễn Văn Anh', '2025-09-13 16:49:40', '2025-09-13 09:49:40', '2025-09-13 09:49:40'),
(52, 'admin', 'Cập nhật hợp đồng', 'Cập nhật hợp đồng: 999999999 - Khách hàng: Nguyễn Văn Anh -> Nguyễn Văn Anh', '2025-09-13 16:50:05', '2025-09-13 09:50:05', '2025-09-13 09:50:05'),
(53, 'admin', 'Cập nhật ảnh banner', 'Cập nhật ảnh banner cho hợp đồng: 999999999', '2025-09-13 16:58:26', '2025-09-13 09:58:26', '2025-09-13 09:58:26'),
(54, 'admin', 'Cập nhật ảnh banner', 'Cập nhật ảnh banner cho hợp đồng: 999999999', '2025-09-13 17:04:37', '2025-09-13 10:04:37', '2025-09-13 10:04:37'),
(55, 'Người dùng999999999', 'Đăng nhập', 'Đăng nhập hệ thống!', '2025-09-13 17:05:50', '2025-09-13 10:05:50', '2025-09-13 10:05:50'),
(56, 'admin', 'Đăng nhập', 'Đăng nhập hệ thống!', '2025-09-14 02:54:27', '2025-09-13 19:54:27', '2025-09-13 19:54:27'),
(57, 'Người dùng999999999', 'Đăng nhập', 'Đăng nhập hệ thống!', '2025-09-14 02:54:53', '2025-09-13 19:54:53', '2025-09-13 19:54:53'),
(58, 'admin', 'Thay đổi trạng thái rút tiền', 'Thay đổi trạng thái rút tiền cho hợp đồng: 999999999 từ Không cho phép thành Cho phép', '2025-09-14 03:03:39', '2025-09-13 20:03:39', '2025-09-13 20:03:39'),
(59, 'Nguyễn Văn Anh', 'Yêu cầu rút tiền', 'Yêu cầu rút 1.000.000 VNĐ từ tài khoản 1234567890 (Vietcombank) - NGUYEN VAN A', '2025-09-14 03:05:30', '2025-09-13 20:05:30', '2025-09-13 20:05:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_01_061846_create_cong_ty_table', 1),
(5, '2025_09_01_065413_add_fields_to_cong_ty_table', 2),
(6, '2025_09_01_065643_add_website_and_nguoi_dai_dien_to_cong_ty_table', 3),
(7, '2025_09_02_082854_create_can_cuoc_cong_dan_table', 4),
(8, '2025_09_02_090000_add_ma_bao_mat_to_can_cuoc_cong_dan_table', 5),
(9, '2025_09_02_100500_update_default_trang_thai_on_can_cuoc_cong_dan_table', 6),
(10, '2025_09_03_020802_add_hinh_nen_to_cong_ty_table', 7),
(11, '2025_09_05_044529_create_lich_su_table', 8),
(12, '2025_09_06_053133_create_hop_dong_table', 9),
(13, '2025_09_06_060911_add_loai_hop_dong_to_hop_dong_table', 10),
(14, '2025_09_06_080103_add_cong_ty_to_hop_dong_table', 11),
(15, '2025_09_13_142100_add_anh_banner_to_hop_dong_table', 12),
(16, '2025_09_13_173311_add_cho_phep_rut_tien_to_hop_dong_table', 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('fmcFMe2OGIMQxgXGARvFewnlTyL8iyEr7xSD4lGE', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOFhaT1puZll6RkNyT3ZLZlRSWFdIRkNvbkM1WEdJcUUzenFuak9xUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8wLjAuMC4wOjgwMDAvYXNzZXRzL2ltYWdlcy9mYXZpY29uLnBuZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757793252),
('jo6OZavGAhAr0kp5OV0zsTa1IpBcN17gaW55MO6f', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicGRCZW1ES3dQcnNaWEk4UW1vYXBld2lEWjZTTHlIejM0dHZZcWZyYyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9pbWFnZXMvbG9nby1iYW92aWV0LnBuZyI7fXM6NDoidXNlciI7Tzo4OiJzdGRDbGFzcyI6NDp7czo0OiJuYW1lIjtzOjU6ImFkbWluIjtzOjU6ImVtYWlsIjtzOjE1OiJhZG1pbkBnbWFpbC5jb20iO3M6ODoicGFzc3dvcmQiO3M6NjoiMTIzNDU2IjtzOjQ6InJvbGUiO2k6MTt9fQ==', 1757793820),
('XtveuANufCdcLdAnT4ehyI3kAdJa7KNt3uVo88p1', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOEZIejRDcGtBRVU3VUdjNjBmOERORFJhV3dUSzFuRDBsY2ZMc1NNNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hc3NldHMvaW1hZ2VzL2Zhdmljb24ucG5nIjt9czo0OiJ1c2VyIjtPOjE4OiJBcHBcTW9kZWxzXEhvcERvbmciOjMzOntzOjEzOiIAKgBjb25uZWN0aW9uIjtzOjU6Im15c3FsIjtzOjg6IgAqAHRhYmxlIjtzOjg6ImhvcF9kb25nIjtzOjEzOiIAKgBwcmltYXJ5S2V5IjtzOjI6ImlkIjtzOjEwOiIAKgBrZXlUeXBlIjtzOjM6ImludCI7czoxMjoiaW5jcmVtZW50aW5nIjtiOjE7czo3OiIAKgB3aXRoIjthOjA6e31zOjEyOiIAKgB3aXRoQ291bnQiO2E6MDp7fXM6MTk6InByZXZlbnRzTGF6eUxvYWRpbmciO2I6MDtzOjEwOiIAKgBwZXJQYWdlIjtpOjE1O3M6NjoiZXhpc3RzIjtiOjE7czoxODoid2FzUmVjZW50bHlDcmVhdGVkIjtiOjA7czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO3M6MTM6IgAqAGF0dHJpYnV0ZXMiO2E6Mzg6e3M6MjoiaWQiO2k6NjtzOjEzOiJsb2FpX2hvcF9kb25nIjtzOjE0OiJjaG9fbmd1b2lfa2hhYyI7czoxMDoiY29uZ190eV9pZCI7aTo1O3M6MTc6ImNob19waGVwX3J1dF90aWVuIjtpOjA7czo0OiJjY2NkIjtzOjk6Ijk5OTk5OTk5OSI7czoxMToibWFfaG9wX2RvbmciO3M6OToiOTk5OTk5OTk5IjtzOjY6ImhvX3RlbiI7czoxNzoiTmd1eeG7hW4gVsSDbiBBbmgiO3M6OToiZ2lvaV90aW5oIjtzOjM6Ik5hbSI7czo5OiJuZ2F5X3NpbmgiO3M6MTA6IjE5OTktMDEtMTUiO3M6NzoiZGlhX2NoaSI7czo1OToiMTIzIMSQxrDhu51uZyBBQkMsIFBoxrDhu51uZyAxLCBRdeG6rW4gMSwgVFAuSOG7kyBDaMOtIE1pbmgiO3M6MTM6InNvX2RpZW5fdGhvYWkiO3M6MTA6IjA5MDEyMzQ1NjciO3M6MTE6InNvX3RpZW5fbXVhIjtzOjk6IjEwMDAwMDAwMCI7czoyMToic29fdGllbl9kb25nX2hhbmdfbmFtIjtzOjc6IjUwMDAwMDAiO3M6MTM6InRob2lfZ2lhbl9tdWEiO3M6MzoiMjQwIjtzOjE3OiJuZ2F5X2NhcF9ob3BfZG9uZyI7czoxMDoiMjAyNS0wOS0xMyI7czoxMjoibmdheV9kYW9faGFuIjtzOjEwOiIyMDQ1LTA5LTEzIjtzOjk6Im5nYW5faGFuZyI7czoxMToiVmlldGNvbWJhbmsiO3M6MTI6InNvX3RhaV9raG9hbiI7czoxMDoiMTIzNDU2Nzg5MCI7czoxMzoiY2h1X3RhaV9raG9hbiI7czoxMjoiTkdVWUVOIFZBTiBBIjtzOjEzOiJhbmhfbWF0X3RydW9jIjtzOjM3OiJpbWFnZXMvaG9wX2RvbmcvMTc1Nzc1NTYzNV9hzIluaC5qcGVnIjtzOjExOiJhbmhfbWF0X3NhdSI7czozNzoiaW1hZ2VzL2hvcF9kb25nLzE3NTc3NTU2MzVfYcyJbmguanBlZyI7czoxMzoiYW5oX2NoYW5fZHVuZyI7czozNzoiaW1hZ2VzL2hvcF9kb25nLzE3NTc3NTU2MzVfYcyJbmguanBlZyI7czo3OiJ0aF9jY2NkIjtzOjk6IjI2NDI3MDIyNyI7czoxNDoidGhfbW9pX3F1YW5faGUiO3M6MTI6Ilbhu6MvQ2jhu5NuZyI7czo5OiJ0aF9ob190ZW4iO3M6MjA6Ik5ndXnhu4VuIFRo4buLIELDrG5oIjtzOjEyOiJ0aF9naW9pX3RpbmgiO3M6NDoiTuG7ryI7czoxMjoidGhfbmdheV9zaW5oIjtzOjEwOiIxOTkyLTA1LTIwIjtzOjEwOiJ0aF9kaWFfY2hpIjtzOjU5OiIxMjMgxJDGsOG7nW5nIEFCQywgUGjGsOG7nW5nIDEsIFF14bqtbiAxLCBUUC5I4buTIENow60gTWluaCI7czoxNjoidGhfc29fZGllbl90aG9haSI7czoxMDoiMDkwNzY1NDMyMSI7czoxMjoidGhfbmdhbl9oYW5nIjtzOjExOiJWaWV0Y29tYmFuayI7czoxNToidGhfc29fdGFpX2tob2FuIjtzOjEwOiIwOTg3NjU0MzIxIjtzOjE2OiJ0aF9jaHVfdGFpX2tob2FuIjtzOjEyOiJOR1VZRU4gVEhJIEIiO3M6MTY6InRoX2FuaF9tYXRfdHJ1b2MiO3M6NDA6ImltYWdlcy9ob3BfZG9uZy8xNzU3NzU1NjM1X3RoX2HMiW5oLmpwZWciO3M6MTQ6InRoX2FuaF9tYXRfc2F1IjtzOjQwOiJpbWFnZXMvaG9wX2RvbmcvMTc1Nzc1NTYzNV90aF9hzIluaC5qcGVnIjtzOjE2OiJ0aF9hbmhfY2hhbl9kdW5nIjtzOjQwOiJpbWFnZXMvaG9wX2RvbmcvMTc1Nzc1NTYzNV90aF9hzIluaC5qcGVnIjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDI1LTA5LTEzIDE2OjI3OjE1IjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDI1LTA5LTEzIDE3OjA0OjM3IjtzOjEwOiJhbmhfYmFubmVyIjtzOjQwOiIvaW1hZ2VzL2hvcF9kb25nLzE3NTc3NTc4NzdfNl9iYW5uZXIucG5nIjt9czoxMToiACoAb3JpZ2luYWwiO2E6Mzg6e3M6MjoiaWQiO2k6NjtzOjEzOiJsb2FpX2hvcF9kb25nIjtzOjE0OiJjaG9fbmd1b2lfa2hhYyI7czoxMDoiY29uZ190eV9pZCI7aTo1O3M6MTc6ImNob19waGVwX3J1dF90aWVuIjtpOjA7czo0OiJjY2NkIjtzOjk6Ijk5OTk5OTk5OSI7czoxMToibWFfaG9wX2RvbmciO3M6OToiOTk5OTk5OTk5IjtzOjY6ImhvX3RlbiI7czoxNzoiTmd1eeG7hW4gVsSDbiBBbmgiO3M6OToiZ2lvaV90aW5oIjtzOjM6Ik5hbSI7czo5OiJuZ2F5X3NpbmgiO3M6MTA6IjE5OTktMDEtMTUiO3M6NzoiZGlhX2NoaSI7czo1OToiMTIzIMSQxrDhu51uZyBBQkMsIFBoxrDhu51uZyAxLCBRdeG6rW4gMSwgVFAuSOG7kyBDaMOtIE1pbmgiO3M6MTM6InNvX2RpZW5fdGhvYWkiO3M6MTA6IjA5MDEyMzQ1NjciO3M6MTE6InNvX3RpZW5fbXVhIjtzOjk6IjEwMDAwMDAwMCI7czoyMToic29fdGllbl9kb25nX2hhbmdfbmFtIjtzOjc6IjUwMDAwMDAiO3M6MTM6InRob2lfZ2lhbl9tdWEiO3M6MzoiMjQwIjtzOjE3OiJuZ2F5X2NhcF9ob3BfZG9uZyI7czoxMDoiMjAyNS0wOS0xMyI7czoxMjoibmdheV9kYW9faGFuIjtzOjEwOiIyMDQ1LTA5LTEzIjtzOjk6Im5nYW5faGFuZyI7czoxMToiVmlldGNvbWJhbmsiO3M6MTI6InNvX3RhaV9raG9hbiI7czoxMDoiMTIzNDU2Nzg5MCI7czoxMzoiY2h1X3RhaV9raG9hbiI7czoxMjoiTkdVWUVOIFZBTiBBIjtzOjEzOiJhbmhfbWF0X3RydW9jIjtzOjM3OiJpbWFnZXMvaG9wX2RvbmcvMTc1Nzc1NTYzNV9hzIluaC5qcGVnIjtzOjExOiJhbmhfbWF0X3NhdSI7czozNzoiaW1hZ2VzL2hvcF9kb25nLzE3NTc3NTU2MzVfYcyJbmguanBlZyI7czoxMzoiYW5oX2NoYW5fZHVuZyI7czozNzoiaW1hZ2VzL2hvcF9kb25nLzE3NTc3NTU2MzVfYcyJbmguanBlZyI7czo3OiJ0aF9jY2NkIjtzOjk6IjI2NDI3MDIyNyI7czoxNDoidGhfbW9pX3F1YW5faGUiO3M6MTI6Ilbhu6MvQ2jhu5NuZyI7czo5OiJ0aF9ob190ZW4iO3M6MjA6Ik5ndXnhu4VuIFRo4buLIELDrG5oIjtzOjEyOiJ0aF9naW9pX3RpbmgiO3M6NDoiTuG7ryI7czoxMjoidGhfbmdheV9zaW5oIjtzOjEwOiIxOTkyLTA1LTIwIjtzOjEwOiJ0aF9kaWFfY2hpIjtzOjU5OiIxMjMgxJDGsOG7nW5nIEFCQywgUGjGsOG7nW5nIDEsIFF14bqtbiAxLCBUUC5I4buTIENow60gTWluaCI7czoxNjoidGhfc29fZGllbl90aG9haSI7czoxMDoiMDkwNzY1NDMyMSI7czoxMjoidGhfbmdhbl9oYW5nIjtzOjExOiJWaWV0Y29tYmFuayI7czoxNToidGhfc29fdGFpX2tob2FuIjtzOjEwOiIwOTg3NjU0MzIxIjtzOjE2OiJ0aF9jaHVfdGFpX2tob2FuIjtzOjEyOiJOR1VZRU4gVEhJIEIiO3M6MTY6InRoX2FuaF9tYXRfdHJ1b2MiO3M6NDA6ImltYWdlcy9ob3BfZG9uZy8xNzU3NzU1NjM1X3RoX2HMiW5oLmpwZWciO3M6MTQ6InRoX2FuaF9tYXRfc2F1IjtzOjQwOiJpbWFnZXMvaG9wX2RvbmcvMTc1Nzc1NTYzNV90aF9hzIluaC5qcGVnIjtzOjE2OiJ0aF9hbmhfY2hhbl9kdW5nIjtzOjQwOiJpbWFnZXMvaG9wX2RvbmcvMTc1Nzc1NTYzNV90aF9hzIluaC5qcGVnIjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDI1LTA5LTEzIDE2OjI3OjE1IjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDI1LTA5LTEzIDE3OjA0OjM3IjtzOjEwOiJhbmhfYmFubmVyIjtzOjQwOiIvaW1hZ2VzL2hvcF9kb25nLzE3NTc3NTc4NzdfNl9iYW5uZXIucG5nIjt9czoxMDoiACoAY2hhbmdlcyI7YTowOnt9czoxMToiACoAcHJldmlvdXMiO2E6MDp7fXM6ODoiACoAY2FzdHMiO2E6MDp7fXM6MTc6IgAqAGNsYXNzQ2FzdENhY2hlIjthOjA6e31zOjIxOiIAKgBhdHRyaWJ1dGVDYXN0Q2FjaGUiO2E6MDp7fXM6MTM6IgAqAGRhdGVGb3JtYXQiO047czoxMDoiACoAYXBwZW5kcyI7YTowOnt9czoxOToiACoAZGlzcGF0Y2hlc0V2ZW50cyI7YTowOnt9czoxNDoiACoAb2JzZXJ2YWJsZXMiO2E6MDp7fXM6MTI6IgAqAHJlbGF0aW9ucyI7YToxOntzOjY6ImNvbmdUeSI7TzoxNzoiQXBwXE1vZGVsc1xDb25nVHkiOjMzOntzOjEzOiIAKgBjb25uZWN0aW9uIjtzOjU6Im15c3FsIjtzOjg6IgAqAHRhYmxlIjtzOjc6ImNvbmdfdHkiO3M6MTM6IgAqAHByaW1hcnlLZXkiO3M6MjoiaWQiO3M6MTA6IgAqAGtleVR5cGUiO3M6MzoiaW50IjtzOjEyOiJpbmNyZW1lbnRpbmciO2I6MTtzOjc6IgAqAHdpdGgiO2E6MDp7fXM6MTI6IgAqAHdpdGhDb3VudCI7YTowOnt9czoxOToicHJldmVudHNMYXp5TG9hZGluZyI7YjowO3M6MTA6IgAqAHBlclBhZ2UiO2k6MTU7czo2OiJleGlzdHMiO2I6MTtzOjE4OiJ3YXNSZWNlbnRseUNyZWF0ZWQiO2I6MDtzOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7czoxMzoiACoAYXR0cmlidXRlcyI7YToxNjp7czoyOiJpZCI7aTo1O3M6MzoidGVuIjtzOjI0OiJC4bqjbyBWaeG7h3QgbmjDom4gdGjhu40iO3M6NDoibG9nbyI7czo3MzoiaHR0cHM6Ly9jZG4uaGFpdHJpZXUuY29tL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDIyLzA0L0xvZ28tQmFvVmlldC1MaWZlLnBuZyI7czoxMDoidHJhbmdfdGhhaSI7aToxO3M6NToibW9fdGEiO3M6MTM5OiJDw7RuZyB0eSBi4bqjbyBoaeG7g20gaMOgbmcgxJHhuqd1IFZp4buHdCBOYW0gduG7m2kgaMahbiAyMCBuxINtIGtpbmggbmdoaeG7h20gdHJvbmcgbMSpbmggduG7sWMgYuG6o28gaGnhu4NtIG5ow6JuIHRo4buNIHbDoCBz4bupYyBraOG7j2UuIjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDI1LTA5LTAyIDA4OjE4OjE0IjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDI1LTA5LTA1IDA4OjExOjM5IjtzOjU6ImVtYWlsIjtzOjI1OiJjb250YWN0QGFiYy1pbnN1cmFuY2UuY29tIjtzOjEzOiJzb19kaWVuX3Rob2FpIjtzOjE2OiIrODQgMjQgMzkzNiAxMjM0IjtzOjc6ImRpYV9jaGkiO3M6NDY6IjEyMyDEkMaw4budbmcgTmd1eeG7hW4gSHXhu4csIFF14bqtbiAxLCBUUC5IQ00iO3M6OToibG9haV9oaW5oIjtzOjQ6ImxpZmUiO3M6MTI6Im5nYXlfZGFuZ19reSI7czoxMDoiMjIvMDkvMjAyNSI7czoxMDoibWFfc29fdGh1ZSI7czoxMDoiMDEyMzQ1Njc4OSI7czo3OiJ3ZWJzaXRlIjtzOjI5OiJodHRwczovL3d3dy5hYmMtaW5zdXJhbmNlLmNvbSI7czoxNDoibmd1b2lfZGFpX2RpZW4iO3M6MTU6Ik5ndXnhu4VuIFbEg24gQSI7czo4OiJoaW5oX25lbiI7czo3MzoiaHR0cHM6Ly9jZG4uaGFpdHJpZXUuY29tL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDIyLzA0L0xvZ28tQmFvVmlldC1MaWZlLnBuZyI7fXM6MTE6IgAqAG9yaWdpbmFsIjthOjE2OntzOjI6ImlkIjtpOjU7czozOiJ0ZW4iO3M6MjQ6IkLhuqNvIFZp4buHdCBuaMOibiB0aOG7jSI7czo0OiJsb2dvIjtzOjczOiJodHRwczovL2Nkbi5oYWl0cmlldS5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMjIvMDQvTG9nby1CYW9WaWV0LUxpZmUucG5nIjtzOjEwOiJ0cmFuZ190aGFpIjtpOjE7czo1OiJtb190YSI7czoxMzk6IkPDtG5nIHR5IGLhuqNvIGhp4buDbSBow6BuZyDEkeG6p3UgVmnhu4d0IE5hbSB24bubaSBoxqFuIDIwIG7Eg20ga2luaCBuZ2hp4buHbSB0cm9uZyBsxKluaCB24buxYyBi4bqjbyBoaeG7g20gbmjDom4gdGjhu40gdsOgIHPhu6ljIGto4buPZS4iO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjUtMDktMDIgMDg6MTg6MTQiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjUtMDktMDUgMDg6MTE6MzkiO3M6NToiZW1haWwiO3M6MjU6ImNvbnRhY3RAYWJjLWluc3VyYW5jZS5jb20iO3M6MTM6InNvX2RpZW5fdGhvYWkiO3M6MTY6Iis4NCAyNCAzOTM2IDEyMzQiO3M6NzoiZGlhX2NoaSI7czo0NjoiMTIzIMSQxrDhu51uZyBOZ3V54buFbiBIdeG7hywgUXXhuq1uIDEsIFRQLkhDTSI7czo5OiJsb2FpX2hpbmgiO3M6NDoibGlmZSI7czoxMjoibmdheV9kYW5nX2t5IjtzOjEwOiIyMi8wOS8yMDI1IjtzOjEwOiJtYV9zb190aHVlIjtzOjEwOiIwMTIzNDU2Nzg5IjtzOjc6IndlYnNpdGUiO3M6Mjk6Imh0dHBzOi8vd3d3LmFiYy1pbnN1cmFuY2UuY29tIjtzOjE0OiJuZ3VvaV9kYWlfZGllbiI7czoxNToiTmd1eeG7hW4gVsSDbiBBIjtzOjg6ImhpbmhfbmVuIjtzOjczOiJodHRwczovL2Nkbi5oYWl0cmlldS5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMjIvMDQvTG9nby1CYW9WaWV0LUxpZmUucG5nIjt9czoxMDoiACoAY2hhbmdlcyI7YTowOnt9czoxMToiACoAcHJldmlvdXMiO2E6MDp7fXM6ODoiACoAY2FzdHMiO2E6MDp7fXM6MTc6IgAqAGNsYXNzQ2FzdENhY2hlIjthOjA6e31zOjIxOiIAKgBhdHRyaWJ1dGVDYXN0Q2FjaGUiO2E6MDp7fXM6MTM6IgAqAGRhdGVGb3JtYXQiO047czoxMDoiACoAYXBwZW5kcyI7YTowOnt9czoxOToiACoAZGlzcGF0Y2hlc0V2ZW50cyI7YTowOnt9czoxNDoiACoAb2JzZXJ2YWJsZXMiO2E6MDp7fXM6MTI6IgAqAHJlbGF0aW9ucyI7YTowOnt9czoxMDoiACoAdG91Y2hlcyI7YTowOnt9czoyNzoiACoAcmVsYXRpb25BdXRvbG9hZENhbGxiYWNrIjtOO3M6MjY6IgAqAHJlbGF0aW9uQXV0b2xvYWRDb250ZXh0IjtOO3M6MTA6InRpbWVzdGFtcHMiO2I6MTtzOjEzOiJ1c2VzVW5pcXVlSWRzIjtiOjA7czo5OiIAKgBoaWRkZW4iO2E6MDp7fXM6MTA6IgAqAHZpc2libGUiO2E6MDp7fXM6MTE6IgAqAGZpbGxhYmxlIjthOjEzOntpOjA7czozOiJ0ZW4iO2k6MTtzOjQ6ImxvZ28iO2k6MjtzOjEwOiJ0cmFuZ190aGFpIjtpOjM7czo1OiJtb190YSI7aTo0O3M6NToiZW1haWwiO2k6NTtzOjEzOiJzb19kaWVuX3Rob2FpIjtpOjY7czo3OiJkaWFfY2hpIjtpOjc7czo5OiJsb2FpX2hpbmgiO2k6ODtzOjEyOiJuZ2F5X2Rhbmdfa3kiO2k6OTtzOjEwOiJtYV9zb190aHVlIjtpOjEwO3M6Nzoid2Vic2l0ZSI7aToxMTtzOjE0OiJuZ3VvaV9kYWlfZGllbiI7aToxMjtzOjg6ImhpbmhfbmVuIjt9czoxMDoiACoAZ3VhcmRlZCI7YToxOntpOjA7czoxOiIqIjt9fX1zOjEwOiIAKgB0b3VjaGVzIjthOjA6e31zOjI3OiIAKgByZWxhdGlvbkF1dG9sb2FkQ2FsbGJhY2siO047czoyNjoiACoAcmVsYXRpb25BdXRvbG9hZENvbnRleHQiO047czoxMDoidGltZXN0YW1wcyI7YjoxO3M6MTM6InVzZXNVbmlxdWVJZHMiO2I6MDtzOjk6IgAqAGhpZGRlbiI7YTowOnt9czoxMDoiACoAdmlzaWJsZSI7YTowOnt9czoxMToiACoAZmlsbGFibGUiO2E6MzY6e2k6MDtzOjI6ImlkIjtpOjE7czo0OiJjY2NkIjtpOjI7czoxMToibWFfaG9wX2RvbmciO2k6MztzOjY6ImhvX3RlbiI7aTo0O3M6OToiZ2lvaV90aW5oIjtpOjU7czo5OiJuZ2F5X3NpbmgiO2k6NjtzOjc6ImRpYV9jaGkiO2k6NztzOjEzOiJzb19kaWVuX3Rob2FpIjtpOjg7czoxMToic29fdGllbl9tdWEiO2k6OTtzOjIxOiJzb190aWVuX2RvbmdfaGFuZ19uYW0iO2k6MTA7czoxMzoidGhvaV9naWFuX211YSI7aToxMTtzOjE3OiJuZ2F5X2NhcF9ob3BfZG9uZyI7aToxMjtzOjEyOiJuZ2F5X2Rhb19oYW4iO2k6MTM7czo5OiJuZ2FuX2hhbmciO2k6MTQ7czoxMjoic29fdGFpX2tob2FuIjtpOjE1O3M6MTM6ImNodV90YWlfa2hvYW4iO2k6MTY7czoxMzoiYW5oX21hdF90cnVvYyI7aToxNztzOjExOiJhbmhfbWF0X3NhdSI7aToxODtzOjEzOiJhbmhfY2hhbl9kdW5nIjtpOjE5O3M6NzoidGhfY2NjZCI7aToyMDtzOjE0OiJ0aF9tb2lfcXVhbl9oZSI7aToyMTtzOjk6InRoX2hvX3RlbiI7aToyMjtzOjEyOiJ0aF9naW9pX3RpbmgiO2k6MjM7czoxMjoidGhfbmdheV9zaW5oIjtpOjI0O3M6MTA6InRoX2RpYV9jaGkiO2k6MjU7czoxNjoidGhfc29fZGllbl90aG9haSI7aToyNjtzOjEyOiJ0aF9uZ2FuX2hhbmciO2k6Mjc7czoxNToidGhfc29fdGFpX2tob2FuIjtpOjI4O3M6MTY6InRoX2NodV90YWlfa2hvYW4iO2k6Mjk7czoxNjoidGhfYW5oX21hdF90cnVvYyI7aTozMDtzOjE0OiJ0aF9hbmhfbWF0X3NhdSI7aTozMTtzOjE2OiJ0aF9hbmhfY2hhbl9kdW5nIjtpOjMyO3M6MTM6ImxvYWlfaG9wX2RvbmciO2k6MzM7czoxMDoiY29uZ190eV9pZCI7aTozNDtzOjEwOiJhbmhfYmFubmVyIjtpOjM1O3M6MTc6ImNob19waGVwX3J1dF90aWVuIjt9czoxMDoiACoAZ3VhcmRlZCI7YToxOntpOjA7czoxOiIqIjt9fX0=', 1757793994);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `can_cuoc_cong_dan`
--
ALTER TABLE `can_cuoc_cong_dan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cong_ty`
--
ALTER TABLE `cong_ty`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `hop_dong`
--
ALTER TABLE `hop_dong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hop_dong_cong_ty_id_foreign` (`cong_ty_id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lich_su`
--
ALTER TABLE `lich_su`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `can_cuoc_cong_dan`
--
ALTER TABLE `can_cuoc_cong_dan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `cong_ty`
--
ALTER TABLE `cong_ty`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hop_dong`
--
ALTER TABLE `hop_dong`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lich_su`
--
ALTER TABLE `lich_su`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hop_dong`
--
ALTER TABLE `hop_dong`
  ADD CONSTRAINT `hop_dong_cong_ty_id_foreign` FOREIGN KEY (`cong_ty_id`) REFERENCES `cong_ty` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
