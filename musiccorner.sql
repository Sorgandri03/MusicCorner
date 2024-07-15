-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 11, 2024 at 12:59 PM
-- Server version: 8.0.32
-- PHP Version: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `musiccorner`
--
CREATE DATABASE IF NOT EXISTS `musiccorner` DEFAULT CHARACTER SET utf8mb4;
USE `musiccorner`;

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

CREATE TABLE `Address` (
  `id` int NOT NULL,
  `street` varchar(50) NOT NULL DEFAULT '',
  `cap` varchar(5) NOT NULL DEFAULT '',
  `city` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `customer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Address`
--

INSERT INTO `Address` (`id`, `street`, `cap`, `city`, `name`, `customer`) VALUES
(23, 'Via Roma, 1', '02100', 'Rieti', 'Andrea Sorge', 'cliente@gmail.com'),
(24, 'Via Cavour, 6', '00100', 'Roma', 'Mario Rossi', 'clientebannato@gmail.com'),
(25, 'Largo Trasimeno, 2', '02100', 'Rieti', 'Gianmarco Cavuoto', 'gianmarco@gmail.com'),
(26, 'via cesare battisti', '67020', 'san pio delle camere', 'Leonardo Pinterpe', 'leonardo@gmail.com'),
(27, 'Via Rieti, 5', '02100', 'Rieti', 'Andrea Sorge', 'andreasorge@gmail.com'),
(28, 'Via largo trasimeno 2', '02100', 'Rieti', 'Maria foglietti', ''),
(29, 'via delle rose', '67122', 'coverciano', 'Luca Verdi', 'luca@gmail.com'),
(30, 'Via i migranti dall\'italia, 10', '92031', 'Lampedusa', 'Salvino Salvini', 'salvino@cliente.com'),
(31, 'via dalle scatole', '34567', 'rimini', 'Giannittu bibi', 'giannittu@cliente.com'),
(32, 'Via Pietro Aloisi, 71', '02100', 'Rieti', 'Andrea Sorge', '');

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`email`) VALUES
('admin@musiccorner.it');

-- --------------------------------------------------------

--
-- Table structure for table `ArticleDescription`
--

CREATE TABLE `ArticleDescription` (
  `EAN` varchar(13) NOT NULL DEFAULT '',
  `name` text NOT NULL,
  `artist` text NOT NULL,
  `format` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ArticleDescription`
--

INSERT INTO `ArticleDescription` (`EAN`, `name`, `artist`, `format`) VALUES
('0075678666605', 'Barter 6', 'Young Thug', 0),
('0081227827687', 'Ready to Die', 'The Notorious BIG', 1),
('0190758838328', 'Playlist', 'Salmo', 0),
('0190758883618', 'Astroworld', 'Travis Scott', 1),
('0190758883625', 'Astroworld', 'Travis Scott', 0),
('0190759496022', '23 6451', 'tha Supreme', 0),
('0194397091113', '23 6451', 'tha Supreme', 1),
('0194397815122', 'High Off Life', 'Future', 0),
('0194398186320', 'Savage Mode II', '21 Savage, Metro Boomin', 0),
('0194398243825', 'FLOP', 'Salmo', 0),
('0194690783944', 'What It Means to Be King', 'King Von', 0),
('0196587057411', 'FLOP', 'Salmo', 1),
('0196588072413', 'Super Slimey', 'Future, Young Thug', 1),
('0196588202629', 'American Dream', '21 Savage', 0),
('0196588460319', 'Utopia', 'Travis Scott', 1),
('0196588460326', 'Utopia', 'Travis Scott', 0),
('0196588989612', 'We Don\'t Trust You', 'Future, Metro Boomin', 1),
('0196588989629', 'We Don\'t Trust You', 'Future, Metro Boomin', 0),
('0198028104425', 'We Still Don\'t Trust You', 'Future, Metro Boomin', 0),
('0198028104616', 'We Still Don\'t Trust You', 'Future, Metro Boomin', 1),
('0600753353479', 'The Blueprint', 'Jay-Z', 1),
('0602435047232', 'Dark Boys Club', 'Dark Polo Gang', 0),
('0602435356204', 'Famoso', 'Sfera Ebbasta', 0),
('0602435359441', 'Meet The Woo', 'Pop Smoke', 0),
('0602435505336', 'QVC9', 'Gemitaiz', 0),
('0602435633558', 'Man on the Moon III', 'Kid Cudi', 0),
('0602435719306', 'Man on the Moon III', 'Kid Cudi', 1),
('0602435935645', 'Fastlife 4', 'Gue, Dj Harsh', 0),
('0602438080953', 'Fastlife 4', 'Gue, Dj Harsh', 1),
('0602445158706', 'Noi, loro, gli altri', 'Marracash', 1),
('0602445168552', 'Noi, loro, gli altri', 'Marracash', 0),
('0602445837038', 'Eclissi', 'Gemitaiz', 1),
('0602445837137', 'Eclissi', 'Gemitaiz', 0),
('0602445886906', 'Mr. Morale & The Big Steppers', 'Kendrick Lamar', 0),
('0602445926015', 'Mr. Morale & The Big Steppers', 'Kendrick Lamar', 1),
('0602448384270', 'good kid, m.A.A.d city', 'Kendrick Lamar', 0),
('0602455038678', 'Madreperla', 'Gue', 0),
('0602455038685', 'Madreperla', 'Gue', 1),
('0602458763904', 'QVC10', 'Gemitaiz', 0),
('0602458794731', 'X2VR', 'Sfera Ebbasta', 0),
('0602465002935', 'Club Dogo', 'Club Dogo', 0),
('0602465070064', 'I nomi del Diavolo', 'Kid Yugi', 0),
('0602465291186', 'I nomi del Diavolo', 'Kid Yugi', 1),
('0602465904284', 'Vera Baddie', 'ANNA', 0),
('0602498611234', 'The Black Album', 'Jay-Z', 1),
('0602498614747', 'Get Rich or Die Tryin\'', '50 Cent', 0),
('0602507306465', 'Shoot for the Stars Aim for the Moon', 'Pop Smoke', 1),
('0602507402747', 'Mr Fini', 'Gue', 1),
('0602507474751', 'Shoot for the Stars Aim for the Moon', 'Pop Smoke', 0),
('0602508046117', 'Sinchronicity', 'Police', 1),
('0602508276194', 'Scatola Nera', 'Gemitaiz, Madman', 0),
('0602508412882', 'Persona', 'Marracash', 0),
('0602508515736', 'Persona', 'Marracash', 1),
('0602508801297', 'Meet The Woo 2', 'Pop Smoke', 0),
('0602508873508', 'Mr Fini', 'Gue', 0),
('0602527078779', 'Dogocrazia', 'Club Dogo', 0),
('0602527154893', 'Man on the Moon', 'Kid Cudi', 1),
('0602527188386', 'Man on the Moon', 'Kid Cudi', 0),
('0602527468037', 'Man on the Moon II', 'Kid Cudi', 0),
('0602527544618', 'My Beautiful Dark Twisted Fantasy', 'Kanye West', 0),
('0602527547633', 'Man on the Moon II', 'Kid Cudi', 1),
('0602537192267', 'good kid, m.A.A.d city', 'Kendrick Lamar', 1),
('0602537224128', 'Finally Rich', 'Chief Keef', 0),
('0602537432134', 'Yeezus', 'Kanye West', 0),
('0602537521869', 'Nothing Was the Same', 'Drake', 0),
('0602547300683', 'To Pimp a Butterfly', 'Kendrick Lamar', 0),
('0602547308122', 'Straight Outta Compton', 'NWA', 0),
('0602547311009', 'To Pimp a Butterfly', 'Kendrick Lamar', 1),
('0602547372246', 'Vero', 'Gue', 0),
('0602547854032', 'Untitled Unmastered', 'Kendrick Lamar', 0),
('0602547866813', 'Untitled Unmastered', 'Kendrick Lamar', 1),
('0602557299502', 'Santeria', 'Gue, Marracash', 0),
('0602557611755', 'DAMN.', 'Kendrick Lamar', 0),
('0602557618280', 'DAMN.', 'Kendrick Lamar', 1),
('0602557638394', 'Gentleman', 'Gue', 0),
('0602567319986', 'Rockstar', 'Sfera Ebbasta', 0),
('0602567384380', 'Back Home', 'Madman', 0),
('0602567539223', 'Davide', 'Gemitaiz', 0),
('0602567582991', 'Davide', 'Gemitaiz', 1),
('0602567649274', 'Santeria', 'Gue, Marracash', 1),
('0602567784692', 'Ye', 'Kanye West', 1),
('0602567800484', 'Kids See Ghosts', 'Kanye West, Kid Cudi', 1),
('0602567803935', 'SFERA EBBASTA', 'Sfera Ebbasta', 1),
('0602567803980', 'XDVR RELOADED', 'Sfera Ebbasta', 1),
('0602567874942', 'Scorpion', 'Drake', 1),
('0602567920946', 'Sinatra', 'Gue', 0),
('0602567984597', 'Trap Lovers', 'Dark Polo Gang', 0),
('0602577060854', 'Back Home', 'Madman', 1),
('0602577209598', 'Drip Harder', 'Lil Baby, Gunna', 0),
('0602577553097', 'MM vol.3', 'Madman', 1),
('0602577556326', 'MM vol.3', 'Madman', 0),
('0606949048624', '2001', 'Dr. Dre', 0),
('0606949062927', 'The Marshall Mathers LP', 'Eminem', 0),
('0606949329020', 'The Eminem Show', 'Eminem', 0),
('0606949354411', 'Get Rich or Die Tryin\'', '50 Cent', 1),
('0731453639218', 'In my Lifetime vol.1', 'Jay-Z', 1),
('0731454681520', 'Vol.3: Life and Times of Shawn Carter', 'Jay-Z', 0),
('0731455890211', 'Vol.2... Hard Knock Life', 'Jay-Z', 1),
('0843563164884', 'Scaring The Hoes', 'Jpegmafia, Danny Brown', 1),
('0888750652027', 'Rodeo', 'Travis Scott', 0),
('0888751258426', 'DS2', 'Future', 0),
('0889854668228', 'Issa Album', '21 Savage', 0),
('5054197123641', 'Bella Vita', 'Niko Pandetta', 0),
('5099902987613', 'Dark Side of the Moon', 'Pink Floyd', 1),
('8032484007482', 'Mi Fist', 'Club Dogo', 0);

-- --------------------------------------------------------

--
-- Table structure for table `CreditCard`
--

CREATE TABLE `CreditCard` (
  `id` int NOT NULL,
  `cardNumber` varchar(16) NOT NULL,
  `billingAddress` int NOT NULL DEFAULT '0',
  `owner` varchar(100) NOT NULL DEFAULT '0',
  `customerId` varchar(100) NOT NULL DEFAULT '0',
  `expiringDate` varchar(7) NOT NULL DEFAULT '',
  `cvv` varchar(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `CreditCard`
--

INSERT INTO `CreditCard` (`id`, `cardNumber`, `billingAddress`, `owner`, `customerId`, `expiringDate`, `cvv`) VALUES
(14, '1234123412341234', 23, 'Cliente', 'cliente@gmail.com', '2027-06', '123'),
(15, '3413984937849238', 23, 'Emanuele', '', '2024-12', '121'),
(16, '4545676789890000', 24, 'Mario Rossi', 'clientebannato@gmail.com', '2028-05', '565'),
(17, '4343353535353563', 25, 'Gianmarco Cavuoto', 'gianmarco@gmail.com', '2027-06', '234'),
(18, '1234567887765456', 26, 'Leonardo Pinterpe', 'leonardo@gmail.com', '2024-06', '123'),
(19, '4444444444444444', 27, 'Andrea Sorge', 'andreasorge@gmail.com', '2026-06', '444'),
(20, '1111111111111111', 28, 'pere scanner', '', '2028-09', '183'),
(21, '1234123412345555', 29, 'Luca Verdi', 'luca@gmail.com', '2025-08', '123'),
(22, '1554184648516847', 30, 'Salvino Salvini', 'salvino@cliente.com', '2024-12', '888'),
(23, '1234344345454545', 31, 'Giannittu Bibi', 'giannittu@cliente.com', '2025-06', '345'),
(24, '4023555888854645', 32, 'Andrea Sorge', 'andreasorge@gmail.com', '2026-10', '751');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `email` varchar(50) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `suspensionTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`email`, `username`, `suspensionTime`) VALUES
('andreasorge@gmail.com', 'sorgandri', '2024-07-01 14:33:55'),
('ciaod29@gmail.com', 'lucabroia', '2024-07-10 18:45:01'),
('cliente@gmail.com', 'Cliente', '2024-06-29 17:14:13'),
('clientebannato@gmail.com', 'Bannato', '2024-07-18 00:00:00'),
('gianmarco@gmail.com', 'minchiafranco', '2024-07-03 15:43:51'),
('giannigracchia@gmail.com', 'stinca', '2024-07-10 18:59:56'),
('giannittu@cliente.com', 'giannittu', '2024-07-10 18:50:05'),
('leonardo@gmail.com', 'Lpint02', '2024-07-03 15:35:23'),
('luca@gmail.com', 'LucaVerdi', '2024-07-11 11:44:11'),
('mariorossi@gmail.com', 'marione', '2024-07-10 18:47:49'),
('salvino@cliente.com', 'salvo', '2024-07-10 18:54:32');

