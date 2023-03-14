<?php
require_once 'includes/config.php';
require_once 'includes/Usuario.php'; // Capturo las variables username y password
 $username = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
 $password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));
 $password2 = htmlspecialchars(trim(strip_tags($_REQUEST["password2"])));
 $nombre = htmlspecialchars(trim(strip_tags($_REQUEST["username"])));

if($password != $password2){
    echo "Las contraseñas deben coincidir!";
}
else{
    $usuario = Usuario::buscaUsuario($username);
	
    if ($usuario) {
        echo "El usuario ya existe";
    } else {
        $usuario = Usuario::crea($username, $password, $nombre);
        $_SESSION['login'] = true;
        $_SESSION['nombre'] = $usuario->getcorreo();
    }
}

// Proceso las variables comprobando si es un usuario valido



$tituloPagina = 'Registro';

if (isset($_SESSION["login"])){
    $contenidoPrincipal=<<<EOS

    <h1>Bienvenido/a ${_SESSION["nombre"]}</h1>
    
    EOS;
}
else{
    $contenidoPrincipal=<<<EOS
    <h1>ERROR</h1>
    <p>El usuario o contraseña no son válidos.</p>
  
    EOS;
}

require ('./includes/vistas/plantillas/plantilla.php');

?>

