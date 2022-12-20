<?php

require_once 'conexion.php';
require_once './modelo/Usuario.php';

class usuariosController {

    public static function buscar($dni, $clave) {
        try {
            $conex = new Conexion();
            $result = $conex->prepare("SELECT * FROM cliente WHERE DNI=? and Clave=?");
            $clave = md5($clave);
            $result->execute([$dni, $clave]);
            if ($result->rowCount()) {
                $cliente = $result->fetchObject();
                return new Usuario($cliente->DNI, $cliente->Nombre, $cliente->Apellidos, $cliente->Direccion, $cliente->Localidad, $cliente->Clave, $cliente->Tipo);
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            //$errores[]=$exc->getMessage();
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos');
        }
    }

    public static function insertar($dni,$nombre,$apellidos,$direccion,$Localidad,$clave,$tipo) {
        try {
            $conex = new Conexion();
            $reg = $conex->exec("INSERT INTO cliente (DNI,nombre,apellidos,direccion,localidad,clave,tipo) VALUES ('$dni','$nombre','$apellidos','$direccion','$Localidad','$clave','$tipo')");
            unset($conex);
            return $reg;
        } catch (PDOException $ex) {
            echo "<a href=index.php>IR A INICIO</a>";
            die("ERROR EN LA BD. " . $ex->getMessage());
        }
    }

}