-- --------------------------------------------------------

--
-- Table structure for table `OrderItem`
--

CREATE TABLE `OrderItem` (
  `id` int NOT NULL,
  `article` varchar(13) NOT NULL DEFAULT '0',
  `seller` varchar(30) NOT NULL DEFAULT '0',
  `quantity` int NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT '0',
  `orderID` int NOT NULL DEFAULT '0',
  `shipped` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `OrderItem`
--

INSERT INTO `OrderItem` (`id`, `article`, `seller`, `quantity`, `price`, `orderID`, `shipped`) VALUES
(17, '0196588460319', 'negoziob@negoziob.it', 1, 36.99, 13, b'0'),
(18, '0196588989612', 'negozioa@negozioa.it', 1, 29.99, 13, b'1'),
(19, '0602435359441', 'negozioc@negozioc.it', 1, 15.99, 13, b'0'),
(20, '0731455890211', 'negozioa@negozioa.it', 1, 39.99, 14, b'1'),
(21, '0602508515736', 'negoziob@negoziob.it', 1, 34.99, 15, b'1'),
(22, '0602435633558', 'negozioc@negozioc.it', 12, 15.99, 16, b'0'),
(23, '5054197123641', 'negozioa@negozioa.it', 1, 15.99, 17, b'1'),
(24, '0843563164884', 'negozioc@negozioc.it', 1, 35.99, 18, b'0'),
(25, '0602435359441', 'negozioc@negozioc.it', 1, 15.99, 19, b'0'),
(39, '0602438080953', 'negozioc@negozioc.it', 1, 30.99, 36, b'0'),
(40, '0602445837038', 'negoziob@negoziob.it', 1, 30.99, 36, b'0'),
(41, '0602567874942', 'negoziob@negoziob.it', 1, 37.99, 36, b'0'),
(42, '0602557611755', 'negozioa@negozioa.it', 1, 20.99, 36, b'0'),
(43, '0194398186320', 'negoziob@negoziob.it', 1, 15.99, 36, b'0'),
(44, '0602435047232', 'negoziob@negoziob.it', 1, 14.99, 36, b'0'),
(45, '0602445168552', 'negozioa@negozioa.it', 1, 20.99, 36, b'0'),
(46, '0194690783944', 'negozioc@negozioc.it', 1, 15.99, 36, b'0'),
(47, '0190758883625', 'negozioc@negozioc.it', 1, 19.99, 37, b'0'),
(48, '0190759496022', 'negoziob@negoziob.it', 1, 17.99, 37, b'0'),
(49, '0194397815122', 'negozioc@negozioc.it', 1, 34.99, 37, b'0'),
(50, '0602435935645', 'negozioc@negozioc.it', 1, 15.99, 37, b'0'),
(51, '5054197123641', 'negozioa@negozioa.it', 1, 15.99, 37, b'0'),
(52, '0731454681520', 'negozioa@negozioa.it', 1, 21.99, 37, b'0'),
(53, '0196588202629', 'negozioc@negozioc.it', 1, 17.99, 37, b'0'),
(54, '0602435356204', 'negoziob@negoziob.it', 1, 17.99, 37, b'0'),
(55, '0602435047232', 'negoziob@negoziob.it', 1, 14.99, 37, b'0'),
(56, '0888751258426', 'negoziob@negoziob.it', 1, 17.99, 38, b'0'),
(57, '0602448384270', 'negoziob@negoziob.it', 1, 17.99, 38, b'0'),
(58, '0602547854032', 'negozioa@negozioa.it', 1, 15.99, 38, b'0'),
(59, '0602547300683', 'negozioc@negozioc.it', 1, 15.99, 38, b'0'),
(60, '0602557611755', 'negozioa@negozioa.it', 1, 20.99, 38, b'0'),
(61, '0602527544618', 'negoziob@negoziob.it', 1, 4.99, 38, b'0'),
(62, '0602537432134', 'negozioc@negozioc.it', 1, 10.99, 38, b'0'),
(63, '0190758838328', 'negozioc@negozioc.it', 1, 35.99, 39, b'0'),
(64, '0194690783944', 'negozioc@negozioc.it', 1, 15.99, 39, b'0'),
(65, '0075678666605', 'negozioc@negozioc.it', 1, 15.99, 39, b'0'),
(66, '0194398243825', 'negoziob@negoziob.it', 1, 19.99, 39, b'0'),
(67, '0196588460326', 'negozioc@negozioc.it', 1, 15.99, 39, b'0'),
(68, '0602435633558', 'negozioc@negozioc.it', 1, 15.99, 39, b'0'),
(69, '0602508412882', 'negozioc@negozioc.it', 1, 20.99, 39, b'0'),
(70, '0602498614747', 'negozioc@negozioc.it', 1, 23.99, 39, b'0'),
(71, '0602465070064', 'negozioa@negozioa.it', 1, 19.99, 39, b'0'),
(72, '0602527188386', 'negozioc@negozioc.it', 1, 15.99, 39, b'0'),
(73, '0606949062927', 'negozioc@negozioc.it', 1, 17.99, 39, b'0'),
(74, '0888751258426', 'negoziob@negoziob.it', 1, 17.99, 39, b'0'),
(75, '0602547854032', 'negozioa@negozioa.it', 1, 15.99, 39, b'0'),
(76, '0602547300683', 'negozioc@negozioc.it', 1, 15.99, 39, b'0'),
(77, '0602567539223', 'negozioa@negozioa.it', 1, 19.99, 40, b'0'),
(78, '0731454681520', 'negozioa@negozioa.it', 1, 21.99, 40, b'0'),
(79, '0888751258426', 'negoziob@negoziob.it', 1, 17.99, 40, b'0'),
(80, '0606949062927', 'negozioc@negozioc.it', 1, 17.99, 40, b'0'),
(81, '0606949048624', 'negozioc@negozioc.it', 1, 20.99, 40, b'0'),
(82, '0602498614747', 'negozioc@negozioc.it', 1, 23.99, 40, b'0'),
(83, '0602507474751', 'negozioc@negozioc.it', 1, 15.99, 40, b'0'),
(84, '0602508412882', 'negozioc@negozioc.it', 1, 20.99, 40, b'0'),
(85, '0602527188386', 'negozioc@negozioc.it', 1, 15.99, 40, b'0'),
(86, '0602527544618', 'negoziob@negoziob.it', 1, 4.99, 40, b'0'),
(87, '0602537432134', 'negozioc@negozioc.it', 1, 10.99, 40, b'0'),
(88, '0602547300683', 'negozioc@negozioc.it', 1, 15.99, 40, b'0'),
(89, '0602547854032', 'negozioa@negozioa.it', 1, 15.99, 40, b'0'),
(90, '0602567319986', 'negozioa@negozioa.it', 1, 17.99, 40, b'0'),
(91, '0602557611755', 'negozioa@negozioa.it', 1, 20.99, 40, b'0'),
(92, '5054197123641', 'negozioa@negozioa.it', 1, 15.99, 40, b'0'),
(93, '0198028104425', 'negozioa@negozioa.it', 1, 17.99, 41, b'0'),
(94, '0602567784692', 'negoziob@negoziob.it', 1, 29.99, 41, b'0'),
(95, '0602508873508', 'negozioa@negozioa.it', 1, 18.99, 41, b'0'),
(96, '0602435505336', 'negozioc@negozioc.it', 1, 20.99, 41, b'0'),
(97, '0843563164884', 'negozioc@negozioc.it', 1, 35.99, 41, b'0'),
(98, '0196588989612', 'negozioa@negozioa.it', 1, 29.99, 41, b'0'),
(99, '0602567649274', 'negoziob@negoziob.it', 1, 37.99, 41, b'0'),
(100, '0602527154893', 'negozioc@negozioc.it', 1, 26.99, 41, b'0'),
(101, '0196588460326', 'negozioc@negozioc.it', 1, 15.99, 41, b'0'),
(102, '0602507474751', 'negozioc@negozioc.it', 1, 15.99, 41, b'0'),
(103, '0602465904284', 'negozioa@negozioa.it', 2, 18.99, 42, b'0'),
(104, '0602435505336', 'negozioc@negozioc.it', 1, 20.99, 42, b'0'),
(105, '0602527544618', 'negoziob@negoziob.it', 1, 4.99, 43, b'0'),
(106, '0602537521869', 'negozioc@negozioc.it', 5, 17.99, 44, b'0'),
(107, '0602465904284', 'negozioa@negozioa.it', 4, 18.99, 45, b'0'),
(108, '0602567984597', 'negozioc@negozioc.it', 1, 18.99, 45, b'0'),
(109, '0190758883625', 'negozioc@negozioc.it', 4, 19.99, 46, b'0'),
(110, '0075678666605', 'negozioc@negozioc.it', 1, 15.99, 46, b'0'),
(111, '0075678666605', 'negozioc@negozioc.it', 5, 15.99, 47, b'0'),
(112, '0602435935645', 'negozioc@negozioc.it', 1, 15.99, 47, b'0'),
(113, '0190758838328', 'negozioc@negozioc.it', 1, 35.99, 49, b'0'),
(114, '0196588202629', 'negozioa@negozioa.it', 1, 20.99, 50, b'0'),
(115, '0194690783944', 'negozioc@negozioc.it', 8, 15.99, 51, b'0'),
(116, '0606949062927', 'negozioc@negozioc.it', 7, 17.99, 51, b'0'),
(117, '0602465904284', 'negozioa@negozioa.it', 1, 18.99, 52, b'1'),
(118, '0075678666605', 'negozioc@negozioc.it', 1, 14.99, 53, b'0'),
(119, '0190758838328', 'negozioc@negozioc.it', 1, 35.99, 53, b'0'),
(120, '0190758883625', 'negozioc@negozioc.it', 1, 19.99, 53, b'0'),
(121, '0190759496022', 'negoziob@negoziob.it', 1, 17.99, 53, b'0'),
(122, '0081227827687', 'negozioa@negozioa.it', 1, 61.99, 53, b'0'),
(123, '0075678666605', 'negozioc@negozioc.it', 1, 14.99, 54, b'0'),
(124, '0075678666605', 'negozioa@negozioa.it', 1, 15.99, 55, b'0'),
(125, '0075678666605', 'negozioc@negozioc.it', 1, 14.99, 56, b'0'),
(126, '0190758838328', 'negozioc@negozioc.it', 1, 35.99, 56, b'0'),
(127, '0602435359441', 'negozioc@negozioc.it', 1, 15.99, 57, b'0'),
(128, '0602455038678', 'negozioa@negozioa.it', 1, 19.99, 57, b'0'),
(129, '0602458763904', 'negoziob@negoziob.it', 1, 20.99, 57, b'0'),
(130, '0602458794731', 'negoziob@negoziob.it', 1, 17.99, 57, b'0'),
(131, '0602465002935', 'negozioc@negozioc.it', 1, 18.99, 57, b'0'),
(132, '0602465070064', 'negozioa@negozioa.it', 1, 19.99, 57, b'0'),
(133, '0602508276194', 'negozioc@negozioc.it', 1, 20.99, 57, b'0'),
(134, '0602508801297', 'negoziob@negoziob.it', 1, 20.99, 57, b'0'),
(135, '8032484007482', 'negoziob@negoziob.it', 1, 19.99, 57, b'0'),
(136, '0889854668228', 'negozioa@negozioa.it', 1, 16.99, 57, b'0'),
(137, '0888750652027', 'negozioc@negozioc.it', 1, 17.99, 57, b'0'),
(138, '0606949048624', 'negozioc@negozioc.it', 1, 20.99, 57, b'0'),
(139, '0602577209598', 'negoziob@negoziob.it', 1, 19.99, 57, b'0'),
(140, '0889854668228', 'negozioa@negozioa.it', 1, 16.99, 58, b'0'),
(141, '0602508801297', 'negoziob@negoziob.it', 1, 20.99, 58, b'0'),
(142, '0602507306465', 'negozioc@negozioc.it', 1, 35.99, 58, b'0'),
(143, '0602435359441', 'negozioc@negozioc.it', 1, 15.99, 58, b'0'),
(144, '0602445837137', 'negozioa@negozioa.it', 1, 21.99, 58, b'0'),
(145, '0600753353479', 'negoziob@negoziob.it', 1, 37.99, 58, b'0'),
(146, '0602498611234', 'negozioc@negozioc.it', 1, 31.99, 58, b'0'),
(147, '0731453639218', 'negoziob@negoziob.it', 1, 37.99, 58, b'0'),
(148, '0731455890211', 'negozioa@negozioa.it', 1, 39.99, 58, b'0'),
(149, '0602527547633', 'negoziob@negoziob.it', 1, 34.99, 58, b'0'),
(150, '5099902987613', 'negozioc@negozioc.it', 1, 32.99, 58, b'0'),
(151, '0196587057411', 'negozioa@negozioa.it', 1, 34.99, 58, b'0'),
(152, '0602567984597', 'negozioc@negozioc.it', 1, 18.99, 58, b'0'),
(153, '0602547372246', 'negoziob@negoziob.it', 1, 19.99, 58, b'0'),
(154, '0602577553097', 'negozioa@negozioa.it', 1, 21.99, 58, b'0'),
(155, '0602557618280', 'negozioa@negozioa.it', 1, 40.99, 58, b'0'),
(156, '0602445158706', 'negozioa@negozioa.it', 1, 32.99, 58, b'0'),
(157, '0602557638394', 'negoziob@negoziob.it', 1, 17.99, 58, b'0'),
(158, '0602508276194', 'negozioc@negozioc.it', 1, 20.99, 59, b'0'),
(159, '0190758883625', 'negozioc@negozioc.it', 1, 19.99, 59, b'0'),
(160, '0190759496022', 'negoziob@negoziob.it', 1, 17.99, 59, b'0'),
(161, '0194397815122', 'negozioc@negozioc.it', 1, 34.99, 59, b'0'),
(162, '0081227827687', 'negozioa@negozioa.it', 1, 61.99, 59, b'0'),
(163, '0602445158706', 'negozioa@negozioa.it', 1, 32.99, 60, b'0'),
(164, '0602445926015', 'negozioc@negozioc.it', 1, 35.99, 61, b'0'),
(165, '0081227827687', 'negozioa@negozioa.it', 1, 61.99, 62, b'0'),
(166, '0190758883618', 'negozioc@negozioc.it', 1, 15.99, 62, b'0'),
(167, '0194397091113', 'negoziob@negoziob.it', 1, 27.99, 62, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `id` int NOT NULL,
  `customer` varchar(50) NOT NULL,
  `orderDateTime` datetime NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `payment` int NOT NULL DEFAULT '0',
  `shippingAddress` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`id`, `customer`, `orderDateTime`, `price`, `payment`, `shippingAddress`) VALUES
(13, 'cliente@gmail.com', '2024-06-28 12:11:44', 82.97, 14, 23),
(14, 'cliente@gmail.com', '2024-06-28 12:12:42', 39.99, 14, 23),
(15, 'cliente@gmail.com', '2024-06-28 12:13:50', 34.99, 15, 23),
(16, 'cliente@gmail.com', '2024-06-28 12:17:50', 191.88, 14, 23),
(17, 'cliente@gmail.com', '2024-06-28 18:22:33', 15.99, 14, 23),
(18, 'cliente@gmail.com', '2024-06-29 17:47:06', 35.99, 14, 23),
(19, 'cliente@gmail.com', '2024-06-30 17:55:07', 15.99, 14, 23),
(36, 'gianmarco@gmail.com', '2024-07-01 12:43:10', 188.92, 17, 25),
(37, 'leonardo@gmail.com', '2024-07-01 12:46:06', 177.91, 18, 26),
(38, 'andreasorge@gmail.com', '2024-07-01 16:42:50', 104.93, 19, 27),
(39, 'leonardo@gmail.com', '2024-07-01 16:43:41', 268.86, 18, 26),
(40, 'gianmarco@gmail.com', '2024-07-01 16:44:19', 278.84, 17, 25),
(41, 'gianmarco@gmail.com', '2024-07-02 17:15:46', 250.9, 17, 25),
(42, 'leonardo@gmail.com', '2024-07-02 17:41:57', 58.97, 18, 26),
(43, 'clientebannato@gmail.com', '2024-07-03 15:16:53', 4.99, 16, 24),
(44, 'leonardo@gmail.com', '2024-07-03 15:33:30', 89.95, 18, 26),
(45, 'leonardo@gmail.com', '2024-07-03 16:22:30', 94.95, 18, 26),
(46, 'gianmarco@gmail.com', '2024-07-03 16:22:31', 95.95, 17, 25),
(47, 'leonardo@gmail.com', '2024-07-03 16:49:38', 95.94, 18, 26),
(49, 'gianmarco@gmail.com', '2024-07-03 16:49:41', 35.99, 17, 25),
(50, 'andreasorge@gmail.com', '2024-07-09 23:21:48', 20.99, 19, 27),
(51, 'gianmarco@gmail.com', '2024-07-10 16:55:58', 253.85, 17, 25),
(52, 'giannigracchia@gmail.com', '2024-07-10 19:02:18', 18.99, 20, 28),
(53, 'luca@gmail.com', '2024-07-11 11:47:43', 150.95, 21, 29),
(54, 'andreasorge@gmail.com', '2024-07-11 12:21:46', 14.99, 19, 27),
(55, 'salvino@cliente.com', '2024-07-11 12:25:00', 15.99, 22, 30),
(56, 'giannittu@cliente.com', '2024-07-11 12:27:32', 50.98, 23, 31),
(57, 'gianmarco@gmail.com', '2024-07-11 12:32:05', 251.87, 17, 25),
(58, 'andreasorge@gmail.com', '2024-07-11 12:38:40', 515.82, 24, 27),
(59, 'giannittu@cliente.com', '2024-07-11 12:47:32', 155.95, 23, 31),
(60, 'giannittu@cliente.com', '2024-07-11 12:52:36', 32.99, 23, 31),
(61, 'gianmarco@gmail.com', '2024-07-11 12:52:51', 35.99, 17, 25),
(62, 'leonardo@gmail.com', '2024-07-11 12:55:57', 105.97, 18, 26);

-- --------------------------------------------------------

--
-- Table structure for table `Review`
--

CREATE TABLE `Review` (
  `id` int NOT NULL,
  `customer` varchar(50) NOT NULL DEFAULT '0',
  `reviewText` text,
  `articleRating` tinyint(1) NOT NULL,
  `sellerRating` tinyint(1) NOT NULL DEFAULT '0',
  `article` varchar(13) NOT NULL,
  `seller` varchar(50) NOT NULL,
  `orderItemID` int DEFAULT NULL,
  `answered` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `Review`
--

INSERT INTO `Review` (`id`, `customer`, `reviewText`, `articleRating`, `sellerRating`, `article`, `seller`, `orderItemID`, `answered`) VALUES
(16, 'cliente@gmail.com', 'Ottimo disco ma la spedizione è stata un po\' lenta<br><br>RISPOSTA DEL VENDITORE<br>Grazie per il feedback. Cambieremo corriere.', 5, 4, '0196588460319', 'negoziob@negoziob.it', 17, b'1'),
(22, 'gianmarco@gmail.com', 'Disco top del guercio che si conferma king del rap italiano. Spedizione lenta ma alla fine l\'articolo è arrivato.<br><br>RISPOSTA DEL VENDITORE<br>Spedizione lenta? Hai ordinato di venerdì pomeriggio!', 5, 3, '0602438080953', 'negozioc@negozioc.it', 39, b'1'),
(23, 'leonardo@gmail.com', 'disco LEGGENDARIO!! spedizione veloce', 5, 4, '0190758883625', 'negozioc@negozioc.it', 47, b'0'),
(24, 'gianmarco@gmail.com', 'Disco pessimo, tracce ripetitive. Spedizione perfetta, peccato sia stata sprecata per un disco così.', 2, 4, '0602445837038', 'negoziob@negoziob.it', 40, b'0'),
(25, 'leonardo@gmail.com', 'disco troppo sperimentale per i miei gusti. Spedizione lenta ', 3, 2, '0190759496022', 'negoziob@negoziob.it', 48, b'0'),
(26, 'leonardo@gmail.com', 'ottimo disco, spedizione molto veloce', 4, 5, '0194397815122', 'negozioc@negozioc.it', 49, b'0'),
(27, 'gianmarco@gmail.com', 'Che dire, Drake è diventato commerciale dicono ma questo disco conferma il contrario. Riesce a far diventare oro tutto ciò che tocca, anzi platino. Spedizione precisa e veloce', 5, 4, '0602567874942', 'negoziob@negoziob.it', 41, b'0'),
(28, 'leonardo@gmail.com', 'disco più bello mai fatto dal guercio, buona spedizione', 5, 3, '0602435935645', 'negozioc@negozioc.it', 50, b'0'),
(29, 'gianmarco@gmail.com', 'KING, solo una parola. C\'è poco da fare. Peccato che il disco sia arrivato graffiato da un lato.<br><br>RISPOSTA DEL VENDITORE<br>Evidentemente deve aver subito dei danni durante il trasporto, dato che al momento della spedizione da parte nostra era in perfette condizioni. Ci scusiamo per il disagio\n', 5, 2, '0602557611755', 'negozioa@negozioa.it', 42, b'1'),
(30, 'leonardo@gmail.com', 'disco meme, buona spedizione', 2, 4, '5054197123641', 'negozioa@negozioa.it', 51, b'0'),
(31, 'gianmarco@gmail.com', 'Produzione elite, barre troppo calde. Spedizione nei tempi e regolare.', 5, 3, '0194398186320', 'negoziob@negoziob.it', 43, b'0'),
(32, 'leonardo@gmail.com', 'bel disco ma spedizione lenta<br><br>RISPOSTA DEL VENDITORE<br>mi spiace ci sono stati problemi con il corriere', 4, 2, '0731454681520', 'negozioa@negozioa.it', 52, b'1'),
(33, 'leonardo@gmail.com', 'gran disco, ma è arrivato in pessime condizioni', 4, 2, '0196588202629', 'negozioc@negozioc.it', 53, b'0'),
(34, 'gianmarco@gmail.com', 'Disco mid, niente a che vedere con la DPG del 2016. Spedizione veloce.', 3, 4, '0602435047232', 'negoziob@negoziob.it', 44, b'0'),
(35, 'leonardo@gmail.com', 'disco plasticoso e poco originale, buona spedizione', 2, 4, '0602435356204', 'negoziob@negoziob.it', 54, b'0'),
(36, 'gianmarco@gmail.com', 'Troppo forte Marra, che cazzo gli vuoi dire. Il rapper preferito del tuo rapper preferito, coglione. Ottima spedizione', 5, 4, '0602445168552', 'negozioa@negozioa.it', 45, b'0'),
(37, 'gianmarco@gmail.com', 'R.I.P. KING VON, the best to ever do it. Disco un poco ammaccato ma spedizione veloce.', 5, 3, '0194690783944', 'negozioc@negozioc.it', 46, b'0'),
(38, 'leonardo@gmail.com', 'Disco discreto così come la spedizione', 3, 3, '0190758838328', 'negozioc@negozioc.it', 63, b'0'),
(39, 'leonardo@gmail.com', 'Disco perfetto! Ottima anche la spedizione ', 5, 4, '0194690783944', 'negozioc@negozioc.it', 64, b'0'),
(40, 'leonardo@gmail.com', 'Disco molto carino e spedizione veloce', 4, 4, '0075678666605', 'negozioc@negozioc.it', 65, b'0'),
(41, 'leonardo@gmail.com', 'Il disco per quanto mi riguarda è un vero e proprio flop, in compenso la spedizione è stata perfetta', 2, 5, '0194398243825', 'negoziob@negoziob.it', 66, b'0'),
(42, 'leonardo@gmail.com', 'Il disco è semplicemente MERAVIGLIOSO, la spedizione invece è stata un vero e proprio disastro', 5, 2, '0196588460326', 'negozioc@negozioc.it', 67, b'0'),
(43, 'leonardo@gmail.com', 'disco discreto, spedizione buona anche se in ritardo di 2 giorni', 3, 4, '0602435633558', 'negozioc@negozioc.it', 68, b'0'),
(44, 'leonardo@gmail.com', 'disco molto interessante, spedizione un pochino lenta', 4, 3, '0602508412882', 'negozioc@negozioc.it', 69, b'0'),
(45, 'leonardo@gmail.com', 'disco davvero molto interessante, spedizione buona', 4, 4, '0602498614747', 'negozioc@negozioc.it', 70, b'0'),
(46, 'leonardo@gmail.com', 'disco discreto, spedizione un pochino lenta', 3, 3, '0602465070064', 'negozioa@negozioa.it', 71, b'0'),
(47, 'leonardo@gmail.com', 'il disco non mi ha fatto impazzire in compenso la spedizione è stata efficiente', 3, 4, '0602527188386', 'negozioc@negozioc.it', 72, b'0'),
(48, 'leonardo@gmail.com', 'disco non entusiasmante, spedizione PERFETTA', 3, 5, '0606949062927', 'negozioc@negozioc.it', 73, b'0'),
(49, 'leonardo@gmail.com', 'disco semplicemente pazzesco, anche la spedizione è stata perfetta', 5, 5, '0888751258426', 'negoziob@negoziob.it', 74, b'0'),
(50, 'leonardo@gmail.com', 'disco abbastanza noioso ma ben prodotto, spedizione molto buona', 3, 4, '0602547854032', 'negozioa@negozioa.it', 75, b'0'),
(51, 'leonardo@gmail.com', 'disco molto bello, spedizione veloce e precisa', 4, 4, '0602547300683', 'negozioc@negozioc.it', 76, b'0'),
(53, 'andreasorge@gmail.com', 'Il GOAT Kendrick Lamar fa uscire il disco rap migliore di tutti. Peccato che il NegozioB me lo mandi con la custodia rotta. Almeno la spedizione è stata veloce.', 5, 2, '0602448384270', 'negoziob@negoziob.it', 57, b'0'),
(54, 'gianmarco@gmail.com', 'Grande disco del Gem. Spedizione troppo lenta ', 4, 3, '0602567539223', 'negozioc@negozioc.it', 81, b'0'),
(55, 'gianmarco@gmail.com', 'The godfather of rap. Good delivery', 5, 4, '0731454681520', 'negozioc@negozioc.it', 78, b'0'),
(56, 'gianmarco@gmail.com', 'La trap in formato disco. Certified Hood Classic. La consegna è avvenuta nei tempi previsti', 5, 4, '0888751258426', 'negozioc@negozioc.it', 79, b'0'),
(57, 'gianmarco@gmail.com', 'LEGGERNDARIO poco da dire. Il disco è arrivato leggermente danneggiato sulla copertina.', 5, 3, '0606949062927', 'negozioc@negozioc.it', 80, b'0'),
(58, 'gianmarco@gmail.com', 'Fifty fuckin cent. Top spedizione', 5, 5, '0602498614747', 'negozioc@negozioc.it', 83, b'0'),
(59, 'gianmarco@gmail.com', 'Disco top del guercio che si conferma king del rap italiano. Spedizione lenta ma alla fine l\'articolo è arrivato.', 5, 3, '0602438080953', 'negozioc@negozioc.it', 82, b'0'),
(60, 'gianmarco@gmail.com', 'Un peccato aver perso un talento così grande. Ho avuto un problema con la consegna ma il venditore ha prontamente risposto per aiutarmi.', 4, 5, '0602507474751', 'negozioc@negozioc.it', 84, b'0'),
(61, 'gianmarco@gmail.com', 'Top Marra. Spedizione troppo ritardataria', 5, 2, '0602508412882', 'negozioc@negozioc.it', 85, b'0'),
(62, 'gianmarco@gmail.com', 'Kid Cudi saved my life. No problems with the delivery.', 5, 4, '0602527188386', 'negozioc@negozioc.it', 86, b'0'),
(63, 'gianmarco@gmail.com', 'Forse il miglior disco di sempre e sicuramente il migliore di Kanye. 5 stelle alla consegna top in giornata', 5, 5, '0602527544618', 'negozioc@negozioc.it', 87, b'0'),
(64, 'gianmarco@gmail.com', 'Ok forse è questo il migliore di Kanye. Spedizione con tempi infiniti', 5, 3, '0602537432134', 'negozioc@negozioc.it', 88, b'0'),
(65, 'gianmarco@gmail.com', 'Bel disco ma molto grezzo. Ottima spedizione', 4, 4, '0602547854032', 'negozioc@negozioc.it', 91, b'0'),
(66, 'gianmarco@gmail.com', 'King della trap italiana. La spedizione ha ritardato diversi giorni e il venditore non ha saputo dare una giustificazione valida. Oid ocrop', 5, 2, '0602567319986', 'negozioc@negozioc.it', 77, b'0'),
(67, 'gianmarco@gmail.com', 'WE GON BE ALRIGHT. Spedizione nei tempi', 5, 4, '0602547300683', 'negozioc@negozioc.it', 89, b'0'),
(68, 'gianmarco@gmail.com', 'Che dire follettini e follettine. Troppo forte. Spedizione velocissima', 5, 5, '0602557611755', 'negozioc@negozioc.it', 90, b'0'),
(70, 'andreasorge@gmail.com', 'YOUNG METRO 3 TIMES', 5, 5, '0888751258426', 'negoziob@negoziob.it', 56, b'0'),
(71, 'andreasorge@gmail.com', 'Pure quando non prova, è sempre il GOAT', 5, 4, '0602547854032', 'negozioa@negozioa.it', 58, b'0'),
(72, 'andreasorge@gmail.com', 'Top disco, il venditore è ritardato. Ha mandato il disco ai miei vicini. Metto una stella perché zero non le posso mettere.', 5, 1, '0602527544618', 'negoziob@negoziob.it', 61, b'0'),
(73, 'andreasorge@gmail.com', 'Spedizione ok, disco scadente', 2, 4, '0602537432134', 'negozioc@negozioc.it', 62, b'0'),
(74, 'gianmarco@gmail.com', 'YOU\'RE SUCH A FREAK! Spedizione nei tempi', 5, 3, '0198028104425', 'negozioa@negozioa.it', 93, b'0'),
(75, 'gianmarco@gmail.com', 'Altro capolavoro di uno dei più grandi artisti di sempre. Poche tracce ma più che buone. Il NegozioB mi ha risolto un problema legato al giorno di consegna senza alcuna difficoltà.', 5, 4, '0602567784692', 'negoziob@negoziob.it', 94, b'0'),
(76, 'gianmarco@gmail.com', 'Grande Guè disco solidissimo come sempre, pieno di hit. La spedizione ha richiesto più giorni del previsto, ma alla fine è arrivato tutto in ordine.', 4, 3, '0602508873508', 'negozioa@negozioa.it', 95, b'0'),
(77, 'andreasorge@gmail.com', 'Disco commerciale ma pieno di hit. Spedizione tempestiva', 5, 5, '0602557611755', 'negozioa@negozioa.it', 60, b'0'),
(78, 'andreasorge@gmail.com', 'Secondo solo a GKMC. Arrivato tardi.', 5, 3, '0602547300683', 'negozioc@negozioc.it', 59, b'0'),
(79, 'gianmarco@gmail.com', 'Ho comprato il disco per dare un\'occasione a Gemitaiz. Peggior decisione della mia vita. Disco sbocchevole fatto da un tossico di merda. Spedizione ottima ma sprecata', 2, 4, '0602435505336', 'negozioc@negozioc.it', 96, b'0'),
(80, 'gianmarco@gmail.com', 'Troppo underrated. Il disco fa paura meriterebbe senz\'altro di più. Senza problemi la consegna', 4, 4, '0843563164884', 'negozioc@negozioc.it', 97, b'0'),
(81, 'gianmarco@gmail.com', 'WE DONT TRUST YOU ALBUM OF THE YEAR. Purtroppo è arrivato con la copertina crepata.', 5, 2, '0196588989612', 'negozioa@negozioa.it', 98, b'0'),
(82, 'gianmarco@gmail.com', 'Disco della Madonna complimenti ai due King del Rap italiano. Consegna rapida', 4, 4, '0602567649274', 'negoziob@negoziob.it', 99, b'0'),
(83, 'gianmarco@gmail.com', 'Il primo non che il migliore album di Kid Cudi. Consegna rapida', 4, 4, '0602527154893', 'negozioc@negozioc.it', 100, b'0'),
(84, 'gianmarco@gmail.com', 'Album visionario, tra qualche anno esploderà completamente perché le persone non capiscono ancora il suo potenziale. Ho avuto un problema con il NegozioC per cui non riuscivano a ritrovare  la mia spedizione nonostante io avessi pagato tutto e subito. Pessima esperienza con questo shop.', 5, 1, '0196588460326', 'negozioc@negozioc.it', 101, b'0'),
(85, 'gianmarco@gmail.com', 'Ottimo album del promotore della drill newyorkese e mondiale. Alcune tracce possono risultare ripetitive, ma la maggior parte sono molto valide.\r\nSpedizione nei tempi', 4, 4, '0602507474751', 'negozioc@negozioc.it', 102, b'0'),
(86, 'leonardo@gmail.com', 'Grande anna sei la mia prefe! Spedizione perfetta', 5, 4, '0602465904284', 'negozioa@negozioa.it', 103, b'0'),
(87, 'leonardo@gmail.com', 'Eccelso come sempre! Ottima anche la spedizione', 5, 4, '0602435505336', 'negozioc@negozioc.it', 104, b'0'),
(92, 'giannigracchia@gmail.com', 'vera baddie', 5, 5, '0602465904284', 'negozioa@negozioa.it', 117, b'0'),
(93, 'luca@gmail.com', 'disco discreto, spedizione abbastanza buona', 3, 3, '0075678666605', 'negozioc@negozioc.it', 118, b'0'),
(94, 'luca@gmail.com', 'Il salmone non sbaglia MAI! Spedizione ottima', 5, 4, '0190758838328', 'negozioc@negozioc.it', 119, b'0'),
(95, 'luca@gmail.com', 'Molto bello ma preferisco la scena italiana, ottima spedizione', 4, 4, '0190758883625', 'negozioc@negozioc.it', 120, b'0'),
(96, 'luca@gmail.com', 'disco fuori dagli schemi come piace a me! Purtroppo l\'articolo è arrivato in leggero ritardo', 4, 2, '0190759496022', 'negoziob@negoziob.it', 121, b'0'),
(97, 'luca@gmail.com', 'Disco ICONICO! ', 5, 3, '0081227827687', 'negozioa@negozioa.it', 122, b'0'),
(99, 'andreasorge@gmail.com', 'Fa schifo, peggior disco del Thugger', 1, 5, '0075678666605', 'negozioc@negozioc.it', 123, b'0'),
(100, 'salvino@cliente.com', 'Che disco!', 5, 3, '0075678666605', 'negozioa@negozioa.it', 124, b'0'),
(101, 'giannittu@cliente.com', 'Disco Perfetto, discreta spedizione', 5, 3, '0075678666605', 'negozioc@negozioc.it', 125, b'0'),
(102, 'giannittu@cliente.com', 'Disco troppo commerciale per gli standard di salmo, ottima spedizione', 2, 4, '0190758838328', 'negozioc@negozioc.it', 126, b'0'),
(103, 'gianmarco@gmail.com', 'Disco trap molto bello poco da dire, spedizione veloce', 4, 3, '0602577209598', 'negoziob@negoziob.it', 139, b'0'),
(104, 'gianmarco@gmail.com', 'Il vero rap. Spedizione che ha creato non pochi problemi per via di ritardi vari', 5, 2, '0606949048624', 'negozioc@negozioc.it', 138, b'0'),
(105, 'gianmarco@gmail.com', 'Non male come album ma Guè ci ha abituato a fare meglio. Ottima spedizione', 3, 4, '0602455038678', 'negozioa@negozioa.it', 128, b'0'),
(106, 'gianmarco@gmail.com', 'Classico del rap italiano. Spedizione nei tempi', 4, 4, '8032484007482', 'negoziob@negoziob.it', 135, b'0'),
(107, 'gianmarco@gmail.com', 'Travi$ Scott. Spedizione normale', 5, 3, '0888750652027', 'negozioc@negozioc.it', 137, b'0'),
(108, 'gianmarco@gmail.com', 'Album un poco grezzo. Buona spedizione', 2, 4, '0602435359441', 'negozioc@negozioc.it', 127, b'0'),
(109, 'andreasorge@gmail.com', 'Grande 21, grande venditore', 5, 5, '0889854668228', 'negozioa@negozioa.it', 140, b'0'),
(110, 'andreasorge@gmail.com', 'Disco non ottimo, non so se lo consiglierei', 3, 4, '0602508801297', 'negoziob@negoziob.it', 141, b'0'),
(111, 'gianmarco@gmail.com', 'Bellissimo album poco da dire. Spedizione molto lenta', 4, 2, '0889854668228', 'negozioa@negozioa.it', 136, b'0'),
(112, 'andreasorge@gmail.com', 'NO, abolite gli album postumi vi prego', 2, 5, '0602507306465', 'negozioc@negozioc.it', 142, b'0'),
(113, 'andreasorge@gmail.com', 'Pop Smoke missa ancora', 1, 2, '0602435359441', 'negozioc@negozioc.it', 143, b'0'),
(114, 'andreasorge@gmail.com', 'Grande gemi', 4, 3, '0602445837137', 'negozioa@negozioa.it', 144, b'0'),
(115, 'gianmarco@gmail.com', 'Bruttissimo disco. Spedizione veloce', 1, 3, '0602458763904', 'negoziob@negoziob.it', 129, b'0'),
(116, 'gianmarco@gmail.com', 'Papà Sfera non ne sbaglia una. Ottima spedizione', 4, 4, '0602458794731', 'negoziob@negoziob.it', 130, b'0'),
(117, 'gianmarco@gmail.com', 'Si vede l\'evoluzione di Pop Smoke. Spedizione lenta', 4, 2, '0602508801297', 'negoziob@negoziob.it', 134, b'0'),
(118, 'andreasorge@gmail.com', 'Grande Jay', 4, 5, '0600753353479', 'negoziob@negoziob.it', 145, b'0'),
(119, 'andreasorge@gmail.com', 'Disco bruttino', 3, 4, '0602498611234', 'negozioc@negozioc.it', 146, b'0'),
(120, 'gianmarco@gmail.com', 'Album inutile. In più la spedizione è stata lentissima', 1, 1, '0602508276194', 'negozioc@negozioc.it', 133, b'0'),
(121, 'andreasorge@gmail.com', 'Sconsiglio il venditore, consiglio il disco', 4, 2, '0731453639218', 'negoziob@negoziob.it', 147, b'0'),
(122, 'andreasorge@gmail.com', 'Non è un classico, è orribile. Spedizione decente', 1, 4, '0731455890211', 'negozioa@negozioa.it', 148, b'0'),
(123, 'andreasorge@gmail.com', 'Amo Kid Cudi!', 5, 4, '0602527547633', 'negoziob@negoziob.it', 149, b'0'),
(124, 'gianmarco@gmail.com', 'Bellissimo album mostra la maturità artstica di Kid Yugi. Spedizione normale', 4, 3, '0602465070064', 'negozioa@negozioa.it', 132, b'0'),
(125, 'andreasorge@gmail.com', 'Truly a classic. The greatest rock record! Unfortunately NegozioC sucks.', 5, 1, '5099902987613', 'negozioc@negozioc.it', 150, b'0'),
(126, 'gianmarco@gmail.com', 'Disco non male. Molto veloce la spedizione', 3, 4, '0602465002935', 'negozioc@negozioc.it', 131, b'0'),
(127, 'giannittu@cliente.com', 'Gem e Mad non ne missano una, spedizione non eccezionale', 5, 3, '0602508276194', 'negozioc@negozioc.it', 158, b'0'),
(128, 'andreasorge@gmail.com', 'Il ritorno del salmone!', 4, 1, '0196587057411', 'negozioa@negozioa.it', 151, b'0'),
(129, 'giannittu@cliente.com', 'Non mi fa impazzire, spedizione ottima', 2, 4, '0190758883625', 'negozioc@negozioc.it', 159, b'0'),
(130, 'andreasorge@gmail.com', 'uccideteli vi prego', 1, 4, '0602567984597', 'negozioc@negozioc.it', 152, b'0'),
(131, 'andreasorge@gmail.com', 'il vero riconosce il vero', 4, 3, '0602547372246', 'negoziob@negoziob.it', 153, b'0'),
(132, 'giannittu@cliente.com', 'Dato che non ho 10 anni non mi piace', 2, 4, '0190759496022', 'negoziob@negoziob.it', 160, b'0'),
(133, 'andreasorge@gmail.com', 'il miglior disco di mad', 5, 3, '0602577553097', 'negozioa@negozioa.it', 154, b'0'),
(134, 'andreasorge@gmail.com', 'Così bello che me so comprato pure er vinile', 5, 5, '0602557618280', 'negozioa@negozioa.it', 155, b'0'),
(135, 'giannittu@cliente.com', 'Disco sopravvalutato', 2, 4, '0194397815122', 'negozioc@negozioc.it', 161, b'0'),
(136, 'andreasorge@gmail.com', 'No(i loro gli altri)', 2, 4, '0602445158706', 'negozioa@negozioa.it', 156, b'0'),
(137, 'andreasorge@gmail.com', 'Guercio top', 4, 3, '0602557638394', 'negoziob@negoziob.it', 157, b'0'),
(138, 'giannittu@cliente.com', 'disco molto interessante', 4, 3, '0081227827687', 'negozioa@negozioa.it', 162, b'0'),
(139, 'giannittu@cliente.com', 'disco leggendario che rimarrà nella storia', 5, 3, '0602445158706', 'negozioa@negozioa.it', 163, b'0'),
(140, 'gianmarco@gmail.com', 'Troppo forte sto disco. Spedizione lenta ma non mi interessa te regalo le stelle NegozioC.', 5, 5, '0602445926015', 'negozioc@negozioc.it', 164, b'0'),
(141, 'leonardo@gmail.com', 'Non mi è piaciuto affatto al contrario dell\'ottima spedizione ', 2, 4, '0081227827687', 'negozioa@negozioa.it', 165, b'0'),
(142, 'leonardo@gmail.com', 'Disco molto bello', 4, 3, '0190758883618', 'negozioc@negozioc.it', 166, b'0'),
(143, 'leonardo@gmail.com', 'Disco molto bello, spedizione discreta', 4, 3, '0194397091113', 'negoziob@negoziob.it', 167, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `Seller`
--

CREATE TABLE `Seller` (
  `email` varchar(50) NOT NULL,
  `shopName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Seller`
--

INSERT INTO `Seller` (`email`, `shopName`) VALUES
('negozioa@negozioa.it', 'NegozioA'),
('negoziob@negoziob.it', 'NegozioB'),
('negozioc@negozioc.it', 'NegozioC');

-- --------------------------------------------------------

--
-- Table structure for table `Stock`
--

CREATE TABLE `Stock` (
  `id` int NOT NULL,
  `price` float NOT NULL,
  `quantity` int NOT NULL,
  `article` varchar(13) NOT NULL,
  `seller` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Stock`
--

INSERT INTO `Stock` (`id`, `price`, `quantity`, `article`, `seller`) VALUES
(1, 26.99, 29, '0602527154893', 'negozioc@negozioc.it'),
(2, 35.99, 23, '5099902987613', 'negozioa@negozioa.it'),
(3, 17.99, 15, '0194398186320', 'negozioa@negozioa.it'),
(4, 20.99, 19, '0196588202629', 'negozioa@negozioa.it'),
(5, 15.99, 4, '5054197123641', 'negozioa@negozioa.it'),
(6, 32.99, 9, '5099902987613', 'negozioc@negozioc.it'),
(7, 15.99, 9, '0194398186320', 'negoziob@negoziob.it'),
(8, 36.99, 4, '0196588460319', 'negoziob@negoziob.it'),
(9, 29.99, 7, '0602465291186', 'negozioc@negozioc.it'),
(10, 29.99, 26, '0196588989612', 'negozioa@negozioa.it'),
(11, 31.99, 10, '0196588989612', 'negoziob@negoziob.it'),
(12, 29.99, 19, '0196588989612', 'negozioc@negozioc.it'),
(13, 34.99, 15, '0602508515736', 'negoziob@negoziob.it'),
(14, 22.99, 10, '0602508412882', 'negoziob@negoziob.it'),
(15, 20.99, 10, '0602508412882', 'negozioc@negozioc.it'),
(16, 21.99, 6, '0602508412882', 'negozioa@negozioa.it'),
(17, 19.99, 10, '0602567539223', 'negozioa@negozioa.it'),
(18, 33.99, 11, '0602567582991', 'negozioa@negozioa.it'),
(19, 35.99, 9, '0602567582991', 'negoziob@negoziob.it'),
(20, 21.99, 13, '0602567539223', 'negoziob@negoziob.it'),
(21, 20.99, 7, '0602567539223', 'negozioc@negozioc.it'),
(22, 21.99, 7, '0602577553097', 'negozioa@negozioa.it'),
(23, 21.99, 3, '0731454681520', 'negozioa@negozioa.it'),
(24, 29.99, 8, '0602577553097', 'negoziob@negoziob.it'),
(25, 22.99, 11, '0602577556326', 'negozioc@negozioc.it'),
(26, 29.99, 8, '0602577556326', 'negoziob@negoziob.it'),
(27, 22.99, 11, '0602577556326', 'negozioa@negozioa.it'),
(28, 32.99, 17, '0602445837038', 'negozioa@negozioa.it'),
(29, 21.99, 15, '0602445837137', 'negozioa@negozioa.it'),
(30, 20.99, 14, '0602445168552', 'negozioa@negozioa.it'),
(31, 32.99, 12, '0602445158706', 'negozioa@negozioa.it'),
(32, 22.99, 14, '0602445168552', 'negoziob@negoziob.it'),
(33, 32.99, 12, '0602445158706', 'negoziob@negoziob.it'),
(34, 30.99, 10, '0602445837038', 'negoziob@negoziob.it'),
(35, 21.99, 9, '0602445837137', 'negoziob@negoziob.it'),
(36, 24.99, 15, '0602435935645', 'negoziob@negoziob.it'),
(37, 19.99, 10, '0602435935645', 'negozioa@negozioa.it'),
(38, 31.99, 8, '0602498611234', 'negozioc@negozioc.it'),
(39, 22.99, 16, '0602445837137', 'negozioc@negozioc.it'),
(40, 20.99, 17, '0602445168552', 'negozioc@negozioc.it'),
(41, 30.99, 13, '0602438080953', 'negozioc@negozioc.it'),
(42, 23.99, 13, '0602498614747', 'negozioc@negozioc.it'),
(43, 22.99, 9, '0190758883625', 'negozioa@negozioa.it'),
(44, 23.99, 17, '0602435505336', 'negozioa@negozioa.it'),
(45, 33.99, 10, '0190758883618', 'negozioa@negozioa.it'),
(46, 21.99, 12, '0190758883625', 'negoziob@negoziob.it'),
(47, 24.99, 13, '0602435505336', 'negoziob@negoziob.it'),
(48, 33.99, 14, '0190758883618', 'negoziob@negoziob.it'),
(49, 19.99, 1, '0190758883625', 'negozioc@negozioc.it'),
(50, 20.99, 13, '0602435505336', 'negozioc@negozioc.it'),
(51, 34.99, 10, '0194397815122', 'negozioc@negozioc.it'),
(52, 16.99, 20, '0602435047232', 'negozioa@negozioa.it'),
(53, 14.99, 18, '0602435047232', 'negoziob@negoziob.it'),
(54, 15.99, 12, '0602547854032', 'negozioa@negozioa.it'),
(55, 31.99, 7, '0602547866813', 'negozioa@negozioa.it'),
(56, 20.99, 24, '0602557611755', 'negozioa@negozioa.it'),
(57, 40.99, 13, '0602557618280', 'negozioa@negozioa.it'),
(58, 42.99, 20, '0602557618280', 'negoziob@negoziob.it'),
(59, 34.99, 10, '0196587057411', 'negozioa@negozioa.it'),
(60, 19.99, 14, '0194398243825', 'negoziob@negoziob.it'),
(61, 27.99, 3, '0198028104616', 'negozioa@negozioa.it'),
(62, 34.99, 15, '0198028104616', 'negozioc@negozioc.it'),
(63, 61.99, 2, '0081227827687', 'negozioa@negozioa.it'),
(64, 29.99, 9, '0602567784692', 'negoziob@negoziob.it'),
(65, 31.99, 12, '0602567784692', 'negozioc@negozioc.it'),
(66, 11.99, 3, '0602537432134', 'negozioa@negozioa.it'),
(67, 10.99, 5, '0602537432134', 'negozioc@negozioc.it'),
(68, 4.99, 10, '0602527544618', 'negoziob@negoziob.it'),
(69, 8.99, 26, '0602527544618', 'negozioa@negozioa.it'),
(70, 27.99, 9, '0194397091113', 'negoziob@negoziob.it'),
(71, 25.99, 2, '0602455038685', 'negozioa@negozioa.it'),
(72, 28.99, 5, '0602455038685', 'negozioc@negozioc.it'),
(73, 34.99, 12, '0602527547633', 'negoziob@negoziob.it'),
(74, 15.99, 5, '0602527468037', 'negozioc@negozioc.it'),
(75, 20.99, 18, '0602567319986', 'negozioc@negozioc.it'),
(76, 17.99, 4, '0602567319986', 'negozioa@negozioa.it'),
(77, 40.99, 6, '0602547311009', 'negozioa@negozioa.it'),
(78, 45.99, 14, '0602537192267', 'negozioa@negozioa.it'),
(100, 15.99, 0, '0194690783944', 'negozioc@negozioc.it'),
(101, 15.99, 9, '0190758883618', 'negozioc@negozioc.it'),
(102, 17.99, 12, '0196588202629', 'negozioc@negozioc.it'),
(103, 15.99, 10, '0196588460326', 'negozioc@negozioc.it'),
(104, 15.99, 12, '0196588989629', 'negozioc@negozioc.it'),
(105, 15.99, 9, '0602435359441', 'negozioc@negozioc.it'),
(106, 15.99, 10, '0602435935645', 'negozioc@negozioc.it'),
(107, 15.99, 10, '0602507474751', 'negozioc@negozioc.it'),
(108, 15.99, 10, '0602527188386', 'negozioc@negozioc.it'),
(109, 14.99, 11, '0075678666605', 'negozioc@negozioc.it'),
(110, 15.99, 1, '0602435633558', 'negozioc@negozioc.it'),
(111, 15.99, 9, '0602547300683', 'negozioc@negozioc.it'),
(112, 17.99, 9, '0888751258426', 'negoziob@negoziob.it'),
(113, 17.99, 12, '0602507474751', 'negoziob@negoziob.it'),
(114, 17.99, 12, '0196588460326', 'negoziob@negoziob.it'),
(115, 17.99, 11, '0602435356204', 'negoziob@negoziob.it'),
(116, 17.99, 12, '0194690783944', 'negoziob@negoziob.it'),
(117, 17.99, 9, '0190759496022', 'negoziob@negoziob.it'),
(118, 17.99, 15, '0196588072413', 'negoziob@negoziob.it'),
(119, 17.99, 11, '0602458794731', 'negoziob@negoziob.it'),
(120, 17.99, 11, '0602448384270', 'negoziob@negoziob.it'),
(121, 35.99, 10, '0602435719306', 'negozioc@negozioc.it'),
(122, 35.99, 10, '0602445158706', 'negozioc@negozioc.it'),
(123, 35.99, 9, '0602445926015', 'negozioc@negozioc.it'),
(124, 35.99, 9, '0602507306465', 'negozioc@negozioc.it'),
(125, 35.99, 10, '0602508515736', 'negozioc@negozioc.it'),
(126, 35.99, 10, '0602577553097', 'negozioc@negozioc.it'),
(127, 35.99, 10, '0606949354411', 'negozioc@negozioc.it'),
(128, 35.99, 10, '0602507402747', 'negozioc@negozioc.it'),
(129, 35.99, 6, '0190758838328', 'negozioc@negozioc.it'),
(130, 35.99, 8, '0843563164884', 'negozioc@negozioc.it'),
(131, 37.99, 12, '0602435719306', 'negoziob@negoziob.it'),
(132, 37.99, 11, '0600753353479', 'negoziob@negoziob.it'),
(133, 37.99, 12, '0602445926015', 'negoziob@negoziob.it'),
(134, 37.99, 12, '0602507306465', 'negoziob@negoziob.it'),
(135, 37.99, 11, '0602567649274', 'negoziob@negoziob.it'),
(136, 37.99, 11, '0602567874942', 'negoziob@negoziob.it'),
(137, 37.99, 12, '0190758838328', 'negoziob@negoziob.it'),
(138, 37.99, 12, '0602507402747', 'negoziob@negoziob.it'),
(139, 37.99, 12, '0606949354411', 'negoziob@negoziob.it'),
(140, 37.99, 11, '0731453639218', 'negoziob@negoziob.it'),
(141, 39.99, 12, '0731453639218', 'negozioa@negozioa.it'),
(142, 39.99, 12, '0606949354411', 'negozioa@negozioa.it'),
(143, 39.99, 11, '0731455890211', 'negozioa@negozioa.it'),
(144, 39.99, 12, '0602445926015', 'negozioa@negozioa.it'),
(145, 39.99, 12, '0190759496022', 'negozioa@negozioa.it'),
(146, 39.99, 12, '0888751258426', 'negozioa@negozioa.it'),
(147, 39.99, 12, '0190759496022', 'negozioc@negozioc.it'),
(148, 39.99, 12, '0602507402747', 'negozioa@negozioa.it'),
(149, 39.99, 12, '0194690783944', 'negozioa@negozioa.it'),
(150, 39.99, 12, '0602507306465', 'negozioa@negozioa.it'),
(151, 15.99, 9, '0075678666605', 'negozioa@negozioa.it'),
(152, 19.99, 9, '0602455038678', 'negozioa@negozioa.it'),
(153, 21.99, 10, '0602455038678', 'negoziob@negoziob.it'),
(154, 20.99, 8, '0602458763904', 'negoziob@negoziob.it'),
(155, 23.99, 9, '0602458763904', 'negozioc@negozioc.it'),
(156, 21.99, 10, '0602465002935', 'negozioc@negozioc.it'),
(157, 18.99, 8, '0602465002935', 'negozioc@negozioc.it'),
(158, 19.99, 9, '0602465070064', 'negozioa@negozioa.it'),
(159, 20.99, 9, '0602465070064', 'negoziob@negoziob.it'),
(160, 20.99, 7, '0606949048624', 'negozioc@negozioc.it'),
(161, 17.99, 0, '0606949062927', 'negozioc@negozioc.it'),
(162, 17.99, 8, '0888750652027', 'negozioc@negozioc.it'),
(163, 20.99, 7, '0602508801297', 'negoziob@negoziob.it'),
(164, 17.99, 4, '0198028104425', 'negozioa@negozioa.it'),
(165, 19.99, 7, '0198028104425', 'negoziob@negoziob.it'),
(166, 20.99, 5, '0602508276194', 'negozioc@negozioc.it'),
(167, 21.99, 9, '0602508276194', 'negoziob@negoziob.it'),
(168, 18.99, 9, '0602508873508', 'negozioa@negozioa.it'),
(169, 22.99, 11, '0602508873508', 'negozioc@negozioc.it'),
(170, 23.99, 14, '0602537521869', 'negoziob@negoziob.it'),
(171, 17.99, 7, '0602537521869', 'negozioc@negozioc.it'),
(172, 20.99, 8, '0602547372246', 'negozioa@negozioa.it'),
(173, 19.99, 9, '0602547372246', 'negoziob@negoziob.it'),
(174, 24.99, 13, '0602557299502', 'negozioa@negozioa.it'),
(175, 23.99, 14, '0602557299502', 'negozioc@negozioc.it'),
(176, 17.99, 9, '0602557638394', 'negoziob@negoziob.it'),
(177, 18.99, 9, '0602557638394', 'negozioa@negozioa.it'),
(178, 19.99, 11, '0602567384380', 'negoziob@negoziob.it'),
(179, 19.99, 11, '0602567384380', 'negoziob@negoziob.it'),
(180, 19.99, 7, '0602567984597', 'negoziob@negoziob.it'),
(181, 18.99, 8, '0602567984597', 'negozioc@negozioc.it'),
(182, 20.99, 12, '0602577209598', 'negozioa@negozioa.it'),
(183, 19.99, 6, '0602577209598', 'negoziob@negoziob.it'),
(184, 20.99, 11, '0606949329020', 'negozioa@negozioa.it'),
(185, 21.99, 17, '0606949329020', 'negozioc@negozioc.it'),
(186, 16.99, 9, '0889854668228', 'negozioa@negozioa.it'),
(187, 17.99, 10, '0889854668228', 'negoziob@negoziob.it'),
(188, 20.99, 6, '0889854668228', 'negozioc@negozioc.it'),
(189, 22.99, 10, '8032484007482', 'negozioa@negozioa.it'),
(190, 19.99, 7, '8032484007482', 'negoziob@negoziob.it'),
(191, 19.99, 8, '0602465904284', 'negozioa@negozioa.it');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`email`, `password`) VALUES
('admin@musiccorner.it', '$2y$10$SFR/CFXsavfoKklsqQ0.TueXq6AR.65KqBQiqXYUJ3NQQJkfM/yLG'),
('andreasorge@gmail.com', '$2y$10$Mbkrp1WMf8PJIq8yuzWdjeCts3pX7P3aDrbMzkMZ4V6XbXneivb7a'),
('ciaod29@gmail.com', '$2y$10$GKAYM3nDdB5V1makqeohz.MH2Hac1RQhRGKY9jqblZdhcgzGQXkGS'),
('cliente@gmail.com', '$2y$10$OPwkPKXzy9je0U63dTUMSeomHQ1YdJ.hRXLQZlrSs3jq3LTb/LMKS'),
('clientebannato@gmail.com', '$2y$10$NXIEvU6/LpR9q9STn/AwruE.lhYtA8wgZUO2XtACE/9pDuOO9h6KS'),
('gianmarco@gmail.com', '$2y$10$KeptSQ11DVUI1cCkv3TQXeVCfP2N2x.3r5mUgJSrjhN.q9yw40fdq'),
('giannigracchia@gmail.com', '$2y$10$qaMSbrWEMxO1A1Gwm0FOdeL7XtcDaoJw6FV.P5AWE1sekqblBd6vi'),
('giannittu@cliente.com', '$2y$10$erQ4rI48QhEbqmsvV6BdrOLWQR9uGOIPrDzKFYdO5dDul.JSU8GjK'),
('leonardo@gmail.com', '$2y$10$PKkfYhNvxh65owPnPGARRegaSB6G0dXrfFoKA0nmXNBbmumsVoSt2'),
('luca@gmail.com', '$2y$10$RwUlr6.L8BjL5NdJS2PJkejygjY1biQLL3a6h0T31QkzUYrq0.WD.'),
('mariorossi@gmail.com', '$2y$10$gKbIro88POJ.HXSnkh57cuDMB82/dKoO56NFM9hn7dwVq2OjKK5mG'),
('negozioa@negozioa.it', '$2y$10$skGTLcsOjDDM2tLgp3dJRecHbO6sFh3/Yu9a4OCshUihEkXqXjdzK'),
('negoziob@negoziob.it', '$2y$10$P7hHMNlD4CXTT/ymyCZVLOpH3uI/ZJGf8to/NRrVlcWGMiWrDbZKq'),
('negozioc@negozioc.it', '$2y$10$2KF17oFU2BDBncHjF2e/YuD9sTHh2RYPyyuFFqCJ5SuimAuiDciOq'),
('salvino@cliente.com', '$2y$10$qwa4Y1JlYWmcO9FkOcOD3e/skWIQk4TeSQZ5nrxvzp.hSV/8KKJCi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Address`
--
ALTER TABLE `Address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `ArticleDescription`
--
ALTER TABLE `ArticleDescription`
  ADD PRIMARY KEY (`EAN`);

--
-- Indexes for table `CreditCard`
--
ALTER TABLE `CreditCard`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `OrderItem`
--
ALTER TABLE `OrderItem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Seller`
--
ALTER TABLE `Seller`
  ADD PRIMARY KEY (`email`) USING BTREE;

--
-- Indexes for table `Stock`
--
ALTER TABLE `Stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Address`
--
ALTER TABLE `Address`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `CreditCard`
--
ALTER TABLE `CreditCard`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `OrderItem`
--
ALTER TABLE `OrderItem`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `Review`
--
ALTER TABLE `Review`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `Stock`
--
ALTER TABLE `Stock`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
