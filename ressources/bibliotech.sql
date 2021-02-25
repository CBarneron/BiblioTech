-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 25 fév. 2021 à 10:12
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `iditem` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `dateitem` varchar(50) NOT NULL,
  `affiche` varchar(50) NOT NULL,
  PRIMARY KEY (`iditem`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`iditem`, `titre`, `categorie`, `dateitem`, `affiche`) VALUES
(1, 'L\'homme nue', 'livre', '12/04/2016', 'ressources/affiche/lhomme-nue.png'),
(2, 'L\'homme habillé', 'livre', '23/02/2021', '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idusers` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`idusers`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idusers`, `pseudo`, `email`, `password`) VALUES
(1, 'Vincent', 'millot007@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(2, 'LÃ©o', 'leo@lecon.fr', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(3, 'Leo', 'leo@lecon2.fr', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
