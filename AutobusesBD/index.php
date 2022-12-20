<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (!(isset($_POST["consultar"]))) {
            ?>
            <p>Autobuses Comares<p>
                <?php
                try {
                    $conexion = new PDO('mysql:host=localhost;dbname=autobuses;charset=utf8mb4', 'dwes', 'abc123.');
                } catch (Exception $ex) {
                    $ex->getMessage();
                }
                ?>
            <form action="" method="POST">
                <input type="date" name="fecha"><br>
                <select name ="origen">
                    <?php
                    $consulta = $conexion->query("select distinct Origen from viajes");
                    while ($fila = $consulta->fetchObject()) {
                        echo "<option value='$fila->Origen'>$fila->Origen</option>";
                    }
                    ?>
                </select><br>
                <select name="destino">
                    <?php
                    $consulta = $conexion->query("select distinct Destino from viajes");
                    while ($fila = $consulta->fetchObject()) {
                        echo "<option value='$fila->Destino'>$fila->Destino</option>";
                    }
                    ?>    
                </select><br>
                <input type="submit" name="consultar" value="Consultar">
            </form>
            <?php
        }
        ?>
        <?php
        if (isset($_POST["consultar"])) {
            try {
                $conexion = new PDO('mysql:host=localhost;dbname=autobuses;charset=utf8mb4', 'dwes', 'abc123.');
                $consulta = $conexion->query("select * from viajes where Fecha='$_POST[fecha]' and Origen='$_POST[origen]' and Destino='$_POST[destino]'");
                if ($consulta->rowCount() == 0) {
                    echo "NO HAY NINGUN VIAJE DESDE $_POST[origen] hasta $_POST[destino] en la fecha $_POST[fecha]" . "<br>";
                }
                if ($consulta->rowCount() != 0) {
                    echo "Fecha: $_POST[fecha]<br>";
                    echo "Origen: $_POST[origen]<br>";
                    echo "Destino: $_POST[destino]<br>";
                    while ($fila = $consulta->fetchObject()) {
                        echo "Plazas: $fila->Plazas_libres"."<br>";
                    }
                    echo "<form action='' method='POST'>";
                    echo "Plazas a reservar: <input type=text name=reservaP><br>";
                    echo "<input type=submit name=reserva value=Reserva>";
                    echo "<input type=hidden name=fecha value=$_POST[fecha]>";
                    echo "<input type=hidden name=origen value=$_POST[origen]>";
                    echo "<input type=hidden name=destino value=$_POST[destino]>";
                    echo "</form>";
                }
            } catch (Exception $ex) {
                $ex->getMessage();
            }
        }
            if(isset($_POST["reserva"])) {
                 try {
                $conex = new PDO('mysql:host=localhost;dbname=autobuses;charset=utf8mb4', 'dwes', 'abc123.');
                $result = $conex->query("UPDATE viajes SET Plazas_libres=Plazas_libres-$_POST[reservaP] WHERE Fecha='$_POST[fecha]' and Origen='$_POST[origen]' and Destino='$_POST[destino]'");
                echo "Reserva de $_POST[reservaP] para ir desde $_POST[origen] hasta $_POST[destino] el $_POST[fecha] realizado correctamente<br>";
                echo "<a href='$_SERVER[PHP_SELF]'>VOLVER</a>";
            } catch (Exception $ex) {
                $ex->getMessage();
            }
        }
        ?>
    </body>
</html>
