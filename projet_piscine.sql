-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 02 juin 2023 à 17:22
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
  `id` int NOT NULL AUTO_INCREMENT,
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
(1, 'admin', 'admin', 'admin@admin', 'admin');

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
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `adresse1`, `adresse2`, `ville`, `cp`, `pays`, `tel`, `mail`, `mdp`, `num_etud`, `type_carte`, `num_carte`, `nom_carte`, `prenom_carte`, `date_exp`, `ccv`) VALUES
(1, 'Hatron', 'Maxence', '20 boulevard de l hotel de ville', '20 boulevard de l hotel de ville', 'FRANCONVILLE', 95130, 'France', '624526313', 'maxence.hatron@icloud.com', 'mdp', '123456789', '', '0', '', '', '0000-00-00', 0),
(2, 'Tmim', 'Elliott', '54 Bvd Gambetta', '', 'Nogent', 69696, 'France', '606060606', 'elliott.tmim@edu.ece.fr', 'mdp', '1111111111', '', '0', '', '', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `id_coach` varchar(255) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`id_coach`, `nom`, `prenom`, `photo`, `specialite`, `video`, `cv`, `mail`, `mdp`) VALUES
('A1', 'Seven', 'Martin', 'photos\\activites sportives\\biking.png', 'Biking', '', 'cvbiking.html', 'martin.seven@omnesport.com\r\n', 'martinseven'),
('A2', 'Paprika', 'Stephen', 'photos\\sport de competition\\basketball.png', 'Basketball', '', 'cvbasket.html', 'stephen.paprika@omnesport.com', 'stephenpaprika'),
('A3', 'Gallego', 'Daniel', 'photos\\activites sportives\\cardio_training.png', 'Cardio Training', '', 'cvcardio.html', 'daniel.gallego@omnesport.com', 'danielgallego'),
('A4', 'Javel', 'Aude', 'photos\\activites sportives\\cours_collectifs.png\r\n', 'Cours collectifs', '', 'cvcoco.html', 'aude.javel@omnesport.com', 'audejavel'),
('A5', 'Lambert', 'Marie', 'photos\\sport de competition\\plongeon.png', 'Plongeon', '', 'cvplongeon.html', 'marie.lambert@omnesport.com', 'marielambert'),
('A6', 'Dubois', 'Anne', 'photos\\activites sportives\\fitness.png\r\n', 'Fitness', '', 'cvfitness.html', 'anne.dubois@omnesport.com', 'annedubois'),
('A7', 'Martin', 'Pierre', 'photos\\sport de competition\\football.png', 'Football', '', 'cvfoot.html', 'pierre.martin@omnesport.com', 'pierremartin'),
('A8', 'Durand', 'Maxime', 'photos\\activites sportives\\musculation.png\r\n', 'Musculation', '', 'cvmuscu.html', 'maxime.durand@omnesport.com', 'maximedurand'),
('A9', 'Patterson', 'Jonathan', 'photos\\sport de competition\\natation.png', 'Natation', '', 'cvnatation.html', 'jonathan.patterson@omnesport.com', 'jonathanpatterson'),
('A10', 'Thomas', 'Aaron', 'photos\\sport de competition\\rugby.png', 'Rugby', '', 'cvrugby.html', 'aaron.thomas@omnesport.com', 'aaronthomas'),
('A11', 'Leroy', 'Alexandre', 'photos\\sport de competition\\tennis.png\r\n', 'Tennis', '', 'cvtennis.html', 'alexandre.leroy@omnesport.com', 'alexandreleroy');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `id_rdv` int NOT NULL AUTO_INCREMENT,
  `id_coach` varchar(255) NOT NULL,
  `id_client` int NOT NULL,
  `date` varchar(255) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `adresse1` varchar(255) NOT NULL,
  `adresse2` varchar(255) NOT NULL,
  `doc_sup` text NOT NULL,
  `info_sup` varchar(255) NOT NULL,
  PRIMARY KEY (`id_rdv`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
