-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Jeu 04 Mai 2017 à 18:48
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `jacotte`
--

-- --------------------------------------------------------

--
-- Structure de la table `boisson`
--

CREATE TABLE `boisson` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(0, 'aucun', 'aucun', 'aucun', 0, -1, 'aucun', 'aucun'),
(2, 'boisson 1', 'Gourmand', 'boisson 1', 2, 2, '258cbf9ea4a0190534534d22fbafd4b4.jpg', 'Aucun'),
(3, 'boisson 2', 'Gourmand', 'boisson 2', 2, 2, 'b7a8d3faaf1b9427f86b79a388490f1c.jpg', 'Aucun');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ville` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `newsletter` varchar(255) NOT NULL,
  `dateLivraison` varchar(255) NOT NULL,
  `prixTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `ville`, `adresse`, `nom`, `tel`, `mail`, `newsletter`, `dateLivraison`, `prixTotal`) VALUES
(1, 'roubaix', 'Commande 1', 'Commande 1', '0606060606', 'commande1@gmail.com', '1', '05/05/2017', 26),
(2, 'roubaix', 'commande 2', 'commande 2', '0606060606', 'commande2@gmail.com', '', '05/05/2017', 21.4);

-- --------------------------------------------------------

--
-- Structure de la table `commandemenu`
--

CREATE TABLE `commandemenu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idMenu` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `qte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commandemenu`
--

INSERT INTO `commandemenu` (`id`, `idMenu`, `idCommande`, `qte`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 2, 1),
(4, 4, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `dessert`
--

CREATE TABLE `dessert` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(0, 'aucun', 'aucun', 'aucun', 0, -1, 'aucun', 'aucun'),
(2, 'dessert 1', 'Gourmand', 'dessert 1', 3, 2, '89545a0a8b8145bdc7ed8983f372be24.jpg', 'Aucun'),
(3, 'dessert 2', 'Gourmand', 'dessert 2', 3, 4, '4b675a333a9994e8abe8f2b8fbc895f4.jpg', 'Aucun');

-- --------------------------------------------------------

--
-- Structure de la table `entree`
--

CREATE TABLE `entree` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` text NOT NULL,
  `type` text NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL,
  `qte` int(11) NOT NULL,
  `image` text NOT NULL,
  `allergenes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `entree`
--

INSERT INTO `entree` (`id`, `nom`, `type`, `description`, `prix`, `qte`, `image`, `allergenes`) VALUES
(0, 'aucun', 'aucun', 'aucun', 0, -1, 'aucun', 'aucun'),
(2, 'Entree 1', 'test', 'entree 1', 3, 2, '4b675a333a9994e8abe8f2b8fbc895f4.jpg', 'aucune'),
(3, 'entree 2', 'test', 'entree 2', 3, 4, 'b7a8d3faaf1b9427f86b79a388490f1c.jpg', 'Aucun'),
(4, 'fromage 2', 'Gourmand', 'fromage 2', 4, 5, '89545a0a8b8145bdc7ed8983f372be24.jpg', 'Aucun');

-- --------------------------------------------------------

--
-- Structure de la table `fromage`
--

CREATE TABLE `fromage` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(0, 'aucun', 'aucun', 'aucun', 0, -1, 'aucun', 'aucun'),
(2, 'fromage 1', 'Gourmand', 'fromage 1', 4, 4, '89545a0a8b8145bdc7ed8983f372be24.jpg', 'Aucun');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `perso` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`id`, `nom`, `description`, `prix`, `allergenes`, `type`, `image`, `idEntree`, `idPlat`, `idDessert`, `idFromage`, `idBoisson`, `perso`) VALUES
(1, 'Menu 1', '', 11.5, '', '', 'defaultMenu.png', 2, 2, 2, 0, 2, 1),
(2, 'Menu 2', '', 11.5, '', '', 'defaultMenu.png', 3, 3, 3, 2, 3, 1),
(3, 'Menu 1', '', 11.5, '', '', 'defaultMenu.png', 2, 2, 2, 0, 2, 1),
(4, 'Menu 2', '', 6.9, '', '', 'defaultMenu.png', 2, 3, 2, 0, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(0, 'aucun', 'aucun', 'aucun', 0, -1, 'aucun', 'aucun'),
(2, 'plat 1', 'Gourmand', 'plat 1', 4, 3, '258cbf9ea4a0190534534d22fbafd4b4.jpg', 'Aucun'),
(3, 'plat 2', 'Gourmand', 'plat 2', 4, 3, '258cbf9ea4a0190534534d22fbafd4b4.jpg', 'Aucun');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `boisson`
--
ALTER TABLE `boisson`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `commandemenu`
--
ALTER TABLE `commandemenu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `dessert`
--
ALTER TABLE `dessert`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entree`
--
ALTER TABLE `entree`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `fromage`
--
ALTER TABLE `fromage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `boisson`
--
ALTER TABLE `boisson`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `commandemenu`
--
ALTER TABLE `commandemenu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `dessert`
--
ALTER TABLE `dessert`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `entree`
--
ALTER TABLE `entree`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `fromage`
--
ALTER TABLE `fromage`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;