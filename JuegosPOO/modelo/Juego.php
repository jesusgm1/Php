<?php

class Juego {
    public $Codigo;
    public $Nombre_juego;
    public $Nombre_consola;
    public $Anno;
    public $Precio;
    public $Alquilado;
    public $Imagen;
    public $descripcion;
    
    public function __construct($Codigo = 0, $Nombre_juego = " ", $Nombre_consola = " ", $Anno = 0, $Precio = 0, $Alquilado = " ", $Imagen = " ", $descripcion = " ") {
        $this->Codigo = $Codigo;
        $this->Nombre_juego = $Nombre_juego;
        $this->Nombre_consola = $Nombre_consola;
        $this->Anno = $Anno;
        $this->Precio = $Precio;
        $this->Alquilado = $Alquilado;
        $this->Imagen = $Imagen;
        $this->descripcion = $descripcion;
    }

    public function getCodigo() {
        return $this->Codigo;
    }

    public function getNombre_juego() {
        return $this->Nombre_juego;
    }

    public function getNombre_consola() {
        return $this->Nombre_consola;
    }

    public function getAnno() {
        return $this->Anno;
    }

    public function getPrecio() {
        return $this->Precio;
    }

    public function getAlquilado() {
        return $this->Alquilado;
    }

    public function getImagen() {
        return $this->Imagen;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    public function setNombre_juego($Nombre_juego) {
        $this->Nombre_juego = $Nombre_juego;
    }

    public function setNombre_consola($Nombre_consola) {
        $this->Nombre_consola = $Nombre_consola;
    }

    public function setAnno($Anno) {
        $this->Anno = $Anno;
    }

    public function setPrecio($Precio) {
        $this->Precio = $Precio;
    }

    public function setAlquilado($Alquilado) {
        $this->Alquilado = $Alquilado;
    }

    public function setImagen($Imagen) {
        $this->Imagen = $Imagen;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

        
      
       public function CrearJuego($Codigo,$Nombre_juego,$Nombre_consola,$Anno,$Precio,$Alquilado,$Imagen,$descripcion) {
        $this->Codigo = $Codigo;
        $this->Nombre_juego = $Nombre_juego;
        $this->Nombre_consola = $Nombre_consola;
        $this->Anno = $Anno;
        $this->Precio = $Precio;
        $this->Alquilado = $Alquilado;
        $this->Imagen = $Imagen;
        $this->descripcion = $descripcion;
    }
}
