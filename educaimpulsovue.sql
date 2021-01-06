-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-01-2021 a las 09:11:19
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `educaimpulsovue`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `big_words_areas`
--

CREATE TABLE `big_words_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `big_words_areas`
--

INSERT INTO `big_words_areas` (`id`, `user_id`, `class_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'búsqueda, web, fiabilidad', '2020-12-28 07:23:19', '2020-12-28 07:23:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `classrooms`
--

CREATE TABLE `classrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `summary_id` bigint(20) UNSIGNED NOT NULL,
  `wwbat_areas_id` bigint(20) UNSIGNED NOT NULL,
  `big_words_areas_id` bigint(20) UNSIGNED NOT NULL,
  `schedule_areas_id` bigint(20) UNSIGNED NOT NULL,
  `do_now_areas_id` bigint(20) UNSIGNED NOT NULL,
  `guided_practice_areas_id` bigint(20) UNSIGNED NOT NULL,
  `individual_practice_areas_id` bigint(20) UNSIGNED NOT NULL,
  `exit_ticket_areas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `classrooms`
--

INSERT INTO `classrooms` (`id`, `user_id`, `course_id`, `summary_id`, `wwbat_areas_id`, `big_words_areas_id`, `schedule_areas_id`, `do_now_areas_id`, `guided_practice_areas_id`, `individual_practice_areas_id`, `exit_ticket_areas_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-12-28 04:53:34', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id`, `user_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 'Gimp', 'El curso de Gimp está dirigido a estudiantes y profesionales de diseño gráfico, artes visuales, fotografía digital u otras carreras a fines que deseen optar por una formación profesional, la cual ayude adoptar un dominio global e integrado del proceso de creación y edición de imágenes utilizando este software libre.', '2020-12-28 07:23:18', '2020-12-28 07:23:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `do_now_areas`
--

CREATE TABLE `do_now_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlDoNow` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `do_now_areas`
--

INSERT INTO `do_now_areas` (`id`, `user_id`, `class_id`, `description`, `urlDoNow`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '¿Sabes como realizar una búsqueda en la Web?', 'https://www.typeform.com/templates/t/demographic-survey-questionnaire/', '2020-12-28 07:23:19', '2020-12-28 07:23:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time(4) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `topics` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `user_id`, `course_id`, `event_date`, `event_time`, `title`, `description`, `priority`, `tags`, `topics`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2020-12-11', '00:18:30.0000', 'Prueba diagnostica', 'Migrations are like version control for your database', 'High', 'evaluation', 'Scratch, Excel, Word, Gimp, Hardware, Software', '2020-12-28 07:23:19', '2020-12-28 07:23:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exit_ticket_areas`
--

CREATE TABLE `exit_ticket_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlExitTicket` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `exit_ticket_areas`
--

INSERT INTO `exit_ticket_areas` (`id`, `user_id`, `class_id`, `description`, `urlExitTicket`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Revisemos lo que aprendimos hoy en esta encuesta:', 'https://www.typeform.com/templates/t/demographic-survey-questionnaire/', '2020-12-28 07:23:19', '2020-12-28 07:23:19');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guided_practice_areas`
--

CREATE TABLE `guided_practice_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guidedPracticeText` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` blob DEFAULT NULL,
  `urlVideoGuided` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `guided_practice_areas`
--

INSERT INTO `guided_practice_areas` (`id`, `user_id`, `class_id`, `title`, `guidedPracticeText`, `image`, `urlVideoGuided`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '5 consejos rápidos para evaluar la fiabilidad de la información web', '1.No te quedes con el primer resultado. Busca, compara y revisa… y usa la búsqueda avanzada.\n\n        2.Mira quién escribe la información. Trata de ver las credenciales del autor y su reputación.\n\n        3.Ten en cuenta el medio en el cual se publica dicho contenido por si pudiese haber algún tipo de sesgo en la información o publicidad.\n\n        4.Mira si el contenido es actual, original, correcto (bien escrito), tiene un razonamiento lógico y si cita sus fuentes de información.\n\n        5.Pregunta a una persona de tu confianza que tenga experiencia en la búsqueda y pídele su opinión.', '', 'https://youtu.be/ohlaZyUVToU', '2020-12-28 07:23:19', '2020-12-28 07:23:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `individual_practice_areas`
--

CREATE TABLE `individual_practice_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `individualPracticeText` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` blob DEFAULT NULL,
  `highlightList` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `individual_practice_areas`
--

INSERT INTO `individual_practice_areas` (`id`, `user_id`, `class_id`, `title`, `individualPracticeText`, `image`, `highlightList`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '¡A practicar!', 'En la práctica guiada vamos a ingresar a los dos paginas Web, Antel  y Ose. Luego de ingresar responde las siguientes preguntas.', '', '', '2020-12-28 07:23:19', '2020-12-28 07:23:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2019_08_19_000000_create_failed_jobs_table', 1),
(22, '2020_03_28_213501_create_roles_table', 1),
(23, '2020_03_28_214342_create_role_user_table', 1),
(24, '2020_03_28_234644_create_posts_table', 1),
(25, '2020_03_29_170248_create_comments_table', 1),
(26, '2020_10_19_112943_create_courses_table', 1),
(27, '2020_10_20_011538_create_summaries_table', 1),
(28, '2020_10_21_101617_create_events_table', 1),
(29, '2020_11_29_195331_create_wwbat_areas_table', 1),
(30, '2020_11_29_195402_create_big_words_areas_table', 1),
(31, '2020_11_29_195427_create_do_now_areas_table', 1),
(32, '2020_11_29_195448_create_schedule_areas_table', 1),
(33, '2020_11_29_195552_create_guided_practice_areas_table', 1),
(34, '2020_11_29_195652_create_individual_practice_areas_table', 1),
(35, '2020_11_29_195717_create_exit_ticket_areas_table', 1),
(36, '2020_12_23_051927_create_classrooms_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` blob DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `subtitle`, `body`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 'Using Laravel Seeders', 'Laravel includes a simple method of seeding your database', 'Laravel includes a simple method of seeding your database with test data using seed classes. All seed classes are stored in the database/seeds directory. Seed classes may have any name you wish, but probably should follow some sensible convention, such as UsersTableSeeder, etc. By default, a DatabaseSeeder class is defined for you. From this class, you may use the  call method to run other seed classes, allowing you to control the seeding order.', '', '2020-12-28 07:23:18', '2020-12-28 07:23:18'),
(2, 2, 'Database: Migrations', 'Migrations are like version control for your database', 'Migrations are like version control for your database, allowing your team to easily modify and share the application\'s database schema. Migrations are typically paired with Laravel\'s schema builder to easily build your application\'s database schema. If you have ever had to tell a teammate to manually add a column to their local database schema, you\'ve faced the problem that database migrations solve.', '', '2020-12-28 07:23:18', '2020-12-28 07:23:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'user', 'Alumno', 'Alumno', '2020-12-28 07:23:15', '2020-12-28 07:23:15'),
(2, 'admin', 'Administrador', 'Administrador del sitio', '2020-12-28 07:23:15', '2020-12-28 07:23:15'),
(3, 'teacher', 'Profesor', 'Profesor', '2020-12-28 07:23:15', '2020-12-28 07:23:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedule_areas`
--

CREATE TABLE `schedule_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `schedule_areas`
--

INSERT INTO `schedule_areas` (`id`, `user_id`, `class_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '5 min Do now, 5 min Intro al Tema, 10min Practica Guiada, 20 min Practica Independiente, 5 min Ticket de salida', '2020-12-28 07:23:19', '2020-12-28 07:23:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `summaries`
--

CREATE TABLE `summaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `summaries`
--

INSERT INTO `summaries` (`id`, `user_id`, `course_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Crea tu propio fotomontaje', '1-Escoje una imagen 2- Aplicas las herramientas correspondientes 3-Agrega personajes 4-Utiliza técnicas', '2020-12-28 07:23:19', '2020-12-28 07:23:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Richard Lockhart', 'rlockhart@liceoimpulso.edu.uy', NULL, '$2y$10$olBnD7gr3J65k1Jo6Si7/Ou3dCljIxKJc7OtUy5VV17t.XHxYdguK', NULL, '2020-12-28 07:23:15', '2020-12-28 07:23:15'),
(2, 'Jael Ghiso', 'jael.ghiso@gmail.com', NULL, '$2y$10$8L/EgIIWTc2j1zPt9JlyRubcCNUPysBYnVT6akeCnT58jOuGPNU4a', NULL, '2020-12-28 07:23:15', '2020-12-28 07:23:15'),
(3, 'Javier Castro', 'jcastro@liceoimpulso.edu.uy', NULL, '$2y$10$qE2Apx9P5ypQ7eBSE6gux..t/8eFUljJuRWzt8es4oDF1CmnFpgH2', NULL, '2020-12-28 07:23:16', '2020-12-28 07:23:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wwbat_areas`
--

CREATE TABLE `wwbat_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wwbat_areas`
--

INSERT INTO `wwbat_areas` (`id`, `user_id`, `class_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Búsqueda responsable en la Web', '2020-12-28 07:23:19', '2020-12-28 07:23:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `big_words_areas`
--
ALTER TABLE `big_words_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classrooms_course_id_foreign` (`course_id`),
  ADD KEY `classrooms_summary_id_foreign` (`summary_id`),
  ADD KEY `classrooms_wwbat_areas_id_foreign` (`wwbat_areas_id`),
  ADD KEY `classrooms_big_words_areas_id_foreign` (`big_words_areas_id`),
  ADD KEY `classrooms_schedule_areas_id_foreign` (`schedule_areas_id`),
  ADD KEY `classrooms_do_now_areas_id_foreign` (`do_now_areas_id`),
  ADD KEY `classrooms_guided_practice_areas_id_foreign` (`guided_practice_areas_id`),
  ADD KEY `classrooms_individual_practice_areas_id_foreign` (`individual_practice_areas_id`),
  ADD KEY `classrooms_exit_ticket_areas_id_foreign` (`exit_ticket_areas_id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `do_now_areas`
--
ALTER TABLE `do_now_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `exit_ticket_areas`
--
ALTER TABLE `exit_ticket_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `guided_practice_areas`
--
ALTER TABLE `guided_practice_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `individual_practice_areas`
--
ALTER TABLE `individual_practice_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `schedule_areas`
--
ALTER TABLE `schedule_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `summaries`
--
ALTER TABLE `summaries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `wwbat_areas`
--
ALTER TABLE `wwbat_areas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `big_words_areas`
--
ALTER TABLE `big_words_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `do_now_areas`
--
ALTER TABLE `do_now_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `exit_ticket_areas`
--
ALTER TABLE `exit_ticket_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `guided_practice_areas`
--
ALTER TABLE `guided_practice_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `individual_practice_areas`
--
ALTER TABLE `individual_practice_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `schedule_areas`
--
ALTER TABLE `schedule_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `summaries`
--
ALTER TABLE `summaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `wwbat_areas`
--
ALTER TABLE `wwbat_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `classrooms`
--
ALTER TABLE `classrooms`
  ADD CONSTRAINT `classrooms_big_words_areas_id_foreign` FOREIGN KEY (`big_words_areas_id`) REFERENCES `big_words_areas` (`id`),
  ADD CONSTRAINT `classrooms_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `classrooms_do_now_areas_id_foreign` FOREIGN KEY (`do_now_areas_id`) REFERENCES `do_now_areas` (`id`),
  ADD CONSTRAINT `classrooms_exit_ticket_areas_id_foreign` FOREIGN KEY (`exit_ticket_areas_id`) REFERENCES `exit_ticket_areas` (`id`),
  ADD CONSTRAINT `classrooms_guided_practice_areas_id_foreign` FOREIGN KEY (`guided_practice_areas_id`) REFERENCES `guided_practice_areas` (`id`),
  ADD CONSTRAINT `classrooms_individual_practice_areas_id_foreign` FOREIGN KEY (`individual_practice_areas_id`) REFERENCES `individual_practice_areas` (`id`),
  ADD CONSTRAINT `classrooms_schedule_areas_id_foreign` FOREIGN KEY (`schedule_areas_id`) REFERENCES `schedule_areas` (`id`),
  ADD CONSTRAINT `classrooms_summary_id_foreign` FOREIGN KEY (`summary_id`) REFERENCES `summaries` (`id`),
  ADD CONSTRAINT `classrooms_wwbat_areas_id_foreign` FOREIGN KEY (`wwbat_areas_id`) REFERENCES `wwbat_areas` (`id`);

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
