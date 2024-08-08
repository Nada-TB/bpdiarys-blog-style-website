-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 20 juil. 2024 à 14:14
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bpdiarys-db`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `writer` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `login_Id` int NOT NULL,
  `validation` varchar(20) NOT NULL DEFAULT 'invalid',
  `timeDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `timeDate` datetime NOT NULL,
  `comment_Id` int NOT NULL,
  `article_Id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_Id` (`comment_Id`),
  KEY `article_Id` (`article_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `timeDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `timeDate` (`timeDate`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `favorite_articles`
--

DROP TABLE IF EXISTS `favorite_articles`;
CREATE TABLE IF NOT EXISTS `favorite_articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `url` text NOT NULL,
  `login_Id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_Id` (`login_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `birthDate` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `passwordConfirmation` varchar(250) NOT NULL,
  `statusMember` varchar(20) NOT NULL DEFAULT 'member',
  PRIMARY KEY (`id`),
  UNIQUE KEY `firstName` (`firstName`,`lastName`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `subscribe`
--

DROP TABLE IF EXISTS `subscribe`;
CREATE TABLE IF NOT EXISTS `subscribe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`comment_Id`) REFERENCES `login` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`article_Id`) REFERENCES `articles` (`id`);

--
-- Contraintes pour la table `favorite_articles`
--
ALTER TABLE `favorite_articles`
  ADD CONSTRAINT `favorite_articles_ibfk_1` FOREIGN KEY (`login_Id`) REFERENCES `login` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
