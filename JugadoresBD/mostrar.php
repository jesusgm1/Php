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
        $conex = new mysqli("localhost", "dwes", "abc123.", "jugadores");
        if ($conex->connect_errno) {
            echo $conex->connect_error;
        } else {
            $resultado = $conex->query("SELECT * FROM jugadores");
            if ($conex->errno) {
                echo $conex->error;
            } else {
                while ($fila = $resultado->fetch_object()) {
                    echo $fila->nombre . "<br>";
                    echo $fila->DNI . "<br>";
                    echo $fila->dorsal . "<br>";
                    echo $fila->posicion . "<br>";
                    echo $fila->equipo . "<br>";
                    echo $fila->goles . "<br>";
                    echo "--------------------" . "<br>";
                }
            }
        }
        ?>
        <a href="index.php?MN">volver al menu</a><br>
    </body>
</html>
