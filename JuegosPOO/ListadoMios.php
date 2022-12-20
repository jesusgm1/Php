<?php
require_once './modelo/Juego.php';
require_once './controller/juegosController.php';
require_once './controller/alquilerController.php';
session_start();
if (!isset($_SESSION['nombre'])) {
    header("location:index.php");
}
@$juegos = juegosController::MisAlquilados($_SESSION['dni']);
if(isset($_POST["Devolver"])) {
    alquilerController::borrar($_POST["codigo"]);
    if($_SESSION['nombre'] == "admin") {
        header("location:LogueoAdmin.php");
    }
    else {
         header("location:Logueo.php");
    }
}
if ($juegos) {
    foreach ($juegos as $j) {
         echo "<form action='' method='POST'>";
        echo "<a href='Datosjuego.php?Juego=$j->Imagen'><img src='$j->Imagen'></img></a>" . " ";
        echo $j->Nombre_juego . " ";
        echo $j->Nombre_consola . " ";
        echo $j->Anno . " ";
        echo $j->Precio . "<input type='submit' name='Devolver' value='devolver'><br>";
        echo "<input type=hidden name=codigo value=$j->Codigo>";
        echo "</form>";
    }
}
else {
    echo "no hay juegos alquilados en este momento para ti";
}
 
?>
