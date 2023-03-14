<?php
require_once 'includes/config.php';
require_once 'includes/Usuario.php';

                if (isset($_SESSION["login"])) 
                    echo'Iniciar Sesión';
                else
                   echo 'Cerrar Sesión';
                
?>


<?php
	    echo '<div style="background-color: #FBC485;    height: 100%; 
                                                    width: 25%;
                                                    position: fixed;
                                                    top: 0;
                                                    right: 0;
                                                    padding: 30px;">
                <a href="./index.php">
                Inicio
                </a> <br> <br>
                <a href="./chat.php">
                Chats
                </a> <br> <br>
                <a href="./miCuenta.php">
                Cuenta
                </a> <br> <br>
                <a href="./Login.php">
                Iniciar Sesión/Registrarse
                </a> <br> <br>

            </div>';
?>