<?php
		$mostrarMenu = false;
        var_dump($_POST);
        if (isset($_POST['mostrarOcultar'])) {
            if ($mostrarMenu) {
                $mostrarMenu = false;
            } else {
                $mostrarMenu = true;
            }
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
                <button type="submit" name="mostrarOcultar" style="background-image: src= "resources/menu.png"; 
                                                            width: 500px; 
                                                            height: 500px;
                                                            float: right; 
                                                            margin-rught: 15px;">
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