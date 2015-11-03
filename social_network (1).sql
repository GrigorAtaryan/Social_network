-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 03 2015 г., 16:19
-- Версия сервера: 5.6.26
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `social_network`
--

-- --------------------------------------------------------

--
-- Структура таблицы `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `approve` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_approve` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`, `approve`, `created_at`, `updated_at`, `is_approve`) VALUES
(9, 2, 1, '1', '2015-10-30 06:03:38', '2015-10-30 06:03:38', 0),
(10, 1, 2, '1', '2015-10-30 06:03:38', '2015-10-30 06:03:38', 0),
(11, 2, 4, '1', '2015-10-30 06:04:06', '2015-10-30 06:04:06', 0),
(12, 4, 2, '1', '2015-10-30 06:04:06', '2015-10-30 06:04:06', 0),
(13, 1, 4, '1', '2015-10-30 13:57:25', '2015-10-30 13:57:25', 0),
(14, 4, 1, '1', '2015-10-30 13:57:25', '2015-10-30 13:57:25', 0),
(15, 1, 5, '1', '2015-11-03 07:52:12', '2015-11-03 07:52:12', 0),
(16, 5, 1, '1', '2015-11-03 07:52:12', '2015-11-03 07:52:12', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `feauture` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `user_id`, `path`, `feauture`, `created_at`, `updated_at`) VALUES
(10, 5, '14172.jpg', 1, '2015-10-23 06:40:45', '2015-10-23 06:40:45'),
(11, 5, '1026.jpg', 0, '2015-10-23 09:53:00', '2015-10-23 09:53:00'),
(12, 5, '19045.jpg', 0, '2015-10-23 09:58:35', '2015-10-23 09:58:35'),
(13, 3, '275.jpg', 0, '2015-10-23 10:13:39', '2015-10-23 10:13:39'),
(14, 3, '9018.jpg', 0, '2015-10-23 11:09:57', '2015-10-23 11:09:57'),
(15, 3, '12342.jpg', 0, '2015-10-23 11:54:46', '2015-10-23 11:54:46'),
(22, 4, '8117.jpg', 0, '2015-10-27 07:44:19', '2015-10-27 07:44:19'),
(23, 4, '22090.jpg', 1, '2015-10-27 07:46:32', '2015-10-27 07:46:32'),
(25, 1, '19731.jpg', 1, '2015-10-28 10:33:25', '2015-10-28 10:33:25'),
(26, 2, '24925.jpg', 1, '2015-10-29 08:05:36', '2015-10-29 08:05:36'),
(27, 1, '1953.jpg', 0, '2015-11-03 07:03:17', '2015-11-03 07:03:17');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL,
  `from_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `to_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message_text` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_read` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `from_id`, `to_id`, `message_text`, `is_read`, `created_at`, `updated_at`) VALUES
(5, '1', '2', 'alooooooooooo', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '1', '2', 'yoyo', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '2', '1', 'inch ka?', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_10_21_094701_create_images_table', 1),
('2015_10_27_085409_create_friends_table', 2),
('2015_10_27_091004_create_friends_table', 3),
('2015_10_30_123225_create_messages_table', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Grigor', 'Ataryan', 'arm-goq91@mail.ru', '$2y$10$o13NhM6mDcMeVlsal0xQvOv5L.W9Ghwcex2vsyZ.P9DCgu5/VgqQy', '21Ejl5GZGT1moYzrTsFlK3yf4rGCDWHeVlH86HmHUNoiN373gXNHUXpIhIvg', '2015-10-21 11:52:40', '2015-11-03 07:52:14'),
(2, 'Minas', 'Minasyan', 'minas@mail.ru', '$2y$10$1lLVKyWOK578KWWRW/CBwu9c/OssMQP2EhYBRWwwxFQiIpvf7NjM2', 'cxFOpFw5ixJEsdxnGVhLFMwSKLUw9bbo5BHIGTDNE8pX6zx4OT8apxy6NeeX', '2015-10-21 11:53:15', '2015-10-30 04:26:44'),
(3, 'Nareko', 'Rudolfyan', 'karen@mail.ru', '$2y$10$0eRWbAXcm9pGM7VLhIqM7.phj6g4oa.AaLmzjs1tUzsQvm1MRmIRq', NULL, '2015-10-21 11:53:36', '2015-10-21 11:53:36'),
(4, 'Anahit', 'Vardanyan', 'anahit@mail.ru', '$2y$10$5.E3sA84P9px1VQWqe4rkedRG4nMkSSlySVArgXHqpKQC/xSGOty6', 'UP6etSJcsc8X9T5b7mJ2N7eDeV16gMBAuzovSPayeegWuT2DoUyM4lX5K8v8', '2015-10-22 11:09:59', '2015-11-03 10:00:21'),
(5, 'Gurgen', 'Nazaryan', 'gurgen@mail.ru', '$2y$10$Qv5eohsWsAm/njTqwmDVxehXitAkDqRougo/HKNBT5mHQei9f6YWe', 'ISABz8wE0oPHR2QIkJCbtAIdIINn5ry0X1gzo2RqMEFiqaTNbYCwBtigyg9B', '2015-10-23 05:11:49', '2015-11-03 07:52:27');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
