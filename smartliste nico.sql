-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 06 Juillet 2015 à 09:58
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `smartliste`
--
CREATE DATABASE IF NOT EXISTS `smartliste` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `smartliste`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(128) NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `img` text,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_etat` tinyint(4) NOT NULL DEFAULT '1',
  `id_visibilite` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE IF NOT EXISTS `etat` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(3) NOT NULL,
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `etat`
--

INSERT INTO `etat` (`id`, `code`, `nom`) VALUES
(1, 'VAL', 'Validé'),
(2, 'ATT', 'En attente'),
(3, 'REF', 'Refusé');

-- --------------------------------------------------------

--
-- Structure de la table `liste`
--

CREATE TABLE IF NOT EXISTS `liste` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `icone` varchar(100) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `couleur` varchar(10) DEFAULT NULL,
  `id_utilisateur` bigint(20) NOT NULL,
  `id_partage` varchar(15) DEFAULT NULL,
  `date_creation` datetime NOT NULL,
  `date_modification` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `id_utilisateur_idx` (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `liste`
--

INSERT INTO `liste` (`id`, `icone`, `nom`, `couleur`, `id_utilisateur`, `id_partage`, `date_creation`, `date_modification`) VALUES
(1, 'fa fa-beer', 'Ma liste de course rien qu''à moi !', '#dc2127', 1, 'n9lqdeg6zemg7lk', '0000-00-00 00:00:00', NULL),
(2, 'fa fa-ambulance', 'test', '#dc2127', 3, '4mnl2fa5pywshaq', '0000-00-00 00:00:00', NULL),
(3, 'fa fa-ambulance', 'test2', '#dc2127', 3, 'de2g7wbc6yo3l18', '0000-00-00 00:00:00', NULL);
(4, 'fa fa-home', 'test3', '#fbd75b', 4, '9o9orfl4km83lux', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `liste_produit_link`
--

CREATE TABLE IF NOT EXISTS `liste_produit_link` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_liste` bigint(20) NOT NULL,
  `id_produit` bigint(20) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `id_magasin` bigint(20) DEFAULT NULL,
  `coche` tinyint(1) NOT NULL DEFAULT '0',
  `coche_date` datetime DEFAULT NULL,
  `coche_id_utilisteur` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_lpl_magasin_idx` (`id_magasin`),
  KEY `fk_lpl_utilisateur_idx` (`coche_id_utilisteur`),
  KEY `fk_lpl_produit_idx` (`id_produit`),
  KEY `fk_lpl_liste_idx` (`id_liste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `magasin`
--

CREATE TABLE IF NOT EXISTS `magasin` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(128) NOT NULL,
  `img` varchar(45) DEFAULT NULL,
  `id_utilisateur` bigint(20) DEFAULT NULL,
  `id_visibilite` tinyint(4) NOT NULL DEFAULT '6',
  `date_creation` datetime DEFAULT NULL,
  `nb_ajout` bigint(20) NOT NULL DEFAULT '0',
  `id_etat` tinyint(4) NOT NULL DEFAULT '5',
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_visibilite` (`id_visibilite`),
  KEY `id_etat` (`id_etat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `magasin`
--

