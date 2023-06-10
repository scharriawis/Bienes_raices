/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `blogs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `imagen` varchar(200) DEFAULT 'NULL' COMMENT 'EMPTY',
  `titulo` varchar(45) DEFAULT NULL COMMENT 'EMPTY',
  `fecha` date DEFAULT NULL,
  `nombre` varchar(45) DEFAULT 'NULL',
  `descripcion` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `propiedades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `descripcion` longtext,
  `imagen` varchar(200) DEFAULT NULL,
  `habitaciones` int DEFAULT NULL,
  `estacionamiento` int DEFAULT NULL,
  `wc` int DEFAULT NULL,
  `creado` date DEFAULT NULL,
  `vendedoresId` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_propiedades_vendedores_idx` (`vendedoresId`),
  CONSTRAINT `fk_propiedades_vendedores` FOREIGN KEY (`vendedoresId`) REFERENCES `vendedores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `password` char(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `vendedores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT 'NULL',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

INSERT INTO `blogs` (`id`, `imagen`, `titulo`, `fecha`, `nombre`, `descripcion`) VALUES
(1, '5d6c428fb42c09fd23ebdb44820d1df6archivo.jpg', ' Terminados de baños 2023', '2023-05-01', 'Sergio Charria', 'En la terminación de los baños hay que enchapar y tomar las medidas necesarias para cortar y pegar la baldosa. ');


INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `descripcion`, `imagen`, `habitaciones`, `estacionamiento`, `wc`, `creado`, `vendedoresId`) VALUES
(25, 'Casa Moderna (Actualizado) 2023 ', 60000000.00, 'La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera ', 'cea456c34bf80302179bb065f48c85e4archivo.jpg', 3, 1, 2, '2022-12-25', 1);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `descripcion`, `imagen`, `habitaciones`, `estacionamiento`, `wc`, `creado`, `vendedoresId`) VALUES
(26, 'Casa de los sueños', 50000000.00, 'La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera ', 'dea5f0974ff95268c4e566b5f58094d1archivo.jpg', 3, 1, 2, '2022-12-25', 2);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `descripcion`, `imagen`, `habitaciones`, `estacionamiento`, `wc`, `creado`, `vendedoresId`) VALUES
(27, 'Casa futurista', 40000000.00, 'La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera ', '96951f6166caec0ee6b587a7a6cc6dcearchivo.jpg', 3, 1, 2, '2022-12-25', 1);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `descripcion`, `imagen`, `habitaciones`, `estacionamiento`, `wc`, `creado`, `vendedoresId`) VALUES
(28, 'Casa campestre', 80000000.00, 'La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera ', 'af264ee09956f47c49fea856dd14c1fcarchivo.jpg', 3, 1, 2, '2022-12-25', 1),
(29, 'Casa maestra', 70000000.00, 'La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera ', '4afd0b8b7830e43b61c1d59188c2f034archivo.jpg', 3, 1, 2, '2022-12-25', 2),
(30, 'Casa de su majestad', 90000000.00, 'La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera La mejor casa de mi vida entera ', '8e5b75a14984956ce045ef18c5c1c400archivo.jpg', 3, 1, 2, '2022-12-25', 2),
(31, 'New apartament', 90000000.00, 'luxury apartament on sale next to the bank luxury apartament on sale next to the bank luxury apartament on sale next to the bank luxury apartament on sale next to the bank vluxury apartament on sale next to the bank luxury apartament on sale next to the bank luxury apartament on sale next to the bank luxury apartament on sale next to the bank.', '88899f59be989440266a794592d737cdarchivo.jpg', 5, 3, 3, '2023-01-07', 1),
(37, ' Casa blanca Actualizado desde MVC', 87000000.00, 'La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar.', '62873bc105ede4b7c3d4988e20402f5farchivo.jpg', 2, 1, 2, '2023-02-10', 2),
(40, ' Casa blanca', 87000000.00, 'La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar.', 'Imagen.jpg', 2, 1, 2, '2023-02-10', 2),
(41, ' Casa blanca', 87000000.00, 'La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar.', 'Imagen.jpg', 2, 1, 2, '2023-02-10', 2),
(42, ' Casa blanca', 87000000.00, 'La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar.', 'Imagen.jpg', 2, 1, 2, '2023-02-10', 2),
(43, ' Casa blanca', 87000000.00, 'La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar La casa de más de una historia qué contar.', 'Imagen.jpg', 2, 1, 2, '2023-02-10', 2),
(44, ' Casa en remodelación', 75000000.00, 'La mejor forma de comenzar a vivir en tu casa propia disfrutala! La mejor forma de comenzar a vivir en tu casa propia disfrutala! La mejor forma de comenzar a vivir en tu casa propia disfrutala! La mejor forma de comenzar a vivir en tu casa propia disfrutala! La mejor forma de comenzar a vivir en tu casa propia disfrutala! La mejor forma de comenzar a vivir en tu casa propia disfrutala! ', 'ec545b512ef8e21c0b16a6797812c3daarchivo.jpg', 1, 1, 1, '2023-02-11', 2),
(45, ' Casa para pasar la vejez', 90000000.00, ' Casa amplia tranquila con mucho paisaje y entretenimiento Casa amplia tranquila con mucho paisaje y entretenimiento Casa amplia tranquila con mucho paisaje y entretenimiento Casa amplia tranquila con mucho paisaje y entretenimiento Casa amplia tranquila con mucho paisaje y entretenimiento ', '0069a78e7f694dbd8cf6cb716b9b2c23archivo.jpg', 1, 1, 2, '2023-02-13', 1),
(46, ' Casa  Antigua', 88000000.00, 'Casa antigua para persona retirada de la sociedad y con espacios propios para su privacidad Casa antigua para persona retirada de la sociedad y con espacios propios para su privacidad Casa antigua para persona retirada de la sociedad y con espacios propios para su privacidad Casa antigua para persona retirada de la sociedad y con espacios propios para su privacidad ', '3109a579fad40d1b3c381ee673876f0farchivo.jpg', 2, 1, 1, '2023-02-13', 1),
(47, ' Casa  Antigua (Actualizado)', 87000000.00, 'Casa antigua para persona retirada de la sociedad y con espacios propios para su privacidad Casa antigua para persona retirada de la sociedad y con espacios propios para su privacidad Casa antigua para persona retirada de la sociedad y con espacios propios para su privacidad ', '21a262745ab193b0878325e52f3e4876archivo.jpg', 3, 1, 1, '2023-02-13', 1),
(49, ' Hermosa Casa (actualizado) 3', 85000000.00, 'Casa antigua para persona retirada de la sociedad y con espacios propios para su privacidad Casa antigua para persona retirada de la sociedad y con espacios propios para su privacidad Casa antigua para persona retirada de la sociedad y con espacios propios para su privacidad ', 'a2b10ccff8ab48ae5bc3e0245511e111archivo.jpg', 3, 1, 2, '2023-02-13', 1),
(50, ' Hermosa Casa (actualizado) 4 ', 84000000.00, 'Casa antigua para persona retirada de la sociedad y con espacios propios para su privacidad Casa antigua para persona retirada de la sociedad y con espacios propios para su privacidad Casa antigua para persona retirada de la sociedad y con espacios propios para su privacidad Casa antigua para persona retirada de la sociedad y con espacios propios para su privacidad ', '42538bd8d913cb452f6fd75143ae082barchivo.jpg', 1, 1, 1, '2023-02-13', 1),
(52, ' Casa de halloween', 35000000.00, 'Noche final la casa de tus pesadilla donde todo comienza y acaba de una manera inesperada... jajajjajajajja', '780f6f1d993dec723a1ffd8f0a3b54e1archivo.jpg', 2, 2, 2, '2023-02-28', 1),
(53, ' Apartamento !En oferta¡', 56000000.00, 'Un lujoso apartamento con todos los servicios lejos de la sociedad Un lujoso apartamento con todos los servicios lejos de la sociedad Un lujoso apartamento con todos los servicios lejos de la sociedad.', '6c59d69815d243d7b2fe04990653ddffarchivo.jpg', 1, 1, 1, '2023-03-08', 1),
(54, ' Casa del año 2023', 90000000.00, 'Casa del año 2023 con muchas cosas interesantes y llamativas estupendo para personas importantes que quieren sentirse lejos de la ciudad y su gente.', 'a4562b8db676d74cb8c6c91003dd5dcdarchivo.jpg', 1, 1, 1, '2023-04-23', 2),
(55, ' Palacio real', 90000000.00, 'Casa del año 2023 con muchas cosas interesantes y llamativas estupendo para personas importantes que quieren sentirse lejos de la ciudad y su gente.', '961e914b93c9e3c5f13045a1dea9141farchivo.jpg', 1, 1, 1, '2023-04-24', 2),
(56, ' Casa del año 2023', 90000000.00, 'Una de las mejores casas del año hecha con arquitectura profesional para grandes personas con proyectos.', 'd73432ab55f6a6cb5e99b3a7dc7c5cb0archivo.jpg', 1, 1, 1, '2023-04-26', 2),
(57, ' Casa del año 2023', 90000000.00, 'Una de las mejores casas del año hecha con arquitectura profesional para grandes personas con proyectos.', 'd04c3a56679e2ed991fc176aa2ccadd0archivo.jpg', 1, 1, 1, '2023-04-26', 2),
(58, ' Casa del año 2023', 90000000.00, 'Una de las mejores casas del año hecha con arquitectura profesional para grandes personas con proyectos.', 'fe9f356ef4b862a205f559064e9fe042archivo.jpg', 1, 1, 1, '2023-04-26', 2),
(59, ' Casa del año 2023', 90000000.00, 'Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023', '85903a006f3402299a28355261915ab0archivo.jpg', 1, 1, 1, '2023-04-26', 2),
(60, ' Casa del año 2023 ', 90000000.00, 'Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 ', '7674299284211109b6d5f7a643690f07archivo.jpg', 1, 1, 1, '2023-04-26', 2),
(61, ' Casa del año 2023 ', 90000000.00, 'Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 ', '59d825f8fa95a5182116e714b4e7852earchivo.jpg', 1, 1, 1, '2023-04-26', 2),
(62, ' Casa del año 2023 ', 90000000.00, 'Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 ', 'bc0ec5d86fababaad848cc9be2c50048archivo.jpg', 1, 1, 1, '2023-04-26', 2),
(63, ' Casa del año 2023 ', 90000000.00, 'Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 v', '7eacae8c17af36c692b6cba7981f51adarchivo.jpg', 1, 1, 1, '2023-04-26', 2),
(64, ' Casa del año 2023 ', 90000000.00, 'Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 ', '9bde4a855af12652785c654518bfe6cdarchivo.jpg', 1, 1, 1, '2023-04-26', 2),
(65, ' Casa del año 2023 ', 90000000.00, 'Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 ', '891fccef9e4ae75f6cbdf95ddb5e5f7barchivo.jpg', 1, 1, 1, '2023-04-26', 2),
(66, ' Casa del año 2023 ', 90000000.00, 'Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 Casa del año 2023 ', '94a22e40a7c8b8e7780c8c9f95147bdbarchivo.jpg', 1, 1, 1, '2023-04-26', 2),
(67, ' Casa 2020 ', 40000000.00, 'Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 ', '5a36d6dee744e60a0bad145b6ba9633earchivo.jpg', 3, 3, 3, '2023-04-26', 2),
(68, ' Casa 2020 ', 40000000.00, 'Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 ', 'eeb49e00c99ac1bccf896ff5c5a7082aarchivo.jpg', 3, 3, 3, '2023-04-26', 2),
(69, ' Casa 2020 desde MVC', 56000000.00, 'Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 ', '1b1c61ff83ea6c18b7f3889d6bc8f904archivo.jpg', 5, 3, 4, '2023-04-26', 2),
(70, ' Casa 2020  Desde MVC', 58000000.00, 'Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 Casa 2020 ', 'cc4a04880077b9f8804137888ab0a0d8archivo.jpg', 2, 5, 1, '2023-04-26', 2),
(71, ' Casa del año 2023 MVC', 88000000.00, 'Casa del año 2023 MVCCasa del año 2023 MVCCasa del año 2023 MVCCasa del año 2023 MVCCasa del año 2023 MVCCasa del año 2023 MVCCasa del año 2023 MVCCasa del año 2023 MVC', 'e58f829575f1758a0e132e53df7a80a6archivo.jpg', 2, 2, 2, '2023-04-30', 3);

INSERT INTO `usuarios` (`id`, `password`, `email`) VALUES
(2, '$2y$10$iCOvthvhedhboip41rlv4.Rg6tFyb37dbC4V6FvNJwbmts1g8KwO2', 'correo@correo.com');


INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`, `imagen`) VALUES
(1, 'Sergio', 'Charria', '3168462400', '2e873ad1c498c70208885f9f090fc403archivo.jpg');
INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`, `imagen`) VALUES
(2, 'Karen', 'Alvarez', '3184181474', '394f7ca9abfe1c6c59ab39ef876c94b4archivo.jpg');
INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`, `imagen`) VALUES
(3, 'Daniel', 'Castillo', '3184181474', 'NULL');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;