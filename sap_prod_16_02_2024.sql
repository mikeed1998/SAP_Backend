-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2024 a las 23:35:57
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sap_prod`
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
(1, 'SAP Anuncios', 'Descripcion del sitio', NULL, NULL, 'mikeed1998@gmail.com', '', 'sap_admin@proyectoswozial.com', '+DRWa*uQB~al', 'mail.proyectoswozial.com', '465', NULL, '4776363191', '4776363191', '', 'https://www.facebook.com/SAP.Subeteconlosmejores', 'https://www.instagram.com/sap_publicidad', NULL, NULL, NULL, NULL, NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3735.26095032911!2d-100.3780338847383!3d20.57739830840845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d344c63af2b2af%3A0x8506d3bdeed8e510!2sAv.%20Luis%20Vega%20Monrroy%20901A%2C%20zona%20dos%20extendida%2C%20Plazas%20del%20Sol%201ra%20Secc%2C%2076099%20Santiago%20de%20Quer%C3%A9taro%2C%20Qro.!5e0!3m2!1ses-419!2smx!4v1635149990350!5m2!1ses-419!2smx\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'Av. Rio San Joaquín 436, Amp Granada, Miguel Hidalgo, CDMX', NULL, '2024-01-17 00:47:03');

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
(4, 'Michael', 'Av. Siempre viva', '23', '22', 'uno y dos', 'bonita', '44344', 'Guadalajara', 'Jalisco', NULL, 'Mexico', NULL, 9, '2023-10-19 23:29:07', '2023-11-07 22:56:37');

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
(100, 'titulo - inicio', 'SAP Publicidad EXTERIOR', NULL, NULL, 0, 1, 666, 1),
(101, 'Texto - inicio', 'Somos un medio único que permite un gran alcance, gran impacto.', NULL, NULL, 0, 1, 666, 1),
(102, 'texto botón - inicio', NULL, '20240208195402.mp4', NULL, 1, 1, 666, 1),
(103, 'Texto mapa - inicio', NULL, NULL, NULL, 0, 1, 666, 1),
(104, 'Texto mapa 2 - inicio', NULL, NULL, NULL, 0, 1, 666, 1),
(105, 'contador mapa - inicio', 'Somos una empresa con más de 25 años de experiencia en el medio de publicidad exterior, ofreciendo un servicio completo de publicidad a través de medios exteriores como: Espectaculares, muros, pantallas digitales, mupies, transporte público, vallas móviles, puentes peatonales y vehiculares, centros comerciales y aeropuertos. Con cobertura nacional en las principales ciudades del país. Siendo un medio único que permite un gran alcance, gran impacto, cobertura, calidad y experiencia, siendo un medio único por excelencia.', NULL, NULL, 0, 1, 666, 1),
(106, 'Texto contador - inicio', NULL, NULL, NULL, 0, 1, 666, 1),
(107, 'Texto circulo 1 - inicio', 'Tu campaña merece la mejor ubicación', NULL, NULL, 0, 1, 666, 1),
(108, 'circulo 1 - inicio', NULL, '20231229163606.png', NULL, 0, 1, 666, 1),
(109, 'Texto circulo 2 - inicio', 'Diariamente millones de consumidores circulan por nuestras ubicaciones', NULL, NULL, 0, 1, 666, 1),
(110, 'circulo 2 - inicio', NULL, 'xkSIWnAaDPbvu9ACHrMvVbJ6aIKGeZ.png', NULL, 0, 1, 666, 1),
(111, 'Texto circulo 3 - inicio', 'Ponemos tu publicidad en lo más alto', NULL, NULL, 0, 1, 666, 1),
(112, 'circulo 3 - inicio', NULL, 'ZAsj51sLN64haaqdNf0bRUwl1WI1UO.png', NULL, 0, 1, 666, 1),
(113, 'Texto circulo 4 - inicio', '75% de las personas recuerdan las marcas', NULL, NULL, 0, 1, 666, 1),
(114, 'circulo 4 - inicio', NULL, 'nmXzuh3ElD1PLVAHeF29oHbQTOUiha.png', NULL, 0, 1, 666, 1),
(115, 'Texto 2 - inicio', 'SAP te hace llegar a millones de consumidores en movimiento dentro de las ciudades más importantes del país las 24 horas del día, ofreciendote las mejores ubicaciones en rutas de alto flujo vehícular y peatonal.', NULL, NULL, 0, 1, 666, 1),
(116, 'Titulo formulario - inicio', 'Déjanos un MENSAJE, NOS PONEMOS en contacto', NULL, NULL, 0, 1, 666, 1),
(117, 'Servicios', NULL, NULL, NULL, 0, 1, 666, 5),
(118, 'Portada - nosotros', NULL, '6KNDychNJ1MLrXcQ9XhsXth8NRXbrQ.png', NULL, 1, 1, 666, 8),
(119, 'Titulo - nosotros', 'Conoce un poco sobre ', NULL, NULL, 0, 1, 666, 8),
(120, 'Texto - nosotros', 'Somos una empresa con más de 25 años de experiencia en el medio de publicidad exterior, ofreciendo un servicio completo de publicidad a través de medios exteriores como: Espectaculares, muros, pantallas digitales, mupies, transporte público, vallas móviles, puentes peatonales y vehiculares, centros comerciales y aeropuertos. Con cobertura nacional en las principales ciudades del país. Siendo un medio único que permite un gran alcance, gran impacto, cobertura, calidad y experiencia, siendo un medio único por excelencia.', NULL, NULL, 0, 1, 666, 8),
(121, 'Titulo 2 - nosotros', 'NO ESPERES MÁS', NULL, NULL, 0, 1, 666, 8),
(122, 'Titulo 3 - nosotros', 'ANUNCIATE CON LOS MEJORES', NULL, NULL, 0, 1, 666, 8),
(123, 'Texto 2 - nosotros', 'Nos enorgullece ofrecer una plataforma innovadora y dinámica para la promoción de su marca. Nos destacamos como líderes en la venta de espacios publicitarios, brindando oportunidades excepcionales para que su mensaje llegue a la audiencia adecuada de manera impactante y efectiva.', NULL, NULL, 0, 1, 666, 8),
(124, 'Misión - nosotros', 'Misión', NULL, NULL, 0, 1, 666, 8),
(125, 'Misión texto - nosotros', 'En Sap, nuestra misión es ofrecer servicios de la más alta calidad, superando las expectativas de nuestros clientes y contribuyendo al bienestar de la comunidad. Nos esforzamos por ser líderes en el mercado al impulsar la innovación, la sostenibilidad y el compromiso con la excelencia en todo lo que hacemos.', NULL, NULL, 0, 1, 666, 8),
(126, 'Visión - nosotros', 'Visión', '', NULL, 0, 1, 666, 8),
(127, 'Visión texto - nosotros', 'Buscamos constantemente la mejora y la expansión, aspirando a ser líderes en el mercado global, mientras mantenemos nuestro compromiso con la responsabilidad social y ambiental.', NULL, NULL, 0, 1, 666, 8),
(128, 'Valores - nosotros', 'Valores', NULL, NULL, 0, 1, 666, 8),
(129, 'Valores texto - nosotros', 'Integridad.\nInnovación.\nCompromiso.\nEnfoque al cliente.\nResponsabilidad Social y Ambiental.\nTrabajo en equipo.', NULL, NULL, 0, 1, 666, 8),
(130, 'Exclusividad - nosotros', 'EXCLUSIVIDAD', NULL, NULL, 0, 1, 666, 8),
(131, 'Exclusividad texto - nosotros', 'Tu marca siempre en las mejores ubicaciones.', NULL, NULL, 0, 1, 666, 8),
(132, 'Experiencia - nosotros', 'EXPERIENCIA', NULL, NULL, 0, 1, 666, 8),
(133, 'Experiencia texto - nosotros', '25 años trabajando con las mejores marcas y agencias.', NULL, NULL, 0, 1, 666, 8),
(134, 'Seguridad - nosotros', 'SEGURIDAD', NULL, NULL, 0, 1, 666, 8),
(135, 'Seguridad texto - nosotros', 'Contratos formales y tratos serios, tranquilidad y garantia.', NULL, NULL, 0, 1, 666, 8),
(136, 'Legalidad - nosotros', 'LEGALIDAD', NULL, NULL, 0, 1, 666, 8),
(137, 'Legalidad texto - nosotros', 'Estructuras que operan con las autorizaciones legales', NULL, NULL, 0, 1, 666, 8),
(138, 'Imagen 1 - nosotros', NULL, '20231229163843.png', NULL, 1, 1, 666, 8),
(139, 'Imagen 2 - nosotros', NULL, 'Stz3r3qsmTUTWG8np2wQMwO1pM9U3k.png', NULL, 1, 1, 666, 8),
(140, 'Proyectos', NULL, NULL, NULL, 0, 1, 666, 3),
(141, 'Titulo - Bolsa de Trabajo', NULL, NULL, NULL, 0, 1, 666, 7),
(142, 'Texto - Bolsa de Trabajo', NULL, NULL, NULL, 0, 1, 666, 7),
(143, 'Portada - Bolsa de Trabajo', NULL, NULL, NULL, 1, 1, 666, 7),
(144, 'Beneficios 0 - Bolsa de Trabajo', NULL, NULL, NULL, 0, 1, 666, 7),
(145, 'Beneficios 1 - Bolsa de Trabajo', NULL, NULL, NULL, 0, 1, 666, 7),
(146, 'Beneficios 2 - Bolsa de Trabajo', NULL, NULL, NULL, 0, 1, 666, 7),
(147, 'Beneficios 3 - Bolsa de Trabajo', NULL, NULL, NULL, 0, 1, 666, 7),
(148, 'Beneficios 4 - Bolsa de Trabajo', NULL, NULL, NULL, 0, 1, 666, 7),
(149, 'Titulo formulario - Bolsa de Trabajo', NULL, NULL, NULL, 0, 1, 666, 7),
(150, 'Texto formulario - Bolsa de Trabajo', NULL, NULL, NULL, 0, 1, 666, 7),
(151, 'Titulo - contacto', 'Déjanos un MENSAJE, NOS PONEMOS en contacto', NULL, NULL, 0, 1, 666, 4),
(152, 'titulo - trabajo', 'CONOCE sobre nuestra BOLSA DE TRABAJO', NULL, NULL, 0, 1, 666, 11),
(153, 'texto - trabajo', 'Estamos emocionados de darles la bienvenida a un espacio lleno de oportunidades profesionales y crecimiento laboral. Aquí encontrarán el lugar con un ambiente donde sus habilidades y talentos serán reconocidos y valorados.', NULL, NULL, 0, 1, 666, 11),
(154, 'portada - trabajo', NULL, '20240103184725.png', NULL, 1, 1, 666, 11),
(155, 'beneficios - trabajo', 'Beneficios', NULL, NULL, 0, 1, 666, 11),
(156, 'titulo form - trabajo', 'Postúlate con NOSOTROS', NULL, NULL, 0, 1, 666, 11),
(157, 'texto form - trabajo', '¡Les deseamos mucho éxito en su búsqueda y estamos emocionados por ser parte de su viaje profesional!', NULL, NULL, 0, 1, 666, 11);

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
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `clave` varchar(2) NOT NULL COMMENT 'CVE_ENT - Clave de la entidad',
  `nombre` varchar(40) NOT NULL COMMENT 'NOM_ENT - Nombre de la entidad',
  `abrev` varchar(10) NOT NULL COMMENT 'NOM_ABR - Nombre abreviado de la entidad',
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Estados de la República Mexicana';

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `clave`, `nombre`, `abrev`, `activo`) VALUES
(1, '01', 'Aguascalientes', 'Ags.', 1),
(2, '02', 'Baja California', 'BC', 1),
(3, '03', 'Baja California Sur', 'BCS', 1),
(4, '04', 'Campeche', 'Camp.', 1),
(5, '05', 'Coahuila de Zaragoza', 'Coah.', 1),
(6, '06', 'Colima', 'Col.', 1),
(7, '07', 'Chiapas', 'Chis.', 1),
(8, '08', 'Chihuahua', 'Chih.', 1),
(9, '09', 'Ciudad de México', 'CDMX', 1),
(10, '10', 'Durango', 'Dgo.', 1),
(11, '11', 'Guanajuato', 'Gto.', 1),
(12, '12', 'Guerrero', 'Gro.', 1),
(13, '13', 'Hidalgo', 'Hgo.', 1),
(14, '14', 'Jalisco', 'Jal.', 1),
(15, '15', 'México', 'Mex.', 1),
(16, '16', 'Michoacán de Ocampo', 'Mich.', 1),
(17, '17', 'Morelos', 'Mor.', 1),
(18, '18', 'Nayarit', 'Nay.', 1),
(19, '19', 'Nuevo León', 'NL', 1),
(20, '20', 'Oaxaca', 'Oax.', 1),
(21, '21', 'Puebla', 'Pue.', 1),
(22, '22', 'Querétaro', 'Qro.', 1),
(23, '23', 'Quintana Roo', 'Q. Roo', 1),
(24, '24', 'San Luis Potosí', 'SLP', 1),
(25, '25', 'Sinaloa', 'Sin.', 1),
(26, '26', 'Sonora', 'Son.', 1),
(27, '27', 'Tabasco', 'Tab.', 1),
(28, '28', 'Tamaulipas', 'Tamps.', 1),
(29, '29', 'Tlaxcala', 'Tlax.', 1),
(30, '30', 'Veracruz de Ignacio de la Llave', 'Ver.', 1),
(31, '31', 'Yucatán', 'Yuc.', 1),
(32, '32', 'Zacatecas', 'Zac.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_municipios`
--

