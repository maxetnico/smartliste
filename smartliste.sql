-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 08 Septembre 2015 à 16:41
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
CREATE DATABASE IF NOT EXISTS `smartliste` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `smartliste`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(128) NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `img` text,
  `id_utilisateur` bigint(20) DEFAULT NULL,
  `id_etat` tinyint(4) NOT NULL DEFAULT '1',
  `id_visibilite` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `id_parent` (`id_parent`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_etat` (`id_etat`),
  KEY `id_visibilite` (`id_visibilite`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `id_parent`, `img`, `id_utilisateur`, `id_etat`, `id_visibilite`) VALUES
(1, 'Autre', NULL, NULL, NULL, 1, 3),
(2, 'Frais', NULL, NULL, NULL, 1, 3),
(3, 'Maison', NULL, NULL, NULL, 1, 3),
(4, 'Consommable', NULL, NULL, NULL, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

DROP TABLE IF EXISTS `droits`;
CREATE TABLE IF NOT EXISTS `droits` (
  `iddroit` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` bigint(20) NOT NULL,
  `level` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`iddroit`),
  UNIQUE KEY `idUser` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `droits`
--

INSERT INTO `droits` (`iddroit`, `idUser`, `level`) VALUES
(1, 3, 99);

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

DROP TABLE IF EXISTS `etat`;
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

DROP TABLE IF EXISTS `liste`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `liste`
--

