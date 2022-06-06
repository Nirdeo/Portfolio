-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 06 juin 2022 à 16:44
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

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
-- Structure de la table `certifications`
--

CREATE TABLE `certifications` (
  `id_cert` int(11) NOT NULL,
  `titre_cert` varchar(100) NOT NULL,
  `description_cert` varchar(255) NOT NULL,
  `date_cert` date DEFAULT NULL,
  `fichier_cert` varchar(100) DEFAULT NULL,
  `technologie_cert` varchar(100) NOT NULL,
  `illustration_cert` varchar(100) NOT NULL,
  `lien_cert` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `certifications`
--

INSERT INTO `certifications` (`id_cert`, `titre_cert`, `description_cert`, `date_cert`, `fichier_cert`, `technologie_cert`, `illustration_cert`, `lien_cert`) VALUES
(1, 'Certification Pix', 'Cette certification est destinée aux personnes qui souhaitent obtenir un certificat permettant de valoriser leurs compétences numériques.', '2022-03-28', 'attestation-pix-20220328.pdf', 'Compétences numériques', 'pix.png', 'https://tinyurl.com/yck9zyuv'),
(2, 'Certification Udemy', 'Cette certification est destinée aux personnes qui souhaitent obtenir un certificat de développeur web.', '2022-04-07', 'UC-7dc27182-859e-47f5-84e1-666d4d9d3a3d.pdf ', 'HTML, CSS, Bootstrap, JavaScript, jQuery, PHP, SQL, WordPress', 'udemy.png', 'https://tinyurl.com/bdzaafst'),
(3, 'Certification Voltaire', 'Cette certification est destinée aux personnes qui souhaitent obtenir un certificat permettant de garantir leurs niveaux d\'orthographes.', NULL, NULL, 'Niveau d\'orthographe', 'voltaire.png', 'https://tinyurl.com/2p833jt2'),
(4, 'Certification OpenClassrooms', 'Cette certification est destinée aux personnes qui souhaitent obtenir un certificat de développeur web.', NULL, NULL, 'Python, Django', 'openclassrooms.png', 'https://tinyurl.com/2m953z73');

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
(10, 12),
(11, 1),
(11, 2),
(11, 6),
(11, 7),
(11, 11),
(12, 1),
(12, 2),
(12, 6),
(12, 7),
(13, 6),
(13, 7),
(13, 8),
(14, 10),
(15, 8),
(15, 15),
(15, 16),
(16, 1),
(16, 2),
(16, 3),
(16, 4),
(16, 5),
(16, 6),
(16, 7),
(16, 12),
(16, 13),
(16, 14);

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
  `image4_projet` varchar(255) NOT NULL,
  `document1_projet` varchar(255) NOT NULL,
  `document2_projet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`id_projet`, `titre_projet`, `date_projet`, `contexte_projet`, `bilan_projet`, `image1_projet`, `image2_projet`, `image3_projet`, `image4_projet`, `document1_projet`, `document2_projet`) VALUES
(1, 'Radar Pédagogique', 'Octobre 2019', 'Projet réalisé suite à une initiation au ARDUINO afin de réaliser un radar pédagogique pour le lycée', 'Ce projet m\'a permis de découvrir davantage l\'ARDUINO et les cartes LIDAR et la construction d\'appareil électronique', 'arduino1.png', 'arduino2.png', 'arduino3.png', 'arduino4.png', '', ''),
(2, 'Pierre-Feuille-Ciseaux', 'Février 2020', 'Projet réalisé suite à une initiation au HTML CSS afin de réaliser un site de pierre - feuille - ciseaux', 'Ce projet m\'a permis de découvrir davantage la construction de site web et les différents langages utilisés', 'pfc1.png', 'notfound.png', 'notfound.png', 'notfound.png', '', ''),
(3, 'Roulette Russe', 'Novembre 2019', 'Projet réalisé suite à une initiation au PYTHON afin de créer un jeu', 'Ce projet m\'a permis de découvrir davantage PYTHON et les algorithmes', 'roulette1.png', 'notfound.png', 'notfound.png', 'notfound.png', '', ''),
(4, 'Espace de Travail', 'Mai-Juin 2020', 'Projet final de l\'année réalisé pour faire un bilan des langages étudiés au cours de l\'année', 'Ce projet m\'a permis de mettre en oeuvre mes connaissances de langages déja vu et de créer un projet concret', 'edt1.png', 'edt2.png', 'edt3.png', 'edt4.png', '', ''),
(5, 'CV Piscine', 'Septembre 2020', 'Projet réalisé en début d\'année dans le cadre d\'une immersion à la programmation', 'Ce projet m\'a permis d\'apprendre le travail en groupe en temps limité et de voir le codage avec des professionnels', 'cv1.png', 'notfound.png', 'notfound.png', 'notfound.png', '', ''),
(6, 'Site Catalogue', 'Octobre-Novembre 2020', 'Boutique de jeux de société réalisée dans le cadre de la découverte du CMS WordPress', 'Ce projet m\'a aidé à comprendre le fonctionnement des CMS et de WORDPRESS qui très présent sur les sites internet.wordpress.org', 'wordpress1.png', 'wordpress2.png', 'wordpress3.png', 'notfound.png', '', ''),
(7, 'Agence de voyage', 'Octobre 2020', 'Projet réalisé en début d\'année dans le cadre de l\'apprentissage du HTML et CSS', 'Ce projet m\'a permis de construire mon premier site web guidé par un professionnel et d\'apprendre les deux langages', 'agence1.png', 'agence2.png', 'notfound.png', 'notfound.png', '', ''),
(8, 'Site Personnel 1V1', 'Septembre-Novembre 2020', 'Portfolio témoin de mon apprentissage et de ma montée en compétences acquises au cours de l\'année', 'Ce projet m\'a permis de mettre en valeur mes compétences en les appliquant sur un site personnel et de témoigner de toutes mes réalisations', 'portfolio1.png', 'portfolio2.png', 'notfound.png', 'notfound.png', '', ''),
(9, 'Projet Intégration', 'Novembre-Mars 2021', 'Projet réalisé dans le cadre d\'un apprentissage des bonnes pratiques de HTML et CSS', 'Ce projet m\'a permis de fortifier mes bases en HTML et CSS', 'l1.png', 'l2.png', 'l3.png', 'l4.png', '', ''),
(10, 'Site LiveQuestion', 'Février-Avril 2021', 'Mission professionnelle de fin d\'année réalisée en mode projet afin de réaliser un forum de questions réponses sur des problématiques variées', 'Veille d\'approfondissement sur les technologies apprises au cours de l\'année et de découverte de l\'outil Git ainsi que la plateforme GitHub', 'lq1.png', 'lq2.png', 'lq3.png', 'lq4.png', 'CDC_LQ.pdf', ''),
(11, 'Projet WordPress', 'Mars-Mai 2021', 'Projet réalisé dans le cadre d\'un approfondissement du CMS WordPress et de HTML et CSS pour la réalisation d\'un site semblable à Disney+', 'Ce projet m\'a permis de consolider mes compétences sur le CMS WordPress', 'wpf1.png', 'wpf2.png', 'wpf3.png', 'wpf4.png', '', ''),
(12, 'Wrabbix', '31 Mai - 25 Juin 2021', 'Projet réalisé dans le cadre d\'un stage professionnel en entreprise', 'Ce projet m\'a permis de réaliser un logiciel web de création de tâches Wrike depuis Zabbix pour la société Xefi Senlis', 'wrabbix1.png', 'wrabbix2.png', 'notfound.png', 'notfound.png', '', ''),
(13, 'My Series Companion', 'Juillet-Aout 2021', 'Développement d\'un site de gestion de ses séries', 'Ce projet m\'a permis de faire un bilan des compétences acquises au cours de l\'année scolaire', 'msc1.png', 'msc2.png', 'msc3.png', 'msc4.png', 'CDC_MSC.pdf', 'CDC - My Series Companion (light).pdf'),
(14, 'Projet C#', 'Octobre - Janvier 2022', 'Projet personnel encadré de gestion d\'une infirmerie', 'Ce projet m\'a permis de travailler en mode projet sur un cas concret à l\'aide du framework C#', 'ppec1.png', 'ppec2.png', 'ppec3.png', 'ppec4.png', 'PPE_C#_sujet_InfiTech(bis).pdf', 'PPE_C_Sprints_InfiTech(bis).pdf'),
(15, 'Suivi de campagne', '10 Janvier - 04 Mars 2022', 'Projet réalisé dans le cadre d\'un stage professionnel en entreprise', 'Ce projet m\'a permis de découvrir le langage Django', 'svc1.png', 'svc2.png', 'svc3.png', 'svc4.png', '', ''),
(16, 'Projet Symfony', 'Décembre - Avril 2022', 'Projet personnel encadré de gestion de locations', 'Ce projet m\'a permis de travailler en mode projet sur un cas concret à l\'aide du framework Symfony', 'ppes1.png', 'ppes2.png', 'ppes3.png', 'ppes4.png', 'CDC_-_Gestion_des_locations_AirBNB.pdf', 'maquettes.pdf');

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
(12, 'GITHUB'),
(13, 'SYMFONY'),
(14, 'TWIG'),
(15, 'DJANGO'),
(16, 'GITLAB');

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
-- Index pour la table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id_cert`);

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
-- AUTO_INCREMENT pour la table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id_cert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_ct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id_techno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
