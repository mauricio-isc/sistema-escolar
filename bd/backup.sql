-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: escuela
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumno` (
  `ID_Alumno` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) DEFAULT NULL,
  `Apellido_Materno` varchar(25) DEFAULT NULL,
  `Apellido_Paterno` varchar(25) DEFAULT NULL,
  `CURP` varchar(25) DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `ID_Carrera` int DEFAULT NULL,
  PRIMARY KEY (`ID_Alumno`),
  KEY `ID_Carrera` (`ID_Carrera`),
  CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`ID_Carrera`) REFERENCES `carreras` (`ID_Carrera`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` VALUES (3,'Mauricio','Nava','Sanchez','SANM0115HMCNVRA6','2003-01-15',NULL),(4,'Mariana','Gutierrez','Tellez','GUTTE221MASQ2','2003-05-15',NULL),(5,'Samuel','Mendoza','Alva','ASNMSST45SN4','2003-08-25',NULL),(6,'Edith','Sanchez','Nava','SANMVRA2912NSN22','2003-04-18',NULL),(7,'Mario','Gutierrez','Ayala','MAYSGUTMA232MGT3','2003-09-24',NULL),(10,'Abraham','Amador','Remigio','ARA011ABJ6','2003-08-28',NULL),(14,'Roman','Cruz','Sanchez','ROMCSA625CR12','2002-09-02',NULL),(16,'Gabriel','Martinez','Nava','MADEJFNQ2932NDN2','1997-08-18',NULL),(17,'Brandon','Torres','Perez','BRADJENGL6840JB45','2001-07-30',NULL),(18,'Frida','Rojas','Hernandez','HERNSRDZ233SAC','2002-05-22',NULL);
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumnos` (
  `ID_Alumno` int NOT NULL AUTO_INCREMENT,
  `NombreUsuario` varchar(50) NOT NULL,
  `Contraseña` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_Alumno`),
  UNIQUE KEY `NombreUsuario` (`NombreUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES (3,'Mauricio','mauu'),(4,'mariana','12345'),(5,'Samuel','samu12'),(6,'Edith','edu'),(7,'Mario','mario12'),(10,'Abraham','abra12'),(14,'Roman','rom12'),(16,'Gabriel','gabs12'),(17,'Brandon','bran123'),(18,'Frida','8d644f5f1d61d64b5b02f36e8f50da70');
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignaciones`
--

DROP TABLE IF EXISTS `asignaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asignaciones` (
  `ID_Asignacion` int NOT NULL AUTO_INCREMENT,
  `ID_Maestro` int DEFAULT NULL,
  `ID_Calificacion` int DEFAULT NULL,
  `TipoAsignacion` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID_Asignacion`),
  KEY `ID_Maestro` (`ID_Maestro`),
  KEY `ID_Calificacion` (`ID_Calificacion`),
  CONSTRAINT `asignaciones_ibfk_1` FOREIGN KEY (`ID_Maestro`) REFERENCES `maestro` (`ID_Maestro`),
  CONSTRAINT `asignaciones_ibfk_2` FOREIGN KEY (`ID_Calificacion`) REFERENCES `calificaciones` (`ID_Calificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignaciones`
--

LOCK TABLES `asignaciones` WRITE;
/*!40000 ALTER TABLE `asignaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `asignaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calificaciones`
--

DROP TABLE IF EXISTS `calificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `calificaciones` (
  `ID_Calificacion` int NOT NULL AUTO_INCREMENT,
  `Primer_Parcial` double DEFAULT NULL,
  `Segundo_Parcial` double DEFAULT NULL,
  `Tercer_Parcial` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `ID_Alumno` int DEFAULT NULL,
  `ID_Materia` int DEFAULT NULL,
  `Nombre_Alumno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_Calificacion`),
  KEY `ID_Alumno` (`ID_Alumno`),
  KEY `FK_Calificaciones_Materias` (`ID_Materia`),
  CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`ID_Alumno`) REFERENCES `alumno` (`ID_Alumno`),
  CONSTRAINT `FK_Calificaciones_Materias` FOREIGN KEY (`ID_Materia`) REFERENCES `materias` (`ID_Materia`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificaciones`
--

LOCK TABLES `calificaciones` WRITE;
/*!40000 ALTER TABLE `calificaciones` DISABLE KEYS */;
INSERT INTO `calificaciones` VALUES (31,9,6,8,7.6666666666667,5,1,NULL),(37,10,10,10,10,7,2,NULL),(38,10,10,10,10,7,1,NULL),(41,9,9,9,9,6,4,NULL),(43,10,9,5,8,4,9,NULL),(44,7,8,6,7,4,3,NULL),(45,10,4,4,6,6,2,NULL),(46,9,10,10,9.6666666666667,3,1,NULL),(49,8,9,10,9,3,3,NULL),(50,10,10,10,10,3,4,NULL),(59,8,9,5,7.3333333333333,9,3,NULL),(60,8,9,5,7.3333333333333,9,2,NULL),(61,8,9,5,7.3333333333333,9,2,NULL),(62,8,9,5,7.3333333333333,8,2,NULL),(63,8,9,10,9,14,4,NULL),(64,7,7,8,7.3333333333333,10,2,NULL),(65,5,5,8,6,3,2,NULL),(66,9,10,10,9.6666666666667,3,13,NULL),(67,5,5,5,5,10,1,NULL),(68,5,8,8,7,10,14,NULL),(69,8,8,8,8,3,14,NULL),(70,5,5,10,6.6666666666667,6,13,NULL),(71,8,8,8,8,4,4,NULL),(72,5,4,8,5.6666666666667,16,3,NULL),(73,8,10,8,8.6666666666667,5,14,NULL),(74,10,5,8,7.6666666666667,17,15,NULL),(75,9,9,9,9,17,5,NULL),(76,10,8,9,9,10,4,NULL),(77,9,9,9,9,10,17,NULL),(78,5,5,5,5,5,13,NULL),(79,8,8,8,8,5,17,NULL),(80,10,10,10,10,5,3,NULL),(81,9,10,9,9.3333333333333,14,1,NULL),(82,5,5,5,5,14,5,NULL),(83,10,10,10,10,6,5,NULL),(84,10,8,7,8.3333333333333,14,13,NULL),(85,10,10,10,10,10,15,NULL),(86,10,8,7,8.3333333333333,18,19,NULL),(87,5,5,5,5,10,13,NULL),(88,9,9,8,8.6666666666667,6,14,NULL);
/*!40000 ALTER TABLE `calificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carreras`
--

DROP TABLE IF EXISTS `carreras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carreras` (
  `ID_Carrera` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) DEFAULT NULL,
  `Duracion` varchar(25) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_Carrera`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carreras`
--

LOCK TABLES `carreras` WRITE;
/*!40000 ALTER TABLE `carreras` DISABLE KEYS */;
INSERT INTO `carreras` VALUES (1,'Ingenieria En Sistemas C.','MAY-AGO','ISC-6-301'),(2,'Enfermeria','MAY-AGO','ENF-6-301'),(3,'Marketing Digital','MAY-AGO','MKT-6-301'),(4,'Psicologia','MAY-AGO','PSI-6-301'),(5,'Administración','MAY-AGO','ADM-6-301'),(6,'Criminalistica','MAY-AGO','CRI-6-301'),(7,'Contaduria','MAY-AGO','CONT-6-301'),(8,'Pedagogia ','MAY-AGO','PED-6-301'),(9,'Derecho','MAY-AGO','DER-6-301'),(11,'Ingenieria En Electronica','MAY-AGO','MEC-6-301'),(12,'Nutrición','MAY-AGO','NUT-6-301');
/*!40000 ALTER TABLE `carreras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coordinacion`
--

DROP TABLE IF EXISTS `coordinacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coordinacion` (
  `ID_Coordinacion` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) DEFAULT NULL,
  `Apellido_Materno` varchar(25) DEFAULT NULL,
  `Apellido_Paterno` varchar(25) DEFAULT NULL,
  `CURP` varchar(25) DEFAULT NULL,
  `Genero` varchar(25) DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `ID_Coordinador` int DEFAULT NULL,
  PRIMARY KEY (`ID_Coordinacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coordinacion`
--

LOCK TABLES `coordinacion` WRITE;
/*!40000 ALTER TABLE `coordinacion` DISABLE KEYS */;
INSERT INTO `coordinacion` VALUES (1,'Rogelio','Perez','Gutierrez','IANSMNAU205','Masculino','2003-01-15',1),(2,'Rogelio','Perez','Gutierrez','IANSMNAU205','Masculino','2003-01-15',1);
/*!40000 ALTER TABLE `coordinacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuatrimestre`
--

DROP TABLE IF EXISTS `cuatrimestre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuatrimestre` (
  `id_cuatrimeste` int NOT NULL AUTO_INCREMENT,
  `cuatrimestre` int DEFAULT NULL,
  `id_alumno` int DEFAULT NULL,
  PRIMARY KEY (`id_cuatrimeste`),
  KEY `id_alumno` (`id_alumno`),
  CONSTRAINT `cuatrimestre_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`ID_Alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuatrimestre`
--

LOCK TABLES `cuatrimestre` WRITE;
/*!40000 ALTER TABLE `cuatrimestre` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuatrimestre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuatrimestres`
--

DROP TABLE IF EXISTS `cuatrimestres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuatrimestres` (
  `ID_Cuatrimestre` int NOT NULL AUTO_INCREMENT,
  `ID_Carrera` int DEFAULT NULL,
  `ID_Materia` int DEFAULT NULL,
  `Nombre_Carrera` varchar(25) DEFAULT NULL,
  `Nombre_Materia` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID_Cuatrimestre`),
  KEY `ID_Carrera` (`ID_Carrera`),
  KEY `ID_Materia` (`ID_Materia`),
  CONSTRAINT `cuatrimestres_ibfk_1` FOREIGN KEY (`ID_Carrera`) REFERENCES `carreras` (`ID_Carrera`),
  CONSTRAINT `cuatrimestres_ibfk_2` FOREIGN KEY (`ID_Materia`) REFERENCES `materias` (`ID_Materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuatrimestres`
--

LOCK TABLES `cuatrimestres` WRITE;
/*!40000 ALTER TABLE `cuatrimestres` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuatrimestres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `email` (
  `ID_Email` int NOT NULL AUTO_INCREMENT,
  `Direccion` varchar(50) DEFAULT NULL,
  `Tipo` varchar(25) DEFAULT NULL,
  `Propietario` varchar(100) DEFAULT NULL,
  `ID_Coordinacion` int DEFAULT NULL,
  `ID_Maestro` int DEFAULT NULL,
  `ID_Alumno` int DEFAULT NULL,
  PRIMARY KEY (`ID_Email`),
  KEY `ID_Coordinacion` (`ID_Coordinacion`),
  KEY `ID_Maestro` (`ID_Maestro`),
  KEY `ID_Alumno` (`ID_Alumno`),
  CONSTRAINT `email_ibfk_1` FOREIGN KEY (`ID_Coordinacion`) REFERENCES `coordinacion` (`ID_Coordinacion`),
  CONSTRAINT `email_ibfk_2` FOREIGN KEY (`ID_Maestro`) REFERENCES `maestro` (`ID_Maestro`),
  CONSTRAINT `email_ibfk_3` FOREIGN KEY (`ID_Alumno`) REFERENCES `alumno` (`ID_Alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email`
--

LOCK TABLES `email` WRITE;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
/*!40000 ALTER TABLE `email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupos`
--

DROP TABLE IF EXISTS `grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grupos` (
  `id_grupo` int NOT NULL AUTO_INCREMENT,
  `N_Grupo` int DEFAULT NULL,
  `id_cuatrimestre` int DEFAULT NULL,
  `id_carrera` int DEFAULT NULL,
  `id_alumno` int DEFAULT NULL,
  `id_materia` int DEFAULT NULL,
  PRIMARY KEY (`id_grupo`),
  KEY `id_cuatrimestre` (`id_cuatrimestre`),
  KEY `id_carrera` (`id_carrera`),
  KEY `id_alumno` (`id_alumno`),
  KEY `id_materia` (`id_materia`),
  CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`id_cuatrimestre`) REFERENCES `cuatrimestre` (`id_cuatrimeste`),
  CONSTRAINT `grupos_ibfk_2` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`ID_Carrera`),
  CONSTRAINT `grupos_ibfk_3` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`ID_Alumno`),
  CONSTRAINT `grupos_ibfk_4` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`ID_Materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maestro`
--

DROP TABLE IF EXISTS `maestro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `maestro` (
  `ID_Maestro` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) DEFAULT NULL,
  `Apellido_Materno` varchar(25) DEFAULT NULL,
  `Apellido_Paterno` varchar(25) DEFAULT NULL,
  `CURP` varchar(25) DEFAULT NULL,
  `Genero` varchar(25) DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `ID_Coordinacion` int DEFAULT NULL,
  PRIMARY KEY (`ID_Maestro`),
  KEY `ID_Coordinacion` (`ID_Coordinacion`),
  CONSTRAINT `maestro_ibfk_1` FOREIGN KEY (`ID_Coordinacion`) REFERENCES `coordinacion` (`ID_Coordinacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maestro`
--

LOCK TABLES `maestro` WRITE;
/*!40000 ALTER TABLE `maestro` DISABLE KEYS */;
/*!40000 ALTER TABLE `maestro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materias`
--

DROP TABLE IF EXISTS `materias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materias` (
  `ID_Materia` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) DEFAULT NULL,
  `ID_Carrera` int DEFAULT NULL,
  PRIMARY KEY (`ID_Materia`),
  KEY `ID_Carrera` (`ID_Carrera`),
  CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`ID_Carrera`) REFERENCES `carreras` (`ID_Carrera`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materias`
--

LOCK TABLES `materias` WRITE;
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
INSERT INTO `materias` VALUES (1,'Programación Lógica',NULL),(2,'Algebra Lineal',NULL),(3,'Metodologia',1),(4,'Informatica',6),(5,'Responsabilidad Social',7),(9,'Teoria del derecho',9),(13,'Bases de datos',1),(14,'Servidores',1),(15,'Contabilidad Costos',7),(17,'Circuitos eléctricos',1),(19,'Evaluación de proyectos',6);
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matriculas`
--

DROP TABLE IF EXISTS `matriculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `matriculas` (
  `ID_Matricula` int NOT NULL AUTO_INCREMENT,
  `Matricula` varchar(25) DEFAULT NULL,
  `ID_Puesto` int DEFAULT NULL,
  `ID_Alumno` int DEFAULT NULL,
  `ID_Maestro` int DEFAULT NULL,
  `ID_Coordinacion` int DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_Matricula`),
  KEY `ID_Puesto` (`ID_Puesto`),
  KEY `ID_Alumno` (`ID_Alumno`),
  KEY `ID_Maestro` (`ID_Maestro`),
  KEY `ID_Coordinacion` (`ID_Coordinacion`),
  CONSTRAINT `matriculas_ibfk_1` FOREIGN KEY (`ID_Puesto`) REFERENCES `puesto` (`ID_Puesto`),
  CONSTRAINT `matriculas_ibfk_2` FOREIGN KEY (`ID_Alumno`) REFERENCES `alumno` (`ID_Alumno`),
  CONSTRAINT `matriculas_ibfk_3` FOREIGN KEY (`ID_Maestro`) REFERENCES `maestro` (`ID_Maestro`),
  CONSTRAINT `matriculas_ibfk_4` FOREIGN KEY (`ID_Coordinacion`) REFERENCES `coordinacion` (`ID_Coordinacion`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matriculas`
--

LOCK TABLES `matriculas` WRITE;
/*!40000 ALTER TABLE `matriculas` DISABLE KEYS */;
INSERT INTO `matriculas` VALUES (3,'33101',NULL,NULL,NULL,NULL,'coordinador'),(4,'3102',NULL,NULL,NULL,2,'da88c3d9316564de4493256e2616f52e'),(10,'2101',NULL,3,NULL,NULL,'fb7371fffcbac22e247092ad39cb8876'),(12,'22102',NULL,9,NULL,NULL,'mauri'),(13,'22102',NULL,10,NULL,NULL,'2311c43229e5a70ae4b203652576495e'),(14,'22103',NULL,NULL,NULL,NULL,'abc2566d6783cd9eb8a671e9c0147ae3'),(15,'22103',NULL,5,NULL,NULL,'abc2566d6783cd9eb8a671e9c0147ae3'),(19,'3103',NULL,NULL,NULL,1,'e5b7f8177d075dd552ae62767bbbcb41'),(22,'2105',NULL,4,NULL,NULL,'0d9f76e4babd640990d37ec561c18b37'),(30,'4101',NULL,NULL,1,NULL,'1fe92e0bffb20722446af951d787cd67');
/*!40000 ALTER TABLE `matriculas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puesto`
--

DROP TABLE IF EXISTS `puesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `puesto` (
  `ID_Puesto` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID_Puesto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puesto`
--

LOCK TABLES `puesto` WRITE;
/*!40000 ALTER TABLE `puesto` DISABLE KEYS */;
INSERT INTO `puesto` VALUES (1,'Coordinador');
/*!40000 ALTER TABLE `puesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salarios`
--

DROP TABLE IF EXISTS `salarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `salarios` (
  `ID_Salario` int NOT NULL AUTO_INCREMENT,
  `Monto` decimal(10,2) DEFAULT NULL,
  `Fecha_Inicio` date DEFAULT NULL,
  `Fecha_Fin` date DEFAULT NULL,
  `ID_Coordinacion` int DEFAULT NULL,
  `ID_Maestro` int DEFAULT NULL,
  PRIMARY KEY (`ID_Salario`),
  KEY `ID_Coordinacion` (`ID_Coordinacion`),
  KEY `ID_Maestro` (`ID_Maestro`),
  CONSTRAINT `salarios_ibfk_1` FOREIGN KEY (`ID_Coordinacion`) REFERENCES `coordinacion` (`ID_Coordinacion`),
  CONSTRAINT `salarios_ibfk_2` FOREIGN KEY (`ID_Maestro`) REFERENCES `maestro` (`ID_Maestro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salarios`
--

LOCK TABLES `salarios` WRITE;
/*!40000 ALTER TABLE `salarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `salarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefonos`
--

DROP TABLE IF EXISTS `telefonos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `telefonos` (
  `ID_Telefono` int NOT NULL AUTO_INCREMENT,
  `Numero` varchar(20) DEFAULT NULL,
  `Tipo` varchar(25) DEFAULT NULL,
  `Pais` varchar(50) DEFAULT NULL,
  `Propietario` varchar(100) DEFAULT NULL,
  `ID_Coordinacion` int DEFAULT NULL,
  `ID_Maestro` int DEFAULT NULL,
  `ID_Alumno` int DEFAULT NULL,
  PRIMARY KEY (`ID_Telefono`),
  KEY `ID_Coordinacion` (`ID_Coordinacion`),
  KEY `ID_Maestro` (`ID_Maestro`),
  KEY `ID_Alumno` (`ID_Alumno`),
  CONSTRAINT `telefonos_ibfk_1` FOREIGN KEY (`ID_Coordinacion`) REFERENCES `coordinacion` (`ID_Coordinacion`),
  CONSTRAINT `telefonos_ibfk_2` FOREIGN KEY (`ID_Maestro`) REFERENCES `maestro` (`ID_Maestro`),
  CONSTRAINT `telefonos_ibfk_3` FOREIGN KEY (`ID_Alumno`) REFERENCES `alumno` (`ID_Alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefonos`
--

LOCK TABLES `telefonos` WRITE;
/*!40000 ALTER TABLE `telefonos` DISABLE KEYS */;
/*!40000 ALTER TABLE `telefonos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-23 17:42:06
