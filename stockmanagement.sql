-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 15 juil. 2024 à 12:08
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stockmanagement`
--

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `ProductID` varchar(50) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `site` enum('nadhour','fahs') NOT NULL,
  `MinStock` int(11) NOT NULL,
  `MaxStock` int(11) NOT NULL,
  `DateAdded` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `Quantity`, `site`, `MinStock`, `MaxStock`, `DateAdded`) VALUES
('produit0', 'printer', 5, 'fahs', 10, 20, '2024-07-15 08:34:54'),
('produit1', 'PS1', 0, 'nadhour', 12, 20, '2024-07-08 09:32:02'),
('produit3', 'glasses', 10, 'nadhour', 10, 74, '2024-07-11 08:19:51'),
('produit4', 'mouse', 20, 'nadhour', 5, 10, '2024-07-08 09:33:49'),
('produit5', 'water', 15, 'fahs', 10, 20, '2024-07-15 10:00:58'),
('produit6', 'wheels', 0, 'nadhour', 3, 60, '2024-07-15 10:03:01'),
('produit7', 'airbag', 10, 'fahs', 1, 13, '2024-07-15 11:03:02'),
('produit8', 'calendrier', 45, 'nadhour', 13, 65, '2024-07-15 11:13:31');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'ghoufrane', 'autoliv2024', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
