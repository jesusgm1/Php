<?php
require_once 'classes/Animal.php';
class Mamifero extends Animal {
    protected $marino;
    
    public function __construct($color,$raza,$numeroPatas,$marino = "false") {
        parent::__construct($color, $raza, $numeroPatas);
        $this->marino = $marino; 
    }
    
    public function __toString() {
       return parent::__toString() . "y mi respuesta a vivir en el mar es: " .$this->marino;
    }
}
?>