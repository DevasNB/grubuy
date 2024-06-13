-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jun-2024 às 21:35
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`productID`, `productName`, `productDescription`, `productCreator`, `productImage`, `productQuantity`, `productPrice`, `productDate`) VALUES
(5, 'Agua do banho', 'De cÃ£o moderadamente limpo e saudÃ¡vel. Todos os dias vai dar muitos passeios e costuma comer raÃ§Ã£o de alta qualidade. Para mais informaÃ§Ã£o, por favor contacte-me.', 2, 'random shit do devesa.avif', 228, '30.00', '2023-01-25 19:19:31.057'),
(6, 'Conta Minecraft', 'Conta original de Minecraft Java Edition. Ãštil para entrar em servidores online. Conta banida em pelo menos 3 servidores oficiais de Minecraft, confio que o comprador continue a usar cheats em servidores.', 3, 'AAuE7mBOL6iNRK6g77SnhlkwPEfmROQ2Ft7mlfND7g=s900-mo-c-c0xffffffff-rj-k-no-1601814853.png', 1, '29.97', '2023-01-25 19:20:51.559'),
(7, 'Aquecedor a lenha', 'Lareira econÃ³mica', 2, 'kingso-fire-pit.webp', 5, '150.00', '2023-01-25 19:23:55.404'),
(9, 'Cavalos', 'Vendo alguns cavalos jÃ¡ um bocado velhinhos, de 14 a 17 anos. Muito utilizados na minha altura para fazer corridas contra a minha famÃ­lia. Agora jÃ¡ nÃ£o estÃ£o no seu auge e precisam de mais maintenance do que eu consigo', 3, 'cavalo-nordestino-1-3785317838.png', 2, '6969.00', '2023-01-25 19:26:39.611'),
(10, 'NFT do JuÃ£u Papel Encravado', 'Bem, Ã© um ser humano, portanto vale bastante. Also, sÃ£o NFT, portanto deicidi aumentar para as 6-figures. E Ã© a minha alma gÃ©mea, portanto 7-figures. Todas as cÃ³pias sÃ£o imprimidas em 3D. ', 3, '20191222_165020.jpg', 1000, '1000000.00', '2023-01-25 19:31:01.999'),
(12, 'Caderno', 'Caderno', 4, 'IMG_2715 (1).jpg', 1, '1.00', '2023-01-25 20:14:47.923'),
(14, 'Cavalo', 'dddddawfawfawf', 7, 'JPYTxpWT.jpg', 6, '23.00', '2023-02-24 16:03:36.818'),
(15, 'Placa \"ProÃ­bido trompetes\"', 'Vendo placas de sinais \"ProÃ­bido trompetes\" como na imagem (Burguer King nÃ£o incluÃ­do). Enviamos para todo o territÃ³rio nacional, incluido as ex-colÃ³nias (Brasil, Cabo Verde, MoÃ§ambique, GuinÃ© Bissau, Angola, Macau) e a cidade de OlivenÃ§a.', 8, 'PXL_20230222_144626534.jpg', 100, '42.00', '2023-02-24 16:41:38.782'),
(16, 'Spider-man', 'Marvel ', 10, 'png-transparent-spider-man-heroes-download-with-transparent-background-free-thumbnail.png', 1000, '49.99', '2024-03-18 15:42:26.461'),
(20, '123123', '123', 12, 'Settings.png', 123, '123.00', '2024-06-12 21:42:08.944'),
(21, '123', '123', 12, 'Equipment.png', 123, '123.00', '2024-06-12 22:09:37.102'),
(22, 'a', '123', 12, 'Equipment.png', 123, '123.00', '2024-06-12 22:16:31.012'),
(23, '1', '1', 12, 'msi-mpg_b550_gaming_plus-feature_photo-2d-recuperado_f1649041_thumbnail_4096.jpg', 1, '1.00', '2024-06-13 20:32:22.901');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`userID`, `userName`, `userEmail`, `userPassword`, `userWebsite`, `userLocation`, `userPhone`, `userBirthday`, `userImage`) VALUES
(1, 'JoÃ£o Devesa', 'joaodevesa212@gmail.com', '$2y$10$tKL5BKsjGPDB.2FpILDwDeFKVOJy1SzcSlFt/DRkEnVZTefdQoBh.', 'https://devas.pt', 'Lisboa', 916847620, '2002-12-03', ''),
(2, 'liunor', 'leonor002@gmail.com', '$2y$10$Pg5g2opjWU9D9H0kkn8U2ecKJ6GBVxze/L0EgGKZdQ5bvYYj6TCAG', '', 'Coimbra', 961234567, '1885-10-05', 'Captura de ecrÃ£_20221205_151043.png'),
(3, 'Joao Sa', 'joaofilipesa2020@gmail.com', '$2y$10$nshzTQYNai0xuWYs8GDCNux0z9JaL2VS5JkHq5C0o2KSsUT.55FrO', '', '', 0, '1945-05-17', ''),
(4, 'Miriam', 'mdoqdias@gmail.com', '$2y$10$G8ZvOBpKCC.HRrHinZEOTuVvpIxgZYDvYEozA69rm4ymOpTRXFFG.', '', 'Cartaxo', 925724244, '2003-02-03', ''),
(5, 'rodrigo', 'rgbsbarata@gmail.com', '$2y$10$BnhSJLLYvKH3rsjehICwAOSB/SmCthxjVOFABhT/YIbFK9saCnZdW', NULL, NULL, NULL, NULL, NULL),
(7, 'Ricardo Pereira', 'devas@drena.pt', '$2y$10$BtGOkbHyXJzjAl1CM.Dfm.pl/nYpFJPXkgxxESTNCzCc7Ei.c1uB2', 'https://devas.pt', 'Lisboa', 916847620, '2002-12-02', 'JPYTxpWT.jpg'),
(8, 'Guilherme Albuquerque', 'guilha@drena.pt', '$2y$10$FvHD6bytMe34GygM4Og75OwKIDWAX3.bdClMouZM50pZEilVVvAB.', 'https://drena.pt/u/guilhae', 'Condeixa-a-Nova', 933330328, '2003-02-20', 'WIN_20201204_23_29_28_Pro.jpg'),
(9, 'Vilanova', 'ff5613546@gmail.com', '$2y$10$dbGwR5sxLhHdSTJrys4nGeJ68C9LX3zfCEOWbwbjJqfANS4w/5i9m', NULL, NULL, NULL, NULL, NULL),
(10, 'Ivan', 'ivannvieiraa@outlook.pt', '$2y$10$bkCnfJIKcaL1/1KCx/wYO.3Bg0N1DMPCETW5e34uHyUjctAvPMMm.', '', '', 919515749, '2006-10-07', 'purepng.com-mariomariofictional-charactervideo-gamefranchisenintendodesigner-1701528634653vywuz.png'),
(11, 'CloneDoJoaoDevesa', 'meyide4630@cmheia.com', '$2y$10$5K.xdwg/PwyORZdlm5VRL.k.5sp/OsGpZ1sW9WJrqUr8ytrGJPMSK', NULL, NULL, NULL, NULL, NULL),
(12, 'aa', 'a@a.com', '$2y$10$toS.H1xbEQePOrVisszZfuGt3iJvblQMGqrOnO7i5lox9Sm0QJece', '', '', 0, '2019-09-10', 'Equipment.png');

--
-- Restrições para despejos de tabelas
--

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
