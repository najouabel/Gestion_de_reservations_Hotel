-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 04 avr. 2023 à 15:53
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rhotel`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `AdminId` int(11) NOT NULL,
  `AdminName` varchar(20) NOT NULL,
  `AdminEmail` varchar(30) NOT NULL,
  `AdminPassword` varchar(20) NOT NULL,
  `imageadmin` varchar(30) NOT NULL,
  `rolee` varchar(20) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `daten` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`AdminId`, `AdminName`, `AdminEmail`, `AdminPassword`, `imageadmin`, `rolee`, `prenom`, `daten`) VALUES
(1, 'najoua', 'najouabelhaj7@gmail.com', 'najoua', '', 'admin', 'belhaj', '2001-10-23'),
(2, 'ahmed', 'ahmed@gmail.com', 'ahmed', '', 'user', 'belhaj', '2007-10-25'),
(3, 'nada', 'nada@gmail.com', 'nada', '', 'user', '', '0000-00-00'),
(4, 'reda', 'reda@gmail.com', 'reda', '', 'user', '', '0000-00-00'),
(5, 'ma', 'ma@gmail.com', 'mama', '', 'user', '', '0000-00-00'),
(6, 'mn', 'mn@gmail.com', 'mnmn', '', 'user', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `personneId` int(11) NOT NULL,
  `reservationId` int(11) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `daten` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`personneId`, `reservationId`, `p_name`, `daten`) VALUES
(1, 8, 'hi', '2023-04-04');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `reservationId` int(11) NOT NULL,
  `datearrive` date NOT NULL,
  `datedepart` date NOT NULL,
  `AdminId` int(11) NOT NULL,
  `ChambreId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`reservationId`, `datearrive`, `datedepart`, `AdminId`, `ChambreId`) VALUES
(8, '2023-04-04', '2023-04-09', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE `room` (
  `ChambreId` int(11) NOT NULL,
  `nombrepers` int(30) NOT NULL,
  `prix` float NOT NULL,
  `imageroom` varchar(20) NOT NULL,
  `typechambre` varchar(30) NOT NULL,
  `typedetype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`ChambreId`, `nombrepers`, `prix`, `imageroom`, `typechambre`, `typedetype`) VALUES
(2, 1, 100, 'gallery-2.jpg', 'single', ''),
(3, 2, 150, 'gallery-2.jpg', 'double', ''),
(4, 4, 317, 'gallery-2.jpg', 'suite', 'Junior'),
(6, 3, 150, 'gallery-2.jpg', 'suite', 'junior');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminId`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`personneId`),
  ADD KEY `reservationId` (`reservationId`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservationId`),
  ADD KEY `adminid` (`AdminId`),
  ADD KEY `ChambreId` (`ChambreId`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`ChambreId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `personneId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `ChambreId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `reservationId` FOREIGN KEY (`reservationId`) REFERENCES `reservation` (`reservationId`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `ChambreId` FOREIGN KEY (`ChambreId`) REFERENCES `room` (`ChambreId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adminid` FOREIGN KEY (`AdminId`) REFERENCES `admin` (`AdminId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
