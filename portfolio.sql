-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 14 mai 2021 à 22:53
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_ct` int(11) NOT NULL,
  `nom_ct` varchar(100) NOT NULL,
  `prenom_ct` varchar(100) NOT NULL,
  `email_ct` varchar(100) NOT NULL,
  `tel_ct` int(11) NOT NULL,
  `message_ct` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `lien_technos`
--

CREATE TABLE `lien_technos` (
  `fk_id_projet` int(11) NOT NULL,
  `fk_id_techno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `lien_technos`
--

INSERT INTO `lien_technos` (`fk_id_projet`, `fk_id_techno`) VALUES
(1, 9),
(2, 1),
(2, 2),
(3, 8),
(4, 1),
(4, 2),
(4, 5),
(4, 6),
(5, 1),
(5, 2),
(6, 11),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(9, 4),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(10, 6),
(10, 7),
(10, 12);

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `id_projet` int(11) NOT NULL,
  `titre_projet` varchar(100) NOT NULL,
  `date_projet` varchar(100) NOT NULL,
  `contexte_projet` varchar(255) NOT NULL,
  `bilan_projet` varchar(255) NOT NULL,
  `image1_projet` varchar(255) NOT NULL,
  `image2_projet` varchar(255) NOT NULL,
  `image3_projet` varchar(255) NOT NULL,
  `image4_projet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`id_projet`, `titre_projet`, `date_projet`, `contexte_projet`, `bilan_projet`, `image1_projet`, `image2_projet`, `image3_projet`, `image4_projet`) VALUES
(1, 'Radar Pédagogique', 'Octobre 2019', 'Projet réalisé suite à une initiation au ARDUINO afin de réaliser un radar pédagogique pour le lycée', 'Ce projet m\'a permis de découvrir davantage l\'ARDUINO et les cartes LIDAR et la construction d\'appareil électronique', 'arduino1.png', 'arduino2.png', 'arduino3.png', 'arduino4.png'),
(2, 'Pierre-Feuille-Ciseaux', 'Février 2020', 'Projet réalisé suite à une initiation au HTML CSS afin de réaliser un site de pierre - feuille - ciseaux', 'Ce projet m\'a permis de découvrir davantage la construction de site web et les différents langages utilisés', 'pfc1.png', 'notfound.png', 'notfound.png', 'notfound.png'),
(3, 'Roulette Russe', 'Novembre 2019', 'Projet réalisé suite à une initiation au PYTHON afin de créer un jeu', 'Ce projet m\'a permis de découvrir davantage PYTHON et les algorithmes', 'roulette1.png', 'notfound.png', 'notfound.png', 'notfound.png'),
(4, 'Espace de Travail', 'Mai-Juin 2020', 'Projet final de l\'année réalisé pour faire un bilan des langages étudiés au cours de l\'année', 'Ce projet m\'a permis de mettre en oeuvre mes connaissances de langages déja vu et de créer un projet concret', 'edt1.png', 'edt2.png', 'edt3.png', 'edt4.png'),
(5, 'CV Piscine', 'Septembre 2020', 'Projet réalisé en début d\'année dans le cadre d\'une immersion à la programmation', 'Ce projet m\'a permis d\'apprendre le travail en groupe en temps limité et de voir le codage avec des professionnels', 'cv1.png', 'notfound.png', 'notfound.png', 'notfound.png'),
(6, 'Site Catalogue', 'Octobre-Novembre 2020', 'Boutique de jeux de société réalisée dans le cadre de la découverte du CMS WordPress', 'Ce projet m\'a aidé à comprendre le fonctionnement des CMS et de WORDPRESS qui très présent sur les sites internet.wordpress.org', 'wordpress1.png', 'wordpress2.png', 'wordpress3.png', 'notfound.png'),
(7, 'Agence de voyage', 'Octobre 2020', 'Projet réalisé en début d\'année dans le cadre de l\'apprentissage du HTML et CSS', 'Ce projet m\'a permis de construire mon premier site web guidé par un professionnel et d\'apprendre les deux langages', 'agence1.png', 'agence2.png', 'notfound.png', 'notfound.png'),
(8, 'Site Personnel 1V1', 'Septembre-Novembre 2020', 'Portfolio témoin de mon apprentissage et de ma montée en compétences acquises au cours de l\'année', 'Ce projet m\'a permis de mettre en valeur mes compétences en les appliquant sur un site personnel et de témoigner de toutes mes réalisations', 'portfolio1.png', 'portfolio2.png', 'notfound.png', 'notfound.png'),
(9, 'Projet Intégration', 'Novembre-Mars 2021', 'Projet réalisé dans le cadre d\'un apprentissage des bonnes pratiques de HTML et CSS', 'Ce projet m\'a permis de fortifier mes bases en HTML et CSS', 'l1.png', 'l2.png', 'l3.png', 'l4.png'),
(10, ' Site LiveQuestion', 'Février-Avril 2021', 'Site de questions-réponses réalisé à l\'aide des compétences accumulés au cours de l\'année', 'Ce projet m\'a permis de travailler professionnellement en groupe et de découvrir l\'outil Git ainsi que la plateforme Github', 'lq1.png', 'lq2.png', 'lq3.png', 'lq4.png');

-- --------------------------------------------------------

--
-- Structure de la table `technologies`
--

CREATE TABLE `technologies` (
  `id_techno` int(11) NOT NULL,
  `libelle_techno` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `technologies`
--

INSERT INTO `technologies` (`id_techno`, `libelle_techno`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'BOOTSTRAP'),
(4, 'JQUERY'),
(5, 'JAVASCRIPT'),
(6, 'PHP'),
(7, 'MYSQL'),
(8, 'PYTHON'),
(9, 'ARDUINO'),
(10, 'C#'),
(11, 'WORDPRESS'),
(12, 'GITHUB');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_ut` int(11) NOT NULL,
  `name_ut` varchar(100) NOT NULL,
  `pass_ut` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_ut`, `name_ut`, `pass_ut`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_ct`);

--
-- Index pour la table `lien_technos`
--
ALTER TABLE `lien_technos`
  ADD PRIMARY KEY (`fk_id_projet`,`fk_id_techno`),
  ADD KEY `fk_id_techno` (`fk_id_techno`);

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id_projet`);

--
-- Index pour la table `technologies`
--
ALTER TABLE `technologies`
  ADD PRIMARY KEY (`id_techno`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_ut`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_ct` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id_techno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_ut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `lien_technos`
--
ALTER TABLE `lien_technos`
  ADD CONSTRAINT `lien_technos_ibfk_1` FOREIGN KEY (`fk_id_projet`) REFERENCES `projets` (`id_projet`),
  ADD CONSTRAINT `lien_technos_ibfk_2` FOREIGN KEY (`fk_id_techno`) REFERENCES `technologies` (`id_techno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
