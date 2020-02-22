-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 21 fév. 2020 à 19:57
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `memory`
--
CREATE DATABASE IF NOT EXISTS `memory` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `memory`;

-- --------------------------------------------------------

--
-- Structure de la table `bestscore`
--

DROP TABLE IF EXISTS `bestscore`;
CREATE TABLE IF NOT EXISTS `bestscore` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `level` int(25) NOT NULL,
  `chronoptstotal` int(25) NOT NULL,
  `sansfauteptstotal` int(25) NOT NULL,
  `pointstotalall` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bestscore`
--

INSERT INTO `bestscore` (`Id`, `login`, `level`, `chronoptstotal`, `sansfauteptstotal`, `pointstotalall`, `id_utilisateur`) VALUES
(2, 'jacques', 2, 892, 26, 1340, 7),
(3, 'robert', 2, 0, 0, 24, 5),
(5, 'robert', 3, 0, 0, 87, 5),
(7, 'amine', 2, 79, 256, 155, 4);

-- --------------------------------------------------------

--
-- Structure de la table `besttentative`
--

DROP TABLE IF EXISTS `besttentative`;
CREATE TABLE IF NOT EXISTS `besttentative` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `nb_tentative` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `defi` varchar(25) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=193 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `besttentative`
--

INSERT INTO `besttentative` (`Id`, `login`, `nb_tentative`, `level`, `points`, `defi`, `id_utilisateur`, `date`) VALUES
(113, 'amine', 1, 5, 50, 'Sans faute', 4, NULL),
(114, 'amine', 4, 4, 10, 'Sans faute', 4, NULL),
(115, 'amine', 4, 3, 8, 'Sans faute', 4, NULL),
(118, 'jacques', 1, 3, 30, 'Sans faute', 7, NULL),
(120, 'jacques', 1, 3, 30, 'Sans faute', 7, NULL),
(121, 'jacques', 1, 3, 30, 'Sans faute', 7, NULL),
(112, 'amine', 1, 4, 40, 'Sans faute', 4, NULL),
(111, 'amine', 1, 3, 30, 'Sans faute', 4, NULL),
(109, 'amine', 1, 3, 30, 'Sans faute', 4, NULL),
(117, 'jacques', 3, 3, 10, 'Sans faute', 7, NULL),
(107, 'amine', 1, 3, 30, 'Sans faute', 4, NULL),
(106, 'amine', 1, 3, 30, 'Sans faute', 4, NULL),
(105, 'amine', 1, 3, 30, 'Sans faute', 4, NULL),
(104, 'amine', 1, 3, 30, 'Sans faute', 4, NULL),
(103, 'amine', 1, 2, 20, 'Sans faute', 4, NULL),
(102, 'amine', 1, 1, 10, 'Sans faute', 4, NULL),
(101, 'amine', 1, 3, 30, 'Sans faute', 4, NULL),
(122, 'eti', 10, 3, 3, 'Sans faute', 13, '2020-02-18 17:23:16'),
(123, 'eti', 10, 3, 3, 'Sans faute', 13, '2020-02-18 17:23:16'),
(124, 'eti', 10, 3, 3, 'Sans faute', 13, '2020-02-18 17:23:40'),
(125, 'eti', 10, 3, 3, 'Sans faute', 13, '2020-02-18 21:15:14'),
(126, 'eti', 2, 1, 5, 'Sans faute', 13, '2020-02-19 19:05:08'),
(127, 'eti', 2, 1, 5, 'Sans faute', 13, '2020-02-19 19:05:08'),
(128, 'eti', 2, 1, 5, 'Sans faute', 13, '2020-02-19 19:06:48'),
(129, 'eti', 3, 1, 3, 'Sans faute', 13, '2020-02-19 19:18:50'),
(130, 'eti', 3, 1, 3, 'Sans faute', 13, '2020-02-19 19:18:50'),
(131, 'eti', 3, 1, 3, 'Sans faute', 13, '2020-02-19 19:29:30'),
(132, 'eti', 4, 1, 3, 'Sans faute', 13, '2020-02-19 19:30:49'),
(133, 'eti', 4, 1, 3, 'Sans faute', 13, '2020-02-19 19:30:49'),
(134, 'eti', 4, 1, 3, 'Sans faute', 13, '2020-02-19 19:30:59'),
(135, 'eti', 3, 1, 3, 'Sans faute', 13, '2020-02-19 22:28:38'),
(136, 'eti', 3, 1, 3, 'Sans faute', 13, '2020-02-19 22:28:38'),
(137, 'eti', 3, 1, 3, 'Sans faute', 13, '2020-02-19 22:29:35'),
(138, 'eti', 4, 1, 3, 'Sans faute', 13, '2020-02-19 22:30:02'),
(139, 'eti', 4, 1, 3, 'Sans faute', 13, '2020-02-19 22:30:02'),
(140, 'eti', 4, 1, 3, 'Sans faute', 13, '2020-02-19 22:33:48'),
(141, 'eti', 2, 1, 5, 'Sans faute', 13, '2020-02-19 22:34:11'),
(142, 'eti', 2, 1, 5, 'Sans faute', 13, '2020-02-19 22:34:11'),
(143, 'eti', 2, 1, 5, 'Sans faute', 13, '2020-02-19 22:39:40'),
(144, 'eti', 5, 1, 2, 'Sans faute', 13, '2020-02-19 22:40:06'),
(145, 'eti', 5, 1, 2, 'Sans faute', 13, '2020-02-19 22:40:06'),
(146, 'eti', 5, 1, 2, 'Sans faute', 13, '2020-02-19 22:48:21'),
(147, 'eti', 4, 1, 3, 'Sans faute', 13, '2020-02-19 23:10:38'),
(148, 'eti', 4, 1, 3, 'Sans faute', 13, '2020-02-19 23:10:38'),
(149, 'eti', 4, 1, 3, 'Sans faute', 13, '2020-02-19 23:11:19'),
(150, 'eti', 4, 1, 3, 'Sans faute', 13, '2020-02-19 23:11:58'),
(151, 'eti', 4, 1, 3, 'Sans faute', 13, '2020-02-19 23:16:24'),
(152, 'eti', 4, 1, 3, 'Sans faute', 13, '2020-02-19 23:27:41'),
(153, 'eti', 4, 1, 3, 'Sans faute', 13, '2020-02-19 23:27:41'),
(154, 'eti', 4, 1, 3, 'Sans faute', 13, '2020-02-19 23:31:10'),
(155, 'eti', 2, 1, 5, 'Sans faute', 13, '2020-02-19 23:31:28'),
(156, 'eti', 2, 1, 5, 'Sans faute', 13, '2020-02-19 23:31:28'),
(157, 'eti', 2, 1, 5, 'Sans faute', 13, '2020-02-19 23:34:33'),
(158, 'eti', 3, 1, 3, 'Sans faute', 13, '2020-02-19 23:42:59'),
(159, 'eti', 3, 1, 3, 'Sans faute', 13, '2020-02-19 23:42:59'),
(160, 'eti', 3, 1, 3, 'Sans faute', 13, '2020-02-19 23:48:14'),
(161, 'eti', 2, 1, 5, 'Sans faute', 13, '2020-02-19 23:48:29'),
(162, 'eti', 2, 1, 5, 'Sans faute', 13, '2020-02-19 23:48:30'),
(163, 'eti', 2, 1, 5, 'Sans faute', 13, '2020-02-19 23:50:49'),
(164, 'eti', 5, 1, 2, 'Sans faute', 13, '2020-02-19 23:51:13'),
(165, 'eti', 5, 1, 2, 'Sans faute', 13, '2020-02-19 23:51:13'),
(166, 'eti', 5, 1, 2, 'Sans faute', 13, '2020-02-19 23:51:45'),
(167, 'eti', 2, 1, 5, 'Sans faute', 13, '2020-02-19 23:52:01'),
(168, 'eti', 2, 1, 5, 'Sans faute', 13, '2020-02-19 23:52:01'),
(169, 'eti', 2, 1, 5, 'Sans faute', 13, '2020-02-19 23:53:19'),
(170, 'eti', 1, 1, 10, 'Sans faute', 13, '2020-02-19 23:53:31'),
(171, 'eti', 1, 1, 10, 'Sans faute', 13, '2020-02-19 23:53:31'),
(172, 'eti', 1, 1, 10, 'Sans faute', 13, '2020-02-19 23:54:26'),
(173, 'eti', 3, 1, 3, 'Sans faute', 13, '2020-02-20 00:21:54'),
(174, 'eti', 3, 1, 3, 'Sans faute', 13, '2020-02-20 00:21:54'),
(175, 'eti', 3, 1, 3, 'Sans faute', 13, '2020-02-20 01:33:59'),
(176, 'eti', 4, 1, 3, 'Sans faute', 13, '2020-02-20 02:28:49'),
(177, 'eti', 1, 1, 10, 'Sans faute', 13, '2020-02-20 03:06:54'),
(178, 'eti', 1, 1, 10, 'Sans faute', 13, '2020-02-20 03:08:27'),
(179, 'eti', 2, 1, 5, 'Sans faute', 13, '2020-02-20 03:09:02'),
(180, 'eti', 1, 1, 10, 'Sans faute', 13, '2020-02-20 03:09:58'),
(181, 'eti', 3, 1, 3, 'Sans faute', 13, '2020-02-20 03:10:38'),
(182, 'fini?', 2, 1, 5, 'Sans faute', 19, '2020-02-20 14:25:30'),
(183, 'fini?', 4, 1, 3, 'Sans faute', 19, '2020-02-20 14:29:18'),
(184, 'fini?', 2, 1, 5, 'Sans faute', 19, '2020-02-20 14:36:32'),
(185, 'fini?', 3, 1, 3, 'Sans faute', 19, '2020-02-20 14:36:49'),
(186, 'fini?', 2, 1, 5, 'Sans faute', 19, '2020-02-20 15:08:14'),
(187, 'zz', 2, 1, 5, 'Sans faute', 20, '2020-02-21 12:43:18'),
(188, 'zz', 1, 1, 10, 'Sans faute', 20, '2020-02-21 12:44:10'),
(189, 'zz', 2, 1, 5, 'Sans faute', 20, '2020-02-21 12:45:36'),
(190, 'zz', 4, 1, 3, 'Sans faute', 20, '2020-02-21 12:58:40'),
(191, 'zz', 1, 1, 10, 'Sans faute', 20, '2020-02-21 13:14:58'),
(192, 'zz', 5, 2, 4, 'Sans faute', 20, '2020-02-21 20:54:04');

-- --------------------------------------------------------

--
-- Structure de la table `besttime`
--

DROP TABLE IF EXISTS `besttime`;
CREATE TABLE IF NOT EXISTS `besttime` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `temps` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `points` double NOT NULL,
  `defi` varchar(25) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=822 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `besttime`
--

INSERT INTO `besttime` (`Id`, `login`, `temps`, `level`, `points`, `defi`, `id_utilisateur`, `date`) VALUES
(544, 'jacques', 20, 3, 1.5, 'Chrono', 7, NULL),
(550, 'jacques', 10, 3, 3, 'Chrono', 7, NULL),
(549, 'amine', 2, 4, 20, 'Chrono', 4, NULL),
(608, 'jacques', 19, 1, 0.5, 'Chrono', 7, NULL),
(547, 'amine', 11, 3, 2.7272, 'Chrono', 4, NULL),
(546, 'amine', 11, 1, 0.9, 'Chrono', 4, NULL),
(609, 'jacques', 19, 5, 0.5, 'Chrono', 7, NULL),
(611, 'thierry', 37, 1, 0.3, 'Chrono', 11, NULL),
(621, 'nico', 34, 2, 0.6, 'Chrono', 12, '2020-02-18 10:16:36'),
(622, 'nico', 34, 2, 0.6, 'Chrono', 12, '2020-02-18 10:16:36'),
(623, 'nico', 89, 2, 0.2, 'Chrono', 12, '2020-02-18 10:17:31'),
(624, 'nico', 92, 2, 0.2, 'Chrono', 12, '2020-02-18 10:17:34'),
(625, 'nico', 96, 2, 0.2, 'Chrono', 12, '2020-02-18 10:17:38'),
(626, 'nico', 26, 2, 0.8, 'Chrono', 12, '2020-02-18 10:18:04'),
(627, 'nico', 26, 2, 0.8, 'Chrono', 12, '2020-02-18 10:18:04'),
(634, 'eti', 13, 1, 0.8, 'Chrono', 13, '2020-02-18 13:19:43'),
(635, 'eti', 13, 1, 0.8, 'Chrono', 13, '2020-02-18 13:19:43'),
(636, 'amine', 11, 1, 0.9, 'Chrono', 4, NULL),
(639, 'eti', 12, 1, 0.8, 'Chrono', 13, '2020-02-18 15:44:13'),
(640, 'eti', 12, 1, 0.8, 'Chrono', 13, '2020-02-18 15:44:13'),
(643, 'eti', 1936, 1, 0, 'Chrono', 13, '2020-02-19 18:47:08'),
(644, 'eti', 1941, 1, 0, 'Chrono', 13, '2020-02-19 18:47:13'),
(645, 'eti', 305, 1, 0, 'Chrono', 13, '2020-02-19 18:52:39'),
(646, 'eti', 310, 1, 0, 'Chrono', 13, '2020-02-19 18:52:44'),
(647, 'eti', 31, 1, 0.3, 'Chrono', 13, '2020-02-19 18:53:15'),
(648, 'eti', 31, 1, 0.3, 'Chrono', 13, '2020-02-19 18:53:15'),
(649, 'eti', 715, 1, 0, 'Chrono', 13, '2020-02-19 19:04:39'),
(650, 'eti', 724, 1, 0, 'Chrono', 13, '2020-02-19 19:04:48'),
(651, 'eti', 591, 1, 0, 'Chrono', 13, '2020-02-19 19:16:48'),
(652, 'eti', 600, 1, 0, 'Chrono', 13, '2020-02-19 19:16:57'),
(653, 'eti', 17, 1, 0.6, 'Chrono', 13, '2020-02-19 19:17:33'),
(654, 'eti', 17, 1, 0.6, 'Chrono', 13, '2020-02-19 19:17:33'),
(655, 'eti', 61, 1, 0.2, 'Chrono', 13, '2020-02-19 19:18:17'),
(656, 'eti', 1574, 1, 0, 'Chrono', 13, '2020-02-19 20:40:57'),
(657, 'eti', 1584, 1, 0, 'Chrono', 13, '2020-02-19 20:41:07'),
(658, 'eti', 26, 1, 0.4, 'Chrono', 13, '2020-02-19 20:41:36'),
(659, 'eti', 26, 1, 0.4, 'Chrono', 13, '2020-02-19 20:41:36'),
(660, 'eti', 32, 1, 0.3, 'Chrono', 13, '2020-02-19 20:41:42'),
(661, 'eti', 33, 1, 0.3, 'Chrono', 13, '2020-02-19 20:41:43'),
(662, 'eti', 36, 1, 0.3, 'Chrono', 13, '2020-02-19 20:41:46'),
(663, 'eti', 39, 1, 0.3, 'Chrono', 13, '2020-02-19 20:41:49'),
(664, 'eti', 1312, 1, 0, 'Chrono', 13, '2020-02-19 21:03:02'),
(665, 'eti', 19, 1, 0.5, 'Chrono', 13, '2020-02-19 21:03:21'),
(666, 'eti', 19, 1, 0.5, 'Chrono', 13, '2020-02-19 21:03:21'),
(667, 'eti', 473, 1, 0, 'Chrono', 13, '2020-02-19 21:10:55'),
(668, 'eti', 482, 1, 0, 'Chrono', 13, '2020-02-19 21:11:04'),
(669, 'eti', 484, 1, 0, 'Chrono', 13, '2020-02-19 21:11:06'),
(670, 'eti', 486, 1, 0, 'Chrono', 13, '2020-02-19 21:11:08'),
(671, 'eti', 488, 1, 0, 'Chrono', 13, '2020-02-19 21:11:10'),
(672, 'eti', 489, 1, 0, 'Chrono', 13, '2020-02-19 21:11:11'),
(673, 'eti', 490, 1, 0, 'Chrono', 13, '2020-02-19 21:11:12'),
(674, 'eti', 491, 1, 0, 'Chrono', 13, '2020-02-19 21:11:13'),
(675, 'eti', 493, 1, 0, 'Chrono', 13, '2020-02-19 21:11:15'),
(676, 'eti', 499, 1, 0, 'Chrono', 13, '2020-02-19 21:11:21'),
(677, 'eti', 945, 1, 0, 'Chrono', 13, '2020-02-19 21:18:47'),
(678, 'eti', 948, 1, 0, 'Chrono', 13, '2020-02-19 21:18:50'),
(679, 'eti', 955, 1, 0, 'Chrono', 13, '2020-02-19 21:18:57'),
(680, 'eti', 36, 1, 0.3, 'Chrono', 13, '2020-02-19 21:20:10'),
(681, 'eti', 36, 1, 0.3, 'Chrono', 13, '2020-02-19 21:20:10'),
(682, 'eti', 44, 1, 0.2, 'Chrono', 13, '2020-02-19 21:20:18'),
(683, 'eti', 46, 1, 0.2, 'Chrono', 13, '2020-02-19 21:20:20'),
(684, 'eti', 47, 1, 0.2, 'Chrono', 13, '2020-02-19 21:20:21'),
(685, 'eti', 48, 1, 0.2, 'Chrono', 13, '2020-02-19 21:20:22'),
(686, 'eti', 50, 1, 0.2, 'Chrono', 13, '2020-02-19 21:20:24'),
(687, 'eti', 54, 1, 0.2, 'Chrono', 13, '2020-02-19 21:20:28'),
(688, 'eti', 59, 1, 0.2, 'Chrono', 13, '2020-02-19 21:20:33'),
(689, 'eti', 155, 1, 0.1, 'Chrono', 13, '2020-02-19 21:22:09'),
(690, 'eti', 18, 1, 0.6, 'Chrono', 13, '2020-02-19 21:22:27'),
(691, 'eti', 18, 1, 0.6, 'Chrono', 13, '2020-02-19 21:22:27'),
(692, 'eti', 98, 1, 0.1, 'Chrono', 13, '2020-02-19 21:23:47'),
(693, 'eti', 16, 1, 0.6, 'Chrono', 13, '2020-02-19 21:24:53'),
(694, 'eti', 16, 1, 0.6, 'Chrono', 13, '2020-02-19 21:24:53'),
(695, 'eti', 263, 1, 0, 'Chrono', 13, '2020-02-19 21:29:00'),
(696, 'eti', 16, 1, 0.6, 'Chrono', 13, '2020-02-19 21:29:16'),
(697, 'eti', 16, 1, 0.6, 'Chrono', 13, '2020-02-19 21:29:16'),
(698, 'eti', 30, 1, 0.3, 'Chrono', 13, '2020-02-19 21:29:30'),
(699, 'eti', 276, 1, 0, 'Chrono', 13, '2020-02-19 21:33:36'),
(700, 'eti', 32, 1, 0.3, 'Chrono', 13, '2020-02-19 21:34:08'),
(701, 'eti', 32, 1, 0.3, 'Chrono', 13, '2020-02-19 21:34:08'),
(702, 'eti', 129, 1, 0.1, 'Chrono', 13, '2020-02-19 21:35:45'),
(703, 'eti', 131, 1, 0.1, 'Chrono', 13, '2020-02-19 21:35:47'),
(704, 'eti', 133, 1, 0.1, 'Chrono', 13, '2020-02-19 21:35:49'),
(705, 'eti', 201, 1, 0, 'Chrono', 13, '2020-02-19 21:36:57'),
(706, 'eti', 18, 1, 0.6, 'Chrono', 13, '2020-02-19 21:37:15'),
(707, 'eti', 18, 1, 0.6, 'Chrono', 13, '2020-02-19 21:37:15'),
(708, 'eti', 506, 1, 0, 'Chrono', 13, '2020-02-19 21:45:23'),
(709, 'eti', 509, 1, 0, 'Chrono', 13, '2020-02-19 21:45:26'),
(710, 'eti', 60, 1, 0.2, 'Chrono', 13, '2020-02-19 21:46:26'),
(711, 'eti', 60, 1, 0.2, 'Chrono', 13, '2020-02-19 21:46:26'),
(712, 'eti', 166, 1, 0.1, 'Chrono', 13, '2020-02-19 21:48:12'),
(713, 'eti', 35, 1, 0.3, 'Chrono', 13, '2020-02-19 21:49:33'),
(714, 'eti', 35, 1, 0.3, 'Chrono', 13, '2020-02-19 21:49:33'),
(715, 'eti', 57, 1, 0.2, 'Chrono', 13, '2020-02-19 21:49:55'),
(716, 'eti', 15, 1, 0.7, 'Chrono', 13, '2020-02-19 21:50:10'),
(717, 'eti', 15, 1, 0.7, 'Chrono', 13, '2020-02-19 21:50:10'),
(718, 'eti', 50, 1, 0.2, 'Chrono', 13, '2020-02-19 21:50:45'),
(719, 'eti', 30, 1, 0.3, 'Chrono', 13, '2020-02-19 21:51:15'),
(720, 'eti', 30, 1, 0.3, 'Chrono', 13, '2020-02-19 21:51:15'),
(721, 'eti', 17, 1, 0.6, 'Chrono', 13, '2020-02-19 22:05:03'),
(722, 'eti', 17, 1, 0.6, 'Chrono', 13, '2020-02-19 22:05:03'),
(723, 'eti', 1391, 1, 0, 'Chrono', 13, '2020-02-19 22:27:57'),
(724, 'eti', 68, 1, 0.1, 'Chrono', 13, '2020-02-19 23:00:18'),
(725, 'eti', 68, 1, 0.1, 'Chrono', 13, '2020-02-19 23:00:18'),
(726, 'eti', 201, 1, 0, 'Chrono', 13, '2020-02-19 23:02:31'),
(727, 'eti', 25, 1, 0.4, 'Chrono', 13, '2020-02-19 23:25:19'),
(728, 'eti', 25, 1, 0.4, 'Chrono', 13, '2020-02-19 23:25:19'),
(729, 'eti', 139, 1, 0.1, 'Chrono', 13, '2020-02-19 23:27:13'),
(730, 'eti', 103, 1, 0.1, 'Chrono', 13, '2020-02-20 00:12:58'),
(731, 'eti', 207, 1, 0, 'Chrono', 13, '2020-02-20 00:14:42'),
(732, 'eti', 263, 1, 0, 'Chrono', 13, '2020-02-20 00:15:38'),
(733, 'eti', 292, 1, 0, 'Chrono', 13, '2020-02-20 00:16:07'),
(734, 'eti', 521, 1, 0, 'Chrono', 13, '2020-02-20 00:19:56'),
(735, 'eti', 24, 1, 0.4, 'Chrono', 13, '2020-02-20 01:39:26'),
(736, 'eti', 24, 1, 0.4, 'Chrono', 13, '2020-02-20 01:39:26'),
(737, 'eti', 158, 1, 0.1, 'Chrono', 13, '2020-02-20 01:41:40'),
(738, 'eti', 91, 1, 0.1, 'Chrono', 13, '2020-02-20 01:43:11'),
(739, 'eti', 91, 1, 0.1, 'Chrono', 13, '2020-02-20 01:43:11'),
(740, 'eti', 109, 1, 0.1, 'Chrono', 13, '2020-02-20 01:43:29'),
(741, 'eti', 36, 1, 0.3, 'Chrono', 13, '2020-02-20 01:45:12'),
(742, 'eti', 36, 1, 0.3, 'Chrono', 13, '2020-02-20 01:45:12'),
(743, 'eti', 66, 1, 0.2, 'Chrono', 13, '2020-02-20 01:45:42'),
(744, 'eti', 18, 1, 0.6, 'Chrono', 13, '2020-02-20 01:46:00'),
(745, 'eti', 18, 1, 0.6, 'Chrono', 13, '2020-02-20 01:46:00'),
(746, 'eti', 20, 1, 0.5, 'Chrono', 13, '2020-02-20 01:46:02'),
(747, 'eti', 20, 1, 0.5, 'Chrono', 13, '2020-02-20 01:46:02'),
(748, 'eti', 140, 1, 0.1, 'Chrono', 13, '2020-02-20 01:48:02'),
(749, 'eti', 1049, 1, 0, 'Chrono', 13, '2020-02-20 02:03:11'),
(750, 'eti', 33, 1, 0.3, 'Chrono', 13, '2020-02-20 02:03:50'),
(751, 'eti', 33, 1, 0.3, 'Chrono', 13, '2020-02-20 02:03:50'),
(752, 'eti', 219, 1, 0, 'Chrono', 13, '2020-02-20 02:06:56'),
(753, 'eti', 224, 1, 0, 'Chrono', 13, '2020-02-20 02:07:01'),
(754, 'eti', 226, 1, 0, 'Chrono', 13, '2020-02-20 02:07:03'),
(755, 'eti', 227, 1, 0, 'Chrono', 13, '2020-02-20 02:07:04'),
(756, 'eti', 230, 1, 0, 'Chrono', 13, '2020-02-20 02:07:07'),
(757, 'eti', 464, 1, 0, 'Chrono', 13, '2020-02-20 02:11:01'),
(758, 'eti', 22, 1, 0.5, 'Chrono', 13, '2020-02-20 02:11:23'),
(759, 'eti', 22, 1, 0.5, 'Chrono', 13, '2020-02-20 02:11:23'),
(760, 'eti', 157, 1, 0.1, 'Chrono', 13, '2020-02-20 02:13:38'),
(761, 'eti', 160, 1, 0.1, 'Chrono', 13, '2020-02-20 02:13:41'),
(762, 'eti', 13, 1, 0.8, 'Chrono', 13, '2020-02-20 02:13:54'),
(763, 'eti', 13, 1, 0.8, 'Chrono', 13, '2020-02-20 02:13:54'),
(764, 'eti', 71, 1, 0.1, 'Chrono', 13, '2020-02-20 02:14:52'),
(765, 'eti', 14, 1, 0.7, 'Chrono', 13, '2020-02-20 02:15:12'),
(766, 'eti', 15, 1, 0.7, 'Chrono', 13, '2020-02-20 02:15:13'),
(767, 'eti', 244, 1, 0, 'Chrono', 13, '2020-02-20 02:19:02'),
(768, 'eti', 35, 1, 0.3, 'Chrono', 13, '2020-02-20 02:20:42'),
(769, 'eti', 35, 1, 0.3, 'Chrono', 13, '2020-02-20 02:20:42'),
(770, 'eti', 106, 1, 0.1, 'Chrono', 13, '2020-02-20 02:24:51'),
(771, 'eti', 29, 1, 0.3, 'Chrono', 13, '2020-02-20 02:25:31'),
(772, 'eti', 20, 1, 0.5, 'Chrono', 13, '2020-02-20 02:53:55'),
(773, 'eti', 9, 1, 1.1, 'Chrono', 13, '2020-02-20 03:28:46'),
(774, 't', 11, 1, 0.9, 'Chrono', 14, '2020-02-20 03:42:37'),
(775, 'pp', 22, 1, 0.5, 'Chrono', 15, '2020-02-20 03:45:31'),
(776, 'O', 205, 1, 0, 'Chrono', 16, '2020-02-20 03:55:40'),
(777, 'O', 75, 1, 0.1, 'Chrono', 16, '2020-02-20 04:09:56'),
(778, 'O', 1493, 1, 0, 'Chrono', 16, '2020-02-20 04:35:26'),
(779, 'hello', 37, 1, 0.3, 'Chrono', 17, '2020-02-20 07:18:48'),
(780, 'hello', 518, 1, 0, 'Chrono', 17, '2020-02-20 08:06:57'),
(781, 'hello', 259, 1, 0, 'Chrono', 17, '2020-02-20 08:38:21'),
(782, 'hello', 24, 1, 0.4, 'Chrono', 17, '2020-02-20 08:40:09'),
(783, 'hello', 96, 1, 0.1, 'Chrono', 17, '2020-02-20 09:00:09'),
(784, 'hello', 32, 1, 0.3, 'Chrono', 17, '2020-02-20 10:05:33'),
(785, 'hello', 12, 1, 0.8, 'Chrono', 17, '2020-02-20 10:37:45'),
(786, 'aaa', 24, 1, 0.4, 'Chrono', 18, '2020-02-20 11:28:40'),
(787, 'fini?', 8, 1, 1.3, 'Chrono', 19, '2020-02-20 13:52:58'),
(788, 'fini?', 22, 1, 0.5, 'Chrono', 19, '2020-02-20 13:53:53'),
(789, 'fini?', 34, 2, 0.6, 'Chrono', 19, '2020-02-20 14:38:43'),
(790, 'fini?', 7, 1, 1.4, 'Chrono', 19, '2020-02-20 14:43:22'),
(791, 'fini?', 11, 1, 0.9, 'Chrono', 19, '2020-02-20 14:52:16'),
(792, 'fini?', 10, 1, 1, 'Chrono', 19, '2020-02-20 14:59:44'),
(793, 'fini?', 15, 1, 0.7, 'Chrono', 19, '2020-02-20 15:37:47'),
(794, 'fini?', 33, 1, 0.3, 'Chrono', 19, '2020-02-20 16:15:49'),
(795, 'fini?', 782, 1, 0, 'Chrono', 19, '2020-02-20 16:36:21'),
(796, 'fini?', 158, 1, 0.1, 'Chrono', 19, '2020-02-20 17:07:49'),
(797, 'fini?', 9, 1, 1.1, 'Chrono', 19, '2020-02-20 17:12:45'),
(798, 'fini?', 85, 1, 0.1, 'Chrono', 19, '2020-02-20 17:18:13'),
(799, 'fini?', 14, 1, 0.7, 'Chrono', 19, '2020-02-20 17:21:56'),
(800, 'fini?', 338, 1, 0, 'Chrono', 19, '2020-02-20 17:48:23'),
(801, 'fini?', 995, 1, 0, 'Chrono', 19, '2020-02-20 18:30:32'),
(802, 'fini?', 9, 1, 1.1, 'Chrono', 19, '2020-02-20 18:35:12'),
(803, 'fini?', 11, 1, 0.9, 'Chrono', 19, '2020-02-20 21:36:37'),
(804, 'fini?', 10, 1, 1, 'Chrono', 19, '2020-02-20 21:37:23'),
(805, 'fini?', 20, 1, 0.5, 'Chrono', 19, '2020-02-20 23:37:27'),
(806, 'fini?', 9, 1, 1.1, 'Chrono', 19, '2020-02-20 23:47:49'),
(807, 'fini?', 7, 1, 1.4, 'Chrono', 19, '2020-02-20 23:48:47'),
(808, 'zz', 15, 1, 0.7, 'Chrono', 20, '2020-02-21 12:30:07'),
(809, 'zz', 16, 1, 0.6, 'Chrono', 20, '2020-02-21 12:39:13'),
(810, 'zz', 10, 1, 1, 'Chrono', 20, '2020-02-21 12:39:33'),
(811, 'zz', 11, 1, 0.9, 'Chrono', 20, '2020-02-21 15:28:41'),
(812, 'zz', 429, 1, 0, 'Chrono', 20, '2020-02-21 15:35:59'),
(813, 'zz', 13, 1, 0.8, 'Chrono', 20, '2020-02-21 15:41:27'),
(814, 'zz', 79, 5, 0.6, 'Chrono', 20, '2020-02-21 15:46:26'),
(815, 'zz', 552, 5, 0.1, 'Chrono', 20, '2020-02-21 16:12:01'),
(816, 'zz', 12, 1, 0.8, 'Chrono', 20, '2020-02-21 16:30:56'),
(817, 'zz', 21, 1, 0.5, 'Chrono', 20, '2020-02-21 16:31:41'),
(818, 'zz', 8, 1, 1.3, 'Chrono', 20, '2020-02-21 17:07:42'),
(819, 'zz', 45, 1, 0.2, 'Chrono', 20, '2020-02-21 17:10:00'),
(820, 'zz', 7, 1, 1.4, 'Chrono', 20, '2020-02-21 17:11:38'),
(821, 'zz', 22, 1, 0.5, 'Chrono', 20, '2020-02-21 20:55:15');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(5, 'robert', 'Chemin'),
(4, 'amine', '123'),
(6, 'jaja', 'jaja'),
(7, 'jacques', 'jaja'),
(8, 'rarara', 'rara'),
(9, 'paul', 'popo'),
(10, 'charles', 'chacha'),
(11, 'thierry', 'totototo'),
(12, 'nico', 'cami'),
(13, 'eti', 'e'),
(14, 't', '8518a7f740ae4dc732b828de52e6bbdd1d6213aceb9485cb6f3031db9cfb0dfc'),
(15, 'pp', '81a7a1ddae8e5826f775c565661d6968a6c604d957bf642dda071df848ea00db'),
(16, 'O', 'a567f5e4c7eae9d67423af11f51fd1bafc31d84e37c964d6d345ecdaba1824eb'),
(17, 'hello', '43f2aaac7105a740963bc3f59575fce8b56b333b59c1035e08cf9aa426ee83fc'),
(18, 'aaa', '97affcb2edc02676282c8f5c2b301541596f7f930cbc368c8b6878f3861dac72'),
(19, 'fini?', '97affcb2edc02676282c8f5c2b301541596f7f930cbc368c8b6878f3861dac72'),
(20, 'zz', '83669d3e316b43ce4e7303947503f8f48550d5b1ea0d49c35a1bc64d42116af1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
