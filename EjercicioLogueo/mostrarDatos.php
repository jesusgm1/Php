<?php
session_start();
if(empty($_SESSION['user'])) {
    header("Location:index.php");
}
try {
    $conexion = new PDO('mysql:host=localhost;dbname=tema4_logueo;charset=utf8mb4', 'dwes', 'abc123.');
    $consulta = $conexion->query("select * from perfil_usuario where user='$_SESSION[user]'");
    while ($fila = $consulta->fetchObject()) {
        $nombre = $fila->nombre;
        $apellido = $fila->apellidos;
        $direccion = $fila->direccion;
        $localidad = $fila->localidad;
    }
} catch (PDOException $ex) {
    $ex->getMessage();
}
?>
<html>
    <head>
        <meta charset="Shift_JIS">
        <title></title>
    </head>
    <body style="background-color: <?php echo $_SESSION['colorF'] ?>">
         <p style="color:<?php echo $_SESSION['colorL'] ?>"><?php echo $nombre ?></p>
         <p style="color:<?php echo $_SESSION['colorL'] ?>"><?php echo $apellido ?></p>
         <p style="color:<?php echo $_SESSION['colorL'] ?>"><?php echo $direccion ?></p>
         <p style="color:<?php echo $_SESSION['colorL'] ?>"><?php echo $localidad ?></p>
        <a href="inicio.php">volver</a><br>
        <a href="destrozar.php">salir</a> 
    </body>
</html>
