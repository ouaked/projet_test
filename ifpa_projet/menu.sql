-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 09 oct. 2018 à 09:25
-- Version du serveur :  5.7.21
-- Version de PHP :  7.0.29

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
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prix` decimal(4,2) NOT NULL,
  `detail` text NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id_menu`, `nom`, `prix`, `detail`) VALUES
(1, 'Complet Printanier 01', '12.50', 'Entrée : Terrine d\'aubergines au coulis de tomate\r\nPlat : Risotto aux asperges, pois gourmands, carotte et poulet\r\nDessert : Charlotte aux fraises revisitée'),
(2, 'Complet Printanier 02', '12.50', 'Entrée : Avocat farci à la macédoine maison\r\nPlat : Boulettes de poulet tandoori, raita de concombre, riz\r\nDessert: Crumble à la rhubarbe, fraise et noix de coco'),
(3, 'Light Printanier 01', '8.50', 'Entrée : Soupe de lentilles épicée\r\nPlat : Tarte légère à la courgette, jambon et chèvre gratiné'),
(4, 'Light Printanier 02', '8.50', 'Plat : Pavé de boeuf et flan à la carotte et fromage\r\nDessert : Gâteau au yaourt, amandes et fraises'),
(5, 'Complet Estival 1', '12.50', 'Entrée : Flan à la ratatouille\r\nPlat : Mélange de céréales au poulet et légumes du soleil\r\nDessert : Tarte aux abricots et amandes'),
(6, 'Complet Estival 2', '12.50', 'Entrée : Tarte brick courgette et feta\r\nPlat : Spaghetti à la crème de poivron, crevette et chorizo\r\nDessert : Muffin coco/framboise'),
(7, 'Light Estival 1', '8.50', 'Entrée : Gaspacho de concombre à la menthe\r\nPlat : Papillote de cabillaud aux 3 poivrons, curry et semoule\r\n'),
(8, 'Light Estival 2', '8.50', 'Plat : Boulgour façon risotto, dinde et légumes croquants\r\nDessert : Crème mousseuse au chocolat blanc et coulis de groseille'),
(9, 'Complet Automnal 1', '12.50', 'Entrée : Flanc de poireaux au bacon et chèvre\r\nPlat : Poulet à l\'ananas et son riz thaï\r\nDessert : Gâteau fondant au chocolat et dattes'),
(10, 'Complet Automnal 2', '12.50', 'Entrée : Salade de pois chiche, butternut rôtie et feta\r\nPlat : Hachis parmentier de poulet au potimarron\r\nDessert : Panna cotta au chocolat blanc et fruit de la passion'),
(11, 'Light Automnal 1', '8.50', 'Entrée : Crème de chou-fleur au lait de coco\r\nPlat : Cassolette de poisson aux légumes et curry avec son riz parfumé'),
(12, 'Light Automnal 2', '8.50', 'Plat : Tagliatelle au poireaux, bacon et sa sauce moutarde\r\nDessert : Crumble pomme/poire et sa pointe de chocolat'),
(13, 'Complet Hivernal 1', '12.50', 'Entrée : Soupe de haricots blancs au chorizo\r\nPlat : Tartiflette légère\r\nDessert : Tiramisu au café'),
(14, 'Complet Hivernal 2', '12.50', 'Entrée : Flan de poireaux et carotte au curry\r\nPlat : Hachis parmentier de canard à la patate douce\r\nDessert : Galette des rois au Grand Marnier'),
(15, 'Light Hivernal 1', '8.50', 'Entrée : Bouillon asiatique au bœuf, nouilles et petits légumes\r\nPlat : Filet mignon rôti au miel à l\'orange avec sa purée maison'),
(16, 'Light Hivernal 2', '8.50', 'Plat : Lasagne de bœuf, carotte et mozzarella\r\nDessert : Bûche roulée au citron et praliné');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
