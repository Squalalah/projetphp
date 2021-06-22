-- noinspection SqlNoDataSourceInspectionForFile

-- noinspection SqlDialectInspectionForFile

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 22 juin 2021 à 09:17
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
-- Structure de la table `Auteur`
--

CREATE TABLE `Auteur` (
                          `id` bigint(11) NOT NULL,
                          `prenom` varchar(50) NOT NULL,
                          `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Auteur`
--

INSERT INTO `Auteur` (`id`, `prenom`, `nom`) VALUES
(1, 'Aurelie', 'Bonjour'),
(2, 'Han', 'Solo'),
(3, 'Harry', 'Potter');

-- --------------------------------------------------------

--
-- Structure de la table `Auteur_has_CP`
--

CREATE TABLE `Auteur_has_CP` (
                                 `id` bigint(20) NOT NULL,
                                 `auteur_id` bigint(20) NOT NULL,
                                 `produit_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Auteur_has_CP`
--

INSERT INTO `Auteur_has_CP` (`id`, `auteur_id`, `produit_id`) VALUES
(1, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `CategorieProduit`
--

CREATE TABLE `CategorieProduit` (
                                    `id` int(11) NOT NULL,
                                    `libelle` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `CategorieProduit`
--

INSERT INTO `CategorieProduit` (`id`, `libelle`) VALUES
(1, 'Stylo'),
(2, 'Glace'),
(3, 'Pain'),
(4, 'Carte Postale');

-- --------------------------------------------------------

--
-- Structure de la table `Ligne`
--

CREATE TABLE `Ligne` (
                         `id` bigint(20) NOT NULL,
                         `quantite` int(11) NOT NULL,
                         `produit_id` bigint(20) NOT NULL,
                         `achat_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Ligne`
--

INSERT INTO `Ligne` (`id`, `quantite`, `produit_id`, `achat_id`) VALUES
(1, 10, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Panier`
--

CREATE TABLE `Panier` (
                          `id` bigint(20) NOT NULL,
                          `montant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Panier`
--

INSERT INTO `Panier` (`id`, `montant`) VALUES
(1, 200);

-- --------------------------------------------------------

--
-- Structure de la table `Produit`
--

CREATE TABLE `Produit` (
                           `refProd` bigint(20) NOT NULL,
                           `libelle` varchar(50) NOT NULL,
                           `marque` varchar(50) NOT NULL,
                           `prixUnitaire` float NOT NULL,
                           `qteStock` bigint(20) NOT NULL,
                           `type` tinyint(4) NOT NULL,
                           `dateLimiteConso` date DEFAULT NULL,
                           `poids` int(11) DEFAULT NULL,
                           `couleur` varchar(50) DEFAULT NULL,
                           `typeMine` varchar(50) DEFAULT NULL,
                           `parfum` varchar(50) DEFAULT NULL,
                           `temperature` int(11) DEFAULT NULL,
                           `typeCP` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Produit`
--

INSERT INTO `Produit` (`refProd`, `libelle`, `marque`, `prixUnitaire`, `qteStock`, `type`, `dateLimiteConso`, `poids`, `couleur`, `typeMine`, `parfum`, `temperature`, `typeCP`) VALUES
(1, 'Pain au chocolat', 'Haribo', 5.45, 200, 3, '2021-06-22', 10, NULL, NULL, NULL, NULL, NULL),
(2, 'Glace à la menthe', 'Fantasy', 1.86, 15, 2, '2021-06-24', NULL, NULL, NULL, 'menthe', 6, NULL),
(3, 'Stylo', 'Bic', 5.87, 234, 1, NULL, NULL, 'Bleu', 'Gras', NULL, NULL, NULL),
(4, 'Carte Postale', 'Gouvernement', 1.65, 200, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'Vacances'),
(5, 'Stylo', 'MontBlanc', 20.99, 120, 1, NULL, NULL, 'Noir', 'Plume', NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Auteur`
--
ALTER TABLE `Auteur`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Auteur_has_CP`
--
ALTER TABLE `Auteur_has_CP`
    ADD PRIMARY KEY (`id`),
  ADD KEY `indexauteur` (`auteur_id`),
  ADD KEY `indexProduit` (`produit_id`);

--
-- Index pour la table `CategorieProduit`
--
ALTER TABLE `CategorieProduit`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Ligne`
--
ALTER TABLE `Ligne`
    ADD PRIMARY KEY (`id`),
  ADD KEY `produit_id` (`produit_id`),
  ADD KEY `achat_id` (`achat_id`);

--
-- Index pour la table `Panier`
--
ALTER TABLE `Panier`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Produit`
--
ALTER TABLE `Produit`
    ADD PRIMARY KEY (`refProd`),
  ADD KEY `type` (`type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Auteur`
--
ALTER TABLE `Auteur`
    MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Auteur_has_CP`
--
ALTER TABLE `Auteur_has_CP`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Ligne`
--
ALTER TABLE `Ligne`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Panier`
--
ALTER TABLE `Panier`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Produit`
--
ALTER TABLE `Produit`
    MODIFY `refProd` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Auteur_has_CP`
--
ALTER TABLE `Auteur_has_CP`
    ADD CONSTRAINT `AuteurHasCP` FOREIGN KEY (`auteur_id`) REFERENCES `Auteur` (`id`),
  ADD CONSTRAINT `ProduitHasCP` FOREIGN KEY (`produit_id`) REFERENCES `Produit` (`refProd`);

--
-- Contraintes pour la table `Ligne`
--
ALTER TABLE `Ligne`
    ADD CONSTRAINT `ligne_ibfk_1` FOREIGN KEY (`achat_id`) REFERENCES `panier` (`id`),
  ADD CONSTRAINT `ligne_ibfk_2` FOREIGN KEY (`produit_id`) REFERENCES `Produit` (`refProd`);
