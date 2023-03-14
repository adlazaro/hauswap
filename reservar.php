<?php
require_once 'includes/config.php';

$sql = "SELECT id_casa, nombre FROM propiedades";

// ejecutar la consulta SQL
$result = $conn->query($sql);

$resultado = "";
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $resultado .= "<option value='" . $row['id_casa'] . "'>" . $row['nombre'] . "</option>";
  }
}

$tituloPagina = 'Reservar';
$contenidoPrincipal=<<<EOS
<form action="procesarReserva.php" method="post">

<label for="id_casa1">Casa:</label>
<select name="id_casa1" id="id_casa1">
    <option value="">Selecciona una casa</option>
    $resultado
</select>

<label for="id_casa2">Tu Casa:</label>
<select name="id_casa2" id="id_casa2">
    <option value="">Selecciona tu casa</option>
    $resultado
</select>

    <label for="fecha_entrada">Fecha de entrada:</label>
    <input type="date" name="fecha_entrada" id="fecha_entrada" required>

    <label for="fecha_salida">Fecha de salida:</label>
    <input type="date" name="fecha_salida" id="fecha_salida" required>

    <input type="submit" value="Reservar">

</form>


EOS;
require ('./includes/vistas/plantillas/plantilla.php');
?>
