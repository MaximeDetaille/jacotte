-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 21 Avril 2017 à 16:06
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
-- Structure de la table `boisson`
--

CREATE TABLE IF NOT EXISTS `boisson` (
  `id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `nom` text NOT NULL,
  `type` text NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL,
  `qte` int(11) NOT NULL,
  `image` text NOT NULL,
  `allergenes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `boisson`
--

INSERT INTO `boisson` (`id`, `nom`, `type`, `description`, `prix`, `qte`, `image`, `allergenes`) VALUES
(0, 'Coca-Cola', 'Normal', 'Canette de Coca-Cola', 1, 6, '', '0');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ville` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `newsletter` varchar(255) NOT NULL,
  `dateLivraison` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `ville`, `adresse`, `nom`, `tel`, `mail`, `newsletter`, `dateLivraison`) VALUES
(1, 'tourcoing', '13 rue des lillas', 'Detaille', '0661912873', 'maxime.detaille@gmail.com', '1', '14/04/2017'),
(2, 'tourcoing', '13 rue des lillas', 'Detaille', '0661912873', 'maxime.detaille@gmail.com', '1', '14/04/2017'),
(3, 'tourcoing', '13 rue des lillas', 'Detaille', '0661912873', 'maxime.detaille@gmail.com', '1', '15/04/2017'),
(4, 'roubaix', 'fzrg', 'gerg', 'gegsd', 'ergser', '', '18/04/2017'),
(10, 'tourcoing', 'test', 'test', 'test', 'test', '1', '19/04/2017'),
(11, 'roubaix', 'test', 'test', 'test', 'test', '1', '19/04/2017'),
(12, 'roubaix', 'aef', 'fzerf', 'fzsrgf', 'srgsrg', '1', '19/04/2017'),
(13, 'roubaix', 'gvferg', 'getg', 'gesvdtg', 'sdtbgs', '1', '22/04/2017'),
(14, 'roubaix', 'tbegtg', 'gerge', 'egr', 'gergs', '1', '22/04/2017'),
(15, 'roubaix', 'tbegtg', 'gerge', 'egr', 'gergs', '1', '22/04/2017'),
(16, 'roubaix', 'tbegtg', 'gerge', 'egr', 'gergs', '1', '22/04/2017'),
(17, 'roubaix', 'tbegtg', 'gerge', 'egr', 'gergs', '1', '22/04/2017'),
(18, 'roubaix', 'tbegtg', 'gerge', 'egr', 'gergs', '1', '22/04/2017'),
(19, 'roubaix', 'tbegtg', 'gerge', 'egr', 'gergs', '1', '22/04/2017'),
(20, 'roubaix', 'tbegtg', 'gerge', 'egr', 'gergs', '1', '22/04/2017');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `commandemenu`
--

INSERT INTO `commandemenu` (`id`, `idMenu`, `idCommande`, `qte`) VALUES
(26, 67, 15, 1),
(27, 67, 16, 1),
(28, 67, 17, 1),
(29, 67, 18, 1),
(30, 67, 19, 1),
(31, 67, 20, 1);

-- --------------------------------------------------------

--
-- Structure de la table `dessert`
--

CREATE TABLE IF NOT EXISTS `dessert` (
  `id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `nom` text NOT NULL,
  `type` text NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL,
  `qte` int(11) NOT NULL,
  `image` text NOT NULL,
  `allergenes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `dessert`
--

INSERT INTO `dessert` (`id`, `nom`, `type`, `description`, `prix`, `qte`, `image`, `allergenes`) VALUES
(0, 'Moelleux au chocolat', 'Gourmand', 'Moelleux au chocolat', 2, 3, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `entree`
--

CREATE TABLE IF NOT EXISTS `entree` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `type` text NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL,
  `qte` int(11) NOT NULL,
  `image` text NOT NULL,
  `allergenes` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `entree`
--

INSERT INTO `entree` (`id`, `nom`, `type`, `description`, `prix`, `qte`, `image`, `allergenes`) VALUES
(2, 'salade de tomates', 'health', 'salade de tomates toute simple', 2, 0, '', 'rien');

-- --------------------------------------------------------

--
-- Structure de la table `fromage`
--

CREATE TABLE IF NOT EXISTS `fromage` (
  `id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `nom` text NOT NULL,
  `type` text NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL,
  `qte` int(11) NOT NULL,
  `image` text NOT NULL,
  `allergenes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fromage`
--

INSERT INTO `fromage` (`id`, `nom`, `type`, `description`, `prix`, `qte`, `image`, `allergenes`) VALUES
(0, 'Compté', 'Gourmand', 'Lamelle de compté AOP', 1, 3, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `description` text,
  `prix` float NOT NULL,
  `allergenes` text,
  `type` text,
  `image` text NOT NULL,
  `idEntree` int(11) DEFAULT NULL,
  `idPlat` int(11) DEFAULT NULL,
  `idDessert` int(11) DEFAULT NULL,
  `idFromage` int(11) DEFAULT NULL,
  `idBoisson` int(11) DEFAULT NULL,
  `perso` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`id`, `nom`, `description`, `prix`, `allergenes`, `type`, `image`, `idEntree`, `idPlat`, `idDessert`, `idFromage`, `idBoisson`, `perso`) VALUES
(17, 'Menu 1', 'test', 5, 'rien', 'gourmand', 'test', 2, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE IF NOT EXISTS `plat` (
  `id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `nom` text NOT NULL,
  `type` text NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL,
  `qte` int(11) NOT NULL,
  `image` text NOT NULL,
  `allergenes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `plat`
--

INSERT INTO `plat` (`id`, `nom`, `type`, `description`, `prix`, `qte`, `image`, `allergenes`) VALUES
(0, 'Spaghetti bolognaise', 'Gourmand', 'Pâtes avec de la bonne sauce tomate', 3, 3, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
