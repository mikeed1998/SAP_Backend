-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2023 a las 23:41:55
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pepe_fester`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `menu_display` tinyint(1) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `user`, `email`, `password`, `role`, `menu_display`, `activo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@wozial.com', '$2a$10$4RkbKKmavc66IzEvXM6Ek.gH9H.aqsX9F4HWL75ts0ydOChZWvSKy', 1, 1, 1, '7bcbWneSubNyaE2pGrIcVCozYm8yAXH4dmNiQyaBOYKJuQxNGFQQdNWIMgQU', '2020-10-14 23:24:37', '2020-10-14 23:24:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrusels`
--

CREATE TABLE `carrusels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `subtitulo` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT 666
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carrusels`
--

INSERT INTO `carrusels` (`id`, `titulo`, `subtitulo`, `image`, `url`, `video`, `orden`) VALUES
(45, NULL, NULL, 'aBmNFdh4PLIVTBD5KCbLapbzfebHdI.png', NULL, NULL, 666),
(46, NULL, NULL, 'wGFhlfZIM8LaF18g2MwavkJ1iknL3x.png', NULL, NULL, 666);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL DEFAULT 'Edit categoria',
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'categoría01.png',
  `parent` int(11) NOT NULL DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(11) NOT NULL DEFAULT 666
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `slug`, `image`, `parent`, `activo`, `orden`) VALUES
(10, 'Categoria 1', NULL, 'cQA2pT4Uz0CwJRnWTbSnQvMHGZ1yBp.png', 0, 1, 666),
(11, 'Categoria 2', NULL, 'OSSNRGFQfOPMp7tfCQtqlcHakiLFmz.png', 0, 1, 666),
(12, 'Categoria 3', NULL, 'VEgfUonk6WjK4EdgVnkTqJ5k7zLoCE.png', 0, 1, 666),
(13, 'Categoria 4', NULL, 'GByZzQdVlSWPZRkeYPek7j9n3csqMj.png', 0, 1, 666),
(14, 'categoria 5', NULL, 'kPDF8tQ8fLN2t7ESRt1MjAXVlZF7kU.png', 0, 1, 666),
(16, 'Alexis israel', NULL, 'HMU1Lq94XD10mVgkoRu58IeTgIJWmo.jpg', 0, 1, 666);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_detalles`
--

