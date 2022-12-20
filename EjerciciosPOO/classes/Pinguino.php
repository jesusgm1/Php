<?php
require_once 'classes/ave.php';
class Pinguino extends Ave {
    public function __construct($color, $raza, $numeroPatas, $rapaz = "false") {
        parent::__construct($color, $raza, $numeroPatas, $rapaz);
    }
    
    public function __toString() {
        return parent::__toString() . "y me llamo pentarou";
    }
    
    public function nadar() {
        echo "el pinguino esta nadando";
    }
}
?>
