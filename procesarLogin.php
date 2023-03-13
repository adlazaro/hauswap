<?php
require_once 'includes/config.php';
require_once 'includes/Usuario.php';
 // Capturo las variables username y password
 $username = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
 $password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));

 $usuario = Usuario::login($username, $password);
        
 if (!$usuario) {
     echo "El usuario o el password no coinciden";
 } else {
     $_SESSION['login'] = true;
     $_SESSION['nombre'] = $usuario->getcorreo();
     //$_SESSION['esAdmin'] = $usuario->tieneRol(Usuario::ADMIN_ROLE);
 }


$tituloPagina = 'LogIn';

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