CREATE TABLE `categoria_detalles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_categoria` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `sub_descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `color` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id`, `nombre`, `color`, `created_at`, `updated_at`) VALUES
(1, 'azul', '#0015ff', '2023-08-15 16:00:54', '2023-08-15 16:00:54'),
(2, 'rojo', '#ff0000', '2023-08-15 16:03:39', '2023-08-15 16:03:39'),
(3, 'amarillo', '#908711', '2023-08-15 21:13:34', '2023-08-15 21:13:34'),
(4, 'morado', '#aa00ff', '2023-08-15 23:30:50', '2023-08-15 23:30:50'),
(5, 'morado', '#9c27b0', '2023-09-06 22:05:24', '2023-09-06 22:05:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracions`
--

CREATE TABLE `configuracions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `prodspag` varchar(255) DEFAULT NULL,
  `paypalemail` varchar(255) DEFAULT NULL,
  `destinatario` varchar(255) DEFAULT NULL,
  `destinatario2` varchar(255) DEFAULT NULL,
  `remitente` varchar(255) DEFAULT NULL,
  `remitentepass` varchar(255) DEFAULT NULL,
  `remitentehost` varchar(255) DEFAULT NULL,
  `remitenteport` varchar(6) DEFAULT NULL,
  `remitenteseguridad` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `whatsapp2` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `envio` varchar(255) DEFAULT NULL,
  `envioglobal` varchar(255) DEFAULT NULL,
  `iva` varchar(255) DEFAULT NULL,
  `incremento` varchar(255) DEFAULT NULL,
  `mapa` text DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configuracions`
--

INSERT INTO `configuracions` (`id`, `title`, `description`, `prodspag`, `paypalemail`, `destinatario`, `destinatario2`, `remitente`, `remitentepass`, `remitentehost`, `remitenteport`, `remitenteseguridad`, `telefono`, `whatsapp`, `whatsapp2`, `facebook`, `instagram`, `youtube`, `linkedin`, `envio`, `envioglobal`, `iva`, `incremento`, `mapa`, `direccion`, `created_at`, `updated_at`) VALUES
(1, '444', 'Descripcion del sitio', NULL, NULL, 'alexis@wozial.com', NULL, 'michael@wozial.com', 'zCmfxQEz&wTM', 'host.hddpool.net', '465', NULL, '3333333333', '', '', 'https://www.facebook.com/', '', NULL, NULL, NULL, NULL, NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3735.26095032911!2d-100.3780338847383!3d20.57739830840845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d344c63af2b2af%3A0x8506d3bdeed8e510!2sAv.%20Luis%20Vega%20Monrroy%20901A%2C%20zona%20dos%20extendida%2C%20Plazas%20del%20Sol%201ra%20Secc%2C%2076099%20Santiago%20de%20Quer%C3%A9taro%2C%20Qro.!5e0!3m2!1ses-419!2smx!4v1635149990350!5m2!1ses-419!2smx\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '', NULL, '2023-08-21 15:33:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilios`
--

CREATE TABLE `domicilios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `calle` varchar(255) DEFAULT NULL,
  `numext` varchar(255) DEFAULT NULL,
  `numint` varchar(255) DEFAULT NULL,
  `entrecalles` varchar(255) DEFAULT NULL,
  `colonia` varchar(255) DEFAULT NULL,
  `cp` varchar(255) DEFAULT NULL,
  `municipio` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `estado_code` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT 'Mexico',
  `favorito` tinyint(1) DEFAULT NULL,
  `user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `domicilios`
--

INSERT INTO `domicilios` (`id`, `alias`, `calle`, `numext`, `numint`, `entrecalles`, `colonia`, `cp`, `municipio`, `estado`, `estado_code`, `pais`, `favorito`, `user`, `created_at`, `updated_at`) VALUES
(1, 'Alexis Garcia R', 'Faro faro', '3016', NULL, 'Arrecife y lapizlazuli', 'Satnta Eduwiges', '44580', 'Guadalajara', 'Jalisco', NULL, 'Mexico', NULL, 4, '2023-08-18 14:32:46', '2023-09-06 22:12:02'),
(2, 'Jesus R', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mexico', NULL, 7, '2023-08-21 13:10:52', '2023-08-21 13:11:01'),
(3, 'Abel', 'Cordillera', '1313', NULL, 'Perla', 'Independencia', '4440', 'Guadalajara', 'Jalisco', NULL, 'Mexico', NULL, 8, '2023-08-23 23:35:09', '2023-08-23 23:42:06'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mexico', NULL, 9, '2023-10-19 23:29:07', '2023-10-19 23:29:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementos`
--

CREATE TABLE `elementos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `elemento` varchar(255) NOT NULL,
  `texto` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `contenido` tinyint(1) NOT NULL DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(11) NOT NULL DEFAULT 666,
  `seccion` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `elementos`
--

INSERT INTO `elementos` (`id`, `elemento`, `texto`, `imagen`, `url`, `contenido`, `activo`, `orden`, `seccion`) VALUES
(30, 'fddf', NULL, NULL, NULL, 1, 1, 666, 1),
(31, 'titulo', NULL, NULL, NULL, 0, 1, 666, 1),
(32, 'texto', NULL, NULL, NULL, 0, 1, 666, 1),
(33, 'texto - contacto', NULL, NULL, NULL, 0, 1, 666, 1),
(34, 'aux', NULL, NULL, NULL, 0, 1, 666, 2),
(35, 'titulo', NULL, NULL, NULL, 0, 1, 666, 3),
(36, 'texto', NULL, NULL, NULL, 0, 1, 666, 3),
(37, 'texto - contacto', NULL, NULL, NULL, 0, 1, 666, 4),
(38, 'correos', NULL, NULL, NULL, 0, 1, 666, 4),
(39, 'direccion', NULL, NULL, NULL, 0, 1, 666, 4),
(40, 'telefonos', NULL, NULL, NULL, 0, 1, 666, 4),
(41, 'whatsapp', NULL, NULL, NULL, 0, 1, 666, 4),
(42, 'facebook', NULL, NULL, NULL, 0, 1, 666, 4),
(43, 'instagram', NULL, NULL, NULL, 0, 1, 666, 4),
(44, 'soluciones - texto', NULL, NULL, NULL, 0, 1, 666, 5),
(45, 'puntos de venta - texto', NULL, NULL, NULL, 0, 1, 666, 6),
(46, 'subdistribuidor - texto', NULL, NULL, NULL, 0, 1, 666, 7),
(47, 'nosotros - texto', NULL, NULL, NULL, 0, 1, 666, 8),
(48, 'mision - icono', NULL, NULL, NULL, 0, 1, 666, 8),
(49, 'mision - titulo', NULL, NULL, NULL, 0, 1, 666, 8),
(50, 'mision - texto', NULL, NULL, NULL, 0, 1, 666, 8),
(51, 'valores - icono', NULL, NULL, NULL, 0, 1, 666, 8),
(52, 'valores - titulo', NULL, NULL, NULL, 0, 1, 666, 8),
(53, 'valores - texto', NULL, NULL, NULL, 0, 1, 666, 8),
(54, 'vision - icono', NULL, NULL, NULL, 0, 1, 666, 8),
(55, 'vision - titulo', NULL, NULL, NULL, 0, 1, 666, 8),
(56, 'vision - texto', NULL, NULL, NULL, 0, 1, 666, 8),
(57, 'nosotros - texto 2', NULL, NULL, NULL, 0, 1, 666, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `subtitulo` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `inicio` tinyint(1) NOT NULL DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(11) NOT NULL DEFAULT 666,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `imagen`, `titulo`, `subtitulo`, `descripcion`, `whatsapp`, `facebook`, `instagram`, `inicio`, `activo`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'E3KevLhtepFk8skHlpXCq62nuDTp5d.png', 'Soy Alejandra', 'Acesor Profecional', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam numquam modi quibusdam repellat exercitationem laborum dolorem eum fugit mollitia ad?a', NULL, NULL, NULL, 0, 1, 666, NULL, NULL),
(2, 'imagen_04.png', 'Soy Alejandra', 'Acesor Profecional', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam numquam modi quibusdam repellat exercitationem laborum dolorem eum fugit mollitia ad?', NULL, NULL, NULL, 0, 1, 666, NULL, NULL),
(3, 'imagen_04.png', 'Soy Alejandra', 'Acesor Profecionall', 'Lorem ipsum dolor sit, amet aconsectetur adipisicing elit. Ullam numquam modi quibusdam repellat exercitationem laborum dolorem eum fugit mollitia ad?', NULL, NULL, NULL, 0, 1, 666, NULL, NULL),
(4, 'imagen_04.png', 'Soy Alejandra', 'Acesor Profecional', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam numquam modi quibusdam repellat exercitationem laborum dolorem eum fugit mollitia ad?', NULL, NULL, NULL, 0, 1, 666, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rfc` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `razon_social` varchar(255) DEFAULT NULL,
  `calle` varchar(255) DEFAULT NULL,
  `numext` varchar(255) DEFAULT NULL,
  `numint` varchar(255) DEFAULT NULL,
  `colonia` varchar(255) DEFAULT NULL,
  `cp` varchar(255) DEFAULT NULL,
  `municipio` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `rfc`, `mail`, `razon_social`, `calle`, `numext`, `numint`, `colonia`, `cp`, `municipio`, `estado`, `user`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pregunta` varchar(255) NOT NULL,
  `respuesta` text NOT NULL,
  `orden` int(11) NOT NULL DEFAULT 666,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramientas`
--

CREATE TABLE `herramientas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icono` varchar(255) DEFAULT 'icono1.png',
  `titulo` varchar(255) DEFAULT 'Herramienta nueva',
  `descripcion` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `inicio` tinyint(1) NOT NULL DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(11) NOT NULL DEFAULT 666,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `herramientas`
--

INSERT INTO `herramientas` (`id`, `icono`, `titulo`, `descripcion`, `pdf`, `inicio`, `activo`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'icono1.png', 'Herramienta nuevaaaa', NULL, 'V8ZnWJGESHITlYcBGqEJ08IAz30Ygh.pdf', 0, 1, 666, NULL, NULL),
(2, 'icono1.png', 'Herramienta nuevaa', NULL, 'VqvDlymGErWHBxs0XkavmT0TOgZgMA.pdf', 0, 1, 666, NULL, NULL),
(3, 'icono1.png', 'Herramienta nuevaa', NULL, NULL, 0, 1, 666, NULL, NULL),
(4, 'icono1.png', 'Herramienta nueva', NULL, NULL, 0, 1, 666, NULL, NULL),
(5, 'icono1.png', 'Herramienta nueva', NULL, NULL, 0, 1, 666, NULL, NULL),
(6, 'icono1.png', 'Herramienta nueva', NULL, NULL, 0, 1, 666, NULL, NULL),
(7, 'icono1.png', 'Herramienta nueva', NULL, NULL, 0, 1, 666, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logoequipos`
--

CREATE TABLE `logoequipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `inicio` tinyint(1) NOT NULL DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(11) NOT NULL DEFAULT 666,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `logoequipos`
--

INSERT INTO `logoequipos` (`id`, `imagen`, `titulo`, `inicio`, `activo`, `orden`, `created_at`, `updated_at`) VALUES
(3, 'uWiSPJiPILkxlePx6tCKRKVHYxrm44.png', NULL, 0, 1, 666, NULL, NULL),
(5, '7rQxMppmAbWWoiyjyJATdSi8M4VZkJ.png', NULL, 0, 1, 666, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_13_163806_create_admins_table', 1),
(5, '2020_10_14_181530_create_configuracions_table', 1),
(6, '2020_12_08_170359_create_carrusels_table', 1),
(7, '2020_12_09_193424_create_politicas_table', 1),
(8, '2020_12_16_000636_create_faqs_table', 1),
(9, '2021_02_02_175759_create_seccions_table', 1),
(10, '2021_02_02_175823_create_elementos_table', 1),
(13, '2021_10_27_064531_create_categorias_table', 2),
(19, '2021_04_01_184932_create_productos_table', 3),
(20, '2021_04_02_200200_create_productos_photos_table', 3),
(24, '2022_07_18_203052_create_vacantes_table', 4),
(28, '2022_10_26_181015_create_categoria_detalles_table', 5),
(29, '2023_03_27_183730_create_services_table', 5),
(30, '2023_03_28_063647_create_herramientas_table', 6),
(31, '2023_03_28_223646_create_equipos_table', 7),
(32, '2023_03_30_152644_create_logoequipos_table', 8),
(33, '2023_08_15_094644_create_colores_table', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) NOT NULL,
  `estatus` int(11) DEFAULT NULL,
  `guia` varchar(255) DEFAULT NULL,
  `linkguia` text DEFAULT NULL,
  `domicilio` bigint(20) UNSIGNED NOT NULL,
  `factura` tinyint(1) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `importe` double(9,2) NOT NULL,
  `iva` double(9,2) NOT NULL,
  `total` double(9,2) NOT NULL,
  `envio` double(9,2) DEFAULT NULL,
  `comprobante` varchar(255) DEFAULT NULL,
  `cupon` varchar(255) DEFAULT NULL,
  `cancelado` tinyint(1) DEFAULT 0,
  `usuario` bigint(20) UNSIGNED NOT NULL,
  `data` text DEFAULT NULL,
  `envia_resp` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `uid`, `estatus`, `guia`, `linkguia`, `domicilio`, `factura`, `cantidad`, `importe`, `iva`, `total`, `envio`, `comprobante`, `cupon`, `cancelado`, `usuario`, `data`, `envia_resp`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ord_2uQgBJCeqvmrc7yjd', 1, NULL, NULL, 1, NULL, 1, 1100.00, 0.00, 1100.00, 100.00, NULL, NULL, 0, 4, '{\"41\":{\"id\":41,\"nombre\":\"Producto Nuevo\",\"precio\":\"1000\",\"cantidad\":1}}', NULL, NULL, '2023-08-19 03:28:22', '2023-08-19 03:28:22'),
(2, 'ord_2uQgVJumK2izKAmfm', 1, NULL, NULL, 1, NULL, 1, 200.00, 0.00, 200.00, 100.00, NULL, NULL, 0, 4, '{\"42\":{\"id\":42,\"nombre\":\"Producto nuevo\",\"precio\":\"100\",\"cantidad\":1}}', NULL, NULL, '2023-08-19 03:51:56', '2023-08-19 03:51:56'),
(3, 'ord_2uQh3d7fhWZAuV7s5', 1, NULL, NULL, 1, NULL, 3, 4300.00, 0.00, 4300.00, 100.00, NULL, NULL, 0, 4, '{\"42\":{\"id\":42,\"nombre\":\"Producto nuevo\",\"precio\":\"100\",\"cantidad\":\"2\"},\"44\":{\"id\":44,\"nombre\":\"Producto nuevo\",\"precio\":\"4000\",\"cantidad\":1}}', NULL, NULL, '2023-08-19 04:34:15', '2023-08-19 04:34:15'),
(4, 'ord_2uQhEocYqdYLcwD5T', 1, NULL, NULL, 1, NULL, 2, 8100.00, 0.00, 8100.00, 100.00, NULL, NULL, 0, 4, '{\"43\":{\"id\":43,\"nombre\":\"Nuevo producto\",\"precio\":\"4000\",\"cantidad\":1},\"47\":{\"id\":47,\"nombre\":\"Producto nuevo\",\"precio\":\"4000\",\"cantidad\":1}}', NULL, NULL, '2023-08-19 04:48:54', '2023-08-19 04:48:54'),
(5, 'ord_2uSG27TLDQyMmvazY', 1, NULL, NULL, 3, NULL, 1, 200.00, 0.00, 200.00, 100.00, NULL, NULL, 0, 8, '{\"42\":{\"id\":42,\"nombre\":\"Producto nuevo\",\"precio\":\"100\",\"cantidad\":1}}', NULL, NULL, '2023-08-23 23:43:11', '2023-08-23 23:43:11'),
(6, 'ord_2uWpGaa11MK1BxdnP', 1, NULL, NULL, 1, NULL, 1, 150.00, 0.00, 150.00, 100.00, NULL, NULL, 0, 4, '{\"49\":{\"id\":49,\"nombre\":\"Perrito huevo\",\"precio\":\"50\",\"cantidad\":1}}', NULL, NULL, '2023-09-06 22:11:20', '2023-09-06 22:11:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_detalles`
--

CREATE TABLE `pedido_detalles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double(9,2) NOT NULL,
  `importe` double(9,2) NOT NULL,
  `total` double(9,2) NOT NULL,
  `pedido` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `color` bigint(20) UNSIGNED DEFAULT NULL,
  `log` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `politicas`
--

CREATE TABLE `politicas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `politicas`
--

INSERT INTO `politicas` (`id`, `titulo`, `descripcion`, `archivo`, `created_at`, `updated_at`) VALUES
(1, 'aviso de privacidad', NULL, NULL, NULL, '2022-03-31 17:19:19'),
(2, 'metodos de pago', NULL, NULL, NULL, NULL),
(3, 'devoluciones', NULL, NULL, NULL, NULL),
(4, 'terminos y condiciones', NULL, NULL, NULL, NULL),
(5, 'garantias', NULL, NULL, NULL, NULL),
(6, 'politicas de envio', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL DEFAULT 'Producto nuevo',
  `descripcion` text DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `portada` varchar(255) DEFAULT 'producto_01.png',
  `pdf` varchar(255) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` varchar(255) DEFAULT '$0.00',
  `color` int(11) DEFAULT NULL,
  `inicio` tinyint(1) NOT NULL DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(11) NOT NULL DEFAULT 666,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `categoria`, `portada`, `pdf`, `cantidad`, `precio`, `color`, `inicio`, `activo`, `orden`, `created_at`, `updated_at`) VALUES
(41, 'Producto Nuevo', 'Si no sabes qué es Amazon Renewed o productos reacondicionados o renovados de Amazon, ve mi experiencia de compra en este video porque gracias a ello puedes comprar celulares, videojuegos, televisores, relojes inteligentes, tablets, computadoras y más tecnología de forma segura y económica.', '10', 'Vba0fT6YTSAurKK5nhpGpfhemmypm3.png', NULL, 0, '1000', 2, 0, 1, 666, '2023-08-15 22:18:04', '2023-09-06 21:45:26'),
(42, 'Producto nuevo', 'Lorem ipsum es el texto que se usa habitualmente en diseño gráfico en demostraciones de tipografías o de borradores de diseño para probar el diseño visual antes de insertar el texto final', '11', 'QyOMXMycVYRqcwt4cOM1myc9siQXnm.png', NULL, 0, '100', 4, 1, 1, 666, '2023-08-16 06:40:42', '2023-09-06 22:06:01'),
(43, 'Nuevo producto', 'Lorem ipsum es el texto que se usa habitualmente en diseño gráfico en demostraciones de tipografías o de borradores de diseño para probar el diseño visual antes de insertar el texto final', '12', 'j82pZ7nWisc4nWMsFU2GaOsZibJt4a.png', NULL, 3, '4000', 1, 1, 1, 666, '2023-08-16 06:41:37', '2023-08-21 08:30:06'),
(44, 'Producto nuevo', 'Lorem ipsum es el texto que se usa habitualmente en diseño gráfico en demostraciones de tipografías o de borradores de diseño para probar el diseño visual antes de insertar el texto final', '10', '125MYWliSIDRrKN1JcYMewHAELeUK5.png', NULL, 4, '4000', 3, 1, 1, 666, '2023-08-16 06:42:45', '2023-08-21 08:30:07'),
(45, 'Producto nuevo', 'Lorem ipsum es el texto que se usa habitualmente en diseño gráfico en demostraciones de tipografías o de borradores de diseño para probar el diseño visual antes de insertar el texto final', '10', 'Jf5WBgAtLq2lGmqgmDmHlXtUk9LoWC.png', NULL, 6, '4000', 1, 1, 1, 666, '2023-08-16 06:43:13', '2023-08-21 08:30:25'),
(46, 'Producto nuevo', 'Lorem ipsum es el texto que se usa habitualmente en diseño gráfico en demostraciones de tipografías o de borradores de diseño para probar el diseño visual antes de insertar el texto final', '10', 'ILlnt4Vt6n0umkEsGH01Jj68DYbMjk.png', NULL, 10, '4000', 4, 1, 1, 666, '2023-08-16 06:43:51', '2023-08-21 16:54:34'),
(47, 'Producto nuevo', 'Lorem ipsum es el texto que se usa habitualmente en diseño gráfico en demostraciones de tipografías o de borradores de diseño para probar el diseño visual antes de insertar el texto final', '14', 'ch5oJEXKERGkqBNRC6BKpj972tdv2h.png', NULL, 4, '4000', 4, 1, 1, 666, '2023-08-16 06:44:29', '2023-09-06 21:45:05'),
(49, 'Perrito huevo', 'descripcion de mi perrito', '12', 'q9v3zSutfQbA6ksrpcXrw3Yo08Ptyl.png', NULL, 9, '50', 5, 0, 1, 666, '2023-09-06 22:07:34', '2023-09-06 22:11:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_photos`
--

CREATE TABLE `productos_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT 666
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos_photos`
--

INSERT INTO `productos_photos` (`id`, `producto`, `titulo`, `image`, `orden`) VALUES
(21, 34, NULL, 'XoIafc4wHYCS78YxMNFh3ANqW1u1TP.png', 666),
(22, 36, NULL, 'oyVDQb3T19zLoJqHywOFePvll0R2R8.png', 666),
(29, 41, NULL, 'CZmbC3ssxkZ7yGsm25KNdAzGxYNc4P.jpg', 666),
(30, 41, NULL, 'QfoYsPPKAv84LIZY2jQCWl8MxndMNI.jpg', 666),
(31, 41, NULL, 'DtnGMTU21qnqGFBkS6RDIoAeWZwxoE.jpg', 666),
(32, 49, NULL, 'eYfvigh4SocJhT8cs7TsA61kFH0zPd.png', 666);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_presentacions`
--

CREATE TABLE `producto_presentacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tamanio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_relacions`
--

CREATE TABLE `producto_relacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `otroProducto` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_sizes`
--

CREATE TABLE `producto_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tamanio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_variantes`
--

CREATE TABLE `producto_variantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `presentacion` bigint(20) UNSIGNED NOT NULL,
  `stock` varchar(255) DEFAULT NULL,
  `precio` varchar(255) NOT NULL,
  `descuento` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(11) NOT NULL DEFAULT 666,
  `tipo_envio` varchar(255) DEFAULT NULL,
  `peso` varchar(255) DEFAULT NULL,
  `largo` varchar(255) DEFAULT NULL,
  `ancho` varchar(255) DEFAULT NULL,
  `alto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_f_categoria_productos`
--

CREATE TABLE `p_f_categoria_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `icono` text DEFAULT NULL,
  `aux` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `p_f_categoria_productos`
--

INSERT INTO `p_f_categoria_productos` (`id`, `categoria`, `icono`, `aux`, `created_at`, `updated_at`) VALUES
(1, 'IMPERMEABILIZANTES', NULL, NULL, NULL, NULL),
(2, 'ADHESIVO DE CONCRETO', NULL, NULL, NULL, NULL),
(3, 'TRES', NULL, NULL, NULL, NULL),
(4, 'CUATRO', NULL, NULL, NULL, NULL),
(5, 'CINCO', NULL, NULL, NULL, NULL),
(6, 'SEIS', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_f_necesidades`
--

CREATE TABLE `p_f_necesidades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo_sector` int(11) DEFAULT NULL,
  `sector` text DEFAULT NULL,
  `necesidades` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_f_productos`
--

CREATE TABLE `p_f_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoria` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `precio` double(8,2) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `existencias` int(11) DEFAULT NULL,
  `presentacion` varchar(255) DEFAULT NULL,
  `imagen` text DEFAULT NULL,
  `inicio` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `p_f_productos`
--

INSERT INTO `p_f_productos` (`id`, `categoria`, `nombre`, `precio`, `descripcion`, `existencias`, `presentacion`, `imagen`, `inicio`, `created_at`, `updated_at`) VALUES
(1, 1, 'Fester CR-66', 2299.00, 'El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.', 10, '22KG', NULL, 0, NULL, NULL),
(2, 1, 'DOS', 1111.00, 'El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.', 5, '23KG', NULL, 0, NULL, NULL),
(3, 2, 'TRES', 3333.00, 'El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.', 33, '22KG', NULL, 0, NULL, NULL),
(4, 3, 'CUATRO', 222.00, 'El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.', 11, '33KG', NULL, 0, NULL, NULL),
(5, 1, 'CINCO', 333.00, 'El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.', 22, '10LTS', NULL, 0, NULL, NULL),
(6, 2, 'SEIS', 222.00, 'El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.', 22, '5LTS', NULL, 0, NULL, NULL),
(7, 4, 'SIETE', 555.00, 'El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.', 44, '3KG', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_f_proyectos`
--

CREATE TABLE `p_f_proyectos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icono` text DEFAULT NULL,
  `imagen` text DEFAULT NULL,
  `aux` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_f_punto_ventas`
--

CREATE TABLE `p_f_punto_ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `codigo_postal` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `mapa` text DEFAULT NULL,
  `street_view` text DEFAULT NULL,
  `aux` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_f_slider_principals`
--

CREATE TABLE `p_f_slider_principals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_f_solucions`
--

CREATE TABLE `p_f_solucions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icono` text DEFAULT NULL,
  `imagen` text DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_f_subdistribuidors`
--

CREATE TABLE `p_f_subdistribuidors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `beneficio` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccions`
--

CREATE TABLE `seccions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seccion` varchar(255) NOT NULL,
  `portada` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `seccions`
--

INSERT INTO `seccions` (`id`, `seccion`, `portada`, `slug`) VALUES
(1, 'inicio', 'fas fa-home-lg-alt', 'index'),
(2, 'tienda', 'fas fa-hands-helping', 'store'),
(3, 'proyectos', 'fas fa-shield', 'proyects'),
(4, 'contacto', 'fas fa-tools', 'contact'),
(5, 'soluciones', NULL, 'solutios'),
(6, 'puntos de venta', NULL, 'pointofsale'),
(7, 'subdistribuidores', NULL, 'subdist'),
(8, 'nosotros', NULL, 'aboutus');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icono` varchar(5000) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` varchar(5000) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `inicio` tinyint(1) NOT NULL DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(11) NOT NULL DEFAULT 666,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `services`
--

INSERT INTO `services` (`id`, `icono`, `titulo`, `descripcion`, `image`, `inicio`, `activo`, `orden`, `created_at`, `updated_at`) VALUES
(14, NULL, 'NOMBRE DEL PROYECTO 1', 'Lorem123', 'T3QoOxzJDwhRSDPfilvlWHLUkjIEik.png', 0, 1, 666, NULL, NULL),
(15, NULL, 'Proyecto 2', 'Descripcion del proyecto 2', '5ZhaBHZn95ORmaTZ0QQBnsRJG5cTGi.jpeg', 0, 1, 666, NULL, NULL),
(16, NULL, 'proyecto 3', 'descripcion proyecto 3', 'riaQm7bhzmsTSY3VlXJhh2BnNGEwmL.png', 0, 1, 666, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `empresa` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `rfc` varchar(255) DEFAULT NULL,
  `nivel` tinyint(4) NOT NULL DEFAULT 0,
  `puntos` int(11) DEFAULT NULL,
  `distr_code` varchar(255) DEFAULT NULL,
  `referido_by` varchar(255) DEFAULT NULL,
  `distribuidor` tinyint(1) NOT NULL DEFAULT 0,
  `profile` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `role` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `username`, `email`, `email_verified_at`, `telefono`, `facebook`, `empresa`, `avatar`, `rfc`, `nivel`, `puntos`, `distr_code`, `referido_by`, `distribuidor`, `profile`, `activo`, `role`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'yahir', 'lopez', '', 'yahir@wozial.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', NULL, 0, NULL, 1, 1, '$2y$10$ixFvI1ajnMzpjT8EhK0KsOzC/I8X5prS5vUZLKCsh2eOf7zllQPim', NULL, '2022-03-01 00:49:39', '2022-03-01 05:10:39', NULL),
(4, 'Alexis i', 'R Garcia', NULL, 'alexis.israel.rg@gmail.com', NULL, '3325141438', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, 1, NULL, '$2y$10$DIla95hgW/B0z6fDgKWEe.hYS1GdunG1P91Ckk13l8PAuGk0eijF2', NULL, '2023-07-27 10:02:59', '2023-08-21 15:26:29', NULL),
(7, 'Jesus', 'Garcia', NULL, 'jesus@wozial.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, 1, NULL, '$2y$10$uMZXbk2X9T/ZK4or9jBRZe74DIwlfSs758I4xCCwZozIrE6caSP7m', NULL, '2023-08-21 19:10:52', '2023-08-21 19:10:52', NULL),
(8, 'Abel', 'Quintero', NULL, 'abel.wozial@hotmail.com', NULL, '3333333333', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, 1, NULL, '$2y$10$GWMjkmrixY2yIgGWrkbhwOcpk79WmlhC7E9y9uNMRtcN9JhwcWMUK', NULL, '2023-08-23 23:35:09', '2023-08-23 23:41:48', NULL),
(9, 'Michael Eduardo', 'Sandoval Pérez', NULL, 'mikeed1998@gmail.com', NULL, '2432323', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, 1, NULL, '$2y$10$61e9mxpY9Hvf.e8erqub0OEFi0vHUUM0wLmazHHo9EDRgW3JkmhFC', NULL, '2023-10-19 23:29:07', '2023-10-19 23:59:20', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedido_detalles`
--
ALTER TABLE `pedido_detalles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_photos`
--
ALTER TABLE `productos_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `p_f_categoria_productos`
--
ALTER TABLE `p_f_categoria_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `p_f_necesidades`
--
ALTER TABLE `p_f_necesidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `p_f_productos`
--
ALTER TABLE `p_f_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_f_productos_categoria_foreign` (`categoria`);

--
-- Indices de la tabla `p_f_proyectos`
--
ALTER TABLE `p_f_proyectos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `p_f_punto_ventas`
--
ALTER TABLE `p_f_punto_ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `p_f_slider_principals`
--
ALTER TABLE `p_f_slider_principals`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `p_f_solucions`
--
ALTER TABLE `p_f_solucions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `p_f_subdistribuidors`
--
ALTER TABLE `p_f_subdistribuidors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seccions`
--
ALTER TABLE `seccions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `elementos`
--
ALTER TABLE `elementos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pedido_detalles`
--
ALTER TABLE `pedido_detalles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `productos_photos`
--
ALTER TABLE `productos_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `p_f_categoria_productos`
--
ALTER TABLE `p_f_categoria_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `p_f_necesidades`
--
ALTER TABLE `p_f_necesidades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `p_f_productos`
--
ALTER TABLE `p_f_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `p_f_proyectos`
--
ALTER TABLE `p_f_proyectos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `p_f_punto_ventas`
--
ALTER TABLE `p_f_punto_ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `p_f_slider_principals`
--
ALTER TABLE `p_f_slider_principals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `p_f_solucions`
--
ALTER TABLE `p_f_solucions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `p_f_subdistribuidors`
--
ALTER TABLE `p_f_subdistribuidors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seccions`
--
ALTER TABLE `seccions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `p_f_productos`
--
ALTER TABLE `p_f_productos`
  ADD CONSTRAINT `p_f_productos_categoria_foreign` FOREIGN KEY (`categoria`) REFERENCES `p_f_categoria_productos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
