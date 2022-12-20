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
            Nombre<input type="text" name="nombre"><br>
            DNI<input type="text" name="dni"><br>
            dorsal<select name="dorsal"><br>
                <?php
                for ($i = 1; $i <= 11; $i++) {
                    echo '<option value=' . $i . '>' . $i . '</option>';
                }o
                ?>
            </select><br>
            poosicion<select multiple="" name="posicion[]">
                <option value="1">portero</option>
                <option value="2">defensa</option>
                <option value="4">centrocampista</option>
                <option value="8">delantero</option>
            </select><br>
            Equipo<input type="text" name="equipo"><br>
            Goles<input type="text"  name="goles"><br>
            <input type="submit" name="introducir" value="Introducir">
        </form>
        <a href="index.php?MN">volver al menu</a><br>
        <?php
        if (isset($_POST["introducir"])) {
            $correcto = true;
            if (!(preg_match('/^\D/', $_POST["nombre"])) || empty($_POST["nombre"])) {
                echo "has habido error en el nombre" . "<br>";
                $correcto = false;
            }
            if (!(preg_match('/^[1-9]{8}[A-Z]{1}/', $_POST["dni"]))) {
                echo "ha habido error en el dni" . "<br>";
                $correcto = false;
            }
            if (empty($_POST["equipo"])) {
                echo "ha habido error en el equipo" . "<br>";
                $correcto = false;
            }
            if (empty($_POST["goles"]) || !(preg_match('/^[1-9]{1,3}/', $_POST["goles"]))) {
                echo "ha habido error en los goles" . "<br>";
                $correcto = false;
            }
            if ($correcto == true) {
                $suma = 0;
                foreach ($_POST["posicion"] as $value) {
                    $suma += $value;
                }
                $conex = new mysqli("localhost", "dwes", "abc123.", "jugadores");
                if ($conex->connect_errno) {
                    echo $conex->connect_error;
                } else {
                    $consulta = $conex->query("INSERT INTO JUGADORES (nombre,DNI,dorsal,posicion,equipo,goles)
                            VALUES ('$_POST[nombre]','$_POST[dni]','$_POST[dorsal]',$suma,'$_POST[equipo]','$_POST[goles]')");
                    if ($conex->errno) {
                        echo $conex->error;
                    } else {
                        header("registro realizado", "Location : /index.php");
                        print "registro realizado";
                    }
                }
            }
        }
        ?>
    </body>
</html>
