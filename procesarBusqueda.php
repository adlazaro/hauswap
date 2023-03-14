<?php
require_once 'includes/config.php';

$resultados = '';

if (isset($_POST['termino'])) {
    $search_term = $_POST['termino'];
    $sql = "SELECT * FROM propiedades WHERE localizacion LIKE '%$search_term%'";
    $result= $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $resultados .= "Casas: " . "<br>" . $row["nombre"] ." en     " . $row["localizacion"] . "<br>";
        }
    } else {
        echo "0 resultados";
    }
}

$tituloPagina = 'Busqueda';
$contenidoPrincipal=<<<EOS
$resultados
EOS;
require ('./includes/vistas/plantillas/plantilla.php');
?>
