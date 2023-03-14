<?php
require_once 'includes/config.php';

$id_casa1 = $_POST['id_casa1'];
$id_casa2 = $_POST['id_casa2'];
$fecha_entrada = $_POST['fecha_entrada'];
$fecha_salida = $_POST['fecha_salida'];

//$id_reserva = uniqid(); ME DA ERROR CON AGUNOS VALORES MUY ALTOS
$id_reserva = rand(1, 500);  // NO DEJARLO ASÍ PORQUE SE VAN A REPETIR ¿crear un campo contador en la tabla reservas?


// LO DEL ESTADO TENGO QUE MIRARLO 
$estado = ' ';

//consulta SQL preparada
$sql = "INSERT INTO reservas (id_reserva, id_casa1, id_casa2, fecha_entrada, fecha_salida, estado) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiisss", $id_reserva, $id_casa1, $id_casa2, $fecha_entrada, $fecha_salida, $estado);  // las dates son strings ????

//ejecutar la consulta preparada
if ($stmt->execute()) {
echo "Reserva creada";

$sql = "SELECT nombre FROM propiedades WHERE id_casa = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id_casa1);
$stmt->execute();
$resultado = $stmt->get_result();

  if ($resultado->num_rows > 0) {
      $row = $resultado->fetch_assoc();
      $nombre_casa = $row["nombre"];
  }
}
else 
  echo "Error en la creación de la reserva: " . $conn->error;


$tituloPagina = 'ProcesarReserva';
$contenidoPrincipal=<<<EOS
Se ha reservado una propiedad en $nombre_casa</br>
EOS;
require ('./includes/vistas/plantillas/plantilla.php');
?>


