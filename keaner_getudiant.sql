-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: mysql-keaner.alwaysdata.net
-- Generation Time: Jun 24, 2020 at 02:48 AM
-- Server version: 10.4.12-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keaner_getudiant`
--

-- --------------------------------------------------------

--
-- Table structure for table `Batiment`
--

CREATE TABLE `Batiment` (
  `num_depart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `boursier`
--

CREATE TABLE `boursier` (
  `id` int(11) NOT NULL,
  `bourses` int(11) NOT NULL,
  `id_type_bourse` int(11) NOT NULL,
  `num_chambre` int(11) DEFAULT NULL,
  `matricule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chambre`
--

CREATE TABLE `chambre` (
  `num_chambre` int(11) NOT NULL,
  `num_depart` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `matricule` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` int(11) NOT NULL,
  `date_naiss` date NOT NULL,
  `id` int(11) NOT NULL,
  `id_non_boursier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `non_boursier`
--

CREATE TABLE `non_boursier` (
  `id` int(11) NOT NULL,
  `addresse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `type_bourse`
--

CREATE TABLE `type_bourse` (
  `id` int(11) NOT NULL,
  `type_bourse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `type_chambre`
--

CREATE TABLE `type_chambre` (
  `id` int(11) NOT NULL,
  `type_ch` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `type_etudiant`
--

CREATE TABLE `type_etudiant` (
  `id` int(11) NOT NULL,
  `type_ed` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Batiment`
--
ALTER TABLE `Batiment`
  ADD PRIMARY KEY (`num_depart`);

--
-- Indexes for table `boursier`
--
ALTER TABLE `boursier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricule` (`matricule`),
  ADD KEY `bourses` (`bourses`),
  ADD KEY `id_type_bourse` (`id_type_bourse`),
  ADD KEY `num_chambre` (`num_chambre`);

--
-- Indexes for table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`num_chambre`),
  ADD KEY `num_depart` (`num_depart`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`matricule`),
  ADD KEY `id` (`id`),
  ADD KEY `id_non_boursier` (`id_non_boursier`);

--
-- Indexes for table `non_boursier`
--
ALTER TABLE `non_boursier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_bourse`
--
ALTER TABLE `type_bourse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_chambre`
--
ALTER TABLE `type_chambre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_etudiant`
--
ALTER TABLE `type_etudiant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Batiment`
--
ALTER TABLE `Batiment`
  MODIFY `num_depart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `boursier`
--
ALTER TABLE `boursier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `num_chambre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `non_boursier`
--
ALTER TABLE `non_boursier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_bourse`
--
ALTER TABLE `type_bourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_chambre`
--
ALTER TABLE `type_chambre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_etudiant`
--
ALTER TABLE `type_etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `boursier`
--
ALTER TABLE `boursier`
  ADD CONSTRAINT `boursier_ibfk_1` FOREIGN KEY (`id_type_bourse`) REFERENCES `type_bourse` (`id`),
  ADD CONSTRAINT `boursier_ibfk_2` FOREIGN KEY (`num_chambre`) REFERENCES `chambre` (`num_chambre`),
  ADD CONSTRAINT `boursier_ibfk_3` FOREIGN KEY (`matricule`) REFERENCES `etudiant` (`matricule`);

--
-- Constraints for table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `chambre_ibfk_1` FOREIGN KEY (`num_depart`) REFERENCES `Batiment` (`num_depart`),
  ADD CONSTRAINT `chambre_ibfk_2` FOREIGN KEY (`id`) REFERENCES `type_chambre` (`id`);

--
-- Constraints for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`id`) REFERENCES `type_etudiant` (`id`),
  ADD CONSTRAINT `etudiant_ibfk_2` FOREIGN KEY (`id_non_boursier`) REFERENCES `non_boursier` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
