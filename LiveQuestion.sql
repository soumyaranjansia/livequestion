-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 30 avr. 2021 à 21:27
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `CatId` int NOT NULL AUTO_INCREMENT,
  `CatName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CatId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`CatId`, `CatName`) VALUES
(1, 'Sport'),
(2, 'Cinéma'),
(3, 'Jeux Vidéo'),
(4, 'Cuisine'),
(5, 'Voyage'),
(6, 'Technologie'),
(7, 'Espace'),
(8, 'Musique'),
(9, 'Philosophie'),
(10, 'Histoire'),
(11, 'Série');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `QuestId` int NOT NULL AUTO_INCREMENT,
  `QuestTitle` varchar(45) DEFAULT NULL,
  `QuestText` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `QuestCatId` int DEFAULT NULL,
  `QuestAutorId` int DEFAULT NULL,
  `QuestCreaDate` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`QuestId`),
  KEY `fk_cat_id` (`QuestCatId`),
  KEY `fk_aut_id` (`QuestAutorId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`QuestId`, `QuestTitle`, `QuestText`, `QuestCatId`, `QuestAutorId`, `QuestCreaDate`) VALUES
(1, 'ISS', 'Qui est le commandant a bord ?', 7, 1, '2021-04-26 01:21:24'),
(7, 'Cassoulet', 'Comment faire un bon cassoulet ?', 4, 7, '2021-04-30 23:15:31'),
(8, 'Minecraft', 'Comment installer des mods ?', 3, 7, '2021-04-30 23:15:47'),
(9, 'Japon', 'Quel lieu visité ?', 5, 7, '2021-04-30 23:16:02');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `RepUserId` int DEFAULT NULL,
  `RepQuestId` int DEFAULT NULL,
  `RepDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `RepQuest` text,
  KEY `fk_user_id` (`RepUserId`),
  KEY `fk_quest_id` (`RepQuestId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`RepUserId`, `RepQuestId`, `RepDate`, `RepQuest`) VALUES
(7, 1, '2021-04-29 00:54:52', 'Thomas Pesquet'),
(7, 8, '2021-04-30 23:16:25', 'Curse Forge et hop ');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `UserId` int NOT NULL AUTO_INCREMENT,
  `UserName` varchar(255) DEFAULT NULL,
  `UserMail` varchar(255) DEFAULT NULL,
  `UserPass` varchar(255) DEFAULT NULL,
  `UserAva` varchar(255) DEFAULT NULL,
  `UserGender` char(1) DEFAULT NULL,
  `UserInscriDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `UserRole` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`UserId`, `UserName`, `UserMail`, `UserPass`, `UserAva`, `UserGender`, `UserInscriDate`, `UserRole`) VALUES
(1, 'admin', 'admin@hotmail.fr', '$2y$10$Esc714ChqSBaUcmkhOsD4e4PznoNFkisumSY7ct/DLoi6frLu7p1i', '<img class=\"avatar\" src=\"images/avatar/avatarH.png\" alt=\"avatar\">', 'H', '2021-04-20 20:34:10', 'A'),
(5, 'Skiyps', 'Thoeg@gmail.com', '$2y$10$x/prwgenJ89Lt.973kaVVuxFIlxEn2khZNqFU5EOczINxaX1pgrGK', '<img class=\"avatar\" src=\"images/avatar/avatarH.png\" alt=\"avatar\">', 'H', '2021-04-26 05:23:52', 'M'),
(6, 'Storwind', 'MaximeE@gmail.com', '$2y$10$BnSCJ9lNy3RhgRHmkOe5nuEIG./LoIIiLcYyZ.xKguJk14DmwEmR2', '<img class=\"avatar\" src=\"images/avatar/avatarH.png\" alt=\"avatar\">', 'H', '2021-04-24 02:24:30', 'M'),
(7, 'Eadgeez', 'Maxencemenard@hotmail.fr', '$2y$10$Q6mfsxurBPF3H4pv4ziU3.eE6hrN9C1TEYck0FWMq1fYGqubIg1yS', '<img class=\"avatar\" src=\"images/avatar/7.png\" alt=\"avatar\">', 'H', '2021-02-10 22:24:56', 'A'),
(8, 'Adina', 'Adina@wannado.com', '$2y$10$UXM7lDeuFjCGXUcBbMlcH.1Fmy6yH3kcWuzDuEg1hxcBp1agTeCY2', '<img class=\"avatar\" src=\"images/avatar/avatarF.png\" alt=\"avatar\">', 'F', '2022-04-24 02:25:39', 'M');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_aut_id` FOREIGN KEY (`QuestAutorId`) REFERENCES `utilisateurs` (`UserId`),
  ADD CONSTRAINT `fk_cat_id` FOREIGN KEY (`QuestCatId`) REFERENCES `categorie` (`CatId`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `fk_quest_id` FOREIGN KEY (`RepQuestId`) REFERENCES `question` (`QuestId`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`RepUserId`) REFERENCES `utilisateurs` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
