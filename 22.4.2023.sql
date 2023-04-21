-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: xiaomi
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `mobile devices`
--

DROP TABLE IF EXISTS `mobile devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mobile devices` (
  `idMobile Devices` int NOT NULL AUTO_INCREMENT,
  `Model` varchar(45) NOT NULL,
  `price` double NOT NULL,
  `CPU` varchar(45) NOT NULL,
  `GPU` varchar(45) NOT NULL,
  `Storage` int NOT NULL,
  `Ram` int NOT NULL,
  `Front camera` int NOT NULL,
  `Rear camera` int NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`idMobile Devices`),
  UNIQUE KEY `idMobile Devices_UNIQUE` (`idMobile Devices`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mobile devices`
--

LOCK TABLES `mobile devices` WRITE;
/*!40000 ALTER TABLE `mobile devices` DISABLE KEYS */;
/*!40000 ALTER TABLE `mobile devices` ENABLE KEYS */;
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
  CONSTRAINT `fk_Orders_has_Mobile Devices_Mobile Devices1` FOREIGN KEY (`Mobile Devices_idMobile Devices`) REFERENCES `mobile devices` (`idMobile Devices`),
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
  CONSTRAINT `fk_Orders_has_Smart devices_Smart devices1` FOREIGN KEY (`Smart devices_idSmart devices`) REFERENCES `smart_devices` (`idSmart devices`)
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
  CONSTRAINT `fk_Orders_has_Wearable_Wearable1` FOREIGN KEY (`Wearable_idWearable`) REFERENCES `wearable` (`idWearable`)
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
-- Table structure for table `smart_devices`
--

DROP TABLE IF EXISTS `smart_devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `smart_devices` (
  `idSmart devices` int NOT NULL AUTO_INCREMENT,
  `Model` varchar(45) NOT NULL,
  `price` double NOT NULL,
  `suction_power` int NOT NULL,
  `pic` varchar(45) NOT NULL,
  PRIMARY KEY (`idSmart devices`),
  UNIQUE KEY `idSmart devices_UNIQUE` (`idSmart devices`)
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
  `idWearable` int NOT NULL AUTO_INCREMENT,
  `Model` varchar(45) NOT NULL,
  `price` double NOT NULL,
  `display` varchar(45) NOT NULL,
  `battery` int NOT NULL,
  `pic` varchar(45) NOT NULL,
  PRIMARY KEY (`idWearable`),
  UNIQUE KEY `idWearable_UNIQUE` (`idWearable`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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

-- Dump completed on 2023-04-22  0:35:30
