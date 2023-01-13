-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 13 jan. 2023 à 13:15
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
-- Base de données : `projetbank`
--

-- --------------------------------------------------------

--
-- Structure de la table `bank_account`
--

CREATE TABLE `bank_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` float(20,6) NOT NULL,
  `currency` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bank_account`
--

INSERT INTO `bank_account` (`id`, `user_id`, `amount`, `currency`) VALUES
(1, 1, 0.000000, 1),
(2, 1, 0.406002, 5),
(3, 1, 144934336.000000, 4);

-- --------------------------------------------------------

--
-- Structure de la table `contact_forms`
--

CREATE TABLE `contact_forms` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact_forms`
--

INSERT INTO `contact_forms` (`id`, `fullname`, `phone`, `email`, `message`, `create_at`) VALUES
(1, 'ryguhvj', '0000000000', 'admin@gmail.com', 'Message de test', '2023-01-13 13:18:28');

-- --------------------------------------------------------

--
-- Structure de la table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `currency_name` varchar(50) NOT NULL,
  `currency_value` float(11,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `currencies`
--

INSERT INTO `currencies` (`id`, `currency_name`, `currency_value`) VALUES
(1, 'USD', 1.000000),
(2, 'EUR', 0.930000),
(3, 'GBP', 0.820000),
(4, 'JPY', 132.440002),
(5, 'BTC', 0.000053);

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `amount` float(11,2) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recipient` int(11) DEFAULT NULL,
  `from_currency` int(11) NOT NULL,
  `to_currency` int(11) NOT NULL,
  `transaction_type` varchar(20) NOT NULL,
  `approved` int(11) DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `transactions`
--

INSERT INTO `transactions` (`id`, `amount`, `created_by`, `created_at`, `recipient`, `from_currency`, `to_currency`, `transaction_type`, `approved`, `approved_date`, `approved_by`) VALUES
(1, 2000.00, 1, '2023-01-13 12:52:22', NULL, 1, 1, 'depot', 1, '2023-01-13 12:52:28', 1),
(2, 200.00, 1, '2023-01-13 12:55:57', 1, 1, 5, 'convert', NULL, NULL, NULL),
(3, 1000000.00, 1, '2023-01-13 12:56:19', NULL, 1, 1, 'depot', 1, '2023-01-13 12:56:27', 1),
(4, 100000.00, 1, '2023-01-13 12:56:22', NULL, 1, 1, 'depot', 1, '2023-01-13 12:56:26', 1),
(5, 1101799.00, 1, '2023-01-13 12:56:58', 1, 1, 5, 'convert', NULL, NULL, NULL),
(6, 1.00, 1, '2023-01-13 12:58:49', 1, 1, 5, 'convert', NULL, NULL, NULL),
(7, 58.00, 1, '2023-01-13 12:59:00', 1, 5, 4, 'convert', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_ip` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `created_at`, `last_ip`) VALUES
(1, 'admin@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1000, '2023-01-13 11:48:19', '127.0.0.1'),
(2, 'test@gmail.com', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 10, '2023-01-13 13:20:36', '127.0.0.1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bank_account`
--
ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_currency` (`currency`),
  ADD KEY `fk_user` (`user_id`);

--
-- Index pour la table `contact_forms`
--
ALTER TABLE `contact_forms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_approved_by` (`approved_by`),
  ADD KEY `fk_from_currency` (`from_currency`),
  ADD KEY `fk_to_currency` (`to_currency`),
  ADD KEY `fk_created_by` (`created_by`),
  ADD KEY `fk_recipient` (`recipient`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bank_account`
--
ALTER TABLE `bank_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `contact_forms`
--
ALTER TABLE `contact_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bank_account`
--
ALTER TABLE `bank_account`
  ADD CONSTRAINT `fk_currency` FOREIGN KEY (`currency`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_approved_by` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_from_currency` FOREIGN KEY (`from_currency`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `fk_recipient` FOREIGN KEY (`recipient`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_to_currency` FOREIGN KEY (`to_currency`) REFERENCES `currencies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
