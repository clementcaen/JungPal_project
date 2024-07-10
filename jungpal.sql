-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 10 juil. 2024 à 08:37
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
-- Base de données : `jungpal`
--

-- --------------------------------------------------------

--
-- Structure de la table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `party` varchar(3) DEFAULT NULL,
  `garden` varchar(3) DEFAULT NULL,
  `cleaning` varchar(3) DEFAULT NULL,
  `rooms` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `size` decimal(10,2) DEFAULT NULL,
  `internet` varchar(3) DEFAULT NULL,
  `deposit` decimal(10,2) DEFAULT NULL,
  `campus_time` int(11) DEFAULT NULL,
  `visible` int(11) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ads`
--

INSERT INTO `ads` (`id`, `party`, `garden`, `cleaning`, `rooms`, `price`, `size`, `internet`, `deposit`, `campus_time`, `visible`, `user_id`) VALUES
(8, 'no', 'no', 'no', 2, 300.00, 10.00, 'yes', 600.00, 2, 0, 2),
(9, 'yes', 'no', 'no', 2, 350.00, 12.00, 'yes', 700.00, 2, 0, 3),
(10, 'yes', 'no', 'no', 1, 400.00, 11.00, 'yes', 800.00, 2, 0, 4),
(11, 'yes', 'no', 'no', 2, 300.00, 10.00, 'yes', 600.00, 2, 0, 6),
(12, 'yes', 'yes', 'no', 2, 250.00, 10.00, 'yes', 500.00, 4, 0, 5),
(13, 'yes', 'no', 'no', 2, 300.00, 16.00, 'yes', 600.00, 4, 0, 7),
(14, 'yes', 'no', 'no', 2, 350.00, 14.00, 'yes', 700.00, 4, 0, 8),
(15, 'yes', 'no', 'no', 2, 300.00, 10.00, 'yes', 600.00, 4, 0, 9),
(32, 'no', 'no', 'no', 4, 340.00, 14.00, 'yes', 680.00, 42, 1, 12),
(33, 'yes', 'yes', 'yes', 3, 300.00, 10.00, 'no', 600.00, 0, 1, 13);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `gender`, `dob`, `address`, `city`, `postal_code`, `email`, `password`) VALUES
(1, 'Le Bot', 'Maryline', 'woman', '2002-05-21', '29, langeoguer', 'Plougar', '29440', 'marylinelebot21@gmail.com', 'lb21'),
(2, 'Le Bot', 'Maryline2', 'woman', '2002-05-21', '29, langeoguer', 'Plougar', '29440', 'marylinelebot22@gmail.com', 'lb21'),
(3, 'Maryline', 'Le Bot', 'woman', '2024-06-13', '29, langeoguer', 'Plougar - (29440)', '29440', 'marylinelebot23@gmail.com', 'lb'),
(4, 'Maryline', 'Le Bot', 'woman', '2002-05-21', '29, langeoguer', 'Plougar', '29440', 'test@ufyyu', 'lb'),
(5, '', '', 'woman', '2002-05-21', '29, langeoguer', 'Plougar - (29440)', '29440', 'marylinelebot24@gmail.com', 'lb'),
(6, 'bla', 'bla', 'bla', '4567-03-12', 'bla', 'bl', 'bla', 'bla@hfehef', 'bla'),
(7, 'Maryline', 'Le Bot', 'woman', '2002-05-21', '29, langeoguer', 'Plougar - (29440)', '29440', 'jhqfoiheol@ikbzd', '1'),
(8, 'Maryline', 'Le Bot', 'woman', '2002-05-21', '29, langeoguer', 'Plougar - (29440)', '29440', 'kugjazazgoaz@kvjzdkj', '2'),
(9, 'Maryline', 'Le Bot', 'woman', '2002-05-21', '29, langeoguer', 'Plougar - (29440)', '29440', 'efbfuke@ekdjf', 'l'),
(10, '', '', '', '0000-00-00', '', '', '', '', ''),
(11, 'dgs', 'iah', 'oirro', '4566-03-12', 'akejefn', 'ljken', 'lnkae', 'alnf@]jlknf', '1'),
(12, 'Léon', 'Goretzka', 'Male', '1995-02-06', 'Allianz Arena', 'Munich', '84000', 'leon.goretzka@gmail.com', '12'),
(13, 'jo', 'kimmich', 'male', '1995-02-06', 'allianz arena', 'munich', '8400', 'joshua.kimmich@gmail.com', '06');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
