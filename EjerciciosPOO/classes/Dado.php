<?php

class Dado {

    protected $valores = [0 => "AS", 1 => "K", 2 => "Q", 3 => "J", 4 => 8, 5 => 7];
    protected static $tiradas = 0;
    protected $caras;

    public function __construct() {
        $this->valores;
    }

    public function __toString() {
        return "las caras del dado son: " . implode(",", $this->valores) . "<br>";
    }

    public function tira() {
        $this->caras = rand(1,6);
    }
    
    public function nombreFigura () {
        switch ($this->caras) {
            case 1:
                echo "AS" . "<br>";
                break;
             case 2:
                echo "K" . "<br>";
                break;
             case 3:
                echo "Q" . "<br>";
                break;
             case 4:
                echo "J" . "<br>";
                break;
             case 5:
                echo 8 . "<br>";
                break;
             case 6:
                echo 7 . "<br>";
                break;
        }
    }
    
    public static function getTiradas() {
        return self::$tiradas;
    }

}

?>
