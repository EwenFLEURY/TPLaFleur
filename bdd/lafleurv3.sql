-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 18 sep. 2023 à 17:13
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lafleur`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `cat_code` int(11) NOT NULL,
  `cat_libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`cat_code`, `cat_libelle`) VALUES
(1, 'Bulbes'),
(2, 'Plantes à massif'),
(3, 'Rosiers');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `pdt_ref` int(11) NOT NULL,
  `pdt_designation` varchar(50) NOT NULL,
  `pdt_prix` decimal(5,2) NOT NULL,
  `pdt_image` varchar(50) NOT NULL,
  `pdt_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`pdt_ref`, `pdt_designation`, `pdt_prix`, `pdt_image`, `pdt_categorie`) VALUES
(1, '3 bulbes de bégonias', 5.00, 'bulbes_begonia', 1),
(2, '10 bulbes de dahlias', 12.00, 'bulbes_dahlia', 1),
(3, '50 glaeuls', 9.00, 'bulbes_glaieul', 1),
(4, 'Lot de 3 marguerites', 5.00, 'massif_marguerite', 2),
(5, 'Pour un bouquet de 6 pensées', 6.00, 'massif_pensee', 2),
(6, 'Mélange varié de 10 plantes à massif', 15.00, 'massif_melange', 2),
(7, '1 pied spécial grandes fleurs', 20.00, 'rosiers_gdefleur', 3),
(8, 'Une variété sélectionnée pour son parfum', 9.00, 'rosiers_parfum', 3),
(9, 'Rosier arbuste', 8.00, 'rosiers_arbuste', 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`cat_code`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`pdt_ref`),
  ADD KEY `pdt_categorie` (`pdt_categorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `cat_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `pdt_ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`pdt_categorie`) REFERENCES `categorie` (`cat_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
