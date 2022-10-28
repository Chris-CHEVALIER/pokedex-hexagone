-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 28 oct. 2022 à 08:30
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pokedex`
--

-- --------------------------------------------------------

--
-- Structure de la table `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `description` text NOT NULL,
  `number` int(11) NOT NULL,
  `id_type1` int(11) NOT NULL,
  `id_type2` int(11) DEFAULT NULL,
  `image` text NOT NULL,
  `region` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pokemon`
--

INSERT INTO `pokemon` (`id`, `name`, `description`, `number`, `id_type1`, `id_type2`, `image`, `region`) VALUES
(1, 'Bulbizarre', 'Il a une étrange graine plantée sur son dos. Elle grandit avec lui depuis la naissance.', 1, 1, 2, 'https://www.pokepedia.fr/images/thumb/e/ef/Bulbizarre-RFVF.png/250px-Bulbizarre-RFVF.png', 'Kanto'),
(2, 'Salamèche', 'La flamme au bout de sa queue symbolise sa vitalité. Elle brûle intensément quand il est en bonne santé.', 4, 3, 5, 'https://www.pokepedia.fr/images/thumb/8/89/Salam%C3%A8che-RFVF.png/800px-Salam%C3%A8che-RFVF.png', 'Kanto'),
(3, 'Carapuce', 'Il se réfugie dans sa carapace pour se protéger et réplique en projetant de l\'eau sur ses ennemis dès que ces derniers baissent leur garde.', 7, 4, 4, 'https://www.pokepedia.fr/images/thumb/c/cc/Carapuce-RFVF.png/250px-Carapuce-RFVF.png', 'Kanto');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `name`, `color`) VALUES
(1, 'Plante', 'green'),
(2, 'Poison', 'purple'),
(3, 'Feu', '#fd2626'),
(4, 'Eau', '#14c4ff'),
(5, 'Dragon', '#4d61ff'),
(6, '<script>alert(\"Coucou :)\")</script>', '#1a83b7');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(90) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `username`, `password`, `email`) VALUES
(1, 'Chris', 'Chevalier', 'NotChris', '$2y$10$PCogyha2CvoqffoKV7UW3Or7prbNyBZmb9GIelDai/kpYa8SxtWbq', 'chevalier@chris-freelance.com'),
(3, 'Gabriel', 'QADDAHA', 'Monpseudojvouslaissechoisir', '$2y$10$CWQM5/CsQZFVZamvuwiRDOThAOMP/NPwsUwbui9xwwEUOecZmlhgK', 'gdshfcb@dksjbf');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type1` (`id_type1`),
  ADD KEY `id_type2` (`id_type2`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `pokemon`
--
ALTER TABLE `pokemon`
  ADD CONSTRAINT `pokemon_ibfk_1` FOREIGN KEY (`id_type1`) REFERENCES `type` (`id`),
  ADD CONSTRAINT `pokemon_ibfk_2` FOREIGN KEY (`id_type2`) REFERENCES `type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
