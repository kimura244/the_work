-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-03-10 18:05:44
-- サーバのバージョン： 10.4.17-MariaDB
-- PHP のバージョン: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `service`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `enterprise`
--

CREATE TABLE `enterprise` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `URL` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `target_id` int(11) DEFAULT 0,
  `create_datetime` datetime NOT NULL,
  `update_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `enterprise`
--

INSERT INTO `enterprise` (`id`, `name`, `text`, `URL`, `phone`, `mail`, `category`, `target_id`, `create_datetime`, `update_datetime`) VALUES
(1, 'かなりお得なガス', '紹介です', 'https://www.google.com/search?', 902222222, 'ggg@gmail.com', 'ガス', 1, '2016-01-11 15:00:01', '2016-01-11 15:00:01'),
(3, '水', '水の詳細', 'https://www.google.com', 2147483647, 'MIZU@ggg.com', '水道', 7, '2021-03-03 02:00:26', '2021-03-05 14:53:22'),
(6, '通信', '電気の詳細です', 'https://www.google.com/search?', 2147483647, 'denki@ggg.com', '通信', 7, '2021-03-03 02:17:31', '2021-03-04 15:11:19'),
(7, 'びりびり電気', 'びりびり電気の詳細です', 'http://localhost/php_test/', 2147483647, 'BIRIBIRI@ggg.com', '電気', 7, '2021-03-04 12:44:36', '2021-03-04 12:44:36');

-- --------------------------------------------------------

--
-- テーブルの構造 `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `target_id` int(11) NOT NULL DEFAULT 0,
  `create_datetime` datetime NOT NULL,
  `update_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `shop`
--

INSERT INTO `shop` (`id`, `name`, `URL`, `phone`, `mail`, `target_id`, `create_datetime`, `update_datetime`) VALUES
(1, '武', 'iiii', 2147483647, 'gaga@ggg.com', 2, '2016-01-12 15:00:01', '2021-03-04 17:00:45');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `secret` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `create_datetime` datetime NOT NULL,
  `update_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `mail`, `password`, `secret`, `type`, `create_datetime`, `update_datetime`) VALUES
(1, 'ggg@gmail.com', '25f9e794323b453885f5181f1b624d0b', '地獄', '1', '2016-01-11 15:00:01', '2021-03-01 00:40:59'),
(2, 'aaa@gmail.com', '6ebe76c9fb411be97b3b0d48b791a7c9', '天国', '0', '2016-01-11 15:00:01', '2021-03-01 00:47:56'),
(4, 'aiueo', '25f9e794323b453885f5181f1b624d0b', 'aiueo', '0', '2021-02-23 21:13:26', '2021-02-23 21:13:26'),
(6, 'oooo', '3f74ed1b90de7d06a51891228750fcb1', 'aiueo', '1', '2021-02-23 21:36:37', '2021-02-23 21:36:37'),
(7, 'qqq@gmail.com', '986c29770095d5ecffc5af01f107be8a', 'qwer', '1', '2021-02-28 22:50:56', '2021-02-28 22:50:56'),
(9, 'aaa@gmail.com', '9ea5e6f10d48803ae38499c0d5e6d93f', 'iiii', '0', '2021-03-03 21:21:56', '2021-03-03 21:21:56'),
(10, 'qqq@gmail.com', '73e803acd16633eca26e213b650beb1f', 'vfxv', '0', '2021-03-04 13:49:08', '2021-03-04 13:49:08'),
(11, 'ggg@gmail.com', '6abe33f215bcc63cbd8f92c19e7cd537', 'vfc', '1', '2021-03-04 13:49:29', '2021-03-04 13:49:29');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `enterprise`
--
ALTER TABLE `enterprise`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `enterprise`
--
ALTER TABLE `enterprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- テーブルの AUTO_INCREMENT `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
