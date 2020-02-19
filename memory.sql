-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 19 fév. 2020 à 16:06
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
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

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
(125, 'eti', 10, 3, 3, 'Sans faute', 13, '2020-02-18 21:15:14');

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
) ENGINE=MyISAM AUTO_INCREMENT=643 DEFAULT CHARSET=latin1;

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
(640, 'eti', 12, 1, 0.8, 'Chrono', 13, '2020-02-18 15:44:13');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

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
(13, 'eti', 'e');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
