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
        <form action="" method="POST">
            buscar por:<select name="campo"><br>
                <option value="DNI">DNI</option>
                <option value="equipo">equipo</option>
                <option value="posicion">posicion</option>
            </select><br>
            elemento a buscar:<input type="text" name="buscado" value=""><br>
            <input type="submit" name="buscar" value="Buscar">
        </form>
        <?php
        if (isset($_POST["buscar"])) {
            $conex = new mysqli("localhost", "dwes", "abc123.", "jugadores");
            if ($conex->connect_errno) {
                echo $conex->connect_error;
            } else {
                if ($_POST["campo"] != "posicion") {
                    $resultado = $conex->query("SELECT * FROM jugadores WHERE $_POST[campo] = '$_POST[buscado]' ");
                    if ($conex->errno) {
                        echo $conex->error;
                    } if ($conex->affected_rows != 0) {
                        while ($fila = $resultado->fetch_object()) {
                            echo $fila->nombre . "<br>";
                            echo $fila->DNI . "<br>";
                            echo $fila->dorsal . "<br>";
                            echo $fila->posicion . "<br>";
                            echo $fila->equipo . "<br>";
                            echo $fila->goles . "<br>";
                            echo "-----------------" . "<br>";
                        }
                    } else {
                        echo "no hay resultados disponibles";
                    }
                } else {
                    $resultado = $conex->query("SELECT * FROM jugadores WHERE $_POST[campo] like '%$_POST[buscado]%' ");
                    if ($conex->errno) {
                        echo $conex->error;
                    } if ($conex->affected_rows != 0) {
                        while ($fila = $resultado->fetch_object()) {
                            echo $fila->nombre . "<br>";
                            echo $fila->DNI . "<br>";
                            echo $fila->dorsal . "<br>";
                            echo $fila->posicion . "<br>";
                            echo $fila->equipo . "<br>";
                            echo $fila->goles . "<br>";
                            echo "-----------------" . "<br>";
                        }
                    } else {
                        echo "no hay resultados disponibles"."<br>";
                    }
                }
            }
        }
        ?>
        <a href="index.php?MN">volver al menu</a><br>
    </body>
</html>
