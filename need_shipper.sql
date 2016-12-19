-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 19, 2016 lúc 04:22 CH
-- Phiên bản máy phục vụ: 5.7.14
-- Phiên bản PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `need_shipper`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baidang`
--

CREATE TABLE `baidang` (
  `id` int(10) UNSIGNED NOT NULL,
  `diachishop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdtshop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachinnhan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdtnnhan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenmathang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cannang` int(11) NOT NULL,
  `tienung` int(11) NOT NULL,
  `phiship` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `kinhdoshop` double NOT NULL,
  `vidoshop` double NOT NULL,
  `kinhdonnhan` double NOT NULL,
  `vidonnhan` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `khoangcach` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baidang`
--

INSERT INTO `baidang` (`id`, `diachishop`, `sdtshop`, `diachinnhan`, `sdtnnhan`, `ghichu`, `tenmathang`, `cannang`, `tienung`, `phiship`, `user_id`, `kinhdoshop`, `vidoshop`, `kinhdonnhan`, `vidonnhan`, `created_at`, `updated_at`, `khoangcach`) VALUES
(1, 'Soos nha 81', '0966224455', 'phan van tri', '0966883284', 'skfnldkfdls', 'Áo sơ mi', 5, 150, 12, 4, 0, 0, 0, 0, '2016-12-07 18:36:18', '2016-12-18 17:24:26', 5),
(2, '71 Kha Vạn Cân, Linh Chiểu, Thủ Đức, Hồ Chí Minh, Vietnam', '0966224455', '81 Lê Văn Việt, Tăng Nhơn Phú B, Quận 9, Hồ Chí Minh, Vietnam', '0966883284', 'Hoàng', 'quần', 5, 150, 12, 2, 107, 10.857899, 106.757462, 10.857899, '2016-12-08 20:24:32', '2016-12-08 20:24:32', 1),
(3, '55 Phạm Văn Đồng, Phường 3, Gò Vấp, Hồ Chí Minh, Vietnam', '0933999697', '25 Nguyễn Văn Đậu, phường 5, Phú Nhuận, Hồ Chí Minh, Vietnam', '0975228754', 'Trần thị hân', 'Mũ snapback', 1, 170, 20, 4, 106.6810339, 10.8147611, 106.6869229, 10.805218, '2016-12-11 08:16:36', '2016-12-11 08:16:36', 1),
(4, 'dai hoc cong nghe thong tin', '0966883284', 'dai hoc quoc te', '0975228754', 'Tiến', 'Áo', 1, 150, 20, 4, 0, 0, 0, 0, '2016-12-15 06:07:35', '2016-12-15 06:07:35', 0),
(5, '71 Thích Minh Nguyệt, Phường 2, Tân Bình, Hồ Chí Minh, Vietnam', '0966224455', '71 Phổ Quang, Phường 2, Tân Bình, Hồ Chí Minh, Vietnam', '0975228754', 'Tien', 'Áo', 12, 150, 12, 4, 106.6673409, 10.8070019, 106.668187, 10.806763, '2016-12-15 10:10:07', '2016-12-15 10:10:07', 1),
(6, '81 Kha Vạn Cân, Phước Long, Thủ Đức, Hồ Chí Minh, Vietnam', '0966224455', '38 Trần Hưng Đạo, Phú Thủy, Tp. Phan Thiết, Bình Thuận, Vietnam', '0975228754', 'Phong', 'Quần jean DG', 1, 150, 12, 4, 106.753702, 10.849278, 108.1038399, 10.9354048, '2016-12-16 04:05:07', '2016-12-18 17:24:45', 148),
(7, '15 Tô Ngọc Vân, Linh Tây, Thủ Đức, Hồ Chí Minh, Vietnam', '0937488555', '23 Phạm Văn Đồng, Phường 3, Gò Vấp, Hồ Chí Minh, Vietnam', '0966228415', 'Hân', 'Áo So Mi', 1, 150, 20, 3, 106.7541661, 10.8511806, 106.6798333, 10.8146746, '2016-12-16 05:30:40', '2016-12-16 05:30:40', 10),
(8, '18 Kha Vạn Cân, Phước Long, Thủ Đức, Hồ Chí Minh, Vietnam', '0937488555', '16 Lý Thường Kiệt, phường 11, Tân Bình, Hồ Chí Minh, Vietnam', '0966228415', 'Huyền', 'Under wear CK', 1, 500000, 20000, 3, 106.7539649, 10.848816, 106.6529118, 10.7926133, '2016-12-16 05:49:37', '2016-12-18 17:25:10', 13),
(9, '81 Hoàng Văn Thụ, phường 15, Phú Nhuận, Hồ Chí Minh, Vietnam', '0937488555', '71 Kha Vạn Cân, Linh Chiểu, Thủ Đức, Hồ Chí Minh, Vietnam', '0966228415', 'Huyền', 'Bra', 1, 150, 20, 4, 106.677806, 10.799179, 106.757462, 10.857899, '2016-12-16 06:29:40', '2016-12-16 06:29:40', 11),
(10, '81 Hoàng Văn Thụ, phường 15, Phú Nhuận, Hồ Chí Minh, Vietnam', '0966224455', '70 Hoàng Diệu 2, Linh Trung, Thủ Đức, Hồ Chí Minh, Vietnam', '0975228754', 'Tuấn', 'Ốp lưng', 1, 150, 12, 4, 106.677806, 10.799179, 106.7664843, 10.8559649, '2016-12-16 18:05:27', '2016-12-16 18:05:27', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_12_05_065917_create_baidang_table', 1),
(4, '2016_12_05_065952_create_phananh_table', 1),
(5, '2016_01_01_193651_create_roles_permissions_tables', 2),
(6, '2016_12_08_140023_add', 3),
(7, '2016_12_11_142506_Add2', 4),
(8, '2016_12_12_030719_create_bai_dangs_table', 5),
(9, '2016_12_12_065833_add3', 6),
(10, '2016_12_13_073740_create_xndonhang_table', 7),
(11, '2016_12_14_074101_add4', 8),
(12, '2016_12_15_123125_create_xndonhangs_table', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phananh`
--

CREATE TABLE `phananh` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kinhdo` double DEFAULT NULL,
  `vido` double DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `sdt`, `diachi`, `loai`, `remember_token`, `created_at`, `updated_at`, `kinhdo`, `vido`, `level`) VALUES
(2, 'admin', 'tiendt231@gmail.com', '$2y$10$v3PsgjE/kqnwtPc.aZaFOuAQ1eQrHjfRr9nrNuZZ6I5964semYjn2', '0966883285', '81 Đường Số 17, khu phố 3, Hiệp Bình Chánh, Thủ Đức, Hồ Chí Minh, Vietnam', 'Shop', 'WOV9mlwxJkAQHlqz4h9tXGU0Mpstk6VstmKW5u84JkdxypXeAZH8XDUpeSvf', '2016-12-06 06:15:33', '2016-12-11 07:52:01', 0, 0, 0),
(3, 'The Tiến', 'dthtien@gmail.com', '$2y$10$kC/bkE8O2L7vlvkwzGXhyuf1/t3tXztSr3Sk2Ijs2nBgva5NxcVsa', '0966883284', '81', 'Shop', 'sid42D3cWhr3thZrPFpmSj1ijyqlnaRj3KxGiGFEw2Wu5sBAEnkFZVqT6LEW', '2016-12-06 06:34:50', '2016-12-16 06:30:46', 0, 0, 0),
(4, 'Anh Biết', 'tiendt23@gmail.com', '$2y$10$LOYfhktrK1lu3Y55pzPfNuQcHnKesPRE5anekLEMTwjkmqOPtn/gS', '0966883284', '53 Chương Dương, Linh Chiểu, Thủ Đức, Hồ Chí Minh, Vietnam', 'Shop', 'QOCaceN7sVeN6KsPF7clzOQibvUH5ORyi5kV92DH7mMZROCLwsepE7Uxf5zl', '2016-12-08 07:32:43', '2016-12-18 16:15:20', 106.7593651, 10.8535876, 0),
(5, 'admin', 'tiendt2311@gmail.com', '$2y$10$LtdY.C2316mxuktyW4JpEuUqeCjp2yWtZzrxjSoUVhvaVs8BdNdAW', '0966883284', '72 Võ Văn Ngân, Bình Thọ, Thủ Đức, Hồ Chí Minh, Vietnam', 'admin', 'cBcUvmLiFLWHELiPDRrGMBzAovABzrlhALgyVVQEhbp2jaNKMMpKNZbt88OK', '2016-12-12 00:18:55', '2016-12-16 07:44:07', 106.7664723, 10.8505195, 1),
(6, 'Thế Tiến 2', 'dthtien@icloud.com', '$2y$10$XQLWn/WaEF4r1AIubYGbdukRS70ttfehrthDV9BitE/vt635tRC9q', '0966883284', '12 Thích Minh Nguyệt, Phường 2, Tân Bình, Hồ Chí Minh, Vietnam', 'Shipper', 'qxaxR8rXxjILuEIPyMg4xanlsJVN2LRdbTZf6JDY2Y0yaHPmL0JTUTOHS2Dd', '2016-12-13 06:13:55', '2016-12-13 06:20:37', 106.6677235, 10.80667, 0),
(7, 'The Tiến 3', 'dthtien1@gmail.com', '$2y$10$A3JP3J9t/uMwffnH75nVZuFcSXOuVNNRdx0KqT7wUkMNFbg19AvTy', '0966883284', '78 Phổ Quang, Phường 2, Tân Bình, Hồ Chí Minh, Vietnam', 'Shipper', '6DjOFJqUlOJYgJJpAOqLb1A3eKwXW1bcd03IUo7J8LQiLuZ0OHZcntZ9B4vV', '2016-12-13 06:19:17', '2016-12-19 07:15:02', 106.668513, 10.806601, 0),
(8, 'Lê Hoàng', 'tiendt1@gmail.com', '$2y$10$7/Is6foi1mrlq72cv6En3.hgbXi4XCvJHCdAhaiutp7aNuVeGgxxK', '0966883284', '55 Chương Dương, Linh Chiểu, Thủ Đức, Hồ Chí Minh, Vietnam', 'Shop', 'mpssh4eXe7VjZ0NzjQe9enztL5PlijY3dRQGVjDs', '2016-12-16 07:14:59', '2016-12-16 07:14:59', 106.7593255, 10.8536287, 0),
(9, 'Cường', 'cuong.htan27@gmail.com', '$2y$10$07yeypn..JaQ8DQ15iV8z.KH1Jh7Z4UKHrCzm3lvMcbTBhSrW2TQy', '4923049209402', 'fke93920kd', 'Shipper', 'YtkN379c25VhAhzatiHJ46cuAKy6c7mu46yWAuhB', '2016-12-16 07:58:39', '2016-12-16 07:58:39', 0, 0, 0),
(10, 'admin', 'admin@ns.com', '$2y$10$MrmkSIN3LtOC7xOpTAe4HeyzJVO11JvH5FWPbp6I8Q4P3VzD7XJFO', NULL, NULL, NULL, 'M2HGE8nA9IlycR6AeyWFJvWklR1eTGWT99sLuatykm91wYfNWV1V6uGXre8x', '2016-12-18 04:22:00', '2016-12-18 05:44:05', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xndonhang`
--

CREATE TABLE `xndonhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `dh_id` int(11) NOT NULL,
  `ship_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_su` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `xndonhang`
--

INSERT INTO `xndonhang` (`id`, `dh_id`, `ship_id`, `created_at`, `updated_at`, `is_su`) VALUES
(12, 2, 7, '2016-12-14 18:33:49', '2016-12-14 19:39:07', 1),
(13, 3, 7, '2016-12-14 19:39:23', '2016-12-15 05:49:14', 1),
(15, 5, 7, '2016-12-15 20:44:32', '2016-12-16 07:13:49', 1),
(16, 7, 7, '2016-12-16 05:32:52', '2016-12-16 05:40:23', 1),
(17, 8, 7, '2016-12-16 05:51:23', '2016-12-16 05:51:45', 1),
(18, 9, 9, '2016-12-16 07:59:33', '2016-12-16 07:59:33', 0),
(19, 10, 7, '2016-12-16 18:18:44', '2016-12-16 18:18:58', 1),
(20, 6, 7, '2016-12-16 18:47:11', '2016-12-16 18:47:11', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baidang`
--
ALTER TABLE `baidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baidang_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `phananh`
--
ALTER TABLE `phananh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `xndonhang`
--
ALTER TABLE `xndonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `xndonhang_dh_id_foreign` (`dh_id`),
  ADD KEY `xndonhang_ship_id_foreign` (`ship_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baidang`
--
ALTER TABLE `baidang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `phananh`
--
ALTER TABLE `phananh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT cho bảng `xndonhang`
--
ALTER TABLE `xndonhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
