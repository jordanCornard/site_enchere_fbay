-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 18 Avril 2013 à 17:05
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `encheres`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'meubles'),
(2, 'voitures'),
(3, 'vetements'),
(4, 'jardinage'),
(5, 'motos'),
(6, 'maison'),
(7, 'telephone'),
(8, 'lunettes');

-- --------------------------------------------------------

--
-- Structure de la table `enchere`
--

CREATE TABLE IF NOT EXISTS `enchere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idObjet` int(11) NOT NULL,
  `idAcheteur` int(11) NOT NULL,
  `prix` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idObjet` (`idObjet`),
  KEY `idAcheteur` (`idAcheteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `enchere`
--

INSERT INTO `enchere` (`id`, `idObjet`, `idAcheteur`, `prix`) VALUES
(1, 2, 6, 55),
(2, 2, 6, 60),
(3, 3, 12, 500),
(4, 3, 10, 450),
(5, 3, 9, 655),
(6, 5, 10, 190),
(7, 5, 7, 3001),
(8, 7, 11, 5.5);

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

CREATE TABLE IF NOT EXISTS `objet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `idVendeur` int(11) NOT NULL,
  `prixDepart` double NOT NULL,
  `dateHeure` datetime NOT NULL,
  `image` tinyint(1) NOT NULL,
  `prixVendu` double DEFAULT NULL,
  `idAcheteur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idVendeur` (`idVendeur`),
  KEY `idAcheteur` (`idAcheteur`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `objet`
--

INSERT INTO `objet` (`id`, `nom`, `idCategorie`, `idVendeur`, `prixDepart`, `dateHeure`, `image`, `prixVendu`, `idAcheteur`) VALUES
(2, 'commode', 1, 4, 50, '2013-04-09 06:23:22', 0, NULL, NULL),
(3, 'iphone 4s', 7, 4, 300, '2013-04-10 13:29:42', 1, NULL, NULL),
(4, 'samsung s4', 7, 6, 800, '2013-04-11 05:30:42', 1, NULL, NULL),
(5, 'clio 2', 2, 7, 3000, '2013-04-16 08:32:42', 1, NULL, NULL),
(6, 'twingo', 2, 4, 2000, '2013-04-14 04:40:50', 0, NULL, NULL),
(7, 'pelle', 4, 5, 5, '2013-04-17 14:37:59', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `profil`
--

INSERT INTO `profil` (`id`, `intitule`) VALUES
(1, 'admin'),
(2, 'debarrasseur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `idProfil` int(11) NOT NULL,
  `identifiant` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `identifiant` (`identifiant`),
  KEY `idProfil` (`idProfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `idProfil`, `identifiant`, `mdp`, `email`) VALUES
(1, 'laleau', 'aymeric', 1, 'aymelic', '12345', 'aymeric.laleau@gmail.com'),
(2, 'top', 'martin', 1, 'nitram', '12345', ''),
(3, 'cornard', 'jordan', 1, 'jordan', 'jordan', ''),
(4, 'defief', 'jean', 2, 'malbaiser', '543321', ''),
(5, 'dupont', 'nanar', 2, 'nanar59', '54321', ''),
(6, 'willy', 'wallers', 2, 'willywallers', '54321', ''),
(7, 'brad', 'pitt', 2, 'BradPitt', '98765', ''),
(9, 'Dujardin', 'jean', 2, 'jean.dujardin', '5665', ''),
(10, 'sebastien', 'patrick', 2, 'patoch', '8998', ''),
(11, 'luigi', 'mario', 2, 'laPaire', '56665', ''),
(12, 'kesteloot', 'alexandre', 2, 'laDanseuse', '65451', '');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `enchere`
--
ALTER TABLE `enchere`
  ADD CONSTRAINT `enchere_ibfk_1` FOREIGN KEY (`idObjet`) REFERENCES `objet` (`id`),
  ADD CONSTRAINT `enchere_ibfk_2` FOREIGN KEY (`idAcheteur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `objet`
--
ALTER TABLE `objet`
  ADD CONSTRAINT `objet_ibfk_1` FOREIGN KEY (`idVendeur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `objet_ibfk_2` FOREIGN KEY (`idAcheteur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `objet_ibfk_3` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`idProfil`) REFERENCES `profil` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
