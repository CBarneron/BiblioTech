-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 29 avr. 2021 à 16:37
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
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `idavis` int(11) NOT NULL AUTO_INCREMENT,
  `titreavis` varchar(100) NOT NULL,
  `contenuavis` varchar(500) NOT NULL,
  `iditem` int(11) NOT NULL,
  `idusers` int(11) NOT NULL,
  `idnote` int(11) NOT NULL,
  PRIMARY KEY (`idavis`),
  KEY `fk_item` (`iditem`),
  KEY `fk_users` (`idusers`),
  KEY `fk_note` (`idnote`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`idavis`, `titreavis`, `contenuavis`, `iditem`, `idusers`, `idnote`) VALUES
(23, '-Anastatia...', '-Oui MR GRAY ? \r\nVous avez la ref? ^^', 17, 1, 4),
(20, 'test', 'tset', 17, 7, 15),
(30, 'J\'adore Harry Potter', 'Meilleurs sÃ©rie de film au monde ! \r\nCa c\'est constructif', 13, 1, 1),
(22, 'Lorem Ipsum dolor', 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim. Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex. Two driven jocks help fax my big quiz. Quick, Baz, get', 17, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `iditem` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `dateitem` varchar(50) NOT NULL,
  `synopsis` varchar(60000) NOT NULL,
  `affiche` varchar(200) NOT NULL DEFAULT 'ressources\\affiche\\2.png',
  PRIMARY KEY (`iditem`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`iditem`, `titre`, `categorie`, `auteur`, `dateitem`, `synopsis`, `affiche`) VALUES
(1, 'L\'homme nu', 'livre', 'Marc Dugain', '2016-24-12', 'On les appelle les Big Data. Google, Apple, Facebook ou Amazon, ces géants du numérique, qui aspirent à travers Internet, smartphones et objets connectés, des milliards de données sur nos vies.\r\nDerrière cet espionnage, dont on mesure chaque jour l\'ampleur, on découvre qu\'il existe un pacte secret scellé par les Big Datas avec l\'appareil de renseignement le plus puissant de la planète. Cet accouplement entre les agences américaines et les conglomérats du numérique, est en train d\'enfanter une entité d\'un genre nouveau. Une puissance mutante, ensemencée par la mondialisation, qui ambitionne ni plus ni moins de reformater l\'Humanité.\r\nLa prise de contrôle de nos existences s\'opère au profit d\'une nouvelle oligarchie mondiale. Pour les Big data, la démocratie est obsolète, tout comme ses valeurs universelles. C\'est une nouvelle dictature qui nous menace. Une Big Mother bien plus terrifiante encore que Big Brother.\r\nSi nous laissons faire nous serons demain des \" hommes nus \", sans mémoire, programmés, sous surveillance. Il est temps d\'agir.', 'ressources\\affiche\\1.png'),
(19, 'Avengers', 'film', 'Joss Whedon', '2012-04-25', 'Nick Fury, le directeur du S.H.I.E.L.D., l\'organisation qui prÃ©serve la paix dans le monde, veut former une Ã©quipe d\'irrÃ©ductibles pour empÃªcher la destruction du monde. Iron Man, Hulk, Thor, Captain America, Hawkeye et Black Widow rÃ©pondent prÃ©sents. La nouvelle Ã©quipe, baptisÃ©e Avengers, a beau sembler soudÃ©e, il reste encore Ã  ses illustres membres Ã  apprendre Ã  travailler ensemble.', 'ressources\\affiche\\19.png'),
(20, 'Avengers : L\'Ãˆre d\'Ultron', 'film', 'Joss Whedon', '2015-04-22', 'Alors qu\'il tente de rÃ©cupÃ©rer le sceptre de Loki avec l\'aide de ses camarades Avengers, Tony Stark dÃ©couvre que Strucker avait mis au point une intelligence artificielle rÃ©volutionnaire, plus puissante encore que Jarvis. Strucker, mis hors d\'Ã©tat de nuire, et le sceptre rÃ©cupÃ©rÃ©, Stark conÃ§oit bientÃ´t un projet insensÃ© : relancer son programme de maintien de la paix, jusque-lÃ  en sommeil, grÃ¢ce Ã  cette conscience robotisÃ©e ultra-puissante.', 'ressources\\affiche\\20.png'),
(21, 'Avengers: Infinity War', 'film', 'Joe Russo', '2018-04-23', 'Alors que les Avengers et leurs alliés ont continué de protéger le monde face à des menaces bien trop grandes pour être combattues par un héros seul, un nouveau danger est venu de l\'espace : Thanos. Despote craint dans tout l\'univers, Thanos a pour objectif de recueillir les six Pierres d\'Infinité, des artefacts parmi les plus puissants de l\'univers, et de les utiliser afin d\'imposer sa volonté sur toute la réalité. Tous les combats que les Avengers ont menés culminent dans cette bataille.', 'ressources\\affiche\\21.png'),
(22, 'Avengers : Endgame', 'film', 'Joe Russo', '2019-04-24', 'Le Titan Thanos, ayant réussi à s\'approprier les six Pierres d\'Infinité et à les réunir sur le Gantelet doré, a pu réaliser son objectif de pulvériser la moitié de la population de l\'Univers. Cinq ans plus tard, Scott Lang, alias Ant-Man, parvient à s\'échapper de la dimension subatomique où il était coincé. Il propose aux Avengers une solution pour faire revenir à la vie tous les êtres disparus, dont leurs alliés et coéquipiers : récupérer les Pierres d\'Infinité dans le passé.', 'ressources\\affiche\\22.png'),
(23, 'Fast and Furious: Tokyo Drift', 'film', 'Justin Lin', '2006-07-19', 'Sean Boswell est un risque-tout à qui sa passion immodérée des voitures de sport trafiquées a déjà attiré de sérieux ennuis avec la police californienne.', 'ressources\\affiche\\23.png'),
(24, 'Fast and Furious 4', 'film', 'Justin Lin', '2009-03-2', 'Un meurtre oblige Don Toretto, un ancien taulard en cavale, et l\'agent Brian O\'Conner à revenir à L.A. où leur querelle se rallume. Mais confrontés à un ennemi commun, ils sont contraints à former une alliance incertaine s\'ils espèrent parvenir à déjouer ses plans.', 'ressources\\affiche\\24.png'),
(3, 'LOTR-La fraternite de l\'anneaux', 'livre', 'J. R. R. Tolkien', '1954-12-31', 'Les Hobbits, apparentés à l\'homme, mais proches également des Elfes et des Nains, vivent en paix au nord-ouest de l\'Ancien Monde, dans la Comté. Paix précaire et menacée, cependant, depuis que Bilbon Sacquet a dérobé au monstre Gollum l\'Anneau de Puissance jadis forgé par Sauron de Mordor.', 'ressources\\affiche\\3.png'),
(4, 'Fast & Furious 1', 'film', 'Rob Cohen', '2001-09-26', 'La nuit tombée, Dominic Toretto règne sur les rues de Los Angeles à la tête d\'une équipe de fidèles qui partagent son goût du risque, sa passion de la vitesse et son culte des voitures de sport lancées à plus de 250 km/h dans des rodéos urbains d\'une rare violence. Ses journées sont consacrées à bricoler et à relooker des modèles haut de gamme, à les rendre toujours plus performants et plus voyants, et à organiser des joutes illicites.', 'ressources\\affiche\\4.png'),
(5, 'LOTR-Les deux tours', 'livre', 'J. R. R. Tolkien', '1954-11-11', 'Frodon le Hobbit et ses Compagnons se sont engagés, au Grand Conseil d\'Elrond, à détruire l\'Anneau de Puissance dont Sauron de Mordor cherche à s\'emparer pour asservir tous les peuples de la terre habitée : Elfes et Nains, Hommes et Hobbits.', 'ressources\\affiche\\5.png'),
(6, 'LOTR-Le retour du roi', 'livre', 'J. R. R. Tolkien', '1955-10-20', 'Avec \"Le Retour du Roi\" s\'achèvent dans un fracas d\'apocalypse les derniers combats de la guerre de l\'Anneau. Tandis que le continent se couvre de ténèbres, annonçant pour le peuple des Hobbits l\'aube d\'une ère nouvelle, Frodon poursuit son entreprise.', 'ressources\\affiche\\6.png'),
(7, 'Harry Potter à l\'école des sorciers', 'livre', 'J. K. Rowling', '1997-06-26', 'Le jour de ses onze ans, Harry Potter, un orphelin élevé par un oncle et une tante qui le détestent, voit son existence bouleversée. Un géant nommé Hagrid, vient le chercher pour l\'emmener à Poudlard, une école de sorcellerie ! Voler en balai, jeter des sorts, combattre les trolls : Harry se révèle un sorcier doué.', 'ressources\\affiche\\7.png'),
(8, 'Harry Potter et la Chambre des secrets', 'livre', 'J. K. Rowling', '1998-07-02', 'Une rentrée fracassante en voiture volante, une étrange malédiction qui s\'abat sur les élèves, cette deuxième année à l\'école des sorciers ne s\'annonce pas de tout repos !', 'ressources\\affiche\\8.png'),
(9, 'Harry Potter et le Prisonnier d\'Azkaban', 'livre', 'J. K. Rowling', '1999-10-19', 'Sirius Black, le dangereux criminel qui s\'est échappé de la forteresse d\'Azkaban, recherche Harry Potter. C\'est donc sous bonne garde que l\'apprenti sorcier fait sa troisième rentrée.', 'ressources\\affiche\\9.png'),
(10, 'Harry Potter et la Coupe de feu', 'livre', 'J. K. Rowling', '2000-07-08', 'Juste avant d\'assister à la coupe du Monde de Quidditch opposant les équipes d\'Irlande et de Bulgarie, Harry Potter fait un rêve étrange dans lequel il est témoin du meurtre d\'un vieux jardinier moldu par Voldemort, alors que le jardinier surprenait une conversation au sujet de Harry.', 'ressources\\affiche\\10.png'),
(11, 'Harry Potter et l\'Ordre du phénix', 'livre', 'J. K. Rowling', '2003-06-21', 'Quelques semaines après la renaissance de Voldemort, Harry et ses amis Ron et Hermione font leur entrée en 5e année à Poudlard, de plus en plus contrôlé par le ministère qui refuse de croire au retour du mage noir et fait en sorte de discréditer Albus Dumbledore.', 'ressources\\affiche\\11.png'),
(12, 'Harry Potter et le Prince de sang-mêlé', 'livre', 'J. K. Rowling', '2005-07-16', 'Harry rentre en sixième année à l\'école de sorcellerie Poudlard (Hogwarts, en anglais). Il entre alors en possession d\'un livre de potion portant le mot « propriété du Prince de sang-mêlé » et commence à en savoir plus sur le sombre passé de Voldemort qui était encore connu sous le nom de Tom Jedusor.', 'ressources\\affiche\\12.png'),
(13, 'Harry Potter et les Reliques de la Mort', 'livre', 'J. K. Rowling', '2007-07-21', 'Cette année, Harry a 17 ans et ne retourne pas à l\'école de Poudlard après la mort de Dumbledore. Avec Ron et Hermione il se consacre à la dernière mission confiée par Dumbledore, la chasse aux Horcruxes.', 'ressources\\affiche\\13.png'),
(14, 'The Hunger Games', 'livre', 'Suzanne Collins', '2008-09-14', 'Dans un futur sombre, sur les ruines des États-Unis, un jeu télévisé est créé pour contrôler le peuple par la terreur.\r\nDouze garçons et douze filles tirés au sort participent à cette sinistre téléréalité, que tout le monde est forcé de regarder en direct. Une seule règle dans l\'arène : survivre, à tout prix.\r\nQuand sa petite sœur est appelée pour participer aux Hunger Games, Katniss n\'hésite pas une seconde. Elle prend sa place, consciente du danger. À seize ans, Katniss a déjà été confrontée plusieurs fois à la mort. Chez elle, survivre est comme une seconde nature...', 'ressources\\affiche\\14.png'),
(15, 'Hunger games: L\'embrasement', 'livre', 'Suzanne Collins', '2009-09-01', 'Après le succès des derniers Hunger Games, le peuple de Panem est impatient de retrouver Katniss et Peeta pour la Tournée de la victoire. Mais pour Katniss, il s\'agit surtout d\'une tournée de la dernière chance. Celle qui a osé défier le Capitole est devenue le symbole d\'une rébellion qui pourrait bien embraser Panem.', 'ressources\\affiche\\15.png'),
(16, 'Hunger Games : La Révolte', 'livre', 'Suzanne Collins', '2010-08-24', 'Contre toute attente, Katniss a survécu une seconde fois aux Hunger Games. Mais le Capitole crie vengeance. Katniss doit payer les humiliations qu\'elle lui a fait subir. Et le président Snow a été très clair : Katniss n\'est pas la seule à risquer sa vie. Sa famille, ses amis et tous les anciens habitants du district Douze sont visés par la colère sanglante du pouvoir. Pour sauver les siens, Katniss doit redevenir le geai moqueur, le symbole de la rébellion. Quel que soit le prix à payer.', 'ressources\\affiche\\16.png'),
(17, 'Cinquante nuances de Grey', 'livre', 'E. L. James', '2011-05-25', 'Anastasia Steele, étudiante en littérature, a accepté la proposition de son amie journaliste de prendre sa place pour interviewer Christian Grey, un jeune et richissime chef d’entreprise de Seattle. Dès le premier regard, elle est à la fois séduite et intimidée. Convaincue que leur rencontre a été désastreuse, elle tente de l\'oublier, jusqu\'à ce qu\'il débarque dans le magasin où elle travaille à mi-temps et lui propose un rendez-vous. Ana est follement attirée par cet homme. Lorsqu\'ils entament une liaison passionnée, elle découvre son pouvoir érotique, ainsi que la part obscure qu’il tient à dissimuler... Romantique, libératrice et totalement addictive, la trilogie Fifty Shades, dont Cinquante nuances de Grey est le premier volume, vous obsédera, vous possédera et vous marquera à jamais.', 'ressources\\affiche\\17.png'),
(18, '2 Fast 2 Furious', 'film', 'John Singleton', '2003-06-18', 'Deux coureurs automobiles casse-cou sont recrutés par le FBI pour infiltrer l\'entourage d\'un dangereux criminel.', 'ressources\\affiche\\18.png'),
(25, 'Fast and Furious 5', 'film', 'Justin Lin', '2011-05-04', 'Recherché par la police du monde entier, Dominic Toretto se voit contraint à l\'exil forcé au Brésil. Ne pouvant garder profil bas bien longtemps, il réunit son équipe de fous du volant et s\'attaque ouvertement au chef du grand cartel local. Un flic implacable s\'est juré de mettre un terme à leurs activités illégales.', 'ressources\\affiche\\25.png'),
(26, 'Fast and Furious 6', 'film', 'Justin Lin', '2013-05-22', 'Dom, Brian et toute leur équipe, après le casse de Rio, se sont dispersés aux quatre coins du globe. Mais l\'incapacité de rentrer chez eux, et l\'obligation de vivre en cavale permanente, laissent à leur vie le goût amer de l\'inaccomplissement.', 'ressources\\affiche\\26.png'),
(27, 'Fast and Furious 7', 'film', 'James Wan', '2015-04-1', 'À la suite des événements de Londres, Deckard Shaw cherche à venger la mort de son jeune frère. Le redoutable truand est prêt à tout pour éliminer Dominic Toretto et ses proches. Une milice privée vient d\'enlever un mystérieux hackeur se faisant appeler Ramsay qui a créé un système de traçage révolutionnaire ; cet outil ultra-perfectionné et d\'une diabolique efficacité ne doit en aucun cas tomber entre de mauvaises mains.', 'ressources\\affiche\\27.png'),
(28, 'Fast and Furious 8', 'film', 'F. Gary Gray', '2017-04-12', 'Des rivages de Cuba aux rues de New York en passant par les plaines gelées de la mer arctique de Barrents, l\'équipe va sillonner le globe pour tenter d\'empêcher une anarchiste de déchaîner un chaos mondial et de ramener à la maison l\'homme qui a fait d\'eux une famille.', 'ressources\\affiche\\28.png'),
(29, 'Assassin\'s Creed', 'jeux', 'Maxime Béland', '2007-11-13', 'L\'histoire est axée sur Desmond Miles qui revit les actions de son ancêtre à l\'aide d\'une machine nommée « Animus ». Son aïeul Altaïr Ibn-La\'Ahad est un assassin d\'élite agissant en Terre sainte à l\'époque de la Troisième croisade.', 'ressources\\affiche\\29.png'),
(30, 'Assassin\'s Creed II', 'jeux', ' Patrick Plourde', '2009-11-17', 'Assassin\'s Creed II est un jeu vidéo d\'action-aventure qui est sorti en novembre 2009. ... Ce jeu raconte l\'histoire d\'Ezio Auditore da Firenze, un jeune adolescent vivant à Florence. Un jour, sa famille est trahie et exécutée. Il décide de se venger en rejoignant le groupe des Assassins, comme son père avant lui.', 'ressources\\affiche\\30.png'),
(31, 'Assassin\'s Creed III', 'jeux', 'Ubisoft Montréal', '2012-10-30', 'Desmond Miles, son père William, et les techniciens de l\'Animus, Rebecca et Shaun, trouvent le Temple dans une caverne dans le Nord de l\'État de New York. Desmond active une grande partie de l\'équipement laissé par la Première Civilisation, ainsi qu\'un compte à rebours réglé sur le 21 décembre 2012. Voyant qu\'il manque une dernière clé pour accéder au contenu du Temple, Desmond tombe dans un état de fugue dissociative. Il retourne dans l\'Animus et se retrouve à Londres en 1754 dans le souvenir de l\'un de ses ancêtres anglais, un gentleman nommé Haytham Kenway.', 'ressources\\affiche\\31.png'),
(32, 'League of Legends', 'jeux', 'Riot Games', '2009-10-27', 'League of Legends est un jeu vidéo sorti en 2009 de type arène de bataille en ligne, free-to-play, développé et édité par Riot Games sur Windows et Mac OS', 'ressources\\affiche\\32.png'),
(33, 'World of Warcraft', 'jeux', 'Blizzard Entertainment', '2004-11-23', 'World of Warcraft est un jeu vidéo de type MMORPG développé par la société Blizzard Entertainment. C\'est le 4eme jeu de l\'univers médiéval-fantastique Warcraft, introduit par Warcraft: Orcs and Humans en 1994.', 'ressources\\affiche\\33.png'),
(34, 'Call of Duty: Black Ops', 'jeux', 'Activision', '2010-11-09', 'Call of Duty: Black Ops est un jeu vidéo de tir à la première personne développé par Treyarch et édité par Activision en novembre 2010 sur PlayStation 3, Xbox 360, Wii ainsi que sur Windows. Le studio de développement n-Space s\'est occupé de développer une autre version sur Nintendo DS.', 'ressources\\affiche\\34.png'),
(35, 'Call of Duty: Black Ops II', 'jeux', 'Treyarch', '2012-11-12', 'Call of Duty : Black Ops II est un jeu vidéo de tir à la première personne développé par Treyarch et édité par Activision, sorti le 13 novembre 2012 sur PlayStation 3, Xbox 360, Windows et Wii U.', 'ressources\\affiche\\35.png'),
(36, 'Call of Duty: Modern Warfare 3', 'jeux', 'Infinity Ward', '2011-11-08', 'Call of Duty: Modern Warfare 3 est un jeu vidéo de tir à la première personne développé conjointement par Infinity Ward et Sledgehammer Games ainsi que Raven Software pour la partie multijoueur, et édité par Activision en novembre 2011.', 'ressources\\affiche\\36.png'),
(37, 'Minecraft', 'jeux', 'Mojang', '2011-11-18', 'Le mode survie plonge le joueur dans un monde peuplé de monstres qui apparaissent dans les endroits sombres, c\'est-à-dire la nuit et dans les grottes non éclairées. C\'est le mode principal et par défaut des mondes Minecraft. Le joueur doit survivre et être capable de se défendre.', 'ressources\\affiche\\37.png'),
(38, 'Among Us', 'jeux', 'InnerSloth', '2018-06-15', 'Among Us est un jeu vidéo d\'ambiance multijoueur en ligne développé et édité par le studio InnerSloth, sorti en 2018 sur Android, iOS, Chrome OS puis Windows, en 2020 sur Nintendo Switch et en 2021 sur Xbox One et Xbox Series. Le jeu se déroule dans un univers de science-fiction.', 'ressources\\affiche\\38.png'),
(39, 'Counter-Strike: Global Offensive', 'jeux', 'Valve', ' 2012-09-21', 'Counter-Strike: Global Offensive est un jeu de tir à la première personne multijoueur en ligne basé sur le jeu d\'équipe développé par Valve Corporation. Il est sorti le 21 août 2012 sur PC et consoles. En 2017, Microsoft annonce que le jeu sur Xbox 360 sera compatible avec la Xbox One. ', 'ressources\\affiche\\39.png'),
(40, 'Mortal Kombat X', 'jeux', 'Unreal Engine 3', '2015-04-07', 'Mortal Kombat X est un jeu vidéo de combat développé par NetherRealm Studios en collaboration avec High Voltage Software et édité par Warner Bros. Interactive Entertainment sur PlayStation 4, Xbox One, Windows, iOS et Android. Le jeu est sorti le 14 avril 2015.', 'ressources\\affiche\\40.png');

-- --------------------------------------------------------

--
-- Structure de la table `liste`
--

DROP TABLE IF EXISTS `liste`;
CREATE TABLE IF NOT EXISTS `liste` (
  `idliste` int(11) NOT NULL AUTO_INCREMENT,
  `iditem` int(11) NOT NULL,
  `idusers` int(11) NOT NULL,
  PRIMARY KEY (`idliste`),
  KEY `fk_listeiditem` (`iditem`),
  KEY `fk_listeidusers` (`idusers`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `liste`
--

INSERT INTO `liste` (`idliste`, `iditem`, `idusers`) VALUES
(34, 4, 1),
(13, 1, 1),
(32, 13, 1),
(14, 3, 1),
(16, 12, 1),
(17, 10, 1),
(18, 8, 1),
(19, 6, 1),
(35, 18, 1),
(49, 1, 7),
(59, 11, 1),
(78, 17, 1);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `idnote` int(11) NOT NULL AUTO_INCREMENT,
  `note` int(11) NOT NULL,
  `iditem` int(11) NOT NULL,
  `idusers` int(11) NOT NULL,
  PRIMARY KEY (`idnote`),
  KEY `fk_item` (`iditem`),
  KEY `fk_users` (`idusers`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`idnote`, `note`, `iditem`, `idusers`) VALUES
(1, 8, 13, 1),
(2, 1, 18, 1),
(3, 1, 4, 1),
(4, 9, 17, 1),
(5, 9, 6, 1),
(6, 6, 3, 1),
(7, 2, 1, 1),
(8, 6, 14, 1),
(9, 5, 2, 1),
(10, 8, 16, 1),
(11, 7, 15, 1),
(15, 1, 17, 7),
(14, 8, 1, 7),
(16, 10, 5, 7),
(17, 3, 17, 8),
(18, 9, 11, 1);

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
  `avatar` varchar(1000) NOT NULL DEFAULT 'default',
  `biographie` varchar(500) NOT NULL DEFAULT 'Fanatique de BiblioTech.',
  `artiste` varchar(100) NOT NULL DEFAULT 'Aucun',
  `livre` varchar(100) NOT NULL DEFAULT 'Aucun',
  `film` varchar(100) NOT NULL DEFAULT 'Aucun',
  `jeux` varchar(100) NOT NULL DEFAULT 'Aucun',
  `contact` varchar(100) NOT NULL DEFAULT 'bibliotech@gmail.com',
  PRIMARY KEY (`idusers`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idusers`, `admin`, `pseudo`, `email`, `password`, `avatar`, `biographie`, `artiste`, `livre`, `film`, `jeux`, `contact`) VALUES
(1, 1, 'Vincent', 'millot007@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Vincent', 'Fanatique de BiblioTech.', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'bibliotech@gmail.com'),
(2, 0, 'LÃ©o', 'leo@lecon.fr', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'default', 'Fanatique de BiblioTech.', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'bibliotech@gmail.com'),
(3, 0, 'Leo', 'leo@lecon2.fr', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'default', 'Fanatique de BiblioTech.', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'bibliotech@gmail.com'),
(4, 0, 'Le Leto', 'leleto.fr@gmail.com', '4fd505f8aeed956f068c4ce57bfc30a6131b7c79', 'default', 'Fanatique de BiblioTech.', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'bibliotech@gmail.com'),
(5, 1, 'skull26240', 'skull26240@gmail.com', '3d0968c2d124ed850ecf2be4b3a533742ca87738', 'default', 'Fanatique de BiblioTech.', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'bibliotech@gmail.com'),
(6, 0, 'Antoinelebg', 'antoine@leplusbeau.fr', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'default', 'Fanatique de BiblioTech.', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'bibliotech@gmail.com'),
(7, 1, 'meuh', 'meih@meuh', '8f2649b913b6ec5903aa68a2d607798ea22eaa98', 'meuh', 'Fanatique de BiblioTech.', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'bibliotech@gmail.com'),
(8, 0, 'Ambre Ferreira', 'portugal22012000@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'default', 'Fanatique de BiblioTech.', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'bibliotech@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
