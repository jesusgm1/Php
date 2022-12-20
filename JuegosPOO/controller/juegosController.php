<?php

require_once 'conexion.php';
require_once './modelo/Juego.php';

class juegosController {

    public static function buscarTodos() {
        try {
            $conex = new conexion();
            $juego = $conex->query("SELECT * FROM juegos");
            $j = new Juego();
            while ($reg = $juego->fetchObject()) {
                $j->CrearJuego($reg->Codigo, $reg->Nombre_juego, $reg->Nombre_consola, $reg->Anno, $reg->Precio, $reg->Alquilado, $reg->Imagen, $reg->descripcion);
                $juegos[] = clone($j);
            }
            unset($conex);
            return $juegos;
        } catch (PDOException $ex) {
            echo "<a href=index.php>Ir a Inicio<a>";
            die("error en la BD" . $ex->message());
        }
    }

    public static function buscar($nombre) {
        try {
            $conex = new conexion();
            $buscado = $conex->query("SELECT * FROM juegos where Imagen='$nombre'");
            if ($buscado->rowcount()) {
                $reg = $buscado->fetchObject();
                $j = new Juego($reg->Codigo, $reg->Nombre_juego, $reg->Nombre_consola, $reg->Anno, $reg->Precio, $reg->Alquilado, $reg->Imagen, $reg->descripcion);
            } else {
                $j = false;
            }
            unset($conex);
            return $j;
        } catch (PDOException $ex) {
            echo "<a href=index.php>Ir a Inicio<a>";
            die("error en la BD" . $ex->message());
        }
    }

    public static function buscarNoAlquilados() {
        try {
            $conex = new conexion();
            $juego = $conex->query("SELECT DISTINCT juegos.* FROM juegos,alquiler where Fecha_alquiler<Fecha_devol or Alquilado='NO'");
            $j = new Juego();
            while ($reg = $juego->fetchObject()) {
                $j->CrearJuego($reg->Codigo, $reg->Nombre_juego, $reg->Nombre_consola, $reg->Anno, $reg->Precio, $reg->Alquilado, $reg->Imagen, $reg->descripcion);
                $juegos[] = clone($j);
            }
            unset($conex);
            return $juegos;
        } catch (PDOException $ex) {
            echo "<a href=index.php>Ir a Inicio<a>";
            die("error en la BD" . $ex->message());
        }
    }

    public static function MisAlquilados($DNI) {
        try {
            $conex = new conexion();
            $juego = $conex->query("SELECT DISTINCT juegos.* FROM juegos,alquiler where Fecha_alquiler>=Fecha_devol and Codigo=Cod_juego and DNI_cliente='$DNI'");
            $j = new Juego();
            while ($reg = $juego->fetchObject()) {
                $j->CrearJuego($reg->Codigo, $reg->Nombre_juego, $reg->Nombre_consola, $reg->Anno, $reg->Precio, $reg->Alquilado, $reg->Imagen, $reg->descripcion);
                $juegos[] = clone($j);
            }
            unset($conex);
            return $juegos;
        } catch (PDOException $ex) {
            echo "<a href=index.php>Ir a Inicio<a>";
            die("error en la BD" . $ex->message());
        }
    }

    public static function buscarAlquilados() {
        try {
            $conex = new conexion();
            $juego = $conex->query("SELECT DISTINCT * FROM juegos,alquiler where Fecha_alquiler>Fecha_devol and Codigo=Cod_juego");
            $j = new Juego();
            while ($reg = $juego->fetchObject()) {
                $j->CrearJuego($reg->Codigo, $reg->Nombre_juego, $reg->Nombre_consola, $reg->Anno, $reg->Precio, $reg->Alquilado, $reg->Imagen, $reg->descripcion);
                $juegos[] = clone($j);
            }
            unset($conex);
            return $juegos;
        } catch (PDOException $ex) {
            echo "<a href=index.php>Ir a Inicio<a>";
            die("error en la BD" . $ex->message());
        }
    }

    public static function insertar($nombre, $consola, $anno, $precio, $descripcion, $imagen) {
        $caracteres = substr("$nombre", 0, 1);
        $codigo = $caracteres . "-" . "$consola";
        try {
            $conex = new Conexion();
            $reg = $conex->exec("INSERT INTO juegos (Codigo,Nombre_juego,Nombre_consola,Anno,Precio,Alquilado,Imagen,descripcion) VALUES ('$codigo','$nombre','$consola','$anno','$precio','NO','$descripcion','$imagen')");
            unset($conex);
            return $reg;
        } catch (PDOException $ex) {
            echo "<a href=index.php>IR A INICIO</a>";
            die("ERROR EN LA BD. " . $ex->getMessage());
        }
    }

    public static function borrar($codigo) {
        try {
            $conex = new Conexion();
            $reg = $conex->exec("delete from juegos where Imagen='$codigo'");
            unset($conex);
            return $reg;
        } catch (PDOException $ex) {
            echo "<a href=index.php>IR A INICIO</a>";
            die("ERROR EN LA BD. " . $ex->getMessage());
        }
    }
    
     public static function actualizar($nombre, $consola, $anno, $precio, $descripcion, $imagen) {
        $caracteres = substr("$nombre", 0, 1);
        $codigo = $caracteres . "-" . "$consola";
        try {
            $conex = new Conexion();
            $reg = $conex->exec("UPDATE juegos set Codigo='$codigo',Nombre_juego='$nombre',Nombre_consola='$consola',Anno='$anno,Precio='$precio',Alquilado='NO',Imagen='$imagen',descripcion='$descripcion' where Codigo='$codigo'");
            unset($conex);
            return $reg;
        } catch (PDOException $ex) {
            echo "<a href=index.php>IR A INICIO</a>";
            die("ERROR EN LA BD. " . $ex->getMessage());
        }
    }

}

?>
