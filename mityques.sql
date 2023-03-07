-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 27 mai 2021 à 17:31
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `voitures`
--

-- --------------------------------------------------------

--
-- Structure de la table `mityques`
--

CREATE TABLE `mityques` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `resume` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sortie` varchar(255) DEFAULT NULL,
  `ventes` varchar(255) DEFAULT NULL,
  `illustration` varchar(255) DEFAULT NULL,
  `origine` varchar(255) CHARACTER SET armscii8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mityques`
--

INSERT INTO `mityques` (`id`, `titre`, `resume`, `description`, `sortie`, `ventes`, `illustration`, `origine`) VALUES
(1, 'Mustang', 'La Mustang est une automobile américaine créée par Ford.', 'La Ford Mustang de 1967, équipé d\'un moteur V8, elle développe 335 chevaux.\r\n\r\nCe bolide est une voiture qui de base a été conçue pour la France. De ce fait, Ford a prit la décision d\'y mettre une boite mécanique mais pas de direction assistée.\r\n\r\nElle plait en générale pour ses formes, le bruit moteur, son accélération et sa légèreté.', '1967', '10 000 000', 'mustang.jpg', 'Etats-Unis'),
(2, 'R5', 'La R5 est un arrivage de France et faite de la part de Renault', 'Renault a une réel envoie de conquérir le marche des petites voitures avec la R5 (ou Renault 5), afin de succéder à la R4. La R5 pouvait être équipée de différents moteurs, ce qu\'il lui laisse une plage de puissance entre 30 et 160 chevaux. A sa sortie, la R5 était commercialisée en version 3 portes avec comme concurrente la Peugeot 104. Plus tard, en 1974, elle commença sa lancée de 10 ans à la première place des voitures les plus vendues de France, jusqu\'à ce qu\'en 1983 la Peugeot 205 prenne le flambeau. La version 5 places est apparue elle en 1979 ce qui permettra à Renault d\'occuper quelques 16% du marche de l\'automobile française neuve à sa sortie. En 1981 est arrivée sa petite sœur, la R5 Alpine Turbo (appelée simplement R5 Turbo par les connaisseurs), qui a su conquérir le cœur des coureurs de rallyes.', '1972', '5 600 000', 'renault5.png', 'France');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `mityques`
--
ALTER TABLE `mityques`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `mityques`
--
ALTER TABLE `mityques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
