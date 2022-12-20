<?php
session_start();
if (!isset($_COOKIE["intentos"])) {
    setcookie("intentos", 2, time() + 3600);
}
if (isset($_POST["registrar"])) {
    header("Location: registro.php");
    exit();
}
if (isset($_POST["entrar"])) {
    $contador = 3;
    $usuario = "";
    $clave = md5($_POST["clave"]);
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=tema4_logueo;charset=utf8mb4', 'dwes', 'abc123.');
        $consulta = $conexion->query("select * from perfil_usuario where user='$_POST[usuario]' and pass='$clave'");
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    if ($consulta->rowCount() > 0) {
        while ($fila = $consulta->fetchObject()) {
            $_SESSION['colorL'] = $fila->color_letra;
            $_SESSION['colorF'] = $fila->color_fondo;
            $_SESSION['Letra'] = $fila->tipo_letra;
            $_SESSION['letraT'] = $fila->tam_letra;
            $_SESSION['user'] = $fila->user;
        }
        header("Location: inicio.php");
        exit();
    }
    if ($consulta->rowCount() == 0) {
              if (isset($_COOKIE["intentos"])) {
            if ($_COOKIE["intentos"] == 0) {
                header("Location:intentos.php");
            } else {
                setcookie("intentos", $_COOKIE["intentos"] - 1);
            }
        }
        echo "usuario y password incorrectos, te quedan" . $_COOKIE["intentos"] . "intentos";
    }
}
?>
<html>
    <head>
        <meta charset="Shift_JIS">
        <title></title>
    </head>
    <body>
        <form action="" method="POST">
            usuario<input type="text" name="usuario"><br>
            clave<input type="text" name="clave"><br>
            <input type="submit" name="registrar" value="Registrar"><br>
            <input type="submit" name="entrar" value="Entrar">
        </form>
    </body>
</html>
