-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Feb 19, 2025 at 11:59 PM
-- Server version: 11.6.2-MariaDB-ubu2404
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developmentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image_url`) VALUES
(9, '/assets/images/uploads/gallery_67b66fe57e6bf.jpg'),
(10, '/assets/images/uploads/gallery_67b66feebd4e3.jpg'),
(11, '/assets/images/uploads/gallery_67b66ff436088.jpg'),
(12, '/assets/images/uploads/gallery_67b66ffcb67e0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `publish_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `publish_date`) VALUES
(3, 'Galatasaray\'s Spectacular Comeback in Europa League', 'In the Europa League Round of 16, Galatasaray achieved an incredible comeback away from home. After being down 2-0, they scored three goals in the second half to win 3-2 and advance to the quarter-finals. Icardi\'s 89th-minute winner sparked wild celebrations among the fans.', '2025-02-19 18:30:00'),
(4, 'Fenerbahce Makes Historic Transfer Move', 'Fenerbahce has reached a preliminary agreement with a Premier League midfield star for next season. The 26-year-old player, whose contract expires at the end of the season, had received offers from several European clubs. Club President Ali Koc described it as \"a revolutionary transfer for Turkish football.\"', '2025-02-18 14:15:00'),
(5, 'Record Bid for Trabzonspor\'s Young Star', 'Trabzonspor\'s 19-year-old rising star has caught the attention of European giants after his impressive performances. Italian powerhouse Juventus has reportedly made a €30 million offer for the player, which could become the highest transfer fee ever offered for a Turkish player.', '2025-02-17 09:45:00'),
(6, 'Besiktas Announces New Manager', 'Following recent disappointing results, the Black Eagles have made a change in their technical staff. The club president announced at a press conference that they have parted ways with their current manager and reached an agreement with a new coach who has achieved significant success in European competitions.', '2025-02-16 21:20:00'),
(7, 'National Team Squad Announced', 'After reaching the quarter-finals in EURO 2024, Turkey\'s new national team coach has announced the squad for the upcoming friendly matches in March. The squad features three young players receiving their first call-ups, while experienced goalkeeper Ugurcan Cakir misses out due to injury.', '2025-02-15 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `team_id` int(11) NOT NULL,
  `position` enum('goalkeeper','defender','midfielder','forward') NOT NULL,
  `nationality` varchar(250) DEFAULT NULL,
  `foot` enum('right','left') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `team_id`, `position`, `nationality`, `foot`) VALUES
(1, 'Fernando Muslera', 1, 'goalkeeper', NULL, 'right'),
(2, 'Mauro Icardi', 1, 'forward', NULL, 'right'),
(3, 'Lucas Torreira', 1, 'midfielder', NULL, 'right'),
(4, 'Davinson Sánchez', 1, 'defender', NULL, 'right'),
(5, 'Dominik Livakovic', 2, 'goalkeeper', NULL, 'right'),
(6, 'Edin Dzeko', 2, 'forward', NULL, 'right'),
(7, 'Fred', 2, 'midfielder', NULL, 'right'),
(8, 'Alexander Djiku', 2, 'defender', NULL, 'right'),
(9, 'Mert Günok', 3, 'goalkeeper', 'Turkish', 'right'),
(10, 'Cenk Tosun', 3, 'forward', 'Turkish', 'right'),
(11, 'Gedson Fernandes', 3, 'midfielder', NULL, 'right'),
(12, 'Omar Colley', 3, 'defender', NULL, 'right'),
(13, 'Uğurcan Çakır', 4, 'goalkeeper', NULL, 'right'),
(14, 'Paul Onuachu', 4, 'forward', NULL, 'right'),
(15, 'Enis Bardhi', 4, 'midfielder', NULL, 'right'),
(16, 'Stefano Denswil', 4, 'defender', NULL, 'right'),
(20, 'Mario Balotelli', 5, 'forward', 'Italy', 'right');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `points` int(11) DEFAULT 0,
  `goals_scored` int(11) DEFAULT 0,
  `goals_conceded` int(11) DEFAULT 0,
  `stadium_name` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `logo`, `name`, `points`, `goals_scored`, `goals_conceded`, `stadium_name`) VALUES
(1, NULL, 'Galatasaray', 10, 0, 5, 'Turk Telekom Arena'),
(2, NULL, 'Fenerbahçe', 18, 1, 1, 'Sukru Saracoglu Stadyumu'),
(3, NULL, 'Beşiktaş', 23, 11, 0, 'Vodafone Park'),
(4, NULL, 'Trabzonspor', 0, 0, 0, 'Papara Park'),
(5, NULL, 'Adana Demirspor', 0, 0, 0, 'Yeni Adana Stadyumu'),
(6, NULL, 'Başakşehir', 0, 0, 4, 'Başakşehir Fatih Terim Stadyumu'),
(7, NULL, 'Kasımpaşa', 0, 0, 0, 'Recep Tayyip Erdoğan Stadyumu'),
(8, NULL, 'Alanyaspor', 0, 0, 0, 'Alanya Oba Stadyumu'),
(9, NULL, 'Çaykur Rizespor', 0, 0, 0, 'Çaykur Didi Stadyumu'),
(10, NULL, 'Sivasspor', 0, 0, 0, 'Yeni 4 Eylül Stadyumu'),
(11, NULL, 'Hatayspor', 0, 0, 0, 'Mersin Stadyumu'),
(12, NULL, 'Gaziantep FK', 0, 0, 0, 'Kalyon Stadyumu'),
(13, NULL, 'Kayserispor', 0, 0, 0, 'RHG Enertürk Enerji Stadyumu'),
(14, NULL, 'MKE Ankaragücü', 0, 0, 0, 'Eryaman Stadyumu'),
(15, NULL, 'Fatih Karagümrük', 0, 0, 0, 'Atatürk Olimpiyat Stadyumu'),
(16, NULL, 'Konyaspor', 0, 0, 0, 'MEDAŞ Konya Büyükşehir Stadyumu'),
(17, NULL, 'Samsunspor', 0, 0, 0, 'Samsun Yeni 19 Mayıs Stadyumu'),
(18, NULL, 'Pendikspor', 0, 0, 2, 'Pendik Stadyumu'),
(19, NULL, 'İstanbulspor', 0, 0, 0, 'Esenyurt Necmi Kadıoğlu Stadyumu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','regular') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(3, 'admin', '$2y$12$/iArpOJU3xjMX.Bcak8mOOVLY0nwR62xf92EayReyjEIJvwqt091m', 'admin'),
(4, 'regular', '$2y$12$tIMSERFpBXdpzc9y0myQ.eVMKBLpFXMD5AIN3PLcqAMmygJyOjIlq', 'regular');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
