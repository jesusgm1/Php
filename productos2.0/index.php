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
        $conexion = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8mb4', 'dwes', 'abc123.');
        ?>
        <!-- Encabezado -->
        <div id="encabezado">
            <h1>Ejercicio :Conjuntos de resultados de Mysqli</h1><!-- comment -->
            <?php
            $result = $conexion->query("select nombre,cod from familia");
            ?>
            <form action="" method="POST">
                Producto: 
                <select name="familia" >
                    <?php
                    while ($fila = $result->fetchObject()) {
                        $selec = "";
                        if ($_POST['boton1'] && $_POST['familia'] == $fila->nombre)
                            $selec = "selected";
                        echo "<option value='$fila->nombre' $selec>$fila->nombre</option>";
                    }
                    ?>
                </select>
                <input name="boton1" type="submit" value="Mostrar Stock"></input>
            </form>
        </div>
            <div id="contenido">
                <?php
                if (isset($_POST['boton1'])) {
                    $conexion = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8mb4', 'dwes', 'abc123.');
                    $consulta_codigo = $conexion->query("SELECT cod FROM familia WHERE nombre = '$_POST[familia]'");
                    while ($fila = $consulta_codigo->fetchObject()) {
                        $busqueda = $fila->cod;
                    }
                    $consulta = $conexion->query("SELECT * FROM producto WHERE familia = '$busqueda'");
                    while ($fila = $consulta->fetchObject()) {
                        ?>
                        <form action="editar.php" method="POST">
                            <p><?php echo $fila->nombre_corto, $fila->PVP; ?><input type="submit" name="editar" value="Editar"></p>
                            <input type="hidden" name="nombreC" value="<?php echo $fila->nombre_corto ?>">
                            <input type="hidden" name="nombre" value="<?php echo $fila->nombre ?>">
                            <input type="hidden" name="descripcion" value="<?php echo $fila->descripcion ?>">
                            <input type="hidden" name="PVP" value="<?php echo $fila->PVP ?>">
                            <input type="hidden" name="codigo" value="<?php echo $fila->cod ?>"> 
                        </form>

                        <?php
                    }
                }
                if (isset($_POST['aceptar'])) {
                    if (isset($_POST["aceptar"])) {
                        try {
                            $registro = $conexion->exec("UPDATE producto SET nombre='$_POST[nombre]',nombre_corto='$_POST[nombreC]',descripcion='$_POST[descripcion]',PVP=$_POST[PVP] WHERE cod='$_POST[codigoR]'");
                        } catch (PDOException $ex) {
                            $ex->getMessage();
                        }
                    }
                    if($registro) {
                         echo "actualizacion hecha";
                    }
                }
                if(isset($_POST['cancelar'])) {
                    echo "no ha actualizado nada";
                }
                ?>
            </div>           
            <div id="pie"></div>
    </body>
</html>
