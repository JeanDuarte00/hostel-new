-- MySQL dump 10.13  Distrib 5.7.13, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: hostel_new
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.19-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_endereco` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clientes_email_unique` (`email`),
  KEY `clientes_id_endereco_foreign` (`id_endereco`),
  CONSTRAINT `clientes_id_endereco_foreign` FOREIGN KEY (`id_endereco`) REFERENCES `enderecos` (`cep`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,NULL,'Teste','teste@gmail.com','$2y$10$85X.lkiaIsJMjCUgmuLa2u9VRro0jviNVDZYwOriWEGoRjvKs05Y.',NULL,NULL,NULL,NULL,'SUPxa4wIizkMnX4Ve7xmWJB9FBRcg9wImgYFA4DzqLvt7edC8zpt6Nb69I8x','2017-08-25 05:23:49','2017-08-25 05:23:49');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disponibilidades`
--

DROP TABLE IF EXISTS `disponibilidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disponibilidades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quarto_id` int(10) unsigned NOT NULL,
  `valor` decimal(5,2) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `disponobilidades_quarto_id_foreign` (`quarto_id`),
  CONSTRAINT `disponobilidades_quarto_id_foreign` FOREIGN KEY (`quarto_id`) REFERENCES `quartos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disponibilidades`
--

LOCK TABLES `disponibilidades` WRITE;
/*!40000 ALTER TABLE `disponibilidades` DISABLE KEYS */;
INSERT INTO `disponibilidades` VALUES (2,3,201.00,'2017-09-01','2017-09-28','2017-09-03 01:50:30','2017-09-03 01:50:30');
/*!40000 ALTER TABLE `disponibilidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enderecos`
--

DROP TABLE IF EXISTS `enderecos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enderecos` (
  `cep` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rua` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enderecos`
--

LOCK TABLES `enderecos` WRITE;
/*!40000 ALTER TABLE `enderecos` DISABLE KEYS */;
/*!40000 ALTER TABLE `enderecos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagem_quartos`
--

DROP TABLE IF EXISTS `imagem_quartos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagem_quartos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quarto_id` int(10) unsigned NOT NULL,
  `imagem` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `imagem_quartos_quarto_id_foreign` (`quarto_id`),
  CONSTRAINT `imagem_quartos_quarto_id_foreign` FOREIGN KEY (`quarto_id`) REFERENCES `quartos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagem_quartos`
--

LOCK TABLES `imagem_quartos` WRITE;
/*!40000 ALTER TABLE `imagem_quartos` DISABLE KEYS */;
INSERT INTO `imagem_quartos` VALUES (3,3,'photos/BfRxP3Rt9L8k8tXcFU6n4oXnekFlwnJfScy6Ihsv.jpeg','2017-08-24 06:08:16','2017-08-24 06:08:16'),(4,3,'photos/mbWDLJXWTTvSbfjimi2jdO3IMaE1s9Fu344oBEie.png','2017-08-24 06:08:16','2017-08-24 06:08:16'),(5,3,'photos/ejoZRaNQKsYJKTdaYwGREnsWTt1qaCETSSZe5Hf3.png','2017-08-24 06:08:16','2017-08-24 06:08:16'),(6,3,'photos/thKMZBMm1MeYkvjWjZt2yQdYHXSUzY9GyW3hnoWe.jpeg','2017-08-24 06:08:16','2017-08-24 06:08:16');
/*!40000 ALTER TABLE `imagem_quartos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2013_08_22_045226_create_enderecos_table',1),(2,'2014_10_12_000000_create_users_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2017_08_22_044224_create_quartos_table',1),(5,'2017_08_22_044244_create_disponobilidades_table',1),(6,'2017_08_22_044259_create_imagem_quartos_table',1),(7,'2017_08_22_044319_create_reservas_table',1),(8,'2017_08_24_173722_create_admins_table',2),(9,'2017_08_25_015148_create_clientes_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quartos`
--

DROP TABLE IF EXISTS `quartos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quartos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` decimal(5,2) NOT NULL,
  `descricao_simples` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao_completa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qtd_criancas` int(11) DEFAULT '1',
  `qtd_adultos` int(11) DEFAULT '1',
  `ativo` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quartos`
--

LOCK TABLES `quartos` WRITE;
/*!40000 ALTER TABLE `quartos` DISABLE KEYS */;
INSERT INTO `quartos` VALUES (3,'teste imagens',100.00,'teste','teste','2017-08-24 06:08:16','2017-09-03 01:46:58',1,1,1),(4,'teste imagens',100.00,'teste','teste','2017-09-03 01:26:50','2017-09-03 01:27:49',1,1,0),(5,'teste imagens',100.00,'teste','teste','2017-09-03 01:27:27','2017-09-03 01:27:48',1,1,0);
/*!40000 ALTER TABLE `quartos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservas`
--

DROP TABLE IF EXISTS `reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cliente_id` int(10) unsigned DEFAULT NULL,
  `quarto_id` int(10) unsigned NOT NULL,
  `valor` decimal(5,2) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reservas_quarto_id_foreign` (`quarto_id`),
  KEY `reservas_cliente_id_foreign` (`cliente_id`),
  CONSTRAINT `reservas_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `users` (`id`),
  CONSTRAINT `reservas_quarto_id_foreign` FOREIGN KEY (`quarto_id`) REFERENCES `quartos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas`
--

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` VALUES (1,NULL,3,NULL,'2017-08-24','2017-08-24','2017-08-24 07:36:01','2017-08-24 07:36:01'),(2,NULL,3,NULL,'2017-09-04','2017-09-04','2017-09-05 05:05:19','2017-09-05 05:05:19');
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_endereco` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_id_endereco_foreign` (`id_endereco`),
  CONSTRAINT `users_id_endereco_foreign` FOREIGN KEY (`id_endereco`) REFERENCES `enderecos` (`cep`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'Matheus Lubarino dos Santos','matheus.lubarino1@gmail.com','$2y$10$W0PQEZOlZ3EeNedUl6o9zeNVLVo5xz4uKe2cZ3qu/1R6D2bHbggWK',NULL,NULL,NULL,NULL,NULL,'2017-08-23 05:23:26','2017-08-23 05:23:26');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-06  0:45:21
