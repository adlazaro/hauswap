<?php
//No te puedes meter atu cuenta sin haber Iniciado Sesión
require_once 'includes/config.php';
require_once 'includes/Usuario.php';

//Sesión Iniciada
if (isset($_SESSION["login"])) {

    echo 'Bienvenido a Tu Cuenta';
    $tituloPagina = 'MiCuenta';
    $contenidoPrincipal=<<<EOS
    <a href="publicarCasa.php"><button type="button">Nueva propiedad</button></a>
    EOS;
    require ('./includes/vistas/plantillas/plantilla.php');
}
//Sesión sin Iniciar te lleva a LOGIN
else {
    echo'Necesitas Iniciar Sesión para acceder a Mi Cuenta';
    require('login.php');
}             
?>
