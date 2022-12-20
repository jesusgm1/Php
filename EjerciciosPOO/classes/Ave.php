<?php
require_once 'classes/Animal.php';
class Ave extends Animal {
    protected $rapaz;
    
    public function __construct($color,$raza,$numeroPatas,$rapaz = "false") {
        parent::__construct($color, $raza, $numeroPatas);
        $this->rapaz = $rapaz;
    }
    
    public function __toString() {
        return "soy un ave y mi respuesta a ser peligrosa es: " .$this->rapaz;
    }
    
    public function volar() {
        echo "el ave esta volando";
    }
}
?>
