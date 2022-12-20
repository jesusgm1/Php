<?php
require_once 'classes/Dado.php';
$cubo = array();
for($i = 0;$i < 5; $i++) {
    $cubo[$i] = new Dado();
}
foreach($cubo as $valor) {
    $valor->tira();
    $valor->nombreFigura();
}
Dado::getTiradas();
?>
