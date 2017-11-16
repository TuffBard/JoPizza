-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 16 Novembre 2017 à 23:30
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `jopizza`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `codePostal` varchar(5) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL,
  `idClient` int(11) DEFAULT NULL,
  `idPaiement` int(11) DEFAULT NULL,
  `Total` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `detail`
--

CREATE TABLE IF NOT EXISTS `detail` (
  `id` int(11) NOT NULL,
  `idPizza` int(11) DEFAULT NULL,
  `idCommande` int(11) DEFAULT NULL,
  `idPerso` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE IF NOT EXISTS `ingredient` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ingredient`
--

INSERT INTO `ingredient` (`id`, `libelle`) VALUES
(1, 'Tomate'),
(2, 'Gruyere'),
(3, 'Olives'),
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
(14, 'chèvre'),
(15, 'pomme de terre'),
(16, 'saumon'),
(17, 'Roquefort'),
(18, 'Reblochon'),
(19, 'fruits de mer');

-- --------------------------------------------------------

--
-- Structure de la table `listingredient`
--

CREATE TABLE IF NOT EXISTS `listingredient` (
  `id` int(11) NOT NULL,
  `idPizza` int(11) NOT NULL,
  `idIngredient` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_list_pizza` (`idPizza`),
  KEY `fk_list_ingredient` (`idIngredient`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `listingredient`
--

INSERT INTO `listingredient` (`id`, `idPizza`, `idIngredient`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE IF NOT EXISTS `paiement` (
  `id` int(11) NOT NULL,
  `montant` double DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `personnalisation`
--

CREATE TABLE IF NOT EXISTS `personnalisation` (
  `id` int(11) NOT NULL,
  `idDetail` int(11) DEFAULT NULL,
  `idList` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pizza`
--

CREATE TABLE IF NOT EXISTS `pizza` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) DEFAULT NULL,
  `prix` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pizza`
--

INSERT INTO `pizza` (`id`, `libelle`, `prix`) VALUES
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
(20, 'Mexicaine (Halal)', 11);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
