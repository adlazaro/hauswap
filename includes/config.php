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
//echo "Connected successfully";
 

/**
 * Configuración del soporte de UTF-8, localización (idioma y país) y zona horaria
 */
ini_set('default_charset', 'UTF-8');
setLocale(LC_ALL, 'es_ES.UTF.8');
date_default_timezone_set('Europe/Madrid');
