-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2020 a las 03:50:09
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(65) NOT NULL,
  `descripcion` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Estandar', 'Nuestras habitaciones estandar son de una sola planta, y las más pequeñas en cuanto a tamaño, sólo cuentan con ducha (no bañera) y el baño en conjunto. Poseen calefacción central como el resto de las habitaciones, pero no cuentan con aire acondicionado, si con ventilador de techo. Tienen balcón, y solo hay en planta alta.\n(Todas las imágenes son a modo ilustrativo y pueden no representar la disposición actual de las habitaciones).'),
(2, 'Superior', 'Las habitaciones Superior (dobles – Matrimoniales o twin) son de una sola planta, un poco mayor en tamaño respecto de las estándar y  poseen el baño en conjunto, con bachas y bañeras talladas en madera. Disponen de calefacción por losa radiante y aire acondicionado. Tienen balcón y hay disponibilidad en planta baja y alta. (Todas las imágenes son a modo ilustrativo y pueden no representar la disposición actual de las habitaciones).'),
(3, 'Superior Plus', 'Las Habitaciones Superior Plus (Dobles – Matrimoniales o twin) Son mayores en tamaño respecto de la Superior, y ya cuenta con baño y antebaño, con bachas y bañeras talladas en madera. Disponen de calefacción por losa radiante y aire acondicionado. Tienen balcón y hay disponibilidad en planta baja únicamente. (Todas las imágenes son a modo ilustrativo y pueden no representar la disposición actual de las habitaciones).'),
(4, 'Lujo', 'Las habitaciones de  Lujo (Dobles y Triples – Matrimonial o twin) las de planta baja están ubicadas en los laterales del hotel o en planta alta en el centro, lo cual favorece mucho más la vista y el paisaje a su alrededor, cuentan con más luminosidad y las habitaciones son más amplias que el resto de las categorías. También a partir de ésta y las habitaciones restantes (lujo – suite y presidencial) cuentan con colchones KingSize (2×2). Disponen de calefacción por losa radiante y aire acondicionado. Tienen balcón. Las triples están únicamente en planta alta. (Todas las imágenes son a modo ilustrativo y pueden no representar la disposición actual de las habitaciones).'),
(5, 'Suite', ' La Suite (Doble – Matrimonial) Ubicado en planta alta, posee un lobby (planta baja de la habitación) con sillón, frigobar y tv, y se encuentra comunicada mediante una escalerita de madera hacia un entrepiso, en donde se encuentra la cama matrimonial. Dispone de calefacción por losa radiante y aire acondicionado. Tienen balcón. (Todas las imágenes son a modo ilustrativo y pueden no representar la disposición actual de las habitaciones).');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `id` int(11) NOT NULL,
  `nro` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `comodidades` mediumtext NOT NULL,
  `estado` varchar(45) NOT NULL,
  `ubicacion` varchar(65) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id`, `nro`, `capacidad`, `comodidades`, `estado`, `ubicacion`, `categoria_id`) VALUES
(10, 4, 4, 'Área 172 m2. Balcón privado con vista a los jardines. Minibar. Sistema de climatización. Caja de seguridad, compatible con notebook. Cafetera', 'ocupada', 'planta alta', 3),
(13, 3, 3, 'Área 172 m2. Balcón privado con vista a los jardines. Minibar. Sistema de climatización. Caja de seguridad, compatible con notebook. 2 (dos) baños una en planta baja donde se encuentra la cama matromonial y otro en la planta alta donde se encuentran (2) dos camas individuales', 'reservada', 'planta baja', 2),
(14, 5, 2, 'Área de 182 m2. Balcón privado con vista a la pileta exterior. Área de trabajo · Sofa esquienero muy comodo. Minibar · Sistema de climatización · Caja de seguridad, compatible con notebook. Máquina de café Illy en la habitación. Microondas. Jacuzzi.', 'disponible', 'planta alta', 5),
(15, 3, 2, 'Área de 182 m2. Balcón privado con vista a la pileta exterior. Área de trabajo · Sofa esquienero muy comodo. Minibar · Sistema de climatización · Caja de seguridad, compatible con notebook. Máquina de café Illy en la habitación. Microondas. Jacuzzi.', 'ocupada', 'planta baja', 5),
(16, 2, 4, 'Área 172 m2. Balcón privado con vista a los jardines. Minibar. Sistema de climatización. Caja de seguridad, compatible con notebook. Cafetera', 'disponible', 'planta baja', 1),
(17, 3, 5, 'Área de 182 m2. Balcón privado con vista a la pileta exterior. Área de trabajo · Sofa esquienero muy comodo. Minibar · Sistema de climatización · Caja de seguridad, compatible con notebook. Máquina de café Illy en la habitación. Microondas. Jacuzzi.', 'disponible', 'planta baja', 3),
(18, 5, 2, 'Área de 182 m2. Balcón privado con vista a la pileta exterior. Área de trabajo · Sofa esquienero muy comodo. Minibar · Sistema de climatización · Caja de seguridad, compatible con notebook. Máquina de café Illy en la habitación. Microondas. Jacuzzi.', 'disponible', 'sotano', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(125) NOT NULL,
  `apellido` varchar(125) NOT NULL,
  `sexo` varchar(12) NOT NULL,
  `fecha_nac` date NOT NULL,
  `email` varchar(165) NOT NULL,
  `user` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL,
  `habilitado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `sexo`, `fecha_nac`, `email`, `user`, `password`, `habilitado`) VALUES
(1, 'Noelia', 'Carrizo', 'F', '1989-09-22', 'noeliacarrizo22@gmail.com', 'noelia2020', 'e10adc3949ba59abbe56e057f20f883e', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `user_2` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `habitacion_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
