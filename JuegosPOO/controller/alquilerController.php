<?php
require_once './modelo/Alquiler.php';
require_once './modelo/Juego.php';
require_once './modelo/Usuario.php';
require_once 'conexion.php';
class alquilerController {
     public static function insertar($codigo,$dni,$alquiler,$devolucion) {
         $numero = rand(20,1000000000);
        try {
            $conex = new Conexion();
            $reg = $conex->exec("INSERT INTO alquiler (id,Cod_juego,DNI_cliente,Fecha_alquiler,Fecha_devol) VALUES ($numero,'$codigo','$dni','$alquiler','$devolucion')");
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
            $reg = $conex->exec("delete from alquiler where Cod_juego='$codigo'");
            unset($conex);
            return $reg;
        } catch (PDOException $ex) {
            echo "<a href=index.php>IR A INICIO</a>";
            die("ERROR EN LA BD. " . $ex->getMessage());
        }
    }
}
