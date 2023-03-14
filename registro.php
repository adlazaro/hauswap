<?php

$tituloPagina = 'Registrarse';

$contenidoPrincipal=<<<EOS

    <form action="procesarRegistro.php" method="POST">
    <fieldset>
        <legend>Registro</legend>
        <div><label>Correo electrónico:</label> <input type="text" name="email" /></div>
        <div><label>Nombre:</label> <input type="text" name="username" /></div>
        <div><label>Contraseña:</label> <input type="password" name="password" /></div>
        <div><label>Repita la contraseña:</label> <input type="password" name="password2" /></div>
        <div><label>Teléfono:</label> <input type="tel" name="telefono" /></div>
        <div><p>Género: <input type="radio" name="genero" value="h" /> hombre <input type="radio" name="genero" value="m" /> mujer <input type="radio" name="genero" value="nb" /> no binario <input type="radio" name="genero" value="nc" /> prefiero no contestar</p></div>
        <div><label>Fecha de nacimiento:</label> <input type="date" name="fecha" /></div>
        <div><label>País:</label> <input type="text" name="pais" /></div>

        <button type="submit">Registrarse</button>
    </fieldset>

    <a href="login.php"><button type="button">¿Ya tienes una cuenta? Inicia sesión</button></a>

EOS;

require ('./includes/vistas/plantillas/plantilla.php');
?>
