<?php

class Usuario {

    protected $DNI;
    protected $Nombre;
    protected $Apellidos;
    protected  $Direccion;
    protected  $Localidad;
    protected  $Clave;
    protected  $Tipo;

    public function __construct($DNI, $Nombre, $Apellidos, $Direccion, $Localidad, $Clave, $Tipo = "cliente") {
        $this->DNI = $DNI;
        $this->Nombre = $Nombre;
        $this->Apellidos = $Apellidos;
        $this->Direccion = $Direccion;
        $this->Localidad = $Localidad;
        $this->Clave = $Clave;
        $this->Tipo = $Tipo;
    }
    function getDNI() {
        return $this->DNI;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getApellidos() {
        return $this->Apellidos;
    }

    function getDireccion() {
        return $this->Direccion;
    }

    function getLocalidad() {
        return $this->Localidad;
    }

    function getClave() {
        return $this->Clave;
    }

    function getTipo() {
        return $this->Tipo;
    }

    function setDNI($DNI) {
        $this->DNI = $DNI;
    }

    function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    function setApellidos($Apellidos) {
        $this->Apellidos = $Apellidos;
    }

    function setDireccion($Direccion) {
        $this->Direccion = $Direccion;
    }

    function setLocalidad($Localidad) {
        $this->Localidad = $Localidad;
    }

    function setClave($Clave) {
        $this->Clave = $Clave;
    }

    function setTipo($Tipo) {
        $this->Tipo = $Tipo;
    }

  
}
