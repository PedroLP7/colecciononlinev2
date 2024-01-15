-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: pokemon
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
-- Table structure for table `pokemon`
--

DROP TABLE IF EXISTS `pokemon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pokemon` (
  `idPoke` int NOT NULL AUTO_INCREMENT,
  `numPokedex` int NOT NULL,
  `nombrePoke` varchar(255) NOT NULL,
  `idRegion` int NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `coleccion` varchar(255) NOT NULL,
  `imagenPoke` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`idPoke`),
  UNIQUE KEY `numPokedex_UNIQUE` (`numPokedex`),
  KEY `idRegion` (`idRegion`),
  CONSTRAINT `region_ibfk_2` FOREIGN KEY (`idRegion`) REFERENCES `region` (`IDregion`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pokemon`
--

LOCK TABLES `pokemon` WRITE;
/*!40000 ALTER TABLE `pokemon` DISABLE KEYS */;
INSERT INTO `pokemon` VALUES (105,3,'Venusaur',1,'Bulba evolucionado','A','/coleccionM07/imgdata/Venusaur.png','https://www.cardmarket.com/es/Pokemon/Products/Search?searchString=venusaur'),(116,700,'Sylveon',6,'Sylveon tiene apariencia de zorro con orejas de conejo ','kalosPkm','/coleccionM07/imgdata/sylveon.png','https://www.cardmarket.com/es/Pokemon/Products/Search?searchString=sylveon'),(117,260,'Swampert',3,'Pokemon lodo','hoenn masters','/coleccionM07/imgdata/Swampert.png','https://www.cardmarket.com/es/Pokemon/Products/Search?searchString=swampert'),(118,8,'Charmeleon',1,'Pokemon lagarto','Primera generacion colection','/coleccionM07/imgdata/Charmeleon.png','https://www.cardmarket.com/es/Pokemon/Products/Search?searchString=charmeleon'),(119,25,'Pikachu',1,'Raton electrico que acumula electricidad en sus mejillas.','Classic gen','/coleccionM07/imgdata/Pikachu.png','https://www.cardmarket.com/es/Pokemon/Products/Search?searchString=pikachu'),(120,2,'Ivysaur',1,'Evolucion de bulbasaur','Classic gen','/coleccionM07/imgdata/ivysaur.png','https://www.cardmarket.com/es/Pokemon/Products/Search?searchString=ivysaur'),(121,915,'Lechonk',9,'Pokemon cerdo','PaldeaMasters','/coleccionM07/imgdata/300px-Lechonk.png','https://www.cardmarket.com/es/Pokemon/Products/Search?searchString=lechonk');
/*!40000 ALTER TABLE `pokemon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poketiponm`
--

DROP TABLE IF EXISTS `poketiponm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `poketiponm` (
  `idPoke` int NOT NULL,
  `idTipo` int NOT NULL,
  PRIMARY KEY (`idPoke`,`idTipo`),
  KEY `idTipo` (`idTipo`),
  CONSTRAINT `poketiponm_ibfk_1` FOREIGN KEY (`idPoke`) REFERENCES `pokemon` (`idPoke`),
  CONSTRAINT `poketiponm_ibfk_2` FOREIGN KEY (`idTipo`) REFERENCES `tipopokemon` (`idTipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poketiponm`
--

LOCK TABLES `poketiponm` WRITE;
/*!40000 ALTER TABLE `poketiponm` DISABLE KEYS */;
INSERT INTO `poketiponm` VALUES (117,2),(119,5),(118,7),(116,8),(121,11),(105,12),(120,12),(117,16),(105,17),(120,17);
/*!40000 ALTER TABLE `poketiponm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `region` (
  `IDregion` int NOT NULL,
  `nombreRegion` varchar(255) NOT NULL,
  PRIMARY KEY (`IDregion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region`
--

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
INSERT INTO `region` VALUES (1,'Kanto'),(2,'Johto'),(3,'Hoenn'),(4,'Sinnoh'),(5,'Teselia'),(6,'Kalos'),(7,'Alola'),(8,'Galar'),(9,'Paldea');
/*!40000 ALTER TABLE `region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipopokemon`
--

DROP TABLE IF EXISTS `tipopokemon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipopokemon` (
  `idTipo` int NOT NULL AUTO_INCREMENT,
  `nombreTipo` varchar(255) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipopokemon`
--

LOCK TABLES `tipopokemon` WRITE;
/*!40000 ALTER TABLE `tipopokemon` DISABLE KEYS */;
INSERT INTO `tipopokemon` VALUES (1,'Acero'),(2,'Agua'),(3,'Bicho'),(4,'Dragon'),(5,'Electrico'),(6,'Fantasma'),(7,'Fuego'),(8,'Hada'),(9,'Hielo'),(10,'Lucha'),(11,'Normal'),(12,'Planta'),(13,'Psiquico'),(14,'Roca'),(15,'Siniestro'),(16,'Tierra'),(17,'Veneno'),(18,'Volador');
/*!40000 ALTER TABLE `tipopokemon` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-11 21:22:01
