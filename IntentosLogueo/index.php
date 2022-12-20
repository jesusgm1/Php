<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    if(isset($_POST["Registro"])) {
        echo "<form action='' method='POST'>";
         echo  "Usuario:<input type='text' name='texto'><br>";
         echo  "Clave:<input type='password' name='pass'><br>";
         echo  "<input type='submit' name='Acceder' value='acceder'>";
         echo  "<input type='submit' name='Registro' value='registro'>";
        echo "</form>";
    }
?>
<html>
    <head>
        <meta charset="Shift_JIS">
        <title></title>
    </head>
    <body>
        <form action="" method="POST">
            Usuario:<input type="text" name="texto"><br>
            Clave:<input type="password" name="pass"><br>
            <input type="submit" name="Acceder" value="acceder">
            <input type="submit" name="Registro" value="registro">
        </form>
    </body>
</html>
