-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 04 Avril 2017 à 14:00
-- Version du serveur :  5.6.17
-- Version de PHP :  5.6.28

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
-- Structure de la table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL,
  `allergenes` text NOT NULL,
  `type` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`id`, `nom`, `description`, `prix`, `allergenes`, `type`, `image`) VALUES
(14, 'Menu d''été', 'Ce menu contient : assortiment de légumes d''été, etc', 12.99, 'gluten, mais, porc', 'Ecolo', '258cbf9ea4a0190534534d22fbafd4b4.jpg'),
(16, 'Menu lorrain', 'Quiche lorrain + gateau chocolat + boisson', 9.99, 'Gluten, porc, chocolat', 'Gourmand', 'b7a8d3faaf1b9427f86b79a388490f1c.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
