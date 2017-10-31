-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2017 at 11:44 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avizobd`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresse`
--

CREATE TABLE `adresse` (
  `pk_adresse` int(11) NOT NULL,
  `no_civique` int(11) NOT NULL,
  `nom_rue` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `alerte`
--

CREATE TABLE `alerte` (
  `pk_alerte` int(11) NOT NULL,
  `fk_reservation` int(11) NOT NULL,
  `fk_type_entretien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `couleur`
--

CREATE TABLE `couleur` (
  `pk_couleur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `couleur`
--

INSERT INTO `couleur` (`pk_couleur`, `nom`) VALUES
(1, 'Blanc'),
(2, 'Noir'),
(3, 'Gris'),
(4, 'Vert'),
(5, 'Rouge'),
(6, 'Bleu');

-- --------------------------------------------------------

--
-- Table structure for table `entretien`
--

CREATE TABLE `entretien` (
  `pk_entretien` int(11) NOT NULL,
  `date_entretien` date NOT NULL,
  `odometre_entretien` bigint(20) NOT NULL,
  `fk_garage` int(11) NOT NULL,
  `fk_vehicule` int(11) NOT NULL,
  `fk_type_entretien` int(11) NOT NULL,
  `cout_entretien` bigint(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE `facture` (
  `pk_facture` int(11) NOT NULL,
  `fk_entretien` int(11) NOT NULL,
  `montant_entretien` float DEFAULT NULL,
  `photo` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `garage`
--

CREATE TABLE `garage` (
  `pk_garage` int(11) NOT NULL,
  `nom` varchar(11) NOT NULL,
  `fk_adresse` int(11) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `fk_statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marque`
--

CREATE TABLE `marque` (
  `pk_marque` int(11) NOT NULL,
  `nom_marque` varchar(100) NOT NULL,
  `description_marque` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `marque`
--

INSERT INTO `marque` (`pk_marque`, `nom_marque`, `description_marque`) VALUES
(1, 'Acura', NULL),
(2, 'Audi', NULL),
(3, 'BMW', NULL),
(4, 'Buick', NULL),
(5, 'Cadillac', NULL),
(6, 'Chevrolet', NULL),
(7, 'Chrysler', NULL),
(8, 'Dodge', NULL),
(9, 'FIAT', NULL),
(10, 'Ford', NULL),
(11, 'GMC', NULL),
(12, 'Honda', NULL),
(13, 'Hyundai', NULL),
(14, 'Infiniti', NULL),
(15, 'Jaguar', NULL),
(16, 'Jeep', NULL),
(17, 'Kia', NULL),
(18, 'Lexus', NULL),
(19, 'Lincoln', NULL),
(20, 'Mazda', NULL),
(21, 'Mercedes-Benz', NULL),
(22, 'Mitsubishi', NULL),
(23, 'Nissan', NULL),
(24, 'Pontiac', NULL),
(25, 'RAM', NULL),
(26, 'Saab', NULL),
(27, 'Saturn', NULL),
(28, 'Scion', NULL),
(29, 'Smart', NULL),
(30, 'Subaru', NULL),
(31, 'Suzuki', NULL),
(32, 'Tesla', NULL),
(33, 'Toyota', NULL),
(34, 'Volkswagen', NULL),
(35, 'Volvo', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `modele`
--

CREATE TABLE `modele` (
  `pk_modele` int(11) NOT NULL,
  `fk_marque` int(11) NOT NULL,
  `nom_modele` varchar(100) NOT NULL,
  `description_modele` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modele`
--

INSERT INTO `modele` (`pk_modele`, `fk_marque`, `nom_modele`, `description_modele`) VALUES
(1, 10, 'F150', NULL),
(2, 10, 'Ranger', NULL),
(3, 11, 'Savana 2500', NULL),
(4, 11, 'Savana', NULL),
(5, 24, 'Vibe', NULL),
(6, 30, 'Outback', NULL),
(7, 6, 'S10', NULL),
(8, 6, 'Silverado 1500', NULL),
(9, 33, 'Yaris', NULL),
(10, 30, 'Forester', NULL),
(11, 33, 'Tacoma', NULL),
(12, 11, 'Sierra', NULL),
(13, 23, 'Pathfinder', NULL),
(14, 21, 'Sprinter', NULL),
(15, 10, 'Explorer', NULL),
(16, 30, 'Impreza', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `pk_reservation` int(11) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `date_emise` date NOT NULL,
  `fk_vehicule` int(11) NOT NULL,
  `fk_utilisateur` int(11) NOT NULL,
  `statut` tinyint(4) NOT NULL COMMENT '0 = inactif, 1 = actif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`pk_reservation`, `date_debut`, `date_fin`, `date_emise`, `fk_vehicule`, `fk_utilisateur`, `statut`) VALUES
(1, '2017-10-08 00:00:00', '2017-10-12 00:00:00', '2017-10-07', 2, 1, 1),
(2, '2017-10-12 00:00:00', '2017-10-14 00:00:00', '2017-10-11', 13, 1, 1),
(3, '2017-10-17 00:00:00', '2017-10-21 00:00:00', '2017-10-15', 2, 1, 1),
(4, '2017-10-19 00:00:00', '2017-10-21 00:00:00', '2017-10-18', 13, 1, 0),
(5, '2017-10-26 00:00:00', '2017-10-31 00:00:00', '2017-10-27', 13, 1, 1),
(6, '2017-11-08 00:00:00', '2017-11-15 00:00:00', '2017-10-26', 2, 1, 1),
(7, '2017-10-29 00:00:00', '2017-10-29 00:00:00', '2017-10-28', 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `secteur`
--

CREATE TABLE `secteur` (
  `pk_secteur` int(11) NOT NULL,
  `nom_secteur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secteur`
--

INSERT INTO `secteur` (`pk_secteur`, `nom_secteur`) VALUES
(1, 'Assainissement'),
(2, 'Environnement'),
(3, 'Génie municipal'),
(4, 'Qualité des eaux'),
(5, 'Milieux naturels'),
(6, 'Ventes'),
(7, 'Administration'),
(8, 'Dessins');

-- --------------------------------------------------------

--
-- Table structure for table `statut`
--

CREATE TABLE `statut` (
  `pk_statut` int(11) NOT NULL,
  `nom_statut` varchar(50) NOT NULL,
  `description_statut` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statut`
--

INSERT INTO `statut` (`pk_statut`, `nom_statut`, `description_statut`) VALUES
(1, 'Administrateur', NULL),
(2, 'Utilisateur', NULL),
(3, 'Inactif', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statut_vehicule`
--

CREATE TABLE `statut_vehicule` (
  `pk_statut_vehicule` int(11) NOT NULL,
  `nom_statut` varchar(50) NOT NULL,
  `description_statut_vehicule` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statut_vehicule`
--

INSERT INTO `statut_vehicule` (`pk_statut_vehicule`, `nom_statut`, `description_statut_vehicule`) VALUES
(1, 'Actif', NULL),
(2, 'Inactif', NULL),
(3, 'Réparation', NULL),
(4, 'Inspection', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type_entretien`
--

CREATE TABLE `type_entretien` (
  `pk_type_entretien` int(11) NOT NULL,
  `intervalle` int(11) NOT NULL,
  `nom` varchar(11) NOT NULL,
  `description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `pk_utilisateur` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `courriel` varchar(150) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `fk_statut` int(11) NOT NULL,
  `fk_secteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`pk_utilisateur`, `nom`, `prenom`, `telephone`, `courriel`, `mot_de_passe`, `fk_statut`, `fk_secteur`) VALUES
(1, 'Bédard', 'Alain', '819 574-1994', 'alain.bedard@avizo.ca', 'avizo', 2, 1),
(2, 'Bolduc', 'Michel', '819 571-8946', 'michel.bolduc@avizo.ca', 'avizo', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicule`
--

CREATE TABLE `vehicule` (
  `pk_vehicule` int(11) NOT NULL,
  `fk_marque` int(11) NOT NULL,
  `fk_modele` int(11) NOT NULL,
  `annee` bigint(20) NOT NULL,
  `fk_couleur` int(11) NOT NULL,
  `fk_secteur` int(11) NOT NULL,
  `odometre` bigint(20) NOT NULL,
  `plaque` varchar(50) DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `date_achat` date NOT NULL,
  `date_mise_hors_service` date DEFAULT NULL,
  `description_hors_service` varchar(250) DEFAULT NULL,
  `fk_statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicule`
--

INSERT INTO `vehicule` (`pk_vehicule`, `fk_marque`, `fk_modele`, `annee`, `fk_couleur`, `fk_secteur`, `odometre`, `plaque`, `photo`, `date_achat`, `date_mise_hors_service`, `description_hors_service`, `fk_statut`) VALUES
(2, 10, 1, 2006, 1, 1, 163214, 'FHZ2396', NULL, '2017-10-09', NULL, NULL, 1),
(6, 11, 3, 2004, 2, 2, 351685, 'FHZ2353', NULL, '2017-10-01', NULL, NULL, 1),
(7, 11, 4, 2004, 2, 2, 400495, 'FHZ2352', NULL, '2015-12-17', NULL, NULL, 1),
(8, 11, 4, 2004, 2, 2, 353731, 'FBY2469', NULL, '2015-12-17', NULL, NULL, 1),
(9, 10, 2, 2009, 2, 2, 156685, 'FFX9121', NULL, '2015-12-17', NULL, NULL, 1),
(10, 10, 2, 2011, 1, 2, 105784, 'FHZ2424', NULL, '2017-07-04', NULL, NULL, 1),
(11, 10, 2, 2010, 1, 2, 232825, 'FHZ2358', NULL, '2015-12-01', NULL, NULL, 1),
(12, 11, 4, 2008, 2, 1, 380007, 'FHZ2362', NULL, '2016-01-01', NULL, NULL, 1),
(13, 10, 2, 2007, 3, 1, 260386, 'FDD7842', NULL, '2017-08-01', NULL, NULL, 1),
(14, 24, 5, 2009, 3, 1, 266644, 'FFW7902', NULL, '2015-04-01', NULL, NULL, 1),
(15, 11, 4, 2009, 1, 1, 344750, 'FHZ2360', NULL, '2015-01-01', NULL, NULL, 1),
(16, 24, 5, 2010, 2, 1, 240011, 'FHZ2359', NULL, '2016-01-01', NULL, NULL, 1),
(17, 30, 6, 2010, 3, 1, 173435, 'FHZ2364', NULL, '2015-01-01', NULL, NULL, 1),
(22, 11, 4, 2014, 2, 1, 153624, 'FHY4535', NULL, '2016-01-01', NULL, NULL, 1),
(23, 6, 7, 2003, 1, 1, 156200, 'FHZ2373', NULL, '2015-01-01', NULL, NULL, 1),
(24, 30, 6, 2013, 4, 1, 51692, NULL, NULL, '2015-01-01', NULL, NULL, 1),
(25, 6, 8, 2009, 1, 1, 150854, 'FHF7513', NULL, '2015-01-01', NULL, NULL, 1),
(26, 33, 9, 2010, 1, 1, 147153, 'FHZ2357', NULL, '2016-01-01', NULL, NULL, 1),
(29, 30, 10, 2011, 3, 1, 197333, 'FHZ2395', NULL, '2015-01-01', NULL, NULL, 1),
(32, 11, 4, 2014, 1, 1, 146072, 'FK29497', NULL, '2015-01-01', NULL, NULL, 1),
(33, 33, 11, 2015, 2, 1, 114550, NULL, NULL, '2015-01-01', NULL, NULL, 1),
(34, 11, 12, 2015, 5, 1, 114502, NULL, NULL, '2015-12-17', NULL, NULL, 1),
(35, 10, 1, 2015, 1, 1, 49166, 'FMC2483', NULL, '2015-12-17', NULL, NULL, 1),
(36, 23, 13, 2016, 6, 1, 44105, 'FEE3649', NULL, '2016-01-08', NULL, NULL, 1),
(37, 21, 14, 2015, 1, 1, 59002, NULL, NULL, '2016-02-29', NULL, NULL, 1),
(38, 10, 15, 2016, 2, 1, 29757, 'FJT1280', NULL, '2016-06-28', NULL, NULL, 1),
(39, 30, 6, 2016, 3, 1, 29818, 'FRE5680', NULL, '2016-01-01', NULL, NULL, 1),
(42, 21, 14, 2016, 1, 1, 4669, 'FJZ2179', NULL, '2017-01-01', NULL, NULL, 1),
(43, 24, 5, 2010, 5, 1, 232806, 'FHZ2359', NULL, '2016-01-01', NULL, NULL, 1),
(44, 30, 16, 2017, 1, 1, 21408, 'FKE5629', NULL, '2017-02-22', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`pk_adresse`);

--
-- Indexes for table `alerte`
--
ALTER TABLE `alerte`
  ADD PRIMARY KEY (`pk_alerte`),
  ADD KEY `fk_reservation` (`fk_reservation`),
  ADD KEY `fk_type_entretien` (`fk_type_entretien`);

--
-- Indexes for table `couleur`
--
ALTER TABLE `couleur`
  ADD PRIMARY KEY (`pk_couleur`);

--
-- Indexes for table `entretien`
--
ALTER TABLE `entretien`
  ADD PRIMARY KEY (`pk_entretien`),
  ADD KEY `fk_garage` (`fk_garage`),
  ADD KEY `fk_vehicule` (`fk_vehicule`),
  ADD KEY `fk_type_entretien` (`fk_type_entretien`);

--
-- Indexes for table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`pk_facture`),
  ADD KEY `fk_entretien` (`fk_entretien`);

--
-- Indexes for table `garage`
--
ALTER TABLE `garage`
  ADD PRIMARY KEY (`pk_garage`),
  ADD KEY `fk_adresse` (`fk_adresse`),
  ADD KEY `fk_statut` (`fk_statut`);

--
-- Indexes for table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`pk_marque`);

--
-- Indexes for table `modele`
--
ALTER TABLE `modele`
  ADD PRIMARY KEY (`pk_modele`),
  ADD KEY `fk_marque` (`fk_marque`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`pk_reservation`),
  ADD KEY `fk_utilisateur` (`fk_utilisateur`),
  ADD KEY `fk_vehicule` (`fk_vehicule`);

--
-- Indexes for table `secteur`
--
ALTER TABLE `secteur`
  ADD PRIMARY KEY (`pk_secteur`);

--
-- Indexes for table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`pk_statut`);

--
-- Indexes for table `statut_vehicule`
--
ALTER TABLE `statut_vehicule`
  ADD PRIMARY KEY (`pk_statut_vehicule`);

--
-- Indexes for table `type_entretien`
--
ALTER TABLE `type_entretien`
  ADD PRIMARY KEY (`pk_type_entretien`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`pk_utilisateur`),
  ADD KEY `fk_secteur` (`fk_secteur`),
  ADD KEY `fk_statut` (`fk_statut`);

--
-- Indexes for table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`pk_vehicule`),
  ADD KEY `fk_marque` (`fk_marque`,`fk_modele`,`fk_secteur`,`fk_statut`),
  ADD KEY `fk_modele` (`fk_modele`),
  ADD KEY `fk_statut` (`fk_statut`),
  ADD KEY `fk_secteur` (`fk_secteur`),
  ADD KEY `fk_couleur` (`fk_couleur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `pk_adresse` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `alerte`
--
ALTER TABLE `alerte`
  MODIFY `pk_alerte` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `couleur`
--
ALTER TABLE `couleur`
  MODIFY `pk_couleur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `entretien`
--
ALTER TABLE `entretien`
  MODIFY `pk_entretien` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `facture`
--
ALTER TABLE `facture`
  MODIFY `pk_facture` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `garage`
--
ALTER TABLE `garage`
  MODIFY `pk_garage` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `marque`
--
ALTER TABLE `marque`
  MODIFY `pk_marque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `modele`
--
ALTER TABLE `modele`
  MODIFY `pk_modele` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `pk_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `secteur`
--
ALTER TABLE `secteur`
  MODIFY `pk_secteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `statut`
--
ALTER TABLE `statut`
  MODIFY `pk_statut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `statut_vehicule`
--
ALTER TABLE `statut_vehicule`
  MODIFY `pk_statut_vehicule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `type_entretien`
--
ALTER TABLE `type_entretien`
  MODIFY `pk_type_entretien` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `pk_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `pk_vehicule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `alerte`
--
ALTER TABLE `alerte`
  ADD CONSTRAINT `alerte_ibfk_1` FOREIGN KEY (`fk_reservation`) REFERENCES `reservation` (`pk_reservation`),
  ADD CONSTRAINT `alerte_ibfk_2` FOREIGN KEY (`fk_type_entretien`) REFERENCES `type_entretien` (`pk_type_entretien`);

--
-- Constraints for table `entretien`
--
ALTER TABLE `entretien`
  ADD CONSTRAINT `entretien_ibfk_1` FOREIGN KEY (`fk_vehicule`) REFERENCES `vehicule` (`pk_vehicule`),
  ADD CONSTRAINT `entretien_ibfk_2` FOREIGN KEY (`fk_type_entretien`) REFERENCES `type_entretien` (`pk_type_entretien`),
  ADD CONSTRAINT `entretien_ibfk_3` FOREIGN KEY (`fk_garage`) REFERENCES `garage` (`pk_garage`);

--
-- Constraints for table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`fk_entretien`) REFERENCES `entretien` (`pk_entretien`);

--
-- Constraints for table `garage`
--
ALTER TABLE `garage`
  ADD CONSTRAINT `garage_ibfk_1` FOREIGN KEY (`fk_adresse`) REFERENCES `adresse` (`pk_adresse`),
  ADD CONSTRAINT `garage_ibfk_2` FOREIGN KEY (`fk_statut`) REFERENCES `statut` (`pk_statut`);

--
-- Constraints for table `modele`
--
ALTER TABLE `modele`
  ADD CONSTRAINT `modele_ibfk_1` FOREIGN KEY (`fk_marque`) REFERENCES `marque` (`pk_marque`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`fk_utilisateur`) REFERENCES `utilisateur` (`pk_utilisateur`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`fk_vehicule`) REFERENCES `vehicule` (`pk_vehicule`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`fk_statut`) REFERENCES `statut` (`pk_statut`),
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`fk_secteur`) REFERENCES `secteur` (`pk_secteur`);

--
-- Constraints for table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `vehicule_ibfk_1` FOREIGN KEY (`fk_marque`) REFERENCES `marque` (`pk_marque`),
  ADD CONSTRAINT `vehicule_ibfk_2` FOREIGN KEY (`fk_modele`) REFERENCES `modele` (`pk_modele`),
  ADD CONSTRAINT `vehicule_ibfk_4` FOREIGN KEY (`fk_secteur`) REFERENCES `secteur` (`pk_secteur`),
  ADD CONSTRAINT `vehicule_ibfk_5` FOREIGN KEY (`fk_statut`) REFERENCES `statut_vehicule` (`pk_statut_vehicule`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehicule_ibfk_6` FOREIGN KEY (`fk_couleur`) REFERENCES `couleur` (`pk_couleur`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