INSERT INTO `magasin` (`id`, `nom`, `img`, `id_utilisateur`, `id_visibilite`, `date_creation`, `nb_ajout`, `id_etat`) VALUES
(1, 'penny', 'penny.jpg', 3, 1, '2015-07-04 09:11:23', 0, 1),
(2, 'Auchan', 'auchan.jpg', 3, 3, '2015-07-05 10:11:23', 0, 2),
(3, 'Match', 'match.jpg', 3, 2, '2015-07-06 11:11:23', 0, 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_magasin_link`
--

CREATE TABLE IF NOT EXISTS `utilisateur_magasin_link` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_magasin` bigint(20) NOT NULL,
  `id_utilisateur` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_mag_utilisateur1_idx` (`id_utilisateur`),
  KEY `fk_mag_magasin1_idx` (`id_magasin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `utilisateur_liste_link`
--

INSERT INTO `utilisateur_magasin_link` (`id`, `id_magasin`, `id_utilisateur`) VALUES
(1, 2, 3),
(2, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(128) NOT NULL,
  `img` text COMMENT 'lien vers l''image',
  `id_utilisateur` bigint(20) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `id_etat` tinyint(4) NOT NULL DEFAULT '1',
  `id_visibilite` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'visible par qui',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `id_etat_idx` (`id_etat`),
  KEY `fk_produit_utilisateur1_idx` (`id_utilisateur`),
  KEY `fk_produit_categorie1_idx` (`id_categorie`),
  KEY `fk_produit_visibilite_idx` (`id_visibilite`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `img`, `id_utilisateur`, `id_categorie`, `id_etat`, `id_visibilite`) VALUES
(1, 'beurre', 'produits/beurre.jpg', 4, NULL, 1, 3),
(2, 'brosse à dent', 'produits/brosse_a_dent.jpg', NULL, NULL, 1, 3),
(3, 'lait', 'produits/lait.jpg', NULL, NULL, 1, 3),
(4, 'oeufs', 'produits/oeufs.jpg', NULL, NULL, 1, 3),
(5, 'papier wc', 'produits/pq.jpg', NULL, NULL, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) NOT NULL,
  `pwd` varchar(40) NOT NULL,
  `datecreate` datetime NOT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `datelastconn` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `pwd`, `datecreate`, `mail`, `datelastconn`) VALUES
(1, 'Essai1', 'totor', '2015-06-25 09:05:47', 'essai@test.com', '2015-06-26 10:52:21'),
(2, 'm', 'kkkk', '2015-06-25 11:41:06', '', '2015-06-25 11:41:06'),
(3, 'nico', 'aaa', '2015-06-26 11:30:43', '', '2015-07-06 09:55:37'),
(4, 'max', 'max', '2015-07-06 10:02:38', '', '2015-07-06 13:56:08');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_liste_link`
--

CREATE TABLE IF NOT EXISTS `utilisateur_liste_link` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_liste` bigint(20) NOT NULL,
  `id_utilisateur` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_partage_utilisateur1_idx` (`id_utilisateur`),
  KEY `fk_partage_liste1_idx` (`id_liste`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `utilisateur_liste_link`
--

INSERT INTO `utilisateur_liste_link` (`id`, `id_liste`, `id_utilisateur`) VALUES
(1, 4, 1),
(2, 6, 3),
(3, 7, 4);

-- --------------------------------------------------------

--
-- Structure de la table `visibilite`
--

CREATE TABLE IF NOT EXISTS `visibilite` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(3) NOT NULL,
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `visibilite`
--

INSERT INTO `visibilite` (`id`, `code`, `nom`) VALUES
(1, 'MOI', 'Perso'),
(2, 'LST', 'Liste'),
(3, 'SIT', 'Site');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `liste`
--
ALTER TABLE `liste`
  ADD CONSTRAINT `id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `liste_produit_link`
--
ALTER TABLE `liste_produit_link`
  ADD CONSTRAINT `fk_lpl_produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lpl_liste` FOREIGN KEY (`id_liste`) REFERENCES `liste` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lpl_magasin` FOREIGN KEY (`id_magazin`) REFERENCES `magasin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lpl_utilisateur` FOREIGN KEY (`coche_id_utilisteur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `magasin`
--
ALTER TABLE `magasin`
  ADD CONSTRAINT `magasin_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `magasin_ibfk_2` FOREIGN KEY (`id_visibilite`) REFERENCES `visibilite` (`id`),
  ADD CONSTRAINT `magasin_ibfk_3` FOREIGN KEY (`id_etat`) REFERENCES `etat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_produit_categorie1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produit_etat` FOREIGN KEY (`id_etat`) REFERENCES `etat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produit_utilisateur1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produit_visibilite` FOREIGN KEY (`id_visibilite`) REFERENCES `visibilite` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur_liste_link`
--
ALTER TABLE `utilisateur_liste_link`
  ADD CONSTRAINT `fk_partage_liste1` FOREIGN KEY (`id_liste`) REFERENCES `liste` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_partage_utilisateur1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mag_utilisateur1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mag_magasin1` FOREIGN KEY (`id_magasin`) REFERENCES `magasin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
