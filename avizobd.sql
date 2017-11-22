-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2017 at 02:02 PM
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
  `nom_couleur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `couleur`
--

INSERT INTO `couleur` (`pk_couleur`, `nom_couleur`) VALUES
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

--
-- Dumping data for table `entretien`
--

INSERT INTO `entretien` (`pk_entretien`, `date_entretien`, `odometre_entretien`, `fk_garage`, `fk_vehicule`, `fk_type_entretien`, `cout_entretien`, `description`) VALUES
(1, '2017-11-10', 153214, 1, 2, 1, 60, ''),
(2, '2017-11-10', 163214, 1, 2, 2, 500, ''),
(3, '2017-11-10', 351685, 1, 6, 2, 500, ''),
(4, '2017-11-10', 340495, 1, 7, 2, 500, ''),
(5, '2017-11-10', 353731, 1, 8, 2, 500, ''),
(6, '2017-11-10', 156685, 1, 9, 2, 500, ''),
(7, '2017-11-10', 105784, 1, 10, 2, 500, ''),
(8, '2017-11-10', 232825, 1, 11, 2, 500, ''),
(9, '2017-11-10', 380007, 1, 12, 2, 500, ''),
(10, '2017-11-10', 260386, 1, 13, 2, 500, ''),
(11, '2017-11-10', 266644, 1, 14, 2, 500, ''),
(12, '2017-11-10', 344750, 1, 15, 2, 500, ''),
(13, '2017-11-10', 240011, 1, 16, 2, 500, ''),
(14, '2017-11-10', 173435, 1, 17, 2, 500, ''),
(15, '2017-11-10', 153624, 1, 22, 2, 500, ''),
(16, '2017-11-10', 156200, 1, 23, 2, 500, ''),
(17, '2017-11-10', 51692, 1, 24, 2, 500, ''),
(18, '2017-11-10', 150854, 1, 25, 2, 500, ''),
(19, '2017-11-10', 147153, 1, 26, 2, 500, ''),
(20, '2017-11-10', 197333, 1, 29, 2, 500, ''),
(21, '2017-11-10', 146072, 1, 32, 2, 500, ''),
(22, '2017-11-10', 114550, 1, 33, 2, 500, ''),
(23, '2017-11-10', 114502, 1, 34, 2, 500, ''),
(24, '2017-11-10', 49166, 1, 35, 2, 500, ''),
(25, '2017-11-10', 44105, 1, 36, 2, 500, ''),
(26, '2017-11-10', 59002, 1, 37, 2, 500, ''),
(27, '2017-11-10', 260386, 1, 13, 1, 500, ''),
(28, '2017-11-10', 266644, 1, 14, 1, 500, ''),
(29, '2017-11-10', 344750, 1, 15, 1, 500, ''),
(30, '2017-11-10', 240011, 1, 16, 1, 500, ''),
(31, '2017-11-10', 173435, 1, 17, 1, 500, ''),
(32, '2017-11-10', 153624, 1, 22, 1, 500, ''),
(33, '2017-11-10', 156200, 1, 23, 1, 500, ''),
(34, '2017-11-10', 51692, 1, 24, 1, 500, ''),
(35, '2017-11-10', 150854, 1, 25, 1, 500, ''),
(36, '2017-11-10', 147153, 1, 26, 1, 500, ''),
(37, '2017-11-10', 197333, 1, 29, 1, 500, ''),
(38, '2017-11-10', 146072, 1, 32, 1, 500, ''),
(39, '2017-11-10', 114550, 1, 33, 1, 500, ''),
(40, '2017-11-10', 114502, 1, 34, 1, 500, ''),
(41, '2017-11-10', 49166, 1, 35, 1, 500, ''),
(42, '2017-11-10', 44105, 1, 36, 1, 500, ''),
(43, '2017-11-10', 59002, 1, 37, 1, 500, ''),
(44, '2017-11-10', 260386, 1, 13, 5, 500, ''),
(45, '2017-11-10', 266644, 1, 14, 5, 500, ''),
(46, '2017-11-10', 344750, 1, 15, 5, 500, ''),
(47, '2017-11-10', 240011, 1, 16, 5, 500, ''),
(48, '2017-11-10', 173435, 1, 17, 5, 500, ''),
(49, '2017-11-10', 153624, 1, 22, 5, 500, ''),
(50, '2017-11-10', 156200, 1, 23, 5, 500, ''),
(51, '2017-11-10', 51692, 1, 24, 5, 500, ''),
(52, '2017-11-10', 150854, 1, 25, 5, 500, ''),
(53, '2017-11-10', 147153, 1, 26, 5, 500, ''),
(54, '2017-11-10', 197333, 1, 29, 5, 500, ''),
(55, '2017-11-10', 146072, 1, 32, 5, 500, ''),
(56, '2017-11-10', 114550, 1, 33, 5, 500, ''),
(57, '2017-11-10', 114502, 1, 34, 5, 500, ''),
(58, '2017-11-10', 49166, 1, 35, 5, 500, ''),
(59, '2017-11-10', 44105, 1, 36, 5, 500, ''),
(60, '2017-11-10', 59002, 1, 37, 5, 500, ''),
(61, '2017-11-10', 163214, 1, 2, 5, 500, ''),
(62, '2017-11-10', 351685, 1, 6, 5, 500, ''),
(63, '2017-11-10', 400495, 1, 7, 5, 500, ''),
(64, '2017-11-10', 353731, 1, 8, 5, 500, ''),
(65, '2017-11-10', 156685, 1, 9, 5, 500, ''),
(66, '2017-11-10', 105784, 1, 10, 5, 500, ''),
(67, '2017-11-10', 232825, 1, 11, 5, 500, ''),
(68, '2017-11-10', 380007, 1, 12, 5, 500, ''),
(69, '2017-11-10', 351685, 1, 6, 1, 500, ''),
(70, '2017-11-10', 400495, 1, 7, 1, 500, ''),
(71, '2017-11-10', 353731, 1, 8, 1, 500, ''),
(72, '2017-11-10', 156685, 1, 9, 1, 500, ''),
(73, '2017-11-10', 105784, 1, 10, 1, 500, ''),
(74, '2017-11-10', 232825, 1, 11, 1, 500, ''),
(75, '2017-11-10', 380007, 1, 12, 1, 500, '');

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE `facture` (
  `pk_facture` int(11) NOT NULL,
  `fk_entretien` int(11) NOT NULL,
  `montant_entretien` float DEFAULT NULL,
  `photo` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facture`
