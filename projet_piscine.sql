-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 04 juin 2023 à 23:43
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Projet_Piscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `mail`, `mdp`) VALUES
('C1', 'admin', 'admin', 'admin@admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `chatbox`
--

CREATE TABLE `chatbox` (
  `id_message` int(11) NOT NULL,
  `id_emetteur` varchar(255) NOT NULL,
  `id_receveur` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `heure` varchar(255) NOT NULL,
  `corps_message` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `adresse1` varchar(255) DEFAULT NULL,
  `adresse2` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `num_etud` varchar(255) DEFAULT NULL,
  `type_carte` varchar(255) DEFAULT NULL,
  `num_carte` varchar(255) DEFAULT NULL,
  `nom_carte` varchar(255) DEFAULT NULL,
  `prenom_carte` varchar(255) DEFAULT NULL,
  `date_exp` date NOT NULL DEFAULT '0000-00-00',
  `ccv` int(11) NOT NULL DEFAULT 0,
  `abonnement` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `adresse1`, `adresse2`, `ville`, `cp`, `pays`, `tel`, `mail`, `mdp`, `num_etud`, `type_carte`, `num_carte`, `nom_carte`, `prenom_carte`, `date_exp`, `ccv`, `abonnement`) VALUES
(1, 'Hatron', 'Maxence', '20 boulevard de l hotel de ville', '20 boulevard de l hotel de ville', 'FRANCONVILLE', 95130, 'France', '0624526313', 'maxence.hatron@icloud.com', 'mdp', '123456789pp', '', '1234567890123456', '', '', '0000-00-00', 0, ''),
(2, 'Tmim', 'Elliott', '54 Bvd Gambetta', '', 'Nogent', 69696, 'France', '0606060606', 'elliott.tmim@edu.ece.fr', 'mdp', '1111111111p', '', '1111222233334444', '', '', '0000-00-00', 0, ''),
(3, 'Rechsteiner', 'Mathias', 'azndanzd', '', 'Garches', 92380, 'France', '1233333333', 'mat.rechsteiner@gmail.com', 'm', '112233445AA', 'PayPal', '4983121212123221', 'maxence', 'hetron', '2027-04-01', 322, 'Partenaire+');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE `personnel` (
  `id_coach` varchar(255) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'photos/activites sportives/pas_de_photo.png',
  `specialite` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `salle` varchar(255) DEFAULT NULL,
  `page_web` varchar(255) DEFAULT 'coachadaptatif.php'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`id_coach`, `nom`, `prenom`, `photo`, `specialite`, `video`, `cv`, `mail`, `mdp`, `salle`, `page_web`) VALUES
('A1', 'Seven', 'Martin', 'photos\\activites sportives\\biking.png', 'Biking', '', 'cvbiking.html', 'martin.seven@omnesport.com', 'martinseven', 'Paris', 'biking.php'),
('A2', 'Paprika', 'Stephen', 'photos\\sport de competition\\basketball.png', 'Basketball', '', 'cvbasket.html', 'stephen.paprika@omnesport.com', 'stephenpaprika', 'Paris', 'basket.php'),
('A3', 'Gallego', 'Daniel', 'photos\\activites sportives\\cardio_training.png', 'Cardio Training', '', 'cvcardio.html', 'daniel.gallego@omnesport.com', 'danielgallego', 'Monaco', 'cardio.php'),
('A4', 'Javel', 'Aude', 'photos\\activites sportives\\cours_collectifs.png', 'Cours collectifs', '', 'cvcoco.html', 'aude.javel@omnesport.com', 'audejavel', 'Monaco', 'cours_collectifs.php'),
('A5', 'Lambert', 'Marie', 'photos\\sport de competition\\plongeon.png', 'Plongeon', '', 'cvplongeon.html', 'marie.lambert@omnesport.com', 'marielambert', 'Monaco', 'plongeon.php'),
('A6', 'Dubois', 'Anne', 'photos\\activites sportives\\fitness.png\r\n', 'Fitness', '', 'cvfitness.html', 'anne.dubois@omnesport.com', 'annedubois', 'St-Tropez', 'fitness.php'),
('A7', 'Martin', 'Pierre', 'photos\\sport de competition\\football.png', 'Football', '', 'cvfoot.html', 'pierre.martin@omnesport.com', 'pierremartin', 'Paris', 'football.php'),
('A8', 'Durand', 'Maxime', 'photos\\activites sportives\\musculation.png\r\n', 'Musculation', '', 'cvmuscu.html', 'maxime.durand@omnesport.com', 'maximedurand', 'St-Tropez', 'musculation.php'),
('A9', 'Patterson', 'Jonathan', 'photos\\sport de competition\\natation.png', 'Natation', '', 'cvnatation.html', 'jonathan.patterson@omnesport.com', 'jonathanpatterson', 'St-Tropez', 'natation.php'),
('A10', 'Thomas', 'Aaron', 'photos\\sport de competition\\rugby.png', 'Rugby', '', 'cvrugby.html', 'aaron.thomas@omnesport.com', 'aaronthomas', 'St-Tropez', 'rugby.php'),
('A11', 'Leroy', 'Alexandre', 'photos\\sport de competition\\tennis.png\r\n', 'Tennis', '', 'cvtennis.html', 'alexandre.leroy@omnesport.com', 'alexandreleroy', 'Paris', 'tennis.php'),
('R', 'Etchebest', 'Philippe', 'photos/activites sportives/pas_de_photo.png', 'Restaurant', NULL, NULL, 'philippe.etchebest@omnesport.com', 'philippeetchebest', 'Paris', 'coachadaptatif.php');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `id_rdv` int(11) NOT NULL,
  `id_coach` varchar(255) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `specialite` varchar(255) DEFAULT NULL,
  `adresse1` varchar(255) DEFAULT NULL,
  `adresse2` varchar(255) DEFAULT NULL,
  `doc_sup` text DEFAULT NULL,
  `info_sup` varchar(255) DEFAULT NULL,
  `heure_rdv` int(11) DEFAULT NULL,
  `minutes_rdv` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id_rdv`, `id_coach`, `id_client`, `date`, `specialite`, `adresse1`, `adresse2`, `doc_sup`, `info_sup`, `heure_rdv`, `minutes_rdv`) VALUES
(91, '1', 1, 'Vendredi', 'biking', 'a', 'a', 'a', 'a', 9, 45),
(92, '1', 1, 'Mercredi', 'fitness', 'a', 'a', 'a', 'a', 14, 0),
(93, '1', 1, 'Jeudi', 'fitness', 'a', 'a', 'a', 'a', 16, 15),
(94, '1', 1, 'Mercredi', 'fitness', 'a', 'a', 'a', 'a', 14, 45),
(101, 'A4', 1, 'Jeudi', 'cours collectifs', ' ', ' ', ' ', ' ', 14, 0),
(96, '1', 1, 'Mardi', 'musculation', 'a', 'a', 'a', 'a', 14, 45),
(97, '1', 1, 'Mardi', 'football', 'a', 'a', 'a', 'a', 11, 15),
(98, '1', 1, 'Mercredi', '', 'a', 'a', 'a', 'a', 14, 0),
(99, '1', 1, 'Mardi', 'musculation', 'a', 'a', 'a', 'a', 11, 15),
(100, '1', 1, '', 'musculation', 'a', 'a', 'a', 'a', 0, 0),
(102, 'A4', 1, 'Mercredi', 'cours collectifs', ' ', ' ', ' ', ' ', 14, 0),
(103, 'A3', 778, 'Lundi', 'cardio', ' ', ' ', ' ', ' ', 16, 15),
(104, 'A3', 778, 'Mercredi', 'cardio', ' ', ' ', ' ', ' ', 14, 45),
(105, 'A8', 778, 'Lundi', 'musculation', ' ', ' ', ' ', ' ', 17, 45),
(106, 'A7', 778, 'Lundi', 'football', ' ', ' ', ' ', ' ', 17, 45),
(107, 'A7', 778, 'Samedi', 'football', ' ', ' ', ' ', ' ', 15, 30),
(108, 'A3', 778, 'Jeudi', 'cardio', ' ', ' ', ' ', ' ', 16, 15),
(109, 'A4', 778, 'Samedi', 'cours collectifs', ' ', ' ', ' ', ' ', 17, 45),
(110, 'A3', 778, 'Mercredi', 'cardio', ' ', ' ', ' ', ' ', 14, 45),
(111, 'A1', 778, 'Mercredi', 'Biking', ' ', ' ', ' ', ' ', 15, 30),
(116, 'A7', 3, 'Jeudi', 'Football', ' ', ' ', ' ', ' ', 14, 45),
(115, 'A5', 3, 'Jeudi', 'Plongeon', ' ', ' ', ' ', ' ', 15, 30),
(114, 'A4', 3, 'Vendredi', 'Cours collectifs', ' ', ' ', ' ', ' ', 15, 30),
(112, 'A3', 3, 'Mercredi', 'Cardio Training', ' ', ' ', ' ', ' ', 14, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chatbox`
--
ALTER TABLE `chatbox`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id_coach`);

--
-- Index pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`id_rdv`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chatbox`
--
ALTER TABLE `chatbox`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `id_rdv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
