<?php
session_start();
if(empty($_SESSION['user'])) {
    header("Location:index.php");
}
?>
<html>
    <head>
        <meta charset="Shift_JIS">
        <title></title>
    </head>
    <body style="background-color: <?php echo $_SESSION['colorF'] ?>">
        <p style="color: <?php echo $_SESSION['colorL'] ?>">Hola Bienvenido a la Ruby Web <?php echo $_SESSION['user'] ?></p><br>
        <a href="destrozar.php">salir</a><br>
        <a href="mostrarDatos.php">ver mis datos</a>
    </body>
</html>
<a href="inicio.php"></a>

