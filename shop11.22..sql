-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2022-11-22 05:42:49
-- サーバのバージョン： 10.4.25-MariaDB
-- PHP のバージョン: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `shop`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `kojin`
--

CREATE TABLE `kojin` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `huri` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `yubin` char(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jusyo` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `den` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `mst_kojin`
--

CREATE TABLE `mst_kojin` (
  `code` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `mst_kojin`
--

INSERT INTO `mst_kojin` (`code`, `name`, `password`) VALUES
(1, 'ろくまる', '12345678901234567890123456789012'),
(2, 'aaa', '202cb962ac59075b964b07152d234b70'),
(3, 'bbb', '202cb962ac59075b964b07152d234b70');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `kojin`
--
ALTER TABLE `kojin`
  ADD PRIMARY KEY (`ID`);

--
-- テーブルのインデックス `mst_kojin`
--
ALTER TABLE `mst_kojin`
  ADD PRIMARY KEY (`code`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `kojin`
--
ALTER TABLE `kojin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `mst_kojin`
--
ALTER TABLE `mst_kojin`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
