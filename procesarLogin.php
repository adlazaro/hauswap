<?php
 session_start();
 // Capturo las variables username y password
 $username = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
 $password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));


 define('BD_HOST', 'localhost');
 define('BD_USER', 'hauswap');
 define('BD_PASS', 'proyectoAW');
 define('BD_NAME', 'hauswap');

//Conexion con base de datos
$conn = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
if ($conn->connect_error){
    die("La conexión ha fallado" . $conn->connect_error);
}
echo "Connected successfully";
 

//ESTO LUEGO HAY QUE CAMBIARLO CON LO DE LA BASE DE DATOS

// Proceso las variables comprobando si es un usuario valido
if ($username == "user" && $password == "userpass"){
    // Establecer la variable de sesion login a true y nombre a "Usuario"
    $_SESSION["login"] = true;
    $_SESSION["nombre"] = "Usuario";
}
else if ($username == "admin" && $password == "adminpass"){
    // Establecer la variable de sesion login a true y nomnbre a "Administrador"
    // Establecer la variable esAdmin a true
    $_SESSION["login"] = true;
    $_SESSION["nombre"] = "Administrador";
    $_SESSION["esAdmin"] = true;
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

