-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 28 juin 2023 à 16:43
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_juin_2023`
--
CREATE DATABASE IF NOT EXISTS `projet_juin_2023` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `projet_juin_2023`;

-- --------------------------------------------------------

--
-- Structure de la table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `course`
--

INSERT INTO `course` (`id`, `name`, `code`) VALUES
(1, 'Base des réseaux', '1351'),
(2, 'Environnement et technologies du web', '1352'),
(3, 'SGBD (Système de gestion de bases de données)', '1353'),
(4, 'Création de sites web statiques', '1354'),
(5, 'Approche Design', '1355'),
(6, 'CMS - niveau 1', '1356'),
(7, 'Initiation à la programmation', '1357'),
(8, 'Activités professionnelles de formation', '1358'),
(9, 'Scripts clients', '1359'),
(10, 'Scripts serveurs', '1360'),
(11, 'Framework et POO côté Serveur', '1361'),
(12, 'Projet Web dynamique', '1362'),
(13, 'Veille technologique', '1363'),
(14, 'Epreuve intégrée', '1364'),
(15, 'Anglais UE1', '1783'),
(16, 'Anglais UE2', '1784'),
(17, 'Initiation aux bases de données', '1440'),
(18, 'Principes algorithmiques et programmation', '1442'),
(19, 'Programmation orientée objet', '1443'),
(20, 'Web : principes de base', '1444'),
(21, 'Techniques de gestion de projet', '1448'),
(22, 'Principes d’analyse informatique', '1449'),
(23, 'Eléments de statistique', '1755'),
(24, 'Structure des ordinateurs', '1808'),
(25, 'Gestion et exploitation de bases de données', '1811'),
(26, 'Mathématiques appliquées à l’informatique', '1807'),
(27, 'Bases des réseaux', '1323'),
(28, 'Projet d’analyse et de conception', '1450'),
(29, 'Information et communication professionnelle', '1754'),
(30, 'Produits logiciels de gestion intégrés', '1438'),
(31, 'Administration, gestion et sécurisation des réseaux', '1439'),
(32, 'Projet de développement SGBD', '1446'),
(33, 'Stage d’intégration professionnelle', '1451'),
(34, 'Projet d’intégration de développement', '1447'),
(35, 'Activités professionnelles de formation', '1452'),
(36, 'Epreuve intégrée de la section', '1453');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `lastlogin` datetime NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
