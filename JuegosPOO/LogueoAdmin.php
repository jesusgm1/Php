<?php
require_once './modelo/Juego.php';
require_once './modelo/Usuario.php';
require_once './controller/juegosController.php';
require_once './controller/usuariosController.php';
require_once './controller/alquilerController.php';
session_start();
if (!isset($_SESSION['nombre'])) {
    header("location:index.php");
}
if (isset($_POST["cerrar"])) {
    header("location:destrozar.php");
}
if (isset($_POST["Alquilar"])) {
    $a = alquilerController::insertar($_POST["codigo"], $_SESSION['dni'], date('Y-m-d'), null);

    header("location:LogueoAdmin.php");
}
?>
<html>
    <head>
        <meta charset="Shift_JIS">
        <title></title>
    </head>
    <body>
        <h1>Juegos comares</h1>
        <p>Bienvenido <?php echo $_SESSION['nombre'] ?></p>
        <form action="" method="POST">
            <input type="submit" name="cerrar" value="Cerrar Sesion">
            <br>
            <a href="ListadoJuegos.php">Listado de Juegos</a>
            <a href="ListadoAlquilados.php">Listado de Juegos Alquilados</a>
            <a href="ListadoNoAlquilados.php">Listado de Juegos No Alquilados</a>
            <a href="ListadoMios.php">Mis Juegos Alquilados</a>
            <a href="IntroducirJuego.php">Introducir Juego</a>
            <a href="ModificarJuego.php">Modificar Juego</a>
            <table border="2">
                <th style="background-color:blue">caratula nombreJ nombreC anno prec</th>
                    <?php
                    $juegos = juegosController::buscarTodos();
                    if ($juegos) {
                        foreach ($juegos as $j) {
                            echo "<tr>";
                            echo "<form action='' method='POST'>";
                            echo "<tr>";
                            echo "<td><a href='Datosjuego.php?Juego=$j->Imagen'><img src='$j->Imagen'></img></a></td>" . " ";
                            echo "<td>$j->Nombre_juego</td>" . " ";
                            echo "<td>$j->Nombre_consola</td>" . " ";
                            echo "<td>$j->Anno</td>" . " ";
                            echo "<td>$j->Precio</td>" . "<br>";
                            echo "<td><input type='submit' name='Alquilar' value='alquilar'></td><br>";
                            echo "<input type=hidden name=codigo value=$j->Codigo>";
                            echo "</form>";
                        }
                    }
                    ?>
                </td>
                </tr>
            </table>
        </form>
    </body>
</html>