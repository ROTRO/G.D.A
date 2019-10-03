-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 03, 2019 at 08:43 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gda`
--

-- --------------------------------------------------------

--
-- Table structure for table `accident`
--

DROP TABLE IF EXISTS `accident`;
CREATE TABLE IF NOT EXISTS `accident` (
  `Fiche` int(11) NOT NULL,
  `Mat_emp` int(11) NOT NULL,
  `Dat_AC` date NOT NULL,
  `Accident_Travail` varchar(80) NOT NULL,
  `Tryptique` varchar(80) NOT NULL,
  `Heure_AC` time NOT NULL,
  `Temp_AC_reel` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Evalue` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Fiche` (`Fiche`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accident`
--

INSERT INTO `accident` (`Fiche`, `Mat_emp`, `Dat_AC`, `Accident_Travail`, `Tryptique`, `Heure_AC`, `Temp_AC_reel`, `id`, `Evalue`) VALUES
(17, 1, '2019-01-24', 'de_Trajet', 'OUI', '01:14:00', '2019-09-30 08:06:57', 17, 1),
(16, 2, '2000-01-24', 'Accident_de_Travail', 'NON', '10:10:00', '2019-09-29 23:01:32', 16, 0),
(6, 1, '2019-02-27', 'de_Trajet', 'OUI', '10:10:00', '2019-09-23 13:24:38', 6, 1),
(14, 2, '2000-01-24', 'Accident_de_Travail', 'NON', '10:10:00', '2019-09-28 00:31:38', 14, 0),
(11, 1, '2000-01-24', 'de_Trajet', 'NON', '10:10:00', '2019-09-27 01:00:41', 11, 1),
(12, 2, '2000-07-23', 'de_Trajet', 'NON', '01:14:00', '2019-09-27 18:33:42', 12, 0),
(13, 2, '2000-12-26', 'Accident_de_Travail', 'NON', '10:10:00', '2019-09-27 19:14:48', 13, 1),
(15, 1, '2000-01-24', 'Accident_de_Travail', 'OUI', '10:10:00', '2019-09-29 22:47:35', 15, 0),
(18, 1, '2000-01-24', 'Accident_de_Travail', 'OUI', '10:10:00', '2019-09-30 08:30:22', 18, 0),
(19, 1, '2000-01-24', 'Accident_de_Travail', 'OUI', '10:10:00', '2019-10-03 08:57:26', 19, 0);

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Matricule` int(11) NOT NULL,
  `MDP` varchar(32) NOT NULL,
  `Nom` varchar(80) NOT NULL,
  `Prenom` varchar(80) NOT NULL,
  `Level` int(11) NOT NULL,
  `Active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `Matricule`, `MDP`, `Nom`, `Prenom`, `Level`, `Active`) VALUES
