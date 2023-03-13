<!-- php

// Obtener el término de búsqueda del formulario
$termino = $_POST['termino'];

// Conectarse a la base de datos
$db = new PDO('mysql:host=localhost;dbname=nombre_de_la_base_de_datos', 'nombre_de_usuario', 'contraseña');

// Ejecutar la consulta de búsqueda
$stmt = $db->prepare("SELECT * FROM tabla WHERE columna LIKE :termino");
$stmt->execute(array(':termino' => "%$termino%"));
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Mostrar los resultados
foreach ($resultados as $resultado) {
  echo $resultado['columna1'] . ' - ' . $resultado['columna2'] . '<br>';}

-->
<?php
$tituloPagina = 'Buscar';
$contenidoPrincipal=<<<EOS
  <h1>Buscador: </h1>
  <form action="busqueda.php" method="POST">
  <label for="termino">Término de búsqueda:</label>
  <input type="text" id="termino" name="termino">
  <button type="submit">Buscar</button>
</form>

EOS;
require ('./includes/vistas/plantillas/plantilla.php');
?>
