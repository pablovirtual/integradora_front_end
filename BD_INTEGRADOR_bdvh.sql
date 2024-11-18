-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bdvh
-- ------------------------------------------------------
-- Server version	8.3.0

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
-- Table structure for table `arrendamiento`
--

DROP TABLE IF EXISTS `arrendamiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arrendamiento` (
  `idarrendamiento` int NOT NULL AUTO_INCREMENT,
  `no_casa` int DEFAULT NULL,
  `id_propietario` int DEFAULT NULL,
  PRIMARY KEY (`idarrendamiento`)
) ENGINE=InnoDB AUTO_INCREMENT=1017 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='en esta tabla incluye el contrato de arrendamiento, id del contrato propietario id';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arrendamiento`
--

LOCK TABLES `arrendamiento` WRITE;
/*!40000 ALTER TABLE `arrendamiento` DISABLE KEYS */;
INSERT INTO `arrendamiento` VALUES (1010,1,106),(1011,2,105),(1012,3,103),(1013,4,104),(1015,5,101),(1016,6,102);
/*!40000 ALTER TABLE `arrendamiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `casa`
--

DROP TABLE IF EXISTS `casa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `casa` (
  `idcasa` int NOT NULL AUTO_INCREMENT,
  `no_casa` int DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `tipo_de_operacion` int NOT NULL,
  `Id_propietario` int NOT NULL,
  PRIMARY KEY (`idcasa`),
  KEY `fk_tipo_de_operacion` (`tipo_de_operacion`),
  KEY `fk_id_propietario` (`Id_propietario`),
  CONSTRAINT `fk_tipo_de_operacion` FOREIGN KEY (`tipo_de_operacion`) REFERENCES `tipo_operacion` (`Id_operacion`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='tabla para registrar los datos de la casa y el id del propietario';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `casa`
--

LOCK TABLES `casa` WRITE;
/*!40000 ALTER TABLE `casa` DISABLE KEYS */;
INSERT INTO `casa` VALUES (103,4,'calle hermoso','desabitada',1,103),(105,11,'calle tule','habitada',11,107),(106,60,'calle bosques','desabitada',12,108),(107,4,'calle hermoso','habitada',13,109),(108,42,'calle vista','desabitada',14,110),(110,10,'Calle vista','desabitada',16,112);
/*!40000 ALTER TABLE `casa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propietario`
--

DROP TABLE IF EXISTS `propietario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `propietario` (
  `Idpropietario` int NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(45) NOT NULL,
  `Apellidos` varchar(45) NOT NULL,
  `telefono` int DEFAULT NULL,
  PRIMARY KEY (`Idpropietario`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propietario`
--

LOCK TABLES `propietario` WRITE;
/*!40000 ALTER TABLE `propietario` DISABLE KEYS */;
INSERT INTO `propietario` VALUES (102,'Carlos','Gutierrez',33),(103,'Maria','Gonzalez',33),(105,'Javier','Zarate',33),(107,'lupe ','duran',33),(108,'joselito ','carrillo',55),(109,'Carmen','Cobarrubias',55),(110,'Ramiro ','Ramirez',55),(112,'Juan','Lopez',66);
/*!40000 ALTER TABLE `propietario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_operacion`
--

DROP TABLE IF EXISTS `tipo_operacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_operacion` (
  `Id_operacion` int NOT NULL AUTO_INCREMENT,
  `tipo_operacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_operacion`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='en este table se especifica si la casa esta en renta,venta o habitada';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_operacion`
--

LOCK TABLES `tipo_operacion` WRITE;
/*!40000 ALTER TABLE `tipo_operacion` DISABLE KEYS */;
INSERT INTO `tipo_operacion` VALUES (1,'renta'),(5,'venta'),(6,'venta'),(7,'venta'),(8,'venta'),(9,'venta'),(10,'venta'),(11,'venta'),(12,'venta'),(13,'venta'),(14,'venta'),(16,'venta');
/*!40000 ALTER TABLE `tipo_operacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_autorizados`
--

DROP TABLE IF EXISTS `usuarios_autorizados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios_autorizados` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_autorizados`
--

LOCK TABLES `usuarios_autorizados` WRITE;
/*!40000 ALTER TABLE `usuarios_autorizados` DISABLE KEYS */;
INSERT INTO `usuarios_autorizados` VALUES (1,'pedro@udg','123');
/*!40000 ALTER TABLE `usuarios_autorizados` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-18  0:58:49
