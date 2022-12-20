<?php

class Alquiler {
   protected $id;
   protected $cod_juego;
   protected $dni_cliente;
   protected $fecha_alquiler;
   protected $fecha_devolucion;
   
   function __construct($id, $cod_juego, $dni_cliente, $fecha_alquiler, $fecha_devolucion) {
       $this->id = $id;
       $this->cod_juego = $cod_juego;
       $this->dni_cliente = $dni_cliente;
       $this->fecha_alquiler = $fecha_alquiler;
       $this->fecha_devolucion = $fecha_devolucion;
   }

     public function __get($attr) {
          return $this->$attr;
      }
      
      public function __set($name,$value) {
          $this->$name = $value;
      }
      
       public function CrearAlquiler($id,$cod_juego,$dni_cliente,$fecha_alquiler,$fecha_devolucion,$Alquilado) {
       $this->id = $id;
       $this->cod_juego = $cod_juego;
       $this->dni_cliente = $dni_cliente;
       $this->fecha_alquiler = $fecha_alquiler;
       $this->fecha_devolucion = $fecha_devolucion;
    }
}


