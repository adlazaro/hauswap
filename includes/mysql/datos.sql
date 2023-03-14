/*
  Recuerda que deshabilitar la opción "Enable foreign key checks" para evitar problemas a la hora de importar el script.
*/
/* TRUNCATE TABLE `RolesUsuario`; */
TRUNCATE TABLE `roles`;
TRUNCATE TABLE `usuarios`;

INSERT INTO `roles` (`rol`, `nombre`) VALUES
(1, 'admin'),
(2, 'user');

INSERT INTO `usuarios` (`correo`, `nombre`, `contraseña`, `telefono`, `sexo`, `fecha_nacimiento`, `pais`, `fecha_registro`, `servidor_fotoperfil`, `biografia`, `tipo`) VALUES
('admin@admin', 'Admin', '$2y$10$P/fjjOxUu7f0I3gCIShVp.mUX3HPaTV2BzmsTR2kprtBhaCpcMiwm', 0, 'nc', '0000-00-00', 'España', '2023-03-14', '', '', 1), 
/* contraseña: admin */



/* INSERT INTO `RolesUsuario` (`usuario`, `rol`) VALUES
(1, 1),
(1, 2),
(2, 2); */

/*
  user: userpass
  admin: adminpass
*/
/*INSERT INTO `Usuarios` (`id`, `nombreUsuario`, `nombre`, `password`) VALUES
(1, 'admin', 'Administrador', '$2y$10$O3c1kBFa2yDK5F47IUqusOJmIANjHP6EiPyke5dD18ldJEow.e0eS'),
(2, 'user', 'Usuario', '$2y$10$uM6NtF.f6e.1Ffu2rMWYV.j.X8lhWq9l8PwJcs9/ioVKTGqink6DG');*/
