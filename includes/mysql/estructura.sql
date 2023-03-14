/*
  Recuerda que deshabilitar la opciÃ³n "Enable foreign key checks" para evitar problemas a la hora de importar el script.
*/
DROP TABLE IF EXISTS `reservas`;
DROP TABLE IF EXISTS `chat`;
DROP TABLE IF EXISTS 'roles';
/* DROP TABLE IF NOT EXISTS `RolesUsuario`;*/
DROP TABLE IF NOT EXISTS 'usuarios';
DROP TABLE IF NOT EXISTS 'mensajes';
DROP TABLE IF NOT EXISTS 'propiedades';
DROP TABLE IF NOT EXISTS 'valoraciones';

CREATE TABLE IF NOT EXISTS `reservas` (
  `id_reserva` int(11) NOT NULL,
  `id_casa1` int(11) NOT NULL,
  `id_casa2` int(11) NOT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `chat` (
  `id_conversacion` int(11) NOT NULL,
  `id_usuario1` varchar(30) NOT NULL,
  `id_usuario2` varchar(30) NOT NULL,
  `numero_mensajes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `roles` (
  `rol` int(1) NOT NULL,
  `nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* CREATE TABLE IF NOT EXISTS `rolesusuario` (
  `rol` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL AUTO_INCREMENT,
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; */

CREATE TABLE IF NOT EXISTS 'usuarios' (
  `correo` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `contraseÃ±a` varchar(60) NOT NULL,
  `telefono` int(9) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `pais` varchar(20) NOT NULL,
  `fecha_registro` date NOT NULL,
  `servidor_fotoperfil` varchar(40) NOT NULL,
  `biografia` varchar(2000) NOT NULL,
  `tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS 'mensajes' (
    `id_conversacion` int(11) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_remitente` varchar(30) NOT NULL,
  `contenido` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS 'propiedades' (
  `id_casa` int(11) NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `localizacion` varchar(30) NOT NULL,
  `numero_valoraciones` int(11) NOT NULL,
  `servidor_fotos` varchar(40) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `estrellas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS 'valoraciones' (
  `id_valoracion` int(11) NOT NULL,
  `id_casa` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  `estrellas` int(11) NOT NULL,
  `opinion` varchar(2000) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `chat`
  ADD CONSTRAINT `usuario1` FOREIGN KEY (`id_usuario1`) REFERENCES `usuarios` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario2` FOREIGN KEY (`id_usuario2`) REFERENCES `usuarios` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `mensajes`
  ADD CONSTRAINT `id_remitente` FOREIGN KEY (`id_remitente`) REFERENCES `usuarios` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `propiedades`
  ADD CONSTRAINT `usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `reservas`
  ADD CONSTRAINT `id_casa1` FOREIGN KEY (`id_casa1`) REFERENCES `propiedades` (`id_casa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_casa2` FOREIGN KEY (`id_casa2`) REFERENCES `propiedades` (`id_casa`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `usuarios`
  ADD CONSTRAINT `rol` FOREIGN KEY (`tipo`) REFERENCES `roles` (`rol`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `valoraciones`
  ADD CONSTRAINT `id_casa` FOREIGN KEY (`id_casa`) REFERENCES `propiedades` (`id_casa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_reserva` FOREIGN KEY (`id_reserva`) REFERENCES `reservas` (`id_reserva`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;
