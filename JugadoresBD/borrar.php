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
            DNI<input type="text" name="DNI">
            <input type="submit" name="buscar" value="Enviar">
        </form>
        <?php
        $nombre = false;
        $dni = false;
        $dorssal = false;
        $posicion = false;
        $equipo = false;
        $numero_goles = false;

        if (isset($_POST['buscar'])) {
            $dwes = new mysqli("localhost", "dwes", "abc123.", "jugadores");
            if ($dwes->connect_errno) {
                echo $dwes->connect_error;
            } else {
                $resultado = $dwes->query("SELECT * FROM jugadores WHERE DNI='$_POST[DNI]'");
                if ($dwes->errno) {
                    echo $conex->error;
                }
            }
            if ($dwes->affected_rows != 0) {
                while ($fila = $resultado->fetch_object()) {
                    echo "nombre:" . $fila->nombre . "<br>";
                    echo "dni:" . $fila->DNI . "<br>";
                    echo "dni:" . $fila->dorsal . "<br>";
                    echo "posicion:" . $fila->posicion . "<br>";
                    echo "equipo:" . $fila->equipo . "<br>";
                    echo "goles:" . $fila->goles . "<br>";
                }
                echo '<form action="" method="POST">';
                echo '<input type="hidden" name="dni" value="' . $_POST['DNI'] . '">';
                echo '<input type="submit" name="borrar" value="Borrar">';
                echo '</form>';
            } else {
                echo "no hay ningun jugador para borrar"."<br>";
            }
        }
        if (isset($_POST["borrar"])) {
            $dwes = new mysqli("localhost", "dwes", "abc123.", "jugadores");
            if ($dwes->connect_errno) {
                echo $dwes->connect_error;
            } else {
                $resultado2 = $dwes->query("DELETE FROM jugadores WHERE DNI='$_POST[dni]'");
                if ($dwes->errno) {
                    echo $conex->error;
                } else {
                    echo "borrado realizado"."<br>";
                }
            }
        }
        ?>
        <a href="index.php?MN">volver al menu</a><br>
    </body>
</html>
