-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 27 oct. 2017 à 17:08
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `avizobd`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `pk_adresse` int(11) NOT NULL AUTO_INCREMENT,
  `no_civique` int(11) NOT NULL,
  `nom_rue` text NOT NULL,
  PRIMARY KEY (`pk_adresse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `alerte`
--

DROP TABLE IF EXISTS `alerte`;
CREATE TABLE IF NOT EXISTS `alerte` (
  `pk_alerte` int(11) NOT NULL AUTO_INCREMENT,
  `fk_reservation` int(11) NOT NULL,
  `fk_type_entretien` int(11) NOT NULL,
  PRIMARY KEY (`pk_alerte`),
  KEY `fk_reservation` (`fk_reservation`),
  KEY `fk_type_entretien` (`fk_type_entretien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

DROP TABLE IF EXISTS `couleur`;
CREATE TABLE IF NOT EXISTS `couleur` (
  `pk_couleur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`pk_couleur`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `couleur`
--

INSERT INTO `couleur` (`pk_couleur`, `nom`) VALUES
(1, 'Blanc'),
(2, 'Noir'),
(3, 'Gris'),
(4, 'Argent'),
(5, 'Bleu'),
(6, 'Rouge'),
(7, 'Brun'),
(8, 'Vert'),
(9, 'Jaune');

-- --------------------------------------------------------

--
-- Structure de la table `entretien`
--

DROP TABLE IF EXISTS `entretien`;
CREATE TABLE IF NOT EXISTS `entretien` (
  `pk_entretien` int(11) NOT NULL AUTO_INCREMENT,
  `date_entretien` date NOT NULL,
  `odometre_entretien` bigint(20) NOT NULL,
  `fk_garage` int(11) NOT NULL,
  `fk_vehicule` int(11) NOT NULL,
  `fk_type_entretien` int(11) NOT NULL,
  `cout_entretien` bigint(20) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`pk_entretien`),
  KEY `fk_garage` (`fk_garage`),
  KEY `fk_vehicule` (`fk_vehicule`),
  KEY `fk_type_entretien` (`fk_type_entretien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `pk_facture` int(11) NOT NULL AUTO_INCREMENT,
  `fk_entretien` int(11) NOT NULL,
  `montant_entretien` float DEFAULT NULL,
  `photo` longblob NOT NULL,
  PRIMARY KEY (`pk_facture`),
  KEY `fk_entretien` (`fk_entretien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `garage`
--

DROP TABLE IF EXISTS `garage`;
CREATE TABLE IF NOT EXISTS `garage` (
  `pk_garage` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(11) NOT NULL,
  `fk_adresse` int(11) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `fk_statut` int(11) NOT NULL,
  PRIMARY KEY (`pk_garage`),
  KEY `fk_adresse` (`fk_adresse`),
  KEY `fk_statut` (`fk_statut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `pk_marque` int(11) NOT NULL AUTO_INCREMENT,
  `nom_marque` varchar(100) NOT NULL,
  `description_marque` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`pk_marque`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `marque`
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
-- Structure de la table `modele`
--

DROP TABLE IF EXISTS `modele`;
CREATE TABLE IF NOT EXISTS `modele` (
  `pk_modele` int(11) NOT NULL AUTO_INCREMENT,
  `fk_marque` int(11) NOT NULL,
  `nom_modele` varchar(100) NOT NULL,
  `description_modele` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`pk_modele`),
  KEY `fk_marque` (`fk_marque`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `modele`
--

INSERT INTO `modele` (`pk_modele`, `fk_marque`, `nom_modele`, `description_modele`) VALUES
(1, 10, 'F150', NULL),
(2, 10, 'Ranger', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `pk_reservation` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `date_emise` date NOT NULL,
  `fk_vehicule` int(11) NOT NULL,
  `fk_utilisateur` int(11) NOT NULL,
  `statut` tinyint(4) NOT NULL COMMENT '0 = inactif, 1 = actif',
  PRIMARY KEY (`pk_reservation`),
  KEY `fk_utilisateur` (`fk_utilisateur`),
  KEY `fk_vehicule` (`fk_vehicule`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`pk_reservation`, `date_debut`, `date_fin`, `date_emise`, `fk_vehicule`, `fk_utilisateur`, `statut`) VALUES
(1, '2017-10-08', '2017-10-12', '2017-10-07', 2, 1, 1),
(2, '2017-10-12', '2017-10-14', '2017-10-11', 13, 1, 1),
(3, '2017-10-17', '2017-10-21', '2017-10-15', 2, 1, 1),
(4, '2017-10-19', '2017-10-21', '2017-10-18', 13, 1, 0),
(5, '2017-10-26', '2017-10-31', '2017-10-27', 13, 1, 1),
(6, '2017-11-08', '2017-11-15', '2017-10-26', 2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
CREATE TABLE IF NOT EXISTS `secteur` (
  `pk_secteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_secteur` varchar(50) NOT NULL,
  PRIMARY KEY (`pk_secteur`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `secteur`
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
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `pk_statut` int(11) NOT NULL AUTO_INCREMENT,
  `nom_statut` varchar(50) NOT NULL,
  `description_statut` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`pk_statut`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`pk_statut`, `nom_statut`, `description_statut`) VALUES
(1, 'Administrateur', NULL),
(2, 'Utilisateur', NULL),
(3, 'Inactif', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `statut_vehicule`
--

DROP TABLE IF EXISTS `statut_vehicule`;
CREATE TABLE IF NOT EXISTS `statut_vehicule` (
  `pk_statut_vehicule` int(11) NOT NULL AUTO_INCREMENT,
  `nom_statut` varchar(50) NOT NULL,
  `description_statut_vehicule` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`pk_statut_vehicule`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `statut_vehicule`
--

INSERT INTO `statut_vehicule` (`pk_statut_vehicule`, `nom_statut`, `description_statut_vehicule`) VALUES
(1, 'Actif', NULL),
(2, 'Inactif', NULL),
(3, 'Réparation', NULL),
(4, 'Inspection', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_entretien`
--

DROP TABLE IF EXISTS `type_entretien`;
CREATE TABLE IF NOT EXISTS `type_entretien` (
  `pk_type_entretien` int(11) NOT NULL AUTO_INCREMENT,
  `intervalle` int(11) NOT NULL,
  `nom` varchar(11) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`pk_type_entretien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `pk_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `courriel` varchar(150) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `fk_statut` int(11) NOT NULL,
  `fk_secteur` int(11) NOT NULL,
  PRIMARY KEY (`pk_utilisateur`),
  KEY `fk_secteur` (`fk_secteur`),
  KEY `fk_statut` (`fk_statut`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`pk_utilisateur`, `nom`, `prenom`, `telephone`, `courriel`, `mot_de_passe`, `fk_statut`, `fk_secteur`) VALUES
(1, 'Bédard', 'Alain', '819 574-1994', 'alain.bedard@avizo.ca', 'avizo', 2, 1),
(2, 'Bolduc', 'Michel', '819 571-8946', 'michel.bolduc@avizo.ca', 'avizo', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `pk_vehicule` int(11) NOT NULL AUTO_INCREMENT,
  `fk_marque` int(11) NOT NULL,
  `fk_modele` int(11) NOT NULL,
  `annee` bigint(20) NOT NULL,
  `fk_couleur` int(11) NOT NULL,
  `fk_secteur` int(11) NOT NULL,
  `odometre` bigint(20) NOT NULL,
  `plaque` varchar(50) NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `date_achat` date NOT NULL,
  `date_mise_hors_service` date DEFAULT NULL,
  `description_hors_service` varchar(250) DEFAULT NULL,
  `fk_statut` int(11) NOT NULL,
  PRIMARY KEY (`pk_vehicule`),
  KEY `fk_marque` (`fk_marque`,`fk_modele`,`fk_secteur`,`fk_statut`),
  KEY `fk_modele` (`fk_modele`),
  KEY `fk_statut` (`fk_statut`),
  KEY `fk_secteur` (`fk_secteur`),
  KEY `fk_couleur` (`fk_couleur`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`pk_vehicule`, `fk_marque`, `fk_modele`, `annee`, `fk_couleur`, `fk_secteur`, `odometre`, `plaque`, `photo`, `date_achat`, `date_mise_hors_service`, `description_hors_service`, `fk_statut`) VALUES
(2, 10, 1, 2006, 1, 1, 185000, '5TH6YU', NULL, '2017-10-09', NULL, NULL, 1),
(13, 10, 2, 2007, 3, 1, 145000, 'J4H 4N5', NULL, '2017-08-01', NULL, NULL, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `alerte`
--
ALTER TABLE `alerte`
  ADD CONSTRAINT `alerte_ibfk_1` FOREIGN KEY (`fk_reservation`) REFERENCES `reservation` (`pk_reservation`),
  ADD CONSTRAINT `alerte_ibfk_2` FOREIGN KEY (`fk_type_entretien`) REFERENCES `type_entretien` (`pk_type_entretien`);

--
-- Contraintes pour la table `entretien`
--
ALTER TABLE `entretien`
  ADD CONSTRAINT `entretien_ibfk_1` FOREIGN KEY (`fk_vehicule`) REFERENCES `vehicule` (`pk_vehicule`),
  ADD CONSTRAINT `entretien_ibfk_2` FOREIGN KEY (`fk_type_entretien`) REFERENCES `type_entretien` (`pk_type_entretien`),
  ADD CONSTRAINT `entretien_ibfk_3` FOREIGN KEY (`fk_garage`) REFERENCES `garage` (`pk_garage`);

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`fk_entretien`) REFERENCES `entretien` (`pk_entretien`);

--
-- Contraintes pour la table `garage`
--
ALTER TABLE `garage`
  ADD CONSTRAINT `garage_ibfk_1` FOREIGN KEY (`fk_adresse`) REFERENCES `adresse` (`pk_adresse`),
  ADD CONSTRAINT `garage_ibfk_2` FOREIGN KEY (`fk_statut`) REFERENCES `statut` (`pk_statut`);

--
-- Contraintes pour la table `modele`
--
ALTER TABLE `modele`
  ADD CONSTRAINT `modele_ibfk_1` FOREIGN KEY (`fk_marque`) REFERENCES `marque` (`pk_marque`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`fk_utilisateur`) REFERENCES `utilisateur` (`pk_utilisateur`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`fk_vehicule`) REFERENCES `vehicule` (`pk_vehicule`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`fk_statut`) REFERENCES `statut` (`pk_statut`),
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`fk_secteur`) REFERENCES `secteur` (`pk_secteur`);

--
-- Contraintes pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `vehicule_ibfk_1` FOREIGN KEY (`fk_marque`) REFERENCES `marque` (`pk_marque`),
  ADD CONSTRAINT `vehicule_ibfk_2` FOREIGN KEY (`fk_modele`) REFERENCES `modele` (`pk_modele`),
  ADD CONSTRAINT `vehicule_ibfk_4` FOREIGN KEY (`fk_secteur`) REFERENCES `secteur` (`pk_secteur`),
  ADD CONSTRAINT `vehicule_ibfk_5` FOREIGN KEY (`fk_statut`) REFERENCES `statut_vehicule` (`pk_statut_vehicule`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehicule_ibfk_6` FOREIGN KEY (`fk_couleur`) REFERENCES `couleur` (`pk_couleur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
