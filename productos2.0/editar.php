<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="ejercicio2.css" rel="stylesheet" type="text/css">
        <title></title>
    </head>
    <body>
        <?php
        if (!isset($_POST['editar'])) {
            header("Location: index.php");
            exit();
        }
        ?>
        <div id="encabezado">
            <h1>Modificacion de producto</h1>
        </div>
        <div id="contenido">
            <form action="index.php" method="POST">
                <h1>Producto</h1>
                <input type="text" name="nombreC" value="<?php echo $_POST["nombreC"] ?>"><br>
                <p>nombre</p>
                <textarea rows="10" cols="50" name="nombre"><?php echo $_POST["nombre"] ?></textarea><br>
                <p>descripcion</p>
                <textarea rows="10" cols="50" name="descripcion"><?php echo $_POST["descripcion"] ?></textarea><br>
                <p>precio</p>
                <input type="text" name="PVP" value="<?php echo $_POST["PVP"] ?>"><br>
                <br>
                <input name="aceptar" type="submit" value="Aceptar">
                <input name="cancelar" type="submit" value="Cancelar">
                <input type="hidden" name="codigoR" value="<?php echo $_POST["codigo"] ?>">
            </form>
        </div>
    </body>
</html>

