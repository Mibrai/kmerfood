-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Sep 2020 um 09:40
-- Server-Version: 10.3.16-MariaDB
-- PHP-Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `kmerfood_db`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cathegorie`
--

CREATE TABLE `cathegorie` (
  `id` varchar(11) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `cathegorie`
--

INSERT INTO `cathegorie` (`id`, `label`) VALUES
('1', 'Cereales et feculents'),
('C1VsU', 'Viandes et Poissons'),
('C7md8', 'Epices et Condiments'),
('CKndJ', 'Fruits et legumes'),
('ClnWY', 'Autres'),
('CoLcS', 'Huiles'),
('CXYn5', 'Fruits de mer'),
('CZpdn', 'Boissons');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `command`
--

CREATE TABLE `command` (
  `id` int(11) NOT NULL,
  `client_name` varchar(60) NOT NULL,
  `telefone` varchar(60) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `price_cmd` float(10,2) NOT NULL,
  `qty_cmd` float(10,2) NOT NULL,
  `date_cmd` date NOT NULL,
  `date_delivry` date NOT NULL,
  `status_` enum('En Attente','En route','Livrée') NOT NULL DEFAULT 'En Attente',
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `command`
--

INSERT INTO `command` (`id`, `client_name`, `telefone`, `mail`, `adresse`, `price_cmd`, `qty_cmd`, `date_cmd`, `date_delivry`, `status_`, `id_product`) VALUES
(1, 'Bill', '0179524863', 'parichbill@yahoo.fr', '12 Naple Str', 8.00, 12.00, '2020-09-06', '2020-09-08', 'En Attente', 1),
(2, 'Kalif', '0179524863', 'parichbill@yahoo.fr', '12 Naple Str', 5.00, 5.00, '2020-09-19', '2020-09-19', 'En Attente', 3),
(3, 'Kalif', '0179524863', 'parichbill@yahoo.fr', '12 Naple Str', 5.00, 5.00, '2020-09-19', '2020-09-19', 'En Attente', 3),
(4, 'Kalif', '0179524863', 'parichbill@yahoo.fr', '12 Naple Str', 5.00, 5.00, '2020-09-19', '2020-09-19', 'En Attente', 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `old_price` float(10,2) NOT NULL,
  `current_price` float(10,2) NOT NULL,
  `unity` varchar(10) NOT NULL,
  `init_qty` float(10,2) NOT NULL,
  `current_qty` float(10,2) NOT NULL,
  `command_url` text NOT NULL,
  `date_created` varchar(60) NOT NULL,
  `image_path` text NOT NULL,
  `id_cathegorie` varchar(15) NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `old_price`, `current_price`, `unity`, `init_qty`, `current_qty`, `command_url`, `date_created`, `image_path`, `id_cathegorie`, `id_user`) VALUES
(1, 'Haricots blanc', 'Haricots blancs', 9.00, 8.00, 'kg', 12.00, 12.00, 'https://www.ebay.de', '2020-08-31', 'images/files/haricotblanc.jpeg', '1', 'AS123'),
(2, 'Haricot rouge', 'Haricot rouge', 4.00, 3.50, 'kg', 15.00, 15.00, 'https://www.ebay.de', '2020-09-05', 'images/files/haricotrouge.jpeg', '1', 'AS123'),
(3, 'Haricots noir', 'Haricots noirs', 6.00, 5.00, 'kg', 25.00, 25.00, 'https://www.ebay.de', '2020-09-05', 'images/haricotNoir.jpeg', '1', 'AS123'),
(4, 'Huile Manyanga', 'Manyanga Noir', 12.00, 11.00, 'L', 15.00, 15.00, 'https://www.amazon.de', '2020-09-05', 'images/manyanga_noir.jpeg', 'CoLcS', 'AS123'),
(5, 'Koki', 'Koki', 7.00, 6.50, 'kg', 15.00, 15.00, 'https://www.saturn.de', '2020-09-05', 'images/koki.jpeg', '1', 'AS123');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `userclass`
--

CREATE TABLE `userclass` (
  `id_user` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `name_user` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `login_user` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `pwd_user` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `acces_niveau` int(2) NOT NULL DEFAULT 1,
  `date_created` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image_user` varchar(255) COLLATE utf8_unicode_ci DEFAULT '''C:\\xampp\\htdocs\\User Admin\\images\\user_profil.png''',
  `status` enum('pending','active','suspended') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `userclass`
--

INSERT INTO `userclass` (`id_user`, `name_user`, `surname`, `telefone`, `email`, `gender`, `login_user`, `pwd_user`, `acces_niveau`, `date_created`, `image_user`, `status`) VALUES
('AD1258', 'As', 'Zero', '01798615872', 'snm16@tu-clausthal.de', 'Male', 'Zero', 'As', 4, '', '\'C:\\xampp\\htdocs\\User Admin\\images\\user_profil.png\'', 'active'),
('AD5563', 'Gast', 'Gast', '0', '', 'Female', 'Admin', 'Admin', 1, '', '\'C:\\xampp\\htdocs\\User Admin\\images\\user_profil.png\'', 'pending'),
('IV4587', 'Bill', 'Parich', '0', '', 'Female', 'Billy12', 'billy12', 1, '', '\'C:\\xampp\\htdocs\\User Admin\\images\\user_profil.png\'', ''),
('USI3PjA', 'Seyd', 'Njoya', '01797286158', 'seyd.njoya@yahoo.fr', 'Male', 'Seyd', 'seyd', 4, '2020-03-18', '\'C:\\xampp\\htdocs\\User Admin\\images\\user_profil.png\'', 'active'),
('USzFJoe', 'Mira', 'Mai', '2376557824', 'mira.njoya@yahoo.fr', 'Female', 'Mira', 'mira', 3, '2020-03-18', '\'C:\\xampp\\htdocs\\User Admin\\images\\user_profil.png\'', 'pending'),
('USGxp0F', 'Awal', 'Mouliom', '01728545862', 'awal.ml@gmail.com', 'Male', 'Awal', 'awal', 2, '2020-03-18', '\'C:\\xampp\\htdocs\\User Admin\\images\\user_profil.png\'', 'suspended'),
('CL82211', 'Njoya', 'Seydou', '0179524863', 'admin@synus.de', 'Male', 'synus', 'synus,synus', 1, '10-07-2020', 'C:\\xampp\\htdocs\\User Admin\\images\\user_profil.png', 'active');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cathegorie`
--
ALTER TABLE `cathegorie`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `command`
--
ALTER TABLE `command`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `command`
--
ALTER TABLE `command`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
