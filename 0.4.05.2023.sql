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
-- Table structure for table `mobdev`
--

DROP TABLE IF EXISTS `mobdev`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mobdev` (
  `id` int NOT NULL,
  `Model` varchar(45) NOT NULL,
  `price` double NOT NULL,
  `CPU` varchar(45) NOT NULL,
  `GPU` varchar(45) NOT NULL,
  `battery` int NOT NULL DEFAULT '4000',
  `storage` int NOT NULL,
  `ram` int NOT NULL,
  `front_camera` int NOT NULL,
  `rear_camera` int NOT NULL,
  `description` text NOT NULL,
  `pic` varchar(45) NOT NULL,
  `pic1` varchar(45) NOT NULL,
  `pic2` varchar(45) NOT NULL,
  `pic3` varchar(45) NOT NULL,
  `pic4` varchar(45) NOT NULL,
  UNIQUE KEY `idMobile Devices_UNIQUE` (`id`),
  CONSTRAINT `fk_id1` FOREIGN KEY (`id`) REFERENCES `products` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mobdev`
--

LOCK TABLES `mobdev` WRITE;
/*!40000 ALTER TABLE `mobdev` DISABLE KEYS */;
INSERT INTO `mobdev` VALUES (100,'Xiaomi Mi 11',1440,'Snapdragon 888','Adreno 660',4000,128,8,20,108,'Xiaomi Mi 11 is a flagship mobile phone with a powerful Snapdragon 888 processor, a large 6.81-inch AMOLED display, and a stunning 108MP camera.','mi11.jpg','mi11(1).jpg','mi11(2).jpg','mi11(3).jpg','mi11(4).jpg'),(101,'Xiaomi Redmi Note 10 Pro',450,'Snapdragon 732G','Adreno 618',4000,128,6,16,64,'Xiaomi Redmi Note 10 Pro is a mid-range mobile phone with a large 6.67-inch AMOLED display, a powerful Snapdragon 732G processor, and a high-resolution 64MP quad-camera setup.','note10pro.jpg','note10pro(1).jpg','note10pro(2).jpg','note10pro(3).jpg','note10pro(4).jpg'),(102,'Xiaomi Redmi Note 11S',540,'MediaTek Dimensity 900U','Mali-G78 MC4',4000,128,6,20,64,'Xiaomi Redmi Note 11S is a mid-range mobile phone with a large 6.43-inch AMOLED display, a powerful MediaTek Dimensity 900U processor, and a high-resolution 64MP quad-camera setup.','note11s.png','note11s(1).png','note11s(2).png','note11s(3).png','note11s(4).png'),(103,'Xiaomi Redmi Note 12',499,'MediaTek Dimensity 1200','Mali-G77 MC9',4000,256,8,16,108,'Xiaomi Redmi Note 12 is a high-end mobile phone with a large 6.81-inch AMOLED display, a powerful MediaTek Dimensity 1200 processor, and a high-resolution 108MP quad-camera setup.','note12.png','note12(1).png','note12(2).png','note12(3).png','note12(4).png'),(104,'Xiaomi Redmi Note 12 Pro',699,'Qualcomm Snapdragon 870','Adreno 650',4000,256,12,16,108,'Xiaomi Redmi Note 12 Pro is a high-end mobile phone with a large 6.81-inch AMOLED display, a powerful Qualcomm Snapdragon 870 processor, and a high-resolution 108MP quad-camera setup.','note12pro.png','note12pro(1).png','note12pro(2).png','note12pro(3).png','note12pro(4).png'),(105,'Xiaomi Mi 13',1950,'Qualcomm Snapdragon 8 Gen 1','Adreno 730',4000,512,16,32,108,'Xiaomi Mi 13 is a premium mobile phone with a large 6.7-inch AMOLED display, a powerful Qualcomm Snapdragon 8 Gen 1 processor, and a high-resolution 108MP quad-camera setup.','xiaomi13.png','xiaomi13(1).png','xiaomi13(2).png','xiaomi13(3).png','xiaomi13(4).png'),(106,'Xiaomi Mi 13 Lite',1000,'Qualcomm Snapdragon 778G','Adreno 642L',4000,128,6,16,64,'Xiaomi Mi 13 Lite is a mid-range mobile phone with a large 6.67-inch AMOLED display, a powerful Qualcomm Snapdragon 778G processor, and a high-resolution 64MP quad-camera setup.','xiaomi13lite.png','xiaomi13lite(1).png','xiaomi13lite(2).png','xiaomi13lite(3).png','xiaomi13lite(4).png'),(107,'Xiaomi Mi 13 Pro',2550,'Qualcomm Snapdragon 8 Gen 1','Adreno 730',4000,512,16,32,108,'Xiaomi Mi 13 Pro is a premium mobile phone with a large 6.7-inch AMOLED display, a powerful Qualcomm Snapdragon 8 Gen 1 processor, and a high-resolution 108MP quad-camera setup.','xiaomi13pro.png','xiaomi13pro(1).png','xiaomi13pro(2).png','xiaomi13pro(3).png','xiaomi13pro(4).png');
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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL,
  `Product_type` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `1_UNIQUE` (`Product_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (100,NULL),(101,NULL),(102,NULL),(103,NULL),(104,NULL),(105,NULL),(106,NULL),(107,NULL),(200,NULL),(201,NULL),(202,NULL),(203,NULL),(204,NULL),(205,NULL),(300,NULL),(301,NULL),(302,NULL),(303,NULL),(304,NULL),(400,NULL),(401,NULL),(402,NULL),(403,NULL),(404,NULL),(405,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registers`
--

LOCK TABLES `registers` WRITE;
/*!40000 ALTER TABLE `registers` DISABLE KEYS */;
INSERT INTO `registers` VALUES (7,'petko','asd','imi@asd','03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4','user'),(8,'Registriram se','Ot telefona','tuieottelanaveni@abv.bg','4a31b3a94f8b9446588917a9e7aaa11bb13ee52d63136678623bb1667e8c1b77','user'),(9,'Venelin e gei','❤️❤️❤️❤️❤️????','dhdhf@abv.bg','932679c1574b5b1e8376929acad78bac544fde36f2b7eb10f463d971d904885e','user'),(10,'parolataE123','nz','edno@abv.bg','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','admin');
/*!40000 ALTER TABLE `registers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `smart_devices`
--

DROP TABLE IF EXISTS `smart_devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `smart_devices` (
  `id` int NOT NULL,
  `Model` varchar(45) NOT NULL,
  `price` double NOT NULL,
  `suction_power` int NOT NULL,
  `battery_life` int NOT NULL,
  `dust_tank` int NOT NULL,
  `water_tank` int NOT NULL,
  `pic` varchar(45) NOT NULL,
  `pic1` varchar(45) NOT NULL,
  `pic2` varchar(45) NOT NULL,
  `pic3` varchar(45) NOT NULL,
  `pic4` varchar(45) NOT NULL,
  KEY `fk_id_idx` (`id`),
  CONSTRAINT `fk_id2` FOREIGN KEY (`id`) REFERENCES `products` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `smart_devices`
--

LOCK TABLES `smart_devices` WRITE;
/*!40000 ALTER TABLE `smart_devices` DISABLE KEYS */;
INSERT INTO `smart_devices` VALUES (200,'Mi Robot Vacuum-Mop 2 Lite',338,2200,90,450,270,'mbvacuum-mop2lite.png','mbvacuum-mop2lite(1).png','mbvacuum-mop2lite(2).png','mbvacuum-mop2lite(3).png','mbvacuum-mop2lite(4).png'),(201,'Mi Robot Vacuum-Mop 2 pro',672,3000,180,450,250,'mbvacuum-mop2pro.png','mbvacuum-mop2pro(1).png','mbvacuum-mop2pro(2).png','mbvacuum-mop2pro(3).png','mbvacuum-mop2pro(4).png'),(202,'Mi Robot Vacuum-Mop 2 ultra',950,4000,180,550,200,'mbvacuum-mop2ultra.png','mbvacuum-mop2ultra(1).png','mbvacuum-mop2ultra(2).png','mbvacuum-mop2ultra(3).png','mbvacuum-mop2ultra(4).png'),(203,'Xiaomi Robot Vacuum E10',450,4000,110,400,200,'xirobot_vacuumE10.png','xirobot_vacuumE10(1).png','xirobot_vacuumE10(2).png','xirobot_vacuumE10(3).png','xirobot_vacuumE10(4).png'),(204,'Xiaomi Robot Vacuum S10',600,4000,130,300,170,'xirobot_vacuumS10.png','xirobot_vacuumS10(1).png','xirobot_vacuumS10(2).png','xirobot_vacuumS10(3).png','xirobot_vacuumS10(4).png'),(205,'Xiaomi Robot Vacuum-Mop 2S',590,2500,170,550,250,'xirobot_vacuum-mop2s.png','xirobot_vacuum-mop2s(1).png','xirobot_vacuum-mop2s(2).png','xirobot_vacuum-mop2s(3).png','xirobot_vacuum-mop2s(4).png');
/*!40000 ALTER TABLE `smart_devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicles` (
  `id` int NOT NULL,
  `Model` varchar(255) NOT NULL DEFAULT 'a',
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
  `pic1` varchar(45) NOT NULL,
  `pic2` varchar(45) NOT NULL,
  `pic3` varchar(45) NOT NULL,
  `pic4` varchar(45) NOT NULL,
  UNIQUE KEY `id_UNIQUE` (`id`),
  CONSTRAINT `fk_id3` FOREIGN KEY (`id`) REFERENCES `products` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicles`
--

LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;
INSERT INTO `vehicles` VALUES (300,'Scooter 4 Pro',23,40,700,350,120,30,9,10,'black',1499.99,'4Pro.png','4Pro(1).png','4Pro(2).png','4Pro(3).png','4Pro(4).png'),(301,'Mi Electric Scooter 3',13,30,600,275,100,25,8,8,'white',949.49,'scooter3.png','scooter3(1).png','scooter3(2).png','scooter3(3).png','scooter3(4).png'),(302,'Mi Electric Scooter Essential',12,20,250,187,100,20,8,8,'black',799.99,'essential.png','essential(1).png','essential(2).png','essential(3).png','essential(4).png'),(303,'Mi Electric Scooter Pro 2 Mercedes AMG F1 Team Edition',14,40,600,275,100,25,9,9,'black',1299.99,'pro2Amg.png','pro2Amg(1).png','pro2Amg(2).png','pro2Amg(3).png','pro2Amg(4).png'),(304,'Mi Electric Scooter Pro 2',14,45,300,474,100,25,8,9,'black',1279.99,'pro2.png','pro2(1).png','pro2(2).png','pro2(3).png','pro2(4).png');
/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wearable`
--

DROP TABLE IF EXISTS `wearable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wearable` (
  `id` int NOT NULL,
  `Model` varchar(45) NOT NULL,
  `price` double NOT NULL,
  `display` varchar(45) NOT NULL,
  `battery` int DEFAULT NULL,
  `GPS` varchar(45) DEFAULT NULL,
  `bluetooth` varchar(45) DEFAULT NULL,
  `pic` varchar(45) NOT NULL,
  `pic1` varchar(45) NOT NULL,
  `pic2` varchar(45) NOT NULL,
  `pic3` varchar(45) NOT NULL,
  `pic4` varchar(45) NOT NULL,
  UNIQUE KEY `idWearable_UNIQUE` (`id`),
  CONSTRAINT `fk_id4` FOREIGN KEY (`id`) REFERENCES `products` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wearable`
--

LOCK TABLES `wearable` WRITE;
/*!40000 ALTER TABLE `wearable` DISABLE KEYS */;
INSERT INTO `wearable` VALUES (400,'Mi Smart Band 7',100,'490×192',180,'No','Bluetooth 5.2','mi_smartbrand7.png','mi_smartbrand7(1).png','mi_smartbrand7(2).png','mi_smartbrand7(3).png','mi_smartbrand7(4).png'),(401,'Redmi Smart Band 2 Strap',16,'172x320',0,'No','No','redmisb2_strap.png','redmisb2_strap(1).png','redmisb2_strap(2).png','redmisb2_strap(3).png','redmisb2_strap(4).png'),(402,'Redmi watch 2 lite',120,'360x320',262,'Yes','Bluetooth 5.1','redmiwatch2_lite.png','redmiwatch2_lite(1).png','redmiwatch2_lite(2).png','redmiwatch2_lite(3).png','redmiwatch2_lite(4).png'),(403,'Redmi watch 3',200,'450x390',262,'Yes','Bluetooth 5.2','redmiwatch3.png','redmiwatch3(1).png','redmiwatch3(2).png','redmiwatch3(3).png','redmiwatch3(4).png'),(404,'Xiaomi Watch S1',450,'466x466',470,'Yes','Bluetooth 5.2','xiaomiwatch_s1.png','xiaomiwatch_s1(1).png','xiaomiwatch_s1(2).png','xiaomiwatch_s1(3).png','xiaomiwatch_s1(4).png'),(405,'Xiaomi Watch S1 active',370,'466x466',470,'Yes','Bluetooth 5.2','xiaomiwatch_s1active.png','xiaomiwatch_s1active(1).png','xiaomiwatch_s1active(2).png','xiaomiwatch_s1active(3).png','xiaomiwatch_s1active(4).png');
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

-- Dump completed on 2023-05-06 12:09:49
