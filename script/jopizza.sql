-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2017 at 04:50 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jopizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
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
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `login`, `password`, `dateNaissance`, `adresse`, `codePostal`, `tel`, `mail`) VALUES
(1, 'Garcia', 'Nicolas', 'ngarcia', 'ngarcia', '1995-05-11', NULL, NULL, '0689536602', 'ngarcia@umanis.com');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `idClient` int(11) DEFAULT NULL,
  `idPaiement` int(11) DEFAULT NULL,
  `Total` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id` int(11) NOT NULL,
  `idPizza` int(11) DEFAULT NULL,
  `idCommande` int(11) DEFAULT NULL,
  `idPerso` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredient`
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
-- Table structure for table `listingredient`
--

CREATE TABLE `listingredient` (
  `id` int(11) NOT NULL,
  `idPizza` int(11) NOT NULL,
  `idIngredient` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listingredient`
--

INSERT INTO `listingredient` (`id`, `idPizza`, `idIngredient`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `paiement`
--

CREATE TABLE `paiement` (
  `id` int(11) NOT NULL,
  `montant` double DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personnalisation`
--

CREATE TABLE `personnalisation` (
  `id` int(11) NOT NULL,
  `idDetail` int(11) DEFAULT NULL,
  `idList` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) DEFAULT NULL,
  `prix` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizza`
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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `name`) VALUES
(1, 'jopizza', 'jopizza', 'Jo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listingredient`
--
ALTER TABLE `listingredient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_list_pizza` (`idPizza`),
  ADD KEY `fk_list_ingredient` (`idIngredient`);

--
-- Indexes for table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personnalisation`
--
ALTER TABLE `personnalisation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
