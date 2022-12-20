<?php
require_once './modelo/Juego.php';
require_once './modelo/Usuario.php';
require_once './controller/juegosController.php';
require_once './controller/usuariosController.php';
$j = juegosController::buscar($_GET['Juego']);
    if ($j) {
            echo "<img src='$j->Imagen'></img>" . "<br>";
            echo $j->Nombre_juego . "<br>";
            echo $j->Nombre_consola . "<br>";
            echo $j->Anno . "<br>";
            echo $j->Precio . "<br>";
            echo $j->descripcion . "<br>";
    }
?>
