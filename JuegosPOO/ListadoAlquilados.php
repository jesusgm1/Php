<?php
require_once './modelo/Juego.php';
require_once './controller/juegosController.php';
require_once './controller/alquilerController.php';
session_start();
if (!isset($_SESSION['nombre'])) {
    header("location:index.php");
}
@$juegos = juegosController::buscarAlquilados();
if ($juegos) {
    foreach ($juegos as $j) {
        echo "<a href='Datosjuego.php?Juego=$j->Imagen'><img src='$j->Imagen'></img></a>" . " ";
        echo $j->Nombre_juego . " ";
        echo $j->Nombre_consola . " ";
        echo $j->Anno . " ";
        echo $j->Precio . "<br>";
    }
}
else {
       echo "no hay juegos alquilados en este momento";
   }
?>
