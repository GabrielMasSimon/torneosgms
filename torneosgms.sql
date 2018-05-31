-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2018 at 12:48 AM
-- Server version: 5.7.21
-- PHP Version: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `torneosgms`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(100) NOT NULL,
  `mensaje` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `mensaje`) VALUES
(1, 'Buenos días querido público. Hace un día estupendo para realizar este partido, y con esto.... !COMIENZA EL PARTIDO¡'),
(2, 'Rafa coge el balón, y se dirige a la portería contrária'),
(3, 'Se va de Tonino, y se queda solo ante el portero y ...');

-- --------------------------------------------------------

--
-- Table structure for table `deportes`
--

CREATE TABLE `deportes` (
  `id_deporte` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `id_torneo` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deportes`
--

INSERT INTO `deportes` (`id_deporte`, `nombre`, `id_torneo`) VALUES
(1, 'Futbol', 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `puntos` int(10) DEFAULT '0',
  `id_partido` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `nombre`, `puntos`, `id_partido`) VALUES
(1, '1 ESO', 9, NULL),
(2, '2 ESO', 6, NULL),
(4, 'Los lobos', 11, NULL),
(7, 'Angeles guardianes', 5, NULL),
(13, 'Los Cifuentes', 7, NULL),
(14, 'Los Gaviotas', 3, NULL),
(23, 'Los profes', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jugadores`
--

CREATE TABLE `jugadores` (
  `id_jugador` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `dorsal` int(3) DEFAULT NULL,
  `id_equipo` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jugadores`
--

INSERT INTO `jugadores` (`id_jugador`, `nombre`, `apellidos`, `email`, `sexo`, `dorsal`, `id_equipo`) VALUES
(10, 'Juana', 'Cortés', '', '', NULL, NULL),
(11, 'Juan', '', '', 'M', NULL, NULL),
(12, 'Maria', 'Juarez', 'msuarez@gmail.com', 'F', NULL, NULL),
(13, 'Eugenia', 'Lopez', 'euge@gmail.com', 'F', 19, NULL),
(15, 'Rafel', 'Amengual', 'ramengual@correo.es', 'M', 7, NULL),
(25, 'Manolo', 'Peralta', 'mp@gmail.com', 'M', 1, 4),
(26, 'Juan', 'Vidal', 'jv@gmail.com', 'M', 2, 1),
(27, 'Ines', 'Lorca', 'Il@gmail.com', 'F', 23, 2),
(30, 'Rafel', 'Amengual', 'rafel@gmail.com', 'M', 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `partidos`
--

CREATE TABLE `partidos` (
  `id_partido` int(10) NOT NULL,
  `id_deporte` int(10) NOT NULL DEFAULT '1',
  `goles_local` int(10) DEFAULT '0',
  `goles_visitante` int(10) DEFAULT '0',
  `equipo_local` int(10) DEFAULT NULL,
  `equipo_visitante` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partidos`
--

INSERT INTO `partidos` (`id_partido`, `id_deporte`, `goles_local`, `goles_visitante`, `equipo_local`, `equipo_visitante`) VALUES
(48, 1, 2, 0, 23, 7),
(54, 1, 0, 0, 1, 2),
(55, 1, 1, 0, 4, 7),
(56, 1, 0, 0, 1, 2),
(57, 1, 1, 1, 1, 7),
(58, 1, 1, 0, 23, 4),
(59, 1, 0, 0, 4, 7),
(60, 1, 0, 0, 7, 14),
(61, 1, 0, 0, 1, 2),
(62, 1, 0, 0, 2, 1),
(63, 1, 0, 0, 1, 4),
(64, 1, 0, 0, 23, 13),
(65, 1, 0, 0, 23, 1),
(66, 1, 0, 1, 1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `torneos`
--

CREATE TABLE `torneos` (
  `id_torneo` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `torneos`
--

INSERT INTO `torneos` (`id_torneo`, `nombre`) VALUES
(1, 'liga 1ºESO');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`) VALUES
(2, 'admin', 'admin', '$1AKteq..edcc'),
(8, 'lito', 'lito', '$1yIrehyoHhOU'),
(38, 'toni', 'toni', 'en.cRh/XkaNj6'),
(41, 'rafa', 'rafa', 'en2djegHkJ5hE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indexes for table `deportes`
--
ALTER TABLE `deportes`
  ADD PRIMARY KEY (`id_deporte`),
  ADD KEY `id_torneo` (`id_torneo`);

--
-- Indexes for table `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `id_partido` (`id_partido`);

--
-- Indexes for table `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id_jugador`),
  ADD KEY `jugadores_ibfk_1` (`id_equipo`);

--
-- Indexes for table `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`id_partido`),
  ADD KEY `id_deporte` (`id_deporte`),
  ADD KEY `equipo_local` (`equipo_local`),
  ADD KEY `equipo_visitante` (`equipo_visitante`);

--
-- Indexes for table `torneos`
--
ALTER TABLE `torneos`
  ADD PRIMARY KEY (`id_torneo`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deportes`
--
ALTER TABLE `deportes`
  MODIFY `id_deporte` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id_jugador` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `partidos`
--
ALTER TABLE `partidos`
  MODIFY `id_partido` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `torneos`
--
ALTER TABLE `torneos`
  MODIFY `id_torneo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deportes`
--
ALTER TABLE `deportes`
  ADD CONSTRAINT `deportes_ibfk_1` FOREIGN KEY (`id_torneo`) REFERENCES `torneos` (`id_torneo`);

--
-- Constraints for table `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`id_partido`) REFERENCES `partidos` (`id_partido`);

--
-- Constraints for table `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`) ON DELETE CASCADE;

--
-- Constraints for table `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `partidos_ibfk_1` FOREIGN KEY (`id_deporte`) REFERENCES `deportes` (`id_deporte`),
  ADD CONSTRAINT `partidos_ibfk_2` FOREIGN KEY (`equipo_local`) REFERENCES `equipos` (`id_equipo`),
  ADD CONSTRAINT `partidos_ibfk_3` FOREIGN KEY (`equipo_visitante`) REFERENCES `equipos` (`id_equipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
