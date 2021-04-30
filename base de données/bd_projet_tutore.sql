-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 18 jan. 2021 à 22:34
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id16711553_beprimeur`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `numClient` int(2) NOT NULL,
  `numQuartier` int(3) DEFAULT NULL,
  `nomClient` varchar(25) NOT NULL,
  `prenomClient` varchar(25) NOT NULL,
  `adresseClient` varchar(100) NOT NULL,
  `telClient` text NOT NULL,
  `mailClient` varchar(30) NOT NULL,
  `mdpClient` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`numClient`, `numQuartier`, `nomClient`, `prenomClient`, `adresseClient`, `telClient`, `mailClient`, `mdpClient`) VALUES
(4, NULL, 'Admin', 'Admin', '', '1234567890', 'admin@gmail.com', 'admin'),
(13, 1, 'Keita', 'Alpha', '173 Av. de la division leclerc', '0751590912', 'alpha@gmail.com', 'keita01'),
(17, 1, 'Pasbeau', 'Arthur', '4 rue henri janin', '0606060606', 'arthur@gmail.com', 'pasbeau01');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `numCommande` int(2) NOT NULL,
  `numClient` int(2) DEFAULT NULL,
  `numGroupe` int(2) DEFAULT NULL,
  `dateCommande` date NOT NULL,
  `statut` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`numCommande`, `numClient`, `numGroupe`, `dateCommande`, `statut`) VALUES
(22, 13, NULL, '2021-01-15', 'attente');

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE `famille` (
  `numFamille` int(2) NOT NULL,
  `nomFamille` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`numFamille`, `nomFamille`) VALUES
(1, 'Tomate'),
(2, 'Peche'),
(3, 'Pomme'),
(5, 'Fruit rouge');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `numGroupe` int(2) NOT NULL,
  `nomGroupe` varchar(25) NOT NULL,
  `adresseGroupe` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `numCommande` int(2) NOT NULL,
  `numProduit` int(2) NOT NULL,
  `quantite` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ligne_commande`
--

INSERT INTO `ligne_commande` (`numCommande`, `numProduit`, `quantite`) VALUES
(22, 4, 15);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_groupe`
--

CREATE TABLE `ligne_groupe` (
  `numGroupe` int(2) NOT NULL,
  `numClient` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `numCommande` int(2) NOT NULL,
  `dateLivraison` date NOT NULL,
  `typeLivraison` varchar(25) NOT NULL,
  `frequence` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `numPanier` int(2) NOT NULL,
  `nomPanier` varchar(25) NOT NULL,
  `prixPanier` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`numPanier`, `nomPanier`, `prixPanier`) VALUES
(1, 'Panier Automnal', 5.5),
(2, 'Panier Hivernale', 15);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `numProduit` int(2) NOT NULL,
  `nomProduit` varchar(25) DEFAULT NULL,
  `numType` int(2) DEFAULT NULL,
  `numFamille` int(2) DEFAULT NULL,
  `stockProduit` int(3) NOT NULL,
  `prixProduit` float NOT NULL,
  `image` text NOT NULL,
  `numPanier` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`numProduit`, `nomProduit`, `numType`, `numFamille`, `stockProduit`, `prixProduit`, `image`, `numPanier`) VALUES
(1, 'Tomate coeur-de-boeuf', 2, 1, 50, 0.95, 'tomatecoeurdeboeuf.png', 2),
(2, 'Tomate cerise', 2, 1, 50, 0.85, 'tomatecerise.png', 0),
(3, 'Tomate ananas', 2, 1, 50, 0.8, 'tomateananas.png', 0),
(4, 'Peche blanche', 1, 2, 46, 0.95, 'pecheblanche.png', 2),
(5, 'Peche jaune', 1, 2, 49, 1.25, 'pechejaune.png', 1),
(6, 'Peche de vigne', 1, 2, 49, 1.25, 'pechevigne.png', 1),
(7, 'Pomme golden', 1, 3, 49, 0.98, 'pommegolden.png', 1),
(8, 'Pomme gala', 1, 3, 49, 1.05, 'pommegala.png', 1),
(9, 'Fraise', 1, 5, 50, 1.25, 'fraise.png', 0);

-- --------------------------------------------------------

--
-- Structure de la table `quartier`
--

CREATE TABLE `quartier` (
  `numQuartier` int(3) NOT NULL,
  `codeQuartier` int(5) DEFAULT NULL,
  `nomQuartier` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `quartier`
--

INSERT INTO `quartier` (`numQuartier`, `codeQuartier`, `nomQuartier`) VALUES
(1, 75000, 'Paris');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `numType` int(2) NOT NULL,
  `nomType` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`numType`, `nomType`) VALUES
(1, 'Fruit'),
(2, 'Legume');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`numClient`),
  ADD KEY `coQuartier` (`numQuartier`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`numCommande`),
  ADD KEY `coClient` (`numClient`),
  ADD KEY `coGroupe2` (`numGroupe`);

--
-- Index pour la table `famille`
--
ALTER TABLE `famille`
  ADD PRIMARY KEY (`numFamille`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`numGroupe`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`numCommande`,`numProduit`),
  ADD KEY `coProduit` (`numProduit`);

--
-- Index pour la table `ligne_groupe`
--
ALTER TABLE `ligne_groupe`
  ADD PRIMARY KEY (`numGroupe`,`numClient`),
  ADD KEY `coClient2` (`numClient`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`numCommande`) USING BTREE;

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`numPanier`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`numProduit`),
  ADD KEY `coType` (`numType`),
  ADD KEY `coFamille` (`numFamille`);

--
-- Index pour la table `quartier`
--
ALTER TABLE `quartier`
  ADD PRIMARY KEY (`numQuartier`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`numType`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `numClient` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `numCommande` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `famille`
--
ALTER TABLE `famille`
  MODIFY `numFamille` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `numGroupe` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `numPanier` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `numProduit` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `quartier`
--
ALTER TABLE `quartier`
  MODIFY `numQuartier` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `numType` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `coQuartier` FOREIGN KEY (`numQuartier`) REFERENCES `quartier` (`numQuartier`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `coClient` FOREIGN KEY (`numClient`) REFERENCES `client` (`numClient`),
  ADD CONSTRAINT `coGroupe2` FOREIGN KEY (`numGroupe`) REFERENCES `groupe` (`numGroupe`);

--
-- Contraintes pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD CONSTRAINT `coCommande2` FOREIGN KEY (`numCommande`) REFERENCES `commande` (`numCommande`),
  ADD CONSTRAINT `coProduit` FOREIGN KEY (`numProduit`) REFERENCES `produit` (`numProduit`);

--
-- Contraintes pour la table `ligne_groupe`
--
ALTER TABLE `ligne_groupe`
  ADD CONSTRAINT `coClient2` FOREIGN KEY (`numClient`) REFERENCES `client` (`numClient`),
  ADD CONSTRAINT `coGroupe3` FOREIGN KEY (`numGroupe`) REFERENCES `groupe` (`numGroupe`);

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `coCommande` FOREIGN KEY (`numCommande`) REFERENCES `commande` (`numCommande`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `coFamille` FOREIGN KEY (`numFamille`) REFERENCES `famille` (`numFamille`),
  ADD CONSTRAINT `coType` FOREIGN KEY (`numType`) REFERENCES `type` (`numType`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
