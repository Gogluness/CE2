-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2015 at 08:18 AM
-- Server version: 5.5.41-0ubuntu0.14.10.1
-- PHP Version: 5.5.12-2ubuntu4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `CE2`
--

-- --------------------------------------------------------

--
-- Table structure for table `Adresses`
--

CREATE TABLE IF NOT EXISTS `Adresses` (
  `ID` int(11) NOT NULL,
  `Nom` int(11) NOT NULL,
  `Ville` int(11) NOT NULL,
  `Adresse` int(11) NOT NULL,
  `Procinve` int(11) NOT NULL,
  `Code Postal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Facture`
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
-- Table structure for table `Img`
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
-- Table structure for table `LigneFacture`
--

CREATE TABLE IF NOT EXISTS `LigneFacture` (
  `ID` int(11) NOT NULL,
  `NoFacture` int(11) NOT NULL,
  `IDProduit` int(11) NOT NULL,
  `Qte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `LignePanier`
--

CREATE TABLE IF NOT EXISTS `LignePanier` (
  `ID` int(11) NOT NULL,
  `IDPanier` int(11) NOT NULL,
  `IDProduit` int(11) NOT NULL,
  `Qte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Panier`
--

CREATE TABLE IF NOT EXISTS `Panier` (
  `ID` int(11) NOT NULL,
  `Client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Produit`
--

CREATE TABLE IF NOT EXISTS `Produit` (
  `CUP` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `Nom` int(11) NOT NULL,
  `Description` int(11) NOT NULL,
  `ImgPath` int(11) NOT NULL,
  `PrixVente` double NOT NULL,
  `PrixCout` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
