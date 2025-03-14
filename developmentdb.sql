-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 14, 2025 at 02:55 PM
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
(12, '/assets/images/uploads/gallery_67b66ffcb67e0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `home_team_id` int(11) NOT NULL,
  `away_team_id` int(11) NOT NULL,
  `home_team_score` int(11) DEFAULT 0,
  `away_team_score` int(11) DEFAULT 0,
  `match_date` datetime NOT NULL,
  `played` tinyint(1) DEFAULT 0
) ;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `home_team_id`, `away_team_id`, `home_team_score`, `away_team_score`, `match_date`, `played`) VALUES
(1, 1, 14, 0, 0, '2025-04-08 21:00:00', 0),
(2, 6, 18, 0, 0, '2025-04-15 21:00:00', 0),
(3, 3, 11, 0, 0, '2025-04-22 21:00:00', 0),
(4, 9, 12, 0, 0, '2025-04-29 21:00:00', 0),
(5, 3, 8, 0, 0, '2025-05-06 21:00:00', 0),
(6, 3, 15, 0, 0, '2025-05-13 21:00:00', 0),
(7, 18, 19, 0, 0, '2025-05-20 21:00:00', 0),
(8, 7, 17, 0, 0, '2025-05-27 21:00:00', 0),
(9, 4, 9, 0, 0, '2025-06-03 21:00:00', 0),
(10, 15, 16, 0, 0, '2025-06-10 21:00:00', 0),
(11, 11, 13, 0, 0, '2025-06-17 21:00:00', 0),
(12, 1, 9, 0, 0, '2025-06-24 21:00:00', 0),
(13, 6, 10, 0, 0, '2025-07-01 21:00:00', 0),
(14, 2, 9, 0, 0, '2025-07-08 21:00:00', 0),
(15, 7, 15, 0, 0, '2025-07-15 21:00:00', 0),
(16, 6, 17, 0, 0, '2025-07-22 21:00:00', 0),
(17, 8, 15, 0, 0, '2025-07-29 21:00:00', 0),
(18, 9, 17, 0, 0, '2025-08-05 21:00:00', 0),
(19, 1, 19, 0, 0, '2025-08-12 21:00:00', 0),
(20, 3, 14, 0, 0, '2025-08-19 21:00:00', 0),
(21, 2, 14, 0, 0, '2025-08-26 21:00:00', 0),
(22, 6, 16, 0, 0, '2025-09-02 21:00:00', 0),
(23, 2, 11, 0, 0, '2025-09-09 21:00:00', 0),
(24, 4, 10, 0, 0, '2025-09-16 21:00:00', 0),
(25, 8, 17, 0, 0, '2025-09-23 21:00:00', 0),
(26, 6, 7, 0, 0, '2025-09-30 21:00:00', 0),
(27, 3, 10, 0, 0, '2025-10-07 21:00:00', 0),
(28, 2, 3, 0, 0, '2025-10-14 21:00:00', 0),
(29, 2, 8, 0, 0, '2025-10-21 21:00:00', 0),
(30, 10, 19, 0, 0, '2025-10-28 21:00:00', 0),
(31, 15, 18, 0, 0, '2025-11-04 21:00:00', 0),
(32, 12, 13, 0, 0, '2025-11-11 21:00:00', 0),
(33, 2, 12, 0, 0, '2025-11-18 21:00:00', 0),
(34, 1, 2, 0, 0, '2025-11-25 21:00:00', 0),
(35, 1, 12, 0, 0, '2025-12-02 21:00:00', 0),
(36, 12, 19, 0, 0, '2025-12-09 21:00:00', 0),
(37, 9, 18, 0, 0, '2025-12-16 21:00:00', 0),
(38, 5, 6, 0, 0, '2025-12-23 21:00:00', 0),
(39, 16, 18, 0, 0, '2025-12-30 21:00:00', 0),
(40, 8, 9, 0, 0, '2026-01-06 21:00:00', 0),
(41, 6, 14, 0, 0, '2026-01-13 21:00:00', 0),
(42, 5, 12, 0, 0, '2026-01-20 21:00:00', 0),
(43, 4, 5, 0, 0, '2026-01-27 21:00:00', 0),
(44, 2, 7, 0, 0, '2026-02-03 21:00:00', 0),
(45, 14, 18, 0, 0, '2026-02-10 21:00:00', 0),
(46, 1, 3, 0, 0, '2026-02-17 21:00:00', 0),
(47, 5, 11, 0, 0, '2026-02-24 21:00:00', 0),
(48, 16, 19, 0, 0, '2026-03-03 21:00:00', 0),
(49, 1, 13, 0, 0, '2026-03-10 21:00:00', 0),
(50, 7, 14, 0, 0, '2026-03-17 21:00:00', 0),
(51, 3, 6, 0, 0, '2026-03-24 21:00:00', 0),
(52, 9, 15, 0, 0, '2026-03-31 21:00:00', 0),
(53, 1, 6, 0, 0, '2026-04-07 21:00:00', 0),
(54, 4, 12, 0, 0, '2026-04-14 21:00:00', 0),
(55, 1, 7, 0, 0, '2026-04-21 21:00:00', 0),
(56, 1, 17, 0, 0, '2026-04-28 21:00:00', 0),
(57, 5, 14, 0, 0, '2026-05-05 21:00:00', 0),
(58, 6, 12, 0, 0, '2026-05-12 21:00:00', 0),
(59, 10, 17, 0, 0, '2026-05-19 21:00:00', 0),
(60, 8, 18, 0, 0, '2026-05-26 21:00:00', 0),
(61, 12, 17, 0, 0, '2026-06-02 21:00:00', 0),
(62, 9, 16, 0, 0, '2026-06-09 21:00:00', 0),
(63, 5, 17, 0, 0, '2026-06-16 21:00:00', 0),
(64, 5, 13, 0, 0, '2026-06-23 21:00:00', 0),
(65, 4, 7, 0, 0, '2026-06-30 21:00:00', 0),
(66, 1, 18, 0, 0, '2026-07-07 21:00:00', 0),
(67, 7, 16, 0, 0, '2026-07-14 21:00:00', 0),
(68, 7, 12, 0, 0, '2026-07-21 21:00:00', 0),
(69, 15, 17, 0, 0, '2026-07-28 21:00:00', 0),
(70, 8, 10, 0, 0, '2026-08-04 21:00:00', 0),
(71, 12, 14, 0, 0, '2026-08-11 21:00:00', 0),
(72, 10, 12, 0, 0, '2026-08-18 21:00:00', 0),
(73, 6, 8, 0, 0, '2026-08-25 21:00:00', 0),
(74, 8, 16, 0, 0, '2026-09-01 21:00:00', 0),
(75, 12, 18, 0, 0, '2026-09-08 21:00:00', 0),
(76, 3, 12, 0, 0, '2026-09-15 21:00:00', 0),
(77, 2, 5, 0, 0, '2026-09-22 21:00:00', 0),
(78, 5, 9, 0, 0, '2026-09-29 21:00:00', 0),
(79, 3, 13, 0, 0, '2026-10-06 21:00:00', 0),
(80, 10, 14, 0, 0, '2026-10-13 21:00:00', 0),
(81, 3, 19, 0, 0, '2026-10-20 21:00:00', 0),
(82, 5, 16, 0, 0, '2026-10-27 21:00:00', 0),
(83, 7, 13, 0, 0, '2026-11-03 21:00:00', 0),
(84, 17, 19, 0, 0, '2026-11-10 21:00:00', 0),
(85, 13, 19, 0, 0, '2026-11-17 21:00:00', 0),
(86, 2, 13, 0, 0, '2026-11-24 21:00:00', 0),
(87, 2, 16, 0, 0, '2026-12-01 21:00:00', 0),
(88, 11, 16, 0, 0, '2026-12-08 21:00:00', 0),
(89, 12, 16, 0, 0, '2026-12-15 21:00:00', 0),
(90, 4, 17, 0, 0, '2026-12-22 21:00:00', 0),
(91, 9, 13, 0, 0, '2026-12-29 21:00:00', 0),
(92, 11, 14, 0, 0, '2027-01-05 21:00:00', 0),
(93, 13, 15, 0, 0, '2027-01-12 21:00:00', 0),
(94, 6, 15, 0, 0, '2027-01-19 21:00:00', 0),
(95, 14, 19, 0, 0, '2027-01-26 21:00:00', 0),
(96, 10, 13, 0, 0, '2027-02-02 21:00:00', 0),
(97, 8, 19, 0, 0, '2027-02-09 21:00:00', 0),
(98, 10, 11, 0, 0, '2027-02-16 21:00:00', 0),
(99, 7, 8, 0, 0, '2027-02-23 21:00:00', 0),
(100, 2, 4, 0, 0, '2027-03-02 21:00:00', 0),
(101, 4, 13, 0, 0, '2027-03-09 21:00:00', 0),
(102, 5, 8, 0, 0, '2027-03-16 21:00:00', 0),
(103, 8, 11, 0, 0, '2027-03-23 21:00:00', 0),
(104, 5, 18, 0, 0, '2027-03-30 21:00:00', 0),
(105, 13, 18, 0, 0, '2027-04-06 21:00:00', 0),
(106, 16, 17, 0, 0, '2027-04-13 21:00:00', 0),
(107, 14, 16, 0, 0, '2027-04-20 21:00:00', 0),
(108, 14, 17, 0, 0, '2027-04-27 21:00:00', 0),
(109, 3, 9, 0, 0, '2027-05-04 21:00:00', 0),
(110, 15, 19, 0, 0, '2027-05-11 21:00:00', 0),
(111, 4, 16, 0, 0, '2027-05-18 21:00:00', 0),
(112, 13, 14, 0, 0, '2027-05-25 21:00:00', 0),
(113, 11, 15, 0, 0, '2027-06-01 21:00:00', 0),
(114, 2, 18, 0, 0, '2027-06-08 21:00:00', 0),
(115, 4, 8, 0, 0, '2027-06-15 21:00:00', 0),
(116, 8, 14, 0, 0, '2027-06-22 21:00:00', 0),
(117, 10, 18, 0, 0, '2027-06-29 21:00:00', 0),
(118, 11, 18, 0, 0, '2027-07-06 21:00:00', 0),
(119, 6, 19, 0, 0, '2027-07-13 21:00:00', 0),
(120, 9, 10, 0, 0, '2027-07-20 21:00:00', 0),
(121, 8, 12, 0, 0, '2027-07-27 21:00:00', 0),
(122, 7, 10, 0, 0, '2027-08-03 21:00:00', 0),
(123, 6, 11, 0, 0, '2027-08-10 21:00:00', 0),
(124, 5, 15, 0, 0, '2027-08-17 21:00:00', 0),
(125, 2, 6, 0, 0, '2027-08-24 21:00:00', 0),
(126, 8, 13, 0, 0, '2027-08-31 21:00:00', 0),
(127, 2, 19, 0, 0, '2027-09-07 21:00:00', 0),
(128, 3, 16, 0, 0, '2027-09-14 21:00:00', 0),
(129, 5, 10, 0, 0, '2027-09-21 21:00:00', 0),
(130, 4, 19, 0, 0, '2027-09-28 21:00:00', 0),
(131, 4, 11, 0, 0, '2027-10-05 21:00:00', 0),
(132, 3, 18, 0, 0, '2027-10-12 21:00:00', 0),
(133, 12, 15, 0, 0, '2027-10-19 21:00:00', 0),
(134, 7, 18, 0, 0, '2027-10-26 21:00:00', 0),
(135, 10, 16, 0, 0, '2027-11-02 21:00:00', 0),
(136, 3, 7, 0, 0, '2027-11-09 21:00:00', 0),
(137, 5, 19, 0, 0, '2027-11-16 21:00:00', 0),
(138, 9, 14, 0, 0, '2027-11-23 21:00:00', 0),
(139, 3, 17, 0, 0, '2027-11-30 21:00:00', 0),
(140, 1, 10, 0, 0, '2027-12-07 21:00:00', 0),
(141, 9, 11, 0, 0, '2027-12-14 21:00:00', 0),
(142, 1, 5, 0, 0, '2027-12-21 21:00:00', 0),
(143, 14, 15, 0, 0, '2027-12-28 21:00:00', 0),
(144, 1, 8, 0, 0, '2028-01-04 21:00:00', 0),
(145, 11, 19, 0, 0, '2028-01-11 21:00:00', 0),
(146, 1, 16, 0, 0, '2028-01-18 21:00:00', 0),
(147, 3, 4, 0, 0, '2028-01-25 21:00:00', 0),
(148, 9, 19, 0, 0, '2028-02-01 21:00:00', 0),
(149, 4, 6, 0, 0, '2028-02-08 21:00:00', 0),
(150, 5, 7, 0, 0, '2028-02-15 21:00:00', 0),
(151, 2, 17, 0, 0, '2028-02-22 21:00:00', 0),
(152, 13, 17, 0, 0, '2028-02-29 21:00:00', 0),
(153, 11, 17, 0, 0, '2028-03-07 21:00:00', 0),
(154, 10, 15, 0, 0, '2028-03-14 21:00:00', 0),
(155, 2, 10, 0, 0, '2028-03-21 21:00:00', 0),
(156, 4, 18, 0, 0, '2028-03-28 21:00:00', 0),
(157, 4, 15, 0, 0, '2028-04-04 21:00:00', 0),
(158, 6, 13, 0, 0, '2028-04-11 21:00:00', 0),
(159, 17, 18, 0, 0, '2028-04-18 21:00:00', 0),
(160, 6, 9, 0, 0, '2028-04-25 21:00:00', 0),
(161, 7, 9, 0, 0, '2028-05-02 21:00:00', 0),
(162, 13, 16, 0, 0, '2028-05-09 21:00:00', 0),
(163, 7, 11, 0, 0, '2028-05-16 21:00:00', 0),
(164, 11, 12, 0, 0, '2028-05-23 21:00:00', 0),
(165, 7, 19, 0, 0, '2028-05-30 21:00:00', 0),
(166, 1, 11, 0, 0, '2028-06-06 21:00:00', 0),
(167, 4, 14, 0, 0, '2028-06-13 21:00:00', 0),
(168, 1, 4, 0, 0, '2028-06-20 21:00:00', 0),
(169, 1, 15, 0, 0, '2028-06-27 21:00:00', 0),
(170, 3, 5, 0, 0, '2028-07-04 21:00:00', 0),
(171, 2, 15, 0, 0, '2028-07-11 21:00:00', 0);

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
(1, NULL, 'Galatasaray', 0, 0, 0, 'Turk Telekom Arena'),
(2, NULL, 'Fenerbahçe', 0, 0, 0, 'Sukru Saracoglu Stadyumu'),
(3, NULL, 'Beşiktaş', 0, 0, 0, 'Vodafone Park'),
(4, NULL, 'Trabzonspor', 0, 0, 0, 'Papara Park'),
(5, NULL, 'Adana Demirspor', 0, 0, 0, 'Yeni Adana Stadyumu'),
(6, NULL, 'Başakşehir', 0, 0, 0, 'Başakşehir Fatih Terim Stadyumu'),
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
(18, NULL, 'Pendikspor', 0, 0, 0, 'Pendik Stadyumu'),
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
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `home_team_id` (`home_team_id`),
  ADD KEY `away_team_id` (`away_team_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`home_team_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`away_team_id`) REFERENCES `teams` (`id`);

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
