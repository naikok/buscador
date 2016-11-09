-- MySQL dump 10.13  Distrib 5.7.16, for osx10.11 (x86_64)
--
-- Host: localhost    Database: destinia
-- ------------------------------------------------------
-- Server version	5.7.16

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

DROP DATABASE IF EXISTS alojamientodb;
CREATE DATABASE alojamientodb CHARACTER SET utf8 COLLATE utf8_general_ci;

USE destinia;
--
-- Table structure for table `Apartamento`
--

DROP TABLE IF EXISTS `Apartamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Apartamento` (
  `id_hospedaje` int(11) NOT NULL,
  `capacidad` varchar(255) NOT NULL,
  `num_apartamentos` int(11) NOT NULL,
  PRIMARY KEY (`id_hospedaje`),
  CONSTRAINT `fk_ApartamentoHospedaje` FOREIGN KEY (`id_hospedaje`) REFERENCES `Hospedaje` (`id_hospedaje`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Apartamento`
--

LOCK TABLES `Apartamento` WRITE;
/*!40000 ALTER TABLE `Apartamento` DISABLE KEYS */;
INSERT INTO `Apartamento` VALUES (3,'6 adultos',50),(4,'4 adultos',10);
/*!40000 ALTER TABLE `Apartamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Hospedaje`
--

DROP TABLE IF EXISTS `Hospedaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Hospedaje` (
  `id_hospedaje` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `provincia` varchar(255) NOT NULL,
  PRIMARY KEY (`id_hospedaje`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Hospedaje`
--

LOCK TABLES `Hospedaje` WRITE;
/*!40000 ALTER TABLE `Hospedaje` DISABLE KEYS */;
INSERT INTO `Hospedaje` VALUES (1,'Hotel Abba','Huesca','Huesca'),(2,'Hotel Blanco','Mojacar','Almeria'),(3,'Apartamentos Sol y Playa','Málaga','Málaga'),(4,'Apartamentos Beach','Almeria','Almeria');
/*!40000 ALTER TABLE `Hospedaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Hotel`
--

DROP TABLE IF EXISTS `Hotel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Hotel` (
  `id_hospedaje` int(11) NOT NULL,
  `num_estrellas` int(11) NOT NULL,
  `tipo_habitacion` varchar(255) NOT NULL,
  PRIMARY KEY (`id_hospedaje`),
  CONSTRAINT `fk_HotelHospedaje` FOREIGN KEY (`id_hospedaje`) REFERENCES `Hospedaje` (`id_hospedaje`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Hotel`
--

LOCK TABLES `Hotel` WRITE;
/*!40000 ALTER TABLE `Hotel` DISABLE KEYS */;
INSERT INTO `Hotel` VALUES (1,4,'Habitación Doble'),(2,4,'Habitación Doble');
/*!40000 ALTER TABLE `Hotel` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;


/*fixes*/
alter table Hotel modify num_estrellas VARCHAR(255) not null;
alter table Apartamento modify num_apartamentos VARCHAR(255) not null;

update Hotel set num_estrellas="4 estrellas" where id_hospedaje=1;
update Hotel set num_estrellas="4 estrellas" where id_hospedaje=2;

update Apartamento set num_apartamentos="50 apartamentos" where id_hospedaje=3;
update Apartamento set num_apartamentos="10 apartamentos" where id_hospedaje=4;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-03 14:40:17
