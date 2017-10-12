-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2017 at 07:24 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

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
(3, 'Gris');

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
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE `facture` (
  `pk_facture` int(11) NOT NULL,
  `fk_entretien` int(11) NOT NULL,
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
  `nom_marque` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `marque`
--

INSERT INTO `marque` (`pk_marque`, `nom_marque`) VALUES
(1, 'Acura'),
(2, 'Audi'),
(3, 'BMW'),
(4, 'Buick'),
(5, 'Cadillac'),
(6, 'Chevrolet'),
(7, 'Chrysler'),
(8, 'Dodge'),
(9, 'FIAT'),
(10, 'Ford'),
(11, 'GMC'),
(12, 'Honda'),
(13, 'Hyundai'),
(14, 'Infiniti'),
(15, 'Jaguar'),
(16, 'Jeep'),
(17, 'Kia'),
(18, 'Lexus'),
(19, 'Lincoln'),
(20, 'Mazda'),
(21, 'Mercedes-Benz'),
(22, 'Mitsubishi'),
(23, 'Nissan'),
(24, 'Pontiac'),
(25, 'RAM'),
(26, 'Saab'),
(27, 'Saturn'),
(28, 'Scion'),
(29, 'Smart'),
(30, 'Subaru'),
(31, 'Suzuki'),
(32, 'Tesla'),
(33, 'Toyota'),
(34, 'Volkswagen'),
(35, 'Volvo');

-- --------------------------------------------------------

--
-- Table structure for table `modele`
--

CREATE TABLE `modele` (
  `pk_modele` int(11) NOT NULL,
  `fk_marque` int(11) NOT NULL,
  `nom_modele` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modele`
--

INSERT INTO `modele` (`pk_modele`, `fk_marque`, `nom_modele`) VALUES
(1, 10, 'F150'),
(2, 10, 'Ranger');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `pk_reservation` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `fk_vehicule` int(11) NOT NULL,
  `fk_utilisateur` int(11) NOT NULL,
  `statut` tinyint(4) NOT NULL COMMENT '0 = inactif, 1 = actif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`pk_reservation`, `date_debut`, `date_fin`, `fk_vehicule`, `fk_utilisateur`, `statut`) VALUES
(1, '2017-10-08', '2017-10-12', 2, 1, 1),
(2, '2017-10-12', '2017-10-14', 13, 1, 1),
(3, '2017-10-17', '2017-10-21', 2, 1, 1),
(4, '2017-10-19', '2017-10-21', 13, 1, 0);

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
  `nom_statut` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statut`
--

INSERT INTO `statut` (`pk_statut`, `nom_statut`) VALUES
(1, 'Administrateur'),
(2, 'Utilisateur'),
(3, 'Inactif');

-- --------------------------------------------------------

--
-- Table structure for table `statut_vehicule`
--

CREATE TABLE `statut_vehicule` (
  `pk_statut_vehicule` int(11) NOT NULL,
  `nom_statut` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statut_vehicule`
--

INSERT INTO `statut_vehicule` (`pk_statut_vehicule`, `nom_statut`) VALUES
(1, 'Actif'),
(2, 'Inactif'),
(3, 'Réparation'),
(4, 'Inspection');

-- --------------------------------------------------------

--
-- Table structure for table `type_entretien`
--

CREATE TABLE `type_entretien` (
  `pk_type_entretien` int(11) NOT NULL,
  `intervalle` int(11) NOT NULL,
  `nom` varchar(11) NOT NULL
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
  `plaque` varchar(50) NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `VIN` varchar(50) NOT NULL,
  `date_achat` date NOT NULL,
  `fk_statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicule`
--

INSERT INTO `vehicule` (`pk_vehicule`, `fk_marque`, `fk_modele`, `annee`, `fk_couleur`, `fk_secteur`, `odometre`, `plaque`, `photo`, `VIN`, `date_achat`, `fk_statut`) VALUES
(2, 10, 1, 2006, 1, 1, 185000, '5TH6YU', NULL, 'GYHUSFHUFHUIE', '2017-10-09', 1),
(13, 10, 2, 2007, 3, 1, 145000, 'J4H 4N5', NULL, 'SDDEFEF', '2017-08-01', 1);

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
  MODIFY `pk_couleur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `pk_marque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `modele`
--
ALTER TABLE `modele`
  MODIFY `pk_modele` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `pk_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `pk_vehicule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
