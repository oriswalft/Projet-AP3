-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: projet_ap_3
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int NOT NULL,
  `etat_id` int NOT NULL,
  `date` datetime NOT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6EEAA67DFB88E14F` (`utilisateur_id`),
  KEY `IDX_6EEAA67DD5E86FF` (`etat_id`),
  CONSTRAINT `FK_6EEAA67DD5E86FF` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`),
  CONSTRAINT `FK_6EEAA67DFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commande`
--

LOCK TABLES `commande` WRITE;
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20230920063607','2023-09-20 08:36:34',315),('DoctrineMigrations\\Version20230926115117','2023-09-26 13:51:33',110),('DoctrineMigrations\\Version20230926121850','2023-09-26 14:18:54',105),('DoctrineMigrations\\Version20230926122401','2023-09-26 14:24:10',54),('DoctrineMigrations\\Version20231003114226','2023-10-03 13:42:40',78),('DoctrineMigrations\\Version20231003115428','2023-10-03 13:54:33',66),('DoctrineMigrations\\Version20231003120444','2023-10-03 14:04:57',76),('DoctrineMigrations\\Version20231003121604','2023-10-03 14:16:11',149),('DoctrineMigrations\\Version20231003135112','2023-10-03 15:51:17',73),('DoctrineMigrations\\Version20231005125152','2023-10-05 14:51:59',91),('DoctrineMigrations\\Version20231012133510','2023-10-12 15:35:23',205),('DoctrineMigrations\\Version20231017141723','2023-10-17 16:17:57',158),('DoctrineMigrations\\Version20231017142803','2023-10-17 16:28:07',65),('DoctrineMigrations\\Version20231019144918','2023-10-19 16:49:51',136);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enfant`
--

DROP TABLE IF EXISTS `enfant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enfant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_34B70CA2FB88E14F` (`utilisateur_id`),
  CONSTRAINT `FK_34B70CA2FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enfant`
--

