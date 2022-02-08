-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 08 fév. 2022 à 14:10
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `webstudent21`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etudiant_id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_debut_activite` date DEFAULT NULL,
  `contexte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B8755515DDEAB1A3` (`etudiant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`id`, `etudiant_id`, `nom`, `description`, `date_debut_activite`, `contexte`) VALUES
(1, 1, 'activite 10', 'description activite 10', '2021-01-12', 'contexte10'),
(2, 1, 'actvivite 11', 'description activite 11', '2021-01-19', 'contexte activite 11');

-- --------------------------------------------------------

--
-- Structure de la table `activite_competence`
--

DROP TABLE IF EXISTS `activite_competence`;
CREATE TABLE IF NOT EXISTS `activite_competence` (
  `activite_id` int(11) NOT NULL,
  `competence_id` int(11) NOT NULL,
  PRIMARY KEY (`activite_id`,`competence_id`),
  KEY `IDX_C824F60A9B0F88B1` (`activite_id`),
  KEY `IDX_C824F60A15761DAB` (`competence_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

DROP TABLE IF EXISTS `competence`;
CREATE TABLE IF NOT EXISTS `competence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20201029103216', '2020-10-29 10:32:47', 85),
('DoctrineMigrations\\Version20201029104600', '2020-10-29 10:46:08', 280),
('DoctrineMigrations\\Version20201229115435', '2020-12-29 11:54:56', 175),
('DoctrineMigrations\\Version20201229161047', '2020-12-29 16:11:26', 332),
('DoctrineMigrations\\Version20210102122340', '2021-01-02 12:23:54', 216),
('DoctrineMigrations\\Version20210102124146', '2021-01-02 12:41:56', 659),
('DoctrineMigrations\\Version20210102125412', '2021-01-02 12:54:22', 282);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naiss` date DEFAULT NULL,
  `chemin_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maison_id` int(11) DEFAULT NULL,
  `statut_id` int(11) DEFAULT NULL,
  `patronus_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_717E22E39D67D8AF` (`maison_id`),
  KEY `IDX_717E22E3F6203804` (`statut_id`),
  KEY `IDX_717E22E37602A6AC` (`patronus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `date_naiss`, `chemin_img`, `maison_id`, `statut_id`, `patronus_id`) VALUES
(1, 'Potter', 'Harry', '1980-07-31', '1.jpg', 1, 2, 1),
(2, 'Granger', 'Hermione', '1980-07-31', '2.jpg', 1, 1, 2),
(3, 'Weasley', 'Ron', '1980-07-31', '3.jpg', 2, 1, 3),
(4, 'Malfoy', 'Drago', '1979-08-20', '4.jpg', 2, 1, 5),
(5, 'Weasley', 'Fred', '1972-11-20', '5.jpg', 2, 1, 4),
(6, 'Weasley', 'Ginny', '1983-12-10', '6.jpg', 4, 1, 4),
(7, 'Lovegood', 'Luna', '1980-11-02', '7.jpg', 3, 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

DROP TABLE IF EXISTS `maison`;
CREATE TABLE IF NOT EXISTS `maison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `maison`
--

INSERT INTO `maison` (`id`, `code`, `nom`) VALUES
(1, 'GFD', 'Griffondor'),
(2, 'SPT', 'Serpentard'),
(3, 'PFS', 'Poufsouffle'),
(4, 'SRD', 'Serdaigle');

-- --------------------------------------------------------

--
-- Structure de la table `patronus`
--

DROP TABLE IF EXISTS `patronus`;
CREATE TABLE IF NOT EXISTS `patronus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chemin_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `patronus`
--

INSERT INTO `patronus` (`id`, `nom`, `chemin_img`) VALUES
(1, 'cerf', 'patronus/cerf.jpg'),
(2, 'loutre', 'patronus/loutre.jpg'),
(3, 'Jack Terrier Rusell', 'patronus/terrier.jpg'),
(4, 'cheval', 'patronus/cheval.jpg'),
(5, 'hibou', 'patronus/hibou.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id`, `nom`, `descriptif`) VALUES
(1, 'Sang-pur', 'Un sorcier dit de « sang-pur » (pure-blood en anglais) n\'a pour ancêtres que des sorciers.'),
(2, 'Sang-Mêlé', 'Un sorcier dit de « sang-mêlé » (half-blood en anglais) est un sorcier ayant un ancêtre moldu.'),
(3, 'Né-moldu', 'Un sorcier « né-Moldu » (muggle-born en anglais) est un sorcier dont les parents sont Moldus.'),
(4, 'Cracmol', 'Le terme « Cracmol » (squib en anglais, qui désigne un pétard) est employé pour désigner une personne appartenant à une famille de sorciers, mais pratiquement dépourvue de toute capacité magique'),
(5, 'Moldu', ' Moldu » (muggle en anglais) est un terme inventé par les sorciers pour désigner une personne ne possédant pas de pouvoirs magiques');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `FK_B8755515DDEAB1A3` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id`);

--
-- Contraintes pour la table `activite_competence`
--
ALTER TABLE `activite_competence`
  ADD CONSTRAINT `FK_C824F60A15761DAB` FOREIGN KEY (`competence_id`) REFERENCES `competence` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C824F60A9B0F88B1` FOREIGN KEY (`activite_id`) REFERENCES `activite` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_717E22E37602A6AC` FOREIGN KEY (`patronus_id`) REFERENCES `patronus` (`id`),
  ADD CONSTRAINT `FK_717E22E39D67D8AF` FOREIGN KEY (`maison_id`) REFERENCES `maison` (`id`),
  ADD CONSTRAINT `FK_717E22E3F6203804` FOREIGN KEY (`statut_id`) REFERENCES `statut` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
