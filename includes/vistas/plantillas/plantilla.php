<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $tituloPagina ?></title>
</head>
<body>
<div id="contenedor">
<?php
require ('includes/vistas/comun/cabecera.php');
/* require('includes/vistas/comun/sidebarIzq.php'); */
?>
	<main>
		<article>
			<?= $contenidoPrincipal ?>
		</article>
	</main>
<?php
/* require('includes/vistas/comun/sidebarDer.php');*/
require('includes/vistas/comun/pie.php');
?>
</div>
</body>
</html>
