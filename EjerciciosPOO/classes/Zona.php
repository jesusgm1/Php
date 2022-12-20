<?php

class Zona {

    protected $plazas_totales;
    protected $plazas_restantes;
    protected static $entradas = 0;

    public function __construct($plazas_totales, $plazas_restantes) {
        $this->plazas_totales = $plazas_totales;
        $this->plazas_restantes = $plazas_restantes;
        if ($_POST["zona"] == "Principal") {
            $this->plazas_totales = 1000;
            $this->plazas_restantes = 1000;
        }
        if ($_POST["zona"] == "compra-venta") {
            $this->plazas_totales = 200;
            $this->plazas_restantes = 200;
        }
        if ($_POST["zona"] == "VIP") {
            $this->plazas_totales = 25;
            $this->plazas_restantes = 25;
        }
    }

    public function getPlazas_totales() {
        return $this->plazas_totales;
    }

    public function getNombre_zona() {
        return $this->nombre_zona;
    }

    public function vender() {
        if (isset($_POST["comprar"])) {
            if ($_POST["zona"] == "Principal") {
                if ($_SESSION["entradas"] > $this->plazas_restantes) {
                    return "no hay" . $_SESSION["entradas"]. "entradas";
                } else {
                    self::$entradas = $this->plazas_restantes - $_SESSION["entradas"];
                }
            }
            if ($_POST["zona"] == "compra-venta") {
                if ($_SESSION["entradas"] > $this->plazas_restantes) {
                    return "no hay" . $_SESSION["entradas"]. "entradas";
                } else {
                    self::$entradas = $this->plazas_restantes - $_SESSION["entradas"];
                }
            }
            if ($_POST["zona"] == "VIP") {
                if ($_SESSION["entradas"] > $this->plazas_restantes) {
                    return "no hay " . $_SESSION["entradas"]. " entradas";
                } else {
                    self::$entradas = $this->plazas_restantes - $_SESSION["entradas"];
                }
            }
            return self::$entradas;
        }
    }

}