CREATE TABLE `estados_municipios` (
  `id` int(11) NOT NULL,
  `estados_id` int(11) NOT NULL,
  `municipios_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `estados_municipios`
--

INSERT INTO `estados_municipios` (`id`, `estados_id`, `municipios_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 2, 12),
(13, 2, 13),
(14, 2, 14),
(15, 2, 15),
(16, 2, 16),
(17, 3, 17),
(18, 3, 18),
(19, 3, 19),
(20, 3, 20),
(21, 3, 21),
(22, 4, 22),
(23, 4, 23),
(24, 4, 24),
(25, 4, 25),
(26, 4, 26),
(27, 4, 27),
(28, 4, 28),
(29, 4, 29),
(30, 4, 30),
(31, 4, 31),
(32, 4, 32),
(33, 5, 33),
(34, 5, 34),
(35, 5, 35),
(36, 5, 36),
(37, 5, 37),
(38, 5, 38),
(39, 5, 39),
(40, 5, 40),
(41, 5, 41),
(42, 5, 42),
(43, 5, 43),
(44, 5, 44),
(45, 5, 45),
(46, 5, 46),
(47, 5, 47),
(48, 5, 48),
(49, 5, 49),
(50, 5, 50),
(51, 5, 51),
(52, 5, 52),
(53, 5, 53),
(54, 5, 54),
(55, 5, 55),
(56, 5, 56),
(57, 5, 57),
(58, 5, 58),
(59, 5, 59),
(60, 5, 60),
(61, 5, 61),
(62, 5, 62),
(63, 5, 63),
(64, 5, 64),
(65, 5, 65),
(66, 5, 66),
(67, 5, 67),
(68, 5, 68),
(69, 5, 69),
(70, 5, 70),
(71, 6, 71),
(72, 6, 72),
(73, 6, 73),
(74, 6, 74),
(75, 6, 75),
(76, 6, 76),
(77, 6, 77),
(78, 6, 78),
(79, 6, 79),
(80, 6, 80),
(81, 7, 81),
(82, 7, 82),
(83, 7, 83),
(84, 7, 84),
(85, 7, 85),
(86, 7, 86),
(87, 7, 87),
(88, 7, 88),
(89, 7, 89),
(90, 7, 90),
(91, 7, 91),
(92, 7, 92),
(93, 7, 93),
(94, 7, 94),
(95, 7, 95),
(96, 7, 96),
(97, 7, 97),
(98, 7, 98),
(99, 7, 99),
(100, 7, 100),
(101, 7, 101),
(102, 7, 102),
(103, 7, 103),
(104, 7, 104),
(105, 7, 105),
(106, 7, 106),
(107, 7, 107),
(108, 7, 108),
(109, 7, 109),
(110, 7, 110),
(111, 7, 111),
(112, 7, 112),
(113, 7, 113),
(114, 7, 114),
(115, 7, 115),
(116, 7, 116),
(117, 7, 117),
(118, 7, 118),
(119, 7, 119),
(120, 7, 120),
(121, 7, 121),
(122, 7, 122),
(123, 7, 123),
(124, 7, 124),
(125, 7, 125),
(126, 7, 126),
(127, 7, 127),
(128, 7, 128),
(129, 7, 129),
(130, 7, 130),
(131, 7, 131),
(132, 7, 132),
(133, 7, 133),
(134, 7, 134),
(135, 7, 135),
(136, 7, 136),
(137, 7, 137),
(138, 7, 138),
(139, 7, 139),
(140, 7, 140),
(141, 7, 141),
(142, 7, 142),
(143, 7, 143),
(144, 7, 144),
(145, 7, 145),
(146, 7, 146),
(147, 7, 147),
(148, 7, 148),
(149, 7, 149),
(150, 7, 150),
(151, 7, 151),
(152, 7, 152),
(153, 7, 153),
(154, 7, 154),
(155, 7, 155),
(156, 7, 156),
(157, 7, 157),
(158, 7, 158),
(159, 7, 159),
(160, 7, 160),
(161, 7, 161),
(162, 7, 162),
(163, 7, 163),
(164, 7, 164),
(165, 7, 165),
(166, 7, 166),
(167, 7, 167),
(168, 7, 168),
(169, 7, 169),
(170, 7, 170),
(171, 7, 171),
(172, 7, 172),
(173, 7, 173),
(174, 7, 174),
(175, 7, 175),
(176, 7, 176),
(177, 7, 177),
(178, 7, 178),
(179, 7, 179),
(180, 7, 180),
(181, 7, 181),
(182, 7, 182),
(183, 7, 183),
(184, 7, 184),
(185, 7, 185),
(186, 7, 186),
(187, 7, 187),
(188, 7, 188),
(189, 7, 189),
(190, 7, 190),
(191, 7, 191),
(192, 7, 192),
(193, 7, 193),
(194, 7, 194),
(195, 7, 195),
(196, 7, 196),
(197, 7, 197),
(198, 7, 198),
(199, 8, 199),
(200, 8, 200),
(201, 8, 201),
(202, 8, 202),
(203, 8, 203),
(204, 8, 204),
(205, 8, 205),
(206, 8, 206),
(207, 8, 207),
(208, 8, 208),
(209, 8, 209),
(210, 8, 210),
(211, 8, 211),
(212, 8, 212),
(213, 8, 213),
(214, 8, 214),
(215, 8, 215),
(216, 8, 216),
(217, 8, 217),
(218, 8, 218),
(219, 8, 219),
(220, 8, 220),
(221, 8, 221),
(222, 8, 222),
(223, 8, 223),
(224, 8, 224),
(225, 8, 225),
(226, 8, 226),
(227, 8, 227),
(228, 8, 228),
(229, 8, 229),
(230, 8, 230),
(231, 8, 231),
(232, 8, 232),
(233, 8, 233),
(234, 8, 234),
(235, 8, 235),
(236, 8, 236),
(237, 8, 237),
(238, 8, 238),
(239, 8, 239),
(240, 8, 240),
(241, 8, 241),
(242, 8, 242),
(243, 8, 243),
(244, 8, 244),
(245, 8, 245),
(246, 8, 246),
(247, 8, 247),
(248, 8, 248),
(249, 8, 249),
(250, 8, 250),
(251, 8, 251),
(252, 8, 252),
(253, 8, 253),
(254, 8, 254),
(255, 8, 255),
(256, 8, 256),
(257, 8, 257),
(258, 8, 258),
(259, 8, 259),
(260, 8, 260),
(261, 8, 261),
(262, 8, 262),
(263, 8, 263),
(264, 8, 264),
(265, 8, 265),
(266, 9, 266),
(267, 9, 267),
(268, 9, 268),
(269, 9, 269),
(270, 9, 270),
(271, 9, 271),
(272, 9, 272),
(273, 9, 273),
(274, 9, 274),
(275, 9, 275),
(276, 9, 276),
(277, 9, 277),
(278, 9, 278),
(279, 9, 279),
(280, 9, 280),
(281, 9, 281),
(282, 10, 282),
(283, 10, 283),
(284, 10, 284),
(285, 10, 285),
(286, 10, 286),
(287, 10, 287),
(288, 10, 288),
(289, 10, 289),
(290, 10, 290),
(291, 10, 291),
(292, 10, 292),
(293, 10, 293),
(294, 10, 294),
(295, 10, 295),
(296, 10, 296),
(297, 10, 297),
(298, 10, 298),
(299, 10, 299),
(300, 10, 300),
(301, 10, 301),
(302, 10, 302),
(303, 10, 303),
(304, 10, 304),
(305, 10, 305),
(306, 10, 306),
(307, 10, 307),
(308, 10, 308),
(309, 10, 309),
(310, 10, 310),
(311, 10, 311),
(312, 10, 312),
(313, 10, 313),
(314, 10, 314),
(315, 10, 315),
(316, 10, 316),
(317, 10, 317),
(318, 10, 318),
(319, 10, 319),
(320, 10, 320),
(321, 11, 321),
(322, 11, 322),
(323, 11, 323),
(324, 11, 324),
(325, 11, 325),
(326, 11, 326),
(327, 11, 327),
(328, 11, 328),
(329, 11, 329),
(330, 11, 330),
(331, 11, 331),
(332, 11, 332),
(333, 11, 333),
(334, 11, 334),
(335, 11, 335),
(336, 11, 336),
(337, 11, 337),
(338, 11, 338),
(339, 11, 339),
(340, 11, 340),
(341, 11, 341),
(342, 11, 342),
(343, 11, 343),
(344, 11, 344),
(345, 11, 345),
(346, 11, 346),
(347, 11, 347),
(348, 11, 348),
(349, 11, 349),
(350, 11, 350),
(351, 11, 351),
(352, 11, 352),
(353, 11, 353),
(354, 11, 354),
(355, 11, 355),
(356, 11, 356),
(357, 11, 357),
(358, 11, 358),
(359, 11, 359),
(360, 11, 360),
(361, 11, 361),
(362, 11, 362),
(363, 11, 363),
(364, 11, 364),
(365, 11, 365),
(366, 11, 366),
(367, 12, 367),
(368, 12, 368),
(369, 12, 369),
(370, 12, 370),
(371, 12, 371),
(372, 12, 372),
(373, 12, 373),
(374, 12, 374),
(375, 12, 375),
(376, 12, 376),
(377, 12, 377),
(378, 12, 378),
(379, 12, 379),
(380, 12, 380),
(381, 12, 381),
(382, 12, 382),
(383, 12, 383),
(384, 12, 384),
(385, 12, 385),
(386, 12, 386),
(387, 12, 387),
(388, 12, 388),
(389, 12, 389),
(390, 12, 390),
(391, 12, 391),
(392, 12, 392),
(393, 12, 393),
(394, 12, 394),
(395, 12, 395),
(396, 12, 396),
(397, 12, 397),
(398, 12, 398),
(399, 12, 399),
(400, 12, 400),
(401, 12, 401),
(402, 12, 402),
(403, 12, 403),
(404, 12, 404),
(405, 12, 405),
(406, 12, 406),
(407, 12, 407),
(408, 12, 408),
(409, 12, 409),
(410, 12, 410),
(411, 12, 411),
(412, 12, 412),
(413, 12, 413),
(414, 12, 414),
(415, 12, 415),
(416, 12, 416),
(417, 12, 417),
(418, 12, 418),
(419, 12, 419),
(420, 12, 420),
(421, 12, 421),
(422, 12, 422),
(423, 12, 423),
(424, 12, 424),
(425, 12, 425),
(426, 12, 426),
(427, 12, 427),
(428, 12, 428),
(429, 12, 429),
(430, 12, 430),
(431, 12, 431),
(432, 12, 432),
(433, 12, 433),
(434, 12, 434),
(435, 12, 435),
(436, 12, 436),
(437, 12, 437),
(438, 12, 438),
(439, 12, 439),
(440, 12, 440),
(441, 12, 441),
(442, 12, 442),
(443, 12, 443),
(444, 12, 444),
(445, 12, 445),
(446, 12, 446),
(447, 12, 447),
(448, 13, 448),
(449, 13, 449),
(450, 13, 450),
(451, 13, 451),
(452, 13, 452),
(453, 13, 453),
(454, 13, 454),
(455, 13, 455),
(456, 13, 456),
(457, 13, 457),
(458, 13, 458),
(459, 13, 459),
(460, 13, 460),
(461, 13, 461),
(462, 13, 462),
(463, 13, 463),
(464, 13, 464),
(465, 13, 465),
(466, 13, 466),
(467, 13, 467),
(468, 13, 468),
(469, 13, 469),
(470, 13, 470),
(471, 13, 471),
(472, 13, 472),
(473, 13, 473),
(474, 13, 474),
(475, 13, 475),
(476, 13, 476),
(477, 13, 477),
(478, 13, 478),
(479, 13, 479),
(480, 13, 480),
(481, 13, 481),
(482, 13, 482),
(483, 13, 483),
(484, 13, 484),
(485, 13, 485),
(486, 13, 486),
(487, 13, 487),
(488, 13, 488),
(489, 13, 489),
(490, 13, 490),
(491, 13, 491),
(492, 13, 492),
(493, 13, 493),
(494, 13, 494),
(495, 13, 495),
(496, 13, 496),
(497, 13, 497),
(498, 13, 498),
(499, 13, 499),
(500, 13, 500),
(501, 13, 501),
(502, 13, 502),
(503, 13, 503),
(504, 13, 504),
(505, 13, 505),
(506, 13, 506),
(507, 13, 507),
(508, 13, 508),
(509, 13, 509),
(510, 13, 510),
(511, 13, 511),
(512, 13, 512),
(513, 13, 513),
(514, 13, 514),
(515, 13, 515),
(516, 13, 516),
(517, 13, 517),
(518, 13, 518),
(519, 13, 519),
(520, 13, 520),
(521, 13, 521),
(522, 13, 522),
(523, 13, 523),
(524, 13, 524),
(525, 13, 525),
(526, 13, 526),
(527, 13, 527),
(528, 13, 528),
(529, 13, 529),
(530, 13, 530),
(531, 13, 531),
(532, 14, 532),
(533, 14, 533),
(534, 14, 534),
(535, 14, 535),
(536, 14, 536),
(537, 14, 537),
(538, 14, 538),
(539, 14, 539),
(540, 14, 540),
(541, 14, 541),
(542, 14, 542),
(543, 14, 543),
(544, 14, 544),
(545, 14, 545),
(546, 14, 546),
(547, 14, 547),
(548, 14, 548),
(549, 14, 549),
(550, 14, 550),
(551, 14, 551),
(552, 14, 552),
(553, 14, 553),
(554, 14, 554),
(555, 14, 555),
(556, 14, 556),
(557, 14, 557),
(558, 14, 558),
(559, 14, 559),
(560, 14, 560),
(561, 14, 561),
(562, 14, 562),
(563, 14, 563),
(564, 14, 564),
(565, 14, 565),
(566, 14, 566),
(567, 14, 567),
(568, 14, 568),
(569, 14, 569),
(570, 14, 570),
(571, 14, 571),
(572, 14, 572),
(573, 14, 573),
(574, 14, 574),
(575, 14, 575),
(576, 14, 576),
(577, 14, 577),
(578, 14, 578),
(579, 14, 579),
(580, 14, 580),
(581, 14, 581),
(582, 14, 582),
(583, 14, 583),
(584, 14, 584),
(585, 14, 585),
(586, 14, 586),
(587, 14, 587),
(588, 14, 588),
(589, 14, 589),
(590, 14, 590),
(591, 14, 591),
(592, 14, 592),
(593, 14, 593),
(594, 14, 594),
(595, 14, 595),
(596, 14, 596),
(597, 14, 597),
(598, 14, 598),
(599, 14, 599),
(600, 14, 600),
(601, 14, 601),
(602, 14, 602),
(603, 14, 603),
(604, 14, 604),
(605, 14, 605),
(606, 14, 606),
(607, 14, 607),
(608, 14, 608),
(609, 14, 609),
(610, 14, 610),
(611, 14, 611),
(612, 14, 612),
(613, 14, 613),
(614, 14, 614),
(615, 14, 615),
(616, 14, 616),
(617, 14, 617),
(618, 14, 618),
(619, 14, 619),
(620, 14, 620),
(621, 14, 621),
(622, 14, 622),
(623, 14, 623),
(624, 14, 624),
(625, 14, 625),
(626, 14, 626),
(627, 14, 627),
(628, 14, 628),
(629, 14, 629),
(630, 14, 630),
(631, 14, 631),
(632, 14, 632),
(633, 14, 633),
(634, 14, 634),
(635, 14, 635),
(636, 14, 636),
(637, 14, 637),
(638, 14, 638),
(639, 14, 639),
(640, 14, 640),
(641, 14, 641),
(642, 14, 642),
(643, 14, 643),
(644, 14, 644),
(645, 14, 645),
(646, 14, 646),
(647, 14, 647),
(648, 14, 648),
(649, 14, 649),
(650, 14, 650),
(651, 14, 651),
(652, 14, 652),
(653, 14, 653),
(654, 14, 654),
(655, 14, 655),
(656, 14, 656),
(657, 15, 657),
(658, 15, 658),
(659, 15, 659),
(660, 15, 660),
(661, 15, 661),
(662, 15, 662),
(663, 15, 663),
(664, 15, 664),
(665, 15, 665),
(666, 15, 666),
(667, 15, 667),
(668, 15, 668),
(669, 15, 669),
(670, 15, 670),
(671, 15, 671),
(672, 15, 672),
(673, 15, 673),
(674, 15, 674),
(675, 15, 675),
(676, 15, 676),
(677, 15, 677),
(678, 15, 678),
(679, 15, 679),
(680, 15, 680),
(681, 15, 681),
(682, 15, 682),
(683, 15, 683),
(684, 15, 684),
(685, 15, 685),
(686, 15, 686),
(687, 15, 687),
(688, 15, 688),
(689, 15, 689),
(690, 15, 690),
(691, 15, 691),
(692, 15, 692),
(693, 15, 693),
(694, 15, 694),
(695, 15, 695),
(696, 15, 696),
(697, 15, 697),
(698, 15, 698),
(699, 15, 699),
(700, 15, 700),
(701, 15, 701),
(702, 15, 702),
(703, 15, 703),
(704, 15, 704),
(705, 15, 705),
(706, 15, 706),
(707, 15, 707),
(708, 15, 708),
(709, 15, 709),
(710, 15, 710),
(711, 15, 711),
(712, 15, 712),
(713, 15, 713),
(714, 15, 714),
(715, 15, 715),
(716, 15, 716),
(717, 15, 717),
(718, 15, 718),
(719, 15, 719),
(720, 15, 720),
(721, 15, 721),
(722, 15, 722),
(723, 15, 723),
(724, 15, 724),
(725, 15, 725),
(726, 15, 726),
(727, 15, 727),
(728, 15, 728),
(729, 15, 729),
(730, 15, 730),
(731, 15, 731),
(732, 15, 732),
(733, 15, 733),
(734, 15, 734),
(735, 15, 735),
(736, 15, 736),
(737, 15, 737),
(738, 15, 738),
(739, 15, 739),
(740, 15, 740),
(741, 15, 741),
(742, 15, 742),
(743, 15, 743),
(744, 15, 744),
(745, 15, 745),
(746, 15, 746),
(747, 15, 747),
(748, 15, 748),
(749, 15, 749),
(750, 15, 750),
(751, 15, 751),
(752, 15, 752),
(753, 15, 753),
(754, 15, 754),
(755, 15, 755),
(756, 15, 756),
(757, 15, 757),
(758, 15, 758),
(759, 15, 759),
(760, 15, 760),
(761, 15, 761),
(762, 15, 762),
(763, 15, 763),
(764, 15, 764),
(765, 15, 765),
(766, 15, 766),
(767, 15, 767),
(768, 15, 768),
(769, 15, 769),
(770, 15, 770),
(771, 15, 771),
(772, 15, 772),
(773, 15, 773),
(774, 15, 774),
(775, 15, 775),
(776, 15, 776),
(777, 15, 777),
(778, 15, 778),
(779, 15, 779),
(780, 15, 780),
(781, 15, 781),
(782, 16, 782),
(783, 16, 783),
(784, 16, 784),
(785, 16, 785),
(786, 16, 786),
(787, 16, 787),
(788, 16, 788),
(789, 16, 789),
(790, 16, 790),
(791, 16, 791),
(792, 16, 792),
(793, 16, 793),
(794, 16, 794),
(795, 16, 795),
(796, 16, 796),
(797, 16, 797),
(798, 16, 798),
(799, 16, 799),
(800, 16, 800),
(801, 16, 801),
(802, 16, 802),
(803, 16, 803),
(804, 16, 804),
(805, 16, 805),
(806, 16, 806),
(807, 16, 807),
(808, 16, 808),
(809, 16, 809),
(810, 16, 810),
(811, 16, 811),
(812, 16, 812),
(813, 16, 813),
(814, 16, 814),
(815, 16, 815),
(816, 16, 816),
(817, 16, 817),
(818, 16, 818),
(819, 16, 819),
(820, 16, 820),
(821, 16, 821),
(822, 16, 822),
(823, 16, 823),
(824, 16, 824),
(825, 16, 825),
(826, 16, 826),
(827, 16, 827),
(828, 16, 828),
(829, 16, 829),
(830, 16, 830),
(831, 16, 831),
(832, 16, 832),
(833, 16, 833),
(834, 16, 834),
(835, 16, 835),
(836, 16, 836),
(837, 16, 837),
(838, 16, 838),
(839, 16, 839),
(840, 16, 840),
(841, 16, 841),
(842, 16, 842),
(843, 16, 843),
(844, 16, 844),
(845, 16, 845),
(846, 16, 846),
(847, 16, 847),
(848, 16, 848),
(849, 16, 849),
(850, 16, 850),
(851, 16, 851),
(852, 16, 852),
(853, 16, 853),
(854, 16, 854),
(855, 16, 855),
(856, 16, 856),
(857, 16, 857),
(858, 16, 858),
(859, 16, 859),
(860, 16, 860),
(861, 16, 861),
(862, 16, 862),
(863, 16, 863),
(864, 16, 864),
(865, 16, 865),
(866, 16, 866),
(867, 16, 867),
(868, 16, 868),
(869, 16, 869),
(870, 16, 870),
(871, 16, 871),
(872, 16, 872),
(873, 16, 873),
(874, 16, 874),
(875, 16, 875),
(876, 16, 876),
(877, 16, 877),
(878, 16, 878),
(879, 16, 879),
(880, 16, 880),
(881, 16, 881),
(882, 16, 882),
(883, 16, 883),
(884, 16, 884),
(885, 16, 885),
(886, 16, 886),
(887, 16, 887),
(888, 16, 888),
(889, 16, 889),
(890, 16, 890),
(891, 16, 891),
(892, 16, 892),
(893, 16, 893),
(894, 16, 894),
(895, 17, 895),
(896, 17, 896),
(897, 17, 897),
(898, 17, 898),
(899, 17, 899),
(900, 17, 900),
(901, 17, 901),
(902, 17, 902),
(903, 17, 903),
(904, 17, 904),
(905, 17, 905),
(906, 17, 906),
(907, 17, 907),
(908, 17, 908),
(909, 17, 909),
(910, 17, 910),
(911, 17, 911),
(912, 17, 912),
(913, 17, 913),
(914, 17, 914),
(915, 17, 915),
(916, 17, 916),
(917, 17, 917),
(918, 17, 918),
(919, 17, 919),
(920, 17, 920),
(921, 17, 921),
(922, 17, 922),
(923, 17, 923),
(924, 17, 924),
(925, 17, 925),
(926, 17, 926),
(927, 17, 927),
(928, 18, 928),
(929, 18, 929),
(930, 18, 930),
(931, 18, 931),
(932, 18, 932),
(933, 18, 933),
(934, 18, 934),
(935, 18, 935),
(936, 18, 936),
(937, 18, 937),
(938, 18, 938),
(939, 18, 939),
(940, 18, 940),
(941, 18, 941),
(942, 18, 942),
(943, 18, 943),
(944, 18, 944),
(945, 18, 945),
(946, 18, 946),
(947, 18, 947),
(948, 19, 948),
(949, 19, 949),
(950, 19, 950),
(951, 19, 951),
(952, 19, 952),
(953, 19, 953),
(954, 19, 954),
(955, 19, 955),
(956, 19, 956),
(957, 19, 957),
(958, 19, 958),
(959, 19, 959),
(960, 19, 960),
(961, 19, 961),
(962, 19, 962),
(963, 19, 963),
(964, 19, 964),
(965, 19, 965),
(966, 19, 966),
(967, 19, 967),
(968, 19, 968),
(969, 19, 969),
(970, 19, 970),
(971, 19, 971),
(972, 19, 972),
(973, 19, 973),
(974, 19, 974),
(975, 19, 975),
(976, 19, 976),
(977, 19, 977),
(978, 19, 978),
(979, 19, 979),
(980, 19, 980),
(981, 19, 981),
(982, 19, 982),
(983, 19, 983),
(984, 19, 984),
(985, 19, 985),
(986, 19, 986),
(987, 19, 987),
(988, 19, 988),
(989, 19, 989),
(990, 19, 990),
(991, 19, 991),
(992, 19, 992),
(993, 19, 993),
(994, 19, 994),
(995, 19, 995),
(996, 19, 996),
(997, 19, 997),
(998, 19, 998),
(999, 20, 999),
(1000, 20, 1000),
(1001, 20, 1001),
(1002, 20, 1002),
(1003, 20, 1003),
(1004, 20, 1004),
(1005, 20, 1005),
(1006, 20, 1006),
(1007, 20, 1007),
(1008, 20, 1008),
(1009, 20, 1009),
(1010, 20, 1010),
(1011, 20, 1011),
(1012, 20, 1012),
(1013, 20, 1013),
(1014, 20, 1014),
(1015, 20, 1015),
(1016, 20, 1016),
(1017, 20, 1017),
(1018, 20, 1018),
(1019, 20, 1019),
(1020, 20, 1020),
(1021, 20, 1021),
(1022, 20, 1022),
(1023, 20, 1023),
(1024, 20, 1024),
(1025, 20, 1025),
(1026, 20, 1026),
(1027, 20, 1027),
(1028, 20, 1028),
(1029, 20, 1029),
(1030, 20, 1030),
(1031, 20, 1031),
(1032, 20, 1032),
(1033, 20, 1033),
(1034, 20, 1034),
(1035, 20, 1035),
(1036, 20, 1036),
(1037, 20, 1037),
(1038, 20, 1038),
(1039, 20, 1039),
(1040, 20, 1040),
(1041, 20, 1041),
(1042, 20, 1042),
(1043, 20, 1043),
(1044, 20, 1044),
(1045, 20, 1045),
(1046, 20, 1046),
(1047, 20, 1047),
(1048, 20, 1048),
(1049, 20, 1049),
(1050, 20, 1050),
(1051, 20, 1051),
(1052, 20, 1052),
(1053, 20, 1053),
(1054, 20, 1054),
(1055, 20, 1055),
(1056, 20, 1056),
(1057, 20, 1057),
(1058, 20, 1058),
(1059, 20, 1059),
(1060, 20, 1060),
(1061, 20, 1061),
(1062, 20, 1062),
(1063, 20, 1063),
(1064, 20, 1064),
(1065, 20, 1065),
(1066, 20, 1066),
(1067, 20, 1067),
(1068, 20, 1068),
(1069, 20, 1069),
(1070, 20, 1070),
(1071, 20, 1071),
(1072, 20, 1072),
(1073, 20, 1073),
(1074, 20, 1074),
(1075, 20, 1075),
(1076, 20, 1076),
(1077, 20, 1077),
(1078, 20, 1078),
(1079, 20, 1079),
(1080, 20, 1080),
(1081, 20, 1081),
(1082, 20, 1082),
(1083, 20, 1083),
(1084, 20, 1084),
(1085, 20, 1085),
(1086, 20, 1086),
(1087, 20, 1087),
(1088, 20, 1088),
(1089, 20, 1089),
(1090, 20, 1090),
(1091, 20, 1091),
(1092, 20, 1092),
(1093, 20, 1093),
(1094, 20, 1094),
(1095, 20, 1095),
(1096, 20, 1096),
(1097, 20, 1097),
(1098, 20, 1098),
(1099, 20, 1099),
(1100, 20, 1100),
(1101, 20, 1101),
(1102, 20, 1102),
(1103, 20, 1103),
(1104, 20, 1104),
(1105, 20, 1105),
(1106, 20, 1106),
(1107, 20, 1107),
(1108, 20, 1108),
(1109, 20, 1109),
(1110, 20, 1110),
(1111, 20, 1111),
(1112, 20, 1112),
(1113, 20, 1113),
(1114, 20, 1114),
(1115, 20, 1115),
(1116, 20, 1116),
(1117, 20, 1117),
(1118, 20, 1118),
(1119, 20, 1119),
(1120, 20, 1120),
(1121, 20, 1121),
(1122, 20, 1122),
(1123, 20, 1123),
(1124, 20, 1124),
(1125, 20, 1125),
(1126, 20, 1126),
(1127, 20, 1127),
(1128, 20, 1128),
(1129, 20, 1129),
(1130, 20, 1130),
(1131, 20, 1131),
(1132, 20, 1132),
(1133, 20, 1133),
(1134, 20, 1134),
(1135, 20, 1135),
(1136, 20, 1136),
(1137, 20, 1137),
(1138, 20, 1138),
(1139, 20, 1139),
(1140, 20, 1140),
(1141, 20, 1141),
(1142, 20, 1142),
(1143, 20, 1143),
(1144, 20, 1144),
(1145, 20, 1145),
(1146, 20, 1146),
(1147, 20, 1147),
(1148, 20, 1148),
(1149, 20, 1149),
(1150, 20, 1150),
(1151, 20, 1151),
(1152, 20, 1152),
(1153, 20, 1153),
(1154, 20, 1154),
(1155, 20, 1155),
(1156, 20, 1156),
(1157, 20, 1157),
(1158, 20, 1158),
(1159, 20, 1159),
(1160, 20, 1160),
(1161, 20, 1161),
(1162, 20, 1162),
(1163, 20, 1163),
(1164, 20, 1164),
(1165, 20, 1165),
(1166, 20, 1166),
(1167, 20, 1167),
(1168, 20, 1168),
(1169, 20, 1169),
(1170, 20, 1170),
(1171, 20, 1171),
(1172, 20, 1172),
(1173, 20, 1173),
(1174, 20, 1174),
(1175, 20, 1175),
(1176, 20, 1176),
(1177, 20, 1177),
(1178, 20, 1178),
(1179, 20, 1179),
(1180, 20, 1180),
(1181, 20, 1181),
(1182, 20, 1182),
(1183, 20, 1183),
(1184, 20, 1184),
(1185, 20, 1185),
(1186, 20, 1186),
(1187, 20, 1187),
(1188, 20, 1188),
(1189, 20, 1189),
(1190, 20, 1190),
(1191, 20, 1191),
(1192, 20, 1192),
(1193, 20, 1193),
(1194, 20, 1194),
(1195, 20, 1195),
(1196, 20, 1196),
(1197, 20, 1197),
(1198, 20, 1198),
(1199, 20, 1199),
(1200, 20, 1200),
(1201, 20, 1201),
(1202, 20, 1202),
(1203, 20, 1203),
(1204, 20, 1204),
(1205, 20, 1205),
(1206, 20, 1206),
(1207, 20, 1207),
(1208, 20, 1208),
(1209, 20, 1209),
(1210, 20, 1210),
(1211, 20, 1211),
(1212, 20, 1212),
(1213, 20, 1213),
(1214, 20, 1214),
(1215, 20, 1215),
(1216, 20, 1216),
(1217, 20, 1217),
(1218, 20, 1218),
(1219, 20, 1219),
(1220, 20, 1220),
(1221, 20, 1221),
(1222, 20, 1222),
(1223, 20, 1223),
(1224, 20, 1224),
(1225, 20, 1225),
(1226, 20, 1226),
(1227, 20, 1227),
(1228, 20, 1228),
(1229, 20, 1229),
(1230, 20, 1230),
(1231, 20, 1231),
(1232, 20, 1232),
(1233, 20, 1233),
(1234, 20, 1234),
(1235, 20, 1235),
(1236, 20, 1236),
(1237, 20, 1237),
(1238, 20, 1238),
(1239, 20, 1239),
(1240, 20, 1240),
(1241, 20, 1241),
(1242, 20, 1242),
(1243, 20, 1243),
(1244, 20, 1244),
(1245, 20, 1245),
(1246, 20, 1246),
(1247, 20, 1247),
(1248, 20, 1248),
(1249, 20, 1249),
(1250, 20, 1250),
(1251, 20, 1251),
(1252, 20, 1252),
(1253, 20, 1253),
(1254, 20, 1254),
(1255, 20, 1255),
(1256, 20, 1256),
(1257, 20, 1257),
(1258, 20, 1258),
(1259, 20, 1259),
(1260, 20, 1260),
(1261, 20, 1261),
(1262, 20, 1262),
(1263, 20, 1263),
(1264, 20, 1264),
(1265, 20, 1265),
(1266, 20, 1266),
(1267, 20, 1267),
(1268, 20, 1268),
(1269, 20, 1269),
(1270, 20, 1270),
(1271, 20, 1271),
(1272, 20, 1272),
(1273, 20, 1273),
(1274, 20, 1274),
(1275, 20, 1275),
(1276, 20, 1276),
(1277, 20, 1277),
(1278, 20, 1278),
(1279, 20, 1279),
(1280, 20, 1280),
(1281, 20, 1281),
(1282, 20, 1282),
(1283, 20, 1283),
(1284, 20, 1284),
(1285, 20, 1285),
(1286, 20, 1286),
(1287, 20, 1287),
(1288, 20, 1288),
(1289, 20, 1289),
(1290, 20, 1290),
(1291, 20, 1291),
(1292, 20, 1292),
(1293, 20, 1293),
(1294, 20, 1294),
(1295, 20, 1295),
(1296, 20, 1296),
(1297, 20, 1297),
(1298, 20, 1298),
(1299, 20, 1299),
(1300, 20, 1300),
(1301, 20, 1301),
(1302, 20, 1302),
(1303, 20, 1303),
(1304, 20, 1304),
(1305, 20, 1305),
(1306, 20, 1306),
(1307, 20, 1307),
(1308, 20, 1308),
(1309, 20, 1309),
(1310, 20, 1310),
(1311, 20, 1311),
(1312, 20, 1312),
(1313, 20, 1313),
(1314, 20, 1314),
(1315, 20, 1315),
(1316, 20, 1316),
(1317, 20, 1317),
(1318, 20, 1318),
(1319, 20, 1319),
(1320, 20, 1320),
(1321, 20, 1321),
(1322, 20, 1322),
(1323, 20, 1323),
(1324, 20, 1324),
(1325, 20, 1325),
(1326, 20, 1326),
(1327, 20, 1327),
(1328, 20, 1328),
(1329, 20, 1329),
(1330, 20, 1330),
(1331, 20, 1331),
(1332, 20, 1332),
(1333, 20, 1333),
(1334, 20, 1334),
(1335, 20, 1335),
(1336, 20, 1336),
(1337, 20, 1337),
(1338, 20, 1338),
(1339, 20, 1339),
(1340, 20, 1340),
(1341, 20, 1341),
(1342, 20, 1342),
(1343, 20, 1343),
(1344, 20, 1344),
(1345, 20, 1345),
(1346, 20, 1346),
(1347, 20, 1347),
(1348, 20, 1348),
(1349, 20, 1349),
(1350, 20, 1350),
(1351, 20, 1351),
(1352, 20, 1352),
(1353, 20, 1353),
(1354, 20, 1354),
(1355, 20, 1355),
(1356, 20, 1356),
(1357, 20, 1357),
(1358, 20, 1358),
(1359, 20, 1359),
(1360, 20, 1360),
(1361, 20, 1361),
(1362, 20, 1362),
(1363, 20, 1363),
(1364, 20, 1364),
(1365, 20, 1365),
(1366, 20, 1366),
(1367, 20, 1367),
(1368, 20, 1368),
(1369, 20, 1369),
(1370, 20, 1370),
(1371, 20, 1371),
(1372, 20, 1372),
(1373, 20, 1373),
(1374, 20, 1374),
(1375, 20, 1375),
(1376, 20, 1376),
(1377, 20, 1377),
(1378, 20, 1378),
(1379, 20, 1379),
(1380, 20, 1380),
(1381, 20, 1381),
(1382, 20, 1382),
(1383, 20, 1383),
(1384, 20, 1384),
(1385, 20, 1385),
(1386, 20, 1386),
(1387, 20, 1387),
(1388, 20, 1388),
(1389, 20, 1389),
(1390, 20, 1390),
(1391, 20, 1391),
(1392, 20, 1392),
(1393, 20, 1393),
(1394, 20, 1394),
(1395, 20, 1395),
(1396, 20, 1396),
(1397, 20, 1397),
(1398, 20, 1398),
(1399, 20, 1399),
(1400, 20, 1400),
(1401, 20, 1401),
(1402, 20, 1402),
(1403, 20, 1403),
(1404, 20, 1404),
(1405, 20, 1405),
(1406, 20, 1406),
(1407, 20, 1407),
(1408, 20, 1408),
(1409, 20, 1409),
(1410, 20, 1410),
(1411, 20, 1411),
(1412, 20, 1412),
(1413, 20, 1413),
(1414, 20, 1414),
(1415, 20, 1415),
(1416, 20, 1416),
(1417, 20, 1417),
(1418, 20, 1418),
(1419, 20, 1419),
(1420, 20, 1420),
(1421, 20, 1421),
(1422, 20, 1422),
(1423, 20, 1423),
(1424, 20, 1424),
(1425, 20, 1425),
(1426, 20, 1426),
(1427, 20, 1427),
(1428, 20, 1428),
(1429, 20, 1429),
(1430, 20, 1430),
(1431, 20, 1431),
(1432, 20, 1432),
(1433, 20, 1433),
(1434, 20, 1434),
(1435, 20, 1435),
(1436, 20, 1436),
(1437, 20, 1437),
(1438, 20, 1438),
(1439, 20, 1439),
(1440, 20, 1440),
(1441, 20, 1441),
(1442, 20, 1442),
(1443, 20, 1443),
(1444, 20, 1444),
(1445, 20, 1445),
(1446, 20, 1446),
(1447, 20, 1447),
(1448, 20, 1448),
(1449, 20, 1449),
(1450, 20, 1450),
(1451, 20, 1451),
(1452, 20, 1452),
(1453, 20, 1453),
(1454, 20, 1454),
(1455, 20, 1455),
(1456, 20, 1456),
(1457, 20, 1457),
(1458, 20, 1458),
(1459, 20, 1459),
(1460, 20, 1460),
(1461, 20, 1461),
(1462, 20, 1462),
(1463, 20, 1463),
(1464, 20, 1464),
(1465, 20, 1465),
(1466, 20, 1466),
(1467, 20, 1467),
(1468, 20, 1468),
(1469, 20, 1469),
(1470, 20, 1470),
(1471, 20, 1471),
(1472, 20, 1472),
(1473, 20, 1473),
(1474, 20, 1474),
(1475, 20, 1475),
(1476, 20, 1476),
(1477, 20, 1477),
(1478, 20, 1478),
(1479, 20, 1479),
(1480, 20, 1480),
(1481, 20, 1481),
(1482, 20, 1482),
(1483, 20, 1483),
(1484, 20, 1484),
(1485, 20, 1485),
(1486, 20, 1486),
(1487, 20, 1487),
(1488, 20, 1488),
(1489, 20, 1489),
(1490, 20, 1490),
(1491, 20, 1491),
(1492, 20, 1492),
(1493, 20, 1493),
(1494, 20, 1494),
(1495, 20, 1495),
(1496, 20, 1496),
(1497, 20, 1497),
(1498, 20, 1498),
(1499, 20, 1499),
(1500, 20, 1500),
(1501, 20, 1501),
(1502, 20, 1502),
(1503, 20, 1503),
(1504, 20, 1504),
(1505, 20, 1505),
(1506, 20, 1506),
(1507, 20, 1507),
(1508, 20, 1508),
(1509, 20, 1509),
(1510, 20, 1510),
(1511, 20, 1511),
(1512, 20, 1512),
(1513, 20, 1513),
(1514, 20, 1514),
(1515, 20, 1515),
(1516, 20, 1516),
(1517, 20, 1517),
(1518, 20, 1518),
(1519, 20, 1519),
(1520, 20, 1520),
(1521, 20, 1521),
(1522, 20, 1522),
(1523, 20, 1523),
(1524, 20, 1524),
(1525, 20, 1525),
(1526, 20, 1526),
(1527, 20, 1527),
(1528, 20, 1528),
(1529, 20, 1529),
(1530, 20, 1530),
(1531, 20, 1531),
(1532, 20, 1532),
(1533, 20, 1533),
(1534, 20, 1534),
(1535, 20, 1535),
(1536, 20, 1536),
(1537, 20, 1537),
(1538, 20, 1538),
(1539, 20, 1539),
(1540, 20, 1540),
(1541, 20, 1541),
(1542, 20, 1542),
(1543, 20, 1543),
(1544, 20, 1544),
(1545, 20, 1545),
(1546, 20, 1546),
(1547, 20, 1547),
(1548, 20, 1548),
(1549, 20, 1549),
(1550, 20, 1550),
(1551, 20, 1551),
(1552, 20, 1552),
(1553, 20, 1553),
(1554, 20, 1554),
(1555, 20, 1555),
(1556, 20, 1556),
(1557, 20, 1557),
(1558, 20, 1558),
(1559, 20, 1559),
(1560, 20, 1560),
(1561, 20, 1561),
(1562, 20, 1562),
(1563, 20, 1563),
(1564, 20, 1564),
(1565, 20, 1565),
(1566, 20, 1566),
(1567, 20, 1567),
(1568, 20, 1568),
(1569, 21, 1569),
(1570, 21, 1570),
(1571, 21, 1571),
(1572, 21, 1572),
(1573, 21, 1573),
(1574, 21, 1574),
(1575, 21, 1575),
(1576, 21, 1576),
(1577, 21, 1577),
(1578, 21, 1578),
(1579, 21, 1579),
(1580, 21, 1580),
(1581, 21, 1581),
(1582, 21, 1582),
(1583, 21, 1583),
(1584, 21, 1584),
(1585, 21, 1585),
(1586, 21, 1586),
(1587, 21, 1587),
(1588, 21, 1588),
(1589, 21, 1589),
(1590, 21, 1590),
(1591, 21, 1591),
(1592, 21, 1592),
(1593, 21, 1593),
(1594, 21, 1594),
(1595, 21, 1595),
(1596, 21, 1596),
(1597, 21, 1597),
(1598, 21, 1598),
(1599, 21, 1599),
(1600, 21, 1600),
(1601, 21, 1601),
(1602, 21, 1602),
(1603, 21, 1603),
(1604, 21, 1604),
(1605, 21, 1605),
(1606, 21, 1606),
(1607, 21, 1607),
(1608, 21, 1608),
(1609, 21, 1609),
(1610, 21, 1610),
(1611, 21, 1611),
(1612, 21, 1612),
(1613, 21, 1613),
(1614, 21, 1614),
(1615, 21, 1615),
(1616, 21, 1616),
(1617, 21, 1617),
(1618, 21, 1618),
(1619, 21, 1619),
(1620, 21, 1620),
(1621, 21, 1621),
(1622, 21, 1622),
(1623, 21, 1623),
(1624, 21, 1624),
(1625, 21, 1625),
(1626, 21, 1626),
(1627, 21, 1627),
(1628, 21, 1628),
(1629, 21, 1629),
(1630, 21, 1630),
(1631, 21, 1631),
(1632, 21, 1632),
(1633, 21, 1633),
(1634, 21, 1634),
(1635, 21, 1635),
(1636, 21, 1636),
(1637, 21, 1637),
(1638, 21, 1638),
(1639, 21, 1639),
(1640, 21, 1640),
(1641, 21, 1641),
(1642, 21, 1642),
(1643, 21, 1643),
(1644, 21, 1644),
(1645, 21, 1645),
(1646, 21, 1646),
(1647, 21, 1647),
(1648, 21, 1648),
(1649, 21, 1649),
(1650, 21, 1650),
(1651, 21, 1651),
(1652, 21, 1652),
(1653, 21, 1653),
(1654, 21, 1654),
(1655, 21, 1655),
(1656, 21, 1656),
(1657, 21, 1657),
(1658, 21, 1658),
(1659, 21, 1659),
(1660, 21, 1660),
(1661, 21, 1661),
(1662, 21, 1662),
(1663, 21, 1663),
(1664, 21, 1664),
(1665, 21, 1665),
(1666, 21, 1666),
(1667, 21, 1667),
(1668, 21, 1668),
(1669, 21, 1669),
(1670, 21, 1670),
(1671, 21, 1671),
(1672, 21, 1672),
(1673, 21, 1673),
(1674, 21, 1674),
(1675, 21, 1675),
(1676, 21, 1676),
(1677, 21, 1677),
(1678, 21, 1678),
(1679, 21, 1679),
(1680, 21, 1680),
(1681, 21, 1681),
(1682, 21, 1682),
(1683, 21, 1683),
(1684, 21, 1684),
(1685, 21, 1685),
(1686, 21, 1686),
(1687, 21, 1687),
(1688, 21, 1688),
(1689, 21, 1689),
(1690, 21, 1690),
(1691, 21, 1691),
(1692, 21, 1692),
(1693, 21, 1693),
(1694, 21, 1694),
(1695, 21, 1695),
(1696, 21, 1696),
(1697, 21, 1697),
(1698, 21, 1698),
(1699, 21, 1699),
(1700, 21, 1700),
(1701, 21, 1701),
(1702, 21, 1702),
(1703, 21, 1703),
(1704, 21, 1704),
(1705, 21, 1705),
(1706, 21, 1706),
(1707, 21, 1707),
(1708, 21, 1708),
(1709, 21, 1709),
(1710, 21, 1710),
(1711, 21, 1711),
(1712, 21, 1712),
(1713, 21, 1713),
(1714, 21, 1714),
(1715, 21, 1715),
(1716, 21, 1716),
(1717, 21, 1717),
(1718, 21, 1718),
(1719, 21, 1719),
(1720, 21, 1720),
(1721, 21, 1721),
(1722, 21, 1722),
(1723, 21, 1723),
(1724, 21, 1724),
(1725, 21, 1725),
(1726, 21, 1726),
(1727, 21, 1727),
(1728, 21, 1728),
(1729, 21, 1729),
(1730, 21, 1730),
(1731, 21, 1731),
(1732, 21, 1732),
(1733, 21, 1733),
(1734, 21, 1734),
(1735, 21, 1735),
(1736, 21, 1736),
(1737, 21, 1737),
(1738, 21, 1738),
(1739, 21, 1739),
(1740, 21, 1740),
(1741, 21, 1741),
(1742, 21, 1742),
(1743, 21, 1743),
(1744, 21, 1744),
(1745, 21, 1745),
(1746, 21, 1746),
(1747, 21, 1747),
(1748, 21, 1748),
(1749, 21, 1749),
(1750, 21, 1750),
(1751, 21, 1751),
(1752, 21, 1752),
(1753, 21, 1753),
(1754, 21, 1754),
(1755, 21, 1755),
(1756, 21, 1756),
(1757, 21, 1757),
(1758, 21, 1758),
(1759, 21, 1759),
(1760, 21, 1760),
(1761, 21, 1761),
(1762, 21, 1762),
(1763, 21, 1763),
(1764, 21, 1764),
(1765, 21, 1765),
(1766, 21, 1766),
(1767, 21, 1767),
(1768, 21, 1768),
(1769, 21, 1769),
(1770, 21, 1770),
(1771, 21, 1771),
(1772, 21, 1772),
(1773, 21, 1773),
(1774, 21, 1774),
(1775, 21, 1775),
(1776, 21, 1776),
(1777, 21, 1777),
(1778, 21, 1778),
(1779, 21, 1779),
(1780, 21, 1780),
(1781, 21, 1781),
(1782, 21, 1782),
(1783, 21, 1783),
(1784, 21, 1784),
(1785, 21, 1785),
(1786, 22, 1786),
(1787, 22, 1787),
(1788, 22, 1788),
(1789, 22, 1789),
(1790, 22, 1790),
(1791, 22, 1791),
(1792, 22, 1792),
(1793, 22, 1793),
(1794, 22, 1794),
(1795, 22, 1795),
(1796, 22, 1796),
(1797, 22, 1797),
(1798, 22, 1798),
(1799, 22, 1799),
(1800, 22, 1800),
(1801, 22, 1801),
(1802, 22, 1802),
(1803, 22, 1803),
(1804, 23, 1804),
(1805, 23, 1805),
(1806, 23, 1806),
(1807, 23, 1807),
(1808, 23, 1808),
(1809, 23, 1809),
(1810, 23, 1810),
(1811, 23, 1811),
(1812, 23, 1812),
(1813, 23, 1813),
(1814, 24, 1814),
(1815, 24, 1815),
(1816, 24, 1816),
(1817, 24, 1817),
(1818, 24, 1818),
(1819, 24, 1819),
(1820, 24, 1820),
(1821, 24, 1821),
(1822, 24, 1822),
(1823, 24, 1823),
(1824, 24, 1824),
(1825, 24, 1825),
(1826, 24, 1826),
(1827, 24, 1827),
(1828, 24, 1828),
(1829, 24, 1829),
(1830, 24, 1830),
(1831, 24, 1831),
(1832, 24, 1832),
(1833, 24, 1833),
(1834, 24, 1834),
(1835, 24, 1835),
(1836, 24, 1836),
(1837, 24, 1837),
(1838, 24, 1838),
(1839, 24, 1839),
(1840, 24, 1840),
(1841, 24, 1841),
(1842, 24, 1842),
(1843, 24, 1843),
(1844, 24, 1844),
(1845, 24, 1845),
(1846, 24, 1846),
(1847, 24, 1847),
(1848, 24, 1848),
(1849, 24, 1849),
(1850, 24, 1850),
(1851, 24, 1851),
(1852, 24, 1852),
(1853, 24, 1853),
(1854, 24, 1854),
(1855, 24, 1855),
(1856, 24, 1856),
(1857, 24, 1857),
(1858, 24, 1858),
(1859, 24, 1859),
(1860, 24, 1860),
(1861, 24, 1861),
(1862, 24, 1862),
(1863, 24, 1863),
(1864, 24, 1864),
(1865, 24, 1865),
(1866, 24, 1866),
(1867, 24, 1867),
(1868, 24, 1868),
(1869, 24, 1869),
(1870, 24, 1870),
(1871, 24, 1871),
(1872, 25, 1872),
(1873, 25, 1873),
(1874, 25, 1874),
(1875, 25, 1875),
(1876, 25, 1876),
(1877, 25, 1877),
(1878, 25, 1878),
(1879, 25, 1879),
(1880, 25, 1880),
(1881, 25, 1881),
(1882, 25, 1882),
(1883, 25, 1883),
(1884, 25, 1884),
(1885, 25, 1885),
(1886, 25, 1886),
(1887, 25, 1887),
(1888, 25, 1888),
(1889, 25, 1889),
(1890, 26, 1890),
(1891, 26, 1891),
(1892, 26, 1892),
(1893, 26, 1893),
(1894, 26, 1894),
(1895, 26, 1895),
(1896, 26, 1896),
(1897, 26, 1897),
(1898, 26, 1898),
(1899, 26, 1899),
(1900, 26, 1900),
(1901, 26, 1901),
(1902, 26, 1902),
(1903, 26, 1903),
(1904, 26, 1904),
(1905, 26, 1905),
(1906, 26, 1906),
(1907, 26, 1907),
(1908, 26, 1908),
(1909, 26, 1909),
(1910, 26, 1910),
(1911, 26, 1911),
(1912, 26, 1912),
(1913, 26, 1913),
(1914, 26, 1914),
(1915, 26, 1915),
(1916, 26, 1916),
(1917, 26, 1917),
(1918, 26, 1918),
(1919, 26, 1919),
(1920, 26, 1920),
(1921, 26, 1921),
(1922, 26, 1922),
(1923, 26, 1923),
(1924, 26, 1924),
(1925, 26, 1925),
(1926, 26, 1926),
(1927, 26, 1927),
(1928, 26, 1928),
(1929, 26, 1929),
(1930, 26, 1930),
(1931, 26, 1931),
(1932, 26, 1932),
(1933, 26, 1933),
(1934, 26, 1934),
(1935, 26, 1935),
(1936, 26, 1936),
(1937, 26, 1937),
(1938, 26, 1938),
(1939, 26, 1939),
(1940, 26, 1940),
(1941, 26, 1941),
(1942, 26, 1942),
(1943, 26, 1943),
(1944, 26, 1944),
(1945, 26, 1945),
(1946, 26, 1946),
(1947, 26, 1947),
(1948, 26, 1948),
(1949, 26, 1949),
(1950, 26, 1950),
(1951, 26, 1951),
(1952, 26, 1952),
(1953, 26, 1953),
(1954, 26, 1954),
(1955, 26, 1955),
(1956, 26, 1956),
(1957, 26, 1957),
(1958, 26, 1958),
(1959, 26, 1959),
(1960, 26, 1960),
(1961, 26, 1961),
(1962, 27, 1962),
(1963, 27, 1963),
(1964, 27, 1964),
(1965, 27, 1965),
(1966, 27, 1966),
(1967, 27, 1967),
(1968, 27, 1968),
(1969, 27, 1969),
(1970, 27, 1970),
(1971, 27, 1971),
(1972, 27, 1972),
(1973, 27, 1973),
(1974, 27, 1974),
(1975, 27, 1975),
(1976, 27, 1976),
(1977, 27, 1977),
(1978, 27, 1978),
(1979, 28, 1979),
(1980, 28, 1980),
(1981, 28, 1981),
(1982, 28, 1982),
(1983, 28, 1983),
(1984, 28, 1984),
(1985, 28, 1985),
(1986, 28, 1986),
(1987, 28, 1987),
(1988, 28, 1988),
(1989, 28, 1989),
(1990, 28, 1990),
(1991, 28, 1991),
(1992, 28, 1992),
(1993, 28, 1993),
(1994, 28, 1994),
(1995, 28, 1995),
(1996, 28, 1996),
(1997, 28, 1997),
(1998, 28, 1998),
(1999, 28, 1999),
(2000, 28, 2000),
(2001, 28, 2001),
(2002, 28, 2002),
(2003, 28, 2003),
(2004, 28, 2004),
(2005, 28, 2005),
(2006, 28, 2006),
(2007, 28, 2007),
(2008, 28, 2008),
(2009, 28, 2009),
(2010, 28, 2010),
(2011, 28, 2011),
(2012, 28, 2012),
(2013, 28, 2013),
(2014, 28, 2014),
(2015, 28, 2015),
(2016, 28, 2016),
(2017, 28, 2017),
(2018, 28, 2018),
(2019, 28, 2019),
(2020, 28, 2020),
(2021, 28, 2021),
(2022, 29, 2022),
(2023, 29, 2023),
(2024, 29, 2024),
(2025, 29, 2025),
(2026, 29, 2026),
(2027, 29, 2027),
(2028, 29, 2028),
(2029, 29, 2029),
(2030, 29, 2030),
(2031, 29, 2031),
(2032, 29, 2032),
(2033, 29, 2033),
(2034, 29, 2034),
(2035, 29, 2035),
(2036, 29, 2036),
(2037, 29, 2037),
(2038, 29, 2038),
(2039, 29, 2039),
(2040, 29, 2040),
(2041, 29, 2041),
(2042, 29, 2042),
(2043, 29, 2043),
(2044, 29, 2044),
(2045, 29, 2045),
(2046, 29, 2046),
(2047, 29, 2047),
(2048, 29, 2048),
(2049, 29, 2049),
(2050, 29, 2050),
(2051, 29, 2051),
(2052, 29, 2052),
(2053, 29, 2053),
(2054, 29, 2054),
(2055, 29, 2055),
(2056, 29, 2056),
(2057, 29, 2057),
(2058, 29, 2058),
(2059, 29, 2059),
(2060, 29, 2060),
(2061, 29, 2061),
(2062, 29, 2062),
(2063, 29, 2063),
(2064, 29, 2064),
(2065, 29, 2065),
(2066, 29, 2066),
(2067, 29, 2067),
(2068, 29, 2068),
(2069, 29, 2069),
(2070, 29, 2070),
(2071, 29, 2071),
(2072, 29, 2072),
(2073, 29, 2073),
(2074, 29, 2074),
(2075, 29, 2075),
(2076, 29, 2076),
(2077, 29, 2077),
(2078, 29, 2078),
(2079, 29, 2079),
(2080, 29, 2080),
(2081, 29, 2081),
(2082, 30, 2082),
(2083, 30, 2083),
(2084, 30, 2084),
(2085, 30, 2085),
(2086, 30, 2086),
(2087, 30, 2087),
(2088, 30, 2088),
(2089, 30, 2089),
(2090, 30, 2090),
(2091, 30, 2091),
(2092, 30, 2092),
(2093, 30, 2093),
(2094, 30, 2094),
(2095, 30, 2095),
(2096, 30, 2096),
(2097, 30, 2097),
(2098, 30, 2098),
(2099, 30, 2099),
(2100, 30, 2100),
(2101, 30, 2101),
(2102, 30, 2102),
(2103, 30, 2103),
(2104, 30, 2104),
(2105, 30, 2105),
(2106, 30, 2106),
(2107, 30, 2107),
(2108, 30, 2108),
(2109, 30, 2109),
(2110, 30, 2110),
(2111, 30, 2111),
(2112, 30, 2112),
(2113, 30, 2113),
(2114, 30, 2114),
(2115, 30, 2115),
(2116, 30, 2116),
(2117, 30, 2117),
(2118, 30, 2118),
(2119, 30, 2119),
(2120, 30, 2120),
(2121, 30, 2121),
(2122, 30, 2122),
(2123, 30, 2123),
(2124, 30, 2124),
(2125, 30, 2125),
(2126, 30, 2126),
(2127, 30, 2127),
(2128, 30, 2128),
(2129, 30, 2129),
(2130, 30, 2130),
(2131, 30, 2131),
(2132, 30, 2132),
(2133, 30, 2133),
(2134, 30, 2134),
(2135, 30, 2135),
(2136, 30, 2136),
(2137, 30, 2137),
(2138, 30, 2138),
(2139, 30, 2139),
(2140, 30, 2140),
(2141, 30, 2141),
(2142, 30, 2142),
(2143, 30, 2143),
(2144, 30, 2144),
(2145, 30, 2145),
(2146, 30, 2146),
(2147, 30, 2147),
(2148, 30, 2148),
(2149, 30, 2149),
(2150, 30, 2150),
(2151, 30, 2151),
(2152, 30, 2152),
(2153, 30, 2153),
(2154, 30, 2154),
(2155, 30, 2155),
(2156, 30, 2156),
(2157, 30, 2157),
(2158, 30, 2158),
(2159, 30, 2159),
(2160, 30, 2160),
(2161, 30, 2161),
(2162, 30, 2162),
(2163, 30, 2163),
(2164, 30, 2164),
(2165, 30, 2165),
(2166, 30, 2166),
(2167, 30, 2167),
(2168, 30, 2168),
(2169, 30, 2169),
(2170, 30, 2170),
(2171, 30, 2171),
(2172, 30, 2172),
(2173, 30, 2173),
(2174, 30, 2174),
(2175, 30, 2175),
(2176, 30, 2176),
(2177, 30, 2177),
(2178, 30, 2178),
(2179, 30, 2179),
(2180, 30, 2180),
(2181, 30, 2181),
(2182, 30, 2182),
(2183, 30, 2183),
(2184, 30, 2184),
(2185, 30, 2185),
(2186, 30, 2186),
(2187, 30, 2187),
(2188, 30, 2188),
(2189, 30, 2189),
(2190, 30, 2190),
(2191, 30, 2191),
(2192, 30, 2192),
(2193, 30, 2193),
(2194, 30, 2194),
(2195, 30, 2195),
(2196, 30, 2196),
(2197, 30, 2197),
(2198, 30, 2198),
(2199, 30, 2199),
(2200, 30, 2200),
(2201, 30, 2201),
(2202, 30, 2202),
(2203, 30, 2203),
(2204, 30, 2204),
(2205, 30, 2205),
(2206, 30, 2206),
(2207, 30, 2207),
(2208, 30, 2208),
(2209, 30, 2209),
(2210, 30, 2210),
(2211, 30, 2211),
(2212, 30, 2212),
(2213, 30, 2213),
(2214, 30, 2214),
(2215, 30, 2215),
(2216, 30, 2216),
(2217, 30, 2217),
(2218, 30, 2218),
(2219, 30, 2219),
(2220, 30, 2220),
(2221, 30, 2221),
(2222, 30, 2222),
(2223, 30, 2223),
(2224, 30, 2224),
(2225, 30, 2225),
(2226, 30, 2226),
(2227, 30, 2227),
(2228, 30, 2228),
(2229, 30, 2229),
(2230, 30, 2230),
(2231, 30, 2231),
(2232, 30, 2232),
(2233, 30, 2233),
(2234, 30, 2234),
(2235, 30, 2235),
(2236, 30, 2236),
(2237, 30, 2237),
(2238, 30, 2238),
(2239, 30, 2239),
(2240, 30, 2240),
(2241, 30, 2241),
(2242, 30, 2242),
(2243, 30, 2243),
(2244, 30, 2244),
(2245, 30, 2245),
(2246, 30, 2246),
(2247, 30, 2247),
(2248, 30, 2248),
(2249, 30, 2249),
(2250, 30, 2250),
(2251, 30, 2251),
(2252, 30, 2252),
(2253, 30, 2253),
(2254, 30, 2254),
(2255, 30, 2255),
(2256, 30, 2256),
(2257, 30, 2257),
(2258, 30, 2258),
(2259, 30, 2259),
(2260, 30, 2260),
(2261, 30, 2261),
(2262, 30, 2262),
(2263, 30, 2263),
(2264, 30, 2264),
(2265, 30, 2265),
(2266, 30, 2266),
(2267, 30, 2267),
(2268, 30, 2268),
(2269, 30, 2269),
(2270, 30, 2270),
(2271, 30, 2271),
(2272, 30, 2272),
(2273, 30, 2273),
(2274, 30, 2274),
(2275, 30, 2275),
(2276, 30, 2276),
(2277, 30, 2277),
(2278, 30, 2278),
(2279, 30, 2279),
(2280, 30, 2280),
(2281, 30, 2281),
(2282, 30, 2282),
(2283, 30, 2283),
(2284, 30, 2284),
(2285, 30, 2285),
(2286, 30, 2286),
(2287, 30, 2287),
(2288, 30, 2288),
(2289, 30, 2289),
(2290, 30, 2290),
(2291, 30, 2291),
(2292, 30, 2292),
(2293, 30, 2293),
(2294, 31, 2294),
(2295, 31, 2295),
(2296, 31, 2296),
(2297, 31, 2297),
(2298, 31, 2298),
(2299, 31, 2299),
(2300, 31, 2300),
(2301, 31, 2301),
(2302, 31, 2302),
(2303, 31, 2303),
(2304, 31, 2304),
(2305, 31, 2305),
(2306, 31, 2306),
(2307, 31, 2307),
(2308, 31, 2308),
(2309, 31, 2309),
(2310, 31, 2310),
(2311, 31, 2311),
(2312, 31, 2312),
(2313, 31, 2313),
(2314, 31, 2314),
(2315, 31, 2315),
(2316, 31, 2316),
(2317, 31, 2317),
(2318, 31, 2318),
(2319, 31, 2319),
(2320, 31, 2320),
(2321, 31, 2321),
(2322, 31, 2322),
(2323, 31, 2323),
(2324, 31, 2324),
(2325, 31, 2325),
(2326, 31, 2326),
(2327, 31, 2327),
(2328, 31, 2328),
(2329, 31, 2329),
(2330, 31, 2330),
(2331, 31, 2331),
(2332, 31, 2332),
(2333, 31, 2333),
(2334, 31, 2334),
(2335, 31, 2335),
(2336, 31, 2336),
(2337, 31, 2337),
(2338, 31, 2338),
(2339, 31, 2339),
(2340, 31, 2340),
(2341, 31, 2341),
(2342, 31, 2342),
(2343, 31, 2343),
(2344, 31, 2344),
(2345, 31, 2345),
(2346, 31, 2346),
(2347, 31, 2347),
(2348, 31, 2348),
(2349, 31, 2349),
(2350, 31, 2350),
(2351, 31, 2351),
(2352, 31, 2352),
(2353, 31, 2353),
(2354, 31, 2354),
(2355, 31, 2355),
(2356, 31, 2356),
(2357, 31, 2357),
(2358, 31, 2358),
(2359, 31, 2359),
(2360, 31, 2360),
(2361, 31, 2361),
(2362, 31, 2362),
(2363, 31, 2363),
(2364, 31, 2364),
(2365, 31, 2365),
(2366, 31, 2366),
(2367, 31, 2367),
(2368, 31, 2368),
(2369, 31, 2369),
(2370, 31, 2370),
(2371, 31, 2371),
(2372, 31, 2372),
(2373, 31, 2373),
(2374, 31, 2374),
(2375, 31, 2375),
(2376, 31, 2376),
(2377, 31, 2377),
(2378, 31, 2378),
(2379, 31, 2379),
(2380, 31, 2380),
(2381, 31, 2381),
(2382, 31, 2382),
(2383, 31, 2383),
(2384, 31, 2384),
(2385, 31, 2385),
(2386, 31, 2386),
(2387, 31, 2387),
(2388, 31, 2388),
(2389, 31, 2389),
(2390, 31, 2390),
(2391, 31, 2391),
(2392, 31, 2392),
(2393, 31, 2393),
(2394, 31, 2394),
(2395, 31, 2395),
(2396, 31, 2396),
(2397, 31, 2397),
(2398, 31, 2398),
(2399, 31, 2399),
(2400, 32, 2400),
(2401, 32, 2401),
(2402, 32, 2402),
(2403, 32, 2403),
(2404, 32, 2404),
(2405, 32, 2405),
(2406, 32, 2406),
(2407, 32, 2407),
(2408, 32, 2408),
(2409, 32, 2409),
(2410, 32, 2410),
(2411, 32, 2411),
(2412, 32, 2412),
(2413, 32, 2413),
(2414, 32, 2414),
(2415, 32, 2415),
(2416, 32, 2416),
(2417, 32, 2417),
(2418, 32, 2418),
(2419, 32, 2419),
(2420, 32, 2420),
(2421, 32, 2421),
(2422, 32, 2422),
(2423, 32, 2423),
(2424, 32, 2424),
(2425, 32, 2425),
(2426, 32, 2426),
(2427, 32, 2427),
(2428, 32, 2428),
(2429, 32, 2429),
(2430, 32, 2430),
(2431, 32, 2431),
(2432, 32, 2432),
(2433, 32, 2433),
(2434, 32, 2434),
(2435, 32, 2435),
(2436, 32, 2436),
(2437, 32, 2437),
(2438, 32, 2438),
(2439, 32, 2439),
(2440, 32, 2440),
(2441, 32, 2441),
(2442, 32, 2442),
(2443, 32, 2443),
(2444, 32, 2444),
(2445, 32, 2445),
(2446, 32, 2446),
(2447, 32, 2447),
(2448, 32, 2448),
(2449, 32, 2449),
(2450, 32, 2450),
(2451, 32, 2451),
(2452, 32, 2452),
(2453, 32, 2453),
(2454, 32, 2454),
(2455, 32, 2455),
(2456, 32, 2456),
(2457, 32, 2457);

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

