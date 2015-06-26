-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 26 Juin 2015 à 10:38
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `etat`
--

INSERT INTO `etat` (`id`, `code`, `nom`) VALUES
(4, 'VAL', 'Validé'),
(5, 'ATT', 'En attente');

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
(4, 'fa fa-beer', 'Ma liste de course rien qu''à moi !', '#dc2127', 1, 'n9lqdeg6zemg7lk', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `liste_produit_link`
--

CREATE TABLE IF NOT EXISTS `liste_produit_link` (
  `id` bigint(20) NOT NULL,
  `id_liste` bigint(20) NOT NULL,
  `id_produit` bigint(20) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `id_magazin` bigint(20) DEFAULT NULL,
  `coche` tinyint(1) NOT NULL DEFAULT '0',
  `coche_date` datetime DEFAULT NULL,
  `coche_id_utilisteur` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_lpl_magasin_idx` (`id_magazin`),
  KEY `fk_lpl_utilisateur_idx` (`coche_id_utilisteur`),
  KEY `fk_lpl_produit_idx` (`id_produit`),
  KEY `fk_lpl_liste_idx` (`id_liste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `magasin`
--

CREATE TABLE IF NOT EXISTS `magasin` (
  `id` bigint(20) NOT NULL,
  `nom` varchar(128) NOT NULL,
  `img` varchar(45) DEFAULT NULL,
  `id_utilisateur` bigint(20) DEFAULT NULL,
  `id_visibilite` tinyint(4) NOT NULL DEFAULT '6',
  `date_creation` datetime DEFAULT NULL,
  `nb_ajout` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_visibilite` (`id_visibilite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id` bigint(20) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `pwd`, `datecreate`, `mail`, `datelastconn`) VALUES
(1, 'Essai1', 'totor', '2015-06-25 09:05:47', 'essai@test.com', '2015-06-26 09:53:15'),
(2, 'm', 'kkkk', '2015-06-25 11:41:06', '', '2015-06-25 11:41:06');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_liste_link`
--

CREATE TABLE IF NOT EXISTS `utilisateur_liste_link` (
  `id` bigint(20) NOT NULL,
  `id_liste` bigint(20) NOT NULL,
  `id_utilisateur` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_partage_utilisateur1_idx` (`id_utilisateur`),
  KEY `fk_partage_liste1_idx` (`id_liste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur_liste_link`
--

INSERT INTO `utilisateur_liste_link` (`id`, `id_liste`, `id_utilisateur`) VALUES
(0, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `visibilite`
--

CREATE TABLE IF NOT EXISTS `visibilite` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(3) NOT NULL,
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `visibilite`
--

INSERT INTO `visibilite` (`id`, `code`, `nom`) VALUES
(4, 'MOI', 'Perso'),
(5, 'LST', 'Liste'),
(6, 'SIT', 'Site');

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
  ADD CONSTRAINT `fk_lpl_liste` FOREIGN KEY (`id_liste`) REFERENCES `liste` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lpl_magasin` FOREIGN KEY (`id_magazin`) REFERENCES `magasin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lpl_produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lpl_utilisateur` FOREIGN KEY (`coche_id_utilisteur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `magasin`
--
ALTER TABLE `magasin`
  ADD CONSTRAINT `magasin_ibfk_2` FOREIGN KEY (`id_visibilite`) REFERENCES `visibilite` (`id`),
  ADD CONSTRAINT `magasin_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_partage_utilisateur1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
