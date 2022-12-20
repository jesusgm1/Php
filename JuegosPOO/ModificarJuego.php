<?php

require_once './modelo/Juego.php';
require_once './controller/juegosController.php';
require_once './controller/alquilerController.php';
session_start();
if (!isset($_SESSION['nombre'])) {
    header("location:index.php");
}
if (isset($_POST["Borrar"])) {
    juegosController::borrar($_POST["codigo"]);
    header:("location:LogueoAdmin.php");
}
if(isset($_POST["introducir"])) {
    juegosController::borrar($_POST["codigo"]);
     $fich = time() . "_" . $_FILES["imagen"]["name"];
     $ruta = "imagenes/".$fich;
     move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
   juegosController::insertar($_POST["nombre"],$_POST["consola"],$_POST["anno"],$_POST["precio"],$ruta,$_POST["descripcion"]);
   header("location:LogueoAdmin.php");
}
@$juegos = juegosController::buscarTodos();
if (!isset($_POST["Editar"]) || !isset($_POST["Borrar"])) {
    if ($juegos) {
        foreach ($juegos as $j) {
            echo "<form action = ' ' method='POST'>";
            echo "<a href='Datosjuego.php?Juego=$j->Imagen'><img src='$j->Imagen'></img></a>" . " ";
            echo $j->Nombre_juego . " ";
            echo $j->Nombre_consola . " ";
            echo $j->Anno . " ";
            echo $j->Precio . "<input type='submit' name='Editar' value='editar'><input type='submit' name='Borrar' value='borrar'><br>";
            echo "<input type=hidden name=codigo value=$j->Imagen>";
            echo "</form>";
        }
    }
}
if (isset($_POST["Editar"])) {
    $buscado = juegosController::buscar($_POST["codigo"]);
    if ($buscado) {
            echo "<form action = ' ' method='POST' enctype='multipart/form-data'>";
            echo "Nombre:<input type='text' name='nombre' value='$buscado->Nombre_juego'><br>";
            echo "Consola:<input type='text' name='consola' value='$buscado->Nombre_consola'><br>";
            echo "Anno:<input type='text' name='anno' value='$buscado->Anno'><br>";
            echo "Precio:<input type='text' name='precio' value='$buscado->Precio'><br>";
            echo "Descripcion:<textarea name='descripcion'>$buscado->descripcion</textarea><br>";
            echo "Imagen:<input type='file' name='imagen' value='$buscado->Imagen'><br>";
            echo "<input type='submit' name='introducir' value='Introducir'>";
            echo "<input type=hidden name=codigo value=$j->Imagen>";
            echo "</form>";
    }
}
?>
