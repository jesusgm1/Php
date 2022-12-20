<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
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
            while ($fila = $resultado->fetch_object()) {
                $nombre = $fila->nombre;
                $DNI = $fila->DNI;
                $dorsal = $fila->dorsal;
                $posicion = $fila->posicion;
                $equipo = $fila->equipo;
                $goles = $fila->goles;
            }
            echo '<form action="" method="POST">';
            echo 'Nombre<input type="text" name="nombre" value=' . $nombre . '><br>';
            echo 'DNI<input type="text" name="dni" value=' . $DNI . '><br>';
            echo 'dorsal<input type="text" value=' . $dorsal . '>';
            echo '&nbsp;<select name="dorsal"><br>';
            for ($i = 1; $i <= 11; $i++) {
                echo '<option value=' . $i . ' selected=" ">' . $i . '</option>';
            }
            echo '</select><br>';
            echo 'posicion<input type="text" value=' . $posicion . '>';
            echo '&nbsp;<select multiple="" name="posicion[]">';
            echo '<option value="1">portero</option>';
            echo '<option value="2">defensa</option>';
            echo '<option value="4">centrocampista</option>';
            echo '<option value="8">delantero</option>';
            echo '</select><br>';
            echo 'Equipo<input type="text" name="equipo" value=' . $equipo . '><br>';
            echo 'Goles<input type="text"  name="goles"  value=' . $goles . ' ><br>';
            echo '<input type="submit" name="modificar" value="modificar">';
            echo '</form>';
        }
        if (isset($_POST["modificar"])) {
            if (!(empty($_POST["posicion"]))) {
                $suma = 0;
                foreach ($_POST["posicion"] as $value) {
                    $suma += $value;
                }
                $dwes = new mysqli("localhost", "dwes", "abc123.", "jugadores");
                if ($dwes->connect_errno) {
                    echo $dwes->connect_error;
                } else {
                    $resultado2 = $dwes->query("UPDATE jugadores SET nombre='$_POST[nombre]',dni='$_POST[dni]',dorsal=$_POST[dorsal], posicion=$suma,equipo='$_POST[equipo]',goles=$_POST[goles] WHERE DNI='$_POST[dni]'");
                    if ($dwes->errno) {
                        echo $conex->error;
                    } else {
                        echo "actualizacion realizada" . "<br>";
                    }
                }
            }
            if(empty($_POST["posicion"])) {
                 $dwes = new mysqli("localhost", "dwes", "abc123.", "jugadores");
                if ($dwes->connect_errno) {
                    echo $dwes->connect_error;
                } else {
                    $resultado2 = $dwes->query("UPDATE jugadores SET nombre='$_POST[nombre]',dni='$_POST[dni]',dorsal=$_POST[dorsal],equipo='$_POST[equipo]',goles=$_POST[goles] WHERE DNI='$_POST[dni]'");
                    if ($dwes->errno) {
                        echo $conex->error;
                    } else {
                        echo "actualizacion realizada" . "<br>";
                    }
                }
            }
        }
        ?>
        <a href="index.php?MN">volver al menu</a><br>
    </body>
</html>

