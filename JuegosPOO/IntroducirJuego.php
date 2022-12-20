<?php
require_once './modelo/Juego.php';
require_once './controller/juegosController.php';
session_start();
if (!isset($_SESSION['nombre'])) {
    header("location:index.php");
}
if (isset($_POST['introducir'])) {
   if (is_uploaded_file($_FILES["imagen"]["tmp_name"])) {
        $fich = time() . "_" . $_FILES["imagen"]["name"];
        $ruta = "imagenes/".$fich;
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
        $j = juegosController::insertar($_POST["nombre"], $_POST["consola"], $_POST["anno"], $_POST["precio"],$ruta, $_POST["descripcion"]);
    }
}
?>

<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="" method="POST" enctype="multipart/form-data">
            Nombre:<input type="text" name="nombre"><br>
            Consola:<input type="text" name="consola"><br>
            Anno:<input type="text" name="anno"><br>
            Precio:<input type="text" name="precio"><br>
            Descripcion:<textarea name="descripcion"></textarea><br>
            Imagen:<input type="file" name="imagen"><br>
            <input type="submit" name="introducir" value="Introducir">
        </form>
    </body>
</html>
