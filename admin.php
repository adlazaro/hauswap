<?php

$tituloPagina = 'Administrador';

$contenidoPrincipal=<<<EOS

    <p>AMINISTRADOR</p>
    <!--los getionar__.php ??? -->

    <a href="gestionarUsuarios.php"><button type="button">Gestionar usuarios</button></a>
    <a href="gestionarContenido.php"><button type="button">Gestionar contenido</button></a>

EOS;

require ('./includes/vistas/plantillas/plantilla.php');
?>
