-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  Dim 13 jan. 2019 à 21:17
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `My_meetic`
--

-- --------------------------------------------------------

--
-- Structure de la table `fiche_membre`
--

CREATE TABLE `fiche_membre` (
  `id_perso` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  `account` varchar(255) NOT NULL DEFAULT 'ON'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fiche_membre`
--

INSERT INTO `fiche_membre` (`id_perso`, `email`, `mot_de_passe`, `date_inscription`, `account`) VALUES
(1, 'louisguiraudie@gmail.com', '$2y$10$oWqACLazQ8AGKMLWjIXix.5If3fcRh0YLgV4ikb9hyBfVly/fTlfO', '2019-01-11', 'ON'),
(2, 'jeanneda@gmail.com', '$2y$10$rDKa1du.l.Htx/IvB4xvo.zyeviqcvVYCyEw0qEvjsX.OeEeB9fCm', '2019-01-13', 'OFF'),
(3, 'tomdurand@gmail.com', '$2y$10$kGWpMPn3sRKuocazoMzNmeZORkR54KojQ9dkrF0b/fgo9DEqRo0tO', '2019-01-13', 'ON'),
(4, 'elina@gmail.com', '$2y$10$u/SOzGSUtiakxIpBe9rbauv940I1bGeAYj3oGEjTnt5r5h77CLKQW', '2019-01-13', 'ON');

-- --------------------------------------------------------

--
-- Structure de la table `fiche_perso`
--

CREATE TABLE `fiche_perso` (
  `id_perso` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fiche_perso`
--

INSERT INTO `fiche_perso` (`id_perso`, `nom`, `prenom`, `email`, `sexe`, `ville`, `date_naissance`) VALUES
(1, 'Guiraudie', 'Louis', 'louisguiraudie@gmail.com', 'homme', 'Paris', '2000-08-22'),
(2, 'da', 'Jeanne', 'jeanneda@gmail.com', 'femme', 'Lyon', '2000-12-03'),
(3, 'durand', 'tom', 'tomdurand@gmail.com', 'homme', 'Paris', '1997-07-03'),
(4, 'cdcdcd', 'elina', 'elina@gmail.com', 'autre', 'Paris', '1948-05-22');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `fiche_membre`
--
ALTER TABLE `fiche_membre`
  ADD PRIMARY KEY (`id_perso`);

--
-- Index pour la table `fiche_perso`
--
ALTER TABLE `fiche_perso`
  ADD PRIMARY KEY (`id_perso`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `fiche_membre`
--
ALTER TABLE `fiche_membre`
  MODIFY `id_perso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `fiche_perso`
--
ALTER TABLE `fiche_perso`
  MODIFY `id_perso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
