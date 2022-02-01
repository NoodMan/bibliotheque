-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 01 fév. 2022 à 15:09
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `Book`
--

CREATE TABLE `Book` (
  `id` int(11) NOT NULL,
  `author` int(11) DEFAULT NULL,
  `editor` int(11) DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `summary` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `n_isbn` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  `borrowed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Book`
--

INSERT INTO `Book` (`id`, `author`, `editor`, `title`, `summary`, `n_isbn`, `available`, `borrowed`) VALUES
(3, 3, 4, 'oiuytfghj', 'jliuytrdfcghjnbhvgc', 98765, 0, 0),
(4, 3, 2, 'lmoiuytrdsxcvb', 'oiuytresdfghjn,b vcgetNIsbn()bn,', 8965764, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Note`
--

CREATE TABLE `Note` (
  `id` int(11) NOT NULL,
  `book` int(11) DEFAULT NULL,
  `comment` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `User`
--

INSERT INTO `User` (`id`, `name`, `email`) VALUES
(2, 'toi', 'toi@toi.toi'),
(3, 'il', 'il@il.il'),
(4, 'moi', 'moi@moi.moi');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_article_details` (`n_isbn`),
  ADD KEY `IDX_6BD70C0FBDAFD8C8` (`author`),
  ADD KEY `IDX_6BD70C0FCCF1F1BA` (`editor`);

--
-- Index pour la table `Note`
--
ALTER TABLE `Note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6F8F552ACBE5A331` (`book`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_details` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Book`
--
ALTER TABLE `Book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Note`
--
ALTER TABLE `Note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Book`
--
ALTER TABLE `Book`
  ADD CONSTRAINT `FK_6BD70C0FBDAFD8C8` FOREIGN KEY (`author`) REFERENCES `User` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_6BD70C0FCCF1F1BA` FOREIGN KEY (`editor`) REFERENCES `User` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `Note`
--
ALTER TABLE `Note`
  ADD CONSTRAINT `FK_6F8F552ACBE5A331` FOREIGN KEY (`book`) REFERENCES `Book` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
