<?php
require_once './modelo/Juego.php';
require_once './modelo/Usuario.php';
require_once './controller/juegosController.php';
require_once './controller/usuariosController.php';
if (isset($_POST['login']) && isset($_POST['DNI']) && isset($_POST['clave'])) {
try {
     $cliente = usuariosController::buscar($_POST['DNI'], $_POST['clave']);
    if ($cliente != null) {
        session_start();
        if ($cliente->getNombre() == "Admin") {
            $_SESSION['nombre'] = $cliente->getNombre();
            $_SESSION['dni'] = $cliente->getDNI();
            $_SESSION['apellidos'] = $cliente->getApellidos();
            $_SESSION['direccion'] = $cliente->getDireccion();
            header("location:LogueoAdmin.php");
        } else {
            $_SESSION['nombre'] = $cliente->getNombre();
            $_SESSION['dni'] = $cliente->getDNI();
            header("location:Logueo.php");
        }
    }
} catch (Exception $ex) {
    $ex->getMessage();
}  
}
if(isset($_POST["registrer"])) {
    header("location:registro.php");
}
?>
<html>
    <head>
        <meta charset="Shift_JIS">
        <title></title>
    </head>
    <body>
        <h1>Juegos omares</h1>
        <form action="" method="POST">
            DNI:<input type="text" name="DNI">
            Usuario:<input type="text" name="clave">
            <input type="submit" name="login" value="Login">
            <input type="submit" name="registrer" value="Registro">
        </form>
        <table border="2">
            <th style="background-color:blue">caratula nombreJ nombreC anno prec</th>
                    <?php
                    $juegos = juegosController::buscarTodos();
                    if ($juegos) {
                        foreach ($juegos as $j) {
                            echo "<tr>";
                            echo "<td><a href='Datosjuego.php?Juego=$j->Imagen'><img src='$j->Imagen'></img></a></td>" . " ";
                            echo "<td>$j->Nombre_juego</td>" . " ";
                            echo "<td>$j->Nombre_consola</td>" . " ";
                            echo "<td>$j->Anno</td>" . " ";
                            echo "<td>$j->Precio</td>" . "<br>";
                            echo "</tr>";
                        }
                    }
                    ?>
        </table>
    </body>
</html>
