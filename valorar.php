<?php

$tituloPagina = 'Valorar';

$contenidoPrincipal=<<<EOS

<!--Para las estrellas  (lo he encontrado en una pag pero habrá mil maneras y si hacemos esta igual es mejor hacer un css aparte) pero en esta practica justo eso no importa-->

        <style>
        p.clasificacion {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        
        p.clasificacion input {
            position: absolute;
            top: -100px;
        }
        
        p.clasificacion label {
            float: right;
            color: #333;
        }
        
        
        p.clasificacion label:hover,
        p.clasificacion label:hover ~ label,
        p.clasificacion input:checked ~ label {
            color: #dd4;
        }
        </style>

        <h1>Mi viaje a ...</h1>
        <img src="" id="valorarFoto" width="px" height="px">
        <p>VALORAR</p>
        <p class="clasificacion">
        <input id="radio1" type="radio" name="estrellas" value="5">
        <label for="radio1">★</label>
        <input id="radio2" type="radio" name="estrellas" value="4">
        <label for="radio2">★</label>
        <input id="radio3" type="radio" name="estrellas" value="3">
        <label for="radio3">★</label>
        <input id="radio4" type="radio" name="estrellas" value="2">
        <label for="radio4">★</label>
        <input id="radio5" type="radio" name="estrellas" value="1">
        <label for="radio5">★</label>


EOS;

require ('./includes/vistas/plantillas/plantilla.php');
?>