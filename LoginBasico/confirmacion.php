<?php
if(isset($_COOKIE['nombre'])) {
    echo "soy el usuario $_COOKIE[nombre] y mi ultima sesion fue el $_COOKIE[fecha]";
}
else {
    echo "usuario sin registro inicio a las $_COOKIE[fecha]";
}
?>
<form action="index.php" method="POST">
    <input type="submit" name="volver al inicio" value="inicio">
</form>
<br>



