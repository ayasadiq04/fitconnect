-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2026 at 03:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `abonnement`
--

CREATE TABLE `abonnement` (
  `id_abonnement` int(11) NOT NULL,
  `type_abonnement` varchar(50) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `statut_` varchar(50) NOT NULL,
  `id_adherent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `abonnement`
--

INSERT INTO `abonnement` (`id_abonnement`, `type_abonnement`, `date_debut`, `date_fin`, `statut_`, `id_adherent`) VALUES
(1, 'Mensuel', '2026-01-10', '2026-02-10', 'Actif', 1),
(2, 'Trimestriel', '2026-02-15', '2026-05-15', 'Actif', 2),
(3, 'Annuel', '2026-03-05', '2027-03-05', 'Actif', 3),
(4, 'Mensuel', '2026-03-20', '2026-04-20', 'Expire', 4);

-- --------------------------------------------------------

--
-- Table structure for table `adhérent`
--

CREATE TABLE `adhérent` (
  `id_adherent` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `date_inscription` date NOT NULL,
  `id_salle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adhérent`
--

INSERT INTO `adhérent` (`id_adherent`, `nom`, `prenom`, `email`, `telephone`, `date_inscription`, `id_salle`) VALUES
(1, 'Amine', 'El Idrissi', 'amine@gmail.com', '0612345678', '2026-01-10', 1),
(2, 'Sara', 'Alaoui', 'sara@gmail.com', '0623456789', '2026-02-15', 1),
(3, 'Youssef', 'Bennani', 'youssef@gmail.com', '0634567890', '2026-03-05', 2),
(4, 'Nadia', 'Amrani', 'nadia@gmail.com', '0645678901', '2026-03-20', 2);

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int(11) NOT NULL,
  `nom_salle` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`id_salle`, `nom_salle`, `adresse`, `telephone`) VALUES
(1, 'Fitness Center', 'Beni Mellal Centre', '0523485678'),
(2, 'Power Gym', 'Quartier Al Massira', '0523498765');

-- --------------------------------------------------------

--
-- Table structure for table `séance`
--

CREATE TABLE `séance` (
  `id_seance` int(11) NOT NULL,
  `date_seance` date NOT NULL,
  `type_activite` varchar(50) NOT NULL,
  `equipement` varchar(50) NOT NULL,
  `duree` time NOT NULL,
  `id_salle` int(11) NOT NULL,
  `id_adherent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `séance`
--

INSERT INTO `séance` (`id_seance`, `date_seance`, `type_activite`, `equipement`, `duree`, `id_salle`, `id_adherent`) VALUES
(1, '2026-04-01', 'Musculation', 'Haltères', '01:30:00', 1, 1),
(2, '2026-04-02', 'Cardio', 'Tapis roulant', '01:00:00', 1, 2),
(3, '2026-04-03', 'Fitness', 'Vélo elliptique', '01:15:00', 2, 3),
(4, '2026-04-04', 'Yoga', 'Tapis yoga', '01:00:00', 2, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abonnement`
--
ALTER TABLE `abonnement`
  ADD PRIMARY KEY (`id_abonnement`),
  ADD KEY `id_adherent` (`id_adherent`);

--
-- Indexes for table `adhérent`
--
ALTER TABLE `adhérent`
  ADD PRIMARY KEY (`id_adherent`),
  ADD KEY `id_salle` (`id_salle`);

--
-- Indexes for table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`);

--
-- Indexes for table `séance`
--
ALTER TABLE `séance`
  ADD PRIMARY KEY (`id_seance`),
  ADD KEY `id_salle` (`id_salle`),
  ADD KEY `id_adherent` (`id_adherent`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abonnement`
--
ALTER TABLE `abonnement`
  ADD CONSTRAINT `abonnement_ibfk_1` FOREIGN KEY (`id_adherent`) REFERENCES `adhérent` (`id_adherent`);

--
-- Constraints for table `adhérent`
--
ALTER TABLE `adhérent`
  ADD CONSTRAINT `adhérent_ibfk_1` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`);

--
-- Constraints for table `séance`
--
ALTER TABLE `séance`
  ADD CONSTRAINT `séance_ibfk_1` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`),
  ADD CONSTRAINT `séance_ibfk_2` FOREIGN KEY (`id_adherent`) REFERENCES `adhérent` (`id_adherent`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
