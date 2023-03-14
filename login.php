<?php

$tituloPagina = 'Iniciar Sesión';

$contenidoPrincipal=<<<EOS

    <form action="procesarLogin.php" method="POST">
    <fieldset>
        <legend>Inicio de sesión</legend>
        <div><label>Correo electrónico:</label> <input type="text" name="email" /></div>
        <div><label>Contraseña:</label> <input type="password" name="password" /></div>
        <button type="submit">Iniciar sesión</button>
    </fieldset>

    <a href="registro.php"><button type="button">¿No tienes una cuenta? Regístrate</button></a>

EOS;

require ('./includes/vistas/plantillas/plantilla.php');
?>
