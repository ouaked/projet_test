-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 11 oct. 2018 à 13:37
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ifpa_projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `calendrier`
--

DROP TABLE IF EXISTS `calendrier`;
CREATE TABLE IF NOT EXISTS `calendrier` (
  `id_calendrier` int(11) NOT NULL AUTO_INCREMENT,
  `jour` text NOT NULL,
  `id_menu` int(11) NOT NULL,
  PRIMARY KEY (`id_calendrier`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `calendrier`
--

INSERT INTO `calendrier` (`id_calendrier`, `jour`, `id_menu`) VALUES
(1, 'lundi', 1),
(2, 'mardi', 2),
(3, 'mercredi', 3),
(4, 'jeudi', 4),
(5, 'vendredi', 5),
(6, 'lundi', 6),
(7, 'mardi', 8);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `date_commande` date NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `prix` decimal(4,2) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `id_menu` int(11) NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `date_commande`, `id_utilisateur`, `prix`, `etat`, `id_menu`) VALUES
(2, '2018-10-12', 1, '12.50', 1, 14),
(3, '2018-10-11', 2, '8.50', 1, 16),
(4, '2018-10-11', 2, '12.50', 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

DROP TABLE IF EXISTS `ligne_commande`;
CREATE TABLE IF NOT EXISTS `ligne_commande` (
  `id_ligne_commande` int(11) NOT NULL AUTO_INCREMENT,
  `id_commande` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id_ligne_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prix` decimal(4,2) NOT NULL,
  `detail` text NOT NULL,
  `id_jour` int(11) DEFAULT NULL COMMENT '1=lundi, 2=mardi, 3=mercredi....',
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id_menu`, `nom`, `prix`, `detail`, `id_jour`) VALUES
(1, 'Complet Printanier 01', '12.50', 'Entrée : Terrine d\'aubergines au coulis de tomate\r\nPlat : Risotto aux asperges, pois gourmands, carotte et poulet\r\nDessert : Charlotte aux fraises revisitée', 1),
(2, 'Complet Printanier 02', '12.50', 'Entrée : Avocat farci à la macédoine maison\r\nPlat : Boulettes de poulet tandoori, raita de concombre, riz\r\nDessert: Crumble à la rhubarbe, fraise et noix de coco', 1),
(3, 'Light Printanier 01', '8.50', 'Entrée : Soupe de lentilles épicée\r\nPlat : Tarte légère à la courgette, jambon et chèvre gratiné', 1),
(4, 'Light Printanier 02', '8.50', 'Plat : Pavé de boeuf et flan à la carotte et fromage\r\nDessert : Gâteau au yaourt, amandes et fraises', 1),
(5, 'Complet Estival 1', '12.50', 'Entrée : Flan à la ratatouille\r\nPlat : Mélange de céréales au poulet et légumes du soleil\r\nDessert : Tarte aux abricots et amandes', 2),
(6, 'Complet Estival 2', '12.50', 'Entrée : Tarte brick courgette et feta\r\nPlat : Spaghetti à la crème de poivron, crevette et chorizo\r\nDessert : Muffin coco/framboise', 2),
(7, 'Light Estival 1', '8.50', 'Entrée : Gaspacho de concombre à la menthe\r\nPlat : Papillote de cabillaud aux 3 poivrons, curry et semoule\r\n', 3),
(8, 'Light Estival 2', '8.50', 'Plat : Boulgour façon risotto, dinde et légumes croquants\r\nDessert : Crème mousseuse au chocolat blanc et coulis de groseille', 3),
(9, 'Complet Automnal 1', '12.50', 'Entrée : Flanc de poireaux au bacon et chèvre\r\nPlat : Poulet à l\'ananas et son riz thaï\r\nDessert : Gâteau fondant au chocolat et dattes', 3),
(10, 'Complet Automnal 2', '12.50', 'Entrée : Salade de pois chiche, butternut rôtie et feta\r\nPlat : Hachis parmentier de poulet au potimarron\r\nDessert : Panna cotta au chocolat blanc et fruit de la passion', 4),
(11, 'Light Automnal 1', '8.50', 'Entrée : Crème de chou-fleur au lait de coco\r\nPlat : Cassolette de poisson aux légumes et curry avec son riz parfumé', 4),
(12, 'Light Automnal 2', '8.50', 'Plat : Tagliatelle au poireaux, bacon et sa sauce moutarde\r\nDessert : Crumble pomme/poire et sa pointe de chocolat', 4),
(13, 'Complet Hivernal 1', '12.50', 'Entrée : Soupe de haricots blancs au chorizo\r\nPlat : Tartiflette légère\r\nDessert : Tiramisu au café', 4),
(14, 'Complet Hivernal 2', '12.50', 'Entrée : Flan de poireaux et carotte au curry\r\nPlat : Hachis parmentier de canard à la patate douce\r\nDessert : Galette des rois au Grand Marnier', 5),
(15, 'Light Hivernal 1', '8.50', 'Entrée : Bouillon asiatique au bœuf, nouilles et petits légumes\r\nPlat : Filet mignon rôti au miel à l\'orange avec sa purée maison', 5),
(16, 'Light Hivernal 2', '8.50', 'Plat : Lasagne de bœuf, carotte et mozzarella\r\nDessert : Bûche roulée au citron et praliné', 5);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `mail` text NOT NULL,
  `mdp` text NOT NULL,
  `role` tinyint(1) NOT NULL,
  `fonction` text NOT NULL,
  `cagnotte` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `mail`, `mdp`, `role`, `fonction`, `cagnotte`) VALUES
(1, '00', 'bb', 'ouaksad@hotmail.fr', '$2y$10$PIJ.wP3XkZJzFH3v8E5DbeBVtt2GXvEcG.oTAQxA4tfqTALEOn6y.', 0, 'stagiaire', 50),
(2, 'admin', 'oo', 'admin@hotmail.fr', '$2y$10$GrNrZC6gRwyzObi0q3pdw.yzvkLYX9o4vy6N3feWZG9wtdmpwcrB6', 1, 'stagiaire', 60);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
