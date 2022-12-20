<?php
require_once './modelo/Usuario.php';
require_once './controller/usuariosController.php';

if (isset($_POST['aceptar'])) {
    $u = usuariosController::insertar($_POST["DNI"], $_POST["nombre"], $_POST["apellidos"], $_POST["direccion"], $_POST["localidad"], md5($_POST["clave"]), $_POST["tipo"]);
}
?>

<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="" method="POST">
            DNI:<input type="text" name="DNI"><br>
            Nombre:<input type="text" name="nombre"><br>
            Apellidos:<input type="text" name="apellidos"><br>
            Direccion:<input type="text" name="direccion"><br>
            Localidad:<input type="text" name="localidad"><br>
            Clave:<input type="text" name="clave"><br>
            Tipo:<input type="text" name="tipo"><br>
            <input type="submit" name="aceptar" value="Aceptar">
        </form>
    </body>
</html>