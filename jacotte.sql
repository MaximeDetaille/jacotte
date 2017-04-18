-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 18 Avril 2017 à 08:45
-- Version du serveur :  5.5.54-0+deb8u1
-- Version de PHP :  5.6.29-0+deb8u1

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
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
`id` bigint(20) unsigned NOT NULL,
  `ville` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `newsletter` varchar(255) NOT NULL,
  `dateLivraison` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `ville`, `adresse`, `nom`, `tel`, `mail`, `newsletter`, `dateLivraison`) VALUES
(1, 'tourcoing', '13 rue des lillas', 'Detaille', '0661912873', 'maxime.detaille@gmail.com', '1', '14/04/2017'),
(2, 'tourcoing', '13 rue des lillas', 'Detaille', '0661912873', 'maxime.detaille@gmail.com', '1', '14/04/2017'),
(3, 'tourcoing', '13 rue des lillas', 'Detaille', '0661912873', 'maxime.detaille@gmail.com', '1', '15/04/2017'),
(4, 'roubaix', 'fzrg', 'gerg', 'gegsd', 'ergser', '', '18/04/2017');

-- --------------------------------------------------------

--
-- Structure de la table `commandemenu`
--

CREATE TABLE IF NOT EXISTS `commandemenu` (
`id` bigint(20) unsigned NOT NULL,
  `idMenu` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `qte` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commandemenu`
--

INSERT INTO `commandemenu` (`id`, `idMenu`, `idCommande`, `qte`) VALUES
(1, 14, 1, 1),
(2, 16, 1, 3),
(3, 14, 2, 1),
(4, 16, 2, 5),
(5, 14, 3, 3),
(6, 16, 3, 2),
(7, 14, 4, 1),
(8, 16, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id` bigint(20) unsigned NOT NULL,
  `nom` text NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL,
  `allergenes` text NOT NULL,
  `type` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`id`, `nom`, `description`, `prix`, `allergenes`, `type`, `image`) VALUES
(14, 'Menu d''été', 'Ce menu contient : assortiment de légumes d''été, etc', 12.99, 'gluten, mais, porc', 'Ecolo', '258cbf9ea4a0190534534d22fbafd4b4.jpg'),
(16, 'Menu lorrain', 'Quiche lorrain + gateau chocolat + boisson', 9.99, 'Gluten, porc, chocolat', 'Gourmand', 'b7a8d3faaf1b9427f86b79a388490f1c.jpg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `commandemenu`
--
ALTER TABLE `commandemenu`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `commandemenu`
--
ALTER TABLE `commandemenu`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
