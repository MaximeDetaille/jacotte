-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 14 Avril 2017 à 00:35
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `jacotte`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandemenu`
--

CREATE TABLE IF NOT EXISTS `commandemenu` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idMenu` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `commandemenu`
--

INSERT INTO `commandemenu` (`id`, `idMenu`, `idCommande`, `qte`) VALUES
(3, 14, 3, 5),
(4, 16, 3, 3),
(5, 14, 4, 5),
(6, 16, 4, 3),
(7, 14, 5, 1),
(8, 16, 5, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
