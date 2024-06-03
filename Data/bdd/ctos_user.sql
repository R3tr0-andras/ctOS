-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ctos
-- ------------------------------------------------------
-- Server version	8.1.0

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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `userPseudo` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userFirstName` varchar(255) NOT NULL,
  `userGenre` char(1) DEFAULT NULL,
  `userBirthDate` date DEFAULT NULL,
  `userPhoneNumber` varchar(20) DEFAULT NULL,
  `userJobs` varchar(255) DEFAULT NULL,
  `userIncome` decimal(10,2) DEFAULT NULL,
  `userRole` varchar(255) NOT NULL,
  `userEthnic` varchar(255) DEFAULT NULL,
  `userProfileImage` varchar(255) DEFAULT NULL,
  `userIsFaker` tinyint(1) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'R3tr0','god@gmail.com','00000000','Corda','Andras','M','2005-09-05','0470383773','Dev',0.00,'user','Blanc, belge','userDieu.jpg',0),(8,'oula heu ouais oula','ouaisouais@gmail.come','MYway2019','Constant','Louka','M','2007-01-05','0478650354','chomeur de wish',0.00,'user','blanc, Europe (Belge) origine Tchétchienne','userProfile20240402092315.jpg',0),(10,'le roux','bechetludo@gmail.com','azertyuiop','Bechet','Ludo','M','2007-10-15','0470269943','chomeur',40.00,'user','nigga','userProfile20240402093726.jpg',0),(11,'Trex_2007','adrienb2007@gmail.com','cookie1234','Brahy','Adrien','M','2007-08-27','0479389760','Etudiant',0.00,'user','blanc, Européen(belge)','userProfile20240402095134.jpg',0),(47,'Sozo','sophiegoblet@gmail.com','gobletsophie','Gobelet','Sophie','F','1992-11-01','0497856413','Professeur de sciences',152420.00,'user','Blanc, Belge Européen','userProfile20240529192508.jpg',0),(48,'Herba','anneherbillon@gmail.com','herbachat','Herbillon','Anne','F','1976-10-04','0452147154','Secrétaire scolaire',10000000.00,'user','Blanc, Belge Européen','userProfile20240529192713.jpg',0),(49,'MadameDeMathématique','MadameDeMathematique@gmail.com','','Taildeman','Ann Perpète','F','1999-03-04','0415568442','Professeur de mathématique',1781354.00,'user','Blanc, Belge Européen','userProfile20240529192916.jpg',0),(50,'Bea','baudson@hotmail.be','uwuuwuuwu','Baudson','Béatrice','F','1981-11-30','000000000','Professeur d\'informatique',187454.00,'user','Blanc, Belge Européen','userProfile20240529193634.jpg',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-03 11:32:57
