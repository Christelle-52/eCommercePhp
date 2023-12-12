-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 09 déc. 2023 à 14:07
-- Version du serveur : 8.0.35-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ECF2`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresseClients`
--

CREATE TABLE `adresseClients` (
  `id` int NOT NULL,
  `adresseFact` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `adresseLiv` varchar(100) NOT NULL,
  `id_client` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `adresseClients`
--

INSERT INTO `adresseClients` (`id`, `adresseFact`, `adresseLiv`, `id_client`) VALUES
(1, '17, rue Truc\r\n15500 SAINT BRIEUC', '20, rue Truc\r\n15500 SAINT BRIEUC', 1),
(2, '33, rue Bidule\r\n23800 COLOMIERS', '33, rue Bidule\r\n23800 COLOMIERS', 2),
(3, '57, avenue des Lys\r\n42900 TOULON', '42, rue des Lilas\r\n42900 TOULON', 3),
(4, '46, rue Tataouine\r\n64000 VERTOU', '46, rue Tataouine\r\n64000 VERTOU', 4),
(5, '17 rue du Moulin de Gypse 52500 ANROSEY', '17 rue du Moulin de Gypse 52500 ANROSEY', 5);

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` int NOT NULL,
  `dogName` varchar(100) NOT NULL,
  `commit` varchar(255) NOT NULL,
  `id_client` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `dogName`, `commit`, `id_client`) VALUES
(1, 'Scouby', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor', 1),
(2, 'Oscar', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor', 2),
(3, 'Sally', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor', 3),
(4, 'Youmi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor', 4);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `descript` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `descript`) VALUES
(1, 'friandises', 'Les friandises à la volaille sont particulièrement adaptées aux chiens sensibles ou sujets aux allergies alimentaires et se présentent sous des formes très variées : gésiers de poulet, cous de dinde, blancs de poulets séchés, bouchées... '),
(2, 'jouets', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur possimus voluptatibus quisquam laudantium. Alias itaque nesciunt, saepe assumenda architecto inventore quas et. Obcaecati, asperiores error nobis veritatis eveniet expedita labore amet qui quidem odit'),
(3, 'dodos', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur possimus voluptatibus quisquam laudantium. Alias itaque nesciunt, saepe assumenda architecto inventore quas et. Obcaecati, asperiores error nobis veritatis eveniet expedita labore amet qui quidem odit'),
(4, 'vie quotidienne', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur possimus voluptatibus quisquam laudantium. Alias itaque nesciunt, saepe assumenda architecto inventore quas et. Obcaecati, asperiores error nobis veritatis eveniet expedita labore amet qui quidem odit'),
(5, 'sports', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur possimus voluptatibus quisquam laudantium. Alias itaque nesciunt, saepe assumenda architecto inventore quas et. Obcaecati, asperiores error nobis veritatis eveniet expedita labore amet qui quidem odit');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` bigint DEFAULT NULL,
  `mdp` varchar(100) NOT NULL,
  `dateInscription` varchar(100) NOT NULL,
  `statut` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `avatar`, `email`, `telephone`, `mdp`, `dateInscription`, `statut`) VALUES
