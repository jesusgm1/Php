<?php
require_once './modelo/Juego.php';
require_once './controller/juegosController.php';
session_start();
if (!isset($_SESSION['nombre'])) {
    header("location:index.php");
}
$juegos = juegosController::buscarTodos();
if ($juegos) {
    foreach ($juegos as $j) {
        echo "<a href='Datosjuego.php?Juego=$j->Imagen'><img src='$j->Imagen'></img></a>" . " ";
        echo $j->Nombre_juego . " ";
        echo $j->Nombre_consola . " ";
        echo $j->Anno . " ";
        echo $j->Precio . "<br>";
    }
}
?>
