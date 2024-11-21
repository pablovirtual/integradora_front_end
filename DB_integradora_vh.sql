
-- This SQL script creates and populates a database named `bdvh` with tables for managing house data, owners, operation types, and authorized users.

-- Database creation and usage
-- ---------------------------
-- CREATE DATABASE IF NOT EXISTS `bdvh`: Creates the `bdvh` database if it does not already exist.
-- USE `bdvh`: Selects the `bdvh` database for subsequent operations.

-- Table: casa
-- ------------
-- DROP TABLE IF EXISTS `casa`: Drops the `casa` table if it exists.
-- CREATE TABLE `casa`: Creates the `casa` table with columns for house ID, house number, address, state, operation type, and owner ID.
-- PRIMARY KEY (`idcasa`): Sets `idcasa` as the primary key.
-- FOREIGN KEY (`Id_propietario`): References `Idpropietario` in the `propietario` table.
-- FOREIGN KEY (`tipo_de_operacion`): References `Id_operacion` in the `tipo_operacion` table.
-- INSERT INTO `casa`: Inserts sample data into the `casa` table.

-- Table: propietario
-- -------------------
-- DROP TABLE IF EXISTS `propietario`: Drops the `propietario` table if it exists.
-- CREATE TABLE `propietario`: Creates the `propietario` table with columns for owner ID, first name, last name, and phone number.
-- PRIMARY KEY (`Idpropietario`): Sets `Idpropietario` as the primary key.
-- INSERT INTO `propietario`: Inserts sample data into the `propietario` table.

-- Table: tipo_operacion
-- ----------------------
-- DROP TABLE IF EXISTS `tipo_operacion`: Drops the `tipo_operacion` table if it exists.
-- CREATE TABLE `tipo_operacion`: Creates the `tipo_operacion` table with columns for operation ID and operation type.
-- PRIMARY KEY (`Id_operacion`): Sets `Id_operacion` as the primary key.
-- INSERT INTO `tipo_operacion`: Inserts sample data into the `tipo_operacion` table.

-- Table: usuarios_autorizados
-- ----------------------------
-- DROP TABLE IF EXISTS `usuarios_autorizados`: Drops the `usuarios_autorizados` table if it exists.
-- CREATE TABLE `usuarios_autorizados`: Creates the `usuarios_autorizados` table with columns for user ID, email, and password.
-- PRIMARY KEY (`ID`): Sets `ID` as the primary key.
-- INSERT INTO `usuarios_autorizados`: Inserts sample data into the `usuarios_autorizados` table.

-- Additional settings and configurations
-- ---------------------------------------
-- Various settings and configurations are applied before and after the creation and population of tables, such as character sets, time zones, unique checks, foreign key checks, and SQL modes.

CREATE DATABASE  IF NOT EXISTS `bdvh` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bdvh`;
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
-- Table structure for table `casa`
--

DROP TABLE IF EXISTS `casa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `casa` (
  `idcasa` int NOT NULL AUTO_INCREMENT,
  `no_casa` int DEFAULT NULL,
  `direccion` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tipo_de_operacion` int NOT NULL,
  `Id_propietario` int NOT NULL,
  PRIMARY KEY (`idcasa`),
  KEY `fk_tipo_de_operacion` (`tipo_de_operacion`),
  KEY `fk_id_propietario` (`Id_propietario`),
  CONSTRAINT `fk_id_propietario` FOREIGN KEY (`Id_propietario`) REFERENCES `propietario` (`Idpropietario`),
  CONSTRAINT `fk_tipo_de_operacion` FOREIGN KEY (`tipo_de_operacion`) REFERENCES `tipo_operacion` (`Id_operacion`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='tabla para registrar los datos de la casa y el id del propietario';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `casa`
--

LOCK TABLES `casa` WRITE;
/*!40000 ALTER TABLE `casa` DISABLE KEYS */;
INSERT INTO `casa` VALUES (105,11,'calle tule','habitada',11,107),(106,60,'calle bosques','desabitada',12,108),(107,4,'calle hermoso','habitada',13,109),(108,42,'calle vista','desabitada',14,110),(124,50,'calle vista','ocupada',30,126),(125,123,'calle lindavista','ocupada',31,127),(127,654,'calle valle','desocupada',33,129),(128,4567,'calle valle','ocupado',34,130),(129,45621,'calle tula','ocupada',35,131),(130,12,'calle tule','desocupada',36,132),(131,1,'calle tule','ocupada',37,133);
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
  `Nombres` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Apellidos` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono` int DEFAULT NULL,
  PRIMARY KEY (`Idpropietario`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propietario`
--

LOCK TABLES `propietario` WRITE;
/*!40000 ALTER TABLE `propietario` DISABLE KEYS */;
INSERT INTO `propietario` VALUES (102,'Carlos','Gutierrez',33),(105,'Javier','Zarate',33),(107,'lupe ','duran',33),(108,'joselito ','carrillo',55),(109,'Carmen','Cobarrubias',55),(110,'Ramiro ','Ramirez',55),(126,'ruben','cabos',3333),(127,'monica','covarrubias',55),(129,'josefina','ramirez',456456),(130,'carlos ','rodriguez',4564),(131,'guillermo','franco',78998),(132,'joel','val',4569),(133,'modesto alejandro','martinez martinez',9678956);
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
  `tipo_operacion` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`Id_operacion`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='en este table se especifica si la casa esta en renta,venta o habitada';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_operacion`
--

LOCK TABLES `tipo_operacion` WRITE;
/*!40000 ALTER TABLE `tipo_operacion` DISABLE KEYS */;
INSERT INTO `tipo_operacion` VALUES (5,'venta'),(6,'venta'),(7,'venta'),(8,'venta'),(9,'venta'),(10,'venta'),(11,'venta'),(12,'venta'),(13,'venta'),(14,'venta'),(30,'renta'),(31,'renta'),(33,'venta'),(34,'renta'),(35,'renta'),(36,'venta'),(37,'renta');
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
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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

-- Dump completed on 2024-11-18 23:04:03
