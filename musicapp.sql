-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2018 at 07:11 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musicapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(6) NOT NULL,
  `name` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `image`) VALUES
(2, 'Äá»«ng Ngoáº£nh Láº¡i', ''),
(6, 'Nháº¡t', ''),
(7, 'BÃ´ng Há»“ng Thá»§y Tinh', 'https://yeuchaybo.com/wp-content/uploads/2015/06/chay-bo-la-mot-nghe-thuat-1200x755.jpg'),
(8, 'ThÄƒng', ''),
(9, 'Náº¿u ', ''),
(10, 'Ba Cháº¥m ', ''),
(11, 'MÆ¡', 'http://s.nhac.vn/v1/seo/song/s1/0/0/478/490228.jpg'),
(12, 'ROCK xuyÃªn mÃ n Ä‘Ãªm', 'http://buctuong.com/wp-content/uploads/2012/12/BT.jpg'),
(30, 'Cháº¡y Tháº­t Xa', 'https://yeuchaybo.com/wp-content/uploads/2015/06/chay-bo-la-mot-nghe-thuat-1200x755.jpg'),
(31, '. . . Ba Cháº¥m', 'https://avatar-nct.nixcdn.com/playlist/2013/11/06/c/c/a/8/1383712690075_500.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `album_details`
--

CREATE TABLE `album_details` (
  `id` int(11) NOT NULL,
  `songs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `image`) VALUES
(2, 'Nháº¡c Vui', ''),
(3, 'CÃ  PhÃª', ''),
(4, 'Blue Nights', '');

-- --------------------------------------------------------

--
-- Table structure for table `playlist_songs`
--

CREATE TABLE `playlist_songs` (
  `id` int(11) NOT NULL,
  `songs_id` int(11) DEFAULT NULL,
  `playlists_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `singers`
--

CREATE TABLE `singers` (
  `id` int(6) NOT NULL,
  `name` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `mota` text COLLATE utf8_vietnamese_ci,
  `image` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `singers`
--

INSERT INTO `singers` (`id`, `name`, `mota`, `image`) VALUES
(7, 'Noo PhÆ°á»›c Thá»‹nh', '', 'https://i.ytimg.com/vi/9h2KYYPBExo/maxresdefault.jpg'),
(8, 'ÄÃ o BÃ¡ Lá»™c', '', 'https://image3.tienphong.vn/665x449/Uploaded/baogiay002/2017_10_01/dao_ba_l_c_2_FZIK.jpg'),
(10, 'Ngá»t Band', '', 'https://i.ytimg.com/vi/-bXuKXZNquI/maxresdefault.jpg'),
(11, 'Bá»©c TÆ°á»ng', '', 'https://www.dkn.tv/wp-content/uploads/2015/12/buc-tuong11.jpeg'),
(14, 'Selena Gomez', 'báº¡n gÃ¡i JB\r\n', ''),
(15, 'ÄÃ´ng Nhi', 'xinh ', '');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `lyrics` text COLLATE utf8_vietnamese_ci,
  `albums_id` int(11) NOT NULL,
  `singers_id` int(11) NOT NULL,
  `types_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `name`, `lyrics`, `albums_id`, `singers_id`, `types_id`) VALUES
(9, 'Em Dáº¡o NÃ y', 'em dáº¡o nÃ y cÃ³ cÃ²n qwerty', 6, 10, 1),
(10, 'Máº¯t Huyá»n', '', 7, 11, 1),
(11, 'love you like a love song', '', 2, 14, 1),
(12, 'Thanh XuÃ¢n', '', 2, 8, 1),
(13, 'Náº¿u', '', 31, 7, 1),
(14, 'QuÃªn', '', 31, 7, 1),
(15, 'Biá»‡t Ly', '', 31, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(6) NOT NULL,
  `name` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, 'Rock'),
(2, 'Rap'),
(5, 'Pop Ballade'),
(6, 'Bolero'),
(7, 'Nháº¡c Trá»¯ TÃ¬nh'),
(8, 'Nháº¡c CÃ¡ch Máº¡ng'),
(9, 'Nháº¡c VÃ ng');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `token`) VALUES
(1, 'TrinhQuang', '1', 'admin', '376baaa002e50c4c166e01a5fb4df089'),
(2, 'PhamDat', '123', 'admin', '8cd8d59fa4e5fad1dbca263bb30ff485'),
(3, 'HuynhThao', '', 'user', '9b070c821bc7b6e615fc4d8a55bd4ac1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album_details`
--
ALTER TABLE `album_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `songs_id` (`songs_id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `songs_id` (`songs_id`),
  ADD KEY `playlists_id` (`playlists_id`);

--
-- Indexes for table `singers`
--
ALTER TABLE `singers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `singers_id` (`singers_id`),
  ADD KEY `albums_id` (`albums_id`),
  ADD KEY `types_id` (`types_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `singers`
--
ALTER TABLE `singers`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album_details`
--
ALTER TABLE `album_details`
  ADD CONSTRAINT `album_details_ibfk_1` FOREIGN KEY (`songs_id`) REFERENCES `songs` (`id`);

--
-- Constraints for table `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD CONSTRAINT `playlists_id` FOREIGN KEY (`playlists_id`) REFERENCES `playlists` (`id`),
  ADD CONSTRAINT `songs_id` FOREIGN KEY (`songs_id`) REFERENCES `songs` (`id`);

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `albums_id` FOREIGN KEY (`albums_id`) REFERENCES `albums` (`id`),
  ADD CONSTRAINT `singers_id` FOREIGN KEY (`singers_id`) REFERENCES `singers` (`id`),
  ADD CONSTRAINT `types_id` FOREIGN KEY (`types_id`) REFERENCES `types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
