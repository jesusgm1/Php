<?php
require_once 'classes/ave.php';
class Canario extends Ave {
    public function __construct($color, $raza, $numeroPatas, $rapaz = "false") {
        parent::__construct($color, $raza, $numeroPatas, $rapaz);
    }
    
    public function __toString() {
        return parent::__toString() . "y me llamo tauros";
    }
    
    public function piar() {
        echo "el canario hace PIOPIOPIOPI";
    }
}
?>
