<?php
		$mostrarMenu = false;
        if (isset($_POST['mostrarOcultar'])) {
            $mostrarMenu = ! $mostrarMenu; //cambia el valor
        }  
?>

<?php
// Obtener el valor actual de $mostrarMenu de la cookie, si existe
if (isset($_COOKIE['mostrarMenu'])) {
    $mostrarMenu = $_COOKIE['mostrarMenu'] == 'true';
} else {
    $mostrarMenu = false;
}

// Actualizar el valor de $mostrarMenu si se envió el formulario
if (isset($_POST['mostrarOcultar'])) {
    $mostrarMenu = !$mostrarMenu;
    setcookie('mostrarMenu', $mostrarMenu ? 'true' : 'false', time() + 3600, '/');
}
// Mostrar Menu cuando se haga click en el botón
if ($mostrarMenu)
    require('menu.php');
?>

<?php
	echo '<header style="background-color: #FBC485; height: 80px; width: 100%; text-align: center;">
                <a href="./index.php">
                    <img src="./resources/logo.png"  alt="Logo" 
                                                            height="80px" 
                                                            style="float: left; margin-left: 15px;">
                </a>

                <img src="./resources/nombre.png"    alt="Nombre" 
                                                            height="80px">
                            
                <!--Botón--!>
                <form method="post">
                <button type="submit" name="mostrarOcultar" style="position: absolute;
                                                                   top: 0;
                                                                   right: 0;
                                                                   margin-top: 10px;
                                                                   margin-right: 10px;
                                                                    width: 70px; 
                                                                    height: 70px;
                                                                    background-color: transparent;
                                                                    border-color:transparent;">
                            <img src="./resources/menu.png" alt="Menu" 
                                                            height="70px"
                                                            width="70px"
                                                            style="position: absolute;
                                                                   top: 0;
                                                                   right: 0;">
                </button>
                </form>
                

                <!--
                <a href="./includes/vistas/comun/menu.php">
                    <img src="./resources/logo.png"  alt="Logo" 
                                                            height="80px" 
                                                            style="float: right; margin-left: 15px;">
                </a> --!>
            </header>';
?>