-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2020 a las 01:41:16
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
  `estado` varchar(45) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id`, `nro`, `capacidad`, `estado`, `categoria_id`) VALUES
(1, 1, 2, 'disponible', 1),
(2, 2, 2, 'disponible', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
