-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 21 nov. 2017 à 17:23
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT
= 0;
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jopizza`
--
CREATE DATABASE
IF NOT EXISTS `jopizza` DEFAULT CHARACTER
SET latin1
COLLATE latin1_swedish_ci;
USE `jopizza`;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client`
(
  `id` int
(11) NOT NULL,
  `nom` varchar
(100) DEFAULT NULL,
  `prenom` varchar
(100) DEFAULT NULL,
  `login` varchar
(100) DEFAULT NULL,
  `password` varchar
(255) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `adresse` varchar
(255) DEFAULT NULL,
  `codePostal` varchar
(5) DEFAULT NULL,
  `tel` varchar
(10) DEFAULT NULL,
  `mail` varchar
(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`
id`,
`nom
`, `prenom`, `login`, `password`, `dateNaissance`, `adresse`, `codePostal`, `tel`, `mail`) VALUES
(1, 'Garcia', 'Nicolas', 'ngarcia', 'ngarcia', '1995-05-11', NULL, NULL, '0689536602', 'ngarcia@umanis.com');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande`
(
  `id` int
(11) NOT NULL,
  `idClient` int
(11) DEFAULT NULL,
  `idPaiement` int
(11) DEFAULT NULL,
  `Total` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `detail`
--

CREATE TABLE `detail`
(
  `id` int
(11) NOT NULL,
  `idPizza` int
(11) DEFAULT NULL,
  `idCommande` int
(11) DEFAULT NULL,
  `idPerso` int
(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE `ingredient`
(
  `id` int
(11) NOT NULL,
  `libelle` varchar
(100) CHARACTER
SET utf8
COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`
id`,
`libelle
`) VALUES
(1, 'tomate'),
(2, 'gruyere'),
(3, 'olives'),
(0, 'jambon'),
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

CREATE TABLE `listingredient`
(
  `id` int
(11) NOT NULL,
  `idPizza` int
(11) NOT NULL,
  `idIngredient` int
(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `listingredient`
--

INSERT INTO `listingredient` (`
id`,
`idPizza
`, `idIngredient`) VALUES
(26, 2, 1),
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
(27, 2, 2),
(28, 2, 3),
(29, 2, 0),
(30, 3, 1),
(31, 3, 2),
(32, 3, 3),
(33, 3, 5),
(34, 4, 1),
(35, 4, 2),
(36, 4, 3),
(37, 4, 6);

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement`
(
  `id` int
(11) NOT NULL,
  `montant` double DEFAULT NULL,
  `status` int
(11) DEFAULT NULL,
  `reason` varchar
(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `personnalisation`
--

CREATE TABLE `personnalisation`
(
  `id` int
(11) NOT NULL,
  `idDetail` int
(11) DEFAULT NULL,
  `idList` int
(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pizza`
--

CREATE TABLE `pizza`
(
  `id` int
(11) NOT NULL,
  `libelle` varchar
(100) DEFAULT NULL,
  `prix` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pizza`
--

INSERT INTO `pizza` (`
id`,
`libelle
`, `prix`) VALUES
(1, 'Marguerita', 6.5),
(2, 'Jambon', 8.5),
(3, 'Champignons', 8.5),
(4, 'Chorizo', 8.5),
(5, 'Forestiere', 9),
(6, 'Marseillaise', 9),
(7, 'Orientale (Halal)', 9),
(8, 'Oignons', 9),
(9, 'Poivrons', 9),
(10, 'Oignons-lardons', 9),
(11, 'Thon', 9),
(12, 'Saint Marcellin', 9.5),
(13, 'Chevre', 9.5),
(14, 'Campagnarde', 10),
(15, 'Saumon', 10.5),
(16, 'Roquefort', 10.5),
(17, 'Pizza 4 fromages', 10.5),
(18, 'Reblochon', 10.5),
(19, 'Fruits de mer', 11),
(20, 'Mexicaine (Halal)', 11),
(26, 'Motagnarde', 13),
(25, 'fezf', 0),
(27, 'test', 14),
(28, 'test 2', 1),
(29, 'test 3', 15),
(30, 'Test', 123);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user`
(
  `id` int
(11) NOT NULL,
  `login` varchar
(100) NOT NULL,
  `password` varchar
(100) NOT NULL,
  `name` varchar
(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user`
  (`id`, `login
`, `password`, `name`) VALUES
(1, 'jopizza', 'jopizza', 'Jo');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
ADD PRIMARY KEY
(`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
ADD PRIMARY KEY
(`id`);

--
-- Index pour la table `detail`
--
ALTER TABLE `detail`
ADD PRIMARY KEY
(`id`);

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
ADD PRIMARY KEY
(`id`);

--
-- Index pour la table `listingredient`
--
ALTER TABLE `listingredient`
ADD PRIMARY KEY
(`id`),
ADD KEY `fk_list_pizza`
(`idPizza`),
ADD KEY `fk_list_ingredient`
(`idIngredient`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
ADD PRIMARY KEY
(`id`);

--
-- Index pour la table `personnalisation`
--
ALTER TABLE `personnalisation`
ADD PRIMARY KEY
(`id`);

--
-- Index pour la table `pizza`
--
ALTER TABLE `pizza`
ADD PRIMARY KEY
(`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
ADD PRIMARY KEY
(`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `listingredient`
--
ALTER TABLE `listingredient`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT pour la table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
