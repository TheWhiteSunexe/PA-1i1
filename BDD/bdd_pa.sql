-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2024 at 12:38 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pa`
--

-- --------------------------------------------------------

--
-- Table structure for table `adh??re`
--

CREATE TABLE `adh??re` (
  `Id_users` int(11) NOT NULL,
  `Id_Session` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blocnote`
--

CREATE TABLE `blocnote` (
  `Id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` varchar(150) NOT NULL,
  `date` datetime NOT NULL,
  `fav` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blocnote`
--

INSERT INTO `blocnote` (`Id`, `id_user`, `titre`, `description`, `date`, `fav`) VALUES
(6, 25, 'Concert Nevermore Tour', '28 septembre et 1er octobre 2024', '2024-05-18 18:04:48', 1),
(8, 25, 'Concert Hasta Luego', '3 et 4 juin 2024', '2024-05-18 18:05:36', 0),
(9, 25, 'Cours de piano', 'Ne pas oublier les cours de piano le jeudi soir', '2024-05-18 18:06:04', 0),
(11, 25, 'Pont-à-Mousson', 'aaaaaaaaaaaaaaaaaaaaa', '2024-05-19 13:53:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `cvv` varchar(255) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `numero_5` int(4) NOT NULL,
  `montant` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `id_user`, `numero`, `exp_date`, `cvv`, `nom`, `prenom`, `numero_5`, `montant`) VALUES
(15, 25, '9552fcc25c971bc0a51a9725f50b3689d6c7df216b98fc6304962f25bbab4fd2', '2028-05', 'c18f38941687914a82e6633068b5bcb44d7e4f3efe737ed93151b74787882731', 'Angel', 'Dynamite', 7842, '3078.3'),
(16, 25, '6322499699494a62d507b93d91ff3a9201ce04d4e79d05c57d9c15586c868005', '2025-09', '865e7eea1ebd314fbf09b709f3ec8c2ecb54208f9150e22532b8872c9d99a97c', 'Bernard', 'Véronique', 2845, '1175.06');

-- --------------------------------------------------------

--
-- Table structure for table `chapitres`
--

CREATE TABLE `chapitres` (
  `id` int(11) NOT NULL,
  `nom` text,
  `matiere_id` int(11) DEFAULT NULL,
  `description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chapitres`
--

INSERT INTO `chapitres` (`id`, `nom`, `matiere_id`, `description`) VALUES
(3, 'Mécanique du point', 2, 0),
(4, 'Électricité et magnétisme', 2, 0),
(5, 'Chimie organique', 3, 0),
(6, 'Chimie inorganique', 3, 0),
(7, 'Structures de données', 4, 0),
(8, 'Algorithmes avancés', 4, 0),
(9, 'Génétique des populations', 5, 0),
(10, 'Biologie moléculaire', 5, 0),
(11, 'Révolution industrielle', 6, 0),
(12, 'Guerres mondiales', 6, 0),
(13, 'Conversation anglaise', 7, 0),
(14, 'Littérature anglaise', 7, 0),
(15, 'Éthique appliquée', 8, 0),
(16, 'Philosophie politique', 8, 0),
(17, 'Économie de marché', 9, 0),
(18, 'Macroéconomie', 9, 0),
(19, 'Climats régionaux', 10, 0),
(20, 'Climats extrêmes', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `concerne`
--

CREATE TABLE `concerne` (
  `id` int(11) NOT NULL,
  `id_message` int(11) NOT NULL,
  `id_hashtag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `concerne`
--

INSERT INTO `concerne` (`id`, `id_message`, `id_hashtag`) VALUES
(1, 8, 1),
(2, 8, 12);

-- --------------------------------------------------------

--
-- Table structure for table `contient`
--

CREATE TABLE `contient` (
  `Id_video` int(11) NOT NULL,
  `Id_cours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `matiere_id` int(11) DEFAULT NULL,
  `chapitre_id` int(11) DEFAULT NULL,
  `titre` text,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`id`, `matiere_id`, `chapitre_id`, `titre`, `description`) VALUES
(4, 2, 4, 'Lois de l\'électromagnétisme', 'Ce cours présente les lois fondamentales de l\'électricité et du magnétisme.'),
(5, 3, 5, 'Nomenclature des composés organiques', 'Ce cours aborde la nomenclature des composés organiques en chimie.'),
(6, 3, 6, 'Réactions acido-basiques', 'Ce cours explore les réactions acido-basiques en chimie inorganique.'),
(7, 4, 7, 'Listes chaînées', 'Ce cours présente les structures de données de type liste chaînée.'),
(8, 4, 8, 'Algorithmes de recherche', 'Ce cours explore les algorithmes de recherche avancés.'),
(9, 5, 9, 'Hérédité mendélienne', 'Ce cours étudie les principes de l\'hérédité mendélienne en génétique.'),
(10, 5, 10, 'Réplication de l\'ADN', 'Ce cours aborde le processus de réplication de l\'ADN en biologie moléculaire.'),
(11, 6, 11, 'Inventions de la révolution industrielle', 'Ce cours explore les principales inventions de la révolution industrielle.'),
(12, 6, 12, 'Causes des guerres mondiales', 'Ce cours analyse les causes des guerres mondiales.'),
(13, 7, 13, 'Conversation informelle', 'Ce cours propose des exercices de conversation informelle en anglais.'),
(14, 7, 14, 'Étude de Shakespeare', 'Ce cours examine les œuvres de Shakespeare en littérature anglaise.'),
(15, 8, 15, 'Éthique en milieu professionnel', 'Ce cours explore les questions d\'éthique en milieu professionnel.'),
(16, 8, 16, 'Théories de la justice', 'Ce cours présente les différentes théories de la justice en philosophie politique.'),
(17, 9, 17, 'Offre et demande sur le marché', 'Ce cours explore les concepts de l\'offre et de la demande en économie de marché.'),
(18, 9, 18, 'Politiques fiscales', 'Ce cours examine les politiques fiscales en macroéconomie.'),
(19, 10, 19, 'Climats méditerranéens', 'Ce cours étudie les caractéristiques des climats méditerranéens.'),
(20, 10, 20, 'Climats polaires', 'Ce cours explore les particularités des climats polaires.');

-- --------------------------------------------------------

--
-- Table structure for table `cr??e`
--

CREATE TABLE `cr??e` (
  `Id_users` int(11) NOT NULL,
  `Id_blocnote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `envoie`
--

CREATE TABLE `envoie` (
  `Id_users` int(11) NOT NULL,
  `Id_Tokens` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `id_cours` int(11) DEFAULT NULL,
  `nom` varchar(35) NOT NULL,
  `prenom` varchar(35) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `titre` varchar(35) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`id`, `id_cours`, `nom`, `prenom`, `profession`, `titre`, `description`, `date`, `heure_debut`, `heure_fin`) VALUES
(1, NULL, 'GILLET', 'Tristan', 'Musicien', 'Cours de piano', 'Travail sur les partitions de Véronique Sanson', '2024-05-24', '14:25:00', '15:30:00'),
(3, NULL, 'Sanson', 'Véronique', 'Chanteuse, musicienne, compositrice ', 'Concert au Grand Rex', 'dernier concert au grand rex pour la tournée Hasta Luego', '2024-06-04', '20:00:00', '22:00:00'),
(5, NULL, 'Farmer', 'Mylène', 'Musicienne, chanteuse, compositrice', 'Concert Nevermore Tour', 'dernier concert au Stade de France pour la tournée Nevermore de Mylène Farmer', '2024-10-01', '20:00:00', '23:00:00'),
(9, 12, 'Harris', 'Thomas', 'Psychologue', 'Conférence Santé mentale', 'Une conférence sur l\'importance de la santé mentale et du bien-être.', '2024-05-19', '10:00:00', '12:00:00'),
(10, 13, 'Clark', 'Olivia', 'Journaliste', 'Séminaire Investigation', 'Un séminaire pour les journalistes désireux d\'approfondir leurs compétences en journalisme d\'investigation.', '2024-05-20', '13:00:00', '15:00:00'),
(11, 14, 'Lewis', 'Daniel', 'Consultant en RH', 'Table ronde Changement', 'Une discussion sur les meilleures pratiques en matière de gestion du changement.', '2024-05-21', '11:00:00', '13:00:00'),
(12, 15, 'Young', 'Isabella', 'Artiste', 'Atelier Art', 'Un atelier pour explorer les tendances et les techniques de l\'art contemporain.', '2024-05-22', '15:00:00', '17:00:00'),
(13, 16, 'Allen', 'Ethan', 'Architecte', 'Conférence Architecture', 'Une conférence sur les principes et les pratiques de l\'architecture durable.', '2024-05-23', '09:00:00', '11:00:00'),
(14, 17, 'Wright', 'Ava', 'Écrivain', 'Séminaire Créativité', 'Un séminaire pour les écrivains souhaitant perfectionner leur art.', '2024-05-24', '14:00:00', '16:00:00'),
(16, 19, 'Evans', 'Harper', 'Économiste', 'Table ronde Économie', 'Une discussion sur les défis et les opportunités de l\'économie mondiale.', '2024-05-30', '13:00:00', '15:00:00'),
(17, 20, 'Baker', 'Scarlett', 'Ingénieur logiciel', 'Atelier Applications', 'Un atelier pratique pour apprendre à développer des applications mobiles.', '2024-05-27', '11:00:00', '13:00:00'),
(20, 6, 'Green', 'Lucas', 'Architecte d\'intérieur', 'Atelier Aménagement', 'Un atelier pour découvrir les dernières tendances en matière d\'aménagement intérieur.', '2024-05-30', '14:00:00', '16:00:00'),
(32, 12, 'Lopez', 'Aria', 'Entrepreneur', 'Conférence Entrepreneuriat', 'Une conférence inspirante pour les entrepreneurs en herbe.', '2024-05-19', '09:00:00', '11:00:00'),
(33, 13, 'Scott', 'Evelyn', 'Avocat', 'Atelier Données', 'Un atelier sur les meilleures pratiques en matière de protection des données.', '2024-05-20', '14:00:00', '16:00:00'),
(34, 14, 'Green', 'Landon', 'Psychologue', 'Conférence Santé mentale', 'Une conférence sur l\'importance de la santé mentale et du bien-être.', '2024-05-21', '10:00:00', '12:00:00'),
(35, 15, 'Baker', 'Zoe', 'Journaliste', 'Séminaire Investigation', 'Un séminaire pour les journalistes désireux d\'approfondir leurs compétences en journalisme d\'investigation.', '2024-05-22', '13:00:00', '15:00:00'),
(36, 16, 'Taylor', 'Xavier', 'Consultant en RH', 'Table ronde Changement', 'Une discussion sur les meilleures pratiques en matière de gestion du changement.', '2024-05-23', '11:00:00', '13:00:00'),
(37, 4, 'GILLET', 'Tristan', 'Physicien ', 'Loi de l\'électromagnétisme ', 'Cours sur les lois de l\'électromagnétisme ', '2024-07-17', '10:00:00', '11:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `forum_categories`
--

CREATE TABLE `forum_categories` (
  `categorie_id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `forum_commentaires`
--

CREATE TABLE `forum_commentaires` (
  `commentaire_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forum_commentaires`
--

INSERT INTO `forum_commentaires` (`commentaire_id`, `message_id`, `utilisateur_id`, `contenu`, `date_creation`) VALUES
(1, 1, 25, 'bla', '2024-05-07 10:26:54'),
(2, 1, 11, 'alors cette histoire de cours ?', '2024-05-07 10:27:13'),
(3, 1, 43, 'Véronique sanson au piano c\'est une pépite', '2024-05-07 10:27:36'),
(4, 1, 25, 'full d\'accord', '2024-05-07 10:35:47'),
(5, 1, 25, 'bla', '2024-05-07 10:40:09'),
(6, 1, 25, 'bla', '2024-05-07 10:40:36'),
(7, 2, 25, 'aucune fcking idée', '2024-05-07 10:41:16'),
(8, 1, 25, 'qszdfghvjbk', '2024-05-11 15:49:38'),
(9, 4, 25, 'vefaz', '2024-05-12 16:00:34'),
(10, 4, 25, 'yjtterhtyr', '2024-05-12 16:00:36'),
(11, 4, 25, 'a', '2024-05-13 09:03:00'),
(12, 3, 25, 'bla', '2024-05-18 22:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `forum_messages`
--

CREATE TABLE `forum_messages` (
  `message_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forum_messages`
--

INSERT INTO `forum_messages` (`message_id`, `utilisateur_id`, `titre`, `contenu`, `date_creation`) VALUES
(1, 25, 'Cours de piano', NULL, '2024-05-06 15:59:11'),
(2, 25, 'Comment fonctionne ses satanées Vms ???', NULL, '2024-04-06 16:11:29'),
(3, 25, 'Design ?', NULL, '2024-05-07 10:41:35'),
(4, 25, 'Concert Nevermore Tour', NULL, '2024-05-12 16:00:22'),
(5, 25, 'A quand la fin du PA ?', NULL, '2024-05-19 14:38:41'),
(6, 25, 'l\'iPhone est surcoté ?', NULL, '2024-05-19 14:41:19'),
(7, 25, 'Allah de Véronique sanson, pourquoi sa tête est mise à prix', NULL, '2024-05-19 14:43:42'),
(8, 25, 'Recherche de stage', NULL, '2024-05-19 14:44:58'),
(9, 25, 'Cours de piano', NULL, '2024-05-19 15:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `forum_message_categories`
--

CREATE TABLE `forum_message_categories` (
  `message_id` int(11) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hashtags`
--

CREATE TABLE `hashtags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hashtags`
--

INSERT INTO `hashtags` (`id`, `name`) VALUES
(1, 'Annonces'),
(2, 'Discussions Générales'),
(3, 'Support Technique'),
(4, 'Technologie'),
(5, 'Programmation'),
(6, 'Divertissement'),
(7, 'Santé et Bien-être'),
(8, 'Voyages'),
(9, 'Cuisine'),
(10, 'Événements'),
(11, 'Art'),
(12, 'Carrière et Emploi'),
(13, 'Cours');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `niveau` varchar(20) DEFAULT NULL,
  `utilisateur` varchar(45) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `date`, `niveau`, `utilisateur`, `message`) VALUES
(1, '2024-04-19 07:26:18', ' réussi', 'shems@shems.com', 'Tentative de connexion'),
(2, '2024-04-19 07:37:23', ' réussi', 'shems@shems.com', 'Tentative de connexion'),
(3, '2024-04-19 07:40:22', ' réussi', 'shems@shems.com', 'Tentative de connexion'),
(4, '2024-04-19 07:45:01', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(5, '2024-04-19 07:46:12', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(6, '2024-04-19 10:16:02', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(7, '2024-04-19 11:10:02', ' réussi', 'tgillet6@myges.fr', 'Tentative de connexion'),
(8, '2024-04-19 11:10:28', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(9, '2024-04-19 11:34:03', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(10, '2024-04-19 11:48:02', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(11, '2024-04-19 11:49:41', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(12, '2024-04-22 09:42:59', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(13, '2024-04-22 09:44:24', ' réussi', 'macron@macron.fr', 'Tentative de connexion'),
(14, '2024-04-22 09:48:26', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(15, '2024-04-22 10:10:11', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(16, '2024-04-22 11:11:39', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(17, '2024-04-22 16:16:27', ' réussi', 'titi43505@gmail.com', 'Tentative de connexion'),
(18, '2024-04-23 07:01:48', ' réussi', 'titi@gmail.com', 'Tentative de connexion'),
(19, '2024-04-23 07:03:41', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(20, '2024-04-23 11:02:02', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(21, '2024-04-27 10:52:08', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(22, '2024-04-27 14:01:19', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(23, '2024-04-27 16:06:53', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(24, '2024-04-27 16:10:55', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(25, '2024-04-27 16:19:49', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(26, '2024-04-27 16:22:17', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(27, '2024-04-27 18:46:22', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(28, '2024-04-27 19:52:48', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(29, '2024-04-27 20:30:37', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(30, '2024-04-28 10:32:27', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(31, '2024-04-28 11:36:24', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(32, '2024-04-29 06:25:49', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(33, '2024-04-30 14:30:57', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(34, '2024-04-30 20:53:00', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(35, '2024-05-01 07:57:48', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(36, '2024-05-01 19:18:11', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(37, '2024-05-03 09:47:44', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(38, '2024-05-06 13:41:22', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(39, '2024-05-07 14:39:07', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(40, '2024-05-09 13:16:46', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(41, '2024-05-09 13:20:13', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(42, '2024-05-09 16:28:22', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(43, '2024-05-10 13:36:32', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(44, '2024-05-12 13:51:23', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(45, '2024-05-16 09:42:36', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(46, '2024-05-17 14:32:05', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(47, '2024-05-17 20:00:43', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(48, '2024-05-17 20:01:18', ' échouée', 'admin@guepstar.com', 'Tentative de connexion'),
(49, '2024-05-17 20:01:20', ' échouée', 'admin@guepstar.com', 'Tentative de connexion'),
(50, '2024-05-17 20:01:24', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(51, '2024-05-18 20:27:28', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(52, '2024-05-18 20:29:42', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(53, '2024-05-19 06:36:26', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(54, '2024-05-19 09:02:21', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(55, '2024-05-19 12:34:50', ' réussi', 'admin@guepstar.com', 'Tentative de connexion'),
(56, '2024-05-20 07:41:47', ' réussi', 'jeanmarc@gmail.com', 'Tentative de connexion'),
(57, '2024-05-20 07:50:42', ' réussi', 'jeanmarc@gmail.com', 'Tentative de connexion'),
(58, '2024-05-20 07:51:47', ' réussi', 'jeanmarc@gmail.com', 'Tentative de connexion'),
(59, '2024-05-20 07:53:01', ' réussi', 'jeanmarc@gmail.com', 'Tentative de connexion'),
(60, '2024-05-20 07:56:09', ' réussi', 'jeanmarc@gmail.com', 'Tentative de connexion'),
(61, '2024-05-20 09:28:04', ' réussi', 'administrateur@guepstar.com', 'Tentative de connexion');

-- --------------------------------------------------------

--
-- Table structure for table `matieres`
--

CREATE TABLE `matieres` (
  `id` int(11) NOT NULL,
  `nom` text,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matieres`
--

INSERT INTO `matieres` (`id`, `nom`, `description`) VALUES
(2, 'Physique', ''),
(3, 'Chimie', ''),
(4, 'Informatique', ''),
(5, 'Biologie', ''),
(6, 'Histoire', ''),
(7, 'Langues', ''),
(8, 'Philosophie', ''),
(9, 'Économie', ''),
(10, 'Géographie', '');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `auteur` varchar(45) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titre` text NOT NULL,
  `texte` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `auteur`, `date`, `titre`, `texte`) VALUES
(1, 'Admin', '2024-05-11 07:00:00', 'Nouvelle édition de la newsletter', 'Découvrez les dernières actualités et mises à jour de notre plateforme !'),
(2, 'MarketingTeam', '2024-05-11 08:15:00', 'Promotion spéciale pour nos abonnés', 'Profitez de réductions exclusives sur une sélection de produits pour une durée limitée !'),
(3, 'TechTeam', '2024-05-11 09:30:00', 'Nouvelles fonctionnalités disponibles', 'Découvrez les dernières fonctionnalités ajoutées à notre service pour améliorer votre expérience utilisateur.'),
(4, 'CustomerSupport', '2024-05-11 10:45:00', 'Nouveaux horaires de support', 'Nos horaires de support ont été étendus pour mieux vous servir. Contactez-nous pour toute assistance.'),
(5, 'Admin', '2024-05-11 12:00:00', 'Invitation à notre prochain événement', 'Vous êtes cordialement invités à participer à notre événement spécial le mois prochain. Réservez votre place dès maintenant !'),
(6, 'MarketingTeam', '2024-05-11 13:15:00', 'Concours exclusif pour nos abonnés', 'Participez à notre concours et gagnez des prix incroyables ! Consultez notre newsletter pour plus de détails.'),
(7, 'TechTeam', '2024-05-11 14:30:00', 'Prochaines mises à jour du produit', 'Restez à l écoute pour les prochaines mises à jour et améliorations de notre produit.'),
(8, 'CustomerSupport', '2024-05-11 15:45:00', 'Rappel : Programme de fidélité', 'N oubliez pas de vous inscrire à notre programme de fidélité pour bénéficier d avantages exclusifs !'),
(9, 'Admin', '2024-05-11 17:00:00', 'Message important aux abonnés', 'Consultez notre dernière newsletter pour des informations importantes concernant notre service.'),
(10, 'MarketingTeam', '2024-05-11 18:15:00', 'Sondage : Votre avis compte !', 'Partagez votre avis avec nous en répondant à notre sondage. Votre feedback est essentiel pour nous aider à améliorer nos services.'),
(11, 'TechTeam', '2024-05-11 19:30:00', 'Maintenance prévue ce week-end', 'Veuillez noter qu une maintenance est prévue ce week-end. Nous nous excusons pour tout inconvénient.'),
(12, 'CustomerSupport', '2024-05-11 20:45:00', 'Assistance technique disponible 24/7', 'Notre équipe d assistance technique est disponible 24 heures sur 24, 7 jours sur 7 pour répondre à vos questions et résoudre vos problèmes.'),
(13, 'Admin', '2024-05-11 07:00:00', 'Nouveau contenu disponible', 'Consultez notre dernière newsletter pour découvrir le nouveau contenu ajouté à notre plateforme.'),
(14, 'MarketingTeam', '2024-05-12 08:15:00', 'Offre spéciale pour nos abonnés', 'Profitez d une remise spéciale en tant qu abonné à notre newsletter ! Utilisez le code promo lors de votre prochain achat.'),
(15, 'TechTeam', '2024-05-12 09:30:00', 'Mise à jour de sécurité importante', 'Une mise à jour de sécurité critique a été déployée. Assurez-vous de mettre à jour votre logiciel dès que possible.'),
(16, 'CustomerSupport', '2024-05-12 10:45:00', 'Assistance en ligne améliorée', 'Nous avons amélioré notre système d assistance en ligne pour une meilleure expérience utilisateur.'),
(17, 'Admin', '2024-05-12 12:00:00', 'Webinaire exclusif pour nos abonnés', 'Inscrivez-vous dès maintenant à notre webinaire exclusif pour en apprendre davantage sur nos produits et services.'),
(18, 'TheWhiteSun', '2024-05-07 16:40:36', 'Newsletter n1 - GuepStar Formation', 'Test de newsletter pour voir si ça marche'),
(19, 'TechTeam', '2024-05-12 14:30:00', 'Guide de dépannage rapide', 'Consultez notre guide de dépannage rapide pour résoudre rapidement les problèmes courants.'),
(20, 'CustomerSupport', '2024-05-12 15:45:00', 'Nouveaux canaux de support disponibles', 'Nous avons ajouté de nouveaux canaux de support pour vous offrir une assistance encore meilleure !'),
(21, 'MarketingTeam', '2024-05-12 13:15:00', 'Récapitulatif des dernières offres', 'Consultez notre newsletter pour un récapitulatif des dernières offres et promotions.');

-- --------------------------------------------------------

--
-- Table structure for table `participe`
--

CREATE TABLE `participe` (
  `Id_cours` int(11) NOT NULL,
  `Id_Users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recoit`
--

CREATE TABLE `recoit` (
  `Id_NewsLetter` int(11) NOT NULL,
  `Id_Users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `relier`
--

CREATE TABLE `relier` (
  `Id_users` int(11) NOT NULL,
  `Id_logs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_evenement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`id`, `id_user`, `id_evenement`) VALUES
(1, 25, 1),
(12, 25, 1),
(13, 25, 5),
(14, 25, 12),
(15, 25, 35),
(16, 25, 14),
(17, 25, 37),
(18, 25, 17);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `note` int(5) NOT NULL,
  `id_cours` int(11) NOT NULL,
  `avis` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `Id` int(11) NOT NULL,
  `Heure_debut` char(5) NOT NULL,
  `Heure_fin` char(5) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `DateSession` date NOT NULL,
  `Id_Cours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `expiration` int(11) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_card` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `montant` char(11) NOT NULL,
  `type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `id_user`, `id_card`, `date`, `montant`, `type`) VALUES
(1, 43, 15, '2024-05-11 09:00:00', '50.00', 'V'),
(2, 44, 15, '2024-05-11 10:15:00', '75.50', 'V'),
(3, 103, 15, '2024-05-11 11:30:00', '30.25', 'V'),
(4, 57, 15, '2024-05-11 12:45:00', '100.00', 'V'),
(5, 60, 15, '2024-05-11 14:00:00', '20.75', 'V'),
(6, 58, 15, '2024-05-11 15:15:00', '45.80', 'V'),
(7, 25, 16, '2024-05-10 00:22:38', '11.99', '+'),
(8, 25, 16, '2024-05-10 00:25:05', '11.99', '+'),
(9, 25, 16, '2024-05-10 00:25:14', '11.99', '+'),
(10, 25, 16, '2024-05-10 00:26:27', '46.99', '+'),
(11, 25, 16, '2024-05-10 00:30:41', '91.99', '+'),
(12, 25, 16, '2024-05-10 00:33:32', '91.99', '+'),
(13, 25, 16, '2024-05-11 17:55:56', '46.99', '+'),
(16, 60, 15, '2024-05-12 12:45:00', '95.00', 'V'),
(17, 25, 15, '2024-05-12 14:00:00', '10.75', 'V'),
(18, 43, 15, '2024-05-12 15:15:00', '50.80', 'V'),
(19, 45, 15, '2024-05-12 16:30:00', '75.20', 'V'),
(20, 44, 15, '2024-05-12 17:45:00', '20.00', 'V'),
(21, 43, 15, '2024-05-11 16:30:00', '90.20', 'V'),
(22, 54, 15, '2024-05-11 17:45:00', '60.00', 'V'),
(23, 57, 15, '2024-05-11 19:00:00', '35.50', 'V'),
(24, 59, 15, '2024-05-11 20:15:00', '55.25', 'V'),
(25, 51, 15, '2024-05-11 21:30:00', '70.00', 'V'),
(26, 43, 15, '2024-05-11 22:45:00', '85.75', 'V'),
(27, 49, 15, '2024-05-11 09:00:00', '40.00', 'V'),
(28, 48, 15, '2024-05-12 10:15:00', '25.50', 'V'),
(29, 61, 15, '2024-05-12 11:30:00', '80.25', 'V'),
(30, 25, 16, '2024-05-12 17:56:31', '46.99', '+'),
(31, 25, 16, '2024-05-19 00:44:37', '91.99', '+'),
(32, 25, 16, '2024-05-19 23:42:26', '46.99', '+'),
(33, 25, 16, '2024-05-19 23:47:37', '91.99', '+');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(128) NOT NULL,
  `prenom` varchar(128) NOT NULL,
  `numero_telephone` varchar(10) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `code_postal` varchar(5) DEFAULT NULL,
  `Region` varchar(30) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `image` text,
  `verif_u` int(4) NOT NULL DEFAULT '0',
  `verif_f` int(65) DEFAULT NULL,
  `date_insc` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `credit` int(11) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `numero_telephone`, `adresse`, `ville`, `code_postal`, `Region`, `pays`, `email`, `password`, `cv`, `image`, `verif_u`, `verif_f`, `date_insc`, `credit`) VALUES
(11, 'AIT ALI SLIMANE', 'Ahmed', NULL, NULL, NULL, NULL, '', NULL, 'shems1@shems.fr', '3fd32eaaf2ac5d83835d9f6412880845c6af1f6d499bad0ac584340c90e399c6', 'default.jpg', NULL, 0, 1, '2024-05-07 18:04:08', 5),
(25, 'Angel', 'Dynamite', '0783091529', '7 allee du bois des Chenes', 'Sucy-en-Brie', '94370', '', 'France', 'admin@guepstar.com', 'a8af4bd8108e921cfcc6f199100f236edd4e815d3636150cd5c07fd08df5294e', 'default.jpg', 'image-1714247364.jpg', 2, 2, '2024-05-07 18:04:08', 10),
(43, 'Véronique', 'Sanson', NULL, NULL, NULL, NULL, NULL, NULL, 'azerty@luego.fr', '31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f6', 'default.jpg', 'default.jpg', 0, 0, '2023-05-07 18:04:08', 5),
(44, 'Doe', 'John', '0123456789', '123 Main Street', 'New York', '10001', 'New York', 'USA', 'john.doe@example.com', '31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f6', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:23:35', 5),
(45, 'Smith', 'Jane', '9876543210', '456 Elm Street', 'Los Angeles', '90001', 'California', 'USA', 'jane.smith@example.com', '31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f6', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:23:35', 5),
(46, 'Johnson', 'Michael', '1234567890', '789 Oak Street', 'Chicago', '60601', 'Illinois', 'USA', 'michael.johnson@example.com', '31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f6', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:23:35', 5),
(47, 'Brown', 'Emily', '0987654321', '321 Pine Street', 'Houston', '77001', 'Texas', 'USA', 'emily.brown@example.com', '31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f6', 'default.jpg', NULL, 0, NULL, '2023-05-09 19:23:35', 5),
(48, 'Williams', 'David', '1112223333', '654 Maple Street', 'Phoenix', '85001', 'Arizona', 'USA', 'david.williams@example.com', '31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f6', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:23:35', 5),
(49, 'Martinez', 'Maria', '4445556666', '987 Cedar Street', 'Philadelphia', '19019', 'Pennsylvania', 'USA', 'maria.martinez@example.com', '31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f6', 'default.jpg', NULL, 0, NULL, '2023-05-09 19:23:35', 5),
(50, 'Garcia', 'Daniel', '7778889999', '654 Birch Street', 'San Antonio', '78201', 'Texas', 'USA', 'daniel.garcia@example.com', '31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f6', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:23:35', 5),
(51, 'Brown', 'Jennifer', '1231231234', '321 Walnut Street', 'San Diego', '92101', 'California', 'USA', 'jennifer.brown@example.com', '31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f6', 'default.jpg', NULL, 0, NULL, '2023-05-09 19:23:35', 5),
(52, 'Taylor', 'Christopher', '4564564567', '654 Cherry Street', 'Dallas', '75201', 'Texas', 'USA', 'christopher.taylor@example.com', 'p31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:23:35', 5),
(53, 'Rodriguez', 'Jessica', '7897897890', '987 Pineapple Street', 'San Jose', '95101', 'California', 'USA', 'jessica.rodriguez@example.com', '31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f6', 'default.jpg', NULL, 0, NULL, '2023-05-09 19:23:35', 5),
(54, 'Gonzalez', 'James', '9876543210', '123 Orange Street', 'Austin', '78701', 'Texas', 'USA', 'james.gonzalez@example.com', '31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f6', 'default.jpg', NULL, 0, NULL, '2023-05-09 19:23:35', 5),
(55, 'Nelson', 'Mary', '1234567890', '456 Lemon Street', 'Jacksonville', '32201', 'Florida', 'USA', 'mary.nelson@example.com', '31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f6', 'default.jpg', NULL, 0, NULL, '2023-05-09 19:23:35', 5),
(56, 'Hernandez', 'Robert', '0987654321', '789 Grape Street', 'San Francisco', '94101', 'California', 'USA', 'robert.hernandez@example.com', '31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f6', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:23:35', 5),
(57, 'Smith', 'Jessica', '1112223333', '654 Peach Street', 'Indianapolis', '46201', 'Indiana', 'USA', 'jessica.smith@example.com', '31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f6', 'default.jpg', NULL, 0, NULL, '2023-05-09 19:23:35', 5),
(58, 'Lee', 'David', '4445556666', '987 Banana Street', 'Columbus', '43201', 'Ohio', 'USA', 'david.lee@example.com', '31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f6', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:23:35', 5),
(59, 'Walker', 'Ashley', '7778889999', '321 Pear Street', 'Charlotte', '28201', 'North Carolina', 'USA', 'ashley.walker@example.com', '31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f6', 'default.jpg', NULL, 0, NULL, '2023-05-09 19:23:35', 5),
(60, 'Wright', 'Daniel', '1231231234', '654 Strawberry Street', 'Fort Worth', '76101', 'Texas', 'USA', 'daniel.wright@example.com', '31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f6', 'default.jpg', NULL, 0, NULL, '2023-05-09 19:23:35', 5),
(61, 'Nguyen', 'Sarah', '4564564567', '987 Blueberry Street', 'Detroit', '48201', 'Michigan', 'USA', 'sarah.nguyen@example.com', '31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f6', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:23:35', 5),
(62, 'Mitchell', 'William', '7897897890', '321 Watermelon Street', 'El Paso', '79901', 'Texas', 'USA', 'william.mitchell@example.com', '31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f6', 'default.jpg', NULL, 0, NULL, '2023-05-09 19:23:35', 5),
(63, 'Perez', 'Samantha', '9876543210', '654 Kiwi Street', 'Seattle', '98101', 'Washington', 'USA', 'samantha.perez@example.com', '31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f6', 'default.jpg', NULL, 0, NULL, '2023-05-09 19:23:35', 5),
(65, 'Lewis', 'Lauren', '0987654321', '321 Coconut Street', 'Washington', '20001', 'District of Columbia', 'USA', 'lauren.lewis@example.com', '31cd501c20daa7f2077244748b95964f7b66feec09cc9d0e8b16abda356da4f6', 'default.jpg', NULL, 0, NULL, '2023-05-09 19:23:35', 5),
(66, 'Taylor', 'Ryan', '1112223333', '654 Raspberry Street', 'Memphis', '38101', 'Tennessee', 'USA', 'ryan.taylor@example.com', 'password123', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:23:35', 5),
(67, 'Hall', 'Amanda', '4445556666', '987 Pineapple Street', 'Boston', '02101', 'Massachusetts', 'USA', 'amanda.hall@example.com', 'password456', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:23:35', 5),
(68, 'Young', 'Steven', '7778889999', '321 Orange Street', 'Nashville', '37201', 'Tennessee', 'USA', 'steven.young@example.com', 'passwordabc', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:23:35', 5),
(69, 'Clark', 'Elizabeth', '1231231234', '654 Lemon Street', 'Baltimore', '21201', 'Maryland', 'USA', 'elizabeth.clark@example.com', 'passwordxyz', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:23:35', 5),
(70, 'Johnson', 'Matthew', '4564564567', '987 Grape Street', 'Louisville', '40201', 'Kentucky', 'USA', 'matthew.johnson@example.com', 'password123', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:23:35', 5),
(71, 'Williams', 'Kayla', '7897897890', '321 Strawberry Street', 'Milwaukee', '53201', 'Wisconsin', 'USA', 'kayla.williams@example.com', 'password456', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:23:35', 5),
(72, 'Martinez', 'Tyler', '9876543210', '654 Peach Street', 'Portland', '97201', 'Oregon', 'USA', 'tyler.martinez@example.com', 'passwordabc', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:23:35', 5),
(73, 'Brown', 'Megan', '1234567890', '987 Apple Street', 'Oklahoma City', '73101', 'Oklahoma', 'USA', 'megan.brown@example.com', 'passwordxyz', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:23:35', 5),
(103, 'Dubois', 'Pierre', '0123456789', '123 Rue Principale', 'Paris', '75001', 'Île-de-France', 'France', 'pierre.dubois@example.com', 'motdepasse123', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(104, 'Müller', 'Hans', '9876543210', '456 Hauptstraße', 'Berlin', '10115', 'Berlin', 'Allemagne', 'hans.muller@example.com', 'password456', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(105, 'Rossi', 'Giuseppe', '1234567890', '789 Via Roma', 'Rome', '00184', 'Latium', 'Italie', 'giuseppe.rossi@example.com', 'password789', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(106, 'Santos', 'Maria', '0987654321', '321 Rua Principal', 'Lisbonne', '11014', 'Lisbonne', 'Portugal', 'maria.santos@example.com', 'passwordabc', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(107, 'García', 'Juan', '1112223333', '654 Calle Mayor', 'Madrid', '28013', 'Madrid', 'Espagne', 'juan.garcia@example.com', 'passwordxyz', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(108, 'Smith', 'John', '4445556666', '987 High Street', 'Londres', '84365', 'Angleterre', 'Royaume-Uni', 'john.smith@example.com', 'password123', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(109, 'Müller', 'Andrea', '7778889999', '321 Hauptstraße', 'Munich', '80331', 'Bavière', 'Allemagne', 'andrea.muller@example.com', 'password456', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(110, 'Schneider', 'Michael', '1231231234', '654 Lindenstraße', 'Francfort', '60311', 'Hesse', 'Allemagne', 'michael.schneider@example.com', 'password789', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(111, 'Rossi', 'Alessandra', '4564564567', '987 Corso Italia', 'Turin', '10123', 'Piemont', 'Italie', 'alessandra.rossi@example.com', 'passwordabc', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(112, 'Fernández', 'Luis', '7897897890', '321 Avenida de la Constitución', 'Séville', '41004', 'Andalousie', 'Espagne', 'luis.fernandez@example.com', 'passwordxyz', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(113, 'Müller', 'Anna', '9876543210', '654 Friedenstraße', 'Hambourg', '20095', 'Hambourg', 'Allemagne', 'anna.muller@example.com', 'password123', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(114, 'López', 'Carmen', '1234567890', '987 Calle Mayor', 'Barcelone', '08002', 'Catalogne', 'Espagne', 'carmen.lopez@example.com', 'password456', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(115, 'Smith', 'Emily', '0987654321', '321 Queen Street', 'Édimbourg', '12954', 'Écosse', 'Royaume-Uni', 'emily.smith@example.com', 'passwordabc', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(116, 'Bianchi', 'Mario', '1112223333', '987 Via Roma', 'Milan', '20121', 'Lombardie', 'Italie', 'mario.bianchi@example.com', 'passwordxyz', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(118, 'Dupont', 'Sophie', '7778889999', '987 Rue de la Paix', 'Nice', '06000', 'Provence-Alpes-Côte d\'Azur', 'France', 'sophie.dupont@example.com', 'password456', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(119, 'Keller', 'Martin', '1231231234', '321 Bahnhofstraße', 'Stuttgart', '70173', 'Bade-Wurtemberg', 'Allemagne', 'martin.keller@example.com', 'password789', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(121, 'Moreno', 'Ana', '7897897890', '321 Calle de Alcalá', 'Madrid', '28001', 'Madrid', 'Espagne', 'ana.moreno@example.com', 'passwordxyz', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(123, 'Rocha', 'Carlos', '1234567890', '321 Praça de Espanha', 'Lisbonne', '10710', 'Lisbonne', 'Portugal', 'carlos.rocha@example.com', 'password456', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(124, 'Fischer', 'Laura', '0987654321', '987 Fischerweg', 'Berlin', '10117', 'Berlin', 'Allemagne', 'laura.fischer@example.com', 'passwordabc', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(125, 'Silva', 'Miguel', '1112223333', '321 Rua de Santa Catarina', 'Porto', '40546', 'Porto', 'Portugal', 'miguel.silva@example.com', 'passwordxyz', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(126, 'Wagner', 'Andreas', '4445556666', '987 Richard-Wagner-Straße', 'Leipzig', '04109', 'Saxe', 'Allemagne', 'andreas.wagner@example.com', 'password123', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(127, 'Carvalho', 'Rui', '7778889999', '321 Rua do Carmo', 'Lisbonne', '12894', 'Lisbonne', 'Portugal', 'rui.carvalho@example.com', 'password456', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(128, 'Weber', 'Sabine', '1231231234', '987 Weberstraße', 'Cologne', '50667', 'Rhénanie-du-Nord-Westphalie', 'Allemagne', 'sabine.weber@example.com', 'password789', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(129, 'Fernández', 'Antonio', '4564564567', '321 Calle de Alcalá', 'Madrid', '28001', 'Madrid', 'Espagne', 'antonio.fernandez@example.com', 'passwordabc', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(130, 'Oliveira', 'Joana', '7897897890', '987 Avenida da Liberdade', 'Lisbonne', '12140', 'Lisbonne', 'Portugal', 'joana.oliveira@example.com', 'passwordxyz', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(131, 'Klein', 'Thomas', '9876543210', '321 Kleinstraße', 'Munich', '80331', 'Bavière', 'Allemagne', 'thomas.klein@example.com', 'password123', 'default.jpg', NULL, 0, NULL, '2024-05-09 19:32:35', 5),
(132, 'jean', 'marc', '0766105124', '7 AVENUE DES CHAMPS FLEURIS', 'Poissy', '78300', 'Yvelines', 'France', 'jeanmarc@gmail.com', 'e94f6d9c62d85e73c37fa132574315b9a8f7a35bb137b68c0fd699b18ebab4d2', 'default.jpg', 'image-1716198102.jpg', 0, 1, '2024-05-20 11:41:42', 5),
(133, 'administrateur', 'administrateur', '0847528230', '7 AVENUE DE CHEZ MOI', 'Sananes', '26739', 'Centre-Val de Loire', 'Sananes', 'administrateur@guepstar.com', 'e94f6d9c62d85e73c37fa132574315b9a8f7a35bb137b68c0fd699b18ebab4d2', 'default.jpg', 'image-1716204477.png', 0, 0, '2024-05-20 13:27:57', 5);

-- --------------------------------------------------------

--
-- Table structure for table `vid??o`
--

CREATE TABLE `vid??o` (
  `Id` int(11) NOT NULL,
  `Duree` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Titre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `visite`
--

CREATE TABLE `visite` (
  `id` int(11) NOT NULL,
  `id_message` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visite`
--

INSERT INTO `visite` (`id`, `id_message`, `id_user`) VALUES
(1, 4, 25),
(2, 1, 25),
(3, 4, 25),
(4, 1, 25),
(5, 1, 25),
(6, 2, 25),
(7, 8, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocnote`
--
ALTER TABLE `blocnote`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_card_user` (`id_user`);

--
-- Indexes for table `chapitres`
--
ALTER TABLE `chapitres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matiere_id` (`matiere_id`);

--
-- Indexes for table `concerne`
--
ALTER TABLE `concerne`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_message` (`id_message`),
  ADD KEY `fk_id_hashtag` (`id_hashtag`);

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matiere_id` (`matiere_id`),
  ADD KEY `chapitre_id` (`chapitre_id`);

--
-- Indexes for table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cours` (`id_cours`);

--
-- Indexes for table `forum_categories`
--
ALTER TABLE `forum_categories`
  ADD PRIMARY KEY (`categorie_id`);

--
-- Indexes for table `forum_commentaires`
--
ALTER TABLE `forum_commentaires`
  ADD PRIMARY KEY (`commentaire_id`),
  ADD KEY `message_id` (`message_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Indexes for table `forum_messages`
--
ALTER TABLE `forum_messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Indexes for table `forum_message_categories`
--
ALTER TABLE `forum_message_categories`
  ADD KEY `message_id` (`message_id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Indexes for table `hashtags`
--
ALTER TABLE `hashtags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_evenement` (`id_evenement`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_cours` (`id_cours`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_card` (`id_card`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visite`
--
ALTER TABLE `visite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visite` (`id_user`),
  ADD KEY `fk_visite_id_message` (`id_message`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blocnote`
--
ALTER TABLE `blocnote`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `chapitres`
--
ALTER TABLE `chapitres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `concerne`
--
ALTER TABLE `concerne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `forum_categories`
--
ALTER TABLE `forum_categories`
  MODIFY `categorie_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_commentaires`
--
ALTER TABLE `forum_commentaires`
  MODIFY `commentaire_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `forum_messages`
--
ALTER TABLE `forum_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hashtags`
--
ALTER TABLE `hashtags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `visite`
--
ALTER TABLE `visite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blocnote`
--
ALTER TABLE `blocnote`
  ADD CONSTRAINT `blocnote_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `fk_card_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `chapitres`
--
ALTER TABLE `chapitres`
  ADD CONSTRAINT `chapitres_ibfk_1` FOREIGN KEY (`matiere_id`) REFERENCES `matieres` (`id`);

--
-- Constraints for table `concerne`
--
ALTER TABLE `concerne`
  ADD CONSTRAINT `fk_id_hashtag` FOREIGN KEY (`id_hashtag`) REFERENCES `hashtags` (`id`),
  ADD CONSTRAINT `fk_id_message` FOREIGN KEY (`id_message`) REFERENCES `forum_messages` (`message_id`);

--
-- Constraints for table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`matiere_id`) REFERENCES `matieres` (`id`),
  ADD CONSTRAINT `cours_ibfk_2` FOREIGN KEY (`chapitre_id`) REFERENCES `chapitres` (`id`);

--
-- Constraints for table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id`);

--
-- Constraints for table `forum_commentaires`
--
ALTER TABLE `forum_commentaires`
  ADD CONSTRAINT `forum_commentaires_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `forum_messages` (`message_id`),
  ADD CONSTRAINT `forum_commentaires_ibfk_2` FOREIGN KEY (`utilisateur_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `forum_messages`
--
ALTER TABLE `forum_messages`
  ADD CONSTRAINT `forum_messages_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `forum_message_categories`
--
ALTER TABLE `forum_message_categories`
  ADD CONSTRAINT `forum_message_categories_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `forum_messages` (`message_id`),
  ADD CONSTRAINT `forum_message_categories_ibfk_2` FOREIGN KEY (`categorie_id`) REFERENCES `forum_categories` (`categorie_id`);

--
-- Constraints for table `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `reserve_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reserve_ibfk_2` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `cours` (`id`),
  ADD CONSTRAINT `review_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `review_ibfk_4` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id`),
  ADD CONSTRAINT `review_ibfk_5` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`id_card`) REFERENCES `card` (`id`);

--
-- Constraints for table `visite`
--
ALTER TABLE `visite`
  ADD CONSTRAINT `fk_visite_id_message` FOREIGN KEY (`id_message`) REFERENCES `forum_messages` (`message_id`),
  ADD CONSTRAINT `visite_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
