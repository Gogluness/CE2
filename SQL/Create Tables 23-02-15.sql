-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 23 Mars 2015 à 08:18
-- Version du serveur :  5.5.41-0ubuntu0.14.10.1
-- Version de PHP :  5.5.12-2ubuntu4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `CE2`
--

-- --------------------------------------------------------

--
-- Structure de la table `Adresses`
--

CREATE TABLE IF NOT EXISTS `Adresses` (
  `ID` int(11) NOT NULL,
  `Nom` int(11) NOT NULL,
  `Ville` int(11) NOT NULL,
  `Adresse` int(11) NOT NULL,
  `Procinve` int(11) NOT NULL,
  `Code Postal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Commande`
--

CREATE TABLE IF NOT EXISTS `Commande` (
`NoCommande` int(11) NOT NULL,
  `DateCommande` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Username` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Commande`
--

INSERT INTO `Commande` (`NoCommande`, `DateCommande`, `Username`) VALUES
(1, '2015-03-23 12:17:27', 'testtest');

-- --------------------------------------------------------

--
-- Structure de la table `CommandeProduits`
--

CREATE TABLE IF NOT EXISTS `CommandeProduits` (
  `NoCommande` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `Quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `CommandeProduits`
--

INSERT INTO `CommandeProduits` (`NoCommande`, `idProduit`, `Quantite`) VALUES
(1, 10, 4),
(1, 30, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Facture`
--

CREATE TABLE IF NOT EXISTS `Facture` (
  `NoFacture` int(11) NOT NULL,
  `Client` int(11) NOT NULL,
  `Date` date NOT NULL,
  `QteTotal` int(11) NOT NULL,
  `ShippingAddress` int(11) NOT NULL,
  `BilingAddress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Img`
--

CREATE TABLE IF NOT EXISTS `Img` (
  `ID` int(11) NOT NULL,
  `FilePath` int(11) NOT NULL,
  `Width` int(11) NOT NULL,
  `Height` int(11) NOT NULL,
  `Filetype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `LigneFacture`
--

CREATE TABLE IF NOT EXISTS `LigneFacture` (
  `ID` int(11) NOT NULL,
  `NoFacture` int(11) NOT NULL,
  `IDProduit` int(11) NOT NULL,
  `Qte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `LignePanier`
--

CREATE TABLE IF NOT EXISTS `LignePanier` (
  `ID` int(11) NOT NULL,
  `IDPanier` int(11) NOT NULL,
  `IDProduit` int(11) NOT NULL,
  `Qte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Modele`
--

CREATE TABLE IF NOT EXISTS `Modele` (
`ID` int(10) NOT NULL,
  `Grandeur` text,
  `Vent` text,
  `Tissus` text,
  `Armature` text,
  `Emballage` text,
  `Cordes` text,
  `Poids` text,
  `NomModele` text
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `Modele`
--

INSERT INTO `Modele` (`ID`, `Grandeur`, `Vent`, `Tissus`, `Armature`, `Emballage`, `Cordes`, `Poids`, `NomModele`) VALUES
(1, '140 X 53 cm', '15 - 30 km', 'Ripstop Nylon', 'Tige de fibre de verre', 'Sac plastique', 'Inlcuses, 20m', NULL, 'Acrobatique'),
(2, '152 x 67 cm', '15 - 30 km', 'Ripstop Nylon', 'Tube de fibre de verre', 'Étui de nylon', 'Incluses, 49.9 kg', '182 gr.', 'Acrobatique'),
(3, '159 x 73 cm', '15 - 30 km', 'Ripstop Nylon', 'Tube de fibre de verre', 'Étui de nylon', 'Inlcuses, 45.4 kg', '212 gm', 'Acrobatique'),
(4, '221 x 99 cm', '15 – 30 km', 'Ripstop Nylon', 'Tube de fibre de verre', 'Étui de nylon', 'Incluse, 90.7 kg', '520 gr.', 'Acrobatique'),
(5, '229 x 114 cm', '12 - 35 km', 'Ripstop Nylon', 'Skyshark frame', 'Étui de nylon', 'Incluses, 68 kg', '283 gr.', 'Acrobatique'),
(6, '204.5 x 79 cm', '12 - 40 km', 'Ripstop Nylon', 'Skyshark frame', 'Étui de nylon', 'Incluses, 68 kg', '255 gr.', 'Acrobatique'),
(7, '130 x 55 cm', '10 – 35 km', 'Ripstop Nylon', 'Fibre de verre', 'Étui de nylon', 'Incluse, 68 kg, 24.4 m ', NULL, 'Barracuda 1.3'),
(8, '161 x 71 cm', '10 – 35 km', 'Ripstop Nylon', 'Fibre de verre', 'Étui de nylon', 'Incluse, 90.7 kg, 24.4 m', NULL, 'Barracuda 1.7'),
(9, '259 x 135 cm', '8 - 32 km', 'Ripstop Nylon', 'Tube de fibre de verre', NULL, 'Non-incluse, recommandé 40.8 kg', NULL, 'Deltas 9'''),
(10, '330 x 165 cm', '8 - 32 km', 'Ripstop Nylon', 'Carbone et fibre de verre', NULL, 'Non-incluses, recommandé 68 kg', NULL, 'Deltas 11'''),
(11, '572 x 285 cm', '8 - 32 km', 'Ripstop Nylon', 'Fibre de verre', NULL, 'Non-incluse, recommandé 226.8 kg', NULL, 'Deltas 19'''),
(12, '200 x 698 cm', '10 - 32 km/h', 'Nylon', 'Carbone et fibre de verre', NULL, 'Non-incluse, recommandé 22.7 - 40.8 kg', NULL, 'Flo-Tails Deltas 6.5'''),
(13, '396 x 1359 cm', '10 - 32 km/h', 'Nylon', 'Carbone et fibre de verre', NULL, 'Non-incluse, recommandé 22.7 - 40.8 kg', NULL, 'Flo-Tails Deltas 13'''),
(14, '160 x 102 cm', '10 - 32 km/h', 'Ripstop Nylon', NULL, NULL, 'Incluses, 40.8 kg', NULL, 'Collection'),
(15, ' 242 x 113 cm', '10 - 32 km/h', 'Ripstop Nylon', NULL, NULL, 'Non-incluse, recommandé 68 kg', NULL, 'Collection'),
(16, '323 x 150 cm.', '8 - 32 km/h', 'Ripstop Nylon', NULL, NULL, 'Non-incluse, recommandé 226.8 kg', NULL, 'Collection'),
(17, '452 x 210 cm', '10 - 32 km/h', 'Ripstop Nylon', NULL, NULL, 'Non-incluse, recommandé 453.6 kg', NULL, 'Collection'),
(18, '160 x 198 cm', '6 - 30 km/h', 'Ripstop Nylon', 'Armature recouverte de carbone', NULL, 'Non-incluse, recommandé 68kg', NULL, 'Collection'),
(19, '15 m', '10 - 29 km/h', 'Ripstop Nylon', NULL, NULL, 'Non-incluse, 226.8 kg recommandé', NULL, 'Mega'),
(20, '183 x 1036 cm', '10 - 29 km/h', 'Ripstop Nylon', NULL, NULL, 'Non-incluses, 226.8 kg recommandé', NULL, 'Mega'),
(21, '159 x 285 cm', '10 - 30 km/h', 'Ripstop Nylon', 'Carbone', NULL, 'Non-incluse, 22.7 kg recommandé', NULL, 'Mega'),
(22, '323 x 1341 cm', '10 - 30 km/h', 'Ripstop Nylon', 'Fibre de verre enveloppés', NULL, 'Non-incluses, 113.4 kg recommandé', NULL, 'Mega'),
(23, '163 x 565 cm', '10 - 30 km/h', 'Ripstop Nylon', 'Carbone et fibre de verre', NULL, 'Non-incluses, 36.3 kg recommandé', NULL, 'Mega'),
(24, '240 x 245 cm', '10 - 30 km/h', 'Ripstop Nylon', 'Carbone et fibre de verre', NULL, 'Non-incluse, 113.4 kg recommandé', NULL, 'Mega'),
(25, '240 x 245 cm', '10 - 30 km/h', 'Ripstop Nylon', 'Carbone et fibre de verre', NULL, 'Non-incluses, 113.4 kg recommandé', NULL, 'Mega'),
(26, '488 x 549 cm', '10 - 30 km/h', 'Ripstop Nylon', NULL, NULL, 'Non-incluse, 453.6 kg recommandé', NULL, 'Mega'),
(27, '7 x 7.6 m', '10 - 30 km/h', 'Ripstop Nylon', NULL, NULL, 'Non-incluse, 453.4 kg recommandé', NULL, 'Mega'),
(28, '9.1 m', '10 - 30 km/h', 'Ripstop Nylon', NULL, NULL, 'Non-incluses, 453.6 kg recommandé', NULL, 'Mega'),
(29, '205 x 92 cm', '3 - 15 km/h', NULL, NULL, NULL, 'Non-incluse', '218 g', 'Acrobatique'),
(30, '231 cm', '5 - 40 km/h', 'Polyester', 'SkyShark P100', NULL, 'Incluse, 26 m, 68 kg', NULL, 'Acrobatique'),
(31, '94 x 91 cm', '6.5 - 40 km/h', 'Ripstop Polyester', 'Fibre de verre', NULL, 'Incluse, 61 m x 9 kg', NULL, 'Delta'),
(32, '175 x 85 cm', '5 - 20 km/h', 'Nylon', 'carbone 5mm', NULL, NULL, NULL, 'Acrobatique'),
(33, '3 x 15 m', '5 - 40 km/h', NULL, 'Carbone 8mm', NULL, NULL, NULL, 'R-Sky Delta'),
(34, '183 x 71 cm', '6 - 32 km/h', 'Ripstop Nylon', 'Carbone solide', NULL, 'Incluses, 36 kg', '182 gm', 'Acrobatique');

-- --------------------------------------------------------

--
-- Structure de la table `Panier`
--

CREATE TABLE IF NOT EXISTS `Panier` (
  `ID` int(11) NOT NULL,
  `Client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Produit`
--

CREATE TABLE IF NOT EXISTS `Produit` (
  `CUP` int(11) DEFAULT NULL,
  `IDModele` int(11) DEFAULT NULL,
`ID` int(11) NOT NULL,
  `Nom` text CHARACTER SET latin1,
  `Description` text CHARACTER SET latin1,
  `ImgPath` text CHARACTER SET latin1,
  `PrixVente` double DEFAULT NULL,
  `PrixCout` double DEFAULT NULL,
  `Quantite` int(4) NOT NULL DEFAULT '10',
  `NomCompagnie` varchar(100) CHARACTER SET latin1 DEFAULT 'Premier Kites'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=163 ;

--
-- Contenu de la table `Produit`
--

INSERT INTO `Produit` (`CUP`, `IDModele`, `ID`, `Nom`, `Description`, `ImgPath`, `PrixVente`, `PrixCout`, `Quantite`, `NomCompagnie`) VALUES
(NULL, 29, 1, 'Amazing', NULL, 'LevelOne/acrobatique/kites_01.jpg', 135, NULL, 10, 'Level One'),
(NULL, 29, 10, 'Neon Patchwork', NULL, 'PremierKites/collection/deltas11/neon_patchwork.jpg', 140, NULL, 10, 'Premier Kites'),
(NULL, 29, 30, 'Easy', NULL, 'LevelOne/acrobatique/kites_03.jpg', 135, NULL, 10, 'Level One'),
(NULL, 29, 31, 'Reloaded', NULL, 'LevelOne/acrobatique/kites_05.jpg', 175, NULL, 10, 'Level One'),
(NULL, 29, 32, 'Reloaded', NULL, 'LevelOne/acrobatique/kites_06.jpg', 175, NULL, 10, 'Level One'),
(NULL, 29, 33, 'Merlin', NULL, 'LevelOne/acrobatique/kites_07.jpg', 190, NULL, 10, 'Level One'),
(NULL, 29, 34, 'Merlin', NULL, 'LevelOne/acrobatique/kites_08.jpg', 190, NULL, 10, 'Level One'),
(NULL, 29, 35, 'Jumping Jack Flash SUL', NULL, 'LevelOne/acrobatique/kites_11.jpg', 340, NULL, 10, 'Level One'),
(NULL, 29, 36, 'Jumping Jack Flash SUL', NULL, 'LevelOne/acrobatique/kites_12.jpg', 340, NULL, 10, 'Level One'),
(NULL, 29, 37, 'Jumping Jack Flash SUL', NULL, 'LevelOne/acrobatique/kites_13.jpg', 340, NULL, 10, 'Level One'),
(NULL, 29, 38, 'Jumping Jack Flash Excalibur UL', NULL, 'LevelOne/acrobatique/kites_14.jpg', 340, NULL, 10, 'Level One'),
(NULL, 29, 39, 'Jumping Jack Flash Excalibur STD', NULL, 'LevelOne/acrobatique/kites_15.jpg', 340, NULL, 10, 'Level One'),
(NULL, 29, 40, 'Gentleman UL', NULL, 'LevelOne/acrobatique/kites_23.jpg', 400, NULL, 10, 'Level One'),
(NULL, 29, 41, 'Black Perl Pro', NULL, 'LevelOne/acrobatique/kites_27.jpg', 365, NULL, 10, 'Level One'),
(NULL, 29, 42, 'Black Perl Pro', NULL, 'LevelOne/acrobatique/kites_28.jpg', 365, NULL, 10, 'Level One'),
(NULL, 29, 43, 'Black Perl Pro', NULL, 'LevelOne/acrobatique/kites_29.jpg', 365, NULL, 10, 'Level One'),
(NULL, 29, 45, 'Black Perl UL', NULL, 'LevelOne/acrobatique/kites_31.jpg', 350, NULL, 10, 'Level One'),
(NULL, 29, 46, 'Black Perl UL', NULL, 'LevelOne/acrobatique/kites_32.jpg', 350, NULL, 10, 'Level One'),
(NULL, 29, 47, 'Amazing', NULL, 'LevelOne/acrobatique/kites_46.jpg', 315, NULL, 10, 'Level One'),
(NULL, 29, 48, 'Jumping Jack Flash STD', NULL, 'LevelOne/acrobatique/kites_56.jpg', 230, NULL, 10, 'Level One'),
(NULL, 29, 49, 'Jumping Jack Flash STD', NULL, 'LevelOne/acrobatique/kites_57.jpg', 230, NULL, 10, 'Level One'),
(NULL, 29, 50, 'Jumping Jack Flash STD', NULL, 'LevelOne/acrobatique/kites_58.jpg', 230, NULL, 10, 'Level One'),
(NULL, 29, 51, 'Reloaded', NULL, 'LevelOne/acrobatique/kites_1.jpg', 175, NULL, 10, 'Level One'),
(NULL, 29, 52, 'Reloaded UL', NULL, 'LevelOne/acrobatique/kites_3.jpg', 175, NULL, 10, 'Level One'),
(NULL, 30, 53, 'E3 Citrus', NULL, 'Prism/acrobatique/e3_citrus.jpg', 190, NULL, 10, 'Prism'),
(NULL, 30, 54, 'E3 Spectrum', NULL, 'Prism/acrobatique/e3_spectrum.jpg', 190, NULL, 10, 'Prism'),
(NULL, 30, 55, 'E3 Graphite', NULL, 'Prism/acrobatique/e3_graphite.jpg', 190, NULL, 10, 'Prism'),
(NULL, 30, 56, '4D Blemished Sails', NULL, 'Prism/acrobatique/4d_yellow.jpg', 125, NULL, 10, 'Prism'),
(NULL, 30, 57, 'Zephyr Orca - Blemished Sail\r\n', NULL, 'Prism/acrobatique/zephyr-orca.jpg', 250, NULL, 10, 'Prism'),
(NULL, 31, 60, 'Stowaway Diamond Fusion', NULL, 'Prism/monofils/stowaway_diamond_fusion.jpg', 30, NULL, 10, 'Prism'),
(NULL, 31, 61, 'Stowaway Diamond Purple Haze', NULL, 'Prism/monofils/stowaway_diamond_purple_haze.jpg', 30, NULL, 10, 'Prism'),
(NULL, 31, 62, 'Stowaway Diamond Radiance', NULL, 'Prism/monofils/stowaway_diamond_radiance.jpg', 30, NULL, 10, 'Prism'),
(NULL, 32, 63, 'NSE Fifteen', NULL, 'R-Sky/acrobatique/NSE_Fifteen.jpg', 405, NULL, 10, 'R-Sky'),
(NULL, 32, 64, 'Essenciel', NULL, 'R-Sky/acrobatique/Essenciel.jpg', 150, NULL, 10, 'R-Sky'),
(NULL, 32, 65, 'Nirvana 3E', NULL, 'R-Sky/acrobatique/Nirvana_3E.jpg', 500, NULL, 10, 'R-Sky'),
(NULL, 32, 66, 'NSE - lw', NULL, 'R-Sky/acrobatique/NSE_lw.jpg', 475, NULL, 10, 'R-Sky'),
(NULL, 32, 67, 'Krystal - ww', NULL, 'R-Sky/acrobatique/Krystal_ww.jpg', 575, NULL, 10, 'R-Sky'),
(NULL, 32, 68, 'Krystal - lw', NULL, 'R-Sky/acrobatique/Krystal_lw.jpg', 530, NULL, 10, 'R-Sky'),
(NULL, 33, 69, 'Delta', 'Depuis longtemps R-SKY parcoure les festivals avec ses Deltas.\r\n\r\nCe sont les cerfs-volants monofils qui acceptent la plus grande plage de vent, le montage est ultra simple et rapide.\r\nIls dominent souvent le haut des festivals, laissant flotter au vent leurs 15 m de traine arrière.\r\n\r\n3 m d''envergure et du carbone de 8 mm offrent au Delta R-SKY une grande solidité. Installés seuls ou en arche, par une présence colorée et le doux frémissement de la voile, ils occupent fièrement le ciel.', 'R-Sky/monofils/delta.jpg', 405, NULL, 10, 'R-Sky'),
(NULL, 4, 70, 'Avenger - Fierce', NULL, 'PremierKites/acrobatique/avenger/fierce.jpg', 115, NULL, 10, 'Premier Kites'),
(NULL, 4, 71, 'Avenger - Rainbow', NULL, 'PremierKites/acrobatique/avenger/rainbow.jpg', 105, NULL, 10, 'Premier Kites'),
(NULL, 4, 72, 'Avenger - Tempest', NULL, 'PremierKites/acrobatique/avenger/tempest.jpg', 105, NULL, 10, 'Premier Kites'),
(NULL, 7, 73, 'Barracuda 1.3 - Rainbow', NULL, 'PremierKites/acrobatique/barracuda_1_3/rainbow.jpg', 50, NULL, 10, 'Premier Kites'),
(NULL, 7, 74, 'Barracuda 1.3 - Tecmo', NULL, 'PremierKites/acrobatique/barracuda_1_3/tecmo.jpg', 50, NULL, 10, 'Premier Kites'),
(NULL, 7, 75, 'Barracuda 1.3 - Tie Dye', NULL, 'PremierKites/acrobatique/barracuda_1_3/tie_dye.jpg', 50, NULL, 10, 'Premier Kites'),
(NULL, 8, 76, 'Barracuda 1.7 - Rainbow', NULL, 'PremierKites/acrobatique/barracuda_1_7/rainbow.jpg', 75, NULL, 10, 'Premier Kites'),
(NULL, 8, 77, 'Barracuda 1.7 - Tecmo', NULL, 'PremierKites/acrobatique/barracuda_1_7/tecmo.jpg', 75, NULL, 10, 'Premier Kites'),
(NULL, 8, 78, 'Barracuda 1.7 - Tie Dye', NULL, 'PremierKites/acrobatique/barracuda_1_7/tie_dye.jpg', 75, NULL, 10, 'Premier Kites'),
(NULL, 2, 79, 'Osprey - Fire Raptor', NULL, 'PremierKites/acrobatique/osprey/fire_raptor.jpg', 40, NULL, 10, 'Premier Kites'),
(NULL, 2, 80, 'Osprey - Green Raptor', NULL, 'PremierKites/acrobatique/osprey/green_raptor.jpg', 40, NULL, 10, 'Premier Kites'),
(NULL, 2, 81, 'Osprey - Red Raptor', NULL, 'PremierKites/acrobatique/osprey/red_raptor.jpg', 40, NULL, 10, 'Premier Kites'),
(NULL, 2, 82, 'Osprey - Rainbow Raptor', NULL, 'PremierKites/acrobatique/osprey/rainbow_raptor.jpg', 40, NULL, 10, 'Premier Kites'),
(NULL, 5, 83, 'Trick & Track - Lime Green', NULL, 'PremierKites/acrobatique/trick_and_track/lime_green.jpg', 160, NULL, 10, 'Premier Kites'),
(NULL, 5, 84, 'Trick & Track - Mango Orange', NULL, 'PremierKites/acrobatique/trick_and_track/mango_orange.jpg', 160, NULL, 10, 'Premier Kites'),
(NULL, 5, 85, 'Trick & Track - Passion', NULL, 'PremierKites/acrobatique/trick_and_track/passion.jpg', 170, NULL, 10, 'Premier Kites'),
(NULL, 3, 86, 'Vision - Kiwi Green', NULL, 'PremierKites/acrobatique/vision/kiwi_green.jpg', 60, NULL, 10, 'Premier Kites'),
(NULL, 3, 87, 'Vision - Purple', NULL, 'PremierKites/acrobatique/vision/purple.jpg', 60, NULL, 10, 'Premier Kites'),
(NULL, 3, 88, 'Vision - Rainbow Vortex', NULL, 'PremierKites/acrobatique/vision/rainbow_vortex.jpg', 55, NULL, 10, 'Premier Kites'),
(NULL, 3, 89, 'Vision - Raspberry Purple', NULL, 'PremierKites/acrobatique/vision/raspberry_purple.jpg', 60, NULL, 10, 'Premier Kites'),
(NULL, 3, 90, 'Vision - Red Vortex', NULL, 'PremierKites/acrobatique/vision/red_vortex.jpg', 60, NULL, 10, 'Premier Kites'),
(NULL, 6, 91, 'Wolf Ng - Black Rainbow', NULL, 'PremierKites/acrobatique/wolf_ng/black_rainbow.jpg', 170, NULL, 10, 'Premier Kites'),
(NULL, 6, 92, 'Wolf Ng - Warm', NULL, 'PremierKites/acrobatique/wolf_ng/warm.jpg', 170, NULL, 10, 'Premier Kites'),
(NULL, 6, 93, 'Wolf Ng - White Rainbow', NULL, 'PremierKites/acrobatique/wolf_ng/white_rainbow.jpg', 170, NULL, 10, 'Premier Kites'),
(NULL, 1, 94, 'Zoomer - Astrid', NULL, 'PremierKites/acrobatique/zoomer/astrid.jpg', 30, NULL, 10, 'Premier Kites'),
(NULL, 1, 95, 'Zoomer - Chilly', NULL, 'PremierKites/acrobatique/zoomer/chilly.jpg', 30, NULL, 10, 'Premier Kites'),
(NULL, 1, 96, 'Zoomer - Fury', NULL, 'PremierKites/acrobatique/zoomer/fury.jpg', 30, NULL, 10, 'Premier Kites'),
(NULL, 1, 97, 'Zoomer - Peace', NULL, 'PremierKites/acrobatique/zoomer/peace.jpg', 30, NULL, 10, 'Premier Kites'),
(NULL, 1, 98, 'Zoomer - Rainbow', NULL, 'PremierKites/acrobatique/zoomer/rainbow.jpg', 30, NULL, 10, 'Premier Kites'),
(NULL, 1, 99, 'Zoomer - Tie Dye', NULL, 'PremierKites/acrobatique/zoomer/tie_dye.jpg', 30, NULL, 10, 'Premier Kites'),
(NULL, 1, 100, 'Zoomer - Sizzling', NULL, 'PremierKites/acrobatique/zoomer/sizzling.jpg', 30, NULL, 10, 'Premier Kites'),
(NULL, 34, 101, 'Addiction - Hydro', NULL, 'PremierKites/acrobatique/addiction/hydro.jpg', 100, NULL, 10, 'Premier Kites'),
(NULL, 34, 102, 'Addiction - Warm', NULL, 'PremierKites/acrobatique/addiction/warm.jpg', 100, NULL, 10, 'Premier Kites'),
(NULL, 9, 103, 'Circles & Spears', NULL, 'PremierKites/collection/deltas9/circles_spears.jpg', 70, NULL, 10, 'Premier Kites'),
(NULL, 9, 104, 'Cool Bursts', NULL, 'PremierKites/collection/deltas9/cool_bursts.jpg', 70, NULL, 10, 'Premier Kites'),
(NULL, 9, 105, 'Indian Snake', NULL, 'PremierKites/collection/deltas9/indian_snake.jpg', 70, NULL, 10, 'Premier Kites'),
(NULL, 9, 106, 'Patriotic', NULL, 'PremierKites/collection/deltas9/patriotic.jpg', 70, NULL, 10, 'Premier Kites'),
(NULL, 9, 107, 'Rainbow Dots', NULL, 'PremierKites/collection/deltas9/rainbow_dots.jpg', 70, NULL, 10, 'Premier Kites'),
(NULL, 9, 108, 'RB Bursts', NULL, 'PremierKites/collection/deltas9/RB_bursts.jpg', 70, NULL, 10, 'Premier Kites'),
(NULL, 9, 109, 'RB Orbit', NULL, 'PremierKites/collection/deltas9/RB_orbit.jpg', 70, NULL, 10, 'Premier Kites'),
(NULL, 9, 110, 'Tecmo', NULL, 'PremierKites/collection/deltas9/tecmo.jpg', 70, NULL, 10, 'Premier Kites'),
(NULL, 9, 111, 'Teknacolor', NULL, 'PremierKites/collection/deltas9/teknacolor.jpg', 70, NULL, 10, 'Premier Kites'),
(NULL, 9, 112, 'Warm', NULL, 'PremierKites/collection/deltas9/warm.jpg', 70, NULL, 10, 'Premier Kites'),
(NULL, 9, 113, 'Warm Orbit', NULL, 'PremierKites/collection/deltas9/warm_orbit.jpg', 70, NULL, 10, 'Premier Kites'),
(NULL, 9, 114, 'Wavy Gradient', NULL, 'PremierKites/collection/deltas9/wavy_gradient.jpg', 70, NULL, 10, 'Premier Kites'),
(NULL, 9, 115, 'Geometric Cubes', NULL, 'PremierKites/collection/deltas9/geometric_cubes.jpg', 70, NULL, 10, 'Premier Kites'),
(NULL, 9, 116, 'Yellow Chevron', NULL, 'PremierKites/collection/deltas9/yellow_chevron.jpg', 70, NULL, 10, 'Premier Kites'),
(NULL, 10, 117, 'B/W Peace', NULL, 'PremierKites/collection/deltas11/BW_peace.jpg', 140, NULL, 10, 'Premier Kites'),
(NULL, 10, 118, 'Cool Fountain', NULL, 'PremierKites/collection/deltas11/cool_fountain.jpg', 140, NULL, 10, 'Premier Kites'),
(NULL, 10, 119, 'Groovy Peace', NULL, 'PremierKites/collection/deltas11/groovy_peace.jpg', 140, NULL, 10, 'Premier Kites'),
(NULL, 10, 121, 'Optic Checkers', NULL, 'PremierKites/collection/deltas11/optic_checkers.jpg', 140, NULL, 10, 'Premier Kites'),
(NULL, 10, 122, 'Patriotic', NULL, 'PremierKites/collection/deltas11/patriotic.jpg', 140, NULL, 10, 'Premier Kites'),
(NULL, 10, 123, 'Rainbow Fountain', NULL, 'PremierKites/collection/deltas11/rainbow_fountain.jpg', 140, NULL, 10, 'Premier Kites'),
(NULL, 10, 124, 'Rainbow Opt-Art', NULL, 'PremierKites/collection/deltas11/rainbow_opt-art.jpg', 140, NULL, 10, 'Premier Kites'),
(NULL, 10, 125, 'Teknacolor', NULL, 'PremierKites/collection/deltas11/teknacolor.jpg', 140, NULL, 10, 'Premier Kites'),
(NULL, 10, 126, 'Tie Dye', NULL, 'PremierKites/collection/deltas11/tie_dye.jpg', 140, NULL, 10, 'Premier Kites'),
(NULL, 10, 127, 'Mesh Rainbow', NULL, 'PremierKites/collection/deltas11/mesh_rainbow.jpg', 240, NULL, 10, 'Premier Kites'),
(NULL, 10, 128, 'Mesh RB Water', NULL, 'PremierKites/collection/deltas11/mesh_rb_water.jpg', 240, NULL, 10, 'Premier Kites'),
(NULL, 10, 129, 'Mesh Rd/Blk/Wht', NULL, 'PremierKites/collection/deltas11/mesh_Red_Black_White.jpg', 240, NULL, 10, 'Premier Kites'),
(NULL, 11, 130, 'Geometric Cubes', NULL, 'PremierKites/collection/deltas19/geometric_cubes.jpg', 580, NULL, 10, 'Premier Kites'),
(NULL, 11, 131, 'Flames', NULL, 'PremierKites/collection/deltas19/flames.jpg', 580, NULL, 10, 'Premier Kites'),
(NULL, 11, 132, 'Patriotic', NULL, 'PremierKites/collection/deltas19/patriotic.jpg', 580, NULL, 10, 'Premier Kites'),
(NULL, 11, 133, 'Radiant Peace', NULL, 'PremierKites/collection/deltas19/radiant_peace.jpg', 580, NULL, 10, 'Premier Kites'),
(NULL, 11, 134, 'Tekna Brite', NULL, 'PremierKites/collection/deltas19/tekna_brite.jpg', 580, NULL, 10, 'Premier Kites'),
(NULL, 11, 135, 'Teknacolor', NULL, 'PremierKites/collection/deltas19/teknacolor.jpg', 580, NULL, 10, 'Premier Kites'),
(NULL, 11, 136, 'Rb Waterfall', NULL, 'PremierKites/collection/deltas19/rainbow_waterfall.jpg', 580, NULL, 10, 'Premier Kites'),
(NULL, 12, 137, 'Flo-Tail - Rainbow', NULL, 'PremierKites/collection/flo-tail_6_5/rainbow.jpg', 80, NULL, 10, 'Premier Kites'),
(NULL, 12, 138, 'Flo-Tail - Orbit', NULL, 'PremierKites/collection/flo-tail_6_5/orbit.jpg', 80, NULL, 10, 'Premier Kites'),
(NULL, 12, 139, 'Flo-Tail - Warm', NULL, 'PremierKites/collection/flo-tail_6_5/warm.jpg', 80, NULL, 10, 'Premier Kites'),
(NULL, 13, 140, 'RB Arch', NULL, 'PremierKites/collection/flo-tail_13/rb_arch.jpg', 210, NULL, 10, 'Premier Kites'),
(NULL, 13, 141, 'Rainbow Burst', NULL, 'PremierKites/collection/flo-tail_13/rainbow_burst.jpg', 210, NULL, 10, 'Premier Kites'),
(NULL, 13, 142, 'Red Op Art', NULL, 'PremierKites/collection/flo-tail_13/red_op_art.jpg', 210, NULL, 10, 'Premier Kites'),
(NULL, 19, 143, 'Anguille Géante', NULL, 'PremierKites/collection/mega_kite/giant_eel.jpg', 1890, NULL, 3, 'Premier Kites'),
(NULL, 20, 144, 'Dragon Rouge Géant', NULL, 'PremierKites/collection/mega_kite/red_dragon.jpg', 1575, NULL, 10, 'Premier Kites'),
(NULL, 21, 145, 'Ange', NULL, 'PremierKites/collection/mega_kite/angel.jpg', 136, NULL, 10, 'Premier Kites'),
(NULL, 22, 146, 'Mega Wild Thing', NULL, 'PremierKites/collection/mega_kite/mega_wild_thing.jpg', 578, NULL, 10, 'Premier Kites'),
(NULL, 23, 147, 'Dragon Diamond', NULL, 'PremierKites/collection/mega_kite/dragon_diamond.jpg', 70, NULL, 10, 'Premier Kites'),
(NULL, 24, 148, 'Music Man', NULL, 'PremierKites/collection/mega_kite/music_man.jpg', 189, NULL, 10, 'Premier Kites'),
(NULL, 25, 149, 'Orbit Brogden', NULL, 'PremierKites/collection/mega_kite/orbit_brogden.jpg', 189, NULL, 10, 'Premier Kites'),
(NULL, 28, 150, 'Poisson-clown', NULL, 'PremierKites/collection/mega_kite/clownfish.jpg', 1050, NULL, 10, 'Premier Kites'),
(NULL, 26, 151, 'Mega Macaw', NULL, 'PremierKites/collection/mega_kite/mega_macaw.jpg', 630, NULL, 10, 'Premier Kites'),
(NULL, 27, 152, 'Super Mega Macaw', NULL, 'PremierKites/collection/mega_kite/super_mega_macaw.jpg', 2100, NULL, 10, 'Premier Kites'),
(NULL, 18, 153, 'Tortues de Mer', NULL, 'PremierKites/collection/rokkakus/sea_turtles.jpg', 61, NULL, 10, 'Premier Kites'),
(NULL, 18, 154, 'Star', NULL, 'PremierKites/collection/rokkakus/star.jpg', 61, NULL, 10, 'Premier Kites'),
(NULL, 18, 155, 'RB Orbit', NULL, 'PremierKites/collection/rokkakus/rb_orbit.jpg', 61, NULL, 10, 'Premier Kites'),
(NULL, 18, 156, 'Cool Orbit', NULL, 'PremierKites/collection/rokkakus/cool_orbit.jpg', 61, NULL, 10, 'Premier Kites'),
(NULL, 18, 157, 'Warm Orbit', NULL, 'PremierKites/collection/rokkakus/warm_orbit.jpg', 61, NULL, 10, 'Premier Kites'),
(NULL, 18, 158, 'RB Bubbles', NULL, 'PremierKites/collection/rokkakus/rb_bubbles.jpg', 61, NULL, 10, 'Premier Kites'),
(NULL, 18, 159, 'Black RB', NULL, 'PremierKites/collection/rokkakus/black_rb.jpg', 61, NULL, 10, 'Premier Kites'),
(NULL, 14, 160, 'Rainbow', NULL, 'PremierKites/collection/power_sled_14/rainbow.jpg', 52, NULL, 10, 'Premier Kites'),
(NULL, 14, 161, 'Tie Dye', NULL, 'PremierKites/collection/power_sled_14/tie_dye.jpg', 52, NULL, 10, 'Premier Kites'),
(NULL, 14, 162, 'Wavy Gradient', NULL, 'PremierKites/collection/power_sled_14/wavy_gradiant.jpg', 52, NULL, 10, 'Premier Kites');

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `Nom` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Prenom` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Username` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Password` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Email` text CHARACTER SET latin1 NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `CodePostal` varchar(10) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `DateInscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Users`
--

INSERT INTO `Users` (`Nom`, `Prenom`, `Username`, `Password`, `Email`, `Adresse`, `CodePostal`, `Ville`, `DateInscription`) VALUES
('4', '46', '11@2323.ddsdf', '1', '', '', '', '', '0000-00-00 00:00:00'),
('65464', '45', '1@1.1', '1', '', '', '', '', '0000-00-00 00:00:00'),
('46', '54', '46@344334.cvcvcv', '1', '', '', '', '', '0000-00-00 00:00:00'),
('646464', '54654', '6564654@jkdfh.gikf', '123', '', '', '', '', '0000-00-00 00:00:00'),
('a', 'a', 'a@a.a', 'a', '', '', '', '', '0000-00-00 00:00:00'),
('fdgfdgdfg', 'fgfgdf', 'fgdfgdfgdfg@kjdf.com', '123456', '', '', '', '', '0000-00-00 00:00:00'),
('hfghfghfg', 'ffghfg', 'hfghfg@djkfd.ng', '123456', '', '', '', '', '0000-00-00 00:00:00'),
('hfghfghfg', 'fghfghfg', 'hgfhfghhfg@dkfhd.ddgd', '123456', '', '', '', '', '0000-00-00 00:00:00'),
('Dit', 'Jean', 'jeandit@hotmail.com', '123456', '', '', '', '', '0000-00-00 00:00:00'),
('test', 'test', 'testtest', '1', 'tt@tt.tt', '1010', 'a4a4a4a', 'kfjjhdfh', '2015-03-23 12:08:22'),
('yutyuytutyu', 'tyutyu', 'yutyutyut@kdfsdk.cbb', '123456', '', '', '', '', '0000-00-00 00:00:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Commande`
--
ALTER TABLE `Commande`
 ADD PRIMARY KEY (`NoCommande`);

--
-- Index pour la table `Modele`
--
ALTER TABLE `Modele`
 ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Produit`
--
ALTER TABLE `Produit`
 ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
 ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Commande`
--
ALTER TABLE `Commande`
MODIFY `NoCommande` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `Modele`
--
ALTER TABLE `Modele`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `Produit`
--
ALTER TABLE `Produit`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=163;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
