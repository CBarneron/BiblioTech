-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 09 mars 2021 à 12:54
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
  `idpubli` int(11) NOT NULL DEFAULT '1',
  `titre` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `dateitem` varchar(50) NOT NULL,
  `synopsis` varchar(60000) NOT NULL,
  `affiche` varchar(200) NOT NULL,
  PRIMARY KEY (`iditem`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`iditem`, `idpubli`, `titre`, `categorie`, `auteur`, `dateitem`, `synopsis`, `affiche`) VALUES
(1, 1, 'L\'homme nu', 'livre', 'Marc Dugain', '2016-24-12', 'On les appelle les Big Data. Google, Apple, Facebook ou Amazon, ces géants du numérique, qui aspirent à travers Internet, smartphones et objets connectés, des milliards de données sur nos vies.\r\nDerrière cet espionnage, dont on mesure chaque jour l\'ampleur, on découvre qu\'il existe un pacte secret scellé par les Big Datas avec l\'appareil de renseignement le plus puissant de la planète. Cet accouplement entre les agences américaines et les conglomérats du numérique, est en train d\'enfanter une entité d\'un genre nouveau. Une puissance mutante, ensemencée par la mondialisation, qui ambitionne ni plus ni moins de reformater l\'Humanité.\r\nLa prise de contrôle de nos existences s\'opère au profit d\'une nouvelle oligarchie mondiale. Pour les Big data, la démocratie est obsolète, tout comme ses valeurs universelles. C\'est une nouvelle dictature qui nous menace. Une Big Mother bien plus terrifiante encore que Big Brother.\r\nSi nous laissons faire nous serons demain des \" hommes nus \", sans mémoire, programmés, sous surveillance. Il est temps d\'agir.', 'ressources\\affiche\\lhommenu.png'),
(2, 1, 'L\'homme pas nu', 'livre', 'Les vraie auteur tu connais', '2021-02-23', 'Ôde à nos ébats\r\n\r\nTa mère je ne suis pas, donc me tringler tu vas.\r\nDans le fond de mon fion, tape aussi fort c’est bon.\r\nValentchoin, de toi bebou je me sens si loin.\r\nOh baby, défonce moi du lundi au samedi…(même le dimanche)\r\n\r\nDe la haine envers notre antoine tu ressent,\r\nMais rassure toi-en, Que ton cul je ne désire.\r\nJe ne me répéterai pas, viole moi jusqu’au sang,\r\nEt fais moi ressentir le meilleurs des plaisirs. (jusqu’à jouir)\r\n\r\nJe me rapelle de notre premier coup de foudre.\r\nDes milliers de rire nous avons partagé.\r\nValentin, mon gros cul, remplis le de ton foutre.\r\nNotre complicité n’en sera que limité…(ouais bébé)\r\n\r\nNe te préoccupe pas des autres filles, non.\r\nIl n’y à que toi dans mon viseur baby bou. (pan pan)\r\nSi je peux te certifier une chose qui vaut tout.\r\nC’est que, chéri, du soir jusqu’à l’aube nous baiseront. (à fond)\r\n\r\nAmbre ne sera jamais un obstacle à nous deux.\r\nSur mes lèvres pulpeuses tu laisse un goût exquis.\r\nTon sexe corrompu est le plus interdit des fruits.\r\nDu divin panthéon, tu es le plus beau des dieux. (tu es mon Apollon)\r\n\r\nTu as créé la corne d’abondance de l’anal.\r\nAutant de faim, à ce point, je n’ai jamais ressenti. (jamais)\r\nDe toi j’ai si faim, j’aime ton sourire quand tu ris.\r\nJe te le demande, baise moi comme un animal. (grrrr)\r\n\r\nMême si Allah nous interdit de manger du ralouf.\r\nInshallah loin de toi je ne peux respirer.\r\nSi la faim tu ressent encore, mon cul tu bouffe.\r\nDans le matelas, je vais te faire suer. (mouiller)\r\n\r\nDe la vraie musique nous avons savourer.\r\nWejdene et Aya ont sû comment nous unir.\r\nDe notre suicide je ne peux me passer.\r\nQuand je te vois nue, il m’est impossible de fuir. (jamais je ne pourrai)\r\n\r\nTon chaleureux dos poilu, c’est toi mon nounours.\r\nTu le sais, notre amour est à double tranchant,\r\nSi tu ne me baise pas, je serai plus que chiant.\r\nPour avoir ma CB sale michto, vide mes bourses. (encore)\r\n\r\nDu trône de marbre boubou, je t’ai monté en l’air.\r\nRetourne moi comme la crêpe sur la poêle bouillante.\r\nWoullah N’ah nar dim bek, je te le dis mon frère.\r\nDe ton parfum, de ton corps, ton odeur me manque. (oh oui)\r\n\r\nEn tant que nouveau musicien, pianote moi.\r\nEt si tu t’en lasse, ma dure flûte est à toi.\r\nBoire dans le saint cône, tu n’as pas hésité.\r\nAlors dans ta gorge, ma semence va couler. (couler)\r\n\r\nUn chevalier certifié tu es devenu.\r\nJe l’ai vu à ta façon de manier l’épée.\r\nDans la piscine, avec la frite tu m’as battu.\r\nA présent avec ta fritte, ose me gifler. (aie)\r\n\r\nC’est par les vers ainsi que les alexandrins,\r\nQue je t’ouvre mon âme à toi, Valentin.\r\nCe ne sont pas de simple strophe qui sont notées là.\r\nMais véritablement une Ôde à nos ébats. (amen)\r\n\r\n\r\nÔdes à nos ébats, Jean Foncetonfion.\r\n2021, Aux éditions On se fait ça quand?\r\n\r\n', 'ressources\\affiche\\lhommepasnu.png'),
(3, 1, 'LOTR-La fraternite de l\'anneaux', 'livre', 'J. R. R. Tolkien', '1954-12-31', 'Les Hobbits, apparentés à l\'homme, mais proches également des Elfes et des Nains, vivent en paix au nord-ouest de l\'Ancien Monde, dans la Comté. Paix précaire et menacée, cependant, depuis que Bilbon Sacquet a dérobé au monstre Gollum l\'Anneau de Puissance jadis forgé par Sauron de Mordor.', 'ressources\\affiche\\lotrlafraternitedelanneau.png'),
(4, 1, 'Fast & Furious 1', 'film', 'Rob Cohen', '2001-09-26', 'La nuit tombée, Dominic Toretto règne sur les rues de Los Angeles à la tête d\'une équipe de fidèles qui partagent son goût du risque, sa passion de la vitesse et son culte des voitures de sport lancées à plus de 250 km/h dans des rodéos urbains d\'une rare violence. Ses journées sont consacrées à bricoler et à relooker des modèles haut de gamme, à les rendre toujours plus performants et plus voyants, et à organiser des joutes illicites.', 'ressources\\affiche\\fastandfurious1.png'),
(5, 1, 'LOTR-Les deux tours', 'livre', 'J. R. R. Tolkien', '1954-11-11', 'Frodon le Hobbit et ses Compagnons se sont engagés, au Grand Conseil d\'Elrond, à détruire l\'Anneau de Puissance dont Sauron de Mordor cherche à s\'emparer pour asservir tous les peuples de la terre habitée : Elfes et Nains, Hommes et Hobbits.', 'ressources\\affiche\\lotrlesdeuxtours.png'),
(6, 1, 'LOTR-Le retour du roi', 'livre', 'J. R. R. Tolkien', '1955-10-20', 'Avec \"Le Retour du Roi\" s\'achèvent dans un fracas d\'apocalypse les derniers combats de la guerre de l\'Anneau. Tandis que le continent se couvre de ténèbres, annonçant pour le peuple des Hobbits l\'aube d\'une ère nouvelle, Frodon poursuit son entreprise.', 'ressources\\affiche\\lotrleretourduroi.png'),
(7, 1, 'Harry Potter à l\'école des sorciers', 'livre', 'J. K. Rowling', '1997-06-26', 'Le jour de ses onze ans, Harry Potter, un orphelin élevé par un oncle et une tante qui le détestent, voit son existence bouleversée. Un géant nommé Hagrid, vient le chercher pour l\'emmener à Poudlard, une école de sorcellerie ! Voler en balai, jeter des sorts, combattre les trolls : Harry se révèle un sorcier doué.', 'ressources\\affiche\\harrypotter1.png'),
(8, 1, 'Harry Potter et la Chambre des secrets', 'livre', 'J. K. Rowling', '1998-07-02', 'Une rentrée fracassante en voiture volante, une étrange malédiction qui s\'abat sur les élèves, cette deuxième année à l\'école des sorciers ne s\'annonce pas de tout repos !', 'ressources\\affiche\\harrypotter2.png'),
(9, 1, 'Harry Potter et le Prisonnier d\'Azkaban', 'livre', 'J. K. Rowling', '1999-10-19', 'Sirius Black, le dangereux criminel qui s\'est échappé de la forteresse d\'Azkaban, recherche Harry Potter. C\'est donc sous bonne garde que l\'apprenti sorcier fait sa troisième rentrée.', 'ressources\\affiche\\harrypotter3.png'),
(10, 1, 'Harry Potter et la Coupe de feu', 'livre', 'J. K. Rowling', '2000-07-08', 'Juste avant d\'assister à la coupe du Monde de Quidditch opposant les équipes d\'Irlande et de Bulgarie, Harry Potter fait un rêve étrange dans lequel il est témoin du meurtre d\'un vieux jardinier moldu par Voldemort, alors que le jardinier surprenait une conversation au sujet de Harry.', 'ressources\\affiche\\harrypotter4.png'),
(11, 1, 'Harry Potter et l\'Ordre du phénix', 'livre', 'J. K. Rowling', '2003-06-21', 'Quelques semaines après la renaissance de Voldemort, Harry et ses amis Ron et Hermione font leur entrée en 5e année à Poudlard, de plus en plus contrôlé par le ministère qui refuse de croire au retour du mage noir et fait en sorte de discréditer Albus Dumbledore.', 'ressources\\affiche\\harrypotter5.png'),
(12, 1, 'Harry Potter et le Prince de sang-mêlé', 'livre', 'J. K. Rowling', '2005-07-16', 'Harry rentre en sixième année à l\'école de sorcellerie Poudlard (Hogwarts, en anglais). Il entre alors en possession d\'un livre de potion portant le mot « propriété du Prince de sang-mêlé » et commence à en savoir plus sur le sombre passé de Voldemort qui était encore connu sous le nom de Tom Jedusor.', 'ressources\\affiche\\harrypotter6.png'),
(13, 1, 'Harry Potter et les Reliques de la Mort', 'livre', 'J. K. Rowling', '2007-07-21', 'Cette année, Harry a 17 ans et ne retourne pas à l\'école de Poudlard après la mort de Dumbledore. Avec Ron et Hermione il se consacre à la dernière mission confiée par Dumbledore, la chasse aux Horcruxes.', 'ressources\\affiche\\harrypotter7.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idusers` int(11) NOT NULL AUTO_INCREMENT,
  `admin` int(11) NOT NULL DEFAULT '0',
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`idusers`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idusers`, `admin`, `pseudo`, `email`, `password`) VALUES
(1, 1, 'Vincent', 'millot007@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(2, 0, 'LÃ©o', 'leo@lecon.fr', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(3, 0, 'Leo', 'leo@lecon2.fr', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(4, 0, 'Le Leto', 'leleto.fr@gmail.com', '4fd505f8aeed956f068c4ce57bfc30a6131b7c79'),
(5, 0, 'skull26240', 'skull26240@gmail.com', '3d0968c2d124ed850ecf2be4b3a533742ca87738'),
(6, 0, 'Antoinelebg', 'antoine@leplusbeau.fr', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
