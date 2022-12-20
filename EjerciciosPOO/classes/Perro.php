<?php
require_once 'classes/Mamifero.php';
class Perro extends Mamifero {
    public function __construct($color, $raza, $numeroPatas, $marino = "false") {
        parent::__construct($color, $raza, $numeroPatas, $marino);
    }
    
    public function __toString() {
        return parent::__toString();
    }
    
    public function ladrar() {
        echo "el perro ladra";
    }
}
?>
