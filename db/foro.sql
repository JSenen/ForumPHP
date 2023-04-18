-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 18-04-2023 a las 20:17:34
-- Versión del servidor: 5.7.39
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `foro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(8) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`) VALUES
(27, 'PHP', 'Tutoriales, ideas, ejercicios...'),
(28, 'Servidores', 'Sistemas Operativos'),
(29, 'Programación', 'Diferentes lenguajes..Java, PHP, C#'),
(30, 'IDE\'s', 'Hablemos de los IDE favoritos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `post_id` int(8) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_topic` int(8) NOT NULL,
  `post_by` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`post_id`, `post_content`, `post_date`, `post_topic`, `post_by`) VALUES
(8, 'Alguien me ayuda con PDO??', '2023-03-24 18:49:39', 4, 10),
(15, '¿Como puedo evitar la inyección SQL?', '2023-03-24 18:17:10', 18, 10),
(16, 'Puede alguien revisar mi código: \r\n\r\nif (isset($_POST[&#039;modifpost&#039;])) {\r\n\r\n          $subject = htmlspecialchars($_POST[&#039;post_content&#039;]);\r\n     \r\n          // guardamos los datos en la base de datos\r\n          $coment = new Post();\r\n          $coment-&gt;modyPost($dbh,$subject,$post_id);\r\n          \r\n          //una vez guardados, redirigimos a la página principal\r\n          header(&quot;Location: indexPost.php?id=&quot;.$post_topic);\r\n              ', '2023-03-24 18:50:20', 4, 10),
(17, '¿Como puede MAMP funcionarme y XMAP no?', '2023-03-24 18:50:56', 4, 10),
(18, '¿Alguien me hecha un cable para crear un foro como este?. Quiero que alguien me recuerde las $_SESSION. ', '2023-04-17 23:06:19', 4, 9),
(19, '¿Cual sería la forma correcta de realizar un SELECT y evitar el SQL Intyect?', '2023-04-18 22:03:46', 4, 31),
(20, 'Buenas noches a todos!. Soy nuevo en el foro y espero aprender de todos vosotros.', '2023-04-18 22:17:14', 4, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(8) NOT NULL,
  `topic_subject` varchar(50) NOT NULL,
  `topic_cat` int(8) NOT NULL,
  `topic_by` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_subject`, `topic_cat`, `topic_by`) VALUES
(4, 'PHP', 27, 10),
(18, 'PDO', 27, 10),
(19, 'NAS', 28, 10),
(21, 'Libros de interes', 29, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(8) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_mail` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_level` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_mail`, `user_password`, `user_level`) VALUES
(9, 'admin', 'admin@admin.com', '$2y$10$wyAoaeBF8OluZvXVwAMqee5T9qaVczGIoGaFVffhbb3d87E1PskU6', 0),
(10, 'user', 'user@user.com', '$2y$10$xItLmCNhSr/JJXOIQf8Ro.rwOqrKHzBW1PtrOon/9q5N8p.xou3MC', 1),
(19, 'juan', 'juan@gmail.com', '$2y$10$MOvsr2MEjLYtjw1U.1cxeu4ABcye3B2TpQSwJLDKsC48QVSC5cbA6', 1),
(30, 'Pablo', 'pablo123@messenger.es', '$2y$10$uA4EMNwlGorHMjKYPm0q../fYMCqo3giFC/hSdNFvPcsGQEdHys3i', 1),
(31, 'Juan Senen', 'jsenen@hotmail.com', '$2y$10$aa.DX2VV1uOsVsCK83LvoOWF2yZ4SZQiskOA2KxGf68o4J.xQjIdO', 1),
(32, 'pepe', 'pepe@mail.com', '$2y$10$5SH290omYUPt6s/mapqKbe1SuNhRRuC9MbSfpPACdACKK7b.7ozH.', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_topic` (`post_topic`,`post_by`),
  ADD KEY `post_by` (`post_by`);

--
-- Indices de la tabla `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `topic_cat` (`topic_cat`,`topic_by`),
  ADD KEY `topic_by` (`topic_by`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_topic`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`post_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topic_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topic_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
