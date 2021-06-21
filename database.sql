-- noinspection SqlDialectInspectionForFile

-- noinspection SqlNoDataSourceInspectionForFile

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 21 juin 2021 à 12:59
-- Version du serveur : 5.7.32
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
DROP DATABASE IF EXISTS projetphp;
CREATE DATABASE projetphp;
USE projetphp;

--
-- Base de données : `projetphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `Achat`
--

CREATE TABLE `Achat` (
                         `Achat_id` bigint(20) NOT NULL,
                         `Achat_montant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Achat`
--

INSERT INTO `Achat` (`Achat_id`, `Achat_montant`) VALUES
(1, 200);

-- --------------------------------------------------------

--
-- Structure de la table `Auteur`
--

CREATE TABLE `Auteur` (
                          `auteur_id` bigint(11) NOT NULL,
                          `auteur_prenom` varchar(50) NOT NULL,
                          `auteur_nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Auteur`
--

INSERT INTO `Auteur` (`auteur_id`, `auteur_prenom`, `auteur_nom`) VALUES
(1, 'Aurelie', 'Bonjour');

-- --------------------------------------------------------

--
-- Structure de la table `Auteur_has_CP`
--

CREATE TABLE `Auteur_has_CP` (
                                 `auteurhascp_id` bigint(20) NOT NULL,
                                 `auteur_id` bigint(20) NOT NULL,
                                 `produit_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Auteur_has_CP`
--

INSERT INTO `Auteur_has_CP` (`auteurhascp_id`, `auteur_id`, `produit_id`) VALUES
(1, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `Ligne`
--

CREATE TABLE `Ligne` (
                         `ligne_id` bigint(20) NOT NULL,
                         `ligne_quantite` int(11) NOT NULL,
                         `produit_id` bigint(20) NOT NULL,
                         `achat_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Ligne`
--

INSERT INTO `Ligne` (`ligne_id`, `ligne_quantite`, `produit_id`, `achat_id`) VALUES
(1, 10, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Produit`
--

CREATE TABLE `Produit` (
                           `produit_id` bigint(20) NOT NULL,
                           `produit_libelle` varchar(50) NOT NULL,
                           `produit_marque` varchar(50) NOT NULL,
                           `produit_prixUnitaire` float NOT NULL,
                           `produit_qteStock` bigint(20) NOT NULL,
                           `produit_type` tinyint(4) NOT NULL,
                           `produit_dateLimiteConso` date DEFAULT NULL,
                           `produit_poids` int(11) DEFAULT NULL,
                           `produit_couleur` varchar(50) DEFAULT NULL,
                           `produit_typeMine` varchar(50) DEFAULT NULL,
                           `produit_parfum` varchar(50) DEFAULT NULL,
                           `produit_temperature` int(11) DEFAULT NULL,
                           `produit_typeCP` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Produit`
--

INSERT INTO `Produit` (`produit_id`, `produit_libelle`, `produit_marque`, `produit_prixUnitaire`, `produit_qteStock`, `produit_type`, `produit_dateLimiteConso`, `produit_poids`, `produit_couleur`, `produit_typeMine`, `produit_parfum`, `produit_temperature`, `produit_typeCP`) VALUES
(1, 'Pain au chocolat', 'Haribo', 5.45, 200, 3, '2021-06-22', 10, NULL, NULL, NULL, NULL, NULL),
(2, 'Glace à la menthe', 'Fantasy', 1.86, 15, 2, '2021-06-24', NULL, NULL, NULL, 'menthe', 6, NULL),
(3, 'Stylo', 'Bic', 5.87, 234, 1, NULL, NULL, 'Bleu', 'Gras', NULL, NULL, NULL),
(4, 'Carte Postale', 'Gouvernement', 1.65, 200, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'Vacances');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Achat`
--
ALTER TABLE `Achat`
    ADD PRIMARY KEY (`Achat_id`);

--
-- Index pour la table `Auteur`
--
ALTER TABLE `Auteur`
    ADD PRIMARY KEY (`auteur_id`);

--
-- Index pour la table `Auteur_has_CP`
--
ALTER TABLE `Auteur_has_CP`
    ADD PRIMARY KEY (`auteurhascp_id`),
  ADD KEY `indexauteur` (`auteur_id`),
  ADD KEY `indexProduit` (`produit_id`);

--
-- Index pour la table `Ligne`
--
ALTER TABLE `Ligne`
    ADD PRIMARY KEY (`ligne_id`),
  ADD KEY `produit_id` (`produit_id`),
  ADD KEY `achat_id` (`achat_id`);

--
-- Index pour la table `Produit`
--
ALTER TABLE `Produit`
    ADD PRIMARY KEY (`produit_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Achat`
--
ALTER TABLE `Achat`
    MODIFY `Achat_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Auteur`
--
ALTER TABLE `Auteur`
    MODIFY `auteur_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Auteur_has_CP`
--
ALTER TABLE `Auteur_has_CP`
    MODIFY `auteurhascp_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Ligne`
--
ALTER TABLE `Ligne`
    MODIFY `ligne_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Produit`
--
ALTER TABLE `Produit`
    MODIFY `produit_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Auteur_has_CP`
--
ALTER TABLE `Auteur_has_CP`
    ADD CONSTRAINT `AuteurHasCP` FOREIGN KEY (`auteur_id`) REFERENCES `Auteur` (`auteur_id`),
  ADD CONSTRAINT `ProduitHasCP` FOREIGN KEY (`produit_id`) REFERENCES `Produit` (`produit_id`);

--
-- Contraintes pour la table `Ligne`
--
ALTER TABLE `Ligne`
    ADD CONSTRAINT `ligne_ibfk_1` FOREIGN KEY (`achat_id`) REFERENCES `Achat` (`Achat_id`),
  ADD CONSTRAINT `ligne_ibfk_2` FOREIGN KEY (`produit_id`) REFERENCES `Produit` (`produit_id`);