--
-- Volcado de datos para la tabla `faqs`
--

INSERT INTO `faqs` (`id`, `pregunta`, `respuesta`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'primera', '<p>ddsssssssssssssss dsssssss</p>', 666, '2023-11-08 22:59:14', '2023-11-08 22:59:14'),
(2, '¿Otra pregunta?', '<p>sddddddddddddddddsads</p>\r\n<p>&nbsp;</p>\r\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 15.2332%;\">dsd</td>\r\n<td style=\"width: 15.2332%;\">&nbsp;</td>\r\n<td style=\"width: 15.2332%;\">jujh</td>\r\n<td style=\"width: 15.2332%;\">&nbsp;</td>\r\n<td style=\"width: 15.2332%;\">kj</td>\r\n<td style=\"width: 15.2332%;\">kj</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 15.2332%;\">j</td>\r\n<td style=\"width: 15.2332%;\">j</td>\r\n<td style=\"width: 15.2332%;\">k</td>\r\n<td style=\"width: 15.2332%;\">jk</td>\r\n<td style=\"width: 15.2332%;\">j</td>\r\n<td style=\"width: 15.2332%;\">jk</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 15.2332%;\">j</td>\r\n<td style=\"width: 15.2332%;\">kj</td>\r\n<td style=\"width: 15.2332%;\">k</td>\r\n<td style=\"width: 15.2332%;\">j</td>\r\n<td style=\"width: 15.2332%;\">kj</td>\r\n<td style=\"width: 15.2332%;\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 15.2332%;\">&nbsp;</td>\r\n<td style=\"width: 15.2332%;\">&nbsp;</td>\r\n<td style=\"width: 15.2332%;\">&nbsp;</td>\r\n<td style=\"width: 15.2332%;\">&nbsp;</td>\r\n<td style=\"width: 15.2332%;\">&nbsp;</td>\r\n<td style=\"width: 15.2332%;\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 15.2332%;\">&nbsp;</td>\r\n<td style=\"width: 15.2332%;\">&nbsp;</td>\r\n<td style=\"width: 15.2332%;\">&nbsp;</td>\r\n<td style=\"width: 15.2332%;\">&nbsp;</td>\r\n<td style=\"width: 15.2332%;\">&nbsp;</td>\r\n<td style=\"width: 15.2332%;\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 666, '2024-02-02 22:53:54', '2024-02-02 22:53:54');

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
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `id` int(11) NOT NULL,
  `municipio_id` int(11) NOT NULL COMMENT 'Relación: municipios -> id',
  `clave` varchar(4) NOT NULL COMMENT 'CVE_LOC – Clave de la localidad',
  `nombre` varchar(100) NOT NULL COMMENT 'NOM_LOC – Nombre de la localidad',
  `latitud` varchar(15) NOT NULL COMMENT 'LATITUD – Latitud (en DMS)',
  `longitud` varchar(15) NOT NULL COMMENT 'LONGITUD – Longitud (en DMS)',
  `altitud` varchar(15) NOT NULL COMMENT 'ALTITUD – Altitud',
  `carta` varchar(10) NOT NULL COMMENT 'CVE_CARTA',
  `ambito` varchar(1) NOT NULL COMMENT 'AMBITO',
  `poblacion` int(11) NOT NULL COMMENT 'PTOT – Población Total',
  `masculino` int(11) NOT NULL COMMENT 'PMAS – Población Masculina',
  `femenino` int(11) NOT NULL COMMENT 'PFEM – Población Femenina',
  `viviendas` int(11) NOT NULL COMMENT 'VTOT – Número total de viviendas',
  `lat` decimal(10,7) NOT NULL COMMENT 'Latitud en decimal',
  `lng` decimal(10,7) NOT NULL COMMENT 'Longitud en decimal',
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Localidades de la República Mexicana';

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
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL COMMENT 'Relación: estados -> id',
  `clave` varchar(3) NOT NULL COMMENT 'CVE_MUN – Clave del municipio',
  `nombre` varchar(100) NOT NULL COMMENT 'NOM_MUN – Nombre del municipio',
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Municipios de la República Mexicana';

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `estado_id`, `clave`, `nombre`, `activo`) VALUES
(1, 1, '001', 'Aguascalientes', 1),
(2, 1, '002', 'Asientos', 1),
(3, 1, '003', 'Calvillo', 1),
(4, 1, '004', 'Cosío', 1),
(5, 1, '005', 'Jesús María', 1),
(6, 1, '006', 'Pabellón de Arteaga', 1),
(7, 1, '007', 'Rincón de Romos', 1),
(8, 1, '008', 'San José de Gracia', 1),
(9, 1, '009', 'Tepezalá', 1),
(10, 1, '010', 'El Llano', 1),
(11, 1, '011', 'San Francisco de los Romo', 1),
(12, 2, '001', 'Ensenada', 1),
(13, 2, '002', 'Mexicali', 1),
(14, 2, '003', 'Tecate', 1),
(15, 2, '004', 'Tijuana', 1),
(16, 2, '005', 'Playas de Rosarito', 1),
(17, 3, '001', 'Comondú', 1),
(18, 3, '002', 'Mulegé', 1),
(19, 3, '003', 'La Paz', 1),
(20, 3, '008', 'Los Cabos', 1),
(21, 3, '009', 'Loreto', 1),
(22, 4, '001', 'Calkiní', 1),
(23, 4, '002', 'Campeche', 1),
(24, 4, '003', 'Carmen', 1),
(25, 4, '004', 'Champotón', 1),
(26, 4, '005', 'Hecelchakán', 1),
(27, 4, '006', 'Hopelchén', 1),
(28, 4, '007', 'Palizada', 1),
(29, 4, '008', 'Tenabo', 1),
(30, 4, '009', 'Escárcega', 1),
(31, 4, '010', 'Calakmul', 1),
(32, 4, '011', 'Candelaria', 1),
(33, 5, '001', 'Abasolo', 1),
(34, 5, '002', 'Acuña', 1),
(35, 5, '003', 'Allende', 1),
(36, 5, '004', 'Arteaga', 1),
(37, 5, '005', 'Candela', 1),
(38, 5, '006', 'Castaños', 1),
(39, 5, '007', 'Cuatro Ciénegas', 1),
(40, 5, '008', 'Escobedo', 1),
(41, 5, '009', 'Francisco I. Madero', 1),
(42, 5, '010', 'Frontera', 1),
(43, 5, '011', 'General Cepeda', 1),
(44, 5, '012', 'Guerrero', 1),
(45, 5, '013', 'Hidalgo', 1),
(46, 5, '014', 'Jiménez', 1),
(47, 5, '015', 'Juárez', 1),
(48, 5, '016', 'Lamadrid', 1),
(49, 5, '017', 'Matamoros', 1),
(50, 5, '018', 'Monclova', 1),
(51, 5, '019', 'Morelos', 1),
(52, 5, '020', 'Múzquiz', 1),
(53, 5, '021', 'Nadadores', 1),
(54, 5, '022', 'Nava', 1),
(55, 5, '023', 'Ocampo', 1),
(56, 5, '024', 'Parras', 1),
(57, 5, '025', 'Piedras Negras', 1),
(58, 5, '026', 'Progreso', 1),
(59, 5, '027', 'Ramos Arizpe', 1),
(60, 5, '028', 'Sabinas', 1),
(61, 5, '029', 'Sacramento', 1),
(62, 5, '030', 'Saltillo', 1),
(63, 5, '031', 'San Buenaventura', 1),
(64, 5, '032', 'San Juan de Sabinas', 1),
(65, 5, '033', 'San Pedro', 1),
(66, 5, '034', 'Sierra Mojada', 1),
(67, 5, '035', 'Torreón', 1),
(68, 5, '036', 'Viesca', 1),
(69, 5, '037', 'Villa Unión', 1),
(70, 5, '038', 'Zaragoza', 1),
(71, 6, '001', 'Armería', 1),
(72, 6, '002', 'Colima', 1),
(73, 6, '003', 'Comala', 1),
(74, 6, '004', 'Coquimatlán', 1),
(75, 6, '005', 'Cuauhtémoc', 1),
(76, 6, '006', 'Ixtlahuacán', 1),
(77, 6, '007', 'Manzanillo', 1),
(78, 6, '008', 'Minatitlán', 1),
(79, 6, '009', 'Tecomán', 1),
(80, 6, '010', 'Villa de Álvarez', 1),
(81, 7, '001', 'Acacoyagua', 1),
(82, 7, '002', 'Acala', 1),
(83, 7, '003', 'Acapetahua', 1),
(84, 7, '004', 'Altamirano', 1),
(85, 7, '005', 'Amatán', 1),
(86, 7, '006', 'Amatenango de la Frontera', 1),
(87, 7, '007', 'Amatenango del Valle', 1),
(88, 7, '008', 'Angel Albino Corzo', 1),
(89, 7, '009', 'Arriaga', 1),
(90, 7, '010', 'Bejucal de Ocampo', 1),
(91, 7, '011', 'Bella Vista', 1),
(92, 7, '012', 'Berriozábal', 1),
(93, 7, '013', 'Bochil', 1),
(94, 7, '014', 'El Bosque', 1),
(95, 7, '015', 'Cacahoatán', 1),
(96, 7, '016', 'Catazajá', 1),
(97, 7, '017', 'Cintalapa', 1),
(98, 7, '018', 'Coapilla', 1),
(99, 7, '019', 'Comitán de Domínguez', 1),
(100, 7, '020', 'La Concordia', 1),
(101, 7, '021', 'Copainalá', 1),
(102, 7, '022', 'Chalchihuitán', 1),
(103, 7, '023', 'Chamula', 1),
(104, 7, '024', 'Chanal', 1),
(105, 7, '025', 'Chapultenango', 1),
(106, 7, '026', 'Chenalhó', 1),
(107, 7, '027', 'Chiapa de Corzo', 1),
(108, 7, '028', 'Chiapilla', 1),
(109, 7, '029', 'Chicoasén', 1),
(110, 7, '030', 'Chicomuselo', 1),
(111, 7, '031', 'Chilón', 1),
(112, 7, '032', 'Escuintla', 1),
(113, 7, '033', 'Francisco León', 1),
(114, 7, '034', 'Frontera Comalapa', 1),
(115, 7, '035', 'Frontera Hidalgo', 1),
(116, 7, '036', 'La Grandeza', 1),
(117, 7, '037', 'Huehuetán', 1),
(118, 7, '038', 'Huixtán', 1),
(119, 7, '039', 'Huitiupán', 1),
(120, 7, '040', 'Huixtla', 1),
(121, 7, '041', 'La Independencia', 1),
(122, 7, '042', 'Ixhuatán', 1),
(123, 7, '043', 'Ixtacomitán', 1),
(124, 7, '044', 'Ixtapa', 1),
(125, 7, '045', 'Ixtapangajoya', 1),
(126, 7, '046', 'Jiquipilas', 1),
(127, 7, '047', 'Jitotol', 1),
(128, 7, '048', 'Juárez', 1),
(129, 7, '049', 'Larráinzar', 1),
(130, 7, '050', 'La Libertad', 1),
(131, 7, '051', 'Mapastepec', 1),
(132, 7, '052', 'Las Margaritas', 1),
(133, 7, '053', 'Mazapa de Madero', 1),
(134, 7, '054', 'Mazatán', 1),
(135, 7, '055', 'Metapa', 1),
(136, 7, '056', 'Mitontic', 1),
(137, 7, '057', 'Motozintla', 1),
(138, 7, '058', 'Nicolás Ruíz', 1),
(139, 7, '059', 'Ocosingo', 1),
(140, 7, '060', 'Ocotepec', 1),
(141, 7, '061', 'Ocozocoautla de Espinosa', 1),
(142, 7, '062', 'Ostuacán', 1),
(143, 7, '063', 'Osumacinta', 1),
(144, 7, '064', 'Oxchuc', 1),
(145, 7, '065', 'Palenque', 1),
(146, 7, '066', 'Pantelhó', 1),
(147, 7, '067', 'Pantepec', 1),
(148, 7, '068', 'Pichucalco', 1),
(149, 7, '069', 'Pijijiapan', 1),
(150, 7, '070', 'El Porvenir', 1),
(151, 7, '071', 'Villa Comaltitlán', 1),
(152, 7, '072', 'Pueblo Nuevo Solistahuacán', 1),
(153, 7, '073', 'Rayón', 1),
(154, 7, '074', 'Reforma', 1),
(155, 7, '075', 'Las Rosas', 1),
(156, 7, '076', 'Sabanilla', 1),
(157, 7, '077', 'Salto de Agua', 1),
(158, 7, '078', 'San Cristóbal de las Casas', 1),
(159, 7, '079', 'San Fernando', 1),
(160, 7, '080', 'Siltepec', 1),
(161, 7, '081', 'Simojovel', 1),
(162, 7, '082', 'Sitalá', 1),
(163, 7, '083', 'Socoltenango', 1),
(164, 7, '084', 'Solosuchiapa', 1),
(165, 7, '085', 'Soyaló', 1),
(166, 7, '086', 'Suchiapa', 1),
(167, 7, '087', 'Suchiate', 1),
(168, 7, '088', 'Sunuapa', 1),
(169, 7, '089', 'Tapachula', 1),
(170, 7, '090', 'Tapalapa', 1),
(171, 7, '091', 'Tapilula', 1),
(172, 7, '092', 'Tecpatán', 1),
(173, 7, '093', 'Tenejapa', 1),
(174, 7, '094', 'Teopisca', 1),
(175, 7, '096', 'Tila', 1),
(176, 7, '097', 'Tonalá', 1),
(177, 7, '098', 'Totolapa', 1),
(178, 7, '099', 'La Trinitaria', 1),
(179, 7, '100', 'Tumbalá', 1),
(180, 7, '101', 'Tuxtla Gutiérrez', 1),
(181, 7, '102', 'Tuxtla Chico', 1),
(182, 7, '103', 'Tuzantán', 1),
(183, 7, '104', 'Tzimol', 1),
(184, 7, '105', 'Unión Juárez', 1),
(185, 7, '106', 'Venustiano Carranza', 1),
(186, 7, '107', 'Villa Corzo', 1),
(187, 7, '108', 'Villaflores', 1),
(188, 7, '109', 'Yajalón', 1),
(189, 7, '110', 'San Lucas', 1),
(190, 7, '111', 'Zinacantán', 1),
(191, 7, '112', 'San Juan Cancuc', 1),
(192, 7, '113', 'Aldama', 1),
(193, 7, '114', 'Benemérito de las Américas', 1),
(194, 7, '115', 'Maravilla Tenejapa', 1),
(195, 7, '116', 'Marqués de Comillas', 1),
(196, 7, '117', 'Montecristo de Guerrero', 1),
(197, 7, '118', 'San Andrés Duraznal', 1),
(198, 7, '119', 'Santiago el Pinar', 1),
(199, 7, '120', 'Capitán Luis Ángel Vidal', 1),
(200, 7, '121', 'Rincón Chamula San Pedro', 1),
(201, 7, '122', 'El Parral', 1),
(202, 7, '123', 'Emiliano Zapata', 1),
(203, 7, '124', 'Mezcalapa', 1),
(204, 8, '001', 'Ahumada', 1),
(205, 8, '002', 'Aldama', 1),
(206, 8, '003', 'Allende', 1),
(207, 8, '004', 'Aquiles Serdán', 1),
(208, 8, '005', 'Ascensión', 1),
(209, 8, '006', 'Bachíniva', 1),
(210, 8, '007', 'Balleza', 1),
(211, 8, '008', 'Batopilas de Manuel Gómez Morín', 1),
(212, 8, '009', 'Bocoyna', 1),
(213, 8, '010', 'Buenaventura', 1),
(214, 8, '011', 'Camargo', 1),
(215, 8, '012', 'Carichí', 1),
(216, 8, '013', 'Casas Grandes', 1),
(217, 8, '014', 'Coronado', 1),
(218, 8, '015', 'Coyame del Sotol', 1),
(219, 8, '016', 'La Cruz', 1),
(220, 8, '017', 'Cuauhtémoc', 1),
(221, 8, '018', 'Cusihuiriachi', 1),
(222, 8, '019', 'Chihuahua', 1),
(223, 8, '020', 'Chínipas', 1),
(224, 8, '021', 'Delicias', 1),
(225, 8, '022', 'Dr. Belisario Domínguez', 1),
(226, 8, '023', 'Galeana', 1),
(227, 8, '024', 'Santa Isabel', 1),
(228, 8, '025', 'Gómez Farías', 1),
(229, 8, '026', 'Gran Morelos', 1),
(230, 8, '027', 'Guachochi', 1),
(231, 8, '028', 'Guadalupe', 1),
(232, 8, '029', 'Guadalupe y Calvo', 1),
(233, 8, '030', 'Guazapares', 1),
(234, 8, '031', 'Guerrero', 1),
(235, 8, '032', 'Hidalgo del Parral', 1),
(236, 8, '033', 'Huejotitán', 1),
(237, 8, '034', 'Ignacio Zaragoza', 1),
(238, 8, '035', 'Janos', 1),
(239, 8, '036', 'Jiménez', 1),
(240, 8, '037', 'Juárez', 1),
(241, 8, '038', 'Julimes', 1),
(242, 8, '039', 'López', 1),
(243, 8, '040', 'Madera', 1),
(244, 8, '041', 'Maguarichi', 1),
(245, 8, '042', 'Manuel Benavides', 1),
(246, 8, '043', 'Matachí', 1),
(247, 8, '044', 'Matamoros', 1),
(248, 8, '045', 'Meoqui', 1),
(249, 8, '046', 'Morelos', 1),
(250, 8, '047', 'Moris', 1),
(251, 8, '048', 'Namiquipa', 1),
(252, 8, '049', 'Nonoava', 1),
(253, 8, '050', 'Nuevo Casas Grandes', 1),
(254, 8, '051', 'Ocampo', 1),
(255, 8, '052', 'Ojinaga', 1),
(256, 8, '053', 'Praxedis G. Guerrero', 1),
(257, 8, '054', 'Riva Palacio', 1),
(258, 8, '055', 'Rosales', 1),
(259, 8, '056', 'Rosario', 1),
(260, 8, '057', 'San Francisco de Borja', 1),
(261, 8, '058', 'San Francisco de Conchos', 1),
(262, 8, '059', 'San Francisco del Oro', 1),
(263, 8, '060', 'Santa Bárbara', 1),
(264, 8, '061', 'Satevó', 1),
(265, 8, '062', 'Saucillo', 1),
(266, 8, '063', 'Temósachic', 1),
(267, 8, '064', 'El Tule', 1),
(268, 8, '065', 'Urique', 1),
(269, 8, '066', 'Uruachi', 1),
(270, 8, '067', 'Valle de Zaragoza', 1),
(271, 9, '002', 'Azcapotzalco', 1),
(272, 9, '003', 'Coyoacán', 1),
(273, 9, '004', 'Cuajimalpa de Morelos', 1),
(274, 9, '005', 'Gustavo A. Madero', 1),
(275, 9, '006', 'Iztacalco', 1),
(276, 9, '007', 'Iztapalapa', 1),
(277, 9, '008', 'La Magdalena Contreras', 1),
(278, 9, '009', 'Milpa Alta', 1),
(279, 9, '010', 'Álvaro Obregón', 1),
(280, 9, '011', 'Tláhuac', 1),
(281, 9, '012', 'Tlalpan', 1),
(282, 9, '013', 'Xochimilco', 1),
(283, 9, '014', 'Benito Juárez', 1),
(284, 9, '015', 'Cuauhtémoc', 1),
(285, 9, '016', 'Miguel Hidalgo', 1),
(286, 9, '017', 'Venustiano Carranza', 1),
(287, 10, '001', 'Canatlán', 1),
(288, 10, '002', 'Canelas', 1),
(289, 10, '003', 'Coneto de Comonfort', 1),
(290, 10, '004', 'Cuencamé', 1),
(291, 10, '005', 'Durango', 1),
(292, 10, '006', 'General Simón Bolívar', 1),
(293, 10, '007', 'Gómez Palacio', 1),
(294, 10, '008', 'Guadalupe Victoria', 1),
(295, 10, '009', 'Guanaceví', 1),
(296, 10, '010', 'Hidalgo', 1),
(297, 10, '011', 'Indé', 1),
(298, 10, '012', 'Lerdo', 1),
(299, 10, '013', 'Mapimí', 1),
(300, 10, '014', 'Mezquital', 1),
(301, 10, '015', 'Nazas', 1),
(302, 10, '016', 'Nombre de Dios', 1),
(303, 10, '017', 'Ocampo', 1),
(304, 10, '018', 'El Oro', 1),
(305, 10, '019', 'Otáez', 1),
(306, 10, '020', 'Pánuco de Coronado', 1),
(307, 10, '021', 'Peñón Blanco', 1),
(308, 10, '022', 'Poanas', 1),
(309, 10, '023', 'Pueblo Nuevo', 1),
(310, 10, '024', 'Rodeo', 1),
(311, 10, '025', 'San Bernardo', 1),
(312, 10, '026', 'San Dimas', 1),
(313, 10, '027', 'San Juan de Guadalupe', 1),
(314, 10, '028', 'San Juan del Río', 1),
(315, 10, '029', 'San Luis del Cordero', 1),
(316, 10, '030', 'San Pedro del Gallo', 1),
(317, 10, '031', 'Santa Clara', 1),
(318, 10, '032', 'Santiago Papasquiaro', 1),
(319, 10, '033', 'Súchil', 1),
(320, 10, '034', 'Tamazula', 1),
(321, 10, '035', 'Tepehuanes', 1),
(322, 10, '036', 'Tlahualilo', 1),
(323, 10, '037', 'Topia', 1),
(324, 10, '038', 'Vicente Guerrero', 1),
(325, 10, '039', 'Nuevo Ideal', 1),
(326, 11, '001', 'Abasolo', 1),
(327, 11, '002', 'Acámbaro', 1),
(328, 11, '003', 'San Miguel de Allende', 1),
(329, 11, '004', 'Apaseo el Alto', 1),
(330, 11, '005', 'Apaseo el Grande', 1),
(331, 11, '006', 'Atarjea', 1),
(332, 11, '007', 'Celaya', 1),
(333, 11, '008', 'Manuel Doblado', 1),
(334, 11, '009', 'Comonfort', 1),
(335, 11, '010', 'Coroneo', 1),
(336, 11, '011', 'Cortazar', 1),
(337, 11, '012', 'Cuerámaro', 1),
(338, 11, '013', 'Doctor Mora', 1),
(339, 11, '014', 'Dolores Hidalgo Cuna de la Independencia Nacional', 1),
(340, 11, '015', 'Guanajuato', 1),
(341, 11, '016', 'Huanímaro', 1),
(342, 11, '017', 'Irapuato', 1),
(343, 11, '018', 'Jaral del Progreso', 1),
(344, 11, '019', 'Jerécuaro', 1),
(345, 11, '020', 'León', 1),
(346, 11, '021', 'Moroleón', 1),
(347, 11, '022', 'Ocampo', 1),
(348, 11, '023', 'Pénjamo', 1),
(349, 11, '024', 'Pueblo Nuevo', 1),
(350, 11, '025', 'Purísima del Rincón', 1),
(351, 11, '026', 'Romita', 1),
(352, 11, '027', 'Salamanca', 1),
(353, 11, '028', 'Salvatierra', 1),
(354, 11, '029', 'San Diego de la Unión', 1),
(355, 11, '030', 'San Felipe', 1),
(356, 11, '031', 'San Francisco del Rincón', 1),
(357, 11, '032', 'San José Iturbide', 1),
(358, 11, '033', 'San Luis de la Paz', 1),
(359, 11, '034', 'Santa Catarina', 1),
(360, 11, '035', 'Santa Cruz de Juventino Rosas', 1),
(361, 11, '036', 'Santiago Maravatío', 1),
(362, 11, '037', 'Silao de la Victoria', 1),
(363, 11, '038', 'Tarandacuao', 1),
(364, 11, '039', 'Tarimoro', 1),
(365, 11, '040', 'Tierra Blanca', 1),
(366, 11, '041', 'Uriangato', 1),
(367, 11, '042', 'Valle de Santiago', 1),
(368, 11, '043', 'Victoria', 1),
(369, 11, '044', 'Villagrán', 1),
(370, 11, '045', 'Xichú', 1),
(371, 11, '046', 'Yuriria', 1),
(372, 12, '001', 'Acapulco de Juárez', 1),
(373, 12, '002', 'Ahuacuotzingo', 1),
(374, 12, '003', 'Ajuchitlán del Progreso', 1),
(375, 12, '004', 'Alcozauca de Guerrero', 1),
(376, 12, '005', 'Alpoyeca', 1),
(377, 12, '006', 'Apaxtla', 1),
(378, 12, '007', 'Arcelia', 1),
(379, 12, '008', 'Atenango del Río', 1),
(380, 12, '009', 'Atlamajalcingo del Monte', 1),
(381, 12, '010', 'Atlixtac', 1),
(382, 12, '011', 'Atoyac de Álvarez', 1),
(383, 12, '012', 'Ayutla de los Libres', 1),
(384, 12, '013', 'Azoyú', 1),
(385, 12, '014', 'Benito Juárez', 1),
(386, 12, '015', 'Buenavista de Cuéllar', 1),
(387, 12, '016', 'Coahuayutla de José María Izazaga', 1),
(388, 12, '017', 'Cocula', 1),
(389, 12, '018', 'Copala', 1),
(390, 12, '019', 'Copalillo', 1),
(391, 12, '020', 'Copanatoyac', 1),
(392, 12, '021', 'Coyuca de Benítez', 1),
(393, 12, '022', 'Coyuca de Catalán', 1),
(394, 12, '023', 'Cuajinicuilapa', 1),
(395, 12, '024', 'Cualác', 1),
(396, 12, '025', 'Cuautepec', 1),
(397, 12, '026', 'Cuetzala del Progreso', 1),
(398, 12, '027', 'Cutzamala de Pinzón', 1),
(399, 12, '028', 'Chilapa de Álvarez', 1),
(400, 12, '029', 'Chilpancingo de los Bravo', 1),
(401, 12, '030', 'Florencio Villarreal', 1),
(402, 12, '031', 'General Canuto A. Neri', 1),
(403, 12, '032', 'General Heliodoro Castillo', 1),
(404, 12, '033', 'Huamuxtitlán', 1),
(405, 12, '034', 'Huitzuco de los Figueroa', 1),
(406, 12, '035', 'Iguala de la Independencia', 1),
(407, 12, '036', 'Igualapa', 1),
(408, 12, '037', 'Ixcateopan de Cuauhtémoc', 1),
(409, 12, '038', 'Zihuatanejo de Azueta', 1),
(410, 12, '039', 'Juan R. Escudero', 1),
(411, 12, '040', 'Leonardo Bravo', 1),
(412, 12, '041', 'Malinaltepec', 1),
(413, 12, '042', 'Mártir de Cuilapan', 1),
(414, 12, '043', 'Metlatónoc', 1),
(415, 12, '044', 'Mochitlán', 1),
(416, 12, '045', 'Olinalá', 1),
(417, 12, '046', 'Ometepec', 1),
(418, 12, '047', 'Pedro Ascencio Alquisiras', 1),
(419, 12, '048', 'Petatlán', 1),
(420, 12, '049', 'Pilcaya', 1),
(421, 12, '050', 'Pungarabato', 1),
(422, 12, '051', 'Quechultenango', 1),
(423, 12, '052', 'San Luis Acatlán', 1),
(424, 12, '053', 'San Marcos', 1),
(425, 12, '054', 'San Miguel Totolapan', 1),
(426, 12, '055', 'Taxco de Alarcón', 1),
(427, 12, '056', 'Tecoanapa', 1),
(428, 12, '057', 'Técpan de Galeana', 1),
(429, 12, '058', 'Teloloapan', 1),
(430, 12, '059', 'Tepecoacuilco de Trujano', 1),
(431, 12, '060', 'Tetipac', 1),
(432, 12, '061', 'Tixtla de Guerrero', 1),
(433, 12, '062', 'Tlacoachistlahuaca', 1),
(434, 12, '063', 'Tlacoapa', 1),
(435, 12, '064', 'Tlalchapa', 1),
(436, 12, '065', 'Tlalixtaquilla de Maldonado', 1),
(437, 12, '066', 'Tlapa de Comonfort', 1),
(438, 12, '067', 'Tlapehuala', 1),
(439, 12, '068', 'La Unión de Isidoro Montes de Oca', 1),
(440, 12, '069', 'Xalpatláhuac', 1),
(441, 12, '070', 'Xochihuehuetlán', 1),
(442, 12, '071', 'Xochistlahuaca', 1),
(443, 12, '072', 'Zapotitlán Tablas', 1),
(444, 12, '073', 'Zirándaro', 1),
(445, 12, '074', 'Zitlala', 1),
(446, 12, '075', 'Eduardo Neri', 1),
(447, 12, '076', 'Acatepec', 1),
(448, 12, '077', 'Marquelia', 1),
(449, 12, '078', 'Cochoapa el Grande', 1),
(450, 12, '079', 'José Joaquín de Herrera', 1),
(451, 12, '080', 'Juchitán', 1),
(452, 12, '081', 'Iliatenco', 1),
(453, 13, '001', 'Acatlán', 1),
(454, 13, '002', 'Acaxochitlán', 1),
(455, 13, '003', 'Actopan', 1),
(456, 13, '004', 'Agua Blanca de Iturbide', 1),
(457, 13, '005', 'Ajacuba', 1),
(458, 13, '006', 'Alfajayucan', 1),
(459, 13, '007', 'Almoloya', 1),
(460, 13, '008', 'Apan', 1),
(461, 13, '009', 'El Arenal', 1),
(462, 13, '010', 'Atitalaquia', 1),
(463, 13, '011', 'Atlapexco', 1),
(464, 13, '012', 'Atotonilco el Grande', 1),
(465, 13, '013', 'Atotonilco de Tula', 1),
(466, 13, '014', 'Calnali', 1),
(467, 13, '015', 'Cardonal', 1),
(468, 13, '016', 'Cuautepec de Hinojosa', 1),
(469, 13, '017', 'Chapantongo', 1),
(470, 13, '018', 'Chapulhuacán', 1),
(471, 13, '019', 'Chilcuautla', 1),
(472, 13, '020', 'Eloxochitlán', 1),
(473, 13, '021', 'Emiliano Zapata', 1),
(474, 13, '022', 'Epazoyucan', 1),
(475, 13, '023', 'Francisco I. Madero', 1),
(476, 13, '024', 'Huasca de Ocampo', 1),
(477, 13, '025', 'Huautla', 1),
(478, 13, '026', 'Huazalingo', 1),
(479, 13, '027', 'Huehuetla', 1),
(480, 13, '028', 'Huejutla de Reyes', 1),
(481, 13, '029', 'Huichapan', 1),
(482, 13, '030', 'Ixmiquilpan', 1),
(483, 13, '031', 'Jacala de Ledezma', 1),
(484, 13, '032', 'Jaltocán', 1),
(485, 13, '033', 'Juárez Hidalgo', 1),
(486, 13, '034', 'Lolotla', 1),
(487, 13, '035', 'Metepec', 1),
(488, 13, '036', 'San Agustín Metzquititlán', 1),
(489, 13, '037', 'Metztitlán', 1),
(490, 13, '038', 'Mineral del Chico', 1),
(491, 13, '039', 'Mineral del Monte', 1),
(492, 13, '040', 'La Misión', 1),
(493, 13, '041', 'Mixquiahuala de Juárez', 1),
(494, 13, '042', 'Molango de Escamilla', 1),
(495, 13, '043', 'Nicolás Flores', 1),
(496, 13, '044', 'Nopala de Villagrán', 1),
(497, 13, '045', 'Omitlán de Juárez', 1),
(498, 13, '046', 'San Felipe Orizatlán', 1),
(499, 13, '047', 'Pacula', 1),
(500, 13, '048', 'Pachuca de Soto', 1),
(501, 13, '049', 'Pisaflores', 1),
(502, 13, '050', 'Progreso de Obregón', 1),
(503, 13, '051', 'Mineral de la Reforma', 1),
(504, 13, '052', 'San Agustín Tlaxiaca', 1),
(505, 13, '053', 'San Bartolo Tutotepec', 1),
(506, 13, '054', 'San Salvador', 1),
(507, 13, '055', 'Santiago de Anaya', 1),
(508, 13, '056', 'Santiago Tulantepec de Lugo Guerrero', 1),
(509, 13, '057', 'Singuilucan', 1),
(510, 13, '058', 'Tasquillo', 1),
(511, 13, '059', 'Tecozautla', 1),
(512, 13, '060', 'Tenango de Doria', 1),
(513, 13, '061', 'Tepeapulco', 1),
(514, 13, '062', 'Tepehuacán de Guerrero', 1),
(515, 13, '063', 'Tepeji del Río de Ocampo', 1),
(516, 13, '064', 'Tepetitlán', 1),
(517, 13, '065', 'Tetepango', 1),
(518, 13, '066', 'Villa de Tezontepec', 1),
(519, 13, '067', 'Tezontepec de Aldama', 1),
(520, 13, '068', 'Tianguistengo', 1),
(521, 13, '069', 'Tizayuca', 1),
(522, 13, '070', 'Tlahuelilpan', 1),
(523, 13, '071', 'Tlahuiltepa', 1),
(524, 13, '072', 'Tlanalapa', 1),
(525, 13, '073', 'Tlanchinol', 1),
(526, 13, '074', 'Tlaxcoapan', 1),
(527, 13, '075', 'Tolcayuca', 1),
(528, 13, '076', 'Tula de Allende', 1),
(529, 13, '077', 'Tulancingo de Bravo', 1),
(530, 13, '078', 'Xochiatipan', 1),
(531, 13, '079', 'Xochicoatlán', 1),
(532, 13, '080', 'Yahualica', 1),
(533, 13, '081', 'Zacualtipán de Ángeles', 1),
(534, 13, '082', 'Zapotlán de Juárez', 1),
(535, 13, '083', 'Zempoala', 1),
(536, 13, '084', 'Zimapán', 1),
(537, 14, '001', 'Acatic', 1),
(538, 14, '002', 'Acatlán de Juárez', 1),
(539, 14, '003', 'Ahualulco de Mercado', 1),
(540, 14, '004', 'Amacueca', 1),
(541, 14, '005', 'Amatitán', 1),
(542, 14, '006', 'Ameca', 1),
(543, 14, '007', 'San Juanito de Escobedo', 1),
(544, 14, '008', 'Arandas', 1),
(545, 14, '009', 'El Arenal', 1),
(546, 14, '010', 'Atemajac de Brizuela', 1),
(547, 14, '011', 'Atengo', 1),
(548, 14, '012', 'Atenguillo', 1),
(549, 14, '013', 'Atotonilco el Alto', 1),
(550, 14, '014', 'Atoyac', 1),
(551, 14, '015', 'Autlán de Navarro', 1),
(552, 14, '016', 'Ayotlán', 1),
(553, 14, '017', 'Ayutla', 1),
(554, 14, '018', 'La Barca', 1),
(555, 14, '019', 'Bolaños', 1),
(556, 14, '020', 'Cabo Corrientes', 1),
(557, 14, '021', 'Casimiro Castillo', 1),
(558, 14, '022', 'Cihuatlán', 1),
(559, 14, '023', 'Zapotlán el Grande', 1),
(560, 14, '024', 'Cocula', 1),
(561, 14, '025', 'Colotlán', 1),
(562, 14, '026', 'Concepción de Buenos Aires', 1),
(563, 14, '027', 'Cuautitlán de García Barragán', 1),
(564, 14, '028', 'Cuautla', 1),
(565, 14, '029', 'Cuquío', 1),
(566, 14, '030', 'Chapala', 1),
(567, 14, '031', 'Chimaltitán', 1),
(568, 14, '032', 'Chiquilistlán', 1),
(569, 14, '033', 'Degollado', 1),
(570, 14, '034', 'Ejutla', 1),
(571, 14, '035', 'Encarnación de Díaz', 1),
(572, 14, '036', 'Etzatlán', 1),
(573, 14, '037', 'El Grullo', 1),
(574, 14, '038', 'Guachinango', 1),
(575, 14, '039', 'Guadalajara', 1),
(576, 14, '040', 'Hostotipaquillo', 1),
(577, 14, '041', 'Huejúcar', 1),
(578, 14, '042', 'Huejuquilla el Alto', 1),
(579, 14, '043', 'La Huerta', 1),
(580, 14, '044', 'Ixtlahuacán de los Membrillos', 1),
(581, 14, '045', 'Ixtlahuacán del Río', 1),
(582, 14, '046', 'Jalostotitlán', 1),
(583, 14, '047', 'Jamay', 1),
(584, 14, '048', 'Jesús María', 1),
(585, 14, '049', 'Jilotlán de los Dolores', 1),
(586, 14, '050', 'Jocotepec', 1),
(587, 14, '051', 'Juanacatlán', 1),
(588, 14, '052', 'Juchitlán', 1),
(589, 14, '053', 'Lagos de Moreno', 1),
(590, 14, '054', 'El Limón', 1),
(591, 14, '055', 'Magdalena', 1),
(592, 14, '056', 'Santa María del Oro', 1),
(593, 14, '057', 'La Manzanilla de la Paz', 1),
(594, 14, '058', 'Mascota', 1),
(595, 14, '059', 'Mazamitla', 1),
(596, 14, '060', 'Mexticacán', 1),
(597, 14, '061', 'Mezquitic', 1),
(598, 14, '062', 'Mixtlán', 1),
(599, 14, '063', 'Ocotlán', 1),
(600, 14, '064', 'Ojuelos de Jalisco', 1),
(601, 14, '065', 'Pihuamo', 1),
(602, 14, '066', 'Poncitlán', 1),
(603, 14, '067', 'Puerto Vallarta', 1),
(604, 14, '068', 'Villa Purificación', 1),
(605, 14, '069', 'Quitupan', 1),
(606, 14, '070', 'El Salto', 1),
(607, 14, '071', 'San Cristóbal de la Barranca', 1),
(608, 14, '072', 'San Diego de Alejandría', 1),
(609, 14, '073', 'San Juan de los Lagos', 1),
(610, 14, '074', 'San Julián', 1),
(611, 14, '075', 'San Marcos', 1),
(612, 14, '076', 'San Martín de Bolaños', 1),
(613, 14, '077', 'San Martín Hidalgo', 1),
(614, 14, '078', 'San Miguel el Alto', 1),
(615, 14, '079', 'Gómez Farías', 1),
(616, 14, '080', 'San Sebastián del Oeste', 1),
(617, 14, '081', 'Santa María de los Ángeles', 1),
(618, 14, '082', 'Sayula', 1),
(619, 14, '083', 'Tala', 1),
(620, 14, '084', 'Talpa de Allende', 1),
(621, 14, '085', 'Tamazula de Gordiano', 1),
(622, 14, '086', 'Tapalpa', 1),
(623, 14, '087', 'Tecalitlán', 1),
(624, 14, '088', 'Tecolotlán', 1),
(625, 14, '089', 'Techaluta de Montenegro', 1),
(626, 14, '090', 'Tenamaxtlán', 1),
(627, 14, '091', 'Teocaltiche', 1),
(628, 14, '092', 'Teocuitatlán de Corona', 1),
(629, 14, '093', 'Tepatitlán de Morelos', 1),
(630, 14, '094', 'Tequila', 1),
(631, 14, '095', 'Teuchitlán', 1),
(632, 14, '096', 'Tizapán el Alto', 1),
(633, 14, '097', 'Tlajomulco de Zúñiga', 1),
(634, 14, '098', 'San Pedro Tlaquepaque', 1),
(635, 14, '099', 'Tolimán', 1),
(636, 14, '100', 'Tomatlán', 1),
(637, 14, '101', 'Tonalá', 1),
(638, 14, '102', 'Tonaya', 1),
(639, 14, '103', 'Tonila', 1),
(640, 14, '104', 'Totatiche', 1),
(641, 14, '105', 'Tototlán', 1),
(642, 14, '106', 'Tuxcacuesco', 1),
(643, 14, '107', 'Tuxcueca', 1),
(644, 14, '108', 'Tuxpan', 1),
(645, 14, '109', 'Unión de San Antonio', 1),
(646, 14, '110', 'Unión de Tula', 1),
(647, 14, '111', 'Valle de Guadalupe', 1),
(648, 14, '112', 'Valle de Juárez', 1),
(649, 14, '113', 'San Gabriel', 1),
(650, 14, '114', 'Villa Corona', 1),
(651, 14, '115', 'Villa Guerrero', 1),
(652, 14, '116', 'Villa Hidalgo', 1),
(653, 14, '117', 'Cañadas de Obregón', 1),
(654, 14, '118', 'Yahualica de González Gallo', 1),
(655, 14, '119', 'Zacoalco de Torres', 1),
(656, 14, '120', 'Zapopan', 1),
(657, 14, '121', 'Zapotiltic', 1),
(658, 14, '122', 'Zapotitlán de Vadillo', 1),
(659, 14, '123', 'Zapotlán del Rey', 1),
(660, 14, '124', 'Zapotlanejo', 1),
(661, 14, '125', 'San Ignacio Cerro Gordo', 1),
(662, 15, '001', 'Acambay de Ruíz Castañeda', 1),
(663, 15, '002', 'Acolman', 1),
(664, 15, '003', 'Aculco', 1),
(665, 15, '004', 'Almoloya de Alquisiras', 1),
(666, 15, '005', 'Almoloya de Juárez', 1),
(667, 15, '006', 'Almoloya del Río', 1),
(668, 15, '007', 'Amanalco', 1),
(669, 15, '008', 'Amatepec', 1),
(670, 15, '009', 'Amecameca', 1),
(671, 15, '010', 'Apaxco', 1),
(672, 15, '011', 'Atenco', 1),
(673, 15, '012', 'Atizapán', 1),
(674, 15, '013', 'Atizapán de Zaragoza', 1),
(675, 15, '014', 'Atlacomulco', 1),
(676, 15, '015', 'Atlautla', 1),
(677, 15, '016', 'Axapusco', 1),
(678, 15, '017', 'Ayapango', 1),
(679, 15, '018', 'Calimaya', 1),
(680, 15, '019', 'Capulhuac', 1),
(681, 15, '020', 'Coacalco de Berriozábal', 1),
(682, 15, '021', 'Coatepec Harinas', 1),
(683, 15, '022', 'Cocotitlán', 1),
(684, 15, '023', 'Coyotepec', 1),
(685, 15, '024', 'Cuautitlán', 1),
(686, 15, '025', 'Chalco', 1),
(687, 15, '026', 'Chapa de Mota', 1),
(688, 15, '027', 'Chapultepec', 1),
(689, 15, '028', 'Chiautla', 1),
(690, 15, '029', 'Chicoloapan', 1),
(691, 15, '030', 'Chiconcuac', 1),
(692, 15, '031', 'Chimalhuacán', 1),
(693, 15, '032', 'Donato Guerra', 1),
(694, 15, '033', 'Ecatepec de Morelos', 1),
(695, 15, '034', 'Ecatzingo', 1),
(696, 15, '035', 'Huehuetoca', 1),
(697, 15, '036', 'Hueypoxtla', 1),
(698, 15, '037', 'Huixquilucan', 1),
(699, 15, '038', 'Isidro Fabela', 1),
(700, 15, '039', 'Ixtapaluca', 1),
(701, 15, '040', 'Ixtapan de la Sal', 1),
(702, 15, '041', 'Ixtapan del Oro', 1),
(703, 15, '042', 'Ixtlahuaca', 1),
(704, 15, '043', 'Xalatlaco', 1),
(705, 15, '044', 'Jaltenco', 1),
(706, 15, '045', 'Jilotepec', 1),
(707, 15, '046', 'Jilotzingo', 1),
(708, 15, '047', 'Jiquipilco', 1),
(709, 15, '048', 'Jocotitlán', 1),
(710, 15, '049', 'Joquicingo', 1),
(711, 15, '050', 'Juchitepec', 1),
(712, 15, '051', 'Lerma', 1),
(713, 15, '052', 'Malinalco', 1),
(714, 15, '053', 'Melchor Ocampo', 1),
(715, 15, '054', 'Metepec', 1),
(716, 15, '055', 'Mexicaltzingo', 1),
(717, 15, '056', 'Morelos', 1),
(718, 15, '057', 'Naucalpan de Juárez', 1),
(719, 15, '058', 'Nezahualcóyotl', 1),
(720, 15, '059', 'Nextlalpan', 1),
(721, 15, '060', 'Nicolás Romero', 1),
(722, 15, '061', 'Nopaltepec', 1),
(723, 15, '062', 'Ocoyoacac', 1),
(724, 15, '063', 'Ocuilan', 1),
(725, 15, '064', 'El Oro', 1),
(726, 15, '065', 'Otumba', 1),
(727, 15, '066', 'Otzoloapan', 1),
(728, 15, '067', 'Otzolotepec', 1),
(729, 15, '068', 'Ozumba', 1),
(730, 15, '069', 'Papalotla', 1),
(731, 15, '070', 'La Paz', 1),
(732, 15, '071', 'Polotitlán', 1),
(733, 15, '072', 'Rayón', 1),
(734, 15, '073', 'San Antonio la Isla', 1),
(735, 15, '074', 'San Felipe del Progreso', 1),
(736, 15, '075', 'San Martín de las Pirámides', 1),
(737, 15, '076', 'San Mateo Atenco', 1),
(738, 15, '077', 'San Simón de Guerrero', 1),
(739, 15, '078', 'Santo Tomás', 1),
(740, 15, '079', 'Soyaniquilpan de Juárez', 1),
(741, 15, '080', 'Sultepec', 1),
(742, 15, '081', 'Tecámac', 1),
(743, 15, '082', 'Tejupilco', 1),
(744, 15, '083', 'Temamatla', 1),
(745, 15, '084', 'Temascalapa', 1),
(746, 15, '085', 'Temascalcingo', 1),
(747, 15, '086', 'Temascaltepec', 1),
(748, 15, '087', 'Temoaya', 1),
(749, 15, '088', 'Tenancingo', 1),
(750, 15, '089', 'Tenango del Aire', 1),
(751, 15, '090', 'Tenango del Valle', 1),
(752, 15, '091', 'Teoloyucan', 1),
(753, 15, '092', 'Teotihuacán', 1),
(754, 15, '093', 'Tepetlaoxtoc', 1),
(755, 15, '094', 'Tepetlixpa', 1),
(756, 15, '095', 'Tepotzotlán', 1),
(757, 15, '096', 'Tequixquiac', 1),
(758, 15, '097', 'Texcaltitlán', 1),
(759, 15, '098', 'Texcalyacac', 1),
(760, 15, '099', 'Texcoco', 1),
(761, 15, '100', 'Tezoyuca', 1),
(762, 15, '101', 'Tianguistenco', 1),
(763, 15, '102', 'Timilpan', 1),
(764, 15, '103', 'Tlalmanalco', 1),
(765, 15, '104', 'Tlalnepantla de Baz', 1),
(766, 15, '105', 'Tlatlaya', 1),
(767, 15, '106', 'Toluca', 1),
(768, 15, '107', 'Tonatico', 1),
(769, 15, '108', 'Tultepec', 1),
(770, 15, '109', 'Tultitlán', 1),
(771, 15, '110', 'Valle de Bravo', 1),
(772, 15, '111', 'Villa de Allende', 1),
(773, 15, '112', 'Villa del Carbón', 1),
(774, 15, '113', 'Villa Guerrero', 1),
(775, 15, '114', 'Villa Victoria', 1),
(776, 15, '115', 'Xonacatlán', 1),
(777, 15, '116', 'Zacazonapan', 1),
(778, 15, '117', 'Zacualpan', 1),
(779, 15, '118', 'Zinacantepec', 1),
(780, 15, '119', 'Zumpahuacán', 1),
(781, 15, '120', 'Zumpango', 1),
(782, 15, '121', 'Cuautitlán Izcalli', 1),
(783, 15, '122', 'Valle de Chalco Solidaridad', 1),
(784, 15, '123', 'Luvianos', 1),
(785, 15, '124', 'San José del Rincón', 1),
(786, 15, '125', 'Tonanitla', 1),
(787, 16, '001', 'Acuitzio', 1),
(788, 16, '002', 'Aguililla', 1),
(789, 16, '003', 'Álvaro Obregón', 1),
(790, 16, '004', 'Angamacutiro', 1),
(791, 16, '005', 'Angangueo', 1),
(792, 16, '006', 'Apatzingán', 1),
(793, 16, '007', 'Aporo', 1),
(794, 16, '008', 'Aquila', 1),
(795, 16, '009', 'Ario', 1),
(796, 16, '010', 'Arteaga', 1),
(797, 16, '011', 'Briseñas', 1),
(798, 16, '012', 'Buenavista', 1),
(799, 16, '013', 'Carácuaro', 1),
(800, 16, '014', 'Coahuayana', 1),
(801, 16, '015', 'Coalcomán de Vázquez Pallares', 1),
(802, 16, '016', 'Coeneo', 1),
(803, 16, '017', 'Contepec', 1),
(804, 16, '018', 'Copándaro', 1),
(805, 16, '019', 'Cotija', 1),
(806, 16, '020', 'Cuitzeo', 1),
(807, 16, '021', 'Charapan', 1),
(808, 16, '022', 'Charo', 1),
(809, 16, '023', 'Chavinda', 1),
(810, 16, '024', 'Cherán', 1),
(811, 16, '025', 'Chilchota', 1),
(812, 16, '026', 'Chinicuila', 1),
(813, 16, '027', 'Chucándiro', 1),
(814, 16, '028', 'Churintzio', 1),
(815, 16, '029', 'Churumuco', 1),
(816, 16, '030', 'Ecuandureo', 1),
(817, 16, '031', 'Epitacio Huerta', 1),
(818, 16, '032', 'Erongarícuaro', 1),
(819, 16, '033', 'Gabriel Zamora', 1),
(820, 16, '034', 'Hidalgo', 1),
(821, 16, '035', 'La Huacana', 1),
(822, 16, '036', 'Huandacareo', 1),
(823, 16, '037', 'Huaniqueo', 1),
(824, 16, '038', 'Huetamo', 1),
(825, 16, '039', 'Huiramba', 1),
(826, 16, '040', 'Indaparapeo', 1),
(827, 16, '041', 'Irimbo', 1),
(828, 16, '042', 'Ixtlán', 1),
(829, 16, '043', 'Jacona', 1),
(830, 16, '044', 'Jiménez', 1),
(831, 16, '045', 'Jiquilpan', 1),
(832, 16, '046', 'Juárez', 1),
(833, 16, '047', 'Jungapeo', 1),
(834, 16, '048', 'Lagunillas', 1),
(835, 16, '049', 'Madero', 1),
(836, 16, '050', 'Maravatío', 1),
(837, 16, '051', 'Marcos Castellanos', 1),
(838, 16, '052', 'Lázaro Cárdenas', 1),
(839, 16, '053', 'Morelia', 1),
(840, 16, '054', 'Morelos', 1),
(841, 16, '055', 'Múgica', 1),
(842, 16, '056', 'Nahuatzen', 1),
(843, 16, '057', 'Nocupétaro', 1),
(844, 16, '058', 'Nuevo Parangaricutiro', 1),
(845, 16, '059', 'Nuevo Urecho', 1),
(846, 16, '060', 'Numarán', 1),
(847, 16, '061', 'Ocampo', 1),
(848, 16, '062', 'Pajacuarán', 1),
(849, 16, '063', 'Panindícuaro', 1),
(850, 16, '064', 'Parácuaro', 1),
(851, 16, '065', 'Paracho', 1),
(852, 16, '066', 'Pátzcuaro', 1),
(853, 16, '067', 'Penjamillo', 1),
(854, 16, '068', 'Peribán', 1),
(855, 16, '069', 'La Piedad', 1),
(856, 16, '070', 'Purépero', 1),
(857, 16, '071', 'Puruándiro', 1),
(858, 16, '072', 'Queréndaro', 1),
(859, 16, '073', 'Quiroga', 1),
(860, 16, '074', 'Cojumatlán de Régules', 1),
(861, 16, '075', 'Los Reyes', 1),
(862, 16, '076', 'Sahuayo', 1),
(863, 16, '077', 'San Lucas', 1),
(864, 16, '078', 'Santa Ana Maya', 1),
(865, 16, '079', 'Salvador Escalante', 1),
(866, 16, '080', 'Senguio', 1),
(867, 16, '081', 'Susupuato', 1),
(868, 16, '082', 'Tacámbaro', 1),
(869, 16, '083', 'Tancítaro', 1),
(870, 16, '084', 'Tangamandapio', 1),
(871, 16, '085', 'Tangancícuaro', 1),
(872, 16, '086', 'Tanhuato', 1),
(873, 16, '087', 'Taretan', 1),
(874, 16, '088', 'Tarímbaro', 1),
(875, 16, '089', 'Tepalcatepec', 1),
(876, 16, '090', 'Tingambato', 1),
(877, 16, '091', 'Tingüindín', 1),
(878, 16, '092', 'Tiquicheo de Nicolás Romero', 1),
(879, 16, '093', 'Tlalpujahua', 1),
(880, 16, '094', 'Tlazazalca', 1),
(881, 16, '095', 'Tocumbo', 1),
(882, 16, '096', 'Tumbiscatío', 1),
(883, 16, '097', 'Turicato', 1),
(884, 16, '098', 'Tuxpan', 1),
(885, 16, '099', 'Tuzantla', 1),
(886, 16, '100', 'Tzintzuntzan', 1),
(887, 16, '101', 'Tzitzio', 1),
(888, 16, '102', 'Uruapan', 1),
(889, 16, '103', 'Venustiano Carranza', 1),
(890, 16, '104', 'Villamar', 1),
(891, 16, '105', 'Vista Hermosa', 1),
(892, 16, '106', 'Yurécuaro', 1),
(893, 16, '107', 'Zacapu', 1),
(894, 16, '108', 'Zamora', 1),
(895, 16, '109', 'Zináparo', 1),
(896, 16, '110', 'Zinapécuaro', 1),
(897, 16, '111', 'Ziracuaretiro', 1),
(898, 16, '112', 'Zitácuaro', 1),
(899, 16, '113', 'José Sixto Verduzco', 1),
(900, 17, '001', 'Amacuzac', 1),
(901, 17, '002', 'Atlatlahucan', 1),
(902, 17, '003', 'Axochiapan', 1),
(903, 17, '004', 'Ayala', 1),
(904, 17, '005', 'Coatlán del Río', 1),
(905, 17, '006', 'Cuautla', 1),
(906, 17, '007', 'Cuernavaca', 1),
(907, 17, '008', 'Emiliano Zapata', 1),
(908, 17, '009', 'Huitzilac', 1),
(909, 17, '010', 'Jantetelco', 1),
(910, 17, '011', 'Jiutepec', 1),
(911, 17, '012', 'Jojutla', 1),
(912, 17, '013', 'Jonacatepec de Leandro Valle', 1),
(913, 17, '014', 'Mazatepec', 1),
(914, 17, '015', 'Miacatlán', 1),
(915, 17, '016', 'Ocuituco', 1),
(916, 17, '017', 'Puente de Ixtla', 1),
(917, 17, '018', 'Temixco', 1),
(918, 17, '019', 'Tepalcingo', 1),
(919, 17, '020', 'Tepoztlán', 1),
(920, 17, '021', 'Tetecala', 1),
(921, 17, '022', 'Tetela del Volcán', 1),
(922, 17, '023', 'Tlalnepantla', 1),
(923, 17, '024', 'Tlaltizapán de Zapata', 1),
(924, 17, '025', 'Tlaquiltenango', 1),
(925, 17, '026', 'Tlayacapan', 1),
(926, 17, '027', 'Totolapan', 1),
(927, 17, '028', 'Xochitepec', 1),
(928, 17, '029', 'Yautepec', 1),
(929, 17, '030', 'Yecapixtla', 1),
(930, 17, '031', 'Zacatepec', 1),
(931, 17, '032', 'Zacualpan de Amilpas', 1),
(932, 17, '033', 'Temoac', 1),
(933, 18, '001', 'Acaponeta', 1),
(934, 18, '002', 'Ahuacatlán', 1),
(935, 18, '003', 'Amatlán de Cañas', 1),
(936, 18, '004', 'Compostela', 1),
(937, 18, '005', 'Huajicori', 1),
(938, 18, '006', 'Ixtlán del Río', 1),
(939, 18, '007', 'Jala', 1),
(940, 18, '008', 'Xalisco', 1),
(941, 18, '009', 'Del Nayar', 1),
(942, 18, '010', 'Rosamorada', 1),
(943, 18, '011', 'Ruíz', 1),
(944, 18, '012', 'San Blas', 1),
(945, 18, '013', 'San Pedro Lagunillas', 1),
(946, 18, '014', 'Santa María del Oro', 1),
(947, 18, '015', 'Santiago Ixcuintla', 1),
(948, 18, '016', 'Tecuala', 1),
(949, 18, '017', 'Tepic', 1),
(950, 18, '018', 'Tuxpan', 1),
(951, 18, '019', 'La Yesca', 1),
(952, 18, '020', 'Bahía de Banderas', 1),
(953, 19, '001', 'Abasolo', 1),
(954, 19, '002', 'Agualeguas', 1),
(955, 19, '003', 'Los Aldamas', 1),
(956, 19, '004', 'Allende', 1),
(957, 19, '005', 'Anáhuac', 1),
(958, 19, '006', 'Apodaca', 1),
(959, 19, '007', 'Aramberri', 1),
(960, 19, '008', 'Bustamante', 1),
(961, 19, '009', 'Cadereyta Jiménez', 1),
(962, 19, '010', 'El Carmen', 1),
(963, 19, '011', 'Cerralvo', 1),
(964, 19, '012', 'Ciénega de Flores', 1),
(965, 19, '013', 'China', 1),
(966, 19, '014', 'Doctor Arroyo', 1),
(967, 19, '015', 'Doctor Coss', 1),
(968, 19, '016', 'Doctor González', 1),
(969, 19, '017', 'Galeana', 1),
(970, 19, '018', 'García', 1),
(971, 19, '019', 'San Pedro Garza García', 1),
(972, 19, '020', 'General Bravo', 1),
(973, 19, '021', 'General Escobedo', 1),
(974, 19, '022', 'General Terán', 1),
(975, 19, '023', 'General Treviño', 1),
(976, 19, '024', 'General Zaragoza', 1),
(977, 19, '025', 'General Zuazua', 1),
(978, 19, '026', 'Guadalupe', 1),
(979, 19, '027', 'Los Herreras', 1),
(980, 19, '028', 'Higueras', 1),
(981, 19, '029', 'Hualahuises', 1),
(982, 19, '030', 'Iturbide', 1),
(983, 19, '031', 'Juárez', 1),
(984, 19, '032', 'Lampazos de Naranjo', 1),
(985, 19, '033', 'Linares', 1),
(986, 19, '034', 'Marín', 1),
(987, 19, '035', 'Melchor Ocampo', 1),
(988, 19, '036', 'Mier y Noriega', 1),
(989, 19, '037', 'Mina', 1),
(990, 19, '038', 'Montemorelos', 1),
(991, 19, '039', 'Monterrey', 1),
(992, 19, '040', 'Parás', 1),
(993, 19, '041', 'Pesquería', 1),
(994, 19, '042', 'Los Ramones', 1),
(995, 19, '043', 'Rayones', 1),
(996, 19, '044', 'Sabinas Hidalgo', 1),
(997, 19, '045', 'Salinas Victoria', 1),
(998, 19, '046', 'San Nicolás de los Garza', 1),
(999, 19, '047', 'Hidalgo', 1),
(1000, 19, '048', 'Santa Catarina', 1),
(1001, 19, '049', 'Santiago', 1),
(1002, 19, '050', 'Vallecillo', 1),
(1003, 19, '051', 'Villaldama', 1),
(1004, 20, '001', 'Abejones', 1),
(1005, 20, '002', 'Acatlán de Pérez Figueroa', 1),
(1006, 20, '003', 'Asunción Cacalotepec', 1),
(1007, 20, '004', 'Asunción Cuyotepeji', 1),
(1008, 20, '005', 'Asunción Ixtaltepec', 1),
(1009, 20, '006', 'Asunción Nochixtlán', 1),
(1010, 20, '007', 'Asunción Ocotlán', 1),
(1011, 20, '008', 'Asunción Tlacolulita', 1),
(1012, 20, '009', 'Ayotzintepec', 1),
(1013, 20, '010', 'El Barrio de la Soledad', 1),
(1014, 20, '011', 'Calihualá', 1),
(1015, 20, '012', 'Candelaria Loxicha', 1),
(1016, 20, '013', 'Ciénega de Zimatlán', 1),
(1017, 20, '014', 'Ciudad Ixtepec', 1),
(1018, 20, '015', 'Coatecas Altas', 1),
(1019, 20, '016', 'Coicoyán de las Flores', 1),
(1020, 20, '017', 'La Compañía', 1),
(1021, 20, '018', 'Concepción Buenavista', 1),
(1022, 20, '019', 'Concepción Pápalo', 1),
(1023, 20, '020', 'Constancia del Rosario', 1),
(1024, 20, '021', 'Cosolapa', 1),
(1025, 20, '022', 'Cosoltepec', 1),
(1026, 20, '023', 'Cuilápam de Guerrero', 1),
(1027, 20, '024', 'Cuyamecalco Villa de Zaragoza', 1),
(1028, 20, '025', 'Chahuites', 1),
(1029, 20, '026', 'Chalcatongo de Hidalgo', 1),
(1030, 20, '027', 'Chiquihuitlán de Benito Juárez', 1),
(1031, 20, '028', 'Heroica Ciudad de Ejutla de Crespo', 1),
(1032, 20, '029', 'Eloxochitlán de Flores Magón', 1),
(1033, 20, '030', 'El Espinal', 1),
(1034, 20, '031', 'Tamazulápam del Espíritu Santo', 1),
(1035, 20, '032', 'Fresnillo de Trujano', 1),
(1036, 20, '033', 'Guadalupe Etla', 1),
(1037, 20, '034', 'Guadalupe de Ramírez', 1),
(1038, 20, '035', 'Guelatao de Juárez', 1),
(1039, 20, '036', 'Guevea de Humboldt', 1),
(1040, 20, '037', 'Mesones Hidalgo', 1),
(1041, 20, '038', 'Villa Hidalgo', 1),
(1042, 20, '039', 'Heroica Ciudad de Huajuapan de León', 1),
(1043, 20, '040', 'Huautepec', 1),
(1044, 20, '041', 'Huautla de Jiménez', 1),
(1045, 20, '042', 'Ixtlán de Juárez', 1),
(1046, 20, '043', 'Heroica Ciudad de Juchitán de Zaragoza', 1),
(1047, 20, '044', 'Loma Bonita', 1),
(1048, 20, '045', 'Magdalena Apasco', 1),
(1049, 20, '046', 'Magdalena Jaltepec', 1),
(1050, 20, '047', 'Santa Magdalena Jicotlán', 1),
(1051, 20, '048', 'Magdalena Mixtepec', 1),
(1052, 20, '049', 'Magdalena Ocotlán', 1),
(1053, 20, '050', 'Magdalena Peñasco', 1),
(1054, 20, '051', 'Magdalena Teitipac', 1),
(1055, 20, '052', 'Magdalena Tequisistlán', 1),
(1056, 20, '053', 'Magdalena Tlacotepec', 1),
(1057, 20, '054', 'Magdalena Zahuatlán', 1),
(1058, 20, '055', 'Mariscala de Juárez', 1),
(1059, 20, '056', 'Mártires de Tacubaya', 1),
(1060, 20, '057', 'Matías Romero Avendaño', 1),
(1061, 20, '058', 'Mazatlán Villa de Flores', 1),
(1062, 20, '059', 'Miahuatlán de Porfirio Díaz', 1),
(1063, 20, '060', 'Mixistlán de la Reforma', 1),
(1064, 20, '061', 'Monjas', 1),
(1065, 20, '062', 'Natividad', 1),
(1066, 20, '063', 'Nazareno Etla', 1),
(1067, 20, '064', 'Nejapa de Madero', 1),
(1068, 20, '065', 'Ixpantepec Nieves', 1),
(1069, 20, '066', 'Santiago Niltepec', 1),
(1070, 20, '067', 'Oaxaca de Juárez', 1),
(1071, 20, '068', 'Ocotlán de Morelos', 1),
(1072, 20, '069', 'La Pe', 1),
(1073, 20, '070', 'Pinotepa de Don Luis', 1),
(1074, 20, '071', 'Pluma Hidalgo', 1),
(1075, 20, '072', 'San José del Progreso', 1),
(1076, 20, '073', 'Putla Villa de Guerrero', 1),
(1077, 20, '074', 'Santa Catarina Quioquitani', 1),
(1078, 20, '075', 'Reforma de Pineda', 1),
(1079, 20, '076', 'La Reforma', 1),
(1080, 20, '077', 'Reyes Etla', 1),
(1081, 20, '078', 'Rojas de Cuauhtémoc', 1),
(1082, 20, '079', 'Salina Cruz', 1),
(1083, 20, '080', 'San Agustín Amatengo', 1),
(1084, 20, '081', 'San Agustín Atenango', 1),
(1085, 20, '082', 'San Agustín Chayuco', 1),
(1086, 20, '083', 'San Agustín de las Juntas', 1),
(1087, 20, '084', 'San Agustín Etla', 1),
(1088, 20, '085', 'San Agustín Loxicha', 1),
(1089, 20, '086', 'San Agustín Tlacotepec', 1),
(1090, 20, '087', 'San Agustín Yatareni', 1),
(1091, 20, '088', 'San Andrés Cabecera Nueva', 1),
(1092, 20, '089', 'San Andrés Dinicuiti', 1),
(1093, 20, '090', 'San Andrés Huaxpaltepec', 1),
(1094, 20, '091', 'San Andrés Huayápam', 1),
(1095, 20, '092', 'San Andrés Ixtlahuaca', 1),
(1096, 20, '093', 'San Andrés Lagunas', 1),
(1097, 20, '094', 'San Andrés Nuxiño', 1),
(1098, 20, '095', 'San Andrés Paxtlán', 1),
(1099, 20, '096', 'San Andrés Sinaxtla', 1),
(1100, 20, '097', 'San Andrés Solaga', 1),
(1101, 20, '098', 'San Andrés Teotilálpam', 1),
(1102, 20, '099', 'San Andrés Tepetlapa', 1),
(1103, 20, '100', 'San Andrés Yaá', 1),
(1104, 20, '101', 'San Andrés Zabache', 1),
(1105, 20, '102', 'San Andrés Zautla', 1),
(1106, 20, '103', 'San Antonino Castillo Velasco', 1),
(1107, 20, '104', 'San Antonino el Alto', 1),
(1108, 20, '105', 'San Antonino Monte Verde', 1),
(1109, 20, '106', 'San Antonio Acutla', 1),
(1110, 20, '107', 'San Antonio de la Cal', 1),
(1111, 20, '108', 'San Antonio Huitepec', 1),
(1112, 20, '109', 'San Antonio Nanahuatípam', 1),
(1113, 20, '110', 'San Antonio Sinicahua', 1),
(1114, 20, '111', 'San Antonio Tepetlapa', 1),
(1115, 20, '112', 'San Baltazar Chichicápam', 1),
(1116, 20, '113', 'San Baltazar Loxicha', 1),
(1117, 20, '114', 'San Baltazar Yatzachi el Bajo', 1),
(1118, 20, '115', 'San Bartolo Coyotepec', 1),
(1119, 20, '116', 'San Bartolomé Ayautla', 1),
(1120, 20, '117', 'San Bartolomé Loxicha', 1),
(1121, 20, '118', 'San Bartolomé Quialana', 1),
(1122, 20, '119', 'San Bartolomé Yucuañe', 1),
(1123, 20, '120', 'San Bartolomé Zoogocho', 1),
(1124, 20, '121', 'San Bartolo Soyaltepec', 1),
(1125, 20, '122', 'San Bartolo Yautepec', 1),
(1126, 20, '123', 'San Bernardo Mixtepec', 1),
(1127, 20, '124', 'San Blas Atempa', 1),
(1128, 20, '125', 'San Carlos Yautepec', 1),
(1129, 20, '126', 'San Cristóbal Amatlán', 1),
(1130, 20, '127', 'San Cristóbal Amoltepec', 1),
(1131, 20, '128', 'San Cristóbal Lachirioag', 1),
(1132, 20, '129', 'San Cristóbal Suchixtlahuaca', 1),
(1133, 20, '130', 'San Dionisio del Mar', 1),
(1134, 20, '131', 'San Dionisio Ocotepec', 1),
(1135, 20, '132', 'San Dionisio Ocotlán', 1),
(1136, 20, '133', 'San Esteban Atatlahuca', 1),
(1137, 20, '134', 'San Felipe Jalapa de Díaz', 1),
(1138, 20, '135', 'San Felipe Tejalápam', 1),
(1139, 20, '136', 'San Felipe Usila', 1),
(1140, 20, '137', 'San Francisco Cahuacuá', 1),
(1141, 20, '138', 'San Francisco Cajonos', 1),
(1142, 20, '139', 'San Francisco Chapulapa', 1),
(1143, 20, '140', 'San Francisco Chindúa', 1),
(1144, 20, '141', 'San Francisco del Mar', 1),
(1145, 20, '142', 'San Francisco Huehuetlán', 1),
(1146, 20, '143', 'San Francisco Ixhuatán', 1),
(1147, 20, '144', 'San Francisco Jaltepetongo', 1),
(1148, 20, '145', 'San Francisco Lachigoló', 1),
(1149, 20, '146', 'San Francisco Logueche', 1),
(1150, 20, '147', 'San Francisco Nuxaño', 1),
(1151, 20, '148', 'San Francisco Ozolotepec', 1),
(1152, 20, '149', 'San Francisco Sola', 1),
(1153, 20, '150', 'San Francisco Telixtlahuaca', 1),
(1154, 20, '151', 'San Francisco Teopan', 1),
(1155, 20, '152', 'San Francisco Tlapancingo', 1),
(1156, 20, '153', 'San Gabriel Mixtepec', 1),
(1157, 20, '154', 'San Ildefonso Amatlán', 1),
(1158, 20, '155', 'San Ildefonso Sola', 1),
(1159, 20, '156', 'San Ildefonso Villa Alta', 1),
(1160, 20, '157', 'San Jacinto Amilpas', 1),
(1161, 20, '158', 'San Jacinto Tlacotepec', 1),
(1162, 20, '159', 'San Jerónimo Coatlán', 1),
(1163, 20, '160', 'San Jerónimo Silacayoapilla', 1),
(1164, 20, '161', 'San Jerónimo Sosola', 1),
(1165, 20, '162', 'San Jerónimo Taviche', 1),
(1166, 20, '163', 'San Jerónimo Tecóatl', 1),
(1167, 20, '164', 'San Jorge Nuchita', 1),
(1168, 20, '165', 'San José Ayuquila', 1),
(1169, 20, '166', 'San José Chiltepec', 1),
(1170, 20, '167', 'San José del Peñasco', 1),
(1171, 20, '168', 'San José Estancia Grande', 1),
(1172, 20, '169', 'San José Independencia', 1),
(1173, 20, '170', 'San José Lachiguiri', 1),
(1174, 20, '171', 'San José Tenango', 1),
(1175, 20, '172', 'San Juan Achiutla', 1),
(1176, 20, '173', 'San Juan Atepec', 1),
(1177, 20, '174', 'Ánimas Trujano', 1),
(1178, 20, '175', 'San Juan Bautista Atatlahuca', 1),
(1179, 20, '176', 'San Juan Bautista Coixtlahuaca', 1),
(1180, 20, '177', 'San Juan Bautista Cuicatlán', 1),
(1181, 20, '178', 'San Juan Bautista Guelache', 1),
(1182, 20, '179', 'San Juan Bautista Jayacatlán', 1),
(1183, 20, '180', 'San Juan Bautista Lo de Soto', 1),
(1184, 20, '181', 'San Juan Bautista Suchitepec', 1),
(1185, 20, '182', 'San Juan Bautista Tlacoatzintepec', 1),
(1186, 20, '183', 'San Juan Bautista Tlachichilco', 1),
(1187, 20, '184', 'San Juan Bautista Tuxtepec', 1),
(1188, 20, '185', 'San Juan Cacahuatepec', 1),
(1189, 20, '186', 'San Juan Cieneguilla', 1),
(1190, 20, '187', 'San Juan Coatzóspam', 1),
(1191, 20, '188', 'San Juan Colorado', 1),
(1192, 20, '189', 'San Juan Comaltepec', 1),
(1193, 20, '190', 'San Juan Cotzocón', 1),
(1194, 20, '191', 'San Juan Chicomezúchil', 1),
(1195, 20, '192', 'San Juan Chilateca', 1),
(1196, 20, '193', 'San Juan del Estado', 1),
(1197, 20, '194', 'San Juan del Río', 1),
(1198, 20, '195', 'San Juan Diuxi', 1),
(1199, 20, '196', 'San Juan Evangelista Analco', 1),
(1200, 20, '197', 'San Juan Guelavía', 1),
(1201, 20, '198', 'San Juan Guichicovi', 1),
(1202, 20, '199', 'San Juan Ihualtepec', 1),
(1203, 20, '200', 'San Juan Juquila Mixes', 1),
(1204, 20, '201', 'San Juan Juquila Vijanos', 1),
(1205, 20, '202', 'San Juan Lachao', 1),
(1206, 20, '203', 'San Juan Lachigalla', 1),
(1207, 20, '204', 'San Juan Lajarcia', 1),
(1208, 20, '205', 'San Juan Lalana', 1),
(1209, 20, '206', 'San Juan de los Cués', 1),
(1210, 20, '207', 'San Juan Mazatlán', 1),
(1211, 20, '208', 'San Juan Mixtepec', 1),
(1212, 20, '209', 'San Juan Mixtepec', 1),
(1213, 20, '210', 'San Juan Ñumí', 1),
(1214, 20, '211', 'San Juan Ozolotepec', 1),
(1215, 20, '212', 'San Juan Petlapa', 1),
(1216, 20, '213', 'San Juan Quiahije', 1),
(1217, 20, '214', 'San Juan Quiotepec', 1),
(1218, 20, '215', 'San Juan Sayultepec', 1),
(1219, 20, '216', 'San Juan Tabaá', 1),
(1220, 20, '217', 'San Juan Tamazola', 1),
(1221, 20, '218', 'San Juan Teita', 1),
(1222, 20, '219', 'San Juan Teitipac', 1),
(1223, 20, '220', 'San Juan Tepeuxila', 1),
(1224, 20, '221', 'San Juan Teposcolula', 1),
(1225, 20, '222', 'San Juan Yaeé', 1),
(1226, 20, '223', 'San Juan Yatzona', 1),
(1227, 20, '224', 'San Juan Yucuita', 1),
(1228, 20, '225', 'San Lorenzo', 1),
(1229, 20, '226', 'San Lorenzo Albarradas', 1),
(1230, 20, '227', 'San Lorenzo Cacaotepec', 1),
(1231, 20, '228', 'San Lorenzo Cuaunecuiltitla', 1),
(1232, 20, '229', 'San Lorenzo Texmelúcan', 1),
(1233, 20, '230', 'San Lorenzo Victoria', 1),
(1234, 20, '231', 'San Lucas Camotlán', 1),
(1235, 20, '232', 'San Lucas Ojitlán', 1),
(1236, 20, '233', 'San Lucas Quiaviní', 1),
(1237, 20, '234', 'San Lucas Zoquiápam', 1),
(1238, 20, '235', 'San Luis Amatlán', 1),
(1239, 20, '236', 'San Marcial Ozolotepec', 1),
(1240, 20, '237', 'San Marcos Arteaga', 1),
(1241, 20, '238', 'San Martín de los Cansecos', 1),
(1242, 20, '239', 'San Martín Huamelúlpam', 1),
(1243, 20, '240', 'San Martín Itunyoso', 1),
(1244, 20, '241', 'San Martín Lachilá', 1),
(1245, 20, '242', 'San Martín Peras', 1),
(1246, 20, '243', 'San Martín Tilcajete', 1),
(1247, 20, '244', 'San Martín Toxpalan', 1),
(1248, 20, '245', 'San Martín Zacatepec', 1),
(1249, 20, '246', 'San Mateo Cajonos', 1),
(1250, 20, '247', 'Capulálpam de Méndez', 1),
(1251, 20, '248', 'San Mateo del Mar', 1),
(1252, 20, '249', 'San Mateo Yoloxochitlán', 1),
(1253, 20, '250', 'San Mateo Etlatongo', 1),
(1254, 20, '251', 'San Mateo Nejápam', 1),
(1255, 20, '252', 'San Mateo Peñasco', 1),
(1256, 20, '253', 'San Mateo Piñas', 1),
(1257, 20, '254', 'San Mateo Río Hondo', 1),
(1258, 20, '255', 'San Mateo Sindihui', 1),
(1259, 20, '256', 'San Mateo Tlapiltepec', 1),
(1260, 20, '257', 'San Melchor Betaza', 1),
(1261, 20, '258', 'San Miguel Achiutla', 1),
(1262, 20, '259', 'San Miguel Ahuehuetitlán', 1),
(1263, 20, '260', 'San Miguel Aloápam', 1),
(1264, 20, '261', 'San Miguel Amatitlán', 1),
(1265, 20, '262', 'San Miguel Amatlán', 1),
(1266, 20, '263', 'San Miguel Coatlán', 1),
(1267, 20, '264', 'San Miguel Chicahua', 1),
(1268, 20, '265', 'San Miguel Chimalapa', 1),
(1269, 20, '266', 'San Miguel del Puerto', 1),
(1270, 20, '267', 'San Miguel del Río', 1),
(1271, 20, '268', 'San Miguel Ejutla', 1),
(1272, 20, '269', 'San Miguel el Grande', 1),
(1273, 20, '270', 'San Miguel Huautla', 1),
(1274, 20, '271', 'San Miguel Mixtepec', 1),
(1275, 20, '272', 'San Miguel Panixtlahuaca', 1),
(1276, 20, '273', 'San Miguel Peras', 1),
(1277, 20, '274', 'San Miguel Piedras', 1),
(1278, 20, '275', 'San Miguel Quetzaltepec', 1),
(1279, 20, '276', 'San Miguel Santa Flor', 1),
(1280, 20, '277', 'Villa Sola de Vega', 1),
(1281, 20, '278', 'San Miguel Soyaltepec', 1),
(1282, 20, '279', 'San Miguel Suchixtepec', 1),
(1283, 20, '280', 'Villa Talea de Castro', 1),
(1284, 20, '281', 'San Miguel Tecomatlán', 1),
(1285, 20, '282', 'San Miguel Tenango', 1),
(1286, 20, '283', 'San Miguel Tequixtepec', 1),
(1287, 20, '284', 'San Miguel Tilquiápam', 1),
(1288, 20, '285', 'San Miguel Tlacamama', 1),
(1289, 20, '286', 'San Miguel Tlacotepec', 1),
(1290, 20, '287', 'San Miguel Tulancingo', 1),
(1291, 20, '288', 'San Miguel Yotao', 1),
(1292, 20, '289', 'San Nicolás', 1),
(1293, 20, '290', 'San Nicolás Hidalgo', 1),
(1294, 20, '291', 'San Pablo Coatlán', 1),
(1295, 20, '292', 'San Pablo Cuatro Venados', 1),
(1296, 20, '293', 'San Pablo Etla', 1),
(1297, 20, '294', 'San Pablo Huitzo', 1),
(1298, 20, '295', 'San Pablo Huixtepec', 1),
(1299, 20, '296', 'San Pablo Macuiltianguis', 1),
(1300, 20, '297', 'San Pablo Tijaltepec', 1),
(1301, 20, '298', 'San Pablo Villa de Mitla', 1),
(1302, 20, '299', 'San Pablo Yaganiza', 1),
(1303, 20, '300', 'San Pedro Amuzgos', 1),
(1304, 20, '301', 'San Pedro Apóstol', 1),
(1305, 20, '302', 'San Pedro Atoyac', 1),
(1306, 20, '303', 'San Pedro Cajonos', 1),
(1307, 20, '304', 'San Pedro Coxcaltepec Cántaros', 1),
(1308, 20, '305', 'San Pedro Comitancillo', 1),
(1309, 20, '306', 'San Pedro el Alto', 1),
(1310, 20, '307', 'San Pedro Huamelula', 1),
(1311, 20, '308', 'San Pedro Huilotepec', 1),
(1312, 20, '309', 'San Pedro Ixcatlán', 1),
(1313, 20, '310', 'San Pedro Ixtlahuaca', 1),
(1314, 20, '311', 'San Pedro Jaltepetongo', 1),
(1315, 20, '312', 'San Pedro Jicayán', 1),
(1316, 20, '313', 'San Pedro Jocotipac', 1),
(1317, 20, '314', 'San Pedro Juchatengo', 1),
(1318, 20, '315', 'San Pedro Mártir', 1),
(1319, 20, '316', 'San Pedro Mártir Quiechapa', 1),
(1320, 20, '317', 'San Pedro Mártir Yucuxaco', 1),
(1321, 20, '318', 'San Pedro Mixtepec', 1),
(1322, 20, '319', 'San Pedro Mixtepec', 1),
(1323, 20, '320', 'San Pedro Molinos', 1),
(1324, 20, '321', 'San Pedro Nopala', 1),
(1325, 20, '322', 'San Pedro Ocopetatillo', 1),
(1326, 20, '323', 'San Pedro Ocotepec', 1),
(1327, 20, '324', 'San Pedro Pochutla', 1),
(1328, 20, '325', 'San Pedro Quiatoni', 1),
(1329, 20, '326', 'San Pedro Sochiápam', 1),
(1330, 20, '327', 'San Pedro Tapanatepec', 1),
(1331, 20, '328', 'San Pedro Taviche', 1),
(1332, 20, '329', 'San Pedro Teozacoalco', 1),
(1333, 20, '330', 'San Pedro Teutila', 1),
(1334, 20, '331', 'San Pedro Tidaá', 1),
(1335, 20, '332', 'San Pedro Topiltepec', 1),
(1336, 20, '333', 'San Pedro Totolápam', 1),
(1337, 20, '334', 'Villa de Tututepec', 1),
(1338, 20, '335', 'San Pedro Yaneri', 1),
(1339, 20, '336', 'San Pedro Yólox', 1),
(1340, 20, '337', 'San Pedro y San Pablo Ayutla', 1),
(1341, 20, '338', 'Villa de Etla', 1),
(1342, 20, '339', 'San Pedro y San Pablo Teposcolula', 1),
(1343, 20, '340', 'San Pedro y San Pablo Tequixtepec', 1),
(1344, 20, '341', 'San Pedro Yucunama', 1),
(1345, 20, '342', 'San Raymundo Jalpan', 1),
(1346, 20, '343', 'San Sebastián Abasolo', 1),
(1347, 20, '344', 'San Sebastián Coatlán', 1),
(1348, 20, '345', 'San Sebastián Ixcapa', 1),
(1349, 20, '346', 'San Sebastián Nicananduta', 1),
(1350, 20, '347', 'San Sebastián Río Hondo', 1),
(1351, 20, '348', 'San Sebastián Tecomaxtlahuaca', 1),
(1352, 20, '349', 'San Sebastián Teitipac', 1),
(1353, 20, '350', 'San Sebastián Tutla', 1),
(1354, 20, '351', 'San Simón Almolongas', 1),
(1355, 20, '352', 'San Simón Zahuatlán', 1),
(1356, 20, '353', 'Santa Ana', 1),
(1357, 20, '354', 'Santa Ana Ateixtlahuaca', 1),
(1358, 20, '355', 'Santa Ana Cuauhtémoc', 1),
(1359, 20, '356', 'Santa Ana del Valle', 1);
INSERT INTO `municipios` (`id`, `estado_id`, `clave`, `nombre`, `activo`) VALUES
(1360, 20, '357', 'Santa Ana Tavela', 1),
(1361, 20, '358', 'Santa Ana Tlapacoyan', 1),
(1362, 20, '359', 'Santa Ana Yareni', 1),
(1363, 20, '360', 'Santa Ana Zegache', 1),
(1364, 20, '361', 'Santa Catalina Quierí', 1),
(1365, 20, '362', 'Santa Catarina Cuixtla', 1),
(1366, 20, '363', 'Santa Catarina Ixtepeji', 1),
(1367, 20, '364', 'Santa Catarina Juquila', 1),
(1368, 20, '365', 'Santa Catarina Lachatao', 1),
(1369, 20, '366', 'Santa Catarina Loxicha', 1),
(1370, 20, '367', 'Santa Catarina Mechoacán', 1),
(1371, 20, '368', 'Santa Catarina Minas', 1),
(1372, 20, '369', 'Santa Catarina Quiané', 1),
(1373, 20, '370', 'Santa Catarina Tayata', 1),
(1374, 20, '371', 'Santa Catarina Ticuá', 1),
(1375, 20, '372', 'Santa Catarina Yosonotú', 1),
(1376, 20, '373', 'Santa Catarina Zapoquila', 1),
(1377, 20, '374', 'Santa Cruz Acatepec', 1),
(1378, 20, '375', 'Santa Cruz Amilpas', 1),
(1379, 20, '376', 'Santa Cruz de Bravo', 1),
(1380, 20, '377', 'Santa Cruz Itundujia', 1),
(1381, 20, '378', 'Santa Cruz Mixtepec', 1),
(1382, 20, '379', 'Santa Cruz Nundaco', 1),
(1383, 20, '380', 'Santa Cruz Papalutla', 1),
(1384, 20, '381', 'Santa Cruz Tacache de Mina', 1),
(1385, 20, '382', 'Santa Cruz Tacahua', 1),
(1386, 20, '383', 'Santa Cruz Tayata', 1),
(1387, 20, '384', 'Santa Cruz Xitla', 1),
(1388, 20, '385', 'Santa Cruz Xoxocotlán', 1),
(1389, 20, '386', 'Santa Cruz Zenzontepec', 1),
(1390, 20, '387', 'Santa Gertrudis', 1),
(1391, 20, '388', 'Santa Inés del Monte', 1),
(1392, 20, '389', 'Santa Inés Yatzeche', 1),
(1393, 20, '390', 'Santa Lucía del Camino', 1),
(1394, 20, '391', 'Santa Lucía Miahuatlán', 1),
(1395, 20, '392', 'Santa Lucía Monteverde', 1),
(1396, 20, '393', 'Santa Lucía Ocotlán', 1),
(1397, 20, '394', 'Santa María Alotepec', 1),
(1398, 20, '395', 'Santa María Apazco', 1),
(1399, 20, '396', 'Santa María la Asunción', 1),
(1400, 20, '397', 'Heroica Ciudad de Tlaxiaco', 1),
(1401, 20, '398', 'Ayoquezco de Aldama', 1),
(1402, 20, '399', 'Santa María Atzompa', 1),
(1403, 20, '400', 'Santa María Camotlán', 1),
(1404, 20, '401', 'Santa María Colotepec', 1),
(1405, 20, '402', 'Santa María Cortijo', 1),
(1406, 20, '403', 'Santa María Coyotepec', 1),
(1407, 20, '404', 'Santa María Chachoápam', 1),
(1408, 20, '405', 'Villa de Chilapa de Díaz', 1),
(1409, 20, '406', 'Santa María Chilchotla', 1),
(1410, 20, '407', 'Santa María Chimalapa', 1),
(1411, 20, '408', 'Santa María del Rosario', 1),
(1412, 20, '409', 'Santa María del Tule', 1),
(1413, 20, '410', 'Santa María Ecatepec', 1),
(1414, 20, '411', 'Santa María Guelacé', 1),
(1415, 20, '412', 'Santa María Guienagati', 1),
(1416, 20, '413', 'Santa María Huatulco', 1),
(1417, 20, '414', 'Santa María Huazolotitlán', 1),
(1418, 20, '415', 'Santa María Ipalapa', 1),
(1419, 20, '416', 'Santa María Ixcatlán', 1),
(1420, 20, '417', 'Santa María Jacatepec', 1),
(1421, 20, '418', 'Santa María Jalapa del Marqués', 1),
(1422, 20, '419', 'Santa María Jaltianguis', 1),
(1423, 20, '420', 'Santa María Lachixío', 1),
(1424, 20, '421', 'Santa María Mixtequilla', 1),
(1425, 20, '422', 'Santa María Nativitas', 1),
(1426, 20, '423', 'Santa María Nduayaco', 1),
(1427, 20, '424', 'Santa María Ozolotepec', 1),
(1428, 20, '425', 'Santa María Pápalo', 1),
(1429, 20, '426', 'Santa María Peñoles', 1),
(1430, 20, '427', 'Santa María Petapa', 1),
(1431, 20, '428', 'Santa María Quiegolani', 1),
(1432, 20, '429', 'Santa María Sola', 1),
(1433, 20, '430', 'Santa María Tataltepec', 1),
(1434, 20, '431', 'Santa María Tecomavaca', 1),
(1435, 20, '432', 'Santa María Temaxcalapa', 1),
(1436, 20, '433', 'Santa María Temaxcaltepec', 1),
(1437, 20, '434', 'Santa María Teopoxco', 1),
(1438, 20, '435', 'Santa María Tepantlali', 1),
(1439, 20, '436', 'Santa María Texcatitlán', 1),
(1440, 20, '437', 'Santa María Tlahuitoltepec', 1),
(1441, 20, '438', 'Santa María Tlalixtac', 1),
(1442, 20, '439', 'Santa María Tonameca', 1),
(1443, 20, '440', 'Santa María Totolapilla', 1),
(1444, 20, '441', 'Santa María Xadani', 1),
(1445, 20, '442', 'Santa María Yalina', 1),
(1446, 20, '443', 'Santa María Yavesía', 1),
(1447, 20, '444', 'Santa María Yolotepec', 1),
(1448, 20, '445', 'Santa María Yosoyúa', 1),
(1449, 20, '446', 'Santa María Yucuhiti', 1),
(1450, 20, '447', 'Santa María Zacatepec', 1),
(1451, 20, '448', 'Santa María Zaniza', 1),
(1452, 20, '449', 'Santa María Zoquitlán', 1),
(1453, 20, '450', 'Santiago Amoltepec', 1),
(1454, 20, '451', 'Santiago Apoala', 1),
(1455, 20, '452', 'Santiago Apóstol', 1),
(1456, 20, '453', 'Santiago Astata', 1),
(1457, 20, '454', 'Santiago Atitlán', 1),
(1458, 20, '455', 'Santiago Ayuquililla', 1),
(1459, 20, '456', 'Santiago Cacaloxtepec', 1),
(1460, 20, '457', 'Santiago Camotlán', 1),
(1461, 20, '458', 'Santiago Comaltepec', 1),
(1462, 20, '459', 'Santiago Chazumba', 1),
(1463, 20, '460', 'Santiago Choápam', 1),
(1464, 20, '461', 'Santiago del Río', 1),
(1465, 20, '462', 'Santiago Huajolotitlán', 1),
(1466, 20, '463', 'Santiago Huauclilla', 1),
(1467, 20, '464', 'Santiago Ihuitlán Plumas', 1),
(1468, 20, '465', 'Santiago Ixcuintepec', 1),
(1469, 20, '466', 'Santiago Ixtayutla', 1),
(1470, 20, '467', 'Santiago Jamiltepec', 1),
(1471, 20, '468', 'Santiago Jocotepec', 1),
(1472, 20, '469', 'Santiago Juxtlahuaca', 1),
(1473, 20, '470', 'Santiago Lachiguiri', 1),
(1474, 20, '471', 'Santiago Lalopa', 1),
(1475, 20, '472', 'Santiago Laollaga', 1),
(1476, 20, '473', 'Santiago Laxopa', 1),
(1477, 20, '474', 'Santiago Llano Grande', 1),
(1478, 20, '475', 'Santiago Matatlán', 1),
(1479, 20, '476', 'Santiago Miltepec', 1),
(1480, 20, '477', 'Santiago Minas', 1),
(1481, 20, '478', 'Santiago Nacaltepec', 1),
(1482, 20, '479', 'Santiago Nejapilla', 1),
(1483, 20, '480', 'Santiago Nundiche', 1),
(1484, 20, '481', 'Santiago Nuyoó', 1),
(1485, 20, '482', 'Santiago Pinotepa Nacional', 1),
(1486, 20, '483', 'Santiago Suchilquitongo', 1),
(1487, 20, '484', 'Santiago Tamazola', 1),
(1488, 20, '485', 'Santiago Tapextla', 1),
(1489, 20, '486', 'Villa Tejúpam de la Unión', 1),
(1490, 20, '487', 'Santiago Tenango', 1),
(1491, 20, '488', 'Santiago Tepetlapa', 1),
(1492, 20, '489', 'Santiago Tetepec', 1),
(1493, 20, '490', 'Santiago Texcalcingo', 1),
(1494, 20, '491', 'Santiago Textitlán', 1),
(1495, 20, '492', 'Santiago Tilantongo', 1),
(1496, 20, '493', 'Santiago Tillo', 1),
(1497, 20, '494', 'Santiago Tlazoyaltepec', 1),
(1498, 20, '495', 'Santiago Xanica', 1),
(1499, 20, '496', 'Santiago Xiacuí', 1),
(1500, 20, '497', 'Santiago Yaitepec', 1),
(1501, 20, '498', 'Santiago Yaveo', 1),
(1502, 20, '499', 'Santiago Yolomécatl', 1),
(1503, 20, '500', 'Santiago Yosondúa', 1),
(1504, 20, '501', 'Santiago Yucuyachi', 1),
(1505, 20, '502', 'Santiago Zacatepec', 1),
(1506, 20, '503', 'Santiago Zoochila', 1),
(1507, 20, '504', 'Nuevo Zoquiápam', 1),
(1508, 20, '505', 'Santo Domingo Ingenio', 1),
(1509, 20, '506', 'Santo Domingo Albarradas', 1),
(1510, 20, '507', 'Santo Domingo Armenta', 1),
(1511, 20, '508', 'Santo Domingo Chihuitán', 1),
(1512, 20, '509', 'Santo Domingo de Morelos', 1),
(1513, 20, '510', 'Santo Domingo Ixcatlán', 1),
(1514, 20, '511', 'Santo Domingo Nuxaá', 1),
(1515, 20, '512', 'Santo Domingo Ozolotepec', 1),
(1516, 20, '513', 'Santo Domingo Petapa', 1),
(1517, 20, '514', 'Santo Domingo Roayaga', 1),
(1518, 20, '515', 'Santo Domingo Tehuantepec', 1),
(1519, 20, '516', 'Santo Domingo Teojomulco', 1),
(1520, 20, '517', 'Santo Domingo Tepuxtepec', 1),
(1521, 20, '518', 'Santo Domingo Tlatayápam', 1),
(1522, 20, '519', 'Santo Domingo Tomaltepec', 1),
(1523, 20, '520', 'Santo Domingo Tonalá', 1),
(1524, 20, '521', 'Santo Domingo Tonaltepec', 1),
(1525, 20, '522', 'Santo Domingo Xagacía', 1),
(1526, 20, '523', 'Santo Domingo Yanhuitlán', 1),
(1527, 20, '524', 'Santo Domingo Yodohino', 1),
(1528, 20, '525', 'Santo Domingo Zanatepec', 1),
(1529, 20, '526', 'Santos Reyes Nopala', 1),
(1530, 20, '527', 'Santos Reyes Pápalo', 1),
(1531, 20, '528', 'Santos Reyes Tepejillo', 1),
(1532, 20, '529', 'Santos Reyes Yucuná', 1),
(1533, 20, '530', 'Santo Tomás Jalieza', 1),
(1534, 20, '531', 'Santo Tomás Mazaltepec', 1),
(1535, 20, '532', 'Santo Tomás Ocotepec', 1),
(1536, 20, '533', 'Santo Tomás Tamazulapan', 1),
(1537, 20, '534', 'San Vicente Coatlán', 1),
(1538, 20, '535', 'San Vicente Lachixío', 1),
(1539, 20, '536', 'San Vicente Nuñú', 1),
(1540, 20, '537', 'Silacayoápam', 1),
(1541, 20, '538', 'Sitio de Xitlapehua', 1),
(1542, 20, '539', 'Soledad Etla', 1),
(1543, 20, '540', 'Villa de Tamazulápam del Progreso', 1),
(1544, 20, '541', 'Tanetze de Zaragoza', 1),
(1545, 20, '542', 'Taniche', 1),
(1546, 20, '543', 'Tataltepec de Valdés', 1),
(1547, 20, '544', 'Teococuilco de Marcos Pérez', 1),
(1548, 20, '545', 'Teotitlán de Flores Magón', 1),
(1549, 20, '546', 'Teotitlán del Valle', 1),
(1550, 20, '547', 'Teotongo', 1),
(1551, 20, '548', 'Tepelmeme Villa de Morelos', 1),
(1552, 20, '549', 'Heroica Villa Tezoatlán de Segura y Luna, Cuna de la Independencia de Oaxaca', 1),
(1553, 20, '550', 'San Jerónimo Tlacochahuaya', 1),
(1554, 20, '551', 'Tlacolula de Matamoros', 1),
(1555, 20, '552', 'Tlacotepec Plumas', 1),
(1556, 20, '553', 'Tlalixtac de Cabrera', 1),
(1557, 20, '554', 'Totontepec Villa de Morelos', 1),
(1558, 20, '555', 'Trinidad Zaachila', 1),
(1559, 20, '556', 'La Trinidad Vista Hermosa', 1),
(1560, 20, '557', 'Unión Hidalgo', 1),
(1561, 20, '558', 'Valerio Trujano', 1),
(1562, 20, '559', 'San Juan Bautista Valle Nacional', 1),
(1563, 20, '560', 'Villa Díaz Ordaz', 1),
(1564, 20, '561', 'Yaxe', 1),
(1565, 20, '562', 'Magdalena Yodocono de Porfirio Díaz', 1),
(1566, 20, '563', 'Yogana', 1),
(1567, 20, '564', 'Yutanduchi de Guerrero', 1),
(1568, 20, '565', 'Villa de Zaachila', 1),
(1569, 20, '566', 'San Mateo Yucutindoo', 1),
(1570, 20, '567', 'Zapotitlán Lagunas', 1),
(1571, 20, '568', 'Zapotitlán Palmas', 1),
(1572, 20, '569', 'Santa Inés de Zaragoza', 1),
(1573, 20, '570', 'Zimatlán de Álvarez', 1),
(1574, 21, '001', 'Acajete', 1),
(1575, 21, '002', 'Acateno', 1),
(1576, 21, '003', 'Acatlán', 1),
(1577, 21, '004', 'Acatzingo', 1),
(1578, 21, '005', 'Acteopan', 1),
(1579, 21, '006', 'Ahuacatlán', 1),
(1580, 21, '007', 'Ahuatlán', 1),
(1581, 21, '008', 'Ahuazotepec', 1),
(1582, 21, '009', 'Ahuehuetitla', 1),
(1583, 21, '010', 'Ajalpan', 1),
(1584, 21, '011', 'Albino Zertuche', 1),
(1585, 21, '012', 'Aljojuca', 1),
(1586, 21, '013', 'Altepexi', 1),
(1587, 21, '014', 'Amixtlán', 1),
(1588, 21, '015', 'Amozoc', 1),
(1589, 21, '016', 'Aquixtla', 1),
(1590, 21, '017', 'Atempan', 1),
(1591, 21, '018', 'Atexcal', 1),
(1592, 21, '019', 'Atlixco', 1),
(1593, 21, '020', 'Atoyatempan', 1),
(1594, 21, '021', 'Atzala', 1),
(1595, 21, '022', 'Atzitzihuacán', 1),
(1596, 21, '023', 'Atzitzintla', 1),
(1597, 21, '024', 'Axutla', 1),
(1598, 21, '025', 'Ayotoxco de Guerrero', 1),
(1599, 21, '026', 'Calpan', 1),
(1600, 21, '027', 'Caltepec', 1),
(1601, 21, '028', 'Camocuautla', 1),
(1602, 21, '029', 'Caxhuacan', 1),
(1603, 21, '030', 'Coatepec', 1),
(1604, 21, '031', 'Coatzingo', 1),
(1605, 21, '032', 'Cohetzala', 1),
(1606, 21, '033', 'Cohuecan', 1),
(1607, 21, '034', 'Coronango', 1),
(1608, 21, '035', 'Coxcatlán', 1),
(1609, 21, '036', 'Coyomeapan', 1),
(1610, 21, '037', 'Coyotepec', 1),
(1611, 21, '038', 'Cuapiaxtla de Madero', 1),
(1612, 21, '039', 'Cuautempan', 1),
(1613, 21, '040', 'Cuautinchán', 1),
(1614, 21, '041', 'Cuautlancingo', 1),
(1615, 21, '042', 'Cuayuca de Andrade', 1),
(1616, 21, '043', 'Cuetzalan del Progreso', 1),
(1617, 21, '044', 'Cuyoaco', 1),
(1618, 21, '045', 'Chalchicomula de Sesma', 1),
(1619, 21, '046', 'Chapulco', 1),
(1620, 21, '047', 'Chiautla', 1),
(1621, 21, '048', 'Chiautzingo', 1),
(1622, 21, '049', 'Chiconcuautla', 1),
(1623, 21, '050', 'Chichiquila', 1),
(1624, 21, '051', 'Chietla', 1),
(1625, 21, '052', 'Chigmecatitlán', 1),
(1626, 21, '053', 'Chignahuapan', 1),
(1627, 21, '054', 'Chignautla', 1),
(1628, 21, '055', 'Chila', 1),
(1629, 21, '056', 'Chila de la Sal', 1),
(1630, 21, '057', 'Honey', 1),
(1631, 21, '058', 'Chilchotla', 1),
(1632, 21, '059', 'Chinantla', 1),
(1633, 21, '060', 'Domingo Arenas', 1),
(1634, 21, '061', 'Eloxochitlán', 1),
(1635, 21, '062', 'Epatlán', 1),
(1636, 21, '063', 'Esperanza', 1),
(1637, 21, '064', 'Francisco Z. Mena', 1),
(1638, 21, '065', 'General Felipe Ángeles', 1),
(1639, 21, '066', 'Guadalupe', 1),
(1640, 21, '067', 'Guadalupe Victoria', 1),
(1641, 21, '068', 'Hermenegildo Galeana', 1),
(1642, 21, '069', 'Huaquechula', 1),
(1643, 21, '070', 'Huatlatlauca', 1),
(1644, 21, '071', 'Huauchinango', 1),
(1645, 21, '072', 'Huehuetla', 1),
(1646, 21, '073', 'Huehuetlán el Chico', 1),
(1647, 21, '074', 'Huejotzingo', 1),
(1648, 21, '075', 'Hueyapan', 1),
(1649, 21, '076', 'Hueytamalco', 1),
(1650, 21, '077', 'Hueytlalpan', 1),
(1651, 21, '078', 'Huitzilan de Serdán', 1),
(1652, 21, '079', 'Huitziltepec', 1),
(1653, 21, '080', 'Atlequizayan', 1),
(1654, 21, '081', 'Ixcamilpa de Guerrero', 1),
(1655, 21, '082', 'Ixcaquixtla', 1),
(1656, 21, '083', 'Ixtacamaxtitlán', 1),
(1657, 21, '084', 'Ixtepec', 1),
(1658, 21, '085', 'Izúcar de Matamoros', 1),
(1659, 21, '086', 'Jalpan', 1),
(1660, 21, '087', 'Jolalpan', 1),
(1661, 21, '088', 'Jonotla', 1),
(1662, 21, '089', 'Jopala', 1),
(1663, 21, '090', 'Juan C. Bonilla', 1),
(1664, 21, '091', 'Juan Galindo', 1),
(1665, 21, '092', 'Juan N. Méndez', 1),
(1666, 21, '093', 'Lafragua', 1),
(1667, 21, '094', 'Libres', 1),
(1668, 21, '095', 'La Magdalena Tlatlauquitepec', 1),
(1669, 21, '096', 'Mazapiltepec de Juárez', 1),
(1670, 21, '097', 'Mixtla', 1),
(1671, 21, '098', 'Molcaxac', 1),
(1672, 21, '099', 'Cañada Morelos', 1),
(1673, 21, '100', 'Naupan', 1),
(1674, 21, '101', 'Nauzontla', 1),
(1675, 21, '102', 'Nealtican', 1),
(1676, 21, '103', 'Nicolás Bravo', 1),
(1677, 21, '104', 'Nopalucan', 1),
(1678, 21, '105', 'Ocotepec', 1),
(1679, 21, '106', 'Ocoyucan', 1),
(1680, 21, '107', 'Olintla', 1),
(1681, 21, '108', 'Oriental', 1),
(1682, 21, '109', 'Pahuatlán', 1),
(1683, 21, '110', 'Palmar de Bravo', 1),
(1684, 21, '111', 'Pantepec', 1),
(1685, 21, '112', 'Petlalcingo', 1),
(1686, 21, '113', 'Piaxtla', 1),
(1687, 21, '114', 'Puebla', 1),
(1688, 21, '115', 'Quecholac', 1),
(1689, 21, '116', 'Quimixtlán', 1),
(1690, 21, '117', 'Rafael Lara Grajales', 1),
(1691, 21, '118', 'Los Reyes de Juárez', 1),
(1692, 21, '119', 'San Andrés Cholula', 1),
(1693, 21, '120', 'San Antonio Cañada', 1),
(1694, 21, '121', 'San Diego la Mesa Tochimiltzingo', 1),
(1695, 21, '122', 'San Felipe Teotlalcingo', 1),
(1696, 21, '123', 'San Felipe Tepatlán', 1),
(1697, 21, '124', 'San Gabriel Chilac', 1),
(1698, 21, '125', 'San Gregorio Atzompa', 1),
(1699, 21, '126', 'San Jerónimo Tecuanipan', 1),
(1700, 21, '127', 'San Jerónimo Xayacatlán', 1),
(1701, 21, '128', 'San José Chiapa', 1),
(1702, 21, '129', 'San José Miahuatlán', 1),
(1703, 21, '130', 'San Juan Atenco', 1),
(1704, 21, '131', 'San Juan Atzompa', 1),
(1705, 21, '132', 'San Martín Texmelucan', 1),
(1706, 21, '133', 'San Martín Totoltepec', 1),
(1707, 21, '134', 'San Matías Tlalancaleca', 1),
(1708, 21, '135', 'San Miguel Ixitlán', 1),
(1709, 21, '136', 'San Miguel Xoxtla', 1),
(1710, 21, '137', 'San Nicolás Buenos Aires', 1),
(1711, 21, '138', 'San Nicolás de los Ranchos', 1),
(1712, 21, '139', 'San Pablo Anicano', 1),
(1713, 21, '140', 'San Pedro Cholula', 1),
(1714, 21, '141', 'San Pedro Yeloixtlahuaca', 1),
(1715, 21, '142', 'San Salvador el Seco', 1),
(1716, 21, '143', 'San Salvador el Verde', 1),
(1717, 21, '144', 'San Salvador Huixcolotla', 1),
(1718, 21, '145', 'San Sebastián Tlacotepec', 1),
(1719, 21, '146', 'Santa Catarina Tlaltempan', 1),
(1720, 21, '147', 'Santa Inés Ahuatempan', 1),
(1721, 21, '148', 'Santa Isabel Cholula', 1),
(1722, 21, '149', 'Santiago Miahuatlán', 1),
(1723, 21, '150', 'Huehuetlán el Grande', 1),
(1724, 21, '151', 'Santo Tomás Hueyotlipan', 1),
(1725, 21, '152', 'Soltepec', 1),
(1726, 21, '153', 'Tecali de Herrera', 1),
(1727, 21, '154', 'Tecamachalco', 1),
(1728, 21, '155', 'Tecomatlán', 1),
(1729, 21, '156', 'Tehuacán', 1),
(1730, 21, '157', 'Tehuitzingo', 1),
(1731, 21, '158', 'Tenampulco', 1),
(1732, 21, '159', 'Teopantlán', 1),
(1733, 21, '160', 'Teotlalco', 1),
(1734, 21, '161', 'Tepanco de López', 1),
(1735, 21, '162', 'Tepango de Rodríguez', 1),
(1736, 21, '163', 'Tepatlaxco de Hidalgo', 1),
(1737, 21, '164', 'Tepeaca', 1),
(1738, 21, '165', 'Tepemaxalco', 1),
(1739, 21, '166', 'Tepeojuma', 1),
(1740, 21, '167', 'Tepetzintla', 1),
(1741, 21, '168', 'Tepexco', 1),
(1742, 21, '169', 'Tepexi de Rodríguez', 1),
(1743, 21, '170', 'Tepeyahualco', 1),
(1744, 21, '171', 'Tepeyahualco de Cuauhtémoc', 1),
(1745, 21, '172', 'Tetela de Ocampo', 1),
(1746, 21, '173', 'Teteles de Avila Castillo', 1),
(1747, 21, '174', 'Teziutlán', 1),
(1748, 21, '175', 'Tianguismanalco', 1),
(1749, 21, '176', 'Tilapa', 1),
(1750, 21, '177', 'Tlacotepec de Benito Juárez', 1),
(1751, 21, '178', 'Tlacuilotepec', 1),
(1752, 21, '179', 'Tlachichuca', 1),
(1753, 21, '180', 'Tlahuapan', 1),
(1754, 21, '181', 'Tlaltenango', 1),
(1755, 21, '182', 'Tlanepantla', 1),
(1756, 21, '183', 'Tlaola', 1),
(1757, 21, '184', 'Tlapacoya', 1),
(1758, 21, '185', 'Tlapanalá', 1),
(1759, 21, '186', 'Tlatlauquitepec', 1),
(1760, 21, '187', 'Tlaxco', 1),
(1761, 21, '188', 'Tochimilco', 1),
(1762, 21, '189', 'Tochtepec', 1),
(1763, 21, '190', 'Totoltepec de Guerrero', 1),
(1764, 21, '191', 'Tulcingo', 1),
(1765, 21, '192', 'Tuzamapan de Galeana', 1),
(1766, 21, '193', 'Tzicatlacoyan', 1),
(1767, 21, '194', 'Venustiano Carranza', 1),
(1768, 21, '195', 'Vicente Guerrero', 1),
(1769, 21, '196', 'Xayacatlán de Bravo', 1),
(1770, 21, '197', 'Xicotepec', 1),
(1771, 21, '198', 'Xicotlán', 1),
(1772, 21, '199', 'Xiutetelco', 1),
(1773, 21, '200', 'Xochiapulco', 1),
(1774, 21, '201', 'Xochiltepec', 1),
(1775, 21, '202', 'Xochitlán de Vicente Suárez', 1),
(1776, 21, '203', 'Xochitlán Todos Santos', 1),
(1777, 21, '204', 'Yaonáhuac', 1),
(1778, 21, '205', 'Yehualtepec', 1),
(1779, 21, '206', 'Zacapala', 1),
(1780, 21, '207', 'Zacapoaxtla', 1),
(1781, 21, '208', 'Zacatlán', 1),
(1782, 21, '209', 'Zapotitlán', 1),
(1783, 21, '210', 'Zapotitlán de Méndez', 1),
(1784, 21, '211', 'Zaragoza', 1),
(1785, 21, '212', 'Zautla', 1),
(1786, 21, '213', 'Zihuateutla', 1),
(1787, 21, '214', 'Zinacatepec', 1),
(1788, 21, '215', 'Zongozotla', 1),
(1789, 21, '216', 'Zoquiapan', 1),
(1790, 21, '217', 'Zoquitlán', 1),
(1791, 22, '001', 'Amealco de Bonfil', 1),
(1792, 22, '002', 'Pinal de Amoles', 1),
(1793, 22, '003', 'Arroyo Seco', 1),
(1794, 22, '004', 'Cadereyta de Montes', 1),
(1795, 22, '005', 'Colón', 1),
(1796, 22, '006', 'Corregidora', 1),
(1797, 22, '007', 'Ezequiel Montes', 1),
(1798, 22, '008', 'Huimilpan', 1),
(1799, 22, '009', 'Jalpan de Serra', 1),
(1800, 22, '010', 'Landa de Matamoros', 1),
(1801, 22, '011', 'El Marqués', 1),
(1802, 22, '012', 'Pedro Escobedo', 1),
(1803, 22, '013', 'Peñamiller', 1),
(1804, 22, '014', 'Querétaro', 1),
(1805, 22, '015', 'San Joaquín', 1),
(1806, 22, '016', 'San Juan del Río', 1),
(1807, 22, '017', 'Tequisquiapan', 1),
(1808, 22, '018', 'Tolimán', 1),
(1809, 23, '001', 'Cozumel', 1),
(1810, 23, '002', 'Felipe Carrillo Puerto', 1),
(1811, 23, '003', 'Isla Mujeres', 1),
(1812, 23, '004', 'Othón P. Blanco', 1),
(1813, 23, '005', 'Benito Juárez', 1),
(1814, 23, '006', 'José María Morelos', 1),
(1815, 23, '007', 'Lázaro Cárdenas', 1),
(1816, 23, '008', 'Solidaridad', 1),
(1817, 23, '009', 'Tulum', 1),
(1818, 23, '010', 'Bacalar', 1),
(1819, 23, '011', 'Puerto Morelos', 1),
(1820, 24, '001', 'Ahualulco', 1),
(1821, 24, '002', 'Alaquines', 1),
(1822, 24, '003', 'Aquismón', 1),
(1823, 24, '004', 'Armadillo de los Infante', 1),
(1824, 24, '005', 'Cárdenas', 1),
(1825, 24, '006', 'Catorce', 1),
(1826, 24, '007', 'Cedral', 1),
(1827, 24, '008', 'Cerritos', 1),
(1828, 24, '009', 'Cerro de San Pedro', 1),
(1829, 24, '010', 'Ciudad del Maíz', 1),
(1830, 24, '011', 'Ciudad Fernández', 1),
(1831, 24, '012', 'Tancanhuitz', 1),
(1832, 24, '013', 'Ciudad Valles', 1),
(1833, 24, '014', 'Coxcatlán', 1),
(1834, 24, '015', 'Charcas', 1),
(1835, 24, '016', 'Ebano', 1),
(1836, 24, '017', 'Guadalcázar', 1),
(1837, 24, '018', 'Huehuetlán', 1),
(1838, 24, '019', 'Lagunillas', 1),
(1839, 24, '020', 'Matehuala', 1),
(1840, 24, '021', 'Mexquitic de Carmona', 1),
(1841, 24, '022', 'Moctezuma', 1),
(1842, 24, '023', 'Rayón', 1),
(1843, 24, '024', 'Rioverde', 1),
(1844, 24, '025', 'Salinas', 1),
(1845, 24, '026', 'San Antonio', 1),
(1846, 24, '027', 'San Ciro de Acosta', 1),
(1847, 24, '028', 'San Luis Potosí', 1),
(1848, 24, '029', 'San Martín Chalchicuautla', 1),
(1849, 24, '030', 'San Nicolás Tolentino', 1),
(1850, 24, '031', 'Santa Catarina', 1),
(1851, 24, '032', 'Santa María del Río', 1),
(1852, 24, '033', 'Santo Domingo', 1),
(1853, 24, '034', 'San Vicente Tancuayalab', 1),
(1854, 24, '035', 'Soledad de Graciano Sánchez', 1),
(1855, 24, '036', 'Tamasopo', 1),
(1856, 24, '037', 'Tamazunchale', 1),
(1857, 24, '038', 'Tampacán', 1),
(1858, 24, '039', 'Tampamolón Corona', 1),
(1859, 24, '040', 'Tamuín', 1),
(1860, 24, '041', 'Tanlajás', 1),
(1861, 24, '042', 'Tanquián de Escobedo', 1),
(1862, 24, '043', 'Tierra Nueva', 1),
(1863, 24, '044', 'Vanegas', 1),
(1864, 24, '045', 'Venado', 1),
(1865, 24, '046', 'Villa de Arriaga', 1),
(1866, 24, '047', 'Villa de Guadalupe', 1),
(1867, 24, '048', 'Villa de la Paz', 1),
(1868, 24, '049', 'Villa de Ramos', 1),
(1869, 24, '050', 'Villa de Reyes', 1),
(1870, 24, '051', 'Villa Hidalgo', 1),
(1871, 24, '052', 'Villa Juárez', 1),
(1872, 24, '053', 'Axtla de Terrazas', 1),
(1873, 24, '054', 'Xilitla', 1),
(1874, 24, '055', 'Zaragoza', 1),
(1875, 24, '056', 'Villa de Arista', 1),
(1876, 24, '057', 'Matlapa', 1),
(1877, 24, '058', 'El Naranjo', 1),
(1878, 25, '001', 'Ahome', 1),
(1879, 25, '002', 'Angostura', 1),
(1880, 25, '003', 'Badiraguato', 1),
(1881, 25, '004', 'Concordia', 1),
(1882, 25, '005', 'Cosalá', 1),
(1883, 25, '006', 'Culiacán', 1),
(1884, 25, '007', 'Choix', 1),
(1885, 25, '008', 'Elota', 1),
(1886, 25, '009', 'Escuinapa', 1),
(1887, 25, '010', 'El Fuerte', 1),
(1888, 25, '011', 'Guasave', 1),
(1889, 25, '012', 'Mazatlán', 1),
(1890, 25, '013', 'Mocorito', 1),
(1891, 25, '014', 'Rosario', 1),
(1892, 25, '015', 'Salvador Alvarado', 1),
(1893, 25, '016', 'San Ignacio', 1),
(1894, 25, '017', 'Sinaloa', 1),
(1895, 25, '018', 'Navolato', 1),
(1896, 26, '001', 'Aconchi', 1),
(1897, 26, '002', 'Agua Prieta', 1),
(1898, 26, '003', 'Alamos', 1),
(1899, 26, '004', 'Altar', 1),
(1900, 26, '005', 'Arivechi', 1),
(1901, 26, '006', 'Arizpe', 1),
(1902, 26, '007', 'Atil', 1),
(1903, 26, '008', 'Bacadéhuachi', 1),
(1904, 26, '009', 'Bacanora', 1),
(1905, 26, '010', 'Bacerac', 1),
(1906, 26, '011', 'Bacoachi', 1),
(1907, 26, '012', 'Bácum', 1),
(1908, 26, '013', 'Banámichi', 1),
(1909, 26, '014', 'Baviácora', 1),
(1910, 26, '015', 'Bavispe', 1),
(1911, 26, '016', 'Benjamín Hill', 1),
(1912, 26, '017', 'Caborca', 1),
(1913, 26, '018', 'Cajeme', 1),
(1914, 26, '019', 'Cananea', 1),
(1915, 26, '020', 'Carbó', 1),
(1916, 26, '021', 'La Colorada', 1),
(1917, 26, '022', 'Cucurpe', 1),
(1918, 26, '023', 'Cumpas', 1),
(1919, 26, '024', 'Divisaderos', 1),
(1920, 26, '025', 'Empalme', 1),
(1921, 26, '026', 'Etchojoa', 1),
(1922, 26, '027', 'Fronteras', 1),
(1923, 26, '028', 'Granados', 1),
(1924, 26, '029', 'Guaymas', 1),
(1925, 26, '030', 'Hermosillo', 1),
(1926, 26, '031', 'Huachinera', 1),
(1927, 26, '032', 'Huásabas', 1),
(1928, 26, '033', 'Huatabampo', 1),
(1929, 26, '034', 'Huépac', 1),
(1930, 26, '035', 'Imuris', 1),
(1931, 26, '036', 'Magdalena', 1),
(1932, 26, '037', 'Mazatán', 1),
(1933, 26, '038', 'Moctezuma', 1),
(1934, 26, '039', 'Naco', 1),
(1935, 26, '040', 'Nácori Chico', 1),
(1936, 26, '041', 'Nacozari de García', 1),
(1937, 26, '042', 'Navojoa', 1),
(1938, 26, '043', 'Nogales', 1),
(1939, 26, '044', 'Onavas', 1),
(1940, 26, '045', 'Opodepe', 1),
(1941, 26, '046', 'Oquitoa', 1),
(1942, 26, '047', 'Pitiquito', 1),
(1943, 26, '048', 'Puerto Peñasco', 1),
(1944, 26, '049', 'Quiriego', 1),
(1945, 26, '050', 'Rayón', 1),
(1946, 26, '051', 'Rosario', 1),
(1947, 26, '052', 'Sahuaripa', 1),
(1948, 26, '053', 'San Felipe de Jesús', 1),
(1949, 26, '054', 'San Javier', 1),
(1950, 26, '055', 'San Luis Río Colorado', 1),
(1951, 26, '056', 'San Miguel de Horcasitas', 1),
(1952, 26, '057', 'San Pedro de la Cueva', 1),
(1953, 26, '058', 'Santa Ana', 1),
(1954, 26, '059', 'Santa Cruz', 1),
(1955, 26, '060', 'Sáric', 1),
(1956, 26, '061', 'Soyopa', 1),
(1957, 26, '062', 'Suaqui Grande', 1),
(1958, 26, '063', 'Tepache', 1),
(1959, 26, '064', 'Trincheras', 1),
(1960, 26, '065', 'Tubutama', 1),
(1961, 26, '066', 'Ures', 1),
(1962, 26, '067', 'Villa Hidalgo', 1),
(1963, 26, '068', 'Villa Pesqueira', 1),
(1964, 26, '069', 'Yécora', 1),
(1965, 26, '070', 'General Plutarco Elías Calles', 1),
(1966, 26, '071', 'Benito Juárez', 1),
(1967, 26, '072', 'San Ignacio Río Muerto', 1),
(1968, 27, '001', 'Balancán', 1),
(1969, 27, '002', 'Cárdenas', 1),
(1970, 27, '003', 'Centla', 1),
(1971, 27, '004', 'Centro', 1),
(1972, 27, '005', 'Comalcalco', 1),
(1973, 27, '006', 'Cunduacán', 1),
(1974, 27, '007', 'Emiliano Zapata', 1),
(1975, 27, '008', 'Huimanguillo', 1),
(1976, 27, '009', 'Jalapa', 1),
(1977, 27, '010', 'Jalpa de Méndez', 1),
(1978, 27, '011', 'Jonuta', 1),
(1979, 27, '012', 'Macuspana', 1),
(1980, 27, '013', 'Nacajuca', 1),
(1981, 27, '014', 'Paraíso', 1),
(1982, 27, '015', 'Tacotalpa', 1),
(1983, 27, '016', 'Teapa', 1),
(1984, 27, '017', 'Tenosique', 1),
(1985, 28, '001', 'Abasolo', 1),
(1986, 28, '002', 'Aldama', 1),
(1987, 28, '003', 'Altamira', 1),
(1988, 28, '004', 'Antiguo Morelos', 1),
(1989, 28, '005', 'Burgos', 1),
(1990, 28, '006', 'Bustamante', 1),
(1991, 28, '007', 'Camargo', 1),
(1992, 28, '008', 'Casas', 1),
(1993, 28, '009', 'Ciudad Madero', 1),
(1994, 28, '010', 'Cruillas', 1),
(1995, 28, '011', 'Gómez Farías', 1),
(1996, 28, '012', 'González', 1),
(1997, 28, '013', 'Güémez', 1),
(1998, 28, '014', 'Guerrero', 1),
(1999, 28, '015', 'Gustavo Díaz Ordaz', 1),
(2000, 28, '016', 'Hidalgo', 1),
(2001, 28, '017', 'Jaumave', 1),
(2002, 28, '018', 'Jiménez', 1),
(2003, 28, '019', 'Llera', 1),
(2004, 28, '020', 'Mainero', 1),
(2005, 28, '021', 'El Mante', 1),
(2006, 28, '022', 'Matamoros', 1),
(2007, 28, '023', 'Méndez', 1),
(2008, 28, '024', 'Mier', 1),
(2009, 28, '025', 'Miguel Alemán', 1),
(2010, 28, '026', 'Miquihuana', 1),
(2011, 28, '027', 'Nuevo Laredo', 1),
(2012, 28, '028', 'Nuevo Morelos', 1),
(2013, 28, '029', 'Ocampo', 1),
(2014, 28, '030', 'Padilla', 1),
(2015, 28, '031', 'Palmillas', 1),
(2016, 28, '032', 'Reynosa', 1),
(2017, 28, '033', 'Río Bravo', 1),
(2018, 28, '034', 'San Carlos', 1),
(2019, 28, '035', 'San Fernando', 1),
(2020, 28, '036', 'San Nicolás', 1),
(2021, 28, '037', 'Soto la Marina', 1),
(2022, 28, '038', 'Tampico', 1),
(2023, 28, '039', 'Tula', 1),
(2024, 28, '040', 'Valle Hermoso', 1),
(2025, 28, '041', 'Victoria', 1),
(2026, 28, '042', 'Villagrán', 1),
(2027, 28, '043', 'Xicoténcatl', 1),
(2028, 29, '001', 'Amaxac de Guerrero', 1),
(2029, 29, '002', 'Apetatitlán de Antonio Carvajal', 1),
(2030, 29, '003', 'Atlangatepec', 1),
(2031, 29, '004', 'Atltzayanca', 1),
(2032, 29, '005', 'Apizaco', 1),
(2033, 29, '006', 'Calpulalpan', 1),
(2034, 29, '007', 'El Carmen Tequexquitla', 1),
(2035, 29, '008', 'Cuapiaxtla', 1),
(2036, 29, '009', 'Cuaxomulco', 1),
(2037, 29, '010', 'Chiautempan', 1),
(2038, 29, '011', 'Muñoz de Domingo Arenas', 1),
(2039, 29, '012', 'Españita', 1),
(2040, 29, '013', 'Huamantla', 1),
(2041, 29, '014', 'Hueyotlipan', 1),
(2042, 29, '015', 'Ixtacuixtla de Mariano Matamoros', 1),
(2043, 29, '016', 'Ixtenco', 1),
(2044, 29, '017', 'Mazatecochco de José María Morelos', 1),
(2045, 29, '018', 'Contla de Juan Cuamatzi', 1),
(2046, 29, '019', 'Tepetitla de Lardizábal', 1),
(2047, 29, '020', 'Sanctórum de Lázaro Cárdenas', 1),
(2048, 29, '021', 'Nanacamilpa de Mariano Arista', 1),
(2049, 29, '022', 'Acuamanala de Miguel Hidalgo', 1),
(2050, 29, '023', 'Natívitas', 1),
(2051, 29, '024', 'Panotla', 1),
(2052, 29, '025', 'San Pablo del Monte', 1),
(2053, 29, '026', 'Santa Cruz Tlaxcala', 1),
(2054, 29, '027', 'Tenancingo', 1),
(2055, 29, '028', 'Teolocholco', 1),
(2056, 29, '029', 'Tepeyanco', 1),
(2057, 29, '030', 'Terrenate', 1),
(2058, 29, '031', 'Tetla de la Solidaridad', 1),
(2059, 29, '032', 'Tetlatlahuca', 1),
(2060, 29, '033', 'Tlaxcala', 1),
(2061, 29, '034', 'Tlaxco', 1),
(2062, 29, '035', 'Tocatlán', 1),
(2063, 29, '036', 'Totolac', 1),
(2064, 29, '037', 'Ziltlaltépec de Trinidad Sánchez Santos', 1),
(2065, 29, '038', 'Tzompantepec', 1),
(2066, 29, '039', 'Xaloztoc', 1),
(2067, 29, '040', 'Xaltocan', 1),
(2068, 29, '041', 'Papalotla de Xicohténcatl', 1),
(2069, 29, '042', 'Xicohtzinco', 1),
(2070, 29, '043', 'Yauhquemehcan', 1),
(2071, 29, '044', 'Zacatelco', 1),
(2072, 29, '045', 'Benito Juárez', 1),
(2073, 29, '046', 'Emiliano Zapata', 1),
(2074, 29, '047', 'Lázaro Cárdenas', 1),
(2075, 29, '048', 'La Magdalena Tlaltelulco', 1),
(2076, 29, '049', 'San Damián Texóloc', 1),
(2077, 29, '050', 'San Francisco Tetlanohcan', 1),
(2078, 29, '051', 'San Jerónimo Zacualpan', 1),
(2079, 29, '052', 'San José Teacalco', 1),
(2080, 29, '053', 'San Juan Huactzinco', 1),
(2081, 29, '054', 'San Lorenzo Axocomanitla', 1),
(2082, 29, '055', 'San Lucas Tecopilco', 1),
(2083, 29, '056', 'Santa Ana Nopalucan', 1),
(2084, 29, '057', 'Santa Apolonia Teacalco', 1),
(2085, 29, '058', 'Santa Catarina Ayometla', 1),
(2086, 29, '059', 'Santa Cruz Quilehtla', 1),
(2087, 29, '060', 'Santa Isabel Xiloxoxtla', 1),
(2088, 30, '001', 'Acajete', 1),
(2089, 30, '002', 'Acatlán', 1),
(2090, 30, '003', 'Acayucan', 1),
(2091, 30, '004', 'Actopan', 1),
(2092, 30, '005', 'Acula', 1),
(2093, 30, '006', 'Acultzingo', 1),
(2094, 30, '007', 'Camarón de Tejeda', 1),
(2095, 30, '008', 'Alpatláhuac', 1),
(2096, 30, '009', 'Alto Lucero de Gutiérrez Barrios', 1),
(2097, 30, '010', 'Altotonga', 1),
(2098, 30, '011', 'Alvarado', 1),
(2099, 30, '012', 'Amatitlán', 1),
(2100, 30, '013', 'Naranjos Amatlán', 1),
(2101, 30, '014', 'Amatlán de los Reyes', 1),
(2102, 30, '015', 'Angel R. Cabada', 1),
(2103, 30, '016', 'La Antigua', 1),
(2104, 30, '017', 'Apazapan', 1),
(2105, 30, '018', 'Aquila', 1),
(2106, 30, '019', 'Astacinga', 1),
(2107, 30, '020', 'Atlahuilco', 1),
(2108, 30, '021', 'Atoyac', 1),
(2109, 30, '022', 'Atzacan', 1),
(2110, 30, '023', 'Atzalan', 1),
(2111, 30, '024', 'Tlaltetela', 1),
(2112, 30, '025', 'Ayahualulco', 1),
(2113, 30, '026', 'Banderilla', 1),
(2114, 30, '027', 'Benito Juárez', 1),
(2115, 30, '028', 'Boca del Río', 1),
(2116, 30, '029', 'Calcahualco', 1),
(2117, 30, '030', 'Camerino Z. Mendoza', 1),
(2118, 30, '031', 'Carrillo Puerto', 1),
(2119, 30, '032', 'Catemaco', 1),
(2120, 30, '033', 'Cazones de Herrera', 1),
(2121, 30, '034', 'Cerro Azul', 1),
(2122, 30, '035', 'Citlaltépetl', 1),
(2123, 30, '036', 'Coacoatzintla', 1),
(2124, 30, '037', 'Coahuitlán', 1),
(2125, 30, '038', 'Coatepec', 1),
(2126, 30, '039', 'Coatzacoalcos', 1),
(2127, 30, '040', 'Coatzintla', 1),
(2128, 30, '041', 'Coetzala', 1),
(2129, 30, '042', 'Colipa', 1),
(2130, 30, '043', 'Comapa', 1),
(2131, 30, '044', 'Córdoba', 1),
(2132, 30, '045', 'Cosamaloapan de Carpio', 1),
(2133, 30, '046', 'Cosautlán de Carvajal', 1),
(2134, 30, '047', 'Coscomatepec', 1),
(2135, 30, '048', 'Cosoleacaque', 1),
(2136, 30, '049', 'Cotaxtla', 1),
(2137, 30, '050', 'Coxquihui', 1),
(2138, 30, '051', 'Coyutla', 1),
(2139, 30, '052', 'Cuichapa', 1),
(2140, 30, '053', 'Cuitláhuac', 1),
(2141, 30, '054', 'Chacaltianguis', 1),
(2142, 30, '055', 'Chalma', 1),
(2143, 30, '056', 'Chiconamel', 1),
(2144, 30, '057', 'Chiconquiaco', 1),
(2145, 30, '058', 'Chicontepec', 1),
(2146, 30, '059', 'Chinameca', 1),
(2147, 30, '060', 'Chinampa de Gorostiza', 1),
(2148, 30, '061', 'Las Choapas', 1),
(2149, 30, '062', 'Chocamán', 1),
(2150, 30, '063', 'Chontla', 1),
(2151, 30, '064', 'Chumatlán', 1),
(2152, 30, '065', 'Emiliano Zapata', 1),
(2153, 30, '066', 'Espinal', 1),
(2154, 30, '067', 'Filomeno Mata', 1),
(2155, 30, '068', 'Fortín', 1),
(2156, 30, '069', 'Gutiérrez Zamora', 1),
(2157, 30, '070', 'Hidalgotitlán', 1),
(2158, 30, '071', 'Huatusco', 1),
(2159, 30, '072', 'Huayacocotla', 1),
(2160, 30, '073', 'Hueyapan de Ocampo', 1),
(2161, 30, '074', 'Huiloapan de Cuauhtémoc', 1),
(2162, 30, '075', 'Ignacio de la Llave', 1),
(2163, 30, '076', 'Ilamatlán', 1),
(2164, 30, '077', 'Isla', 1),
(2165, 30, '078', 'Ixcatepec', 1),
(2166, 30, '079', 'Ixhuacán de los Reyes', 1),
(2167, 30, '080', 'Ixhuatlán del Café', 1),
(2168, 30, '081', 'Ixhuatlancillo', 1),
(2169, 30, '082', 'Ixhuatlán del Sureste', 1),
(2170, 30, '083', 'Ixhuatlán de Madero', 1),
(2171, 30, '084', 'Ixmatlahuacan', 1),
(2172, 30, '085', 'Ixtaczoquitlán', 1),
(2173, 30, '086', 'Jalacingo', 1),
(2174, 30, '087', 'Xalapa', 1),
(2175, 30, '088', 'Jalcomulco', 1),
(2176, 30, '089', 'Jáltipan', 1),
(2177, 30, '090', 'Jamapa', 1),
(2178, 30, '091', 'Jesús Carranza', 1),
(2179, 30, '092', 'Xico', 1),
(2180, 30, '093', 'Jilotepec', 1),
(2181, 30, '094', 'Juan Rodríguez Clara', 1),
(2182, 30, '095', 'Juchique de Ferrer', 1),
(2183, 30, '096', 'Landero y Coss', 1),
(2184, 30, '097', 'Lerdo de Tejada', 1),
(2185, 30, '098', 'Magdalena', 1),
(2186, 30, '099', 'Maltrata', 1),
(2187, 30, '100', 'Manlio Fabio Altamirano', 1),
(2188, 30, '101', 'Mariano Escobedo', 1),
(2189, 30, '102', 'Martínez de la Torre', 1),
(2190, 30, '103', 'Mecatlán', 1),
(2191, 30, '104', 'Mecayapan', 1),
(2192, 30, '105', 'Medellín de Bravo', 1),
(2193, 30, '106', 'Miahuatlán', 1),
(2194, 30, '107', 'Las Minas', 1),
(2195, 30, '108', 'Minatitlán', 1),
(2196, 30, '109', 'Misantla', 1),
(2197, 30, '110', 'Mixtla de Altamirano', 1),
(2198, 30, '111', 'Moloacán', 1),
(2199, 30, '112', 'Naolinco', 1),
(2200, 30, '113', 'Naranjal', 1),
(2201, 30, '114', 'Nautla', 1),
(2202, 30, '115', 'Nogales', 1),
(2203, 30, '116', 'Oluta', 1),
(2204, 30, '117', 'Omealca', 1),
(2205, 30, '118', 'Orizaba', 1),
(2206, 30, '119', 'Otatitlán', 1),
(2207, 30, '120', 'Oteapan', 1),
(2208, 30, '121', 'Ozuluama de Mascareñas', 1),
(2209, 30, '122', 'Pajapan', 1),
(2210, 30, '123', 'Pánuco', 1),
(2211, 30, '124', 'Papantla', 1),
(2212, 30, '125', 'Paso del Macho', 1),
(2213, 30, '126', 'Paso de Ovejas', 1),
(2214, 30, '127', 'La Perla', 1),
(2215, 30, '128', 'Perote', 1),
(2216, 30, '129', 'Platón Sánchez', 1),
(2217, 30, '130', 'Playa Vicente', 1),
(2218, 30, '131', 'Poza Rica de Hidalgo', 1),
(2219, 30, '132', 'Las Vigas de Ramírez', 1),
(2220, 30, '133', 'Pueblo Viejo', 1),
(2221, 30, '134', 'Puente Nacional', 1),
(2222, 30, '135', 'Rafael Delgado', 1),
(2223, 30, '136', 'Rafael Lucio', 1),
(2224, 30, '137', 'Los Reyes', 1),
(2225, 30, '138', 'Río Blanco', 1),
(2226, 30, '139', 'Saltabarranca', 1),
(2227, 30, '140', 'San Andrés Tenejapan', 1),
(2228, 30, '141', 'San Andrés Tuxtla', 1),
(2229, 30, '142', 'San Juan Evangelista', 1),
(2230, 30, '143', 'Santiago Tuxtla', 1),
(2231, 30, '144', 'Sayula de Alemán', 1),
(2232, 30, '145', 'Soconusco', 1),
(2233, 30, '146', 'Sochiapa', 1),
(2234, 30, '147', 'Soledad Atzompa', 1),
(2235, 30, '148', 'Soledad de Doblado', 1),
(2236, 30, '149', 'Soteapan', 1),
(2237, 30, '150', 'Tamalín', 1),
(2238, 30, '151', 'Tamiahua', 1),
(2239, 30, '152', 'Tampico Alto', 1),
(2240, 30, '153', 'Tancoco', 1),
(2241, 30, '154', 'Tantima', 1),
(2242, 30, '155', 'Tantoyuca', 1),
(2243, 30, '156', 'Tatatila', 1),
(2244, 30, '157', 'Castillo de Teayo', 1),
(2245, 30, '158', 'Tecolutla', 1),
(2246, 30, '159', 'Tehuipango', 1),
(2247, 30, '160', 'Álamo Temapache', 1),
(2248, 30, '161', 'Tempoal', 1),
(2249, 30, '162', 'Tenampa', 1),
(2250, 30, '163', 'Tenochtitlán', 1),
(2251, 30, '164', 'Teocelo', 1),
(2252, 30, '165', 'Tepatlaxco', 1),
(2253, 30, '166', 'Tepetlán', 1),
(2254, 30, '167', 'Tepetzintla', 1),
(2255, 30, '168', 'Tequila', 1),
(2256, 30, '169', 'José Azueta', 1),
(2257, 30, '170', 'Texcatepec', 1),
(2258, 30, '171', 'Texhuacán', 1),
(2259, 30, '172', 'Texistepec', 1),
(2260, 30, '173', 'Tezonapa', 1),
(2261, 30, '174', 'Tierra Blanca', 1),
(2262, 30, '175', 'Tihuatlán', 1),
(2263, 30, '176', 'Tlacojalpan', 1),
(2264, 30, '177', 'Tlacolulan', 1),
(2265, 30, '178', 'Tlacotalpan', 1),
(2266, 30, '179', 'Tlacotepec de Mejía', 1),
(2267, 30, '180', 'Tlachichilco', 1),
(2268, 30, '181', 'Tlalixcoyan', 1),
(2269, 30, '182', 'Tlalnelhuayocan', 1),
(2270, 30, '183', 'Tlapacoyan', 1),
(2271, 30, '184', 'Tlaquilpa', 1),
(2272, 30, '185', 'Tlilapan', 1),
(2273, 30, '186', 'Tomatlán', 1),
(2274, 30, '187', 'Tonayán', 1),
(2275, 30, '188', 'Totutla', 1),
(2276, 30, '189', 'Tuxpan', 1),
(2277, 30, '190', 'Tuxtilla', 1),
(2278, 30, '191', 'Ursulo Galván', 1),
(2279, 30, '192', 'Vega de Alatorre', 1),
(2280, 30, '193', 'Veracruz', 1),
(2281, 30, '194', 'Villa Aldama', 1),
(2282, 30, '195', 'Xoxocotla', 1),
(2283, 30, '196', 'Yanga', 1),
(2284, 30, '197', 'Yecuatla', 1),
(2285, 30, '198', 'Zacualpan', 1),
(2286, 30, '199', 'Zaragoza', 1),
(2287, 30, '200', 'Zentla', 1),
(2288, 30, '201', 'Zongolica', 1),
(2289, 30, '202', 'Zontecomatlán de López y Fuentes', 1),
(2290, 30, '203', 'Zozocolco de Hidalgo', 1),
(2291, 30, '204', 'Agua Dulce', 1),
(2292, 30, '205', 'El Higo', 1),
(2293, 30, '206', 'Nanchital de Lázaro Cárdenas del Río', 1),
(2294, 30, '207', 'Tres Valles', 1),
(2295, 30, '208', 'Carlos A. Carrillo', 1),
(2296, 30, '209', 'Tatahuicapan de Juárez', 1),
(2297, 30, '210', 'Uxpanapa', 1),
(2298, 30, '211', 'San Rafael', 1),
(2299, 30, '212', 'Santiago Sochiapan', 1),
(2300, 31, '001', 'Abalá', 1),
(2301, 31, '002', 'Acanceh', 1),
(2302, 31, '003', 'Akil', 1),
(2303, 31, '004', 'Baca', 1),
(2304, 31, '005', 'Bokobá', 1),
(2305, 31, '006', 'Buctzotz', 1),
(2306, 31, '007', 'Cacalchén', 1),
(2307, 31, '008', 'Calotmul', 1),
(2308, 31, '009', 'Cansahcab', 1),
(2309, 31, '010', 'Cantamayec', 1),
(2310, 31, '011', 'Celestún', 1),
(2311, 31, '012', 'Cenotillo', 1),
(2312, 31, '013', 'Conkal', 1),
(2313, 31, '014', 'Cuncunul', 1),
(2314, 31, '015', 'Cuzamá', 1),
(2315, 31, '016', 'Chacsinkín', 1),
(2316, 31, '017', 'Chankom', 1),
(2317, 31, '018', 'Chapab', 1),
(2318, 31, '019', 'Chemax', 1),
(2319, 31, '020', 'Chicxulub Pueblo', 1),
(2320, 31, '021', 'Chichimilá', 1),
(2321, 31, '022', 'Chikindzonot', 1),
(2322, 31, '023', 'Chocholá', 1),
(2323, 31, '024', 'Chumayel', 1),
(2324, 31, '025', 'Dzán', 1),
(2325, 31, '026', 'Dzemul', 1),
(2326, 31, '027', 'Dzidzantún', 1),
(2327, 31, '028', 'Dzilam de Bravo', 1),
(2328, 31, '029', 'Dzilam González', 1),
(2329, 31, '030', 'Dzitás', 1),
(2330, 31, '031', 'Dzoncauich', 1),
(2331, 31, '032', 'Espita', 1),
(2332, 31, '033', 'Halachó', 1),
(2333, 31, '034', 'Hocabá', 1),
(2334, 31, '035', 'Hoctún', 1),
(2335, 31, '036', 'Homún', 1),
(2336, 31, '037', 'Huhí', 1),
(2337, 31, '038', 'Hunucmá', 1),
(2338, 31, '039', 'Ixil', 1),
(2339, 31, '040', 'Izamal', 1),
(2340, 31, '041', 'Kanasín', 1),
(2341, 31, '042', 'Kantunil', 1),
(2342, 31, '043', 'Kaua', 1),
(2343, 31, '044', 'Kinchil', 1),
(2344, 31, '045', 'Kopomá', 1),
(2345, 31, '046', 'Mama', 1),
(2346, 31, '047', 'Maní', 1),
(2347, 31, '048', 'Maxcanú', 1),
(2348, 31, '049', 'Mayapán', 1),
(2349, 31, '050', 'Mérida', 1),
(2350, 31, '051', 'Mocochá', 1),
(2351, 31, '052', 'Motul', 1),
(2352, 31, '053', 'Muna', 1),
(2353, 31, '054', 'Muxupip', 1),
(2354, 31, '055', 'Opichén', 1),
(2355, 31, '056', 'Oxkutzcab', 1),
(2356, 31, '057', 'Panabá', 1),
(2357, 31, '058', 'Peto', 1),
(2358, 31, '059', 'Progreso', 1),
(2359, 31, '060', 'Quintana Roo', 1),
(2360, 31, '061', 'Río Lagartos', 1),
(2361, 31, '062', 'Sacalum', 1),
(2362, 31, '063', 'Samahil', 1),
(2363, 31, '064', 'Sanahcat', 1),
(2364, 31, '065', 'San Felipe', 1),
(2365, 31, '066', 'Santa Elena', 1),
(2366, 31, '067', 'Seyé', 1),
(2367, 31, '068', 'Sinanché', 1),
(2368, 31, '069', 'Sotuta', 1),
(2369, 31, '070', 'Sucilá', 1),
(2370, 31, '071', 'Sudzal', 1),
(2371, 31, '072', 'Suma', 1),
(2372, 31, '073', 'Tahdziú', 1),
(2373, 31, '074', 'Tahmek', 1),
(2374, 31, '075', 'Teabo', 1),
(2375, 31, '076', 'Tecoh', 1),
(2376, 31, '077', 'Tekal de Venegas', 1),
(2377, 31, '078', 'Tekantó', 1),
(2378, 31, '079', 'Tekax', 1),
(2379, 31, '080', 'Tekit', 1),
(2380, 31, '081', 'Tekom', 1),
(2381, 31, '082', 'Telchac Pueblo', 1),
(2382, 31, '083', 'Telchac Puerto', 1),
(2383, 31, '084', 'Temax', 1),
(2384, 31, '085', 'Temozón', 1),
(2385, 31, '086', 'Tepakán', 1),
(2386, 31, '087', 'Tetiz', 1),
(2387, 31, '088', 'Teya', 1),
(2388, 31, '089', 'Ticul', 1),
(2389, 31, '090', 'Timucuy', 1),
(2390, 31, '091', 'Tinum', 1),
(2391, 31, '092', 'Tixcacalcupul', 1),
(2392, 31, '093', 'Tixkokob', 1),
(2393, 31, '094', 'Tixmehuac', 1),
(2394, 31, '095', 'Tixpéhual', 1),
(2395, 31, '096', 'Tizimín', 1),
(2396, 31, '097', 'Tunkás', 1),
(2397, 31, '098', 'Tzucacab', 1),
(2398, 31, '099', 'Uayma', 1),
(2399, 31, '100', 'Ucú', 1),
(2400, 31, '101', 'Umán', 1),
(2401, 31, '102', 'Valladolid', 1),
(2402, 31, '103', 'Xocchel', 1),
(2403, 31, '104', 'Yaxcabá', 1),
(2404, 31, '105', 'Yaxkukul', 1),
(2405, 31, '106', 'Yobaín', 1),
(2406, 32, '001', 'Apozol', 1),
(2407, 32, '002', 'Apulco', 1),
(2408, 32, '003', 'Atolinga', 1),
(2409, 32, '004', 'Benito Juárez', 1),
(2410, 32, '005', 'Calera', 1),
(2411, 32, '006', 'Cañitas de Felipe Pescador', 1),
(2412, 32, '007', 'Concepción del Oro', 1),
(2413, 32, '008', 'Cuauhtémoc', 1),
(2414, 32, '009', 'Chalchihuites', 1),
(2415, 32, '010', 'Fresnillo', 1),
(2416, 32, '011', 'Trinidad García de la Cadena', 1),
(2417, 32, '012', 'Genaro Codina', 1),
(2418, 32, '013', 'General Enrique Estrada', 1),
(2419, 32, '014', 'General Francisco R. Murguía', 1),
(2420, 32, '015', 'El Plateado de Joaquín Amaro', 1),
(2421, 32, '016', 'General Pánfilo Natera', 1),
(2422, 32, '017', 'Guadalupe', 1),
(2423, 32, '018', 'Huanusco', 1),
(2424, 32, '019', 'Jalpa', 1),
(2425, 32, '020', 'Jerez', 1),
(2426, 32, '021', 'Jiménez del Teul', 1),
(2427, 32, '022', 'Juan Aldama', 1),
(2428, 32, '023', 'Juchipila', 1),
(2429, 32, '024', 'Loreto', 1),
(2430, 32, '025', 'Luis Moya', 1),
(2431, 32, '026', 'Mazapil', 1),
(2432, 32, '027', 'Melchor Ocampo', 1),
(2433, 32, '028', 'Mezquital del Oro', 1),
(2434, 32, '029', 'Miguel Auza', 1),
(2435, 32, '030', 'Momax', 1),
(2436, 32, '031', 'Monte Escobedo', 1),
(2437, 32, '032', 'Morelos', 1),
(2438, 32, '033', 'Moyahua de Estrada', 1),
(2439, 32, '034', 'Nochistlán de Mejía', 1),
(2440, 32, '035', 'Noria de Ángeles', 1),
(2441, 32, '036', 'Ojocaliente', 1),
(2442, 32, '037', 'Pánuco', 1),
(2443, 32, '038', 'Pinos', 1),
(2444, 32, '039', 'Río Grande', 1),
(2445, 32, '040', 'Sain Alto', 1),
(2446, 32, '041', 'El Salvador', 1),
(2447, 32, '042', 'Sombrerete', 1),
(2448, 32, '043', 'Susticacán', 1),
(2449, 32, '044', 'Tabasco', 1),
(2450, 32, '045', 'Tepechitlán', 1),
(2451, 32, '046', 'Tepetongo', 1),
(2452, 32, '047', 'Teúl de González Ortega', 1),
(2453, 32, '048', 'Tlaltenango de Sánchez Román', 1),
(2454, 32, '049', 'Valparaíso', 1),
(2455, 32, '050', 'Vetagrande', 1),
(2456, 32, '051', 'Villa de Cos', 1),
(2457, 32, '052', 'Villa García', 1),
(2458, 32, '053', 'Villa González Ortega', 1),
(2459, 32, '054', 'Villa Hidalgo', 1),
(2460, 32, '055', 'Villanueva', 1),
(2461, 32, '056', 'Zacatecas', 1),
(2462, 32, '057', 'Trancoso', 1),
(2463, 32, '058', 'Santa María de la Paz', 1);

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
(7, 'ord_2usQgqe8yg2U9FmY4', 1, NULL, NULL, 4, NULL, 1, 230.00, 0.00, 230.00, 100.00, NULL, NULL, 0, 9, '{\"22\":{\"id\":22,\"categoria\":7,\"nombre\":\"fdsdsdsdsdsdsdsds\",\"precio\":130,\"descripcion\":\"fdfdfdfdfdfdfd\",\"imagen\":\"XbLFzU2lqz3sRKQ6hXAf6LHFKY7CPu.png\",\"existencias\":1}}', NULL, NULL, '2023-11-08 22:00:03', '2023-11-08 22:00:03'),
(8, 'ord_2usQkhKVKr8wPcaaG', 1, NULL, NULL, 4, NULL, 1, 230.00, 0.00, 230.00, 100.00, NULL, NULL, 0, 9, '{\"22\":{\"id\":22,\"categoria\":7,\"nombre\":\"fdsdsdsdsdsdsdsds\",\"precio\":130,\"descripcion\":\"fdfdfdfdfdfdfd\",\"imagen\":\"XbLFzU2lqz3sRKQ6hXAf6LHFKY7CPu.png\",\"existencias\":1}}', NULL, NULL, '2023-11-08 22:05:05', '2023-11-08 22:05:05'),
(9, 'ord_2usQq9Peu97y1sppF', 1, NULL, NULL, 4, NULL, 1, 230.00, 0.00, 230.00, 100.00, NULL, NULL, 0, 9, '{\"22\":{\"id\":22,\"categoria\":7,\"nombre\":\"fdsdsdsdsdsdsdsds\",\"precio\":130,\"descripcion\":\"fdfdfdfdfdfdfd\",\"imagen\":\"XbLFzU2lqz3sRKQ6hXAf6LHFKY7CPu.png\",\"existencias\":1}}', NULL, NULL, '2023-11-08 22:10:56', '2023-11-08 22:10:56'),
(10, 'ord_2usQyTUfuKhaNEBgs', 1, NULL, NULL, 4, NULL, 1, 1120.22, 0.00, 1120.22, 100.00, NULL, NULL, 0, 9, '{\"24\":{\"id\":24,\"categoria\":8,\"nombre\":\"Proyecto 4\",\"precio\":1020.22,\"descripcion\":\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitNeque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit\",\"imagen\":\"vk78Qwtc52ORM2Bo4wjQKWRQwPEXBY.jpg\",\"existencias\":1}}', NULL, NULL, '2023-11-08 22:21:48', '2023-11-08 22:21:48'),
(11, 'ord_2usR3q2JABp72mmpt', 1, NULL, NULL, 4, NULL, 1, 1340.22, 0.00, 1340.22, 100.00, NULL, NULL, 0, 9, '{\"15\":{\"id\":15,\"categoria\":7,\"nombre\":\"UNO\",\"precio\":1240.22,\"descripcion\":\"El trozo de texto est\\u00e1ndar de Lorem Ipsum usado desde el a\\u00f1o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \\\"de Finibus Bonorum et Malorum\\\" por Cicero son tambi\\u00e9n reproducidas en su forma original exacta, acompa\\u00f1adas por versiones en Ingl\\u00e9s de la traducci\\u00f3n realizada en 1914 por H. Rackham.\\nsdsdd\",\"imagen\":\"TlR99kUTNhDk9Svn9XmTWSzrO48kN0.png\",\"existencias\":1}}', NULL, NULL, '2023-11-08 22:27:32', '2023-11-08 22:27:32'),
(12, 'ord_2usR4WFCDqmPFYAhS', 1, NULL, NULL, 4, NULL, 1, 1340.22, 0.00, 1340.22, 100.00, NULL, NULL, 0, 9, '{\"15\":{\"id\":15,\"categoria\":7,\"nombre\":\"UNO\",\"precio\":1240.22,\"descripcion\":\"El trozo de texto est\\u00e1ndar de Lorem Ipsum usado desde el a\\u00f1o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \\\"de Finibus Bonorum et Malorum\\\" por Cicero son tambi\\u00e9n reproducidas en su forma original exacta, acompa\\u00f1adas por versiones en Ingl\\u00e9s de la traducci\\u00f3n realizada en 1914 por H. Rackham.\\nsdsdd\",\"imagen\":\"TlR99kUTNhDk9Svn9XmTWSzrO48kN0.png\",\"existencias\":1}}', NULL, NULL, '2023-11-08 22:28:26', '2023-11-08 22:28:26'),
(13, 'ord_2usR7ptL9hvsFvWCh', 1, NULL, NULL, 4, NULL, 1, 230.00, 0.00, 230.00, 100.00, NULL, NULL, 0, 9, '{\"22\":{\"id\":22,\"categoria\":7,\"nombre\":\"fdsdsdsdsdsdsdsds\",\"precio\":130,\"descripcion\":\"fdfdfdfdfdfdfd\",\"imagen\":\"XbLFzU2lqz3sRKQ6hXAf6LHFKY7CPu.png\",\"existencias\":1}}', NULL, NULL, '2023-11-08 22:32:47', '2023-11-08 22:32:47'),
(14, 'ord_2usS64AjM5TnvYpMA', 1, NULL, NULL, 4, NULL, 1, 330.23, 0.00, 330.23, 100.00, NULL, NULL, 0, 9, '{\"23\":{\"id\":23,\"categoria\":7,\"nombre\":\"producto 3\",\"precio\":230.23,\"descripcion\":\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitNeque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitNeque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit\",\"imagen\":\"U7VRTQm1rKb9nfvYHe4n8WyDXuMAxW.jpg\",\"existencias\":1}}', NULL, NULL, '2023-11-08 23:46:25', '2023-11-08 23:46:25'),
(15, 'ord_2usS82sQZRZPzFKAU', 1, NULL, NULL, 4, NULL, 1, 1340.22, 0.00, 1340.22, 100.00, NULL, NULL, 0, 9, '{\"15\":{\"id\":15,\"categoria\":7,\"nombre\":\"UNO\",\"precio\":1240.22,\"descripcion\":\"El trozo de texto est\\u00e1ndar de Lorem Ipsum usado desde el a\\u00f1o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \\\"de Finibus Bonorum et Malorum\\\" por Cicero son tambi\\u00e9n reproducidas en su forma original exacta, acompa\\u00f1adas por versiones en Ingl\\u00e9s de la traducci\\u00f3n realizada en 1914 por H. Rackham.\\nsdsdd\",\"imagen\":\"TlR99kUTNhDk9Svn9XmTWSzrO48kN0.png\",\"existencias\":1}}', NULL, NULL, '2023-11-08 23:48:58', '2023-11-08 23:48:58'),
(16, 'ord_2usS8rAm3Dmt7rZSR', 1, NULL, NULL, 4, NULL, 1, 1120.22, 0.00, 1120.22, 100.00, NULL, NULL, 0, 9, '{\"24\":{\"id\":24,\"categoria\":8,\"nombre\":\"Proyecto 4\",\"precio\":1020.22,\"descripcion\":\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitNeque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit\",\"imagen\":\"vk78Qwtc52ORM2Bo4wjQKWRQwPEXBY.jpg\",\"existencias\":1}}', NULL, NULL, '2023-11-08 23:50:03', '2023-11-08 23:50:03'),
(17, 'ord_2usSARm86rwPcSHgH', 1, NULL, NULL, 4, NULL, 1, 1340.22, 0.00, 1340.22, 100.00, NULL, NULL, 0, 9, '{\"15\":{\"id\":15,\"categoria\":7,\"nombre\":\"UNO\",\"precio\":1240.22,\"descripcion\":\"El trozo de texto est\\u00e1ndar de Lorem Ipsum usado desde el a\\u00f1o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \\\"de Finibus Bonorum et Malorum\\\" por Cicero son tambi\\u00e9n reproducidas en su forma original exacta, acompa\\u00f1adas por versiones en Ingl\\u00e9s de la traducci\\u00f3n realizada en 1914 por H. Rackham.\\nsdsdd\",\"imagen\":\"TlR99kUTNhDk9Svn9XmTWSzrO48kN0.png\",\"existencias\":1}}', NULL, NULL, '2023-11-08 23:52:08', '2023-11-08 23:52:08'),
(18, 'ord_2usSBBGhKhnbbRWnv', 1, NULL, NULL, 4, NULL, 1, 1340.22, 0.00, 1340.22, 100.00, NULL, NULL, 0, 9, '{\"15\":{\"id\":15,\"categoria\":7,\"nombre\":\"UNO\",\"precio\":1240.22,\"descripcion\":\"El trozo de texto est\\u00e1ndar de Lorem Ipsum usado desde el a\\u00f1o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \\\"de Finibus Bonorum et Malorum\\\" por Cicero son tambi\\u00e9n reproducidas en su forma original exacta, acompa\\u00f1adas por versiones en Ingl\\u00e9s de la traducci\\u00f3n realizada en 1914 por H. Rackham.\\nsdsdd\",\"imagen\":\"TlR99kUTNhDk9Svn9XmTWSzrO48kN0.png\",\"existencias\":1}}', NULL, NULL, '2023-11-08 23:53:06', '2023-11-08 23:53:06'),
(19, 'ord_2usSCTtDQm1BgsrkE', 1, NULL, NULL, 4, NULL, 1, 1120.22, 0.00, 1120.22, 100.00, NULL, NULL, 0, 9, '{\"24\":{\"id\":24,\"categoria\":8,\"nombre\":\"Proyecto 4\",\"precio\":1020.22,\"descripcion\":\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitNeque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit\",\"imagen\":\"vk78Qwtc52ORM2Bo4wjQKWRQwPEXBY.jpg\",\"existencias\":1}}', NULL, NULL, '2023-11-08 23:54:47', '2023-11-08 23:54:47'),
(20, 'ord_2usSF7UJPGswjQ8Ls', 1, NULL, NULL, 4, NULL, 1, 1340.22, 0.00, 1340.22, 100.00, NULL, NULL, 0, 9, '{\"15\":{\"id\":15,\"categoria\":7,\"nombre\":\"UNO\",\"precio\":1240.22,\"descripcion\":\"El trozo de texto est\\u00e1ndar de Lorem Ipsum usado desde el a\\u00f1o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \\\"de Finibus Bonorum et Malorum\\\" por Cicero son tambi\\u00e9n reproducidas en su forma original exacta, acompa\\u00f1adas por versiones en Ingl\\u00e9s de la traducci\\u00f3n realizada en 1914 por H. Rackham.\\nsdsdd\",\"imagen\":\"TlR99kUTNhDk9Svn9XmTWSzrO48kN0.png\",\"existencias\":1}}', NULL, NULL, '2023-11-08 23:58:16', '2023-11-08 23:58:16'),
(21, 'ord_2usSNTNceLXMYZR52', 1, NULL, NULL, 4, NULL, 1, 1340.22, 0.00, 1340.22, 100.00, NULL, NULL, 0, 9, '{\"15\":{\"id\":15,\"categoria\":7,\"nombre\":\"UNO\",\"precio\":1240.22,\"descripcion\":\"El trozo de texto est\\u00e1ndar de Lorem Ipsum usado desde el a\\u00f1o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \\\"de Finibus Bonorum et Malorum\\\" por Cicero son tambi\\u00e9n reproducidas en su forma original exacta, acompa\\u00f1adas por versiones en Ingl\\u00e9s de la traducci\\u00f3n realizada en 1914 por H. Rackham.\\nsdsdd\",\"imagen\":\"TlR99kUTNhDk9Svn9XmTWSzrO48kN0.png\",\"existencias\":1}}', NULL, NULL, '2023-11-09 00:07:52', '2023-11-09 00:07:52'),
(22, 'ord_2usSPeT2vbQK9mzN6', 1, NULL, NULL, 4, NULL, 1, 1340.22, 0.00, 1340.22, 100.00, NULL, NULL, 0, 9, '{\"15\":{\"id\":15,\"categoria\":7,\"nombre\":\"UNO\",\"precio\":1240.22,\"descripcion\":\"El trozo de texto est\\u00e1ndar de Lorem Ipsum usado desde el a\\u00f1o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \\\"de Finibus Bonorum et Malorum\\\" por Cicero son tambi\\u00e9n reproducidas en su forma original exacta, acompa\\u00f1adas por versiones en Ingl\\u00e9s de la traducci\\u00f3n realizada en 1914 por H. Rackham.\\nsdsdd\",\"imagen\":\"TlR99kUTNhDk9Svn9XmTWSzrO48kN0.png\",\"existencias\":1}}', NULL, NULL, '2023-11-09 00:09:26', '2023-11-09 00:09:26'),
(23, 'ord_2usSRnkMuXpMLz7Ea', 1, NULL, NULL, 4, NULL, 1, 1340.22, 0.00, 1340.22, 100.00, NULL, NULL, 0, 9, '{\"15\":{\"id\":15,\"categoria\":7,\"nombre\":\"UNO\",\"precio\":1240.22,\"descripcion\":\"El trozo de texto est\\u00e1ndar de Lorem Ipsum usado desde el a\\u00f1o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \\\"de Finibus Bonorum et Malorum\\\" por Cicero son tambi\\u00e9n reproducidas en su forma original exacta, acompa\\u00f1adas por versiones en Ingl\\u00e9s de la traducci\\u00f3n realizada en 1914 por H. Rackham.\\nsdsdd\",\"imagen\":\"TlR99kUTNhDk9Svn9XmTWSzrO48kN0.png\",\"existencias\":1}}', NULL, NULL, '2023-11-09 00:12:13', '2023-11-09 00:12:13'),
(24, 'ord_2usST9sNwsPdFCxev', 1, NULL, NULL, 4, NULL, 1, 1340.22, 0.00, 1340.22, 100.00, NULL, NULL, 0, 9, '{\"15\":{\"id\":15,\"categoria\":7,\"nombre\":\"UNO\",\"precio\":1240.22,\"descripcion\":\"El trozo de texto est\\u00e1ndar de Lorem Ipsum usado desde el a\\u00f1o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \\\"de Finibus Bonorum et Malorum\\\" por Cicero son tambi\\u00e9n reproducidas en su forma original exacta, acompa\\u00f1adas por versiones en Ingl\\u00e9s de la traducci\\u00f3n realizada en 1914 por H. Rackham.\\nsdsdd\",\"imagen\":\"TlR99kUTNhDk9Svn9XmTWSzrO48kN0.png\",\"existencias\":1}}', NULL, NULL, '2023-11-09 00:14:02', '2023-11-09 00:14:02'),
(25, 'ord_2usSUNk2w1RuJMqdN', 1, NULL, NULL, 4, NULL, 1, 1340.22, 0.00, 1340.22, 100.00, NULL, NULL, 0, 9, '{\"15\":{\"id\":15,\"categoria\":7,\"nombre\":\"UNO\",\"precio\":1240.22,\"descripcion\":\"El trozo de texto est\\u00e1ndar de Lorem Ipsum usado desde el a\\u00f1o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \\\"de Finibus Bonorum et Malorum\\\" por Cicero son tambi\\u00e9n reproducidas en su forma original exacta, acompa\\u00f1adas por versiones en Ingl\\u00e9s de la traducci\\u00f3n realizada en 1914 por H. Rackham.\\nsdsdd\",\"imagen\":\"TlR99kUTNhDk9Svn9XmTWSzrO48kN0.png\",\"existencias\":1}}', NULL, NULL, '2023-11-09 00:15:38', '2023-11-09 00:15:38'),
(26, 'ord_2usSdtZrZgJDxRfPz', 1, NULL, NULL, 4, NULL, 1, 1340.22, 0.00, 1340.22, 100.00, NULL, NULL, 0, 9, '{\"15\":{\"id\":15,\"categoria\":7,\"nombre\":\"UNO\",\"precio\":1240.22,\"descripcion\":\"El trozo de texto est\\u00e1ndar de Lorem Ipsum usado desde el a\\u00f1o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \\\"de Finibus Bonorum et Malorum\\\" por Cicero son tambi\\u00e9n reproducidas en su forma original exacta, acompa\\u00f1adas por versiones en Ingl\\u00e9s de la traducci\\u00f3n realizada en 1914 por H. Rackham.\\nsdsdd\",\"imagen\":\"TlR99kUTNhDk9Svn9XmTWSzrO48kN0.png\",\"existencias\":1}}', NULL, NULL, '2023-11-09 00:28:05', '2023-11-09 00:28:05'),
(27, 'ord_2usSepnGEiRbjrsDW', 1, NULL, NULL, 4, NULL, 1, 1340.22, 0.00, 1340.22, 100.00, NULL, NULL, 0, 9, '{\"15\":{\"id\":15,\"categoria\":7,\"nombre\":\"UNO\",\"precio\":1240.22,\"descripcion\":\"El trozo de texto est\\u00e1ndar de Lorem Ipsum usado desde el a\\u00f1o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \\\"de Finibus Bonorum et Malorum\\\" por Cicero son tambi\\u00e9n reproducidas en su forma original exacta, acompa\\u00f1adas por versiones en Ingl\\u00e9s de la traducci\\u00f3n realizada en 1914 por H. Rackham.\\nsdsdd\",\"imagen\":\"TlR99kUTNhDk9Svn9XmTWSzrO48kN0.png\",\"existencias\":1}}', NULL, NULL, '2023-11-09 00:29:19', '2023-11-09 00:29:19'),
(28, 'ord_2usSgmnPQ8uvTVpQ6', 1, NULL, NULL, 4, NULL, 1, 1340.22, 0.00, 1340.22, 100.00, NULL, NULL, 0, 9, '{\"15\":{\"id\":15,\"categoria\":7,\"nombre\":\"UNO\",\"precio\":1240.22,\"descripcion\":\"El trozo de texto est\\u00e1ndar de Lorem Ipsum usado desde el a\\u00f1o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \\\"de Finibus Bonorum et Malorum\\\" por Cicero son tambi\\u00e9n reproducidas en su forma original exacta, acompa\\u00f1adas por versiones en Ingl\\u00e9s de la traducci\\u00f3n realizada en 1914 por H. Rackham.\\nsdsdd\",\"imagen\":\"TlR99kUTNhDk9Svn9XmTWSzrO48kN0.png\",\"existencias\":1}}', NULL, NULL, '2023-11-09 00:31:53', '2023-11-09 00:31:53'),
(29, 'ord_2usShNrMEJXyCNCst', 1, NULL, NULL, 4, NULL, 2, 2580.44, 0.00, 2580.44, 100.00, NULL, NULL, 0, 9, '{\"15\":{\"id\":15,\"categoria\":7,\"nombre\":\"UNO\",\"precio\":1240.22,\"descripcion\":\"El trozo de texto est\\u00e1ndar de Lorem Ipsum usado desde el a\\u00f1o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \\\"de Finibus Bonorum et Malorum\\\" por Cicero son tambi\\u00e9n reproducidas en su forma original exacta, acompa\\u00f1adas por versiones en Ingl\\u00e9s de la traducci\\u00f3n realizada en 1914 por H. Rackham.\\nsdsdd\",\"imagen\":\"TlR99kUTNhDk9Svn9XmTWSzrO48kN0.png\",\"existencias\":2}}', NULL, NULL, '2023-11-09 00:32:39', '2023-11-09 00:32:39'),
(30, 'ord_2usSmQ9FmJQxwZbVS', 1, NULL, NULL, 4, NULL, 1, 1340.22, 0.00, 1340.22, 100.00, NULL, NULL, 0, 9, '{\"15\":{\"id\":15,\"categoria\":7,\"nombre\":\"UNO\",\"precio\":1240.22,\"descripcion\":\"El trozo de texto est\\u00e1ndar de Lorem Ipsum usado desde el a\\u00f1o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \\\"de Finibus Bonorum et Malorum\\\" por Cicero son tambi\\u00e9n reproducidas en su forma original exacta, acompa\\u00f1adas por versiones en Ingl\\u00e9s de la traducci\\u00f3n realizada en 1914 por H. Rackham.\\nsdsdd\",\"imagen\":\"TlR99kUTNhDk9Svn9XmTWSzrO48kN0.png\",\"existencias\":1}}', NULL, NULL, '2023-11-09 00:37:55', '2023-11-09 00:37:55'),
(31, 'ord_2usin6WnmPCSBjbG8', 1, NULL, NULL, 4, NULL, 1, 1340.22, 0.00, 1340.22, 100.00, NULL, NULL, 0, 9, '{\"15\":{\"id\":15,\"categoria\":7,\"nombre\":\"UNO\",\"precio\":1240.22,\"descripcion\":\"El trozo de texto est\\u00e1ndar de Lorem Ipsum usado desde el a\\u00f1o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \\\"de Finibus Bonorum et Malorum\\\" por Cicero son tambi\\u00e9n reproducidas en su forma original exacta, acompa\\u00f1adas por versiones en Ingl\\u00e9s de la traducci\\u00f3n realizada en 1914 por H. Rackham.\\nsdsdd\",\"imagen\":\"TlR99kUTNhDk9Svn9XmTWSzrO48kN0.png\",\"existencias\":1}}', NULL, NULL, '2023-11-09 20:53:55', '2023-11-09 20:53:55'),
(32, 'ord_2usjx5XEpHd7zrX19', 1, NULL, NULL, 4, NULL, 3, 2810.67, 0.00, 2810.67, 100.00, NULL, NULL, 0, 9, '{\"15\":{\"id\":15,\"categoria\":7,\"nombre\":\"UNO\",\"precio\":1240.22,\"descripcion\":\"El trozo de texto est\\u00e1ndar de Lorem Ipsum usado desde el a\\u00f1o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \\\"de Finibus Bonorum et Malorum\\\" por Cicero son tambi\\u00e9n reproducidas en su forma original exacta, acompa\\u00f1adas por versiones en Ingl\\u00e9s de la traducci\\u00f3n realizada en 1914 por H. Rackham.\\nsdsdd\",\"imagen\":\"TlR99kUTNhDk9Svn9XmTWSzrO48kN0.png\",\"existencias\":2},\"23\":{\"id\":23,\"categoria\":7,\"nombre\":\"producto 3\",\"precio\":230.23,\"descripcion\":\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitNeque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitNeque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit\",\"imagen\":\"U7VRTQm1rKb9nfvYHe4n8WyDXuMAxW.jpg\",\"existencias\":1}}', NULL, NULL, '2023-11-09 22:22:56', '2023-11-09 22:22:56'),
(33, 'ord_2ut4rMkzw3AmcsnYe', 1, NULL, NULL, 4, NULL, 3, 3820.66, 0.00, 3820.66, 100.00, NULL, NULL, 0, 9, '{\"15\":{\"id\":15,\"categoria\":7,\"nombre\":\"UNO\",\"precio\":1240.22,\"descripcion\":\"El trozo de texto est\\u00e1ndar de Lorem Ipsum usado desde el a\\u00f1o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \\\"de Finibus Bonorum et Malorum\\\" por Cicero son tambi\\u00e9n reproducidas en su forma original exacta, acompa\\u00f1adas por versiones en Ingl\\u00e9s de la traducci\\u00f3n realizada en 1914 por H. Rackham.\\nsdsdd\",\"imagen\":\"TlR99kUTNhDk9Svn9XmTWSzrO48kN0.png\",\"presentacion\":\"30KG\",\"existencias\":\"3\"}}', NULL, NULL, '2023-11-10 22:18:22', '2023-11-10 22:18:22'),
(34, 'ord_2ut57UFpQtLSYB166', 1, NULL, NULL, 4, NULL, 2, 2580.44, 0.00, 2580.44, 100.00, NULL, NULL, 0, 9, '{\"15\":{\"id\":15,\"categoria\":7,\"nombre\":\"UNO\",\"precio\":1240.22,\"descripcion\":\"El trozo de texto est\\u00e1ndar de Lorem Ipsum usado desde el a\\u00f1o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \\\"de Finibus Bonorum et Malorum\\\" por Cicero son tambi\\u00e9n reproducidas en su forma original exacta, acompa\\u00f1adas por versiones en Ingl\\u00e9s de la traducci\\u00f3n realizada en 1914 por H. Rackham.\\nsdsdd\",\"imagen\":\"TlR99kUTNhDk9Svn9XmTWSzrO48kN0.png\",\"presentacion\":\"40KG\",\"existencias\":\"2\"}}', NULL, NULL, '2023-11-10 22:38:11', '2023-11-10 22:38:11'),
(35, 'ord_2ut5PebiSQ17EfF67', 1, NULL, NULL, 4, NULL, 2, 2580.44, 0.00, 2580.44, 100.00, NULL, NULL, 0, 9, '{\"15\":{\"id\":15,\"categoria\":7,\"nombre\":\"UNO\",\"precio\":1240.22,\"descripcion\":\"El trozo de texto est\\u00e1ndar de Lorem Ipsum usado desde el a\\u00f1o 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \\\"de Finibus Bonorum et Malorum\\\" por Cicero son tambi\\u00e9n reproducidas en su forma original exacta, acompa\\u00f1adas por versiones en Ingl\\u00e9s de la traducci\\u00f3n realizada en 1914 por H. Rackham.\\nsdsdd\",\"imagen\":\"TlR99kUTNhDk9Svn9XmTWSzrO48kN0.png\",\"presentacion\":\"40KG\",\"existencias\":\"2\"}}', NULL, NULL, '2023-11-10 22:59:22', '2023-11-10 22:59:22');

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
(1, 'Aviso de Privacidad', '<p>Dato</p>', NULL, NULL, '2024-01-16 23:28:08'),
(2, 'Métodos de Pago', NULL, NULL, NULL, NULL),
(3, 'Devoluciones', NULL, NULL, NULL, NULL),
(4, 'Terminos y Condiciones', '<p>Dato</p>', NULL, NULL, '2024-01-16 23:28:01'),
(5, 'Garantias', NULL, NULL, NULL, NULL),
(6, 'Políticas de Envio', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentaciones_productos`
--

CREATE TABLE `presentaciones_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `presentacion` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(14, 'Impermeabilizante', 'LzXRdnvR3auU9TrHDx76eQvV3R53lr.png', NULL, '2023-11-16 21:56:59', '2023-11-16 23:20:29'),
(15, 'Adhesivos de concreto', 'i3pRSMlRgNCUnJTRvxcwhWmIwjgwxk.png', NULL, '2023-11-16 21:57:46', '2023-11-16 23:20:44'),
(16, 'Auxiliares y aditivos de concreto', 'zSTuNClXnWLulogjsvCQQDvX0vX4kf.png', NULL, '2023-11-16 21:58:08', '2023-11-16 23:20:58'),
(17, 'Grounts y anclajes', 'qaeLcT3zMM5HEUePLfYOCitwnoJgOx.png', NULL, '2023-11-16 21:58:30', '2023-11-16 23:21:10'),
(18, 'Selladores y resanadores', 'B0KOqpzwgdXO6IKaOftOrs6dVhTQtf.png', NULL, '2023-11-16 21:58:49', '2023-11-16 23:21:25'),
(19, 'Otra categoria', 'PtaaBpkVD1eEqzb3ZmDykYa9JavCNG.png', NULL, '2023-11-16 21:59:04', '2023-11-16 23:21:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_f_galerias`
--

CREATE TABLE `p_f_galerias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `galeria` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_f_galeria_producto_imagenes`
--

CREATE TABLE `p_f_galeria_producto_imagenes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `galeria` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Volcado de datos para la tabla `p_f_necesidades`
--

INSERT INTO `p_f_necesidades` (`id`, `tipo_sector`, `sector`, `necesidades`, `created_at`, `updated_at`) VALUES
(1, 1, 'hogar', 'Lorem, Lorem ipsum dolor sit amet. ipsum dolor sit amet consectetur adipisicing elit. Facere ducimus sed deserunt, porro nam voluptatem.sdsdsd', '2023-10-31 00:56:22', '2023-10-31 04:12:12'),
(2, 1, 'hogar', 'Lorem, Lorem ipsum dolor sit amet. ipsum dolor sit amet consectetur adipisicing elit. Facere ducimus sed deserunt, porro nam voluptatem.', '2023-10-31 02:24:17', '2023-10-31 02:24:17'),
(3, 2, 'privado', 'Lorem, Lorem ipsum dolor sit amet. ipsum dolor sit amet consectetur adipisicing elit. Facere ducimus sed deserunt, porro nam voluptatem.sdsdsds', '2023-10-31 02:24:28', '2023-10-31 04:12:13'),
(5, 2, 'privado', 'Lorem, Lorem ipsum dolor sit amet. ipsum dolor sit amet consectetur adipisicing elit. Facere ducimus sed deserunt, porro nam voluptatem.', '2023-10-31 02:24:42', '2023-10-31 02:24:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_f_presentacion_productos`
--

CREATE TABLE `p_f_presentacion_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `presentacion` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `p_f_presentacion_productos`
--

INSERT INTO `p_f_presentacion_productos` (`id`, `producto`, `presentacion`, `created_at`, `updated_at`) VALUES
(32, 28, '10kg', '2023-11-16 22:03:32', '2023-11-16 22:03:32'),
(33, 28, '20kg', '2023-11-16 22:03:33', '2023-11-16 22:03:33'),
(34, 28, '30kg', '2023-11-16 22:03:33', '2023-11-16 22:03:33'),
(35, 29, '10kg', '2023-11-16 22:05:51', '2023-11-16 22:05:51'),
(36, 30, '10', '2023-11-16 22:06:42', '2023-11-16 22:06:42'),
(37, 31, '10kg', '2023-11-16 22:07:15', '2023-11-16 22:07:15');

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
  `inicio` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `p_f_productos`
--

INSERT INTO `p_f_productos` (`id`, `categoria`, `nombre`, `precio`, `descripcion`, `existencias`, `presentacion`, `imagen`, `inicio`, `created_at`, `updated_at`) VALUES
(28, 14, 'Fester CR-66', 2299.00, 'Impermeabilizante elastomérico base agua de secado rápido\r\n\r\nFester A es un impermeabilizante elastomérico que debido a su tecnología de rápido secado, permite hacer la impermeabilización completa en un solo día. Es elaborado a base de resinas acrílicas, pigmentos inorgánicos, agregados minerales y aditivos especiales que le proporcionan secado rápido, excelentes características de impermeabilidad, resistencia a rayos UV, adherencia en superficie humeda, etc.', 20, NULL, 'Fvootlr5PsrzDmoSWojiT6L5ahwX8V.png', 1, '2023-11-16 22:03:32', '2023-11-16 23:16:31'),
(29, 14, 'Fester CR-66', 2299.00, 'Impermeabilizante elastomérico base agua de secado rápido\r\n\r\nFester A es un impermeabilizante elastomérico que debido a su tecnología de rápido secado, permite hacer la impermeabilización completa en un solo día. Es elaborado a base de resinas acrílicas, pigmentos inorgánicos, agregados minerales y aditivos especiales que le proporcionan secado rápido, excelentes características de impermeabilidad, resistencia a rayos UV, adherencia en superficie humeda, etc.', 10, NULL, 'u0sV0uVkpMK3LTPNnpaj5VJkS31yl9.png', 1, '2023-11-16 22:05:51', '2023-11-16 23:16:32'),
(30, 15, 'Fester CR-66', 2299.00, 'Impermeabilizante elastomérico base agua de secado rápido\r\n\r\nFester A es un impermeabilizante elastomérico que debido a su tecnología de rápido secado, permite hacer la impermeabilización completa en un solo día. Es elaborado a base de resinas acrílicas, pigmentos inorgánicos, agregados minerales y aditivos especiales que le proporcionan secado rápido, excelentes características de impermeabilidad, resistencia a rayos UV, adherencia en superficie humeda, etc.', 10, NULL, '4QwgzIl29qbb7BZwSssv9hFxBRekSm.png', 1, '2023-11-16 22:06:42', '2023-11-16 23:16:33'),
(31, 16, 'Fester CR-66', 2299.00, 'Impermeabilizante elastomérico base agua de secado rápido\r\n\r\nFester A es un impermeabilizante elastomérico que debido a su tecnología de rápido secado, permite hacer la impermeabilización completa en un solo día. Es elaborado a base de resinas acrílicas, pigmentos inorgánicos, agregados minerales y aditivos especiales que le proporcionan secado rápido, excelentes características de impermeabilidad, resistencia a rayos UV, adherencia en superficie humeda, etc.', 350, NULL, 'WNpRl4mNSDTKAfTHfQQ0MekX9W3l4r.png', 1, '2023-11-16 22:07:15', '2023-11-16 23:16:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_f_proyectos`
--

CREATE TABLE `p_f_proyectos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `imagen` text DEFAULT NULL,
  `aux` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `p_f_proyectos`
--

INSERT INTO `p_f_proyectos` (`id`, `titulo`, `imagen`, `aux`, `created_at`, `updated_at`) VALUES
(11, 'NOMBRE DEL PROYECTO', 'cRZ8rxEwZezOsM62i0t0Ge8c8LYJvV.png', NULL, '2023-10-27 23:01:15', '2023-11-16 23:14:07'),
(12, 'NOMBRE DEL PROYECTO', '8S5lj7T5t9136dd2maoDZuUrVdjclX.png', NULL, '2023-10-27 23:05:47', '2023-11-16 23:14:44'),
(14, 'NOMBRE DEL PROYECTO', 'GNlpiawp0NkhTJisWU1ZbIxQW8pTaN.png', NULL, '2023-10-27 23:06:14', '2023-11-16 23:14:57'),
(15, 'NOMBRE DEL PROYECTO', 'Nk57FTjHaQJAh3Lwzn5PzWMbr7cSX8.png', NULL, '2023-10-27 23:06:27', '2023-11-16 23:15:42'),
(16, 'NOMBRE DEL PROYECTO', 'hrKZtKq5J534xYZRcRArEGAhipHnwT.png', NULL, '2023-10-27 23:06:39', '2023-11-16 23:15:51'),
(18, 'NOMBRE DEL PROYECTO', 'MvYNO8oyyXoI5ghL7v9xwWTTBpfpTW.png', NULL, '2023-11-07 00:07:48', '2023-11-16 23:16:02');

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

--
-- Volcado de datos para la tabla `p_f_punto_ventas`
--

INSERT INTO `p_f_punto_ventas` (`id`, `direccion`, `codigo_postal`, `ciudad`, `estado`, `mapa`, `street_view`, `aux`, `created_at`, `updated_at`) VALUES
(1, 'Av. Siempre viva 2223', '44331', 'Guadalajara', 'Jalisco', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.6744194802013!2d-103.39920042400838!3d20.642123600944444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ae0ed241a9bb%3A0xbb4c3906c38265fd!2sWozial%20Marketing%20Lovers!5e0!3m2!1ses-419!2smx!4v1698685546354!5m2!1ses-419!2smx\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, NULL, '2023-10-30 23:29:42', '2023-10-31 21:10:39'),
(3, 'Av. nueva', '33221', 'Guadalajra', 'Jalisco', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.7426822062457!2d-103.40595622400834!3d20.639342701038224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428adca953bffff%3A0xd79751756eb1ae92!2sCodeation%20Studio%20S.A.S%20de%20C.V.!5e0!3m2!1ses-419!2smx!4v1699294267417!5m2!1ses-419!2smx\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, NULL, '2023-11-07 00:11:38', '2023-11-07 00:11:38'),
(4, 'Av. Bonita', '33442', 'Zapopan', 'Jalisco', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.1847648684043!2d-103.44567591385768!3d20.662060751031845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428aea94a0b5af5%3A0x9638b3c7e65a7b39!2sMetropolitano%2C%20P.%C2%BA%20del%20Sereno%2C%20Parque%20Sereno%2C%20Rinconada%20del%20Parque%2C%2045030%20Zapopan%2C%20Jal.!5e0!3m2!1ses-419!2smx!4v1699294349332!5m2!1ses-419!2smx\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, NULL, '2023-11-07 00:12:34', '2023-11-07 00:12:34'),
(5, 'Av. Cruz del Sur 4432', '44332', 'Zapopan', 'Jalisco', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.8018701532483!2d-103.39918672400839!3d20.636931201119786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428adb64a35fbd7%3A0x6752e678b55f41f5!2sLittle%20Caesars%20Pizza!5e0!3m2!1ses-419!2smx!4v1699294401890!5m2!1ses-419!2smx\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, NULL, '2023-11-07 00:13:52', '2023-11-07 00:13:52'),
(6, 'Av. Auxiliar', '23233', 'Zapopan', 'Jalisco', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.7426822062457!2d-103.40595622400834!3d20.639342701038224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428adca953bffff%3A0xd79751756eb1ae92!2sCodeation%20Studio%20S.A.S%20de%20C.V.!5e0!3m2!1ses-419!2smx!4v1699294267417!5m2!1ses-419!2smx\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, NULL, '2023-11-16 22:09:04', '2023-11-16 22:09:04');

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

--
-- Volcado de datos para la tabla `p_f_slider_principals`
--

INSERT INTO `p_f_slider_principals` (`id`, `titulo`, `texto`, `foto`, `created_at`, `updated_at`) VALUES
(9, 'PEPE FESTER ES TU AMIGO APLICADOR', 'The following class is enough to create both a Relay-compatible GraphQL server and a hypermedia API supporting modern REST formats (JSON-LD, JSONAPI...):ypermedia API supporting modern RE\nypermedia API supporting modern RE', '6NXq68nBbSI9aAbNKOs9j9n9JZflPI.png', '2023-11-11 04:26:03', '2023-11-11 04:31:59'),
(10, 'PEPE FESTER ES TU AMIGO APLICADOR 2', 'The following class is enough to create both a Relay-compatible GraphQL server and a hypermedia API supporting modern REST formats (JSON-LD, JSONAPI...):', 'f44UOZwl9JBmsYEavwSVG6wGnmv4gh.png', '2023-11-11 04:26:56', '2023-11-11 04:27:47'),
(11, 'PEPE FESTER ES TU AMIGO APLICADOR 3', 'The following class is enough to create both a Relay-compatible GraphQL server and a hypermedia API supporting modern REST formats (JSON-LD, JSONAPI...):', 'nH4a09NMHucY96YGBdEjF0X31dMXM0.png', '2023-11-11 04:27:34', '2023-11-11 04:27:51');

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

--
-- Volcado de datos para la tabla `p_f_solucions`
--

INSERT INTO `p_f_solucions` (`id`, `icono`, `imagen`, `titulo`, `descripcion`, `created_at`, `updated_at`) VALUES
(8, 'mjmNFVFRCtIzg7NZJdtS0BzVIY7XL7.png', 'x0UspBh8OKzT2obTcpimBwvSwjcTGY.png', 'SOLUCIÓN 1', 'dsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsds', '2023-10-30 21:38:10', '2023-11-16 23:24:50'),
(9, 'UcRoPzMKZaiWIxhCoCzMQdoy1w7x2E.png', 'ddgbZs15CYgCdc69miWJ3amI0MgCax.png', 'SOLUCIÓN 2', 'ddddddddddddd ssssssssssssssssssssss sddddddddddd', '2023-10-30 21:45:03', '2023-11-16 23:24:52'),
(10, 'fLixbGOSL44J4nYQkSAzoJWGHZTCZf.png', 'YjtEXXU1f4QHo8lAGSdFv12Sd89FgY.png', 'SOLUCIÓN 3', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitNeque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit', '2023-11-07 00:10:32', '2023-11-16 23:24:46'),
(11, 'MceUNadHGRrxs5NbkgqIPQ00VgdM1D.png', 'QCSjRrKIiPd479zUKJJNEjDQmdw2iK.png', 'SOLUCIÓN 4', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', '2023-11-16 23:23:39', '2023-11-16 23:23:39'),
(12, 'I4YZ6pj8dJzpibZLoXFrvu5iN755Hh.png', 'rYyaUQrdeCkEaNUbVsx7wacIIAvVsc.png', 'SOLUCIÓN 5', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', '2023-11-16 23:24:12', '2023-11-16 23:24:12'),
(13, 'MG5mKBXoOMMFVKz9wkUdj649CFpVZk.png', 'Kd9a6FxRgROfbaNa9zACaQEuOdRt8W.png', 'SOLUCION 6', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', '2023-11-16 23:24:30', '2023-11-16 23:24:30');

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

--
-- Volcado de datos para la tabla `p_f_subdistribuidors`
--

INSERT INTO `p_f_subdistribuidors` (`id`, `beneficio`, `created_at`, `updated_at`) VALUES
(1, 'Lorem, Lorem ipsum dolor sit amet. ipsum dolor sit amet consectetur adipisicing elit. Facere ducimus sed deserunt, porro nam voluptatem.34343443', '2023-10-31 00:27:31', '2023-10-31 04:03:39'),
(2, 'Lorem, Lorem ipsum dolor sit amet. ipsum dolor sit amet consectetur adipisicing elit. Facere ducimus sed deserunt, porro nam voluptatem.', '2023-10-31 00:28:19', '2023-10-31 00:28:19'),
(3, 'Lorem, Lorem ipsum dolor sit amet. ipsum dolor sit amet consectetur adipisicing elit. Facere ducimus sed deserunt, porro nam voluptatem.', '2023-10-31 00:28:25', '2023-10-31 00:28:25');

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
(3, 'proyectos', 'fas fa-shield', 'proyects'),
(4, 'contacto', 'fa-solid fa-envelope', 'contact'),
(5, 'servicios', 'fa-solid fa-check', 'services'),
(7, 'vacantes', 'fa-solid fa-business-time', 'vacants'),
(8, 'nosotros', 'fa-solid fa-paperclip', 'aboutus'),
(9, 'blog', 'fas fa-archway', 'blog'),
(10, 'sucursales', 'fa-solid fa-location-dot', 'sucursals'),
(11, 'trabajo', 'fa-solid fa-briefcase', 'work');

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
-- Estructura de tabla para la tabla `sucursal_fotos`
--

CREATE TABLE `sucursal_fotos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `id_municipio` int(11) DEFAULT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(9, 'Michael Eduardo', 'Sandoval Pérez', NULL, 'mikeed1998@gmail.com', NULL, '3322932239', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, 1, NULL, '$2y$10$61e9mxpY9Hvf.e8erqub0OEFi0vHUUM0wLmazHHo9EDRgW3JkmhFC', NULL, '2023-10-19 23:29:07', '2023-10-19 23:59:20', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_beneficios`
--

CREATE TABLE `z_beneficios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `beneficio` varchar(255) DEFAULT NULL,
  `icono` text DEFAULT NULL,
  `color` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `z_beneficios`
--

INSERT INTO `z_beneficios` (`id`, `beneficio`, `icono`, `color`, `created_at`, `updated_at`) VALUES
(6, 'HORARIOS FLEXIBLES', 'ReX4PYKnDdCypAzdEgbmPHOSADTdn3.png', '#cde700', '2023-12-22 03:44:01', '2023-12-22 03:44:01'),
(7, 'AMBIENTE LABORAL POSITIVO', 'Y908E41akLcAJrbfo0qp7vljRCpDko.png', '#ccaeec', '2023-12-22 03:44:25', '2023-12-22 03:44:25'),
(8, 'SEGURO DE VIDA / SEGURO MÉDICO', 'uN7BSHRVj0k71Tj77RWcw6AXNcgCTj.png', '#fe6e63', '2023-12-22 03:45:47', '2023-12-22 03:45:47'),
(9, 'PRESTACIONES DE LEY', 'I76FWNvUwvq0MKsUDzipjY5yEu8rSZ.png', '#a2e9ff', '2023-12-22 03:46:47', '2023-12-22 03:46:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_blogs`
--

CREATE TABLE `z_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `resumen` text DEFAULT NULL,
  `portada` text DEFAULT NULL,
  `post` text DEFAULT NULL,
  `color` text NOT NULL,
  `whatsapp` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `z_blogs`
--

INSERT INTO `z_blogs` (`id`, `titulo`, `resumen`, `portada`, `post`, `color`, `whatsapp`, `facebook`, `instagram`, `created_at`, `updated_at`) VALUES
(8, 'Acerca de este primer post', 'Entrada de este nuevo post', '20231229172123.png', '<p>Descripción del tema</p>', '#e5ff24', NULL, NULL, NULL, '2023-12-29 23:01:16', '2024-01-04 01:07:50'),
(9, '¿Acerca de las entradas de este blog?', 'El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.', '20231229172604.png', '<p>Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.</p>', '#7598ff', NULL, NULL, NULL, '2023-12-29 23:26:05', '2024-01-04 01:08:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_clientes`
--

CREATE TABLE `z_clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `z_clientes`
--

INSERT INTO `z_clientes` (`id`, `logo`, `created_at`, `updated_at`) VALUES
(3, 'Xzr8qLmYe0oX9EAjpotLCIyiuXGo4a.png', '2023-12-28 03:13:47', '2023-12-28 03:13:47'),
(4, 'dDQOoH0ULlFVaJ37a0yPs5NX6ncFGE.png', '2023-12-28 03:14:18', '2023-12-28 03:14:18'),
(5, 'DQRNFWOyAWbqZ0jKeqoq1BAmEFKtXN.png', '2023-12-28 03:14:38', '2023-12-28 03:14:38'),
(6, 'vSwk0RApyevBdJeB5V22NWts9iCoa5.png', '2023-12-28 03:14:53', '2023-12-28 03:14:53'),
(7, 'lJ23cv6dNc68XtK8qkdT9oPX7K4c8n.png', '2023-12-28 03:15:08', '2023-12-28 03:15:08'),
(8, 'DNrxWRs5VVJNTME7MZGyy6MP2gewd3.png', '2023-12-28 22:24:06', '2023-12-28 22:24:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_frases`
--

CREATE TABLE `z_frases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `frase` varchar(255) DEFAULT NULL,
  `imagen` text DEFAULT NULL,
  `aux` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `z_frases`
--

INSERT INTO `z_frases` (`id`, `frase`, `imagen`, `aux`, `created_at`, `updated_at`) VALUES
(2, 'Tu campaña merece la mejor ubicación', '20240216214707.png', NULL, '2024-02-17 03:47:07', '2024-02-17 04:11:21'),
(3, 'Diariamente millones de consumidores circulan por nuestras ubicaciones', '20240216215103.png', NULL, '2024-02-17 03:51:03', '2024-02-17 03:51:03'),
(4, 'Ponemos tu publicidad en lo más alto', '20240216215119.png', NULL, '2024-02-17 03:51:19', '2024-02-17 03:51:19'),
(5, '75% de las personas recuerdan las marcas', '20240216215136.png', NULL, '2024-02-17 03:51:36', '2024-02-17 03:51:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_proyectos`
--

CREATE TABLE `z_proyectos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `servicio` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `portado` text DEFAULT NULL,
  `color` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `z_proyectos`
--

INSERT INTO `z_proyectos` (`id`, `servicio`, `titulo`, `descripcion`, `portado`, `color`, `created_at`, `updated_at`) VALUES
(13, 7, 'Cartelera en Puebla #1', 'ATLIXCAYOTL', '20240103171821.jpg', '#d0a3ff', '2024-01-03 23:18:21', '2024-01-04 00:33:49'),
(14, 7, 'Cartelera en Puebla #2', 'CALZADA ZAVALETA', '20240103171854.jpg', '#ccaeec', '2024-01-03 23:18:55', '2024-01-03 23:18:55'),
(15, 7, 'Cartelera en Puebla #3', 'PERIFERICO Y WALMART', '20240103171927.jpg', '#ccaeec', '2024-01-03 23:19:27', '2024-01-03 23:19:27'),
(20, 16, 'Puente en Puebla #1', '14 SUR Y PERIFERICO', '20240103172337.jpg', '#ccaeec', '2024-01-03 23:23:38', '2024-01-03 23:23:38'),
(21, 16, 'Puente en Puebla #2', 'AMALUCAN', '20240103172417.jpg', '#ccaeec', '2024-01-03 23:24:17', '2024-01-03 23:24:17'),
(22, 16, 'Puente en Puebla #3', 'RECTA CHOLULA', '20240103172458.jpg', '#ccaeec', '2024-01-03 23:24:58', '2024-01-03 23:24:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_servicios`
--

CREATE TABLE `z_servicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `descripcion2` text DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `portada` text DEFAULT NULL,
  `imagen` text DEFAULT NULL,
  `color` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `z_servicios`
--

INSERT INTO `z_servicios` (`id`, `titulo`, `descripcion`, `descripcion2`, `orden`, `portada`, `imagen`, `color`, `created_at`, `updated_at`) VALUES
(7, 'CARTELERA', 'Somos un medio de alta exposición y gran impacto con alto flujo vehicular. Tenemos carteleras en las principales avenidas del país logrando una visualización del medio forzosa. Contamos con más de 3500 caras de exhibición, estructuras de calidad, iluminadas, con altura y posicion, logrando el mayor impacto visual.', 'Diariamente millones de consumidores circulan por nuestras ubicaciones somos un medio de alta exposición.', 1, NULL, '20240103170059.png', '#cde700', '2023-12-21 21:35:10', '2024-01-04 00:28:05'),
(10, 'MUROS', 'Se ubican en areas primarias y/o secundarias.\nMedio de gran impacto.\nClaros y visibles.\nDimensiones amplias.\nPublicidad permanente.\nImpacto visual directo.', 'Publicidad con visibilidad incomparable, libre de contaminación visual.', 4, NULL, '20240103170140.png', '#a2e9ff', '2023-12-21 21:41:55', '2024-01-04 00:32:02'),
(11, 'AUTOBUSES', 'Segmentación por rutas conforme a las necesidades de campañas y público objetivo. Se convierte en una valla en movimiento, impactando tanto a peatones como a automovilistas.', 'Es efectiva y económica, llevando un mensaje a un amplio público repetidamente y de manera constante.Circula de lunes a domingo hasta 16 horas dirias.', 5, NULL, '20240103170151.png', '#3bc444', '2023-12-21 21:43:41', '2024-01-04 00:29:39'),
(12, 'VALLA MOVIL', 'Es un medio utilizado en ciudades y zonas donde otros formatos publicitarios no tienen cobertura. Con gran número de impactos, debido a que transmite un mensaje con exposición repetida.', 'Se puede definir la ruta que desean recorrer, impactando a automovilistas, peatones y consumidores finales. Este medio es muy eficiente para caravanas, aperturas, promociones, eventos, reclutamientos, entre otros.', 6, NULL, '20240103170203.png', '#a8a4a4', '2023-12-21 21:44:06', '2024-01-04 00:30:25'),
(13, 'MUPIS', 'Gran visibilidad por estar en puntos de alta concurrencia, dando oportunidad al público de ver la publicidad con tiempo.', 'Publicidad llamativa, de impacto y bajo costo. Son utilizados como puntos de información, por lo que es eficaz en campañas con detalles de eventos o productos.', 7, NULL, '20240103170218.png', '#eeff00', '2023-12-21 21:44:34', '2024-01-04 00:30:54'),
(16, 'PUENTES', 'Somos un medio de gran impacto en las principales avenidas ya que su vista central permite tener la mejor vista y un mejor remate visual.', 'Aumentamos el impacto visual en exhibición con puentes de doble medida y copetes que generen atraer la atención.', 2, NULL, '20240103170117.png', '#ccaeec', '2023-12-29 22:28:13', '2024-01-04 00:28:26'),
(17, 'PANTALLA DIGITAL', 'Poder de atracción.\r\nDiversidad de usos.\r\nEnriquecimiento de marca.\r\nMejora en la experiencia de compra\r\nComunicacion visual de vanguardia, de alta calidad, intuitivas, funcionales y viables.', 'Son pantallas de alta resolución para la proyección de publicidad efectiva.', 3, NULL, '20240103183100.png', '#f25050', '2024-01-04 00:31:01', '2024-01-04 00:31:21'),
(18, 'NUEVO SERVICIO', 'sa ds dse dsds sdsd dsdsdsdsd sdsdsdsdsds dsdsdsdsds sdsdsd sdsdsdsdsd ddssa ds dse dsds sdsd dsdsdsdsd sdsdsdsdsds dsdsdsdsds sdsdsd sdsdsdsdsd dds', 'sa ds dse dsds sdsd dsdsdsdsd sdsdsdsdsds dsdsdsdsds sdsdsd sdsdsdsdsd ddssa ds dse dsds sdsd dsdsdsdsd sdsdsdsdsds dsdsdsdsds sdsdsd sdsdsdsdsd dds', 1, NULL, '20240208165103.jpg', '#ccaeec', '2024-02-08 22:51:03', '2024-02-09 02:53:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_slider_principals`
--

CREATE TABLE `z_slider_principals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider` text NOT NULL,
  `orden` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `z_slider_principals`
--

INSERT INTO `z_slider_principals` (`id`, `slider`, `orden`, `created_at`, `updated_at`) VALUES
(12, '20240103165814.png', NULL, '2024-01-03 22:58:16', '2024-01-03 22:58:16'),
(13, '20240103192833.', NULL, '2024-01-04 01:28:34', '2024-01-04 01:28:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_sucursals`
--

CREATE TABLE `z_sucursals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `municipio` int(11) DEFAULT NULL,
  `sucursal` text DEFAULT NULL,
  `coordX` text DEFAULT NULL,
  `coordY` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `z_sucursals`
--

INSERT INTO `z_sucursals` (`id`, `estado`, `municipio`, `sucursal`, `coordX`, `coordY`, `created_at`, `updated_at`) VALUES
(5, 11, 345, 'Huimilpan 229, El Palote, 37130', '21.16872296760271', '-101.68050995254247', '2023-12-26 22:50:39', '2023-12-26 22:50:39'),
(6, 6, 72, 'Pedro Cervantez Vázquez 141, Sta Bárbara, 28017', '19.269488060266635', '-103.71514032040793', '2023-12-27 01:02:41', '2023-12-27 01:02:41'),
(7, 9, 285, 'Bahía de Chachalacas 36, Verónica Anzúres, Miguel Hidalgo, 11300', '19.436499665563684', '-99.17467269023301', '2023-12-27 01:08:40', '2023-12-27 01:08:40'),
(8, 21, 1687, 'Juárez Ote. 813, entre Rio Bravo Norte y Rio Lerma Norte, Santiago Momoxpan, Rafael Ávila Camacho (Manantiales, 72757 Heroica Puebla de Zaragoza, Pue.', '19.079759342997107', '-98.26972580929856', '2023-12-27 01:11:32', '2023-12-27 01:11:32'),
(9, 14, 575, 'Av. Lapizlázuli 2074, 44560.', '20.642154518163267', '-103.39664129383249', '2023-12-29 23:56:26', '2023-12-29 23:56:26'),
(10, 14, 656, 'Av. Mariano Otero 2375, Cd del Sol, 45050 Zapopan.', '20.650229010894382', '-103.40188193045773', '2024-01-04 01:29:35', '2024-01-04 01:29:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_sucursal_fotos`
--

CREATE TABLE `z_sucursal_fotos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sucursal` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `municipio` int(11) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `z_sucursal_fotos`
--

INSERT INTO `z_sucursal_fotos` (`id`, `sucursal`, `estado`, `municipio`, `foto`, `created_at`, `updated_at`) VALUES
(4, 5, 11, 345, '20231229175140.png', '2023-12-29 23:51:41', '2023-12-29 23:51:41'),
(5, 9, 14, 575, '20231229175724.png', '2023-12-29 23:57:27', '2023-12-29 23:57:27'),
(9, 8, 21, 1687, '20231229220056.png', '2023-12-30 04:00:59', '2023-12-30 04:00:59'),
(10, 10, 14, 656, '20240103193020.png', '2024-01-04 01:30:25', '2024-01-04 01:30:25'),
(12, 9, 14, 575, '20240103193131.jpeg', '2024-01-04 01:31:31', '2024-01-04 01:31:31'),
(13, 5, 11, 345, '20240103193750.jpg', '2024-01-04 01:37:50', '2024-01-04 01:37:50'),
(14, 7, 9, 285, '20240103194024.jpeg', '2024-01-04 01:40:25', '2024-01-04 01:40:25'),
(15, 6, 6, 72, '20240103194147.jpeg', '2024-01-04 01:41:47', '2024-01-04 01:41:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_vacantes`
--

CREATE TABLE `z_vacantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `portada` text DEFAULT NULL,
  `color` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `z_vacantes`
--

INSERT INTO `z_vacantes` (`id`, `titulo`, `descripcion`, `orden`, `portada`, `color`, `created_at`, `updated_at`) VALUES
(3, 'Instalador de Lonas', 'Detalles: instalación de lonas en los anuncios espectaculares (trabajo en alturas).\nRequisitos: experiencia no necesaria, disponibilidad de trabajar en alturas, contar con constancia de situación fiscal (RFC).\nSueldo: semanal\nPrestaciones: prestaciones de ley y superiores (seguro de vida, seguro contra accidentes).', 1, 'RO6IAAGRPzc0FNY8sJ5K0NaEk72LDO.png', '#d6efff', '2023-12-22 02:42:40', '2024-01-03 23:06:43'),
(4, 'Jefe de Cuadrilla', 'Detalles: instalación de lonas en los anuncios espectaculares, manejo de unidad de traslado de personal, además de su coordinación\nRequisitos: experiencia en puesto similar, contar con licencia de manejo de auto estándar, trabajo en alturas, manejo de personal, contar con constancia de situación fiscal (rfc).\nSueldo: semanal\nPrestaciones: prestaciones de ley y superiores (seguro de vida, seguro contra accidentes, apoyo de transporte)\nContamos con mas de 3500 caras de exhibición, estructuras de calidad, iluminadas, con altura y posición, logrando el mayor impacto social.', 2, '20240103170653.png', '#a977df', '2023-12-22 02:53:17', '2024-01-03 23:07:41'),
(5, 'Aux. de Mantenimiento', 'Detalles: mantenimiento general a espectaculares (trabajo en alturas)\nRequisitos: deseable el conocimiento básico en electricidad, fontanería, pintura, soldadura, contar con constancia de situación fiscal (rfc).\nSueldo: semanal\nPrestaciones: prestaciones de ley y superiores (seguro de vida, seguro contra accidentes, apoyo de transporte).', 3, 'BxmzocHsOUV0Zi41aMZbdxVHWqjHqW.png', '#dbdbdb', '2023-12-22 02:53:38', '2024-01-03 23:09:13'),
(6, 'Intendente', 'Detalles: limpieza de baños, taller y oficinas.\nRequisitos: experiencia en el puesto, con disponibilidad de tiempo contar con constancia de situación fiscal (rfc).\nSueldo: semanal\nPrestaciones: prestaciones de ley y superiores (seguro de vida, seguro contra accidentes, apoyo de transporte).', 4, 'AYvc3VqD7BVImQTHdvee0DD5IM5XCv.png', '#e6d184', '2023-12-22 02:53:53', '2024-01-03 23:10:42'),
(7, 'Electricista', 'Detalles: trabajos de electricidad y mantenimiento en alturas.\nRequisitos: electricidad básica y trabajo en alturas, contar con constancia de situación fiscal (rfc).\nSueldo: semanal\nPrestaciones: prestaciones de ley y superiores (seguro de vida, seguro contra accidentes, apoyo de transporte).\nContamos con mas de 3500 caras de exhibición, estructuras de calidad, iluminadas, con altura y posición, logrando el mayor impacto social.', 5, 'MfVJLvAVAUCIEdCOQ5Xrrb7MC8W6wg.png', '#2623d7', '2023-12-22 02:56:21', '2024-01-03 23:11:54');

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
-- Indices de la tabla `configuracions`
--
ALTER TABLE `configuracions`
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
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados_municipios`
--
ALTER TABLE `estados_municipios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `estados_id` (`estados_id`,`municipios_id`),
  ADD KEY `municipios_id_refs_id_6d8b23ec` (`municipios_id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `faqs`
--
ALTER TABLE `faqs`
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
-- Indices de la tabla `politicas`
--
ALTER TABLE `politicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `presentaciones_productos`
--
ALTER TABLE `presentaciones_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presentaciones_productos_producto_foreign` (`producto`);

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
-- Indices de la tabla `p_f_galerias`
--
ALTER TABLE `p_f_galerias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_f_galerias_producto_foreign` (`producto`);

--
-- Indices de la tabla `p_f_galeria_producto_imagenes`
--
ALTER TABLE `p_f_galeria_producto_imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_f_galeria_producto_imagenes_producto_foreign` (`producto`);

--
-- Indices de la tabla `p_f_necesidades`
--
ALTER TABLE `p_f_necesidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `p_f_presentacion_productos`
--
ALTER TABLE `p_f_presentacion_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_f_presentaciones_productos_producto_foreign` (`producto`);

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
-- Indices de la tabla `sucursal_fotos`
--
ALTER TABLE `sucursal_fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `z_beneficios`
--
ALTER TABLE `z_beneficios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `z_blogs`
--
ALTER TABLE `z_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `z_clientes`
--
ALTER TABLE `z_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `z_frases`
--
ALTER TABLE `z_frases`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `z_proyectos`
--
ALTER TABLE `z_proyectos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `z_servicios`
--
ALTER TABLE `z_servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `z_slider_principals`
--
ALTER TABLE `z_slider_principals`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `z_sucursals`
--
ALTER TABLE `z_sucursals`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `z_sucursal_fotos`
--
ALTER TABLE `z_sucursal_fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `z_vacantes`
--
ALTER TABLE `z_vacantes`
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
-- AUTO_INCREMENT de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `elementos`
--
ALTER TABLE `elementos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `estados_municipios`
--
ALTER TABLE `estados_municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2458;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `pedido_detalles`
--
ALTER TABLE `pedido_detalles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `politicas`
--
ALTER TABLE `politicas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `presentaciones_productos`
--
ALTER TABLE `presentaciones_productos`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `p_f_galerias`
--
ALTER TABLE `p_f_galerias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `p_f_galeria_producto_imagenes`
--
ALTER TABLE `p_f_galeria_producto_imagenes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `p_f_necesidades`
--
ALTER TABLE `p_f_necesidades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `p_f_presentacion_productos`
--
ALTER TABLE `p_f_presentacion_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `p_f_productos`
--
ALTER TABLE `p_f_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `p_f_proyectos`
--
ALTER TABLE `p_f_proyectos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `p_f_punto_ventas`
--
ALTER TABLE `p_f_punto_ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `p_f_slider_principals`
--
ALTER TABLE `p_f_slider_principals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `p_f_solucions`
--
ALTER TABLE `p_f_solucions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `p_f_subdistribuidors`
--
ALTER TABLE `p_f_subdistribuidors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `seccions`
--
ALTER TABLE `seccions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `sucursal_fotos`
--
ALTER TABLE `sucursal_fotos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `z_beneficios`
--
ALTER TABLE `z_beneficios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `z_blogs`
--
ALTER TABLE `z_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `z_clientes`
--
ALTER TABLE `z_clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `z_frases`
--
ALTER TABLE `z_frases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `z_proyectos`
--
ALTER TABLE `z_proyectos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `z_servicios`
--
ALTER TABLE `z_servicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `z_slider_principals`
--
ALTER TABLE `z_slider_principals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `z_sucursals`
--
ALTER TABLE `z_sucursals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `z_sucursal_fotos`
--
ALTER TABLE `z_sucursal_fotos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `z_vacantes`
--
ALTER TABLE `z_vacantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `presentaciones_productos`
--
ALTER TABLE `presentaciones_productos`
  ADD CONSTRAINT `presentaciones_productos_producto_foreign` FOREIGN KEY (`producto`) REFERENCES `p_f_productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `p_f_galerias`
--
ALTER TABLE `p_f_galerias`
  ADD CONSTRAINT `p_f_galerias_producto_foreign` FOREIGN KEY (`producto`) REFERENCES `p_f_productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `p_f_galeria_producto_imagenes`
--
ALTER TABLE `p_f_galeria_producto_imagenes`
  ADD CONSTRAINT `p_f_galeria_producto_imagenes_producto_foreign` FOREIGN KEY (`producto`) REFERENCES `p_f_productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `p_f_presentacion_productos`
--
ALTER TABLE `p_f_presentacion_productos`
  ADD CONSTRAINT `p_f_presentaciones_productos_producto_foreign` FOREIGN KEY (`producto`) REFERENCES `p_f_productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `p_f_productos`
--
ALTER TABLE `p_f_productos`
  ADD CONSTRAINT `p_f_productos_categoria_foreign` FOREIGN KEY (`categoria`) REFERENCES `p_f_categoria_productos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
