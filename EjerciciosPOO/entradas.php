<?php
if(isset($_POST["comprar"])) {
    require_once 'classes/Zona.php';
    session_start();
$zona = new Zona(0,0);
$_SESSION ["entradas"] = $_POST["entradas"];
}
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1>Expocoches Campanillas</h1>
        <p>Bienvenido a Expocoches Campanillas. ?Cuantas entradas desea comprar?</p>
        <form action="" method="POST">
            Zona<select name="zona">
                <option value="Principal">Principal</option>
                <option value="compra-venta">compra-venta</option>
                <option value="VIP">VIP</option>
            </select>
            Numero de entradas
            <input type="number" name="entradas">
            <input type="submit" name="comprar" value="Comprar"><br><!-- comment -->
            <p>Zona principal:<?php if(isset($_POST["comprar"]) && $_POST["zona"] == "Principal"){ echo $zona->vender();}else { echo "1000"; }  ?> de 1000 entradas</p>
            <p>Zona compra-venta:<?php if(isset($_POST["comprar"]) && $_POST["zona"] == "compra-venta"){ echo $zona->vender();} else{ echo "200"; }  ?>  de 200 entradas</p>
            <p>Zona VIP:<?php if(isset($_POST["comprar"]) && $_POST["zona"] == "VIP"){ echo $zona->vender(); }else{ echo "25"; }  ?>  de 25 </p>
        </form>

    </body>
</html>

