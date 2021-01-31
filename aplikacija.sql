-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2020 at 06:50 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikacija`
--

-- --------------------------------------------------------

--
-- Table structure for table `admini`
--

CREATE TABLE `admini` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `prezime` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `korisnicko_ime` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `lozinka` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admini`
--

INSERT INTO `admini` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`) VALUES
(1, 'Maja', 'Majić', 'maja', 'maja');

-- --------------------------------------------------------

--
-- Table structure for table `pasmine`
--

CREATE TABLE `pasmine` (
  `id_pasmine` int(11) NOT NULL,
  `naziv_pasmine` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `vrsta` int(11) NOT NULL,
  `foto` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasmine`
--

INSERT INTO `pasmine` (`id_pasmine`, `naziv_pasmine`, `vrsta`, `foto`) VALUES
(1, 'Terijer', 1, 'pas_1.jpg'),
(2, 'Španijel', 2, 'pas_2.jpg'),
(3, 'Ovčar', 3, 'pas_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `psi`
--

CREATE TABLE `psi` (
  `id_psa` int(11) NOT NULL,
  `naziv` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pasmina` int(11) NOT NULL,
  `broj_psa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `psi`
--

INSERT INTO `psi` (`id_psa`, `naziv`, `pasmina`, `broj_psa`) VALUES
(1, 'Brazilski terijer', 1, 1),
(2, 'Češki terijer', 1, 2),
(3, 'Graničarski terijer', 1, 3),
(4, 'Američki vodeni španijel', 2, 1),
(5, 'Pontaudemerski španijel', 2, 2),
(6, 'Koker španijel', 2, 3),
(7, 'Njemački ovčar', 3, 1),
(8, 'Hrvatski ovčar', 3, 2),
(9, 'Australski ovčar', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vrste`
--

CREATE TABLE `vrste` (
  `id_vrste` int(11) NOT NULL,
  `naziv_vrste` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vrste`
--

INSERT INTO `vrste` (`id_vrste`, `naziv_vrste`) VALUES
(1, 'Mali psi'),
(2, 'Srednji psi'),
(3, 'Veliki psi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
