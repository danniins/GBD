-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2020 a las 23:44:28
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea-pedidos`
--

CREATE TABLE `linea-pedidos` (
  `id_producto` int(11) NOT NULL,
  `idpedido` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedido` int(11) NOT NULL,
  `total` varchar(45) NOT NULL,
  `stado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(20,2) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `descripcion`, `imagen`) VALUES
(1, 'Piercing Tragus', '5.00', 'Tragus plata de ley de Hirokata para el cartilago externo del canal auditivo', 'https://cdn.crazy-factory.com/product_images/Z-MLB/Z-MLB12123_L-Piercings-Esterilizado-Piercings-Labret-esterilizado.JPG?dt=1495699814'),
(2, 'Piercing Hélix', '10.00', 'Piercing Hélix de acero con forma de clave de sol para el cartilago exterior de la oreja disponible en varios colores.', 'https://www.piercinghouse.com/6297-thickbox_default/piercing-helix-clave.jpg'),
(3, 'Kit Piercing anti-hélix\r\n	', '15.00', 'Kit de 8 piercings anti-hélix de acero bañado en oro con retoques de bisutería.', 'https://images-na.ssl-images-amazon.com/images/I/61lgu1y5EUL._AC_UY500_.jpg'),
(4, 'Piercing Industrial\r\n	', '7.00', 'Piercing industrial de plata de ley con detalle de flor en el centro.\r\n	', 'https://www.piercinghouse.com/6110/piercing-industrial-flor-con-centro-opal.jpg'),
(5, 'Piercing Industrial', '7.00', 'Piercing industrial de plata de ley con detalle de serpiente a lo largo del piercing.', 'https://www.piercing-glamz.co/16-large/piercing-industrial-serpiente.jpg'),
(6, 'Piercing Conch', '7.00', 'Piercing Conch de plata de ley redondo con pestillo recto con acabado de bolas.', 'https://www.defectolatino.com/media/catalog/product/cache/4/image/600x600/9df78eab33525d08d6e5fb8d27136e95/p/i/piercing_conch_in_acciaio_1.jpg'),
(7, 'Piercing Daith', '10.00', 'Kit de 6 Piercing Daith de acero bañado en oro con formas y acabados de bisuteria.', 'https://images-na.ssl-images-amazon.com/images/I/71nUkjDwEoL._AC_UY395_.jpg'),
(8, 'Piercing Snug', '10.00', 'Kit de 3 Piercing Snug de acero con distintos colores con forma de anillo y acabados de bisutería.', 'https://global2019-static-cdn.kikuu.com/upload-productImg-16046016448456025_320_234.jpg?'),
(9, 'Piercing Rook', '10.00', 'Kit de 6 Piercing Rook de acero bañado en oro con forma semiesfera y con detalles de bisutería.', 'https://m.media-amazon.com/images/I/41sHQxAL8YL.jpg'),
(10, 'Piercing Anti-tragus:', '10.00', 'Piercing Anti-Tragus de oro de ley con forma esférica y con acabado de punta de flecha.', 'https://www.chic-net.de/bilder/kategorien/Anti-Tragus-Piercing.jpg'),
(11, 'Piercing Septum', '7.00', 'Piercing Septum de acero con forma semi-circular con detalles de calaveras.', 'https://contestimg.wish.com/api/webimage/5a5f32c9a2ef5561dcab387f-large.jpg?cache_buster=a373616019918d1dbd4a9d4f1fd4026b'),
(12, 'Piercing Viper:', '15.00', 'Kit de 10 Piercing Viper de acero con diferentes colores pala lengua.', 'https://images-na.ssl-images-amazon.com/images/I/61pZJ7NbCNL._AC_UL1500_.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `realiza`
--

CREATE TABLE `realiza` (
  `dni` int(11) NOT NULL,
  `idpedido` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `forma-pago` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `cod-rol` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `usuario_dni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `dni` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `provincia` varchar(45) NOT NULL,
  `localidad` varchar(45) NOT NULL,
  `codPostal` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `nombre`, `apellidos`, `fechaNacimiento`, `telefono`, `direccion`, `provincia`, `localidad`, `codPostal`, `email`, `passwd`) VALUES
(12345678, 'Admin', 'Admin', '2001-07-21', 628724104, 'Atarfe, c/vistalegre nº4', 'Granada', 'Atarfe', 18230, 'admin@gmail.com', 'admin12345'),
(76629683, 'Daniel', 'Santamarina', '2001-07-21', 628724103, 'Atarfe', 'Atarfe', 'Atarfe', 18230, 'danielnavarrosantamarina@gmail.com', '21072001d');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `linea-pedidos`
--
ALTER TABLE `linea-pedidos`
  ADD PRIMARY KEY (`id_producto`,`idpedido`),
  ADD KEY `linea-pedidos_ibfk_2` (`idpedido`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idpedido`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `realiza`
--
ALTER TABLE `realiza`
  ADD PRIMARY KEY (`dni`,`idpedido`),
  ADD KEY `realiza_ibfk_2` (`idpedido`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`cod-rol`,`usuario_dni`),
  ADD KEY `usuario_dni` (`usuario_dni`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `linea-pedidos`
--
ALTER TABLE `linea-pedidos`
  ADD CONSTRAINT `linea-pedidos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `mydb`.`producto` (`id-producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `linea-pedidos_ibfk_2` FOREIGN KEY (`idpedido`) REFERENCES `mydb`.`pedidos` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `realiza`
--
ALTER TABLE `realiza`
  ADD CONSTRAINT `realiza_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `usuario` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `realiza_ibfk_2` FOREIGN KEY (`idpedido`) REFERENCES `mydb`.`pedidos` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rol`
--
ALTER TABLE `rol`
  ADD CONSTRAINT `rol_ibfk_1` FOREIGN KEY (`usuario_dni`) REFERENCES `mydb`.`usuario` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
