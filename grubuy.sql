-- MySQL dump 10.13  Distrib 5.7.40, for Linux (x86_64)
--
-- Host: localhost    Database: grubuy
-- ------------------------------------------------------
-- Server version	5.7.40

CREATE DATABASE IF NOT EXISTS `grubuy` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `grubuy`;

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

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL AUTO_INCREMENT,
  `prodID` int(11) NOT NULL,
  `prodQuantity` int(11) NOT NULL,
  `prodPrice` float NOT NULL,
  `usrID` int(11) NOT NULL,
  PRIMARY KEY (`cartID`),
  KEY `prodID` (`prodID`),
  KEY `usrID` (`usrID`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`prodID`) REFERENCES `products` (`productID`),
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`usrID`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(300) DEFAULT NULL,
  `productDescription` tinytext NOT NULL,
  `productCreator` int(11) DEFAULT NULL,
  `productImage` varchar(300) DEFAULT NULL,
  `productQuantity` int(11) NOT NULL,
  `productPrice` decimal(10,2) DEFAULT NULL,
  `productDate` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  PRIMARY KEY (`productID`),
  KEY `productCreator` (`productCreator`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`productCreator`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (3,'Microfone Trust Micro USB Azul','Microfone Trust Micro USB Azul, em Ã³timo estado, pouca utilizaÃ§Ã£o e com todos os materiais e caixa incluÃ­do. Para mais iformaÃ§Ãµes mande mensagem ou envie email.',1,'transferir.jpg',1,30.00,'2023-01-25 18:37:10.967'),(4,'Vinho Quinta da Devesa','Vinho tradicional do Porto, Portugal. Tenho muitas garrafas destas em casa por isso estou a vende-las, Nunca foram abertas. Para mais informaÃ§Ãµes mandem mensagem para o meu nÃºmero ou para o meu email',1,'V04665.jpg',60,10.00,'2023-01-25 18:45:40.078'),(5,'Agua do banho','De cÃ£o moderadamente limpo e saudÃ¡vel. Todos os dias vai dar muitos passeios e costuma comer raÃ§Ã£o de alta qualidade. Para mais informaÃ§Ã£o, por favor contacte-me.',2,'random shit do devesa.avif',228,30.00,'2023-01-25 19:19:31.057'),(6,'Conta Minecraft','Conta original de Minecraft Java Edition. Ãštil para entrar em servidores online. Conta banida em pelo menos 3 servidores oficiais de Minecraft, confio que o comprador continue a usar cheats em servidores.',3,'AAuE7mBOL6iNRK6g77SnhlkwPEfmROQ2Ft7mlfND7g=s900-mo-c-c0xffffffff-rj-k-no-1601814853.png',1,29.97,'2023-01-25 19:20:51.559'),(7,'Aquecedor a lenha','Lareira econÃ³mica',2,'kingso-fire-pit.webp',5,150.00,'2023-01-25 19:23:55.404'),(9,'Cavalos','Vendo alguns cavalos jÃ¡ um bocado velhinhos, de 14 a 17 anos. Muito utilizados na minha altura para fazer corridas contra a minha famÃ­lia. Agora jÃ¡ nÃ£o estÃ£o no seu auge e precisam de mais maintenance do que eu consigo',3,'cavalo-nordestino-1-3785317838.png',2,6969.00,'2023-01-25 19:26:39.611'),(10,'NFT do JuÃ£u Papel Encravado','Bem, Ã© um ser humano, portanto vale bastante. Also, sÃ£o NFT, portanto deicidi aumentar para as 6-figures. E Ã© a minha alma gÃ©mea, portanto 7-figures. Todas as cÃ³pias sÃ£o imprimidas em 3D. ',3,'20191222_165020.jpg',1000,1000000.00,'2023-01-25 19:31:01.999'),(12,'Caderno','Caderno',4,'IMG_2715 (1).jpg',1,1.00,'2023-01-25 20:14:47.923'),(14,'Cavalo','dddddawfawfawf',7,'JPYTxpWT.jpg',6,23.00,'2023-02-24 16:03:36.818'),(15,'Placa \"ProÃ­bido trompetes\"','Vendo placas de sinais \"ProÃ­bido trompetes\" como na imagem (Burguer King nÃ£o incluÃ­do). Enviamos para todo o territÃ³rio nacional, incluido as ex-colÃ³nias (Brasil, Cabo Verde, MoÃ§ambique, GuinÃ© Bissau, Angola, Macau) e a cidade de OlivenÃ§a.',8,'PXL_20230222_144626534.jpg',100,42.00,'2023-02-24 16:41:38.782'),(16,'Spider-man','Marvel ',10,'png-transparent-spider-man-heroes-download-with-transparent-background-free-thumbnail.png',1000,49.99,'2024-03-18 15:42:26.461');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(128) NOT NULL,
  `userEmail` varchar(128) NOT NULL,
  `userPassword` varchar(128) NOT NULL,
  `userWebsite` varchar(128) DEFAULT NULL,
  `userLocation` varchar(128) DEFAULT NULL,
  `userPhone` int(11) DEFAULT NULL,
  `userBirthday` date DEFAULT NULL,
  `userImage` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'JoÃ£o Devesa','joaodevesa212@gmail.com','$2y$10$tKL5BKsjGPDB.2FpILDwDeFKVOJy1SzcSlFt/DRkEnVZTefdQoBh.','https://devas.pt','Lisboa',916847620,'2002-12-02','Cabana_Devas.jpg'),(2,'liunor','leonor002@gmail.com','$2y$10$Pg5g2opjWU9D9H0kkn8U2ecKJ6GBVxze/L0EgGKZdQ5bvYYj6TCAG','','Coimbra',961234567,'1885-10-05','Captura de ecrÃ£_20221205_151043.png'),(3,'Joao Sa','joaofilipesa2020@gmail.com','$2y$10$nshzTQYNai0xuWYs8GDCNux0z9JaL2VS5JkHq5C0o2KSsUT.55FrO','','',0,'1945-05-17',''),(4,'Miriam','mdoqdias@gmail.com','$2y$10$G8ZvOBpKCC.HRrHinZEOTuVvpIxgZYDvYEozA69rm4ymOpTRXFFG.','','Cartaxo',925724244,'2003-02-03',''),(5,'rodrigo','rgbsbarata@gmail.com','$2y$10$BnhSJLLYvKH3rsjehICwAOSB/SmCthxjVOFABhT/YIbFK9saCnZdW',NULL,NULL,NULL,NULL,NULL),(7,'Ricardo Pereira','devas@drena.pt','$2y$10$BtGOkbHyXJzjAl1CM.Dfm.pl/nYpFJPXkgxxESTNCzCc7Ei.c1uB2','https://devas.pt','Lisboa',916847620,'2002-12-02','JPYTxpWT.jpg'),(8,'Guilherme Albuquerque','guilha@drena.pt','$2y$10$FvHD6bytMe34GygM4Og75OwKIDWAX3.bdClMouZM50pZEilVVvAB.','https://drena.pt/u/guilhae','Condeixa-a-Nova',933330328,'2003-02-20','WIN_20201204_23_29_28_Pro.jpg'),(9,'Vilanova','ff5613546@gmail.com','$2y$10$dbGwR5sxLhHdSTJrys4nGeJ68C9LX3zfCEOWbwbjJqfANS4w/5i9m',NULL,NULL,NULL,NULL,NULL),(10,'Ivan','ivannvieiraa@outlook.pt','$2y$10$bkCnfJIKcaL1/1KCx/wYO.3Bg0N1DMPCETW5e34uHyUjctAvPMMm.','','',919515749,'2006-10-07','purepng.com-mariomariofictional-charactervideo-gamefranchisenintendodesigner-1701528634653vywuz.png'),(11,'CloneDoJoaoDevesa','meyide4630@cmheia.com','$2y$10$5K.xdwg/PwyORZdlm5VRL.k.5sp/OsGpZ1sW9WJrqUr8ytrGJPMSK',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-11 20:31:59