LOCK TABLES `enfant` WRITE;
/*!40000 ALTER TABLE `enfant` DISABLE KEYS */;
/*!40000 ALTER TABLE `enfant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrepot`
--

DROP TABLE IF EXISTS `entrepot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entrepot` (
  `id` int NOT NULL AUTO_INCREMENT,
  `adresse` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrepot`
--

LOCK TABLES `entrepot` WRITE;
/*!40000 ALTER TABLE `entrepot` DISABLE KEYS */;
INSERT INTO `entrepot` VALUES (1,'Le Havre'),(2,'Lyon'),(3,'Marseille');
/*!40000 ALTER TABLE `entrepot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etat`
--

DROP TABLE IF EXISTS `etat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `etat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `transmise` tinyint(1) NOT NULL,
  `validee` tinyint(1) NOT NULL,
  `preparation` tinyint(1) NOT NULL,
  `expediee` tinyint(1) NOT NULL,
  `livree` tinyint(1) NOT NULL,
  `retiree` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etat`
--

LOCK TABLES `etat` WRITE;
/*!40000 ALTER TABLE `etat` DISABLE KEYS */;
/*!40000 ALTER TABLE `etat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prod_com`
--

DROP TABLE IF EXISTS `prod_com`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prod_com` (
  `id` int NOT NULL AUTO_INCREMENT,
  `produits_id` int DEFAULT NULL,
  `commandes_id` int DEFAULT NULL,
  `prix` decimal(10,2) NOT NULL,
  `quantite` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2F0CE3F9CD11A2CF` (`produits_id`),
  KEY `IDX_2F0CE3F98BF5C2E6` (`commandes_id`),
  CONSTRAINT `FK_2F0CE3F98BF5C2E6` FOREIGN KEY (`commandes_id`) REFERENCES `commande` (`id`),
  CONSTRAINT `FK_2F0CE3F9CD11A2CF` FOREIGN KEY (`produits_id`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prod_com`
--

LOCK TABLES `prod_com` WRITE;
/*!40000 ALTER TABLE `prod_com` DISABLE KEYS */;
/*!40000 ALTER TABLE `prod_com` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prod_entrepot`
--

DROP TABLE IF EXISTS `prod_entrepot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prod_entrepot` (
  `id` int NOT NULL AUTO_INCREMENT,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rangee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etagere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantitee_produits` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prod_entrepot`
--

LOCK TABLES `prod_entrepot` WRITE;
/*!40000 ALTER TABLE `prod_entrepot` DISABLE KEYS */;
/*!40000 ALTER TABLE `prod_entrepot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantite` int NOT NULL,
  `categorie_id` int NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_29A5EC27BCF5E72D` (`categorie_id`),
  CONSTRAINT `FK_29A5EC27BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `rayon` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit`
--

LOCK TABLES `produit` WRITE;
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` VALUES (1,'MAILLOT OM DOMICILE HOMME',95,'Valenciennes',100,1,'t-shirt_om.png'),(2,'MAILLOT REAL MADRID DOMICILE HOMME',100,'Valenciennes',100,1,'t-shirt_emirates.png'),(3,'Chaussette Homme  Gris',15.99,'Valenciennes',500,2,'chaussette.png'),(4,'Veste Homme MAGMA SHIELD   Noir',180,'Valenciennes',50,2,'veste_noir_magma_shield.png'),(5,'Casque Canterbury Raze Rouge',59.99,'Valenciennes',50,3,'casque_rugby.png'),(6,'Protège-dents Gilbert Viper ',9.9,'Valenciennes',500,3,'protection_dent.png'),(7,'RAQUETTE BABOLAT PURE AERO + (300 GR)',239.9,'Valenciennes',50,4,'raquette.png'),(8,'SHORT ADIDAS ERGO 9IN ATHLETE',49.5,'Valenciennes',100,4,'short tennis.png'),(9,'Sac à ballons avec une contenance 15 ballons',27.9,'Valenciennes',500,5,'sac_balon_basket.png'),(10,'Chaussettes de randonnée  Gris',15.99,'Valenciennes',500,1,'chaussette.png');
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rayon`
--

DROP TABLE IF EXISTS `rayon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rayon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rayon`
--

LOCK TABLES `rayon` WRITE;
/*!40000 ALTER TABLE `rayon` DISABLE KEYS */;
INSERT INTO `rayon` VALUES (1,'foot'),(2,'escalade'),(3,'rugby'),(4,'tennis'),(5,'basketbal'),(6,'tennis de table');
/*!40000 ALTER TABLE `rayon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rayon_produit`
--

DROP TABLE IF EXISTS `rayon_produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rayon_produit` (
  `rayon_id` int NOT NULL,
  `produit_id` int NOT NULL,
  PRIMARY KEY (`rayon_id`,`produit_id`),
  KEY `IDX_6FC614A4D3202E52` (`rayon_id`),
  KEY `IDX_6FC614A4F347EFB` (`produit_id`),
  CONSTRAINT `FK_6FC614A4D3202E52` FOREIGN KEY (`rayon_id`) REFERENCES `rayon` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_6FC614A4F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rayon_produit`
--

LOCK TABLES `rayon_produit` WRITE;
/*!40000 ALTER TABLE `rayon_produit` DISABLE KEYS */;
/*!40000 ALTER TABLE `rayon_produit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` int NOT NULL,
  `date_naissance` date NOT NULL,
  `nombre_enfant` int DEFAULT NULL,
  `age_enfants` int DEFAULT NULL,
  `sport_pratiquee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_dernier_achat` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1D1C63B3E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,'[\"ROLE_USER\"]','$2y$13$Et35A5/CWjVuy9t..29f6es3bJFYTML3bJiHDZkFeZb1pTFY5hyvO','mrpatate@patate.com','Mr','Patate',123456789,'2018-01-01',0,0,'foot',NULL),(3,'[\"ROLE_USER\"]','$2y$13$BQaMX2Zo/vocnRJ/ybc16O/Pr1X2EbIux3rEPZmJs3TGE3wh8xtTK','aymeric-barge@hotmail.fr','Barge','Aymeric',783353900,'2002-04-22',NULL,NULL,'foot',NULL),(6,'[\"ROLE_USER\"]','$2y$13$mNvVwzaIWSx6caxQJyDODevBDRBBULDhZDOOlIQsci711Papf.fr6','orange@orange.mail','Orange','Orange',123456789,'2003-05-02',0,0,'foot',NULL);
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-22 15:07:11
