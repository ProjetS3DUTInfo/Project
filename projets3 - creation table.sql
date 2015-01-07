-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 31 Décembre 2014 à 18:22
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projets3`
--
CREATE DATABASE IF NOT EXISTS `projets3` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projets3`;

-- --------------------------------------------------------

--
-- Structure de la table `conventions`
--

CREATE TABLE IF NOT EXISTS `conventions` (
  `idConvention` int(3) NOT NULL AUTO_INCREMENT,
  `idMembre` int(3) NOT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`idConvention`),
  KEY `idMembre` (`idMembre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE IF NOT EXISTS `entreprises` (
  `idEntreprise` int(3) NOT NULL AUTO_INCREMENT,
  `idMembre` int(3) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `codepostal` int(6) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `aPritStagiaire` tinyint(1) NOT NULL,
  PRIMARY KEY (`idEntreprise`),
  KEY `idMembre` (`idMembre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `idMembre` int(3) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` char(40) NOT NULL,
  `role` int(1) NOT NULL,
  PRIMARY KEY (`idMembre`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE IF NOT EXISTS `offres` (
  `idOffre` int(3) NOT NULL AUTO_INCREMENT,
  `idMembre` int(3) NOT NULL,
  `idEntreprise` int(3) NOT NULL,
  `annee` int(4) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `estDisponible` tinyint(1) NOT NULL,
  PRIMARY KEY (`idOffre`),
  KEY `idMembre` (`idMembre`),
  KEY `idEntreprise` (`idEntreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `postulants`
--

CREATE TABLE IF NOT EXISTS `postulants` (
  `idoffre` int(3) NOT NULL,
  `idMembre` int(3) NOT NULL,
  `heure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idoffre`,`idMembre`),
  KEY `idMembre` (`idMembre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rapports`
--

CREATE TABLE IF NOT EXISTS `rapports` (
  `idRapport` int(3) NOT NULL AUTO_INCREMENT,
  `idMembre` int(3) NOT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`idRapport`),
  KEY `idMembre` (`idMembre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `conventions`
--
ALTER TABLE `conventions`
  ADD CONSTRAINT `conventions_ibfk_1` FOREIGN KEY (`idMembre`) REFERENCES `membres` (`idMembre`);

--
-- Contraintes pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD CONSTRAINT `entreprises_ibfk_1` FOREIGN KEY (`idMembre`) REFERENCES `membres` (`idMembre`);

--
-- Contraintes pour la table `offres`
--
ALTER TABLE `offres`
  ADD CONSTRAINT `offres_ibfk_1` FOREIGN KEY (`idMembre`) REFERENCES `membres` (`idMembre`),
  ADD CONSTRAINT `offres_ibfk_2` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprises` (`idEntreprise`);

--
-- Contraintes pour la table `postulants`
--
ALTER TABLE `postulants`
  ADD CONSTRAINT `postulants_ibfk_1` FOREIGN KEY (`idoffre`) REFERENCES `offres` (`idOffre`),
  ADD CONSTRAINT `postulants_ibfk_2` FOREIGN KEY (`idMembre`) REFERENCES `membres` (`idMembre`);

--
-- Contraintes pour la table `rapports`
--
ALTER TABLE `rapports`
  ADD CONSTRAINT `rapports_ibfk_1` FOREIGN KEY (`idMembre`) REFERENCES `membres` (`idMembre`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