(1, 'Aretha', 'Frank', 'images/avatar/card1.png', 'penatibus@icloud.com', 0, 'G2rrttdd!ss', '2023-10-04', 'client'),
(2, 'Riley', 'Horne', 'images/avatar/card2.png', 'tristique.ac@google.net', 0, 'abcdefg', '2023-09-06', 'client'),
(3, 'Myles', 'Ashley', 'images/avatar/card3.png', 'cursus.purus@aol.org', 0, 'unchatsurunarbre', '2023-09-27', 'client'),
(4, 'Simpson', 'Karen', 'images/avatar/card4.png', 'non.dapibus@icloud.org', 0, 'vivelesfleurs', '2023-08-31', 'client'),
(5, 'Billon', 'Christelle', 'logo/logo_small.png', 'toto@serveur.com', 0, 'Cacahuete2@', '2023-10-25 20:37:51', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `conditionnement`
--

CREATE TABLE `conditionnement` (
  `id` int NOT NULL,
  `taille` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `prix` decimal(10,2) NOT NULL,
  `prixKG` decimal(10,2) DEFAULT NULL,
  `id_produit` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `conditionnement`
--

INSERT INTO `conditionnement` (`id`, `taille`, `size`, `prix`, `prixKG`, `id_produit`) VALUES
(1, 'Taille S', '38 grammes', '4.50', NULL, 1),
(2, 'Taille M', '57 grammes', '7.50', NULL, 1),
(3, 'Taille L', '86 grammes', '13.50', NULL, 1),
(4, 'Taille XL', '116 grammes', '18.90', NULL, 1),
(5, 'Taille XXL', '151 grammes', '23.90', NULL, 1),
(6, 'à l\'unité', NULL, '3.95', NULL, 6),
(7, '220g', NULL, '7.00', NULL, 6),
(10, 'Taille S', '9 cm', '7.99', NULL, 8),
(11, 'Taille M', '11 cm', '8.99', NULL, 8),
(12, 'Taille L', '14 cm', '13.99', NULL, 8),
(13, 'Taille XL', '18 cm', '22.99', NULL, 8),
(14, 'Taille S', '6 cm', '18.99', NULL, 12),
(15, 'Taille M', '8 cm', '22.60', NULL, 12),
(18, '30 bâtonnets', '12,5 cm', '14.99', '53.54', 14),
(19, '2x30 bâtonnets', '12,5 cm', '26.46', '47.30', 14),
(20, '85 g', NULL, '3.49', '41.06', 16),
(21, '2x85g', NULL, '9.79', '38.39', 16),
(22, '6x85g', NULL, '18.79', '36.84', 16),
(23, '75x50cm', NULL, '12.99', NULL, 19),
(24, '100x75 cm', NULL, '23.99', NULL, 19),
(25, '150x100 cm', NULL, '45.99', NULL, 19),
(26, 'A l\'unité', NULL, '1.50', NULL, 22),
(27, 'Par 10', NULL, '9.90', NULL, 22),
(28, 'poulet', '(200g)', '5.49', '27.45', 24),
(29, 'canard', '(200g)', '5.49', '27.45', 24),
(30, 'A l\'unité', NULL, '4.95', NULL, 26),
(31, 'Par 10', NULL, '36.90', NULL, 26);

-- --------------------------------------------------------

--
-- Structure de la table `coupons`
--

CREATE TABLE `coupons` (
  `id` int NOT NULL,
  `code` varchar(100) NOT NULL,
  `remise` decimal(10,2) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `id` int NOT NULL,
  `numero` int NOT NULL,
  `dateFact` date NOT NULL,
  `id_panier` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'harry.potter@gmail.com'),
(2, 'jimmy.boulch7@gmail.com'),
(3, 'alain@lestienne.fr');

-- --------------------------------------------------------

--
-- Structure de la table `paniers`
--

CREATE TABLE `paniers` (
  `id` int NOT NULL,
  `id_client` int DEFAULT NULL,
  `id_produit` int DEFAULT NULL,
  `taille` varchar(100) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `quantite` int NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `couponVal` decimal(10,2) DEFAULT NULL,
  `dateCreation` date NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_coupon` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `paniers`
--

INSERT INTO `paniers` (`id`, `id_client`, `id_produit`, `taille`, `prix`, `quantite`, `montant`, `couponVal`, `dateCreation`, `status`, `id_coupon`) VALUES
(4, 5, 1, 'Taille XL', '18.90', 1, '18.90', NULL, '2023-12-07', NULL, NULL),
(5, 5, 1, 'Taille M', '7.50', 2, '15.00', NULL, '2023-12-07', NULL, NULL),
(6, 5, 8, 'Taille M', '8.99', 2, '17.98', NULL, '2023-12-07', NULL, NULL),
(7, 5, 8, 'Taille M', '8.99', 1, '8.99', NULL, '2023-12-07', NULL, NULL),
(8, 5, 14, '2x30 bâtonnets', '26.46', 1, '26.46', NULL, '2023-12-07', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `classe` text,
  `description1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `description2` text,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `stock` int NOT NULL,
  `id_categorie` int NOT NULL,
  `id_sousCategorie` int NOT NULL,
  `new` tinyint(1) DEFAULT NULL,
  `star` tinyint(1) DEFAULT NULL,
  `fiche` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `composition` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `classe`, `description1`, `description2`, `image`, `stock`, `id_categorie`, `id_sousCategorie`, `new`, `star`, `fiche`, `details`, `composition`) VALUES
(1, 'Fromage de Yak', 'Friandise d\'occupation', 'Contribue à l\'hygiène bucco-dentaire,Idéale pour occuper votre chien durant vos absences,Friandise inodore,Sans colorants, sans gluten et sans céréales,Entièrement digestible / très faible en lactose,Riche en protéines,Pauvre en graisse et sel,Fromage à pâte dure qui occupera votre chien de très longs moments', 'Friandise à mâcher 100% naturelle. Le fromage de Yak permet au chien de mordiller tout en contribuant à son hygiène bucco-dentaire et à renforcer sa mâchoire. Friandise idéale pendant vos absences pour occuper votre chien. ', './articles/categories/friandises/autres/fromage-yak.png,./articles/categories/friandises/autres/froYak1.jpg,./articles/categories/friandises/autres/froYak2.jpg,./articles/categories/friandises/autres/froYak3.jpg', 2, 1, 5, 1, NULL, 'Fromage de Yak - Friandise d\'occupation pour chien/Une friandise appétissante :/\r\nSelon une recette ancestrale Himalayenne, ces friandises sont fabriquées à partir de 100% de lait de vache frais récolté en Europe. Le lait est transformé en fromage puis pressé. Il est ensuite séché au  minima sur 12 semaines./Cette friandise 100% naturelle est sans conservateurs, elle ne contient pas de gluten ni de céréales, elle est pauvre en lactose et riche en protéine et calcium./Saine et naturelle, elle constitue une excellente récompense pour les petits, moyens et grands chiens et  d\'autant plus pour ceux ayant une mastication destructrice./Un processus de séchage minutieux est employé spécialement pour créer ce fromage pour chien à pâte dure de façon à procurer un plaisir de mastication intense pendant de longues heures à votre compagnon./Friandise naturelle sans aucun conservateur, colorant ou arôme artificiel, ni liant, additif ou sucre./Astuces : Pas de perte dans le fromage de Yak pour chien/Une fois que votre chien a réduit sa friandise en petit morceaux, placez les dans le micro-ondes pendant environ 30 à 45 secondes./Cela fera gonfler les morceaux et donnera une nouvelle friandise fraiche et croquante à votre compagnon./Veillez à laisser les morceaux refroidir avant de les donner à votre chien./A conserver dans un endroit frais et sec, à l\'abri de la lumière et de l\'humidité.', 'Friandises/Chien', 'Lait de vache (99%) jus de citron vert et sel. 0% produits chimiques 0% conservateurs. Pas de lactose et très faible en matière grasse.'),
(6, 'Peau de chameau', 'Lorem ipsum dolor sit', 'Officia dicta architecto repellat consequatur odit blanditiis,consectetur eius quas natus commodi est doloribus velit facere optio, Harum ipsa nostrum eos velit,Magni rem ullam eius corrupti nihil id nobis', 'istinctio reiciendis eius sed molestiae neque possimus quisquam, tenetur maiores libero non necessitatibus obcaecati laboriosam expedita minima consectetur odit temporibus autem nostrum unde', './articles/categories/friandises/autres/peauDeChameau.png', 22, 1, 5, NULL, 1, '', '', ''),
(8, 'Balle Hol-ee Roller', 'Modi laborum suscipit', 'Possimus itaque debitis quae molestias,tempora est sequi corporis maiores sed veritatis beatae, laboriosam nemo provident earum, Ducimus,cumque laboriosam voluptate veniam illum facere nulla inventore neque totam deserunt,Aspernatur', 'Quibusdam assumenda exercitationem molestias. Similique accusantium ex, delectus officia dolore vero. Provident minima necessitatibus vitae, similique debitis non soluta, quidem, aut sed repudiandae atque nisi error', './articles/categories/jouets/aLancer/BalleHolEERoller.png', 12, 2, 6, NULL, 1, '', '', ''),
(12, 'Lotus poils', NULL, 'balle lotus', NULL, './articles/categories/jouets/aLancer/lotusMoumoute.png,./articles/categories/jouets/aLancer/lotusMoumoute01.png,./articles/categories/jouets/aLancer/lotusMoumoute02.png', 5, 2, 6, 1, NULL, '', '', ''),
(14, 'Braaaf', NULL, 'Bâtonnets à mâcher pour chien ', NULL, './articles/categories/friandises/poulet/braaaf_roll_sticks_with_chicken_12_5cm_hs_01_7.jpg', 49, 1, 1, NULL, NULL, '', '', ''),
(16, '8in1Tasties', NULL, 'Friandises pauvres en matières grasses', NULL, './articles/categories/friandises/poulet/8in1_tasties_huehnerbrust_85g_hs_01_2.jpg', 35, 1, 1, NULL, NULL, '', '', ''),
(19, 'TapisVetBed', NULL, 'tapis vetBed', NULL, './articles/categories/dodos/tapis/tapVetBed.png', 22, 3, 11, NULL, 1, '', '', ''),
(22, 'Nez de cochons souffles', NULL, 'nez de cochons soufflés', NULL, './articles/categories/friandises/porc/nezDeCochonSouffle.png', 30, 1, 5, 1, NULL, '', '', ''),
(24, 'Rocco Chings Steak Style pour chien', NULL, 'Votre chien aime les steaks ? Ces friandises vont lui plaire ! Délicieuses friandises à base de viande de poulet ou de canard délicatement marbrée, conviennent aussi pour les chiens allergiques.', NULL, './articles/categories/friandises/poulet/chings_30x30_9.jpg', 10, 1, 1, NULL, NULL, '', '', ''),
(26, 'Hooper', NULL, NULL, NULL, './articles/categories/sports/hoopers/hooper.png', 20, 5, 18, NULL, 1, '', '', ''),
(27, 'Veste rafraîchissante', NULL, NULL, NULL, './articles/categories/vieQutidienne/complements/VesteRafr.png', 5, 4, 17, NULL, 1, '', '', ''),
(28, 'Rocco Chings Steak Style pour chien', NULL, 'Votre chien aime les steaks ? Ces friandises vont lui plaire ! Délicieuses friandises à base de viande de poulet ou de canard délicatement marbrée, conviennent aussi pour les chiens allergiques.', NULL, './articles/categories/friandises/poulet/chings_30x30_9.jpg', 10, 1, 1, 1, NULL, '', '', ''),
(29, 'Rocco Chings Steak Style pour chien', NULL, 'Votre chien aime les steaks ? Ces friandises vont lui plaire ! Délicieuses friandises à base de viande de poulet ou de canard délicatement marbrée, conviennent aussi pour les chiens allergiques.', NULL, './articles/categories/friandises/poulet/chings_30x30_9.jpg', 10, 1, 1, NULL, NULL, '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `produits1`
--

CREATE TABLE `produits1` (
  `id` int NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `classe` text,
  `description1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `description2` text,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `conditionnement` varchar(100) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `prixKg` decimal(10,2) DEFAULT NULL,
  `stock` int NOT NULL,
  `id_categorie` int NOT NULL,
  `id_sousCategorie` int NOT NULL,
  `new` tinyint(1) DEFAULT NULL,
  `star` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produits1`
--

INSERT INTO `produits1` (`id`, `nom`, `classe`, `description1`, `description2`, `image`, `conditionnement`, `prix`, `prixKg`, `stock`, `id_categorie`, `id_sousCategorie`, `new`, `star`) VALUES
(1, 'Fromage de Yak', 'Friandise d\'occupation', 'Contribue à l\'hygiène bucco-dentaire,Idéale pour occuper votre chien durant vos absences,Friandise inodore,Sans colorants, sans gluten et sans céréales,Entièrement digestible / très faible en lactose,Riche en protéines,Pauvre en graisse et sel,Fromage à pâte dure qui occupera votre chien de très longs moments', 'Friandise à mâcher 100% naturelle. Le fromage de Yak permet au chien de mordiller tout en contribuant à son hygiène bucco-dentaire et à renforcer sa mâchoire. Friandise idéale pendant vos absences pour occuper votre chien. ', './articles/categories/friandises/autres/fromage-yak.png', 'Taille S : 38 grammes', '4.50', NULL, 10, 1, 5, 1, NULL),
(6, 'Peau de chameau', 'Lorem ipsum dolor sit', 'Officia dicta architecto repellat consequatur odit blanditiis,consectetur eius quas natus commodi est doloribus velit facere optio, Harum ipsa nostrum eos velit,Magni rem ullam eius corrupti nihil id nobis', 'istinctio reiciendis eius sed molestiae neque possimus quisquam, tenetur maiores libero non necessitatibus obcaecati laboriosam expedita minima consectetur odit temporibus autem nostrum unde', './articles/categories/friandises/autres/peauDeChameau.png', 'à l\'unité', '3.95', NULL, 25, 1, 5, NULL, 1),
(8, 'Balle Hol-ee Roller', 'Modi laborum suscipit', 'Possimus itaque debitis quae molestias,tempora est sequi corporis maiores sed veritatis beatae, laboriosam nemo provident earum, Ducimus,cumque laboriosam voluptate veniam illum facere nulla inventore neque totam deserunt,Aspernatur', 'Quibusdam assumenda exercitationem molestias. Similique accusantium ex, delectus officia dolore vero. Provident minima necessitatibus vitae, similique debitis non soluta, quidem, aut sed repudiandae atque nisi error', './articles/categories/jouets/aLancer/BalleHolEERoller.png', 'Taille S : 9cm', '7.99', NULL, 15, 2, 6, NULL, 1),
(11, 'Balle Hol-ee Roller', NULL, 'balle holee', NULL, './articles/categories/jouets/aLancer/BalleHolEERoller.png', 'Taille XL : 18cm', '22.99', NULL, 3, 2, 6, NULL, NULL),
(12, 'Lotus poils', NULL, 'balle lotus', NULL, './articles/categories/jouets/aLancer/lotusMoumoute.png', 'Taille S : 6cm', '18.99', NULL, 5, 2, 6, 1, NULL),
(13, 'Lotus poils', NULL, 'balle lotus', NULL, './articles/categories/jouets/aLancer/lotusMoumoute.png', 'Taille M : 8cm', '22.60', NULL, 5, 2, 6, NULL, NULL),
(14, 'Braaaf', NULL, 'Bâtonnets à mâcher pour chien ', NULL, './articles/categories/friandises/poulet/braaaf_roll_sticks_with_chicken_12_5cm_hs_01_7.jpg', '30 bâtonnets', '14.99', '53.54', 50, 1, 1, NULL, NULL),
(15, 'Braaaf', NULL, 'Bâtonnets à mâcher pour chien ', NULL, './articles/categories/friandises/poulet/braaaf_roll_sticks_with_chicken_12_5cm_hs_01_7.jpg', '2x30 bâtonnets', '26.46', '47.30', 20, 1, 1, NULL, NULL),
(16, '8in1Tasties', NULL, 'Friandises pauvres en matières grasses', NULL, './articles/categories/friandises/poulet/8in1_tasties_huehnerbrust_85g_hs_01_2.jpg', '85g', '3.49', '41.06', 35, 1, 1, NULL, NULL),
(17, '8in1Tasties', NULL, 'Friandises pauvres en matières grasses', NULL, './articles/categories/friandises/poulet/8in1_tasties_huehnerbrust_85g_hs_01_2.jpg', '3x85g', '9.79', '38.39', 10, 1, 1, NULL, NULL),
(18, '8in1Tasties', NULL, 'Friandises pauvres en matières grasses', NULL, './articles/categories/friandises/poulet/8in1_tasties_huehnerbrust_85g_hs_01_2.jpg', '6x85g', '18.79', '36.84', 15, 1, 1, NULL, NULL),
(19, 'TapisVetBed', NULL, 'tapis vetBed', NULL, './articles/categories/dodos/tapis/tapVetBed.png', '75x50cm', '12.99', NULL, 22, 3, 11, NULL, 1),
(20, 'TapisVetBed', NULL, 'tapis vetBed', NULL, './articles/categories/dodos/tapis/tapVetBed.png', '100x75cm', '23.99', NULL, 6, 3, 11, NULL, NULL),
(21, 'TapisVetBed', NULL, 'tapis vetBed', NULL, './articles/categories/dodos/tapis/tapVetBed.png', '150x100cm', '45.99', NULL, 8, 3, 11, NULL, NULL),
(22, 'Nez de cochons souffles', NULL, 'nez de cochons soufflés', NULL, './articles/categories/friandises/porc/nezDeCochonSouffle.png', 'à l\'unité', '1.50', NULL, 30, 1, 5, 1, NULL),
(23, 'Nez de cochons souffles', NULL, 'nez de cochons soufflés', NULL, './articles/categories/friandises/porc/nezDeCochonSouffle.png', 'par 10', '9.90', NULL, 10, 1, 5, NULL, NULL),
(24, 'Rocco Chings Steak Style pour chien', NULL, 'Votre chien aime les steaks ? Ces friandises vont lui plaire ! Délicieuses friandises à base de viande de poulet ou de canard délicatement marbrée, conviennent aussi pour les chiens allergiques.', NULL, './articles/categories/friandises/poulet/chings_30x30_9.jpg', '200g', '5.49', NULL, 10, 1, 1, NULL, NULL),
(25, 'Hooper', NULL, NULL, NULL, './articles/categories/sports/hoopers/hooper.png', 'Unitaire', '4.95', NULL, 20, 5, 18, NULL, 1),
(26, 'Veste rafraîchissante', NULL, NULL, NULL, './articles/categories/vieQutidienne/complements/VesteRafr.png', 'Unitaire', '15.27', NULL, 5, 4, 17, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sousCategories`
--

CREATE TABLE `sousCategories` (
  `id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `descriptif` text,
  `id_categorie` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sousCategories`
--

INSERT INTO `sousCategories` (`id`, `nom`, `descriptif`, `id_categorie`) VALUES
(1, 'volaille', 'Les friandises à la volaille sont particulièrement adaptées aux chiens sensibles ou sujets aux allergies alimentaires et se présentent sous des formes très variées : gésiers de poulet, cous de dinde, blancs de poulets séchés, bouchées... ', 1),
(2, 'Boeuf / Agneau', 'Magnam perspiciatis, voluptates inventore quaerat quas cupiditate illo accusamus doloremque unde amet consequatur atque magni asperiores suscipit obcaecati odit temporibus architecto deserunt quidem sit dolores et ullam praesentium labore. Dolor.', 1),
(3, 'porc', 'Possimus itaque debitis quae molestias tempora est sequi corporis maiores sed veritatis beatae, laboriosam nemo provident earum! Ducimus, cumque laboriosam voluptate veniam illum facere nulla inventore neque totam deserunt', 1),
(4, 'poisson', NULL, 1),
(5, 'autres', 'Autem nisi dolorem totam, laborum, alias tempore libero, nostrum nihil possimus natus aspernatur. Corrupti quos, numquam ut harum ducimus sed, optio quo quisquam ipsum nemo provident mollitia suscipit necessitatibus ipsa.', 1),
(6, 'a lancer', 'Eveniet ad cumque quis commodi corrupti accusantium, inventore dolorum qui facilis architecto illum molestias consequuntur assumenda eaque porro autem consequatur sint repellendus doloremque quibusdam ab, iste eligendi. Vero, quis neque.', 2),
(7, 'a tirer', NULL, 2),
(8, 'd\'intelligence', NULL, 2),
(9, 'coussins', NULL, 3),
(10, 'paniers', NULL, 3),
(11, 'tapis', 'Minima eveniet ipsam dignissimos. Veniam quam repellendus exercitationem enim nihil corrupti excepturi officiis suscipit libero consequuntur pariatur tempore dolorum soluta quia inventore officia obcaecati, quas saepe quos eos harum praesentium.', 3),
(12, 'niches', NULL, 3),
(13, 'gamelles', NULL, 4),
(14, 'colliers-Laisses', NULL, 4),
(15, 'transport', NULL, 4),
(16, 'hygiène', NULL, 4),
(17, 'compléments', NULL, 4),
(18, 'hoopers', 'Libero, a dolorum! Cum quos totam recusandae tenetur voluptate eveniet odit quidem repellendus dolore. A aliquam ut totam nisi quo placeat molestias quod temporibus neque, nihil aliquid eos mollitia voluptas!', 5),
(19, 'agility', NULL, 5),
(20, 'canicross', NULL, 5),
(21, 'obédience', NULL, 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adresseClients`
--
ALTER TABLE `adresseClients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conditionnement`
--
ALTER TABLE `conditionnement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_panier` (`id_panier`);

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paniers`
--
ALTER TABLE `paniers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_coupon` (`id_coupon`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_sousCategorie` (`id_sousCategorie`);

--
-- Index pour la table `produits1`
--
ALTER TABLE `produits1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_sousCategorie` (`id_sousCategorie`);

--
-- Index pour la table `sousCategories`
--
ALTER TABLE `sousCategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresseClients`
--
ALTER TABLE `adresseClients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `conditionnement`
--
ALTER TABLE `conditionnement`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `paniers`
--
ALTER TABLE `paniers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `produits1`
--
ALTER TABLE `produits1`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `sousCategories`
--
ALTER TABLE `sousCategories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adresseClients`
--
ALTER TABLE `adresseClients`
  ADD CONSTRAINT `adresseClients_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `conditionnement`
--
ALTER TABLE `conditionnement`
  ADD CONSTRAINT `conditionnement_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `factures_ibfk_1` FOREIGN KEY (`id_panier`) REFERENCES `paniers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `paniers`
--
ALTER TABLE `paniers`
  ADD CONSTRAINT `paniers_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `paniers_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produits1` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `produits_ibfk_2` FOREIGN KEY (`id_sousCategorie`) REFERENCES `sousCategories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `produits1`
--
ALTER TABLE `produits1`
  ADD CONSTRAINT `produits1_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `produits1_ibfk_2` FOREIGN KEY (`id_sousCategorie`) REFERENCES `sousCategories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `sousCategories`
--
ALTER TABLE `sousCategories`
  ADD CONSTRAINT `sousCategories_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
