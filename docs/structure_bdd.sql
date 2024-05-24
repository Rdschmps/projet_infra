-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 24 mai 2024 à 08:36
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jeu_video`
--

-- --------------------------------------------------------

--
-- Structure de la table `jeu_video`
--

DROP TABLE IF EXISTS `jeu_video`;
CREATE TABLE IF NOT EXISTS `jeu_video` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `maison_edition` varchar(100) NOT NULL,
  `note` tinyint NOT NULL,
  `image` varchar(1000) NOT NULL,
  `date_evaluation` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `jeu_video`
--

INSERT INTO `jeu_video` (`id`, `nom`, `maison_edition`, `note`, `image`, `date_evaluation`) VALUES
(4, 'f123', 'codemaster', 10, 'https://media.contentapi.ea.com/content/dam/ea/f1/f1-23/common/featured-image/f123-featured-image-16x9.jpg.adapt.crop191x100.1200w.jpg', '2024-05-22'),
(14, 'GTA', 'Rockstar', 10, 'https://cdn1.epicgames.com/0584d2013f0149a791e7b9bad0eec102/offer/GTAV_EGS_Artwork_2560x1440_Landscaped%20Store-2560x1440-79155f950f32c9790073feaccae570fb.jpg', '2024-05-22'),
(15, 'acc', 'jesaisplis', 9, 'https://image.api.playstation.com/vulcan/ap/rnd/202306/2922/88322b543b68178c4a60fb75f72a7d531c04a6435c158b11.png', '2024-05-23'),
(16, 'car mecanic simulator ', 'test', 7, 'https://image.api.playstation.com/vulcan/ap/rnd/202107/1208/25pE8tZhyfg9FXIL9fwurS52.png', '2024-05-23'),
(17, 'mario bross', 'nintendo', 8, 'https://cdn-europe1.lanmedia.fr/var/europe1/storage/images/europe1/culture/il-y-a-35-ans-mario-devenait-une-icone-de-jeu-video-dans-super-mario-bros-3991403/55991263-1-fre-FR/Il-y-a-35-ans-Mario-devenait-une-icone-de-jeu-video-dans-Super-Mario-Bros.png', '2024-05-22'),
(20, 'valorant', 'riot games', 5, 'https://cdn1.epicgames.com/offer/cbd5b3d310a54b12bf3fe8c41994174f/EGS_VALORANT_RiotGames_S1_2560x1440-d9ca2c0fbaff9d80e8dedfbd726aa438', '2024-05-22'),
(21, 'Call Of Duty MW', 'activision', 8, 'https://m.media-amazon.com/images/I/6150J1pKasL._AC_UF1000,1000_QL80_.jpg', '2024-04-30'),
(23, 'smash bros', 'nintendo', 9, 'https://assets.nintendo.com/image/upload/c_fill,w_1200/q_auto:best/f_auto/dpr_2.0/ncom/software/switch/70010000012332/ac4d1fc9824876ce756406f0525d50c57ded4b2a666f6dfe40a6ac5c3563fad9', '2024-05-08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