--

INSERT INTO `facture` (`pk_facture`, `fk_entretien`, `montant_entretien`, `photo`) VALUES
(2, 1, 50, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `garage`
--

CREATE TABLE `garage` (
  `pk_garage` int(11) NOT NULL,
  `nom` varchar(75) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `fk_statut_garage` int(11) NOT NULL,
  `Description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `garage`
--

INSERT INTO `garage` (`pk_garage`, `nom`, `telephone`, `fk_statut_garage`, `Description`) VALUES
(1, 'Relais Pneus & Mécanique', 8195667722, 1, '4255 Boul Bourque, Sherbrooke, QC J1N 1S4, Sherbrooke');

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
(7, '2017-10-29 00:00:00', '2017-10-29 00:00:00', '2017-10-28', 2, 2, 1),
(8, '2017-11-03 12:00:00', '2017-11-23 12:00:00', '2017-11-02', 12, 1, 1);

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
(1, 'AEU'),
(2, 'ENV'),
(3, 'GMDU'),
(4, 'MSQE'),
(5, 'AXIO'),
(6, 'VDS'),
(7, 'FA'),
(8, 'SD');

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
-- Table structure for table `statut_garage`
--

CREATE TABLE `statut_garage` (
  `pk_statut_garage` int(11) NOT NULL,
  `nom_statut` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statut_garage`
--

INSERT INTO `statut_garage` (`pk_statut_garage`, `nom_statut`) VALUES
(1, 'approuve'),
(2, 'non-approuve');

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
-- Table structure for table `ta_entretien_facture`
--

CREATE TABLE `ta_entretien_facture` (
  `pk_ta_entretien_facture` int(11) NOT NULL,
  `fk_facture` int(11) NOT NULL,
  `fk_entretien` int(11) NOT NULL,
  `lien_photo_entretien_facture` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_entretien_facture`
--

INSERT INTO `ta_entretien_facture` (`pk_ta_entretien_facture`, `fk_facture`, `fk_entretien`, `lien_photo_entretien_facture`) VALUES
(1, 2, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `type_entretien`
--

CREATE TABLE `type_entretien` (
  `pk_type_entretien` int(11) NOT NULL,
  `intervalle` int(11) DEFAULT NULL,
  `nom` varchar(45) NOT NULL,
  `description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_entretien`
--

INSERT INTO `type_entretien` (`pk_type_entretien`, `intervalle`, `nom`, `description`) VALUES
(1, 7000, 'Changement d\'huile', 'Changement d\'huile moteur'),
(2, 50000, 'Changement freins', 'Changement freins'),
(3, NULL, 'Accident', 'Réparation suite à un accident'),
(4, NULL, 'Changement pneux', 'Changement de pneux'),
(5, 75000, 'Entretien regulier', 'Vérification des fluides et inspection'),
(6, NULL, 'Reparations', 'Réparation causée par l\'usure normal');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `pk_utilisateur` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `telephone` varchar(12) DEFAULT NULL,
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
(2, 'Bolduc', 'Michel', '819 571-8946', 'michel.bolduc@avizo.ca', 'avizo', 1, 1),
(3, 'Harrer', 'Alan', '450 204-1519', 'alan.harrer@avizo.ca', 'avizo', 2, 3),
(4, 'Mayrand', 'Alexandre', '514 220-7216', 'alexandre.mayrand@avizo.ca', 'avizo', 2, 4),
(5, 'Paiement', 'Amélie', NULL, 'amelie.paiement@avizo.ca', 'avizo', 2, 5),
(6, 'Duquette', 'André', NULL, 'andre.duquette@avizo.ca', 'avizo', 2, 7),
(7, 'Forret', 'Andrew', NULL, 'andrew.forret@avizo.ca', 'avizo', 2, 3),
(8, 'Morais', 'Anne', '418 425-0847', 'anne.morais@avizo.ca', 'avizo', 2, 1),
(9, 'Trudeau', 'Antoine', '819 342-0612', 'antoine.trudeau@avizo.ca', 'avizo', 2, 4),
(10, 'Hourlay', 'Axel', NULL, 'axel.hourlay@avizo.ca', 'avizo', 2, 1),
(11, 'Couture', 'Benoit', '819 432-6236', 'benoit.couture@axioenvironnement.ca', 'avizo', 2, 5),
(12, 'Boucher', 'Brigitte', NULL, 'brigitte.boucher@avizo.ca', 'avizo', 2, 7),
(13, 'Perreault', 'Carolane', NULL, 'carolane.perreault@avizo.ca', 'avizo', 2, 4),
(14, 'Gendron', 'Caroline', NULL, 'caroline.gendron@avizo.ca', 'avizo', 2, 1),
(15, 'Lussier', 'Catherine', '819 575-7796', 'catherine.lussier@avizo.ca', 'avizo', 2, 1),
(16, 'Duguay', 'Charles', '819 571-8324', 'charles.duguay@avizo.ca', 'avizo', 2, 7),
(17, 'Vézina', 'Christian', '418 571-3412', 'christian.vezina@avizo.ca', 'avizo', 2, 6),
(18, 'Viau', 'Christian', '450 541-3055', 'christian.viau@avizo.ca', 'avizo', 2, 4),
(19, 'Audit', 'Claudia', NULL, 'claudia.audit@avizo.ca', 'avizo', 2, 1),
(20, 'Pinsonneault', 'Daniel', '819 446-5525', 'daniel.pinsonneault@avizo.ca', 'avizo', 2, 3),
(21, 'Ducharme', 'Danny', '514 318-2488', 'danny.ducharme@avizo.ca', 'avizo', 2, 4),
(22, 'Rosenfeld', 'David', '819 640-1874', 'david.rosenfeld@avizo.ca', 'avizo', 2, 4),
(23, 'Massée', 'Dorothée', NULL, 'dorothee.massee@avizo.ca', 'avizo', 2, 6),
(24, 'Rouleau', 'Étienne', NULL, 'etienne.rouleau@avizo.ca', 'avizo', 2, 7),
(25, 'Morin', 'Flore', NULL, 'flore.morin@avizo.ca', 'avizo', 2, 7),
(26, 'Asfar', 'Francesca', '450 775-6141', 'francesca.asfar@avizo.ca', 'avizo', 2, 3),
(27, 'Girard', 'Gabrielle', NULL, 'gabrielle.girard@avizo.ca', 'avizo', 2, 7),
(28, 'Jetté', 'Gaétan', NULL, 'gaetan.jette@avizo.ca', 'avizo', 2, 4),
(29, 'Lachance', 'Gaston', '579 488-1194', 'gaston.lachance@avizo.ca', 'avizo', 2, 3),
(30, 'Girard', 'Geneviève', '819 571-8453', 'genevieve.girard@avizo.ca', 'avizo', 2, 1),
(31, 'Roger', 'Geneviève', '819 817-5664', 'genevieve.roger@avizo.ca', 'avizo', 2, 3),
(32, 'Thibault', 'Germain', '819 574-7563', 'germain.thibault@avizo.ca', 'avizo', 2, 6),
(33, 'St-Hilaire', 'Guy', NULL, 'guy.st-hilaire@avizo.ca', 'avizo', 2, 7),
(34, 'Lefebvre', 'Hugo', '819 212-3120', 'hugo.lefebvre@avizo.ca', 'avizo', 2, 4),
(35, 'Lemay', 'Hugo', '514 608-3343', 'hugo.lemay@avizo.ca', 'avizo', 2, 4),
(36, 'Parent', 'Isabelle', '418 802-2944', 'isabelle.parent@avizo.ca', 'avizo', 2, 1),
(37, 'Labrecque', 'Jacinthe', NULL, 'jacinthe.labrecque@avizo.ca', 'avizo', 2, 7),
(38, 'Lacasse', 'Jean-Christophe', NULL, 'jean-christophe.lacasse@avizo.ca', 'avizo', 2, 1),
(39, 'Lacroix', 'Jean-Félix', NULL, 'jean-felix.lacroix@axioenvironnement.ca', 'avizo', 2, 5),
(40, 'Lafond', 'Jean-François', '819 588-1367', 'jean-francois.lafond@axioenvironnement.ca', 'avizo', 2, 5),
(41, 'Bédard', 'Jean-Simon', '819 342-3390', 'jean-simon.bedard@axioenvironnement.ca', 'avizo', 2, 5),
(42, 'Dompierre', 'Jonathan', '819 570-2930', 'jonathan.dompierre@avizo.ca', 'avizo', 2, 1),
(43, 'Morin', 'Jonathan', NULL, 'jonathan.morin@avizo.ca', 'avizo', 2, 3),
(44, 'Avard', 'Karine', NULL, 'karine.avard@avizo.ca', 'avizo', 2, 2),
(45, 'Paulin', 'Karl', '819 342-6599', 'karl.paulin@avizo.ca', 'avizo', 2, 4),
(46, 'Richard', 'Kevin', NULL, 'kevin.richard@avizo.ca', 'avizo', 2, 2),
(47, 'Ghorbel', 'Leila', '418 425-0847', 'leila.ghorbel@avizo.ca', 'avizo', 2, 1),
(48, 'de Serres', 'Lucie', NULL, 'lucie.deserres@axioenvironnement.ca', 'avizo', 2, 5),
(49, 'Colmenares', 'Manuel', NULL, 'manuel.colmenares@avizo.ca', 'avizo', 2, 7),
(50, 'Desmarais', 'Marc', '819 640-6865', 'marc.desmarais@axioenvironnement.ca', 'avizo', 2, 5),
(51, 'Harbec', 'Marc-Antoine', '819 342-3895', 'marc-antoine.harbec@avizo.ca', 'avizo', 2, 3),
(52, 'Binet', 'Marco', '819 640-6935', 'marco.binet@axioenvironnement.ca', 'avizo', 2, 5),
(53, 'Désalliers', 'Marjorie', NULL, 'marjorie.desalliers@avizo.ca', 'avizo', 2, 6),
(54, 'Deshaies', 'Martin', '819 342-4386', 'martin.deshaies@avizo.ca', 'avizo', 2, 4),
(55, 'Leduc', 'Mathieu', '819 620-5405', 'mathieu.leduc@avizo.ca', 'avizo', 2, 3),
(56, 'Chalifoux', 'Maxime', '819 816-6596', 'maxime.chalifoux@avizo.ca', 'avizo', 2, 7),
(57, 'Godue', 'Michel', '819 571-8946', 'michel.godue@avizo.ca', 'avizo', 2, 4),
(59, 'Amirault', 'Nicolas', NULL, 'nicolas.amirault@avizo.ca', 'avizo', 2, 8),
(60, 'Paquet', 'Nicolas', NULL, 'nicolas.paquet@avizo.ca', 'avizo', 2, 8),
(61, 'Chabrol', 'Olivier', '819 570-5337', 'olivier.chabrol@avizo.ca', 'avizo', 2, 4),
(62, 'Gravel', 'Paskal', '819 640-0672', 'paskal.gravel@avizo.ca', 'avizo', 2, 4),
(63, 'Drouin', 'Philippe', '819 342-5316', 'philippe.drouin@avizo.ca', 'avizo', 2, 1),
(64, 'Rouleau', 'Pierre', '819 574-7562', 'pierre.rouleau@avizo.ca', 'avizo', 2, 4),
(65, 'Poulin', 'Russell', NULL, 'russell.poulin@avizo.ca', 'avizo', 2, 4),
(66, 'Dostie', 'Sandra', NULL, 'sandra.dostie@avizo.ca', 'avizo', 2, 1),
(67, 'de Léséleuc', 'Sébastien', '819 574-7561', 'sebastien.deleseleuc@avizo.ca', 'avizo', 2, 4),
(68, 'Doiron', 'Sébastien', NULL, 'sebastien.doiron@avizo.ca', 'avizo', 2, 8),
(69, 'Croteau', 'Sylvain', '819 574-7361', 'sylvain.croteau@avizo.ca', 'avizo', 2, 4),
(70, 'Petit', 'Sylvie', NULL, 'sylvie.petit@avizo.ca', 'avizo', 2, 8),
(71, 'Duguay', 'Victor', '819 588-6412', 'victor.duguay@avizo.ca', 'avizo', 2, 4),
(72, 'Lafontaine', 'Yannick', '819 640-6934', 'yannick.lafontaine@axioenvironnement.ca', 'avizo', 2, 5),
(73, 'Baril', 'Pierre-Marc', '8194444444', 'pierre.marc@gmail.com', 'avizo', 2, 5);

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
(2, 10, 1, 2006, 1, 1, 163214, 'FHZ2396', NULL, '2017-10-09', NULL, NULL, 2),
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
  ADD KEY `pk_statut_garage` (`fk_statut_garage`);

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
-- Indexes for table `statut_garage`
--
ALTER TABLE `statut_garage`
  ADD PRIMARY KEY (`pk_statut_garage`);

--
-- Indexes for table `statut_vehicule`
--
ALTER TABLE `statut_vehicule`
  ADD PRIMARY KEY (`pk_statut_vehicule`);

--
-- Indexes for table `ta_entretien_facture`
--
ALTER TABLE `ta_entretien_facture`
  ADD PRIMARY KEY (`pk_ta_entretien_facture`),
  ADD KEY `fk_facture` (`fk_facture`),
  ADD KEY `fk_entretien` (`fk_entretien`);

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
-- AUTO_INCREMENT for table `alerte`
--
ALTER TABLE `alerte`
  MODIFY `pk_alerte` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `couleur`
--
ALTER TABLE `couleur`
  MODIFY `pk_couleur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `entretien`
--
ALTER TABLE `entretien`
  MODIFY `pk_entretien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `facture`
--
ALTER TABLE `facture`
  MODIFY `pk_facture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `garage`
--
ALTER TABLE `garage`
  MODIFY `pk_garage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `marque`
--
ALTER TABLE `marque`
  MODIFY `pk_marque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `modele`
--
ALTER TABLE `modele`
  MODIFY `pk_modele` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `pk_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
-- AUTO_INCREMENT for table `statut_garage`
--
ALTER TABLE `statut_garage`
  MODIFY `pk_statut_garage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `statut_vehicule`
--
ALTER TABLE `statut_vehicule`
  MODIFY `pk_statut_vehicule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ta_entretien_facture`
--
ALTER TABLE `ta_entretien_facture`
  MODIFY `pk_ta_entretien_facture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `type_entretien`
--
ALTER TABLE `type_entretien`
  MODIFY `pk_type_entretien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `pk_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
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
  ADD CONSTRAINT `garage_ibfk_1` FOREIGN KEY (`fk_statut_garage`) REFERENCES `statut_garage` (`pk_statut_garage`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `ta_entretien_facture`
--
ALTER TABLE `ta_entretien_facture`
  ADD CONSTRAINT `ta_entretien_facture_ibfk_1` FOREIGN KEY (`fk_facture`) REFERENCES `facture` (`pk_facture`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ta_entretien_facture_ibfk_2` FOREIGN KEY (`fk_entretien`) REFERENCES `entretien` (`pk_entretien`) ON DELETE CASCADE ON UPDATE CASCADE;

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
