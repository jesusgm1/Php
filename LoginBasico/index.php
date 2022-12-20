<?php
if (isset($_POST['entrar'])) {
    $usuarioC = "";
    $passwordC = md5($_POST["pass"]);
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=usuarios;charset=utf8mb4', 'dwes', 'abc123.');
        $consulta = $conexion->query("select usuario,pass from usuario where usuario='$_POST[usuario]' and pass='$passwordC'");
        while ($fila = $consulta->fetchObject()) {
            $usuarioC = $fila->usuario;
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    if ($usuarioC == $_POST["usuario"]) {
        setcookie("fecha", date("d-m-Y,H:i:s"));
        if (isset($_POST["recordar"])) {
            setcookie("nombre", $usuarioC);
            setcookie("pass", $_POST["pass"]);
        }
        header("Location: confirmacion.php");
        exit();
    } else {
        echo "usuario y password incorrectos";
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
            <p>usuario</p><input type="text" name="usuario" value="<?php if (isset($_COOKIE['nombre'])) echo $_COOKIE['nombre'] ?>">
            <p>password</p><input type="text" name="pass" value="<?php if (isset($_COOKIE['pass'])) echo $_COOKIE['pass'] ?>"><br>
            recordar<input type="checkbox" name="recordar" value="recordar"><br>
            <input type="submit" name="entrar" value="Entrar"><br>
        </form>
    </body>
</html>