INSERT INTO `liste` (`id`, `icone`, `nom`, `couleur`, `id_utilisateur`, `id_partage`, `date_creation`, `date_modification`) VALUES
(1, 'fa fa-beer', 'Ma liste de course rien qu''à moi !', '#dc2127', 1, 'n9lqdeg6zemg7lk', '0000-00-00 00:00:00', NULL),
(2, 'fa fa-ambulance', 'test', '#dc2127', 3, '4mnl2fa5pywshaq', '0000-00-00 00:00:00', NULL),
(3, 'fa fa-ambulance', 'test2', '#dc2127', 3, 'de2g7wbc6yo3l18', '0000-00-00 00:00:00', NULL),
(4, 'fa fa-home', 'test3', '#fbd75b', 4, '9o9orfl4km83lux', '0000-00-00 00:00:00', NULL),
(5, 'fa fa-film', 'test', '#fbd75b', 4, 'v70ssv3uo2vidqx', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `liste_produit_link`
--

DROP TABLE IF EXISTS `liste_produit_link`;
CREATE TABLE IF NOT EXISTS `liste_produit_link` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_liste` bigint(20) NOT NULL,
  `id_produit` bigint(20) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `id_magasin` bigint(20) DEFAULT NULL,
  `coche` tinyint(1) NOT NULL DEFAULT '0',
  `coche_date` datetime DEFAULT NULL,
  `coche_id_utilisteur` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_lpl_magasin_idx` (`id_magasin`),
  KEY `fk_lpl_utilisateur_idx` (`coche_id_utilisteur`),
  KEY `fk_lpl_produit_idx` (`id_produit`),
  KEY `fk_lpl_liste_idx` (`id_liste`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `liste_produit_link`
--

INSERT INTO `liste_produit_link` (`id`, `id_liste`, `id_produit`, `quantite`, `id_magasin`, `coche`, `coche_date`, `coche_id_utilisteur`) VALUES
(2, 5, 2, 3, 11, 0, NULL, NULL),
(3, 5, 4, 2, 9, 0, NULL, NULL),
(4, 1, 1, 1, 2, 1, '2015-08-30 01:39:14', 4),
(5, 1, 4, 1, NULL, 1, '2015-08-30 01:39:28', 4),
(6, 1, 2, 3, NULL, 1, '2015-08-30 01:39:25', 4),
(7, 1, 2, 1, 2, 1, '2015-08-30 01:47:16', 4),
(8, 1, 1, 1, 1, 1, '2015-08-30 01:47:15', 4),
(9, 1, 7, 1, 1, 1, '2015-08-30 01:41:03', 4),
(10, 1, 3, 1, 12, 1, '2015-09-07 09:46:44', 4),
(11, 1, 1, 1, NULL, 1, '2015-09-07 09:46:41', 4),
(12, 1, 7, 2, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `magasin`
--

DROP TABLE IF EXISTS `magasin`;
CREATE TABLE IF NOT EXISTS `magasin` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(128) NOT NULL,
  `img` text,
  `id_utilisateur` bigint(20) DEFAULT NULL,
  `id_visibilite` tinyint(4) NOT NULL DEFAULT '6',
  `date_creation` datetime DEFAULT NULL,
  `nb_ajout` bigint(20) NOT NULL DEFAULT '0',
  `id_etat` tinyint(4) NOT NULL DEFAULT '5',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_magasin` (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_visibilite` (`id_visibilite`),
  KEY `id_etat` (`id_etat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `magasin`
--

INSERT INTO `magasin` (`id`, `nom`, `img`, `id_utilisateur`, `id_visibilite`, `date_creation`, `nb_ajout`, `id_etat`) VALUES
(1, 'penny', 'penny.jpg', NULL, 3, '2015-07-04 09:11:23', 0, 2),
(2, 'Auchan', 'auchan.jpg', 2, 3, '2015-07-05 10:11:23', 0, 1),
(3, 'Match', 'match.jpg', 3, 1, '2015-07-06 11:11:23', 0, 1),
(9, 'Grand Frais', 'Grand Frais.png', 3, 1, '2015-07-09 00:06:28', 0, 1),
(10, 'Super U', 'Super U.png', 4, 3, '2015-08-29 22:53:47', 0, 1),
(11, 'leroy merlin', 'leroy merlin.jpg', 4, 1, '2015-08-30 01:48:08', 0, 1),
(12, 'cora tutu', 'cora tutu.jpg', 5, 2, '2015-08-30 21:11:03', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `magasins_favoris`
--

DROP TABLE IF EXISTS `magasins_favoris`;
CREATE TABLE IF NOT EXISTS `magasins_favoris` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_magasin` bigint(20) NOT NULL,
  `id_utilisateur` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_magasin` (`id_magasin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(128) NOT NULL,
  `img` text COMMENT 'lien vers l''image',
  `id_utilisateur` bigint(20) DEFAULT NULL,
  `id_categorie` int(11) NOT NULL DEFAULT '1',
  `id_etat` tinyint(4) NOT NULL DEFAULT '1',
  `id_visibilite` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'visible par qui',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `id_etat_idx` (`id_etat`),
  KEY `fk_produit_utilisateur1_idx` (`id_utilisateur`),
  KEY `fk_produit_categorie1_idx` (`id_categorie`),
  KEY `fk_produit_visibilite_idx` (`id_visibilite`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `img`, `id_utilisateur`, `id_categorie`, `id_etat`, `id_visibilite`) VALUES
(1, 'beurre', 'produits/beurre.jpg', 4, 1, 1, 3),
(2, 'brosse à dent', 'produits/brosse_a_dent.jpg', NULL, 1, 1, 3),
(3, 'lait', 'produits/lait.jpg', NULL, 1, 1, 3),
(4, 'oeufs', 'produits/oeufs.jpg', NULL, 1, 1, 3),
(5, 'papier wc', 'produits/pq.jpg', NULL, 1, 1, 3),
(7, 'gateaux2', 'produits/7.jpg', 4, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) NOT NULL,
  `pwd` varchar(40) NOT NULL,
  `datecreate` datetime NOT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `datelastconn` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `pwd`, `datecreate`, `mail`, `datelastconn`) VALUES
(1, 'Essai1', 'totor', '2015-06-25 09:05:47', 'essai@test.com', '2015-06-26 10:52:21'),
(2, 'm', 'kkkk', '2015-06-25 11:41:06', '', '2015-06-25 11:41:06'),
(3, 'nico', 'aaa', '2015-06-26 11:30:43', '', '2015-09-08 13:26:48'),
(4, 'max', 'max', '2015-07-06 10:02:38', '', '2015-09-07 09:19:33'),
(5, 'tutu', 'tutu', '2015-08-30 21:10:03', '', '2015-08-30 21:10:03');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_liste_link`
--

DROP TABLE IF EXISTS `utilisateur_liste_link`;
CREATE TABLE IF NOT EXISTS `utilisateur_liste_link` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_liste` bigint(20) NOT NULL,
  `id_utilisateur` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_partage_utilisateur1_idx` (`id_utilisateur`),
  KEY `fk_partage_liste1_idx` (`id_liste`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `utilisateur_liste_link`
--

INSERT INTO `utilisateur_liste_link` (`id`, `id_liste`, `id_utilisateur`) VALUES
(1, 4, 1),
(2, 1, 3),
(3, 1, 4),
(4, 5, 4),
(5, 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `visibilite`
--

DROP TABLE IF EXISTS `visibilite`;
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
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `categorie_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `categorie` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `categorie_ibfk_2` FOREIGN KEY (`id_etat`) REFERENCES `etat` (`id`),
  ADD CONSTRAINT `categorie_ibfk_3` FOREIGN KEY (`id_visibilite`) REFERENCES `visibilite` (`id`),
  ADD CONSTRAINT `categorie_ibfk_4` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `liste`
--
ALTER TABLE `liste`
  ADD CONSTRAINT `id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `liste_produit_link`
--
ALTER TABLE `liste_produit_link`
  ADD CONSTRAINT `fk_lpl_liste` FOREIGN KEY (`id_liste`) REFERENCES `liste` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lpl_magasin` FOREIGN KEY (`id_magasin`) REFERENCES `magasin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lpl_produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lpl_utilisateur` FOREIGN KEY (`coche_id_utilisteur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `magasin`
--
ALTER TABLE `magasin`
  ADD CONSTRAINT `magasin_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `magasin_ibfk_2` FOREIGN KEY (`id_visibilite`) REFERENCES `visibilite` (`id`),
  ADD CONSTRAINT `magasin_ibfk_3` FOREIGN KEY (`id_etat`) REFERENCES `etat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `magasins_favoris`
--
ALTER TABLE `magasins_favoris`
  ADD CONSTRAINT `fk_mag_favoris` FOREIGN KEY (`id_magasin`) REFERENCES `magasin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_util_favoris` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_produit_etat` FOREIGN KEY (`id_etat`) REFERENCES `etat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produit_utilisateur1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produit_visibilite` FOREIGN KEY (`id_visibilite`) REFERENCES `visibilite` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
