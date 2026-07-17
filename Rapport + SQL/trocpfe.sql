-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 11:40 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trocpfe`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_cat` int(11) NOT NULL,
  `id_offre` int(11) NOT NULL,
  `nom_cat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `id_offre`, `nom_cat`) VALUES
(1, 1, 'Sport'),
(2, 2, 'Technologies'),
(3, 3, 'Vêtements'),
(4, 4, 'Sport'),
(5, 5, 'Cuisine'),
(6, 6, 'Cuisine');

-- --------------------------------------------------------

--
-- Table structure for table `message_admin`
--

CREATE TABLE `message_admin` (
  `id_message` int(11) NOT NULL,
  `objet` varchar(30) NOT NULL,
  `msg` varchar(300) NOT NULL,
  `email` varchar(40) NOT NULL,
  `date_msg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_admin`
--

INSERT INTO `message_admin` (`id_message`, `objet`, `msg`, `email`, `date_msg`) VALUES
(1, 'Problème d\'inscription', 'J\'ai un problème d\'inscription, quelqu\'un utilise mon adresse mail sur votre site. C\'est le même mail que j\'ai utilisé pour vous envoyer ce message.', 'mohamed123@gmail.com', '2021-04-16 21:36:31'),
(2, 'Question', 'J\'ai une question sur la façon dont se fait le troc. Y a-t-il une assurance fournie par votre site Web ou chacun est responsable de lui-même? ', 'ridouanne2003@gmail.com', '2021-04-16 21:45:09'),
(3, 'Proposition', 'Je vous suggère de laisser l\'utilisateur ajouter la catégorie par lui-même et de ne pas le limiter dans certaines options ', 'abdellahKadi@gmail.com', '2021-04-16 21:48:22'),
(4, 'Proposition', 'Je vous suggère de montrer à chaque troqueur les messages qu\'ils envoient et les messages qu\'ils reçoivent dans la même page ', 'raid2004bentayb@gmail.com', '2021-04-16 22:01:28'),
(5, 'Rétroaction', 'merci beaucoup pour le site. c\'était facile à utiliser, j\'ai trouvé de bonnes offres. le troc était simple merci encore une fois', 'soufianne1234@gmail.com', '2021-04-16 22:10:08'),
(6, 'Question', 'Pouvez-vous rendre le site Web international? afin que nous puissions profiter à tous. Je viens de France mais je n\'ai pas pu m\'inscrire car vous avez demandé dans le formulaire le numéro de téléphone doit commecer avec 212', 'emma2001martin@gmail.com', '2021-04-16 21:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `message_offre`
--

CREATE TABLE `message_offre` (
  `id_msg` int(11) NOT NULL,
  `msg` longtext NOT NULL,
  `id_personne` int(11) NOT NULL,
  `id_destinateur` int(11) NOT NULL,
  `date_msg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offre`
--

CREATE TABLE `offre` (
  `id_offre` int(11) NOT NULL,
  `besoin` varchar(40) NOT NULL,
  `id_personne` int(11) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date_publication` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offre`
--

INSERT INTO `offre` (`id_offre`, `besoin`, `id_personne`, `titre`, `image`, `type`, `description`, `date_publication`) VALUES
(1, 'Jordan', 3, 'Nike', '../offres/nike.png', 'Bien', ' Dessus: Synthétique\r\nDoublure: Textile\r\nSemelle intérieure: Textile\r\nMatériau de semelle: Caoutchou', '2021-04-19 21:11:51'),
(2, 'Clavier', 3, 'Souris gamer', '../offres/souris-pc.png', 'Bien', 'Logitech G502 LIGHTSPEED Souris Gamer sans Fil, Capteur Gaming HERO 25K, 25 600 PPP, RGB, Ultra-Lége', '2021-04-19 21:20:00'),
(3, 'Je n\'ai pas un souhait précis', 3, 'Veste de cuir ', '../offres/viste.png', 'Bien', 'Redbridge Veste en cuir pour homme Blouson de motard en cuir synthétique Jacket Noir ', '2021-04-19 21:22:53'),
(4, 'Je n\'ai pas un souhait précis', 3, 'Haltère', '../offres/haltere.png', 'Bien', 'NIMO 2en1haltères innovant,haltères réglables pour la Salle de Sport,entraînement en Force.', '2021-04-19 21:26:23'),
(5, 'Je n\'ai pas un souhait précis', 2, 'Frigo', '../offres/frigo.png', 'Bien', 'Réfrigérateur Combiné Whirlpool W7821OW - Réfrigérateur congélateur bas 338 litres - Blanc - Total N', '2021-04-19 21:31:55'),
(6, 'Frigo', 3, 'Machine à laver ', '../offres/laver.png', 'Bien', 'Lave linge Top 6 Kg Faure FWQ6412C - Lave linge Chargement par le dessus - Essorage 1200 tr/min ', '2021-04-19 21:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

CREATE TABLE `personne` (
  `id_personne` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telephone` int(20) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `login_utilisateur` varchar(30) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `Date_inscription` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `email`, `telephone`, `ville`, `login_utilisateur`, `mot_de_passe`, `Date_inscription`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 642374003, 'Oujda', 'admin', '$2y$10$cz8/8klsEwZnZeCuDoGxj.bO5NVDgrhAiLfOm799zGx2r3giSVrZy', '2021-04-19 21:04:30'),
(2, 'troqueur', 'troqueur', 'troqueur@gmail.com', 614352378, 'Oujda', 'troqueur', '$2y$10$8raoaq9FLHejXHY9PKI.vutrbNC3yLZPQ7UV1oQLbAmfdqzWcwCaC', '2021-04-19 21:06:33'),
(3, 'bouhjar', 'youness', 'youness@gmail.com', 642354678, 'nador', 'youness', '$2y$10$bVNqKPrbMGPy9HsSKvdI8eRJyI7ZS5IkZe1RpKvKIlCx3ZUTQf3B.', '2021-04-19 21:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `nom_profile` varchar(30) NOT NULL,
  `id_personne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id_profile`, `nom_profile`, `id_personne`) VALUES
(1, 'admin', 1),
(2, 'troqueur', 2),
(3, 'troqueur', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`),
  ADD KEY `id_offre` (`id_offre`);

--
-- Indexes for table `message_admin`
--
ALTER TABLE `message_admin`
  ADD PRIMARY KEY (`id_message`);

--
-- Indexes for table `message_offre`
--
ALTER TABLE `message_offre`
  ADD PRIMARY KEY (`id_msg`);

--
-- Indexes for table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id_offre`),
  ADD KEY `id_personne` (`id_personne`) USING BTREE;

--
-- Indexes for table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message_admin`
--
ALTER TABLE `message_admin`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message_offre`
--
ALTER TABLE `message_offre`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offre`
--
ALTER TABLE `offre`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `categorie_ibfk_1` FOREIGN KEY (`id_offre`) REFERENCES `offre` (`id_offre`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
