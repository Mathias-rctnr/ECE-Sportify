-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 03 juin 2023 à 20:52
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_piscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `mail`, `mdp`) VALUES
('C1', 'admin', 'admin', 'admin@admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `chatbox`
--

DROP TABLE IF EXISTS `chatbox`;
CREATE TABLE IF NOT EXISTS `chatbox` (
  `id_message` int NOT NULL AUTO_INCREMENT,
  `id_emetteur` varchar(255) NOT NULL,
  `id_receveur` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `heure` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `corps_message` varchar(255) NOT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse1` varchar(255) NOT NULL,
  `adresse2` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `cp` int NOT NULL,
  `pays` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `num_etud` varchar(255) NOT NULL,
  `type_carte` varchar(255) NOT NULL,
  `num_carte` varchar(255) NOT NULL,
  `nom_carte` varchar(255) NOT NULL,
  `prenom_carte` varchar(255) NOT NULL,
  `date_exp` date NOT NULL,
  `ccv` int NOT NULL,
  `abonnement` varchar(255) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `adresse1`, `adresse2`, `ville`, `cp`, `pays`, `tel`, `mail`, `mdp`, `num_etud`, `type_carte`, `num_carte`, `nom_carte`, `prenom_carte`, `date_exp`, `ccv`, `abonnement`) VALUES
(1, 'Hatron', 'Maxence', '20 boulevard de l hotel de ville', '20 boulevard de l hotel de ville', 'FRANCONVILLE', 95130, 'France', '0624526313', 'maxence.hatron@icloud.com', 'mdp', '123456789pp', '', '1234567890123456', '', '', '0000-00-00', 0, ''),
(2, 'Tmim', 'Elliott', '54 Bvd Gambetta', '', 'Nogent', 69696, 'France', '0606060606', 'elliott.tmim@edu.ece.fr', 'mdp', '1111111111p', '', '0', '', '', '0000-00-00', 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `id_coach` varchar(255) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'photos/activites sportives/pas_de_photo.png',
  `specialite` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `salle` varchar(255) NOT NULL,
  PRIMARY KEY (`id_coach`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`id_coach`, `nom`, `prenom`, `photo`, `specialite`, `video`, `cv`, `mail`, `mdp`, `salle`) VALUES
('A1', 'Seven', 'Martin', 'photos\\activites sportives\\biking.png', 'Biking', '', 'cvbiking.html', 'martin.seven@omnesport.com', 'martinseven', ''),
('A2', 'Paprika', 'Stephen', 'photos\\sport de competition\\basketball.png', 'Basketball', '', 'cvbasket.html', 'stephen.paprika@omnesport.com', 'stephenpaprika', ''),
('A3', 'Gallego', 'Daniel', 'photos\\activites sportives\\cardio_training.png', 'Cardio Training', '', 'cvcardio.html', 'daniel.gallego@omnesport.com', 'danielgallego', ''),
('A4', 'Javel', 'Aude', 'photos\\activites sportives\\cours_collectifs.png', 'Cours collectifs', '', 'cvcoco.html', 'aude.javel@omnesport.com', 'audejavel', ''),
('A5', 'Lambert', 'Marie', 'photos\\sport de competition\\plongeon.png', 'Plongeon', '', 'cvplongeon.html', 'marie.lambert@omnesport.com', 'marielambert', ''),
('A6', 'Dubois', 'Anne', 'photos\\activites sportives\\fitness.png\r\n', 'Fitness', '', 'cvfitness.html', 'anne.dubois@omnesport.com', 'annedubois', ''),
('A7', 'Martin', 'Pierre', 'photos\\sport de competition\\football.png', 'Football', '', 'cvfoot.html', 'pierre.martin@omnesport.com', 'pierremartin', ''),
('A8', 'Durand', 'Maxime', 'photos\\activites sportives\\musculation.png\r\n', 'Musculation', '', 'cvmuscu.html', 'maxime.durand@omnesport.com', 'maximedurand', ''),
('A9', 'Patterson', 'Jonathan', 'photos\\sport de competition\\natation.png', 'Natation', '', 'cvnatation.html', 'jonathan.patterson@omnesport.com', 'jonathanpatterson', ''),
('A10', 'Thomas', 'Aaron', 'photos\\sport de competition\\rugby.png', 'Rugby', '', 'cvrugby.html', 'aaron.thomas@omnesport.com', 'aaronthomas', ''),
('A11', 'Leroy', 'Alexandre', 'photos\\sport de competition\\tennis.png\r\n', 'Tennis', '', 'cvtennis.html', 'alexandre.leroy@omnesport.com', 'alexandreleroy', '');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `id_rdv` int NOT NULL AUTO_INCREMENT,
  `id_coach` int NOT NULL,
  `id_client` int NOT NULL,
  `date` varchar(255) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `adresse1` varchar(255) NOT NULL,
  `adresse2` varchar(255) NOT NULL,
  `doc_sup` text NOT NULL,
  `info_sup` varchar(255) NOT NULL,
  `heure_rdv` int NOT NULL,
  `minutes_rdv` int NOT NULL,
  PRIMARY KEY (`id_rdv`)
) ENGINE=MyISAM AUTO_INCREMENT=10002 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id_rdv`, `id_coach`, `id_client`, `date`, `specialite`, `adresse1`, `adresse2`, `doc_sup`, `info_sup`, `heure_rdv`, `minutes_rdv`) VALUES
(1, 0, 0, 'Lundi', 'a', 'a', 'a', 'a', 'a', 9, 0),
(38, 1, 1, 'Vendredi', 'tennis', 'a', 'a', 'a', 'a', 14, 45),
(2, 1, 1, 'Vendredi', 'a', 'a', 'a', 'a', 'a', 10, 30),
(3, 1, 1, 'Lundi', 'a', 'a', 'a', 'a', 'a', 17, 45),
(37, 1, 1, 'Vendredi', 'musculation', 'a', 'a', 'a', 'a', 14, 45),
(4, 1, 0, 'Vendredi', 'musculation', 'a', 'a', 'a', 'a', 11, 15),
(5, 1, 0, 'Mardi', 'musculation', 'a', 'a', 'a', 'a', 9, 45),
(36, 1, 1, 'Vendredi', 'musculation', 'a', 'a', 'a', 'a', 14, 45),
(35, 1, 1, 'Jeudi', 'musculation', 'a', 'a', 'a', 'a', 14, 0),
(34, 1, 1, 'Vendredi', 'musculation', 'a', 'a', 'a', 'a', 12, 0),
(33, 1, 1, 'Mercredi', 'musculation', 'a', 'a', 'a', 'a', 17, 45),
(32, 1, 1, 'Jeudi', 'musculation', 'a', 'a', 'a', 'a', 9, 0),
(31, 1, 1, 'Mardi', 'musculation', 'a', 'a', 'a', 'a', 17, 45),
(30, 1, 1, 'Mardi', 'musculation', 'a', 'a', 'a', 'a', 17, 0),
(29, 1, 1, 'Vendredi', 'musculation', 'a', 'a', 'a', 'a', 17, 0),
(28, 1, 1, 'Samedi', 'musculation', 'a', 'a', 'a', 'a', 15, 30),
(27, 1, 1, 'Vendredi', 'musculation', 'a', 'a', 'a', 'a', 15, 30),
(26, 1, 1, 'Samedi', 'musculation', 'a', 'a', 'a', 'a', 17, 45),
(25, 1, 1, 'Jeudi', 'musculation', 'a', 'a', 'a', 'a', 11, 15),
(24, 1, 1, 'Jeudi', 'musculation', 'a', 'a', 'a', 'a', 12, 0),
(23, 1, 1, 'Samedi', 'musculation', 'a', 'a', 'a', 'a', 14, 45),
(22, 1, 1, 'Vendredi', 'musculation', 'a', 'a', 'a', 'a', 14, 45),
(21, 1, 0, 'Mercredi', 'musculation', 'a', 'a', 'a', 'a', 17, 0),
(20, 1, 0, 'Jeudi', 'musculation', 'a', 'a', 'a', 'a', 16, 15),
(19, 1, 0, 'Mercredi', 'musculation', 'a', 'a', 'a', 'a', 10, 30),
(18, 1, 0, 'Vendredi', 'musculation', 'a', 'a', 'a', 'a', 16, 15),
(17, 1, 0, 'Jeudi', 'musculation', 'a', 'a', 'a', 'a', 14, 45),
(16, 1, 0, 'Mardi', 'musculation', 'a', 'a', 'a', 'a', 14, 0),
(15, 1, 0, 'Vendredi', 'musculation', 'a', 'a', 'a', 'a', 14, 0),
(14, 1, 0, 'Jeudi', 'musculation', 'a', 'a', 'a', 'a', 10, 30),
(13, 1, 0, 'Lundi', 'musculation', 'a', 'a', 'a', 'a', 15, 30),
(12, 1, 0, 'Samedi', 'musculation', 'a', 'a', 'a', 'a', 9, 0),
(11, 1, 0, 'Jeudi', 'musculation', 'a', 'a', 'a', 'a', 17, 0),
(10, 1, 0, 'Jeudi', 'musculation', 'a', 'a', 'a', 'a', 15, 30),
(9, 1, 0, 'Mercredi', 'musculation', 'a', 'a', 'a', 'a', 12, 0),
(8, 1, 0, 'Mercredi', 'musculation', 'a', 'a', 'a', 'a', 12, 0),
(6, 1, 0, 'Mercredi', 'musculation', 'a', 'a', 'a', 'a', 14, 0),
(7, 1, 0, 'Jeudi', 'musculation', 'a', 'a', 'a', 'a', 14, 0),
(39, 1, 1, 'Jeudi', 'tennis', 'a', 'a', 'a', 'a', 12, 0),
(40, 1, 1, 'Mercredi', 'tennis', 'a', 'a', 'a', 'a', 15, 30),
(41, 2, 1, 'Vendredi', 'rugby', 'a', 'a', 'a', 'a', 14, 0),
(42, 2, 1, 'Lundi', 'rugby', 'a', 'a', 'a', 'a', 9, 0),
(43, 2, 1, 'Vendredi', 'rugby', 'a', 'a', 'a', 'a', 11, 15),
(44, 1, 1, 'Vendredi', 'tennis', 'a', 'a', 'a', 'a', 12, 0),
(45, 1, 1, 'Vendredi', 'tennis', 'a', 'a', 'a', 'a', 9, 0),
(46, 1, 1, 'Vendredi', 'tennis', 'a', 'a', 'a', 'a', 16, 15),
(47, 1, 1, 'Lundi', 'tennis', 'a', 'a', 'a', 'a', 16, 15),
(48, 1, 1, 'Samedi', 'musculation', 'a', 'a', 'a', 'a', 14, 0),
(49, 1, 1, 'Jeudi', 'musculation', 'a', 'a', 'a', 'a', 14, 0),
(50, 1, 1, 'Vendredi', 'natation', 'a', 'a', 'a', 'a', 15, 30),
(51, 1, 1, 'Samedi', 'tennis', 'a', 'a', 'a', 'a', 14, 0),
(52, 1, 1, 'Jeudi', 'natation', 'a', 'a', 'a', 'a', 17, 0),
(53, 1, 1, 'Jeudi', 'football', 'a', 'a', 'a', 'a', 9, 45),
(54, 1, 1, 'Mercredi', 'football', 'a', 'a', 'a', 'a', 14, 45),
(55, 1, 1, 'Jeudi', 'football', 'a', 'a', 'a', 'a', 16, 15),
(56, 1, 1, 'Vendredi', 'football', 'a', 'a', 'a', 'a', 14, 0),
(57, 1, 1, 'Vendredi', 'football', 'a', 'a', 'a', 'a', 15, 30),
(58, 1, 1, 'Mardi', 'football', 'a', 'a', 'a', 'a', 11, 15),
(59, 1, 1, 'Vendredi', 'football', 'a', 'a', 'a', 'a', 10, 30),
(60, 1, 1, 'Mardi', 'tennis', 'a', 'a', 'a', 'a', 12, 0),
(61, 1, 1, 'Lundi', 'musculation', 'a', 'a', 'a', 'a', 11, 15),
(62, 1, 1, 'Mardi', 'cardio', 'a', 'a', 'a', 'a', 14, 0),
(63, 1, 1, 'Samedi', 'cardio', 'a', 'a', 'a', 'a', 11, 15),
(64, 1, 1, 'Samedi', 'football', 'a', 'a', 'a', 'a', 9, 0),
(65, 1, 1, 'Lundi', 'football', 'a', 'a', 'a', 'a', 14, 45),
(66, 1, 1, 'Vendredi', 'football', 'a', 'a', 'a', 'a', 17, 45),
(67, 1, 1, 'Mardi', 'football', 'a', 'a', 'a', 'a', 14, 45),
(68, 1, 1, 'Lundi', 'football', 'a', 'a', 'a', 'a', 14, 45),
(69, 1, 1, 'Jeudi', 'football', 'a', 'a', 'a', 'a', 16, 15),
(70, 1, 1, 'Jeudi', 'musculation', 'a', 'a', 'a', 'a', 12, 0),
(71, 1, 1, 'Mercredi', 'musculation', 'a', 'a', 'a', 'a', 14, 0),
(72, 1, 1, 'Jeudi', 'fitness', 'a', 'a', 'a', 'a', 17, 0),
(73, 1, 1, 'Jeudi', 'cardio', 'a', 'a', 'a', 'a', 14, 0),
(74, 1, 1, 'Samedi', 'football', 'a', 'a', 'a', 'a', 15, 30),
(75, 1, 1, 'Vendredi', 'fitness', 'a', 'a', 'a', 'a', 12, 0),
(76, 1, 1, 'Jeudi', 'fitness', 'a', 'a', 'a', 'a', 14, 0),
(77, 1, 1, 'Mardi', 'fitness', 'a', 'a', 'a', 'a', 11, 15),
(78, 1, 1, 'Mardi', 'fitness', 'a', 'a', 'a', 'a', 14, 45),
(79, 1, 1, 'Jeudi', 'fitness', 'a', 'a', 'a', 'a', 15, 30),
(80, 2, 1, 'Mercredi', 'rugby', 'a', 'a', 'a', 'a', 15, 30),
(81, 1, 1, 'Mercredi', 'natation', 'a', 'a', 'a', 'a', 14, 45),
(82, 1, 1, 'Lundi', 'tennis', 'a', 'a', 'a', 'a', 10, 30),
(83, 1, 1, 'Vendredi', 'fitness', 'a', 'a', 'a', 'a', 14, 0),
(84, 1, 1, 'Vendredi', 'fitness', 'a', 'a', 'a', 'a', 12, 0),
(85, 1, 1, 'Jeudi', 'fitness', 'a', 'a', 'a', 'a', 15, 30),
(86, 1, 1, 'Vendredi', 'fitness', 'a', 'a', 'a', 'a', 14, 45),
(87, 1, 1, 'Lundi', 'fitness', 'a', 'a', 'a', 'a', 10, 30),
(88, 1, 1, 'Lundi', 'fitness', 'a', 'a', 'a', 'a', 10, 30),
(89, 1, 1, 'Lundi', 'fitness', 'a', 'a', 'a', 'a', 10, 30),
(90, 1, 1, 'Vendredi', 'fitness', 'a', 'a', 'a', 'a', 17, 0),
(91, 1, 1, 'Vendredi', 'biking', 'a', 'a', 'a', 'a', 9, 45),
(92, 1, 1, 'Mercredi', 'fitness', 'a', 'a', 'a', 'a', 14, 0),
(93, 1, 1, 'Jeudi', 'fitness', 'a', 'a', 'a', 'a', 16, 15),
(94, 1, 1, 'Mercredi', 'fitness', 'a', 'a', 'a', 'a', 14, 45),
(95, 1, 1, 'Jeudi', '', 'a', 'a', 'a', 'a', 15, 30),
(96, 1, 1, 'Mardi', 'musculation', 'a', 'a', 'a', 'a', 14, 45),
(97, 1, 1, 'Mardi', 'football', 'a', 'a', 'a', 'a', 11, 15),
(98, 1, 1, 'Mercredi', '', 'a', 'a', 'a', 'a', 14, 0),
(99, 1, 1, 'Mardi', 'musculation', 'a', 'a', 'a', 'a', 11, 15),
(100, 1, 1, '', 'musculation', 'a', 'a', 'a', 'a', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
