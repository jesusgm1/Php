<?php
if (isset($_POST["cancelar"])) {
    header("Location: index.php");
    exit();
}
if (isset($_POST["aceptar"])) {
    session_start();
    $_SESSION['colorL'] = $_POST['colorL'];
    $_SESSION['colorF'] = $_POST['colorF'];
    $_SESSION['Letra'] = $_POST['Letra'];
    $_SESSION['letraT'] = $_POST['LetraT'];
    $_SESSION['user'] = $_POST['usuario'];
    $clave = md5($_POST["clave"]);
    try {
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=tema4_logueo;charset=utf8mb4', 'dwes', 'abc123.');
            @$consulta = $conexion->query("select * from perfil_usuario where user='$_POST[usuario]' and pass='$clave'");
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        if ($consulta->rowCount() > 0) {
            echo "usuario existente,elija otro";
        } else {
            $insercion = $conexion->exec("INSERT INTO perfil_usuario (nombre,apellidos,direccion,localidad,user,pass,color_letra,color_fondo,tipo_letra,tam_letra)
        VALUES ('$_POST[nombre]','$_POST[apellido]','$_POST[direccion]','$_POST[localidad]','$_POST[usuario]','$clave','$_POST[colorL]','$_POST[colorF]','$_POST[Letra]','$_POST[LetraT]')");
            header("Location: inicio.php");
            exit();
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
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
            Nombre<input type="text" name="nombre"><br>
            Apellidos<input type="text" name="apellido"><br>
            Direccion<input type="text" name="direccion"><br>
            Localidad<input type="text" name="localidad"><br>
            Usuario<input type="text" name="usuario"><br>
            Clave<input type="text" name="clave"><br>
            <select name="colorL">
                <option value="red">Rojo</option>
                <option value="blue">Azul</option>
                <option value="yellow">Amarillo</option>
                <option value="green">Verde</option>
            </select><br>
            <select name="colorF">
                <option value="red">Rojo</option>
                <option value="blue">Azul</option>
                <option value="yellow">Amarillo</option>
                <option value="green">Verde</option>
            </select><br>
            <select name="Letra">
                <option value="Times New Roman">Times New Roman</option>
                <option value="Verdana">Verdana</option>
            </select><br>
            <select name="LetraT">
                <option value="12">12</option>
                <option value="16">16</option>
                <option value="24">24</option>
                <option value="30">30</option>
            </select><br>
            <input type="submit" name=cancelar value="Cancelar"><br>
            <input type="submit" name="aceptar" value="Aceptar">
        </form>
    </body>
</html>


