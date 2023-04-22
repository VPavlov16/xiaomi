-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: xiaomi
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
-- Table structure for table `mobdev`
--

DROP TABLE IF EXISTS `mobdev`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mobdev` (
  `idMobile Devices` int NOT NULL AUTO_INCREMENT,
  `Model` varchar(45) NOT NULL,
  `price` double NOT NULL,
  `CPU` varchar(45) NOT NULL,
  `GPU` varchar(45) NOT NULL,
  `storage` int NOT NULL,
  `ram` int NOT NULL,
  `front_camera` int NOT NULL,
  `rear_camera` int NOT NULL,
  `description` text NOT NULL,
  `pic` varchar(45) NOT NULL,
  PRIMARY KEY (`idMobile Devices`),
  UNIQUE KEY `idMobile Devices_UNIQUE` (`idMobile Devices`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mobdev`
--

LOCK TABLES `mobdev` WRITE;
/*!40000 ALTER TABLE `mobdev` DISABLE KEYS */;
INSERT INTO `mobdev` VALUES (1,'Xiaomi Mi 11',1440,'Snapdragon 888','Adreno 660',128,8,20,108,'Xiaomi Mi 11 is a flagship mobile phone with a powerful Snapdragon 888 processor, a large 6.81-inch AMOLED display, and a stunning 108MP camera.','mi11.jpg'),(2,'Xiaomi Redmi Note 10 Pro',450,'Snapdragon 732G','Adreno 618',128,6,16,64,'Xiaomi Redmi Note 10 Pro is a mid-range mobile phone with a large 6.67-inch AMOLED display, a powerful Snapdragon 732G processor, and a high-resolution 64MP quad-camera setup.','note10pro.jpg'),(3,'Xiaomi Redmi Note 11S',540,'MediaTek Dimensity 900U','Mali-G78 MC4',128,6,20,64,'Xiaomi Redmi Note 11S is a mid-range mobile phone with a large 6.43-inch AMOLED display, a powerful MediaTek Dimensity 900U processor, and a high-resolution 64MP quad-camera setup.','note11s.png'),(4,'Xiaomi Redmi Note 12',499,'MediaTek Dimensity 1200','Mali-G77 MC9',256,8,16,108,'Xiaomi Redmi Note 12 is a high-end mobile phone with a large 6.81-inch AMOLED display, a powerful MediaTek Dimensity 1200 processor, and a high-resolution 108MP quad-camera setup.','note12.png'),(5,'Xiaomi Redmi Note 12 Pro',699,'Qualcomm Snapdragon 870','Adreno 650',256,12,16,108,'Xiaomi Redmi Note 12 Pro is a high-end mobile phone with a large 6.81-inch AMOLED display, a powerful Qualcomm Snapdragon 870 processor, and a high-resolution 108MP quad-camera setup.','note12pro.png'),(6,'Xiaomi Mi 13',1950,'Qualcomm Snapdragon 8 Gen 1','Adreno 730',512,16,32,108,'Xiaomi Mi 13 is a premium mobile phone with a large 6.7-inch AMOLED display, a powerful Qualcomm Snapdragon 8 Gen 1 processor, and a high-resolution 108MP quad-camera setup.','xiaomi13.png'),(7,'Xiaomi Mi 13 Lite',1000,'Qualcomm Snapdragon 778G','Adreno 642L',128,6,16,64,'Xiaomi Mi 13 Lite is a mid-range mobile phone with a large 6.67-inch AMOLED display, a powerful Qualcomm Snapdragon 778G processor, and a high-resolution 64MP quad-camera setup.','xiaomi13lite.png'),(9,'Xiaomi Mi 13 Pro',2550,'Qualcomm Snapdragon 8 Gen 1','Adreno 730',512,16,32,108,'Xiaomi Mi 13 Pro is a premium mobile phone with a large 6.7-inch AMOLED display, a powerful Qualcomm Snapdragon 8 Gen 1 processor, and a high-resolution 108MP quad-camera setup.','xiaomi13pro.png');
/*!40000 ALTER TABLE `mobdev` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registers`
--

DROP TABLE IF EXISTS `registers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) NOT NULL DEFAULT 'a',
  `lname` varchar(45) NOT NULL DEFAULT 'a',
  `email` varchar(45) NOT NULL DEFAULT 'a',
  `pass` varchar(255) NOT NULL DEFAULT 'a1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registers`
--

LOCK TABLES `registers` WRITE;
/*!40000 ALTER TABLE `registers` DISABLE KEYS */;
INSERT INTO `registers` VALUES (7,'petko','asd','imi@asd','03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),(8,'Registriram se','Ot telefona','tuieottelanaveni@abv.bg','4a31b3a94f8b9446588917a9e7aaa11bb13ee52d63136678623bb1667e8c1b77'),(9,'Venelin e gei','❤️❤️❤️❤️❤️????','dhdhf@abv.bg','932679c1574b5b1e8376929acad78bac544fde36f2b7eb10f463d971d904885e');
/*!40000 ALTER TABLE `registers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT 'a',
  `weight` int NOT NULL DEFAULT '17',
  `mileage` int NOT NULL DEFAULT '40',
  `motorPower` int NOT NULL DEFAULT '500',
  `battery` int NOT NULL DEFAULT '7000',
  `maxWeight` int NOT NULL DEFAULT '120',
  `topSpeed` int NOT NULL DEFAULT '30',
  `charge` int NOT NULL DEFAULT '9',
  `tiresDiameter` int NOT NULL DEFAULT '9',
  `color` varchar(45) NOT NULL DEFAULT 'black',
  `price` decimal(10,2) NOT NULL DEFAULT '23.00',
  `pic` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicles`
--

LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;
INSERT INTO `vehicles` VALUES (4,'Scooter 4 Pro',23,40,700,350,120,30,9,10,'black',1499.99,'4Pro.png'),(5,'Mi Electric Scooter 3',13,30,600,275,100,25,8,8,'white',949.49,'scooter3.png'),(6,'Mi Electric Scooter Essential',12,20,250,187,100,20,8,8,'black',799.99,'essential.png'),(7,'Mi Electric Scooter Pro 2 Mercedes AMG F1 Team Edition',14,40,600,275,100,25,9,9,'black',1299.99,'pro2Amg.png'),(8,'Mi Electric Scooter Pro 2',14,45,300,474,100,25,8,9,'black',1279.99,'pro2.png');
/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-22 20:26:04
