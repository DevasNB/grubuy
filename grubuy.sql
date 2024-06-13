-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jun-2024 às 22:16
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `grubuy`
--
CREATE DATABASE IF NOT EXISTS `grubuy` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `grubuy`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`userID`, `userName`, `userEmail`, `userPassword`, `userWebsite`, `userLocation`, `userPhone`, `userBirthday`, `userImage`) VALUES
(12, 'Joao Devesa', 'joaodevesa212@gmail.com', '$2y$10$PLvLx7s2svDiA9NhvyHum.WpjFgG9h5pZ/M8Y.AAe7YIh8tJ.QlwC', 'https://devas.pt', 'Lisboa', 916847620, '2002-12-02', 'Imagem WhatsApp 2024-05-31 às 11.10.29_a74cd796.jpg'),
(13, 'Andrei Nuca', 'andrei.nuca@my.istec.pt', '$2y$10$kvxNhGlwoZKmDvMjaZVNHeTeePqYeRM5qjszedeGq9ZnFD/KhvbCG', NULL, NULL, NULL, NULL, NULL),
(14, 'Ricardo Reis', 'ricardo@ricardo.pt', '$2y$10$tZwk.nsXeOxi9emS.MUI3.qws.asTLAMTyK6GM3Vh4DzMMzHKKbla', '', '', 916847627, '2022-12-06', 'exercise-with-weights-royalty-free-image-587204700-1547584208.jpg');

--
-- Restrições para despejos de tabelas
--

--
-- Estrutura da tabela `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(300) DEFAULT NULL,
  `productDescription` tinytext NOT NULL,
  `productCreator` int(11) DEFAULT NULL,
  `productImage` varchar(300) DEFAULT NULL,
  `productQuantity` int(11) NOT NULL,
  `productPrice` decimal(10,2) DEFAULT NULL,
  `productDate` datetime(3) NOT NULL DEFAULT current_timestamp(3),
  PRIMARY KEY (`productID`),
  KEY `productCreator` (`productCreator`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`productID`, `productName`, `productDescription`, `productCreator`, `productImage`, `productQuantity`, `productPrice`, `productDate`) VALUES
(17, 'Vodka Miss Silver', 'Este produto é uma bebida alcoólica. Não é permitido o consumo a menores de idade. Tem 750ml e 37,5% de álcool. Verifique que fique longe do alcance das crianças', 12, '4670037-frente.jpg', 300, 7.99, '2024-06-13 20:58:26.841'),
(18, 'Minecraft Java Edition', 'Este produto é um jogo de computador, apenas para PC! O jogo tem cerca de 15 anos mas continua a ser atualizado continuamente. É desenvolvido pela mojang!', 12, 'Minecraft_capa.png', 10, 20.99, '2024-06-13 21:01:12.243'),
(19, 'Rato Gaming Globaldata', 'Este rato gaming tem RGB com mais de 2000000 de cores. É dos ratos mais procurados do mercado. Não é wirless por tanto não aceito devolução por isso!', 13, 'images.jpeg', 29, 39.99, '2024-06-13 21:05:04.702'),
(20, 'Equipamento desportivo Dumbells.', 'Este equipamento conta com alteres em que o peso é alterável, não deixar menores de 16 anos utilizarem devido as regras do ginásio publico.', 13, 'k$b3eb77074326dfb046652ec93b8bb6d9.jpeg', 1, 45.99, '2024-06-13 21:07:45.453'),
(21, 'Equipamento desportivo Dumbells.', 'Este equipamento conta com alteres em que o peso é alterável, não deixar menores de 16 anos utilizarem devido as regras do ginásio publico.', 13, 'k$b3eb77074326dfb046652ec93b8bb6d9.jpeg', 5, 45.99, '2024-06-13 21:08:08.117'),
(22, 'Peugeot 206sw', 'Carrinha familiar 5 lugares de 2002 e mais de 300 mil kilometros, está em bom estado para aquilo que andou, tem problemas no motor, na direcao, nas rodas, na suspensao, na parte eletrica, no contador da gasolina, no radiador, nos travoes, nas portas, nao ', 14, 'image.webp', 1, 2000.00, '2024-06-13 21:11:49.923'),
(23, 'Tapetes gaming lenovo', 'Este tapete nao tem luzes mas é muito bom, o rato derrapa bem e o tapete é antiderrapante.', 14, '150169_1_prod.png', 75, 6.99, '2024-06-13 21:13:35.445');


-- --------------------------------------------------------

--
-- Estrutura da tabela `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cartID` int(11) NOT NULL AUTO_INCREMENT,
  `prodID` int(11) NOT NULL,
  `prodQuantity` int(11) NOT NULL,
  `prodPrice` float NOT NULL,
  `usrID` int(11) NOT NULL,
  PRIMARY KEY (`cartID`),
  KEY `prodID` (`prodID`),
  KEY `usrID` (`usrID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Limitadores para a tabela `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`prodID`) REFERENCES `products` (`productID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`usrID`) REFERENCES `users` (`userID`);

--
-- Limitadores para a tabela `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`productCreator`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
