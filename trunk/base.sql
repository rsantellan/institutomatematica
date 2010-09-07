-- phpMyAdmin SQL Dump
-- version 3.2.2.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 29, 2010 at 12:50 PM
-- Server version: 5.1.37
-- PHP Version: 5.2.10-2ubuntu6.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `instituto_db`
--
DROP DATABASE `instituto_db`;
CREATE DATABASE `instituto_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `instituto_db`;

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `alumno`
--


-- --------------------------------------------------------

--
-- Table structure for table `alumno_preparacion`
--

CREATE TABLE IF NOT EXISTS `alumno_preparacion` (
  `alumno_id` int(11) NOT NULL DEFAULT '0',
  `preparacion_id` int(11) NOT NULL DEFAULT '0',
  `forma_contacto_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`alumno_id`,`preparacion_id`),
  KEY `forma_contacto_id_idx` (`forma_contacto_id`),
  KEY `alumno_preparacion_preparacion_id_preparacion_id` (`preparacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumno_preparacion`
--


-- --------------------------------------------------------

--
-- Table structure for table `calendario_materias`
--

CREATE TABLE IF NOT EXISTS `calendario_materias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(255) DEFAULT NULL,
  `hour` int(11) NOT NULL,
  `minutes` int(11) NOT NULL,
  `preparacion_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `preparacion_id_idx` (`preparacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `calendario_materias`
--


-- --------------------------------------------------------

--
-- Table structure for table `docente`
--

CREATE TABLE IF NOT EXISTS `docente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `docente`
--

INSERT INTO `docente` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Natalia Castro', '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(2, 'Juan Kalemkerian', '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(3, 'Alejandro Sapello', '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(4, 'Eduardo Godin', '2010-08-29 12:49:47', '2010-08-29 12:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `evaluacion`
--

CREATE TABLE IF NOT EXISTS `evaluacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `evaluacion`
--

INSERT INTO `evaluacion` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Revision', '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(2, 'Parcial', '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(3, 'Examen', '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(4, 'Consultas', '2010-08-29 12:49:47', '2010-08-29 12:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `facultad`
--

CREATE TABLE IF NOT EXISTS `facultad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `facultad`
--

INSERT INTO `facultad` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'c.c.e.e', '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(2, 'E.D.A', '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(3, 'Ingenieria', '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(4, 'Quimica', '2010-08-29 12:49:47', '2010-08-29 12:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `forma_contacto`
--

CREATE TABLE IF NOT EXISTS `forma_contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `forma_contacto`
--

INSERT INTO `forma_contacto` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Ya habia concurrido a otra materia', '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(2, 'Recomendacion de un amigo', '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(3, 'Aviso del Catalogo de Estudiantes', '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(4, 'Cartelera de Facultad', '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(5, 'Volantes', '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(6, 'pagina web tuprofe.com', '2010-08-29 12:49:47', '2010-08-29 12:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `horario_estudiante`
--

CREATE TABLE IF NOT EXISTS `horario_estudiante` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `alumno_id` int(11) NOT NULL,
  `horario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `alumno_id_idx` (`alumno_id`),
  KEY `horario_id_idx` (`horario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `horario_estudiante`
--


-- --------------------------------------------------------

--
-- Table structure for table `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `facultad_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `facultad_id_idx` (`facultad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `materia`
--

INSERT INTO `materia` (`id`, `nombre`, `facultad_id`, `created_at`, `updated_at`) VALUES
(1, 'Matemática I', 1, '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(2, 'Matemática II', 1, '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(3, 'Estadística I', 1, '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(4, 'Estadística II', 1, '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(5, 'Introducción a la Contabilidad', 1, '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(6, 'Contabilidad Básica', 1, '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(7, 'Contabilidad I', 2, '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(8, 'Contabilidad II', 2, '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(9, 'Contabilidad de Costos y Presupuestal', 2, '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(10, 'Métodos I', 2, '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(11, 'Métodos II', 2, '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(12, 'Introducción a la Probabilidad y Estadistica', 2, '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(13, 'Cálculo I', 3, '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(14, 'Cálculo II', 3, '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(15, 'Cálculo III', 3, '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(16, 'Algebra I', 3, '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(17, 'Algebra II', 3, '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(18, 'Física I', 3, '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(19, 'Termo', 3, '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(20, 'Mecánica Newtoniana', 3, '2010-08-29 12:49:47', '2010-08-29 12:49:47'),
(21, 'Matemática 01', 4, '2010-08-29 12:49:47', '2010-08-29 12:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `preparacion`
--

CREATE TABLE IF NOT EXISTS `preparacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `materia_id` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL,
  `evaluacion_id` int(11) NOT NULL,
  `periodo` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `materia_id_idx` (`materia_id`),
  KEY `docente_id_idx` (`docente_id`),
  KEY `evaluacion_id_idx` (`evaluacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `preparacion`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sf_guard_group`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_group_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group_permission` (
  `group_id` int(11) NOT NULL DEFAULT '0',
  `permission_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_group_permission`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sf_guard_permission`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_remember_key`
--

CREATE TABLE IF NOT EXISTS `sf_guard_remember_key` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`,`ip_address`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sf_guard_remember_key`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_super_admin` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sf_guard_user`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_group` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `group_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_user_group`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_permission` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `permission_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_user_permission`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumno_preparacion`
--
ALTER TABLE `alumno_preparacion`
  ADD CONSTRAINT `alumno_preparacion_alumno_id_alumno_id` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumno_preparacion_forma_contacto_id_forma_contacto_id` FOREIGN KEY (`forma_contacto_id`) REFERENCES `forma_contacto` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumno_preparacion_preparacion_id_preparacion_id` FOREIGN KEY (`preparacion_id`) REFERENCES `preparacion` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `calendario_materias`
--
ALTER TABLE `calendario_materias`
  ADD CONSTRAINT `calendario_materias_preparacion_id_preparacion_id` FOREIGN KEY (`preparacion_id`) REFERENCES `preparacion` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `horario_estudiante`
--
ALTER TABLE `horario_estudiante`
  ADD CONSTRAINT `horario_estudiante_alumno_id_alumno_id` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `horario_estudiante_horario_id_calendario_materias_id` FOREIGN KEY (`horario_id`) REFERENCES `calendario_materias` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_facultad_id_facultad_id` FOREIGN KEY (`facultad_id`) REFERENCES `facultad` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `preparacion`
--
ALTER TABLE `preparacion`
  ADD CONSTRAINT `preparacion_docente_id_docente_id` FOREIGN KEY (`docente_id`) REFERENCES `docente` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `preparacion_evaluacion_id_evaluacion_id` FOREIGN KEY (`evaluacion_id`) REFERENCES `evaluacion` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `preparacion_materia_id_materia_id` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_group_permission`
--
ALTER TABLE `sf_guard_group_permission`
  ADD CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
  ADD CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_group`
--
ALTER TABLE `sf_guard_user_group`
  ADD CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_permission`
--
ALTER TABLE `sf_guard_user_permission`
  ADD CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

