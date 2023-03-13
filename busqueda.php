<?php
require_once 'includes/config.php';

$resultado = '';

if (isset($_POST['termino'])) {
    $search_term = $_POST['termino'];
    $sql = "SELECT * FROM Viajes WHERE ciudad LIKE '%$search_term%'";
    $result= $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $resultados .= "Casas: " . $row["ciudad"] . "<br>";
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
