-- phpMyAdmin SQL Dump
-- version 4.2.10.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 02 Mars 2015 à 08:22
-- Version du serveur :  5.5.40-0ubuntu0.14.04.1
-- Version de PHP :  5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `equipe3h15`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Modele`
--

INSERT INTO `Modele` (`ID`, `Grandeur`, `Vent`, `Tissus`, `Armature`, `Emballage`, `Cordes`, `Poids`, `NomModele`) VALUES
(1, '140 X 53 cm', '15 - 30 km', 'Ripstop Nylon', 'Tige de fibre de verre', 'Sac plastique', 'Inlcuses, 20m', NULL, 'Zoomer'),
(2, '152 x 67 cm', '15 - 30 km', 'Ripstop Nylon', 'Tube de fibre de verre', 'Étui de nylon', 'Incluses, 49.9 kg', '182 gr.', 'Osprey'),
(3, '159 x 73 cm', '15 - 30 km', 'Ripstop Nylon', 'Tube de fibre de verre', 'Étui de nylon', 'Inlcuses, 45.4 kg', '212 gm', 'Vision'),
(4, '221 x 99 cm', '15 – 30 km', 'Ripstop Nylon', 'Tube de fibre de verre', 'Étui de nylon', 'Incluse, 90.7 kg', '520 gr.', 'Avenger'),
(5, '229 x 114 cm', '12 - 35 km', 'Ripstop Nylon', 'Skyshark frame', 'Étui de nylon', 'Incluses, 68 kg', '283 gr.', 'Trick & Track'),
(6, '204.5 x 79 cm', '12 - 40 km', 'Ripstop Nylon', 'Skyshark frame', 'Étui de nylon', 'Incluses, 68 kg', '255 gr.', 'Wolf NG'),
(7, '130 x 55 cm', '10 – 35 km', 'Ripstop Nylon', 'Fibre de verre', 'Étui de nylon', 'Incluse, 68 kg, 24.4 m ', NULL, 'Barracuda 1.3'),
(8, '161 x 71 cm', '10 – 35 km', 'Ripstop Nylon', 'Fibre de verre', 'Étui de nylon', 'Incluse, 90.7 kg, 24.4 m', NULL, 'Barracuda 1.7'),
(9, '259 x 135 cm', '8 - 32 km', 'Ripstop Nylon', 'Tube de fibre de verre', NULL, 'Non-incluse, recommandé 40.8 kg', NULL, 'Deltas 9'''),
(10, '330 x 165 cm', '8 - 32 km', 'Ripstop Nylon', 'Carbone et fibre de verre', NULL, 'Non-incluses, recommandé 68 kg', NULL, 'Deltas 11'''),
(11, '572 x 285 cm', '8 - 32 km', 'Ripstop Nylon', 'Fibre de verre', NULL, 'Non-incluse, recommandé 226.8 kg', NULL, 'Deltas 19'''),
(12, '200 x 698 cm', '10 - 32 km/h', 'Nylon', 'Carbone et fibre de verre', NULL, 'Non-incluse, recommandé 22.7 - 40.8 kg', NULL, 'Flo-Tails Deltas 6.5'''),
(13, '396 x 1359 cm', '10 - 32 km/h', 'Nylon', 'Carbone et fibre de verre', NULL, 'Non-incluse, recommandé 22.7 - 40.8 kg', NULL, 'Flo-Tails Deltas 13'''),
(14, '160 x 102 cm', '10 - 32 km/h', 'Ripstop Nylon', NULL, NULL, 'Incluses, 40.8 kg', NULL, 'Power Sled 14'),
(15, ' 242 x 113 cm', '10 - 32 km/h', 'Ripstop Nylon', NULL, NULL, 'Non-incluse, recommandé 68 kg', NULL, 'Power Sled 24'),
(16, '323 x 150 cm.', '8 - 32 km/h', 'Ripstop Nylon', NULL, NULL, 'Non-incluse, recommandé 226.8 kg', NULL, 'Power Sled 36'),
(17, '452 x 210 cm', '10 - 32 km/h', 'Ripstop Nylon', NULL, NULL, 'Non-incluse, recommandé 453.6 kg', NULL, 'Power Sled 81'),
(18, '160 x 198 cm', '6 - 30 km/h', 'Ripstop Nylon', 'Armature recouverte de carbone', NULL, 'Non-incluse, recommandé 68kg', NULL, 'Rokkaku'),
(19, '15 m', '10 - 29 km/h', 'Ripstop Nylon', NULL, NULL, 'Non-incluse, 226.8 kg recommandé', NULL, 'Méga'),
(20, '183 x 1036 cm', '10 - 29 km/h', 'Ripstop Nylon', NULL, NULL, 'Non-incluses, 226.8 kg recommandé', NULL, 'Méga'),
(21, '159 x 285 cm', '10 - 30 km/h', 'Ripstop Nylon', 'Carbone', NULL, 'Non-incluse, 22.7 kg recommandé', NULL, 'Méga'),
(22, '323 x 1341 cm', '10 - 30 km/h', 'Ripstop Nylon', 'Fibre de verre enveloppés', NULL, 'Non-incluses, 113.4 kg recommandé', NULL, 'Méga'),
(23, '163 x 565 cm', '10 - 30 km/h', 'Ripstop Nylon', 'Carbone et fibre de verre', NULL, 'Non-incluses, 36.3 kg recommandé', NULL, 'Méga'),
(24, '240 x 245 cm', '10 - 30 km/h', 'Ripstop Nylon', 'Carbone et fibre de verre', NULL, 'Non-incluse, 113.4 kg recommandé', NULL, 'Méga'),
(25, '240 x 245 cm', '10 - 30 km/h', 'Ripstop Nylon', 'Carbone et fibre de verre', NULL, 'Non-incluses, 113.4 kg recommandé', NULL, 'Méga'),
(26, '488 x 549 cm', '10 - 30 km/h', 'Ripstop Nylon', NULL, NULL, 'Non-incluse, 453.6 kg recommandé', NULL, 'Méga'),
(27, '7 x 7.6 m', '10 - 30 km/h', 'Ripstop Nylon', NULL, NULL, 'Non-incluse, 453.4 kg recommandé', NULL, 'Méga'),
(28, '9.1 m', '10 - 30 km/h', 'Ripstop Nylon', NULL, NULL, 'Non-incluses, 453.6 kg recommandé', NULL, 'Méga'),
(29, '205 x 92 cm', '3 - 15 km/h', NULL, NULL, NULL, 'Non-incluse', '218 g', NULL),
(30, '231 cm', '5 - 40 km/h', 'Polyester', 'SkyShark P100', NULL, 'Incluse, 26 m, 68 kg', NULL, 'E3'),
(31, '94 x 91 cm', '6.5 - 40 km/h', 'Ripstop Polyester', 'Fibre de verre', NULL, 'Incluse, 61 m x 9 kg', NULL, 'Stowaway Diamond'),
(32, '175 x 85 cm', '5 - 20 km/h', 'Nylon', 'carbone 5mm', NULL, NULL, NULL, 'STIL'),
(33, '3 x 15 m', '5 - 40 km/h', NULL, 'Carbone 8mm', NULL, NULL, NULL, 'R-Sky Delta');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Modele`
--
ALTER TABLE `Modele`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Modele`
--
ALTER TABLE `Modele`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
