-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2023 a las 16:22:54
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
-- Base de datos: `sap_back`
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
(1, '444', 'Descripcion del sitio', NULL, NULL, 'mikeed1998@gmail.com', '', 'samek_admin@samek.com.mx', 'dEPpdJtRz[N,', 'mail.samek.com.mx', '465', NULL, '3333333333', '32323', '', 'https://www.facebook.com/', 'hola', NULL, NULL, NULL, NULL, NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3735.26095032911!2d-100.3780338847383!3d20.57739830840845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d344c63af2b2af%3A0x8506d3bdeed8e510!2sAv.%20Luis%20Vega%20Monrroy%20901A%2C%20zona%20dos%20extendida%2C%20Plazas%20del%20Sol%201ra%20Secc%2C%2076099%20Santiago%20de%20Quer%C3%A9taro%2C%20Qro.!5e0!3m2!1ses-419!2smx!4v1635149990350!5m2!1ses-419!2smx\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'Avenida Lapizlazuli 2074 int3. Residencial Victoria, Guadalajara, Jalisco, México.', NULL, '2023-11-16 22:49:44');

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
(58, 'fester logo', NULL, 'LAqH3g7AaRNrk3rtkTzA0Mq9TnZvib.png', NULL, 1, 1, 666, 1),
(59, 'fester imagen', NULL, 'wOSsOekkSZRADeST4DuGzMGycKiIRd.png', NULL, 1, 1, 666, 1),
(60, 'fester titulo', 'DISTRIBUIDORES AUTORIZADOS', NULL, NULL, 0, 1, 666, 1),
(61, 'fester texto', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto laboriosam consectetur doloremque. Architecto quae fugiat in assumenda corrupti accusamus nobis eveniet animi. Ut dolores quidem, veniam dolore voluptate eveniet delectus beatae atque rem sapiente temporibus nemo reprehenderitex explicabo provident.', NULL, NULL, 0, 1, 666, 1),
(64, 'contacto texto', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam sit earum unde aspernatur optio, ipsum nesciunt! Molestias, inventore? Error, minima.3233', NULL, NULL, 0, 1, 666, 1),
(65, 'tienda', NULL, NULL, NULL, 0, 1, 666, 2),
(66, 'proyectos texto', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam sit earum unde aspernatur optio, ipsum nesciunt! Molestias, inventore? Error, minima.', NULL, NULL, 0, 1, 666, 3),
(67, 'contacto texto', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores qui sint alias nostrum, voluptatibus nisi!', NULL, NULL, 0, 1, 666, 4),
(68, 'contacto correo', NULL, 'zo4ktx3KsO6Ml6dyDqOqxJizxzTGwc.png', NULL, 0, 1, 666, 1),
(69, 'contacto direccion', NULL, NULL, NULL, 0, 1, 666, 4),
(70, 'contacto telefono', NULL, NULL, NULL, 0, 1, 666, 4),
(71, 'contacto whatsapp', NULL, NULL, NULL, 0, 1, 666, 4),
(72, 'contacto facebook', NULL, NULL, NULL, 0, 1, 666, 4),
(73, 'contacto instagram', NULL, NULL, NULL, 0, 1, 666, 4),
(74, 'contacto mapa', NULL, NULL, NULL, 0, 1, 666, 4),
(75, 'soluciones texto', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', NULL, NULL, 0, 1, 666, 5),
(76, 'punto de venta texto', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto explicabo numquam ipsam quia molestiae veritatis eum corporis hic eos delectus?', NULL, NULL, 0, 1, 666, 6),
(77, 'subdistribuidor portada', NULL, 'U4hx8dJdznPrdSRVdGECy6tGJpMrCD.png', NULL, 1, 1, 666, 7),
(78, 'subdistribuidor texto', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto laboriosam consectetur doloremque. Architecto quae fugiat in assumenda corrupti accusamus nobis eveniet animi. Ut dolores quidem, veniam dolore voluptate eveniet delectus beatae atque rem sapiente temporibus nemo reprehenderit quibusdam consequuntur nam accusamus autem maxime error! Corrupti dicta velit ex explicabo provident.', NULL, NULL, 0, 1, 666, 7),
(79, 'nosotros portada', NULL, 'uyCA6lDTT5Ild7JLpBpmMlJX1A9KAR.png', NULL, 1, 1, 666, 8),
(80, 'nosotros texto', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, non! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam impedit laudantium animi deserunt ullam alias aperiam, amet, consequatur suscipit id quae iusto sint quam explicabo ut modi libero. Recusandae est numquam corporis saepe repellat sunt, tenetur culpa quis suscipit nesciunt quod esse quam facilis ipsam quaerat laudantium, libero consequatur modi.', NULL, NULL, 0, 1, 666, 8),
(83, 'Misión - icono', NULL, 'kjGnbokJlWuQ2mj1gVENGIEGqIVnay.png', NULL, 1, 1, 666, 8),
(84, 'Misión - Imagen', NULL, 'WQofY0ZBhqLziJrvV5X7y9OFEbENO6.png', NULL, 1, 1, 666, 8),
(85, 'Misión - Titulo', 'MISIÓN', NULL, NULL, 0, 1, 666, 8),
(86, 'Misión - Texto', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum in reprehenderit ipsam aliquid, aut consequuntur officia perferendis quod eaque dignissimos!', NULL, NULL, 0, 1, 666, 8),
(87, 'Valores - Icono', NULL, 'htgjl0hRuGIBXzbyuJpAPp09xLvyNb.png', NULL, 1, 1, 666, 8),
(88, 'Valores - Imagen', NULL, 'wzJzSr95yfk6M05IVRunrwayjHbat7.png', NULL, 1, 1, 666, 8),
(89, 'Valores - Titulo', 'VALORES', NULL, NULL, 0, 1, 666, 8),
(90, 'Valores - Texto', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum in reprehenderit ipsam aliquid, aut consequuntur officia perferendis quod eaque dignissimos!', NULL, NULL, 0, 1, 666, 8),
(91, 'Visión - Icono', NULL, '21UKIHPonc3V6NT7eIUdLR16YFYHSP.png', NULL, 1, 1, 666, 8),
(92, 'Visión - Imagen', NULL, 'v4OuWWMXjII7oOh8StCzRQWqWQH3gb.png', NULL, 1, 1, 666, 8),
(93, 'Visión - Titulo', 'VISIÓN', '', NULL, 0, 1, 666, 8),
(94, 'Visión - Texto', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum in reprehenderit ipsam aliquid, aut consequuntur officia perferendis quod eaque dignissimos!', NULL, NULL, 0, 1, 666, 8),
(95, 'nosotros portada 2', NULL, 'UZskMR6bwbdUaquZ7EWiblPunr097y.png', NULL, 1, 1, 666, 8),
(96, 'nosotros texto 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, non! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam impedit laudantium animi deserunt ullam alias aperiam, amet, consequatur suscipit id quae iusto sint quam explicabo ut modi libero. Recusandae est numquam corporis saepe repellat sunt, tenetur culpa quis suscipit nesciunt quod esse quam facilis ipsam quaerat laudantium, libero consequatur modi.', NULL, NULL, 0, 1, 666, 8),
(97, 'contacto imagen', NULL, '1VPwrDgZkWDUNzHw0t6UiKbqUNpiRu.png', NULL, 1, 1, 666, 4),
(98, 'Contacto Imagen Home', NULL, 'cZw2NtUhMj13D71FZCcQ9bz9EGh8xl.png', NULL, 1, 1, 666, 1),
(99, 'mapa contacto', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16761.18441515513!2d-103.43609324626344!3d20.664317983074593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428aea94a0b5af5%3A0x9638b3c7e65a7b39!2sMetropolitano%2C%20P.%C2%BA%20del%20Sereno%2C%20Parque%20Sereno%2C%20Rinconada%20del%20Parque%2C%2045030%20Zapopan%2C%20Jal.!5e0!3m2!1ses-419!2smx!4v1699368099741!5m2!1ses-419!2smx', NULL, NULL, 0, 1, 666, 4);

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

--
-- Volcado de datos para la tabla `faqs`
--

INSERT INTO `faqs` (`id`, `pregunta`, `respuesta`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'primera', '<p>ddsssssssssssssss dsssssss</p>', 666, '2023-11-08 22:59:14', '2023-11-08 22:59:14');

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
(1, 'Aviso de Privacidad', NULL, NULL, NULL, '2022-03-31 17:19:19'),
(2, 'Métodos de Pago', NULL, NULL, NULL, NULL),
(3, 'Devoluciones', NULL, NULL, NULL, NULL),
(4, 'Terminos y Condiciones', NULL, NULL, NULL, NULL),
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
(8, 'nosotros', 'fa-solid fa-paperclip', 'aboutus');

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
(9, 'Michael Eduardo', 'Sandoval Pérez', NULL, 'mikeed1998@gmail.com', NULL, '3322932239', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, 1, NULL, '$2y$10$61e9mxpY9Hvf.e8erqub0OEFi0vHUUM0wLmazHHo9EDRgW3JkmhFC', NULL, '2023-10-19 23:29:07', '2023-10-19 23:59:20', NULL);

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
(1, 'M3JVwLa63CChgmdyBju4MHTwIt7bRL.png', '2023-12-05 02:48:10', '2023-12-05 02:48:10');

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
(1, 4, 'dfdfdfd24', 'rererererere34', 'IzhhF8wb5X5wh2XjBzNvhZoAPn0xdE.png', '#38e558', '2023-12-05 04:02:56', '2023-12-05 04:17:29');

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
(1, 'Servicio 1', 'dsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsds', 'ewqqqqqqqq', 1, 'HMcggOJZzVbVnW6Vi1qNL0mTHhb2kR.png', 'CID0OkKpK7eMNgZ6qpyJo7M4jOBxxX.png', '#b95b5b', '2023-12-05 03:09:49', '2023-12-05 20:26:22'),
(2, 'dsssss', 'dssd', 'dsds', 5, 'DnkStZrFuyWZpovf5Wk8HdvRxwsgTb.png', 'dIPQtMSwXRFWx9xHsOSmR1cZXaIvMF.png', '', '2023-12-05 03:30:41', '2023-12-05 03:31:14'),
(3, 'sdsd', 'dsd', 'fdfd', 4, '8hCxXkCqwqOMascZMZqkd3HHZ7Qh6s.png', 'WsZgwwjsf7JKSqaRUHR7h9bRhKN37t.png', '', '2023-12-05 03:31:33', '2023-12-05 03:36:04'),
(4, 'ewew', 'dsds', 'sdsd', 2, 'xHePTFLtXkBpQgzYV2nMAitattzCTH.png', 'qbGt84iEMv3mPITQZBD7zDe4TOXpeT.png', '', '2023-12-05 03:34:26', '2023-12-05 03:34:26'),
(5, 'servicio 5', 'dsdsdsdsdsdsdsdsdsdsdsds', 'dsdsdsdsdsdsdsdsdsdsdsdsdsds', 1, 'sKDzGqsP3gC0QGtMSP0FVirbYcnVIN.png', 'ZzRbBohW4HY1V8sKDSw3R1PSnhWSLS.png', '#7c0ff0', '2023-12-05 20:28:10', '2023-12-05 20:28:10');

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
(1, 'jSQmfzwLLBszRPy5AgHuVwnmUcrJr8.png', NULL, '2023-12-05 00:57:08', '2023-12-05 00:57:08');

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
(1, 'wew', 'sadas', 1, 'lxt5Kvtwfk8wudPvhifE053pgexzN0.png', '#0c7ec6', '2023-12-05 20:36:31', '2023-12-05 20:46:33'),
(2, 'ewwew', '232323', 13, 'Qx5V5OLsTGew2k2QEwsJDDFWnYjDia.png', '#1acedb', '2023-12-05 20:46:26', '2023-12-05 20:50:12');

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
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `z_clientes`
--
ALTER TABLE `z_clientes`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT de la tabla `z_clientes`
--
ALTER TABLE `z_clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `z_proyectos`
--
ALTER TABLE `z_proyectos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `z_servicios`
--
ALTER TABLE `z_servicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `z_slider_principals`
--
ALTER TABLE `z_slider_principals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `z_vacantes`
--
ALTER TABLE `z_vacantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