(2, 987654, '987654', 'Hamed', 'Bouzidi', 1, 1),
(1, 51531353, '51531353', 'Bilel', 'Hedhli', 3, 1),
(4, 147258, '123456', 'skander', 'Cristo', 3, 1),
(5, 123, '123', 'Ahmed', 'Badi', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ac_service_md`
--

DROP TABLE IF EXISTS `ac_service_md`;
CREATE TABLE IF NOT EXISTS `ac_service_md` (
  `Fiche` int(11) DEFAULT NULL,
  `Nat_sieg` varchar(8000) DEFAULT NULL,
  `de` date DEFAULT NULL,
  `a` date DEFAULT NULL,
  UNIQUE KEY `Fiche` (`Fiche`),
  UNIQUE KEY `Fiche_2` (`Fiche`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_service_md`
--

INSERT INTO `ac_service_md` (`Fiche`, `Nat_sieg`, `de`, `a`) VALUES
(11, 'mmm', '2019-01-01', '2024-03-02'),
(6, 'TESTTTTT', '2019-09-18', '2019-09-26'),
(13, 'dma;lms;kmnascklml', '2022-01-01', '2019-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `Matricule` int(11) NOT NULL,
  `Nom` varchar(80) NOT NULL,
  `Prenom` varchar(80) NOT NULL,
  `Age` int(11) NOT NULL,
  `Fonction` varchar(80) NOT NULL,
  `Adresse` varchar(80) NOT NULL,
  `Dat_em` date NOT NULL,
  `Code_Social` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`Matricule`, `Nom`, `Prenom`, `Age`, `Fonction`, `Adresse`, `Dat_em`, `Code_Social`) VALUES
(1, 'ahmed', 'mohamed', 25, 'Mecanicien', '13 rue', '2014-05-14', 189756),
(2, 'Kamel', 'aarbi', 26, 'mecanicien', '14 rue', '2014-05-14', 159753);

-- --------------------------------------------------------

--
-- Table structure for table `loc_lesions`
--

DROP TABLE IF EXISTS `loc_lesions`;
CREATE TABLE IF NOT EXISTS `loc_lesions` (
  `tete` varchar(5) NOT NULL,
  `MemS` varchar(5) NOT NULL,
  `MemI` varchar(5) NOT NULL,
  `Yeux` varchar(5) NOT NULL,
  `Mains` varchar(5) NOT NULL,
  `Tronc` varchar(5) NOT NULL,
  `LocI` varchar(5) NOT NULL,
  `LocM` varchar(5) NOT NULL,
  `Fiche` int(11) NOT NULL,
  `Pieds` varchar(5) NOT NULL,
  `Polyaccidente` varchar(80) NOT NULL,
  UNIQUE KEY `Fiche` (`Fiche`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loc_lesions`
--

INSERT INTO `loc_lesions` (`tete`, `MemS`, `MemI`, `Yeux`, `Mains`, `Tronc`, `LocI`, `LocM`, `Fiche`, `Pieds`, `Polyaccidente`) VALUES
('False', 'True', 'True', 'True', 'True', 'True', 'False', 'False', 6, 'False', 'True'),
('False', 'False', 'False', 'False', 'False', 'False', 'False', 'False', 11, 'False', 'True'),
('False', 'True', 'True', 'False', 'True', 'False', 'False', 'True', 12, 'False', 'True'),
('False', 'True', 'False', 'True', 'True', 'False', 'False', 'True', 13, 'False', 'True'),
('False', 'False', 'False', 'True', 'True', 'False', 'True', 'True', 14, 'False', 'True'),
('False', 'False', 'False', 'False', 'True', 'True', 'True', 'False', 15, 'False', 'True'),
('True', 'False', 'True', 'True', 'True', 'False', 'False', 'True', 16, 'True', 'False'),
('True', 'True', 'True', 'False', 'True', 'True', 'False', 'False', 17, 'False', 'False'),
('True', 'False', 'True', 'False', 'False', 'False', 'True', 'False', 19, 'False', 'False');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Matricule` int(11) NOT NULL DEFAULT '0',
  `Fiche` int(11) NOT NULL DEFAULT '0',
  `Temps` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Operation` varchar(55) NOT NULL DEFAULT 'Login',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `Matricule`, `Fiche`, `Temps`, `Operation`) VALUES
(22, 123, 0, '2019-09-27 19:36:16', 'Logout'),
(21, 123, 0, '2019-09-27 19:36:11', 'Login'),
(20, 123, 0, '2019-09-27 19:35:47', 'Logout'),
(19, 123, 0, '2019-09-27 19:35:42', 'Login'),
(23, 123, 0, '2019-09-27 19:36:33', 'Login'),
(24, 123, 0, '2019-09-27 19:36:37', 'Logout'),
(25, 123, 0, '2019-09-27 19:37:06', 'Login'),
(26, 123, 0, '2019-09-27 19:50:34', 'Logout'),
(27, 123, 0, '2019-09-27 19:50:42', 'Login'),
(28, 123, 0, '2019-09-27 19:58:02', 'Logout'),
(29, 123, 0, '2019-09-27 19:59:01', 'Login'),
(30, 987654, 0, '2019-09-28 00:31:31', 'Login'),
(31, 987654, 0, '2019-09-28 01:43:24', 'Logout'),
(32, 51531353, 0, '2019-09-28 01:43:57', 'Login'),
(33, 51531353, 0, '2019-09-28 14:00:33', 'Logout'),
(34, 123, 0, '2019-09-28 14:00:38', 'Login'),
(35, 123, 0, '2019-09-28 14:22:55', 'Logout'),
(36, 987654, 0, '2019-09-28 14:23:16', 'Login'),
(37, 987654, 0, '2019-09-28 14:32:46', 'Logout'),
(38, 987654, 0, '2019-09-28 14:53:57', 'Login'),
(39, 987654, 0, '2019-09-28 14:54:16', 'Logout'),
(40, 51531353, 0, '2019-09-28 14:54:30', 'Login'),
(41, 51531353, 0, '2019-09-28 23:33:33', 'Login'),
(42, 51531353, 0, '2019-09-29 22:24:07', 'Login'),
(43, 51531353, 0, '2019-09-29 22:37:52', 'Login'),
(44, 51531353, 0, '2019-09-29 22:57:19', 'Logout'),
(45, 51531353, 0, '2019-09-29 23:01:22', 'Login'),
(46, 51531353, 0, '2019-09-29 23:07:58', 'Logout'),
(47, 123, 0, '2019-09-29 23:08:12', 'Login'),
(48, 123, 0, '2019-09-29 23:21:11', 'Logout'),
(49, 123, 0, '2019-09-29 23:22:28', 'Login'),
(50, 123, 0, '2019-09-29 23:28:18', 'Logout'),
(51, 51531353, 0, '2019-09-30 00:11:59', 'Login'),
(52, 51531353, 0, '2019-09-30 00:15:30', 'Login'),
(53, 987654, 0, '2019-09-30 07:59:19', 'Login'),
(54, 987654, 0, '2019-09-30 08:13:09', 'Logout'),
(55, 51531353, 0, '2019-09-30 08:13:15', 'Login'),
(56, 51531353, 0, '2019-09-30 08:17:25', 'Logout'),
(57, 123, 0, '2019-09-30 08:17:39', 'Login'),
(58, 123, 0, '2019-09-30 08:23:08', 'Logout'),
(59, 987654, 0, '2019-09-30 08:23:32', 'Login'),
(60, 987654, 0, '2019-09-30 08:34:23', 'Logout'),
(61, 51531353, 0, '2019-09-30 08:34:31', 'Login'),
(62, 51531353, 0, '2019-09-30 08:38:37', 'Logout'),
(63, 123, 0, '2019-09-30 08:38:43', 'Login'),
(64, 123, 0, '2019-09-30 10:22:19', 'Logout'),
(65, 51531353, 0, '2019-09-30 10:22:38', 'Login'),
(66, 51531353, 0, '2019-09-30 10:24:29', 'Logout'),
(67, 123, 0, '2019-09-30 10:24:37', 'Login'),
(68, 123, 0, '2019-09-30 10:25:56', 'Logout'),
(69, 987654, 0, '2019-09-30 10:26:03', 'Login'),
(70, 987654, 0, '2019-09-30 10:26:13', 'Logout'),
(71, 51531353, 0, '2019-09-30 10:27:00', 'Login'),
(72, 51531353, 0, '2019-09-30 10:30:59', 'Logout'),
(73, 123, 0, '2019-09-30 10:31:15', 'Login'),
(74, 123, 0, '2019-09-30 10:31:28', 'Logout'),
(75, 123, 0, '2019-09-30 10:32:11', 'Login'),
(76, 123, 0, '2019-09-30 10:32:18', 'Logout'),
(77, 51531353, 0, '2019-09-30 12:18:14', 'Login'),
(78, 51531353, 0, '2019-10-03 08:27:42', 'Login'),
(79, 51531353, 0, '2019-10-03 08:32:03', 'Logout'),
(80, 123, 0, '2019-10-03 08:32:11', 'Login'),
(81, 123, 0, '2019-10-03 08:55:59', 'Logout'),
(82, 51531353, 0, '2019-10-03 08:56:17', 'Login'),
(83, 51531353, 0, '2019-10-03 08:58:34', 'Logout'),
(84, 123, 0, '2019-10-03 08:58:41', 'Login'),
(85, 123, 0, '2019-10-03 08:59:00', 'Logout'),
(86, 51531353, 0, '2019-10-03 08:59:23', 'Login');

-- --------------------------------------------------------

--
-- Table structure for table `renseignement`
--

DROP TABLE IF EXISTS `renseignement`;
CREATE TABLE IF NOT EXISTS `renseignement` (
  `Fiche` int(11) DEFAULT NULL,
  `Poste` varchar(800) DEFAULT NULL,
  `Depuis` varchar(80) DEFAULT NULL,
  `Habituel` varchar(80) DEFAULT NULL,
  `depuis2` date DEFAULT NULL,
  `Date_repos` date DEFAULT NULL,
  `Horaire_Tra` varchar(80) DEFAULT NULL,
  `Descr` varchar(800) DEFAULT NULL,
  UNIQUE KEY `Fiche` (`Fiche`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `renseignement`
--

INSERT INTO `renseignement` (`Fiche`, `Poste`, `Depuis`, `Habituel`, `depuis2`, `Date_repos`, `Horaire_Tra`, `Descr`) VALUES
(3, 'dqsqsd', 'sdqdsqsdq', 'dsqqds', '2019-09-04', '2019-09-04', 'dsqsddsq', 'sqddsqsdq'),
(4, 'l;km;lk', '2019-01-01', 'kmjji', '2019-01-01', '2019-01-01', '3 X 8', '\';,;\'\';,l;'),
(7, 'sxxs', '2019-01-01', 'dl,lsd', '2019-01-01', '2019-01-01', '3 X 8', 'xzzxxz'),
(8, 'test', '2019-01-01', 'swww', '2019-01-01', '2019-01-01', '3 X 8', 'test'),
(11, 'sqdsqs', '2019-01-02', 'sdqddqs', '2019-02-02', '2019-02-02', 'Matin', 'sdqqdssqd'),
(6, 'TESSSSSSSSSST', 'TESSSSSSSSSSSST', 'TESSSSSSSSSSSSST', '2019-09-25', '2019-09-11', 'Matin', 'sqodoqsnonsqdok'),
(13, 'saas', '2019-01-02', 'sasa', '2019-01-01', '2019-02-01', 'Postes Nuit', 'slamklmsl');

-- --------------------------------------------------------

--
-- Table structure for table `sce_securite`
--

DROP TABLE IF EXISTS `sce_securite`;
CREATE TABLE IF NOT EXISTS `sce_securite` (
  `Fiche` int(11) NOT NULL,
  `ChefVic` varchar(3000) NOT NULL,
  `ChefSec` varchar(3000) NOT NULL,
  `Direction` varchar(3000) NOT NULL,
  `Causes` varchar(3000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  UNIQUE KEY `Fiche` (`Fiche`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sce_securite`
--

INSERT INTO `sce_securite` (`Fiche`, `ChefVic`, `ChefSec`, `Direction`, `Causes`) VALUES
(6, 'zsddsqqsd', 'sqddsqdsqsdq', 'dsqqdsqsddsq', 'Controle Travail * Bruits * Explications ma comprises * Outil en Mauvais Etat'),
(11, 'ssssssssssssssss', 'sssssssssssssssss', 'sssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 'Preparation Travail * Disposition Dangereuse * Explications Succinctes * Equipement Defectueux * Outil en Mauvais Etat'),
(12, 'aosjdokasdnmpk\'mvdskamlksd;', 'dlamaslkdj;vdsnandsk;on', 'lcmsnlkasdnlk;adsmnklams', 'Etat des Sols * Explications Succinctes * Bruits'),
(13, 'ndlsndkmldsml', 'lmcaslknckslaml;asm', 'lsm cklas mlaslas', 'Procedure mal utilise * Etat des Sols * Defaut Conception'),
(14, 'TEST', 'TEST', 'TEST', 'Bruits * Preparation Travail * Procedure Inexistante * Protection individuelle non prevue'),
(15, 'dsdsqsqdsqdsdq', 'sdqsqdsdqsdq', 'sdqdsqdsqdsqdsqsdqdsq', 'Etat de Proprete Lieux * Preparation Travail * Equipement Defectueux * Explications ma comprises'),
(16, 'fefdsqfezdsfdsq', 'sfdqfdsqfdsqfdsqdsfq', 'fdqqfsdsfdfsd', 'Etat des Sols * Procedure non utilise * Outil en Mauvais Etat'),
(17, 'l,asdlpmsapplsad,p', ';lsadm;lmsad;lm;lsadm', ';samkcm qpkwmcwqo,w', 'Defaut d\'eclairage * Outil en Mauvais Etat * Defaut Conception * Controle Travail'),
(19, 'ojiomokm', 'jknknk', 'pkmkpmp', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
