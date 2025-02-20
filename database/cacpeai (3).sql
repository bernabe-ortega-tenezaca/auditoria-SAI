-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-02-2025 a las 15:24:46
-- Versión del servidor: 9.1.0
-- Versión de PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cacpeai`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria_interna`
--

DROP TABLE IF EXISTS `auditoria_interna`;
CREATE TABLE IF NOT EXISTS `auditoria_interna` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador único de la tabla',
  `id_empleado` int NOT NULL COMMENT 'Identificador del empleado',
  `objetivo` text COLLATE utf8mb3_spanish_ci NOT NULL COMMENT 'Objetivo de la auditoria',
  `alcance` text COLLATE utf8mb3_spanish_ci NOT NULL COMMENT 'alcance de la auditoria',
  `abierto` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1. abierto, 2. cerrado',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación dle registro',
  PRIMARY KEY (`id`),
  KEY `idx_usuario_auditoria` (`id_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `auditoria_interna`
--

INSERT INTO `auditoria_interna` (`id`, `id_empleado`, `objetivo`, `alcance`, `abierto`, `created_at`) VALUES
(1, 5, 'Identificar y evaluar los riesgos de las operaciones de la cooperativa ', 'Evaluar la eficiencia de los controles internos', 1, '2025-02-12 10:34:56'),
(2, 1, 'Mejorar la gestión de riesgos, el control interno y el gobierno corporativo ', 'Identificar y evaluar los riesgos de las operaciones', 1, '2025-02-17 01:09:08'),
(3, 1, 'este objetivo', '21', 1, '2025-02-18 13:54:45'),
(4, 1, 'este objetivo', 'este alcance', 1, '2025-02-18 13:55:36'),
(5, 1, '12', '12', 1, '2025-02-18 14:07:18'),
(6, 1, 'fdfa', ' sdfa', 1, '2025-02-18 14:30:20'),
(7, 14, 'dsfasdfasf', 'fadsfda', 1, '2025-02-18 14:41:57'),
(8, 7, 'adfadsfasf', 'adsfasdfasdf', 1, '2025-02-18 15:17:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria_procesos`
--

DROP TABLE IF EXISTS `auditoria_procesos`;
CREATE TABLE IF NOT EXISTS `auditoria_procesos` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador único de la tabla',
  `noAuditoria` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL,
  `nivelCriticidad` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL COMMENT '1 Riesgo bajo; 2 Riesgo moderado; 3 Riesgo Alto; 4 Riesgo extremo',
  `importancia` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL COMMENT '1 De apoyo; 2 Riesgo Operativo; 3 Estratégicos',
  `expectativa` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL COMMENT '1 No se presentan expectativas; 2 Gerente de área; 3 Gerencia; 4 Órganos de gobierno',
  `hallazgo` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL COMMENT '1 hallazgo bajo; 2 Hallazgo medio; ;3 Hallazgos alto; 4 Hallazgo extremo',
  `fUltimaAuditoria` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL COMMENT '1. menor a 1 año; 2. Entre 1 y 2 años; 3. Entre 3 y 4 años; 4. Mayor a 5 años',
  `reqNormativos` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL COMMENT '1 Si; 0 No',
  `nivelRiesgo` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL COMMENT '1. Muy bajo\r\n2. Bajo\r\n3. Medio\r\n4. Alto',
  `actividadControl` text COLLATE utf8mb3_spanish_ci NOT NULL COMMENT 'Actividades realizadas en la auditoria',
  `fCorte` date DEFAULT NULL COMMENT 'Fecha de calendario',
  `fInicio` date NOT NULL COMMENT 'Fecha de calendario',
  `fFin` date NOT NULL COMMENT 'Fecha de calendario',
  `entregables` text COLLATE utf8mb3_spanish_ci NOT NULL COMMENT 'Documentación',
  `recursos` text COLLATE utf8mb3_spanish_ci NOT NULL COMMENT 'Recursos de la auditoría',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del registro',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `auditoria_procesos`
--

INSERT INTO `auditoria_procesos` (`id`, `noAuditoria`, `nivelCriticidad`, `importancia`, `expectativa`, `hallazgo`, `fUltimaAuditoria`, `reqNormativos`, `nivelRiesgo`, `actividadControl`, `fCorte`, `fInicio`, `fFin`, `entregables`, `recursos`, `created_at`) VALUES
(1, '1', '1', '1', '', '1', '', '', '', '', '2025-02-17', '2025-02-17', '2025-02-17', '', '', '2025-02-17 10:47:11'),
(2, '1', 'riesgoBajo', 'De apoyo', 'no', 'bajo', 'Menor a un año', 'Si', 'muybajo', 'a', NULL, '2025-01-01', '2025-01-01', 'da', 'ad', '2025-02-17 11:02:00'),
(3, '1', 'riesgoBajo', 'De apoyo', 'no', 'bajo', 'Menor a un año', 'Si', 'muybajo', 'a', NULL, '2025-01-01', '2025-01-01', 'da', 'ad', '2025-02-17 11:02:00'),
(4, '2', 'riesgoBajo', 'De apoyo', 'no', 'bajo', 'Menor a un año', 'Si', 'muybajo', '212', '2025-02-17', '2025-02-18', '2025-02-19', '11', '12', '2025-02-17 11:03:59'),
(5, '2', 'riesgoBajo', 'De apoyo', 'no', 'bajo', 'Menor a un año', 'Si', 'muybajo', '212', '2025-02-17', '2025-02-18', '2025-02-19', '11', '12', '2025-02-17 11:03:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

DROP TABLE IF EXISTS `documentos`;
CREATE TABLE IF NOT EXISTS `documentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `audit_proceso` int NOT NULL,
  `file` varchar(255) COLLATE utf8mb3_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

DROP TABLE IF EXISTS `proceso`;
CREATE TABLE IF NOT EXISTS `proceso` (
  `codigo` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL COMMENT 'Código del proceso',
  `tipo` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL COMMENT '1. Operativo; 2. Gboernante; 3.Apoyo',
  `linea` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL COMMENT '1. Minorista, 2. Tradicional, 3. Microfinanzas, 4. Tesorería',
  `nombre` text COLLATE utf8mb3_spanish_ci NOT NULL COMMENT 'Nombre del proceso',
  `area` text COLLATE utf8mb3_spanish_ci NOT NULL COMMENT 'Area del proceso',
  `responsable` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL COMMENT 'Responsable a cargo del proceso',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `proceso`
--

INSERT INTO `proceso` (`codigo`, `tipo`, `linea`, `nombre`, `area`, `responsable`, `created_at`) VALUES
('1', 'Operativo', 'Minorista', 'codigo de proceso', 'area de proceso', 'dfsa', '2025-02-17 19:03:55'),
('12', 'Operativo', 'Minorista', '124', '123', 'dfsa', '2025-02-15 10:18:19'),
('fsadfasdf', 'Operativo', 'Minorista', 'dfsafdsaf', 'dfsafasd', 'fasdfasdfasdfasdfasdf', '2025-02-16 22:16:40'),
('sdsa', 'Operativo', 'Minorista', 'sadas', 'asdsad', 'ggggggg', '2025-02-15 10:19:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsables`
--

DROP TABLE IF EXISTS `responsables`;
CREATE TABLE IF NOT EXISTS `responsables` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(200) COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `responsables`
--

INSERT INTO `responsables` (`id`, `nombres`) VALUES
(1, 'dfsa'),
(2, 'fadsfasdfasfdsf'),
(3, 'ggggggg'),
(4, 'fasdfasdfasdfasdfasdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador único y autonumérico de la tabla',
  `apellidos` varchar(30) COLLATE utf8mb3_spanish_ci NOT NULL COMMENT 'Apellidos del funcionario',
  `nombres` varchar(30) COLLATE utf8mb3_spanish_ci NOT NULL COMMENT 'Nombres del funcionario',
  `correo` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL COMMENT 'Correo único del funcionario',
  `contrasena` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL COMMENT 'Clave de acceso al ambiente de trabajo',
  `tipo` enum('administrador','auditor','gerente','empleado') COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT 'empleado' COMMENT 'adminitrador, auditor, gerente, empleado en general',
  `habilitado` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1. habilitado, 0. deshabilitado',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del registro ',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_correp` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `apellidos`, `nombres`, `correo`, `contrasena`, `tipo`, `habilitado`, `created_at`) VALUES
(1, 'Calle', 'Marco', 'mcalle@cacpe.ec', '$2y$10$4twXJXegkR5VY6yFB6UGmOO9WNWvnA05xYa/95dv7vKNjztP//feu', 'administrador', 1, '2025-02-04 08:45:57'),
(5, 'Calle', 'Marco', 'mcalle1@cacpe.ec', '123', 'administrador', 1, '2025-02-04 08:48:15'),
(6, '321', '123', '123@gmail.com', '$2y$10$.dS5eQnXSBr3s8S3Q7QJHO5caNzvgzOKoeNulwABaB9tLdwH4Rk52', 'administrador', 1, '2025-02-14 23:05:29'),
(7, '321', '123', '1234@gmail.com', '$2y$10$4CQM5ldv5kUkmilWxWHFu.HWa/Yx9dnsHOhU2VGUsKhmki1x4FEzm', 'administrador', 1, '2025-02-14 23:07:51'),
(8, '123', '123', '1231@gmail.com', '$2y$10$jjrzOdCotMMEzFUs9B4Ocu6MyalrRMpFTXGMOutNWfxeWnQqYThn.', 'empleado', 1, '2025-02-14 23:14:08'),
(9, '1234', '123', '1232@gmail.com', '$2y$10$CVJOjkU/oGNz4cSYCvF81u2YsugwkJkfyhs/iBcfmyeoNRostfUAu', 'empleado', 1, '2025-02-14 23:15:14'),
(10, '123', '123', '1233@gmail.com', '$2y$10$FMHBCExPkZLYw1jOk/BvIeSl7URwTZYjEXkQCPexfNa4oVJPZdwHa', 'empleado', 1, '2025-02-14 23:17:08'),
(11, '12', '12', '12@gmail.com', '$2y$10$S4TIOmFgl1d7xs.2Fr2Vg.uE2TL6Fp5RXPrQMaJlE/ppuNESANGZK', 'empleado', 1, '2025-02-14 23:18:14'),
(12, '1', '1', '1@gmail.com', '$2y$10$1wUvIC1K1SocoAc8sGt7C.Io210216kc49Q.WP4kBFihgOX2is0Pa', 'empleado', 1, '2025-02-14 23:21:28'),
(13, '12', '12', '12@cacpe.ec', '$2y$10$H1NLEg6jgiL/bsPvSeape.Ypd4pkH7ei5RR7UFnW33YaLRUtl2LQS', 'empleado', 1, '2025-02-15 02:03:34'),
(14, '3213221332', '2123321', 'dome@gmail.com', '$2y$10$57DQx.OUTrJeJCTSrSg8/.1e262gKSymq5omWTw.t/qC6M2ZohY.S', 'empleado', 1, '2025-02-16 22:15:49'),
(15, '312312312', '12321', 'admin2121@gmail.com', '$2y$10$OvsSxPIDmd8T.op6xz.r.u6TWKVNqPcMJsSPTcde4UHWKZKNVttrW', 'administrador', 1, '2025-02-17 18:46:53');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auditoria_interna`
--
ALTER TABLE `auditoria_interna`
  ADD CONSTRAINT `idx_usuario_auditoria` FOREIGN KEY (`id_empleado`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
