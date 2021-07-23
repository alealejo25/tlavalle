-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-07-2020 a las 03:35:36
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tlavalle`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acoplados`
--

CREATE TABLE `acoplados` (
  `id` int(10) UNSIGNED NOT NULL,
  `dominio` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `año` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_egreso` date DEFAULT NULL,
  `valor` int(11) NOT NULL,
  `amortizacion` double(4,2) NOT NULL,
  `foto` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `camion_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `acoplados`
--

INSERT INTO `acoplados` (`id`, `dominio`, `modelo`, `marca`, `año`, `fecha_ingreso`, `fecha_egreso`, `valor`, `amortizacion`, `foto`, `condicion`, `camion_id`, `created_at`, `updated_at`) VALUES
(1, 'AC124CX', 'SEMI BAR. VOLC. 14.50MS', 'HERMANN', 2018, '0000-00-00', NULL, 0, 0.00, NULL, 0, 13, '2020-06-08 23:31:39', '2020-06-08 23:34:19'),
(2, 'HMT078', 'SEMI BAR. VOLC. 13.50MS', 'MONTEBRAS', 2008, '0000-00-00', NULL, 0, 0.00, NULL, 0, 14, '2020-06-08 23:34:53', '2020-06-08 23:34:53'),
(3, 'AD432NN', 'BATEA VUELCO TRAS', 'HERMANN', 2018, '0000-00-00', NULL, 0, 0.00, NULL, 0, 15, '2020-06-08 23:35:30', '2020-06-08 23:35:30'),
(4, 'HMT079', 'SEMI BAR. VOLC. 13.50MS', 'MONTEBRAS', 2008, '0000-00-00', NULL, 0, 0.00, NULL, 0, 16, '2020-06-08 23:36:09', '2020-06-08 23:36:09'),
(5, 'GOV813', 'SEMI BAR. VOLC. 13.50MS', 'MONTEBRAS', 2008, '0000-00-00', NULL, 0, 0.00, NULL, 0, 17, '2020-06-08 23:36:38', '2020-06-08 23:36:38'),
(6, 'AC402IZ', 'SEMI BAR. VOLC. 14.50MS', 'HERMANN', 2018, '0000-00-00', NULL, 0, 0.00, NULL, 0, 18, '2020-06-08 23:37:20', '2020-06-08 23:37:20'),
(7, 'LHA427', 'SEMI BAR. VOLC. 14.50MS', 'HELVETICA', 2012, '0000-00-00', NULL, 0, 0.00, NULL, 0, 19, '2020-06-08 23:38:32', '2020-06-08 23:38:32'),
(8, 'AC402IE', 'SEMI BAR. VOLC. 14.50MS', 'HERMANN', 2018, '0000-00-00', NULL, 0, 0.00, NULL, 0, 20, '2020-06-08 23:39:15', '2020-06-08 23:39:15'),
(9, 'KYO503', 'ACOPLADO BAR.VOLC.', 'HERMANN', 2012, '0000-00-00', NULL, 0, 0.00, NULL, 0, 2, '2020-06-08 23:40:12', '2020-06-08 23:40:12'),
(10, 'LSW927', 'ACOPLADO BAR.VOLC', 'HELVETICA', 2012, '0000-00-00', NULL, 0, 0.00, NULL, 0, 3, '2020-06-08 23:41:04', '2020-06-08 23:41:04'),
(11, 'HSG276', 'ACOPLADO BAR.VOLC.', 'NAVATUC', 2012, '0000-00-00', NULL, 0, 0.00, NULL, 0, 4, '2020-06-08 23:42:49', '2020-06-08 23:42:49'),
(12, 'KVN105', 'ACOPLADO BAR.VOLC.', 'HERMANN', 2012, '0000-00-00', NULL, 0, 0.00, NULL, 0, 5, '2020-06-08 23:43:20', '2020-06-08 23:43:20'),
(13, 'HYW272', 'ACOPLADO BAR.VOLC.', 'NAVATUC', 2011, '0000-00-00', NULL, 0, 0.00, NULL, 0, 6, '2020-06-08 23:44:52', '2020-06-08 23:44:52'),
(14, 'JDZ956', 'ACOPLADO BAR.VOLC.', 'SOLA Y BRUSA', 2014, '0000-00-00', NULL, 0, 0.00, NULL, 0, 7, '2020-06-08 23:45:27', '2020-06-08 23:45:27'),
(15, 'KVN098', 'ACOPLADO BAR.VOLC.', 'HERMANN', 2012, '0000-00-00', NULL, 0, 0.00, NULL, 0, 8, '2020-06-08 23:46:02', '2020-06-08 23:46:02'),
(16, 'AC799PG', 'ACOPLADO BAR.VOLC.', 'HERMANN', 2018, '0000-00-00', NULL, 0, 0.00, NULL, 0, 9, '2020-06-08 23:46:34', '2020-06-08 23:46:34'),
(17, 'KVN100', 'ACOPLADO BAR.VOLC.', 'HERMANN', 2012, '0000-00-00', NULL, 0, 0.00, NULL, 0, 10, '2020-06-08 23:47:02', '2020-06-08 23:47:02'),
(18, 'KVN099', 'ACOPLADO BAR.VOLC.', 'HERMANN', 2012, '0000-00-00', NULL, 0, 0.00, NULL, 0, 11, '2020-06-08 23:47:35', '2020-06-08 23:47:35'),
(19, 'AD319JW', 'SAIDER 14.50MS', 'HERMANN', 2019, '0000-00-00', NULL, 0, 0.00, NULL, 0, 21, '2020-06-08 23:48:27', '2020-06-08 23:48:27'),
(20, 'AC326EU', 'SAIDER DEPRIMIDO 14.50MS', 'HERMANN', 2018, '0000-00-00', NULL, 0, 0.00, NULL, 0, 22, '2020-06-08 23:49:06', '2020-06-08 23:49:06'),
(21, 'LSW930', 'ACOPLADO BAR.VOLC.', 'HELVETICA', 2012, '0000-00-00', NULL, 0, 0.00, NULL, 0, 12, '2020-06-08 23:49:40', '2020-06-08 23:49:40'),
(22, 'AC326ET', 'SAIDER DEPRIMIDO 14.50MS', 'HERMANN', 2018, '0000-00-00', NULL, 0, 0.00, NULL, 0, 23, '2020-06-08 23:50:09', '2020-06-08 23:50:09'),
(23, 'AB372UY', 'SEMI BAR. VOLC. 14.50MS', 'HERMANN', 2017, '0000-00-00', NULL, 0, 0.00, NULL, 0, 24, '2020-06-08 23:50:46', '2020-06-08 23:50:46'),
(24, 'KWF184', 'SEMI BAR. VOLC. 14.50MS', 'HERMANN', 2011, '0000-00-00', NULL, 0, 0.00, NULL, 0, 25, '2020-06-08 23:51:12', '2020-06-08 23:51:12'),
(25, 'AD497HM', 'SEMI BAR. VOLC. 14.50MS', 'HERMANN', 2019, '0000-00-00', NULL, 0, 0.00, NULL, 0, 26, '2020-06-08 23:51:42', '2020-06-08 23:51:42'),
(26, 'LHA429', 'SEMI BAR. VOLC. 14.50MS', 'HELVETICA', 2012, '0000-00-00', NULL, 0, 0.00, NULL, 0, 27, '2020-06-08 23:52:20', '2020-06-08 23:52:20'),
(27, 'KVS261', 'SEMI BAR. VOLC. 14.50MS', 'HERMANN', 2011, '0000-00-00', NULL, 0, 0.00, NULL, 0, 28, '2020-06-08 23:53:11', '2020-06-08 23:53:11'),
(28, 'MXD987', 'SEMI BAR. VOLC. 14.50MS', 'OMBU', 2014, '0000-00-00', NULL, 0, 0.00, NULL, 0, 29, '2020-06-08 23:54:32', '2020-06-08 23:54:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afip_prestamos_moratorias`
--

CREATE TABLE `afip_prestamos_moratorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `impuesto` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto_declarado` int(11) NOT NULL,
  `cant_cuotas` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_primera_cuota` date NOT NULL,
  `fecha_ultima_cuota` date DEFAULT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `codigo`, `nombre`, `cantidad`, `categoria_id`, `cliente_id`, `condicion`, `created_at`, `updated_at`) VALUES
(1, '100070004 -22', 'coliman blanco', 1, 2, 1, 0, '2020-06-08 22:31:55', '2020-06-08 22:31:55'),
(2, '100070004 - 22', 'COLIMAN BLANCO 6X750', 1, 2, 1, 0, '2020-06-08 22:32:50', '2020-06-08 22:32:50'),
(3, '100070015 - 22', 'COLIMAN TINTO  6X750', 1, 2, 1, 0, '2020-06-08 22:59:55', '2020-06-08 22:59:55'),
(4, '100070016 - 33', 'VIÑAS DE BALBO CHABLIS 6X1125', 1, 2, 1, 0, '2020-06-08 23:00:35', '2020-06-08 23:00:35'),
(5, '100070014 - 33', 'VIÑAS DE BALBO BORGOÑA 6X1125', 1, 2, 1, 0, '2020-06-08 23:01:08', '2020-06-08 23:01:08'),
(6, '100100033 - 22', 'NAMPE TORRONTES 6X750', 1, 2, 1, 0, '2020-06-08 23:02:34', '2020-06-08 23:02:34'),
(7, '100100023 - 22', 'NAMPE CHARDONAY 6X750', 1, 2, 1, 0, '2020-06-08 23:03:34', '2020-06-08 23:03:34'),
(8, '100100032 - 22', 'NAMPE SOUVIGNION BLANC 6X750', 1, 2, 1, 0, '2020-06-08 23:04:17', '2020-06-08 23:04:17'),
(9, '100100035 - 22', 'NAMPE CABERNET 6X750', 1, 2, 1, 0, '2020-06-08 23:04:51', '2020-06-08 23:04:51'),
(10, '100100024 - 22', 'NAMPE MALBEC 6X750', 1, 2, 1, 0, '2020-06-08 23:05:21', '2020-06-08 23:05:21'),
(11, '100100036 - 22', 'NAMPE ROSADO DE MALBEC 6X750', 1, 2, 1, 0, '2020-06-08 23:05:54', '2020-06-08 23:05:54'),
(12, '100100037 - 22', 'NAMPE SYRAH 6X750', 1, 2, 1, 0, '2020-06-08 23:06:24', '2020-06-08 23:06:24'),
(13, '100100034', 'NAMPE TEMPRANILLO 6X750', 1, 2, 1, 0, '2020-06-08 23:06:48', '2020-06-08 23:06:48'),
(14, '100100038 - 22', 'NAMPE MERLOT 6X750', 1, 2, 1, 0, '2020-06-08 23:07:18', '2020-06-08 23:07:18'),
(15, '100100025 - 20', 'ESTATE SOUVIGNION BLANC 6X375', 1, 2, 1, 0, '2020-06-08 23:08:00', '2020-06-08 23:08:16'),
(16, '100190001 - 20', 'ESTATE MALBEC 6X375', 1, 2, 1, 0, '2020-06-08 23:08:46', '2020-06-08 23:08:46'),
(17, '100100023 - 33', 'NAMPE CHARDONAY 6X1125', 1, 2, 1, 0, '2020-06-08 23:09:16', '2020-06-08 23:09:16'),
(18, '100100035 - 33', 'NAMPE CABERNET 6X1125', 1, 2, 1, 0, '2020-06-08 23:09:41', '2020-06-08 23:09:41'),
(19, '100100024 - 33', 'NAMPE MALBEC 6X1125', 1, 2, 1, 0, '2020-06-08 23:10:19', '2020-06-08 23:10:19'),
(20, '100190002 - 22', 'ESTATE CHARDONNAY 6X750', 1, 2, 1, 0, '2020-06-08 23:10:56', '2020-06-08 23:10:56'),
(21, '100100025 - 22', 'ESTATE SOUVIGNION BLANC 6X750', 1, 2, 1, 0, '2020-06-08 23:11:42', '2020-06-08 23:11:42'),
(22, '100190003 - 22', 'ESTATE CABERNET 6X750', 1, 2, 1, 0, '2020-06-08 23:12:16', '2020-06-08 23:12:16'),
(23, '1001190001 - 22', 'ESTATE MALBEC 6X750', 1, 2, 1, 0, '2020-06-08 23:12:59', '2020-06-08 23:12:59'),
(24, '100190001 - 22', 'ESTATE MALBEC 6X750', 1, 2, 1, 0, '2020-06-08 23:14:19', '2020-06-08 23:14:19'),
(25, '100100030 - 22', 'ESTATE BONARDA 6X750', 1, 2, 1, 0, '2020-06-08 23:14:56', '2020-06-08 23:14:56'),
(26, '100100040 - 22', 'ESTATE BLEND 6X750', 1, 2, 1, 0, '2020-06-08 23:15:28', '2020-06-08 23:15:28'),
(27, '100100026 - 22', 'GRAN CORTE LOS HAROLDOS 6X750', 1, 2, 1, 0, '2020-06-08 23:16:03', '2020-06-08 23:16:03'),
(28, '100100027 - 22', 'HERMANDAD MALBEC 6X750', 1, 2, 1, 0, '2020-06-08 23:16:33', '2020-06-08 23:16:33'),
(29, '100080034 - 22', 'HERMANDAD CABERNET FRANK 6X750', 1, 2, 1, 0, '2020-06-08 23:17:06', '2020-06-08 23:17:43'),
(30, '100100028 - 22', 'HERMANDAD BLEND 6 X750', 1, 2, 1, 0, '2020-06-08 23:17:33', '2020-06-08 23:17:33'),
(31, '100100029 - 22', 'HERMANDAD CHARDONNAY 6X750', 1, 2, 1, 0, '2020-06-08 23:18:32', '2020-06-08 23:18:32'),
(32, '100080003 - 22', 'LH RESERVA CABERNET 6X750', 1, 2, 1, 0, '2020-06-08 23:19:04', '2020-06-08 23:19:04'),
(33, '100080002 - 22', 'LH RESERVA MABEC 6X750', 1, 2, 1, 0, '2020-06-08 23:19:39', '2020-06-08 23:19:39'),
(34, '100200001 - 22', 'LH CHAMPAGNE 6X750', 1, 2, 1, 0, '2020-06-08 23:20:16', '2020-06-08 23:20:16'),
(35, '100100241 - 22', 'CHACABUCO CABERNET 6X750', 1, 2, 1, 0, '2020-06-08 23:21:10', '2020-06-08 23:21:10'),
(36, '100100242 - 22', 'CHACABUCO VIGNIER 6X750', 1, 2, 1, 0, '2020-06-08 23:21:43', '2020-06-08 23:21:43'),
(37, '100100240 - 22', 'CHACABUCO MALBEC 6X750', 1, 2, 1, 0, '2020-06-08 23:22:17', '2020-06-08 23:22:17'),
(38, '100100302 - 22', 'CHACABUCO CHENIN DULCE 6X750', 1, 2, 1, 0, '2020-06-08 23:22:48', '2020-06-08 23:23:02'),
(39, '100100240 - 22', 'CHACABUCO MALBEC 6X750', 1, 2, 1, 0, '2020-06-08 23:23:30', '2020-06-08 23:23:30'),
(40, '100100240 - 33', 'CHACABUCO MALBEC 6X1500', 1, 2, 1, 0, '2020-06-08 23:24:05', '2020-06-08 23:24:05'),
(41, '100070076 - 33', 'CHACABUCO BLEND 6X1500', 1, 2, 1, 0, '2020-06-08 23:24:28', '2020-06-08 23:24:28'),
(42, '100100020 - 20', 'NAMPE SOUVIGNION BLANC 6X375', 1, 2, 1, 0, '2020-06-08 23:25:05', '2020-06-08 23:25:05'),
(43, '100100022 - 33', 'NAMPE SOUVIGNION BLANC 6X1125', 1, 2, 1, 0, '2020-06-08 23:25:39', '2020-06-08 23:25:39'),
(44, '6002801510', 'ESTUCHE GRAN CORTE', 1, 2, 1, 0, '2020-06-08 23:26:04', '2020-06-08 23:26:04'),
(45, '6002801520', 'ESTUCHE HERMANDAD 3 BOTELLAS', 1, 2, 1, 0, '2020-06-08 23:26:35', '2020-06-08 23:26:35'),
(46, '6002801610', 'ESTUCHE HERMANDAD 1 BOTELLA', 1, 2, 1, 0, '2020-06-08 23:26:59', '2020-06-08 23:26:59'),
(47, '600280159', 'CAVA', 1, 2, 1, 0, '2020-06-08 23:27:20', '2020-06-08 23:27:20'),
(48, '1002800020', 'BICICLETAS SIMLES 1 COLOR', 1, 2, 1, 0, '2020-06-08 23:28:00', '2020-06-08 23:28:00'),
(49, '1002800021', 'BICICLETAS SIMPLES BICOLOR', 1, 2, 1, 0, '2020-06-08 23:28:32', '2020-06-08 23:28:32'),
(50, '1002800030', 'BICICLETAS TANDEM', 1, 2, 1, 0, '2020-06-08 23:28:53', '2020-06-08 23:28:53'),
(51, 'FLDMAX', 'FINCA LA DELFINA MAXIMO', 1, 3, 1, 0, '2020-06-09 15:25:35', '2020-06-09 15:25:35'),
(52, 'FLDCHAMP', 'FINCA LA DELFINA CHAMPAGNE', 1, 3, 1, 0, '2020-06-09 15:26:21', '2020-06-09 15:26:21'),
(53, 'FLDM', 'FINCA LA DELFINA MALBEC', 1, 3, 1, 0, '2020-06-09 15:26:41', '2020-06-09 15:26:41'),
(54, 'FLDCS', 'FINCA LA DELFINA CABERNET SOUVIGNION', 1, 3, 1, 0, '2020-06-09 15:27:10', '2020-06-09 15:27:10'),
(55, 'FLDSB', 'FINCA LA DELFINA SUAVIGNION BLANC', 1, 3, 1, 0, '2020-06-09 15:27:51', '2020-06-09 15:27:51'),
(56, 'VM1125', 'VIEJA MENDOZA 6X1125', 1, 3, 1, 0, '2020-06-09 15:28:18', '2020-06-09 15:28:18'),
(57, 'VM750', 'VIEJA MENDOZA 6X750', 1, 3, 1, 0, '2020-06-09 15:28:54', '2020-06-09 15:28:54'),
(58, 'VM700', 'VIEJA MENDOZA 6X700', 1, 3, 1, 0, '2020-06-09 15:29:55', '2020-06-09 15:29:55'),
(59, 'P1125', 'PADRINO CLASICO 6X1125', 1, 3, 1, 0, '2020-06-09 15:30:37', '2020-06-09 15:34:41'),
(60, 'TT', 'TERNUVA TINTO 12X 1000CC', 1, 3, 1, 0, '2020-06-09 15:30:59', '2020-06-09 15:35:36'),
(61, 'TB', 'TERNUVA BLANCO 12X1000CC', 1, 3, 1, 0, '2020-06-09 15:31:25', '2020-06-09 15:35:47'),
(62, 'TR', 'TERNUVA ROSADO 12X1000CC', 1, 3, 1, 0, '2020-06-09 15:32:16', '2020-06-09 15:36:02'),
(63, 'PT', 'PADRINO TINTO 12000CC', 1, 3, 1, 0, '2020-06-09 15:32:50', '2020-06-09 15:36:35'),
(64, 'PB', 'PADRINO BLANCO 12X1000CC', 1, 3, 1, 0, '2020-06-09 15:33:08', '2020-06-09 15:36:20'),
(65, 'PR', 'PADRINO ROSADO 12X1000CC', 1, 3, 1, 0, '2020-06-09 15:33:28', '2020-06-09 15:36:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `id` int(10) UNSIGNED NOT NULL,
  `denominacion` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id`, `denominacion`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 'BBVA FRANCES', 0, NULL, NULL),
(2, 'ICBC', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bienes_de_uso`
--

CREATE TABLE `bienes_de_uso` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_egreso` date DEFAULT NULL,
  `valor` int(11) NOT NULL,
  `amortizacion` double(4,2) NOT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE `cajas` (
  `id` int(10) UNSIGNED NOT NULL,
  `denominacion` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`id`, `denominacion`, `descripcion`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 'CAJA RECEPCIÓN', 'CAJA NATALI', 0, NULL, '2020-06-08 21:09:38'),
(2, 'CAJA TRANSPORTE LAVALLE', 'CAJA CRISTIAN Y JESICA', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camiones`
--

CREATE TABLE `camiones` (
  `id` int(10) UNSIGNED NOT NULL,
  `nro_unidad` int(11) NOT NULL,
  `dominio` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `año` int(11) NOT NULL,
  `km` int(11) NOT NULL,
  `ultimoservice` date NOT NULL,
  `proximoservice` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_egreso` date DEFAULT NULL,
  `valor` int(11) NOT NULL,
  `amortizacion` double(4,2) NOT NULL,
  `foto` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `camiones`
--

INSERT INTO `camiones` (`id`, `nro_unidad`, `dominio`, `modelo`, `marca`, `año`, `km`, `ultimoservice`, `proximoservice`, `fecha_ingreso`, `fecha_egreso`, `valor`, `amortizacion`, `foto`, `condicion`, `created_at`, `updated_at`) VALUES
(2, 0, 'NQN872', '166-CARGO 1722- CHASIS', 'FORD', 2014, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, '2020-06-08 23:12:08'),
(3, 0, 'MQF269', '896- ATEGO 1725- CHASIS', 'MERCEDES BENZ', 2013, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, '2020-06-08 23:12:18'),
(4, 0, 'HMS936', '896-ATEGO 1725 CHASIS', 'MERCEDES BENZ', 2008, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, '2020-06-08 23:12:42'),
(5, 0, 'LKU911', '166-CARGO 1722 CHASIS', 'FORD', 2012, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, '2020-06-08 23:12:51'),
(6, 0, 'LMN553', '896-ATEGO 1725 CHASIS', 'MERCEDES BENZ', 2012, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, '2020-06-08 23:12:59'),
(7, 0, 'PJG557', '896-ATEGO 1725 CHASIS', 'MERCEDES BENZ', 2015, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, '2020-06-08 23:13:07'),
(8, 0, 'OYA210', '383-17.250E CHASIS', 'VOLKSWAGEN', 2014, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, '2020-06-08 23:13:14'),
(9, 0, 'OYA217', '383-17.250E CHASIS', 'VOLKSWAGEN', 2014, 0, '2020-06-08', 0, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, '2020-06-08 23:13:24'),
(10, 0, 'KTE646', '315-P340 D4X2 CHASIS', 'SCANIA', 2011, 0, '2020-06-08', 0, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, '2020-06-08 23:13:33'),
(11, 0, 'KWF218', '315-P340 B4X2 CHASIS', 'SCANIA', 2012, 0, '2020-06-08', 0, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, '2020-06-08 23:13:44'),
(12, 0, 'PMM052', '166-CARGO 1722 CHASIS', 'FORD', 2016, 0, '2020-06-08', 0, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, '2020-06-08 23:13:53'),
(13, 0, 'AA717LC', 'CARGO 2042-TRACTOR', 'FORD', 2016, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, '2020-06-08 23:22:20'),
(14, 0, 'HLP825', '1634-TRACTOR', 'MERCEDES BENZ', 2008, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, '2020-06-08 23:22:38'),
(15, 0, 'HAQ700', '1634-TRACTOR', 'MERCEDES BENZ', 2008, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, NULL),
(16, 0, 'HYC898', '1634-TRACTOR', 'MERCEDES BENZ', 2008, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, NULL),
(17, 0, 'GSA249', '1634-TRACTOR', 'MERCEDES BENZ', 2008, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, NULL),
(18, 0, 'AA717LE', 'CARGO 2042-TRACTOR', 'FORD', 2016, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, NULL),
(19, 0, 'OXO514', 'CARGO 1722-TRACTOR', 'FORD', 2015, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, NULL),
(20, 0, 'AC540GP', 'ATEGO 1726-TRACTOR', 'MERCEDES BENZ', 2018, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, NULL),
(21, 0, 'OCL757', 'AXOR 2035-TRACTOR', 'MERCEDES BENZ', 2015, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, NULL),
(22, 0, 'AB110AN', 'CARGO 2042-TRACTOR', 'FORD', 2016, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, NULL),
(23, 0, 'AA816XF', 'CARGO 2042-TRACTOR', 'FORD', 2016, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, NULL),
(24, 0, 'AD020RU', 'ATEGO 1726-TRACTOR', 'MERCEDES BENZ', 2018, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, NULL),
(25, 0, 'AA444GC', 'ATTACK-TRACTOR', 'IVECO', 2016, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, NULL),
(26, 0, 'AA253EE', 'CURSOR 330-TRACTOR', 'IVECO', 2016, 0, '2020-06-08', 10, '2020-07-02', NULL, 0, 0.00, NULL, 0, NULL, '2020-07-02 04:30:42'),
(27, 0, 'AC222HZ', 'ATEGO 1726-TRACTOR', 'MERCEDES BENZ', 2018, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, NULL),
(28, 0, 'AC222JL', 'ATEGO 1726-TRACTOR', 'MERCEDES BENZ', 2018, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, NULL),
(29, 0, 'AC222JJ', 'ATEGO 1726-TRACTOR', 'MERCEDES BENZ', 2018, 0, '2020-06-08', 10, '0000-00-00', NULL, 0, 0.00, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `condicion`, `created_at`, `updated_at`) VALUES
(2, 'VINOS BODEGA BALBO', 0, NULL, NULL),
(3, 'VINOS BODEGA RUBINO', 0, NULL, NULL),
(4, 'PALLET EN DEPOSITO', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cheques`
--

CREATE TABLE `cheques` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `importe` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bancos_id` int(10) UNSIGNED NOT NULL,
  `clientes_id` int(10) UNSIGNED NOT NULL,
  `proveedores_id` int(10) UNSIGNED NOT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `choferes`
--

CREATE TABLE `choferes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechanac` date NOT NULL,
  `nrocelular` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` int(11) NOT NULL,
  `camion_id` int(10) UNSIGNED NOT NULL,
  `foto` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `choferes`
--

INSERT INTO `choferes` (`id`, `nombre`, `apellido`, `dni`, `direccion`, `fechanac`, `nrocelular`, `saldo`, `camion_id`, `foto`, `condicion`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', '1', '2020-07-11', '1', 1, 26, NULL, 0, '2020-07-11 13:26:00', '2020-07-11 13:26:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provincia` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localidad` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_contacto` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuit` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` int(11) NOT NULL DEFAULT '0',
  `clientepallet` tinyint(4) NOT NULL DEFAULT '0',
  `saldopallet` int(11) DEFAULT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `direccion`, `provincia`, `localidad`, `telefono`, `email`, `contacto`, `telefono_contacto`, `cuit`, `saldo`, `clientepallet`, `saldopallet`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 'COMPLEJO ALIMENTICIO SAN SALVADOR', 'RUTA PROV. 302 KM 14', '', '', '4-842800', '', 'DAMIAN', '381-6645995', '30711828326', 1, 0, 1, 0, NULL, NULL),
(2, 'COMPLEJO AZUCARERO CONCEPCIÓN SA', 'AV. JOSE MARIA PAZ 1, BANDA DEL RIO SALI', '', '', '4252525', '', 'JUAN', '381506458', '30715553712', 1, 0, NULL, 0, NULL, NULL),
(3, 'PAPELERA DEL TUCUMAN SA', 'RUTA 36 KM 1526', '', '', '4811155', '', 'OSVALDO', '1157331354', '30680776578', 1, 0, NULL, 0, NULL, NULL),
(4, 'AITOR IDER BALBO SAACI MENDOZA', 'BAUDREL Y VIOR 0', '', '', '2634421236', '', 'JUAN PABLO GIRADO', '3515588764', '30551667800', 1, 0, 1, 0, NULL, '2020-06-08 23:14:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_bancarias_propias`
--

CREATE TABLE `cuentas_bancarias_propias` (
  `id` int(10) UNSIGNED NOT NULL,
  `cbu` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias_cbu` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titular` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identificacion_tributaria` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_bancarias_proveedores`
--

CREATE TABLE `cuentas_bancarias_proveedores` (
  `id` int(10) UNSIGNED NOT NULL,
  `cbu` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias_cbu` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titular` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identificacion_tributaria` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proveedor_id` int(10) UNSIGNED NOT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estaciones`
--

CREATE TABLE `estaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_contacto` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuit` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` int(11) NOT NULL DEFAULT '0',
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estaciones`
--

INSERT INTO `estaciones` (`id`, `nombre`, `direccion`, `telefono`, `contacto`, `telefono_contacto`, `cuit`, `saldo`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 'REFINOR COMPLEJO DEL PARQUE', 'AV SOLDATI 86', '4211021', 'ALVARO ISA', '3813497818', '30707657479', 0, 0, NULL, '2020-06-09 05:26:52'),
(2, 'YPF EL EMPALME', 'RUTA NACIONAL 9 TUCUMAN', '4260341', 'JAVIER HERRERA', '3814669106', '33615338449', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_31_012147_camiones', 1),
(5, '2020_05_31_014246_acoplados', 1),
(6, '2020_05_31_024429_choferes', 1),
(7, '2020_05_31_202734_estaciones', 1),
(8, '2020_06_01_012706_categorias', 1),
(9, '2020_06_01_012708_clientes', 1),
(10, '2020_06_01_013855_articulos', 1),
(11, '2020_06_04_212105_repuestos', 1),
(12, '2020_06_04_212120_bancos', 1),
(13, '2020_06_05_211908_cajas', 1),
(14, '2020_06_05_213807_proveedores', 1),
(15, '2020_06_11_231854_cuentas_bancarias_propias', 1),
(16, '2020_06_11_231854_cuentas_bancarias_proveedores', 1),
(17, '2020_06_13_153703_tarifas', 1),
(18, '2020_06_14_115221_provincias', 1),
(19, '2020_06_14_115237_localidad', 1),
(20, '2020_06_14_212115_movimientos', 1),
(21, '2020_06_14_212126_movimientos_articulos', 1),
(22, '2020_06_28_200101_bienes_de_uso', 1),
(23, '2020_06_28_201714_vehiculos_particulares', 1),
(24, '2020_07_01_224913_prestamos', 1),
(25, '2020_07_01_225035_rentas_prestamos_moratorias', 1),
(26, '2020_07_01_225259_afip_prestamos_moratorias', 1),
(27, '2020_07_12_105856_movimientos_cajas', 2),
(28, '2020_07_16_233840_cheques', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nro_comprobante` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `chofer_id` int(10) UNSIGNED NOT NULL,
  `receptor_mercaderia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_articulos`
--

CREATE TABLE `movimientos_articulos` (
  `id` int(10) UNSIGNED NOT NULL,
  `movimiento_id` int(10) UNSIGNED NOT NULL,
  `articulo_id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_cajas`
--

CREATE TABLE `movimientos_cajas` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_movimiento` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `importe` int(11) NOT NULL,
  `importe_final` int(11) NOT NULL,
  `caja_id` int(10) UNSIGNED NOT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movimientos_cajas`
--

INSERT INTO `movimientos_cajas` (`id`, `tipo`, `tipo_movimiento`, `descripcion`, `fecha`, `importe`, `importe_final`, `caja_id`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 'INICIAL', 'INGRESO', '1231', '2020-07-12', 1231, 1000, 1, 0, '2020-07-13 02:46:36', '2020-07-13 02:46:36'),
(2, 'INICIAL', 'INGRESO', '1231', '2020-07-12', 1231, 2000, 1, 0, '2020-07-13 02:47:06', '2020-07-13 02:47:06'),
(3, 'INICIAL', 'INGRESO', 'PRIMERA VEZ QUE PASA', '2020-07-13', 500, 3000, 1, 0, '2020-07-14 00:44:03', '2020-07-14 00:44:03'),
(4, 'INICIAL', 'INGRESO', 'primera vez que suma', '2020-07-14', 100, 3100, 1, 0, '2020-07-14 03:00:36', '2020-07-14 03:00:36'),
(5, 'INICIAL', 'INGRESO', 'segunda vez que suma', '2020-07-14', 500, 3600, 1, 0, '2020-07-14 03:01:07', '2020-07-14 03:01:07'),
(6, 'INICIAL', 'INGRESO', '5ta vea que cobra', '2020-07-14', 520, 520, 2, 0, '2020-07-14 03:03:41', '2020-07-14 03:03:41'),
(7, 'INICIAL', 'INGRESO', 'quinta', '2020-07-14', 530, 4130, 1, 0, '2020-07-14 03:24:51', '2020-07-14 03:24:51'),
(8, 'INICIAL', 'INGRESO', 'nada', '2020-07-14', 500, 1020, 2, 0, '2020-07-14 03:25:46', '2020-07-14 03:25:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_entidad` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_entidad` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_acreditacion` date NOT NULL,
  `cant_cuotas` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto_solicitado` int(11) NOT NULL,
  `tasa_interes_anual` int(11) NOT NULL,
  `modalidad_pago` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_contacto` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuit` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` int(11) NOT NULL DEFAULT '0',
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `direccion`, `telefono`, `email`, `contacto`, `telefono_contacto`, `cuit`, `saldo`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 'CENTRO DE SERVICIO TUCUMAN (CEPILLO)', 'LAVALLE 3526', '3812304649', '', 'HERNAN CEPILLO', '3816415412', '30709598879', 0, 0, NULL, NULL),
(2, 'PEREZ CURBELO HNOS SRL', 'AV. NESTOR KITRCHENER 2226', '4365893', '', 'GUILLERMO MEDRANO', '3816895169', '30641428104', 0, 0, NULL, NULL),
(3, 'OSCAR A. MAROZZI', 'AV. NESTOR KITRCHENER 3473', '4320162', '', 'NATALIA', '3815881420', '20137758858', 0, 0, NULL, NULL),
(4, 'ABC SA', 'CORDOBA 1177', '4300711', '', 'DIEGO', '3816452264', '30542851836', 0, 0, NULL, NULL),
(5, 'REMOL PARTES', 'SIMON BOLIVAR 1833', '4204934', '', 'RICARDO MARCILLA', '3814187904', '20129197537', 0, 0, NULL, NULL),
(6, 'FORD VOL', 'AV. EJERCITO DEL NORTE 834', '4518999', '', 'ANGEL', '38145552', '33711457319', 0, 0, NULL, NULL),
(7, 'MERCEDES DEL BOSQUE', 'AV. BELGRANO 2125', '4331903', '', 'PANCHITO', '381555263', '20279456301', 0, 0, NULL, NULL),
(8, 'F100', 'JERONIMO LUIS CABRERA 361 CORDOBA', '3514710990', '', 'DIEGO', '3816452264', '30711676429', 0, 0, NULL, NULL),
(9, 'PETROARSA SA', 'RUTA 302 KM 6.5', '4262220', '', 'HERNAN', '3510025', '30685694286', 0, 0, NULL, NULL),
(10, 'PHP BATERIAS', 'SANTA FE 1492', '4230552', '', 'BRUNO', '3813025254', '30714530247', 0, 0, NULL, NULL),
(11, 'RENEU SA', 'RUTA PROV 70 KM 76210 SANTA FE', '3492497010', '', 'DIEGO PALOMAREZ', '3815495789', '33674253589', 0, 0, NULL, NULL),
(12, 'SEGUMAK', 'JOSE COLOMBRES 168', '4523233', '', 'MARCELO', '3814407282', '30623893096', 0, 0, NULL, NULL),
(13, 'MIPOL REPUESTOS- AUTOPARTES', 'MENDOZA 1039', '4324848', '', 'EDUARDO FRONTINI', '3816681178', '30643087193', 0, 0, NULL, NULL),
(14, 'LA FERRETERIA', 'AV ROCA ESQUINA CORONEL ZELAYA', '4006445', '', 'CLAUDIA', '3814196190', '30506437276', 0, 0, NULL, NULL),
(15, 'EL EMPORIO DE MERCEDES', 'AV EJERCITO DEL NORTE 635', '4330600', '', 'ALEJANDRO', '3816009287', '30709369403', 0, 0, NULL, NULL),
(16, 'JUAREZ HNOS', 'AMADOR LUCERO 279', '4237713', '', 'JORGE', '381625367', '33675364589', 0, 0, NULL, NULL),
(17, 'LOJACK', 'BLAS PARERA 3551', '47114500', '', 'FERNANDO', '3815664541', '30708081112', 0, 0, NULL, NULL),
(18, 'LOPEZ FRENOS Y EMBRAGUES', 'AV. MITRE 733', '4237018', '', 'MARIA', '0025315431', '30573498883', 0, 0, NULL, NULL),
(19, 'ENODGE MATAFUEGOS', 'SALTA 113', '4948782', '', 'VIRGINA', '3815390811', '23318421064', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Buenos Aires', NULL, NULL),
(2, 'Capital Federal', NULL, NULL),
(3, 'Catamarca', NULL, NULL),
(4, 'Chaco', NULL, NULL),
(5, 'Chubut', NULL, NULL),
(6, 'Cordoba', NULL, NULL),
(7, 'Corrientes', NULL, NULL),
(8, 'Entre Rios', NULL, NULL),
(9, 'Formosa', NULL, NULL),
(10, 'Jujuy', NULL, NULL),
(11, 'La Pampa', NULL, NULL),
(12, 'La Rioja', NULL, NULL),
(13, 'Mendoza', NULL, NULL),
(14, 'Misiones', NULL, NULL),
(15, 'Neuquen', NULL, NULL),
(16, 'Rio Negro', NULL, NULL),
(17, 'Salta', NULL, NULL),
(18, 'San Juan', NULL, NULL),
(19, 'San Luis', NULL, NULL),
(20, 'Santa Cruz', NULL, NULL),
(21, 'Santa Fe', NULL, NULL),
(22, 'Santiago del Estero', NULL, NULL),
(23, 'Tierra del Fuego', NULL, NULL),
(24, 'Tucuman', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rentas_prestamos_moratorias`
--

CREATE TABLE `rentas_prestamos_moratorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_plan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto_declarado` int(11) NOT NULL,
  `cant_cuotas` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_primera_cuota` date NOT NULL,
  `fecha_ultima_cuota` date DEFAULT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE `repuestos` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `marca` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `repuestos`
--

INSERT INTO `repuestos` (`id`, `codigo`, `nombre`, `cantidad`, `marca`, `condicion`, `created_at`, `updated_at`) VALUES
(2, 'H1', 'FOCO', 1, 'VARIOS', 0, '2020-06-09 16:35:05', '2020-06-09 16:35:57'),
(3, 'H3', 'FOCOS', 1, 'VARIOS', 0, '2020-06-09 16:35:30', '2020-06-09 16:35:52'),
(4, 'H4', 'FOCOS', 1, 'VARIOS', 0, '2020-06-09 16:35:45', '2020-06-09 16:35:45'),
(5, 'H7', 'FOCOS', 1, 'VARIOS', 0, '2020-06-09 16:36:24', '2020-06-09 16:36:24'),
(6, 'P21W', 'FOCOS', 1, 'VARIOS', 0, '2020-06-09 16:36:49', '2020-06-09 16:36:49'),
(7, 'P21W/5', 'FOCOS', 1, 'VARIOS', 0, '2020-06-09 16:37:10', '2020-06-09 16:37:10'),
(8, 'W5W', 'FOCOS', 1, 'VARIOS', 0, '2020-06-09 16:37:29', '2020-06-09 16:37:29'),
(9, 'R5W', 'FOCOS', 1, 'VARIOS', 0, '2020-06-09 16:37:44', '2020-06-09 16:37:44'),
(10, 'FC', 'FOCO NARANJA', 1, 'VARIOS', 0, '2020-06-09 16:38:01', '2020-06-09 16:38:01'),
(11, 'WK 940 /1X', 'FILTRO COMBUSTIBLE', 1, 'MANN', 0, '2020-06-09 18:30:43', '2020-06-09 18:30:43'),
(12, 'PU 941 x', 'FILTRO COMBUSTIBLE', 1, 'MANN', 0, '2020-06-09 18:31:31', '2020-06-09 18:31:31'),
(13, 'WK 1149', 'FILTRO COMBUSTIBLE', 1, 'MANN', 0, '2020-06-09 18:32:47', '2020-06-09 18:32:47'),
(14, 'p917/ 3x', 'FILTRO COMBUSTIBLE', 1, 'MANN', 0, '2020-06-09 19:07:38', '2020-06-09 19:07:38'),
(15, 'KC 188', 'FILTRO COMBSTIBLE', 1, 'MAHLE', 0, '2020-06-09 19:09:33', '2020-06-09 19:09:33'),
(16, 'KX 36D', 'FILTRO COMBUSTIBLE', 1, 'MAHLE', 0, '2020-06-09 19:12:58', '2020-06-09 19:12:58'),
(17, 'W950/7', 'FILTRO ACEITE', 1, 'MANN', 0, '2020-06-09 19:13:28', '2020-06-09 19:13:28'),
(18, 'W950/26', 'FILTRO ACEITE', 1, 'MANN', 0, '2020-06-09 19:15:22', '2020-06-09 19:15:22'),
(19, 'KX 36D', 'FILTRO DE COMBUSTIBLE', 1, 'MAHLE', 0, '2020-06-09 23:37:28', '2020-06-09 23:37:28'),
(20, 'W950/7', 'FILTRO NDE ACEITE', 1, 'MANN', 0, '2020-06-09 23:37:49', '2020-06-09 23:37:49'),
(21, 'W950/26', 'FILTRO DE ACEITE', 1, 'MANN', 0, '2020-06-09 23:38:17', '2020-06-09 23:38:17'),
(22, 'HU 12110X', 'FILTRO DE ACEITE', 1, 'MANN', 0, '2020-06-09 23:38:46', '2020-06-09 23:38:46'),
(23, 'W930/14', 'FILTRO DE ACEITE', 1, 'MANN', 0, '2020-06-09 23:39:12', '2020-06-09 23:39:12'),
(24, 'OX69D', 'FILTRO DE ACEITE', 1, 'MAHLE', 0, '2020-06-09 23:39:39', '2020-06-09 23:39:39'),
(25, 'WL57037', 'FILTRO DE ACEITE', 1, 'MAHLE', 0, '2020-06-09 23:40:21', '2020-06-09 23:40:21'),
(26, 'WOE 472', 'FILTRO DE ACEITE', 1, 'MEGA', 0, '2020-06-09 23:40:50', '2020-06-09 23:40:50'),
(27, 'TB1374X', 'FILTRO DE AIRE', 1, 'MANN', 0, '2020-06-09 23:41:17', '2020-06-09 23:41:17'),
(28, '1X', 'FILTRO DE ACEITE', 1, 'FRAM', 0, '2020-06-09 23:41:43', '2020-06-09 23:41:43'),
(29, '1170/7', 'FILTRO DE ACEITE', 1, 'MANN', 0, '2020-06-09 23:42:10', '2020-06-09 23:42:10'),
(30, 'E311H01', 'FILTRO ACEITE', 1, 'HENGST', 0, '2020-06-09 23:52:40', '2020-06-09 23:52:40'),
(31, 'OX199D', 'FILTRO DE ACEITE', 1, 'MAHLE', 0, '2020-06-09 23:53:13', '2020-06-09 23:53:13'),
(32, 'AL12', 'FILTRO DE AIRE', 1, 'MAHLE', 0, '2020-06-09 23:53:33', '2020-06-09 23:53:33'),
(33, 'PH4887', 'FILTRO DE ACEITE', 1, 'FRAM', 0, '2020-06-09 23:54:03', '2020-06-09 23:54:03'),
(34, '05269', 'FILTRO CAJA Y DIFERENCIAL', 1, 'BOSCH', 0, '2020-06-09 23:54:48', '2020-06-09 23:54:48'),
(35, 'KC187', 'FILTRO DE COMBUSTIBLE', 1, 'MAHLE', 0, '2020-06-09 23:55:27', '2020-06-09 23:55:27'),
(36, 'KC188', 'FILTRO COMBUSTIBLE', 1, 'MAHLE', 0, '2020-06-09 23:56:17', '2020-06-09 23:56:17'),
(37, 'JUNTA COMPRESORES', 'JUNBTA COMPRESORES', 1, 'VARIOS', 0, '2020-06-09 23:57:34', '2020-06-09 23:57:34'),
(38, 'CORREAS', 'CORREAS 12', 1, 'VARIOS', 0, '2020-06-09 23:57:49', '2020-06-09 23:57:49'),
(39, 'CORREAS', 'CORREAS DE 6', 1, 'VARIOS', 0, '2020-06-09 23:58:10', '2020-06-09 23:58:10'),
(40, 'CORREAS', 'CORREAS DE 4', 1, 'VARIOS', 0, '2020-06-09 23:58:25', '2020-06-09 23:58:25'),
(41, 'TAPAS', 'TAPAS DE ACEITES', 1, 'VARIOS', 0, '2020-06-09 23:58:40', '2020-06-09 23:58:40'),
(42, 'TAPAS', 'TAPAS DE COMBUSTIBLE', 1, 'VARIOS', 0, '2020-06-09 23:58:55', '2020-06-09 23:58:55'),
(43, 'DIAFRAGMA', 'DIAFRAGMA DE 30', 1, 'VARIOS', 0, '2020-06-09 23:59:14', '2020-06-09 23:59:14'),
(44, 'DIAGRAGMA', 'DIAFRAGMA DE 24', 1, 'VARIOS', 0, '2020-06-09 23:59:33', '2020-06-09 23:59:33'),
(45, 'RULEMAN', 'RULEMAN TRASERO', 1, 'VW', 0, '2020-06-09 23:59:59', '2020-06-09 23:59:59'),
(46, 'GEMELOS', 'GEMELOS ACOPLADOS', 1, 'VARIOS', 0, '2020-06-10 00:00:19', '2020-06-10 00:00:19'),
(47, 'RETEN', 'RETEN TRASERO', 1, 'FORD', 0, '2020-06-10 00:00:34', '2020-06-10 00:00:34'),
(48, 'RETEN', 'RETEN TRASERO', 1, 'IVECO', 0, '2020-06-10 00:00:53', '2020-06-10 00:00:53'),
(49, 'CAJA', 'CAJA DEREGISTRO SEMI', 1, 'VARIOS', 0, '2020-06-10 00:01:15', '2020-06-10 00:01:15'),
(50, 'BUJES', 'BUJES', 1, 'VARIOS', 0, '2020-06-10 00:01:31', '2020-06-10 00:01:31'),
(51, 'TRAILER', 'TRAILER 7 LUCES', 1, 'VARIOS', 0, '2020-06-10 00:01:57', '2020-06-10 00:01:57'),
(52, 'TRAILER', 'TRAILER 5 LUCES', 1, 'VARIOS', 0, '2020-06-10 00:02:15', '2020-06-10 00:02:15'),
(53, 'CINTAS', 'CINTAS REFRACTARIAS', 1, 'VARIOS', 0, '2020-06-10 00:02:35', '2020-06-10 00:02:35'),
(54, 'FAJAS', 'FAJAS', 1, 'VARIOS', 0, '2020-06-10 00:03:14', '2020-06-10 00:03:14'),
(55, 'FAJAS', 'FAJAS CORTAS', 1, 'VARIOS', 0, '2020-06-10 00:03:36', '2020-06-10 00:03:36'),
(56, 'MALACATES', 'MALACATES', 1, 'VARIOS', 0, '2020-06-10 00:04:01', '2020-06-10 00:04:01'),
(57, 'TENSOR', 'TENSOR DE LONA', 1, 'VARIOS', 0, '2020-06-10 00:04:22', '2020-06-10 00:04:22'),
(58, 'ARRANQUE', 'ARRANQUE', 1, 'VARIOS', 0, '2020-06-10 00:04:36', '2020-06-10 00:04:36'),
(59, 'TEMINALES PARA BATERIAS', 'TERMINALES PARA BATERIAS', 1, 'VARIOS', 0, '2020-06-10 00:05:01', '2020-06-10 00:05:01'),
(60, 'FAROS', 'FAROS', 1, 'VARIOS', 0, '2020-06-10 00:05:21', '2020-06-10 00:05:21'),
(61, 'PEINES', 'PAINES', 1, 'FORD', 0, '2020-06-10 00:05:43', '2020-06-10 00:05:43'),
(62, 'SENSOR DE VELOCIDAD', 'SENSOR DE VELOCIDAD', 1, 'VARIOS', 0, '2020-06-10 00:06:04', '2020-06-10 00:06:04'),
(63, 'REPUESTO SECADOR', 'REPUESTO SECADOR', 1, 'KNOR', 0, '2020-06-10 00:06:39', '2020-06-10 00:06:39'),
(64, 'SOGAS', 'SOGAS', 1, 'VARIOS', 0, '2020-06-10 00:06:53', '2020-06-10 00:06:53'),
(65, 'WK950/26', 'FILTRO DE COMBUSTIBLE', 1, 'MANN', 0, '2020-06-10 15:42:26', '2020-06-10 15:42:26'),
(66, 'KX80/1D', 'FILTRO DE COMBUSTIBLE', 1, 'MADLE', 0, '2020-06-10 15:43:11', '2020-06-10 15:43:11'),
(67, 'KX80/1D', 'FILTRO DE COMBUSTIBLE', 1, 'MAHLE', 0, '2020-06-10 15:45:18', '2020-06-10 15:45:18'),
(68, 'WK1060', 'FILTRO COMBUSTIBLE', 1, 'MANN', 0, '2020-06-10 15:45:45', '2020-06-10 15:45:45'),
(69, 'PU1046/1X', 'FILTRO COMBUSTIBLE', 1, 'MANN', 0, '2020-06-10 15:46:16', '2020-06-10 15:46:16'),
(70, 'WDK962/16', 'FILTRO COMBUSTIBLE', 1, 'MANN', 0, '2020-06-10 15:46:50', '2020-06-10 15:46:50'),
(71, 'WK 1060/1', 'FILTRO DE COMBUSTIBLE', 1, 'MANN', 0, '2020-06-10 15:47:17', '2020-06-10 15:47:17'),
(72, 'KX80/1D', 'FILTRO DE COMBUSTIBLE', 1, 'MAHLE', 0, '2020-06-10 15:48:04', '2020-06-10 15:48:04'),
(73, 'WF33654', 'FILTRO COMBUSTIBLE', 1, 'WIX', 0, '2020-06-10 15:53:31', '2020-06-10 15:53:31'),
(74, 'C27830', 'FILTRO DE AIRE', 1, 'MANN', 0, '2020-06-10 15:54:13', '2020-06-10 15:54:13'),
(75, 'C281012', 'FILTRO DE AIRE', 1, 'MANN', 0, '2020-06-10 15:54:40', '2020-06-10 15:54:40'),
(76, 'C31014', 'FILTRO DE AIRE', 1, 'MANN', 0, '2020-06-10 15:55:14', '2020-06-10 15:55:14'),
(77, 'LX2621', 'FILTRO DE AIRE', 1, 'MAHLE', 0, '2020-06-10 15:55:43', '2020-06-10 15:55:43'),
(78, 'OC267', 'FILTRO DE COMBUSTIBLE', 1, 'MAHLE', 0, '2020-06-10 15:56:23', '2020-06-10 15:56:23'),
(79, 'C11860PL', 'FILTRO DE COMBUSTIBLE', 1, 'FRAM', 0, '2020-06-10 15:56:52', '2020-06-10 15:56:52'),
(80, '67/2D', 'FILTRO DE COMBUSTIBLE', 1, 'MAHLE', 0, '2020-06-10 15:57:25', '2020-06-10 15:57:25'),
(81, '1046/1X', 'FILTRO DE COMBUSTIBLE', 1, 'MANN', 0, '2020-06-10 15:58:07', '2020-06-10 15:58:07'),
(82, 'C1858/2', 'FILTRO DE AIRE', 1, 'MANN', 0, '2020-06-10 15:58:28', '2020-06-10 15:58:28'),
(83, 'KC171', 'FILTRO DE COMBUSTIBLE', 1, 'MAHLE', 0, '2020-06-10 15:59:38', '2020-06-10 15:59:38'),
(84, 'OC502', 'FILTRO DE ACEITE', 1, 'MAHLE', 0, '2020-06-10 16:00:02', '2020-06-10 16:00:02'),
(85, 'OC121', 'FILTRO DE ACEITE', 1, 'MAHLE', 0, '2020-06-10 16:00:25', '2020-06-10 16:00:25'),
(86, 'KC636', 'FILTRO DE COMBUSTIBLE', 1, 'MAHLE', 0, '2020-06-10 16:01:08', '2020-06-10 16:01:08'),
(87, 'WO762', 'FILTRO DE ACEITE', 1, 'WEGA', 0, '2020-06-10 16:01:32', '2020-06-10 16:01:32'),
(88, 'C27030', 'FILTRO DE AIRE', 1, 'MANN', 0, '2020-06-10 16:01:51', '2020-06-10 16:02:29'),
(89, 'W75/2', 'FILTRO DE ACEITE', 1, 'MANN', 0, '2020-06-10 16:02:59', '2020-06-10 16:02:59'),
(90, 'WK75/2', 'FILTRO DE COMBUSTIBLE', 1, 'MANN', 0, '2020-06-10 16:03:26', '2020-06-10 16:03:26'),
(91, 'WK58/3', 'FILTRO DE COMBUSTIBLE', 1, 'MANN', 0, '2020-06-10 16:03:59', '2020-06-10 16:03:59'),
(92, 'CU26010', 'FILTRO DEL HABITACULO', 1, 'MANN', 0, '2020-06-10 16:04:29', '2020-06-10 16:04:29'),
(93, 'CU22019', 'FILTRO DEL HABITACULO', 1, 'MANN', 0, '2020-06-10 16:04:56', '2020-06-10 16:04:56'),
(94, 'LX1070', 'FILTRO DE AIRE', 1, 'MAHLE', 0, '2020-06-10 16:05:29', '2020-06-10 16:05:29'),
(95, 'LX3582', 'FILTRO DE AIRE', 1, 'MAHLE', 0, '2020-06-10 16:06:12', '2020-06-10 16:06:12'),
(96, 'C15300', 'FILTRO DSE AIRE', 1, 'MANN', 0, '2020-06-10 16:06:29', '2020-06-10 16:06:29'),
(97, 'antenas', 'antenas', 1, 'varios', 0, '2020-06-10 17:03:25', '2020-06-10 17:03:25'),
(98, 'ACOPLES RAPIDOS', 'ACOPLES RECTOS 6', 1, 'varios', 0, '2020-06-10 17:03:41', '2020-06-10 17:07:25'),
(99, 'ACOPLES RAPIDOS', 'ACOPLES RECTOS  8', 1, 'varios', 0, '2020-06-10 17:04:08', '2020-06-10 17:08:13'),
(100, 'ACOPLES RAPIDOS', 'ACOPLES RECTOS 10', 1, 'varios', 0, '2020-06-10 17:04:48', '2020-06-10 17:08:36'),
(101, 'ACOPLES RAPIDOS', 'ACOPLES RECTOS 12', 1, 'varios', 0, '2020-06-10 17:05:08', '2020-06-10 17:08:59'),
(102, 'ACOPLES RAPIDOS', 'ACOPLES EN T 6', 1, 'varios', 0, '2020-06-10 17:05:38', '2020-06-10 17:09:40'),
(103, 'ACOPLES RAPIDOS', 'ACOPLES EN T 8', 1, 'VARIOS', 0, '2020-06-10 17:06:06', '2020-06-10 17:09:49'),
(104, 'ACOPLES RAPIDOS', 'ACOPLES EN T 10', 1, 'VARIOS', 0, '2020-06-10 17:10:09', '2020-06-10 17:10:09'),
(105, 'ACOPLES RAPIDOS', 'ACOPLES EN T 12', 1, 'VARIOS', 0, '2020-06-10 17:10:29', '2020-06-10 17:10:29'),
(106, 'FUSIBLES', 'FUSIBLES', 1, 'VARIOS', 0, '2020-06-10 17:10:49', '2020-06-10 17:10:49'),
(107, 'ACEITES', 'ACEITES', 1, 'VARIOS', 0, '2020-06-10 17:11:39', '2020-06-10 17:11:39'),
(108, 'LIQUIEDO DE FRENOS', 'LIQUIEDO DE FRENOS', 1, 'VARIOS', 0, '2020-06-10 17:12:05', '2020-06-10 17:12:05'),
(109, 'ARRANQUE', 'ARRANQUE', 1, 'VARIOS', 0, '2020-06-10 17:12:28', '2020-06-10 17:12:28'),
(110, 'JUNTAS', 'JUNTAS', 1, 'VARIOS', 0, '2020-06-10 17:12:46', '2020-06-10 17:12:46'),
(111, 'REGISTROS', 'REGISTROS', 1, 'VARIOS', 0, '2020-06-10 17:13:12', '2020-06-10 17:13:12'),
(112, 'CAÑO FLEXIBLE', 'CAÑO FLEXIBLE CON SALIDA DE COMPRESOR', 1, 'VARIOS', 0, '2020-06-10 17:13:42', '2020-06-10 17:13:42'),
(113, 'AFLOJA TODO', 'AFLOJA TODO', 1, 'W80', 0, '2020-06-10 17:14:09', '2020-06-10 17:14:09'),
(114, 'LUBRICANTE', 'LUBRICANTE', 1, 'w80', 0, '2020-06-10 17:19:17', '2020-06-10 17:19:17'),
(115, 'LIMPIA CONTACTO', 'LIMPIA CONTACTO', 1, 'w80', 0, '2020-06-10 17:19:40', '2020-06-10 17:19:40'),
(116, 'SILICONA', 'SILICONA ALTA TEMPERATURA', 1, 'VARIOS', 0, '2020-06-10 17:20:16', '2020-06-10 17:20:16'),
(117, 'SILICONA', 'SILICONA FORMA JUNTA', 1, 'VARIOS', 0, '2020-06-10 17:20:46', '2020-06-10 17:20:46'),
(118, 'LUBRICANTE', 'ARRANCA MOTOR', 1, 'VARIOS|', 0, '2020-06-10 17:21:13', '2020-06-10 17:21:13'),
(119, 'C23107', 'FILTRO DE AIRE', 1, 'MANN', 0, '2020-06-10 17:26:35', '2020-06-10 17:26:35'),
(120, 'C29010', 'FILTRO DE AIRE', 1, 'MANN', 0, '2020-06-10 17:27:16', '2020-06-10 17:27:16'),
(121, 'LX1716', 'FILTRO DE AIRE', 1, 'MAHLE', 0, '2020-06-10 17:27:45', '2020-06-10 17:27:45'),
(122, 'C281012', 'FILTRO DE AIRE', 1, 'MANN', 0, '2020-06-10 17:28:18', '2020-06-10 17:28:18'),
(123, 'PU835X', 'FILTRO DE COMBUSTIBLE', 1, 'MANN', 0, '2020-06-10 17:28:42', '2020-06-10 17:28:42'),
(124, 'FORD FIESTA', 'KIT DE FILTROS', 1, 'WEGA', 0, '2020-06-10 17:29:03', '2020-06-10 17:29:03'),
(125, 'TOYOTA', 'KIT DE FILTROS', 1, 'WEGA', 0, '2020-06-10 17:29:22', '2020-06-10 17:29:22'),
(126, 'OROCH', 'KIT DE FILTROS', 1, 'WEGA', 0, '2020-06-10 17:29:47', '2020-06-10 17:29:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `importe` int(11) NOT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos_particulares`
--

CREATE TABLE `vehiculos_particulares` (
  `id` int(10) UNSIGNED NOT NULL,
  `dominio` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `año` int(11) NOT NULL,
  `km` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_egreso` date DEFAULT NULL,
  `valor` int(11) NOT NULL,
  `amortizacion` double(4,2) NOT NULL,
  `foto` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acoplados`
--
ALTER TABLE `acoplados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acoplados_camion_id_foreign` (`camion_id`);

--
-- Indices de la tabla `afip_prestamos_moratorias`
--
ALTER TABLE `afip_prestamos_moratorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articulos_categoria_id_foreign` (`categoria_id`),
  ADD KEY `articulos_cliente_id_foreign` (`cliente_id`);

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bienes_de_uso`
--
ALTER TABLE `bienes_de_uso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `camiones`
--
ALTER TABLE `camiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cheques`
--
ALTER TABLE `cheques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cheques_bancos_id_foreign` (`bancos_id`),
  ADD KEY `cheques_clientes_id_foreign` (`clientes_id`),
  ADD KEY `cheques_proveedores_id_foreign` (`proveedores_id`);

--
-- Indices de la tabla `choferes`
--
ALTER TABLE `choferes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `choferes_camion_id_foreign` (`camion_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuentas_bancarias_propias`
--
ALTER TABLE `cuentas_bancarias_propias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuentas_bancarias_proveedores`
--
ALTER TABLE `cuentas_bancarias_proveedores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cuentas_bancarias_proveedores_proveedor_id_foreign` (`proveedor_id`);

--
-- Indices de la tabla `estaciones`
--
ALTER TABLE `estaciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `estaciones_cuit_unique` (`cuit`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movimientos_cliente_id_foreign` (`cliente_id`),
  ADD KEY `movimientos_chofer_id_foreign` (`chofer_id`);

--
-- Indices de la tabla `movimientos_articulos`
--
ALTER TABLE `movimientos_articulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movimientos_articulos_movimiento_id_foreign` (`movimiento_id`),
  ADD KEY `movimientos_articulos_articulo_id_foreign` (`articulo_id`);

--
-- Indices de la tabla `movimientos_cajas`
--
ALTER TABLE `movimientos_cajas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movimientos_cajas_caja_id_foreign` (`caja_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `proveedores_cuit_unique` (`cuit`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rentas_prestamos_moratorias`
--
ALTER TABLE `rentas_prestamos_moratorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tarifas_cliente_id_foreign` (`cliente_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `vehiculos_particulares`
--
ALTER TABLE `vehiculos_particulares`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acoplados`
--
ALTER TABLE `acoplados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `afip_prestamos_moratorias`
--
ALTER TABLE `afip_prestamos_moratorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `bienes_de_uso`
--
ALTER TABLE `bienes_de_uso`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `camiones`
--
ALTER TABLE `camiones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cheques`
--
ALTER TABLE `cheques`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `choferes`
--
ALTER TABLE `choferes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cuentas_bancarias_propias`
--
ALTER TABLE `cuentas_bancarias_propias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuentas_bancarias_proveedores`
--
ALTER TABLE `cuentas_bancarias_proveedores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estaciones`
--
ALTER TABLE `estaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimientos_articulos`
--
ALTER TABLE `movimientos_articulos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimientos_cajas`
--
ALTER TABLE `movimientos_cajas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `rentas_prestamos_moratorias`
--
ALTER TABLE `rentas_prestamos_moratorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vehiculos_particulares`
--
ALTER TABLE `vehiculos_particulares`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acoplados`
--
ALTER TABLE `acoplados`
  ADD CONSTRAINT `acoplados_camion_id_foreign` FOREIGN KEY (`camion_id`) REFERENCES `camiones` (`id`);

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `articulos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `cheques`
--
ALTER TABLE `cheques`
  ADD CONSTRAINT `cheques_bancos_id_foreign` FOREIGN KEY (`bancos_id`) REFERENCES `bancos` (`id`),
  ADD CONSTRAINT `cheques_clientes_id_foreign` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `cheques_proveedores_id_foreign` FOREIGN KEY (`proveedores_id`) REFERENCES `proveedores` (`id`);

--
-- Filtros para la tabla `choferes`
--
ALTER TABLE `choferes`
  ADD CONSTRAINT `choferes_camion_id_foreign` FOREIGN KEY (`camion_id`) REFERENCES `camiones` (`id`);

--
-- Filtros para la tabla `cuentas_bancarias_proveedores`
--
ALTER TABLE `cuentas_bancarias_proveedores`
  ADD CONSTRAINT `cuentas_bancarias_proveedores_proveedor_id_foreign` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`);

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_chofer_id_foreign` FOREIGN KEY (`chofer_id`) REFERENCES `choferes` (`id`),
  ADD CONSTRAINT `movimientos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `movimientos_articulos`
--
ALTER TABLE `movimientos_articulos`
  ADD CONSTRAINT `movimientos_articulos_articulo_id_foreign` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`),
  ADD CONSTRAINT `movimientos_articulos_movimiento_id_foreign` FOREIGN KEY (`movimiento_id`) REFERENCES `movimientos` (`id`);

--
-- Filtros para la tabla `movimientos_cajas`
--
ALTER TABLE `movimientos_cajas`
  ADD CONSTRAINT `movimientos_cajas_caja_id_foreign` FOREIGN KEY (`caja_id`) REFERENCES `cajas` (`id`);

--
-- Filtros para la tabla `tarifas`
--
ALTER TABLE `tarifas`
  ADD CONSTRAINT `tarifas_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
