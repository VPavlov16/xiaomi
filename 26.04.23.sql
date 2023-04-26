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
  `id` int NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `idMobile Devices_UNIQUE` (`id`)
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
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `idOrders` int NOT NULL AUTO_INCREMENT,
  `Order_date` date NOT NULL,
  PRIMARY KEY (`idOrders`),
  UNIQUE KEY `idOrders_UNIQUE` (`idOrders`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_has_mobile devices`
--

DROP TABLE IF EXISTS `orders_has_mobile devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders_has_mobile devices` (
  `Orders_idOrders` int NOT NULL,
  `Mobile Devices_idMobile Devices` int NOT NULL,
  PRIMARY KEY (`Orders_idOrders`,`Mobile Devices_idMobile Devices`),
  KEY `fk_Orders_has_Mobile Devices_Mobile Devices1_idx` (`Mobile Devices_idMobile Devices`),
  KEY `fk_Orders_has_Mobile Devices_Orders_idx` (`Orders_idOrders`),
  CONSTRAINT `fk_Orders_has_Mobile Devices_Mobile Devices1` FOREIGN KEY (`Mobile Devices_idMobile Devices`) REFERENCES `mobdev` (`id`),
  CONSTRAINT `fk_Orders_has_Mobile Devices_Orders` FOREIGN KEY (`Orders_idOrders`) REFERENCES `orders` (`idOrders`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_has_mobile devices`
--

LOCK TABLES `orders_has_mobile devices` WRITE;
/*!40000 ALTER TABLE `orders_has_mobile devices` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_has_mobile devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_has_smart devices`
--

DROP TABLE IF EXISTS `orders_has_smart devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders_has_smart devices` (
  `Orders_idOrders` int NOT NULL,
  `Smart devices_idSmart devices` int NOT NULL,
  PRIMARY KEY (`Orders_idOrders`,`Smart devices_idSmart devices`),
  KEY `fk_Orders_has_Smart devices_Smart devices1_idx` (`Smart devices_idSmart devices`),
  KEY `fk_Orders_has_Smart devices_Orders1_idx` (`Orders_idOrders`),
  CONSTRAINT `fk_Orders_has_Smart devices_Orders1` FOREIGN KEY (`Orders_idOrders`) REFERENCES `orders` (`idOrders`),
  CONSTRAINT `fk_Orders_has_Smart devices_Smart devices1` FOREIGN KEY (`Smart devices_idSmart devices`) REFERENCES `smart_devices` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_has_smart devices`
--

LOCK TABLES `orders_has_smart devices` WRITE;
/*!40000 ALTER TABLE `orders_has_smart devices` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_has_smart devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_has_vehicles`
--

DROP TABLE IF EXISTS `orders_has_vehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders_has_vehicles` (
  `Orders_idOrders` int NOT NULL,
  `Vehicles_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Orders_idOrders`,`Vehicles_id`),
  UNIQUE KEY `Orders_idOrders_UNIQUE` (`Orders_idOrders`),
  UNIQUE KEY `Vehicles_id_UNIQUE` (`Vehicles_id`),
  CONSTRAINT `Orders_idOrders` FOREIGN KEY (`Orders_idOrders`) REFERENCES `orders` (`idOrders`),
  CONSTRAINT `Vehicles_id` FOREIGN KEY (`Vehicles_id`) REFERENCES `vehicles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_has_vehicles`
--

LOCK TABLES `orders_has_vehicles` WRITE;
/*!40000 ALTER TABLE `orders_has_vehicles` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_has_vehicles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_has_wearable`
--

DROP TABLE IF EXISTS `orders_has_wearable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders_has_wearable` (
  `Orders_idOrders` int NOT NULL,
  `Wearable_idWearable` int NOT NULL,
  PRIMARY KEY (`Orders_idOrders`,`Wearable_idWearable`),
  KEY `fk_Orders_has_Wearable_Wearable1_idx` (`Wearable_idWearable`),
  KEY `fk_Orders_has_Wearable_Orders1_idx` (`Orders_idOrders`),
  CONSTRAINT `fk_Orders_has_Wearable_Orders1` FOREIGN KEY (`Orders_idOrders`) REFERENCES `orders` (`idOrders`),
  CONSTRAINT `fk_Orders_has_Wearable_Wearable1` FOREIGN KEY (`Wearable_idWearable`) REFERENCES `wearable` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_has_wearable`
--

LOCK TABLES `orders_has_wearable` WRITE;
/*!40000 ALTER TABLE `orders_has_wearable` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_has_wearable` ENABLE KEYS */;
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
  `type` varchar(45) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registers`
--

LOCK TABLES `registers` WRITE;
/*!40000 ALTER TABLE `registers` DISABLE KEYS */;
INSERT INTO `registers` VALUES (7,'petko','asd','imi@asd','03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4','user'),(8,'Registriram se','Ot telefona','tuieottelanaveni@abv.bg','4a31b3a94f8b9446588917a9e7aaa11bb13ee52d63136678623bb1667e8c1b77','user'),(9,'Venelin e gei','❤️❤️❤️❤️❤️????','dhdhf@abv.bg','932679c1574b5b1e8376929acad78bac544fde36f2b7eb10f463d971d904885e','user'),(10,'Venelin','Pavlov','edno@abv.bg','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','admin'),(11,'a','s','imi@abv.bg','b3440b114d53365b37df79cacfe85af6f327faf074efd6d05a8940a427f4180c','user'),(12,'EMilka','Pilka','imeilche@abv.bg','329d3c818a604b1927a79b53fcac76d952ff4cfec42dbc020cd30d6fc0c38b70','user');
/*!40000 ALTER TABLE `registers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `smart_devices`
--

DROP TABLE IF EXISTS `smart_devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `smart_devices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Model` varchar(45) NOT NULL,
  `price` double NOT NULL,
  `suction_power` int NOT NULL,
  `pic` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idSmart devices_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `smart_devices`
--

LOCK TABLES `smart_devices` WRITE;
/*!40000 ALTER TABLE `smart_devices` DISABLE KEYS */;
INSERT INTO `smart_devices` VALUES (1,'Mi Robot Vacuum-Mop 2 Lite',338,2200,'mbvacuum-mop2lite.png'),(2,'Mi Robot Vacuum-Mop 2 pro',672,3000,'mbvacuum-mop2pro.png'),(3,'Mi Robot Vacuum-Mop 2 ultra',950,4000,'mbvacuum-mop2ultra.png'),(4,'Xiaomi Robot Vacuum E10',450,4000,'xirobot_vacuumE10.png'),(5,'Xiaomi Robot Vacuum S10',600,4000,'xirobot_vacuumS10.png'),(6,'Xiaomi Robot Vacuum-Mop 2S',590,2500,'xirobot_vacuum-mop2s.png');
/*!40000 ALTER TABLE `smart_devices` ENABLE KEYS */;
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

--
-- Table structure for table `wearable`
--

DROP TABLE IF EXISTS `wearable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wearable` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Model` varchar(45) NOT NULL,
  `price` double NOT NULL,
  `display` varchar(45) NOT NULL,
  `battery` int NOT NULL,
  `pic` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idWearable_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wearable`
--

LOCK TABLES `wearable` WRITE;
/*!40000 ALTER TABLE `wearable` DISABLE KEYS */;
INSERT INTO `wearable` VALUES (1,'Mi Smart Band 7',100,'490×192',180,'mi_smartbrand7.png'),(2,'Redmi Smart Band 2 Strap',16,'172x320',210,'redmisb2_strap.png'),(3,'Redmi watch 2 lite',120,'360x320',262,'redmiwatch2_lite.png'),(4,'Redmi watch 3',200,'450x390',262,'redmiwatch3.png'),(5,'Xiaomi Watch S1',450,'466x466',470,'xiaomiwatch_s1.png'),(6,'Xiaomi Watch S1 active',370,'466x466',470,'xiaomiwatch_s1active.png');
/*!40000 ALTER TABLE `wearable` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-26 10:59:11
