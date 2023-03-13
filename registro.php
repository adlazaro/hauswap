<?php

$tituloPagina = 'Registro';

$contenidoPrincipal=<<<EOS

    <form action="procesarRegistro.php" method="POST">
    <fieldset>
        <legend>Registro</legend>
        <div><label>Correo electrónico:</label> <input type="text" name="email" /></div>
        <div><label>Nombre:</label> <input type="text" name="username" /></div>
        <div><label>Contraseña:</label> <input type="password" name="password" /></div>
        <button type="submit">Registrarse</button>
    </fieldset>

    <a href="login.php"><button type="button">¿Ya tienes una cuenta? Inicia sesión</button></a>

EOS;

require ('./includes/vistas/plantillas/plantilla.php');
?>
