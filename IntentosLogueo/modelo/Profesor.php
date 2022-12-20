<?php

class Profesor {
    protected $dni_p;
    protected $nombre;
    protected $apellidos;
    protected $pass;
    protected $bloqueado;
    protected $hora_bloqueo;
    protected $intentos;
    
    function __construct($dni_p, $nombre, $apellidos, $pass, $bloqueado, $hora_bloqueo, $intentos) {
        $this->dni_p = $dni_p;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->pass = $pass;
        $this->bloqueado = $bloqueado;
        $this->hora_bloqueo = $hora_bloqueo;
        $this->intentos = $intentos;
    }

    function getDni_p() {
        return $this->dni_p;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getPass() {
        return $this->pass;
    }

    function getBloqueado() {
        return $this->bloqueado;
    }

    function getHora_bloqueo() {
        return $this->hora_bloqueo;
    }

    function getIntentos() {
        return $this->intentos;
    }

    function setDni_p($dni_p) {
        $this->dni_p = $dni_p;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    function setBloqueado($bloqueado) {
        $this->bloqueado = $bloqueado;
    }

    function setHora_bloqueo($hora_bloqueo) {
        $this->hora_bloqueo = $hora_bloqueo;
    }

    function setIntentos($intentos) {
        $this->intentos = $intentos;
    }
    
}
?>