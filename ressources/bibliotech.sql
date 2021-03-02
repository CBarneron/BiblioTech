-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 02 mars 2021 à 12:07
-- Version du serveur :  8.0.23-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bibliotech`
--

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE `item` (
  `iditem` int NOT NULL,
  `titre` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `date` date DEFAULT NULL,
  `dateitem` varchar(50) NOT NULL,
  `affiche` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`iditem`, `titre`, `categorie`, `date`, `dateitem`, `affiche`) VALUES
(1, 'L\'homme nu', 'livre', NULL, '2016-24-12', 'ressources\\affiche\\lhommenu.png'),
(2, 'L\'homme pas nu', 'livre', NULL, '2021-02-23', 'ressources\\affiche\\lhommepasnu.png'),
(3, 'LOTR-La fraternite de l\'anneaux', 'livre', NULL, '1954-12-31', 'ressources\\affiche\\lotrlafraternitedelanneau.png'),
(4, 'Fast & Furious 1', 'film', NULL, '2001-09-26', 'ressources\\affiche\\fastandfurious1.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idusers` int NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idusers`, `pseudo`, `email`, `password`) VALUES
(1, 'Vincent', 'millot007@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(2, 'LÃ©o', 'leo@lecon.fr', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(3, 'Leo', 'leo@lecon2.fr', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(4, 'Le Leto', 'leleto.fr@gmail.com', '4fd505f8aeed956f068c4ce57bfc30a6131b7c79'),
(5, 'skull26240', 'skull26240@gmail.com', '3d0968c2d124ed850ecf2be4b3a533742ca87738');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`iditem`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
  MODIFY `iditem` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
