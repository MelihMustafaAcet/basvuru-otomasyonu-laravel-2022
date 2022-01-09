-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: mysql
-- Üretim Zamanı: 06 Oca 2022, 20:15:46
-- Sunucu sürümü: 8.0.27
-- PHP Sürümü: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `yazgel`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `nameSurname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`id`, `nameSurname`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'admin@admin.com', '$2y$10$beU1wrIjc/tVJNX3TF0SG.h3PhkS182zlf0XGcqAK5r6sOkWYimE6', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cap_application`
--

CREATE TABLE `cap_application` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `studentId` int NOT NULL,
  `studiedPeriod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gpa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classSuccessPercentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isDraft` tinyint(1) NOT NULL DEFAULT '1',
  `isConfirmed` tinyint(1) NOT NULL DEFAULT '0',
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `cap_application`
--

INSERT INTO `cap_application` (`id`, `created_at`, `updated_at`, `studentId`, `studiedPeriod`, `gpa`, `classSuccessPercentage`, `semester`, `option1`, `option2`, `option3`, `isDraft`, `isConfirmed`, `file`) VALUES
(2, '2022-01-06 17:17:34', '2022-01-06 17:18:49', 8, '2', '3.5', '10', '2', 'Biyomedikal Mühendisliği', 'Bilişim Sistemleri Mühendisliği', 'unselected', 0, 1, '935_batu_cim_1641489529.pdf'),
(3, '2022-01-06 18:00:48', '2022-01-06 18:00:55', 8, 'Ut laboriosam asper', 'Dolorem velit illum', 'Dolorem at magna dol', '2', 'Temel Eğitim', 'Eğitim Bilimleri', 'Sosyal Hizmet', 0, -1, '935_batu_cim_1641492055.pdf'),
(4, '2022-01-06 18:02:08', '2022-01-06 18:02:15', 8, 'Tenetur tempora alia', 'Amet qui aut obcaec', 'Ipsum consequuntur i', '2', 'Bilgisayar Öğretim Teknolojileri', 'Eğitim Bilimleri', 'Sosyal Hizmet', 0, 1, '935_batu_cim_1641492135.pdf'),
(5, '2022-01-06 20:09:29', '2022-01-06 20:09:29', 9, 'Eos non possimus n', 'Quod dolorum adipisc', 'Do et nesciunt labo', '2', 'Arkeoloji', 'Bilgisayar Öğretim Teknolojileri', 'Sosyal Hizmet', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `faculty`
--

CREATE TABLE `faculty` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultyName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `faculty`
--

INSERT INTO `faculty` (`id`, `created_at`, `updated_at`, `facultyName`) VALUES
(1, NULL, NULL, 'Teknoloji Fakültesi'),
(2, NULL, NULL, 'Fen Edebiyat Fakültesi'),
(3, NULL, NULL, 'Mühendislik Fakültesi'),
(4, NULL, NULL, 'Eğitim Fakültesi'),
(5, NULL, NULL, 'Sağlık Bilimleri Fakültesi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_03_205854_create_faculty_table', 1),
(6, '2022_01_03_205927_create_section_table', 1),
(7, '2014_10_12_000000_create_users_table', 2),
(9, '2022_01_04_203802_create_cap_application_table', 3),
(10, '2022_01_04_203802_create_yaz_application_table', 4),
(11, '2014_10_12_000000_create_admins_table', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `section`
--

CREATE TABLE `section` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facultyId` int NOT NULL,
  `sectionName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `section`
--

INSERT INTO `section` (`id`, `created_at`, `updated_at`, `facultyId`, `sectionName`) VALUES
(1, NULL, NULL, 1, 'Biyomedikal Mühendisliği'),
(2, NULL, NULL, 1, 'Bilişim Sistemleri Mühendisliği'),
(3, NULL, NULL, 1, 'Enerji Sistemleri Mühendisliği'),
(4, NULL, NULL, 1, 'Otomotiv Mühendisliği'),
(11, NULL, NULL, 2, 'Türk Dili ve Edebiyatı'),
(12, NULL, NULL, 2, 'Matematik'),
(13, NULL, NULL, 2, 'Arkeoloji'),
(14, NULL, NULL, 2, 'Felsefe'),
(15, NULL, NULL, 2, 'Fizik'),
(16, NULL, NULL, 3, 'Mekatronik Mühendisliği'),
(17, NULL, NULL, 3, 'Bilgisayar Mühendisliği'),
(18, NULL, NULL, 3, 'Çevre Mühendisliği'),
(19, NULL, NULL, 3, 'Elektrik Mühendisliği'),
(20, NULL, NULL, 3, 'Harita Mühendisliği'),
(21, NULL, NULL, 4, 'Bilgisayar Öğretim Teknolojileri'),
(22, NULL, NULL, 4, 'Eğitim Bilimleri'),
(23, NULL, NULL, 4, 'Temel Eğitim'),
(24, NULL, NULL, 4, 'Güzel Sanatlar Eğitimi'),
(25, NULL, NULL, 4, 'Özel Eğitim'),
(26, NULL, NULL, 5, 'Ebelik'),
(27, NULL, NULL, 5, 'Hemşirelik'),
(28, NULL, NULL, 5, 'Sosyal Hizmet');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nameSurname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studentNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identyNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `university` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resetCode` int DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `nameSurname`, `studentNumber`, `email`, `password`, `phoneNumber`, `identyNumber`, `address`, `class`, `birthday`, `university`, `faculty`, `section`, `photo`, `resetCode`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Sharpe', '64', 'tysihigi@mailinator.com', '$2y$10$heoPHYnC8j0Kve87Clg1pOB/KhLJMuhfF.Km2QRwWjriyd7U420Wi', '+1 (574) 304-8406', '975', 'Reprehenderit quo in', '2', '2022-06-01', 'KOÜ', '1', '3', '1641252128_2021-12-30_01-33.png', 1945, NULL, '2022-01-03 23:22:08', '2022-01-03 23:35:06'),
(8, 'Melih Acet', '935', 'mail@mail.com', '$2y$10$beU1wrIjc/tVJNX3TF0SG.h3PhkS182zlf0XGcqAK5r6sOkWYimE6', '+1 (439) 161-6794', '534', 'Minim laboris non ip', '4', '2022-01-06', 'KOÜ', '4', '3', '1641327493_2021-12-30_01-33.png', 1875, NULL, '2022-01-04 20:18:13', '2022-01-06 20:00:49'),
(9, 'Melih Acet', '90', 'melih@melih.com', '$2y$10$beU1wrIjc/tVJNX3TF0SG.h3PhkS182zlf0XGcqAK5r6sOkWYimE6', '+1 (585) 223-3754', '256', 'At sunt labore mole', '1', '2022-04-01', 'KOÜ', '2', '24', '1641499429_paw-print-.png', NULL, NULL, '2022-01-06 20:03:50', '2022-01-06 20:03:50');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yaz_application`
--

CREATE TABLE `yaz_application` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `studentId` int NOT NULL,
  `teacher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `university` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kou_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kou_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kou_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `university_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `university_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `university_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isDraft` tinyint(1) NOT NULL DEFAULT '1',
  `isConfirmed` tinyint(1) NOT NULL DEFAULT '0',
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `yaz_application`
--

INSERT INTO `yaz_application` (`id`, `created_at`, `updated_at`, `studentId`, `teacher`, `university`, `kou_1`, `kou_2`, `kou_3`, `university_1`, `university_2`, `university_3`, `isDraft`, `isConfirmed`, `file`) VALUES
(4, '2022-01-06 17:20:19', '2022-01-06 17:59:38', 8, 'Ad Soyad', 'DDDDD Universitesi', 'kocaeli 1', NULL, NULL, 'universite 1', NULL, NULL, 0, 1, '935_batu_cim_1641491978.pdf'),
(5, '2022-01-06 18:10:12', '2022-01-06 18:10:12', 8, 'Reprehenderit facili', 'Illo aut et voluptat', 'Vel ad perferendis e', 'Fuga Consectetur t', 'Quae impedit qui ob', 'Aperiam asperiores d', 'Facere proident eum', 'Alias ipsam ea est', 1, 0, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Tablo için indeksler `cap_application`
--
ALTER TABLE `cap_application`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Tablo için indeksler `yaz_application`
--
ALTER TABLE `yaz_application`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `cap_application`
--
ALTER TABLE `cap_application`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `section`
--
ALTER TABLE `section`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `yaz_application`
--
ALTER TABLE `yaz_application`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
