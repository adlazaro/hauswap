<?php
require_once 'includes/config.php';

$id_casa1 = $_POST['id_casa1'];
$id_casa2 = $_POST['id_casa2'];
$fecha_entrada = $_POST['fecha_entrada'];
$fecha_salida = $_POST['fecha_salida'];

$id_reserva = uniqid();

// LO DEL ESTADO TENGO QUE MIRARLO 

//consulta SQL
$estado = ' ';                                                                      	
$sql = "INSERT INTO reservas (id_reserva, id_casa1, id_casa2, fecha_entrada, fecha_salida, estado) VALUES ('$id_reserva', '$id_casa1', '$id_casa2', '$fecha_entrada', '$fecha_salida', '$estado')";

// ejecutar la consulta SQL
if ($conn->query($sql) === TRUE) 
  echo "Reserva creada";
else 
  echo "Error en la creación de la reserva: " . $conn->error;

$sql = "SELECT nombre FROM propiedades WHERE id_casa = $id_casa1";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $nombre_casa = $row["nombre"];
}



$tituloPagina = 'ProcesarReserva';
$contenidoPrincipal=<<<EOS
Se ha reservado una propiedad en $nombre_casa</br>
EOS;
require ('./includes/vistas/plantillas/plantilla.php');
?>



