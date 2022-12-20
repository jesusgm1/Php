<?php
class Animal {
    protected $color;
    protected $raza;
    protected $numeroPatas;
    
    public function __construct($color = "rojo" ,$raza = "pez" ,$numeroPatas = "0") {
        $this->color = $color;
        $this->raza = $raza;
        $this->numeroPatas = $numeroPatas;
    }
    
    public function __toString() {
         return "soy de color " .$this->color. " de la raza ".$this->raza." y tengo ".$this->numeroPatas. " patas";
    }
    
    public function caminar() {
        echo "el animal esta andando";
    }
    
    public function comer() {
        echo "el animal come";
    }
}
?>