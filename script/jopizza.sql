-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 01 déc. 2017 à 17:01
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jopizza`
--
CREATE DATABASE IF NOT EXISTS `jopizza` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jopizza`;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `codePostal` varchar(5) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `login`, `password`, `dateNaissance`, `adresse`, `codePostal`, `tel`, `mail`) VALUES
(1, 'Garcia', 'Nicolas', 'ngarcia', 'f41e03d1fb6ec773db0f987fba9853f46ee513cc', '1995-05-11', NULL, NULL, '0689536602', 'ngarcia@umanis.com');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `idClient` int(11) DEFAULT NULL,
  `idPaiement` int(11) DEFAULT NULL,
  `Total` double DEFAULT NULL,
  `horaire` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `idClient`, `idPaiement`, `Total`, `horaire`, `status`) VALUES
(8, 1, NULL, 50.5, '2017-11-30 11:50:00', 1),
(9, 1, NULL, 50.5, '2017-11-30 11:50:00', 1),
(10, 1, NULL, 94.5, '2017-11-30 13:30:00', 1),
(11, 1, NULL, 18, '2017-11-30 13:30:00', 1),
(12, 1, NULL, 6.5, '2017-12-01 22:00:00', 1),
(13, 1, NULL, 6.5, '2017-12-01 22:00:00', 1),
(14, 1, NULL, 9, '2017-12-01 22:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `detail`
--

CREATE TABLE `detail` (
  `id` int(11) NOT NULL,
  `idPizza` int(11) DEFAULT NULL,
  `idCommande` int(11) DEFAULT NULL,
  `idPerso` int(11) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `detail`
--

INSERT INTO `detail` (`id`, `idPizza`, `idCommande`, `idPerso`, `quantity`) VALUES
(11, 1, 8, NULL, 1),
(12, 3, 8, NULL, 2),
(13, 6, 8, NULL, 3),
(14, 1, 9, NULL, 1),
(15, 3, 9, NULL, 2),
(16, 6, 9, NULL, 3),
(17, 1, 10, NULL, 1),
(18, 3, 10, NULL, 4),
(19, 5, 10, NULL, 6),
(20, 6, 11, NULL, 2),
(21, 1, 12, NULL, 1),
(22, 1, 13, NULL, 1),
(23, 5, 14, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE `ingredient` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`id`, `libelle`) VALUES
(1, 'tomate'),
(2, 'gruyÃ¨re'),
(3, 'olives'),
(20, 'viande hachÃ©e'),
(4, 'jambon'),
(5, 'champignons'),
(6, 'chorizo'),
(7, 'anchois'),
(8, 'merguez'),
(9, 'oignons'),
(10, 'poivrons'),
(11, 'lardons'),
(12, 'thon'),
(13, 'St-Marcellin'),
(14, 'chevre'),
(15, 'pomme de terre'),
(16, 'saumon'),
(17, 'Roquefort'),
(18, 'Reblochon'),
(19, 'fruits de mer');

-- --------------------------------------------------------

--
-- Structure de la table `listingredient`
--

CREATE TABLE `listingredient` (
  `id` int(11) NOT NULL,
  `idPizza` int(11) NOT NULL,
  `idIngredient` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `listingredient`
--

INSERT INTO `listingredient` (`id`, `idPizza`, `idIngredient`) VALUES
(141, 2, 4),
(40, 1, 3),
(39, 1, 2),
(4, 28, 1),
(5, 28, 2),
(6, 28, 3),
(7, 29, 1),
(8, 29, 2),
(9, 29, 3),
(10, 29, 17),
(11, 29, 19),
(12, 30, 2),
(38, 1, 1),
(140, 2, 3),
(139, 2, 2),
(138, 2, 1),
(30, 3, 1),
(31, 3, 2),
(32, 3, 3),
(33, 3, 5),
(34, 4, 1),
(35, 4, 2),
(36, 4, 3),
(37, 4, 6),
(145, 5, 5),
(144, 5, 3),
(143, 5, 2),
(142, 5, 1),
(46, 6, 1),
(47, 6, 2),
(48, 6, 3),
(49, 6, 7),
(50, 7, 1),
(51, 7, 2),
(52, 7, 3),
(53, 7, 8),
(54, 8, 1),
(55, 8, 2),
(56, 8, 3),
(57, 8, 9),
(58, 9, 1),
(59, 9, 2),
(60, 9, 3),
(61, 9, 10),
(62, 10, 1),
(63, 10, 2),
(64, 10, 3),
(65, 10, 9),
(66, 10, 11),
(67, 11, 1),
(68, 11, 2),
(69, 11, 3),
(70, 11, 12),
(71, 12, 1),
(72, 12, 2),
(73, 12, 3),
(74, 12, 13),
(149, 13, 14),
(148, 13, 3),
(147, 13, 2),
(146, 13, 1),
(79, 14, 1),
(80, 14, 2),
(81, 14, 3),
(82, 14, 11),
(83, 14, 15),
(84, 15, 1),
(85, 15, 2),
(86, 15, 3),
(87, 15, 16),
(88, 16, 1),
(89, 16, 2),
(90, 16, 3),
(91, 16, 17),
(92, 17, 1),
(93, 17, 2),
(94, 17, 3),
(95, 17, 13),
(96, 17, 14),
(97, 17, 17),
(126, 18, 18),
(125, 18, 15),
(124, 18, 11),
(123, 18, 3),
(102, 19, 1),
(103, 19, 2),
(104, 19, 3),
(105, 19, 19),
(122, 18, 2),
(121, 18, 1),
(136, 20, 9),
(135, 20, 20),
(134, 20, 3),
(133, 20, 2),
(132, 20, 1),
(137, 20, 10);

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `id` int(11) NOT NULL,
  `montant` double DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `personnalisation`
--

CREATE TABLE `personnalisation` (
  `id` int(11) NOT NULL,
  `idDetail` int(11) DEFAULT NULL,
  `idList` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pizza`
--

CREATE TABLE `pizza` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) DEFAULT NULL,
  `prix` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pizza`
--

INSERT INTO `pizza` (`id`, `libelle`, `prix`) VALUES
(1, 'Marguerita', 6.5),
(2, 'Jambon', 8.5),
(3, 'Champignons', 8.5),
(4, 'Chorizo', 8.5),
(5, 'FÃ´restiÃ¨re', 9),
(6, 'Marseillaise', 9),
(7, 'Orientale (Halal)', 9),
(8, 'Oignons', 9),
(9, 'Poivrons', 9),
(10, 'Oignons-lardons', 9),
(11, 'Thon', 9),
(12, 'Saint Marcellin', 9.5),
(13, 'ChÃ¨vre', 9.5),
(14, 'Campagnarde', 10),
(15, 'Saumon', 10.5),
(16, 'Roquefort', 10.5),
(17, 'Pizza 4 fromages', 10.5),
(18, 'Reblochon', 10.5),
(19, 'Fruits de mer', 11),
(20, 'Mexicaine (Halal)', 11);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `name`) VALUES
(1, 'jopizza', '03a7191321edb1c72cb9be2a2b9ac7faba287368', 'Jo');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `listingredient`
--
ALTER TABLE `listingredient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_list_pizza` (`idPizza`),
  ADD KEY `fk_list_ingredient` (`idIngredient`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personnalisation`
--
ALTER TABLE `personnalisation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `listingredient`
--
ALTER TABLE `listingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
--
-- AUTO_INCREMENT pour la table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
