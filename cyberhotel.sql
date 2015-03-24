-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 24 Mars 2015 à 10:41
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `cyberhotel`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE IF NOT EXISTS `chambre` (
  `hotel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `dans` date NOT NULL,
  PRIMARY KEY (`hotel`,`numero`),
  KEY `IDX_AB4DD633535ED9` (`hotel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `compteclient`
--

CREATE TABLE IF NOT EXISTS `compteclient` (
  `numero` int(11) NOT NULL,
  `numeroCarteBleue` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reservations` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `hotelexpress`
--

CREATE TABLE IF NOT EXISTS `hotelexpress` (
  `ville` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sejourDans` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ville`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `nuitee`
--

CREATE TABLE IF NOT EXISTS `nuitee` (
  `nuitee` date DEFAULT NULL,
  `date` date NOT NULL,
  `numeroChambre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`numeroChambre`),
  KEY `IDX_8526D730828AD206` (`nuitee`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL,
  `reservation` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `sejour` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C454C68242C84955` (`reservation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sejour`
--

CREATE TABLE IF NOT EXISTS `sejour` (
  `dateDeDebut` date NOT NULL,
  `nbDeJours` int(11) NOT NULL,
  `nuitee` int(11) NOT NULL,
  `sejourReserve` int(11) DEFAULT NULL,
  `DansHotel` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`dateDeDebut`),
  KEY `IDX_9159251E335CC026` (`sejourReserve`),
  KEY `IDX_9159251E2BB92897` (`DansHotel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `FK_AB4DD633535ED9` FOREIGN KEY (`hotel`) REFERENCES `hotelexpress` (`ville`);

--
-- Contraintes pour la table `nuitee`
--
ALTER TABLE `nuitee`
  ADD CONSTRAINT `FK_8526D730828AD206` FOREIGN KEY (`nuitee`) REFERENCES `sejour` (`dateDeDebut`),
  ADD CONSTRAINT `FK_8526D730AB4029DA` FOREIGN KEY (`numeroChambre`) REFERENCES `chambre` (`hotel`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_C454C68242C84955` FOREIGN KEY (`reservation`) REFERENCES `compteclient` (`numero`);

--
-- Contraintes pour la table `sejour`
--
ALTER TABLE `sejour`
  ADD CONSTRAINT `FK_9159251E2BB92897` FOREIGN KEY (`DansHotel`) REFERENCES `hotelexpress` (`ville`),
  ADD CONSTRAINT `FK_9159251E335CC026` FOREIGN KEY (`sejourReserve`) REFERENCES `reservation` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
