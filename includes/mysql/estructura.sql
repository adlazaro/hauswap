/*
  Recuerda que deshabilitar la opciÃ³n "Enable foreign key checks" para evitar problemas a la hora de importar el script.
*/
DROP TABLE IF EXISTS `Reservas`;
DROP TABLE IF EXISTS `Chat`;
DROP TABLE IF EXISTS 'Roles';
DROP TABLE IF NOT EXISTS `RolesUsuario`;
DROP TABLE IF NOT EXISTS 'Usuarios';

CREATE TABLE IF NOT EXISTS `Reservas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `casa_1` int(11) NOT NULL AUTO_INCREMENT,
  `casa_2` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_entrada` DATETIME NOT NULL,
  `fecha_salida` DATETIME NOT NULL,
  'estado' varchar(30) COLLATE utf8mb4_general_ci NOT NULL UNIQUE,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE IF NOT EXISTS `Chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario1` varchar(30) COLLATE utf8mb4_general_ci NOT NULL UNIQUE,
  `id_usuario2` varchar(30) COLLATE utf8mb4_general_ci NOT NULL UNIQUE,
  'numero_mensajes' int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `Roles` (
  `rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8mb4_general_ci NOT NULL UNIQUE,
  PRIMARY KEY (`rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `RolesUsuario` (
  `rol` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL AUTO_INCREMENT,
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

